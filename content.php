<?php
if(isset($_GET['page'])){
  $page = $_GET['page'];

  switch($page){
  case 'read':
    include "read.php";
      break;
  }
}
else {
  include "front/land.php";
}
?>
