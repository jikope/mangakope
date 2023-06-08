<?php
  $Manga = $obj->View_Manga($_GET['manga']);
?>
<div class="row" style="border-radius:25px 0;background-color:white;">
  <div class="col-md-12">
<br>
    <h3>
    <?php echo $Manga['name']; ?>
    </h3>
</div>


  <div class="col-md-4" style="padding-top:10px;background-color:#f0f0f0">
    <h5 style="font-weight:bold">Mangaka :<br></h5><?php echo $Manga['mangaka']; ?><br><br>
    <h5 style="font-weight:bold">Publised Date :<br></h5><?php echo "24-12-2004"; ?><br><br>
    <h5 style="font-weight:bold">Score :<br></h5><?php echo 7.0 ?>
  </div>


  <div class="col-md-8">
<h4>Synopsis</h4>
    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
  </div>
</div>
