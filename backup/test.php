 <?php
      include("connection.php");
      $q = "SELECT * from users";
     $r = mysqli_query($dbc, $q);
     $arr = mysql_fetch_assoc($r);
	echo(sizeof($arr));
      ?>
