
<div class="col-md-12">
	<a href="?page=pembina/form_pembina.php" class="btn btn-primary" style="margin: 10px;">Tambah</a>
	<div class="box-body table-responsive">
		<table id="example1" class="table table-bordered table-hover">
			<thead>
				<tr>
			    	<th>No</th>
			        <th>Nama Pembina</th> 
			        <th>Nama Kantor</th>   
			        <th>Option</th>
			    </tr>
			</thead>
			<tbody>
				<?php
				include 'koneksi.php';
				$no=1;
				$sql = mysql_query("select * from pembina p, kantor k where p.id_kantor=k.id_kantor and k.id_kantor='$kantor'");

				while($data=mysql_fetch_array($sql))
				{ 
					$id = $data['id_pembina'];
					$nama_pembina=$data['nama_pembina'];
					$nama_kantor=$data['nama_kantor'];
					$id_user=$data['id_user'];
					echo"
						<tr>
							<td>$no</td>
							<td>$nama_pembina</td>
							<td>$nama_kantor</td>
				            <td>";
				            	if($id_user!='0')
				            	{


				            	echo "
				            	<a href='?page=pembina/edit_pembina.php&d=$id&q=1' class='btn btn-primary'>Edit</a>";
				            }
				            else{
				            	echo "<a href='?page=pembina/edit_pembina.php&d=$id' class='btn btn-primary'>SET</a>";
				            	
				            }
				         echo   "<a href='?page=pembina/hapus.php&d=$id' class='btn btn-danger'>Hapus</a>

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