<?php
session_start();
require("connect.php");
$lid = $_SESSION['uid'];
$query = "select * from tbl_login where id='$lid'";
$re = mysqli_query($con, $query);
$row = mysqli_fetch_array($re);
 if(isset($_POST['pass']) && $_POST['pass']!="") {
     if ($re) {
         if ($_POST['pass'] == $row['password']) {
            echo "<script>var v3=0;</script>";
         }
         else{
            echo "<span class='error'> &nbsp;&nbsp;Password does not match</span>
            <script>var v3=1;</script>";
         }
     }
 }
$con->close();
ob_end_flush();
?>
<html>

<head>
    <style>
        .error {
            font-weight: bold;
            font-family:cursive;
            font-size:12px;
            color:red;
        }
</style>
</head>
</body>
</html>