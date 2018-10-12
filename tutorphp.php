<?php
require 'koneksi.php';
session_start();
if (!isset($_SESSION["login"])) {
  header("location:login.php");
  exit;
}
$dbuser = $_SESSION["nama"];
$result = mysqli_query($koneksi,"SELECT * FROM user WHERE nama = '$dbuser'");
$result = mysqli_fetch_assoc($result);
 ?>
<!doctype html>
<html lang="en">
  <head>
    <title>List Tutorial PHP</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="css/materialize.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  </head>
  <body>
  <?php
    require 'css/menu.php';
  ?>
  <?php
  $html = "SELECT * FROM tutorhtml WHERE pilihan = 'PHP'";
  $htmli = mysqli_query($koneksi,$html);
   ?>

     <div class="container">
       <h1 class="flow-text center">Tutorial PHP MYSQLI</h1>
       <div class="row">
         <?php foreach ($htmli as $htmlii): ?>
         <div class="col s12 m6 13">
           <div class="card">
             <div class="video-container">
               <iframe width="400" height="400" src="<?= $htmlii['link']; ?>" frameborder="0" allowfullscreen></iframe>
             </div>
             <div class="card-content">
               <span class="card-title"><?= $htmlii['judul']; ?></span>
               <p><?= $htmlii["deskripsi"]; ?></p>
             </div>
           </div>
         </div>
       <?php endforeach; ?>
       </div>
     </div>


    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="css/materialize.min.js"></script>
    <script>
    $(document).ready(function(){
      $('.sidenav').sidenav();
    });
    $(document).ready(function(){
     $('.collapsible').collapsible();
     });
     $(document).ready(function(){
      $('.materialboxed').materialbox();
    });
    </script>
  </body>
</html>
