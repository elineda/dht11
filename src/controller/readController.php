<?php

require __DIR__.'/../../vendor/autoload.php';

use DHT\model\Dbtakeread as Dbtakeread;

$dbtakeread= new Dbtakeread;

$temp=$dbtakeread->readTemp();

require __DIR__.'/../view/tuturu.php';




 ?>
