<?php 
	include 'koneksi.php';

	$id = $_REQUEST['id'];
	$kode = $_REQUEST['kode'];
	$nakan = $_REQUEST['nakan'];

	if ($napem!=="") {

		$query = mysql_query("UPDATE kantor SET kode_kantor = '$kode', nama_kantor = '$nakan' WHERE id_kantor = '$id';");
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