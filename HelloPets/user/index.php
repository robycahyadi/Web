<?php 
  
  include 'functions.php';
  
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


  $profile = showProfile();

  foreach ($profile as $data) {
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

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.css" rel="stylesheet">

  <!-- Datatables CSS -->
  <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
   <!-- Custom styles for tasd template-->
  <link href="../css/dashboard.css" rel="stylesheet">


</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-dog"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Hello Pets</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php?page=dashboard">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Campaign
      </div>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="index.php?page=list_hewan">
          <i class="fas fa-fw fa-paw"></i>
          <span>Hewan hilang</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?page=foundanimal">
          <i class="fas fa-fw fa-paw"></i>
          <span>Hewan ditemukan</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Donasi dan Adopsi
      </div>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="index.php?page=donasi">
          <i class="fas fa-fw fa-hands"></i>
          <span>Donasi</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-paw"></i>
          <span>Adopsi</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Adopsi</h6>
            <a class="collapse-item" href="index.php?page=adopsi">Data Adopsi</a>
            <a class="collapse-item" href="index.php?page=pengajuan-adopsi">Data Pengajuan Adopsi</a>
          </div>
        </div>
      </li>



      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Hello, <?= $data["nama"]; ?></span>
                <?php if (!empty($data["pict"])) :?>
                <img class="img-profile rounded-circle" style="width:40px; height: 40px;" src="../img/profile_pict/<?= $data["pict"]; ?>">

                <?php else : ?>
                <img class="img-profile rounded-circle" style="width:40px; height: 40px;" src="../img/profil_pict.png">
              <?php endif; ?>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="index.php?page=profil">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <?php 

              if (isset($_GET['page'])) {

                switch ($_GET['page']) {

                  case 'dashboard':
                    include 'dashboard.php';
                  break;
                  case 'list_hewan':
                    include 'list_hewan.php';
                  break;
                  case 'donasi':
                    include 'donasi.php';
                  break;
                  case 'cdonasi':
                    include 'donasi.php';
                  break;
                  case 'adopsi':
                    include 'adopsi.php';
                  break;
                  case 'pengajuan-adopsi':
                    include 'pengajuan-adopsi.php';
                  break;
                  case 'profil':
                    include 'profil.php';
                  break;
                  case 'pengajuanadopsi':
                    include 'pengajuanadopsi.php';
                  break;  
                  case 'isi-form-pengajuan':
                    include 'formpengajuanadopsi.php';
                  break;
                  case 'postcomment':
                    include 'hewanhilangcomment.php';
                  break;
                  case 'foundanimal':
                    include 'dataanimalfound.php';
                  break;   
                  default:
                    include 'dashboard.php';
                  break;
                }
              }
              else{ 
                include 'dashboard.php';
              }

          ?>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; HalloPets & Mathilda.Corp 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="../db/logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>


    <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>
  <script src="../js/custom.js"></script>
  
  <!-- Page level plugins -->
  <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../js/demo/datatables-demo.js"></script>




</body>

</html>
