document.addEventListener("DOMContentLoaded", async function () {
  let colourCustomize = "white";

  class Charging {
    constructor() {
      this.hideShowcharging(false);
    }

    hideShowcharging(action) {
      const charging_background = document.querySelector(".charging_background");

      if (charging_background) {
        charging_background.style.display = action ? "flex" : "none";
      }
    }
  }

  const chargingClass = new Charging();

  const customizeSection = document.getElementById("customize");
  const sailTypeSelect = document.getElementById("sailType");
  const clothWeightSelect = document.getElementById("clothWeight");
  const availableColours = document.getElementById("availableColours");
  const contentDownload = document.getElementById("contentDownload");
  const sailOptions = document.querySelectorAll(".sail-option");
  const downloadPDF = document.getElementById("downloadPDF");
  let sailData = {};

  if (!sailTypeSelect) {
    console.error("No existe #sailType");
    return;
  }

  if (!clothWeightSelect) {
    console.error("No existe #clothWeight");
    return;
  }

  if (!availableColours) {
    console.error("No existe #availableColours");
    return;
  }

  if (!contentDownload) {
    console.error("No existe #contentDownload");
    return;
  }

  const coloursUrl = customizeSection?.dataset.coloursUrl;

  if (!coloursUrl) {
    console.error("No existe la URL del JSON de colores.");
    return;
  }

  function buildSailData(config) {
    const sailTypesByName = new Map(
      (config.sail_types || []).map(function (sail) {
        return [sail.name, sail];
      })
    );

    const normalizedSailData = {};

    Array.from(sailTypeSelect.options).forEach(function (option) {
      const sail = sailTypesByName.get(option.textContent.trim());

      if (!sail) return;

      normalizedSailData[option.value] = {
        name: sail.name,
        clothWeights: Object.fromEntries(
          sail.cloth_weights.map(function (weight) {
            const palette = config.palettes?.[weight.palette] || [];

            return [
              weight.name,
              palette.map(function (colour) {
                return {
                  name: colour.name,
                  value: colour.value
                };
              })
            ];
          })
        )
      };
    });

    return normalizedSailData;
  }

  chargingClass.hideShowcharging(true);

  try {
    const response = await fetch(coloursUrl, {
      headers: {
        Accept: "application/json"
      }
    });

    if (!response.ok) {
      throw new Error(`Could not load colour data (HTTP ${response.status}).`);
    }

    const colourConfig = await response.json();
    sailData = buildSailData(colourConfig);

    const missingSails = Array.from(sailTypeSelect.options)
      .filter(function (option) {
        return !sailData[option.value];
      })
      .map(function (option) {
        return option.textContent.trim();
      });

    if (missingSails.length > 0) {
      throw new Error(`Missing colour data for: ${missingSails.join(", ")}`);
    }
  } catch (error) {
    console.error("Could not initialize the sail colours:", error);
    availableColours.textContent = "Colour options could not be loaded.";
    sailTypeSelect.disabled = true;
    clothWeightSelect.disabled = true;
    return;
  } finally {
    chargingClass.hideShowcharging(false);
  }

  const allSvgs = contentDownload.querySelectorAll("svg");

  allSvgs.forEach(function (svg) {
    svg.classList.add("spinnaker-svg");
  });

  function showSelectedSail(sailId) {
    sailOptions.forEach(function (option) {
      option.classList.remove("active");
    });

    const selectedSail = document.getElementById(sailId);

    if (selectedSail) {
      selectedSail.classList.add("active");
    } else {
      console.error("No existe el SVG con id:", sailId);
    }
  }

  function loadClothWeights(sailId) {
    const selectedSailData = sailData[sailId];

    clothWeightSelect.innerHTML = "";

    if (!selectedSailData) {
      console.error("No existe información para este sail:", sailId);
      return;
    }

    const weights = Object.keys(selectedSailData.clothWeights);

    weights.forEach(function (weight) {
      const option = document.createElement("option");
      option.value = weight;
      option.textContent = weight;
      clothWeightSelect.appendChild(option);
    });

    if (weights.length > 0) {
      clothWeightSelect.value = weights[0];
      loadAvailableColours(sailId, weights[0]);
    }
  }

  function loadAvailableColours(sailId, clothWeight) {
    const colours = sailData[sailId]?.clothWeights[clothWeight] || [];

    availableColours.innerHTML = "";

    if (colours.length === 0) {
      colourCustomize = "white";
      return;
    }

    colours.forEach(function (colour, index) {
      const colourButton = document.createElement("div");

      colourButton.classList.add("colour");
      colourButton.style.backgroundColor = colour.value;
      colourButton.dataset.colour = colour.value;
      colourButton.title = colour.name;
      colourButton.setAttribute("aria-label", colour.name);

      colourButton.addEventListener("click", function () {
        colourCustomize = colour.value;

        const allColourButtons = availableColours.querySelectorAll(".colour");

        allColourButtons.forEach(function (item) {
          item.classList.remove("active");
        });

        colourButton.classList.add("active");
      });

      availableColours.appendChild(colourButton);

      if (index === 0) {
        colourButton.classList.add("active");
        colourCustomize = colour.value;
      }
    });
  }

  sailTypeSelect.addEventListener("change", function () {
    const selectedSailId = sailTypeSelect.value;

    showSelectedSail(selectedSailId);
    loadClothWeights(selectedSailId);
  });

  clothWeightSelect.addEventListener("change", function () {
    const selectedSailId = sailTypeSelect.value;
    const selectedClothWeight = clothWeightSelect.value;

    loadAvailableColours(selectedSailId, selectedClothWeight);
  });

  contentDownload.addEventListener("click", function (event) {
    const paintableElement = event.target.closest(
      "path, polygon, rect, circle, ellipse, polyline"
    );

    if (!paintableElement) return;

    const activeSail = document.querySelector(".sail-option.active");

    if (!activeSail || !activeSail.contains(paintableElement)) return;

    if (paintableElement.hasAttribute("style")) {
      const currentStyle = paintableElement.getAttribute("style");
      const cleanStyle = currentStyle.replace(/fill\s*:\s*[^;]+;?/i, "");

      paintableElement.setAttribute("style", cleanStyle);
    }

    paintableElement.style.fill = colourCustomize;
    paintableElement.setAttribute("fill", colourCustomize);
  });

  async function createCustomSailPdf() {
    const activeOption = document.querySelector(".sail-option.active");

    if (!activeOption) {
      alert("Please select a sail design.");
      return null;
    }

    const svgElement = activeOption.querySelector("svg");

    if (!svgElement) {
      alert("No SVG found.");
      return null;
    }

    const clonedSvg = svgElement.cloneNode(true);
    clonedSvg.setAttribute("xmlns", "http://www.w3.org/2000/svg");

    const svgData = new XMLSerializer().serializeToString(clonedSvg);

    const svgBlob = new Blob([svgData], {
      type: "image/svg+xml;charset=utf-8"
    });

    const svgUrl = URL.createObjectURL(svgBlob);

    return new Promise((resolve) => {
      const img = new Image();

      img.onload = function () {
        const canvas = document.createElement("canvas");
        const ctx = canvas.getContext("2d");

        const canvasWidth = 1000;
        const canvasHeight = 1400;

        canvas.width = canvasWidth;
        canvas.height = canvasHeight;

        ctx.fillStyle = "white";
        ctx.fillRect(0, 0, canvasWidth, canvasHeight);

        const maxWidth = canvasWidth * 0.82;
        const maxHeight = canvasHeight * 0.88;

        const scale = Math.min(
          maxWidth / img.width,
          maxHeight / img.height
        );

        const scaledWidth = img.width * scale;
        const scaledHeight = img.height * scale;

        const x = (canvasWidth - scaledWidth) / 2;
        const y = (canvasHeight - scaledHeight) / 2;

        ctx.drawImage(img, x, y, scaledWidth, scaledHeight);

        let pdf = null;

        if (typeof jsPDF !== "undefined") {
          pdf = new jsPDF();
        } else if (window.jspdf && window.jspdf.jsPDF) {
          pdf = new window.jspdf.jsPDF();
        } else {
          alert("jsPDF is not loaded.");
          URL.revokeObjectURL(svgUrl);
          resolve(null);
          return;
        }

        pdf.addImage(
          canvas.toDataURL("image/jpeg", 1.0),
          "JPEG",
          0,
          0,
          pdf.internal.pageSize.getWidth(),
          pdf.internal.pageSize.getHeight()
        );

        URL.revokeObjectURL(svgUrl);
        resolve(pdf);
      };

      img.onerror = function () {
        URL.revokeObjectURL(svgUrl);
        alert("Could not load the sail image.");
        resolve(null);
      };

      img.src = svgUrl;
    });
  }

  if (downloadPDF) {
    downloadPDF.addEventListener("click", async function () {
      const pdf = await createCustomSailPdf();

      if (!pdf) return;

      pdf.save("custom-spinnaker.pdf");
    });
  }

  class CustomizeSailForm {
    constructor() {
      this.customizeForm = document.getElementById("customizeForm");

      if (this.customizeForm) {
        this.customizeForm.addEventListener("submit", (event) => {
          event.preventDefault();
          this.submitCustomizeForm();
        });
      }
    }

    async submitCustomizeForm() {
      const customerName = document.getElementById("customerName");
      const customerEmail = document.getElementById("customerEmail");
      const salespersonEmail = document.getElementById("salespersonEmail");
      const boatName = document.getElementById("boatName");
      const boatDesignLength = document.getElementById("boatDesignLength");

      if (
        !customerName ||
        !customerEmail ||
        !salespersonEmail ||
        !boatName ||
        !boatDesignLength
      ) {
        alert("Some form fields were not found.");
        return;
      }

      if (
        !customerName.value ||
        !customerEmail.value ||
        !salespersonEmail.value ||
        !boatName.value ||
        !boatDesignLength.value
      ) {
        alert("Please complete all fields.");
        return;
      }

      chargingClass.hideShowcharging(true);

      try {
        const pdf = await createCustomSailPdf();

        if (!pdf) {
          alert("Could not create PDF.");
          chargingClass.hideShowcharging(false);
          return;
        }

        const pdfBase64 = pdf.output("datauristring");

        const url = window.ullmanAjax.url;

        const data = {
          action: "ullman_send_forms",
          form_action: "submit_customize_form",
          nonce: window.ullmanAjax.nonce,
          name: customerName.value,
          email: customerEmail.value,
          salesperson_email: salespersonEmail.value,
          boat_name: boatName.value,
          boat_design_length: boatDesignLength.value,
          sail_type: sailTypeSelect.value,
          cloth_weight: clothWeightSelect.value,
          pdf_base64: pdfBase64
        };

        const response = await this.makeRequest(url, data);

        if (!response) {
          chargingClass.hideShowcharging(false);
          return;
        }

        alert(JSON.stringify(response));

        if (response.success === true) {
          this.customizeForm.reset();
        }

      } catch (error) {
        console.error("Submit error:", error);
        alert("There was an error sending the form.");
      } finally {
        chargingClass.hideShowcharging(false);
      }
    }

    async makeRequest(url, data) {
      try {
        const formData = new FormData();
        Object.entries(data).forEach(([key, value]) => formData.append(key, value));

        const response = await fetch(url, {
          method: "POST",
          body: formData
        });

        if (!response.ok) {
          throw new Error("Network error.");
        }

        return await response.json();

      } catch (error) {
        console.error("Error:", error);
        return null;
      }
    }
  }

  new CustomizeSailForm();

  showSelectedSail(sailTypeSelect.value);
  loadClothWeights(sailTypeSelect.value);
});
