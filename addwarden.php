<?php
include ('header.php');
include ('navbar.php');
include("../kpsms/inc/adminfetch.php");
if(empty($_SESSION['admin-username']))
    {
      header("Location: adminlogin.php");
    }


if(isset( $_POST["btncreate"]))
{

    $username = $_POST['txtusername'];
    $name = $_POST['txtfullname'];
    $password = $_POST['txtpassword'];
    $phone = $_POST['txtphone'];
    
    $file_type = $_FILES['avatar']['type']; //returns the mimetype
    $allowed = array("image/jpg", "image/gif","image/jpeg", "image/webp","image/png");
    if(!in_array($file_type, $allowed)) {
    $_SESSION['error'] ='Only jpg,jpeg,Webp, gif, and png files are allowed. ';
    
    // exit();
    
    }else{
    $image= addslashes(file_get_contents($_FILES['avatar']['tmp_name']));
    $image_name= addslashes($_FILES['avatar']['name']);
    $image_size= getimagesize($_FILES['avatar']['tmp_name']);
    move_uploaded_file($_FILES["avatar"]["tmp_name"],"../uploadImage/Profile/" . $_FILES["avatar"]["name"]);
    $location="uploadImage/Profile/" . $_FILES["avatar"]["name"];
    
    ///check if username already exist
    $stmt = $dbh->prepare("SELECT * FROM tbl_warden WHERE txtusername=?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();
    
    if ($user) {
    $_SESSION['error'] ='Username Already Exist in our Database ';
    
    } else {
     //Add User details
    $sql = 'INSERT INTO tbl_warden (txtusername,txtpassword,txtphone,txtfullname,avatar) VALUES(:txtusername,:txtpassword,:txtphone,:txtfullname,:avatar)';
    $statement = $dbh->prepare($sql);
    $statement->execute([
        ':txtusername' => $username,
        ':txtpassword' => $password,
      ':txtphone' => $phone,
        ':txtfullname' => $name,
        ':avatar' => $location
    
    ]);
    if ($statement){
        $_SESSION['success'] ='User Added Successfully';
    }else{
      $_SESSION['error'] ='Problem Adding User';
    }
    }
    }
    }
?>



	<!-- CONTENT -->
	<section id="content">

		<main>

			<div class="top">
				<div class="left">
					<h1 class="title">Add warden</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Add warden</a>
						</li>
						<li class="arrow-icon"><i class='bx bx-chevron-right'></i></li>
						<li>
							<a href="view_wardenlist.php" class="active">BACK</a>
						</li>
					</ul>
				 </div>
				 <!-- <a href="#" class="btn-download">
					<span class="icon"><i class='bx bxs-cloud-download' ></i></span>
					<span class="text">Download PDF</span>
				</a> -->
			</div>

  <div class="top">
				<div class="left">
              <!-- form start -->
        <div class="form">
        <h4 class="form-title">Warden Details</h4>
        <div class="form-body">
          <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="username">username </label>
                    <input type="text" class="form-control" name="txtusername" id="exampleInputEmail1" size="77" value="<?php if (isset($_POST['txtusername']))?><?php echo $_POST['txtusername']; ?>" placeholder="Enter Username">
                  </div>
				   <div class="form-group">
                    <label for="fname">Fullname </label>
                    <input type="text" class="form-control" name="txtfullname" id="exampleInputEmail1" size="77" value="<?php if (isset($_POST['txtfullname']))?><?php echo $_POST['txtfullname']; ?>" placeholder="Enter Fullname">
                  </div>
                  <div class="form-group">
                    <label for="psswd">Password</label>
                    <input type="password" class="form-control" name="txtpassword" id="exampleInputPassword1" size="77" value="<?php if (isset($_POST['txtpassword']))?><?php echo $_POST['txtpassword']; ?>" placeholder="Enter Password">
                  </div>

           <div class="form-group">
                    <label for="phone">phone </label>
                    <input type="tel" class="form-control" name="txtphone" id="txtphone" size="77" value="<?php if (isset($_POST['txtphone']))?><?php echo $_POST['txtphone']; ?>" placeholder="Enter Phone">
                  </div>
           <div class="form-group">
                    <label for="photo">Image</label>
                    <p class="text-center">
                        <input type="file" name="avatar" id="avatar" required class="form-control form-control-sm rounded-0" accept="image/png,image/jpeg,image/jpg" onChange="display_img(this)">
                       </p>

                    <p class="text-center">
                   <img src="<?php echo $admin_photo; ?>" alt="user image" width="178" height="154" id="logo-img">
				    </p>
              </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="btncreate" class="btn btn-primary">Create User</button>
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
