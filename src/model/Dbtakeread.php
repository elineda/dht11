<?php

namespace DHT\model;

use DHT\model\Temp as Temp;

class Dbtakeread extends Dbconnect{

  public function takeTemp($temperature,$humidite,$date){
    $bdd=$this->dbConnect()
    or die('connection pas possible');
    $req = $bdd->prepare('INSERT INTO temp (temp, humidite, daate)'.'VALUES (:temp, :humidite, :daate)');

    $req->execute(array('temp' => ''.$temperature,
                        'humidite' => ''.$humidite,
                        'daate'=>''.$date));
    $req=null;
    $bdd=null;
  }
  public function readTemp(){
      global $error;
    $bdd=$this->dbConnect()
    or die('connection pas possible');
    $req=$bdd->prepare('SELECT * FROM `temp` ORDER BY `temp`.`daate` DESC LIMIT 1');
    if($req->execute()){
    $row=$req->fetch();
    $temp= new Temp;
    $temp->temperature=$row['temp'];
    $temp->humidite=$row['humidite'];
    $temp->date=$row['daate'];
    return $temp;}
    else{
        $error="rapé au niveau de la dbb";
    }
  }
}

