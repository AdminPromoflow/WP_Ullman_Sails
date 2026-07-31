class NewSailQuote {
  constructor() {
    container_bottom.addEventListener('click', function(){
      // alert("hola, entramos");
      const sailType = "Expert Sail Repair Services for Optimal Performance";
      const title = "Expert Sail Repair Services for Optimal Performance";

      const url = window.ullmanPageUrl("New_Repair_Quote", { sailType, title });

      window.location.href = url;
    })
  }
}
const container_bottom = document.getElementById('container_bottom');
const newSailQuote = new NewSailQuote();
