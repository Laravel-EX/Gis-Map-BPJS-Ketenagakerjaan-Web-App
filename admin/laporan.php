<!-- Content Header (Page header) -->
<section class="content-header">
  
</section>
<!-- Main content -->
<section class="content">
	<h1>Data Laporan Peserta Yang Sudah Di Update</h1>
<?php error_reporting(0); ?><?php
include "koneksi.php"; ?>
<div class="box-body table-responsive">
<div class="row">
		<div class="col-md-9">
			<form action="index.php?page=laporan.php" method="post">
				<div class="col-md-3">
					<div class="form-group">
						<select name="cek1" class="form-control" id="cek1" name="cari"> 
							<option value="">Pilih Kantor Cabang</option>
							<?php 
								include 'koneksi.php';
								$dml = mysql_query("select * from kantor k, utama u where k.id_kantor=u.id_kantor");
								while ($cek = mysql_fetch_array($dml)) {
									$kantor = $cek['nama_kantor'];
								$id_kantor = $cek['id_kantor'];
							?>
							<option value="<?php echo $id_kantor; ?>"><?php echo $kantor; ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<select name="cek2" class="form-control" id="perintis" name="cari">
							<option value="">Pilih Kantor Perintis</option>
							<?php 
								include 'koneksi.php';
								$dml = mysql_query("select * from kantor k, perintis u where k.id_kantor=u.id_kantor");
								while ($cek = mysql_fetch_array($dml)) {
									$kantor = $cek['nama_kantor'];
									$id_kantor = $cek['id_kantor'];
							?>
							<option value="<?php echo $id_kantor; ?>"><?php echo $kantor; ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
			
				<div class="col-md-3">
					<div class="form-group">
						<input type="submit" value="Cari"  class="btn btn-info"> 
						<input type="button" name="excel" class="btn btn-info" value="Excel" onclick="location.href='excel.php';">

					</div>
				</div>
			</form>
		</div>
	</div>
	<table id="example1" class="table table-bordered table-hover">
		<thead>
			<tr>
		    	<th rowspan="2">No</th>
		    	<th rowspan="2">Kode</th>
		    	<th rowspan="2">Kantor Cabang</th>    
		        <th colspan="5" align="center">Jumlah Perusahaan</th>
		    </tr>
		    <tr>
		        <th>Peserta</th>  
		        <th>Potensi</th>  
		        <th>Centralisasi</th>  
		        <th>BPU</th>  
		        <th>Potensi BPU</th>
		    </tr>
		</thead>
		<tbody>
	<?php
	$cek1=$_REQUEST['cek1'];
	$cek2=$_REQUEST['cek2'];
//echo $cek1;
	if($cek1=="" && $cek2=="")
	{ 
			$no=1;
			$sql = mysql_query("select *, count(id_perusahaan) as total from kantor k, data_perusahaan p, utama u where k.id_kantor=u.id_kantor and k.id_kantor=p.id_kantor group by k.id_kantor");

			while($data=mysql_fetch_array($sql))
			{ 
				$r=$data['id_utama'];
				$id_kantor=$data['id_kantor'];
				$kode_kantor=$data['kode_kantor'];	
				$nama_kantor=$data['nama_kantor'];				
				$status_peserta=$data['status_peserta'];
			$p=mysql_query("select count(status_peserta) as pes from data_perusahaan where status_peserta='PESERTA' and id_kantor='$id_kantor' and x<>''");
			$rr=mysql_fetch_array($p);
			$pes=$rr['pes'];

			$p1=mysql_query("select count(status_peserta) as pes from data_perusahaan where status_peserta='NONPESERTA' and id_kantor='$id_kantor' and x<>''");
			$rr1=mysql_fetch_array($p1);
			$pes1=$rr1['pes'];

			$p2=mysql_query("select count(status_peserta) as pes from data_perusahaan where status_peserta='CENTRALISASI' and id_kantor='$id_kantor' and x<>''");
			$rr2=mysql_fetch_array($p2);
			$pes2=$rr2['pes'];

			$p3=mysql_query("select count(status_peserta) as pes from data_perusahaan where status_peserta='BPU' and id_kantor='$id_kantor' and x<>''");
			$rr3=mysql_fetch_array($p3);
			$pes3=$rr3['pes'];

			$p4=mysql_query("select count(status_peserta) as pes from data_perusahaan where status_peserta='NONBPU' and id_kantor='$id_kantor' and x<>''");
			$rr4=mysql_fetch_array($p4);
			$pes4=$rr4['pes'];

			
			

				echo"
					<tr>
						<td>$no</td>
						<td><b>$kode_kantor</b></td>
						<td><b>$nama_kantor</b></td>
						<td>$pes</td>
						<td>$pes1</td>
						<td>$pes2</td>
						<td>$pes3</td>
						<td>$pes4</td>
						
			        </tr>
				";
				//echo $r;
				
				$p=mysql_query("select * from utama u, kantor k, data_perusahaan d, perintis p where u.id_utama=p.id_utama and k.id_kantor=d.id_kantor and k.id_kantor=p.id_kantor and u.id_utama='$r' group by k.id_kantor ");
				
				$n=1;
				while($z=mysql_fetch_array($p))
				{
				$id_kantor1=$z['id_kantor'];
				$nama_kantor1=$z['nama_kantor'];
				$kode_kantor1=$z['kode_kantor'];				
				$status_peserta1=$z['status_peserta'];

			$pa=mysql_query("select count(status_peserta) as pes from data_perusahaan where status_peserta='PESERTA' and id_kantor='$id_kantor1' and x<>''");
			$rra=mysql_fetch_array($pa);
			$pesa=$rra['pes'];

			$p1a=mysql_query("select count(status_peserta) as pes from data_perusahaan where status_peserta='NONPESERTA' and id_kantor='$id_kantor1' and x<>''");
			$rr1a=mysql_fetch_array($p1a);
			$pes1a=$rr1a['pes'];

			$p2a=mysql_query("select count(status_peserta) as pes from data_perusahaan where status_peserta='CENTRALISASI' and id_kantor='$id_kantor1' and x<>''");
			$rr2a=mysql_fetch_array($p2a);
			$pes2a=$rr2a['pes'];

			$p3a=mysql_query("select count(status_peserta) as pes from data_perusahaan where status_peserta='BPU' and id_kantor='$id_kantor1' and x<>''");
			$rr3a=mysql_fetch_array($p3a);
			$pes3a=$rr3a['pes'];

			$p4a=mysql_query("select count(status_peserta) as pes from data_perusahaan where status_peserta='NONBPU' and id_kantor='$id_kantor1' and x<>''");
			$rr4a=mysql_fetch_array($p4a);
			$pes4a=$rr4a['pes'];	
				
				
				//echo "<font color=red>".$x."</font><br>";
				
				echo"
					<tr>
						<td>$no.$n</td>
						<td>$kode_kantor1</td>
						<td>$nama_kantor1</td>
						<td>$pesa</td>
						<td>$pes1a</td>
						<td>$pes2a</td>
						<td>$pes3a</td>
						<td>$pes4a</td>
						
			        </tr>
					";
					$n++;
				}
				$no++;
			}
		

	}
	elseif($cek1!="" && $cek2=="")
	{

		$no=1;
			$sql = mysql_query("select *, count(id_perusahaan) as total from kantor k, data_perusahaan p, utama u where k.id_kantor=u.id_kantor and k.id_kantor=p.id_kantor and k.id_kantor='$cek1' group by k.id_kantor");

			while($data=mysql_fetch_array($sql))
			{ 
				$r=$data['id_utama'];
				$id_kantor=$data['id_kantor'];
				$kode_kantor=$data['kode_kantor'];	
				$nama_kantor=$data['nama_kantor'];				
				$status_peserta=$data['status_peserta'];
			$p=mysql_query("select count(status_peserta) as pes from data_perusahaan where status_peserta='PESERTA' and id_kantor='$id_kantor' and x<>''");
			$rr=mysql_fetch_array($p);
			$pes=$rr['pes'];

			$p1=mysql_query("select count(status_peserta) as pes from data_perusahaan where status_peserta='NONPESERTA' and id_kantor='$id_kantor' and x<>''");
			$rr1=mysql_fetch_array($p1);
			$pes1=$rr1['pes'];

			$p2=mysql_query("select count(status_peserta) as pes from data_perusahaan where status_peserta='CENTRALISASI' and id_kantor='$id_kantor' and x<>''");
			$rr2=mysql_fetch_array($p2);
			$pes2=$rr2['pes'];

			$p3=mysql_query("select count(status_peserta) as pes from data_perusahaan where status_peserta='BPU' and id_kantor='$id_kantor' and x<>''");
			$rr3=mysql_fetch_array($p3);
			$pes3=$rr3['pes'];

			$p4=mysql_query("select count(status_peserta) as pes from data_perusahaan where status_peserta='NONBPU' and id_kantor='$id_kantor' and x<>''");
			$rr4=mysql_fetch_array($p4);
			$pes4=$rr4['pes'];

			
			

				echo"
					<tr>
						<td>$no</td>
						<td><b>$kode_kantor</b></td>
						<td><b>$nama_kantor</b></td>
						<td>$pes</td>
						<td>$pes1</td>
						<td>$pes2</td>
						<td>$pes3</td>
						<td>$pes4</td>
						
			        </tr>
				";
				//echo $r;
				
				$p=mysql_query("select * from utama u, kantor k, data_perusahaan d, perintis p where u.id_utama=p.id_utama and k.id_kantor=d.id_kantor and k.id_kantor=p.id_kantor and u.id_utama='$r' group by k.id_kantor ");
				
				$n=1;
				while($z=mysql_fetch_array($p))
				{
				$id_kantor1=$z['id_kantor'];
				$nama_kantor1=$z['nama_kantor'];
				$kode_kantor1=$z['kode_kantor'];				
				$status_peserta1=$z['status_peserta'];

			$pa=mysql_query("select count(status_peserta) as pes from data_perusahaan where status_peserta='PESERTA' and id_kantor='$id_kantor1' and x<>''");
			$rra=mysql_fetch_array($pa);
			$pesa=$rra['pes'];

			$p1a=mysql_query("select count(status_peserta) as pes from data_perusahaan where status_peserta='NONPESERTA' and id_kantor='$id_kantor1' and x<>''");
			$rr1a=mysql_fetch_array($p1a);
			$pes1a=$rr1a['pes'];

			$p2a=mysql_query("select count(status_peserta) as pes from data_perusahaan where status_peserta='CENTRALISASI' and id_kantor='$id_kantor1' and x<>''");
			$rr2a=mysql_fetch_array($p2a);
			$pes2a=$rr2a['pes'];

			$p3a=mysql_query("select count(status_peserta) as pes from data_perusahaan where status_peserta='BPU' and id_kantor='$id_kantor1' and x<>''");
			$rr3a=mysql_fetch_array($p3a);
			$pes3a=$rr3a['pes'];

			$p4a=mysql_query("select count(status_peserta) as pes from data_perusahaan where status_peserta='NONBPU' and id_kantor='$id_kantor1' and x<>''");
			$rr4a=mysql_fetch_array($p4a);
			$pes4a=$rr4a['pes'];	
				
				
				//echo "<font color=red>".$x."</font><br>";
				
				echo"
					<tr>
						<td>$no.$n</td>
						<td>$kode_kantor1</td>
						<td>$nama_kantor1</td>
						<td>$pesa</td>
						<td>$pes1a</td>
						<td>$pes2a</td>
						<td>$pes3a</td>
						<td>$pes4a</td>
						
			        </tr>
					";
					$n++;
				}
				$no++;
			}
		
	}
	elseif($cek1!="" && $cek2!="")
	{

		$no=1;
			$sql = mysql_query("select *, count(id_perusahaan) as total from kantor k, data_perusahaan p, utama u where k.id_kantor=u.id_kantor and k.id_kantor=p.id_kantor and k.id_kantor='$cek2' group by k.id_kantor");

			while($data=mysql_fetch_array($sql))
			{ 
				$r=$data['id_utama'];
				$id_kantor=$data['id_kantor'];
				$kode_kantor=$data['kode_kantor'];	
				$nama_kantor=$data['nama_kantor'];				
				$status_peserta=$data['status_peserta'];
			$p=mysql_query("select count(status_peserta) as pes from data_perusahaan where status_peserta='PESERTA' and id_kantor='$id_kantor' and x<>''");
			$rr=mysql_fetch_array($p);
			$pes=$rr['pes'];

			$p1=mysql_query("select count(status_peserta) as pes from data_perusahaan where status_peserta='NONPESERTA' and id_kantor='$id_kantor' and x<>''");
			$rr1=mysql_fetch_array($p1);
			$pes1=$rr1['pes'];

			$p2=mysql_query("select count(status_peserta) as pes from data_perusahaan where status_peserta='CENTRALISASI' and id_kantor='$id_kantor' and x<>''");
			$rr2=mysql_fetch_array($p2);
			$pes2=$rr2['pes'];

			$p3=mysql_query("select count(status_peserta) as pes from data_perusahaan where status_peserta='BPU' and id_kantor='$id_kantor' and x<>''");
			$rr3=mysql_fetch_array($p3);
			$pes3=$rr3['pes'];

			$p4=mysql_query("select count(status_peserta) as pes from data_perusahaan where status_peserta='NONBPU' and id_kantor='$id_kantor' and x<>''");
			$rr4=mysql_fetch_array($p4);
			$pes4=$rr4['pes'];

			
			

				echo"
					<tr>
						<td>$no</td>
						<td><b>$kode_kantor</b></td>
						<td><b>$nama_kantor</b></td>
						<td>$pes</td>
						<td>$pes1</td>
						<td>$pes2</td>
						<td>$pes3</td>
						<td>$pes4</td>
						
			        </tr>
				";
				//echo $r;
				$p=mysql_query("select * from utama u, kantor k, data_perusahaan d, perintis p where u.id_utama=p.id_utama and k.id_kantor=d.id_kantor and k.id_kantor=p.id_kantor and u.id_utama='$r' group by k.id_kantor ");
				
				$n=1;
				while($z=mysql_fetch_array($p))
				{
				$id_kantor1=$z['id_kantor'];
				$nama_kantor1=$z['nama_kantor'];
				$kode_kantor1=$z['kode_kantor'];				
				$status_peserta1=$z['status_peserta'];

			$pa=mysql_query("select count(status_peserta) as pes from data_perusahaan where status_peserta='PESERTA' and id_kantor='$id_kantor1' and x<>''");
			$rra=mysql_fetch_array($pa);
			$pesa=$rra['pes'];

			$p1a=mysql_query("select count(status_peserta) as pes from data_perusahaan where status_peserta='NONPESERTA' and id_kantor='$id_kantor1' and x<>''");
			$rr1a=mysql_fetch_array($p1a);
			$pes1a=$rr1a['pes'];

			$p2a=mysql_query("select count(status_peserta) as pes from data_perusahaan where status_peserta='CENTRALISASI' and id_kantor='$id_kantor1' and x<>''");
			$rr2a=mysql_fetch_array($p2a);
			$pes2a=$rr2a['pes'];

			$p3a=mysql_query("select count(status_peserta) as pes from data_perusahaan where status_peserta='BPU' and id_kantor='$id_kantor1' and x<>''");
			$rr3a=mysql_fetch_array($p3a);
			$pes3a=$rr3a['pes'];

			$p4a=mysql_query("select count(status_peserta) as pes from data_perusahaan where status_peserta='NONBPU' and id_kantor='$id_kantor1' and x<>''");
			$rr4a=mysql_fetch_array($p4a);
			$pes4a=$rr4a['pes'];	
				
				
				//echo "<font color=red>".$x."</font><br>";
				
				echo"
					<tr>
						<td>$no.$n</td>
						<td>$kode_kantor1</td>
						<td>$nama_kantor1</td>
						<td>$pesa</td>
						<td>$pes1a</td>
						<td>$pes2a</td>
						<td>$pes3a</td>
						<td>$pes4a</td>
						
			        </tr>
					";
					$n++;
				}
			
				$no++;
			}
		
	}
	elseif($cek1=="" && $cek2!="")
	{
		//echo $cek2;

		$no=1;
			$sql = mysql_query("select *, count(id_perusahaan) as total from kantor k, data_perusahaan p, perintis r where k.id_kantor=r.id_kantor and k.id_kantor=p.id_kantor and k.id_kantor='$cek2' group by k.id_kantor");

			while($data=mysql_fetch_array($sql))
			{ 
				$r=$data['id_utama'];
				$id_kantor=$data['id_kantor'];
				$kode_kantor=$data['kode_kantor'];	
				$nama_kantor=$data['nama_kantor'];				
				$status_peserta=$data['status_peserta'];
			$p=mysql_query("select count(status_peserta) as pes from data_perusahaan where status_peserta='PESERTA' and id_kantor='$id_kantor' and x<>''");
			$rr=mysql_fetch_array($p);
			$pes=$rr['pes'];

			$p1=mysql_query("select count(status_peserta) as pes from data_perusahaan where status_peserta='NONPESERTA' and id_kantor='$id_kantor' and x<>''");
			$rr1=mysql_fetch_array($p1);
			$pes1=$rr1['pes'];

			$p2=mysql_query("select count(status_peserta) as pes from data_perusahaan where status_peserta='CENTRALISASI' and id_kantor='$id_kantor' and x<>''");
			$rr2=mysql_fetch_array($p2);
			$pes2=$rr2['pes'];

			$p3=mysql_query("select count(status_peserta) as pes from data_perusahaan where status_peserta='BPU' and id_kantor='$id_kantor' and x<>''");
			$rr3=mysql_fetch_array($p3);
			$pes3=$rr3['pes'];

			$p4=mysql_query("select count(status_peserta) as pes from data_perusahaan where status_peserta='NONBPU' and id_kantor='$id_kantor' and x<>''");
			$rr4=mysql_fetch_array($p4);
			$pes4=$rr4['pes'];

			
			

				echo"
					<tr>
						<td>$no</td>
						<td>$kode_kantor</td>
						<td>$nama_kantor</td>
						<td>$pes</td>
						<td>$pes1</td>
						<td>$pes2</td>
						<td>$pes3</td>
						<td>$pes4</td>
						
			        </tr>
				";
				//echo $r;
				
			
				$no++;
			}
		
	}

	?>
		</tbody>
	</table>
</div><!-- /.box-body -->

</section><!-- /.content -->