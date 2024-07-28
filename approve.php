<?php
session_start();
require("connect.php");
if($_GET['new_id'])
{
    $id=$_GET['new_id'];
    $qry="select * from tbl_vctr_stock where status=1 and stock_id='$id';";
    $r=mysqli_query($con,$qry);
    $rw=mysqli_fetch_array($r);
    $cid=$rw['centre'];
    $vaccine=$rw['vaccine'];
    $amt=$rw['amt'];
    $sql1 = "SELECT avail FROM tbl_vctr_stockmaster WHERE centre LIKE '$cid' AND vaccine LIKE '$vaccine';";
    $sl1 = mysqli_query($con, $sql1);
    if (!$sl1) {
        // Error in SQL query
        error_log("Error in SQL query: " . mysqli_error($con));
    } else {
        mysqli_store_result($con);
        $count1 = mysqli_num_rows($sl1);
        if ($count1 > 0) {
            $q1 = "UPDATE tbl_vctr_stockmaster SET avail= avail + $amt WHERE vaccine LIKE '$vaccine' AND centre LIKE '$cid'";
            $result1 = mysqli_query($con, $q1);
    
            if (!$result1) {
                // Error in SQL query
                error_log("Error in SQL query: " . mysqli_error($con));
            }else
            {
                $qq1 = "UPDATE tbl_stock_master SET avail= avail - $amt WHERE vaccine LIKE '$vaccine'";
            $result11 = mysqli_query($con, $qq1);
            }

        } else {
            $q2 = "INSERT INTO tbl_vctr_stockmaster(vaccine,avail,centre) VALUES ('$vaccine','$amt','$cid')";
            $result2 = mysqli_query($con, $q2);
    
            if (!$result2) {
                // Error in SQL query
                error_log("Error in SQL query: " . mysqli_error($con));
            }
            else
            {
                $qq2 = "UPDATE tbl_stock_master SET avail= avail - $amt WHERE vaccine LIKE '$vaccine'";
            $result12 = mysqli_query($con, $qq2);
            }

        }
    }
    $query="update tbl_vctr_stock set status='0' where stock_id='$id';";
    $q="select * from tbl_vaccinator where emp='$id';";
            $re=mysqli_query($con,$query);
if($re)
{
    header('Location: TotalStockRqst.php');
}
mysqli_close($con);
}

?>