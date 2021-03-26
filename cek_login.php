<?php 

// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include 'koneksi.php';
 
// menangkap data yang dikirim dari form login
$username = $_POST['txtuser'];
$password = $_POST['txtpass'];
 
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"select * from users where username='$username' and password='$password'");


// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

//echo $cek;

// cek apakah username dan password di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
 	
 	$usertype = $data['user_type'];
	
	switch ($data['user_type']) {
		case 'kenji':
			# code...
			// buat session login dan username
			$_SESSION['username'] = $username;
			$_SESSION['user_type'] = "kenji";
			// alihkan ke halaman dashboard admin
			header("location:cab_kenji/index.php");
			break;


		case 'nawir':
			# code...
			// buat session login dan username
			$_SESSION['username'] = $username;
			$_SESSION['user_type'] = "nawir";
			// alihkan ke halaman dashboard admin
			header("location:cab_nawir/index.php");
			break;


		case 'masters':
			# code...
				// buat session login dan username
			$_SESSION['username'] = $username;
			$_SESSION['user_type'] = $usertype;
			// alihkan ke halaman dashboard admin
			header("location:cab_master/index.php");
			break;
		
		default:
			# code...
				// alihkan ke halaman login kembali
			//header("location:index.php?pesan=gagal");
			header("location:out.php");
			break;
	}

}else{
	header("location:index.php?pesan=gagal");
}
 
?>