<?php
	include '../koneksi.php';
	session_start();

	$uid = $_GET['uid'];
	$nama = $_SESSION['nama'];
	$ndiri = $_FILES['fotodiri']['name'];
	$filediri = $_FILES['fotodiri']['tmp_name'];
	move_uploaded_file($filediri, '../images/foto_diri/'.$ndiri);
	$nktp = $_FILES['fotoktp']['name'];
	$filektp = $_FILES['fotoktp']['tmp_name'];
	move_uploaded_file($filektp, '../images/foto_ktp/'.$nktp);
	$nijazah = $_FILES['ijazah']['name'];
	$ijazah = $_FILES['ijazah']['tmp_name'];
	move_uploaded_file($ijazah, '../images/ijazah/'.$nijazah);

	$query = mysqli_query($koneksi,"INSERT INTO `p_test`(`user_id`,`nama`, `file_1` ,`file_2`, `file_3`) VALUES ('$uid','$nama', '$ndiri','$nktp','$nijazah')");

	echo "<script>
	        alert('Data Telah di Tambah');
	        window.location.href='index.php?page=dashboard';
	        </script>";

?>