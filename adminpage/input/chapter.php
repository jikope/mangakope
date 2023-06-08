<?php
    $id = $_GET['manga'];
    $ch = $obj->Fetch_Chapter($id);
?>
<div class="adminbodybg">

<div class="row container">
  <div class="col-md-6">
    <h3>Chapter Management</h3>
  </div>
  <div class="col-md-6">
  <a class="link-right" href="?page=chadd&manga=<?php echo $id?>" ><button type="button" class="btn btn-danger">Add Chapter</button></a>
  </div>
</div>

<table class="table table-hover">
  <thead class="thead-light">
    <th>Chapter</th>
    <th>Location</th>
  </thead>
  <tbody>
<?php
    $row = $ch->num_rows;
    while($o = $ch->fetch_assoc()){
    echo "<tr class='row-link' data-href='../Manga/".$o['Location']."'>";
    echo "<td>";
    echo $o['Chapter'];
    echo "</td>";
    echo "<td>".$o['Location']."</td>";
    echo "</tr>"; 
    }
?>
  </tbody>
</table>
</div>
<script>
jQuery(document).ready(function($) {
    $(".row-link").click(function() {
        window.location = $(this).data("href");
    });
});
</script>
