<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Data
        <small></small>
    </h1>
   
</section>
<!-- Main content -->
<section class="content">
	<a href="?page=map1.php" class="btn btn-primary" style="margin: 10px;">Tambah</a>
<?php error_reporting(0); ?><?php
include "koneksi.php"; ?>
<div class="box-body table-responsive">
	<table id="example1" class="table table-bordered table-hover">
		<thead>
			<tr>
		    	<th>No</th>
		    	<th>Nama Perusahaan</th>        
		        <th>Alamat Perusahaan</th>
		        <th>Nama Pembina</th>  
		        <th>Latitude</th>  
		        <th>Longitude</th>  
		        <th>Jumlah Aktif</th>  
		        <th>NPP</th>  
		        <th>DIV</th>
		        <th>Status Kepesertaan</th>
		        <th>Nama Kantor</th>  
		        <th>Option</th>
		    </tr>
		</thead>
		<tbody>
			<?php
			$no=1;
			$sql = mysql_query("select * from data_perusahaan d, pembina p, kantor k where d.id_pembina=p.id_pembina and d.id_kantor=k.id_kantor ");

			while($data=mysql_fetch_array($sql))
			{ 
				$id_perusahaan=$data['id_perusahaan'];
				$nama_pembina=$data['nama_pembina'];
				$nama_kantor=$data['nama_kantor'];
				$nama_perusahaan=$data['nama_perusahaan'];
				$x=$data['x'];
				$y=$data['y'];
				$npp=$data['npp'];
				$div=$data['div'];
				$jlh_aktif=$data['jlh_aktif'];
				$potensi=$data['potensi'];
				$keterangan=$data['keterangan'];
				$alamat_perusahaan=$data['alamat'];
				$status_peserta=$data['status_peserta'];
			
				echo"
					<tr>
						<td>$no</td>
						<td>$nama_perusahaan</td>
						<td>$alamat_perusahaan</td>
						<td>$nama_pembina</td>
						<td>$x</td>
						<td>$y</td>
						<td>$jlh_aktif</td>
						<td>$npp</td>
						<td>$div</td>

						<td>$status_peserta</td>
						<td>$nama_kantor</td>
						
			            <td> ";
			            	if($x!="0.00000")
			            	{
			            		echo "<a href='index.php?page=map1.php&id=$id_perusahaan&edit=true' class='btn btn-primary'>Edit</a>	";
			            	}
			            	else
			            	{

			            	echo " <a href='index.php?page=sets.php&id=$id_perusahaan' class='btn btn-primary'>Set</a>";

			            	}
			            	echo "<a href='include/bunga/bunga_hapus.php?id=$id_bunga' onClick='return confirm(\"Anda ingin menghapus data?\")' class='btn btn-danger'>Hapus</a>
			            </td>
			        </tr>
				";
				$no++;
			}
		?>
		</tbody>
	</table>
</div><!-- /.box-body -->

</section><!-- /.content -->