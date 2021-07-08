<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>MoneyBook | <?= $title ?></title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="<?= base_url() ?>assets/img/icon.svg" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="<?= base_url() ?>assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['<?= base_url() ?>assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	<!-- CSS Files -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/atlantis.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/morris.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/daterangepicker.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/datepicker.css">

</head>
<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue">
				
				<a href="<?= base_url('dashboard') ?>" class="logo">
					<img src="<?= base_url() ?>assets/img/logo.svg" alt="navbar brand" class="navbar-brand">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
				<div class="container-fluid">
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="text-white  nav-item mt-3 mr-3">
							<p><i class="fas fa-calendar-alt mr-3"></i><?= date('d F Y'); ?></p>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="<?= base_url() ?>assets/img/<?= $pengguna['foto']; ?>" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											<div class="avatar-lg"><img src="<?= base_url() ?>assets/img/<?= $pengguna['foto']; ?>" alt="image profile" class="avatar-img rounded"></div>
											<div class="u-text">
												<h4><?= $pengguna['nama']; ?></h4>
												<p class="text-muted"><?= $pengguna['email']; ?></p><a href="<?= base_url('profile') ?>" class="btn btn-xs btn-secondary btn-sm">View Profile</a>
											</div>
										</div>
									</li>
									<li>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="<?= base_url('logout') ?>">Logout</a>
									</li>
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<ul class="nav nav-primary">
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">MENU</h4>
						</li>
						<li  <?=$this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '' ? 'class="nav-item active"' : 'class="nav-item" ' ?>>
							<a href="<?= base_url('dashboard') ?>">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li <?=$this->uri->segment(1) == 'kategori_pemasukan' || $this->uri->segment(1) == 'kategori_pengeluaran'  ? 'class="nav-item active submenu"' : 'class="nav-item" ' ?>>
							<a data-toggle="collapse" href="#kategori">
								<i class="fas fa-layer-group"></i>
								<p>Kategori</p>
								<span class="caret"></span>
							</a>
							<div id="kategori" <?=$this->uri->segment(1) == 'kategori_pemasukan' || $this->uri->segment(1) == 'kategori_pengeluaran'  ? 'class="collapse show"' : 'class="collapse"' ?>>
								<ul class="nav nav-collapse">
									<li <?=$this->uri->segment(1) == 'kategori_pemasukan' ? 'class="active"' : '' ?>>
										<a href="<?= base_url('kategori_pemasukan') ?>">
											<span class="sub-item">Pemasukan</span>
										</a>
									</li>
									<li <?=$this->uri->segment(1) == 'kategori_pengeluaran' ? 'class="active"' : '' ?>>
										<a href="<?= base_url('kategori_pengeluaran') ?>">
											<span class="sub-item">Pengeluaran</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li <?=$this->uri->segment(1) == 'pemasukan' || $this->uri->segment(1) == 'pengeluaran'  ? 'class="nav-item active submenu"' : 'class="nav-item" ' ?>>
							<a data-toggle="collapse" href="#transaksi">
								<i class="fas fa-file-signature"></i>
								<p>Transaksi</p>
								<span class="caret"></span>
							</a>
							<div id="transaksi" <?=$this->uri->segment(1) == 'pemasukan' || $this->uri->segment(1) == 'pengeluaran'  ? 'class="collapse show"' : 'class="collapse"' ?>>
								<ul class="nav nav-collapse">
									<li <?=$this->uri->segment(1) == 'pemasukan' ? 'class="active"' : '' ?>>
										<a href="<?= base_url('pemasukan') ?>">
											<span class="sub-item">Pemasukan</span>
										</a>
									</li>
									<li <?=$this->uri->segment(1) == 'pengeluaran' ? 'class="active"' : '' ?>>
										<a href="<?= base_url('pengeluaran') ?>">
											<span class="sub-item">Pengeluaran</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li <?=$this->uri->segment(1) == 'data_karyawan' || $this->uri->segment(1) == 'gaji_karyawan'  ? 'class="nav-item active submenu"' : 'class="nav-item" ' ?>>
							<a data-toggle="collapse" href="#karyawan">
								<i class="fas fa-users"></i>
								<p>Gaji Karyawan</p>
								<span class="caret"></span>
							</a>
							<div id="karyawan" <?=$this->uri->segment(1) == 'data_karyawan' || $this->uri->segment(1) == 'gaji_karyawan'  ? 'class="collapse show"' : 'class="collapse"' ?>>
								<ul class="nav nav-collapse">
									<li <?=$this->uri->segment(1) == 'data_karyawan' ? 'class="active"' : '' ?>>
										<a href="<?= base_url('data_karyawan') ?>">
											<span class="sub-item">Karyawan</span>
										</a>
									</li>
									<li <?=$this->uri->segment(1) == 'gaji_karyawan' ? 'class="active"' : '' ?>>
										<a href="<?= base_url('gaji_karyawan') ?>">
											<span class="sub-item">Penggajian</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
<!-- Header -->