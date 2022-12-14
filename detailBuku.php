<?php
require_once 'koneksi.php';

session_start();
if(!isset($_SESSION['id_admin'])){
	$_SESSION['msg'] = "Anda Harus Login Dulu";
	header('Location:login.php');
}

$jenis = $_GET['jenis'];
$dataBuku = mysqli_query($koneksi, "SELECT * FROM data_buku WHERE jenis_buku = '$jenis'");

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
	<title>Buku - Libman School</title>
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
			<li><a href="siswa.php"><i class='bx bx-group icon'></i>Siswa</a></li>
			<li><a href="admin.php"><i class='bx bx-user icon'></i>Admin</a></li>
			<li><a href="#" class="active"><i class='bx bx-book icon'></i>Buku</a></li>
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
			<h1 class="title">Buku
			<div class="card float-end shadow" style="height: 3.5rem; width: auto; top: 10px;">
			<div class="card-header text-bg-primary" style="padding: 4px"></div>
			<div class="card-body">
				<center><p class="card-title" style="font-family: 'Open Sans', sans-serif; font-weight: 1000; font-size: 17px; line-height: 14px;"><?php echo $jenis ?></p></center>
			</div>
			</div>
			</h1>
			<ul class="breadcrumbs">
				<li><a href="dashboard.php">Home</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Buku</a></li>
			</ul>
			<div class="card shadow">
			<h4 class="card-header text-bg-primary mb-3 fw-semibold"><center><strong><button type="button" class="btn dropdown border-0 float-start" style="position: relative; top: -3px; left: -15px;"><a href="buku.php"style= "color:white; text-decoration: none; font-weight: normal;"><i class='bx bx-chevron-left icon bx-md'></i></a></strong></button>
			Data Buku
					<strong><button type="button" class="btn btn-outline-light btn-sm float-end"><a href="#" data-bs-toggle="modal" data-bs-target="#modalTambahData" style= "font-size: 14.5px; color:white; text-decoration: none; font-weight: normal;"><i class='bx bx-add-to-queue icon'></i>&nbsp;Tambah Data</a></strong></button>
					</center></h4>
						<div class="card-body">
						<div class="container">
						<table id="example" class="table table-striped table-hover" style="width:100%">
							<thead>
								<tr>
									<th>NO</th>
									<th>KODE BUKU</th>
									<th>JUDUL</th>
									<th>SEMESTER</th>
									<th>TINGKATAN</th>
									<th>JUMLAH</th>
									<th>AKSI</th>
								</tr>
							</thead>
							<tbody>
								<tr>
								<?php						
								$dataBuku = mysqli_query($koneksi, "SELECT kd_buku, nama_buku, semester, tingkatan, jumlah FROM data_buku WHERE jenis_buku = '$jenis'");
								$i=1;
								while ($row = mysqli_fetch_array($dataBuku, MYSQLI_ASSOC)) {
									$kd = $row['kd_buku'];
									$nama = $row['nama_buku'];
									$semester = $row['semester'];
									$tingkatan = $row['tingkatan'];
									$jumlah = $row['jumlah'];
									$img = $row['jumlah'];
								?>
									<td><?php echo $i?></td>
									<td><?php echo $kd ?></td>
									<td><?php echo $nama ?></td>
									<td><?php echo $semester ?></td>
									<td><?php echo $tingkatan ?></td>
									<td><?php echo $jumlah ?></td>
									<td>
									<div class="d-grid gap-2 d-md-flex justify-content-md">
											<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEditData<?= $i ?>"><i class='bx bx-edit icon bx-xs'>&nbsp;Edit</i></button>
											<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapusData<?= $i ?>"><i class='bx bx-trash icon bx-xs'></i>&nbsp;Hapus</button>
								</div>
										</td>
						<!-- Awal Modal Tambah Data -->
						<div class="modal fade" id="modalTambahData" data-bs-backdrop="static" data-bs-keyboard="false"
							tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header text-bg-primary mb-3">
										<h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data Buku</h1>
										<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
											aria-label="Close"></button>
									</div>
									<form method="POST" action="tambahBuku.php" enctype="multipart/form-data">
									<div class="modal-body">
										<div class="mb-3">
											<label class="form-label">Kode Buku</label>
											<input type="text" class="form-control" name="text-kodebuku"
												placeholder="Kode Buku" required>
										</div>
										<div class="mb-3">
											<label class="form-label">Judul</label>
											<input type="text" class="form-control" name="text-judul"
												placeholder="Judul" required>
										</div>
										<div class="mb-3">
											<label class="form-label">Semester</label>
											<select class="form-select" name="text-semester">
												<option></option>
												<option value="1">1</option>
												<option value="2">2</option>
											</select>
										</div>
										<div class="mb-3">
											<label class="form-label">Tingkatan</label>
											<select class="form-select" name="text-Tingkatan">
												<option></option>
												<option value="VII">VII</option>
												<option value="VIII">VIII</option>
												<option value="IX">IX</option>
											</select>
										</div>
										<div class="mb-3">
											<label class="form-label">Jumlah</label>
											<input type="number" class="form-control" name="text-jumlah"
												value=1 readonly>
										</div>
										<div class="mb-3">
											<input type="hidden" class="form-control" name="text-jenis"
												value="<?php echo $jenis?>" required>
										</div>
										<div class="mb-3">
											<label class="form-label">Foto Buku</label>
											<input id="file-fotobuku" accept="image/*" type="file" class="form-control" name="file-fotobuku" required>
										</div>
									</div>
									<div class="modal-footer">
										<button type="submit" class="btn btn-primary"
											name="button-submittambahdata">Simpan</button>
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
										<h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Data Buku</h1>
										<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
											aria-label="Close"></button>
									</div>
									<form method="POST" action="editBuku.php">
									<div class="modal-body">
										<div class="mb-3">
											<label class="form-label">Kode Buku</label>
											<input type="text" class="form-control" name="text-kodebuku"
												value="<?=$kd?>" readonly>
										</div>
										<div class="mb-3">
											<label class="form-label">Judul</label>
											<input type="text" class="form-control" name="text-judul"
												value="<?=$nama?>" placeholder="Judul" required>
										</div>
										<div class="mb-3">
											<label class="form-label">Semester</label>
											<select class="form-select" name="text-semester">
												<option value="" <?php if($semester == null) { ?> selected="selected"<?php } ?>></option>
												<option value="1" <?php if($semester == '1') { ?> selected="selected"<?php } ?>>1</option>
												<option value="2" <?php if($semester == '2') { ?> selected="selected"<?php } ?>>2</option>
											</select>
										</div>
										<div class="mb-3">
											<label class="form-label">Tingkatan</label>
											<select class="form-select" name="text-Tingkatan">
												<option value="VII" <?php if($tingkatan == 'VII') { ?> selected="selected"<?php } ?>>VII</option>
												<option value="VIII" <?php if($tingkatan == 'VIII') { ?> selected="selected"<?php } ?>>VIII</option>
												<option value="IX" <?php if($tingkatan == 'IX') { ?> selected="selected"<?php } ?>>IX</option>
											</select>
										</div>
										<div class="mb-3">
											<label class="form-label">Jumlah</label>
											<input type="number" class="form-control" name="text-jumlah"
												value=1 readonly>
										</div>
										<div class="mb-3">
											<input type="hidden" class="form-control" name="text-jenis"
												value="<?php echo $jenis?>" required>
										</div>
									</div>
									<div class="modal-footer">
										<button type="submit" class="btn btn-primary"
											name="button-submiteditdata">Simpan</button>
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
									<form method="POST" action="hapusBuku.php">
									<div class="modal-body">Apakah anda yakin ingin menghapus data?</div>
									<div class="mb-3">
											<input type="hidden" class="form-control" name="text-kodebuku"
												value="<?=$kd?>" required>
										</div>
									<div class="mb-3">
											<input type="hidden" class="form-control" name="text-jenis"
												value="<?php echo $jenis?>" required>
										</div>
									<div class="modal-footer">
										<button type="submit" class="btn btn-danger"
											name="button-hapusdata">Hapus</button>
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
	<script>
	const file_fotoprofile = document.getElementById('file-fotobuku');

	file_fotoprofile.onchange = () => {
	const [image_fotoprofile] = file_fotoprofile.files
	if (image_fotoprofile.size > 2000000) {
		if(image_fotoprofile){
		alert('ukuran file maksimal 2mb');
		file_fotoprofile.value = '';
		return false;	
	} else if(image_fotoprofile.type != 'image/jpeg' && image_fotoprofile.type != 'image/png' && image_fotoprofile.type != 'image/jpg') {
		alert('type file harus .jpg .png .jpeg');
			imginp_rental.value = '';
			return false;
	} 
	}
	}
	</script>
</body>

</html>