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
$id = $_GET["id"];
$query = "DELETE FROM notifikasi WHERE id = $id";
if (mysqli_query($koneksi,$query)) {
  echo "<script>alert('Notifikasi Berhasil Di Hapus !');</script>";
  echo "<script>document.location.href = 'index.php';</script>";
  exit;
}
 ?>
