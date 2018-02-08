<?php include( "views/partials/global.php" ); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Discount Airlines</title>
  <link rel="./views/css/bootstrap.min.css">
  <?php include( "views/partials/meta.php" ); ?>
  <?php include( "views/partials/styles.php" ); ?>
  <?php include( "views/partials/scripts.php" ); ?>
</head>
<body>
  <?php include( "views/partials/navbar.php" ); ?>
  <div class="container" style="background-image: url(./views/images/flight.jpg); 
      height: 550px; width: 100%; background-size: cover; background-repeat: no-repeat;">

      <div class="col-sm-5">
        <div id="rectangle" class="bigRectangle">
          <div class="flightSearchBox">
            <hr style="height: 3px; visibility:hidden;" />
            <h3 class="centerAlign">Search for Flights!</h3>
            <!-- <form id="flightInfo" action="views/flights/search.php"> -->
            <form id="flightInfo" action="views/bookings/create.php">
              <input style="margin-left: 20px; margin-top: 10px;" type="radio" name="flightType" value="one-way"> ONE WAY &nbsp; &nbsp; &nbsp;
              <input id="roundTrip" type="radio" name="flightType" value="round" checked> ROUND TRIP
              <br>
              <br>
              <p style="margin-left: 20px; display: inline;">FROM<p id="fromText" style="color: red; display: inline;"></p></p>
              <select  id="countryFrom" name="countryFrom" style="margin-left: 20px; width: 200px; color: black;"></select>
              <br>
              <br>
              <p style="margin-left: 20px; display: inline;">TO<p id="toText" style="color: red; display: inline;"></p></p>
              <select id="countryTo" name="countryTo" style="margin-left: 20px; width: 200px; color: black;"></select>
              <br>
              <br>
              <p style="margin-left: 20px;">DEPARTURE</p>
              <select id="departuredaydropdown" name="departureday" style="margin-left: 20px; color: black;"></select> 
              <select id="departuremonthdropdown" name="departuremonth" style="color: black;"></select> 
              <select id="departureyeardropdown" name="departureyear" style="color: black;"></select>
              <br>
              <br>
              <p style="margin-left: 20px; display: inline;">RETURN<p id="returnText" style="color: red; display: inline;"></p></p>
              <select id="returndaydropdown" name="returnday" style="margin-left: 20px; color: black;"></select> 
              <select id="returnmonthdropdown" name="returnmonth" style="color: black;"></select> 
              <select id="returnyeardropdown" name="returnyear" style="color: black;"></select>
              <br>
              <br>
              <p style="margin-left: 20px; display: inline">ADULT</p> &nbsp;
              <p id="people" style="color: red; display: inline;"></p>
              <br>
              <select id="noofadult" name="noofadults" style="margin-left: 20px; color: black;"></select>
              <br>
              <br>
              <button style="margin-left: 20px;" onclick="checkInput()" class="searchButton" type="button">Search</button>
            </form>
          </div>
        </div>
      </div>

      <div class="col-sm-6">
        <div id="timedMsgDiv"></div>
      </div>
  </div>

  

  <div class="row">
  <div class="col-sm-4">
    <div id="rectangle" class="smallRectangle">
      <h3 class="centerAlign">Latest Flights</h3>
    </div>
    <div id="rectangle" class="mediumRectangle">
      <?php require_once $path.'/php/connect.php';


          $sql = "SELECT *
            FROM latest_flights;";

          $res = $db->query($sql);

          while ($row = mysqli_fetch_assoc($res)) { ?>
      <li style="list-style-type: none;">
        <img class="col-sm-4" src="./views/images/thumbnail.png">
        <h4><?php  echo $row['flight_id'];?></h4>
        <h5 style="display: inline">From: <?php  echo $row['departure'];?></h5> &nbsp; &nbsp;
        <h5 style="display: inline">To: <?php  echo $row['arrival'];?></h5>
        <p>Price: <?php  echo $row['price']; ?></p>
      </li>
      <?php }?>
    </div>
  </div>
  <div class="col-sm-4">
    <div id="rectangle" class="smallRectangle">
      <h3 class="centerAlign">Cheapest Flights</h3>
    </div>
    <div id="rectangle" class="mediumRectangle">
    <?php require_once $path.'/php/connect.php';


          $sql = "SELECT *
            FROM cheapest_flights;";

          $res = $db->query($sql);

          while ($row = mysqli_fetch_assoc($res)) { ?>
      <li style="list-style-type: none;">
        <img class="col-sm-4" src="./views/images/thumbnail.png">
        <h4><?php  echo $row['flight_id'];?></h4>
        <h5 style="display: inline">From: <?php  echo $row['departure'];?></h5> &nbsp; &nbsp;
        <h5 style="display: inline">To: <?php  echo $row['arrival'];?></h5>
        <p>Price: <?php  echo $row['price']; ?></p>
      </li>
      <?php }?>
    </div>
  </div>  
  </div>

  <script src="./views/js/custom.js"></script>
  <script language="javascript">
      window.onload = init();
      populateCountries("countryFrom");
      populateCountries("countryTo");
      populatedropdown("departuredaydropdown", "departuremonthdropdown", "departureyeardropdown");
      populatedropdown("returndaydropdown", "returnmonthdropdown", "returnyeardropdown");
      populatePassengers("noofadult");
  </script>
</body>
</html>