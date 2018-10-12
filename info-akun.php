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
    <title>Informasi Akun</title>
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

        <h1 class="flow-text center">Pengaturan Akun</h1>

        <form method="post" action="">

          <input type="hidden" name="id" value="<?= $result['id']; ?>">

          <div class="input-field">
            <i class="material-icons prefix">face</i>
            <input id="icon_prefix3" type="text" class="validate" name="username" value="<?= $result['username']; ?>" required>
            <label for="icon_prefix3">Username</label>
          </div><br>

          <div class="input-field">
            <i class="material-icons prefix">people_outline</i>
            <input id="icon_prefix1" type="password" class="validate" name="password" required>
            <label for="icon_prefix1">Password Lama</label>
          </div><br>

          <div class="input-field">
            <i class="material-icons prefix">vpn_key</i>
            <input id="icon_prefix4" type="password" class="validate" name="password1" required>
            <label for="icon_prefix4">Password Baru</label>
          </div><br>

          <div class="input-field">
            <i class="material-icons prefix">vpn_key</i>
            <input id="icon_prefix5" type="password" class="validate" name="password2" required>
            <label for="icon_prefix5">Ulangi Password</label>
          </div><br>
          <button type="submit" class="btn waves-effect" name="ubah">Ubah Data !</button>
        </form>

        <?php
        if (isset($_POST["ubah"])) {
          $username = $_POST["username"];
          $password = $_POST["password"];
          $password1 = $_POST["password1"];
          $password2 = $_POST["password2"];
          $id = $_POST["id"];

          if (password_verify($password,$result["password"])) {
            if ($password1 == $password2) {
              $password1 = password_hash($password1,PASSWORD_DEFAULT);
              $query = "UPDATE user SET username = '$username',password = '$password1' WHERE id = $id";
              if (mysqli_query($koneksi,$query)) {
                echo "<script>alert('Data Berhasil Di Ubah !');</script>";
                echo "<script>document.location.href = 'info-akun.php';</script>";
                exit;
              }
            } else {
              echo "<script>alert('Password Tidak Sama !');</script>";
            }
          } else {
            echo "<script>alert('Password Salah !');</script>";
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
     $(document).ready(function(){
       $('.modal').modal();
     });
    </script>
  </body>
</html>
