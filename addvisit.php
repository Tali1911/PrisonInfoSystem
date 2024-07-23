<?php
include ('header.php');
include ('navbar.php');
include("../kpsms/inc/adminfetch.php");
if(empty($_SESSION['admin-username']))
    {
      header("Location: adminlogin.php");
    }


    if(isset($_POST["btncreate"]))
{

$inmate_id = $_POST["inmate_id"];
$fullname = $_POST['fullname'];
$contact = $_POST['phone'];
$relation = $_POST['relation'];
$date_created= date('Y-m-d H:i:s');
$date_modified= date('Y-m-d H:i:s');



$stmt = $dbh->prepare("SELECT * FROM visit_list WHERE fullname=?");
$stmt->execute([$inmate_id]);
$visitor = $stmt->fetch();

if ($visitor) {
$_SESSION['error'] ='Inmate Already has a registered visitor in our Database ';

} else {
 //Add cell details
$sql = 'INSERT INTO visit_list (inmate_id,fullname,contact,relation,date_created,date_updated) VALUES(:inmate_id,:fullname,:contact,:relation,:date_created,:date_modified)';
$statement = $dbh->prepare($sql);
$statement->execute([
  ':inmate_id'=> $inmate_id,
	':fullname' => $fullname,
	':contact' => $contact,  
  ':relation' => $relation,
  ':date_created'=> $date_created,
  ':date_modified' => $date_modified


]);
if ($statement){
	$_SESSION['success'] ='Visitor Registered Successfully';
}else{
  $_SESSION['error'] ='Problem Adding Visito';
}
}
}    

// ?>



	<!-- CONTENT -->
    <section id="content">

<main>

    <div class="top">
        <div class="left">
            <h1 class="title">Add visitors</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Add visitors</a>
                </li>
                <li class="arrow-icon"><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a href="view_visitors.php" class="active">BACK</a>
                </li>
            </ul>
         </div>
    </div>

  <div class="top">
	<div class="left">
              <!-- form start -->
        <div class="form">
        <h4 class="form-title">Visitors Details</h4>
        <div class="form-body">
          <form action="" method="post" enctype="multipart/form-data">
				   <div class="form-group">
                    `<label for="name">Visitors Fullname </label>
                    <input type="text" class="form-control" name="fullname" id="name" size="77" value="<?php if (isset($_POST['fullname']))?><?php echo $_POST['fullname']; ?>" placeholder="Enter Fullname">
                  </div>
                  <div class="form-group">
                    <label for="relatio">Relationship </label>
                    <input type="relation" class="form-control" name="relation" id="relation" size="77" value="<?php if (isset($_POST['relation']))?><?php echo $_POST['relation']; ?>" placeholder="Enter Relation">
                  </div>

                  <div class="form-group">
                    <label for="inmate_id">Inmate ID </label>
                    <input type="number" class="form-control" name="inmate_id" id="inmate_id" size="77" value="<?php if (isset($_POST['inmate_id']))?><?php echo $_POST['inmate_id']; ?>" placeholder="Enter Inmate ID">
                  </div>

                </div>
           <div class="form-group">
                    <label for="contact">Contact</label>
                    <input type="tel" class="form-control" name="phone" id="phone" size="77" value="<?php if (isset($_POST['phone']))?><?php echo $_POST['phone']; ?>" placeholder="Enter Phone">
                  </div>


                <div class="form-footer">
                  <button type="submit" name="btncreate" class="btn btn-primary">Register Visitor</button>
                </div>
              </div>
              
              </form>
            

        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col --><!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)--><!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
	</section>
	<!-- CONTENT -->


	<script src="script.js"></script>
