<?php
session_start();
require("connect.php");
if(isset($_SESSION['uid']))
    {
    $id= $_GET['id'];
  $query = "select * from tbl_centre where centre_id='$id';";
  $re = mysqli_query($con, $query);
  $row = mysqli_fetch_array($re);
  $dist_id=$row['district'];
  $city_id=$row['city'];
  $query1 = "select name from tbl_district where dist_id='$dist_id';";
  $re1 = mysqli_query($con, $query1);
  $row1 = mysqli_fetch_array($re1);
  $query2 = "select name from tbl_city where city_id='$city_id';";
  $re2 = mysqli_query($con, $query2);
  $row2 = mysqli_fetch_array($re2);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <title> VAX-FARE</title>
  <link rel="icon" href="vax.png" />
  <meta charset="UTF-8">
  
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    /* Googlefont Poppins CDN Link */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
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
      justify-content: space-between;
      height: 80px;
      background: #fff;
      display: flex;
      align-items: center;
      position: fixed;
      width: calc(100% - 240px);
      left: 240px;
      z-index: 100;
      padding: 0 20px;
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

    .home-section nav .search-box {
      position: relative;
      height: 50px;
      max-width: 550px;
      width: 100%;
      margin: 0 20px;
    }

    nav .search-box input {
      height: 100%;
      width: 100%;
      outline: none;
      background: #F5F6FA;
      border: 2px solid #EFEEF1;
      border-radius: 6px;
      font-size: 18px;
      padding: 0 15px;
    }

    nav .search-box .bx-search {
      position: absolute;
      height: 40px;
      width: 40px;
      background: #2697FF;
      right: 5px;
      top: 50%;
      transform: translateY(-50%);
      border-radius: 4px;
      line-height: 40px;
      text-align: center;
      color: #fff;
      font-size: 22px;
      transition: all 0.4 ease;
    }

    .home-section nav .profile-details {
      display: flex;
      align-items: center;
      background: #F5F6FA;
      border: 2px solid #EFEEF1;
      border-radius: 6px;
      height: 50px;
      min-width: 190px;
      padding: 0 15px 0 2px;
    }

    nav .profile-details img {
      height: 40px;
      width: 40px;
      border-radius: 6px;
      object-fit: cover;
    }

    nav .profile-details .admin_name {
      font-size: 15px;
      font-weight: 500;
      color: #333;
      margin: 0 10px;
      white-space: nowrap;
    }

    nav .profile-details i {
      font-size: 25px;
      color: #333;
    }

    .home-section .home-content {
      position: relative;
      padding-top: 104px;
    }

    .home-content .overview-boxes {
      display: flex;
      align-items: center;
      justify-content: space-between;
      flex-wrap: wrap;
      padding: 0 20px;
      margin-bottom: 26px;
    }

    .overview-boxes .box {
      display: flex;
      align-items: center;
      justify-content: center;
      width: calc(100% / 4 - 15px);
      background: #fff;
      padding: 15px 14px;
      border-radius: 12px;
      box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    }

    .overview-boxes .box-topic {
      font-size: 20px;
      font-weight: 500;
    }

    .home-content .box .number {
      display: inline-block;
      font-size: 35px;
      margin-top: -6px;
      font-weight: 500;
    }

    .home-content .box .indicator {
      display: flex;
      align-items: center;
    }

    .home-content .box .indicator i {
      height: 20px;
      width: 20px;
      background: #8FDACB;
      line-height: 20px;
      text-align: center;
      border-radius: 50%;
      color: #fff;
      font-size: 20px;
      margin-right: 5px;
    }

    .box .indicator i.down {
      background: #e87d88;
    }

    .home-content .box .indicator .text {
      font-size: 12px;
    }

    .home-content .box .cart {
      display: inline-block;
      font-size: 32px;
      height: 50px;
      width: 50px;
      background: #cce5ff;
      line-height: 50px;
      text-align: center;
      color: #66b0ff;
      border-radius: 12px;
      margin: -15px 0 0 6px;
    }

    .home-content .box .cart.two {
      color: #2BD47D;
      background: #C0F2D8;
    }

    .home-content .box .cart.three {
      color: #ffc233;
      background: #ffe8b3;
    }

    .home-content .box .cart.four {
      color: #e05260;
      background: #f7d4d7;
    }

    .home-content .total-order {
      font-size: 20px;
      font-weight: 500;
    }

    .home-content .sales-boxes {
      display: flex;
      justify-content: space-between;
      /* padding: 0 20px; */
    }

    /* left box */
    .home-content .sales-boxes .recent-sales {
      width: 65%;
      background: #fff;
      padding: 20px 30px;
      margin: 0 20px;
      border-radius: 12px;
      box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    }

    .home-content .sales-boxes .sales-details {
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .sales-boxes .box .title {
      font-size: 24px;
      font-weight: 500;
      /* margin-bottom: 10px; */
    }

    .sales-boxes .sales-details li.topic {
      font-size: 20px;
      font-weight: 500;
    }

    .sales-boxes .sales-details li {
      list-style: none;
      margin: 8px 0;
    }

    .sales-boxes .sales-details li a {
      font-size: 18px;
      color: #333;
      font-size: 400;
      text-decoration: none;
    }

    .sales-boxes .box .button {
      width: 100%;
      display: flex;
      justify-content: flex-end;
    }

    .sales-boxes .box .button a {
      color: #fff;
      background: #0A2558;
      padding: 4px 12px;
      font-size: 15px;
      font-weight: 400;
      border-radius: 4px;
      text-decoration: none;
      transition: all 0.3s ease;
    }

    .sales-boxes .box .button a:hover {
      background: #0d3073;
    }

    /* Right box */
    .home-content .sales-boxes .top-sales {
      width: 35%;
      background: #fff;
      padding: 20px 30px;
      margin: 0 20px 0 0;
      border-radius: 12px;
      box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    }

    .sales-boxes .top-sales li {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin: 10px 0;
    }

    .sales-boxes .top-sales li a img {
      height: 40px;
      width: 40px;
      object-fit: cover;
      border-radius: 12px;
      margin-right: 10px;
      background: #333;
    }

    .sales-boxes .top-sales li a {
      display: flex;
      align-items: center;
      text-decoration: none;
    }

    .sales-boxes .top-sales li .product,
    .price {
      font-size: 17px;
      font-weight: 400;
      color: #333;
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
        overflow: hidden;
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

    .mpopup {
      display: none;
      position: fixed;
      z-index: 1;
      padding-top: 100px;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgb(0, 0, 0);
      background-color: rgba(0, 0, 0, 0.4);
    }

    .modal-content {
      position: relative;
      background-color: #fff;
      margin: auto;
      padding: 0;
      width: 670px;
      height: 500px;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      -webkit-animation-name: animatetop;
      -webkit-animation-duration: 0.4s;
      animation-name: animatetop;
      animation-duration: 0.4s;
      border-radius: 0.3rem;
    }

    .modal-header {
      padding: 2px 12px;
      background-color: #ffffff;
      color: #333;
      border-bottom: 1px solid #e9ecef;
      border-top-left-radius: 0.3rem;
      border-top-right-radius: 0.3rem;
    }

    .modal-header h2 {
      font-size: 1.25rem;
      margin-top: 14px;
      margin-bottom: 14px;
    }

    .modal-body {
      padding: 2px 12px;
    }

    .modal-footer {
      padding: 1rem;
      background-color: #ffffff;
      color: #333;
      border-top: 1px solid #e9ecef;
      border-bottom-left-radius: 0.3rem;
      border-bottom-right-radius: 0.3rem;
      text-align: right;
    }

    .close {
      color: #888;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: #000;
      text-decoration: none;
      cursor: pointer;
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

    .container {
      font-size: 14px;
      width: 1000px;
      /* margin-top: 850px; */
      margin-bottom: 200px;
      margin-right: 100px;
      border-radius: 25px;
      padding: 20px;
      /* overflow: scroll; */
    }

    .home-section>.container {
      padding-top: 100px;
      margin-left: 5px;
    }

    .container .content {
      display: flex;
      align-items: center;

    }

    .container .content .right-side {
      width: 75%;
      margin-left: 75px;
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


    .register {
      color: white;
      padding-top: 10px;
      padding-left: 110px;
      font-size: 12px;
    }

    table {


      background-color: #ccf2ff;
      border-radius: 12px;
      width: 1070px;
      padding-left: 20px;
      margin-bottom: 20px;
    }

    th,
    td {
      border-bottom: 1px solid #ddd;
      padding: 10px;
      text-align: left;
    }

    th button {
      padding: 7px 40px;
      margin-left: 710px;
      border: none;
      font-size: 15px;
      border-radius: 3px;
      color: #fff;
      cursor: pointer;
    }

    .add-btn {
      background-color: #f44336;
    }

    .view-btn:hover,
    .delete-btn:hover,
    .add-btn:hover {
      opacity: 0.8;
    }

    th,
    td {
      font-weight: bold;
      font-size: 15px;
    }

    b {
      font-size: 20px;
      color: darkblue;
    }

    .bx bxs-user-circle {
      size: 200px;
    }
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
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

      var mail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
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



      x = document.getElementById("p2").value;
      y = document.getElementById("p3").value;



      $("#btn").click(function () {
        if (v1 == 0 && v2 == 0 && v3 == 0 && v4 == 0)
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
        <a href="admin.php" class="active">
          <i class='bx bx-grid-alt'></i>
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
          <i class='bx bxs-user-circle'></i>
          <span class="links_name">Vaccinator</span>
        </a>
      </li>
      <li>
        <a href="CentreView.php">
          <i class='bx bxs-map-pin'></i>
          <span class="links_name">Vaccination Centre</span>
        </a>
      </li>
      <li>
        <a href="DisView.php">
          <i class='bx bxs-buildings'></i>
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
          <i class='bx bx-cog'></i>
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
      <table>
        <tr>
          <th colspan="5"> <i class='bx bxs-map-pin'> <b>
                <?php echo $row['name']; ?>
              </b></i> <a href="CentreView.php"><button class="add-btn"> &nbsp;<i class='bx bx-arrow-back'> Back
                </i></button></a></th>
        </tr>
        <BR><BR>
        <tr>
          <th>Centre Name : </th>
          <td>
            <?php echo $row['name'] ?>
          </td>
        </tr>
        <tr>
          <th> Contact Number: </th>
          <td>
            <?php echo $row['mobile'] ?>
          </td>
        </tr>
        <tr>
          <th>District: </th>
          <td>
            <?php echo $row1['name'] ?>
          </td>
        </tr>
        <tr>
          <th>Location: </th>
          <td>
            <?php echo $row2['name'] ?>
          </td>
        </tr>
        <tr>
          <th>Pin Code:</th>
          <td>
            <?php echo $row['pincode'] ?>
          </td>
        </tr>
      </table>
    </div>

  </section>
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

</body>

</html>
<?php
}
else{
  header('Location: index.php');
}
?>