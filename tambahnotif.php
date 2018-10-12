<?php
require 'koneksi.php';
session_start();
if (!isset($_SESSION["login"])) {
  header("location:login.php");
  exit;
}
if (!isset($_SESSION["admin"])) {
  header("location:index.php");
  exit;
}
$dbuser = $_SESSION["nama"];
$result = mysqli_query($koneksi,"SELECT * FROM user WHERE nama = '$dbuser'");
$result = mysqli_fetch_assoc($result);
 ?>
<!doctype html>
<html lang="en">
  <head>
    <title>Tambah Tutorial</title>
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

   <div class="container">
         <h1 class="flow-text center">Tambah Notifikasi</h1>
         <form method="post" action="">
           <div class="row">

             <div class="input-field">
               <i class="material-icons prefix">account_circle</i>
               <input id="icon_prefix2" type="text" class="validate" name="namee" required>
               <label for="icon_prefix2">Nama</label>
             </div><br>

             <div class="input-field">
               <i class="material-icons prefix">edit</i>
               <input id="icon_prefix2" type="text" class="validate" name="judul" required>
               <label for="icon_prefix2">Judul</label>
             </div><br>

             <div class="input-field">
               <i class="material-icons prefix">border_color</i>
               <input id="icon_prefix1" type="text" class="validate" name="isi" required>
               <label for="icon_prefix1">Deskripsi</label>
             </div>

           <button type="submit" class="btn waves-effect" name="tambah">Tambah Notifikasi !</button>
         </form>
         <?php
          if (isset($_POST["tambah"])) {
            $nama = $_POST["namee"];
            $judul = $_POST["judul"];
            $isi = $_POST["isi"];

            $kuery = "INSERT INTO notifikasi VALUES ('','$nama','$judul','$isi')";
            if (mysqli_query($koneksi,$kuery)) {
              echo "<script>alert('Notifikasi Berhasil Di Tambahkan !');</script>";
              echo "<script>document.location.href = 'index.php';</script>";
            }

          }
          ?>
      </main>

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
      $('select').formSelect();
    });
    </script>
  </body>
</html>
