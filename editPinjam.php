<?php
require('koneksi.php');

if (isset($_POST['button-simpan'])) {
  $kdpjm = $_POST['text-kodepeminjaman'];
  $tglpjm = $_POST['dt-peminjaman'];
  $tglkbl = $_POST['dt-pengembalian'];
  $qty = $_POST['text-jumlah'];
  $nis = $_POST['number-nis'];
  $kdbk = $_POST['text-kodebuku'];
  $id = $_POST['text-kodeapadmin'];

  $edit=mysqli_query($koneksi, "UPDATE peminjaman SET tanggal_peminjaman='$tglpjm', jadwal_pengembalian='$tglkbl', qty='$qty', NIS='$nis', kd_buku='$kdbk',id_admin='$id' WHERE id_pinjam='$kdpjm'");
  if($edit){
		echo "<script>alert('Edit Peminjaman Berhasil');
		document.location='peminjaman.php'</script>";
	}else {
		echo "<script>alert('Edit Peminjaman Gagal');
		document.location='peminjaman.php'</script>";
	}
}
?>