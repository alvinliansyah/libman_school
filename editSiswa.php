<?php
require('koneksi.php');

if (isset($_POST['button-editdata'])) {
    $nis = $_POST['number-nis'];
    $nama = $_POST['text-namasiswa'];
    $pass = $_POST['password'];
    $nomer = $_POST['number-noteltepon'];
    $kelass=$_POST['kelas'];
    $tingkatann=$_POST['tingkatan'];
    $JK=$_POST['text-jekel'];

    $edit=mysqli_query($koneksi, "UPDATE data_siswa SET nama_siswa='$nama',password='$pass',jenis_kelamin='$JK',notelp='$nomer' WHERE NIS='$nis'");
    if($edit){
		echo "<script>alert('Data berhasil diedit');
		document.location='detailSiswa.php?kelas=$kelass&tingkatan=$tingkatann'</script>";
	}else {
		echo "<script>alert('Data gagal diedit');
		document.location='detailSiswa.php?kelas=$kelass&tingkatan=$tingkatann'</script>";
	}
}
?>