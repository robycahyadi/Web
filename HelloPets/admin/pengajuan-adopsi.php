<?php 

$pengajuanadopsi = showDataPengajuanAdopt();


?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Pengajuan Adopsi</h1>
</div> 



<!-- Card Data Adopsi -->
<div class="card shadow mb-4">
	<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		<h6 class="m-0 font-weight-bold text-primary">Data Pengajuan Adopsi</h6>
		<div class="dropdown no-arrow">
			<a href="index.php?page=dashboard" class="btn btn-success btn-icon-split">
				<span class="icon text-white-50">
					<i class="fas fa-search"></i>
				</span>
				<span class="text">Cari Hewan</span>
			</a>
		</div>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead align="center">
					<tr>
						<th>ID</th>
						<th>Nama Pengadopsi</th>
						<th>Nama Pemilik Hewan</th>
						<th>Nama Hewan</th>
						<th>Tgl Pengajuan</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($pengajuanadopsi as $PA) : ?>
						<tr>
							<td><?= $PA['id'];?></td>
							<td><?= $PA['nama']; ?></td>
							<td><?= $PA['namaUser'];?></td>
							<td><?= $PA['namaHewan'];?></td>
							<td><?= $PA['tgl'];?></td>
							<td><?= $PA['status'];?></td>
							<td><a href="#" class="btn btn-primary btn-circle btn-sm detailhewan"
								data-id ="<?= $PA['idAdopt']; ?>" 
								data-nmuser ="<?= $PA['namaUser']; ?>" 
								data-nmhewan ="<?= $PA['namaHewan']; ?>"
								data-jhewan ="<?= $PA['jenisHewan']; ?>"
								data-uhewan ="<?= $PA['umurHewan']; ?>"
								data-gender ="<?= $PA['gender']; ?>"
								data-desk ="<?= $PA['deskripsi']; ?>"
								data-mdesk ="<?= $PA['medicalDesc']; ?>"
								data-pict ="<?= $PA['pict']; ?>"
								><i class="fas fa-info"></i></a>
								<?php if ( $PA['status'] == 'PENDING') : ?>
									<a href="#" class="btn btn-warning btn-circle btn-sm" data-toggle="modal" data-target="#approveconfirm"><i class="fas fa-check"></i></a>
								<?php endif; ?>
								<a href="#" class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#deleteconfirm"><i class="fas fa-trash"></i></a>
								<a href="reportadopsi.php?id=<?= $PA['id'];?>" class="btn btn-success btn-circle btn-sm" target="_blank"><i class="fas fa-print"></i></a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>



<!-- Modal popup Detail Adopsi -->
<div class="modal fade" id="myhewan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
						<img class="img-profile rounded-corner" id="adoptpict" style="width:300px; height: 300px;" src=" ">
					</div>
					<div class="col">
						<h4 class="h3 mb-0 text-gray-800" align="center">Data Hewan</h4><br>
						<div class="table-responsive">
							<table class="table" width="100%" cellspacing="0">
								<tr>
									<td>ID Adopsi</td>
									<td>:</td>
									<td id="myAdoptid"></td>
								</tr>
								<tr>
									<td>Nama Pemilik</td>
									<td>:</td>
									<td id="myAdoptnmuser"></td>
								</tr>
								<tr>
									<td>Nama Hewan</td>
									<td>:</td>
									<td id="myAdoptnmhewan"></td>
								</tr>
								<tr>
									<td>Jenis</td>
									<td>:</td>
									<td id="myAdoptjhewan"></td>
								</tr>
								<tr>
									<td>Umur</td>
									<td>:</td>
									<td id="myAdoptuhewan"></td>
								</tr>
								<tr>
									<td>Gender</td>
									<td>:</td>
									<td id="myAdoptgender"></td>
								</tr>
								<tr>
									<td>Deskripsi</td>
									<td>:</td>
									<td id="myAdoptdesk"></td>
								</tr>
								<tr>
									<td>Riwayat Medical</td>
									<td>:</td>
									<td id="myAdoptmdesk"></td>
								</tr>
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
    <!-- End Modal popup Detail Adopsi -->


<!-- approve Modal-->
<div class="modal fade" id="approveconfirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Approve</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body justify-content-center">Apakah anda yakin ?</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				<a class="btn btn-warning" href="functions.php?action=approvepengajuanadopt&id=<?= $PA['id']; ?>&idAdopt=<?= $PA['idAdopt']; ?>&pengaju=<?= $PA['nama']; ?>">Approve</a>
			</div>
		</div>
	</div>
</div>

<!-- approve Modal-->
<div class="modal fade" id="deleteconfirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Delete</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body justify-content-center">Apakah anda yakin ?</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				<a class="btn btn-danger" href="functions.php?action=deletepengajuanadopt&id=<?= $PA['id']; ?>">Delete</a>
			</div>
		</div>
	</div>
</div>