<?php

require __DIR__.'/../../vendor/autoload.php';

use DHT\model\Dbtakeread as Dbtakeread;

$dbtakeread= new Dbtakeread;

$ecrit = file_get_contents('php://input');
$decode=json_decode($ecrit);

if (! $decode) {
  http_response_code(415);
}
elseif (! $decode->temperature || ! $decode->humidite) {
  http_response_code(400);
}
else {

  $daate=date("Y/m/d h:i:sa");
  $temp=$dbtakeread->takeTemp($decode->temperature,$decode->humidite,$daate);


}






 ?>
