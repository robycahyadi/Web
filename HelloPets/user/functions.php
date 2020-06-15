<?php

include "../db/db-connection.php";
session_start();


$id 		= $_SESSION['id'];
$nama		= $_SESSION['nama'];
$mail 		= $_SESSION["email"];	
$alamat		= $_SESSION["alamat"];
$telp 		= $_SESSION["telp"];
$pictprofil = $_SESSION['pict'];



if (isset($_GET['action'])) {

	switch ($_GET['action']) {
		
		case 'pictupload'		:	UpdatePict($_FILES);
		break;
		case 'updateprofile'	:	UpdateProfile($_POST);
		break;
		case 'donasi'			:	buatDonasi($_POST);
		break;
		case 'postadopt'		:	postAdopt($_POST,$_FILES);
		break;
		case 'ajukanadopt'		:	pengajuanAdopt($_POST);
		break;
		case 'buatPost'			:	buatPostkehilangan($_POST,$_FILES);
		break;
		case 'postcomment'		:	postComment($_POST,$_FILES);
		break;
		case 'founded'			:	foundPost($_GET);
		break;
		case 'deletePost'		:	deletePost($_GET);
		break;
		case 'deleteAdopt'		:	deleteAdopt($_GET);
		break;


		default:
				# code...
		break;
	}
}

	// Ubah Foto Profil
