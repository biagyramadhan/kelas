<?php
require 'koneksi.php';
session_start();
if (!isset($_SESSION["admin"])) {
  header("location:index.php");
  exit;
}
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
    <title>List Blokir</title>
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
      <?php
      $result2 = mysqli_query($koneksi,"SELECT * FROM user WHERE status = 'Blokir'");
       ?>
          <h1 class="flow-text center">Daftar User Blokir</h1>
              <table class="table highlight responsive-table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Status</th>
                    <th scope="col">Level</th>
                    <th scope="col">Pengaturan</th>
                  </tr>
                </thead>
                <?php $i = 1; ?>
                <?php foreach ($result2 as $user): ?>
                <tbody>
                  <tr>
                    <th scope="row"><?=  $i; ?></th>
                    <td><?= $user["nama"]; ?></td>
                    <td><?= $user["username"]; ?></td>
                    <td><?= $user["email"]; ?></td>
                    <td><?= $user["status"]; ?></td>
                    <td><?= $user["level"]; ?></td>
                    <?php
                    if ($user["level"] == 'Admin') {
                      echo "<td>Disabled</td>";
                    } else {
                    ?>
                    <td> <a href="konfirmasi.php?id=<?= $user['id'];?>" class="btn cyan accent-2 black-text waves-effect">Aktifkan</a> |
                         <a href="hapus.php?id=<?= $user['id'];?>" class="btn red waves-effect">Hapus</a> </td>
                    <?php } ?>
                  </tr>
                </tbody>
                <?php $i++; ?>
                <?php endforeach; ?>
              </table>
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
