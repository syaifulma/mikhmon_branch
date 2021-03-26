<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="refresh" content="10" >
  <title>Delete Active</title>
  <link rel="stylesheet" href="">
  <link rel="stylesheet" href="../css/bootstrap.min.css">

</head>
<body>

<?php



if ($_SERVER["REQUEST_METHOD"] == "POST") {

        //include ('navbar_start.php');
    require('../API/routeros_api.class.php');
    require ('auth.php');


    // collect value of input field
    $name = $_POST['fname'];

    if (empty($name)) {
        echo "Name is empty";
    } else {
        $API = new RouterosAPI();
            if ($API->connect('192.168.76.1', 'admin', 'm1kr0t1k')) {

            
          //   echo "<a style='display:none'>";
            //$API->debug = true;
            $id_active = false;
            $id_cookie = false;
            $username = $name;
            //$username = 'ch-mobile';


            $API->write('/ip/hotspot/cookie/print');//CETAK ALL COOKIES
            $cookie = $API->read(); //BACA
            foreach($cookie as $row) if ($row['user'] == $username) $id_cookie = $row['.id'];//TEMUKAN DAN SIMPAN ID cookienya


            $API->write('/ip/hotspot/active/print');//CETAK ALL ACTIVE USER
            $onactive = $API->read(); //BACA 
            foreach($onactive as $row) if ($row['user'] == $username) $id_active = $row['.id']; //TEMUKAN DAN SIMPAN IDnya


            //$API->comm("/ip/hotspot/active/remove", array(".id" => "$id_cookie"));
            $API->comm("/ip/hotspot/active/remove", array(".id" => "$id_active"));
            ?>
            
                <script type='text/javascript'>
                var jsUser = "<?php echo $username; ?>";
                alert(jsUser + ' behasil di matikan');
                window.location.href = 'User_Active_fix.php';
                </script>;

            <?php
          }else{
            echo "string";
          }

      }

        


}
?>
</body>
</html>