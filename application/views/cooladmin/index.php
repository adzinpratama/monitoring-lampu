<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags-->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template"> -->

	<!-- Title Page-->
	<title><?= ucfirst($this->session->userdata('username')) . ' || ' . strtoupper($this->uri->segment(1)); ?></title>

	<!-- Fontfaces CSS-->
	<link href="<?= base_url('assets/cooladmin/'); ?>css/font-face.css" rel="stylesheet" media="all">
	<link href="<?= base_url('assets/cooladmin/'); ?>vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
	<link href="<?= base_url('assets/cooladmin/'); ?>vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
	<link href="<?= base_url('assets/cooladmin/'); ?>vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

	<!-- Bootstrap CSS-->
	<link href="<?= base_url('assets/cooladmin/'); ?>vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

	<!-- Vendor CSS-->
	<link href="<?= base_url('assets/cooladmin/'); ?>vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
	<link href="<?= base_url('assets/cooladmin/'); ?>vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
	<link href="<?= base_url('assets/cooladmin/'); ?>vendor/wow/animate.css" rel="stylesheet" media="all">
	<link href="<?= base_url('assets/cooladmin/'); ?>vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
	<link href="<?= base_url('assets/cooladmin/'); ?>vendor/slick/slick.css" rel="stylesheet" media="all">
	<link href="<?= base_url('assets/cooladmin/'); ?>vendor/select2/select2.min.css" rel="stylesheet" media="all">
	<link href="<?= base_url('assets/cooladmin/'); ?>vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

	<!-- Main CSS-->
	<link href="<?= base_url('assets/cooladmin/'); ?>css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
	<!-- Jquery JS-->
	<script src="<?= base_url('assets/cooladmin/'); ?>vendor/jquery-3.2.1.min.js"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<div class="page-wrapper">
		<!-- HEADER MOBILE-->
		<header class="header-mobile d-block d-lg-none">
			<div class="header-mobile__bar">
				<div class="container-fluid">
					<div class="header-mobile-inner">
						<a class="logo" href="index.html">
							<img src="images/icon/logo.png" alt="CoolAdmin" />
						</a>
						<button class="hamburger hamburger--slider" type="button">
							<span class="hamburger-box">
								<span class="hamburger-inner"></span>
							</span>
						</button>
					</div>
				</div>
			</div>
			<nav class="navbar-mobile">
				<div class="container-fluid">
					<ul class="navbar-mobile__list list-unstyled">
						<li>
							<a href="<?= site_url('dashboard'); ?>">
								<i class="fas fa-tachometer-alt"></i>Dashboard</a>
						</li>
						<li>
							<a href="<?= site_url('monitoring'); ?>">
								<i class="fas fa-desktop"></i>Monitoring</a>
						</li>
						<?php if ($this->session->userdata('group') == 'admin') : ?>
							<li>
								<a href="<?= site_url('user'); ?>">
									<i class="fas fa-users"></i>User</a>
							</li>
						<?php endif; ?>
					</ul>
				</div>
			</nav>
		</header>
		<!-- END HEADER MOBILE-->

		<!-- MENU SIDEBAR-->
		<aside class="menu-sidebar d-none d-lg-block">
			<div class="logo">
				<a>
					<img src="<?= base_url('assets/img/poltek.png'); ?>" width="30%" alt="Cool Admin" />
					Monitoring Lampu
				</a>
			</div>
			<div class="menu-sidebar__content js-scrollbar1">
				<nav class="navbar-sidebar">
					<ul class="list-unstyled navbar__list">
						<li>
							<a href="<?= site_url('dashboard'); ?>">
								<i class="fas fa-tachometer-alt"></i>Dashboard</a>
						</li>
						<li>
							<a href="<?= site_url('monitoring'); ?>">
								<i class="fas fa-desktop"></i>Monitoring</a>
						</li>
						<?php if ($this->session->userdata('group') == 'admin') : ?>
							<li>
								<a href="<?= site_url('user'); ?>">
									<i class="fas fa-users"></i>User</a>
							</li>
						<?php endif; ?>
					</ul>
				</nav>
			</div>
		</aside>
		<!-- END MENU SIDEBAR-->

		<!-- PAGE CONTAINER-->
		<div class="page-container">
			<!-- HEADER DESKTOP-->
			<header class="header-desktop">
				<div class="section__content section__content--p30">
					<div class="container-fluid">
						<div class="header-wrap">
							<form class="form-header" action="" method="POST">
								<!-- <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button> -->
							</form>
							<div class="header-button">
								<div class="account-wrap">
									<div class="account-item clearfix js-item-menu">
										<!-- <div class="image">
                                            <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                        </div> -->
										<div class="content">
											<a class="js-acc-btn" href="#"><?= $this->session->userdata['username']; ?></a>
										</div>
										<div class="account-dropdown js-dropdown">
											<div class="info clearfix">
												<!-- <div class="image">
                                                    <a href="#">
                                                        <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                                    </a>
                                                </div> -->
												<div class="content">
													<h5 class="name">
														<a href="#"><?= $this->session->userdata['username']; ?></a>
													</h5>
													<span class="email"><?= $this->session->userdata['email']; ?></span>
												</div>
											</div>
											<div class="account-dropdown__body">
												<div class="account-dropdown__item">
													<a href="#">
														<i class="zmdi zmdi-account"></i>Edit Profil</a>
												</div>
												<!-- <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-money-box"></i>Billing</a>
                                                </div> -->
											</div>
											<div class="account-dropdown__footer">
												<a href="<?= site_url('user/logout'); ?>">
													<i class="zmdi zmdi-power"></i>Logout</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>
			<!-- HEADER DESKTOP-->

			<!-- MAIN CONTENT-->

			<?php $this->load->view($page); ?>


			<!-- END MAIN CONTENT-->
			<!-- END PAGE CONTAINER-->
		</div>

	</div>


	<!-- Bootstrap JS-->
	<script src="<?= base_url('assets/cooladmin/'); ?>vendor/bootstrap-4.1/popper.min.js"></script>
	<script src="<?= base_url('assets/cooladmin/'); ?>vendor/bootstrap-4.1/bootstrap.min.js"></script>
	<!-- Vendor JS       -->
	<script src="<?= base_url('assets/cooladmin/'); ?>vendor/slick/slick.min.js">
	</script>
	<script src="<?= base_url('assets/cooladmin/'); ?>vendor/wow/wow.min.js"></script>
	<script src="<?= base_url('assets/cooladmin/'); ?>vendor/animsition/animsition.min.js"></script>
	<script src="<?= base_url('assets/cooladmin/'); ?>vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
	</script>
	<script src="<?= base_url('assets/cooladmin/'); ?>vendor/counter-up/jquery.waypoints.min.js"></script>
	<script src="<?= base_url('assets/cooladmin/'); ?>vendor/counter-up/jquery.counterup.min.js">
	</script>
	<script src="<?= base_url('assets/cooladmin/'); ?>vendor/circle-progress/circle-progress.min.js"></script>
	<script src="<?= base_url('assets/cooladmin/'); ?>vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
	<script src="<?= base_url('assets/cooladmin/'); ?>vendor/chartjs/Chart.bundle.min.js"></script>
	<script src="<?= base_url('assets/cooladmin/'); ?>vendor/select2/select2.min.js">
	</script>

	<!-- Main JS-->
	<script src="<?= base_url('assets/cooladmin/'); ?>js/main.js"></script>
	<script>
		$('a[href~="' + location.href + '"]').parents('li').addClass('active highlight')
	</script>

</body>

</html>
<!-- end document-->
