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
<div class="container">
		<div class="row">
			<div class="col-sm-4 col-xs-12">
				<ul class="nav nav-pills nav-stacked">
					<li><a href="profile.php">Profile</a></li>
					<li><a href="bookings.php">Bookings</a></li>
					<li class="active"><a href="passengers.php">Passengers</a></li>
				</ul>
			</div>
			<div class="col-sm-8 col-xs-12">
				<div class="row">
					<div class="col-xs-12">
						<form action="add_passengers.php" class="form-inline" method="POST">
							<p>
							<div class="form-group">
								<input type="text" class="form-control" name="passenger-firstname" id="passenger-firstname" placeholder="First Name">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="passenger-lastname" id="passenger-lastname" placeholder="Last Name">
								<input type="hidden" class="form-control" name="self" id="passenger-lastname" value="0">
							</div>
							<div class="form-group">
								<select id="diet" name="diet" class="form-control">
									<option value="Vegetarian">Vegetarian</option>
									<option value="Non-Vegetarian">Non-Vegetarian</option>
									<option value="Halal">Halal</option>
								</select>
							</div>
							</p>
							<p>
							<div class="form-group">
								<input type="text" class="form-control" name="passenger-passport" id="passenger-passport" placeholder="Passport">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="passenger-country" id="passenger-country" placeholder="Country">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="passenger-phone" id="passenger-phone" placeholder="Phone Number">
							</div>
							<br>
							</p>
							<div class="form-group">
								<button type="submit" class="btn btn-default">Add New Passenger</button>
							</div>
						</form>
					</div>
				</div>
				<br>
				<ol class="list-group">
					<?php 

	        require_once $path.'airline-ticket/php/connect.php';

	        $email = $_SESSION["logged"];

	        $sql = "SELECT p.first_name, p.last_name, p.self, p.phone, p.passport, p.country, p.diet
	            FROM passenger p WHERE p.self = '0' AND p.user_email ='".$email."';";

	          $res = $db->query($sql);

	          while ($row = mysqli_fetch_assoc($res)) {

	              echo '<li class="list-group-item">';
	            echo '<div class="row">';
	              echo '<div class="col-xs-12">';
	              echo '<h5 style="display: inline;">';
	                echo '<strong>'.$row['first_name'].'</strong>&nbsp';
	                echo '<strong>'.$row['last_name'].'</strong>&nbsp';
	                echo '(<u>Passport</u>: '.$row['passport'].', <u>Phone</u>: '.$row['phone'].'), ';
	                echo $row['country'];
	                echo ' &nbsp<span class="badge">'.$row['diet'].'</span>';
	                echo '</h5>';
	                echo '<form style="display: inline" action="remove_passenger.php" method="POST">';
		              echo '<input type="hidden" name="email" value="'.$email.'">';
		              echo '<input type="hidden" name="self" value="'.$row['self'].'">';
		              echo '<button class="btn btn-danger btn-sm pull-right" type="submit" name="passport" value="'.$row['passport'].'">';
		                echo 'Remove';
		              echo '</button>';
		            echo '</form>';
	              echo '</div>';
	          echo '</div>';
	        echo '</li>';


	          }





	        ?>
				</ol>
			</div>
		</div>
	</div>
</body>
</html>