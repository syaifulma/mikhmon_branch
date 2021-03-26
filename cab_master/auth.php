<?php 
	session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	//RUBAH DISINI

	if(($_SESSION['user_type']!="masters")){
	session_destroy();
		header("location:../index.php?pesan=gagal");
	}
 	
 	error_reporting(0);
	?>