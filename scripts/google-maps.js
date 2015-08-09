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
  for(i = 0; i < 7; i++) {
    dropMarker(38.830610 + i, -77.304829 + i, 144 + i);
  }
}

google.maps.event.addDomListener(window, 'load', initialize);