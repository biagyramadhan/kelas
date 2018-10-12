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
    <title>Jadwal Pelajaran</title>
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
       <h1 class="flow-text center">Jadwal Pelajaran</h1>
          <table class="striped highlight responsive-table">
            <thead>
              <tr>
                <th scope="col">Senin</th>
                <th scope="col">Selasa</th>
                <th scope="col">Rabu</th>
                <th scope="col">Kamis</th>
                <th scope="col">Jumat</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td scope="col">B. Inggris</td>
                <td scope="col">PPL</td>
                <td scope="col">B. Indonesia</td>
                <td scope="col">PPL</td>
                <td scope="col">PPL</td>
              </tr>
              <tr>
                <td scope="col">B. Inggris</td>
                <td scope="col">MTK</td>
                <td scope="col">PWPB</td>
                <td scope="col">PBO</td>
                <td scope="col">BASDAT</td>
              </tr>
              <tr>
                <td scope="col">PKN</td>
                <td scope="col">PWPB</td>
                <td scope="col">AGAMA</td>
                <td scope="col">PPKWH</td>
                <td scope="col">PENJAS</td>
              </tr>
              <tr>
                <td scope="col">PWPB</td>
                <td scope="col">MTK</td>
                <td scope="col">PBO</td>
                <td scope="col">KWH</td>
                <td scope="col">BASDAT</td>
              </tr>
              <tr>
                <td scope="col">-</td>
                <td scope="col">B. Indonesia</td>
                <td scope="col">PPL</td>
                <td scope="col">BASDAT</td>
                <td scope="col">BASDAT</td>
              </tr>
            </tbody>
          </table>
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
