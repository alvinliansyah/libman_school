<?php 
// mengaktifkan session php
session_start();
// menghubungkan dengan koneksi
include 'koneksi.php';
include 'login.php';
// menangkap data yang dikirim dari form
$username = $_POST['user'];
$password = $_POST['pass'];
// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi,"select * from data_admin where nama_admin='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
if($cek == true){
$_SESSION['username'] = $username;
$_SESSION['status'] = "login";
header("location:dashboard.php");
}
else{
header("location:login.php?pesan=gagal");
}
?>