<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="refresh" content="60; url="<?php echo $_SERVER['PHP_SELF']; ?>">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>User Lists</title>
  <link rel="stylesheet" href="">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/jquery.min.js"></script>

</head>
<body>






<?php

include ('navbar_start.php');

?>


<?php
require('../API/routeros_api.class.php');
//Rubah disini
require ('../cab_nawir/auth.php');
$API = new RouterosAPI();


//$API->debug = true;

if ($API->connect('192.168.76.1', 'tamu', 't4mu')) {

   //echo "<a style='display:none'>";
    
   $ARRAY = $API->comm("/ip/hotspot/user/print", false);
   //echo "</p>";
   
   echo "<div><br><center><h5>DAFTAR VOUCHER BELUM KADALUARSA<br>";
   echo " <h5> --- ".$_SESSION['username']."";
   echo " Hotspot ---</h5><hr>";
   echo "</div> <div class='bg-dark' style='color:white'> <center><hr><b>VOUCHER 12-JAM</b></center>";
   echo "</center><hr></div>";
   
   echo "<input class='form-control bg-light' id='myInput' type='text' placeholder='Cari Kode.......' style='margin-bottom:10px;'> ";

   echo "<table style='border:1px; border-color:black;font-size:14px;' id='' class='table  table-sm table-bordered' cellspacing='0' width='90%'> <thead>
   		<tr class='bg-warning '>
   		<th scope='col' class='th-sm'>No.</th>
   		<th scope='col' class='th-sm'>Kode Voucher</th>
			<th scope='col' class='th-sm' onclick='sortTable(0)'>Status</th>
         <th scope='col' class='th-sm'>Profile</th>
			<th scope='col' class='th-sm'>Waktu Habis s/d</th>
			   			
   		</tr> </thead>";


   $jml = array();
   $jml_sudah = array();
   $jml_belum = array();
   $x = 0;
   $z = 0;
   foreach ($ARRAY as $key => $value) {
   	//get status by substr
   	$status = substr($ARRAY[$x]['comment'], 0 ,2);

   	//$user = substr($ARRAY[$x]['user'], 0 ,2);
   	$user = $ARRAY[$x]['name'];
   	$profile = $ARRAY[$x]['profile'];
   	$comment = $ARRAY[$x]['comment'];
   	

      //SESUAIKAN ATAU RUBAH DISINI
      if (($profile == "Nawir-12jam")) { 
         $no = 1 + $no;
       	echo "<tbody id='myTable'>";
        echo "<tr>";
       	
       	if ($status == "up") {
            $z= 1 + $z;
            $jml_belum[]= $z;

            echo "<td scope='row'>".$no."</td>";
            echo "<td scope='row' class=''><b>".$user."</b></td>";
            echo "<td scope='row' class=''> <b>Belum Terpakai</b>  </td>";
            echo "<td scope='row'>".$profile."</td>";
         }else{
            $z= 1 + $z;
            
            $jml_sudah[]= $z;
            echo "<td scope='row' class='table-secondary'>".$no."</td>";
            echo "<td scope='row' class='table-secondary'>".$user."</td>";
            echo "<td scope='row' class='table-secondary'> <del>Terpakai </del></td>";
            echo "<td scope='row' class='table-secondary'><del>".$profile."</del></td>";
         }
         
         if ($status == "up") {
            echo "<td scope='row'>  </td>";
         }else{
       	    echo "<td scope='row' class='table-secondary'>".$comment."</td>";
       	}

         $jml[] = $no;


      }
    	
    	echo "</tr>";
      echo "</tbody>"; 	

   $x=$x+1;

   }

   echo "</table>";
   echo "
          <script>
          $(document).ready(function(){
            $('#myInput').on('keyup', function() {
              var value = $(this).val().toLowerCase();
              $('#myTable tr').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
              });
            });
          });
          </script>";



   echo "<div style='align-text;padding:10px 10px;font-size:20px;'>Terpakai : <b><i>".count($jml_sudah)."</b> Voucher </i>
   <br> Belum Terpakai : <b><i>".count($jml_belum)."</b> Voucher</i>"."<hr></div>";
   //$pagef5 = $_SERVER['PHP_SELF'];
   //echo "<div style='margin:center;margin-left:20px' class=' navbar sticky-top align-self-center'><a href=\"$pagef5\"><center><h5><button type='button' class='btn btn-info'>Refresh Halaman</button></center></h5></a></div>";
}

