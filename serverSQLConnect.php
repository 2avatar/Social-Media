<?php

$host = "localhost";
$databasename = "mysocialmedia";
//$databasename = "myfacebook";
$user = "root";
$pass = "";
$conn = mysqli_connect ( $host, $user, $pass, $databasename);
if ($conn) {
	$db_selected = mysqli_select_db ($conn, $databasename);
	if (! $db_selected) {
		die ( 'Can\'t use foo : ' . mysql_error () );
	}
} else {
	die ( 'Not connected : ' . mysql_error () );
}


?>
