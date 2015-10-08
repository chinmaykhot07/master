<?php
	$id=$_GET['id'];	
?>
<div id="hover">
	<div id="hoverimage">
		<img src="uploads/<?php echo $id ?>.jpg" alt="Cannot display image">
	</div>
	<div id="map"></div>
	<script>
		var markers = [
			['INOX,Margao',15.284831,73.9575731],
			['INOX,Panjim',15.4988747,73.82061],
			['CINEVISHANT,Margao',15.2713657,73.9681631]
		];

		
		function initMap() {
			var map = new google.maps.Map(document.getElementById('map'), {
				//enter: {lat: 15.284831, lng: 73.9575731},
				zoom: 12,

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
		  		map.setCenter(pos);
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
	 <div id="hover social">
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
		</script>

		<a href="https://twitter.com/share" class="twitter-share-button" data-text="#MoviesSJInnovation">Tweet</a>
		<script>
			!function(d,s,id)
			{var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';
			if(!d.getElementById(id))
			{
				js=d.createElement(s);
				js.id=id;
				js.src=p+'://platform.twitter.com/widgets.js';
				fjs.parentNode.insertBefore(js,fjs);
			}
		}(document, 'script', 'twitter-wjs');
		</script>

		<?php
			$var = $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
		?>
		<script src="https://apis.google.com/js/platform.js" async defer></script>
		<g:plusone href="https://plus.google.com/share?url=<?php echo $var ?>"></g:plusone>

		<a data-pin-do="buttonBookmark" null href="//www.pinterest.com/pin/create/button/"><img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_gray_20.png" /></a>
		
		<script async defer src="//assets.pinterest.com/js/pinit.js"></script>  

		<div class="fb-like" data-href="<?php echo $var ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>

		<script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script>
		<script type="IN/Share" data-url="<?php echo $var ?>" data-counter="right"></script>


		
	</div> 
</div>

