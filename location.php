<body>
<div id="map"></div>
	<script>
		var markers = [
			['INOX,Margao',15.284831,73.9575731],
			['INOX,Panjim',15.4988747,73.82061],
			['CINEVISHANT,Margao',15.2713657,73.9681631]
		];

		
		function initMap() {
			var map = new google.maps.Map(document.getElementById('map'), {
				center: {lat: 15.284831, lng: 73.9575731},
				zoom: 10,

			});
			var infoWindow = new google.maps.InfoWindow({map: map}); 

		  // Try HTML5 geolocation.
		    if (navigator.geolocation) {
		  		navigator.geolocation.getCurrentPosition(function(position) {
		  		var pos = {
		  			lat: position.coords.latitude,
		  			lng: position.coords.longitude
		  		};

		  		infoWindow.setPosition(pos);
		  		infoWindow.setContent('<p style="color:red"><b>You Are HERE<b></p>');
		  		//map.setCenter(pos);
			  	}, function() {
			  		handleLocationError(true, infoWindow, map.getCenter());
			  	});				
		  	} 
		  	else {
					// Browser doesn't support Geolocation
				handleLocationError(false, infoWindow, map.getCenter());
			}
			
			for (var i = 0; i < markers.length; i++)
			 {
			 	var marker = new google.maps.Marker({
				position : { lat : markers[i][1] ,lng : markers[i][2] } ,
				map : map
			});
		}

		}

		function handleLocationError(browserHasGeolocation, infoWindow, pos) {
			infoWindow.setPosition(pos);
			infoWindow.setContent(browserHasGeolocation ?
				'Error: The Geolocation service failed.' :
				'Error: Your browser doesn\'t support geolocation.');
		}

	</script>
	<script src="https://maps.googleapis.com/maps/api/js?sensor=true&callback=initMap" async defer>
	</script>		

</body>
