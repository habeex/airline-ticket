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
  	<div class="row">
  		<div class="col-xs-12">
  			<ol class="list-group">

          <?php 

        require_once $path . 'airline-ticket/php/connect.php';



        $sql = "SELECT w.email, w.is_admin
            FROM website_user w;";

          $res = $db->query($sql);

          while ($row = mysqli_fetch_assoc($res)) {

              echo '<li class="list-group-item">';
            echo '<div class="row">';
              echo '<div class="col-xs-8">';
              echo '<h5>';
                echo '<strong>'.$row['email'].'</strong>';
                echo '</h5>';
              echo '</div>';
              echo '<div class="col-xs-4 text-right">';
              if ($row['is_admin'] == 0) {
              echo '<form style="display: inline" action="users/make_admin.php" method="POST">';
                echo '<button class="btn btn-success" type="submit" name="email" value="'.$row['email'].'">';
                  echo 'Make Admin';
                } else {
                  echo '<form style="display: inline" action="users/revoke_admin.php" method="POST">';
                  echo '<button class="btn btn-info" type="submit" name="email" value="'.$row['email'].'">';
                  echo 'Revoke Admin';
                }
                echo '</button>'.'&nbsp';
                echo '</form>';
                echo '<form style="display: inline" action="users/delete_user.php" method="POST">';
                echo '<button class="btn btn-danger" type="submit" name="email" value="'.$row['email'].'">';
                  echo 'Delete';
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