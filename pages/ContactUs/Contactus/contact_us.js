class ContactUs {
  constructor() {
    this.btnContactUs = document.getElementById('btnContactUs');
    this.contactName = document.getElementById('contactName');
    this.contactNumber = document.getElementById('contactNumber');
    this.contactLocation = document.getElementById('contactLocation');
    this.contactEmail = document.getElementById('contactEmail');
    this.contactMessage = document.getElementById('contactMessage');




    this.initMap();

    this.btnContactUs.addEventListener("click", () => {
      if (this.validateMainFields()) {
        chargingClass.hideShowcharging(true);

        this.requestContactUs();

      }
    });
  }

  initMap() {
    this.map = L.map('map').setView([50.859644, -2.320230], 7);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 18,
      attributionControl: false,
      id: 'mapbox/streets-v11',
      tileSize: 512,
      zoomOffset: -1,
      accessToken: 'your.mapbox.access.token'
    }).addTo(this.map);

    L.marker([50.39603448075243, -4.041274087411246]).addTo(this.map);
    L.marker([50.841011546296706, -1.3502185309655552]).addTo(this.map);
  }

  validateMainFields() {
    if (
      this.contactName.value.trim() !== "" &&
      this.contactNumber.value.trim() !== "" &&
      this.contactLocation.value.trim() !== "" &&
      this.contactEmail.value.trim() !== ""
    ) {
      return true;
    } else {
      alert("Please fill in all required fields.");
      return false;
    }
  }

  requestContactUs() {
    var fileInput = document.getElementById('pdf_file');
    var formData = new FormData();

    formData.append('action', 'send_emal_contact_us');
    formData.append('contactName', this.contactName.value);
    formData.append('contactNumber', this.contactNumber.value);
    formData.append('contactLocation', this.contactLocation.value);
    formData.append('contactEmail', this.contactEmail.value);
    formData.append('contactMessage', this.contactMessage.value);



    if (fileInput.files.length > 0) {
      var file = fileInput.files[0];
      formData.append('file', file);
    }

    formData.set("form_action", formData.get("action"));
    formData.set("action", "ullman_send_forms");
    formData.append("nonce", window.ullmanAjax.nonce);

    fetch(window.ullmanAjax.url, {
      method: "POST",
      body: formData
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.success) {
          alert(data.message);
          chargingClass.hideShowcharging(false);
        }
      })
      .catch((error) => {
        console.error("Error:", error);
      });
  }
}

const contactUs = new ContactUs();
