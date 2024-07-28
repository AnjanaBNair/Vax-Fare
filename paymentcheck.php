<?php
session_start();
// include("connection.php");
$con = mysqli_connect("localhost", "root", "", "bloodbank");
require_once('vendor/autoload.php');

$client = new \GuzzleHttp\Client();
$payment_id=$_GET['link_id'];
$date=
$response = $client->request('GET', 'https://sandbox.cashfree.com/pg/links/'.$payment_id, [
  'headers' => [
    'accept' => 'application/json',
    'x-api-version' => '2022-09-01',
    'x-client-id' => 'TEST354210d8da05dfa9f425366264012453',
    'x-client-secret' => 'TESTefd9049288a9c3feb4496def16c8b2b7a1db949e',
  ],
]);

$responseBody = $response->getBody();

$responseData = json_decode($responseBody, true);

// Get the payment link from the response data
$paymentLink = $responseData['link_status'];
if ($paymentLink!="PAID")
    echo '<!DOCTYPE html>
    <html>
    <head>
        <title>Error Completing Payment</title>
        <meta http-equiv="refresh" content="5;url=http://localhost/bloodar/user/uindex.php" />
        <style>
            body {
                background-color: #f06161;
                color: #fff;
                font-family: Arial, sans-serif;
                font-size: 24px;
                text-align: center;
                padding-top: 100px;
            }
        </style>
        <script>
		window.onload = function() {
			var countDown = 5;
			var intervalId = setInterval(function() {
				countDown--;
				document.getElementById("countdown").innerHTML = countDown;
				if (countDown == 0) {
					clearInterval(intervalId);
				}
			}, 1000);
		}
	</script>
    </head>
    <body>
        <p>Error Completing Payment</p>
        <p>Try again later or contact Customer Care.</p>
        <p>Redirecting in <span id="countdown">5</span> seconds...</p>
    </body>
    </html>';
else{
    $query = "UPDATE tbl_payment SET payment_status ='paid',payment_date =now() WHERE order_id ='$payment_id'";
    // $query = "UPDATE `tbl_payment` SET `Payment_Status`='paid',`Payment_Date`=now() WHERE `Gateway_Order_ID`='$payment_id'";
    $result = mysqli_query($con, $query);
    if($result){
     header('location:uindex.php?token='.urlencode(base64_encode($payment_id)));
}
}
    