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


        $sql = "SELECT a.airline_code, a.name, a.logo
            FROM airline a;";

          $res = $db->query($sql);

          while ($row = mysqli_fetch_assoc($res)) {

              echo '<li class="list-group-item">';
            echo '<div class="row">';
              echo '<div class="col-xs-8">';
              echo '<h5>';
                echo '<img src="'.$row['logo'].'" alt="" class="logo">'.'&nbsp';
                echo '<strong>'.$row['name'].'</strong>'.'&nbsp';
                echo '<span>(IATA Code: '.$row['airline_code'].')</span>';
                echo '</h5>';
              echo '</div>';
              echo '<div class="col-xs-4 text-right">';
              echo '<form style="display: inline" action="/views/flight_providers/edit.php" method="POST">';
                echo '<button class="btn btn-info" type="submit" name="airline_code" value="'.$row['airline_code'].'">';
                  echo 'Edit';
                echo '</button>'.'&nbsp';
                echo '</form>';
                echo '<form style="display: inline" action="/views/flight_providers/delete_flight_provider.php" method="POST">';
                echo '<button class="btn btn-danger" type="submit" name="airline_code" value="'.$row['airline_code'].'">';
                  echo 'Delete';
                echo '</button>';
                echo '</form>';
            echo '</div>';
          echo '</div>';
        echo '</li>';


          }





        ?>

  			</ol>
  			<a href="/views/flight_providers/create.php" class="btn btn-primary">Create new Airline</a>
  		</div>
  	</div>
  </div>