<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Manga</title>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="adminstyle.css">
  <script src="../bootstrap/js/jquery.min.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <script src="../bootstrap/js/popper.min.js"></script>

</head>
<body style="background-color:#373b43">
  <nav class="navbar navbar-expand-sm static-top navbg">
    <a class="navbar-brand IconLink" href="#">ICON</a>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a class="navlink" href="?page=add">Add</a></li>
        <li class="nav-item"><a class="navlink" href="#"></a></li>
      </ul>
    </div>
  </nav>
  <br>
  <div class="container">
<?php
  include_once "admin.php";
  $obj = new Admin();
  include_once "content.php";
?>
  </div>
</body>
</html>
