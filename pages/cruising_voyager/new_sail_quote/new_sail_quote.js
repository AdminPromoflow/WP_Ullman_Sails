class NewSailQuote {
  constructor() {
    container_bottom.addEventListener('click', function(){
      // alert("hola, entramos");
      const sailType = "Voyager Series";
      const title = "Voyager Series";

      const url = `../New_Sail_Quote/index.php?sailType=${encodeURIComponent(sailType)}&title=${encodeURIComponent(title)}`;

      window.location.href = url;
    })
  }
}
const container_bottom = document.getElementById('container_bottom');
const newSailQuote = new NewSailQuote();
