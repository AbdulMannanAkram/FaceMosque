<style>
  /* Styles for the control panel */
  .control-panel {
    display: flex;
    justify-content: space-between;
  }

  .control-item {
    cursor: pointer;
    text-align: center;
  }

  /* Styles for the pop-up window */
  .popup {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
    justify-content: center;
    align-items: center;
    z-index: 1;
  }

  .popup-content {
    background-color: white;
    padding: 20px;
    border-radius: 5px;
  }


</style>
<center>
    <div id="popupNotification" class="popup1">
        <span id="popupMessage">Notification message goes here</span>
        <span class="close-popup" onclick="closePopup()">&times;</span>
      </div>

  <div
    class="modal fade"
    id="prayerTimeGeneratorModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="prayerTimeGeneratorModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="prayerTimeGeneratorModalLabel">
            Prayer Time Generator
          </h5>
          <button
            type="button"
            class="close"
            data-dismiss="modal"
            aria-label="Close"
          >
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <label for="startDate">Start Date:</label>
          <input
            type="date"
            id="startDate"
            data-date-format="DD MMMM YYYY"
          /><br /><br />
          <label for="endDate">End Date:</label>
          <input
            type="date"
            id="endDate"
            data-date-format="DD MMMM YYYY"
          /><br /><br />

          <!-- Add your time and label inputs here -->
          <label for="fajrTime">Fajr iqamah after:</label>
          <input type="text" id="fajrTime" /><br /><br />

          <label for="dhuhrTime">Dhuhr iqamah after:</label>
          <input type="text" id="dhuhrTime" /><br /><br />

          <label for="asrTime">Asr iqamah after:</label>
          <input type="text" id="asrTime" /><br /><br />

          <label for="maghribTime">Maghrib iqamah after:</label>
          <input type="text" id="maghribTime" /><br /><br />

          <label for="ishaTime">Isha iqamah after:</label>
          <input type="text" id="ishaTime" /><br /><br />

          <label for="fridayPrayer1">Friday Prayer 1:</label>
          <input type="text" id="fridayPrayer1" /><br /><br />

          <label for="fridayPrayer2">Friday Prayer 2:</label>
          <input type="text" id="fridayPrayer2" /><br /><br />
        </div>
        <div class="modal-footer">
          <button
            type="button"
            class="btn btn-primary"
            onclick="generatePrayerTimes()"
          >
            Generate
          </button>
          <button
            type="button"
            onclick="closePrayerTimeGenerator()"
            class="btn btn-secondary"
            data-dismiss="modal"
          >
            Close
          </button>
        </div>
      </div>
    </div>
  </div>

  <div class="control-panel">
    <div class="control-item" onclick="saveData()">
      <div class="icon">
        <i class="fas fa-cog"></i>
      </div>
      <div class="text">Save</div>
    </div>

    <div
      class="control-item"
      onclick='$("#prayerTimeGeneratorModal").modal("show");'
    >
      <div class="icon">
        <i class="fas fa-cog"></i>
      </div>
      <div class="text">Generator</div>
    </div>
  </div>
  <div id="spreadsheet3"></div>
  <script>
    function openGeneratorPopup() {
      document.getElementById("generatorPopup").style.display = "block";
    }
    function closePrayerTimeGenerator() {
      $("#prayerTimeGeneratorModal").modal("hide");
    }
    // Define the API URL
    var mosqueData = JSON.parse(decodeURIComponent(getCookie("userData")));
    var mosqueId = mosqueData.responseData.mosque_id;
    var apiUrl =
      "https://facemosque.com/api/api.php?client=app&cmd=gettingTimesTable&mosque_id=" +
      mosqueId +
      "";
    var spreadsheet;
    // Fetch data from the API
    fetch(apiUrl)
      .then((response) => response.json())
      .then((data) => {
        // Initialize jspreadsheet
        spreadsheet = jspreadsheet(document.getElementById("spreadsheet3"), {
          data: data,
          columns: [
            {
              type: "text",
              width: "100",
              name: "date",
              title: "Date",
            },
            {
              type: "text",
              width: "100",
              name: "fajer",
              title: "Fajer",
            },
            {
              type: "text",
              width: "100",
              name: "fajer_i",
              title: "Fajer Iqamah",
            },
            {
              type: "text",
              width: "100",
              name: "sharouq",
              title: "Sharouq",
            },
            {
              type: "text",
              width: "100",
              name: "dhuhr",
              title: "Dhuhr",
            },
            {
              type: "text",
              width: "100",
              name: "dhuhr_i",
              title: "Dhuhr Iqamah",
            },
            {
              type: "text",
              width: "100",
              name: "asr",
              title: "Asr",
            },
            {
              type: "text",
              width: "100",
              name: "asr_i",
              title: "Asr iqamah",
            },
            {
              type: "text",
              width: "100",
              name: "magrib",
              title: "Magrib",
            },
            {
              type: "text",
              width: "100",
              name: "magrib_i",
              title: "Magrib iqamah",
            },
            {
              type: "text",
              width: "100",
              name: "isha",
              title: "Isha ",
            },
            {
              type: "text",
              width: "100",
              name: "isha_i",
              title: "Isha iqamah",
            },
            {
              type: "text",
              width: "100",
              name: "friday_1",
              title: "Friday 1",
            },
            {
              type: "text",
              width: "100",
              name: "friday_2",
              title: "Friday 2",
            },
          ],
          minDimensions: [14, 2],
        });
      })
      .catch((error) => {
        console.error("Error fetching data:", error);
      });

    function generatePrayerTimes() {
      const startDate = document.getElementById("startDate").value;
      const endDate = document.getElementById("endDate").value;
      // Retrieve the input values from the modal
      const fajrIqamah = parseInt(
        document.getElementById("fajrTime").value,
        10
      ); // Convert to minutes
      const dhuhrIqamah = parseInt(
        document.getElementById("dhuhrTime").value,
        10
      ); // Convert to minutes
      const asrIqamah = parseInt(document.getElementById("asrTime").value, 10); // Convert to minutes
      const maghribIqamah = parseInt(
        document.getElementById("maghribTime").value,
        10
      ); // Convert to minutes
      const ishaIqamah = parseInt(
        document.getElementById("ishaTime").value,
        10
      ); // Convert to minutes
      const fridayPrayer1 = parseInt(
        document.getElementById("fridayPrayer1").value,
        10
      ); // Convert to minutes
      const fridayPrayer2 = parseInt(
        document.getElementById("fridayPrayer2").value,
        10
      ); // Convert to minutes
      const currentDate = new Date(startDate);
      const endDateObj = new Date(endDate);
      while (currentDate <= endDateObj) {
        const formattedDate = currentDate.toISOString().slice(0, 10);

        // Check if the formattedDate exists in the "date" column of the spreadsheet
        const dateColumnIndex = 0; // Adjust this index to match the "date" column in your spreadsheet
        const rowIndex = findRowIndexByValue(
          spreadsheet,
          dateColumnIndex,
          formattedDate
        );

        if (rowIndex !== -1) {
          // Date found in the "date" column, update the corresponding cell
          const Prayerscols = [1, 4, 6, 8, 10, 12, 13];
          const Iqamahscols = [2, 5, 7, 9, 11, 12, 13];

          var iqamah = [
            fajrIqamah,
            dhuhrIqamah,
            asrIqamah,
            maghribIqamah,
            ishaIqamah,
          ];
          for (let index = 0; index < Iqamahscols.length; index++) {
            const element = Iqamahscols[index];
            const oldValue = spreadsheet.getValueFromCoords(Prayerscols[index], rowIndex);
            const inputTimeParts = oldValue.split(":");
            const hours = parseInt(inputTimeParts[0], 10);
            const minutes = parseInt(inputTimeParts[1], 10);

            const totalMinutes = (hours * 60) + minutes;

            // Add 15 minutes
            const newTotalMinutes = totalMinutes + iqamah[index];

            // Calculate the new hours and minutes
            const newHours = Math.floor(newTotalMinutes / 60);
            const newMinutes = newTotalMinutes % 60;

            // Format the new time as "HH:mm" in text format
            const newTimeText = `${newHours
              .toString()
              .padStart(2, "0")}:${newMinutes.toString().padStart(2, "0")}`;

            // Update the cell in the specified column and row
              spreadsheet.setValueFromCoords(element, rowIndex, newTimeText)
            
          }
        } else {
          // Date not found in the "date" column, handle the error (e.g., display a message)
          console.log(`Date ${formattedDate} not found in the spreadsheet.`);
        }

        // Move to the next day
        currentDate.setDate(currentDate.getDate() + 1);
      }
    }

    // Function to find the row index in the "date" column by value
    function findRowIndexByValue(spreadsheet, columnIndex, value) {
      for (let rowIndex = 0; rowIndex < spreadsheet.rows.length; rowIndex++) {
        if (spreadsheet.getValueFromCoords(columnIndex, rowIndex) === value) {
          return rowIndex;
        }
      }
      return -1; // Value not found
    }

    
    function saveData() {
  var data = spreadsheet.getData();
  var jsonData = JSON.stringify(data);

  var url = "https://facemosque.com/api/api.php?client=app&cmd=insert_database";
  var params = "data=" + jsonData + "&mosqueId=" + mosqueId;

  fetch(url, {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: params, // Use the 'params' string as the request body
  })
    .then(function (response) {
      if (response.status === 200) {
        showPopup("Data saved successfully!", 'success');
      } else {
        showPopup("Error saving data. Status code: " + response.status, 'error');
      }
    })
    .catch(function (error) {
      showPopup("An error occurred: " + error.message, 'error');
    });
}


function closePopup() {
  const popupNotification = document.getElementById('popupNotification');
  popupNotification.style.display = 'none';
}

  </script>
</center>
