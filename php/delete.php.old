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
$sql = "DROP table passenger";
$sth = oci_parse($dbh, $sql);
oci_execute($sth, OCI_DEFAULT);

$sql = "DROP table booking";
$sth = oci_parse($dbh, $sql);
oci_execute($sth, OCI_DEFAULT);

$sql = "DROP table flight";
$sth = oci_parse($dbh, $sql);
oci_execute($sth, OCI_DEFAULT);

$sql = "DROP table airline";
$sth = oci_parse($dbh, $sql);
oci_execute($sth, OCI_DEFAULT);


$sql = "DROP table website_user";
$sth = oci_parse($dbh, $sql);
oci_execute($sth, OCI_DEFAULT);








ocilogoff($dbh)

?>
