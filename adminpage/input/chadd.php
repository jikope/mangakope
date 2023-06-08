<?php
$Mangaid = $_GET['manga'];
$a = $obj->View_Manga($Mangaid);
?>
<div style="color:white">
<form method="POST" action="handler.php" enctype="multipart/form-data">
  <h4>Chapter Name :</h4><input type="text" name="Chapter" class="form-control" /><br>
  <h4>Chapter :</h4><input type="text" name="Number" class="form-control" /><br>
  <h4>Location:</h4><input type="file" name="Location" />
   Image Size :
  <select class="btn" name="size">
    <option value="Wide">Wide</option>
    <option value="Normal">Normal</option>
  </select>
  <br>
  <input type="hidden" name="Mangaid" value="<?php echo $Mangaid?>" />
  <input type="hidden" name="DirName" value="<?php echo $a['dir'];?>" />
  <input type="submit" name="Chadd" value="Add" class="btn btn-danger" />
</form>
</div>
