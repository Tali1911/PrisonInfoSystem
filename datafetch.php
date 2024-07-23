<?php
session_start();
error_reporting(1);
include("../kpsms/admin/database/connect.php");
include("../kpsms/admin/database/connect2.php");

$logo = "../inc/logo.jpeg";


//warden
$sql = "SELECT * FROM tbl_warden";
$result = $conn->query($sql);
$row_no_users = mysqli_num_rows($result);
$username = $_SESSION["warden-username"];
$stmt = $dbh->query("SELECT * FROM tbl_warden where username='$username'");
$row_warden = $stmt->fetch();
// it return number of rows in the table.
$warden_fullname=$row_warden['fullname'];  
$warden_photo=$row_warden['photo'];  