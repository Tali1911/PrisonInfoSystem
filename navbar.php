<?php
include("../admin/inc/adminfetch.php");
if(empty($_SESSION['admin-username']))
    {
      header("Location: adminlogin.php");
    }
?>
<section id="sidebar">
		<a href="#" class="logo">
			<span class="icon"><i class='bx bxs-smile'></i></span>
			<span class="navlink">Kenya Prison Service</span>
		</a>
		<ul class="side-menu">
			<li class="active">
				<a href="index.php">
					<span class="icon"><i class='bx bxs-dashboard' ></i></span>
					<span class="navlink">Dashboard</span>
				</a>
				<span class="top"></span>
				<span class="bottom"></span>
			</li>
			<li>
				<a href="view_inmates.php">
					<span class="icon"><i class='bx bx-user-circle' ></i></span>
					<span class="navlink">Inmate List</span>
				</a>
				<span class="top"></span>
				<span class="bottom"></span>
			</li>
			<li>
				<a href="view_visitors.php">
					<span class="icon"><i class='bx bx-folder' ></i></span>
					<span class="navlink">Visitors List</span>
				</a>
				<span class="top"></span>
				<span class="bottom"></span>
			</li>
			<li>
				<a href="view_prisons.php">
					<span class="icon"><i class='bx bx-list-ol' ></i></span>
					<span class="navlink">Prison List</span>
				</a>
				<span class="top"></span>
				<span class="bottom"></span>
			</li>
            <li>
				<a href="view_cell.php">
					<span class="icon"><i class='bx bx-list-ul' ></i></span>
					<span class="navlink">Cellblock List</span>
				</a>
				<span class="top"></span>
				<span class="bottom"></span>
			</li>
            <li>
				<a href="view_crimes.php">
					<span class="icon"><i class='bx bx-book-open' ></i></span>
					<span class="navlink">Crime List</span>
				</a>
				<span class="top"></span>
				<span class="bottom"></span>
			</li>
            <li>
				<a href="view_action.php">
					<span class="icon"><i class='bx bxs-group' ></i></span>
					<span class="navlink">Action List</span>
				</a>
				<span class="top"></span>
				<span class="bottom"></span>
			</li>
			<li>
				<a href="view_wardenlist.php">
					<span class="icon"><i class='bx bxs-group' ></i></span>
					<span class="navlink">Staff</span>
				</a>
				<span class="top"></span>
				<span class="bottom"></span>
			</li>
		</ul>

		<ul class="side-menu bottom">
			<li>
				<a href="#">
					<span class="icon"><i class='bx bxs-cog' ></i></span>
					<span class="navlink">Settings</span>
				</a>
			</li>
			<li>
				<a href="adminlogout.php" class="logout">
					<span class="icon"><i class='bx bxs-log-out-circle' ></i></span>
					<span class="navlink">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->


	<!-- CONTENT -->
	<section id="content">
		<nav>
			<span class="menu-bar"><i class='bx bx-menu' ></i></span>
			<a href="#" class="link-nav"></a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-icon"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<!-- <a href="#" class="notification">
				<span class="icon"><i class='bx bxs-bell' ></i></span>
				<span class="num">8</span>
			</a> -->
			<a href="#" class="profile">
				<span class="name"><?php echo $admin_fullname; ?></span>
				<img src="<?php echo $admin_photo;?> " alt="Image">
			</a>
			<span class="curve"></span>
		</nav>
    </section>