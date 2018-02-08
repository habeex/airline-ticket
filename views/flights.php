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


          $sql = "SELECT f.flight_id, f.departure, f.arrival, f.departure_date, f.arrival_date, f.departure_time, f.arrival_time, f.price, f.airline_code, f.passenger_limit, f.status_changed_by, a.logo, a.name
            FROM flight f, airline a WHERE f.airline_code = a.airline_code;";

          $res = $db->query($sql);

          while ($row = mysqli_fetch_assoc($res)) {

              echo '<li class="list-group-item">';
            echo '<div class="row">';
              echo '<div class="col-xs-8">';
                echo '<img src="'.$row['logo'].'" alt="" class="logo">'.'&nbsp &nbsp';
                echo '<span class="lead">'.$row['flight_id'].'</span>';
                echo '<p>';
                  echo '<ul>';
                    echo '<li>Departing from <strong>'.$row['departure'].'</strong> on <strong>'.$row['departure_date'].'</strong> at <strong>'.$row['departure_time'].'</strong></li>';
                    echo '<li>Arriving at <strong>'.$row['arrival'].'</strong> on <strong>'.$row['arrival_date'].'</strong> at <strong>'.$row['arrival_time'].'</strong></li>';
                    echo '<li>Ticket Price: <strong>'.$row['price'].'</strong></li>';
                    echo '<li>Total Capacity of <strong>'.$row['passenger_limit'].'</strong> </li>';
                    echo '<li>Last Edited by <em>'.$row['status_changed_by'].'</em></li>';
                  echo '</ul>';
                echo '</p>';
              echo '</h5>';
            echo '</div>';
            echo '<div class="col-xs-4 text-right">';
              echo '<form style="display: inline" action="/views/flights/edit.php" method="POST">';
              echo '<input type="hidden" name="departure_date" value="'.$row['departure_date'].'">';
              echo '<button class="btn btn-default" type="submit" name="flight_id" value="'.$row['flight_id'].'">';
                echo 'Edit';
              echo '</button>'.'&nbsp';
              echo '</form>';
              
              echo '<form style="display: inline" action="flights/delete.php" method="POST">';
              echo '<input type="hidden" name="departure_date" value="'.$row['departure_date'].'">';
              echo '<button class="btn btn-danger" type="submit" name="flight_id" value="'.$row['flight_id'].'">';
                echo 'Delete';
              echo '</button>';
              echo '</form>';
            echo '</div>';
          echo '</div>';
        echo '</li>';


          }





        ?>        

      </ol>
      <a href="/views/flights/create.php" class="btn btn-primary">
        Create New Flight
      </a>
    </div>
  </div>
</div>