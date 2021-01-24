<?php 
	include 'koneksi.php';

	$kode = $_REQUEST['kode'];
	$napem = $_REQUEST['napem'];
	$kantor = $_REQUEST['kantor'];

	if ($napem!=="") {

		$query = mysql_query("INSERT INTO pembina (id_kantor, kode_pembina, nama_pembina) VALUES ('$kantor', '$kode', '$napem');");
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