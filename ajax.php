<?php

//$user_id = $_REQUEST["user_id"];
include('connection.php');


$q = "SELECT * FROM heartData WHERE 1";
//result from the heartData query
$r = mysqli_query($dbc, $q) or die("error or something");
$q2 = "SELECT * FROM locationData WHERE 1";
//result from the locationData query
$r2 = mysqli_query($dbc, $q2) or die("error or something");


$outerArray = array();

while($heartRow = mysqli_fetch_assoc($r))
{
$locationRow = mysqli_fetch_assoc($r2);

$innerArray = array( "heart_rate" => $heartRow['heart_rate'], "time" => $heartRow['start_time'], "latitude" => $locationRow['latitude'], "longitude" => $locationRow['longitude']);
array_push($outerArray, $innerArray);


}

echo(json_encode(array("records" => $outerArray)));

?>
