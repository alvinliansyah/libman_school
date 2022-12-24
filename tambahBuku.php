<?php
require('koneksi.php');

if (isset($_POST['button-submittambahdata'])) {
  $kd = $_POST['text-kodebuku'];
  $jenis = $_POST['text-jenis'];
  $nama = $_POST['text-judul'];
  $semester = $_POST['text-semester'];
  $tingkatan = $_POST['text-Tingkatan'];
  $jumlah = $_POST['text-jumlah'];

  $tambah=mysqli_query($koneksi, "INSERT INTO data_buku(kd_buku, jenis_buku, nama_buku, semester, tingkatan, jumlah) VALUES 
  ('$kd','$jenis','$nama','$semester','$tingkatan','$jumlah')");
  if($tambah){
		echo "<script>alert('Data berhasil ditambahkan');
		document.location='detailBuku.php?jenis=$jenis'</script>";
	}else {
		echo "<script>alert('Data gagal ditambahkan');
		document.location='detailBuku.php?jenis=$jenis'</script>";
	}
}
?>