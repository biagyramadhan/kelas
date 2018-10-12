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
               <h1 class="flow-text center">Tambah Tutorial</h1>
               <form method="post" action="">
                 <div class="row">
                   <div class="input-field">
                     <i class="material-icons prefix">add_to_queue</i>
                     <select name="pilihan">
                       <option disabled selected>PILIH</option>
                       <option value="HTML">HTML</option>
                       <option value="CSS">CSS</option>
                       <option value="PHP">PHP</option>
                     </select>
                     <label>Pilih Tutorial</label>
                   </div><br>

                   <div class="input-field">
                     <i class="material-icons prefix">share</i>
                     <input id="icon_prefix2" type="text" class="validate" name="yt" required>
                     <label for="icon_prefix2">Link YouTube</label>
                   </div><br>

                   <div class="input-field">
                     <i class="material-icons prefix">edit</i>
                     <input id="icon_prefix2" type="text" class="validate" name="judul" required>
                     <label for="icon_prefix2">Judul</label>
                   </div><br>

                   <div class="input-field">
                     <i class="material-icons prefix">border_color</i>
                     <input id="icon_prefix1" type="text" class="validate" name="deskripsi" required>
                     <label for="icon_prefix1">Deskripsi</label>
                   </div>

                 <button type="submit" class="btn waves-effect" name="tambah">Tambah Tutorial !</button>
               </form>
               <?php
                if (isset($_POST["tambah"])) {
                  $pilih = $_POST["pilihan"];
                  $yt = $_POST["yt"];
                  $judul = $_POST["judul"];
                  $deskripsi = $_POST["deskripsi"];

                  $kuery = "INSERT INTO tutorhtml VALUES ('','$judul','$deskripsi','$yt','$pilih')";
                  if (mysqli_query($koneksi,$kuery)) {
                    echo "<script>alert('Tutorial Berhasil Di Tambahkan !');</script>";
                    echo "<script>document.location.href = 'tambahtutor.php';</script>";
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
