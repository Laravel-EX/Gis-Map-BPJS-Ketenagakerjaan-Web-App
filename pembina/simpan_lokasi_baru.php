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

$uploadSecondTo = null;
if(isset($_FILES['foto'])){
	  $second_image_name = $_FILES['foto']['name'];
	  $second_image_size = $_FILES['foto']['size'];
	  $second_image_tmp = $_FILES['foto']['tmp_name'];
	  $uploadSecondTo = "../bpjs/uploads/".$second_image_name;
	  $moveSecond = move_uploaded_file($second_image_tmp,$uploadSecondTo );
	}

$i=mysql_query("insert into data_perusahaan (id_kantor,id_pembina,x,y,npp,divisi,nama_perusahaan,alamat,jlh_aktif,status_peserta,potensi,foto,laporan,keterangan,tgl_masuk) values('$kantor','$pembina','$koordinat_x','$koordinat_y','$npp','$div','$nama_tempat','$alamat_perusahaan','$jumlah','$status','$potensi','$second_image_name','$laporan','$keterangan','$tgl')");

?>