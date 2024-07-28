  <?php
			session_start();
            require("connect.php");
            if($_GET['emp'])
            {
                $id=$_GET['emp'];
                $query="update tbl_vaccinator set status='0' where emp='$id';";
                $q="select * from tbl_vaccinator where emp='$id';";
                        $re=mysqli_query($con,$query);
                        $r=mysqli_query($con,$q);
                        $row=mysqli_fetch_array($r);
                        $last_id=$row['lid'];
                        $query1="update tbl_login set status='0' where id='$last_id';";
                        $re1=mysqli_query($con,$query1);
            if($re)
            {
                header('Location: VctrView.php');
            }
            mysqli_close($con);
            }
		else if($_GET['id'])
        {
            $id=$_GET['id'];
            $query="update tbl_centre set status='0' where centre_id='$id';";
            $re=mysqli_query($con,$query);
        if($re)
        {
            header('Location: CentreView.php');
        }
        mysqli_close($con);
        }
        else if($_GET['vacc_id'])
        {
            $id=$_GET['vacc_id'];
            $query="update tbl_vaccine set status='0' where vaccine_id='$id';";
            $re=mysqli_query($con,$query);
        if($re)
        {
            header('Location: VaccineTable.php');
        }
        mysqli_close($con);
        }
        else if($_GET['dis_id'])
        {
            $id=$_GET['dis_id'];
            $query="update tbl_distributer set status='0' where id='$id';";
            $re=mysqli_query($con,$query);
        if($re)
        {
            header('Location: DisView.php');
        }
        mysqli_close($con);
        }
	 ?>