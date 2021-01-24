<?php 
	error_reporting(0);

session_start();
$status = $_SESSION['status'];
$id_user = $_SESSION['id_user'];
$user = $_SESSION['username'];
$kantor=$_SESSION['kantor'];

include "koneksi.php";
$q=mysql_query("select * from pembina where id_user='$id_user'");
$w=mysql_fetch_array($q);
$pembina=$w['id_pembina'];
$x=mysql_num_rows($q);

if ($status!="pembina") {
  echo "
    <script>
      alert('Silahkan Login Terlebih Dahulu');
      window.location.href='../'
    </script>
  ";
}

if($x<1)
{
    echo "
    <script>
      alert('Ada Kesalahan Pada Akun Anda, Mohon Meminta Admin Untuk Mereset Akun Anda');
      window.location.href='../index.php'
    </script>
  ";
}
else
{
    

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Sistem Informasi Digital Company Location</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"> 
   		<link rel="stylesheet" href="css/AdminLTE.css">
   		<link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
	    <!-- DataTable -->
	    <link rel="stylesheet" type="text/css" href="plugins/datatables/dataTables.bootstrap.css">   	
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDmPbUQ-1Iy-XMEInMvNp1WqteVqmvDdOU"></script>
   
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="navbar-wrapper">
				    <div>
				        <!--MENU-->
			        	<div class="top-menu">
		                    <a class="navbar-brand" href="#">
		                        <img src="g.png">
		                    </a>
				           	<img src="../logo.png" style="margin-top: 45px; margin-left: 30px;">
				        </div>
				        <nav id="header" class="navbar">
				            <div id="header-container" class="navbar-default navbar-container">
				                <div class="navbar-header">
				                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				                        <span class="sr-only">Toggle navigation</span>
				                        <span class="icon-bar"></span>
				                        <span class="icon-bar"></span>
				                        <span class="icon-bar"></span>
				                    </button>
				                </div>
				                <div id="navbar" class="collapse navbar-collapse">
				                    <ul class="nav navbar-nav">
				                        <li><a style="font-weight: bold; color: black; font-size: 17px;" href="index.php">Home</a></li>
				                            <li>
				                            	<a style="font-weight: bold; color: black; font-size: 17px;" href="?page=show.php">Peserta</a>
				                            </li>
				                             <li>
				                            	<a style="font-weight: bold; color: black; font-size: 17px;" href="?page=tampil.php">Map</a>
				                            </li>
				                        <li><a style="font-weight: bold; color: black; font-size: 17px;" href="?page=pembina/edit_pembina.php">Profile</a></li>				                          
				                          <li><a style="font-weight: bold; color: black; font-size: 17px;" href="?page=caraguna.php">Cara Penggunaan</a></li>
				                        <li><a style="font-weight: bold; color: black; font-size: 17px;" href="logout.php">Logout</a></li>
				                       
				                    </ul>
				                </div><!-- /.nav-collapse -->
				            </div><!-- /.container -->
				        </nav><!-- /.navbar -->
				    </div>
				</div>
			</div>

			<?php 
				$page = $_GET['page'];
				if (empty($page)) {
					include 'map_new.php';
				} else {
					include $page;
				}
			?>

		</div>
		<script src="jquery.js"></script>
		<script src="js/bootstrap.js"></script>
	    <!-- DataTables -->
	    <script src="js/datatables/jquery.dataTables.min.js"></script>
	    <script src="js/datatables/dataTables.bootstrap.min.js"></script>
		<script>
	      $(function () {
	        $("#example1").DataTable();
	        $('#example2').DataTable({
	          "paging": true,
	          "lengthChange": false,
	          "searching": false,
	          "ordering": true,
	          "info": true,
	          "autoWidth": false
	        });
	      });
	    </script>
	</body>
</html>
<?php } ?>