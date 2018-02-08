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
	$departure_date = '"'.$_GET["departureyear"]."-".$_GET["departuremonth"]."-".$_GET["departureday"].'"';
	$departure_airport = '"'.$_GET["countryFrom"].'"';
	$return_date = '"'.$_GET["returnyear"]."-".$_GET["returnmonth"]."-".$_GET["returnday"].'"';
	$arrival_airport = '"'.$_GET["countryTo"].'"';
	$sql_forward = sprintf('SELECT '.
		'f.flight_id, f.departure, f.arrival, '.
		'f.departure_date, f.arrival_date, f.price, '.
		'f.airline_code, f.passenger_limit, '.
		'f.status_changed_by, a.logo, a.name '.
    'FROM flight f, airline a '.
    'WHERE f.airline_code = a.airline_code AND '.
    'f.departure = %s AND f.departure_date = %s AND f.arrival = %s;',
    $departure_airport,
    $departure_date,
    $arrival_airport);
	$res = $db->query($sql_forward);
	?>
	<div class="container">
		<h1 class="text-center">Choose Your Forward Flight</h1>
		<div class="row">
			<div class="col-xs-12">
				<?php if(!$res || $res->num_rows == 0) {?>
				<p class="text-center">No Flights Found :(</p>
				<?php } else { 
				while($row = mysqli_fetch_assoc($res)) {
				?>
				<div class="list-group">
					<a href="#" class="list-group-item forward-flight" id="<?php echo $row['flight_id'] ?>">
						<h1>
							S$<?php echo $row['price'] ?><small>/<span class="glyphicon glyphicon-user" aria-hidden="true"></span></small>
							<img src="<?php echo $row['logo'] ?>" alt="" class="logo">
							<small>
								<?php echo $row['name'] ?>
							</small>
						</h1>
						<p>
							Departing from 
							<span class="lead"><?php echo $row['departure'] ?></span>
							on 
							<span class="lead depdate"><?php echo $row['departure_date'] ?></span>
							at 
							<span class="lead">8:30 AM</span>
							<br>
							and expected to reach 
							<span class="lead"><?php echo $row['arrival'] ?></span>
							on 
							<span class="lead"><?php echo $row['arrival_date'] ?></span>
							at 
							<span class="lead">6:00 PM</span> local time.
						</p>
					</a>
				</div>
				<?php } }?>
			</div>
		</div>
		<!-- This section should only show if there is a return flight involved -->
		<?php if($_GET["flightType"] == "round"){ ?>
		<?php 
		$sql_return = sprintf('SELECT '.
			'f.flight_id, f.departure, f.arrival, '.
			'f.departure_date, f.arrival_date, f.price, '.
			'f.airline_code, f.passenger_limit, '.
			'f.status_changed_by, a.logo, a.name '.
    	'FROM flight f, airline a '.
    	'WHERE f.airline_code = a.airline_code AND '.
    	'f.departure = %s AND f.departure_date = %s AND f.arrival = %s;',
    	$arrival_airport,
    	$return_date,
    	$departure_airport);
		$res2 = $db->query($sql_return);
		?>
		<h1 class="text-center">Choose Your Return Flight</h1>
		<div class="row">
			<div class="col-xs-12">
				<?php if(!$res2 || $res2->num_rows == 0) {?>
				<p class="text-center">No Flights Found :(</p>
				<?php } else { ?>
				<?php while($row = mysqli_fetch_assoc($res2)) {
				?>
				<div class="list-group">
					<a href="#" class="list-group-item return-flight" id="<?php echo $row['flight_id'] ?>">
						<h1>
							S$<?php echo $row['price'] ?><small>/<span class="glyphicon glyphicon-user" aria-hidden="true"></span></small>
							<img src="<?php echo $row['logo'] ?>" alt="" class="logo">
							<small>
								<?php echo $row['name'] ?>
							</small>
						</h1>
						<p>
							Departing from 
							<span class="lead"><?php echo $row['departure'] ?></span>
							on 
							<span class="lead depdate"><?php echo $row['departure_date'] ?></span>
							at 
							<span class="lead">8:30 AM</span>
							<br>
							and expected to reach 
							<span class="lead"><?php echo $row['arrival'] ?></span>
							on 
							<span class="lead"><?php echo $row['arrival_date'] ?></span>
							at 
							<span class="lead">6:00 PM</span> local time.
						</p>
					</a>
				</div>
				<?php } }?>
			</div>
		</div>
		<?php } ?>
		<div class="row">
			<div class="col-xs-12"><a href="#" id="next" class="btn btn-lg btn-primary disabled pull-right">
				Next
			</a></div>
		</div>
	</div>
	<script>
	$(function(){
		$('.forward-flight').click(function(){
			$('.forward-flight.active').removeClass('active');
			$(this).addClass('active');
		});
		$('.return-flight').click(function(){
			$('.return-flight.active').removeClass('active');
			$(this).addClass('active');
		});

		$('.forward-flight, .return-flight').click(function(){
			if($('.return-flight').length > 0 &&
				 $('.return-flight.active').length == 1 &&
				 $('.forward-flight.active').length == 1){
				$('#next').removeClass('disabled');
			}else if(
				$('.return-flight').length == 0 &&
				$('.forward-flight.active').length == 1){
				$('#next').removeClass('disabled');
			}else{
				$('#next').addClass('disabled');
			}
		});
		$('#next').on('click', function(e){
			if($(this).hasClass('disabled'))
				return;
			e.preventDefault();
			//required arguments to pass on
			//noofadults, forward, return
			var adults = <?php echo $_GET["noofadults"] ?>;
			var forwardId = $('.forward-flight.active').attr('id');
			var forwardDate = $('.forward-flight.active .depdate').text().trim();
			var backwardId = $('.return-flight.active').attr('id') || "";
			var backwardDate = $('.return-flight.active .depdate').text().trim();

			location.href = "/views/bookings/details.php?" +
												"adults=" + adults + "&" +
												"forward=" + forwardId + "&" +
												"fdate=" + forwardDate + "&" +
												"backward=" + backwardId + "&" +
												"bdate=" + backwardDate;
		})
	});
	</script>
</body>
</html>