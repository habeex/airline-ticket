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
	<div class="container">
		<div class="well text-center">
			<h1>Success!</h1>
			<p>Your payment was processed and we have made your flight reservation on your behalf. </p>
			<p>Now all you need to do is to show up at the airport at the correct time with your papers. Safe flight!</p>
			<a href="/views/users/bookings.php" class="btn btn-default">See All My Bookings</a>
		</div>
	</div>
</body>
</html>