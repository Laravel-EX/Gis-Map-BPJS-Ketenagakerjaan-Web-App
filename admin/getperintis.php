<?php 
	include 'koneksi.php';

	$cek1 = $_REQUEST['cek1'];
	$dml = mysql_query("select * from perintis where id_utama='$cek1' ");
	while ($cek = mysql_fetch_array($dml)) {
		$kantor = $cek['nama_kantor'];
		$id_kantor = $cek['id_kantor'];
?>
	<option value="<?php echo $id_kantor; ?>"><?php echo $kantor; ?></option>
<?php } ?>