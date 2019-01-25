<?php

namespace DHT\model;

use DHT\model\Temp as Temp;

class Dbtakeread extends Dbconnect{

  public function takeTemp($temperature,$humidite,$date){
    $bdd=$this->dbConnect();
    $req = $bdd->prepare('INSERT INTO temp (temp, humidite, daate)'.'VALUES (:temp, :humidite, :daate)');

    $req->execute(array('temp' => ''.$temperature,
                        'humidite' => ''.$humidite,
                        'daate'=>''.$date));
    $req=null;
    $bdd=null;
  }
  public function readTemp(){
    $bdd=$this->dbConnect();
    $req=$bdd->prepare('SELECT * FROM `temp` ORDER BY `temp`.`daate` DESC LIMIT 1');
    $req->execute();
    $row=$req->fetch();
    $temp= new Temp;
    $temp->temperature=$row['temp'];
    $temp->humidite=$row['humidite'];
    $temp->date=$row['daate'];
    return $temp;
  }
}


 ?>
