<?php

$host = "localhost";
$user = "root";
$pass = "";

$conn = mysqli_connect ( $host, $user, $pass);

$databasename = "mySocialMedia";

$loginTable = "CREATE TABLE Login(
  userid INT AUTO_INCREMENT,
  username VARCHAR(10),
  userpw VARCHAR(100),
  CONSTRAINT pkUserid PRIMARY KEY(userid)
)";

$postTable = "CREATE TABLE Post(
  postid INT AUTO_INCREMENT,
  userid INT,
  image MEDIUMBLOB,
  commenting VARCHAR(30),
  isprivate INT,
  CONSTRAINT pkPostid PRIMARY KEY(postid),
  CONSTRAINT fkUseridP FOREIGN KEY(userid) REFERENCES Login(userid)
)";

$commentPostTable = "CREATE TABLE CommentPost(
  userid INT,
  postid INT,
  commenting VARCHAR(30),
  CONSTRAINT fkUseridC FOREIGN KEY(userid) REFERENCES Login(userid),
  CONSTRAINT fkPostidC FOREIGN KEY(postid) REFERENCES Post(postid)
)";

$likesTable = "CREATE TABLE Likes(
  userid INT,
  postid INT,
  CONSTRAINT fkUseridL FOREIGN KEY(userid) REFERENCES Login(userid),
  CONSTRAINT fkPostidL FOREIGN KEY(postid) REFERENCES Post(postid)
)";

$friendTable = "CREATE TABLE Friends(
  useridA INT,
  useridB INT,
  CONSTRAINT fkUseridA FOREIGN KEY(useridA) REFERENCES Login(userid),
  CONSTRAINT fkPostidB FOREIGN KEY(useridB) REFERENCES Login(userid)
)";

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} 

// Create database
$sql = "CREATE DATABASE $databasename";
if ($conn->query($sql) === TRUE) {
	echo "Database created successfully";
} else {
	echo "\nError creating database: " . $conn->error;
}

if ($conn) {
	$db_selected = mysqli_select_db ($conn, $databasename);
	if (! $db_selected) {
		die ( 'Can\'t use database : ' . mysql_error () );
	}
} else {
	die ( 'Not connected : ' . mysql_error () );
}

if ($conn->query($loginTable) === TRUE) {
	echo "\nTable login created successfully";
} else {
	echo "\nError creating table: " . $conn->error;
}

if ($conn->query($postTable) === TRUE) {
	echo "\nTable post created successfully";
} else {
	echo "\nError creating table: " . $conn->error;
}
if ($conn->query($commentPostTable) === TRUE) {
	echo "\nTable commentpost created successfully";
} else {
	echo "\nError creating table: " . $conn->error;
}
if ($conn->query($likesTable) === TRUE) {
	echo "\nTable likes created successfully";
} else {
	echo "\nError creating table: " . $conn->error;
}

if ($conn->query($friendTable) === TRUE) {
	echo "\nTable friends created successfully";
} else {
	echo "\nError creating table: " . $conn->error;
}

$conn->close();
?>