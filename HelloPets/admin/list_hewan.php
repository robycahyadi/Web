<?php 

$allshow = showPost('all');
$found	 = showPost('found');
$lost	 = showPost('lost');

?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Hewan Hilang</h1>
</div> 

<!-- Card Data Hewan-->
<div class="card shadow mb-4">
	<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		<h6 class="m-0 font-weight-bold text-primary">Data Post</h6>
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
									<a class="nav-item nav-link text-primary active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Hilang</a>
									<a class="nav-item nav-link text-primary" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Ditemukan</a>
									<a class="nav-item nav-link text-primary" id="nav-table-tab" data-toggle="tab" href="#nav-table" role="tab" aria-controls="nav-table" aria-selected="false">Semua Data (table)</a>
								</div>
							</nav>
							<div class="tab-content" id="nav-tabContent">
								<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
									<div class="row">
										<?php foreach ($lost as $lostpost) : ?>
											<div class="col-lg-3">
												<div class="card">
													<img class="card-img-top img-responsive" style="    width: 100%;
													height: 15vw;
													object-fit: cover;" src="../img/post-pict/<?= $lostpost['pict']; ?>" alt="Card image cap">
													<div class="card-body">
														<h5 class="card-title"><?= $lostpost['namaHewan']; ?></h5>
														<p class="card-text"><?= $lostpost['deskripsi']; ?></p>
														<a href="#" class="btn btn-primary postdetail"
														data-nuser  = "<?= $lostpost['namaUser']; ?>"
														data-nhewan = "<?= $lostpost['namaHewan']; ?>"
														data-jhewan = "<?= $lostpost['jenisHewan']; ?>"
														data-mail   = "<?= $lostpost['mail']; ?>"
														data-telp   = "<?= $lostpost['telp']; ?>"
														data-alamat = "<?= $lostpost['alamat']; ?>"
														data-desc   = "<?= $lostpost['deskripsi']; ?>"
														data-pict   = "<?= $lostpost['pict']; ?>"
														>Detail</a>
													</div>
												</div>
											</div>
										<?php endforeach; ?>
									</div>
								</div>
								<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
									<div class="row">
										<?php foreach ($found as $foundpost) : ?>
											<div class="col-lg-3">
												<div class="card">
													<img class="card-img-top img-responsive" style="    width: 100%;
													height: 15vw;
													object-fit: cover;" src="../img/post-pict/<?= $foundpost['pict']; ?>" alt="Card image cap">
													<div class="card-body">
														<h5 class="card-title"><?= $foundpost['namaHewan']; ?></h5>
														<p class="card-text"><?= $foundpost['deskripsi']; ?></p>
														<a href="#" class="btn btn-primary">Detail</a><a href="#" class="btn btn-primary postdetail"
														data-nuser  = "<?= $foundpost['namaUser']; ?>"
														data-nhewan = "<?= $foundpost['namaHewan']; ?>"
														data-jhewan = "<?= $foundpost['jenisHewan']; ?>"
														data-mail   = "<?= $foundpost['mail']; ?>"
														data-telp   = "<?= $foundpost['telp']; ?>"
														data-alamat = "<?= $foundpost['alamat']; ?>"
														data-desc   = "<?= $foundpost['deskripsi']; ?>"
														data-pict   = "<?= $foundpost['pict']; ?>"
														>Detail</a>
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
														<th>Post ID</th>
														<th>Nama Hewan</th>
														<th>Jenis</th>
														<th>Gender</th>
														<th>Status</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													<?php foreach ($allshow as $allpost) : ?>
														<tr>
															<td><?= $allpost['idPost']; ?></td>
															<td><?= $allpost['namaHewan']; ?></td>
															<td><?= $allpost['jenisHewan']; ?></td>
															<td><?= $allpost['gender']; ?></td>
															<td><?= $allpost['status']; ?></td>
															<td><a href="#" class="btn btn-success postdetail"
																data-nuser  = "<?= $allpost['namaUser']; ?>"
																data-nhewan = "<?= $allpost['namaHewan']; ?>"
																data-jhewan = "<?= $allpost['jenisHewan']; ?>"
																data-mail   = "<?= $allpost['mail']; ?>"
																data-telp   = "<?= $allpost['telp']; ?>"
																data-alamat = "<?= $allpost['alamat']; ?>"
																data-desc   = "<?= $allpost['deskripsi']; ?>"
																data-pict   = "<?= $allpost['pict']; ?>"
																>Detail</a>
																<a href="#" class="btn btn-danger admDeletePost" data-toggle="modal" data-target="#deleteconfirm" data-id="<?= $allpost['idPost']; ?>">Hapus</a>
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
			</div>
		</section>
		<!-- end tabs -->
	</div>
</div>
<!-- end card data hewan -->
<!-- Modal popup Detail Post -->
<div class="modal fade" id="myPost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
						<img class="img-profile rounded-corner" id="myPostpict" style="width:300px; height: 300px;" src=" ">
					</div>
					<div class="col">
						<h4 class="h3 mb-0 text-gray-800" align="center">Data Hewan</h4><br>
						<div class="table-responsive">
							<table class="table" width="100%" cellspacing="0">
								<tr>
									<td>Pemilik</td>
									<td>:</td>
									<td id="myPostnuser"></td>
								</tr>
								<tr>
									<td>Nama Hewan</td>
									<td>:</td>
									<td id="myPostnhewan"></td>
								</tr>
								<tr>
									<td>Jenis</td>
									<td>:</td>
									<td id="myPostjhewan"></td>
								</tr>
								<tr>
									<td>Email</td>
									<td>:</td>
									<td id="myPostmail"></td>
								</tr>
								<tr>
									<td>No.Telp</td>
									<td>:</td>
									<td id="myPosttelp"></td>
								</tr>
								<tr>
									<td>Alamat</td>
									<td>:</td>
									<td id="myPostalamat"></td>
								</tr>
								<tr>
									<td>Deskripsi</td>
									<td>:</td>
									<td id="myPostdesc"></td>
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


<!-- Delete Modal-->
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
				<a class="btn btn-danger" href="#" id="admDelPost">Delete</a>
			</div>
		</div>
	</div>
</div>