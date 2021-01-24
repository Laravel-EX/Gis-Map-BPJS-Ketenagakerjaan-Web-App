					<div class="col-md-5">
						<h3>Tambah Data</h3>
						<form method="post" action="?page=pembina/pro_pem.php">
							<div class="form-group">
								<label>Kode Pembina</label>
								<input type="text" name="kode" class="form-control" placeholder="Kode Pembina">
							</div>
							<div class="form-group">
								<label>Nama Perusahaan</label>
								<select name="kantor" class="form-control">
									<?php 
										include 'koneksi.php';
										$dml = mysql_query("SELECT * FROM kantor ORDER BY id_kantor DESC");
										
										while($ambil = mysql_fetch_array($dml)){;
										$id = $ambil['id_kantor'];
										$nama = $ambil['nama_kantor'];
									?>
									<option value="<?php echo $id ?>"><?php echo $nama; ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="form-group">
								<label>Nama Pembina</label>
								<input type="text" name="napem" class="form-control" id="lng" placeholder="Nama Pembina">
							</div>
			                <input type="submit" class="btn btn-primary" value="Simpan" /></button>
		                </form>
		            </div>