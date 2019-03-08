<?php




if (isset($_GET['w'])){
 include __DIR__ . '/src/controller/'.$_GET['w'].'.php';
}
 else{
  include __DIR__.'/src/controller/readController.php';

 }
