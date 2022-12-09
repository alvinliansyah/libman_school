<?php
require('koneksi.php');

if (isset($_POST['button-submittambahdata1'])) {
  $nis = $_POST['number-nis1'];
  $nama = $_POST['text-namasiswa1'];
  $pass = $_POST['password1'];
  $nomer = $_POST['number-noteltepon1'];
  $kelass=$_POST['kelas1'];
  $tingkatann=$_POST['tingkatan1'];
  $JK=$_POST['text-jekel1'];

  $tambah=mysqli_query($koneksi, "INSERT INTO data_siswa(NIS, nama_siswa, data_siswa.password, tingkatan, kelas, jenis_kelamin, notelp) 
  VALUES ('$nis','$nama','$pass','$tingkatann','$kelass','$JK','$nomer')");
  if($tambah){
		echo "<script>alert('Berhasil menambahkan');
		document.location='detailSiswa.php?kelas=$kelass&tingkatan=$tingkatann'</script>";
	}else {
		echo "<script>alert('Gagal menambahkan');
		document.location='detailSiswa.php?kelas=$kelass&tingkatan=$tingkatann'</script>";
	}
}
?>