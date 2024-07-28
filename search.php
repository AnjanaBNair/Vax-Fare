<?php
// error_reporting(E_ERROR | E_PARSE);
require("connect.php");
if(isset($_GET["query"]))
{
    $search = $_GET["query"];
    $query = "SELECT * FROM `tbl_distributer` WHERE `name` LIKE '%$search%' OR `town` LIKE '%$search%' OR `city` LIKE '%$search%' OR `pincode` LIKE '%$search%' OR `email` LIKE '%$search%' OR `mobile` LIKE '%$search%';";
    $result = mysqli_query($con, $query);
if ($result) {
?>
    <table style="width: 100%;border-collapse:separate;">
        <tr>
            <th>Name</th>
            <th>Town</th>
            <th>City</th>
            <th>Pincode</th>
            <th>Email</th>
            <th>Mobile Number</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_array($result)) { ?>
            <tr>
                <td><?= $row['name'] ?></td>
                <td><?= $row['town'] ?></td>
                <td><?= $row['city'] ?></td>
                <td><?= $row['pincode'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['mobile'] ?></td>
            </tr>
    <?php
        }
    }

}

    ?>
    </table>

    <?php
    if(isset($_GET["query1"]))
{
    $search = $_GET["query1"];
    $query1 = "SELECT v.*, v.fname,v.emp,v.lname, r.role, l.username
    FROM tbl_vaccinator v
    JOIN tbl_role r ON v.role= r.role_id
    JOIN tbl_login l ON v.lid = l.id
    WHERE v.status = 1
    AND (v.fname LIKE '%search%'
    OR v.emp LIKE '%search%'
         OR v.lname LIKE '%search%'
         OR r.role LIKE '%search%'
         OR l.username LIKE '%search%')";
$result1 = mysqli_query($con, $query1);
if ($result1) {
?>
    <table style="width: 100%;border-collapse:separate;">
        <tr>
               <th>Employee ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_array($result1)) {

            ?>
            <tr>
                
                <td><?= $row['emp'] ?></td>
                <td><?= $row['fname']. " ".$row['lname']?></td>
                <td><?= $row['username'] ?></td>
                <td><?= $r0w['role'] ?></td>
            </tr>
    <?php
        }
    }

}

    ?>
    </table>