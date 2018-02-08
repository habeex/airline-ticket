<?php $path = $_SERVER['DOCUMENT_ROOT'] . "/"; ?>
<?php include( $path."views/partials/global.php" ); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Discount Airlines</title>
  <?php include( $path . "views/partials/meta.php" ); ?>
  <?php include( $path . "views/partials/styles.php" ); ?>
  <?php include( $path . "views/partials/scripts.php" ); ?>
</head>
<body>
	<?php include( $path . "views/partials/navbar.php" ); ?>
	<div class="container">
		<div class="well">
			<div class="row">
				<div class="col-xs-12">
					<h1 class="text-center">Create Airline</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<form action="new_flight_provider.php" method="POST" class="form-horizontal">
						<div class="form-group">
							<label for="airlinecode-container" class="col-sm-6 col-xs-12 control-label">IATA 2-Character Code</label>
							<div class="col-sm-6 col-xs-12">
								<input type="text" name="code" class="form-control" id="airlinecode-container" placeholder="2X">
							</div>
						</div>
						<div class="form-group">
							<label for="name-container" class="col-sm-6 col-xs-12 control-label">Official Name of the Airline</label>
							<div class="col-sm-6 col-xs-12">
								<input type="text" name="name" class="form-control" id="name-container" placeholder="Singapore Airlines">
							</div>
						</div>
						<div class="form-group">
							<label for="logo-container" class="col-sm-6 col-xs-12 control-label">URL to Airline Logo</label>
							<div class="col-sm-6 col-xs-12">
								<input type="text" name="url" class="form-control" id="logo-container" placeholder="http://img2.wikia.nocookie.net/__cb20100506081728/logopedia/images/f/fa/Singapore_Airlines.svg">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-6 col-sm-offset-6 col-xs-12">
								<button class="btn btn-primary" type="submit">Create Airline</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>