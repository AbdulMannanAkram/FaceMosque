<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Facemosque</title>
    <script src="https://bossanova.uk/jspreadsheet/v4/jexcel.js"></script>
    <link
      rel="stylesheet"
      href="https://bossanova.uk/jspreadsheet/v4/jexcel.css"
      type="text/css"
    />
    <script src="https://jsuites.net/v4/jsuites.js"></script>
    <link
      rel="stylesheet"
      href="https://jsuites.net/v4/jsuites.css"
      type="text/css"
    />
    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;400;700&display=swap"
      rel="stylesheet"
    />
    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link href="../css/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/font-awesome.min.css" />
    <link href="../css/templatemo-festava-live.css" rel="stylesheet" />
    <link
      href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css"
      rel="stylesheet"
      type="text/css"
    />
    <script
      src="https://kit.fontawesome.com/0fa54d043b.js"
      crossorigin="anonymous"
    ></script>
    <link
      rel="stylesheet"
      href="https://bossanova.uk/jspreadsheet/v4/jexcel.css"
      type="text/css"
    />
    <script src="https://bossanova.uk/jspreadsheet/v4/jexcel.js"></script>
    <!-- jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  </head>

  <body>
    <!-- JAVASCRIPT FILES -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.sticky.js"></script>
    <script src="../js/click-scroll.js"></script>
    <script src="../js/custom.js"></script>
    <script src="../js/includeHeaderAndFooter.js"></script>
    <script src="../js/helpers.js"></script>

    <!-- Header -->
    <div id="header"></div>

    <br /><br /><br /><br />
    <di id="DisplayControl">
      <center>
        <h1 id="welcomeMessage">Welcome</h1>
      </center>

      <div class="control-panel">
        <div class="control-item">
          <div class="icon">
            <i class="fas fa-cog"></i>
          </div>
          <div class="text">Settings</div>
        </div>
        <div class="control-item" id="userProfileButton">
          <div class="icon">
            <i class="fas fa-user"></i>
          </div>
          <div class="text">Admin Profile</div>
        </div>
        <div class="control-item" id="prayerTimesButton">
          <div class="icon">
            <i class="fas fa-calendar"></i>
          </div>
          <div class="text">Prayer Times</div>
        </div>

        <!-- Add more control items as needed -->
      </div>
      <div id="prayerTimes"></div>
      <div id="userProfile"></div>
    </di>

    <!-- Footer -->
    <div id="footer"></div>
    <!-- Moved the closing body and html tags to the end -->
    <script>
      var ControlPanelDisplay = document.querySelector("#DisplayControl");
      //$("#prayerTimes").load("databaseEditor.blade.php");

      $(document).ready(function () {
        // Initially hide the content
        $("#prayerTimes").hide();
        $("#userProfile").hide();
        $("#userProfileButton").click(function () {
          $("#userProfile").toggle(); // Toggle visibility of the content

          // Load content when showing
          if ($("#userProfile").is(":visible")) {
            $("#userProfile").load("userProfile.html");
            $("#prayerTimes").hide();
          }
        });
        // Toggle button click event
        $("#prayerTimesButton").click(function () {
          $("#prayerTimes").toggle(); // Toggle visibility of the content

          // Load content when showing
          if ($("#prayerTimes").is(":visible")) {
            $("#prayerTimes").load("databaseEditor.html");
            $("#userProfile").hide();
          }
        });
      });

      // Function to read user data from a cookie
      function readUserDataFromCookie() {
        var cookieValue = getCookie("userData");
        if (cookieValue) {
          try {
            // Parse the JSON data from the cookie
            var userData = JSON.parse(decodeURIComponent(cookieValue));
            return userData;
          } catch (error) {
            console.error("Error parsing user data from cookie:", error);
            return null;
          }
        } else {
          console.log("No user data found in the cookie.");

          document.getElementById("DisplayControl").style.visibility = "hidden";
          return null;
        }
      }

      var userData = readUserDataFromCookie();
      var logoutButtonContainer = document.getElementById("logoutButton");

      if (userData) {
        if (ControlPanelDisplay) {
          document.getElementById("DisplayControl").style.visibility = "show";
        }

        var myH1 = document.getElementById("welcomeMessage");

        // Continue with your logic here, e.g., showing/hiding elements
        // Append the logout button to an element with the id 'logoutButtonContainer'
        //var logoutButtonContainer = document.getElementById("logoutButton");
        if (logoutButtonContainer) {
          logoutButtonContainer.style.display = "block";
        }

        myH1.textContent = "Welcome, " + userData.usernameData + "!";
      } else {
        if (ControlPanelDisplay) {
          document.getElementById("DisplayControl").style.visibility = "hidden";
        }
      }
    </script>
  </body>
</html>
