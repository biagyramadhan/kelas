<?php
require 'koneksi.php';
session_start();
if (!isset($_SESSION["admin"])) {
  header("location:index.php");
  exit;
}
if (!isset($_SESSION["login"])) {
  echo "<script>document.location.href = 'login.php';</script>";
  exit;
}
$id = $_GET["id"];
$query = "UPDATE user SET status = 'Blokir' WHERE id = $id";
if (mysqli_query($koneksi,$query)) {
  echo "<script>alert('Data Berhasil Di Blokir !');</script>";
  echo "<script>document.location.href = 'user-blokir.php';</script>";
  exit;
}
 ?>
