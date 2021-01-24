<?php 
	include 'koneksi.php';

	$id = $_REQUEST['id'];
	$kode = $_REQUEST['kode'];
	$napem = $_REQUEST['napem'];
	$kantor = $_REQUEST['kantor'];

	if ($napem!=="") {

		$query = mysql_query("UPDATE pembina SET kode_pembina = '$kode', nama_pembina = '$napem' WHERE id_pembina = '$id';");
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