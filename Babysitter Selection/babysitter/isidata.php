<?php
	include '../koneksi.php';
	$uid = $_GET['uid'];
	$sql="SELECT*FROM babysitter where user_id = '$uid'";
	if (!$result=  mysqli_query($koneksi, $sql)){                        
	die('Error:'.mysqli_error($koneksi));
	}  else {                        
	if (mysqli_num_rows($result)> 0){                        
	$row=  mysqli_fetch_assoc($result);
	}
	}                   
?>

<h1 align="center">Data Diri</h1>
<br>
<div class="container">
	<div class="card shadow mb4">
		<div class="card-header py-3 border-left-primary">
			<h5 class="m-0 font-weight-bold text-primary">Detail</h5>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-lg-6">
					<h3 align="center">Biodata</h3>
					<table class="table table-responsive" width="100%">
						<tr>
							<td>Nama</td>
							<td> : </td>
							<td><?php echo $row['nama'];?></td>
						</tr>
						<tr>
							<td>Email</td>
							<td> : </td>
							<td><?php echo $row['email'];?></td>
						</tr>
						<tr>
							<td>Tgl lahir</td>
							<td> : </td>
							<td><?php echo $row['tgl_lahir'];?></td>
						</tr>
						<tr>
							<td>Jenis Kelamin</td>
							<td> : </td>
							<td><?php echo $row['gender'];?></td>
						</tr>
						<tr>
							<td>No.Telp</td>
							<td> : </td>
							<td><?php echo $row['no_telp'];?></td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td> : </td>
							<td><?php echo $row['alamat'];?></td>
						</tr>
					</table>
				</div>
				<div class="col-lg-6">
					<h3 align="center">Berkas (<a style="font-style: italic;">Foto,KTP,Ijazah</a>)</h3>
					<form action="aksi_baby.php?uid=<?php echo $uid; ?>" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label>
								<h6>Foto Diri</h6>
							</label>
	                      <input type="file" name="fotodiri" class="form-control form-control-user" id="fotodiri" placeholder="Foto Diri">
	                    </div>
	                    <div class="form-group">
	                    	<label>
	                    		<h6>Foto KTP</h6>
	                    	</label>
	                      <input type="file" name="fotoktp" class="form-control form-control-user" id="fotoktp" placeholder="Foto KTP">
	                    </div>
	                    <div class="form-group">
	                    	<h6>Ijazah</h6> 
	                      <input type="file" name="ijazah" class="form-control form-control-user" id="ijazah" placeholder="Ijazah">
	                    </div>
	                    <div class="form-group">
	                    	<button class="btn btn-success" type="submit">Submit Berkas</button>
	                    </div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>        