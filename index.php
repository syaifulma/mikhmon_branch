<!DOCTYPE html>
<html>
<head>
	<style type="text/css" media="screen">
		body {
	 background-image: url("paper.gif");
	 background-color: #cccccc;
	}
	</style>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<title>USER CABANG IFUL.NET</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body style="background-image: url('images/bg-blur2.jpg');
      height: 100vh">

	
 



	<div class=" w-100 mh-100" style="height: 1000px">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-5 bg-light mt-5 px-5">
					<br>
					<h3><center>Silahkan Masuk</center></h3>
					<form action="cek_login.php" method="post" class="p-4" accept-charset="utf-8">
						<div class="form-group">
							<input type="text" name="txtuser" class="form-control form-control-lg" placeholder="Username" required>
						</div>
						<div class="form-group" style="padding-top: 5px;padding-bottom: 20px;">
							<input type="password" name="txtpass" class="form-control form-control-lg" placeholder="Password" required>
						</div>
						<div class="form-group">
							<input style="width: 100%" type="submit" name="login" class="btn btn-danger btn-block">
						</div>
						<?php 
						if(isset($_GET['pesan'])){
							if($_GET['pesan']=="gagal"){
								echo "<p class='alert'>Username dan Password tidak sesuai !</p>";
							}
						}
						?>
						<h4 class="text-center text-danger"></h4>

						<h6 class="text-center"> <br><u><i>Developed By</i></u><br> Syaiful MA - 087774742500</h6>

					</form>
				</div>
			</div>
		</div>

	</div>
	
</body>
</html>