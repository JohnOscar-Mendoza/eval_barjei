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
	<title>Forgot Password</title>
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
		echo form_open("user/sendEmail", ["class"=>"form-log-in"]);
		?>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Input Email</h3>
			</div>
			<div class="panel-body">
				<fieldset>
					<?php
					$email = [
					"name" => "email",
					"id" => "email",
					"class" => "form-control",
					"placeholder" => "Email",
					"autofocus" => "autofocus",
					"required" => "requried"
					];
					?>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
						<div class="form-group">
							<?php
							echo form_input($email, set_value("email"));
							?>
						</div>
					</div>
				</fieldset>
			</div>
		</div>
		<?php
		$submit = [
		"id"=>"forgot",
		"name"=>"forgot",
		"value"=>"Send New Password",
		"class"=>"btn btn-warning btn-block"
		];
		echo form_submit($submit);
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