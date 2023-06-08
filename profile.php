<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Manga</title>
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../style.css">
  <link rel="stylesheet" href="../../style2.css">
</head>
<body class="bodybg">
<?php 
  include_once "../../class.php";
  include_once "../../nav.php";
  $obj = new User();
  $o = $obj->Manga_Profile(Replace_id);
?>
  <br>
  <div class="container">
  <div class="shadow">
    <div class="row container">
      <div class="col-xs-12 col-md-4">
      <img src="../../cover/<?php echo $o['cover'];?>" class="cover center"/>
        <h5 class="judul">Artist :  <?php echo $o['mangaka'];?></h5>
      </div>
      <div class="col-xs-12 col-md-8">
       <h3 class="judul"><?php echo $o['name'];?></h3>    
        <h4>Sinopsis :</h4>
        <p><?php echo $o['sinopsis']?> </p>
      </div>
      <div class="col-xs-12 col-md-12 judul">
      <table class="table table-hover">
<?php
  $Ch = $obj->Fetch_Chapter(Replace_id);
  while($list = $Ch->fetch_assoc()){
?>
      <tr>
      <td><a href="<?php echo "../".$list['Location'];?>" ><?php echo $list['Chapter']?>
      </a>  
      </td>
      </tr>
<?php
  }
?>
      </table>
      </div>
    </div>
  </div>
  </div>
</body>
</html>
