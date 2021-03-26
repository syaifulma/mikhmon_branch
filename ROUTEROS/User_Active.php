<?php

require('routeros_api.class.php');

$API = new RouterosAPI();

//$API->debug = true;

if ($API->connect('192.168.76.1', 'tamu', 't4mu')) {

   echo "<a style='display:none'>";
   	
 
   $ARRAY = $API->comm("/ip/hotspot/active/print", false);
   echo "</a>";
   //$API->write("/ip/hotspot/active/print", false);
   //$ARRAY = $API->read();
   echo "<table style='border:1px;color:black'> <tr><td>No.</td><td>Kode Voucher</td></tr>";
   $x = 0;
   foreach ($ARRAY as $key => $value) {
   	//$user = substr($ARRAY[$x]['user'], 0 ,2);
   	$user = $ARRAY[$x]['user'];
   	$no = $x+1;

 	echo "<tr>";
 	echo "<td>".$no."</td>";
 	echo "<td>".$user."</td>";
 	echo "</tr>"; 	
   $x=$x+1;

   }

   echo "</table>";
}

$API->disconnect();

?>
