class NewSailQuote {
  constructor() {
    container_bottom.addEventListener('click', function(){
      // alert("hola, entramos");
      const sailType = "Wheel and Binnacle Cover"; //Sail Types, Racing Sails, The Axia Series, Cruising Sails
      const title = "Wheel and Binnacle Cover";

      const url = window.ullmanPageUrl("New_Cover_Quote", { sailType, title });

      window.location.href = url;
    })
  }
}
const container_bottom = document.getElementById('container_bottom') || document.querySelector('.container_bottom');

if (container_bottom) {
  new NewSailQuote();
}
