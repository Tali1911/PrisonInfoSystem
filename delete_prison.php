<?php
include("../admin/inc/adminfetch.php");
if(empty($_SESSION['admin-username']))
    {
      header("Location: adminlogin.php");
    }

$id= $_GET['id'];
$sql = "DELETE FROM prison_list WHERE id=?";
$stmt= $dbh->prepare($sql);
$stmt->execute([$id]);

header("Location: view_prisons.php");