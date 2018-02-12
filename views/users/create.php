<?php include '../partials/global.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Discount Airlines - Create Account</title>
	<?php include '../partials/meta.php'; ?>
	<?php include '../partials/styles.php'; ?>
	<?php include '../partials/scripts.php'; ?>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include '../partials/navbar.php';  ?>
<?php if(isset($_SESSION["valid"])){
			if(!$_SESSION["valid"]){
				unset($_SESSION["valid"]);
				echo '<center><h3 style="color:red">User Already Exists</h3></center>';
			}	
		} ?>
	<div class="container">
			<div class="well">
				<div class="row">
					<div class="col-xs-12">
						<h1 class="text-center">Register</h1>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<form class="form-horizontal" action="new_user.php" method="POST">
							<div class="form-group">
								<label for="email-container" class="col-sm-6 col-xs-12 control-label">
									Email
								</label>
								<div class="col-sm-6 col-xs-12">
									<input type="text" name="email" class="form-control" id="email-container" placeholder="bob@abc.com">
								</div>
							</div>
							<div class="form-group">
								<label for="pwd-container" class="col-sm-6 col-xs-12 control-label">
									Password
								</label>
								<div class="col-sm-6 col-xs-12">
									<input type="password" name="password" class="form-control" id="pwd-container" placeholder="Make sure this is easy to remember">
								</div>
							</div>
							<div class="form-group">
								<label for="pwd2-container" class="col-sm-6 col-xs-12 control-label">
									Password Confirmation
								</label>
								<div class="col-sm-6 col-xs-12">
									<input type="password" class="form-control" id="pwd2-container" placeholder="Repeat your password">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-6 col-sm-6 col-xs-12">
									<button type="submit" class="btn btn-primary">Register</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>