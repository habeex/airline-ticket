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
		<h1 class="text-center">Almost there!</h1>
		<div class="row">
			<div class="col-xs-12">
				<p class="lead">Please select your <?php $_GET['adults'] ?> passenger(s) below</p>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<ul class="list-group passengers">
					<?php 
					require_once $path . 'airline-ticket/php/connect.php';
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

					//Get available passengers
					$passengers_sql = sprintf('SELECT '.
						'p.first_name, p.last_name, p.self, p.passport '.
						'FROM passenger p WHERE p.user_email = "%s";',
						$_SESSION["logged"]);
					$passengers = $db->query($passengers_sql);
					?>
					<?php $passenger_counter = $_GET['adults'];
					while($passenger_counter > 0){ $passenger_counter--;?>
					<li class="list-group-item passenger">
						<div class="row">
							<div class="col-xs-6"><strong>Passenger #1: </strong></div>
							<div class="col-xs-6 pull-right">
								<select class="form-control passport" name="" id="">
									<?php mysqli_data_seek($passengers, 0); ?>
									<?php while($passenger = mysqli_fetch_assoc($passengers)) {?>
									<option value="<?php echo $passenger['passport'] ?>">
										<?php echo $passenger['first_name']." ".$passenger['last_name'] ?>
									</option>
									<?php } ?>
								</select>	
							</div>
						</div>
					</li>
					<?php } ?>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<div class="list-group">
					<a href="#" class="list-group-item">
						<h1>
							S$<?php echo $forward['price'] ?>
							<small>
								<?php echo $forward['name'] ?>
							</small>
							<img src="<?php echo $forward['logo'] ?>" alt="" class="logo">
						</h1>
						<p>
							Departing from 
							<span class="lead"><?php echo $forward['departure'] ?></span>
							on 
							<span class="lead depdate"><?php echo $forward['departure_date'] ?></span>
							at 
							<span class="lead">8:30 AM</span>
							<br>
							and expected to reach 
							<span class="lead"><?php echo $forward['arrival'] ?></span>
							on 
							<span class="lead"><?php echo $forward['arrival_date'] ?></span>
							at 
							<span class="lead">6:00 PM</span> local time.
						</p>
					</a>
					<?php if($_GET['backward']!="") {?>
					<a href="#" class="list-group-item">
						<h1>
							S$<?php echo $return['price'] ?>
							<small>
								<?php echo $return['name'] ?>
							</small>
							<img src="<?php echo $return['logo'] ?>" alt="" class="logo">
						</h1>
						<p>
							Departing from 
							<span class="lead"><?php echo $return['departure'] ?></span>
							on 
							<span class="lead"><?php echo $return['departure_date'] ?></span>
							at 
							<span class="lead">8:30 AM</span>
							<br>
							and expected to reach 
							<span class="lead"><?php echo $return['arrival'] ?></span>
							on 
							<span class="lead"><?php echo $return['arrival_date'] ?></span>
							at 
							<span class="lead">6:00 PM</span> local time.
						</p>
					</a>
					<?php } ?>
				</div>
			</div>
		</div>
		<div class="row">
			<?php 
			$payment_url = "payment.php?forward=".$_GET['forward'].
			 	"&fdate=".$_GET['fdate'].
			 	"&backward=".$_GET['backward'].
			 	"&bdate=".$_GET['bdate'];
			?>
			<div class="col-xs-12"><a href="#" class="btn btn-primary pull-right" id="next">
				Proceed To Payment
			</a></div>
		</div>
	</div>
<script>
	$('#next').click(function(){
		var paymentUrl = "<?php echo $payment_url ?>";
		$('.passengers .passenger .passport').each(function(){
			paymentUrl += '&passenger[]=' + $(this).val().trim();
		});
		location.href = paymentUrl;
	});
</script>
</body>
</html>