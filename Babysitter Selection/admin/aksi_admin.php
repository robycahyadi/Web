<?php
	include '../koneksi.php';

	if (isset($_GET['uid'])) {
		$uid = $_GET['uid'];
	}


	if(isset($_GET['aksi'])){
       $aksi = $_GET['aksi'];      

	switch ($aksi) {
		case 'inputtgl':
			$tgl_test = $_POST['tgltest'];

			$input_tgl = mysqli_query($koneksi,"INSERT INTO `tgl_test` (`user_id`, `tanggal_test`) VALUES ('$uid', '$tgl_test')");
			header("location: index.php?page=info_baby&idbs=$uid");
			break;
		
		default:
			# code...
			break;
	}
}

?>