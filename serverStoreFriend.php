<?php

include ("serverSQLConnect.php");

$friend = $_POST['friend'];
$myUserid = $_POST['userid'];

$disapprove = "no friend selected";

if ($friend != ""){

$query = "select userid from login where username = '$friend'";
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_array($result);
$userid = $row["userid"];

$result->free ();

$query = "select * from friends where (useridA = '$userid' and useridB = '$myUserid') or (useridA = '$myUserid' and useridB = '$userid')";
$result = mysqli_query($conn, $query);
$count = mysqli_num_rows( $result );

if ($count == 0){
	
$query="INSERT INTO friends VALUES ('$myUserid', '$userid')";
mysqli_query ( $conn, $query );
echo json_encode($friend . " was added as a friend");

}
else 
	echo json_encode($friend . " is already a friend");
	
}

else 
	echo json_encode($disapprove);
?>

