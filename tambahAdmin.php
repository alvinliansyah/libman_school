<?php
require('koneksi.php');
if(isset($_POST['button-simpan'])) {
	$id = $_POST['text-id'];
	$nama = $_POST['text-namalengkapadmin'];
	$password = $_POST['password'];

    $tambah=mysqli_query($koneksi,"INSERT INTO data_admin (id_admin, nama_admin, password) VALUES ('$id','$nama','$password')");
	if($tambah){
		echo "<script>alert('Berhasil menambahkan data Admin');
		document.location='admin.php'</script>";
	}else {
		echo "<script>alert('Gagal menambahkan data Admin');
		document.location='admin.php'</script>";
	}
}
?>