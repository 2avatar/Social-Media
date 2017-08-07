<?php

include ("serverSQLConnect.php");

$userid = $_POST['userid'];

 $query = "select * from friends where (useridA = '$userid') or (useridB = '$userid')";
 $result = mysqli_query($conn, $query);

$myFriendsIds = array();
$myFriendsNames = array();

 while($row=mysqli_fetch_array($result)){
	
 	if ($row["useridA"] != $userid)
 		array_push($myFriendsIds, $row["useridA"]);
 	else 
 		array_push($myFriendsIds, $row["useridB"]);
 }

 for ($i=0; $i<count($myFriendsIds); $i++){

 $query = "select username from login where userid = '$myFriendsIds[$i]'";
 $result = mysqli_query($conn, $query);
 $row=mysqli_fetch_array($result);

 array_push($myFriendsNames, $row["username"]);
 }

 echo json_encode($myFriendsNames);

