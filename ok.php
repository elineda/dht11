<?php


  $ecrit = file_get_contents('php://input');
  $fichier=fopen("data.json","w");
  fwrite($fichier,$ecrit);
  fclose($fichier);



 ?>
