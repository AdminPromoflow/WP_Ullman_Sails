class NewSailQuote {
  constructor() {
    container_bottom.addEventListener('click', function(){
      // alert("hola, entramos");
      const sailType = "Sail & Canvas Cleaning";
      const title = "Sail & Canvas Cleaning";

      const url = `../New_Repair_Quote/index.php?sailType=${encodeURIComponent(sailType)}&title=${encodeURIComponent(title)}`;

      window.location.href = url;
    })
  }
}
const container_bottom = document.getElementById('container_bottom');
const newSailQuote = new NewSailQuote();
