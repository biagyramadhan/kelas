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
$query = "UPDATE user SET status = 'Active' WHERE id = $id";
if (mysqli_query($koneksi,$query)) {
  echo "<script>alert('Data Berhasil Di Konfirmasi !');</script>";
  echo "<script>document.location.href = 'list-user.php';</script>";
  exit;
}
 ?>
