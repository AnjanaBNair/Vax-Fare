  <?php 
    session_start();
    require("connect.php");
    $error_message = "";
	if(isset($_POST["sub"]))
	{

		$un=$_POST["name"];
		$ps=$_POST["pass1"];
		$query="select * from tbl_login where username='$un' and password like '$ps' and status=1";
		$re=mysqli_query($con,$query);
		$row=mysqli_fetch_array($re);

    $query1="SELECT * 
    FROM tbl_vaccinator v 
    JOIN tbl_login l ON v.lid = l.id 
    WHERE v.role = 1 AND v.status = 1 AND l.username = '$un' AND l.password LIKE '$ps' AND l.status = 2;";
		$re1=mysqli_query($con,$query1);
		$row1=mysqli_fetch_array($re1);

    $query2="select * from tbl_login where username='$un' and password like '$ps' and status=3";
		$re2=mysqli_query($con,$query2);
		$row2=mysqli_fetch_array($re2);

		$count=mysqli_num_rows($re);
    $count1=mysqli_num_rows($re1);
    $count2=mysqli_num_rows($re2);


		if($count>0)
		{
				$id=$row['id'];
				$_SESSION['uid']=$id;
				header('Location: demo.php');
				
		}
     else if($count2>0)
		{
				$id=$row2['id'];
				$_SESSION['uid']=$id;
				header('Location: admin.php');
				
		}
    else if($count1>0)
		{
				$id=$row1['id'];
				$_SESSION['uid']=$id;
				header('Location: vctr.php');
      }
  
else {
                $error_message = " *Invalid username or password.*";
            }
	}
?>
<!DOCTYPE html>
 <head>
    <title> VAX-FARE</title>
	<link rel="icon" href="vax.png" />		
  <style>
  *{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins" , sans-serif;
}
body{
 background: #74C0F2;
  background-size: 1400px 700px;
align-items: center;
background-repeat: no-repeat;
}
.container{
   margin:100px;
  width: 830px;
  background:#fff;
  border-radius: 6px;
  margin-top:80px;
  margin-left:300px;
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
  color: Blue;
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
  margin-top: 12px;
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
		 color:blue;
		 padding-top:10px;
		 padding-left:110px;
		 font-size:12px;
		}
a{
color:blue;
}
#error_message
{
  font-family:cursive; 
font-size:20px; 
color:red;
}
#img
{
  border-radius:50%;
}
@keyframes flip {
  from {
    transform: scaleX(1);
  }
  to {
    transform: scaleX(-1);
  }
}

/* Apply the animation to the image */
#img {
  animation: flip 1s ease-in-out 5s forwards;
}
  </style>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  

   </head>
<body>

  <div class="container">
    <div class="content">
    <img id="img" src="family.png" height="400px" width="300px" />
      <div class="right-side">
      
      <div id="error_message"> <?php echo $error_message; ?> </div>  <br>
        <div class="topic-text">LOGIN</div><br>
      <form id="form"  method="post"> 
        <div class="input-box">
          <input type="text" placeholder="Enter Email " name="name" id="p1" required/>
        </div>
        <div class="input-box">
         <input type="password" placeholder="Enter Password" name="pass1" id="p2" required/>
        </div>
		 <div class="button">
          <button class="btn" name="sub">Submit</button>
        </div>
		<div class="register">
		I Have No Account.&nbsp;&nbsp;<a href="reg1.php">Sign In </a>
		</div><br>
    <div class="register">
		&nbsp;&nbsp; <b><a href="forgot_password.php">Forgot Password?</a></b>
		</div>
	  </form>
    </div>
    </div>
  </div>
</body>
</html>

