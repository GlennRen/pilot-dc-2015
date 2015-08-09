<?php
$json = file_get_contents("http://www.bigoofn.com/heart/data.json");
echo($json);

echo("<br/><br/>");

$args = json_decode($json);
print_r($args);

echo("<br/><br/>");
$date = new DateTime("2015-08-09");
$intraday = $args->{'activities-heart-intraday'};
print_r($intraday);

echo("<br/><br/>");

include('connection.php');

foreach($intraday->dataset as $segment){
echo("Time: ".$segment->time);
$time = $segment->time;
echo(" HR: ".$segment->value);
$hr = $segment->value;
echo("<br/><br/>");
$mydatetime = $date->format("Y-m-d")." ".$time;
echo($mydatetime);
//$q = "INSERT INTO heartData (date, start_time, heart_rate) VALUES ('$date', '$time', '$hr')";
$q = "INSERT INTO heartData (heart_rate, start_time) VALUES ('$hr', '$mydatetime')";
$r = mysqli_query($dbc, $q) or die("Error");


}
?>
