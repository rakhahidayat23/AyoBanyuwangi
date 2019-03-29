<!DOCTYPE html>
<html lang="en">
<head>
	<title>Ayo Banyuwangi </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSS -->
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href= "<?= base_url()?>assets/login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href= "<?= base_url()?>assets/login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href= "<?= base_url()?>assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href= "<?= base_url()?>assets/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href= "<?= base_url()?>assets/login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href= "<?= base_url()?>assets/login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href= "<?= base_url()?>assets/login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href= "<?= base_url()?>assets/login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href= "<?= base_url()?>assets/login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href= "<?= base_url()?>assets/login/css/util.css">
	<link rel="stylesheet" type="text/css" href= "<?= base_url()?>assets/login/css/main.css">

<!-- SCRIPT -->
<!--===============================================================================================-->
<script src= "<?= base_url()?>assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src= "<?= base_url()?>assets/login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src= "<?= base_url()?>assets/login/vendor/bootstrap/js/popper.js"></script>
	<script src= "<?= base_url()?>assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src= "<?= base_url()?>assets/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src= "<?= base_url()?>assets/login/vendor/daterangepicker/moment.min.js"></script>
	<script src= "<?= base_url()?>assets/login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src= "<?= base_url()?>assets/login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src= "<?= base_url()?>assets/login/js/main.js"></script>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(<?= base_url()?>assets/login/images/bg-01.jpg);">
					<span class="login100-form-title-1" id="title">
						Sign In
					</span>
				</div>
				<?php if(!empty($this->session->flashdata('success_message') )){ ?>
					<div class="alert alert-success alert-dismissible fade show">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>Success!</strong> <?= $this->session->flashdata('success_message') ?>.
					</div>
				<?php } ?>
				<?php if(!empty($this->session->flashdata('error_message') )){ ?>
					<div class="alert alert-danger alert-dismissible fade show">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>Error!</strong> <?= $this->session->flashdata('error_message')?>.
					</div>
				<?php } ?>
				<form action="<?= $action_login; ?>" method="post" class="login100-form validate-form" id="form_login">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" placeholder="Enter username">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember_me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>

						<div>
							<a href= "<?= base_url()?>assets/login/#" class="txt1">
								Forgot Password?
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<div class="row">
							<div class="col align-self-start">
								<button class="login100-form-btn"><?= $button_Login ?></button>
							</div>
							<div class="col align-self-end">
								<a id="btn_register" href="#" class="login100-form-btn"><?= $button_register ?></a>
							</div>
						</div>
					</div>
				</form>
				<form action="<?= $action_register; ?>" method="post" class="login100-form validate-form" id="form_register" enctype="multipart/form-data">
					<div class="wrap-input100 validate-input m-b-26">
						<span class="label-input100">Name</span>
						<input class="input100" type="text" name="name" placeholder="Enter name" required>
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" placeholder="Enter username" required>
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-18">
						<span class="label-input100">Email</span>
						<input class="input100" type="email" name="email" placeholder="Enter email" required>
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-18">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="Enter password" required>
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-18">
						<span class="label-input100">Re-Password</span>
						<input class="input100" type="password" name="re_password" placeholder="Enter re-password" required>
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-18">
						<span class="label-input100">Phone</span>
						<input class="input100" type="text" name="phone" placeholder="Enter phone" required>
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-18">
						<span class="label-input100">Image</span>
						<input class="form-control" type="file" id="image" accept="image/*" name="image" required>
					</div>
					<div class="wrap-input100 validate-input m-b-18">
						<span class="label-input100">Type</span>
						<select class="form-control" name="type" required>
							<option value="3">Umum</option>
							<option value="2">UMKM</option>
						</select>
					</div>
					<div class="container-login100-form-btn">
						<div class="row">
							<div class="col align-self-start">
								<a id="btn_login" href="#" class="login100-form-btn"><?= $button_Login ?></a>
							</div>
							<div class="col align-self-end">
								<button class="login100-form-btn"><?= $button_register ?></button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script>
	$(document).ready(function(){
		$("#form_register").hide();

		$("#btn_register").click(function(){
			$("#form_login").hide();
			$("#form_register").show();
			$("#title").text('REGISTER')
		});
		$("#btn_login").click(function(){
			$("#form_login").show();
			$("#form_register").hide();
			$("#title").text('SIGN IN')
		});
	});
	</script>

</body>
</html>