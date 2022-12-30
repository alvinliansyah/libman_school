<?php
require('koneksi.php');

if (isset($_POST['simpan'])) {
  $nama = $_POST['nama'];
  $pass = $_POST['password'];
  $konfirmpass = $_POST['konfirm-password'];

  $lihat=mysqli_query($koneksi, "SELECT * FROM data_admin WHERE nama_admin='$nama'");
  $cek = mysqli_num_rows($lihat);
  if($cek < 1){
		echo "<script>alert('Nama Admin tidak ada');
		document.location='login.php'</script>";
	}else if($pass != $konfirmpass){
		echo "<script>alert('Ganti Password Gagal! Password dan Konfirm Password Harus Sama');
		document.location='login.php'</script>";
	}else {
        $update=mysqli_query($koneksi, "UPDATE data_admin SET password='$pass' WHERE nama_admin='$nama'");
        if ($update) {
            echo "<script>alert('Ganti Password Berhasil');
		    document.location='login.php'</script>";
        } else {
            echo "<script>alert('Ganti Password Gagal');
		    document.location='login.php'</script>";
        }
    }
}
?>