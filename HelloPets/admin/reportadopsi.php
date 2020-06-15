<?php 

require 'functions.php';
$profile = showProfile(); 

$pengajuanadopsi = showDataPengajuanAdopt();

if (!isset($_SESSION["status"])) {

  echo "<script>
  alert('Maaf anda harus login untuk melihat halaman ini');
  document.location.href = '../';
  </script>";

  if ($_SESSION["status"] != "Admin Logged In") {

   echo "<script>
   alert('Maaf anda harus login untuk melihat halaman ini');
   document.location.href = '../';
   </script>";
 }
}

$id = $_GET['id'];

$query  = " SELECT RA.tgl as tglAdopsi, PA.namaHewan as Nama, PA.jenisHewan as Jenis, PA.namaUser as Pemilik,
PA.alamat as alamatPemilik, PA.telp as telpPemilik, UA.nama as Pengadopsi, UA.telp as telpPengadopsi, UA.alamat as alamatPengadopsi
FROM requestadopt as RA 
JOIN postadopt as PA on PA.idAdopt = RA.idAdopt
JOIN user as UA on UA.id= RA.id_user
WHERE RA.id = '$id'" ;


$result = mysqli_query($conn,$query);
$rows = [];

while ($row = mysqli_fetch_assoc($result)) {

  $rows[] = $row;
}

foreach ($rows as $data) {
    # code...
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

   <!-- Favicon & Title -->
  <link rel="shortcut icon" href="../img/favicon.png">
  <title>Hello Pets</title>


  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">


  <link href="../css/sb-admin-2.min.css" rel="stylesheet">


  <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <link href="../css/dashboard.css" rel="stylesheet">

  <style type="text/css">

    .surat {
      margin: auto;
      color: black !important;
      margin-top: 40px;
      border-bottom: 3px double #000;
      width: 80%;
    }

    .surat .judul a{
      float: left;
      color: black;
      margin-right: -70px;
    }

    .surat .judul h1,h4{
      font-weight: 800;
      text-align: center;
    }

    .tajuk {
      color: black;
      margin: auto;
      width: 80%;

    }

    .tajuk .judul-surat h5{

      text-align: center;
      margin-top: 40px;
      font-weight:700 !important;
      margin-bottom: 60px;
    }

    .foot-surat{

      color: black;
      margin-top: 30px;
      width: 80%;
      text-align: right;

    }

  </style>

</head>

<body id="page-top">

 <div class="container">
  <div class="surat">
    <div class="judul">
     <a href="#" class="logo"><img src="../img/favicon.png" style="width: 120px; height: auto; margin-top: -35px;" ></a>
     <h4>Pet Adoption Center</h4>
     <h1>HelloPets</h1>
   </div>
 </div>
 <div class="tajuk">
  <div class="judul-surat">
   <h5>Surat Pelepasan Hak Asuh Hewan</h5>
 </div>
 <div class="isi-surat">
   <p>Surat ini dibuat sebagai bukti resmi bahwa pihak pemilik</p>
   <table cellspacing="30px" style="width: 50%;">
     <tr>
       <td>Nama</td>
       <td>:</td>
       <td><?= $data['Pemilik']; ?></td>
     </tr>
     <tr>
       <td>Alamat</td>
       <td>:</td>
       <td><?= $data['alamatPemilik']; ?></td>
     </tr>
     <tr>
       <td>No.Telp</td>
       <td>:</td>
       <td><?= $data['telpPemilik']; ?></td>
     </tr>
   </table>
   <br>
   <p>Telah menyerahkan hak asuh hewannya </p>
   <table cellspacing="30px" style="width: 50%;">
     <tr>
       <td>Nama</td>
       <td>:</td>
       <td><?= $data['Nama']; ?></td>
     </tr>
     <tr>
       <td>Jenis</td>
       <td>:</td>
       <td><?= $data['Jenis']; ?></td>
     </tr>
   </table>
   <br>
   <p>Kepada Pihak Pengadopsi</p>
   <table cellspacing="30px" style="width: 50%;">
     <tr>
       <td>Nama</td>
       <td>:</td>
       <td><?= $data['Pengadopsi']; ?></td>
     </tr>
     <tr>
       <td>Alamat</td>
       <td>:</td>
       <td><?= $data['alamatPengadopsi']; ?></td>
     </tr>
     <tr>
       <td>No.Telp</td>
       <td>:</td>
       <td><?= $data['telpPengadopsi']; ?></td>
     </tr>
   </table>
   <br>
   <br>
   <p>Demikian surat ini dibuat dengan tujuan sebagai bukti resmi dari penyerahan hak asuh hewan melalui platform HelloPets.</p>
 </div>
 <div class="foot-surat">
   <p>Jakarta, <?= $data['tglAdopsi']; ?></p>
   <br>
   <br>
   <br>
   <p>Admin <?= $_SESSION['nama'];?></p>
 </div>
</div>
</div>

</body>


<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>


<script src="../js/custom.js"></script>
<script src="../js/sb-admin-2.min.js"></script>


<script src="../vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

<script src="../js/demo/datatables-demo.js"></script>


</html>
