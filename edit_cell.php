<?php
include ('header.php');
include ('navbar.php');
include("../admin/inc/adminfetch.php");
if(empty($_SESSION['admin-username'])){
      header("Location: adminlogin.php");
      exit;
    }

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "PMS_db";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $date_created = $_POST['date_created'];
    $prison_id = $_POST['prison_id'];
    $delete_flag = $_POST['delete_flag'];
    $name = $_POST['cell_no'];
    $status = $_POST['status'];
    $date_created= date('Y-m-d H:i:s');
    $date_modified= date('Y-m-d H:i:s');

    
    $sql = "UPDATE cell_list SET 
                date_created = :date_created, 
                date_updated = :date_updated,
                prison_id = :prison_id, 
                delete_flag = :delete_flag,
                name = :name, 
                status = :status
            WHERE id = :id";

    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':date_created' => $date_created,
            ':date_updated' => $date_modified,
            ':prison_id' => $prison_id,
            ':delete_flag' => $delete_flag,
            ':cell_no' => $name,
            ':status' => $status,
            ':id' => $id
        ]);
        echo "Record updated successfully";
    } catch (PDOException $e) {
        echo "Error updating record: " . $e->getMessage();
    }
}

// Fetch data for the selected row
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM cell_list WHERE id = :id";
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            echo "No record found";
            exit;
        }
    } catch (PDOException $e) {
        echo "Error fetching record: " . $e->getMessage();
        exit;
    }
} else {
    echo "Invalid request";
    exit;
}


// ?>



	<!-- CONTENT -->
    <section id="content">

<main>

    <div class="top">
        <div class="left">
            <h1 class="title">Edit cell</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Edit cell</a>
                </li>
                <li class="arrow-icon"><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a href="view_cell.php" class="active">BACK</a>
                </li>
            </ul>
         </div>
    </div>

  <div class="top">
	<div class="left">
              <!-- form start -->
        <div class="form">
        <h4 class="form-title">Edit Cell</h4>
        <div class="form-body">
          <form action="" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
          <div class="form-group">
                    <label for="prison_id">Prison ID:</label>
                    <input type="text" class="form-control" name="prison_id" id="prison_id" size="77" value="<?php echo $row['prison_id']; ?>" placeholder="Prison ID">
                  </div> 
          <div class="form-group">
                    <label for="cell_no">Cell Number</label>
                    <input type="text" class="form-control" name="cell_no" id="cell_no" size="77" value="<?php echo $row['name']; ?>" placeholder="Name">
                  </div>   
                  <div class="form-group">
                    <label for="delete_flag">Delete status</label>
                    <input type="text" class="form-control" name="delete_flag" id="delete_flag" size="77" value="<?php echo $row['delete_flag']; ?>" placeholder="Delete status">
                  </div>                  
                  <div class="form-group">
			<label for="status" class="control-label">Status</label>
			<select name="status" id="status" class="form-control form-control-sm rounded-0" required="required">
				<option value="1" <?php $row['status'] == 1 ? 'selected' : '' ?>>Active</option>
				<option value="0" <?php $row['status'] == 0 ? 'selected' : '' ?>>Inactive</option>
			</select>

          

                <div class="form-footer">
                  <button type="submit" class="btn btn-primary">Update Cell</button>
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

</script>
	<script src="script.js"></script>

