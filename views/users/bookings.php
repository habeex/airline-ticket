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
	<?php include( $path . "views/partials/navbar.php" ); ?>
	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-xs-12">
				<ul class="nav nav-pills nav-stacked">
					<li><a href="profile.php">Profile</a></li>
					<li class="active"><a href="bookings.php">Bookings</a></li>
					<li><a href="passengers.php">Passengers</a></li>
				</ul>
			</div>
			<div class="col-sm-8 col-xs-12">
				<ul class="list-group">
				<?php 
				require_once $path.'/php/connect.php';
				$sql_forward = sprintf('SELECT '.
				   'f.flight_id, f.departure, f.arrival, '.
				   'f.departure_date, f.departure_time, f.arrival_date, f.arrival_time, f.price, '.
				   'f.airline_code, f.passenger_limit, '.
				   'a.logo, a.name, b.booking_time '.
				   'FROM booking b, flight f, airline a '.
				   'WHERE f.airline_code = a.airline_code AND '.
				   'f.flight_id = b.flight_id AND f.departure_date = b.departure_date AND b.user_email = %s;',
				   '"'.$_SESSION['logged'].'"');
				$res = $db->query($sql_forward);

				while ($row = mysqli_fetch_assoc($res)) {
				?>
					<li class="list-group-item">
						<div class="row">
							<div class="col-xs-8">
								<img src="<?php echo $row['logo']; ?>" alt="" class="logo">
								<span class="lead"><?php echo $row['name'].' '.$row['airline_code']; ?></span>
								<span class="badge"><?php echo $row['status']; ?></span>
								<p>
									<ul>
										<li>Departing from <strong><?php echo $row['departure']; ?></strong> on <strong><?php echo $row['departure_date']; ?></strong> at <strong><?php echo $row['departure_time']; ?></strong></li>
										<li>Arriving at <strong><?php echo $row['arrival']; ?></strong> on <strong><?php echo $row['arrival_date']; ?></strong> at <strong><?php echo $row['arrival_time']; ?></strong></li>
										<li>Total Cost: <strong>S$<?php echo $row['price']; ?></strong></li>
										<li>Weight Limit per Passenger: <strong>20 KG / 7 KG</strong></li>
										<li>Departing from <strong><?php echo $row['departure']; ?></strong> on <strong><?php echo $row['departure_date'] ?></strong> at <strong><?php echo $row['departure_time'] ?></strong></li>
										<li>Arriving at <strong><?php echo $row['arrival'] ?></strong> on <strong><?php echo $row['arrival_date'] ?></strong> at <strong><?php echo $row['arrival_time'] ?></strong></li>
										<li>Total Cost: <strong>S$ <?php echo $row['price'] ?></strong></li>
										<li>
											Passengers
											<ul class="passengers">
												<?php 
												$sqlps = sprintf('SELECT '.
													'p.first_name, '.
													'p.last_name '.
													'FROM passenger p, booking_passenger bp '.
													'WHERE bp.departure_date = "%s" '.
													'AND bp.flight_id = "%s" '.
													'AND bp.booking_time = "%s" '.
													'AND bp.user_email = "%s" '.
													'AND bp.passport = p.passport; ',
													$row['departure_date'],
													$row['flight_id'], 
													$row['booking_time'],
													$_SESSION['logged']
												);
												$res2 = $db->query($sqlps);
												while($res2 && $row2 = mysqli_fetch_assoc($res2)){
												?>
												<li><?php echo $row2['first_name'].' '.$row2['last_name']; ?></li>
												<?php } ?>
											</ul>
										</li>
									</ul>
								</p>
							</div>
							<div class="col-xs-4">
								<?php 
								$departure_date = $row['departure_date'];
								$flight_id = $row['flight_id'];
								$user_email = $_SESSION['logged'];
								$booking_time = $row['booking_time'];
								$delete_url = "/views/users/delete_booking.php?departure_date=$departure_date&flight_id=$flight_id&user_email=$user_email&booking_time=$booking_time";
								?>
								<a href="<?php echo $delete_url ?>" class="btn btn-danger pull-right">Cancel</a>
							</div>
						</div>
					</li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>
</body>
</html>