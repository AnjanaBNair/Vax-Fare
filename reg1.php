<?php
 session_start();
 require("connect.php");
	if(isset($_POST["sub"]))
	{
		$fna=$_POST["fname"];
		$lna=$_POST["lname"];
		$ma=$_POST["mail"];
		$mb=$_POST["mob"];
		$ps=$_POST["pass1"];
				
		
    $qry="select * from tbl_login where username='$ma' and status=1;";
    $r=mysqli_query($con,$qry);
    $row=mysqli_fetch_array($r);
		$count=mysqli_num_rows($r);
    if($count>0)
    {
      ?>
      <script>
        alert('User already registerd Try to Login');
      </script>
      <?php
    }
    else
    {
      $query="insert into tbl_login(username,password,status) values('$ma','$ps','1')";
      $re=mysqli_query($con,$query);
      if($re)
      {
         ?>
  <script>
    alert('Fields Inserted Successfully');
  </script>
  <?php
        $last_id=mysqli_insert_id($con);
        $q="insert into tbl_user(lid,fname,lname,mobileno,status) values('$last_id','$fna','$lna','$mb','1')";
        $res=mysqli_query($con,$q);
         if($res)
         {
           ?>
  <script>
    alert('Fields Inserted Successfully');
  </script>
  <?php
         }
        header('Location: log1.php');
      }
    }

		mysqli_close($con);
	}  
					  

?>
<!DOCTYPE html>

<head>
  <title> VAX-FARE</title>
  <link rel="icon" href="vax.png" />
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
 background: #74C0F2;
      background-size: 1800px 700px;
      align-items: center;
      background-repeat: no-repeat;
    }

    .container {
      margin: 100px;
      width: 850px;
  background:#fff;
      border-radius: 6px;
      margin-top: 35px;
      margin-bottom: 20px;
      margin-left: 300px;
      padding: 82px 65px 30px 40px;
      box-shadow: -10px 10px 10px 10px rgba(0, 0, 0, 0.7);
    }

    .container .content {
      display: flex;
      align-items: center;

    }

    .container .content .right-side {
      width: 75%;
      margin-left: 53px;
    }

    .content .right-side .topic-text {
      font-size: 23px;
      font-weight: 600;
      margin-top: -50px;
      color: Blue;
    }

    .right-side .input-box {
      height: 50px;
      width: 100%;
      margin: 20px 0;
    }

    .right-side .input-box input,
    .right-side .input-box textarea {
      height: 100%;
      width: 100%;
      border: none;
      outline: none;
      font-size: 16px;
      background: #DDD1F8;
      border-radius: 6px;
      padding: 0 15px;
    }

    .right-side .message-box {
      min-height: 110px;
    }

    .right-side .input-box textarea {
      padding-top: 6px;
    }

    .right-side .button {
      display: inline-block;
      margin-top: 5px;
    }

    .btn {
      background-color: blue;
      color: white;
      border: 6px;
      padding: 5px;
      padding-right: 160px;
      padding-left: 160px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 20px;
      margin: 4px 4px;
      cursor: pointer;
      border-radius: 25px;
      width: 100%;
    }

    .register {
      color: blue;
      padding-top: 10px;
      padding-left: 110px;
      font-size: 12px;
    }

    a {
      color: blue;
    }

    #availability {
      color: red;
      font-family: cursive;
      font-size: 12px;
    }
    #img
{
  border-radius:45%;
}
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
    var v1 = 0;
    var v2 = 0;
    var v3 = 0;
    var v4 = 0;
    var v5 = 0;
    var v6 = 0;
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

      var mail = /^[a-z]+([\.-]?[0-9]+)*(@gmail)+([\.-]?[a-z]+)*(\.[a-z]{2,3})+$/;
      $("#p3").keyup(function () {
        x = document.getElementById("p3").value;
        if (mail.test(x) == false) {
          v3 = 1
          $("#error3").show();
        }
        else if (mail.test(x) == true) {
          v3 = 0
          $("#error3").hide();
        }
      });

      var phoneno = /^[6-9][0-9]{9}$/;
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



      x = document.getElementById("p2").value;
      y = document.getElementById("p3").value;

      psw1 = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/;
      $("#p5").keyup(function () {
        x1 = document.getElementById("p5").value;
        if (psw1.test(x1) == false) {
          v5 = 1
          $("#error5").show();
        }
        else if (psw1.test(x1) == true) {
          v5 = 0;
          $("#error5").hide();
        }
      });

      psw2 = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/;
      $("#p6").keyup(function () {
        y1 = document.getElementById("p6").value;
        if (document.getElementById("p5").value != document.getElementById("p6").value) {
          v6 = 1
          $("#error6").show();
        }
        else if (document.getElementById("p5").value == document.getElementById("p6").value) {
          v6 = 0;
          $("#error6").hide();
        }
      });


      $("#btn").click(function () {
        if (v1 == 0 && v2 == 0 && v3 == 0 && v4 == 0 && v5 == 0 && v6 == 0)
          $("#error6").hide();
        else {
          alert('Please Fill The Form Correctly');
          return false;
        }
      });

    });
    function checkAvailability() {
            $("#loaderIcon").show();
            jQuery.ajax({
                url: "check.php",
                data: 'mail=' + $("#p3").val(),
                type: "POST",
                success: function(data) {
                    $("#availability").html(data);
                }
                
            });
        }

  </script>
</head>

<body>
  <div class="container">
    <div class="content">
    <img id="img" src="new.png" height="400px" width="320px" />
      <div class="right-side">
        <div class="topic-text">SIGN IN</div><br>
        <form id="form" method="post">
          <div>
            <div class="input-box">

              <input type="text" placeholder="Enter First Name" name="fname" id="p1" required />
              <p id="error1"><b style='font-family:cursive; font-size:12px; color:red;'> &nbsp;&nbsp;Enter Valid Name
              </p><br>
            </div>
            <div class="input-box">
              <input type="text" placeholder="Enter Last Name" name="lname" id="p2" required />
              <p id="error2"><b style='font-family:cursive; font-size:12px; color:red;'> &nbsp;&nbsp;Enter Valid Name
              </p><br>
            </div>
            <div class="input-box">
              <input type="email" placeholder="Enter Email" name="mail" id="p3" onkeyup="checkAvailability()" required />
              <p id="error3"><b style='font-family:cursive; font-size:12px; color:red;'> &nbsp;&nbsp;Enter Valid Email
              </p>
              <p id="availability"></p><br>
            </div>
            <div class="input-box">
              <input type="text" placeholder="Enter Mobile Number" name="mob" id="p4" required />
              <p id="error4"><b style='font-family:cursive; font-size:12px; color:red;'> &nbsp;&nbsp;Enter Valid Mobile
                  Number</p><br>
            </div>

            <div class="input-box">
              <input type="password" placeholder="Enter Password" name="pass1" id="p5" required />
              <p id="error5"><b style='font-family:cursive; font-size:12px; color:red;'> &nbsp;&nbsp;minimum 8
                  characters like letters,digits and one special character</p><br>
            </div>

            <div class="input-box">
              <input type="password" placeholder="Confirm Password" name="pass2" id="p6" required />
              <p id="error6"><b style='font-family:cursive; font-size:12px; color:red;'> &nbsp;&nbsp;Password Doesn't
                  Match</p><br>
            </div>

            <div class="button">
              <button class="btn" name="sub">Submit</button>
            </div>
            <div class="register">
              Already have an Account&nbsp;&nbsp;<a href="log1.php">Login Here </a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>