<?php

// connect and set option
putenv("ORACLE_HOME=/oraclient");
$dbh = ocilogon('cs2102t01', 'crse1420', ' (DESCRIPTION =
    (ADDRESS_LIST =
      (ADDRESS = (PROTOCOL = TCP)(HOST = sid3.comp.nus.edu.sg)(PORT = 1521))
    )
    (CONNECT_DATA =
      (SERVICE_NAME = sid3.comp.nus.edu.sg)
    )
  )');

// prepare

$sql = "CREATE TABLE website_user (
  email VARCHAR(64) PRIMARY KEY,
  password  VARCHAR(64) NOT NULL,
  auth_token  VARCHAR(64) NOT NULL,
  is_admin NUMBER(1) NOT NULL CHECK( is_admin IN ('0', '1')))";
$sth = oci_parse($dbh, $sql);
oci_execute($sth, OCI_DEFAULT);

$sql = "CREATE TABLE airline ( airline_code VARCHAR(3) PRIMARY KEY, 
  name VARCHAR(64) NOT NULL,
  logo  VARCHAR(256) NOT NULL)";
$sth = oci_parse($dbh, $sql);
oci_execute($sth, OCI_DEFAULT);

$sql = "CREATE TABLE flight ( 
  flight_id VARCHAR(16) NOT NULL, 
  departure VARCHAR(64) NOT NULL,
  arrival VARCHAR(64) NOT NULL,  
  departure_date  DATE  NOT NULL,
  arrival_date  DATE  NOT NULL,
  passenger_limit INTEGER NOT NULL,
  status  VARCHAR(64) NOT NULL,
  status_changed_by VARCHAR(64) REFERENCES website_user(email),
  -- class ENUM('ECON', 'BUSINESS', 'FIRST'),
  price INTEGER NOT NULL,
  airline_code VARCHAR(3) REFERENCES airline(airline_code),
  PRIMARY KEY (flight_id, departure_date))";

$sth = oci_parse($dbh, $sql);
oci_execute($sth, OCI_DEFAULT);


$sql = "CREATE TABLE booking ( flight_id VARCHAR(16),
  departure_date  DATE,
  FOREIGN KEY(flight_id, departure_date) REFERENCES flight(flight_id, departure_date),
  user_email VARCHAR(64) REFERENCES website_user(email),
  PRIMARY KEY (flight_id, departure_date, user_email))";
$sth = oci_parse($dbh, $sql);
oci_execute($sth, OCI_DEFAULT);

$sql = "CREATE TABLE passenger ( first_name VARCHAR(64) NOT NULL,
  last_name VARCHAR(64),
  phone INTEGER NOT NULL,
  passport  VARCHAR(64) NOT NULL,
  country VARCHAR(64) NOT NULL,
  diet  VARCHAR(64) NOT NULL)";
$sth = oci_parse($dbh, $sql);
oci_execute($sth, OCI_DEFAULT);


//////////////////////////////////////////////////////////////////////////////////////// Adding Seed Values for Testing



// insert dummy user
              $sql = "INSERT INTO website_user VALUES ('anand@something.com', 'password', 'token', '1')";
$sth = oci_parse($dbh, $sql);
oci_execute($sth, OCI_DEFAULT);


// insert dummy airline
              $sql = "INSERT INTO airline VALUES ('9W', 'Jet Airways', 'some logo')";
$sth = oci_parse($dbh, $sql);
oci_execute($sth, OCI_DEFAULT);

$sql = "ALTER SESSION SET nls_date_format='yyyy-mm-dd'";
$sth = oci_parse($dbh, $sql);
oci_execute($sth, OCI_DEFAULT);

// insert dummy flight
$sql = "INSERT INTO flight VALUES ('9W343', 'Mumbai', 'Singapore', '2015-05-10', '2015-06-10', '200', 'ON TIME', 'anand@something.com', '400', '9W')";
$sth = oci_parse($dbh, $sql);
oci_execute($sth, OCI_DEFAULT);





// // prepare
// $sql = "insert into employee values (:id, :name)";
// $sth = oci_parse($dbh, $sql);

// // execute
// $id = 10; $name = 'Peter';
// oci_bind_by_name($sth, ':id', $id);
// oci_bind_by_name($sth, ':name', $name);
// oci_execute($sth, OCI_DEFAULT);
// $error = oci_error($sth);
// if ($error['code']) {
//   echo "<p>Error updating database.</p>";
//   oci_rollback($dbh);
//     exit();
// }

// // another execute
// $id = 20; $name = 'John';
// oci_bind_by_name($sth, ':id', $id);
// oci_bind_by_name($sth, ':name', $name);
// oci_execute($sth, OCI_DEFAULT);
// $error = oci_error($sth);
// if ($error['code']) {
//   echo "<p>Error updating database.</p>";
//   oci_rollback($dbh);
//     exit();
// }

// oci_commit($dbh);

// // prepare and execute
// $sql = "select id, name
//             from employee
//             order by id";
// $sth = oci_parse($dbh, $sql);
// oci_execute($sth, OCI_DEFAULT);

// // fetch
// echo "<table border=1>
//             <tr>
//                <td>ID</td><td>Name</td>
//             </tr>";
// while (ocifetchinto($sth, $row, OCI_ASSOC+OCI_RETURN_NULLS)) {
//   echo "<tr><td>", $row['ID'], "</td><td>", $row['NAME'], "</td></tr>";
// }
// echo "</table>";


// $sql = "drop table employee";
// $sth = oci_parse($dbh, $sql);
// oci_execute($sth, OCI_DEFAULT);


ocilogoff($dbh)

?>
