<?php
if (isset($_POST["temperature"])) {
  echo $_POST["temperature"];
  $fichier=fopen("data.json","w");
  $ecrit=$_POST["temperature"];
  fwrite($fichier,$ecrit);
  fclose($fichier);
}
else {
  echo "Connard";
}


 ?>
