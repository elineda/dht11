<?php
if (isset($_POST["temperature"])) {
  echo $_POST["temperature"];
  $fichier=fopen("data.json","w");
  $ecrit='{"temperature":"'.$_POST["temperature"].'","humidite":"45"}';
  fwrite($fichier,$ecrit);
  fclose($fichier);
}
else {
  echo "Connard";
}


 ?>
