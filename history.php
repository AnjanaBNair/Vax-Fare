<?php
session_start();
require("connect.php");
if (isset($_SESSION["uid"])) {
  $lid = $_SESSION["uid"];
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
        background: #66b0ff;
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

      .table {

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
        border: none;
        font-size: 15px;
        border-radius: 3px;
        color: #fff;
        cursor: pointer;
      }

      .add-btn {
        background-color: darkblue;
      }

      .view-btn {
        background-color: green;
        padding: 7px 10px;
        border: none;
        font-size: 13px;
        border-radius: 12px;
        color: #fff;
        margin-left: 200px;
        cursor: pointer;
      }

      .view-btn1 {
        background-color: #2697FF;
        padding: 7px 10px;
        border: none;
        font-size: 13px;
        border-radius: 12px;
        color: #fff;
        cursor: pointer;
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
        size: 100px;
      }

      #countdown {
        position: relative;
        width: 150px;
        height: 150px;
        margin: 0 auto;
      }

      #countdown .outer-circle {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border-radius: 50%;
        background-color: #ccc;
      }

      #countdown .inner-circle {
        position: absolute;
        top: 5%;
        left: 5%;
        width: 90%;
        height: 90%;
        border-radius: 50%;
        background-color: #fff;
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
      }

      #countdown .inner-circle h2 {
        font-size: 30px;
        margin: 0;
      }

      #countdown .inner-circle p {
        font-size: 14px;
        margin: 0;
      }
      .tick {
        display: inline-block;
        border: 2px solid #2ecc71; /* Green color */
        border-radius: 50%;
        width: 20px;
        height: 20px;
        padding: 2px;
    }
    .tick::after {
        content: "\2714"; /* Unicode for tick symbol */
        font-size: 16px;
        color: #2ecc71;
        line-height: 1;
        display: block;
        text-align: center;
    }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  </head>

  <body>
    <div class="sidebar">
      <div class="logo-details">
        &nbsp &nbsp <span class="logo_name"><img src="vax.png" height="50" width="50" /></span> &nbsp
        <i>VaX-FarE</i>
      </div>
      <ul class="nav-links">
        <li>
          <a href="demo.php" class="active">
            <i class='bx bx-grid-alt'></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="profileview.php">
            <i class='bx bxs-user'></i>
            <span class="links_name">Profile</span>
          </a>
        </li>
        <li>
          <a href="bookvaccine.php">
            <i class='bx bx-book-alt'></i>
            <span class="links_name">Book Vaccine</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-list-ul'></i>
            <span class="links_name">History</span>
          </a>
        </li>

        <li>
          <a href="UpdatePassword.php">
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
      <?php
      $query = "SELECT * FROM tbl_booking WHERE lid='$lid';";
      $re = mysqli_query($con, $query);
      ?>
      <div class="container">
        <div class="table">
          <br>
          <?php
          while ($row = mysqli_fetch_array($re)) {
            $bid = $row['book_id'];
            $pid = $row['proof'];
            $qy = "SELECT * FROM tbl_proof WHERE proof_id='$pid';";
            $re1 = mysqli_query($con, $qy);
            $row1 = mysqli_fetch_array($re1);

            $query2 = "SELECT * FROM tbl_schedule WHERE book_id='$bid';";
            $re2 = mysqli_query($con, $query2);
            $row2 = mysqli_fetch_array($re2);

            $query3 = "SELECT * FROM tbl_booking WHERE book_id='$bid' and dose1=1;";
            $re3 = mysqli_query($con, $query3);
            $row3 = mysqli_fetch_array($re3);

            $query4 = "SELECT * FROM tbl_booking WHERE book_id='$bid' and dose2=1;";
            $re4 = mysqli_query($con, $query4);
            $row4 = mysqli_fetch_array($re4);

            $count1 = mysqli_num_rows($re3);
            $count = mysqli_num_rows($re2);
            $count2 = mysqli_num_rows($re4);
          ?>
            <table style="border: solid darkblue;width:1000px;">
              <tr colspan="2">
                <th><b><?php echo $row['fname'] . " " . $row['lname']; ?></b></th>
                <th></th>

                <?php
                if ($count > 0) { ?>
                  <th>
                    <?php if ($row2['status'] == 1) {
                      echo "<a href='reschedule.php?new_id={$row['book_id']}'><button type='submit' name='schedule' class='view-btn' >Reschedule</button></a>";
                    } else {
                      if ($row['dose1'] == 1) {
                      }
                    } ?>
                  </th>
                <?php  }
                ?>
                


              </tr>
              <tr>
                <td>Year Of Birth : <?php echo $row['dob']; ?></td>
                <td>Photo ID : <?php echo $row1['proof']; ?></td>
                <td style="color: <?php
                                  if (($row['dose1']) == 0 && ($row['dose2']) == 0) {
                                    echo "red"; // Not Vaccinated
                                  } elseif (($row['dose1']) == 1 && ($row['dose2']) == 1) {
                                    echo "green"; // Fully Vaccinated
                                  } else {
                                    echo "blue"; // Partially Vaccinated
                                  }
                                  ?>">Status: <?php
              if (($row['dose1']) == 0 && ($row['dose2']) == 0) {
                echo "Not Vaccinated";
              } elseif (($row['dose1']) == 1 && ($row['dose2']) == 1) {
                echo "Fully Vaccinated";
              } else {
                echo "Partially Vaccinated";
              }
              ?>
                </td>
              </tr>
              <?php


              if ($count1 == 1) {
                $qs = "SELECT * FROM tbl_vaccinated WHERE book_id='$bid';";
                $qy = mysqli_query($con, $qs);
                $rqs = mysqli_fetch_array($qy);

                // Get the date from the database and add 80 days to it
                $datetime = $rqs['time'];
                $date = date('Y-m-d',strtotime($datetime . ' +80 days'));

                // Get the current date
                $now = new DateTime();
                $systemDate = $now->format('Y-m-d');

                // Calculate the remaining days
                $destinationDate = new DateTime($date);
                $diff = $destinationDate->diff(new DateTime($systemDate));
                $remainingDays = $diff->format('%a');
              ?>

                <script>


                </script>
                <?php if ($remainingDays != 0) { ?>
                  <tr>
                    <th colspan="3" style="text-align: center;">
                      <div id="countdown">
                        <div class="outer-circle"></div>
                        <div class="inner-circle">

                          <h2><?php echo $remainingDays; ?></h2>
                          <p>Days Remaining</p>
                        </div>
                      </div>
                    </th>
                  </tr>
                <?php
                } ?>

              <?php
              }
              if ($count == 0) {
              ?>
                <tr>
                  <th colspan="3" style="text-align: center;">
                    <br>

                    <?php
                    echo "<a href='schedule.php?new_id={$row['book_id']}'><button type='submit' name='schedule' class='add-btn'>Schedule Appointment for Dose1</button></a>";
                    ?>
                  </th>
                </tr>
                <?php

              } else if ($count1 == 1) {
                if ($remainingDays == 0) { ?>
                  <tr>

                    <th colspan="3" style="text-align: center;">
                      <br>
                      <?php
                      echo "<a href='schedule.php?new_id={$row['book_id']}'><button type='submit' name='schedule' class='add-btn'>Schedule Appointment for Dose2</button></a>";
                      ?>
                      <br>
                    </th>
                  </tr>
                <?php
                } else {

                ?>
                  <tr>

                    <th colspan="3" style="text-align: center;">
                      <br>
                      <?php
                      echo "<a><button type='submit' name='schedule' class='add-btn'>Schedule Appointment for Dose2</button></a>";
                      ?>
                      <br>
                    </th>
                  </tr>
                <?php
                }
              }
              if ($count > 0) {
                if ($row2['status'] == 1) { ?>
                  <tr style="color: green;">
                    <td>Booking Date : <?php echo $row2['date']; ?> </td>
                    <td></td>
                    <td>Vaccine : <?php
                                  $vaccine = $row2['vaccine'];
                                  $query3 = "SELECT * FROM tbl_vaccine WHERE status=1 and vaccine_id='$vaccine';";
                                  $re3 = mysqli_query($con, $query3);
                                  $row3 = mysqli_fetch_array($re3);

                                  echo $row3['vaccine'];
                                  ?> </td>
                  </tr>
                  <tr style="color: green;">
                    <td>Booking Time : <?php echo $row2['time']; ?> </td>
                    <td></td>
                    <td>Centre : <?php
                                  $centre = $row2['centre'];
                                  $query4 = "SELECT * FROM tbl_centre WHERE status=1 and centre_id='$centre';";
                                  $re4 = mysqli_query($con, $query4);
                                  $row4 = mysqli_fetch_array($re4);

                                  echo $row4['name'];
                                  ?> </td>
                  </tr>

              <?php }
              }
              ?>
             <?php
                if ($count1 > 0 && $count2==0) { ?>
               <tr>    
                
               <th colspan="2" style="text-align: center; color :blue;"> Partially Vaccinated (Dose 1) &nbsp; &nbsp; <span class="tick"></span></th>
               <th>
                    <?php
                    if (($row['dose1']) == 1) {
                      echo "<a href='dose1.php?new_id={$row['book_id']}'><button type='submit' name='schedule' class='view-btn1'>
              <i class='bx bx-down-arrow-alt'> Download Certificate</i> </button></a>";
                    }
                    ?>
                  </th>
                  </tr>
                <?php    } ?>
                <?php
                if ($count2 > 0) { ?>
               <tr>    
                
               <th colspan="2" style="text-align: center; color:blue;"> Completely Vaccinated (Dose 1 and Dose 2)  &nbsp; &nbsp;<span class="tick"></span></th>
               <th>
                    <?php
                    if (($row['dose2']) == 1) {
                      echo "<a href='dose2.php?new_id={$row['book_id']}'><button type='submit' name='schedule' class='view-btn1'>
              <i class='bx bx-down-arrow-alt'> Download Certificate</i> </button></a>";
                    }
                    ?>
                  </th>
                  </tr>
                <?php    } ?>

              <table>
              <?php
            }
              ?>
        </div>
      </div>

    </section>
    </section>
    <script>
      let sidebar = document.querySelector(".sidebar");
      let sidebarBtn = document.querySelector(".sidebarBtn");
      sidebarBtn.onclick = function() {
        sidebar.classList.toggle("active");
        if (sidebar.classList.contains("active")) {
          sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
        } else
          sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
      }
    </script>
  <?php
} else {
  header('location: index.php');
}
  ?>