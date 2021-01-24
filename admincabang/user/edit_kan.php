<?php error_reporting(0); ?>					<div class="col-md-5">
						<h3>Edit Data</h3>
						<?php 
							include 'koneksi.php';
							$no=1;
							$id = $_REQUEST['d'];
							$sql = mysql_query("select * from user where id_user='$id' ");

							$data=mysql_fetch_array($sql);
							
								$username=$data['username'];
								$id_user=$data['id_user'];
								$password=$data['password'];
						?>
						<form method="post" action="?page=kantor/pro_kan_edit.php">
							<input type="hidden" name="id_user" value="<?php echo $id_user ?>">
								
							
									<div class="form-group">
								<label>User Admin</label>
								<input type="text" name="ua" class="form-control" placeholder="Username" value="<?php echo $username ?>">
							</div>
								<div class="form-group">
								<label>Password Admin</label>
								<input type="password" name="pass" class="form-control" placeholder="Password" value="<?php echo $password ?>">
							</div>
			                <input type="submit" class="btn btn-primary" value="Simpan" /></button>
		                </form>
		               
		            </div>
		          