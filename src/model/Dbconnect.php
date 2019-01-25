<?php
namespace DHT\model;


class Dbconnect{

  protected function dbConnect(){
    require __DIR__.'/../../okindentifiant.php';
    $bdd = new \PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    return $bdd;

  }


}




 ?>
