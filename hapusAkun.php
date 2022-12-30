<?php
require('koneksi.php');
if(isset($_POST['button-submithapusdata'])) {
	$id = $_POST['text-kodeadmin'];

    $hapus=mysqli_query($koneksi,"DELETE FROM data_admin WHERE id_admin=$id");
	if($hapus){
		echo "<script>alert('Berhasil menghapus Akun');
		document.location='login.php'</script>";
	}else {
		echo "<script>alert('Gagal menghapus Admin');
		document.location='login.php'</script>";
	}
}
?>