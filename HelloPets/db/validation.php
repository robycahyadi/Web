<?php

include 'db-connection.php';

session_start();

login($_POST);



function login($data)	{
	
	global $conn;

	// Ambil data
	$mail	=	$data['mail'];
	$pass 	=	$data['pass'];

	// Jalankan Query
	$query 		=	"SELECT *
					FROM login_credentials
					WHERE email = '$mail'";

	$result		= mysqli_query($conn,$query);

	// cek Email
	if (mysqli_num_rows($result) === 1) {


		// cek password
		$rows 	= mysqli_fetch_assoc($result);

		if ($pass == $rows['password']) {

			if ($rows['level']=="admin") {


				$id = $rows['id'];

				$q2		=  "SELECT *
				FROM admin
				WHERE id = '$id'";
				$sesi 	= mysqli_query($conn,$q2);
				$data 	= mysqli_fetch_assoc($sesi);


				$_SESSION["id"]	= $data['id'];
				$_SESSION["email"]	= $data['email'];
				$_SESSION["alamat"]	= $data['alamat'];
				$_SESSION["telp"]	= $data['telp'];
				$_SESSION["nama"]	= $data['nama'];
				$_SESSION["level"]	= $rows['level'];
				$_SESSION['pict']	= $data['pict'];
				$_SESSION["status"]	= "Admin Logged In";

				header("Location: ../admin/");
				exit();

			}
			elseif ($rows['level']=="user") {

				$id = $rows['id'];

				$q2		=  "SELECT *
				FROM user
				WHERE id = '$id'";
				$sesi 	= mysqli_query($conn,$q2);
				$data 	= mysqli_fetch_assoc($sesi);

				$_SESSION["id"]		= $data['id'];
				$_SESSION["email"]	= $data['email'];
				$_SESSION["alamat"]	= $data['alamat'];
				$_SESSION["telp"]	= $data['telp'];
				$_SESSION["nama"]	= $data['nama'];
				$_SESSION["level"]	= $rows['level'];
				$_SESSION['pict']	= $data['pict'];
				$_SESSION["status"]	= "User Logged In";
				header("Location: ../user/");
				exit();
			}
			
		}

		echo "<script>
				 	alert('Password Tidak Sesuai!');
				 	document.location.href = '../';
			</script>";
			
		exit();
	}
	echo "<script>
				 	alert('Maaf email belum terdaftar');
				 	document.location.href = '../';
			</script>";
			
		exit();
	
}


?>