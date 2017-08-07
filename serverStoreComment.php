<?php

include ("serverSQLConnect.php");

$approve = "Post Added!";

$postid = $_POST['postid'];
$userid = $_POST['userid'];
$comment = $_POST['comment'];

$query="INSERT INTO commentpost VALUES ('$userid', '$postid', '$comment')";
mysqli_query ( $conn, $query );

echo json_encode($approve);