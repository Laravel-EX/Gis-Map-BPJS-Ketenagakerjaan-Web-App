<?php error_reporting(0); ?>
<div class="col-md-12">
	<a href="?page=user/form_user.php" class="btn btn-primary" style="margin: 10px;">Tambah</a>
	<div class="box-body table-responsive">
		<table id="example1" class="table table-bordered table-hover">
			<thead>
				<tr>
			    	<th>No</th>
			       
			        <th>Username</th>
			        <th>Option</th>
			    </tr>
			</thead>
			<tbody>
				<?php
				include 'koneksi.php';
				$no=1;
				$sql = mysql_query("select * from user where id_kantor='$kantor' and status='admincabang'");

				while($data=mysql_fetch_array($sql))
				{ 
					$id = $data['id_user'];
					$username=$data['username'];
					
				
					echo"
						<tr>
							<td>$no</td>
							<td>$username</td>
				            <td>
				            	<a href='?page=user/edit_kan.php&d=$id' class='btn btn-primary'>Edit</a>
				            	<a href='?page=user/hapus.php&d=$id' class='btn btn-danger'>Hapus</a>
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