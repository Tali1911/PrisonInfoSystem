<?php
include("../admin/inc/adminfetch.php");
if(empty($_SESSION['admin-username']))
    {
      header("Location: adminlogin.php");
    }

$id= $_GET['uid'];
$sql = "DELETE FROM tbl_warden WHERE username=?";
$stmt= $dbh->prepare($sql);
$stmt->execute([$id]);

header("Location: view_wardenlist.php");