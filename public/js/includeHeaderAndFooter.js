$(document).ready(function () {
  // Load and insert the header
  $("#header").load("../pages/header.html");

  // Load and insert the footer
  $("#footer").load("../pages/footer.html");
});
function deleteCookie(name) {
  document.cookie = name + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
}
