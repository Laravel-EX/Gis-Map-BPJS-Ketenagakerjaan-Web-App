					<div class="col-md-5">
						<h3>Tambah Data</h3>
						<form method="post" action="?page=pembina/pro_pem.php">
							<div class="form-group">
								<label>Kode Pembina</label>
								<input type="text" name="kode" class="form-control" placeholder="Kode Pembina">
							</div>
							
							<div class="form-group">
								<label>Nama Pembina</label>
								<input type="text" name="napem" class="form-control" id="lng" placeholder="Nama Pembina">
							</div>
							<div class="form-group">
								<label>User Admin</label>
								<input type="text" name="ua" class="form-control" placeholder="Username">
							</div>
								<div class="form-group">
								<label>Password Admin</label>
								<input type="text" name="pass" class="form-control" placeholder="Password">
							</div>
							<input type="hidden" name="kantor" value="<?php echo $kantor; ?>">
			                <input type="submit" class="btn btn-primary" value="Simpan" /></button>
		                </form>
		            </div>