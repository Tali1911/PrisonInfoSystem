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
        <h3>List of wardens</h3>
        <span><i class='bx bx-search' ></i></span>
        <span><i class='bx bx-filter' ></i></span>
            <a href="addwarden.php" class="btn-download">
      <span class="icon"><i class='bx bxs-cloud-download' ></i></span>
      <span class="text">+ Add warden</span>
    </a>
      </div>
      <table>
        <thead>
        <th ><div align="center"><span class="style1">#</span></div></th>
              <th><div align="center"><span class="style1">Photo</span></div></th>
              <th><div align="center"><span class="style1">Username</span></div></th>
              <th><div align="center"><span class="style1">Fullname</span></div></th>
              <th><div align="center"><span class="style1">Phone</span></div></th>
              <th><div align="center"><span class="style1">Action</span></div></th>

				     						    </tr>
        </thead>
        <tbody>
          <!-- <tr>
            <td>
              <img src="img/people.png" alt="Image">
              <span class="name">John Doe</span>
            </td>
            <td>29-10-2021</td>
            <td><span class="badge completed">Completed</span></td>
          </tr> -->
        <!-- Inmate records will be dynamically added here -->
        <?php
        //linking with the db      

        //reads all rows drom db
        $data = $dbh->query("SELECT *  FROM tbl_warden order by username DESC")->fetchAll();      

         //read data from each row
         $cnt=1;
         foreach ($data as $row) {
            ?>
                      <tr class="gradeX">
                      <td><div align="center" class="style2"><?php echo $cnt;  ?></div></td>
                       <td><div align="center" class="style2"><span class="controls"><img src="<?php echo $row['photo'];?>"  width="50" height="43" /></span></div></td>
                        <td><div align="center" class="style2"><?php echo $row['username'];  ?></div></td>
                        <td><div align="center" class="style2"><?php echo $row['fullname'];  ?></div></td>
                        <td><div align="center" class="style2"><?php echo $row['phone'];  ?></div></td>
			                   <td>
                           <div align="center">
                         <a href="delete-warden.php?uid=<?php echo $row['username'];?>" onClick="return deldata('<?php echo $row['fullname']; ?>');">Delete </a></div>
                            </td>
                    </tr>
                    <?php $cnt=$cnt+1;} ?>
             </tbody>
      </table>
    </div>
  </div>
</main>
</section>
<!-- CONTENT -->
<script type="text/javascript">

</script>
<script type="text/javascript">
		function deldata(fullname){
if(confirm("ARE YOU SURE YOU WISH TO DELETE " + " " + fullname+ " " + " FROM THE DATABASE?"))
{
return  true;
}
else {return false;
}

}

</script>

<script src="script.js"></script>