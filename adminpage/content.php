<?php
if(isset($_GET['page'])){
  $page = $_GET['page'];

  switch($page){
  case 'add':
    include "input/add.php";
      break; 
  case 'view':
    include "input/view.php";
    break;
  case 'chapter':
    include "input/chapter.php";
    break;
  case 'chadd':
    include "input/chadd.php";
    break;
  }
}
else {
  include "input/land.php";
}
?>
