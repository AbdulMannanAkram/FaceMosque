var address = 'Reichenhainer straße 51,09126 Chemnitz, Germany';
var latitude;
var longitude;
var map;

function navigateToAddress(){

  navigator.geolocation.getCurrentPosition(function (position) {
    var latitude1 = position.coords.latitude;
    var longitude1 = position.coords.longitude;
 

    L.marker([latitude1, longitude1]).addTo(map);

    map.setView([latitude1, longitude1], 14);

    var control = L.Routing.control({
      waypoints: [
        L.latLng(latitude, longitude),
        L.latLng(latitude1, longitude1)
      ],
      routeWhileDragging: true
    }).addTo(map);

    control.getPlan().setWaypoints([
      L.latLng(latitude, longitude),
      L.latLng(destinationLatitude, destinationLongitude)
    ]);
    control.route();
  


    

});
}

function submitForm(mosque_id) {
    // Get form element and form data
    
    console.log(mosque_id);
   

    document.cookie = "searching_mosque_id"+"="+mosque_id;
    window.location.href = "pages/mosque.html";

   
    // Send form data to server using Fetch API
    /*fetch("/action", {
      method: "POST",
      body: formData
    })
    .then(function(response) {
      // Handle response from server
      if (response.ok) {
        // Response is OK, do something with the response
        return response.text();
      } else {
        // Response is not OK, handle error
        throw new Error("Error: " + response.status);
      }
    })
    .then(function(data) {
      // Handle data received from server
      console.log("Received data from server:", data);
      // Redirect to a new page or update UI with the received data
    })
    .catch(function(error) {
      // Handle any errors that occurred during the request
      console.error(error);
    });*/
  }

  window.onload=async()=>{
    var time=new Date();
    var currentTime = time.getHours() + ":" + time.getMinutes();

  //var currentTime = new Date().toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'});
  console.log(currentTime);
  var fajerTime = document.getElementById("fajer").innerText;
  var sharouqTime = document.getElementById("sharouq").innerText;
  var dhuhrTime = document.getElementById("dhuhr").innerText;
  var asrTime = document.getElementById("asr").innerText;
  var magribTime = document.getElementById("magrib").innerText;
  var ishaTime = document.getElementById("isha").innerText;
  var fajerIqamahTime = addMinutes(fajerTime, 10);
  var dhuhrIqamahTime = addMinutes(dhuhrTime, 10);
  var asrIqamahTime = addMinutes(asrTime, 10);
  var magribIqamahTime = addMinutes(magribTime, 10);
  var ishaIqamahTime = addMinutes(ishaTime, 10);
   map = L.map('map').setView([51.505, -0.09], 13);
  L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);


fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(address)}`)
  .then(response => response.json())
  .then(data => {
    // Retrieve the first result's coordinates
    var result = data[0];
     latitude = parseFloat(result.lat);
     longitude = parseFloat(result.lon);

    // Add a marker to the map at the geocoded location
    var marker=L.marker([latitude, longitude]).addTo(map);
    map.panTo(marker.getLatLng());  // Pan the map to the marker's location

  });

var startHappyHourD = new Date();
startHappyHourD.setHours(00,00,0); 

  // Set the background color of the rows based on the current time
  /*if (currentTime >= fajerTime && currentTime < sharouqTime) {
    document.getElementById("fajer").parentNode.style.backgroundColor = "yellow";
  }
  if (currentTime >= dhuhrTime && currentTime < asrTime) {
    document.getElementById("dhuhr").parentNode.style.backgroundColor = "yellow";
  }
  if (currentTime >= asrTime && currentTime < magribTime) {
    document.getElementById("asr").parentNode.style.backgroundColor = "yellow";
  }
  if (currentTime >= magribTime && currentTime < ishaTime) {
    document.getElementById("magrib").parentNode.style.backgroundColor = "yellow";
  }
  if (currentTime >= ishaTime || currentTime < fajerTime) {
    document.getElementById("isha").parentNode.style.backgroundColor = "yellow";
  }*/
  

  // Set the background color of the rows with iqamah times
  if (currentTime >= fajerIqamahTime && currentTime < dhuhrTime) {
    document.getElementById("fajerIqamah").parentNode.style.backgroundColor = "limeGreen";
    document.getElementById("fajerIqamah").parentNode.style.color = "white";
    var timeleft=getTimeLeft(currentTime,dhuhrTime);
    document.getElementById("fajer").innerHTML += " (Next prayer in " + timeleft + ")";


    document.getElementById("ishaIqamah").parentNode.style.backgroundColor = "OrangeRed";
    document.getElementById("ishaIqamah").parentNode.style.color = "white";
  }
  if (currentTime >= dhuhrIqamahTime && currentTime < asrTime) {
    document.getElementById("dhuhrIqamah").parentNode.style.backgroundColor = "limeGreen";
    document.getElementById("dhuhrIqamah").parentNode.style.color = "white";
    var timeleft=getTimeLeft(currentTime,asrTime);
    document.getElementById("dhuhr").innerHTML += " (Next prayer in " + timeleft + ")";

    document.getElementById("fajerIqamah").parentNode.style.backgroundColor = "OrangeRed";
    document.getElementById("fajerIqamah").parentNode.style.color = "white";  }
  if (currentTime >= asrIqamahTime && currentTime < magribTime) {
    document.getElementById("asrIqamah").parentNode.style.backgroundColor = "limeGreen";
    document.getElementById("asrIqamah").parentNode.style.color = "white";
    var timeleft=getTimeLeft(currentTime,magribTime);

    document.getElementById("asr").innerHTML += " (Next prayer in " + timeleft + ")";

    document.getElementById("dhuhrIqamah").parentNode.style.backgroundColor = "OrangeRed";
    document.getElementById("dhuhrIqamah").parentNode.style.color = "white";
  }
  if (currentTime >= magribIqamahTime && currentTime < ishaTime) {
    document.getElementById("magribIqamah").parentNode.style.backgroundColor = "limeGreen";
    document.getElementById("magribIqamah").parentNode.style.color = "white";
    var timeleft=getTimeLeft(currentTime,ishaTime);

    document.getElementById("magrib").innerHTML += " (Next prayer in " + timeleft + ")";

    document.getElementById("asrIqamah").parentNode.style.backgroundColor = "OrangeRed";
    document.getElementById("asrIqamah").parentNode.style.color = "white";


  }
  if (currentTime >= ishaIqamahTime && currentTime  ) {
    document.getElementById("ishaIqamah").parentNode.style.backgroundColor = "limeGreen";
    document.getElementById("ishaIqamah").parentNode.style.color = "white";
    setInterval(e=>{
    var timeleft=getTimeLeft(currentTime,fajerTime);
    document.getElementById("isha").innerHTML = " (Next prayer in " + timeleft + ")";
    
    document.getElementById("magribIqamah").parentNode.style.backgroundColor = "OrangeRed";
    document.getElementById("magribIqamah").parentNode.style.color = "white";
    
  },1000);


  }

  // Helper function to add minutes to a time string (in format "hh:mm")
  function addMinutes(time, minutes) {
    var timeParts = time.split(":");
    var hours = parseInt(timeParts[0]);
    var minutes = parseInt(timeParts[1]);
    var totalMinutes = hours * 60 + minutes + minutes;
    var newHours = Math.floor(totalMinutes / 60);
    var newMinutes = totalMinutes % 60;
    return newHours + ":" + newMinutes;
  }
  function getTimeLeft(currentTime, prayerTime) {
    var currentDateTime = new Date();
    var timeDifference;
    const [hours, minutes] = prayerTime.split(':'); // Split the time string into hours and minutes

    const prayerDateTime = new Date(); // Create a new Date object

    prayerDateTime.setHours(hours); // Set the hours of the Date object
    prayerDateTime.setMinutes(minutes); // Set the minutes of the Date object

    if (!isNaN(Date.parse(currentTime))) {
      currentDateTime = new Date(currentTime);
    }
    
    /*if (!isNaN(Date.parse(prayerTime))) {
      prayerDateTime = new Date(prayerTime);
    }*/
    timeDifference = prayerDateTime-currentDateTime;
    
    if (timeDifference < 0) {
      prayerDateTime.setDate(prayerDateTime.getDate() + 1);
      timeDifference = prayerDateTime - currentDateTime;
    }
    
    var hoursLeft = Math.floor(timeDifference / 1000 / 60 / 60);
    var minutesLeft = Math.floor((timeDifference / 1000 / 60) % 60);
    // Format the time left as hh:mm
    var timeLeft = hoursLeft.toString().padStart(2, '0') + ':' + minutesLeft.toString().padStart(2, '0');

    return timeLeft;
  }
  
  

  }

