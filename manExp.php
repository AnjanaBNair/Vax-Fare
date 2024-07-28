 
    <div class="row">
    <div class="col-25">
      <label for="date">Manufacturing Date</label>
    </div>
    <div class="col-75">
      <input type="date" id="datepicker1" name="Sdate" max="<?php echo date('Y-m-d'); ?>" required/>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="date">Expiring Date</label>
    </div>
    <div class="col-75">
     <input type="date" id="datepicker2" name="Edate" max="<?php echo date('Y-m-d', strtotime('+6 months')); ?>" required/>
    </div>
  </div>
  <script>
// Get references to the input fields
var start = document.getElementById('datepicker1');
var end = document.getElementById('datepicker2');

// Listen for changes to the start date input field
start.addEventListener('change', function() {
  // Get the selected start date as a Date object
  var selectedStartDate = new Date(start.value);

  // Calculate the maximum end date as 6 months from the selected start date
  var maxEndDate = new Date(selectedStartDate);
  maxEndDate.setMonth(maxEndDate.getMonth() + 6);

  // Format the maximum end date as YYYY-MM-DD
  var maxEndDateString = maxEndDate.toISOString().slice(0, 10);

  // Set the max attribute of the end date input field to the maximum end date
  end.setAttribute('max', maxEndDateString);

  // Calculate the minimum start date as the selected start date
  var minStartDate = new Date(selectedStartDate);

  // Format the minimum start date as YYYY-MM-DD
  var minStartDateString = minStartDate.toISOString().slice(0, 10);

  // Set the min attribute of the end date input field to the minimum start date
  end.setAttribute('min', minStartDateString);
});

// Listen for changes to the end date input field
end.addEventListener('change', function() {
  // Get the selected end date as a Date object
  var selectedEndDate = new Date(end.value);

  // Calculate the minimum start date as the selected end date minus 6 months
  var minStartDate = new Date(selectedEndDate);
  minStartDate.setMonth(minStartDate.getMonth() - 6);

  // Format the minimum start date as YYYY-MM-DD
  var minStartDateString = minStartDate.toISOString().slice(0, 10);

  // Set the min attribute of the start date input field to the minimum start date
  start.setAttribute('min', minStartDateString);

  // Set the max attribute of the start date input field to the selected end date
  start.setAttribute('max', end.value);
});

// Set the default max attribute of the start date input field to today's date plus 6 months
var maxEndDate = new Date();
maxEndDate.setMonth(maxEndDate.getMonth() + 6);
var maxEndDateString = maxEndDate.toISOString().slice(0, 10);
end.setAttribute('max', maxEndDateString);
</script>


$Stdate=$_POST["Sdate"];
      $Eddate=$_POST["Edate"];
      $Sdate = date("Y-m-d", strtotime($Stdate));
      $Edate = date("Y-m-d", strtotime($Eddate));