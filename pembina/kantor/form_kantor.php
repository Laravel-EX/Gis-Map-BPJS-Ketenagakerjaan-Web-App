<?php error_reporting(0); ?><head>
 <script type="text/javascript">
        var map;
      var geocoder;
      var mapOptions = { center: new google.maps.LatLng(0.0, 0.0), zoom: 2,
        mapTypeId: google.maps.MapTypeId.ROADMAP };

      function initialize() {
		var myOptions = {
			<?php include "koneksi.php";

			?>
                center: new google.maps.LatLng(2.9906436, 98.6416252),
                zoom: 8,
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
					<div class="col-md-5">
						<h3>Tambah Data</h3>
						<form method="post" action="kantor/pro_kan.php">
							<div class="form-group">
								<label>Latitude</label>
								<input type="text" name="koordinat_x" class="form-control" id="lat" placeholder="Koordinat X">
							</div>
							<div class="form-group">
								<label>Longitude</label>
								<input type="text" name="koordinat_y" class="form-control" id="lng" placeholder="Koordinat Y">
							</div>
							<div class="form-group">
								<label>Kode Kantor</label>
								<input type="text" name="kode" class="form-control" placeholder="Kode Kantor">
							</div>
							<div class="form-group">
								<label>Nama Kantor</label>
								<input type="text" name="nakan" class="form-control" placeholder="Nama Kantor">
							</div>
								<div class="form-group">
								<label>User Admin</label>
								<input type="text" name="ua" class="form-control" placeholder="Nama Kantor">
							</div>
								<div class="form-group">
								<label>Password Admin</label>
								<input type="text" name="pass" class="form-control" placeholder="Nama Kantor">
							</div>

			                <input type="submit" class="btn btn-primary" value="Simpan" /></button>
		                </form>
		            </div>

				<div class="col-md-9">
    				<div id="map_canvas" style=" margin:0px auto; width:100%; height:530px; float:right; padding:10px; background: #333;"></div>
				</div>