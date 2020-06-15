<?php 

$jmladopsi  = jmlAdoptData('jumlah');
$jmlpost    = showPost('jumlah');
$dataDonasi = showDonasi('jumlah');
$userdata   = userData('jumlah');


$adoptapprove = showAdoptApproved();

$lostpost     = showPost('lost');

?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div> 

<!-- Content Row -->
<div class="row">

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pengumuman Hewan Hilang</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jmlpost ?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-paw fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Donasi</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $dataDonasi ?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-hands fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Adopsi</div>
            <div class="row no-gutters align-items-center">
              <div class="col-auto">
                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $jmladopsi ?></div>
              </div>
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-hand-holding-heart fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jumlah User</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $userdata ?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-users fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>


<!-- Card Data Adopsi -->
<div class="card shadow mb-4">
  <div class="card-body">
    <!-- Pet Tabs -->
    <section id="tabs" class="pet-tabs">
      <div class="row justify-content-center">
        <div class="col-12">
          <div class="row justify-content-center"> 
            <div class="col-12">
              <nav>
                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                  <a class="nav-item nav-link text-primary active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Hewan Hilang</a>
                  <a class="nav-item nav-link text-primary" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Adopsi</a>
                </div>
              </nav>
              <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                  <div class="row">
                    <?php foreach ($lostpost as $lost) : ?>
                      <div class="col-lg-3">
                        <div class="card">
                          <img class="card-img-top img-responsive" style="    width: 100%;
                          height: 15vw;
                          object-fit: cover;" src="../img/post-pict/<?= $lost['pict']; ?>" alt="Card image cap">
                          <div class="card-body">
                            <h5 class="card-title"><?= $lost['namaHewan']; ?></h5>
                            <p class="card-text"><?= $lost['deskripsi']; ?></p>
                            <a href="#" class="btn btn-warning postdetail postcomment"
                            data-id     = "<?= $lost['idPost']; ?>"
                            data-nuser  = "<?= $lost['namaUser']; ?>"
                            data-nhewan = "<?= $lost['namaHewan']; ?>"
                            data-jhewan = "<?= $lost['jenisHewan']; ?>"
                            data-mail   = "<?= $lost['mail']; ?>"
                            data-telp   = "<?= $lost['telp']; ?>"
                            data-alamat = "<?= $lost['alamat']; ?>"
                            data-desc   = "<?= $lost['deskripsi']; ?>"
                            data-pict   = "<?= $lost['pict']; ?>"
                            >Detail</a>
                          </div>
                        </div>
                      </div>
                    <?php endforeach; ?>
                  </div>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
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
                            <a href="#" class="btn btn-warning detailadopsi ajukanadopsi"
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
                            >Detail</a>
                          </div>
                        </div>
                      </div>
                    <?php endforeach; ?>
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
<!-- Modal popup Detail Adopsi -->
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
<!-- End Modal popup Detail Adopsi -->

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
<!-- End Modal popup Detail Post -->
