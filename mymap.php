<!DOCTYPE html>
<html>
  <head>
    <style>
      #map-canvas {
        width: 1000px;
        height: 600px;
      }
    </style>

    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script>
      function initialize() {
        var mapCanvas = document.getElementById('map-canvas');
        var mapOptions = {
          center: new google.maps.LatLng(38.830610, -77.304829),
          zoom: 10,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(mapCanvas, mapOptions)

        function dropMarker(longitude, latitude, heart_rate) {
          var marker = new google.maps.Marker({
          position: new google.maps.LatLng(longitude, latitude),
          map: map,
          title: heart_rate.toString()
        })
      }

      <?php
      include("connection.php")
      $q = "SELECT * from heart";
      $r = mysqli_query($dbc, $q);
      $arr = mysql_fetch_assoc($r);
      echo(sizeof($arr));
      ?>

       for(i = 0; i < 7; i++) {
          dropMarker(38.830610 + i, -77.304829 + i, 144 + i);
        }
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
  </head>
  <title>My Map</title>
    <h1>Heart</h1>
  <body bgcolor="FFCBC3">
  	<style type="text/css">
  	div#map-canvas {margin: 0 auto 0 auto; }
  	</style>
    <div id="map-canvas"></div>
  </body>
</html>