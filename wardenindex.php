<?php
include ('header.php');
include ('navbar.php');
include("../admin/inc/adminfetch.php");
if(empty($_SESSION['admin-username']))
    {
      header("Location: ../../adminlogin.php");
    }
?>



	<!-- CONTENT -->
	<section id="content">

		<main>
			<div class="top">
				<div class="left">
					<h1 class="title">Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li class="arrow-icon"><i class='bx bx-chevron-right'></i></li>
						<li>
							<a href="#" class="active">Home</a>
						</li>
					</ul>
				 </div>
				 <!-- <a href="#" class="btn-download">
					<span class="icon"><i class='bx bxs-cloud-download' ></i></span>
					<span class="text">Download PDF</span>
				</a> -->
			</div>
			<div class="box-info">
				<div class="box">
					<span class="icon"><i class='bx bxs-calendar-check'></i></span>
					<div class="text">
						<h3><?php echo $row_no_users; ?></h3>
						<p>No. of wardens</p>
					</div>
				</div>
				<div class="box">
					<span class="icon"><i class='bx bxs-group' ></i></span>
					<div class="text">
						<h3><?php echo $row_no_visitors; ?></h3>
						<p>Visitors</p>
					</div>
				</div>
				<div class="box">
					<span class="icon"><i class='bx bxs-dollar-circle' ></i></span>
					<div class="text">
						<h3><?php echo $row_no_prisons; ?></h3>
						<p>Prison Facilities</p>
					</div>
				</div>
				<div class="box">
					<span class="icon"><i class='bx bxs-dollar-circle' ></i></span>
					<div class="text">
						<h3><?php echo $row_no_prisons; ?></h3>
						<p>Prison Facilities</p>
					</div>
				</div>
				<div class="box">
					<span class="icon"><i class='bx bxs-dollar-circle' ></i></span>
					<div class="text">
						<h3><?php echo $row_no_prisons; ?></h3>
						<p>Prison Facilities</p>
					</div>
				</div>				<div class="box">
					<span class="icon"><i class='bx bxs-dollar-circle' ></i></span>
					<div class="text">
						<h3><?php echo $row_no_prisons; ?></h3>
						<p>Prison Facilities</p>
					</div>
				</div>
			</div>
			
		</main>
	</section>
	<!-- CONTENT -->


	<script src="script.js"></script>
