<?php

include_once("env.php");

var_dump($db_host);
var_dump($db_user);
var_dump($db_password);
var_dump($db_name);

$mysqli = mysqli_init();
$mysqli->ssl_set(NULL, NULL, "/etc/ssl/certs/ca-certificates.crt", NULL, NULL);
$mysqli->real_connect($db_host, $db_user, $db_password, $db_name);

if ($con->connect_error){
	die("Connection failed: ".$con ->connect_error);
}
?>