<?php
require('koneksi.php');

if (isset($_POST['button-submiteditdata'])) {
  $kd = $_POST['text-kodebuku'];
  $jenis = $_POST['text-jenis'];
  $nama = $_POST['text-judul'];
  $semester = $_POST['text-semester'];
  $tingkatan = $_POST['text-Tingkatan'];
  $jumlah = $_POST['text-jumlah'];

  $edit=mysqli_query($koneksi, "UPDATE data_buku SET jenis_buku='$jenis',nama_buku='$nama',semester='$semester',tingkatan='$tingkatan',jumlah='$jumlah' WHERE kd_buku='$kd'");
  if($edit){
		echo "<script>alert('Data berhasil diedit');
		document.location='detailBuku.php?jenis=$jenis'</script>";
	}else {
		echo "<script>alert('Data gagal diedit');
		document.location='detailBuku.php?jenis=$jenis'</script>";
	}
}
?>