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
    
    $p_name = $_POST['name'];
    $status = $_POST['status'];
    $delete_flag = $_POST['delete_flag'];
    $date_created= date('Y-m-d H:i:s');
    $date_modified= date('Y-m-d H:i:s');
    
    
    
    $stmt = $dbh->prepare("SELECT * FROM prison_list WHERE name=?");
    $stmt->execute([$id]);
    $prison = $stmt->fetch();
    
    if ($prison) {
    $_SESSION['error'] ='Prison Already added in our Database ';
    
    } else {
     //Add cell details
    $sql = 'INSERT INTO prison_list (name,status,delete_flag,date_created,date_updated) VALUES(:name,:status,:delete_flag,:date_created,:date_modified)';
    $statement = $dbh->prepare($sql);
    $statement->execute([
      ':name' => $p_name,
      ':status' => $status,  
      ':delete_flag' => $delete_flag,
      ':date_created'=> $date_created,
      ':date_modified' => $date_modified
    
    
    ]);
    if ($statement){
      $_SESSION['success'] ='Prison Added Successfully';
    }else{
      $_SESSION['error'] ='Problem Adding Prison';
    }
    }
    }    
    
// ?>



	<!-- CONTENT -->
    <section id="content">

<main>

    <div class="top">
        <div class="left">
            <h1 class="title">Add Prison</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Add Prison</a>
                </li>
                <li class="arrow-icon"><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a href="view_prisons.php" class="active">BACK</a>
                </li>
            </ul>
         </div>
    </div>

  <div class="top">
	<div class="left">
              <!-- form start -->
        <div class="form">
        <h4 class="form-title">Prison</h4>
        <div class="form-body">
          <form action="" method="post" enctype="multipart/form-data">
				   <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" size="77" value="<?php if (isset($_POST['name']))?><?php echo $_POST['name']; ?>" placeholder="Name">
                  </div>
                  <div class="form-group">
                    <label for="cell_no">Delete Flag</label>
                    <input type="text" class="form-control" name="delete_flag" id="delete_flag" size="77" value="<?php if (isset($_POST['delete_flag']))?><?php echo $_POST['delete_flag']; ?>" placeholder="delete flag">
                  </div>
                  <div class="form-group">
			<label for="status" class="control-label">Status</label>
			<select name="status" id="status" class="form-control form-control-sm rounded-0" required="required">
				<option value="1" <?= isset($status) && $status == 1 ? 'selected' : '' ?>>Active</option>
				<option value="0" <?= isset($status) && $status == 0 ? 'selected' : '' ?>>Inactive</option>
			</select>>

                </div>
          


                <div class="form-footer">
                  <button type="submit" name="btncreate" class="btn btn-primary">Add Prison</button>
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
     <script>
    function display_img(input) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	        	$('#logo-img').attr('src', e.target.result);
	        }

	        reader.readAsDataURL(input.files[0]);
	    }
	}
	<script src="script.js">
    
  </script>

