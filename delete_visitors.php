<?php
include("../admin/inc/adminfetch.php");
if(empty($_SESSION['admin-username']))
    {
      header("Location: adminlogin.php");
    }

$fname= $_GET['fullname'];
$sql = "DELETE FROM tbl_warden WHERE inmate_id=?";
$stmt= $dbh->prepare($sql);
$stmt->execute([$fname]);

header("Location: view_visitors.php");