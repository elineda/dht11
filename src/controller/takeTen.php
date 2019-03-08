<?php

require __DIR__.'/../../vendor/autoload.php';

use DHT\model\Dbtakeread as Dbtakeread;

$dbtakeread= new Dbtakeread;

$val=$dbtakeread->readTenTemp();
header('Content-type: application/json');
echo $val;
