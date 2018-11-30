<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Termotuturu</title>
    <link rel="stylesheet" href="main.css" />
  </head>
  <body>
    <header>
      <img src="tuturu.png"></img>
    </header>
    <main>
      <h1>Température</h1>
<?php
$test=file_get_contents("data.json");
$json_test=json_decode($test, true);
echo "Température : ".$json_test['temperature'];
echo " Humidité : ".$json_test['humidite'];

?>

</main>
    <footer>

    </footer>



<script src="script.js" type="text/javascript"></script>
  </body>
</html>
