<?php
// error_reporting(E_ERROR | E_PARSE);
require("connect.php");
if(isset($_GET["query"]))
{
    $search = $_GET["query"];
    $query = "SELECT * FROM `tbl_booking` WHERE `fname` LIKE '%$search%' OR `lname` LIKE '%$search%' OR `proof_id` LIKE '%$search%';";
    $result = mysqli_query($con, $query);
    if ($result) {
?>
    <table style="width: 100%;border-collapse:separate;">
        <tr>
            <th>Sl.no</th>
            <th>Name</th>
            <th>Photo Proof ID</th>
            <th>Proof ID</th>
            <th>Action</th>
        </tr>
        <?php
        $i=1;
        while ($row = mysqli_fetch_array($result)) { 
            $bid=$row['book_id'];
            $qry = "SELECT b.*, s.* FROM tbl_booking b JOIN tbl_schedule s ON b.book_id = s.book_id WHERE b.book_id = '$bid' AND s.status = 1";
            $res = mysqli_query($con, $qry);
            if(mysqli_num_rows($res) > 0){
                $row1 = mysqli_fetch_array($res);
                $proof=$row1['proof'];
                $qry1="select * from tbl_proof where proof_id='$proof';";
                $res1=mysqli_query($con,$qry1);
                $row2 = mysqli_fetch_array($res1);
            ?>

                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $row1['fname']. " ".$row['lname']; ?></td>
                    <td><?= $row2['proof'] ?></td>
                    <td><?= $row1['proof_id'] ?></td>
                    <td>
                        <a href='approvevaccine.php?bid=<?php echo $row1['book_id']; ?>'><button class="add-btn">Approve</button></a>
                    </td>
                </tr>
            <?php
            }
        }
        ?>
    </table>
<?php
    }
}
?>
