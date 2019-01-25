<?php

if (isset($_POST['host'])&isset($_POST['username'])&isset($_POST['password'])&isset($_POST['dbname'])) {
  $file=fopen('identifiant.php', 'w') or die("Alerte !");
  $txt="<?php \$host = '".$_POST['host']."';\n";
  fwrite($file,$txt);
  $txt="\$username = '".$_POST['username']."';\n";
  fwrite($file,$txt);
  $txt="\$password = '".$_POST['password']."';\n";
  fwrite($file,$txt);
  $txt="\$dbname = '".$_POST['dbname']."';\n";
  fwrite($file,$txt);
  $txt="\$empty = false ;\n";
  fwrite($file,$txt);
  $txt="\$created = false ;\n";
  fwrite($file,$txt);
    fclose($file);

  echo "<script>window.location = 'http://elineda.ovh/dht11/install/'</script>";


}


 ?>
