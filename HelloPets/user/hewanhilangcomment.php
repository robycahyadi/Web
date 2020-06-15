<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h1 mb-0 text-gray-800">Post Comment</h1>
</div>
<div class="card shadow mb-4">
	<div class="card-body">
		<form action="functions.php?action=postcomment" method="post" enctype="multipart/form-data">
			<div class="row">
				<div class="col">
					<div class="form-group">
						<label for="pict">Foto Bukti</label>
					</div>
					<div class="form-group" align="center">
						<img class="img-profile rounded-corner img-responsive" id="pict" style="width:400px; height: 300px;" src="../img/paw.jpg">
					</div>
					<div class="form-group">
						<input type='file' name="cmnt-pict" onchange="readURL(this);" />
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label for="ID">ID Adopsi</label>
						<input type="text" name="idPost" id="ID" class="form-control" value="<?= $_GET['idpost'];?>" readonly>
					</div>
					<div class="form-group">
						<label for="nama">Nama</label>
						<input type="text" name="nama" id="nama" class="form-control"value="<?= $_SESSION['nama'];?>" readonly>
					</div>
					<div class="form-group">
						<label for="telp">No.Telp</label>
						<input type="text" name="telp" id="telp" class="form-control" value="<?= $_SESSION['telp'];?>" readonly>
					</div>
					<div class="form-group">
						<label for="alamat"></label>
						<input type="text" name="alamat" id="alamat" class="form-control" value="<?= $_SESSION['alamat'];?>" readonly>
					</div>
					<div class="form-group">
						<label for="ket">Berikan Keterangan</label>
						<textarea class="form-control" id="ket" name="ket" required></textarea>
					</div>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<button type="submit" class="btn btn-success">Submit</button>
		</div>
	</form>
</div>