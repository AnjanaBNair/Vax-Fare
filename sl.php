<html>
<head>

    <script>
// get the start and end date values from the first two date pickers
var startDate = new Date(document.getElementById("start-date-picker").value);
var endDate = new Date(document.getElementById("end-date-picker").value);

// get the third date picker field
var datePickerField = document.getElementById("third-date-picker");

// disable all dates except those within the selected range
for (var i = 0; i < datePickerField.length; i++) {
  var date = new Date(datePickerField[i].value);
  if (date < startDate || date > endDate) {
    datePickerField[i].disabled = true;
  } else {
    datePickerField[i].disabled = false;
  }
}


        </script>
</head>
<body>
<label for="start">Start date:</label>
<input type="date" id="start" name="start">

<label for="end">End date:</label>
<input type="date" id="end" name="end">

<label for="selectDate">Select a date:</label>
<input type="date" id="selectDate" name="selectDate">
</body>
</html>