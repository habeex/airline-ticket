<?php include '../partials/global.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Discount Airlines</title>
  <?php include '../partials/meta.php'; ?>
  <?php include '../partials/styles.php'; ?>
  <?php include '../partials/scripts.php'; ?>
  <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<?php include '../partials/navbar.php'; ?>	

	<div class="container">
		<div class="well">
			<div class="row">
				<div class="col-xs-12">
					<h1 class="text-center">Edit Airline</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<form action="edit_flight_provider.php" method="POST" class="form-horizontal">
						<div class="form-group">
							<label for="airlinecode-container" class="col-sm-6 col-xs-12 control-label">IATA 2-Character Code</label>
							<div class="col-sm-6 col-xs-12">
							<?php 
								$code = $_POST["airline_code"];

								$path = $_SERVER['DOCUMENT_ROOT'] . "/";

								require_once ($path . 'airline-ticket/php/connect.php');

								$sql = "SELECT * FROM airline WHERE airline_code = '".$code."';";
								$result = $db->query($sql);
								$row = mysqli_fetch_assoc($result);
								echo '<input type="text" name="code" class="form-control" id="airlinecode-container" value="'.$row['airline_code'].'" readonly>';
							?>
							</div>
						</div>
						<div class="form-group">
							<label for="name-container" class="col-sm-6 col-xs-12 control-label">Official Name of the Airline</label>
							<div class="col-sm-6 col-xs-12">
							<?php
								echo '<input type="text" name="name" class="form-control" id="name-container" value="'.$row['name'].'">';
							?>
							</div>
						</div>
						<div class="form-group">
							<label for="logo-container" class="col-sm-6 col-xs-12 control-label">URL to Airline Logo</label>
							<div class="col-sm-6 col-xs-12">
							<?php
								echo '<input type="text" name="url" class="form-control" id="logo-container" value="'.$row['logo'].'">';
							?>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-6 col-sm-offset-6 col-xs-12">
								<button class="btn btn-primary" type="submit">Edit Airline</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>