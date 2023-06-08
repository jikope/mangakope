<?php
$obj = new Admin();
//$Genre = $obj->Fetch_Genre();
$getid = $obj->getPrevRecord();
?>
<div style="color:white;">
<form enctype="multipart/form-data" method="POST" class="" action="handler.php">
  Manga :<input class="form-control" type="name" name="Manga" /><br>
  Mangaka :<input class="form-control" type="name" name="Mangaka" /></br>
  Cover : <input class="form-control" type="file" name="Cover" /><br>
  <input type="hidden" name="getid" value="<?php echo $getid?>" />
  <?php
  /*while($G = $Genre->fetch_assoc()){
    echo "<div class='form-check'>";
    echo "<label class='form-check-label'>";
    echo "<input type='checkbox' class='form-check-input' name='genre[]' value='".$G['genre_id']."' />".$G['genre']."<br>";
    echo "</label></div>";
}*/
?>
<input type="submit" class="btn btn-danger" name="Add" value="Add Manga" />
</form>
</div>
