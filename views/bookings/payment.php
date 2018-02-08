<?php $path = $_SERVER['DOCUMENT_ROOT'] . "/"; ?>
<?php include( $path . "views/partials/global.php" ); ?>
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
	<?php 
	require_once $path.'/php/connect.php';
	$forward_sql = sprintf('SELECT '.
		'f.flight_id, f.departure, f.arrival, '.
		'f.departure_date, f.arrival_date, f.price, '.
		'f.airline_code, f.passenger_limit, '.
		'f.status_changed_by, a.logo, a.name '.
		'FROM flight f, airline a '.
		'WHERE f.flight_id = "%s" AND f.departure_date = "%s" AND f.airline_code = a.airline_code;',
		$_GET['forward'],$_GET['fdate']);
	$return_sql = sprintf('SELECT '.
		'f.flight_id, f.departure, f.arrival, '.
		'f.departure_date, f.arrival_date, f.price, '.
		'f.airline_code, f.passenger_limit, '.
		'f.status_changed_by, a.logo, a.name '.
		'FROM flight f, airline a '.
		'WHERE f.flight_id = "%s" AND f.departure_date = "%s" AND f.airline_code = a.airline_code;',
		$_GET['backward'],$_GET['bdate']);
	$forward_res = $db->query($forward_sql);
	$return_res = $db->query($return_sql);
	$forward = mysqli_fetch_assoc($forward_res);
	$return = mysqli_fetch_assoc($return_res);
	?>
	<div class="container">
		<div class="well">
			<h1 class="text-center">Payment Breakdown</h1>
			<div class="row">
				<div class="col-xs-6">
					<p class="text-right"><?php echo $forward['name'].' Flight '.$forward['flight_id'] ?></p>
				</div>
				<div class="col-xs-6">
					<p class="text-left"><strong>S$ <?php echo $forward['price'] ?></strong></p>
				</div>
			</div>
			<?php if($_GET['backward'] != "") { ?>
			<div class="row">
				<div class="col-xs-6">
					<p class="text-right"><?php echo $return['name']. ' Flight '. $return['flight_id'] ?></p>
				</div>
				<div class="col-xs-6">
					<p class="text-left"><strong>S$ <?php echo $return['price'] ?></strong></p>
				</div>
			</div>
			<?php } ?>
			<?php 
			$total_fee = $forward['price'];
			if($_GET['backward'] != ""){
				$total_fee += $return['price'];
			}

			//insert into booking
			$booking_sql_template = 'INSERT INTO booking ('.
				'flight_id, '.
				'departure_date, '.
				'booking_time, '.
				'total_price, '.
				'user_email) VALUES('.
				'"%s", "%s", "%s", "%s", "%s");';
			$bking_psngers_sql_template = 'INSERT INTO booking_passenger ('.
				'flight_id, '.
				'departure_date, '.
				'booking_time, '.
				'user_email, '.
				'passport) VALUES('.
				'"%s", "%s", "%s", "%s", "%s");';
			date_default_timezone_set("Asia/Singapore");
			$now = date('Y-m-d H:i:s');
			$forward_booking = sprintf($booking_sql_template,
				$_GET['forward'],
				$_GET['fdate'],
				"$now",
				$forward['price'],
				$_SESSION['logged']);
			$db->query($forward_booking);
			foreach ($_GET['passenger'] as $passenger) {
				$fb_passengers = sprintf($bking_psngers_sql_template,
					$_GET['forward'],
					$_GET['fdate'],
					"$now",
					$_SESSION['logged'],
					$passenger);
				$db->query($fb_passengers);
			}
			$return_booking = sprintf($booking_sql_template,
				$_GET['backward'],
				$_GET['bdate'],
				"$now",
				$return['price'],
				$_SESSION['logged']);
			// print_r($forward_booking);
			$db->query($return_booking);
			foreach ($_GET['passenger'] as $passenger) {
				$rb_passengers = sprintf($bking_psngers_sql_template,
					$_GET['backward'],
					$_GET['bdate'],
					"$now",
					$_SESSION['logged'],
					$passenger);
				$db->query($rb_passengers);
			}
			?>
			<div class="row">
				<div class="col-xs-6">
					<p class="text-right"><strong>Total</strong></p>
				</div>
				<div class="col-xs-6">
					<p class="text-left"><strong>S$ <?php echo $total_fee; ?></strong></p>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-6 pull-right">
					<a href="success.php" class="btn btn-primary">Pay Now</a>
				</div>
			</div>
		</div>
	</div>
</body>
</html>