<?php
require_once 'koneksi.php';

session_start();
if(!isset($_SESSION['id_admin'])){
	$_SESSION['msg'] = "Anda Harus Login Dulu";
	header('Location:login.php');
}
$kode=$_SESSION['id_admin'];

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
	<title>Peminjaman - Libman School</title>
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
			<li><a href="siswa.php" ><i class='bx bx-group icon'></i>Siswa</a></li>
			<li><a href="admin.php"><i class='bx bx-user icon'></i>Admin</a></li>
			<li><a href="buku.php"><i class='bx bx-book icon'></i>Buku</a></li>
			<li class="divider" data-text="transaksi">Transaksi</li>
			<li><a href="#" class="active"><i class='bx bx-arrow-from-bottom icon'></i>Peminjaman</a></li>
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
				<img src="<?php echo $img ?>" alt="">
				<ul class="profile-link">
					<li><a href="profile.php"><i class='bx bx-user icon'></i> Profile</a></li>
				</ul>
			</div>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<h1 class="title">Peminjaman</h1>
			<ul class="breadcrumbs">
				<li><a href="dashboard.php">Home</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Peminjaman</a></li>
			</ul>
		<div class="card shadow">
					<h4 class="card-header text-bg-primary mb-3 fw-semibold"><center>Transaksi Peminjaman
					<strong><button type="button" class="btn btn-outline-light btn-sm float-end"><a href="#" data-bs-toggle="modal" data-bs-target="#modalTambahTransaksi" style= "font-size: 14.5px; color:white; text-decoration: none; font-weight: normal;"><i class='bx bx-add-to-queue icon'></i>&nbsp;Tambah Transaksi</a></strong></button>
					</center></h4>
						<div class="card-body">
						<div class="container">
						<table id="example" class="table table-striped table-hover" style="width:100%">
							<thead>
								<tr>
									<th>NO</th>
									<th>KODE PEMINJAMAN</th>
									<th>NIS</th>
									<th>KODE BUKU</th>
									<th>JUMLAH</th>
									<th>TGL PEMINJAMAN</th>
									<th>TGL PENGEMBALIAN</th>
									<th>ID ADMIN</th>
									<th>AKSI</th>
								</tr>
							</thead>
							<tbody>
								<tr>
								<?php						
								$datapjm = mysqli_query($koneksi, "SELECT * FROM peminjaman");
								$i=1;
								while ($row = mysqli_fetch_array($datapjm, MYSQLI_ASSOC)) {
									$kdpjm = $row['id_pinjam'];
									$nis = $row['NIS'];
									$kdbk = $row['kd_buku'];
									$qty = $row['qty'];
									$tglpjm = $row['tanggal_peminjaman'];
									$tglkbl = $row['jadwal_pengembalian'];
									$id = $row['id_admin'];
								?>
									<td><?php echo $i ?></td>
									<td><?php echo $kdpjm ?></td>
									<td><?php echo $nis ?></td>
									<td><?php echo $kdbk ?></td>
									<td><?php echo $qty ?></td>
									<td><?php echo $tglpjm ?></td>
									<td><?php echo $tglkbl ?></td>
									<td><?php echo $id ?></td>
									<td>
									<div class="d-grid gap-2 d-md-flex justify-content-md">
									<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEditData"><i class='bx bx-edit icon bx-xs'>&nbsp;Edit</i></button>
									</div>
									</td>
						<!-- Awal Modal -->
					<div class="modal fade" id="modalTambahTransaksi" data-bs-backdrop="static" data-bs-keyboard="false"
					tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header  text-bg-primary">
								<h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Transaksi Peminjaman</h1>
								<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
									aria-label="Close"></button>
							</div>
							<form method="POST" action="tambahPinjam.php">
							<?php
										$idAdmin=mysqli_query($koneksi, "SELECT MAX(id_pinjam) as id from peminjaman");
										while ($row = mysqli_fetch_array($idAdmin, MYSQLI_ASSOC)) {
							?>
							<div class="modal-body">
								<div class="mb-3">
									<label class="form-label">Kode Peminjaman</label>
									<input type="text" class="form-control" name="text-kodepeminjaman"
										placeholder="Kode Peminjaman" value="<?php if($row["id"] == null){
											echo 1;
										}else{ echo $row["id"]+1;}?>" readonly>
								</div>
								<div class="mb-3">
									<label class="form-label">NIS</label>
									<input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="4" class="form-control" name="number-nis"
										placeholder="NIS" required>
								</div>
								<div class="mb-3">
									<label class="form-label">Kode Buku</label>
									<input type="text" class="form-control" name="text-kodebuku"
										placeholder="Kode Buku" required>
								</div>
								<div class="mb-3">
									<label class="form-label">Jumlah</label>
									<input type="text" class="form-control" name="text-jumlah"
										value=1 readonly>
								</div>
								<div class="mb-3">
									<label class="form-label">TGL Peminjaman</label>
									<input type="date" id="demo" class="form-control" name="dt-peminjaman" required>
								</div>
								<div class="mb-3">
									<label class="form-label">TGL Pengembalian</label>
									<input type="date" id="demo2" class="form-control" name="dt-pengembalian" required>
								</div>
								<div class="mb-3">
									<label class="form-label">Kode Admin</label>
									<input type="text" class="form-control" name="text-kodeadmin"
										placeholder="Kode Admin" value="<?= $kode?>" readonly>
								</div>

							</div>
							<div class="modal-footer">
								<button type="submit" class="btn btn-primary" name="button-simpan">Simpan</button>
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
							</div>
							<?php
										}
							?>
							</form>
						</div>
					</div>
				</div>
				<!-- Akhir Modal -->
				<!-- Awal Modal Edit Data -->
				<div class="modal fade" id="modalEditData" data-bs-backdrop="static" data-bs-keyboard="false"
							tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header text-bg-primary mb-3">
										<h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Transaksi Peminjaman</h1>
										<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
											aria-label="Close"></button>
									</div>
									<form method="POST" action="editPinjam.php">
									<div class="modal-body">
								<div class="mb-3">
									<label class="form-label">Kode Peminjaman</label>
									<input type="text" class="form-control" name="text-kodepeminjaman"
										placeholder="Kode Peminjaman" value="<?= $kdpjm?>" readonly>
								</div>
								<div class="mb-3">
									<label class="form-label">NIS</label>
									<input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="4" class="form-control" name="number-nis"
										placeholder="NIS" value="<?= $nis?>" required>
								</div>
								<div class="mb-3">
									<label class="form-label">Kode Buku</label>
									<input type="text" class="form-control" name="text-kodebuku"
										placeholder="Kode Buku" value="<?= $kdbk?>" required>
								</div>
								<div class="mb-3">
									<label class="form-label">Jumlah</label>
									<input type="text" class="form-control" name="text-jumlah"
										placeholder="Nama Siswa" value=1 readonly>
								</div>
								<div class="mb-3">
									<label class="form-label">TGL Peminjaman</label>
									<input type="date" id="demo" class="form-control" name="dt-peminjaman" value="<?= $tglpjm?>" required>
								</div>
								<div class="mb-3">
									<label class="form-label">TGL Pengembalian</label>
									<input type="date" id="demo2" class="form-control" name="dt-pengembalian" value="<?= $tglkbl?>" required>
								</div>
								<div class="mb-3">
									<label class="form-label">Kode Admin</label>
									<input type="text" class="form-control" name="text-kodeapadmin"
										placeholder="Kode Admin" value="<?= $kode?>" readonly>
								</div>
							</div>
							<div class="modal-footer">
								<button type="submit" class="btn btn-primary" name="button-simpan">Simpan</button>
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
							</div>
									</form>
								</div>
							</div>
						</div>
						<!-- Akhir Modal -->
						</tr>
							</tbody>
							<?php
							$i++;
							}
							?>
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
	$(document).ready(function() {
		var table = $('#example').DataTable( {
		scrollY: 300,
        scrollX: true,
        lengthChange: false,
		buttons: [
            'colvis', 'excel', 'pdf', 'print'
        ]
		
		
    } );
 
    table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
	} );
	</script>
</body>

</html>