<?php

include ("serverSQLConnect.php");

$imagetmp = addslashes(file_get_contents($_FILES['image']['tmp_name']));
$commenting = $_POST['commenting'];
$isprivate = 0;
if (isset($_POST['isprivate']))
	$isprivate = 1;
$userid = $_POST['userid'];

$insert_image="INSERT INTO post VALUES(DEFAULT, '$userid', '$imagetmp', '$commenting', '$isprivate')";
mysqli_query($conn, $insert_image);

echo json_encode($userid);

$conn->close();
?>