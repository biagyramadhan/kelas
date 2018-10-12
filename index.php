













<!-



                                          __  _____   ____  ____  _       ____
                                          \ \/ /_ _| |  _ \|  _ \| |     |___ \
                                           \  / | |  | |_) | |_) | |       __) |
                                           /  \ | |  |  _ <|  __/| |___   / __/
                                          /_/\_\___| |_| \_\_|   |_____| |_____|




  ->



















<?php
session_start();
require 'koneksi.php';
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
    <title>Home</title>
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
  $kuery_notif = mysqli_query($koneksi,"SELECT * FROM notifikasi");
  ?>
  <div class="container">
    <div class="center">
      <h1 class="flow-text">Notifikasi <i class="material-icons">add_alert</i> </h1>
    </div>
    <ul class="collection">
      <li class="collection-item avatar">
        <img src="images/1.png" alt="" class="circle">
        <p><span class="title flow-text"><b>ADMIN</b></span></p>
        <p class="grey-text">Hi User... <i class="material-icons">mood</i> <br> Selamat Datang Di Website XI RPL 2 </p>
        <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
      </li>
      <?php foreach ($kuery_notif as $notif): ?>
        <li class="collection-item avatar">
          <img src="images/1.png" alt="" class="circle">
          <p><span class="title flow-text"><b><?= $notif["nama"]; ?></b></span></p>
          <p class="grey-text"><?= $notif["judul"]; ?><i class="material-icons">mood</i> <br> <?= $notif["isi"]; ?> </p>
          <?php if ($_SESSION["admin"]) { ?>
            <a href="hapusnotif.php?id=<?= $notif['id']; ?>" class="secondary-content"><i class="material-icons">delete</i></a>
          <?php } ?>
        </li>
      <?php endforeach; ?>
    </ul>
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
