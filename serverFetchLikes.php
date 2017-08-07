<?php

include("serverSQLConnect.php");

$postid = $_POST['postid'];

$query="select distinct * from likes where postid = '$postid'";
$result=mysqli_query($conn, $query);
$count = mysqli_num_rows ( $result );

echo json_encode(array($postid,$count));

?>


