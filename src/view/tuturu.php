
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Termotuturu</title>
    <link rel="stylesheet" href="/dht11/main.css" />
</head>
<body>
<header>
    <img alt="tuturu" src="tuturu.png" />
</header>
<h1>Température </h1>
<?php




echo "Température : ".$temp->temperature;
echo " Humidité : ".$temp->humidite;
echo "<br> La date est : ".date("d M y");


echo "<br>Dernière modification le ".$temp->date;

$tempInt=(int)$temp->temperature;
$height=($tempInt/50*195)+160;
$top=(($tempInt+30)*4)*-1+435;

?>
<br>
<img alt="rien" src="thermometer.jpg" id="termo"><div class="rouge" style=<?="\"height:".$height."px; top:".$top."px;\"";

?>></div>
<footer>

</footer>



<script src="script.js" type="text/javascript"></script>
</body>
</html>