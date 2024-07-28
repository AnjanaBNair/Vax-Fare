<?php
  session_start();
  $centreId = $_GET['centre_id'];
  $selectedDate = $_GET['selected_date'];
  $qry = "SELECT COUNT(*) FROM tbl_schedule WHERE centre='$centreId' AND date='$selectedDate'";
  $res = mysqli_query($con, $qry);
  $row = mysqli_fetch_array($res);
  echo $row[0];
?>