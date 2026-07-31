class NewSailQuote {
  constructor() {
    container_bottom.addEventListener('click', function(){
      // alert("hola, entramos");
      const sailType = "The Axia Series"; //Sail Types, Racing Sails, The Axia Series, Cruising Sails
      const title = "The Axia Series";

      const url = window.ullmanPageUrl("New_Sail_Quote", { sailType, title });

      window.location.href = url;
    })
  }
}
const container_bottom = document.getElementById('container_bottom');
const newSailQuote = new NewSailQuote();
