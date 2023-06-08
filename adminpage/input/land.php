<div class="adminbodybg">
<div class="row container">
<div class="col-md-6">

<h3>Manga Lists</h3>
</div>
<div class="col-md-6">
<a class="link-right" href="?page=add" ><button type="button" class="btn btn-danger">ADD</button></a>
</div>
</div>

<table class="table table-hover">
  <thead class="thead-light">
    <th>Manga</th>
    <th>Mangaka</th>
  </thead>
  <tbody>
<?php
  $ob = $obj->Fetch_Manga();
  while($o = $ob->fetch_assoc()){
    echo "<tr class='row-link' data-href='?page=view&manga=".$o['id']."'>";
    echo "<td>";
    echo $o['name']."</td>";
    echo "<td>".$o['mangaka']."</td>";
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
