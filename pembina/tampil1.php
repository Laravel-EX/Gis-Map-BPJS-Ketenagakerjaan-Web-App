<?php error_reporting(0); ?><?php include "koneksi.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Latihan Google  map</title>
  <style type='text/css'>
  #peta {
  width: 50%;
  height: 400px;

} </style>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyDmPbUQ-1Iy-XMEInMvNp1WqteVqmvDdOU"></script>
   <script type="text/javascript">
    
  (function() {
  window.onload = function() {
var map;
    //Parameter Google maps
    var options = {
      zoom: 12, //level zoom
    //posisi tengah peta
      center: new google.maps.LatLng(3.5930901304831946, 98.67180922999978),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
  
   // Buat peta di 
    var map = new google.maps.Map(document.getElementById('peta'), options);
   // Tambahkan Marker 
     var locations = [
                    <?php 
                    $s=mysql_query("select * from kordinat_gis") or die (mysql_error());
                    while($r=mysql_fetch_array($s))
                    {

                     ?> 
                    ['<?php $r['nama_perusahaan'] ?>', <?php echo $r['x'] ?>, <?php echo $r['y']; ?>, '<?php $r['status_peserta'] ?>'],
                     <?php
                    }

                    ?>  
                    
    
    ];
    var infowindow = new google.maps.InfoWindow(); 

    var marker, i;
     /* kode untuk menampilkan banyak marker */
    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map,

      icon: 'peserta.png'

      });
     /* menambahkan event clik untuk menampikan
       infowindows dengan isi sesuai denga
      marker yang di klik */
    
      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
  

  };
})();

  </script>
  </head>
  <body>
    
    <div id="peta"></div>

  </body>
</html>