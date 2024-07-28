<!DOCTYPE html>
<html>
<head>
  <title>Remaining Day Countdown</title>
  <style>
    #countdown {
      position: relative;
      width: 150px;
      height: 150px;
      margin: 0 auto;
    }
    #countdown .outer-circle {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      border-radius: 50%;
      background-color: #ccc;
    }
    #countdown .inner-circle {
      position: absolute;
      top: 5%;
      left: 5%;
      width: 90%;
      height: 90%;
      border-radius: 50%;
      background-color: #fff;
      text-align: center;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
    }
    #countdown .inner-circle h2 {
      font-size: 30px;
      margin: 0;
    }
    #countdown .inner-circle p {
      font-size: 14px;
      margin: 0;
    }
  </style>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      // Get the input start date from the user
      var inputStartDate = prompt("Enter a start date (mm/dd/yyyy):");
      
      // Parse the input start date to a Date object
      var startDate = new Date(inputStartDate);

      // Calculate the date 15 days after the input start date
      var countDownDate = new Date(startDate.setDate(startDate.getDate() + 15)).getTime();

      // Update the countdown every second
      setInterval(function() {
        // Get the current date and time
        var now = new Date().getTime();

        // Calculate the remaining time in milliseconds
        var distance = countDownDate - now;

        // Calculate the remaining days
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));

        // Update the countdown element with the remaining days
        $("#countdown .inner-circle h2").html(days);
      }, 1000);
    });
  </script>
</head>
<body>
  <div id="countdown">
    <div class="outer-circle"></div>
    <div class="inner-circle">
      <h2></h2>
      <p>Days Remaining</p>
    </div>
  </div>
</body>
</html>
