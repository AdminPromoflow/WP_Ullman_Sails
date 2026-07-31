class NewSailQuote {
  constructor() {
    container_bottom.addEventListener('click', function(){
      // alert("hola, entramos");
      const sailType = "Custom Spinnaker Graphics";
      const title = "Custom Spinnaker Graphics";

      const url = window.ullmanPageUrl("New_Sail_Quote", { sailType, title });

      window.location.href = url;
    })
  }
}
const container_bottom = document.getElementById('container_bottom') || document.querySelector('.container_bottom');

if (container_bottom) {
  new NewSailQuote();
}
