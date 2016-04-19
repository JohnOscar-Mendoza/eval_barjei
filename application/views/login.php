<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Log In</title>
	<!-- maxcdn bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<!-- maxcdn font awesome -->
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<!-- main stylesheet -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">

</head>
<body>

	<div class="container" id="log-in-container">
		<?php
		echo form_open("login/submit", ["class"=>"form-log-in"]);
		?>
		<?php
		echo form_error("username");
		?> 
		<?php
		echo form_error("password");
		?>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Please Log In</h3>
			</div>
			<div class="panel-body">
				<fieldset>
					<?php
					$username = [
					"name"=>"username",
					"id"=>"username",
					"class"=>"form-control",
					"placeholder"=>"Username",
					"autofocus"=>"autofocus"
					];
					$password = [
					"name"=>"password",
					"id"=>"password",
					"class"=>"form-control",
					"placeholder"=>"Password"
					];
					?>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
						<div class="form-group">
							<?php
							echo form_input($username, set_value("username"));
							?>
						</div>
					</div>
					<div class="divider"></div>
					<div class="input-group">
						<span class="input-group-addon" data-toggle="tooltip" data-placement="bottom" title="Minimum of 8 characters"><i class="fa fa-key fa-fw"></i></span>
						<div class="form-group">
							<?php
							echo form_password($password);
							?> 
						</div>
					</div>
				</fieldset>
			</div>
		</div>
		<?php
		$submit = [
		"id"=>"submit",
		"name"=>"submit",
		"value"=>"Log In",
		"class"=>"btn btn-primary btn-block"
		];
		echo form_submit($submit);
		echo anchor("user/forgotPassword", "Forgot Password?", ["id"=>"forgot-pass"]);
		echo form_close();
		?>
	</div>
</body>

<script src="<?php echo base_url('/assets/js/jquery.js'); ?>"></script>

<!-- Bootstrap Core JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script>
	$(function(){
		$('[data-toggle="tooltip"]').tooltip();
	});
</script>
</html>