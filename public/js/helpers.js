function getCookie(name) {
  var nameEQ = name + "=";
  var ca = document.cookie.split(";");
  for (var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) === " ") c = c.substring(1, c.length);
    if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
  }
  return null;
}
function showPopup(message, type) {
  const popupNotification = document.getElementById("popupNotification");
  const popupMessage = document.getElementById("popupMessage");

  popupMessage.textContent = message;

  if (type === "success") {
    popupNotification.style.backgroundColor = "green"; // Success color
  } else if (type === "error") {
    popupNotification.style.backgroundColor = "red"; // Error color
  }

  popupNotification.style.display = "block";

  // Automatically hide the popup after a few seconds (adjust the delay as needed)
  setTimeout(() => {
    popupNotification.style.display = "none";
  }, 3000); // 3 seconds
}
