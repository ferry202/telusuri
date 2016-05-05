<?php
include "koneksi.php";
$nama = $_POST['nama'];
$nik = $_POST['nik'];
$nomor = $_POST['nomor'];
$isi = $_POST['isi'];
mysqli_query($koneksi,"INSERT INTO laporkan (nama,nik,nomor,isi) VALUES ('$nama','$nik','$nomor','$isi')");
header('location:index.php');
?>