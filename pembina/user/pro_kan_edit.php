<?php 
	include 'koneksi.php';


	$ua = $_REQUEST['ua'];
	$pass = $_REQUEST['pass'];
	$id_user = $_REQUEST['id_user'];

	if ($ua!=="") {

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