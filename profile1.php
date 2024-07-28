<?php 
    session_start();
    require("connect.php");
	if(isset($_SESSION['uid']))
	{
		    $lid = $_SESSION['uid'];
	
			$query="select * from tbl_user where lid='$lid';";
			$re=mysqli_query($con,$query);
			$row=mysqli_fetch_array($re);
if(isset($_POST["sub"]))
	{
		$fna=$_POST["fname"];
		$lna=$_POST["lname"];
		$mb=$_POST["mob"];
				
		$con=mysqli_connect("localhost","root","","vax_fare");
		$q="update tbl_user set fname='$fna',lname='$lna',mobileno='$mb' where lid='$lid'";
		$res=mysqli_query($con,$q);
		
			 if($res)
			 {
				 ?>
				   <script>
				      alert('Profile Updated Successfully');
					</script> 
					<?php
			 }
			header('Location: demo.php');
		}
		mysqli_close($con);
	}  
	?>

<!DOCTYPE html>
  <head>
    <title> VAX-FARE</title>
	<link rel="icon" href="vax.png" />	
  
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <style>
  *{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins" , sans-serif;
}
body{
 background:#fff;
  background-size: 1800px 700px;
align-items: center;
background-repeat: no-repeat;
}
.container{
   margin:100px;
  width: 628px;
  background: #0A2558;
  border-radius: 6px;
  margin-top:80px;
  margin-bottom:20px;
  margin-left:400px;
  padding: 82px 65px 30px 40px;
  box-shadow: -10px 10px 10px 10px rgba(0, 0, 0, 0.7);
}
.container .content{
  display: flex;
  align-items: center;

}
.container .content .right-side{
  width: 75%;
  margin-left: 75px;
}
.content .right-side .topic-text{
  font-size: 23px;
  font-weight: 600;
  margin-top:-50px;
  color: white;
}
.right-side .input-box{
  height: 50px;
  width: 100%;
  margin: 20px 0;
}
.right-side .input-box input,
.right-side .input-box textarea{
  height: 100%;
  width: 100%;
  border: none;
  outline: none;
  font-size: 16px;
  background: #DDD1F8;
  border-radius: 6px;
  padding: 0 15px;
}
.right-side .message-box{
  min-height: 110px;
}
.right-side .input-box textarea{
  padding-top: 6px;
}
.right-side .button{
  display: inline-block;
  margin-top: 5px;
}

 .btn {
			background-color: blue;
			color: white;
			border: 6px;
			padding: 5px;
			padding-right:160px;
			padding-left:160px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 20px;
			margin: 4px 4px;
			cursor: pointer;
			border-radius: 25px;
			width: 100%;
		}
		.register{
		 color:white;
		 padding-top:10px;
		 padding-left:110px;
		 font-size:12px;
		}
a{
color:white;
}
  
  #availability{
	color:red;
	font-family:cursive; 
	font-size:12px;
}
</style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
	var v1=0;
	var v2=0;
	var v3=0;
	var v4=0;
	var v5=0;
	var v6=0;
        $(document).ready(function () {
            $("#error1").hide();
            $("#error2").hide();
            $("#error3").hide();
			$("#error4").hide();
			$("#error5").hide();
			$("#error6").hide();
			$("#error7").hide();
			$("#exist").hide();
			
			
            var fname = /^[a-zA-Z\s]*$/;
            $("#p1").keyup(function () {
                x = document.getElementById("p1").value;
                if (fname.test(x) == false) {
                     v1 = 1;
                    $("#error1").show();
                }
                else if (fname.test(x) == true) {
                   v1 = 0;
                    $("#error1").hide();
                }
            });
			
			 var lname = /^[a-zA-Z\s]*$/;
            $("#p2").keyup(function () {
                x = document.getElementById("p2").value;
                if (lname.test(x) == false) {
                     v2 = 1;
                    $("#error2").show();
                }
                else if (lname.test(x) == true) {
                   v2 = 0;
                    $("#error2").hide();
                }
            });	
			var phoneno = /^[7-9][0-9]{9}$/;
			$("#p4").keyup(function () {
                x = document.getElementById("p4").value;
                if (phoneno.test(x) == false) {
                    v4 = 1
                    $("#error4").show();
                }
                else if (phoneno.test(x) == true) {
                   v4 = 0
                    $("#error4").hide();
                }
            });
			
			
            $("#btn").click(function () {
                if (v1==0 && v2==0 && v4==0)
                    $("#error6").hide();
                else
				{
                   alert('Please Fill The Form Correctly');
					return false;
					}
            });
		
        }); 
        
    </script>
   </head>
<body>

  <div class="container">
    <div class="content">
      <div class="right-side">
        <div class="topic-text">Update Profile</div><br>
      <form id="form" method="post">
	  <div>
	     <div class="input-box">
          <input type="text" placeholder="Enter First Name" value="<?php echo $row['fname'];?>" name="fname" id="p1" required/>
		  <p id="error1"><b style='font-family:cursive; font-size:12px; color:red;'> &nbsp;&nbsp;Enter Valid Name </p><br>
        </div>
		  <div class="input-box">
          <input type="text" placeholder="Enter Last Name" value="<?php echo $row['lname'];?> " name="lname" id="p2" required/>
		  <p id="error2"><b style='font-family:cursive; font-size:12px; color:red;'> &nbsp;&nbsp;Enter Valid Name </p><br>
        </div>
			<div class="input-box">
          <input type="text" placeholder="Enter Mobile Number" value="<?php echo $row['mobileno'];?>" name="mob" id="p4" required/>
		  <p id="error4"><b style='font-family:cursive; font-size:12px; color:red;'> &nbsp;&nbsp;Enter Valid Mobile Number</p><br>
        </div> 
		  <div class="button">
          <button class="btn" name="sub">submit</button>
        </div>
		
		</div>
	  </form>
    </div>
    </div>
  </div>
</body>

</html>


