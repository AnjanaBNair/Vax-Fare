<?php

require("connect.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function send_password_mail($email)
{
  require("PHPMailer/PHPMailer.php");
  require("PHPMailer/SMTP.php");
  require("PHPMailer/Exception.php");
  $mail = new PHPMailer(true);
  try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                   //Enable verbose debug output
    $mail->isSMTP();                                           //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                      //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                  //Enable SMTP authentication
    $mail->Username   = 'anjananairb2312@gmail.com';                 //SMTP username
    $mail->Password   = 'agoozwezulvvkcek';                    //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           //Enable implicit TLS encryption
    $mail->Port       = 465;                                   //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    $mail->setFrom('anjananairb2312@gmail.com', 'VaX-FarE');
    $mail->addAddress($email);

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Successfully Vaccinated';
    $mail->Body    = "
                     \n Your Vaccination Process is successfully Completed.\n\n\n ";
    $mail->send();
    return true;
  }
   catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    return false;
  }
}

session_start();
$con=mysqli_connect("localhost","root","","vax_fare");
if($_GET['bid'])
{
    $bid=$_GET['bid'];
    $qry="select * from tbl_schedule where book_id='$bid';";
    $rsq=mysqli_query($con,$qry);
    $rqw=mysqli_fetch_array($rsq);
    $newid=$rqw['centre'];
    $vid=$rqw['vaccine'];
    $q3="select * from tbl_booking where book_id='$bid';";
    $rs=mysqli_query($con,$q3);
    $rsw=mysqli_fetch_array($rs);
    if($rsw['dose1']==0 && $rsw['dose2']==0 )
    {
        $q4="update tbl_booking set dose1='1' where book_id='$bid';";
         $rq4=mysqli_query($con,$q4);
         if($rq4) 
         {
            $q41="update tbl_schedule set status=0 where book_id='$bid';";
            $rq41=mysqli_query($con,$q41);
            if($rq41) 
            {
                $q14="select * from tbl_vctr_stockmaster where centre='$newid' and vaccine='$vid';";
                $rq14=mysqli_query($con,$q14); 
                $result=mysqli_fetch_array($rq14);
                $new_avail=$result['avail']-1;
                $qry14="update tbl_vctr_stockmaster set avail='$new_avail' where centre='$newid' and vaccine='$vid';";
                $rqy14=mysqli_query($con,$qry14); 
                $query1="insert into tbl_vaccinated (book_id,time,dose) values ('$bid',NOW(),'1');";
             $rslt1=mysqli_query($con,$query1);
             if($rslt1)
             {
               $mail=$rsw["email"];
              $check_email = "SELECT email from tbl_booking where book_id='$bid';";
              $check_email_run = mysqli_query($con, $check_email);
              if (mysqli_num_rows($check_email_run) > 0) 
              {
                  send_password_mail($mail);
             }
            }
            
         }
        
    }
  }
}
    elseif($rsw['dose1']==1 && $rsw['dose2']==0)
    {
        $q5="update tbl_booking set dose2='1' where book_id='$bid';";
        $rq5=mysqli_query($con,$q5); 
        if($rq51) 
        {
           $q51="update tbl_schedule set status=0 where book_id='$bid';";
           $rq51=mysqli_query($con,$q51); 
           if($rq51)
           {
            $q15="select * from tbl_vctr_stockmaster where centre='$newid' and vaccine='$vid';";
            $rq15=mysqli_query($con,$q15); 
            $result1=mysqli_fetch_array($rq15);
            $new_avail1=$result1['avail']-1;
            $qry15="update tbl_vctr_stockmaster set avail='$new_avail1' where centre='$newid' and vaccine='$vid';";
            $rqy15=mysqli_query($con,$qry15);
             $query="insert into tbl_vaccinated (book_id,time,dose) values ('$bid',NOW(),'2');";
             $rslt=mysqli_query($con,$query);

             if($rslt)
             {

              $check_email = "SELECT email from tbl_booking where book_id='$bid';";
              $check_email_run = mysqli_query($con, $check_email);
              if (mysqli_num_rows($check_email_run) > 0) 
              {
                  send_password_mail($mail);
             }
            }


           }
           
        }
    }
    if($rslt1)
{
    header('Location: request.php');
}
elseif($rslt)
{
    header('Location: request.php');
}
mysqli_close($con);


?>