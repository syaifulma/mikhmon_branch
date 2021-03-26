<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="refresh" content="60; url="<?php echo $_SERVER['PHP_SELF']; ?>">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>User Lists</title>
  <link rel="stylesheet" href="">
  <link rel="stylesheet" href="../css/bootstrap.min.css">

</head>
<body>


<?php

include ('navbar_start.php');

require('../API/routeros_api.class.php');
//Rubah disini
require ('auth.php');


$API = new RouterosAPI();

//$API->debug = true;

if ($API->connect('192.168.76.1', 'tamu', 't4mu')) {

   //echo "<a style='display:none'>";
   
  $getprofile = $API->comm("/ip/hotspot/user/profile/print");
  $srvlist = $API->comm("/ip/hotspot/print");

  $ARRAY = $API->comm("/ip/hotspot/user/print", false);
   //echo "</p>";
    


   
   echo "<br>
  <div> 
  <div class='input-group mb-3'>
    <div class='input-group-prepend'>
    <span class='input-group-text' id='basic-addon1'>K-</span>
    </div>
    <input type='text' class='form-control' placeholder='Tulis Kode Voucher Bebas' aria-label='Username' aria-describedby='basic-addon1'>
  </div>

    <div class='input-group mb-3'>
    <div class='input-group-prepend'>
    <!--<span class='input-group-text' id='basic-addon1'>Nama </span>-->
    </div>
    <input type='text' class='form-control' placeholder='Tulis Namamu' aria-label='Username' aria-describedby='basic-addon1'>
  </div>

    <button type='button' class='container-fluid btn btn-primary btn-lg btn-block'>HASILKAN</button>
</div>


   ";






   echo "<div style='align-text;padding:10px 10px;font-size:20px;'>Terpakai : <b><i>".count($jml_sudah)."</b> Voucher </i>
   <br> Belum Terpakai : <b><i>".count($jml_belum)."</b> Voucher</i>"."<hr></div>";
   //$pagef5 = $_SERVER['PHP_SELF'];
   //echo "<div style='margin:center;margin-left:20px' class=' navbar sticky-top align-self-center'><a href=\"$pagef5\"><center><h5><button type='button' class='btn btn-info'>Refresh Halaman</button></center></h5></a></div>";
}

$API->disconnect();





include ('navbar_end.php');
?>

</body>
</html>
