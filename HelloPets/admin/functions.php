<?php

include "../db/db-connection.php";
session_start();


$id 	= $_SESSION['id'];
$nama	= $_SESSION['nama'];



if (isset($_GET['action'])) {

	switch ($_GET['action']) {
		
		case 'pictupload'					:	UpdatePict($_FILES);
		break;
		case 'updateprofile'				:	UpdateProfile($_POST);
		break;
		case 'approveadopt'					:	approveDeletAdopt($_GET);
		break;
		case 'deleteadopt'					:	approveDeletAdopt($_GET);
		break;
		case 'approvepengajuanadopt'		:	approvePengajuanAdopt($_GET);
		break;
		case 'approvepengajuanadopt'		:	deletePengajuanAdopt($_GET);
		break;
		case 'deletePost'					:	deletePost($_GET);
		break;

		default:
				# code...
		break;
	}
}




function userData($data)	{

	global $conn;

	if ($data == 'all') {

		$query 	= "SELECT * FROM user";

		$result	= mysqli_query($conn,$query);
		$rows	= [];

		while ($row = mysqli_fetch_assoc($result)) {

			$rows[] = $row;
		}

		return $rows;

	}
	elseif ($data == 'jumlah') {

		$query 	= "SELECT * FROM user";

		$result	= mysqli_query($conn,$query);
		$rows	= mysqli_num_rows($result);

		return $rows;

	}
}


function UpdatePict($data)	{

	global $conn;
	global $id;

		// Upload Pict
	$pict 	= upload();

	if (!$pict) {

		echo "<script>
		alert('Gambar gagal di upload asdasd!');
		document.location.href = 'index.php?page=profil';
		</script>";
		
		return false;
	}

	$query	= "UPDATE admin SET pict = '$pict' WHERE id = '$id';";

	$result = mysqli_query($conn,$query);

	if (!$result) {
		echo "<script>
		alert('Gambar gagal di upload  asd!');
		document.location.href = 'index.php?page=profil';
		</script>";

	}

	echo "<script>
	alert('Gambar Berhasil di upload!');
	document.location.href = 'index.php?page=profil';
	</script>";
	

}

function upload()	{

	$fileName	=	$_FILES['picture']['name'];
	$fileSize	=	$_FILES['picture']['size'];
	$fileError	=	$_FILES['picture']['error'];
	$fileTmp	=	$_FILES['picture']['tmp_name'];

		// cek ada gambar terupload
	if ($fileError === 4) {

		echo "<script>
		alert('Upload gambar terlebih dahulu');
		</script>";

		return false;
	}

		// cek apa file yg diupload itu gambar
	$validExt	=	['jpg','jpeg','png','bmp'];
	$fileExt	=	explode('.', $fileName);
	$fileExt	=	strtolower(end($fileExt));

	if (!in_array($fileExt, $validExt)) {

		echo "<script>
		alert('Hanya bisa upload file gambar');
		</script>";

		return false;
	}

		// Jika ukuran lebih dari 1 mb
		// if ($fileSize > 1000000) {

		// 	echo "<script>
		// 		 	alert('Ukuran terlalu besar');
		// 		</script>";

		// 	return false;
		// }

	move_uploaded_file($fileTmp, '../img/profile_pict/'.$fileName);

	return $fileName;

}

function UpdateProfile($data){

	global $conn;

	$id 	= $data['id'];
	$nama	= $data['nama'];
	$mail 	= $data['mail'];
	$phone	= $data['phone'];
	$alamat	= $data['alamat'];

	$query 	= 	"UPDATE admin 
	SET nama = '$nama',telp = '$phone',alamat = '$alamat'
	WHERE id = '$id';";
	$result = mysqli_query($conn,$query);
	if (!$result) {

		echo "<script>
		alert('gagal Update Data!');
		document.location.href = 'index.php?page=profil';
		</script>";
	}
	echo "<script>
	alert('Data Berhasil di Update!');
	document.location.href = 'index.php?page=profil';
	</script>";

}


function showProfile()
{
	global $conn;
	global $id;
	$query 	= "SELECT * FROM admin WHERE id = '$id'";

	$result	= mysqli_query($conn,$query);
	$rows	= [];

	while ($row = mysqli_fetch_assoc($result)) {

		$rows[] = $row;
	}

	return $rows;
}

	// Lihat donasi
