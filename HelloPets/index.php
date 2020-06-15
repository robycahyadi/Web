<?php 
include 'db/functions.php';
$adopt = showAdoptData();
$lostpost     = showLostPost();
?>

<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!-- Fonts -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet" type="text/css" href="css/custom.css">

  <!-- Favicon & Title -->
  <link rel="shortcut icon" href="img/favicon.png">
  <title>Hello Pets</title>

</head>
<body>
  <!-- NavBar -->
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand" href="#">
        <i class="fas fa-fw fa-paw"></i>
        <span>HelloPets</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ml-auto">
            <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="#">Services</a>
            <a class="nav-item nav-link" href="#">About</a>
            <a class="nav-item klik btn btn-primary" href="#" data-toggle="modal" data-target="#exampleModal">Login</a>
            <a class="nav-item klik btn btn-success" href="#" data-toggle="modal" data-target="#Modal">Register</a>
          </div>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">It's not a <span>weakness</span> to care about animals, it's a <span>strength</span></h1>
        <a href="index.html#nav-tabContent" class="klik btn btn-primary">Let's Go</a>
      </div>
    </div>
    <!-- End Jumbotron -->

    <!-- Container -->
    <div class="container">
      <!-- Panel work -->
      <div class="row justify-content-center">
        <div class="col-10 panel-work">
          <div class="row">
            <div class="col-lg">
              <img src="img/panel-work/headline.png" class="float-left">
              <h4>Donasikan</h4>
              <p>Banyak hwan yang membutuhkan donasimu. Ayo Donasi Sekarang !</p>
            </div>
            <div class="col-lg">
              <img src="img/panel-work/headline3.png" class="float-left">
              <h4>Adopsi</h4>
              <p>Kamu bisa mengadopsi hewan yang kamu paling inginkan</p>
            </div>
            <div class="col-lg">
              <img src="img/panel-work/headline2.png" class="float-left">
              <h4>Cari Hewan Hilang</h4>
              <p>Hewan kamu hilang ? Posting saja disini </p>
            </div>
          </div>
        </div>
      </div>
      <!-- end panel work -->
      <!-- Modal Login Register -->
      <!-- Login -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Login</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="db/validation.php" method="post">
              <div class="modal-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="mail" placeholder="Masukkan Email" required autofocus>
                  <small id="emailHelp" class="form-text text-muted">Kami takkan pernah menyebarkan informasi anda.</small>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" value="Login">
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- Register -->
      <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="ModalLabel">Register</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="db/register.php" method="post">
              <div class="modal-body">
                <div class="form-group">
                  <label for="name">Nama</label>
                  <input type="text" name="nama" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Masukkan Nama" required autofocus>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="email" name="mail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan email" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                </div>
                <div class="form-group">
                  <label for="cpass">Confirm Password</label>
                  <input type="password" name="pass1" class="form-control" id="cpass" placeholder="Confirm Password" required>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Register</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- end Modal -->

      <!-- Pet Tabs -->
      <section id="tabs" class="pet-tabs">
        <div class="row justify-content-center">
          <div class="col-12">
            <h3>Our List</h3>
            <div class="row justify-content-center"> 
              <div class="col-12">
               <nav>
                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                  <a class="nav-item nav-link switch-tab active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Hewan Hilang</a>
                  <a class="nav-item nav-link switch-tab" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Adopsi</a>
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
                          object-fit: cover;" src="img/post-pict/<?= $lost['pict']; ?>" alt="Card image cap">
                          <div class="card-body">
                            <h5 class="card-title"><?= $lost['namaHewan']; ?></h5>
                            <p class="card-text"><?= $lost['deskripsi']; ?></p>
                            <a href="#" class="btn klok postdetail"
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
                    <?php foreach ($adopt as $adoptData) : ?>
                      <div class="col-lg-3">
                        <div class="card">
                          <img class="card-img-top img-responsive" style="    width: 100%;
                          height: 15vw;
                          object-fit: cover;" src="img/adopt-pict/<?= $adoptData['pict']; ?>" alt="Card image cap">
                          <div class="card-body">
                            <h5 class="card-title"><?= $adoptData['namaHewan']; ?></h5>
                            <p class="card-text"><?= $adoptData['deskripsi']; ?></p>
                            <a href="#" class="klok btn detailadopsi"
                            data-id ="<?= $adoptData['idAdopt']; ?>" 
                            data-idusr ="<?= $adoptData['id_user']; ?>" 
                            data-nmuser ="<?= $adoptData['namaUser']; ?>" 
                            data-nmhewan ="<?= $adoptData['namaHewan']; ?>"
                            data-jhewan ="<?= $adoptData['jenisHewan']; ?>"
                            data-uhewan ="<?= $adoptData['umurHewan']; ?>"
                            data-gender ="<?= $adoptData['gender']; ?>"
                            data-mail ="<?= $adoptData['email']; ?>"
                            data-telp ="<?= $adoptData['telp']; ?>"
                            data-alamat ="<?= $adoptData['alamat']; ?>"
                            data-desk ="<?= $adoptData['deskripsi']; ?>"
                            data-mdesk ="<?= $adoptData['medicalDesc']; ?>"
                            data-pict ="<?= $adoptData['pict']; ?>"
                            data-status ="<?= $adoptData['status']; ?>">Detail</a>
                          </div>
                        </div>
                      </div>
                    <?php endforeach; ?>
                  </div>
                </div>
                <div class="tab-pagination" role="tabpanel" aria-labelledby="nav-bottom-tab">
                  <div class="row">
                    <div class="col">
                      <p><</p>
                    </div>
                    <div class="col">
                      <p>1</p>
                    </div>
                    <div class="col">
                      <p>></p>
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
            <a class="btn btn-success" href="#" data-dismiss="modal" data-toggle="modal" data-target="#exampleModal">Adopsi</a>
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
                <img class="img-profile rounded-corner" id="myPosthomepict" style="width:300px; height: 300px;" src=" ">
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
            <a class="btn btn-success" href="#" data-dismiss="modal" data-toggle="modal" data-target="#exampleModal">Saya menemukannya</a>
          </div>
        </div>
      </div>
    </div>
    <!-- End Modal popup Detail Post -->

    <!-- Footer -->
    <div class="row footer">
      <div class="col" align="center">
        <p>2020 All Right Reserved by Mathilda.Corp</p>
      </div>
    </div>
    <!-- end footer -->   
  </div>
  <!-- end container -->

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <!-- Custom JS -->
  <script src="js/custom.js"></script>
</body>
</html>