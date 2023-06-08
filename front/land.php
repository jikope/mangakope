<div class="main bodybg">
  <div class="container">
      <br>
    <div class="row">
<?php
  $Res = $obj->Front();
  while($o = $Res->fetch_assoc()){
?>
      <div class="col-xs-12 col-md-4">
        <div class="card" >
          <a href="Manga/<?php echo $o['dir'];?>">

          <img src="cover/<?php echo $o['cover'];?>" style="width:100%;height:300px"/>
         <div class="card-footer card-text">
          <?php echo $o['name']?>
         </div>
          </a>
        </div>
      </div>
<?php
  }
?>
      </div>
   </div>

