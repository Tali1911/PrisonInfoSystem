<?php
include ('header.php');
include ('navbar.php');
include("../kpsms/inc/adminfetch.php");
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
						<h3>List of visitors</h3>
						<span><i class='bx bx-search' ></i></span>
						<span><i class='bx bx-filter' ></i></span>

                        <a href="addvisit.php" class="btn-download">
					<span class="icon"><i class='bx bxs-cloud-download' ></i></span>
					<span class="text">+ Add Visitors</span>
				</a>

					</div>
					<table>
						<thead>
							<tr>
								<th>#</th>
								<th>Date Created</th>
								<th>Inmate ID</th>
                                <th>Visitor name</th>
                                <th>Relation</th>
                                <th>Contact</th>
								<th>Action</th>
							</tr>
						</thead>
                        <tbody>
            <!-- Inmate records will be dynamically added here -->
            <?php
            //linking with the db
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "PMS_db";

            //create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            //check connection
            if ($conn->connect_error) {
                die("Connection failed". $conn->connect_error);
            }

            //reads all rows drom db
            $sql = "SELECT * FROM visit_list";
            $result = $conn->query($sql);

            //check if the above is correctly executed
            if( !$result) {
                die("Invalid querry". $conn->error);
            }


            //read data from each row
            while($row = $result->fetch_assoc()) ?>
                <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['date_created']; ?></td>
                <td><?php echo $row['inmate_id']; ?></td>
                <td><?php echo $row['fullname']; ?></td>
                <td><?php echo $row['relation']; ?></td>
                <td><?php echo $row['contact']; ?></td>
                <td>
                <a href="delete_visitors.php?uid=<?php echo $row['inmate_id'];?>" onClick="return deldata('<?php echo $row['fullname']; ?>');">Delete </a></div>
                </td>                             
            </tr>
                        
        </tbody>
					</table>
				</div>
			</div>
		</main>
	</section>
	<!-- CONTENT -->


	<script src="script.js">
        		function deldata(fullname){
if(confirm("ARE YOU SURE YOU WISH TO DELETE " + " " + fullname+ " " + " FROM THE DATABASE?"))
{
return  true;
}
else {return false;
}

}

    </script>