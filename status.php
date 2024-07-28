
<?php
  $id=$_GET['id'];
  $con=mysqli_connect('localhost','root','','miniproject');
  $query="select * from tbl_register where lid='$id'";
  $result=mysqli_query($con,$query);
  $row=mysqli_fetch_array($result);
  if($row['status']==0){
      $que="update tbl_register set status='1' where lid='$id'";
      
      $res=mysqli_query($con,$que);
      if($que)
      {
        $ques="update tbl_login set status='1' where lid='$id'";
      $re=mysqli_query($con,$ques);
      }
      
      if($res && $re){
        header("location:client.php");
        }
  }
  elseif($row['status']==1){
    $que="update tbl_register set status='0' where lid='$id'";
      
    $res=mysqli_query($con,$que);
    if($que)
    {
      $ques="update tbl_login set status='0' where lid='$id'";
    $re=mysqli_query($con,$ques);
    }
    
    if($res && $re){
      header("location:client.php");
      }
  }
?>
status.php
Displaying status.php.