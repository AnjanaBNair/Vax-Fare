<?php 
    session_start();
    require("connect.php");
    if(isset($_SESSION['uid']))
    {
      $query="select * from tbl_vaccinator where status=1;";
      $re=mysqli_query($con,$query);
      $row=mysqli_fetch_array($re);
      $q="select * from tbl_vaccinator where status=1;";
      $r=mysqli_query($con,$q);

         ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <title> VAX-FARE</title>
  <link rel="icon" href="vax.png" />
  <meta charset="UTF-8">
  
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    * {
      box-sizing: border-box;
    }

    input[type=text],
    select,
    textarea,
    input[type=date] {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
      resize: vertical;
    }

    label {
      padding: 12px 12px 12px 0;
      display: inline-block;
    }

    input[type=submit] {
      margin-right: 20px;
      background-color: #04AA6D;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      float: right;
    }

    input[type=submit]:hover {
      background-color: #45a049;
    }

    .container {
      font-size: 14px;
      width: 1000px;
      /* margin-top: 850px; */
      margin-bottom: 200px;
      margin-right: 100px;
      border-radius: 25px;
      /* background-color: #f2f2f9; */
      padding: 20px;
      /* overflow: scroll; */
    }

    .home-section > .container {
      padding-top: 100px;
      margin-left: 5px;
    }

    /* .container input {
      height: 30px;
    } */

    .col-25 {
      float: left;
      width: 25%;
      margin-top: 6px;
    }

    .col-75 {
      float: left;
      width: 75%;
      margin-top: 6px;
    }

    /* Clear floats after the columns */
    .row:after {
      content: "";
      display: table;
      clear: both;
    }

    /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 600px) {

      .col-25,
      .col-75,
      input[type=submit] {
        width: 100%;
        margin-top: 0;
      }
    }

    .sidebar {
      position: fixed;
      height: 100%;
      width: 240px;
      background: #0A2558;
      transition: all 0.5s ease;
    }

    .sidebar.active {
      width: 60px;
    }

    .sidebar .logo-details {
      height: 80px;
      display: flex;
      align-items: center;
    }

    .sidebar .logo-details i {
      font-size: 28px;
      font-weight: 500;
      color: #fff;
      min-width: 60px;
      text-align: center
    }

    .logodetails ibase_add_user {
      font-size: 28px;
      font-weight: 500;
      color: #fff;
      min-width: 60px;
      text-align: center
    }

    .sidebar .logo-details .logo_name {
      color: #fff;
      font-size: 24px;
      font-weight: 500;
    }

    .sidebar .nav-links {
      margin-top: 10px;
    }

    .sidebar .nav-links li {
      position: relative;
      list-style: none;
      height: 50px;
    }

    .sidebar .nav-links li a {
      height: 100%;
      width: 100%;
      display: flex;
      align-items: center;
      text-decoration: none;
      transition: all 0.4s ease;
    }

    .sidebar .nav-links li a.active {
      background: #081D45;
    }

    .sidebar .nav-links li a:hover {
      background: #081D45;
    }

    .sidebar .nav-links li i {
      min-width: 60px;
      text-align: center;
      font-size: 18px;
      color: #fff;
    }

    .sidebar .nav-links li a .links_name {
      color: #fff;
      font-size: 15px;
      font-weight: 400;
      white-space: nowrap;
    }

    .sidebar .nav-links .log_out {
      position: absolute;
      bottom: 0;
      width: 100%;
    }

    .home-section {
      position: relative;
      background: #f5f5f5;
      padding-bottom: 50px;
      min-height: 100vh;
      width: calc(100% - 240px);
      left: 240px;
      transition: all 0.5s ease;
    }

    .sidebar.active~.home-section {
      width: calc(100% - 60px);
      left: 60px;
    }

    .home-section nav {
      display: flex;
      height: 80px;
      background: #fff;
      display: flex;
      align-items: center;
      position: fixed;
      width: calc(100% - 240px);
      left: 240px;
      z-index: 100;
      padding: 0 10px;
      box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
      transition: all 0.5s ease;
    }

    .sidebar.active~.home-section nav {
      left: 60px;
      width: calc(100% - 60px);
    }

    .home-section nav .sidebar-button {
      display: flex;
      align-items: center;
      font-size: 24px;
      font-weight: 500;
    }

    nav .sidebar-button i {
      font-size: 35px;
      margin-right: 10px;
    }

    /* Responsive Media Query */
    @media (max-width: 1240px) {
      .sidebar {
        width: 60px;
      }

      .sidebar.active {
        width: 220px;
      }

      .home-section {
        width: calc(100% - 60px);
        left: 60px;
      }

      .sidebar.active~.home-section {
        /* width: calc(100% - 220px); */
        /* overflow: hidden; */
        left: 220px;
      }

      .home-section nav {
        width: calc(100% - 60px);
        left: 60px;
      }

      .sidebar.active~.home-section nav {
        width: calc(100% - 220px);
        left: 220px;
      }
    }

    @media (max-width: 1150px) {
      .home-content .sales-boxes {
        flex-direction: column;
      }

      .home-content .sales-boxes .box {
        width: 100%;
        overflow-x: scroll;
        margin-bottom: 30px;
      }

      .home-content .sales-boxes .top-sales {
        margin: 0;
      }
    }

    @media (max-width: 1000px) {
      .overview-boxes .box {
        width: calc(100% / 2 - 15px);
        margin-bottom: 15px;
      }
    }

    @media (max-width: 700px) {

      nav .sidebar-button .dashboard,
      nav .profile-details .admin_name,
      nav .profile-details i {
        display: none;
      }

      .home-section nav .profile-details {
        height: 50px;
        min-width: 40px;
      }

      .home-content .sales-boxes .sales-details {
        width: 560px;
      }
    }

    @media (max-width: 550px) {
      .overview-boxes .box {
        width: 100%;
        margin-bottom: 15px;
      }

      .sidebar.active~.home-section nav .profile-details {
        display: none;
      }
    }

    @media (max-width: 400px) {
      .sidebar {
        width: 0;
      }

      .sidebar.active {
        width: 60px;
      }

      .home-section {
        width: 100%;
        left: 0;
      }

      .sidebar.active~.home-section {
        left: 60px;
        width: calc(100% - 60px);
      }

      .home-section nav {
        width: 100%;
        left: 0;
      }

      .sidebar.active~.home-section nav {
        left: 60px;
        width: calc(100% - 60px);
      }

      .logo_name1 {
        margin-right: 800px;
        margin-bottom: 20px;
      }
    }

    /* add animation effects */
    @-webkit-keyframes animatetop {
      from {
        top: -300px;
        opacity: 0
      }

      to {
        top: 0;
        opacity: 1
      }
    }

    @keyframes animatetop {
      from {
        top: -300px;
        opacity: 0
      }

      to {
        top: 0;
        opacity: 1
      }
    }


    .register {
      color: white;
      padding-top: 10px;
      padding-left: 110px;
      font-size: 12px;
    }
    table {
        width: 1070px;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    th,
    td {
        padding: 10px;
        text-align: left;
        border: 1px solid #ccc;
    }

    th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    td button {
        padding: 7px 10px;
        border: none;
        border-radius: 3px;
        color: #fff;
        cursor: pointer;
    }
    th button {
        padding: 7px 40px;
        margin-left:650px;
        border: none;
        font-size:15px;
        border-radius: 3px;
        color: #fff;
        cursor: pointer;
    }
    .cls button
    {
        padding: 7px 40px;
        margin-left:770px;
        border: none;
        font-size:15px;
        border-radius: 3px;
        color: #fff;
        cursor: pointer;
        box-shadow: 0 8px 16px 0 rgba(0,0,100,0.7), 0 6px 20px 0 rgba(0,0,0,100.19);
    }
    .view-btn {
        background-color: blue;
    }

    .delete-btn {
        background-color: #f44336;
    }
    .add-btn{
        background-color: #4caf50;
    }

    .view-btn:hover,
    .delete-btn:hover,
    .add-btn:hover {
        opacity: 0.8;
    }
    b{
  font-size:20px;
  color:darkblue;
}
confirm{
  margin-top:200px;
}
.form-control 
  {
    margin-left:700px;
    border-color: #081D45;
  }
  ul{
    margin-left: -38px;
  }
  </style>
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
    <script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
  <script>
    var v1 = 0;
    var v2 = 0;
    var v3 = 0;
    var v4 = 0;
    var v5 = 0;
    var v6 = 0;
    var v7 = 0;
    var v8 = 0;
    $(document).ready(function () {
      $("#error1").hide();
      $("#error2").hide();
      $("#error3").hide();
      $("#error4").hide();
      $("#error5").hide();
      $("#error6").hide();
      $("#error7").hide();
      $("#error8").hide();
      $("#exist").hide();


      var fname = /^[a-zA-Z\s]*$/;
      $("#fname").keyup(function () {
        x = document.getElementById("fname").value;
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
      $("#lname").keyup(function () {
        x = document.getElementById("lname").value;
        if (lname.test(x) == false) {
          v2 = 1;
          $("#error2").show();
        }
        else if (lname.test(x) == true) {
          v2 = 0;
          $("#error2").hide();
        }
      });

      var mob = /^[7-9][0-9]{9}$/;
      $("#mob").keyup(function () {
        x = document.getElementById("mob").value;
        if (mob.test(x) == false) {
          v4 = 1
          $("#error3").show();
        }
        else if (phoneno.test(x) == true) {
          v4 = 0
          $("#error3").hide();
        }
      });

      var mail = /^\w+([\.-]?\w+)*(@gmail)+([\.-]?\w+)*(\.\w{2,3})+$/;
      $("#mail").keyup(function () {
        x = document.getElementById("mail").value;
        if (mail.test(x) == false) {
          v5 = 1
          $("#error4").show();
        }
        else if (mail.test(x) == true) {
          v5 = 0
          $("#error4").hide();
        }
      });



      var house = /^(?![0-9]+$)[a-zA-Z0-9\s\,\#\-]+$/;
      $("#house").keyup(function () {
        x = document.getElementById("house").value;
        if (house.test(x) == false) {
          v5 = 1
          $("#error5").show();
        }
        else if (house.test(x) == true) {
          v5 = 0
          $("#error5").hide();
        }
      });

      $("#dist").keyup(function () {
        x = document.getElementById("dist").value;
        if (x == "") {
          v8 = 1
          $("#error8").show();
        }
        else {
          v8 = 0
          $("#error8").hide();
        }
      });


      var exp = /^([1-3][0-9]|[1-9]|4[0-5]|0[1-9])$/;
      $("#exp").keyup(function () {
        x = document.getElementById("exp").value;
        if (exp.test(x) == false) {
          v6 = 1
          $("#error6").show();
        }
        else if (exp.test(x) == true) {
          v6 = 0
          $("#error6").hide();
        }
      });

      pwd = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/;
      $("#pwd").keyup(function () {
        x1 = document.getElementById("pwd").value;
        if (pwd.test(x1) == false) {
          v7 = 1
          $("#error7").show();
        }
        else if (pwd.test(x1) == true) {
          v7 = 0;
          $("#error7").hide();
        }
      });

      $("#btn").click(function () {
        if (v1 == 0 && v2 == 0 && v3 == 0)
          $("#error6").hide();
        else {
          alert('Please Fill The Form Correctly');
          return false;
        }
      });

    });

  </script>

</head>

<body>
  <div class="sidebar">
    <div class="logo-details">
      &nbsp &nbsp <span class="logo_name"><img src="vax.png" height="50" width="50" /></span> &nbsp
      <i>VaX-FarE</i>
    </div>
    <ul class="nav-links">
        <li>
          <a href="#" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="VaccineTable.php">
          <i class="bx bxs-first-aid"></i>
            <span class="links_name">Vaccine</span>
          </a>
        </li>
		 <li>
          <a href="VctrView.php">
            <i class='bx bxs-user-circle' ></i>
            <span class="links_name">Vaccinator</span>
          </a>
        </li>
        <li>
          <a href="CentreView.php">
            <i class='bx bxs-map-pin' ></i>
            <span class="links_name">Vaccination Centre</span>
          </a>
        </li>
        <li>
          <a href="DisView.php">
            <i class='bx bxs-buildings' ></i>
            <span class="links_name">Distributer</span>
          </a>
        </li>
        <li>
          <a href="stockDetails.php">
            <i class='bx bxs-package' ></i>
            <span class="links_name">Vaccine Stock</span>
          </a>
        </li>
        <li>
        <a href="AdminPwdUpdate.php">
            <i class='bx bx-cog' ></i>
            <span class="links_name">Setting</span>
          </a>
        </li>
        <li class="log_out">
        <a href="logout.php">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section">
  <nav>
        <div class="sidebar-button">
          <i class='bx bx-menu sidebarBtn'></i>
          <span class="dashboard">Dashboard</span>
         
        </div>
      </nav>
    <div class="container">
      <div id="result">

      </div>
      <div class="cls"> <a href="generate_pdf.php"><button  class="view-btn">Generate PDF</button></a>
</div><br>
      <table>
        <thead>
        <tr>
                <th colspan="6"><b>Vaccinator Details </b><a href="RegVctr.php"><button  class="add-btn"> &nbsp;<i class='bx bx-plus'>Add Details</i></button></a></th>
            </tr>
        </thead>
        <tbody>
            <tr>
              <th>Sl.no</th>
                <th>Employee ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
            <?php 
            $i=1;
      while ($row1=mysqli_fetch_array($r)) 
      {
         $new_id=$row1['role'];
         $lid=$row1['lid'];
         $query1="select * from tbl_login where  id='$lid';";
         $re1=mysqli_query($con,$query1);
         $row2=mysqli_fetch_array($re1);
         $q="select * from tbl_role where role_id='$new_id';";
         $r1=mysqli_query($con,$q);
         $rw2=mysqli_fetch_array($r1);
        ?>
            <tr>
              <td><?php echo  $i++; ?></td>
                <td> <?php echo $row1['emp'] ;?></td>
                <td><?php echo $row1['fname']." ".$row1['lname'] ;?></td>
                <td> <?php echo $row2['username'] ;?></td>
                <td> <?php echo $rw2['role'] ;?></td>
                   <td><a  href='vctrDetails.php?emp=<?php echo $row1['emp']; ?>'> <button class="view-btn">View</button></a>
                    <a href='remove.php?emp=<?php echo $row1['emp']; ?>' onclick="return confirm('Are you sure about deleting this record ?');"><button class="delete-btn">Delete</button></a>
                </td>
            </tr>
          <?php
      }
          ?>
        </tbody>
    </table>
</div>
  </section>
  </body>
  <script>
    $("#searchBtn").keyup(function() {
      var search = $(this).val();
      if (search != '') {
        load_data(search);
      } else {
        load_data();
      }
    });

    function load_data(query1) {
      // alert(query)
      $.ajax({
        url: "search.php",
        method: "get",
        data: {
          query1: query1,
        },
        success: function(data) {
          console.log(data)
          $('#result').html(data);
        }
      });
    }
  </script>
  <script>
  let sidebar = document.querySelector(".sidebar");
  let sidebarBtn = document.querySelector(".sidebarBtn");
  sidebarBtn.onclick = function () {
    sidebar.classList.toggle("active");
    if (sidebar.classList.contains("active")) {
      sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
    } else
      sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
  }

</script>

</html>
<?php
    }
    else{
      header('location: index.php');
    }
?>