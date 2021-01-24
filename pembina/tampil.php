<?php error_reporting(0); ?>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDmPbUQ-1Iy-XMEInMvNp1WqteVqmvDdOU"></script>
<script type="text/javascript">
var markers = [
<?php include "koneksi.php";
$s=mysql_query("select * from data_perusahaan where x<>'' and id_kantor='$kantor' ") or die (mysql_error());
while($r=mysql_fetch_array($s))
{
?>

    {
        "title": '<?php echo $r['nama_perusahaan'] ?>',
        "lat": '<?php echo $r['x'] ?>',
        "lng": '<?php echo $r['y'] ?>',
        "description": '<b><?php echo $r['nama_perusahaan'] ?></b><br><?php echo $r['alamat'] ?><br> <img src=../bpjs/uploads/<?php echo $r['foto']; ?> width="50%">',
        "type": '<?php echo $r['status_peserta'] ?>'
    },

    <?php } ?>
        
    ];
window.onload = function () {
 
    var mapOptions = {
        center: new google.maps.LatLng(markers[0].lat, markers[0].lng),
        zoom: 15,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var infoWindow = new google.maps.InfoWindow();
    var latlngbounds = new google.maps.LatLngBounds();
    var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
    var i = 0;
    var interval = setInterval(function () {
        var data = markers[i]
        var myLatlng = new google.maps.LatLng(data.lat, data.lng);
        var icon = "";
        switch (data.type) {
            case "PESERTA":
                icon = "green";
                break;
            case "NONPESERTA":
                icon = "red";
                break;
                  case "CENTRALISASI":
                icon = "blue";
                break;
                  case "BPU":
                icon = "yellow";
                break;
                 case "NONBPU":
                icon = "orange";
                break;
        }
        icon = "http://maps.google.com/mapfiles/ms/icons/" + icon + ".png";
        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            title: data.title,
            animation: google.maps.Animation.DROP,
            icon: new google.maps.MarkerImage(icon)
        });
        (function (marker, data) {
            google.maps.event.addListener(marker, "click", function (e) {
                infoWindow.setContent(data.description);
                infoWindow.open(map, marker);
            });
        })(marker, data);
        latlngbounds.extend(marker.position);
        i++;
        if (i == markers.length) {
            clearInterval(interval);
            var bounds = new google.maps.LatLngBounds();
            map.setCenter(latlngbounds.getCenter());
            map.fitBounds(latlngbounds);
        }
    }, 80);
}
</script>

        <div class="col-md-3">
          <div class="myform">

              <ul style="list-style: none; margin: 0px; padding: 0px;">
                  <li> 
                      <label style="font-size: 17px;">Penjelasan Marker  </label>
                  </li>
                  <li>
                        PESERTA PU : 
                        <img alt="" src="http://maps.google.com/mapfiles/ms/icons/green.png" />
                  </li>
                  <li>  
                        POTENSI PU : 
                        <img alt="" src="http://maps.google.com/mapfiles/ms/icons/red.png" />
                  </li>
                  <li>  
                        Centralisasi : 
                        <img alt="" src="http://maps.google.com/mapfiles/ms/icons/blue.png" />
                  </li>
                  <li>  
                        PESERTA BPU : 
                        <img alt="" src="http://maps.google.com/mapfiles/ms/icons/yellow.png" />
                  </li>
                    <li>  
                        POTENSI BPU : 
                        <img alt="" src="http://maps.google.com/mapfiles/ms/icons/orange.png" />
                  </li>
              </ul>
          </div>
        </div>
        <div class="col-md-9">
          <div id="dvMap" style=" margin:0px auto; width:100%; height:530px; float:right; padding:10px; background: #333;"></div>
        </div>
