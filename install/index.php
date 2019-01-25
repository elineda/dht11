<?php

require 'model/identifiant.php';
require 'model/connectdb.php';
require 'model/testtable.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Termotuturu</title>
    <link rel="stylesheet" href="main.css" />
  </head>
  <body>

<?php


if (!$host){

  require 'view/emptyview.php';
 echo $content;

}

else {
  $con=mysqli_connect($host,$username,$password,$dbname);

  $test=test($con);
  if (is_null($test)) {
    require 'model/install.php';
    install($con);
      echo "<script>window.location = 'http://elineda.ovh/dht11/install/'</script>";
  }
  else  {

      echo "tout est deja installé vi";
  }
}



?>

  </body>
</html>
