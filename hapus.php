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
$query = "DELETE FROM user WHERE id = $id";
if (mysqli_query($koneksi,$query)) {
  echo "<script>alert('Data Berhasil Di Hapus !');</script>";
  header("location:list-user.php");
  exit;
}
 ?>
