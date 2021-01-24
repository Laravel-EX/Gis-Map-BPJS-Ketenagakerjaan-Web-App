					<div class="col-md-5">
						<h3>Edit Data</h3>
						<?php 
							include 'koneksi.php';
							$no=1;
							$id = $_REQUEST['d'];
							$sql = mysql_query("select * from kantor where id_kantor='$id' ");

							while($data=mysql_fetch_array($sql))
							{ 
								$id = $data['id_kantor'];
								$kode=$data['kode_kantor'];
								$nama_kantor=$data['nama_kantor'];
						?>
						<form method="post" action="?page=kantor/pro_kan_edit.php">
							<input type="hidden" name="id" value="<?php echo $id ?>">
							<div class="form-group">
								<label>Kode Kantor</label>
								<input type="text" name="kode" class="form-control" value="<?php echo $kode; ?>">
							</div>
							<div class="form-group">
								<label>Nama Kantor</label>
								<input type="text" name="nakan" class="form-control" id="lng" value="<?php echo $nama_kantor ?>">
							</div>
			                <input type="submit" class="btn btn-primary" value="Simpan" /></button>
		                </form>
		                <?php } ?>
		            </div>