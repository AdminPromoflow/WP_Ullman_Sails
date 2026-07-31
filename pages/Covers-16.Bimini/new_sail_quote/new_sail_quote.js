class NewSailQuote {
  constructor() {
    container_bottom.addEventListener('click', function(){
      // alert("hola, entramos");
      const sailType = "Bimini Sunshade"; //Sail Types, Racing Sails, The Axia Series, Cruising Sails
      const title = "Bimini Sunshade";

      const url = window.ullmanPageUrl("New_Cover_Quote", { sailType, title });

      window.location.href = url;
    })
  }
}
const container_bottom = document.getElementById('container_bottom');
const newSailQuote = new NewSailQuote();
