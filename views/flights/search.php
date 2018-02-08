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
    <div class="row">
      <div class="col-xs-12">
        <ol class="list-group">

          <?php 

          require_once $path.'/php/connect.php';


          if ($_GET["flightType"] == "one-way") {
            

            $sql = 'SELECT f.flight_id, f.departure, f.arrival, f.departure_date, f.arrival_date, f.price, f.airline_code, f.passenger_limit, f.status_changed_by, a.logo, a.name
            FROM flight f, airline a WHERE f.airline_code = a.airline_code AND f.departure = "'.$_GET["countryFrom"].
            '" AND f.departure_date = "'.$_GET["departureyear"]."-".$_GET["departuremonth"]."-".$_GET["departureday"].'" AND f.arrival = "'.$_GET["countryTo"].'";';

          }

          else if ($_GET["flightType"] == "round" && isset($_GET["returnday"]) && isset($_GET["returnmonth"]) 
            && isset($_GET["returnyear"])) {




            $sql = 'SELECT f.flight_id, f.departure, f.arrival, f.departure_date, f.arrival_date, f.price, f.airline_code, f.passenger_limit, f.status_changed_by, a.logo, a.name
          FROM flight f, airline a WHERE (f.airline_code = a.airline_code AND f.departure = "'.$_GET["countryFrom"].
            '" AND f.departure_date = "'.$_GET["departureyear"]."-".$_GET["departuremonth"]."-".
            $_GET["departureday"].'" AND f.arrival = "'.$_GET["countryTo"].'") OR (f.airline_code = a.airline_code AND f.departure = "'.
            $_GET['countryTo'].'" AND f.departure_date = "'.$_GET["returnyear"]."-".$_GET["returnmonth"]."-".
            $_GET["returnday"].'" AND f.arrival = "'.$_GET["countryFrom"].'");';
          }




$res = $db->query($sql);

if (!$res) {
  die("No flights found :(");
}

else {
  while ($row = mysqli_fetch_assoc($res)) {
    echo '<li class="list-group-item">';
    echo '<div class="row">';
    echo '<div class="col-xs-8">';
    echo '<img src="'.$row['logo'].'" alt="" class="logo">'.'&nbsp &nbsp';
    echo '<span class="lead">'.$row['flight_id'].'</span>';
    echo '<p>';
    echo '<ul>';
    echo '<li>Departing from <strong>'.$row['departure'].'</strong> on <strong>'.$row['departure_date'].'</strong> at <strong>08:00 AM</strong></li>';
    echo '<li>Arriving at <strong>'.$row['arrival'].'</strong> on <strong>'.$row['arrival_date'].'</strong> at <strong>08:00 AM</strong></li>';
    echo '<li>Ticket Price: <strong>'.$row['price'].'</strong></li>';
    echo '<li>Total Capacity of <strong>'.$row['passenger_limit'].'</strong> passengers (<strong>198</strong> booked so far)</li>';
    echo '<li>Last Edited by <em>'.$row['status_changed_by'].'</em></li>';
    echo '</ul>';
    echo '</p>';
    echo '</h5>';
    echo '</div>';
    echo '<div class="col-xs-4 text-right">';
    echo '<button class="btn btn-default">';
    echo 'Edit';
    echo '</button>';
    echo '<button class="btn btn-danger">';
    echo 'Delete';
    echo '</button>';
    echo '</div>';
    echo '</div>';
    echo '</li>';


  }

}





?>        

</ol>

</div>
</div>
</div>