<!DOCTYPE html>
<html>

  <head>
      <title>Dashboard</title>
      <link rel="shortcut icon" href="images/favicon.ico" />
 <!-- jQuery -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <!-- Materialize CSS --> 
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js"></script>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!-- Styles -->
      <link type="text/css" rel="stylesheet" href="styles/main.css"/>
      <!-- Scripts -->
      <script type="text/javascript" src="scripts/main.js"></script>
      <script src="https://maps.googleapis.com/maps/api/js"></script>
      <script type="text/javascript" src="scripts/google-maps.js"></script>

      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>


  <body>
    <img id="main" src="images\logo-2-pink.png" alt="logo">
    
    <div class="row">
      <div class="col s12">
        <ul class="tabs">
          <li class="tab col s6"><a href="#map">Map</a></li>
          <li class="tab col s6"><a href="#table">Table</a></li>
        </ul>
      </div>
    </div>

    <div id="map" class="col s12">
      <div id="map-canvas"></div>
    </div>

    <div id="table" class="col s12">
      <table class="responsive-table centered">
        <thead>
          <tr>
            <th data-field="loc">Location</th>
            <th data-field="time">Time</th>
            <th data-field="bpm">Heart Beat (bpm)</th>
          </tr>
        </thead>
<?php
include("connection.php");
?>
        <tbody>
          <?php
			$q = "SELECT * FROM heartData WHERE 1";
			//result from the heartData query
			$r = mysqli_query($dbc, $q) or die("error or something");
			$q2 = "SELECT * FROM locationData WHERE 1";
			//result from the locationData query
			$r2 = mysqli_query($dbc, $q2) or die("error or something");
			while($heartRow = mysqli_fetch_assoc($r))
			{
			$locationRow = mysqli_fetch_assoc($r2);
		//	$location = ($row->latitude).", ".($row->longitude);
			//echo($location);
			//echo($row['latitude']); 
			
echo("
          <tr>
            <td>");
            echo($locationRow['latitude'].", ".$locationRow['longitude']);
echo("</td>");

echo("
            <td>");
echo($heartRow['start_time']);
echo("</td>");
echo("
            <td>");
echo($heartRow['heart_rate']);
echo("</td>
          </tr>");
          }
          ?>
        </tbody>
      </table>
    </div>
  </body>
</html>     
