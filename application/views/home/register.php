<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>MoneyBook | Register</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="<?= base_url() ?>assets/img/icon.svg" type="image/x-icon"/>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/my-login.css">
</head>

<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<img src="<?= base_url() ?>assets/img/icon.svg" alt="logo">
					</div>
					<div class="card fat mb-5">
						<div class="card-body">
							<h4 class="card-title">Register</h4>
							<?php if ($this->session->flashdata('success')) { ?>
								<div class="alert alert-success alert-dismissible fade show" role="alert">
									<?= $this->session->flashdata('success') ?>
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
							<?php } elseif ($this->session->flashdata('error')) { ?>
								<div class="alert alert-danger alert-dismissible fade show" role="alert">
									<?= $this->session->flashdata('error') ?>
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
							<?php } ?>
							<form id="register" class="my-login-validation" method="POST" action="<?= base_url('register') ?>">
								<div class="form-group">
									<label for="nama">Nama</label>
									<input id="nama" type="text" class="form-control" name="nama" required>
								</div>

								<div class="form-group">
									<label for="email">E-Mail </label>
									<input id="email" type="email" class="form-control" name="email" required>
								</div>

								<div class="form-group">
									<label for="password">Password</label>
									<input id="password" type="password" class="form-control" name="password" required data-eye>
								</div>

                                <div class="form-group">
									<label for="no_hp">Nomer Handphone </label>
									<input id="no_hp" type="no_hp" class="form-control" name="no_hp" required>
								</div>

                                <div class="form-group">
									<label for="alamat">Alamat </label>
									<input id="alamat" type="alamat" class="form-control" name="alamat" required>
								</div>

								<div class="form-group mt-4">
									<button type="submit" class="btn btn-primary btn-block">
										Register
									</button>
								</div>
								<div class="mt-4 text-center">
									Sudah memiliki akun? <a href="<?= base_url('login') ?>">Login</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="<?= base_url() ?>assets/js/my-login.js"></script>
</body>
</html>