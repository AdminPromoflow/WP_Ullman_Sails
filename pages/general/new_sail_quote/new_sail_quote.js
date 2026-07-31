document.addEventListener("DOMContentLoaded", function () {
  const quoteButtons = document.querySelectorAll(".js_quote_button");
  const quoteUrl = window.ullmanPageUrl?.("New_Sail_Quote");

  if (!quoteUrl) return;

  quoteButtons.forEach((button) => {
    button.setAttribute("href", quoteUrl);
  });
});
