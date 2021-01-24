<?php 
	include 'koneksi.php';

	$id = $_REQUEST['d'];
	if ($id==true) {
		$hapus = mysql_query("DELETE FROM pembina WHERE id_pembina= '$id' ");

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