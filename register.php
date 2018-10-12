<?php
session_start();
require 'koneksi.php';
if (isset($_SESSION["login"])){
  header("location:index.php");
  exit;
}
 ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register</title>
    <link href="https://fonts.googleapis.com/css?family=MedievalSharp" rel="stylesheet">
    <link href="css/materialize.min.css" rel="stylesheet">
    <script type="text/javascript" src="css/materialize.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  </head>

  <body>

    <form action="" method="post">
      <div class="row">
        <div class="col s12 m6 offset-m3">
          <div class="card">

            <div class="card-action white-text" style="background-color:darkslategrey;">
              <center><h4 style="font-family: 'MedievalSharp',cursive;">Registrasi</h4></center>
            </div><br>

            <div class="card-content">
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
                  <input id="icon_prefix1" type="number" class="validate" name="nohp" data-length="13" required>
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

                <div class="form-field">
                  <label for="">Sudah Mempunyai Akun?</label> <a href="login.php">Login</a>
                </div><br>

                <div class="form-field">
                  <button type="submit" name="register" class="btn-large waves-effect waves-dark" style="width:100%;background-color:darkslategrey;">Register</button>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </form>

      <?php
      if (isset($_POST["register"])) {
        $nama = $_POST["nama"];
        $email = $_POST["email"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $password2 = $_POST["password2"];
        $status = "Pending";
        $level = "User";
        $nohp = $_POST["nohp"];

        $result = mysqli_query($koneksi,"SELECT username FROM user WHERE username = '$username'");

        if (mysqli_num_rows($result) === 0) {

          $rows = mysqli_fetch_assoc($result);

          if ($password == $password2) {
            $password = password_hash($password,PASSWORD_DEFAULT);
            $query = "INSERT INTO user VALUES ('','$nama','$username','$email','$password','$status','$level','$nohp')";

            if (mysqli_query($koneksi,$query)) {
              echo "<script>alert('Akun Berhasil Di Daftarkan !');</script>";
              echo "<script>alert('Hubungi Admin Untuk Mengaktifkan Akun Anda !');</script>";
              echo "<script>document.location.href = 'login.php';</script>";
            }

          } else {
            echo "<script>alert('Password Tidak Sama !')</script>";
          }

        } else {
          echo "<script>alert('Username Telah Terpakai !')</script>";
        }

      }
       ?>
       <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
       <script src="css/materialize.min.js"></script>
      <script>
      $(document).ready(function() {
        $('input#input_text, textarea#textarea2').characterCounter();
      });
      </script>
  </body>
</html>
