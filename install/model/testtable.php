<?php


function test($con){
require 'connectdb.php';
require 'identifiant.php';

$test = array_column(mysqli_fetch_all($con->query('SHOW TABLES')),0);


$s=array_search("temp",$test, TRUE);
echo $s;
return $s;


}

 ?>
