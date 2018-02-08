<?php $path = $_SERVER['DOCUMENT_ROOT'] . "/"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Discount Airlines</title>
  <?php include( $path . "partials/meta.php" ); ?>
  <?php include( $path . "partials/styles.php" ); ?>
  <?php include( $path . "partials/scripts.php" ); ?>
</head>
<body>
  <?php include( $path . "partials/navbar.php" ); ?>
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <ol class="breadcrumb">
          <li class="active"><a href="#">Search Flights</a></li>
        </ol>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12">
        <p>
          <a class="btn btn-default" data-toggle="collapse" href="#flight-search-filter-container" aria-expanded="false" aria-controls="collapseExample">
            Filters. Maybe this section shouldn't exist
          </a>
        </p>
        <div class="collapse" id="flight-search-filter-container">
          <div class="panel">
            Hello
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12">
        <div class="list-group">
          <a href="#" class="list-group-item">

            <?php

            $type = $_POST["flightType"];
            $departure = $_POST["countryFrom"];
            $arrival = $_POST["countryTo"];
            $departure_date = $POST["departureyear"."-"."departuremonth"."-"."departureday"];
            $arrival_date = $POST["returnyear"."-"."returnmonth"."-"."returnday"];
            $adults = $POST["noofadults"];
            $children = $POST["noofchildren"];

            putenv("ORACLE_HOME=/oraclient");
$dbh = ocilogon('cs2102t01', 'crse1420', ' (DESCRIPTION =
    (ADDRESS_LIST =
      (ADDRESS = (PROTOCOL = TCP)(HOST = sid3.comp.nus.edu.sg)(PORT = 1521))
    )
    (CONNECT_DATA =
      (SERVICE_NAME = sid3.comp.nus.edu.sg)
    )
  )');

              echo '<h1 >';


              $sql = "SELECT COUNT(*) FROM flight";
              $sth = oci_parse($dbh, $sql);
              oci_execute($sth, OCI_DEFAULT);

              // prepare and execute
$sql = "SELECT flight_id, departure, arrival, departure_date, arrival_date, price, airline_code
            FROM flight
            order by departure_date";
$sth = oci_parse($dbh, $sql);
oci_execute($sth, OCI_DEFAULT);

// fetch
echo "<table border=1>
            <tr>
               <td>Flight ID</td><td>Departure</td><td>Arrival</td><td>Departure Date</td><td>Arrival Date</td><td>Price</td><td>Airline</td>
            </tr>";
while (ocifetchinto($sth, $row, OCI_ASSOC+OCI_RETURN_NULLS)) {
  echo "<tr><td>", $row['flight_id'], "</td><td>", $row['departure'], "</td><td>", $row['arrival'], "</td><td>", $row['departure_date'], "</td>
  <td>", $row['arrival_date'], "</td><td>", $row['price'], "</td><td>", $row['airline_code'], "</td></tr>";
}
echo "</table>";

            //   S$830
            //   <small>
            //     Emirates Airlines Economy
            //   </small>
            // </h1>
            // <p>
            //   Departing from 
            //   <span class="lead">Changi International Airport</span>
            //    on 
            //   <span class="lead">Saturday, 14th March 2015</span>
            //    at 
            //   <span class="lead">8:30 AM</span>
            //   <br>
            //    and expected to reach 
            //   <span class="lead">Dubai International Airport</span>
            //    on 
            //   <span class="lead">the same day</span>
            //    at 
            //   <span class="lead">6:00 PM</span> local time.
            // </p>
            ?>
          </a>
        </div>
      </div>
    </div>
  </div>
</body>
</html>