<?php
// $server = "localhost";
// $username = "root";
// $password = "";
// $db = "akademik";
$koneksi = mysqli_connect("localhost", "root", "", "libmandatabase");

if(mysqli_connect_errno()){
  echo "Koneksi Gagal : " . mysqli_connect_error();
}else {
  // print "bisa";
}
?>