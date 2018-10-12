














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
    <title>Pesan</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="css/materialize.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style>
      body{
        background: linear-gradient(rgba(0,0,0,0.3),rgba(0, 0, 0, 0.3));
      }
    </style>
  </head>
  <body>

  <?php
  require 'css/menu.php';
  ?>
  <div class="container">
    <?php
    $uname = $result["username"];
    $kuerypesan = mysqli_query($koneksi,"SELECT * FROM pesan WHERE penerima = '$uname'");
     ?>
    <div class="row">
      <div class="col s12 m6 13">
        <div class="card">
          <div class="card-content"><h1 class="flow-text">Pesan Masuk</h1>
            <ul class="collection">
              <?php foreach ($kuerypesan as $tampilpsn): ?>
              <li class="collection-item avatar">
                <img src="images/1.png" alt="" class="circle">
                <span class="title"><?= $tampilpsn['judul']; ?></span>
                <p class="grey-text"><?= $tampilpsn['pengirim'];?> - <?= $tampilpsn['username'];?></p>
                <a href="#<?= $tampilpsn['id']; ?>" class="secondary-content modal-trigger"><i class="material-icons">remove_red_eye</i></a>
              </li>
              <div id="<?= $tampilpsn['id']; ?>" class="modal">
                <div class="modal-content">
                  <ul class="collection">
                    <li class="collection-item avatar">
                      <img class="circle materialboxed" width="650" src="images/1.png">
                      <p class=""><?= $tampilpsn['pengirim'];?></p> <p class="grey-text"><?= $tampilpsn['username'];?></p>
                    </li>
                  </ul>
                  <p><?= $tampilpsn["judul"]; ?></p>
                  <p class="grey-text"><?= $tampilpsn["isi"]; ?></p>
                </div>
                <div class="modal-footer">
                  <a href="#!" class="modal-close waves-effect btn">Kembali</a>
                  <a href="hpspsn.php?id=<?= $tampilpsn['id']; ?>" class="btn waves-effect red white-text">Hapus</a>
                </div>
              </div>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
      </div>

      <div class="col s12 m6 13">
        <div class="card">
          <div class="card-content">
            <h1 class="flow-text">Kirim Pesan</h1>
            <form class="" action="" method="post">
              <input type="hidden" name="nama" value="<?= $result['nama']; ?>">
              <input type="hidden" name="usernamepngrm" value="<?= $result['username']; ?>">
              <div class="input-field">
                <i class="material-icons prefix">account_circle</i>
                <input id="icon_prefix" type="text" class="validate" name="usernamepnrma" required>
                <label for="icon_prefix">Username Penerima</label>
              </div>
              <div class="input-field">
                <i class="material-icons prefix">border_color</i>
                <input id="icon_prefix3" type="text" class="validate" name="jdlpesan" required>
                <label for="icon_prefix3">Judul Pesan</label>
              </div>
              <div class="input-field">
                <i class="material-icons prefix">edit</i>
                <textarea id="icon_prefix" class="materialize-textarea" name="pesan"></textarea>
                <label for="icon_prefix">Tulis Pesan</label>
              </div>
              <div class="center">
                <input type="submit" name="kirim" value="Kirim" class="btn">
              </div>
            </form>
            <?php
            if (isset($_POST["kirim"])) {
              $username = $_POST["usernamepngrm"];
              $pengirim = $_POST["nama"];
              $penerima = $_POST["usernamepnrma"];
              $judul = $_POST["jdlpesan"];
              $pesan = $_POST["pesan"];

              $cekuser = "SELECT * FROM user WHERE username = '$penerima'";
              $cekuser = mysqli_query($koneksi,$cekuser);

              if (mysqli_num_rows($cekuser) > 0) {
                $insert = "INSERT INTO pesan VALUES ('','$username','$judul','$pesan','$pengirim','$penerima')";
                if (mysqli_query($koneksi,$insert)) {
                  echo "<script>alert('Pesan Berhasil Di Kirim !');</script>";
                  echo "<script>document.location.href = 'pesan.php';</script>";
                }
              } else {
                echo "<script>alert('Username Tidak Tersedia !');</script>";
                echo "<script>document.location.href = 'pesan.php';</script>";
              }
            }
             ?>
          </div>
        </div>
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
    $(document).ready(function(){
    $('.modal').modal();
    });
    </script>
  </body>
</html>
