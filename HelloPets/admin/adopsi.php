<?php 

$adopt = showAdoptData();
$adoptapprove = showAdoptApproved();
$adoptpending = showAdoptPending();

?>



<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Adopsi</h1>
</div> 

<!-- Card Data Adopsi -->
<div class="card shadow mb-4">
	<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		<h6 class="m-0 font-weight-bold text-primary">Data Adopsi Anda</h6>
	</div>
	<div class="card-body">


		<!-- Pet Tabs -->
		<section id="tabs" class="pet-tabs">
			<div class="row justify-content-center">
				<div class="col-12">
					<div class="row justify-content-center"> 
						<div class="col-12">
							<nav>
								<div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
									<a class="nav-item nav-link text-primary active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Disetujui</a>
									<a class="nav-item nav-link text-primary" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Menunggu Persetujuan</a>
									<a class="nav-item nav-link text-primary" id="nav-table-tab" data-toggle="tab" href="#nav-table" role="tab" aria-controls="nav-table" aria-selected="false">Semua Data (table)</a>
								</div>
							</nav>
							<div class="tab-content" id="nav-tabContent">
								<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
									<div class="row">
										<?php foreach ($adoptapprove as $approveData) : ?>
											<div class="col-lg-3">
												<div class="card">
													<img class="card-img-top img-responsive" style="    width: 100%;
													height: 15vw;
													object-fit: cover;" src="../img/adopt-pict/<?= $approveData['pict']; ?>" alt="Card image cap">
													<div class="card-body">
														<h5 class="card-title"><?= $approveData['namaHewan']; ?></h5>
														<p class="card-text"><?= $approveData['deskripsi']; ?></p>
														<a href="#" class="btn btn-primary detailadopsi"
														data-id ="<?= $approveData['idAdopt']; ?>" 
														data-idusr ="<?= $approveData['id_user']; ?>" 
														data-nmuser ="<?= $approveData['namaUser']; ?>" 
														data-nmhewan ="<?= $approveData['namaHewan']; ?>"
														data-jhewan ="<?= $approveData['jenisHewan']; ?>"
														data-uhewan ="<?= $approveData['umurHewan']; ?>"
														data-gender ="<?= $approveData['gender']; ?>"
														data-mail ="<?= $approveData['email']; ?>"
														data-telp ="<?= $approveData['telp']; ?>"
														data-alamat ="<?= $approveData['alamat']; ?>"
														data-desk ="<?= $approveData['deskripsi']; ?>"
														data-mdesk ="<?= $approveData['medicalDesc']; ?>"
														data-pict ="<?= $approveData['pict']; ?>"
														data-status ="<?= $approveData['status']; ?>"
														>Detail
														</a>
													</div>
												</div>
											</div>
										<?php endforeach; ?>
									</div>
								</div>
								<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
									<div class="row">
										<?php foreach ($adoptpending as $pendingData) : ?>
											<div class="col-lg-3">
												<div class="card">
													<img class="card-img-top img-responsive" style="    width: 100%;
													height: 15vw;
													object-fit: cover;" src="../img/adopt-pict/<?= $pendingData['pict']; ?>" alt="Card image cap">
													<div class="card-body">
														<h5 class="card-title"><?= $pendingData['namaHewan']; ?></h5>
														<p class="card-text"><?= $pendingData['deskripsi']; ?></p>
														<a href="#" class="btn btn-primary detailadopsi"
														data-id ="<?= $pendingData['idAdopt']; ?>" 
														data-idusr ="<?= $pendingData['id_user']; ?>" 
														data-nmuser ="<?= $pendingData['namaUser']; ?>" 
														data-nmhewan ="<?= $pendingData['namaHewan']; ?>"
														data-jhewan ="<?= $pendingData['jenisHewan']; ?>"
														data-uhewan ="<?= $pendingData['umurHewan']; ?>"
														data-gender ="<?= $pendingData['gender']; ?>"
														data-mail ="<?= $pendingData['email']; ?>"
														data-telp ="<?= $pendingData['telp']; ?>"
														data-alamat ="<?= $pendingData['alamat']; ?>"
														data-desk ="<?= $pendingData['deskripsi']; ?>"
														data-mdesk ="<?= $pendingData['medicalDesc']; ?>"
														data-pict ="<?= $pendingData['pict']; ?>"
														data-status ="<?= $pendingData['status']; ?>"
														>Detail
														</a>
													</div>
												</div>
											</div>
										<?php endforeach; ?>
									</div>
								</div>
								<div class="tab-pane fade" id="nav-table" role="tabpanel" aria-labelledby="nav-table-tab">
									<div class="row">
										<div class="table-responsive">
											<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
												<thead>
													<tr>
														<th>ID Adopsi</th>
														<th>Nama Pemilik</th>
														<th>Nama Hewan</th>
														<th>Status</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													<?php foreach ($adopt as $allData) : ?>
														<tr>
															<td><?= $allData['idAdopt']; ?></td>
															<td><?= $allData['namaUser']; ?></td>
															<td><?= $allData['namaHewan']; ?></td>
															<td><?= $allData['status']; ?></td>
															<td><a href="#" class="btn btn-success detailadopsi"
																data-id ="<?= $allData['idAdopt']; ?>" 
																data-idusr ="<?= $allData['id_user']; ?>" 
																data-nmuser ="<?= $allData['namaUser']; ?>" 
																data-nmhewan ="<?= $allData['namaHewan']; ?>"
																data-jhewan ="<?= $allData['jenisHewan']; ?>"
																data-uhewan ="<?= $allData['umurHewan']; ?>"
																data-gender ="<?= $allData['gender']; ?>"
																data-mail ="<?= $allData['email']; ?>"
																data-telp ="<?= $allData['telp']; ?>"
																data-alamat ="<?= $allData['alamat']; ?>"
																data-desk ="<?= $allData['deskripsi']; ?>"
																data-mdesk ="<?= $allData['medicalDesc']; ?>"
																data-pict ="<?= $allData['pict']; ?>"
																data-status ="<?= $allData['status']; ?>"
																>Detail
															</a>
															<?php if ( $allData['status'] == 'PENDING') : ?>
																<a href="#" class="btn btn-warning approve" data-toggle="modal" data-target="#approveconfirm" data-id="<?= $allData['idAdopt']; ?>">Approve</a>
															<?php endif; ?>
															<a href="#" class="btn btn-danger delete" data-toggle="modal" data-target="#deleteconfirm" data-id="<?= $allData['idAdopt']; ?>">Hapus</a>
														</td>
													</tr>
												<?php endforeach; ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- end tabs -->
	</div>
