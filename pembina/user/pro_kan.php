<?php error_reporting(0); ?><?php 
	include '../koneksi.php';

	
	$ua = $_REQUEST['ua'];
	$pass = $_REQUEST['pass'];
	$kantor=$_REQUEST['kantor'];


	if ($ua!=="") {

	
		$qq=mysql_query("INSERT INTO user (username,password,status,id_kantor) VALUES ('$ua','$pass','admincabang','$kantor')");

		echo "
			<script type='text/javascript'>
				window.location='../index.php?page=user/user.php'
			</script>
		";
	} else {
		echo "
			<script type='text/javascript'>
				window.location='../index.php?page=user/user.php'
			</script>
		";
	}
?>