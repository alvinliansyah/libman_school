<?php
require_once 'koneksi.php';
session_start();
if(!isset($_SESSION['id_admin'])){
	$_SESSION['msg'] = "Anda Harus Login Dulu";
	header('Location:login.php');
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
	<title>Admin - Libman School</title>
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
			<li><a href="#" class="active"><i class='bx bx-user icon'></i>Admin</a></li>
			<li><a href="buku.php"><i class='bx bx-book icon'></i>Buku</a></li>
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
				<img src="img/default-avatar.png" alt="">
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
			
			<div class="card shadow">
			<h4 class="card-header text-bg-primary mb-3 fw-semibold"><center>Data Admin&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<strong><button type="button" class="btn btn-outline-light btn-sm float-end"  style=" position: relative; top: 1.5px; left: -42px;"><a href="#" data-bs-toggle="modal" data-bs-target="#modalTambahData" style= "font-size: 14.5px; color:white; text-decoration: none; font-weight: normal;"><i class='bx bx-add-to-queue icon'></i>&nbsp;Tambah Data</a></strong></button>
						<a class="float-end" style="font-size: 28px; color:white; text-decoration: none; font-weight: normal; color: white; position: relative; top: -2px; left: 111px;">|</a>
						<div class="dropdown float-end">
						<button class="btn dropdown border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="position: absolute;left:110px; color: white; top: -3px;">
						<i class='bx bx-dots-vertical-rounded icon' style="font-size: 30px;"></i>
						</button>
						<ul class="dropdown-menu">
						<li><a class="dropdown-item"  href="#">Import Excel</a></li>
						<li><a class="dropdown-item"  href="#">Export Excel</a></li>
						<li><a class="dropdown-item" href="#">Export PDF</a></li>
						</ul>
					</div>
					</center></h4>
						<div class="card-body">
						<div class="input-group" style="width: 220px;left: 10px;">
						<input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
						<button type="button" class="btn btn-primary"><i class='bx bx-search icon'></i></button>
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
								$dataAdmin = mysqli_query($koneksi, "select * from data_admin");
								$i=1;
								while ($row = mysqli_fetch_array($dataAdmin, MYSQLI_ASSOC)) {
								?>
								<tr>
									<td><?php echo $i?></td>
									<td><?php echo $row['id_admin']; ?></td>
									<td><?php echo $row['nama_admin']; ?></td>
									<td><?php echo $row['password']; ?></td>
									<td><?php echo $row['gambar'];?></td>
								</tr>
								<?php 
								$i++;
								} 
								?>
							</tbody>
							<tfoot>
							</tfoot>
						</table>
						<!-- Awal Modal -->
						<div class="modal fade" id="modalTambahData" data-bs-backdrop="static" data-bs-keyboard="false"
							tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header text-bg-primary mb-3">
										<h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data Admin</h1>
										<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
											aria-label="Close"></button>
									</div>
									<form method="POST" action="tambahAdmin.php">
										<?php
										$idAdmin=mysqli_query($koneksi, "SELECT MAX(id_admin) as id from data_admin");
										while ($row = mysqli_fetch_array($idAdmin, MYSQLI_ASSOC)) {
										?>
									<div class="modal-body">
										<div class="mb-3">
											<label class="form-label">ID Admin</label>
											<input type="text" class="form-control" name="text-id" 
												value="<?php echo $row["id"]+1?>" readonly>
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
									</div>
									<div class="modal-footer">
										<button type="submit" class="btn btn-primary" name="button-simpan">Simpan</button>
										<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
									</div>
									</form>
								</div>
							</div>
						</div>
						<?php }?>
						<!-- Akhir Modal -->
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
		scrollY: 330,
        scrollX: true,
        lengthChange: false,
        lengthChange: false,
        bFilter: false,
		bPaginate: false
		
		
    } );

			table.buttons().container()
				.appendTo('#example_wrapper .col-md-6:eq(0)');
		});

	</script>
</body>

</html>