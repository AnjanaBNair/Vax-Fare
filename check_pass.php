<?php
session_start();
require("connect.php");
$lid = $_SESSION['uid'];
$query = "select * from tbl_login where lid='$lid' and status='1'";
$re = mysqli_query($con, $query);
$row = mysqli_fetch_array($re);
 if(isset($_POST['pass']) && $_POST['pass']!="") {
     if ($re) {
         if ($_POST['pass'] == $row['password']) {
            echo "<script>var v7=0;</script>";
         }
         else{
            echo "<span class='error'> &nbsp;&nbsp;Password does not match</span>
            <script>var v7=1;</script>";
         }
     }
 }
$con->close();
ob_end_flush();
