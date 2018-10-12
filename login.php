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

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="css/materialize.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=MedievalSharp" rel="stylesheet">
    <script type="text/javascript" src="css/materialize.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  </head>

  <body>

      <form action="" method="post">
        <div class="row">
          <div class="col s12 m4 offset-m4">
            <div class="card">

                <div class="card-action white-text" style="background-color:darkslategrey;">
                  <center><h3 style="font-family: 'MedievalSharp' ,cursive;">Login</h3></center>
                </div><br>

                <div class="card-content">
                  <div class="row">
                    <div class="input-field">
                      <i class="material-icons prefix">account_circle</i>
                      <input id="icon_prefix" type="text" class="validate" name="username" required>
                      <label for="icon_prefix">Username</label>
                    </div>
                  </div>

                  <div class="row">
                    <div class="input-field">
                      <i class="material-icons prefix">vpn_key</i>
                      <input id="icon_prefix2" type="password" class="validate" name="password" required>
                      <label for="icon_prefix2">Password</label>
                    </div>
                  </div>

                    <div class="form-field">
                      <label for="">Tidak Mempunyai Akun? </label> <a href="register.php">Register</a>
                    </div><br>

                    <div class="form-field">
                      <button type="submit" name="login" class="btn-large waves-effect waves-dark" style="background-color:darkslategrey;width:100%;">Login</button>
                    </div>
                  </div>

            </div>
          </div>
        </div>
      </form>

      <?php
      if (isset($_POST["login"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $result = mysqli_query($koneksi,"SELECT * FROM user WHERE username = '$username'");

        if ( mysqli_num_rows($result) === 1) {

          $rows = mysqli_fetch_assoc($result);

          if (password_verify($password,$rows["password"])) {
            if ($rows["status"] ==='Pending') {
              echo "<script>alert('Hubungi Admin Untuk Mengaktifkan Akun Anda!');</script>";
            }else if ($rows["status"] ==='Blokir') {
              echo "<script>alert('Akun Anda Telah Di Blokir!');</script>";
              echo "<script>alert('Hubungi Admin Untuk Mengaktifkan Akun Anda!');</script>";
            }
             else if ($rows["level"] == 'Admin') {
              $_SESSION["username"] = $rows["username"];
              $_SESSION["level"] = "Admin";
              $_SESSION["admin"] = true;
              $_SESSION["login"] = true;
              $_SESSION["nama"] = $rows["nama"];
              $_SESSION["email"] = $rows["email"];
              echo "<script>document.location.href = 'index.php';</script>";
              exit;
            } else if ($rows["level"] == 'User'){
              $_SESSION["username"] = $rows["username"];
              $_SESSION["nama"] = $rows["nama"];
              $_SESSION["login"] = true;
              $_SESSION["admin"] = false;
              $_SESSION["level"] = 'User';
              echo "<script>document.location.href = 'index.php';</script>";
              exit;
            }
          } else {
            echo "<script>alert('Username Or Password Salah !');</script>";
          }

        } else {
          echo "<script>alert('Tidak Ada Username');</script>";
        }

      }
       ?>
  </body>
</html>
