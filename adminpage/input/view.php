<?php
  $Manga = $obj->View_Manga($_GET['manga']);
?>
<form method="post" action="handler.php">
<div class="adminbodybg row">
  <div class="col-md-12">
<br>
    <div>
      <a href="../adminpage" class="close">&times;</a>
    </div>
    <h3>
    <?php echo $Manga['name']; ?>
    </h3>
</div>


  <div class="col-md-4" style="padding-top:10px;background-color:#f0f0f0;bottom-padding:50px;">
    <h5 style="font-weight:bold">Mangaka :<br></h5>
    <input type="name" name="mangaka" value="<?php echo $Manga['mangaka']; ?>">
    <h5 style="font-weight:bold">Publised Date :<br></h5>
    <input type="name" name="publish" value="<?php echo "24-12-2004"; ?>">
    <h5 style="font-weight:bold">Score :<br></h5>
    <input type="name" name="score" value="<?php echo 7.0 ?>">
    <br>
    <br>

    <a href="?page=chapter&manga=<?php echo $Manga['id']?>" class="btn btn-success">Manage Chapter</a><br><br>
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Genre</button>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Genre</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
<?php
  $res = $obj->Fetch_Genre();
  while($a = $res->fetch_assoc()){
    echo "<div class='form-check'>";
    echo "<label class='form-check-label'>";
    echo "<input class='form-check-input' type='checkbox' name='genre[]' value='".$a['genre_id']."' />".$a['genre']."<br>";
    echo "</label></div>";
  }
?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    <input type="submit" name="Edit" class="btn btn-danger"value="Save">
  </div>

  <div class="col-md-8">
<h4>Synopsis</h4>
    <textarea rows="15" class="sinopsis" name="sinopsis">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</textarea>
  </div>
</div>
</form>
