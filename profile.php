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
    <title>Hello, world!</title>
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

        <h1 class="flow-text center">Profile</h1>
        <form method="post" action="">
          <div class="input-field">
            <i class="material-icons prefix">face</i>
            <input id="icon_prefix3" type="text" class="validate" name="nama" value="<?= $result['nama']; ?>" required>
            <label for="icon_prefix3">Nama Lengkap</label>
          </div><br>

          <div class="input-field">
            <i class="material-icons prefix">email</i>
            <input id="icon_prefix2" type="email" class="validate" name="email" value="<?= $result['email']; ?>" required>
            <label for="icon_prefix2">Email</label>
          </div><br>

          <div class="input-field">
            <i class="material-icons prefix">phone</i>
            <input id="icon_prefix1" type="number" class="validate" name="nohp" value="<?= $result['no_hp']; ?>" data-length="13" required>
            <label for="icon_prefix1">No HP</label>
          </div><br>
          <button type="submit" class="btn btn-success" name="ubah">Ubah Data !</button>
        </form>

        <?php
        if (isset($_POST["ubah"])) {
          $nama = $_POST["nama"];
          $email = $_POST["email"];
          $nohp = $_POST['nohp'];
          $id = $_POST["id"];

          $query = "UPDATE user SET nama = '$nama',email = '$email', no_hp = '$nohp' WHERE id = $id";
          if (mysqli_query($koneksi,$query)) {
            echo "<script>alert('Data Berhasil Di Ubah !');</script>";
            echo "<script>document.location.href = 'index.php';</script>";
            exit;
          }
        }
         ?>

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
       $(document).ready(function() {
      $('input#input_text, textarea#textarea2').characterCounter();
    });
    </script>
  </body>
</html>
