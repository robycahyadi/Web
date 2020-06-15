<?php
	include '../koneksi.php';

	$uid		= $_GET['uid'];
	$tgltest	= $_GET['tgltest'];
	$c1 		= (int)$_POST['c1'];
	$c2			= (int)$_POST['c2'];
	$c3			= (int)$_POST['c3'];
	$c4			= (int)$_POST['c4'];
	$c5			= (int)$_POST['c5'];

	

	/*$query = mysqli_query($koneksi,"INSERT INTO h_test (`user_id`,`c1`,`c2`,`c3`,`c4`,`c5`,`tanggal_test`) VALUES ('$uid','c1','c2','c3','c4','c5','$tgltest'");*/
	if (!$result=  mysqli_query($koneksi, "INSERT INTO h_test (`user_id`,c1,c2,c3,c4,c5,`tanggal_test`) VALUES ('$uid','$c1','$c2','$c3','$c4','$c5','$tgltest')")){
                        die('Error:'.mysqli_error($koneksi));
                    }

    header("location:index.php?page=p_test");
	/*echo $uid;
	echo "</br>";
	echo $tgltest;
	echo "</br>";
	echo $c1;
	echo "</br>";
	echo $c2;
	echo "</br>";
	echo $c3;
	echo "</br>";
	echo $c4;
	echo "</br>";
	echo $c5;
	echo "</br>";*/
	

?>