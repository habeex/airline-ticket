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
	<?php include( $path . "views/partials/navbar.php" ); 
	require_once $path.'php/connect.php'; ?>
	<div class="container">
		<div class="well">
			<div class="row">
				<div class="col-xs-12">
					<h1 class="text-center">Create Flight</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<form action="new.php" method="post" class="form-horizontal">
						<div class="form-group">
							<label for="flightid-container" class="col-sm-6 col-xs-12 control-label">
							Flight Code
							</label>
							<div class="col-sm-6 col-xs-12">
								<input type="text" name="flight_id" class="form-control" id="flightid-container" placeholder="MI467">
							</div>
						</div>
						<div class="form-group">
							<label for="depart-container" class="col-sm-6 col-xs-12 control-label">
							Departing Airport
							</label>
							<div class="col-sm-6 col-xs-12">
								<input type="text" name="departure" class="form-control" id="depart-container" placeholder="SIN - Changi Intl Airport">
							</div>
						</div>
						<div class="form-group">
							<label for="departtime-container" class="col-sm-6 col-xs-12 control-label">
							Departing Date/Time
							</label>
							<div class="col-sm-6 col-xs-12">
								<input type="datetime-local" name="departure_date" class="form-control" id="departtime-container">
							</div>
						</div>
						<div class="form-group">
							<label for="arrive-container" class="col-sm-6 col-xs-12 control-label">
							Arriving Airport
							</label>
							<div class="col-sm-6 col-xs-12">
								<input type="text" class="form-control" name="arrival" id="arrive-container" placeholder="COK - Kochi Intl Airport">
							</div>
						</div>
						<div class="form-group">
							<label for="arrivetime-container" class="col-sm-6 col-xs-12 control-label">
							Arriving Date/Time
							</label>
							<div class="col-sm-6 col-xs-12">
								<input type="datetime-local" name="arrival_date" class="form-control" id="arrivetime-container">
							</div>
						</div>
						<div class="form-group">
							<label for="passlimit-container" class="col-sm-6 col-xs-12 control-label">
							Total number of passengers
							</label>
							<div class="col-sm-6 col-xs-12">
								<input type="number" class="form-control" name="passenger_limit" id="passlimit-container" min="1" value="100">
							</div>
						</div>
						<div class="form-group">
							<label for="price-container" class="col-sm-6 col-xs-12 control-label">
							Price per Seat
							</label>
							<div class="col-sm-6 col-xs-12">
								<input type="number" class="form-control" name="price" id="price-container" min="0" value="0">
							</div>
						</div>
						<div class="form-group">
							<label for="airline-container" class="col-sm-6 col-xs-12 control-label">
							Operating Airlines	
							</label>
							<div class="col-sm-6 col-xs-12">
								<select name="airline_code" id="airline-container" class="form-control">
									<?php 
									$sql = "SELECT a.airline_code, a.name FROM airline a;";

          							$res = $db->query($sql);

          							while ($row = mysqli_fetch_assoc($res)) { 
          								echo '<option value="'.$row['airline_code'].'">'.$row['name'].'</option>';
          							}


          							?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="status-container" class="col-sm-6 col-xs-12 control-label">Status</label>
							<div class="col-sm-6 col-xs-12">
								<select name="status" id="status-container" class="form-control">
									<option value="scheduled">Scheduled</option>
									<option value="ontime">On Time</option>
									<option value="delayed">Delayed</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-6 col-sm-offset-6 col-xs-12">
								<button type="submit" class="btn btn-primary">Create Flight</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>