function UpdatePict($data)	{

	global $conn;
	global $id;

		// Upload Pict
	$pict 	= upload();

	if (!$pict) {

		echo "<script>
		alert('Gambar gagal di upload!');
		document.location.href = 'index.php?page=profil';
		</script>";

		return false;
	}

	$query	= "UPDATE user SET pict = '$pict' WHERE id = '$id';";

	$result = mysqli_query($conn,$query);

	if (!$result) {
		echo "<script>
		alert('Gambar gagal di upload!');
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


	// Ubah Data Profil
function UpdateProfile($data){

	global $conn;

	$id 	= $data['id'];
	$nama	= $data['nama'];
	$mail 	= $data['mail'];
	$phone	= $data['phone'];
	$alamat	= $data['alamat'];

	$query 	= 	"UPDATE user 
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

	// Ambil data Profil
function showProfile()
{
	global $conn;
	global $id;
	$query 	= "SELECT * FROM user WHERE id = '$id'";

	$result	= mysqli_query($conn,$query);
	$rows	= [];

	while ($row = mysqli_fetch_assoc($result)) {

		$rows[] = $row;
	}

	return $rows;
}


	// Handle donasi
function buatDonasi($data)	{

	global $conn;
	global $id;
	global $nama;
	$init	= "DNS";
	$digits = 7;
	$numb 	= rand(pow(10, $digits-1), pow(10, $digits)-1);
	$id_donasi 	= $init . sprintf($numb);
	$tgl	= date("Y-m-d H:i");
	$nominalDefault	=	$data['nominal'];
	$nominalDonasi	=	$data['isi-nominal'];
	$deskripsi		=	$data['words'];

	if ($nominalDefault < 1) {

		if ($nominalDonasi < 1) {


			echo "<script>
			alert('Harap masukkan jumlah nominal');
			document.location.href = 'index.php?page=donasi';
			</script>";
		}
		else {

			$query	= "INSERT INTO donasi
			VALUES 
			('$id_donasi','$id','$nama','$nominalDonasi','$deskripsi','$tgl')";

			$result = mysqli_query($conn,$query);

			if (!$result) {
				echo mysqli_error($conn);
			}

			echo "<script>
			alert('Terimakasih sudah berdonasi');
			document.location.href = 'index.php?page=donasi';
			</script>";

		}

	}
	else {


		$query	= "INSERT INTO donasi
		VALUES 
		('$id_donasi','$id','$nama','$nominalDefault','$deskripsi','$tgl')";

		$result = mysqli_query($conn,$query);

		if (!$result) {
			echo mysqli_error($conn);
		}
		echo "<script>
		alert('Terimakasih sudah berdonasi');
		document.location.href = 'index.php?page=donasi';
		</script>";
	}

}

function confirmDonasi($data)	{

	global $conn;
	global $id;
	global $nama;
	$tgl	= date("Y-m-d H:i");
	$id_donasi		= 	$data['dnsid'];
	$nominalDefault	=	$data['nominal'];
	$nominalDonasi	=	$data['isi-nominal'];
	$deskripsi		=	$data['words'];

	if ($nominalDefault < 1) {

		if ($nominalDonasi < 1) {


			echo "<script>
			alert('Harap masukkan jumlah nominal');
			document.location.href = 'index.php?page=donasi';
			</script>";
		}
		else {

			$query	= "INSERT INTO donasi
			VALUES 
			('$id_donasi','$id','$nama','$nominalDonasi','$deskripsi','$tgl')";

			$result = mysqli_query($conn,$query);

			if (!$result) {
				echo mysqli_error($conn);
			}

			echo "<script>
			alert('Terimakasih sudah berdonasi');
			document.location.href = 'index.php?page=donasi';
			</script>";

		}

	}
	else {


		$query	= "INSERT INTO donasi
		VALUES 
		('$id_donasi','$id','$nama','$nominalDefault','$deskripsi','$tgl')";

		$result = mysqli_query($conn,$query);

		if (!$result) {
			echo mysqli_error($conn);
		}
		echo "<script>
		alert('Terimakasih sudah berdonasi');
		document.location.href = 'index.php?page=donasi';
		</script>";
	}

}

	// Lihat donasi
function showDonasi(){

	global $conn;
	global $id;
	$query 	= "SELECT * FROM donasi WHERE id_user = '$id'";

	$result	= mysqli_query($conn,$query);
	$rows	= [];

	while ($row = mysqli_fetch_assoc($result)) {

		$rows[] = $row;
	}

	return $rows;
}

function postAdopt($data,$file)	{

	global $conn;
	global $idAdopt;
	global $id;
	global $nama;
	global $mail;
	global $alamat;
	global $telp;

	$init 		= "ADP";
	$digits 	= 7;
	$numb   	= rand(pow(10, $digits-1), pow(10, $digits)-1);
	$idAdopt  	= $init . sprintf($numb);
	$namahewan	= $data['nhewan'];
	$jhewan		= $data['jhewan'];
	$umurhewan	= $data['uhewan'];
	$gender		= $data['gender'];
	$adesc		= $data['adesc'];
	$amedic		= $data['amedic'];
	$status		= 'PENDING';


	$pict 	= uploadAdoptPict();

	if (!$pict) {

		echo "<script>
		alert('Gambar gagal di upload!');
		document.location.href = 'index.php?page=adopsi';
		</script>";
		return false;
	}

	$query	= "INSERT INTO postadopt
	VALUES 
	('$idAdopt','$id','$nama','$namahewan','$jhewan','$umurhewan','$gender','$mail','$telp','$alamat','$adesc','$amedic','$pict','$status','-')";

	$result = mysqli_query($conn,$query);

	if (!$result) {
		echo "<script>
		alert('Data adopsi gagal ditambahkan');
		document.location.href = 'index.php?page=adopsi';
		</script>";

		echo mysqli_error($conn);

	}

	echo "<script>
	alert('Data Berhasil ditambah');
	document.location.href = 'index.php?page=adopsi';
	</script>";

}


function uploadAdoptPict()	{

	global $idAdopt;
	$fileName	=	$_FILES['adopt-pict']['name'];
	$fileSize	=	$_FILES['adopt-pict']['size'];
	$fileError	=	$_FILES['adopt-pict']['error'];
	$fileTmp	=	$_FILES['adopt-pict']['tmp_name'];

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
	$adpictname	= 	$idAdopt.".".$fileExt;

	if (!in_array($fileExt, $validExt)) {

		echo "<script>
		alert('Hanya bisa upload file gambar');
		</script>";

		return false;
	}

	move_uploaded_file($fileTmp, '../img/adopt-pict/'.$adpictname);

	return $adpictname;


}

	// Show adopt data

function showAdoptData()
{
	global $conn;
	global $id;

	$query 	= "SELECT * FROM postadopt WHERE id_user = '$id'";

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

	$query 	= "SELECT * FROM postadopt WHERE id_user = '$id' AND status = 'PENDING'";

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

	$query 	= "SELECT * FROM postadopt WHERE id_user = '$id' AND status = 'APPROVED'";

	$result	= mysqli_query($conn,$query);
	$rows	= [];

	while ($row = mysqli_fetch_assoc($result)) {

		$rows[] = $row;
	}

	return $rows;
}


function showAllAdoptApproved()
{
	global $conn;
	global $id;

	$query 	= "SELECT * FROM postadopt WHERE status = 'APPROVED' AND adoptedBy = '-'" ;

	$result	= mysqli_query($conn,$query);
	$rows	= [];

	while ($row = mysqli_fetch_assoc($result)) {

		$rows[] = $row;
	}

	return $rows;
}

// Pengajuan ADopsi

function pengajuanAdopt($data)	{

	global $conn;
	global $id;


	$init 			= "PADP";
	$digits 		= 6;
	$numb   		= rand(pow(10, $digits-1), pow(10, $digits)-1);
	$idPengajuan  	= $init . sprintf($numb);
	$idAdopt		= $data['idAdopt'];
	$id_user		= $id;
	$pengalaman		= $data['pengalaman'];
	$alasan			= $data['alasan'];
	$status			= 'PENDING';
	$tgl			= date("Y-m-d");

	$query	= "INSERT INTO requestadopt
				VALUES 
				('$idPengajuan','$idAdopt','$id_user','$status','$pengalaman','$alasan','$tgl')";

	$result = mysqli_query($conn,$query);

	if (!$result) {
		echo "<script>
		alert('Pengajuan gagal');
		document.location.href = 'index.php?page=dashboard';
		</script>";

		echo mysqli_error($conn);

	}

	echo "<script>
	alert('Pengajuan Berhasil');
	document.location.href = 'index.php?page=dashboard';
	</script>";




}

function showDataPengajuanAdopt()	{
	

	global $conn;
	global $id;

	$query 	=	"SELECT RA.id, RA.idAdopt, RA.id_user, RA.tgl, RA.status, PA.namaUser, PA.namaHewan, PA.gender,
				PA.deskripsi, PA.medicalDesc, PA.jenisHewan, PA.umurHewan, PA.pict 
			 	FROM requestadopt AS RA
			 	RIGHT JOIN postadopt AS PA ON PA.idAdopt = RA.idAdopt
			 	WHERE RA.id_user = '$id'" ;

	$result	= mysqli_query($conn,$query);
	$rows	= [];

	while ($row = mysqli_fetch_assoc($result)) {

		$rows[] = $row;
	}

	return $rows;



}



// Hewan Hilang 

// Buat Post Kehilangan
function buatPostkehilangan($data,$file)	{
	
	global $conn;
	global $id;
	global $nama;
	global $mail;
	global $alamat;
	global $telp;
	global $idPost;

	$init 			= "POST";
	$digits 		= 6;
	$numb   		= rand(pow(10, $digits-1), pow(10, $digits)-1);
	$idPost  		= $init . sprintf($numb);
	
	$nhewan 		= $data['nhewan'];
	$jhewan 		= $data['jhewan'];
	$gender			= $data['gender'];
	$desc 			= $data['adesc'];
	$status			= 'LOST';
	$tgl			= date("Y-m-d");

	$pict 			= uploadPostPict();

	if (!$pict) {

		echo "<script>
		alert('Gambar gagal di upload!');
		document.location.href = 'index.php?page=list_hewan';
		</script>";
		return false;
	}


	$query	= "INSERT INTO postlost
	VALUES 
	('$idPost','$id','$nama','$nhewan','$jhewan','$gender','$mail','$telp','$alamat','$desc','$pict','$status','$tgl')";

	$result = mysqli_query($conn,$query);

	if (!$result) {
		echo "<script>
		alert('Data adopsi gagal ditambahkan');
		document.location.href = 'index.php?page=list_hewan';
		</script>";

		echo mysqli_error($conn);

	}

	echo "<script>
	alert('Data Berhasil ditambah');
	document.location.href = 'index.php?page=list_hewan';
	</script>";

}


// Upload Foto Kehilangan
function uploadPostPict()	{
	
	global $idPost;

	$fileName		= $_FILES['post-pict']['name'];
	$fileTmp		= $_FILES['post-pict']['tmp_name'];
	$fileSize		= $_FILES['post-pict']['size'];
	$fileError		= $_FILES['post-pict']['error'];


	if ($fileError === 4) {

		echo "<script>
		alert('Upload gambar terlebih dahulu');
		</script>";

		return false;
	}

		// cek apa file yg diupload itu gambar
	$validType	=	['jpg','jpeg','png','bmp'];
	$fileType	=	explode('.', $fileName);
	$fileType	=	strtolower(end($fileType));
	$postPict	= 	$idPost.".".$fileType;

	if (!in_array($fileType, $validType)) {

		echo "<script>
		alert('Hanya bisa upload file gambar');
		</script>";

		return false;
	}

	move_uploaded_file($fileTmp, '../img/post-pict/'.$postPict);


	return $postPict;


}

// Show post
function showLostPost()	{


	global $conn;
	global $id;

	$query 	= "SELECT * FROM postlost WHERE status = 'LOST'" ;

	$result	= mysqli_query($conn,$query);
	$rows	= [];

	while ($row = mysqli_fetch_assoc($result)) {

		$rows[] = $row;
	}

	return $rows;
	

}


function showPost($data)	{
	
	global $conn;
	global $id;

	if ($data == 'lost') {
		
		$query 	= "SELECT * FROM postlost WHERE status = 'LOST' AND id_user = '$id'" ;

		$result	= mysqli_query($conn,$query);
		$rows	= [];

		while ($row = mysqli_fetch_assoc($result)) {

			$rows[] = $row;
		}
	}

	elseif ($data == 'found') {
		
		$query 	= "SELECT * FROM postlost WHERE status = 'FOUND' AND id_user = '$id'" ;

		$result	= mysqli_query($conn,$query);
		$rows	= [];

		while ($row = mysqli_fetch_assoc($result)) {

			$rows[] = $row;
		}
	}

	elseif ($data == 'all') {
		
		$query 	= "SELECT * FROM postlost WHERE id_user = '$id'" ;

		$result	= mysqli_query($conn,$query);
		$rows	= [];

		while ($row = mysqli_fetch_assoc($result)) {

			$rows[] = $row;
		}
	}

	else {
		return false;
	}

	return $rows;

}

// Post Comment Hewan Hilang

function postComment($data,$file)	{
	
	global $conn;
	global $id;
	global $idcmnt;

	$init 		= "CMNT";
	$digits 	= 6;
	$numb   	= rand(pow(10, $digits-1), pow(10, $digits)-1);
	$idcmnt  	= $init . sprintf($numb);
	$tgl		= date("Y-m-d");
	$idPost		= $data['idPost'];
	$ket		= $data['ket'];
	$pict 		= uploadCommentPict();

	if (!$pict) {

		echo "<script>
		alert('Gambar gagal di upload!');
		document.location.href = 'index.php?page=list_hewan';
		</script>";

		return false;
	}
	else {

		$query		=  "INSERT INTO postcomment
						VALUES 
						('$idcmnt','$idPost','$id','$ket','$pict','$tgl')";

		$result = mysqli_query($conn,$query);

		if (!$result) {
			echo "<script>
			alert('Data adopsi gagal ditambahkan');
			document.location.href = 'index.php?page=list_hewan';
			</script>";

			echo mysqli_error($conn);

		}

		echo "<script>
		alert('Data Berhasil ditambah');
		document.location.href = 'index.php?page=list_hewan';
		</script>";

	}



}

function uploadCommentPict() {

	global $idcmnt;

	$fileName		= $_FILES['cmnt-pict']['name'];
	$fileTmp		= $_FILES['cmnt-pict']['tmp_name'];
	$fileSize		= $_FILES['cmnt-pict']['size'];
	$fileError		= $_FILES['cmnt-pict']['error'];


	if ($fileError === 4) {

		echo "<script>
		alert('Upload gambar terlebih dahulu');
		</script>";

		return false;
	}

		// cek apa file yg diupload itu gambar
	$validType	=	['jpg','jpeg','png','bmp'];
	$fileType	=	explode('.', $fileName);
	$fileType	=	strtolower(end($fileType));
	$cmntPict	= 	$idcmnt.".".$fileType;

	if (!in_array($fileType, $validType)) {

		echo "<script>
		alert('Hanya bisa upload file gambar');
		</script>";

		return false;
	}

	move_uploaded_file($fileTmp, '../img/comment-pict/'.$cmntPict);


	return $cmntPict;
}

// Ubah status found post

function foundPost($data)	{
 	
 	global $conn;
	global $id;

	$idPost = $data['id'];
	$status = 'FOUND';

	$query	= "UPDATE postlost SET status = '$status' WHERE idPost = '$idPost';";

	$result = mysqli_query($conn,$query);

	if (!$result) {
		echo "<script>
		alert('Data gagal diubah!');
		document.location.href = 'index.php?page=list_hewan';
		</script>";

	}

	echo "<script>
	alert('Data Berhasil diubah!');
	document.location.href = 'index.php?page=list_hewan';
	</script>";



} 

// show data post comment

function showPostComment($opsi)	{

	global $conn;
	global $id; 
	
	if ($opsi == 'all') {
		
		$query 	=  "SELECT PC.idPost AS 'IP', PC.idComment AS 'idcmnt',PC.pict AS 'cPict',PC.tgl AS 'cTgl',PC.ket AS 'cKet',USR.nama,USR.email,USR.alamat,USR.telp,PL.id_user
					FROM postcomment  AS PC
					JOIN user AS USR ON PC.id_user = USR.id
					JOIN postlost AS PL ON PC.idPost = PL.idPost
					WHERE PL.id_user = '$id'" ;

		$result	= mysqli_query($conn,$query);
		if (!$result) {
			$rows = mysqli_error($conn);
			echo($rows);
		}
		$rows	= [];

		while ($row = mysqli_fetch_assoc($result)) {

			$rows[] = $row;
		}
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

function deleteAdopt($aksiid)	{
	
	global $conn;

	$aksi 	 = $aksiid['action'];
	$idAdopt	 = $aksiid['id'];


	$query 			= "SELECT pict FROM postadopt WHERE idAdopt = '$idAdopt'";
	$result			= mysqli_query($conn,$query);
	$row 			= mysqli_fetch_assoc($result);

	$query2 		= "DELETE FROM postadopt WHERE idAdopt = '$idAdopt'";
	$result2		=  mysqli_query($conn,$query2);

	$query3 		= "DELETE FROM requestadopt WHERE idAdopt = '$idAdopt'";
	$result3		=  mysqli_query($conn,$query3);

	if (!$result3) {
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
?>