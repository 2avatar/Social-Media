<?php

include("serverSQLConnect.php");

$myUserid = $_POST["userid"];

$queryPost="select * from post";

$resultPost=mysqli_query($conn, $queryPost);

$postCounter = 0;
$isAFriend=0;

$postArray = array();

while($rowPost=mysqli_fetch_array($resultPost))
{
	//$image = '<img src="data:image/jpeg;base64, '.base64_encode($imagerow).' " width=200 height=200 />';
	$imagerow = $rowPost["image"];
	$image = base64_encode($imagerow);
	$postUserid = $rowPost["userid"];
	
	$queryFriend= "select * from friends where (useridA = '$postUserid' and useridB = '$myUserid') or (useridA = '$myUserid' and useridB = '$postUserid')";
	$resultFriend = mysqli_query($conn, $queryFriend);
	$count = mysqli_num_rows( $resultFriend );
	
	if ($count != 0)
		$isAFriend = 1;
	else 
		$isAFriend = 0;
	
		$queryUsername =  "select username from login where userid = '$postUserid'";
		$resultUsername = mysqli_query($conn, $queryUsername);
		$rowUsername=mysqli_fetch_array($resultUsername);
		
		$postArray[$postCounter]=array($rowPost["postid"], $postUserid, $image, $rowPost["commenting"], $rowPost["isprivate"], $isAFriend, $rowUsername["username"]);
		
	$postCounter++;
}

echo json_encode($postArray);
 
?>


