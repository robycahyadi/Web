<?php
	include '../koneksi.php';
	$uid = $_GET['idbs'];

	$sql1="SELECT file_1 FROM p_test where user_id = '$uid'";
	if (!$result=  mysqli_query($koneksi, $sql1)){                        
	die('Error:'.mysqli_error($koneksi));                        
	}  else {
	if (mysqli_num_rows($result)> 0){                        
	$data=  mysqli_fetch_assoc($result);
	$foto = $data['file_1'];
	$ready = 1;}
	else {
	$ready = 0;
	$info = '<div align="center">
				<a class="text-warning">Maaf anda belum melengkapi data diri silahkan klik link dibawah untuk melengkapi data.</a><br>
				<a class="btn btn-warning" href="index.php?page=formdata&uid='.$uid.'">Lengkapi Data</a>
			</div>';
	}
	}    

	$sql2="SELECT tanggal_test FROM tgl_test where user_id = '$uid'";
	if (!$hasil=  mysqli_query($koneksi, $sql2)){                        
	die('Error:'.mysqli_error($koneksi));                        
	}  else {
	if (mysqli_num_rows($hasil)> 0){                        
	$datatgl=  mysqli_fetch_assoc($hasil);
	$tglbaby = $datatgl['tanggal_test'];
	$siap = 1;}
	else {
	$siap = 0;
	$infotgl = '<div align="left">
				<a class="text-warning">Tanggal test untuk Babysitter belum di input, harap masukkan tanggal test di bawah ini.</a><br>
				<form action="aksi_admin.php?aksi=inputtgl&uid='.$uid.'" method="post">
					<div class="form-group">
        				<input type="date" name="tgltest" class="form-control form-control-user" id="tgltest" placeholder="Tanggal Test">
    				</div>
    				<div class="form-group">
    					<input type="submit" class="btn btn-primary" value="Ajukan Tanggal" class="btn btn-success">
    				</div>
				</form>

			</div>';
	}
	}    

?>

<div class="container">
	<div class="card shadow mb-4">
		<div class="card-header py-3  border-left-primary">
			<h5 class="m-0 font-weight-bold text-primary">Detail Babysitter</h5>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-lg-6">
					<h4 class="text-primary" align="center">Foto</h4>
					<br>
					<!-- <img src="../images/foto_diri/<?php echo $data['file_1'];?>" width="100%"> -->
					<?php 
					if ($ready=1) {
						?>
						<img src="../images/foto_diri/<?php echo $data['file_1'];?>" width="100%">
					<?php
					}else{
						echo $info;}

					?>
					
				</div>
				<div class="col-lg-6">
					<h4 class="text-success text-uppercase" align="center">Info Pribadi</h4>
					<table class="table table-responsive" width="100%">
						<?php 

							$sql="SELECT*FROM babysitter where user_id = '$uid'";
	                        if (!$result=  mysqli_query($koneksi, $sql)){
	                        die('Error:'.mysqli_error($koneksi));
	                        }  else {
	                        if (mysqli_num_rows($result)> 0){
	                        while ($row=  mysqli_fetch_assoc($result)){ 
						?>
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
					<?php }} }?>
					</table>
					<div class="container">
						<?php
							if ($siap==1) {		
						?>
							<a>Tanggal Test = <?php echo $datatgl['tanggal_test'];?></a>
						<?php		
							}else{
								echo $infotgl;
							}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>