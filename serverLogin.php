<?php

include ("serverSQLConnect.php");

$username = $_POST ['username'];
$password = $_POST ['password'];

$password = md5($password);

$disapprove = 0;

$query = "SELECT userid FROM login WHERE username = '$username' and userpw = '$password'";

$result=mysqli_query($conn, $query);
$row=mysqli_fetch_array($result);
$count = mysqli_num_rows ( $result );

	if ($count == 1)
		echo json_encode ($row["userid"]);
	else
		echo json_encode ( $disapprove );
	
	$result->free ();
	$conn->close ();

?>