var peta;
var koorAwal = new google.maps.LatLng(3.5930901304831946, 98.67180922999978);
function peta_awal(){
    loadDataLokasiTersimpan();
    var settingpeta = {
        zoom: 12,
        center: koorAwal,
        mapTypeId: google.maps.MapTypeId.ROADMAP 
        };
    	peta = new google.maps.Map(document.getElementById("kanvaspeta"),settingpeta);
    	google.maps.event.addListener(peta,'click',function(event){
        tandai(event.latLng);
    });
}

function tandai(lokasi){
    $("#koorX").val(lokasi.lat());
    $("#koorY").val(lokasi.lng());
    tanda = new google.maps.Marker({
        position: lokasi,
        map: peta
    });
}

$(document).ready(function(){
    $("#simpanpeta").click(function(){
        var koordinat_x = $("#koorX").val();
        var koordinat_y = $("#koorY").val();
        var nama_tempat = $("#namaTempat").val();	
        $.ajax({
            url: "simpan_lokasi_baru.php",
            data: "koordinat_x="+koordinat_x+"&koordinat_y="+koordinat_y+"&nama_tempat="+nama_tempat,
            success: function(msg){
                $("#namaTempat").val(null);
            }
        });
    });
});



function loadDataLokasiTersimpan(){
    $('#kordinattersimpan').load('tampilkan_lokasi_tersimpan.php');
}
setInterval (loadDataLokasiTersimpan, 3000);

function carikordinat(lokasi){
    var settingpeta = {
        zoom: 12,
        center: lokasi,
        mapTypeId: google.maps.MapTypeId.ROADMAP 
        };
    peta = new google.maps.Map(document.getElementById("kanvaspeta"),settingpeta);
    tanda = new google.maps.Marker({
        position: lokasi,
        map: peta
    });
    google.maps.event.addListener(tanda, 'click', function() {
      infowindow.open(peta,tanda);
    });
    google.maps.event.addListener(peta,'click',function(event){
        tandai(event.latLng);
    });
}


function gantipeta(){
    loadDataLokasiTersimpan();
	var isi = document.getElementById('cmb').value;
	if(isi=='1')
	{
    var settingpeta = {
        zoom: 10,
        center: koorAwal,
        mapTypeId: google.maps.MapTypeId.ROADMAP
        };
	}
	else if(isi=='2')
	{
    var settingpeta = {
        zoom: 10,
        center: koorAwal,
        mapTypeId: google.maps.MapTypeId.TERRAIN 
        };
	}
	else if(isi=='3')
	{
    var settingpeta = {
        zoom: 10,
        center: koorAwal,
        mapTypeId: google.maps.MapTypeId.SATELLITE  
        };
	}
	else if(isi=='4')
	{
    var settingpeta = {
        zoom: 10,
        center: koorAwal,
        mapTypeId: google.maps.MapTypeId.HYBRID  
        };
	}
    peta = new google.maps.Map(document.getElementById("kanvaspeta"),settingpeta);
    google.maps.event.addListener(peta,'click',function(event){
        tandai(event.latLng);
    });
}