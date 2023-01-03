<?php
require_once 'koneksi.php';

session_start();
if(!isset($_SESSION['id_admin'])){
	$_SESSION['msg'] = "Anda Harus Login Dulu";
	header('Location:login.php');
}

$kelass = $_GET['kelas'];
$tingkatann = $_GET['tingkatan'];

$data = mysqli_query($koneksi, "SELECT * FROM data_admin WHERE id_admin=$_SESSION[id_admin]");

while ($row = mysqli_fetch_array($data, MYSQLI_ASSOC)) {
	$img = $row['gambar'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="DataTables/DataTables-1.12.1/css/dataTables.bootstrap5.min.css">
	<link rel="stylesheet" type="text/css" href="DataTables/Buttons-2.2.3/css/buttons.bootstrap5.min.css">
	<link rel="website icon" type="png" href="img/Logo.png">
	<link rel="stylesheet" href="style.css">
	<title>Siswa - Libman School</title>
</head>

<body>
<div class="loader-wrapper">
	<span class="loader"><span class="loader-inner"></span></span>
	</div>
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<img src="img/Logo.png" alt="">
			<span class="brand">Libman School</span>
		</a>
		<ul class="side-menu">
			<li><a href="dashboard.php"><i class='bx bx-home icon'></i> Dashboard</a></li>

			<li class="divider" data-text="data master">Data Master</li>
			<li><a href="#" class="active"><i class='bx bx-group icon'></i>Siswa</a></li>
			<li><a href="admin.php"><i class='bx bx-user icon'></i>Admin</a></li>
			<li><a href="buku.php" ><i class='bx bx-book icon'></i>Buku</a></li>
			<li class="divider" data-text="transaksi">Transaksi</li>
			<li><a href="peminjaman.php"><i class='bx bx-arrow-from-bottom icon'></i>Peminjaman</a></li>
			<li><a href="pengembalian.php"><i class='bx bx-arrow-to-bottom icon'></i>Pengembalian</a></li>
			<li><a href="riwayat.php"><i class='bx bx-history icon'></i>Riwayat</a></li>
			<ul class="buttom-side-menu">
				<li>
				<a href="#"><i class='bx bx-help-circle icon'></i> Bantuan <i class='bx bx-chevron-right icon-right' ></i></a>
					<ul class="side-dropdown">
						<li><a href="pelayananPelanggan.php">Pelayanan Pelanggan</a></li>
						<li><a href="tentangAplikasi.php">Tentang Aplikasi</a></li>
					</ul>
				</li>
				<li><a href="logout.php"><i class='bx bx-log-out-circle icon'></i>Keluar</a></li>
			</ul>
	</section>
	<!-- SIDEBAR -->

	<!-- NAVBAR -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
		<i class='bx bx-menu toggle-sidebar bx-sm' ></i>
			<form action="#">

			</form>
			<div id="MyClockDisplay" class="clock float-start" style="line-height: 35px; color: white; font-weight: 600; font-size: 15px; font-family: 'Open Sans', sans-serif; letter-spacing: 3px; position: absolute; top: 15px; right: 80px;" onload="showTime()"></div>
			&nbsp
			<a style="color:white; text-decoration: none; font-weight: 600; font-size: 18px; position: absolute; top: 18px; right: 65px;">|</a>
			&nbsp
			<div class="profile">
				<img src="<?php echo $img?>" alt="">
				<ul class="profile-link">
					<li><a href="profile.php"><i class='bx bx-user icon'></i> Profile</a></li>
				</ul>
			</div>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<h1 class="title">Siswa
			<div class="card float-end shadow" style="height: 3.5rem; width: 8.5rem; top: 10px;">
			<div class="card-header text-bg-primary" style="padding: 4px"></div>
			<div class="card-body">
			<center><p class="card-title" style="font-family: 'Open Sans', sans-serif; font-weight: 1000; font-size: 17px; line-height: 14px;"><?php echo $tingkatann ?><strong><a class="divider" style= "color:black; text-decoration: none; font-weight: 600; font-size: 18px; line-height: 10px;">&nbsp / &nbsp</a></strong><?php echo $kelass ?></p></center>
			</div>
			</div>
			</h1>
			<ul class="breadcrumbs">
				<li><a href="dashboard.php">Home</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Siswa</a>
			</li>
			</ul>
			<div class="card shadow">
			<h4 class="card-header text-bg-primary mb-3 fw-semibold"><center><strong><button type="button" class="btn dropdown border-0 float-start" style="position: relative; top: -3px; left: -15px;"><a href="siswa.php"style= "color:white; text-decoration: none; font-weight: normal;"><i class='bx bx-chevron-left icon bx-md'></i></a></strong></button>
			Data Siswa
					<strong><button type="button" class="btn btn-outline-light btn-sm float-end"><a href="#" data-bs-toggle="modal" data-bs-target="#modalTambahData" style= "font-size: 14.5px; color:white; text-decoration: none; font-weight: normal;"><i class='bx bx-add-to-queue icon'></i>&nbsp;Tambah Data</a></strong></button>
					</center></h4>
						<div class="card-body">
						<div class="container">
						<table id="example" class="table table-striped table-hover" style="width:100%">
							<thead>
								<tr>
									<th>NO</th>
									<th>NIS</th>
									<th>NAMA SISWA</th>
									<th>PASSWORD</th>
									<th>NO TELEPHONE</th>
									<th>JENIS KELAMIN</th>
									<th>AKSI</th>
								</tr>
							</thead>
							<tbody>
								<tr>
								<?php
								$dataAdmin = mysqli_query($koneksi, "select * from data_siswa where tingkatan = '$tingkatann' and kelas ='$kelass' ORDER BY NIS ASC");
								$i=1;
								while ($row = mysqli_fetch_array($dataAdmin, MYSQLI_ASSOC)) {
									$NIS = $row['NIS'];
									$nama = $row['nama_siswa'];
									$pass = $row['password'];
									$telp = $row['notelp'];
									$jeniskelamin = $row['jenis_kelamin'];
								?>
								<td><?php echo $i?></td>
								<td><?php echo $NIS ?></td>
								<td><?php echo $nama?></td>
								<td><?php echo $pass?></td>
								<td><?php echo $telp?></td>
								<td><?php echo $jeniskelamin?></td>
								<td>
								<div class="d-grid gap-2 d-md-flex justify-content-md">
											<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEditData<?= $i ?>"><i class='bx bx-edit icon bx-xs'></i>&nbsp;Edit</button>
											<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapusData<?= $i ?>"><i class='bx bx-trash icon bx-xs'></i>&nbsp;Hapus</button>
								</div>
										</td>
						<!-- Awal Modal Tambah Data -->
						<div class="modal fade" id="modalTambahData" data-bs-backdrop="static" data-bs-keyboard="false"
							tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header text-bg-primary mb-3">
										<h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data Siswa</h1>
										<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
											aria-label="Close"></button>
									</div>
									<form method="POST" action="tambahSiswa.php">
									<div class="modal-body">
										<div class="mb-3">
											<label class="form-label">NIS</label>
											<input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="4" class="form-control" name="number-nis1"
												placeholder="NIS" required>
										</div>
										<div class="mb-3">
											<label class="form-label">Nama Siswa</label>
											<input type="text" class="form-control" name="text-namasiswa1"
												placeholder="Nama Siswa" required>
										</div>
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input type="password" class="form-control" name="password1"
												placeholder="Password" required>
										</div>
										<div class="mb-3">
											<label class="form-label">No Telepon</label>
											<input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="13" class="form-control" name="number-noteltepon1"
												placeholder="No Telepon" required>
										</div>
										<div class="mb-3">
											<label class="form-label">Jenis Kelamin</label>
											<select class="form-select" name="text-jekel1">
												<option></option>
												<option value="L">L</option>
												<option value="P">P</option>
											</select>
										</div>
										<div class="mb-3">
											<input type="hidden" class="form-control" name="kelas1"
												value="<?php echo $kelass?>">
										</div>
										<div class="mb-3">
											<input type="hidden" class="form-control" name="tingkatan1"
												value="<?php echo $tingkatann?>">
										</div>
									</div>
									<div class="modal-footer">
										<button type="submit" class="btn btn-primary"
											name="button-submittambahdata1">Simpan</button>
										<button type="button" class="btn btn-secondary"
											data-bs-dismiss="modal">Keluar</button>
									</div>
									</form>
								</div>
							</div>
						</div>
						<!-- Akhir Modal -->
						<!-- Awal Modal Edit Data -->
						<div class="modal fade" id="modalEditData<?= $i ?>" data-bs-backdrop="static" data-bs-keyboard="false"
							tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header text-bg-primary mb-3">
										<h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Data Siswa</h1>
										<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
											aria-label="Close"></button>
									</div>
									<form method="POST" action="editSiswa.php">
									<div class="modal-body">
										<div class="mb-3">
											<label class="form-label">NIS</label>
											<input type="number" class="form-control" name="number-nis"
												value="<?= $NIS?>" readonly>
										</div>
										<div class="mb-3">
											<label class="form-label">Nama Siswa</label>
											<input type="text" class="form-control" name="text-namasiswa"
												value="<?= $nama?>" placeholder="Nama Siswa" required>
										</div>
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input type="password" class="form-control" name="password"
											value="<?= $pass?>" placeholder="Password" required>
										</div>
										<div class="mb-3">
											<label class="form-label">No Telepon</label>
											<input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="13" class="form-control" name="number-noteltepon"
											value="<?= $telp?>" placeholder="No Telepon" required>
										</div>
										<div class="mb-3">
											<label class="form-label">Jenis Kelamin</label>
											<select class="form-select" name="text-jekel">
												<option value="" <?php if($jeniskelamin == null) { ?> selected="selected"<?php } ?>></option>
												<option value="L" <?php if($jeniskelamin == 'L') { ?> selected="selected"<?php } ?>>L</option>
												<option value="P" <?php if($jeniskelamin == 'P') { ?> selected="selected"<?php } ?>>P</option>
											</select>
										</div>
										<div class="mb-3">
											<input type="hidden" class="form-control" name="kelas"
												value="<?php echo $kelass?>">
										</div>
										<div class="mb-3">
											<input type="hidden" class="form-control" name="tingkatan"
												value="<?php echo $tingkatann?>">
										</div>
									</div>
									<div class="modal-footer">
										<button type="submit" class="btn btn-primary"
											name="button-editdata">Simpan</button>
										<button type="button" class="btn btn-secondary"
											data-bs-dismiss="modal">Keluar</button>
									</div>
									</form>
								</div>
							</div>
						</div>
						<!-- Akhir Modal -->
						<!-- Awal Modal Hapus Data -->
						<div class="modal fade" id="modalHapusData<?= $i ?>" data-bs-backdrop="static" data-bs-keyboard="false"
							tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header text-bg-primary mb-3">
										<h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus Data?</h1>
										<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
											aria-label="Close"></button>
									</div>
									<form method="POST" action="hapusSiswa.php">
									<div class="modal-body">Apakah anda yakin ingin menghapus data?</div>
									<div class="mb-3">
											<input type="hidden" class="form-control" name="NIS3"
											value="<?=$NIS?>">
										</div>
									<div class="mb-3">
											<input type="hidden" class="form-control" name="kelas3"
												value="<?php echo $kelass?>">
										</div>
									<div class="mb-3">
											<input type="hidden" class="form-control" name="tingkatan3"
												value="<?php echo $tingkatann?>">
										</div>
									<div class="modal-footer">
										<button type="submit" class="btn btn-danger"
											name="button-submithapusdata">Hapus</button>
									</div>
									</form>
								</div>
							</div>
						</div>
						<!-- Akhir Modal -->
						</tr>
								<?php 
									$i++;
								} ?>
							</tbody>
						</table>
						</div>
						</div>
			</div>
			<br/>
			<footer>
			<center>
			<div class="text">
			<span>Dibuat Oleh <a href="#">Libman School</a> | &#169; 2022 Semua Hak Dilindungi Undang-Undang</span>
			</div>
			</center>
			</footer>
			<br/>
		</main>
		<!-- MAIN -->
	</section>
	<!-- NAVBAR -->


	<script src="script.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="DataTables/DataTables-1.12.1/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="DataTables/DataTables-1.12.1/js/dataTables.bootstrap5.min.js"></script>
	<script type="text/javascript" src="DataTables/Buttons-2.2.3/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" src="DataTables/Buttons-2.2.3/js/buttons.bootstrap5.min.js"></script>
	<script type="text/javascript" src="DataTables/JSZip-2.5.0/jszip.min.js"></script>
	<script type="text/javascript" src="DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
	<script type="text/javascript" src="DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>
	<script type="text/javascript" src="DataTables/Buttons-2.2.3/js/buttons.html5.min.js"></script>
	<script type="text/javascript" src="DataTables/Buttons-2.2.3/js/buttons.print.min.js"></script>
	<script type="text/javascript" src="DataTables/Buttons-2.2.3/js/buttons.colVis.min.js"></script>
	<script>
		$(window).on("load",function(){
			$(".loader-wrapper").fadeOut("slow");
		});
	</script>
	<script>
		
		$(document).ready(function () {
			var table = $('#example').DataTable( {
		scrollY: 320,
        scrollX: true,
        lengthChange: false,
		buttons: [
            'colvis', 'excel', 'pdf', 'print'
        ]
		
		
    } );

			table.buttons().container()
				.appendTo('#example_wrapper .col-md-6:eq(0)');
		});
	</script>
</body>

</html>