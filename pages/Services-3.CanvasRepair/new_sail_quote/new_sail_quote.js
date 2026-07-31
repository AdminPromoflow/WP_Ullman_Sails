class NewSailQuote {
  constructor() {
    container_bottom.addEventListener('click', function(){
      // alert("hola, entramos");
      const sailType = "Canvas Repair Expertise for Uninterrupted Seafaring";
      const title = "Canvas Repair Expertise for Uninterrupted Seafaring";

      const url = window.ullmanPageUrl("New_Repair_Quote", { sailType, title });

      window.location.href = url;
    })
  }
}
const container_bottom = document.getElementById('container_bottom') || document.querySelector('.container_bottom');

if (container_bottom) {
  new NewSailQuote();
}
