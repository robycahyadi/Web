      <?php 

      	$dataDonasi =	showDonasi();

      ?>
      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
      	<h1 class="h3 mb-0 text-gray-800">Donasi</h1>
      </div> 

      <!-- DataTales Donasi -->
      <div class="card shadow mb-4">
      	<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      		<h6 class="m-0 font-weight-bold text-primary">Data Donasi Anda</h6>
      		<div class="dropdown no-arrow">
      			<a href="#" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#exampleModal">
      				<span class="icon text-white-50">
      					<i class="fas fa-plus"></i>
      				</span>
      				<span class="text">Buat Donasi</span>
      			</a>
      		</div>
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
      					</tr>
      				<?php endforeach; ?>
      				</tbody>
      			</table>
      		</div>
      	</div>
      </div>
      <!-- End Datatables Donasi -->
      <!-- Modal popup buat donasi -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Buat Donasi</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="functions.php?action=donasi" method="post">
              <div class="modal-body">
                <?php     
                  $init = "DNS";
                  $digits = 7;
                  $numb   = rand(pow(10, $digits-1), pow(10, $digits)-1);
                  $id_donasi  = $init . sprintf($numb); 
                ?>
                 <div class="form-group">
                  <label for="dnsid">ID Donasi</label>
                  <input type="text" name="dnsid" class="form-control" id="dnsid" value="<?= $id_donasi; ?>" readonly>
                </div>
                <div class="row">
                  <div class="col">
                    <div class="form-group">
                      <label for="nom-donasi">Pilih Nominal</label>
                      <select id="nom-donasi" name="nominal" class="form-control">
                        <option value=" "> </option>
                        <option value="10000">Rp. 10.000</option>
                        <option value="20000">Rp. 20.000</option>
                        <option value="50000">Rp. 50.000</option>
                        <option value="100000">Rp. 100.000</option>
                      </select>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label for="isi-nominal">Nominal Donasi Lainnya</label>
                      <input type="number" name="isi-nominal" class="form-control" id="isi-nominal" min="0" value="0" required>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="cpass">Deskripsi</label>
                  <textarea name="words" class="form-control" id="cpass" placeholder="Tulis deskripsi anda..." required></textarea>
                </div>
                <!-- Collapsable Card Example -->
                <div class="card shadow mb-4">
                  <!-- Card Header - Accordion -->
                  <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Panduan Pembayaran</h6>
                  </a>
                  <!-- Card Content - Collapse -->
                  <div class="collapse show" id="collapseCardExample">
                    <div class="card-body">
                      <ol>
                        <li>Login di aplikasi Mandiri Online</li>
                        <li>Pilih "Transfer"</li>
                        <li>Pilih "Ke Bank Lain Dalam Negeri"</li>
                        <li>Pilih Bank Mandiri Taspen</li>
                        <li>Masukkan No.Rekening <strong>99665648212</strong> A/n <strong>HelloPets</strong></li>
                        <li>Masukkan jumlah sesuai dengan nominal yang anda donasikan</li>
                        <li>Pada kolom deskripsi masukkan id donasi yang tertera diatas</li>
                        <li>Pilih Jenis transfer</li>
                        <li>Konfirmasi lalu masukkan M-Pin anda</li>
                        <li>Transaksi selesai, Simpan bukti bayar anda</li>
                      </ol>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" value="Donasikan">
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- End Modal popup buat donasi -->