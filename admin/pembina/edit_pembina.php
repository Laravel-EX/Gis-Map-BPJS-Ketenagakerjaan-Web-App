					<div class="col-md-5">
						<h3>Edit Data</h3>
						<?php 
							include 'koneksi.php';
							$no=1;
							$id = $_REQUEST['d'];
							$sql = mysql_query("select * from pembina where id_pembina='$id'");

							while($data=mysql_fetch_array($sql)) { 
								$id = $data['id_pembina'];
								$kode = $data['kode_pembina'];
								$nama_pembina=$data['nama_pembina'];
						?>
						<form method="post" action="?page=pembina/pro_pem_edit.php">
							<input type="hidden" name="id" value="<?php echo $id ?>">
							<div class="form-group">
								<label>Kode Pembina</label>
								<input type="text" name="kode" class="form-control" value="<?php echo $kode; ?>">
							</div>
							<div class="form-group">
								<label>Nama Perusahaan</label>
								<select name="kantor" class="form-control">
									<?php 
										$dml = mysql_query("SELECT * FROM kantor ORDER BY id_kantor DESC");
										
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
			                <input type="submit" class="btn btn-primary" value="Simpan" /></button>
		                </form>
		                <?php } ?>
		            </div>