<?php 
$path = $_SERVER['DOCUMENT_ROOT'] . "/";

require_once ($path . 'php/connect.php');

$flight_id = $_GET['flight_id'];
$departure_date = $_GET['departure_date'];
$user_email = $_GET['user_email'];
$booking_time = $_GET['booking_time'];

$sql = sprintf('DELETE FROM booking '.
  'WHERE flight_id = "%s" '.
  'AND departure_date = "%s" '.
  'AND user_email = "%s" '.
  'AND booking_time = "%s"; ',
  $flight_id, $departure_date, $user_email, $booking_time
  );

// print_r($sql);
$db->query($sql);
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>