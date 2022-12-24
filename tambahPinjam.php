<?php
require('koneksi.php');

if (isset($_POST['button-simpan'])) {
  $kdpjm = $_POST['text-kodepeminjaman'];
  $tglpjm = $_POST['dt-peminjaman'];
  $tglkbl = $_POST['dt-pengembalian'];
  $qty = $_POST['text-jumlah'];
  $nis = $_POST['number-nis'];
  $kdbk = $_POST['text-kodebuku'];
  $id = $_POST['text-kodeadmin'];

  $tambah=mysqli_query($koneksi, "INSERT INTO peminjaman(id_pinjam, tanggal_peminjaman, jadwal_pengembalian, qty, NIS, kd_buku, id_admin) VALUES ('$kdpjm', '$tglpjm', '$tglkbl', '$qty', '$nis', '$kdbk', '$id');");
  if($tambah){
		echo "<script>alert('Peminjaman Berhasil');
		document.location='peminjaman.php'</script>";
	}else {
		echo "<script>alert('Peminjaman Gagal');
		document.location='peminjaman.php'</script>";
	}
}
?>