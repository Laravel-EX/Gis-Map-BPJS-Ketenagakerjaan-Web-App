<?php 
	include 'koneksi.php';

	$id = $_REQUEST['id'];
	$kode = $_REQUEST['kode'];
	$nakan = $_REQUEST['nakan'];
	$ua = $_REQUEST['ua'];
	$pass = $_REQUEST['pass'];
	$id_user = $_REQUEST['id_user'];

$koordinat_x = $_POST['koordinat_x'];
$koordinat_y = $_POST['koordinat_y'];


	if ($napem!=="") {

		$query = mysql_query("UPDATE kantor SET kode_kantor = '$kode', nama_kantor = '$nakan', latx='$koordinat_x', laty='$koordinat_y' WHERE id_kantor = '$id';");
		$ss=mysql_query("UPDATE user SET username='$ua', password='$pass' WHERE id_user='$id_user'");
		echo "
			<script type='text/javascript'>
				window.location='index.php'
			</script>
		";
	} else {
		echo "
			<script type='text/javascript'>
				window.location='index.php'
			</script>
		";
	}
?>