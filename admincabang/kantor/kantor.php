<?php error_reporting(0); ?>
<div class="col-md-12">

	<div class="box-body table-responsive">
		<table id="example1" class="table table-bordered table-hover">
			<thead>
				<tr>
			    	<th>No</th>
			        <th>Kode Kantor</th> 
			        <th>Nama Kantor</th> 
			        <th>X</th>
			        <th>Y</th>  
			        <th>Option</th>
			    </tr>
			</thead>
			<tbody>
				<?php
				include 'koneksi.php';
				$no=1;
				$sql = mysql_query("select * from kantor where id_kantor='$kantor'");

				while($data=mysql_fetch_array($sql))
				{ 
					$id = $data['id_kantor'];
					$kode=$data['kode_kantor'];
					$nama_kantor=$data['nama_kantor'];
					$x=$data['latx'];
					$y=$data['laty'];
				
					echo"
						<tr>
							<td>$no</td>
							<td>$kode</td>
							<td>$nama_kantor</td>
							<td>$x</td>
							<td>$y</td>
				            <td>
				            	<a href='?page=kantor/edit_kan.php&d=$id' class='btn btn-primary'>Edit</a>
				            	<a href='?page=kantor/hapus.php&d=$id' class='btn btn-danger'>Hapus</a>
				            </td>
				        </tr>
					";
					$no++;
				}
			?>
			</tbody>
		</table>
	</div><!-- /.box-body -->
</div>