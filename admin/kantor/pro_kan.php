<?php error_reporting(0); ?><?php 
	include '../koneksi.php';

	$kode = $_REQUEST['kode'];
	$nakan = $_REQUEST['nakan'];
	$ua = $_REQUEST['ua'];
	$pass = $_REQUEST['pass'];

$koordinat_x = $_POST['koordinat_x'];
$koordinat_y = $_POST['koordinat_y'];

	if ($nakan!=="") {

		$query = mysql_query("INSERT INTO kantor (kode_kantor, nama_kantor,latx,laty) VALUES ('$kode', '$nakan','$koordinat_x','$koordinat_y')");
		$t=mysql_insert_id();

		$qq=mysql_query("INSERT INTO user (username,password,status,id_kantor) VALUES ('$ua','$pass','admincabang','$t')");

		echo "
			<script type='text/javascript'>
				window.location='index.php?page=form_kantor.php'
			</script>
		";
	} else {
		echo "
			<script type='text/javascript'>
				window.location='index.php?page=form_kantor.php'
			</script>
		";
	}
?>