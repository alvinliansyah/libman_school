<?php
require('koneksi.php');
if(isset($_POST['button-simpan'])) {
	$id = $_POST['text-kodeadmin'];
	$nama = $_POST['text-namalengkapadmin'];
	$password = $_POST['password'];

    $edit=mysqli_query($koneksi,"INSERT INTO data_admin (id_admin, nama_admin, password) VALUES ('$id','$nama','$password')");
	if($edit){
		echo "<script>alert('Berhasil mengedit data Admin');
		document.location='admin.php'</script>";
	}else {
		echo "<script>alert('Gagal mengedit data Admin');
		document.location='admin.php'</script>";
	}
}
?>