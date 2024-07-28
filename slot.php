<?php
// Set the start and end times
$start_time = '09:00 AM';
$end_time = '06:00 PM';

// Define the interval time in minutes
$interval = 120;

// Convert start and end times to timestamps
$start_timestamp = strtotime($start_time);
$end_timestamp = strtotime($end_time);

?>

<!-- HTML -->
<div id="button-container">
  <?php
  // Loop through the times and create buttons
  for ($i = $start_timestamp; $i < $end_timestamp; $i += $interval*60) {
    // Exclude times between 1pm and 2pm
    if (date('h:i A', $i) >= '01:00 PM' && date('h:i A', $i) < '02:00 PM') {
      continue;
    }
    $time = date('h:i A', $i);
    echo '<button>' . $time . '</button>';
  }
  ?>
</div>

<!-- Include jQuery and jQuery UI libraries -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/smoothness/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>

<!-- HTML -->
<label for="start-date">Start Date:</label>
<input type="text" id="start-date" name="start-date">

<label for="end-date">End Date:</label>
<input type="text" id="end-date" name="end-date">

<!-- JavaScript -->
<script>
  // Set default date format
  $.datepicker.setDefaults({
    dateFormat: 'yy-mm-dd'
  });

  // Initialize datepicker for start date
  $('#start-date').datepicker({
    minDate: 0, // Set minimum date to today
    onSelect: function(selectedDate) {
      // Set minimum date for end date to be the selected start date
      $('#end-date').datepicker('option', 'minDate', selectedDate);
    }
  });

  // Initialize datepicker for end date
  $('#end-date').datepicker({
    minDate: 0, // Set minimum date to today
    onSelect: function(selectedDate) {
      // Set maximum date for start date to be the selected end date
      $('#start-date').datepicker('option', 'maxDate', selectedDate);
    }
  
  
  });
// set start and end dates
var startDate = new Date("2023-03-27");
var endDate = new Date("2023-04-02");

// get calendar container element
var calendar = $("#calendar");

// loop through days between start and end dates
for (var date = startDate; date <= endDate; date.setDate(date.getDate() + 1)) {
  // create HTML element for each day
  var dayElement = $("<div class='day'>" + date.getDate() + " " + getMonthName(date) + "</div>");
  calendar.append(dayElement);
}

// function to get month name from date object
function getMonthName(date) {
  var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
  return monthNames[date.getMonth()];
}


</script>

<!DOCTYPE html>
<html>
  <head>
    <title>Start and End Date/Time Picker with Validation</title>
  </head>
  <body>
    <label for="startdatetime">Choose a start date and time:</label>
    <input type="datetime-local" id="startdatetime" min="" required>
    
    <label for="enddatetime">Choose an end date and time:</label>
    <input type="datetime-local" id="enddatetime" min="" required>
    <span id="enddate-error" style="color: red;"></span>
    
    <button onclick="submitDateTime()">Submit</button>
   

    <script>
      function submitDateTime() {
        const startInput = document.getElementById("startdatetime");
        const endInput = document.getElementById("enddatetime");
        const startDateTime = new Date(startInput.value);
        const endDateTime = new Date(endInput.value);
        
        if (endDateTime <= startDateTime) {
          alert("End date and time must be after start date and time.");
          return;
        }
        
        const minStartDateTime = new Date();
        minStartDateTime.setDate(minStartDateTime.getDate() + 1);
        minStartDateTime.setHours(0, 0, 0, 0);
        
        if (startDateTime < minStartDateTime) {
          alert("Start date and time must be at least tomorrow.");
          return;
        }
        
        const minEndDateTime = new Date(startDateTime);
        minEndDateTime.setDate(minEndDateTime.getDate() + 1);
        minEndDateTime.setHours(0, 0, 0, 0);
        
        if (endDateTime < minEndDateTime) {
          const enddateError = document.getElementById("enddate-error");
          enddateError.textContent = "End date must be after start date and at least tomorrow.";
          return;
        }
        
        console.log("Selected start date and time:", startDateTime);
        console.log("Selected end date and time:", endDateTime);
        // do something with startDateTime and endDateTime
      }
      
      const startInput = document.getElementById("startdatetime");
      const endInput = document.getElementById("enddatetime");
      const minStartDateTime = new Date();
      minStartDateTime.setDate(minStartDateTime.getDate() + 1);
      minStartDateTime.setHours(0, 0, 0, 0);
      startInput.min = minStartDateTime.toISOString().split(".")[0];
      endInput.min = minStartDateTime.toISOString().split(".")[0];
    </script>
  </body>
</html>
