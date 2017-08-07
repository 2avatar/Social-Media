<?php
include ("serverSQLConnect.php");

$username = $_POST ['username'];
$password = $_POST ['password'];

$password = md5($password);

$disapprove = 0;

$query = "SELECT userid FROM login WHERE username = '$username' and userpw = '$password'";

$result=mysqli_query($conn, $query);
$count = mysqli_num_rows ( $result );

if ($count == 0){
	$query = "INSERT INTO login VALUES (DEFAULT, '$username', '$password')";
	mysqli_query ( $conn, $query );
	
	$query = "SELECT userid FROM login WHERE username = '$username' and userpw = '$password'";
	$result=mysqli_query($conn, $query);
	$row=mysqli_fetch_array($result);
	
	echo json_encode ($row["userid"]);
}
else
	echo json_encode ($disapprove);
		
		$result->free ();
		$conn->close ();
?>