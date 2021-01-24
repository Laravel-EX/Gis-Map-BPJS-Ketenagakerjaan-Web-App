
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
				$sql = mysql_query("select * from pembina p, kantor k where p.id_pembina=p.id_pembina and p.id_kantor=k.id_kantor");

				while($data=mysql_fetch_array($sql))
				{ 
					$id = $data['id_pembina'];
					$nama_pembina=$data['nama_pembina'];
					$nama_kantor=$data['nama_kantor'];
				
					echo"
						<tr>
							<td>$no</td>
							<td>$nama_pembina</td>
							<td>$nama_kantor</td>
				            <td>
				            	<a href='?page=pembina/edit_pembina.php&d=$id'>Edit</a>
				            	<a href='?page=pembina/hapus.php&d=$id'>Hapus</a>
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