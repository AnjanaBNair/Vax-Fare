<?php
// error_reporting(E_ERROR | E_PARSE);
require("connect.php");
if(isset($_GET["query"]))
{
    $search = $_GET["query"];
    $query = "SELECT * FROM `tbl_centre` WHERE `pincode` LIKE '%$search%' ;";
    $result = mysqli_query($con, $query);
if ($result) {
?>
    <table style="width: 100%;border-collapse:separate;">
        <?php
        while ($row = mysqli_fetch_array($result)) { 
           $dist= $row['district'];
           $city=$row['city'];
           $cid=$row['centre_id'];
           $q1 = "SELECT * FROM tbl_city where dist_id='$dist';";
           $q2 = "SELECT * FROM tbl_district where dist_id='$dist';";
           $q3="select * from tbl_slot where centre='$cid';";
       
           $rslt=mysqli_query($con,$q3);
           $res1=mysqli_query($con,$q1);
           $rowq=mysqli_fetch_array($res1);
           $res2=mysqli_query($con,$q2);
           $rows=mysqli_fetch_array($res2); 
           $rows1=mysqli_fetch_array($rslt); 
           $count=mysqli_num_rows($rslt)
            ?>
            <tr>
                <td><?= $row['name'] ?><br>
                <?= $rowq['name']?><br>
                <?= $rows['name']?><br>
                <?= $row['pincode']?><br>
            </td>
            <td>
                <?php
                $current_date = date('Y-m-d');
                if($count>0)
                {


              
                if ($current_date >= $rows1['sdate'] && $current_date <= $rows1['edate']) {

?>
            <a  href='now.php?num=<?php echo $row['centre_id']; ?>'> <button class="view-btn" style="padding: 7px 40px; border: none; font-size: 15px; border-radius: 3px; background: green; cursor: pointer; opacity: 0.8;">Schedule now</button></a> 
        <?php
                }
            }
                else
                {
                    ?>
                    <a> <button class="view-btn" style="padding: 7px 40px; border: none; font-size: 15px; border-radius: 3px; background: red; cursor: pointer; opacity: 0.8;">Not Available</button></a>  
              <?php  }
                
        ?>
        </td>

            </tr>
    <?php
        }
    }

}

    ?>
    </table>
