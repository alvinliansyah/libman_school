<?php
require('koneksi.php');

if (isset($_POST['button-submithapusdata'])) {
    $NIS = $_POST['NIS3'];
    $kelass=$_POST['kelas3'];
    $tingkatann=$_POST['tingkatan3'];

    $hapus=mysqli_query($koneksi, "DELETE FROM data_siswa WHERE NIS = '$NIS'");
    if($hapus){
		echo "<script>alert('Data berhasil dihapus');
		document.location='detailSiswa.php?kelas=$kelass&tingkatan=$tingkatann'</script>";
	}else {
		echo "<script>alert('Data gagal dihapus');
		document.location='detailSiswa.php?kelas=$kelass&tingkatan=$tingkatann'</script>";
	}
}
?>