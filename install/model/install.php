<?php

function install($con){
  require 'connectdb.php';
  require 'identifiant.php';

  $sqlu="CREATE TABLE `temp` (
    `temp` int(11) NOT NULL,
    `humidite` int(11) NOT NULL,
    `daate` varchar(500) NOT NULL
  )";
  $exeu= mysqli_query($con,$sqlu);
  if (!mysqli_query($con,$sqlu)) {
  die('Error: ' . mysqli_error($con));
}
  $file=fopen('identifiant.php', 'a+') or die("Alerte !");
  $txt="\$created = true ;\n";
  fwrite($file,$txt);
  fclose($file);


}



 ?>