</div>

<!-- Modal Form Adopsi -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Form Adopsi</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="functions.php?action=postadopt" method="post" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="container-fluid">
						<div class="row">
							<div class="col">
								<div class="form-group" align="center">
									<img class="img-profile rounded-corner" id="pict" style="width:300px; height: 300px;" src="../img/paw.jpg">
								</div>
								<div class="form-group">
									<input type='file' name="adopt-pict" onchange="readURL(this);" />
								</div>
							</div>
							<div class="col">
								<h4 class="h3 mb-0 text-gray-800" align="center">Data Hewan</h4><br>
								<div class="form-group">
									<label for="nhewan">Nama Hewan</label>
									<input type="text" name="nhewan" class="form-control" id="nhewan" placeholder="Nama hewan anda" required>
								</div>
								<div class="form-group">
									<label for="uhewan">Umur Hewan</label>
									<input type="text" name="uhewan" class="form-control" id="uhewan" placeholder="Umur Hewan (perkiraan)" required>
								</div>
								<div class="form-group">
									<label for="jhewan">Jenis Hewan</label>
									<input type="text" name="jhewan" class="form-control" id="jhewan" placeholder="Kucing atau kelinci" required>
								</div>
								<div class="form-group">
									<label for="gender">Jenis Kelamin</label>
									<div class="row" id="gender">
										<div class="col">
											<input type="radio" id="male" name="gender" value="Male" required>
											<label for="male">Laki Laki</label><br>
										</div>
										<div class="col">
											<input type="radio" id="female" name="gender" value="female" required>
											<label for="female">Perempuan</label><br>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="adesc">Deskripsi</label>
									<textarea name="adesc" class="form-control" id="adesc" placeholder="Tulis deskripsi hewan..." required></textarea>
								</div>
								<div class="form-group">
									<label for="amedic">Riwayat Medical</label>
									<textarea name="amedic" class="form-control" id="amedic" placeholder="Riwayat penyakit (optional)"></textarea>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<input type="submit" class="btn btn-success" value="Daftarkan">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- End Modal popup buat donasi -->
<!-- Modal popup Detail donasi -->
<div class="modal fade" id="myAdopsi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
						<img class="img-profile rounded-corner" id="myAdoptpict" style="width:300px; height: 300px;" src=" ">
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
								<tr>
									<td>Status</td>
									<td>:</td>
									<td id="myAdoptstatus"></td>
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
<!-- End Modal popup Detail donasi -->
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
			<div class="modal-body justify-content-center">Apakah anda yakin ? </div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				<a class="btn btn-warning" href="#" id="modalApprove">Approve</a>
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
				<a class="btn btn-danger" href="#" id="modalDelete">Delete</a>
			</div>
		</div>
	</div>
</div>
