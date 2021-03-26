<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="refresh" content="15" >
  <title>User Active</title>
  <link rel="stylesheet" href="">
  <link rel="stylesheet" href="../css/bootstrap.min.css">

</head>
<body>

<?php
include ('navbar_start.php');
require('../API/routeros_api.class.php');
require ('../cab_nawir/auth.php');


$API = new RouterosAPI();

//$API->debug = true;

if ($API->connect('192.168.76.1', 'admin', 'm1kr0t1k')) {

   //echo "<a style='display:none'>";
    
   $ARRAY = $API->comm("/ip/hotspot/active/print", false);
   //echo "</p>";

   echo "<div><br><center><h5>Daftar User yang Sedang Aktif<br></center><center><h5>-- ";
   echo $_SESSION['username'];
   echo " Hotspot --</h5>";
   echo "</center></div>";
   echo "<table style='border:1px; border-color:black;font-size:14px;' id='myTable1' class='table  table-sm' cellspacing='0' width='90%'> 
   		<tr class='bg-warning '>
   		<th scope='col' class='th-sm'>No.</th>
   		<th scope='col' class='th-sm'>User Aktif</th>
         <th scope='col' class='th-sm'>Action</th>
          			
   		</tr>";


   $jml = array();
   $jml_aktif = array();
   $jml_belum = array();
   $x = 0;
   $z = 0;
   foreach ($ARRAY as $key => $value) {
   	//get status by substr
   	$userkey = substr($ARRAY[$x]['user'], 0 ,1);
      $ipkey = substr($ARRAY[$x]['address'], 0 ,10);

   	//$user = substr($ARRAY[$x]['user'], 0 ,2);
   	$user = $ARRAY[$x]['user'];
   	$profile = $ARRAY[$x]['profile'];
   	$comment = $ARRAY[$x]['comment'];
   	$ip = $ARRAY[$x]['address'];

      //SESUAIKAN ATAU RUBAH DISINI
      //if (($userkey == "K")&&($ipkey == "192.168.76")) { 
      if (($userkey == "N")&&($ipkey == "192.168.76")) {  
         $no = 1 + $no;
       	echo "<tr>";
       	echo "<td scope='row'>".$no."</td>";
       	echo "<td scope='row'><b>".$user."</b></td>";
         echo "<td><form action='remove_active.php' method='POST' >
          <input style='display:none;' type='text' name='fname' value=$user>
         <button type='submit' class='btn btn-danger btn-sm'>Matikan</button></form></td>";

        $z= 1 + $z;   
        $jml_aktif[]= $z;
        $jml[] = $no;


      }
    	
    	echo "</tr>"; 	
   $x=$x+1;

   }

   echo "</table>";
   echo "<b>Penting</b>: Jika terjadi masalah saat pindah jaringan, silahkan klik tombol <b>'Matikan'</b> supaya dapat memasukan voucher dan terhubung kembali";



   echo "<div style='align-text;padding:10px 10px;font-size:20px;'><br>Sedang Aktif : <b><i>".count($jml_aktif)."</b> user </i><hr></div>";
   $pagef5 = $_SERVER['PHP_SELF'];
   echo "<div style='margin:center;margin-left:20px' class=' navbar sticky-top align-self-center'><a href=\"$pagef5\"><center><h5><button type='button' class='btn btn-info'>Refresh Halaman</button></center></h5></a></div>";
}

$API->disconnect();
include ('navbar_end.php');
?>




</body>
</html>