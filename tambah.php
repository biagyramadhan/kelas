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

      <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
          <h1 class="flow-text center">Tambah Admin</h1>
          <form method="post" action="">
            <div class="row">
              <div class="input-field">
                <i class="material-icons prefix">face</i>
                <input id="icon_prefix3" type="text" class="validate" name="nama" required>
                <label for="icon_prefix3">Nama Lengkap</label>
              </div>

              <div class="input-field">
                <i class="material-icons prefix">email</i>
                <input id="icon_prefix2" type="email" class="validate" name="email" required>
                <label for="icon_prefix2">Email</label>
              </div>

              <div class="input-field">
                <i class="material-icons prefix">phone</i>
                <input id="icon_prefix1" type="number" class="validate" name="nohp" required>
                <label for="icon_prefix1">No HP</label>
              </div>

              <div class="input-field">
                <i class="material-icons prefix">account_circle</i>
                <input id="icon_prefix" type="text" class="validate" name="username" required>
                <label for="icon_prefix">Username</label>
              </div>

              <div class="input-field">
                <i class="material-icons prefix">vpn_key</i>
                <input id="icon_prefix4" type="password" class="validate" name="password" required>
                <label for="icon_prefix4">Password</label>
              </div>

              <div class="input-field">
                <i class="material-icons prefix">vpn_key</i>
                <input id="icon_prefix5" type="password" class="validate" name="password2" required>
                <label for="icon_prefix5">Konfirmasi Password</label>
              </div>
            <button type="submit" class="btn waves-effect" name="tambah">Tambah Admin !</button>
          </form>
          <?php
          if (isset($_POST["tambah"])) {
            $nama = $_POST["nama"];
            $email = $_POST["email"];
            $username = $_POST["username"];
            $password = $_POST["password"];
            $password2 = $_POST["password2"];
            $nohp = $_POST["nohp"];
            $status = "Pending";
            $level = "Admin";

            $result = mysqli_query($koneksi,"SELECT username FROM user WHERE username = '$username'");

            if (mysqli_num_rows($result) < 1) {

              $rows = mysqli_fetch_assoc($result);

              if ($password == $password2) {
                $password = password_hash($password,PASSWORD_DEFAULT);
                $query = "INSERT INTO user VALUES ('','$nama','$username','$email','$password','$status','$level','$nohp')";

                if (mysqli_query($koneksi,$query)) {
                  echo "<script>alert('Anda Berhasil Mendaftarkan Admin !');</script>";
                }

              } else {
                echo "<script>alert('Password Tidak Sama !')</script>";
              }

            } else {
              echo "<script>alert('Username Telah Terpakai !')</script>";
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
    </script>
  </body>
</html>
