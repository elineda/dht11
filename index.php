<?php




if (isset($_GET['ok'])){
 include __DIR__ . '/src/controller/takeController.php';
}
 else{
  include __DIR__.'/src/controller/readController.php';

 }
