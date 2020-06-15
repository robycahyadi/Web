<?php 

$user 	= userData('all');

?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">User Aplikasi</h1>
</div>

<!-- DataTales Donasi -->
<div class="card shadow mb-4">
	<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		<h6 class="m-0 font-weight-bold text-primary">Data User</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nama</th>
						<th>Email</th>
						<th>No.Telp</th>
						<th>Alamat</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($user as $userdata) : ?>
						<tr>
							<td><?= $userdata['id']; ?></td>
							<td><?= $userdata['nama']; ?></td>
							<td><?= $userdata['email']; ?></td>
							<td><?= $userdata['telp']; ?></td>
							<td><?= $userdata['alamat']; ?></td>
							<td>
								<a href="#" class="btn btn-warning btn-icon-split userdetail"
								data-id ="<?= $userdata['id']; ?>" 
								data-nama ="<?= $userdata['nama']; ?>" 
								data-email ="<?= $userdata['email']; ?>" 
								data-telp ="<?= $userdata['telp']; ?>" 
								data-alamat ="<?= $userdata['alamat']; ?>"
								data-pict = "<?= $userdata['pict']; ?>" >
								<span class="icon text-white-50">
									<i class="fas fa-info"></i>
								</span>
								<span class="text">Detail</span>
							</a>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
</div>
<!-- End Datatables Donasi -->

<!-- Modal popup Detail donasi -->
<div class="modal fade" id="userData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Detail</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col" align="center">
						<img class="img-profile rounded-corner" id="usrDatapict" style="width:300px; height: 300px;" src=" ">
					</div>
					<div class="col">
						<div class="table-responsive">
							<table class="table" width="100%" align="right" cellspacing="0">
								<tbody>
									<tr>
										<td>ID</td>
										<td>:</td>
										<td id="usrDataid"></td>
									</tr>
									<tr>
										<td>Nama</td>
										<td>:</td>
										<td id="usrDatanama"></td>
									</tr>
									<tr>
										<td>Email</td>
										<td>:</td>
										<td id="usrDataemail"></td>
									</tr>
									<tr>
										<td>No.Telp</td>
										<td>:</td>
										<td id="usrDatatelp"></td>
									</tr>
									<tr>
										<td>Alamat</td>
										<td>:</td>
										<td id="usrDataalamat"></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
  <!-- End Modal popup Detail donasi -->