function showDonasi($data){

	global $conn;

	if ($data == 'all') {

		$query 	= "SELECT * FROM donasi";

		$result	= mysqli_query($conn,$query);
		$rows	= [];

		while ($row = mysqli_fetch_assoc($result)) {

			$rows[] = $row;
		}
		
	}
	elseif ($data == 'jumlah') {
		
		$query 	= "SELECT * FROM donasi";

		$result	= mysqli_query($conn,$query);
		$rows	= mysqli_num_rows($result);

	}
	

	return $rows;
}


	// Show adopt data

function showAdoptData()
{
	global $conn;
	global $id;

	$query 	= "SELECT * FROM postadopt";

	$result	= mysqli_query($conn,$query);
	$rows	= [];

	while ($row = mysqli_fetch_assoc($result)) {

		$rows[] = $row;
	}

	return $rows;
}

function showAdoptPending()
{
	global $conn;
	global $id;

	$query 	= "SELECT * FROM postadopt WHERE status = 'PENDING'";

	$result	= mysqli_query($conn,$query);
	$rows	= [];

	while ($row = mysqli_fetch_assoc($result)) {

		$rows[] = $row;
	}

	return $rows;
}

function showAdoptApproved()
{
	global $conn;
	global $id;

	$query 	= "SELECT * FROM postadopt WHERE status = 'APPROVED'";

	$result	= mysqli_query($conn,$query);
	$rows	= [];

	while ($row = mysqli_fetch_assoc($result)) {

		$rows[] = $row;
	}

	return $rows;
}

function approveDeletAdopt($data)
{
	global $conn;

	$id 	= $data['id'];
	$aksi	= $data['action'];

	if ($aksi == 'approveadopt') {

		$query	= "UPDATE postadopt SET status = 'APPROVED' WHERE idAdopt = '$id'";

		$result = mysqli_query($conn,$query);

		if (!$result) {
			echo "<script>
			alert('Data gagal diubah!');
			document.location.href = 'index.php?page=adopsi';
			</script>";

			return false;

		}

		echo "<script>
		alert('Data Berhasil diubah');
		document.location.href = 'index.php?page=adopsi';
		</script>";
	}
	elseif ($aksi == 'deleteadopt') {



		$query1				= "SELECT pict FROM postadopt WHERE idAdopt = '$id'";
		$result1			= mysqli_query($conn,$query1);
		$row 				= mysqli_fetch_assoc($result1);

		$query				= "DELETE FROM postadopt WHERE idAdopt = '$id'";
		$result 			= mysqli_query($conn,$query);

		if (!$result) {
			echo "<script>
			alert('Data gagal dihapus!');
			document.location.href = 'index.php?page=adopsi';
			</script>";

			return false;

		}

		
		if(file_exists('../img/adopt-pict/'.$row['pict']))	{

		 	unlink('../img/adopt-pict/'.$row['pict']);

		 	echo "<script>
			alert('Data Berhasil dihapus');
			document.location.href = 'index.php?page=adopsi';
			</script>";
		}
	}


}


	// Data pengajuan adopsi

function showDataPengajuanAdopt()	{
	

	global $conn;

	$query 	=	"SELECT RA.id, RA.idAdopt, RA.id_user, RA.tgl, RA.status, PA.namaUser, PA.namaHewan, PA.gender,
	PA.deskripsi, PA.medicalDesc, PA.jenisHewan, PA.umurHewan, PA.pict, UA.nama
	FROM requestadopt AS RA
	JOIN postadopt AS PA ON PA.idAdopt = RA.idAdopt
	JOIN user AS UA ON UA.id = RA.id_user 
	WHERE RA.id IS NOT NULL" ;

	$result	= mysqli_query($conn,$query);
	$rows	= [];

	while ($row = mysqli_fetch_assoc($result)) {

		$rows[] = $row;
	}

	return $rows;
}

// Approve Pengajuan adopt

