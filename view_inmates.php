<?php
include ('header.php');
include ('navbar.php');
include("../admin/inc/adminfetch.php");
if(empty($_SESSION['admin-username']))
    {
      header("Location: adminlogin.php");
    }
?>


	<!-- CONTENT -->
	<section id="content">

		<main>
			
			<div class="table-data">
				<div class="order">
                <div class="head">
						<h3>List of inmates</h3>
						<span><i class='bx bx-search' ></i></span>
						<span><i class='bx bx-filter' ></i></span>

                <a href="add_inmate.php" class="btn-download">
					<span class="icon"><i class='bx bxs-cloud-download' ></i></span>
					<span class="text">+ Add inmates</span>
				</a>

					</div>
					<table>
						<thead>
							<tr>
								<th>#</th>
								<th>Date Created</th>
								<th>Code</th>
                                <th>Name</th>
                                <!-- <th>Status</th> -->
								<th>Photo</th>
							</tr>
						</thead>
                        <tbody>
           <!-- Inmate records will be dynamically added here -->
		   <?php
                    // Linking with the db
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "PMS_db";

                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    } 

                    // Reads all rows from db
                    $sql = "SELECT * FROM inmates";
                    $result3 = $conn->query($sql);

                    // Check if the query was executed correctly
                    if (!$result) {
                        die("Invalid query: " . $conn->error);
                    }
			while ($rowaccess = $result3->fetch_assoc()): ?>
            <tr>
                <td><?php echo $rowaccess["InmateID"]; ?></td>
                <td><?php echo $rowaccess["DateOfAdmission"]; ?></td>
                <td><?php echo $rowaccess["IdentificationNumber"]; ?></td>
                <td><?php echo $rowaccess["FullName"]; ?></td>
                <td> <img src="<?php echo $rowaccess['Photo'];?>"  width="50" height="43" /></td>
            </tr>
			<?php endwhile; ?>
        </tbody>
					</table>
				</div>
			</div>
		</main>
	</section>
	<!-- CONTENT -->


	<script src="script.js"></script>

<?php
$conn->close();
?>