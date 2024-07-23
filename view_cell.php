<?php
include ('../admin/header.php');
include ('../admin/navbar.php');
include("../admin/inc/adminfetch.php");
if(empty($_SESSION['admin-username']))
{
  header("Location: adminlogin.php");
  exit();
}

?>

<!-- CONTENT -->
<section id="content">

<main>
    <style>
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropbtn {
            background-color: #3498db;
            color: white;
            padding: 10px;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        .dropdown-content .dropdown-divider {
            height: 1px;
            margin: .5rem 0;
            overflow: hidden;
            background-color: #e9ecef;
        }

        .show {
            display: block;
        }
    </style>
    <div class="table-data">
        <di class="order">
            <div class="head">
                <h3>List of Cells</h3>
                <span><i class='bx bx-search'></i></span>
                <span><i class='bx bx-filter'></i></span>
                <a href="addcell.php" class="btn-download">
                    <span class="icon"><i class='bx bxs-cloud-download'></i></span>
                    <span class="text">+ Add cell</span>
                </a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Date Created</th>
                        <th>Prison</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Action</th>
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
                    $sql = "SELECT * FROM cell_list";
                    $result = $conn->query($sql);

                    // Check if the query was executed correctly
                    if (!$result) {
                        die("Invalid query: " . $conn->error);
                    }

                    // Read data from each row
                    while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['date_created']; ?></td>
                            <td><?php echo $row['prison_id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td>
                                <?php if ($row['status'] == 1): ?>
                                    <span class="badge badge-success px-3 rounded-pill">Active</span>
                                <?php else: ?>
                                    <span class="badge badge-danger px-3 rounded-pill">Inactive</span>
                                <?php endif; ?>
                            </td>                
                            <td>
                            <div class="dropdown">
                                        <button class="dropbtn">Action</button>
                                        <div class="dropdown-content">                                       
                                            <div class="dropdown-divider"></div>
                                            <a href="edit_cell.php?id=<?php echo $row['id']; ?>">Edit</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="delete_cell.php?id=<?php echo $row['id']; ?>" onClick="return deldata('<?php echo $row['name']; ?>');">Delete</a>
                                        </div>
                                    </div>
                            </td>               
                        </tr>                                
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.dropbtn').forEach(btn => {
        btn.addEventListener('click', function(event) {
            event.preventDefault();

            // Close all dropdowns first
            document.querySelectorAll('.dropdown-content').forEach(dropdown => {
                dropdown.classList.remove('show');
            });

            // Toggle the clicked dropdown
            btn.nextElementSibling.classList.toggle('show');
            
            // Prevent event propagation to window.onclick
            event.stopPropagation();
        });
    });

    // Close the dropdown if the user clicks outside of it
    window.addEventListener('click', function() {
        document.querySelectorAll('.dropdown-content').forEach(dropdown => {
            dropdown.classList.remove('show');
        });
    });
});

function deldata(name){
if(confirm("ARE YOU SURE YOU WISH TO DELETE " + " " + name+ " " + " FROM THE DATABASE?"))
{
return  true;
}
else {return false;
}

}
</script>
<script src="script.js"></script>
</section>
<!-- CONTENT -->

<?php
$conn->close();
?>
