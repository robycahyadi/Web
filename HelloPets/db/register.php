<?php 
	
	include 'db-connection.php';

	$level	= "user";
	$init	= "USR";
	$digits = 3;
	$numb 	= rand(pow(10, $digits-1), pow(10, $digits)-1);
	$id 	= $init . sprintf($numb);


	if (register($_POST) > 0) {
		
		echo "<script>
				 	alert('Selamat anda sudah terdaftar, Silahkan login untuk melanjutkan');
				 	document.location.href = '../';
				</script>";
	}
	else{

		echo mysqli_error($conn);
	}


	function register($data)
	{
		global $conn;
		global $id;
		global $level;


		$nama	=	htmlspecialchars($data["nama"]);
		$mail	=	htmlspecialchars($data["mail"]);
		$pass	=	mysqli_real_escape_string($conn,htmlspecialchars($data["pass"]));
		$pass1	=	mysqli_real_escape_string($conn,htmlspecialchars($data["pass1"]));


		// cek apakah password yg diinput sama
		if ($pass != $pass1) {
			
			echo "<script>
				 	alert('Password Tidak Sesuai!');
				 	document.location.href = '../';
				 </script>";
			exit();
		}



		$query	= "INSERT INTO user
					VALUES 
					('$id','$nama','$mail','','','')";

		$query1	= "INSERT INTO login_credentials
					VALUES 
					('$id','$mail','$pass','$level')";

		mysqli_query($conn,$query);

		mysqli_query($conn,$query1);



		return mysqli_affected_rows($conn);
		
	}



 ?>

