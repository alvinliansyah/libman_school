<?php
require 'connect.php';

class fungsiTampil
{
    public function ambilDataBuku()
    {
        $dataBuku = mysqli_query($koneksi, "SELECT COUNT(kd_buku) as total FROM data_buku");
        return $dataBuku;
    }
    public function tampilDataBuku($rslt)
    {
        while ($row = mysqli_fetch_array($rslt)) {
            echo $row['total'];
        }
    }
    public function ambilDataSiswa()
    {
        $dataSiswa = mysqli_query($koneksi, "SELECT COUNT(NIS) as keseluruhan FROM data_siswa");
        return $dataSiswa;
    }
    public function tampilDataSiswa($rslt)
    {
        while ($row = mysqli_fetch_array($rslt)) {
            echo $row['keseluruhan'];
        }
    }
    function persenAda($ada, $total){
        $persentaseTersedia = ($ada/$total * 100);
        return $persentaseTersedia;
    }
}
// $obj = new fungsiTampil();
// echo $obj->persenAda(10, 20);
?>