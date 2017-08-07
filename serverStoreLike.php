<?php

include ("serverSQLConnect.php");

$disapprove = "Cant like twice";
$approve = "You liked this post";

$postid = $_POST['postid'];
$userid = $_POST['userid'];

$query = "select * from likes where postid = '$postid' and userid = '$userid'";
$result=mysqli_query($conn, $query);
$count = mysqli_num_rows( $result );

if ($count == 0){
	$query="INSERT INTO likes VALUES ('$userid', '$postid')";
	mysqli_query ( $conn, $query );
	echo json_encode($approve);
}
	else
		echo json_encode ( $disapprove );

?>