<html>
<head>
</head>
<body>
<?php

echo("test");

#This file connects to the MySQL database

#MySQL Host
$host = "localhost";

#shared user, which only has access to the heart database
$user = "heartUser";

$password = "genericPassword";

#name of database
$db_name = "heart";

#database connection, named "$dbc"
$dbc = mysqli_connect($host, $user, $password, $db_name) OR die('Connection error: '.mysqli_connect_error());

$q = "SELECT * from testTable";
$r = mysqli_query($dbc, $q);
$arr = mysqli_fetch_assoc($r);

echo($arr['name']);
?>
</body>
</html>
