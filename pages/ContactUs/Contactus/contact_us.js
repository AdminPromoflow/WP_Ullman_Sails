class ContactUs {
  constructor() {
    this.form = document.getElementById('contactUsForm');
    this.btnContactUs = document.getElementById('btnContactUs');
    this.contactName = document.getElementById('contactName');
    this.contactNumber = document.getElementById('contactNumber');
    this.contactLocation = document.getElementById('contactLocation');
    this.contactEmail = document.getElementById('contactEmail');
    this.contactMessage = document.getElementById('contactMessage');




    if (!this.form || !this.btnContactUs) return;

    this.initMap();
    this.form.addEventListener('submit', event => this.handleSubmit(event));
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

  async handleSubmit(event) {
    event.preventDefault();

    if (!this.form.reportValidity()) return;

    this.btnContactUs.disabled = true;
    this.btnContactUs.setAttribute('aria-busy', 'true');
    window.chargingClass?.hideShowcharging(true);

    try {
      await this.requestContactUs();
    } catch (error) {
      console.error('Contact form submission failed:', error);
      alert(error.message || 'Unable to send your message. Please try again.');
    } finally {
      this.btnContactUs.disabled = false;
      this.btnContactUs.removeAttribute('aria-busy');
      window.chargingClass?.hideShowcharging(false);
    }
  }

  async requestContactUs() {
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


    const response = await fetch(window.ullmanAjax.url, {
      method: "POST",
      body: formData
    });
    const data = await response.json();

    alert(data);

    if (!data.success) {
      throw new Error(data.message || 'Unable to send your message.');
    }

    alert(data.message || 'Thank you. Your message has been sent.');
    this.form.reset();
  }
}

document.addEventListener('DOMContentLoaded', () => new ContactUs());
