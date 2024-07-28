<?php
require("connect.php");
session_start();
if(isset($_SESSION["book_id"]) && !empty($_SESSION["book_id"])) {
    $b = $_SESSION["book_id"];
    $d = $_SESSION["amount"];
    $lid = $_SESSION["uid"];
    $cid = $_SESSION["cid"];
    $date = $_SESSION["date"];
    $time = $_SESSION["time"];
    $vaccine = $_SESSION["vaccine"];
    if(isset($_GET['pay_id'])) {
        $a = $_GET['pay_id'];
        $query = "INSERT INTO tbl_payment(transaction_id, book_id, amount) VALUES ('$a', '$b', '$d')"; 
        $result = mysqli_query($con, $query);
        if($result) {
            $query1 = "INSERT INTO tbl_schedule(book_id, lid, centre, date, time, vaccine) VALUES ('$b', '$lid', '$cid', '$date', '$time', '$vaccine')";
            $res = mysqli_query($con, $query1);
           
        }
    }
}
?>