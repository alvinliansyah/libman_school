<?php 
// mengaktifkan session php
session_start();
// menghubungkan dengan koneksi
require('koneksi.php');
// menangkap data yang dikirim dari form
$username = $_POST['user'];
$password = $_POST['pass'];
// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi,"select * from data_admin where nama_admin='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
if($cek > 0){
while ($row = mysqli_fetch_array($data, MYSQLI_ASSOC)) {
$_SESSION['id_admin'] = $row['id_admin'];
$_SESSION['username'] = $username;
$_SESSION['status'] = "login";
header("location:dashboard.php");
}
} else{
    echo "<script>alert('Login gagal! username dan password salah!');
    document.location='login.php'</script>";
}
?>