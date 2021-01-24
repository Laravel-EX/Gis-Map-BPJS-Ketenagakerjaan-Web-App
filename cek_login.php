<?php error_reporting(0); 
	session_start();
	include 'admin/koneksi.php';

	$user=$_REQUEST['user'];
	$pass=$_REQUEST['pass'];

if($user!=="" && $pass!=="") {
	$sql=mysql_query("SELECT * FROM user WHERE username='$user' AND password='$pass' ");
	$cek=mysql_num_rows($sql);

	if ($cek > 0) {
		$ambil = mysql_fetch_array($sql);
		$status = $ambil['status'];
		$user = $ambil['username'];
		$id_user=$ambil['id_user'];
      	$kantor=$ambil['id_kantor'];

		$_SESSION['username']=$user;
		$_SESSION['id_user']=$id_user;
		$_SESSION['status']=$status;
		$_SESSION['kantor']=$kantor;

		if ($status=="admin") {
			echo "
				<script>
					window.location.href= 'admin/index.php'
				</script>
			";
		} 
		elseif ($status=="admincabang") {
			echo "
				<script>
					window.location.href= 'admincabang/index.php'
				</script>
			";
		} 
		elseif ($status=="pembina") {
			echo "
				<script>
					window.location.href= 'pembina/index.php'
				</script>
			";
		} 



	} else {
		echo "
			<script>
				alert('Username Dan Password Salah');
				window.location.href='index.php'
			</script>
		";
	}

} else {
	echo "
		<script>
			alert('Login Gagal');
			window.location.href='index.php'
		</script>
	";
}
?>
