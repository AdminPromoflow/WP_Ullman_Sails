class NewCoverQuote {
  constructor() {
    const params = new URLSearchParams(window.location.search);
    const sailType = params.get('sailType');
    const title = params.get('title');

    this.firstName = document.getElementById("first_name");
    this.lastName = document.getElementById("last_name");
    this.email = document.getElementById("email");
    this.phone = document.getElementById("phone");
    this.address1 = document.getElementById("address_1");
    this.address2 = document.getElementById("address_2");
    this.city = document.getElementById("city");
    this.postcode = document.getElementById("postcode");
    this.boatType = document.getElementById("boat_type");
    this.sailType = document.getElementById("sail_type");
    this.boatLocation = document.getElementById("boat_location");
    this.additionalInfo = document.getElementById("additional_info");

    this.form = document.querySelector(".seccion-form form");
    this.btnSubmit = document.querySelector(".form_submit .submit");

    this.contactMethodCheckboxes = document.querySelectorAll("fieldset:nth-of-type(2) .checkbox-group .checkbox");
    this.newsletterCheckbox = document.querySelector(".newsletter-field .checkbox");

    if (title) {
      this.sailType.value = title;
    }

    if (sailType == "Cruising Sails") {
      // checkbox_cruising.checked = true;
    }
    else if (sailType == "Racing Sails") {
      // checkbox_racing.checked = true;
    }

    this.form.addEventListener("submit", (e) => {
      e.preventDefault();
    //  alert("This action will be implemented once the page has been uploaded.");

      if (this.validateMainFields()) {
        chargingClass.hideShowcharging(true);
        this.requestNewCoverQuote();
      }
    });
  }

  validateMainFields() {
    if (
      this.firstName.value.trim() !== "" &&
      this.lastName.value.trim() !== "" &&
      this.email.value.trim() !== ""
    ) {
      return true;
    } else {
      alert("Please fill in all required fields.");
      return false;
    }
  }

  requestNewCoverQuote() {
    var formData = new FormData();

    formData.append("action", "send_new_cover_quote");
    formData.append("first_name", this.firstName.value);
    formData.append("last_name", this.lastName.value);
    formData.append("email", this.email.value);
    formData.append("phone", this.phone.value);
    formData.append("address_1", this.address1.value);
    formData.append("address_2", this.address2.value);
    formData.append("city", this.city.value);
    formData.append("postcode", this.postcode.value);
    formData.append("boat_type", this.boatType.value);
    formData.append("sail_type", this.sailType.value);
    formData.append("boat_location", this.boatLocation.value);
    formData.append("additional_info", this.additionalInfo.value);

    formData.append(
      "contact_by_phone",
      this.contactMethodCheckboxes[0] && this.contactMethodCheckboxes[0].checked ? "1" : "0"
    );

    formData.append(
      "contact_by_email",
      this.contactMethodCheckboxes[1] && this.contactMethodCheckboxes[1].checked ? "1" : "0"
    );

    formData.append(
      "newsletter",
      this.newsletterCheckbox && this.newsletterCheckbox.checked ? "1" : "0"
    );

    formData.set("form_action", formData.get("action"));
    formData.set("action", "ullman_send_forms");
    formData.append("nonce", window.ullmanAjax.nonce);

    fetch("controller/controller.php", {
      method: "POST",
      body: formData
    })
      .then((response) => response.json())
      .then((data) => {
        alert(stringify(data));

        if (data.success) {
          alert(data.message);
          chargingClass.hideShowcharging(false);
        } else {
          alert(data.message || "There was an error sending your repair quote request.");
          chargingClass.hideShowcharging(false);
        }
      })
      .catch((error) => {
        console.error("Error:", error);
        alert("An unexpected error occurred.");
      });
  }
}

const newCoverQuote = new NewCoverQuote();
