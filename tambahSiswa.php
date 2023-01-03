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

  $sendNIS = mysqli_query($koneksi, "SELECT * FROM data_siswa WHERE NIS='$nis'");
  $countNIS = mysqli_num_rows($sendNIS);

  if ($countNIS == 1) {
    echo "<script>alert('NIS Sudah Terdaftar');
		document.location='detailSiswa.php?kelas=$kelass&tingkatan=$tingkatann'</script>";
  } else {
  $tambah=mysqli_query($koneksi, "INSERT INTO data_siswa(NIS, nama_siswa, password, tingkatan, kelas, jenis_kelamin, notelp, gambar) 
  VALUES ('$nis','$nama','$pass','$tingkatann','$kelass','$JK','$nomer', null)");
  if($tambah){
		echo "<script>alert('Data berhasil ditambahkan');
		document.location='detailSiswa.php?kelas=$kelass&tingkatan=$tingkatann'</script>";
	}else {
		echo "<script>alert('Data gagal ditambahkan');
		document.location='detailSiswa.php?kelas=$kelass&tingkatan=$tingkatann'</script>";
	}
  }
}
?>