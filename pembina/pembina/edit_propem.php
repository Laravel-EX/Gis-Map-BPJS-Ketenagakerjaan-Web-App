<?php 
	include 'koneksi.php';

	$id = $_REQUEST['id'];
	$kode = $_REQUEST['kode'];
	$napem = $_REQUEST['napem'];
	$kantor = $_REQUEST['kantor'];

	$ua = $_REQUEST['ua'];
	$pass = $_REQUEST['pass'];

	if ($napem!=="") {
		$ew=mysql_query("INSERT INTO user (username,password,status,id_kantor) VALUES('$ua','$pass','pembina','$kantor')");
		$tt=mysql_insert_id();

		$query = mysql_query("UPDATE pembina SET kode_pembina = '$kode', nama_pembina = '$napem', id_user='$tt' WHERE id_pembina = '$id';");
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