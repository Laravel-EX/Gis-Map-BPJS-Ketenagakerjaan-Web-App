<?php error_reporting(0); ?><script type="text/javascript">
	$(document).ready(function() {
		$(".delbutton").click(function(){
		 var element = $(this);
		 var del_id = element.attr("id");
		 var info = 'nomor=' + del_id;
		 if(confirm("Anda yakin akan menghapus?"))
		 {
			 $.ajax({
			 type: "POST",
			 url : "hapus_lokasi.php",
			 data: info,
			 success: function(){
			 }
			 });	
		 $(this).parents(".content").animate({ opacity: "hide" }, "slow");
 			}
		 return false;
		 });
	})
	</script>

<div style="margin-top: 20px;">
	<div class="list-group">
	  <a href="#" class="list-group-item disabled">
	    Koordinat Yang Tersimpan
	  </a>
		<?php
		include('koneksi.php');

		$lokasi = mysql_query("select * from kordinat_gis");
		while($koor=mysql_fetch_array($lokasi)){
			?>
			<ul style="margin: 0px; padding: 15px;">
			    <li class="content">
			    	<a href="javascript:carikordinat(new google.maps.LatLng(<?php echo $koor['x']; ?>,<?php echo $koor['y']; ?>))"><?php echo $koor['nama_tempat']; ?></a> - 
			    	<a href="#" class="delbutton" id="<?php echo $koor['nomor']; ?>">(Hapus)</a>
				</li>
			</ul>
		<?php } ?>
	</div>
</div>
