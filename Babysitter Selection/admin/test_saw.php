<?php

	include '../koneksi.php';
	$uid = $_GET['idbs'];
	$tgltest = $_GET['tgltest'];

	$sql = mysqli_query($koneksi,"SELECT nama from babysitter where user_id='$uid'");
	$row = mysqli_fetch_assoc($sql);
?>
<h1 align="center">Test 5 Kriteria</h1>

<div class="container">
	<div class="card shadow mb-4">
      	<div class="card-header py-3">
          	<h6 class="m-0 font-weight-bold text-primary"> Peserta Test : <?php echo $row['nama'];?></h6>    
      	</div>      
      	<div class="card-body">
			<form action="hitung_saw.php?uid=<?php echo $uid; ?>&tgltest=<?php echo $tgltest;?>" method="post">
				<div class="form-group">
					<label>
						<a>Kecakapan</a>
					</label>
					<br>
					<label class="btn btn-danger">
						<input type="radio" name="c1" id="option2" autocomplete="off" value="1">
						<span class="fas fa-check">Sangat Buruk</span>
					</label>
					<label class="btn btn-warning">
						<input type="radio" name="c1" id="option2" autocomplete="off" value="2">
						<span class="fas fa-check">Buruk</span>
					</label>
					<label class="btn btn-info">
						<input type="radio" name="c1" id="option2" autocomplete="off" value="3">
						<span class="fas fa-check">Netral</span>
					</label>
					<label class="btn btn-primary">
						<input type="radio" name="c1" id="option2" autocomplete="off" value="4">
						<span class="fas fa-check">Bagus</span>
					</label>
					<label class="btn btn-success">
						<input type="radio" name="c1" id="option2" autocomplete="off" value="5">
						<span class="fas fa-check">Sangat Bagus</span>
					</label>
				</div>
				<div class="form-group">
					<label>
						<a>Penampilan</a>
					</label>
					<br>
					<label class="btn btn-danger">
						<input type="radio" name="c2" id="option2" autocomplete="off" value="1">
						<span class="fas fa-check">Sangat Buruk</span>
					</label>
					<label class="btn btn-warning">
						<input type="radio" name="c2" id="option2" autocomplete="off" value="2">
						<span class="fas fa-check">Buruk</span>
					</label>
					<label class="btn btn-info">
						<input type="radio" name="c2" id="option2" autocomplete="off" value="3">
						<span class="fas fa-check">Netral</span>
					</label>
					<label class="btn btn-primary">
						<input type="radio" name="c2" id="option2" autocomplete="off" value="4">
						<span class="fas fa-check">Bagus</span>
					</label>
					<label class="btn btn-success">
						<input type="radio" name="c2" id="option2" autocomplete="off" value="5">
						<span class="fas fa-check">Sangat Bagus</span>
					</label>
				</div>
				<div class="form-group">
					<label>
						<a>Tes Kesehatan</a>
					</label>
					<br>
					<label class="btn btn-danger">
						<input type="radio" name="c3" id="option2" autocomplete="off" value="1">
						<span class="fas fa-check">Sangat Buruk</span>
					</label>
					<label class="btn btn-warning">
						<input type="radio" name="c3" id="option2" autocomplete="off" value="2">
						<span class="fas fa-check">Buruk</span>
					</label>
					<label class="btn btn-info">
						<input type="radio" name="c3" id="option2" autocomplete="off" value="3">
						<span class="fas fa-check">Netral</span>
					</label>
					<label class="btn btn-primary">
						<input type="radio" name="c3" id="option2" autocomplete="off" value="4">
						<span class="fas fa-check">Bagus</span>
					</label>
					<label class="btn btn-success">
						<input type="radio" name="c3" id="option2" autocomplete="off" value="5">
						<span class="fas fa-check">Sangat Bagus</span>
					</label>
				</div>
				<div class="form-group">
					<label>
						<a>Pengetahuan</a>
					</label>
					<br>
					<label class="btn btn-danger">
						<input type="radio" name="c4" id="option2" autocomplete="off" value="1">
						<span class="fas fa-check">Sangat Buruk</span>
					</label>
					<label class="btn btn-warning">
						<input type="radio" name="c4" id="option2" autocomplete="off" value="2">
						<span class="fas fa-check">Buruk</span>
					</label>
					<label class="btn btn-info">
						<input type="radio" name="c4" id="option2" autocomplete="off" value="3">
						<span class="fas fa-check">Netral</span>
					</label>
					<label class="btn btn-primary">
						<input type="radio" name="c4" id="option2" autocomplete="off" value="4">
						<span class="fas fa-check">Bagus</span>
					</label>
					<label class="btn btn-success">
						<input type="radio" name="c4" id="option2" autocomplete="off" value="5">
						<span class="fas fa-check">Sangat Bagus</span>
					</label>
				</div>
				<div class="form-group">
					<label>
						<a>Wawancara</a>
					</label>
					<br>
					<label class="btn btn-danger">
						<input type="radio" name="c5" id="option2" autocomplete="off" value="1">
						<span class="fas fa-check">Sangat Buruk</span>
					</label>
					<label class="btn btn-warning">
						<input type="radio" name="c5" id="option2" autocomplete="off" value="2">
						<span class="fas fa-check">Buruk</span>
					</label>
					<label class="btn btn-info">
						<input type="radio" name="c5" id="option2" autocomplete="off" value="3">
						<span class="fas fa-check">Netral</span>
					</label>
					<label class="btn btn-primary">
						<input type="radio" name="c5" id="option2" autocomplete="off" value="4">
						<span class="fas fa-check">Bagus</span>
					</label>
					<label class="btn btn-success">
						<input type="radio" name="c5" id="option2" autocomplete="off" value="5">
						<span class="fas fa-check">Sangat Bagus</span>
					</label>
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-success" value="Hitung Nilai SAW">
				</div>
				
			</form>
		</div>
	</div>
</div>
