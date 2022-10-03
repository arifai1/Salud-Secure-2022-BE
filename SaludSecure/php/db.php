<?php

include_once("env.php");

// var_dump($db_host);
// var_dump($db_user);
// var_dump($db_password);
// var_dump($db_name);

$con = mysqli_init();
$con->real_connect($db_host, $db_user, $db_password, $db_name);

if ($con->connect_error){
	die("Connection failed: ".$con ->connect_error);
}
?>