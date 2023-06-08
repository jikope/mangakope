<?php
  include_once "../../../class.php";
  $obj = new User();
?>
<html>
  <head>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Manga</title>
  <link rel="stylesheet" href="../../../bootstrap/css/bootstrap.min.css">
  <script src="../../../bootstrap/js/jquery.min.js"></script>
  <script src="../../../bootstrap/js/popper.min.js"></script>
  <script src="../../../bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../../../style.css">

     <script> 
    function changeLink(value){
      window.location.href="../../"+value;
    }
    </script> 

  </head>
  <body class="bodybg">
  <div class="navi">
    <nav class="navbar navbar-expand-sm static-top navbg">
      <a class="navbar-brand IconLink" href="#">ICON</a>
      <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a class="navlink">Link </a></li>
        <li class="nav-item"><a class="navlink">Link </a></li>
      </ul>
      </div>
    </nav>
  </div>
    
    <div class="container">
      <br>
      <div class="title">
        <h2>Replace_Nama</h2>
        <h4>Replace_Chapter</h4>
        <div class="row">
<?php 
  $Result = $obj->Fetch_Chapter(Replace_id);
  echo "<div class='col-md-8'>";
  echo "<select style='background-color:#0f0f0;' class='form-control' onChange='changeLink(this.value);'>";
  echo "<option selected='selected'>Pilih chapter yang akan dibaca</option>";
  while($o = $Result->fetch_assoc()){
    echo "<option value='".$o['Location']."'>".$o['Chapter']."</option>";
  }
  echo "</select>";
  echo "</div>";
  $obj->Pagination(Replace_id, $obj->GetchId("Replace_Chapter"));

?>
      </div>
    </div>
  </div>

      <br>
      <div class="">        
<?php
  include_once "inc";
?>
      </div>
  <br>
  <div class="row">
<?php
  $obj->Pagination(Replace_id, $obj->GetchId("Replace_Chapter"));
?>
  </div>
    <br>
    <div class="footer">
      <h4>FOOTER</h4>
    </div>
  </body>
</html>
