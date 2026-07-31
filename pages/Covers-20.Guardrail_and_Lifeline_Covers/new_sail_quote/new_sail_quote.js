class NewSailQuote {
  constructor() {
    container_bottom.addEventListener('click', function(){
      // alert("hola, entramos");
      const sailType = "Guardrail & Lifeline Covers"; //Sail Types, Racing Sails, The Axia Series, Cruising Sails
      const title = "Guardrail & Lifeline Covers";

      const url = `../New_Cover_Quote/index.php?sailType=${encodeURIComponent(sailType)}&title=${encodeURIComponent(title)}`;

      window.location.href = url;
    })
  }
}
const container_bottom = document.getElementById('container_bottom');
const newSailQuote = new NewSailQuote();
