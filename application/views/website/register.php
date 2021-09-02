<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>Register page | Nifty - Admin Template</title>
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
			<div class="cls-content-lg panel">
				<div class="panel-body">
					<div class="mar-ver pad-btm">
						<h1 class="h3">Create a New Account</h1>
						<!-- <p>Come join the Nifty community! Let's set up your account.</p> -->
					</div>
					<form action="<?=base_url('Registration');?>" method="POST" id="registration_page">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Full name" name="fullname">
								</div>
								<div class="form-group">
									<input type="text" class="form-control" placeholder="E-mail" name="email">
								</div>
								<div class="form-group">
									<input type="file" class="form-control" placeholder="profile image" name="profile">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Username" name="username">
								</div>
								<div class="form-group">
									<input type="password" class="form-control" placeholder="Password" name="password">
								</div>
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Mobile" name="mobile">
								</div>
							</div>
						</div>
						<div class="checkbox pad-btm text-left form-group">
							<input id="demo-form-checkbox" class="magic-checkbox" type="checkbox" name="checkbox_value">
							<label for="demo-form-checkbox">I agree with the <a href="#" class="btn-link text-bold">Terms and Conditions</a></label>
						</div>
						<button class="btn btn-primary btn-lg btn-block" type="submit">Register</button>
					</form>
				</div>
				<div class="pad-all">
					Already have an account ? <a href="<?=base_url('Login');?>" class="btn-link mar-rgt text-bold">Sign In</a>
					<!-- <div class="media pad-top bord-top">
						<div class="pull-right">
							<a href="#" class="pad-rgt"><i class="demo-psi-facebook icon-lg text-primary"></i></a>
							<a href="#" class="pad-rgt"><i class="demo-psi-twitter icon-lg text-info"></i></a>
							<a href="#" class="pad-rgt"><i class="demo-psi-google-plus icon-lg text-danger"></i></a>
						</div>
						<div class="media-body text-left text-main text-bold">
							Sign Up with
						</div>
					</div> -->
				</div>
			</div>
		</div>
		<!-- <div class="demo-bg">
			<div id="demo-bg-list">
				<div class="demo-loading"><i class="psi-repeat-2"></i></div>
				<img class="demo-chg-bg bg-trans active" src="img/bg-img/thumbs/bg-trns.jpg" alt="Background Image">
				<img class="demo-chg-bg" src="img/bg-img/thumbs/bg-img-1.jpg" alt="Background Image">
				<img class="demo-chg-bg" src="img/bg-img/thumbs/bg-img-2.jpg" alt="Background Image">
				<img class="demo-chg-bg" src="img/bg-img/thumbs/bg-img-3.jpg" alt="Background Image">
				<img class="demo-chg-bg" src="img/bg-img/thumbs/bg-img-4.jpg" alt="Background Image">
				<img class="demo-chg-bg" src="img/bg-img/thumbs/bg-img-5.jpg" alt="Background Image">
				<img class="demo-chg-bg" src="img/bg-img/thumbs/bg-img-6.jpg" alt="Background Image">
				<img class="demo-chg-bg" src="img/bg-img/thumbs/bg-img-7.jpg" alt="Background Image">
			</div>
		</div> -->
	</div>
	<script src="<?=base_url(); ?>assets/admin/js/jquery.min.js"></script>
	<script src="<?=base_url(); ?>assets/admin/js/bootstrap.min.js"></script>
	<script src="<?=base_url(); ?>assets/admin/js/nifty.min.js"></script>
	<script src="<?=base_url(); ?>assets/admin/js/demo/bg-images.js"></script>
	<script src="<?=base_url();?>assets/admin/jquery.validate.min.js"></script>
	<script>
		$(document).ready(function() {
		var form = $('#registration_page');
		var errorHandler1 = $('.errorHandler', form);
		var successHandler1 = $('.successHandler', form);
		form.validate({
			errorElement: "span",
			errorClass: 'help-block',
			errorPlacement: function(error, element) {
				if (element.attr("type") == "radio" || element.attr("type") == "checkbox") {
					error.insertAfter($(element).closest('.form-group').children('div').children().last());
				} else if (element.attr("name") == "dd" || element.attr("name") == "mm" || element.attr("name") == "yyyy") {
					error.insertAfter($(element).closest('.form-group').children('div'));
				} else {
					error.insertAfter(element);
				}
			},
			ignore: "",
			rules: {
				fullname: {
					required: true
				},
				email: {
					required: true,
					email: true
				},
				username: {
					required: true
				},
				password: {
					required: true,
					minlength: 6
				},
				mobile: {
					required: true,
					minlength : 10,
					maxlength: 12
				},
				checkbox_value:{
					required:true
				}
			},
			invalidHandler: function(event, validator) { //display error alert on form submit
				successHandler1.hide();
				errorHandler1.show();
			},
			highlight: function(element) {
				$(element).closest('.help-block').removeClass('valid');
				$(element).closest('.form-group').removeClass('has-success').addClass('has-error').find('.symbol').removeClass('ok').addClass('required');
			},
			unhighlight: function(element) {
				$(element).closest('.form-group').removeClass('has-error');
			},
			success: function(label, element) {
				label.addClass('help-block valid');
				$(element).closest('.form-group').removeClass('has-error').addClass('has-success').find('.symbol').removeClass('required').addClass('ok');
			},
			submitHandler: function(form) {
				successHandler1.show();
				errorHandler1.hide();
				form.submit();
			}
		});
	});
	</script>
</body>
</html>
