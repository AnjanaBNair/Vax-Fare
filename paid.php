<?php 
session_start();
require("connect.php");
if(isset($_SESSION["uid"]) && isset($_GET['bid'])) {
	
    $book_id=$_GET['bid'];
    $a=780;
    $_SESSION["amount"]=$a;
   $_SESSION["book_id"]=$book_id;
  }

?>
<html>
<title> VAX-FARE</title>
	<link rel="icon" href="vax.png" />	
  <head>

<style>
  body{

    background:#66b0ff;
}
  .container {
      font-size: 14px;
      width: 400px;
      margin-top: 250px; 
      margin-bottom: 200px;
      margin-right: 100px;
      border-radius: 25px;
      margin-left:400px;
      padding: 50px;
      background:#fff;
      /* overflow: scroll; */
    }

    .home-section > .container {
       padding-left: -12px;
    }
ul{
  margin-left:-50px;
}
    .container .content {
      display: flex;
      align-items: center;

    }

    .container .content .right-side {
      width: 75%;
    }
   #rzp-button1 {
        background-color: green;
        padding: 7px 10px;
        border: none;
        font-size: 13px;
        border-radius: 12px;
        color: #fff;
        cursor: pointer;
        margin-left: 150px;
      }
      b{
        padding-left:20px;
  font-size:25px;
  color:darkblue;
}
</style>

  </head>
  
  <section class="home-section">
    <div class="container">
 <b>Complete Payment Process</b><br><br>
    <button id="rzp-button1" class="btn btn-outline-dark btn-lg"><i class="fas fa-money-bill"></i>Processed to pay</button>
  </div>
  
  </section>


  </body>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
  var options = {
    "key": "rzp_test_ZWaKvP5WyT4Nmp", // Enter the Key ID generated from the Dashboard
    "amount": "<?php echo $a*100;?>",
    "currency": "INR",
    "description": "VaX_FarE",
    "handler":function(response){
      console.log(response);
      jQuery.ajax({
        type:"GET",
        url:"pay.php",
        data:"pay_id="+response.razorpay_payment_id,
        success:function(result){
          window.location.href="history.php";
        }
      })
 
   
  }
  };
  var rzp1 = new Razorpay(options);
  document.getElementById('rzp-button1').onclick = function (e) {
    
    rzp1.open();
    e.preventDefault();
  }
</script>
</html>