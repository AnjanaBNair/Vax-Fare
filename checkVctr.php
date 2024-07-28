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
            echo "<span id='availability'> Already Existed.</span>
            <script>var v5=1;</script>";
         }
        
     }
 }
$con->close();