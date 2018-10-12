<?php
if (!isset($_SESSION["login"])) {
  header("location:../login.php");
  exit;
}
 ?>
    <link href="https://fonts.googleapis.com/css?family=MedievalSharp" rel="stylesheet">
    <nav class="clay" style="background-color:darkslategray;">
      <div class="nav-wrapper">
        <a href="index.php" class="brand-logo" style="font-family:'MedievalSharp',cursive;"><i>&nbsp;</i>XI RPL 2</a>
      </div>
    </nav>

     <ul id="slide-out" class="sidenav">
       <li><div class="user-view">
         <div class="background">
           <img src="images/3.jpg">
         </div>
         <img class="circle materialboxed" width="650" src="images/1.png">
         <a href="#name"><span class="black-text name"><?= $result["nama"]; ?> - <?= $result["username"]; ?></span> </a>
         <a href="#email"><span class="black-text email"><?= $result["email"]; ?> <?= $result["no_hp"]; ?></span></a>
       </div></li>
       <li><a href="index.php" class="waves-effect"><i class="material-icons">cloud</i>Beranda</a></li>
       <li><a href="pesan.php" class="waves-effect"><i class="material-icons">message</i>Pesan</a></li>
       <li><a href="jadwal_pljrn.php" class="waves-effect"><i class="material-icons">list</i>Jadwal Pelajaran</a></li>

       <!-- Dropdown Structure -->
       <li class="no-padding">
       <ul class="collapsible collapsible-accordion">
         <li><hr>
           <a class="collapsible-header waves-effect">Tutorial Video<i class="material-icons">laptop</i></a>
           <div class="collapsible-body">
             <ul>
               <li><a href="tutorhtml.php">HTML</a></li>
               <li><a href="#">CSS (ComingSoon)</a></li>
               <li><a href="tutorphp.php">PHP</a></li>
             </ul>
           </div>
         </li>
       </ul>
      </li>
      <?php
      if ($_SESSION["level"] === 'Admin') {
      ?>
       <li class="no-padding">
       <ul class="collapsible collapsible-accordion">
         <li><hr>
           <a class="collapsible-header waves-effect">Menu Admin<i class="material-icons">account_circle</i></a>
           <div class="collapsible-body">
             <ul>
               <li><a href="list-user.php">List User</a></li>
               <li><a href="user-blokir.php">List Blokir</a></li>
               <li><a href="konfirmasi-user.php">Konfirmasi User</a></li>
               <li><a href="tambah.php">Tambah Admin</a></li>
               <li><a href="tambahtutor.php">Tambah Tutorial</a></li>
               <li><a href="tambahnotif.php">Tambah Notifikasi</a></li>
             </ul>
           </div>
         </li>
       </ul>
     </li>
    <?php } ?>

     <li class="no-padding">
     <ul class="collapsible collapsible-accordion">
       <li><hr>
         <a class="collapsible-header waves-effect">Pengaturan<i class="material-icons">build</i></a>
         <div class="collapsible-body">
           <ul>
             <li><a href="profile.php">Profile</a></li>
             <li><a href="info-akun.php">Akun</a></li>
           </ul>
         </div>
       </li>
     </ul>
   </li>
    <hr>
    <li><a href="keluar.php" class="waves-effect"><i class="material-icons">touch_app</i>Keluar</a></li>

    </ul>
     <a href="#" data-target="slide-out" class="sidenav-trigger waves-effect btn teal" style="position:fixed"><i class="material-icons">menu</i></a>
	