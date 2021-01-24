<?php 
	include 'koneksi.php';

	$kode = $_REQUEST['kode'];
	$napem = $_REQUEST['napem'];
	$kantor = $_REQUEST['kantor'];
	$ua = $_REQUEST['ua'];
	$pass = $_REQUEST['pass'];


	if ($napem!=="") {
		$ew=mysql_query("INSERT INTO user (username,password,status,id_kantor) VALUES('$ua','$pass','pembina','$kantor')");
		$tt=mysql_insert_id();


		$query = mysql_query("INSERT INTO pembina (id_kantor, kode_pembina, nama_pembina, id_user) VALUES ('$kantor', '$kode', '$napem','$tt');");
		

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