<?php 

$dataDonasi =	showDonasi('all');

?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Donasi</h1>
</div> 

<!-- DataTales Donasi -->
<div class="card shadow mb-4">
 <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
  <h6 class="m-0 font-weight-bold text-primary">Data Donasi</h6>
</div>
<div class="card-body">
  <div class="table-responsive">
   <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
     <tr>
      <th>ID Donasi</th>
      <th>Tgl Donasi</th>
      <th>ID Anda</th>
      <th>Nama</th>
      <th>Nominal</th>
      <th>Deskripsi</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tfoot>
   <tr>
    <th>ID Donasi</th>
    <th>Tgl Donasi</th>
    <th>ID Anda</th>
    <th>Nama</th>
    <th>Nominal</th>
    <th>Deskripsi</th> 
    <th>Aksi</th>

  </tr>
</tfoot>
<tbody>
  <?php foreach ($dataDonasi as $data_donasi) : ?>
   <tr>
    <td><?= $data_donasi['id']; ?></td>
    <td><?= $data_donasi['tgl_donasi']; ?></td>
    <td><?= $data_donasi['id_user']; ?></td>
    <td><?= $data_donasi['nama']; ?></td>
    <td><?= $data_donasi['nominal']; ?></td>
    <td><?= $data_donasi['deskripsi']; ?></td>
    <td>
     <a href="#" class="btn btn-warning btn-icon-split donasidetail"
     data-id ="<?= $data_donasi['id']; ?>" 
     data-tgl ="<?= $data_donasi['tgl_donasi']; ?>" 
     data-usrid ="<?= $data_donasi['id_user']; ?>" 
     data-nama ="<?= $data_donasi['nama']; ?>" 
     data-nominal ="<?= $data_donasi['nominal']; ?>" 
     data-desk ="<?= $data_donasi['deskripsi']; ?>">
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
<div class="modal fade" id="myDonasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
          <table class="table" width="100%" align="right" cellspacing="0">
            <tbody>
              <tr>
                <td>ID</td>
                <td>:</td>
                <td id="myDonasiid"></td>
              </tr>
              <tr>
                <td>Tanggal Donasi</td>
                <td>:</td>
                <td id="myDonasitgl"></td>
              </tr>
              <tr>
                <td>Id User</td>
                <td>:</td>
                <td id="myDonasiidusr"></td>
              </tr>
              <tr>
                <td>Nama</td>
                <td>:</td>
                <td id="myDonasinama"></td>
              </tr>
              <tr>
                <td>Nominal</td>
                <td>:</td>
                <td>Rp.</td>
                <td id="myDonasinominal"></td>
              </tr>
              <tr>
                <td>Deskripsi</td>
                <td>:</td>
                <td id="myDonasidesc"></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
  <!-- End Modal popup Detail donasi -->