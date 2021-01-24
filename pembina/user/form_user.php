<?php error_reporting(0); ?>
					<div class="col-md-5">
						
						<form method="post" action="user/pro_kan.php">
						<input type="text" name="kantor" value="<?php echo $kantor; ?>">
								<div class="form-group">
								<label>User Admin</label>
								<input type="text" name="ua" class="form-control" placeholder="Username">
							</div>
								<div class="form-group">
								<label>Password Admin</label>
								<input type="password" name="pass" class="form-control" placeholder="Password">
							</div>

			                <input type="submit" class="btn btn-primary" value="Simpan" /></button>
		                </form>
		            </div>