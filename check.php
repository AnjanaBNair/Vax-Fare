<?php
 require("connect.php");
 if(isset($_POST['mail']) && $_POST['mail']!="") 
 {
     if ($stmt = $con->prepare("SELECT username FROM tbl_login WHERE username = ?"))
		 {
         $stmt->bind_param('s', $_POST['mail']);
         $stmt->execute();
         $stmt->store_result();
         $numRows = $stmt->num_rows;
         if ($numRows > 0) 
		 {
            echo "<span id='availability'> Username Not Available.</span>
            <script>var v5=1;</script>";
         }
        
     }
 }

 if(isset($_POST['email']) && $_POST['email']!="") 
 {
     if ($stmt = $con->prepare("SELECT email FROM tbl_booking WHERE email = ?"))
		 {
         $stmt->bind_param('s', $_POST['email']);
         $stmt->execute();
         $stmt->store_result();
         $numRows = $stmt->num_rows;
         if ($numRows > 0) 
		 {
            echo "<span id='availability'> Username Not Available.</span>
            <script>var v5=1;</script>";
         }
        
     }
 }
$con->close();