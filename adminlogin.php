<?php

include('../admin/inc/adminfetch.php');

if(isset($_POST['btnlogin']))
{

$username = $_POST['txtusername'];
$password = $_POST['txtpassword'];

$sql = "SELECT * FROM admin_users WHERE username='".$username."' and password = '".$password."'";
$result = mysqli_query($conn,$sql);
$row  = mysqli_fetch_array($result);


session_start(); // Start the session


//$row['username'] holds the username obtained from the database query
$_SESSION["admin-username"] = $row['username'];

//$result is the result of a database query
$count = mysqli_num_rows($result);

if(isset($_SESSION["admin-username"]) && !empty($_SESSION["admin-username"])) {
    // If the admin username session variable is set and not empty, redirect to index.php
    header("location: index.php");
    exit(); // Terminate script execution after redirecting
} else {
    $_SESSION['error'] = 'Wrong Username and Password';
    // Handle the error or redirect to a login page with an error message
}


}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- <link rel="stylesheet" href="adminstyles.css"> -->
    <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  
     <!-- Theme style -->
  <link rel="stylesheet" href="adminlte.min.css">
</head>
<body>
    <div class="container">
    <div class="login-box">
  <div class="login-logo">
    <a href="#"><b><img src="logo.jpeg" width="100" height="100"><span class="style4"> KPS  </span></b></a>  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg style2">ADMIN LOGIN FORM </p>

      <form action="adminlogin.php" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="txtusername" placeholder="Enter Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="txtpassword" placeholder="Enter Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="btnlogin" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- /.social-auth-links -->
<p class="mb-1">&nbsp;</p>
    </div>
    <!-- /.login-card-body -->
  </div>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
<p align="center">&nbsp;</p>
</div>
<!-- /.login-box -->
    </div>

    <!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
 
    <link rel="stylesheet" href="popup_style.css">
    <?php if(!empty($_SESSION['success'])) {  ?>
<div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      <strong>Success</strong>
    </h1>
    <p><?php echo $_SESSION['success']; ?></p>
    <p>
      <button class="button button--success" data-for="js_success-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["success"]);
} ?>
<?php if(!empty($_SESSION['error'])) {  ?>
<div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      <strong>Error</strong>
    </h1>
    <p><?php echo $_SESSION['error']; ?></p>
    <p>
      <button class="button button--error" data-for="js_error-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["error"]);  } ?>

    <script src="script.js"></script>
    <script>
      var addButtonTrigger = function addButtonTrigger(el) {
  el.addEventListener('click', function () {
    var popupEl = document.querySelector('.' + el.dataset.for);
    popupEl.classList.toggle('popup--visible');
  });
};

Array.from(document.querySelectorAll('button[data-for]')).
forEach(addButtonTrigger);
    </script>
</body>
</html>