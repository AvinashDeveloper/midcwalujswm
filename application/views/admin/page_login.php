<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login page | Nifty - Admin Template</title>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
	<link href="<?=base_url(); ?>assets/admin/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?=base_url(); ?>assets/admin/css/nifty.min.css" rel="stylesheet">
	<link href="<?=base_url(); ?>assets/admin/css/demo/nifty-demo-icons.min.css" rel="stylesheet">
	<link href="<?=base_url(); ?>assets/admin/plugins/pace/pace.min.css" rel="stylesheet">
	<script src="<?=base_url(); ?>assets/admin/plugins/pace/pace.min.js"></script>
	<link href="<?=base_url(); ?>assets/admin/css/demo/nifty-demo.min.css" rel="stylesheet">
</head>
<body>
	<div id="container" class="cls-container">
		<div id="bg-overlay"></div>
		<div class="cls-content">
			<div class="cls-content-sm panel">
				<div class="panel-body">
					<div class="mar-ver pad-btm">
						<h1 class="h3">Account Login</h1>
						<p>Sign In to your account</p>
					</div>
					<div id="msg_div">
						<?php $this->load->view('admin/common_page/session_msg'); ?>
					</div>
					<form action="<?php echo base_url('admin/login'); ?>" method="post">
						<div class="form-group">
							<input type="text" class="form-control" name="username" placeholder="Username" autofocus>
						</div>
						<div class="form-group">
							<input type="password" class="form-control" name="password" placeholder="Password">
						</div>
						<div class="checkbox pad-btm text-left">
							<input id="demo-form-checkbox" class="magic-checkbox" type="checkbox">
							<label for="demo-form-checkbox">Remember me</label>
						</div>
						<button class="btn btn-primary btn-lg btn-block" type="submit">Sign In</button>
					</form>
				</div>
				<div class="pad-all">
					<!-- <a href="pages-password-reminder.html" class="btn-link mar-rgt">Forgot password ?</a> -->
					<a href="<?=base_url('admin/registration');?>" class="btn-link mar-lft">Create a new account</a>
					<!-- <div class="media pad-top bord-top">
					<div class="pull-right">
					<a href="#" class="pad-rgt"><i class="demo-psi-facebook icon-lg text-primary"></i></a>
					<a href="#" class="pad-rgt"><i class="demo-psi-twitter icon-lg text-info"></i></a>
					<a href="#" class="pad-rgt"><i class="demo-psi-google-plus icon-lg text-danger"></i></a>
					</div>
					<div class="media-body text-left text-bold text-main">
					Login with
					</div>
					</div> -->
				</div>
			</div>
		</div>
		<!-- <div class="demo-bg">
			<div id="demo-bg-list">
				<div class="demo-loading"><i class="psi-repeat-2"></i></div>
				<img class="demo-chg-bg bg-trans active" src="<?=base_url(); ?>assets/admin/img/bg-img/thumbs/bg-trns.jpg" alt="Background Image">
				<img class="demo-chg-bg" src="<?=base_url(); ?>assets/admin/img/bg-img/thumbs/bg-img-1.jpg" alt="Background Image">
				<img class="demo-chg-bg" src="<?=base_url(); ?>assets/admin/img/bg-img/thumbs/bg-img-2.jpg" alt="Background Image">
				<img class="demo-chg-bg" src="<?=base_url(); ?>assets/admin/img/bg-img/thumbs/bg-img-3.jpg" alt="Background Image">
				<img class="demo-chg-bg" src="<?=base_url(); ?>assets/admin/img/bg-img/thumbs/bg-img-4.jpg" alt="Background Image">
				<img class="demo-chg-bg" src="<?=base_url(); ?>assets/admin/img/bg-img/thumbs/bg-img-5.jpg" alt="Background Image">
				<img class="demo-chg-bg" src="<?=base_url(); ?>assets/admin/img/bg-img/thumbs/bg-img-6.jpg" alt="Background Image">
				<img class="demo-chg-bg" src="<?=base_url(); ?>assets/admin/img/bg-img/thumbs/bg-img-7.jpg" alt="Background Image">
			</div>
		</div> -->
	</div>
	<script src="<?=base_url(); ?>assets/admin/js/jquery.min.js"></script>
	<script src="<?=base_url(); ?>assets/admin/js/bootstrap.min.js"></script>
	<script src="<?=base_url(); ?>assets/admin/js/nifty.min.js"></script>
	<script src="<?=base_url(); ?>assets/admin/js/demo/bg-images.js"></script>
	<script>
		setTimeout(function() {
			$('#msg_div').hide('fast');
		}, 4000);
	</script>
</body>
</html>
