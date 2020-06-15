<?php 
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$username = $_POST['name'];
$password = $_POST['pass'];

// menyeleksi data admin dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"select * from user where username='$username' and password='$password'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

if($cek > 0){

	$data = mysqli_fetch_array($login);

	if($data['level']=="BabySitter" OR $data['level']=="babysitter"){
		// buat session login dan username
		$_SESSION['nama'] = $data['nama'];
		$_SESSION['uid'] = $data['user_id'];
		$_SESSION['level'] = "BabySitter";
		// alihkan ke halaman dashboard pegawai
		header("location:babysitter/");

	}else if($data['level']=="Admin"){
		// buat session login dan username
		$_SESSION['nama'] = $data['nama'];
		$_SESSION['uid'] = $data['user_id'];
		$_SESSION['level'] = "Admin";
		// alihkan ke halaman dashboard pengurus
		header("location:admin/");
	}
}else{
	header("location:index.php?pesan=gagal");
}
?>