<?php

require __DIR__.'/../../vendor/autoload.php';

use DHT\model\Dbtakeread as Dbtakeread;

$dbtakeread= new Dbtakeread;

$temp=$dbtakeread->readTemp();

$tuturu=new \DHT\view\Tuturu('Temperature');

$tuturu->setTemp($temp);


$tuturu->addBody('thermobody');



$tuturu->showPage();
