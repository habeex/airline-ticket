<!DOCTYPE html>
<html lang="en">
<head>
  <title>Discount Airlines</title>
  <link rel="css/bootstrap.min.css">
  <?php include( "partials/meta.php" ); ?>
  <?php include( "partials/styles.php" ); ?>
  <?php include( "partials/scripts.php" ); ?>
</head>
<body>
  <?php include( "partials/navbar.php" ); ?>
  <div class="container" style="background-image: url(./images/flight.jpg); 
      height: 550px; width: 100%; background-size: cover; background-repeat: no-repeat;">

      <div class="col-sm-5">
        <div id="rectangle" class="bigRectangle">
          <div class="flightSearchBox">
            <hr style="height: 3px; visibility:hidden;" />
            <h3 class="centerAlign">Search for Flights!</h3>
            <form id="flightInfo" action="flights.php">
              <input style="margin-left: 20px; margin-top: 10px;" type="radio" name="flightType" value="one-way"> ONE WAY &nbsp; &nbsp; &nbsp;
              <input id="roundTrip" type="radio" name="flightType" value="round" checked> ROUND TRIP
              <br>
              <br>
              <p style="margin-left: 20px; display: inline;">FROM<p id="fromText" style="color: red; display: inline;"></p></p>
              <select id="countryFrom" name="countryFrom" style="margin-left: 20px; width: 200px;"></select>
              <br>
              <br>
              <p style="margin-left: 20px; display: inline;">TO<p id="toText" style="color: red; display: inline;"></p></p>
              <select id="countryTo" name="countryTo" style="margin-left: 20px; width: 200px;"></select>
              <br>
              <br>
              <p style="margin-left: 20px;">DEPARTURE</p>
              <select id="departuredaydropdown" name="departureday" style="margin-left: 20px;"></select> 
              <select id="departuremonthdropdown" name="departuremonth"></select> 
              <select id="departureyeardropdown" name="departureyear"></select>
              <br>
              <br>
              <p style="margin-left: 20px; display: inline;">RETURN<p id="returnText" style="color: red; display: inline;"></p></p>
              <select id="returndaydropdown" name="returnday" style="margin-left: 20px;"></select> 
              <select id="returnmonthdropdown" name="returnmonth"></select> 
              <select id="returnyeardropdown" name="returnyear"></select>
              <br>
              <br>
              <p style="margin-left: 20px; display: inline">ADULT</p> &nbsp;
              <p style="margin-left: 20px; display: inline">CHILD</p>
              <p id="people" style="color: red; display: inline;"></p>
              <br>
              <select id="noofadult" name="noofadults" style="margin-left: 20px;"></select>
              <select id="noofchild" name="noofchildren" style="margin-left: 40px;"></select>
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
      <h3 class="centerAlign">Last Added Flight</h3>
    </div>
    <div id="rectangle" class="mediumRectangle">
      <li style="list-style-type: none;">
        <img class="col-sm-4" src="./images/thumbnail.png">
        <h4>Flight Name</h4>
        <h5 style="display: inline">From</h5> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
        <h5 style="display: inline">To</h5>
        <p>Price</p>
      </li>
      <li style="list-style-type: none;">
        <img class="col-sm-4" src="./images/thumbnail.png">
        <h4>Flight Name</h4>
        <h5 style="display: inline">From</h5> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
        <h5 style="display: inline">To</h5>
        <p>Price</p>
      </li>
      <li class="last" style="list-style-type: none;">
        <img class="col-sm-4" src="./images/thumbnail.png">
        <h4>Flight Name</h4>
        <h5 style="display: inline">From</h5> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
        <h5 style="display: inline">To</h5>
        <p>Price</p>
      </li>
    </div>
  </div>
  <div class="col-sm-4">
    <div id="rectangle" class="smallRectangle">
      <h3 class="centerAlign">Recently Sold Flight</h3>
    </div>
    <div id="rectangle" class="mediumRectangle">
    <li style="list-style-type: none;">
        <img class="col-sm-4" src="./images/thumbnail.png">
        <h4>Flight Name</h4>
        <h5 style="display: inline">From</h5> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
        <h5 style="display: inline">To</h5>
        <p>Price</p>
      </li>
      <li style="list-style-type: none;">
        <img class="col-sm-4" src="./images/thumbnail.png">
        <h4>Flight Name</h4>
        <h5 style="display: inline">From</h5> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
        <h5 style="display: inline">To</h5>
        <p>Price</p>
      </li>
      <li class="last" style="list-style-type: none;">
        <img class="col-sm-4" src="./images/thumbnail.png">
        <h4>Flight Name</h4>
        <h5 style="display: inline">From</h5> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
        <h5 style="display: inline">To</h5>
        <p>Price</p>
      </li> 
    </div>
  </div>
  <div class="col-sm-4">
    <div id="rectangle" class="smallRectangle">
      <h3 class="centerAlign">Quick Links</h3>
    </div>
    <div id="rectangle" class="mediumRectangle">
    <hr style="height: 1px; visibility:hidden;" />
    <li style="list-style-type: none;">
      <h4>Link 1</h4>
    </li>
    <li style="list-style-type: none;">
      <h4>Link 1</h4>
    </li>
    <li style="list-style-type: none;">
      <h4>Link 1</h4>
    </li>
    <li style="list-style-type: none;">
      <h4>Link 1</h4>
    </li>
    <li style="list-style-type: none;">
      <h4>Link 1</h4>
    </li>
    <li class="last" style="list-style-type: none;">
      <h4>Link 1</h4>
    </li>
    </div>
  </div>  
  </div>

  <script src="./js/custom.js"></script>
  <script language="javascript">
      window.onload = init();
      populateCountries("countryFrom");
      populateCountries("countryTo");
      populatedropdown("departuredaydropdown", "departuremonthdropdown", "departureyeardropdown");
      populatedropdown("returndaydropdown", "returnmonthdropdown", "returnyeardropdown");
      populatePassengers("noofadult");
      populatePassengers("noofchild");
  </script>
</body>
</html>