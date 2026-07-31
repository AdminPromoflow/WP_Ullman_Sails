class NewSailQuote {
  constructor() {
    container_bottom.addEventListener('click', function(){
      // alert("hola, entramos");
      const sailType = "Sail Types"; //Sail Types, Racing Sails, The Axia Series, Cruising Sails
      const title = "Sail Types";

      const url = window.ullmanPageUrl("New_Sail_Quote", { sailType, title });

      window.location.href = url;
    })
  }
}
const container_bottom = document.getElementById('container_bottom');
const newSailQuote = new NewSailQuote();
