<?php error_reporting(0); ?><?php
$edit=$_REQUEST['edit'];
if($edit!=true)
{
?><head>
 <script type="text/javascript">
        var map;
      var geocoder;
      var mapOptions = { center: new google.maps.LatLng(0.0, 0.0), zoom: 2,
        mapTypeId: google.maps.MapTypeId.ROADMAP };

    

           
      function initAutocomplete() {
        var map = new google.maps.Map(document.getElementById('map'), {
        	<?php include "koneksi.php";
			$s=mysql_query("SELECT * FROM kantor where id_kantor='$kantor'");
			$p=mysql_fetch_array($s);
			$latx=$p['latx'];
			$laty=$p['laty'];
			?>
          center: {lat: <?php echo $latx; ?>, lng: <?php echo $laty; ?>8},
          zoom: 13,
          mapTypeId: 'roadmap'
        });


         geocoder = new google.maps.Geocoder();
           
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

        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });

        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
              map: map,
              icon: icon,
              title: place.name,
              position: place.geometry.location
            }));

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);
        });
      }
    </script>
</head>
				<div class="col-md-3">
					<div class="myform">
						<form method="post" action="simpan_lokasi_baru.php" enctype="multipart/form-data">
						<input type="hidden" name="kantor" value="<?php echo $kantor; ?>">
							<div class="form-group">
								<label>Pembina</label>
								<select class="form-control" name="pembina">
								<?php
								include "koneksi.php";
								$az=mysql_query("select * from pembina where id_kantor='$kantor' ");
								while($aa=mysql_fetch_array($az))
								{ ?>
								<option value="<?php echo $aa['id_pembina']; ?>"><?php echo $aa['nama_pembina']; ?></option>
								<?php }


								?>
								</select>
							</div>	

							<div class="form-group">
								<label>Koordinat X</label>
								<input type="text" name="koordinat_x" class="form-control" id="lat" placeholder="Koordinat X">
							</div>
							<div class="form-group">
								<label>Koordinat Y</label>
								<input type="text" name="koordinat_y" class="form-control" id="lng" placeholder="Koordinat Y">
							</div>
							<div class="form-group">
								<label>NPP1</label>
								<input type="text" name="npp" class="form-control" placeholder="NPP">
							</div>
							<div class="form-group">
								<label>Divisi</label>
								<input type="text" name="div" class="form-control" placeholder="Divisi">
							</div>
							
							<div class="form-group">
								<label>Nama Perusahaan</label>
								<input type="text" name="nama_tempat" class="form-control" placeholder="Nama Lokasi">
							</div>
							<div class="form-group">
								<label>Alamat Perusahaan</label>
								<input type="text" name="alamat_perusahaan" id="address" class="form-control" placeholder="Nama Lokasi">
							</div>	
							<div class="form-group">
								<label>Jenis Peserta</label>
								<select class="form-control" name="peserta">
									<option value="PESERTA"> Peserta PU</option>
									<option value="NONPESERTA"> Calon Peserta PU</option>
									<option value="CENTRALISASI">Centralisasi</option>
									<option value="BPU">Peserta BPU</option>
									<option value="NONBPU">Calon Peserta BPU</option>
								</select>
							</div>	
							<div class="form-group">
								<label>Jumlah Aktif</label>
								<input type="text" name="jumlah" class="form-control" placeholder="">
							</div>
							<div class="form-group">
								<label>Potensi</label>
								<input type="text" name="potensi" class="form-control" placeholder="">
							</div>
							<div class="form-group">
								<label>Laporan</label>
								<input type="text" name="laporan" class="form-control" placeholder="">
							</div>
							<div class="form-group">
								<label>Keterangan</label>
								<input type="text" name="keterangan" class="form-control" placeholder="">
							</div>
							<div class="form-group">
								<label>Tanggal Input</label>
								<input type="text" name="tgl" class="form-control" placeholder="" value="<?php echo date('Y-m-d'); ?>">
							</div>

							<div class="form-group">
								<label>Foto</label>
								<input type="file" name="foto" class="form-control" placeholder="Foto">
							</div>
											
			                <input type="submit" class="btn btn-primary" value="Simpan" /></button>
			                <button class="btn btn-primary" onclick="javascript:carikordinat(koorAwal);">Koordinat Awal</button>
		                </form>
					</div>
				</div>

				<div class="col-md-9">
					 <input id="pac-input" class="controls" type="text" placeholder="Search Box" size="50">
         <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDmPbUQ-1Iy-XMEInMvNp1WqteVqmvDdOU&libraries=places&callback=initAutocomplete"
         async defer></script>
    				<div id="map" style=" margin:0px auto; width:100%; height:530px; float:right; padding:10px; background: #333;"></div>

				</div>

				<?php } 
				else
				{  
					include "koneksi.php";
					$id=$_REQUEST['id'];
				
					$sql = mysql_query("select * from data_perusahaan d, pembina p, kantor k where d.id_pembina=p.id_pembina and d.id_kantor=k.id_kantor and d.id_perusahaan='$id'");


	$data=mysql_fetch_array($sql);
	
		$id_perusahaan=$data['id_perusahaan'];
		$nama_pembina=$data['nama_pembina'];
		$nama_kantor=$data['nama_kantor'];
		$nama_perusahaan=$data['nama_perusahaan'];
		$x=$data['x'];
		$y=$data['y'];
		$npp=$data['npp'];
		$div=$data['div'];
		$jlh_aktif=$data['jlh_aktif'];
		$potensi=$data['potensi'];
		$keterangan=$data['keterangan'];
		$tgl_masuk=$data['tgl_masuk'];
		$alamat_perusahaan=$data['alamat'];


		$status_peserta=$data['status_peserta'];
	

					?>
					<head>
					 <script type="text/javascript">
             var map;
      var geocoder;
      var image = 'http://icons.iconarchive.com/icons/icons-land/vista-map-markers/64/Map-Marker-Marker-Outside-Chartreuse-icon.png';
      var mapOptions = { center: new google.maps.LatLng(0.0, 0.0), zoom: 2,
        mapTypeId: google.maps.MapTypeId.ROADMAP };

      function initialize() {
		var myOptions = {
                center: new google.maps.LatLng(<?php echo $x; ?>, <?php echo $y; ?>),
                zoom: 15,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };


   geocoder = new google.maps.Geocoder();
            var map = new google.maps.Map(document.getElementById("map_canvas"),
            myOptions);


             google.maps.event.addListener(map, 'click', function(event) {
              
                placeMarker(event.latLng);
                 document.getElementById('lat').value=location.lat();
                document.getElementById('lng').value=location.lng();

            });
             addMarker(<?php echo $x; ?>, <?php echo $y; ?>, 'info');
             
            var marker;
            

              function bindInfoWindow(marker, map, infoWindow, html) {
                    google.maps.event.addListener(marker, 'click', function() {
                      infoWindow.setContent(html);
                      infoWindow.open(map, marker);
                    });
               }
               
               function addMarker(lat, lng, info) {
                      var pt = new google.maps.LatLng(lat, lng);
                      var marker = new google.maps.Marker({
                          icon: image,
                          map: map,
                          position: pt                          
                          
                      });         
                      bindInfoWindow(marker, map, infoWindow, info);
                    }
                     
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
					<div class="col-md-3">
					<div class="myform">
						<form method="post" action="editsimpan_lokasi_baru.php" enctype="multipart/form-data">		
							<div class="form-group">
								<label>Koordinat X</label>
								<input type="text" name="koordinat_x" class="form-control" id="lat" placeholder="Koordinat X" 
								value="<?php echo $x; ?>">
							</div>
							<div class="form-group">
								<label>Koordinat Y</label>
								<input type="text" name="koordinat_y" class="form-control" id="lng" placeholder="Koordinat Y" value="<?php echo $y; ?>">
								<input type="hidden" name="kantor" value="<?php echo $nama_kantor ;?>">
								<input type="hidden" name="pembina" value="<?php echo $nama_pembina; ?>">
								<input type="hidden" name="id" value="<?php echo $id_perusahaan; ?>">
							</div>
							<div class="form-group">
								<label>NPP</label>
								<input type="text" name="npp" class="form-control" placeholder="NPP" value="<?php echo $npp; ?>">
							</div>
							<div class="form-group">
								<label>Divisi</label>
								<input type="text" name="div" class="form-control" placeholder="Divisi" value="<?php echo $div; ?>">
							</div>
							
							<div class="form-group">
								<label>Nama Perusahaan</label>
								<input type="text" name="nama_tempat" class="form-control" placeholder="Nama Perusahaan" value="<?php echo $nama_perusahaan; ?>">
							</div>
							<div class="form-group">
								<label>Alamat Perusahaan</label>
								<input type="text" name="alamat_perusahaan" id="address" class="form-control" placeholder="Alamat Perusahaan" value="<?php echo $alamat_perusahaan; ?>">
							</div>	
							<div class="form-group">
								<label>Jenis Peserta</label>
								<select class="form-control" name="peserta">
									<option value="PESERTA"> Peserta PU</option>
									<option value="NONPESERTA"> Calon Peserta PU</option>
									<option value="CENTRALISASI">Centralisasi</option>
									<option value="BPU">Peserta BPU</option>
									<option value="NONBPU">Calon Peserta BPU</option>
								</select>
							</div>	
							<div class="form-group">
								<label>Jumlah Aktif</label>
								<input type="text" name="jumlah" class="form-control" placeholder="Jumlah Aktif" value="<?php echo $jlh_aktif; ?>">
							</div>
							<div class="form-group">
								<label>Potensi</label>
								<input type="text" name="potensi" class="form-control" placeholder="Potensi" value="<?php echo $potensi; ?>">
							</div>
							<div class="form-group">
								<label>Laporan</label>
								<input type="text" name="laporan" class="form-control" placeholder="Laporan" value="<?php echo $laporan; ?>">
							</div>
							<div class="form-group">
								<label>Keterangan</label>
								<input type="text" name="keterangan" class="form-control" placeholder="Keterangan" value="<?php echo $keterangan; ?>">
							</div>
							<div class="form-group">
								<label>Tanggal Input</label>
								<input type="text" name="tgl" class="form-control" placeholder="Tgl" value="<?php echo $tgl_masuk; ?>">
							</div>
									<div class="form-group">
								<label>Foto</label>
								<input type="file" name="foto" class="form-control" placeholder="Foto">
							</div>		
			                <input type="submit" class="btn btn-primary" value="Simpan" /></button>
			                <button class="btn btn-primary" onclick="javascript:carikordinat(koorAwal);">Koordinat Awal</button>
		                </form>
					</div>
				</div>

					<div class="col-md-9">
    				<div id="map_canvas" style=" margin:0px auto; width:100%; height:530px; float:right; padding:10px; background: #333;"></div>
				</div>
				<?php
				 }

				?>
