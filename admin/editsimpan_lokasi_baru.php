<?php
date_default_timezone_set("Asia/Jakarta");
include('koneksi.php');

$x = $_POST['koordinat_x'];
$y = $_POST['koordinat_y'];
$nama_tempat = $_POST['nama_tempat'];
$npp = $_POST['npp'];
$id=$_POST['id'];
$div = $_POST['div'];
$jumlah = $_POST['jumlah'];
$potensi = $_POST['potensi'];
$laporan = $_POST['laporan'];
$keterangan = $_POST['keterangan'];
$kantor = $_POST['kantor'];
$pembina = $_POST['pembina'];
$tgl = $_POST['tgl'];
$alamat_perusahaan = $_POST['alamat_perusahaan'];
$status = $_POST['peserta'];
$foto=$_POST['foto'];
$today=date("Y-m-d");

$i=mysql_query("update data_perusahaan set x='$x',y='$y', npp='$npp', divisi='$divisi', nama_perusahaan='$nama_tempat', alamat='$alamat_perusahaan', jlh_aktif='$jumlah', status_peserta='$status', potensi='$potensi', foto='$foto' ,laporan='$laporan', keterangan='$keterangan', tgl_masuk='$tgl', tgl_modif='$today' where id_perusahaan='$id'");

?>

<script type="text/javascript">
	window.location="index.php?page=show.php"
</script>