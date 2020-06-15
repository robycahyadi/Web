<?php
	include 'koneksi.php';

	$nama	  = $_POST['name'];
	$mail	  = $_POST['mail'];
	$pass	  = $_POST['pass'];
	$tgllahir = $_POST['tanggalLahir'];
	$telp 	  = $_POST['telp'];
	$jkelamin = $_POST['jk'];
	$alamat	  = $_POST['alamat'];
	$level    = "BabySitter";

	$kode = date("dhs");
	$auto_kode = "BBS" .str_pad($kode,STR_PAD_LEFT);

	$query = mysqli_query($koneksi,"INSERT INTO `user`(`user_id`,`nama`, `level` ,`username`, `password`) VALUES ('$auto_kode','$nama', '$level','$mail','$pass')");

	$query2 = mysqli_query($koneksi,"INSERT INTO `babysitter`(`user_id`,`nama`, `email`, `no_telp`, `tgl_lahir`, `gender`, `alamat`) VALUES ('$auto_kode','$nama','$mail','$telp','$tgllahir' ,'$jkelamin','$alamat')");


  	header("location:index.php");

  	/*echo $nama;
  	echo "<br>";
  	echo $mail;
  	echo "<br>";
  	echo $tgllahir;
  	echo "<br>";
  	echo $telp;
  	echo "<br>";
  	echo $jkelamin;
  	echo "<br>";
  	echo $alamat;
  	echo "<br>";*/

	

?>