<?php 

include ("serverSQLConnect.php");

$a = array();

$userid = $_GET["userid"];

$query="select * from login where userid != '$userid'";
$result=mysqli_query($conn, $query);
$count = mysqli_num_rows ($result);

while($row=mysqli_fetch_array($result))
{
		array_push($a,$row["username"]);
}
//$a=array("Anna","Brittany","Cinderella","Diana","Eva","Fiona","Gunda","Hege","Inga","Johanna" ,"Kitty", " Linda" ,"Nina","Ophelia","Petunia","Amanda","Raquel","Cindy","Doris","Eve","Evita" ,"Sunniva","Tove","Unni","Violet","Liza","Elizabeth","Ellen","Wenche","Mica","Vicky");
$q=$_GET["q"];

if (strlen ( $q ) > 0) {
	$hint = "";
	for($i = 0; $i < count ( $a ); $i ++) {
		if (strtolower ( $q ) == strtolower ( substr ( $a [$i], 0, strlen ( $q ) ) )) {
			if ($hint == "")
				$hint = $a [$i];
			else
				$hint = $hint . " , " . $a [$i];
		}
	}
}

if ($hint == "" && $q != "*")
	$response = "";
else
	$response = $hint;

if ($q == "*"){
	
	for ($i = 0; $i < count($a); $i++){
		if ($response == "")
			$response = $a [$i];
			else
				$response= $response. " , " . $a [$i];

	}
	}
	echo $response
?>
