<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Contoh Aplikasi Peta GIS Sederhana Dengan Google Map API</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">    	
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDmPbUQ-1Iy-XMEInMvNp1WqteVqmvDdOU"></script>
    <script type="text/javascript">
        var map;
      var geocoder;
      var mapOptions = { center: new google.maps.LatLng(0.0, 0.0), zoom: 2,
        mapTypeId: google.maps.MapTypeId.ROADMAP };

      function initialize() {
var myOptions = {
                center: new google.maps.LatLng(3.5930901304831946, 98.67180922999978),
                zoom: 15,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            geocoder = new google.maps.Geocoder();
            var map = new google.maps.Map(document.getElementById("map_canvas"),
            myOptions);
            google.maps.event.addListener(map, 'click', function(event) {
                placeMarker(event.latLng);
            });

            var marker;
            function placeMarker(location) {
                if(marker){ //on vérifie si le marqueur existe
                    marker.setPosition(location); //on change sa position
                }else{
                    marker = new google.maps.Marker({ //on créé le marqueur
                        position: location, 
                        map: map
                    });
                }
                document.getElementById('lat').value=location.lat();
                document.getElementById('lng').value=location.lng();
                getAddress(location);
            }

      function getAddress(latLng) {
        geocoder.geocode( {'latLng': latLng},
          function(results, status) {
            if(status == google.maps.GeocoderStatus.OK) {
              if(results[0]) {
                document.getElementById("address").value = results[0].formatted_address;
              }
              else {
                document.getElementById("address").value = "No results";
              }
            }
            else {
              document.getElementById("address").value = status;
            }
          });
        }
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="navbar-wrapper">
				    <div>
				        <!--MENU-->
				        <nav id="header" class="navbar">
				            <div id="container1">
				                <nav class="navbar navbar-default navbar-static-top">
				                  <div class="container">
				                    <div class="navbar-header">
				                      <!-- <a class="navbar-brand" href="#">
				                        <img src="img/g.png" class="logosomed" title="Google+">
				                      </a>-->
				                    </div>
				                    <div class="col-md-4" style="margin-top: 15px; margin-left: -20px; text-transform: capitalize;">
				                        +62 8000******
				                    </div>
				                  </div>
				                </nav>
				            </div>
				            <div id="header-container" class="navbar-default navbar-container">
				                <div class="navbar-header">
				                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				                        <span class="sr-only">Toggle navigation</span>
				                        <span class="icon-bar"></span>
				                        <span class="icon-bar"></span>
				                        <span class="icon-bar"></span>
				                    </button>
				                    <a class="navbar-brand" href="#">
				                        <img src="img/img.png">
				                    </a>
				                </div>
				                <div id="navbar" class="collapse navbar-collapse">
				                    <ul class="nav navbar-nav">
				                        <li><a href="index.php">Home</a></li>
				                        <li><a href="?page=daftar.php">Daftar</a></li>
				                        <li class="dropdown">
				                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Harga <span class="caret"></span></a>
				                          <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
				                            <li>
				                            	<a href="?page=paket.php">Paket Harga</a>
				                            </li>
				                          </ul>
				                        </li>
				                    </ul>
				                </div><!-- /.nav-collapse -->
				            </div><!-- /.container -->
				        </nav><!-- /.navbar -->
				    </div>
				</div>
			</div>

			<?php 
				$page = $_GET['page'];
				if (empty($page)) {
					include 'map1.php';
				} else {
					include $page;
				}
			?>

		</div>
		<script src="jquery.js"></script>
		<script src="js/bootstrap.js"></script>
	</body>
</html>