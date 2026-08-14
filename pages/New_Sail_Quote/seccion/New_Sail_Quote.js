class NewSailQuote {
  constructor() {
    const params = new URLSearchParams(window.location.search);
    const sailTypeParam = params.get('sailType');
    const title = params.get('title');

    this.form = document.getElementById('new_sail_quote_form');
    this.btnNewSailQuote = document.getElementById('btnNewSailQuote');

    this.firstName = document.getElementById('first_name');
    this.lastName = document.getElementById('last_name');
    this.email = document.getElementById('email');
    this.phone = document.getElementById('phone');
    this.address1 = document.getElementById('address_1');
    this.address2 = document.getElementById('address_2');
    this.city = document.getElementById('city');
    this.postcode = document.getElementById('postcode');

    this.contactByPhone = document.getElementById('contact_by_phone');
    this.contactByEmail = document.getElementById('contact_by_email');

    this.boatType = document.getElementById('boat_type');
    this.sailType = document.getElementById('sail_type');
    this.checkboxRacing = document.getElementById('checkbox_racing');
    this.checkboxCruising = document.getElementById('checkbox_cruising');
    this.boatLocation = document.getElementById('boat_location');
    this.additionalInfo = document.getElementById('additional_info');
    this.newsletter = document.getElementById('newsletter');

    if (title) {
      this.sailType.value = title;
    }

    if (sailTypeParam == "Cruising Sails") {
      this.checkboxCruising.checked = true;
    }
    else if (sailTypeParam == "Racing Sails") {
      this.checkboxRacing.checked = true;
    }

    this.form.addEventListener("submit", (e) => {
      e.preventDefault();
      //alert("This action will be implemented once the page has been uploaded.");
      if (this.validateMainFields()) {
        chargingClass.hideShowcharging(true);

        this.requestNewSailQuote();

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

  requestNewSailQuote() {
    var formData = new FormData();

    formData.append("action", "send_new_sail_quote");
    formData.append("first_name", this.firstName.value);
    formData.append("last_name", this.lastName.value);
    formData.append("email", this.email.value);
    formData.append("phone", this.phone.value);
    formData.append("address_1", this.address1.value);
    formData.append("address_2", this.address2.value);
    formData.append("city", this.city.value);
    formData.append("postcode", this.postcode.value);
    formData.append("contact_by_phone", this.contactByPhone.checked ? "1" : "0");
    formData.append("contact_by_email", this.contactByEmail.checked ? "1" : "0");
    formData.append("boat_type", this.boatType.value);
    formData.append("sail_type", this.sailType.value);
    formData.append("sail_use_racing", this.checkboxRacing.checked ? "1" : "0");
    formData.append("sail_use_cruising", this.checkboxCruising.checked ? "1" : "0");
    formData.append("boat_location", this.boatLocation.value);
    formData.append("additional_info", this.additionalInfo.value);
    formData.append("newsletter", this.newsletter.checked ? "1" : "0");

    fetch(window.ullmanAjax.controllerUrl, {
      method: "POST",
      body: formData
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.success) {
          alert(data.message);
          chargingClass.hideShowcharging(false);

        } else {
          alert(data.message || "There was an error sending your sail quote request.");
          chargingClass.hideShowcharging(false);

        }
      })
      .catch((error) => {
        console.error("Error:", error);
        alert("An unexpected error occurred.");
        chargingClass.hideShowcharging(false);

      });
  }
}

const checkbox_cruising = document.getElementById("checkbox_cruising");
const checkbox_racing = document.getElementById("checkbox_racing");
const sail_type = document.getElementById("sail_type");
const newSailQuote = new NewSailQuote();
