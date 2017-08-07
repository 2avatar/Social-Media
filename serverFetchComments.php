<?php

include("serverSQLConnect.php");

$postid = $_POST['postid'];
$commentsArray = array();
$usernameArray = array();
$postCounter = 0;

$queryComment="select * from commentpost where postid = '$postid'";
$resultComment=mysqli_query($conn, $queryComment);
$count = mysqli_num_rows ( $resultComment);



while($rowComment=mysqli_fetch_array($resultComment))
{

	$commentsArray[$postCounter] = $rowComment["commenting"];
	$userid = $rowComment["userid"];
	
	$queryUsername="select username from login where userid = '$userid'";
	$resultUsername=mysqli_query($conn, $queryUsername);
	$rowUsername=mysqli_fetch_array($resultUsername);
	
	$usernameArray[$postCounter] = $rowUsername["username"];

	$postCounter++;
}

if ($count>0)
	echo json_encode(array($postid, $usernameArray, $commentsArray));
else 
echo json_encode($postCounter);

?>