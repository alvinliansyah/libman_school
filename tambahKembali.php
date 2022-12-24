<?php
require('koneksi.php');

if (isset($_POST['button-selesai'])) {
  $kdpjm = $_POST['text-kodepeminjaman'];
  $tglpjm = $_POST['dt-peminjaman'];
  $kdkbl = $_POST['text-kodepengembalian'];
  $qty = $_POST['text-jumlah'];
  $nis = $_POST['number-nis'];
  $kdbk = $_POST['text-kodebuku'];
  $id = $_POST['text-kodeadmin'];

  $tambah=mysqli_query($koneksi, "INSERT INTO pengembalian(id_kembali, id_pinjam, NIS, kd_buku, tanggal_peminjaman, qty, id_admin) VALUES ('$kdkbl', '$kdpjm', '$nis', '$kdbk', '$tglpjm', '$qty', '$id');");
  if($tambah){
		echo "<script>alert('Pengembalian Berhasil');
		document.location='pengembalian.php'</script>";
	}else {
		echo "<script>alert('Pengembalian Gagal');
		document.location='pengembalian.php'</script>";
	}
}
?>