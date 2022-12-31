<?php
require('koneksi.php');
if(isset($_POST['button-simpan'])) {
	$id = $_POST['text-kodeadmin'];
	$nama = $_POST['text-namalengkapadmin'];
	$password = $_POST['password'];
	
	$file = $_FILES['file-fotoprofile']['name'];
	$fileNameParts = explode('.', $file);
	$ext = end($fileNameParts);
    $namaSementara = $_FILES['file-fotoprofile']['tmp_name'];
    // create folder if not exist
    if (!file_exists('img/admin')) {
        mkdir('img/admin', 0777, true);
    }
    $dirUpload = "img/admin/";
    // genearete datetimestamp
    $filename = $id . '.' . $ext;

    // pindahkan file 
    $terupload = move_uploaded_file($namaSementara, $dirUpload . $filename);

    if ($terupload) {
	$gbr =  $dirUpload . $filename;
	$edit=mysqli_query($koneksi,"UPDATE data_admin SET nama_admin='$nama',password='$password',gambar='$gbr'  WHERE id_admin='$id'");
	// die();
	if($edit){
		echo "<script>alert('Berhasil mengedit data Admin');
		document.location='profile.php'</script>";
	}else {
		echo "<script>alert('Gagal mengedit data Admin');
		document.location='profile.php'</script>";
	}
	}
}
?>