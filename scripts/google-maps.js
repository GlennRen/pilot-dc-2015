var serverData;

function initialize() {
  var mapCanvas = document.getElementById('map-canvas');
  var mapOptions = {
    center: new google.maps.LatLng(38.843381, -77.311487),
    zoom: 15,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }
  var map = new google.maps.Map(mapCanvas, mapOptions);
 

  function dropMarker(latitude, longitude, heart_rate) {
    var marker = new google.maps.Marker({
    position: new google.maps.LatLng(longitude, latitude),
    map: map,
    title: heart_rate.toString()
  })
}

	function plotPoints(data){
		console.log(data['records']);
		console.log(data['records'][0]['longitude']);
		//dropMarker(data['records'][0]['longitude'], data['records'][0]['latitude'], data['records'][0]['heart_rate']);
		for(i = 0; i < data['records'].length; i++)
		{
		if(data['records'][i]['heart_rate'] >= 140)
			dropMarker(data['records'][i]['longitude'], data['records'][i]['latitude'], data['records'][i]['heart_rate']);
		}
	}

	function getData(){
		req = new XMLHttpRequest();

		req.onreadystatechange = function(){
		if(req.readyState == 4 && req.status==200){
		serverData = (req.responseText);
		plotPoints(JSON.parse(serverData));
			}
		}

	
	req.open("GET","http://bigoofn.com/heart/ajax.php?user_id=1", true);
	req.setRequestHeader("Access-Control-Allow-Origin", "*");
	req.send();

	}
	/*for(i = 0; i < 7; i++) {
    dropMarker(38.830610 + i, -77.304829 + i, 144 + i);
  }*/
	getData();
  
  }

google.maps.event.addDomListener(window, 'load', initialize);
