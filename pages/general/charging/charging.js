class Charging {
  constructor() {
    this.element = document.querySelector('.charging_background');
    this.hideShowcharging(false);
  }

  hideShowcharging(action) {
    if (this.element) {
      this.element.style.display = action ? "flex" : "none";
      this.element.setAttribute('aria-hidden', action ? 'false' : 'true');
    }
  }
}

const chargingClass = new Charging();
window.chargingClass = chargingClass;