function approvePengajuanAdopt($data)	{

	global $conn;

	$id 		= $data['id'];
	$aksi		= $data['action'];
	$pengaju 	= $data['pengaju'];
	$idAdopt	= $data['idAdopt'];

	if ($aksi == 'approvepengajuanadopt') {

		$query	= "UPDATE requestadopt SET status = 'APPROVED' WHERE id = '$id'";
		$query1	= "UPDATE postadopt SET adoptedBy = '$pengaju' WHERE idAdopt = '$idAdopt'";


		$result = mysqli_query($conn,$query);
		$result1 = mysqli_query($conn,$query1);

		if (!$result&&!$result1) {
			echo "<script>
			alert('Data gagalasdasd diubah!');
			document.location.href = 'index.php?page=pengajuan-adopsi';
			</script>";
			echo(mysqli_error($conn));
		}

		echo "<script>
		alert('Data Berhasil asdasddiubah');
		document.location.href = 'index.php?page=pengajuan-adopsi';
		</script>";

	}
	elseif ($aksi == 'deletepengajuanadopt') {



		$query	= "DELETE FROM requestadopt WHERE id = '$id';";

		$result = mysqli_query($conn,$query);

		if (!$result) {
			echo "<script>
			alert('Data gagal dihapus!');
			document.location.href = 'index.php?page=pengajuan-adopsi';
			</script>";

		}

		echo "<script>
		alert('Data Berhasil dihapus');
		document.location.href = 'index.php?page=pengajuan-adopsi';
		</script>";
	}


}

	// Lihat semua data post hewan hilang
function showPost($data)	{
	
	global $conn;

	if ($data == 'lost') {
		
		$query 	= "SELECT * FROM postlost WHERE status = 'LOST'" ;

		$result	= mysqli_query($conn,$query);
		$rows	= [];

		while ($row = mysqli_fetch_assoc($result)) {

			$rows[] = $row;
		}
	}

	elseif ($data == 'found') {
		
		$query 	= "SELECT * FROM postlost WHERE status = 'FOUND'" ;

		$result	= mysqli_query($conn,$query);
		$rows	= [];

		while ($row = mysqli_fetch_assoc($result)) {

			$rows[] = $row;
		}
	}

	elseif ($data == 'all') {
		
		$query 	= "SELECT * FROM postlost" ;

		$result	= mysqli_query($conn,$query);
		$rows	= [];

		while ($row = mysqli_fetch_assoc($result)) {

			$rows[] = $row;
		}
	}

	elseif ($data == 'jumlah') {
		
		$query 	= "SELECT * FROM postlost" ;

		$result	= mysqli_query($conn,$query);
		$rows	= mysqli_num_rows($result);
	}

	else {
		return false;
	}

	return $rows;

}

// Jml Adopt data
function jmlAdoptData($data)
{
	global $conn;
	global $id;

	if ($data == 'jumlah') {
		
		$query 	= "SELECT * FROM postadopt";

		$result	= mysqli_query($conn,$query);
		$rows	= mysqli_num_rows($result);

	}

	return $rows;
}


// Delete Feature

function deletePost($aksiid)	{
	
	global $conn;

	$aksi 	 = $aksiid['action'];
	$idPost	 = $aksiid['id'];


	$query 			= "SELECT pict FROM postlost WHERE idPost = '$idPost'";
	$result			= mysqli_query($conn,$query);
	$row 			= mysqli_fetch_assoc($result);

	$query4 		= "SELECT pict FROM postcomment WHERE idPost = '$idPost'";
	$result4		= mysqli_query($conn,$query4);
	$row2			= mysqli_fetch_assoc($result4);

	$query2 		= "DELETE FROM postlost WHERE idPost = '$idPost'";
	$result2		=  mysqli_query($conn,$query2);

	$query3 		= "DELETE FROM postcomment WHERE idPost = '$idPost'";
	$result3		=  mysqli_query($conn,$query3);

	if (!$result3) {
			echo "<script>
			alert('Data gagal dihapus!');
			document.location.href = 'index.php?page=list_hewan';
			</script>";

			return false;

		}

	if(file_exists('../img/post-pict/'.$row['pict']))	{

	 	unlink('../img/post-pict/'.$row['pict']);

	 	echo "<script>
		alert('Data Berhasil dihapus');
		document.location.href = 'index.php?page=list_hewan';
		</script>";
	}

	if(file_exists('../img/comment-pict/'.$row2['pict']))	{

	 	unlink('../img/comment-pict/'.$row2['pict']);

	 	echo "<script>
		alert('Data Berhasil dihapus');
		document.location.href = 'index.php?page=list_hewan';
		</script>";
	}

}



?>