<?php
$q=$_REQUEST['q'];
if($q!="1")
{ ?>

					<div class="col-md-5">
						<h3>Edit Data</h3>
						<?php 
							include 'koneksi.php';
							$no=1;
							$id = $_REQUEST['d'];
							$sql = mysql_query("select * from pembina p where id_pembina='$id'");

							$data=mysql_fetch_array($sql);
								$id = $data['id_pembina'];
								$kode = $data['kode_pembina'];
								$nama_pembina=$data['nama_pembina'];
						?>
						<form method="post" action="?page=pembina/pro_pem_edit.php">
							<input type="hidden" name="id" value="<?php echo $id ?>">
							<input type="hidden" name="id_user" value="<?php echo $id_user ?>">
							<div class="form-group">
								<label>Kode Pembina</label>
								<input type="text" name="kode" class="form-control" value="<?php echo $kode; ?>">
							</div>
							<div class="form-group">
								<label>Nama Cabang</label>
								<select name="kantor" class="form-control">
									<?php 
										$dml = mysql_query("SELECT * FROM kantor k, pembina p where k.id_kantor=p.id_kantor and p.id_pembina='$id' ORDER BY p.id_kantor DESC");
										
										while($ambil = mysql_fetch_array($dml)){
										$id = $ambil['id_kantor'];
										$nama = $ambil['nama_kantor'];
									?>
									<option value="<?php echo $id ?>"><?php echo $nama; ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="form-group">
								<label>Nama Pembina</label>
								<input type="text" name="napem" class="form-control" value="<?php echo $nama_pembina ?>">
							</div>
								<div class="form-group">
								<label>User Pembina</label>
								<input type="text" name="ua" class="form-control" placeholder="Username" value="<?php echo $username ?>">
							</div>
								<div class="form-group">
								<label>Password Pembina</label>
								<input type="text" name="pass" class="form-control" placeholder="Password" value="<?php echo $password ?>">
							</div>
							
			                <input type="submit" class="btn btn-primary" value="Simpan" /></button>
		                </form>
		               
		            </div>

<?php }
else
{

?>

					<div class="col-md-5">
						<h3>Edit Data</h3>
						<?php 
							include 'koneksi.php';
							$no=1;
							$id = $_REQUEST['d'];
							$sql = mysql_query("select * from pembina p, user u where p.id_user=u.id_user and p.id_pembina='$id'");

							$data=mysql_fetch_array($sql);
								$id = $data['id_pembina'];
								$kode = $data['kode_pembina'];
								$nama_pembina=$data['nama_pembina'];
								$username=$data['username'];
								$password=$data['password'];
								$id_user=$data['id_user'];
						?>
						<form method="post" action="?page=pembina/pro_pem_edit.php">
							<input type="hidden" name="id" value="<?php echo $id ?>">
							<input type="hidden" name="id_user" value="<?php echo $id_user ?>">
							<div class="form-group">
								<label>Kode Pembina</label>
								<input type="text" name="kode" class="form-control" value="<?php echo $kode; ?>">
							</div>
							<div class="form-group">
								<label>Nama Cabang</label>
								<select name="kantor" class="form-control">
									<?php 
										$dml = mysql_query("SELECT * FROM kantor k, pembina p where k.id_kantor=p.id_kantor and p.id_pembina='$id' ORDER BY p.id_kantor DESC");
										
										while($ambil = mysql_fetch_array($dml)){
										$id = $ambil['id_kantor'];
										$nama = $ambil['nama_kantor'];
									?>
									<option value="<?php echo $id ?>"><?php echo $nama; ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="form-group">
								<label>Nama Pembina</label>
								<input type="text" name="napem" class="form-control" value="<?php echo $nama_pembina ?>">
							</div>
								<div class="form-group">
								<label>User Admin</label>
								<input type="text" name="ua" class="form-control" placeholder="Username" value="<?php echo $username ?>">
							</div>
								<div class="form-group">
								<label>Password Admin</label>
								<input type="text" name="pass" class="form-control" placeholder="Password" value="<?php echo $password ?>">
							</div>
			                <input type="submit" class="btn btn-primary" value="Simpan" /></button>
		                </form>
		               
		            </div>
		            <?php } ?>