$API->disconnect();

?>















<?php

$API = new RouterosAPI();

//$API->debug = true;

if ($API->connect('192.168.76.1', 'tamu', 't4mu')) {

   //echo "<a style='display:none'>";
    
   $ARRAY = $API->comm("/ip/hotspot/user/print", false);
   //echo "</p>";
   
   echo " <div class='bg-dark' style='color:white'><center><h5><hr><b>VOUCHER 24-JAM</b><br></center>  <center><h5><hr> </div>";
    echo "<input class='form-control bg-light' id='myInput2' type='text' placeholder='Cari Kode.......' style='margin-bottom:10px;'> ";

   echo "<table style='border:1px; border-color:black;font-size:14px;' id='' class='table  table-sm table-bordered' cellspacing='0' width='90%'> <thead>
      <tr class='bg-warning '>
      <th scope='col' class='th-sm'>No.</th>
      <th scope='col' class='th-sm'>Kode Voucher</th>
      <th scope='col' class='th-sm' onclick='sortTable(0)'>Status</th>
         <th scope='col' class='th-sm'>Profile</th>
      <th scope='col' class='th-sm'>Waktu Habis s/d</th>
              
      </tr> </thead>";


   $jml = array();
   $jml_sudah = array();
   $jml_belum = array();
   $x = 0;
   $z = 0;
   $no=0;
   foreach ($ARRAY as $key => $value) {
    //get status by substr
    $status = substr($ARRAY[$x]['comment'], 0 ,2);

    //$user = substr($ARRAY[$x]['user'], 0 ,2);
    $user = $ARRAY[$x]['name'];
    $profile = $ARRAY[$x]['profile'];
    $comment = $ARRAY[$x]['comment'];
    

      //SESUAIKAN ATAU RUBAH DISINI
      if (($profile == "Nawir-24jam")) { 
         $no = 1 + $no;

        echo "<tbody id='myTable2'>";
        echo "<tr>";
        
        if ($status == "up") {
            $z= 1 + $z;
            $jml_belum[]= $z;

            echo "<td scope='row'>".$no."</td>";
            echo "<td scope='row' class=''><b>".$user."</b></td>";
            echo "<td scope='row' class=''> <b>Belum Terpakai</b>  </td>";
            echo "<td scope='row'>".$profile."</td>";
         }else{
            $z= 1 + $z;
            
            $jml_sudah[]= $z;
            echo "<td scope='row' class='table-secondary'>".$no."</td>";
            echo "<td scope='row' class='table-secondary'>".$user."</td>";
            echo "<td scope='row' class='table-secondary'> <del>Terpakai </del></td>";
            echo "<td scope='row' class='table-secondary'><del>".$profile."</del></td>";
         }
         
         if ($status == "up") {
            echo "<td scope='row'>  </td>";
         }else{
            echo "<td scope='row' class='table-secondary'>".$comment."</td>";
        }

         $jml[] = $no;


      }
      
      echo "</tr><tbody>";   
   $x=$x+1;

   }

   echo "</table>";
   echo "
          <script>
          $(document).ready(function(){
            $('#myInput2').on('keyup', function() {
              var value = $(this).val().toLowerCase();
              $('#myTable2 tr').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
              });
            });
          });
          </script>";


   echo "<div style='align-text;padding:10px 10px;font-size:20px;'>Terpakai : <b><i>".count($jml_sudah)."</b> Voucher </i>
   <br> Belum Terpakai : <b><i>".count($jml_belum)."</b> Voucher</i>"."<hr></div>";
   $pagef5 = $_SERVER['PHP_SELF'];
   echo "<div style='margin:center;margin-left:20px' class=' navbar sticky-top align-self-center'><a href=\"$pagef5\"><center><h5><button type='button' class='btn btn-info'>Refresh Halaman</button></center></h5></a></div>";
}

$API->disconnect();



?>


<?php
include ('navbar_end.php');
?>



</body>
</html>
