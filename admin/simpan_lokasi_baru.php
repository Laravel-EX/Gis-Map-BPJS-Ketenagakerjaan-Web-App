<?php error_reporting(0); ?><?php
include('koneksi.php');

$koordinat_x = $_POST['koordinat_x'];
$koordinat_y = $_POST['koordinat_y'];
$nama_tempat = $_POST['nama_tempat'];
$npp = $_POST['npp'];

$div = $_POST['divisi'];
$jumlah = $_POST['jumlah'];
$potensi = $_POST['potensi'];
$laporan = $_POST['laporan'];
$keterangan = $_POST['keterangan'];
$kantor = $_POST['kantor'];
$pembina = $_POST['pembina'];
$tgl = $_POST['tgl'];
$alamat_perusahaan = $_POST['alamat_perusahaan'];
$status = $_POST['peserta'];

$i=mysql_query("insert into data_perusahaan (id_kantor,id_pembina,x,y,npp,divisi,nama_perusahaan,alamat,jlh_aktif,status_peserta,potensi,foto,laporan,keterangan,tgl_masuk) values('$kantor','$pembina','$koordinat_x','$koordinat_y','$npp','$div','$nama_tempat','$alamat_perusahaan','$jumlah','$status','$potensi','','$laporan','$keterangan','$tgl')");

?>
<script type="text/javascript">
	window.location="index.php?page=show.php"
</script>