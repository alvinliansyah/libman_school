<?php
require('koneksi.php');

if (isset($_POST['button-submittambahdata'])) {
  $kd = $_POST['text-kodebuku'];
  $jenis = $_POST['text-jenis'];
  $nama = $_POST['text-judul'];
  $semester = $_POST['text-semester'];
  $tingkatan = $_POST['text-Tingkatan'];
  $jumlah = $_POST['text-jumlah'];

  $file = $_FILES['file-fotobuku']['name'];
  $fileNameParts = explode('.', $file);
	$ext = end($fileNameParts);
    $namaSementara = $_FILES['file-fotobuku']['tmp_name'];
    // create folder if not exist
    if (!file_exists('API/uploads')) {
        mkdir('API/uploads', 0777, true);
    }
    $dirUpload = "API/uploads/";
    // genearete datetimestamp
    $filename = $nama . $tingkatan . $semester . '.' . $ext;

    // pindahkan file 
    $terupload = move_uploaded_file($namaSementara, $dirUpload . $filename);
  if ($terupload) {
    $gbr =  $dirUpload . $filename;
    // die();
  $tambah=mysqli_query($koneksi, "INSERT INTO data_buku(kd_buku, jenis_buku, nama_buku, semester, tingkatan, jumlah, gambar) VALUES 
  ('$kd','$jenis','$nama','$semester','$tingkatan','$jumlah','$gbr')");
  if($tambah){
		echo "<script>alert('Data berhasil ditambahkan');
		document.location='detailBuku.php?jenis=$jenis'</script>";
	}else {
    echo mysqli_error($koneksi);
    die();
		echo "<script>alert('Data gagal ditambahkan');
		document.location='detailBuku.php?jenis=$jenis'</script>";
	}
  }
}
?>