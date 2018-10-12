<?php
require 'koneksi.php';
session_start();
if (!isset($_SESSION["login"])) {
  header("location:login.php");
  exit;
}
$id = $_GET["id"];
$query = "DELETE FROM pesan WHERE id = $id";
if (mysqli_query($koneksi,$query)) {
  echo "<script>alert('Pesan Berhasil Di Hapus !');</script>";
  header("location:pesan.php");
  exit;
}
 ?>
