<?php
require('koneksi.php');

if (isset($_POST['button-hapusdata'])) {
    $kd = $_POST['text-kodebuku'];
    $jenis = $_POST['text-jenis'];

    $hapus=mysqli_query($koneksi, "DELETE FROM data_buku WHERE kd_buku='$kd'");
    if($hapus){
		echo "<script>alert('Data berhasil dihapus');
		document.location='detailBuku.php?jenis=$jenis'</script>";
	}else {
		echo "<script>alert('Data gagal dihapus');
		document.location='detailBuku.php?jenis=$jenis'</script>";
	}
}
?>