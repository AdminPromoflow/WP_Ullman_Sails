class NewRepairQuote {
  constructor() {
    const params = new URLSearchParams(window.location.search);
    const sailTypeParam = params.get('sailType');
    const title = params.get('title');

    this.form = document.getElementById('repair_quote_form');
    this.btnRepairQuote = document.getElementById('btnRepairQuote');

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
    this.boatName = document.getElementById('boat_name');
    this.sailType = document.getElementById('sail_type');

    this.workLaundry = document.getElementById('work_laundry');
    this.workService = document.getElementById('work_service');
    this.workRepair = document.getElementById('work_repair');

    this.workDetails = document.getElementById('work_details');
    this.boatLocation = document.getElementById('boat_location');
    this.collectionDelivery = document.getElementById('collection_delivery');
    this.newsletter = document.getElementById('newsletter');

    if (title) {
      this.sailType.value = title;
    }

    if (sailTypeParam == "Cruising Sails") {
      checkbox_cruising.checked = true;
    }
    else if (sailTypeParam == "Racing Sails") {
      checkbox_racing.checked = true;
    }

    this.form.addEventListener("submit", (e) => {
      e.preventDefault();
    //  alert("This action will be implemented once the page has been uploaded.");

      if (this.validateMainFields()) {
        chargingClass.hideShowcharging(true);
        this.requestNewRepairQuote();
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

  requestNewRepairQuote() {
    var formData = new FormData();

    formData.append("action", "send_new_repair_quote");
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
    formData.append("boat_name", this.boatName.value);
    formData.append("sail_type", this.sailType.value);
    formData.append("work_laundry", this.workLaundry.checked ? "1" : "0");
    formData.append("work_service", this.workService.checked ? "1" : "0");
    formData.append("work_repair", this.workRepair.checked ? "1" : "0");
    formData.append("work_details", this.workDetails.value);
    formData.append("boat_location", this.boatLocation.value);
    formData.append("collection_delivery", this.collectionDelivery.value);
    formData.append("newsletter", this.newsletter.checked ? "1" : "0");

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
        } else {
          alert(data.message || "There was an error sending your repair quote request.");
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
const newSailQuote = new NewRepairQuote();
