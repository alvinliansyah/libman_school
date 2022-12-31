<?php
// $server = "localhost";
// $username = "root";
// $password = "";
// $db = "akademik";
// $koneksi = mysqli_connect("localhost", "wstifdi1_libman", "Polije1234", "wstifdi1_libman");
$koneksi = mysqli_connect("localhost", "root", "", "libmandb");

if(mysqli_connect_errno()){
  echo "Koneksi Gagal : " . mysqli_connect_error();
}else {
  // print "bisa";
}
?>