<?php
 require("connect.php");
 if(isset($_POST["sub"])){
    $a=$_POST["sub"];
    $qu="select * from tbl_city where dist_id='$a'";
    $r=mysqli_query($con,$qu);
    $count=mysqli_num_rows($r);
    if($count>0)
    {
        while ($row = mysqli_fetch_array($r)) {
            echo "<option name='city' value='".$row['city_id']."'>".$row['name']." </option>";
         }          
     }
    }
?>