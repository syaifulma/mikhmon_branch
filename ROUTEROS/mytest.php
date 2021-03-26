<?php

require('routeros_api.class.php');

$API = new RouterosAPI();

$API->debug = true;

if ($API->connect('192.168.76.1', 'tamu', 't4mu')) {

   //echo "<a style='display:none'>";
    
   $ARRAY = $API->comm("/ip/hotspot/user/print", false);
   //echo "</p>";
   
   echo "<table style='border:1px;color:black'> 
   		<tr>
   			<td>No.</td>
   			<td>Kode Voucher</td>
			<td>Profile</td>
			<td>Komentar</td>
			<td>Status</td>   			
   		</tr>";



   $x = 0;
   foreach ($ARRAY as $key => $value) {
   	//get status by substr
   	$status = substr($ARRAY[$x]['comment'], 0 ,2);

   	//$user = substr($ARRAY[$x]['user'], 0 ,2);
   	$user = $ARRAY[$x]['name'];
   	$profile = $ARRAY[$x]['profile'];
   	$comment = $ARRAY[$x]['comment'];
   	$no = $x+1;

 	echo "<tr>";
 	echo "<td>".$no."</td>";
 	echo "<td>".$user."</td>";
 	echo "<td>".$profile."</td>";
 	echo "<td>".$comment."</td>";
 	if ($status == "up") {
 		echo "<td> Belum Terpakai </td>";
 	}else{
 		echo "<td> Terpakai </td>";
 	}
 	
 	
 	echo "</tr>"; 	
   $x=$x+1;

   }

   echo "</table>";
}

$API->disconnect();

?>
