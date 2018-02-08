<?php $path = $_SERVER['DOCUMENT_ROOT'] . "/"; ?>
<?php include( $path . "views/partials/global.php" ); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Discount Airlines - Create Account</title>
  <?php include( $path . "views/partials/meta.php" ); ?>
  <?php include( $path . "views/partials/styles.php" ); ?>
  <?php include( $path . "views/partials/scripts.php" ); ?>
</head>
<body>
	<?php include( $path . 'views/partials/navbar.php' ); 

		require_once ($path . 'php/connect.php');

		$email = $_SESSION["logged"];
		$self = "1";
		$exists = 0;
		$values = 0;

		$sql = "SELECT * FROM passenger WHERE user_email = '".$email."' AND self = '".$self."';";
		$result = $db->query($sql);
		while ($row = mysqli_fetch_assoc($result)) {
			$exists = 1;
			$value = $row;
		}


	?>
	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-xs-12">
				<ul class="nav nav-pills nav-stacked">
					<li class="active"><a href="profile.php">Profile</a></li>
					<li><a href="bookings.php">Bookings</a></li>
					<li><a href="passengers.php">Passengers</a></li>
				</ul>
			</div>
			<div class="col-sm-8 col-xs-12">
				<form action="save_profile.php" class="form-horizontal" method="POST">
					<div class="form-group">
						<label for="fn-container" class="col-sm-6 col-xs-12">First Name</label>
						<div class="col-sm-6 col-xs-12">
						<?php	
						if ($exists)
							echo '<input type="text" class="form-control" name="passenger-firstname" id="fn-container" value="'.$value['first_name'].'">';
						else
							echo '<input type="text" class="form-control" name="passenger-firstname" id="fn-container">';
						?>
						</div>
					</div>
					<div class="form-group">
						<label for="ln-container" class="col-sm-6 col-xs-12">Last Name</label>
						<div class="col-sm-6 col-xs-12">
						<?php	
						if ($exists)
							echo '<input type="text" class="form-control" name="passenger-lastname" id="ln-container" value="'.$value['last_name'].'">';
						else
							echo '<input type="text" class="form-control" name="passenger-lastname" id="ln-container">';
						?>
						<input type="hidden" class="form-control" name="self" id="ln-container" value="1">
						</div>
					</div>
					<div class="form-group">
						<label for="ph-container" class="col-sm-6 col-xs-12">Phone</label>
						<div class="col-sm-6 col-xs-12">
						<?php	
						if ($exists)
							echo '<input type="text" class="form-control" name="passenger-phone" id="ph-container" value="'.$value['phone'].'">';
						else
							echo '<input type="text" class="form-control" name="passenger-phone" id="ph-container">';
						?>
						</div>
					</div>
					<div class="form-group">
						<label for="pass-container" class="col-sm-6 col-xs-12">Passport</label>
						<div class="col-sm-6 col-xs-12">
						<?php	
						if ($exists)
							echo '<input type="text" class="form-control" name="passenger-passport" id="pass-container" value="'.$value['passport'].'">';
						else
							echo '<input type="text" class="form-control" name="passenger-passport" id="pass-container">';
						?>
						</div>
					</div>
					<div class="form-group">
						<label for="country-container" class="col-sm-6 col-xs-12">Country</label>
						<div class="col-sm-6 col-xs-12">
						<?php	
						if ($exists)
							echo '<input type="text" class="form-control" name="passenger-country" id="country-container" value="'.$value['country'].'">';
						else
							echo '<input type="text" class="form-control" name="passenger-country" id="country-container">';
						?>
						</div>
					</div>
					<div class="form-group">
						<label for="diet-container" class="col-sm-6 col-xs-12">Diet</label>
						<div class="col-sm-6 col-xs-12">
						<?php	
						if ($exists) {
							echo '<select id="diet-container" name="diet" class="form-control">';
							if ($value['diet'] == "Vegetarian") {
								echo '<option value="Vegetarian" selected="selected">Vegetarian</option>';
								echo '<option value="Non-Vegetarian">Non-Vegetarian</option>';
								echo '<option value="Halal">Halal</option>';
							} else if ($value['diet'] == "Non-Vegetarian") {
								echo '<option value="Vegetarian" >Vegetarian</option>';
								echo '<option value="Non-Vegetarian" selected="selected">Non-Vegetarian</option>';
								echo '<option value="Halal">Halal</option>';
							} else {
								echo '<option value="Vegetarian">Vegetarian</option>';
								echo '<option value="Non-Vegetarian">Non-Vegetarian</option>';
								echo '<option value="Halal" selected="selected">Halal</option>';
							}
						}
						else
							echo '<select id="diet-container" name="diet" class="form-control">';
							echo '<option value="Vegetarian">Vegetarian</option>';
							echo '<option value="Non-Vegetarian">Non-Vegetarian</option>';
							echo '<option value="Halal">Halal</option>';
							echo '</select>';
						?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12">
							<button class="btn btn-primary pull-right" type="submit">Save</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>