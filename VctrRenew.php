<?php
session_start();
require("connect.php");
if(isset($_SESSION['uid']))
{
    $lid = $_SESSION["uid"];

    if (isset($_POST["sub"])) {
        
        $vaccine = $_POST["vaccine"];
        $amt = $_POST["amt"];

        $sql = "SELECT * FROM tbl_vaccinator WHERE lid='$lid';";
        $sl = mysqli_query($con, $sql);
        $sqlr = mysqli_fetch_array($sl);
        $cid = $sqlr["centre"];
        $query = "INSERT INTO tbl_vctr_stock(vaccine,amt,centre,status) VALUES ('$vaccine','$amt','$cid',1)";
        $re = mysqli_query($con, $query);      
        
    }


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
                background: #3DA3E7;
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
                background: #3DA3E7;
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
            .register {
                color: white;
                padding-top: 10px;
                padding-left: 110px;
                font-size: 12px;
            }
            b{
  font-size:20px;
  color:darkblue;
}
        </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
  <script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            var v1 = 0;
            $(document).ready(function() {
                $("#error1").hide();
                $("#exist").hide();

                var amt = /^[1-9][0-9]*$/;
      $("#amt").keyup(function () {
        x = document.getElementById("amt").value;
        if (amt.test(x) == false) {
          v1= 1
          $("#error1").show();
        }
        else if (amt.test(x) == true) {
          v1 = 0
          $("#error1").hide();
        }
      });

                $("#btn").click(function() {
                    if (v1 == 0)
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
                    <a href="vctr.php" class="active">
                        <i class='bx bx-grid-alt'></i>
                        <span class="links_name">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="vctrprofile.php">
                        <i class='bx bxs-user'></i>
                        <span class="links_name">Profile</span>
                    </a>
                </li>
                <li>
                    <a href="VctrStockRenew.php">
                        <i class='bx bx-book-alt'></i>
                        <span class="links_name">Stock Details</span>
                    </a>
                </li>
                <li>
                    <a href="request.php">
                        <i class='bx bx-list-ul'></i>
                        <span class="links_name">Vaccination Request</span>
                    </a>
                </li>
                <li>
          <a href="slotmgt.php">
            <i class='bx bxs-time'></i>
            <span class="links_name">Slot Management</span>
          </a>
        </li>
                <li>
                    <a href="VctrUpdatePass.php">
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
                <form method="post">
                    <h2> Stock Renewal </h2>


                    <div class="row">
                        <div class="col-25">
                            <label for="vaccine">Vaccine</label>
                        </div>
                        <div class="col-75">
                            <select name="vaccine" id="vaccine" required>
                                <option value="" disabled selected>---- Choose Vaccine ----</option>
                                <?php
                                $query1 = "select * from tbl_vaccine where status=1 ";
                                $result = mysqli_query($con, $query1);
                                while ($row1 = mysqli_fetch_array($result)) {
                                ?>
                                    <option value="<?php echo $row1['vaccine_id'];?>">
                                        <?php echo $row1['vaccine'];?>
                                    </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="amt">Amount Renewed</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="amt" name="amt" placeholder="Stock Amount Renewed" required />
                            <span>
                                <p id="error1"><b style='font-family:cursive; font-size:12px; color:red;'> &nbsp;&nbsp; only numbers are allowed</b></p>
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <br>
                        <input type="submit" name="sub" value="Submit">
                    </div>
                </form>
            </div>
            </div>

            <canvas id="myChart"></canvas>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($vaccine); ?>,
                datasets: [{
                    label: 'Stock Availability',
                    data: <?php echo json_encode($avail); ?>,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Deadline',
                    type: 'line',
                    data: Array(<?php echo count($avail); ?>).fill(<?php echo "10"; ?>),
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    borderDash: [5, 5],
                    fill: false
                }
                
                ]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>

        </section>
    </body>

    </html>
<?php
}
 else {
    header('location: index.php');
}
?>