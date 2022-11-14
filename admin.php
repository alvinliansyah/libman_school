<?php
require_once 'admin.php';
require_once 'koneksi.php';

session_start();

if (isset($_POST['button-simpan'])) {
$id = $_POST['text-kodeadmin'];
$nama = $_POST['text-namalengkapadmin'];
$password = $_POST['password'];
$image = $_POST['file-fotoprofile'];
    mysqli_query($koneksi,"INSERT INTO data_admin VALUES ('$id','$nama','$password','$image')");
    header('location:admin.php'); 
   
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="DataTables/DataTables-1.12.1/css/dataTables.bootstrap5.min.css">
	<link rel="stylesheet" type="text/css" href="DataTables/Buttons-2.2.3/css/buttons.bootstrap5.min.css">
	<title>Admin - Libman School</title>
</head>

<body>

	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<img src="../libman_school/img/Logo.png" alt="">
			<span class="brand">Libman School</span>
		</a>
		<ul class="side-menu">
			<li><a href="dashboard.php"><i class='bx bx-home icon'></i> Dashboard</a></li>

			<li class="divider" data-text="data master">Data Master</li>
			<li><a href="siswa.php"><i class='bx bx-group icon'></i>Siswa</a></li>
			<li><a href="#" class="active"><i class='bx bx-user icon'></i>Admin</a></li>
			<li><a href="buku.php"><i class='bx bx-book icon'></i>Buku</a></li>
			<li class="divider" data-text="transaksi">Transaksi</li>
			<li><a href="peminjaman.php"><i class='bx bx-arrow-from-bottom icon'></i>Peminjaman</a></li>
			<li><a href="pengembalian.php"><i class='bx bx-arrow-to-bottom icon'></i>Pengembalian</a></li>
			<li><a href="riwayat.php"><i class='bx bx-history icon'></i>Riwayat</a></li>
			<ul class="buttom-side-menu">
				<li>
					<a href="#"><i class='bx bx-cog icon'></i> Pengaturan <i
							class='bx bx-chevron-right icon-right'></i></a>
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
			<i class='bx bx-menu toggle-sidebar'></i>
			<form action="#">

			</form>
			<div class="profile">
				<img src="../libman_school/img/default-avatar.png" alt="">
				<ul class="profile-link">
					<li><a href="profile.php"><i class='bx bx-user icon'></i> Profile</a></li>
				</ul>
			</div>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<h1 class="title">Admin</h1>
			<ul class="breadcrumbs">
				<li><a href="dashboard.php">Home</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Admin</a></li>
			</ul>
			<div class="data">
				<div class="content-data">
					<div class="head">
						<h3>Data Admin</h3>
						<div class="menu">
							<i class='bx bx-dots-horizontal-rounded icon bx-sm'></i>
							<ul class="menu-link">
								<li><a href="tambah_admin.php" data-bs-toggle="modal" data-bs-target="#modalTambahData">Tambah Data</a>
								</li>
								<li><a href="#">Refresh</a></li>
							</ul>
						</div>
					</div>
					<div class="container">
						<table id="example" class="table table-striped table-hover" style="width:100%">
							<thead>
								<tr>
									<th>NO</th>
									<th>KODE ADMIN</th>
									<th>NAMA ADMIN</th>
									<th>PASSWORD</th>
									<th>FOTO PROFILE</th>
								</tr>
							</thead>
							<tbody>
								<?php
								include 'koneksi.php';

								$dataAdmin = mysqli_query($koneksi, "select * from data_admin");
								$i=1;
								while ($row = mysqli_fetch_array($dataAdmin, MYSQLI_ASSOC)) {
								?>
								<tr>
									<td><?php echo $i++?></td>
									<td><?php echo $row['id_admin']; ?></td>
									<td><?php echo $row['nama_admin']; ?></td>
									<td><?php echo $row['password']; ?></td>
									<td><?php echo $row['gambar']; ?></td>
								</tr>
								<?php } ?>
							</tbody>
							<tfoot>
								<tr>
									<th>NO</th>
									<th>KODE ADMIN</th>
									<th>NAMA ADMIN</th>
									<th>PASSWORD</th>
									<th>FOTO PROFILE</th>
								</tr>
							</tfoot>
						</table>
						<!-- Awal Modal -->
						<div class="modal fade" id="modalTambahData" data-bs-backdrop="static" data-bs-keyboard="false"
							tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data Admin</h1>
										<button type="button" class="btn-close" data-bs-dismiss="modal"
											aria-label="Close"></button>
									</div>
									<form method="POST" action="admin.php?menu=admin&act=admin">
									<div class="modal-body">
										<div class="mb-3">
											<label class="form-label">Kode Admin</label>
											<input type="text" class="form-control" name="text-kodeadmin"
												placeholder="Kode Admin" required>
										</div>
										<div class="mb-3">
											<label class="form-label">Nama Admin</label>
											<input type="text" class="form-control" name="text-namalengkapadmin"
												placeholder="Nama Admin" required>
										</div>
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input type="password" class="form-control" name="password"
												placeholder="Password" required>
										</div>
										<div class="mb-3">
											<label class="form-label">Foto Profile</label>
											<input type="file" class="form-control" name="file-fotoprofile" required>
										</div>

									</div>
									<div class="modal-footer">
										<button type="submit" class="btn btn-primary" name="button-simpan">Simpan</button>
										<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
									</div>
									</form>
								</div>
							</div>
						</div>
						<!-- Akhir Modal -->
					</div>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- NAVBAR -->

	<script src="script.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
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
		$(document).ready(function () {
			var table = $('#example').DataTable({
				lengthChange: false,
				buttons: ['copy', 'excel', 'pdf', 'colvis']
			});

			table.buttons().container()
				.appendTo('#example_wrapper .col-md-6:eq(0)');
		});
	</script>
</body>

</html>