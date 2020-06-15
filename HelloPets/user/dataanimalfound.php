<?php 

	$all	= showPostComment('all');

?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Hewan di temukan</h1>
</div> 

<!-- DataTales Donasi -->
<div class="card shadow mb-4">
	<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		<h6 class="m-0 font-weight-bold text-primary">Data</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>Post ID</th>
						<th>Tgl</th>
						<th>Nama</th>
						<th>Keterangan</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($all as $alldata) : ?>
						<tr>
							<td><?= $alldata['IP']; ?></td>
							<td><?= $alldata['cTgl']; ?></td>
							<td><?= $alldata['nama']; ?></td>
							<td><?= $alldata['cKet']; ?></td>
							<td><a href="#" class="btn btn-warning detailcmnt"
								data-pict   = "<?= $alldata['cPict']; ?>"
								data-nama   = "<?= $alldata['nama']; ?>"
								data-email  = "<?= $alldata['email']; ?>"
								data-telp   = "<?= $alldata['telp']; ?>"
								data-alamat = "<?= $alldata['alamat']; ?>"
								data-ket = "<?= $alldata['cKet']; ?>"
								>Detail</a></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
      <!-- End Datatables Donasi -->

<!-- Modal popup Detail Post -->
<div class="modal fade" id="myPostComment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <img class="img-profile rounded-corner" id="myCommentPict" style="width:400px; height: 300px;" src=" ">
          </div>
          <div class="col">
            <h4 class="h3 mb-0 text-gray-800" align="center">Data Penemu</h4><br>
            <div class="table-responsive">
              <table class="table" width="100%" cellspacing="0">
                <tr>
                  <td>Nama</td>
                  <td>:</td>
                  <td id="myCommentNama"></td>
                </tr>
                <tr>
                  <td>Email</td>
                  <td>:</td>
                  <td id="myCommentMail"></td>
                </tr>
                <tr>
                  <td>Telp</td>
                  <td>:</td>
                  <td id="myCommentTelp"></td>
                </tr>
                <tr>
                  <td>Alamat</td>
                  <td>:</td>
                  <td id="myCommentAlamat"></td>
                </tr>
                <tr>
                  <td>Keterangan</td>
                  <td>:</td>
                  <td id="myCommentKet"></td>
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
<!-- End Modal popup Detail Post -->
