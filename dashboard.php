<?php
require_once 'koneksi.php';

session_start();

$dataBuku = mysqli_query($koneksi, "SELECT COUNT(kd_buku) as total FROM data_buku");
while ($row = mysqli_fetch_array($dataBuku, MYSQLI_ASSOC)) {
	$total = $row['total'];
};

$dataBukuPinjam = mysqli_query($koneksi, "SELECT COUNT(kd_buku) as total FROM data_buku WHERE jumlah=0");
while ($row = mysqli_fetch_array($dataBukuPinjam, MYSQLI_ASSOC)) {
	$jumlah = $row['total'];
};

$tersedia = mysqli_query($koneksi, "SELECT COUNT(kd_buku) as total FROM data_buku WHERE jumlah=1");
while ($row = mysqli_fetch_array($tersedia, MYSQLI_ASSOC)) {
	$ada = $row['total'];
};

$dataSiswa = mysqli_query($koneksi, "SELECT COUNT(NIS) as keseluruhan FROM data_siswa");
while ($row = mysqli_fetch_array($dataSiswa, MYSQLI_ASSOC)) {
	$keseluruhan = $row['keseluruhan'];
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="website icon" type="png" href="img/Logo.png">
	<link rel="stylesheet" href="style.css">
	<title>Dashboard - Libman School</title>
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
			<li><a href="#" class="active"><i class='bx bx-home icon'></i> Dashboard</a></li>
			
			<li class="divider" data-text="data master">Data Master</li>
			<li><a href="siswa.php"><i class='bx bx-group icon'></i>Siswa</a></li>
			<li><a href="admin.php"><i class='bx bx-user icon'></i>Admin</a></li>
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
		<nav >
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
			<h1 class="title">Dashboard</h1>
			<ul class="breadcrumbs">
				<li><a href="#">Home</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Dashboard</a></li>
			</ul>
			<div class="info-data">
				<div class="card shadow">
					<div class="head">
						<div>
							<h2><?php echo $total?></h2>
							<p>Jumlah Buku Keseluruhan</p>
						</div>
					</div>
					<span class="progress" data-value="40%"></span>
					<span class="label">bulan</span>
				</div>
				<div class="card shadow">
					<div class="head">
						<div>
							<h2><?php echo $ada?></h2>
							<p>Jumlah Buku Tersedia Di Perpustakaan</p>
						</div>
					</div>
					<span class="progress" data-value="60%"></span>
					<span class="label">bulan</span>
				</div>
				<div class="card shadow">
					<div class="head">
						<div>
							<h2><?php echo $jumlah?></h2>
							<p>Jumlah Buku Sedang Proses Peminjaman</p>
						</div>
					</div>
					<span class="progress" data-value="30%"></span>
					<span class="label">bulan</span>
				</div>
				<div class="card shadow">
					<div class="head">
						<div>
							<h2><?php echo $keseluruhan?></h2>
							<p>Total Siswa</p>
						</div>
					</div>
					<span class="progress" data-value="90%"></span>
					<span class="label">tahun</span>
				</div>
			</div>
	</br>
	<div class="row">
  <div class="col-sm-6">
				<div class="card shadow" style="height: 650px;">
					<h4 class="card-header text-bg-primary mb-3 fw-semibold"><center>Chart Buku
					</center></h4>
						<div class="card-body">
						<div class="charts">
						<div id="chart" id="doughnut"></div>
						<canvas id="doughnut"></canvas>
					</div>
						</div>
						</div>
			</div>
			<div class="col-sm-6">
			<div class="card shadow" style="height: 650px;">
					<h4 class="card-header text-bg-primary mb-3 fw-semibold"><center>Memerlukan Tindakan
					</center></h4>
						<div class="card-body">
						<div class="table-wrapper-scroll-y my-custom-scrollbar">
						<table class="table table-bordered table-striped mb-0">
						<tbody>
							<tr>
							<td>
							<span style="color:black; text-decoration: none; font-weight: 600; font-size: 16px;">Rudi<br/><span class="badge text-bg-danger p-3 bg-opacity-25 text-body" style="text-decoration: none; font-weight: 300; font-size: 14px;">Status : Harus dikembalikan sebelum (02/12/2022)</span></span>
							</td>
							</tr>
							<tr>
							<td>
							<span style="color:black; text-decoration: none; font-weight: 600; font-size: 16px;">Agus<br/><span class="badge text-bg-danger p-3 bg-opacity-25 text-body" style="text-decoration: none; font-weight: 300; font-size: 14px;">Status : Harus dikembalikan sebelum (02/12/2022)</span></span>
							</td>
							</tr>
							<tr>
							<td>
							<span style="color:black; text-decoration: none; font-weight: 600; font-size: 16px;">Kemal<br/><span class="badge text-bg-danger p-3 bg-opacity-25 text-body" style="text-decoration: none; font-weight: 300; font-size: 14px;">Status : Harus dikembalikan sebelum (02/12/2022)</span></span>
							</td>
							</tr>
							<tr>
							<td>
							<span style="color:black; text-decoration: none; font-weight: 600; font-size: 16px;">Rani<br/><span class="badge text-bg-warning p-3 bg-opacity-25 text-body" style="text-decoration: none; font-weight: 300; font-size: 14px;">Status : Harus dikembalikan sebelum (10/12/2022)</span></span>
							</td>
							</tr>
							<tr>
							<td>
							<span style="color:black; text-decoration: none; font-weight: 600; font-size: 16px;">Agil<br/><span class="badge text-bg-warning p-3 bg-opacity-25 text-body" style="text-decoration: none; font-weight: 300; font-size: 14px;">Status : Harus dikembalikan sebelum (10/12/2022)</span></span>
							</td>
							</tr>
							<tr>
							<td>
							<span style="color:black; text-decoration: none; font-weight: 600; font-size: 16px;">Ali<br/><span class="badge text-bg-warning p-3 bg-opacity-25 text-body" style="text-decoration: none; font-weight: 300; font-size: 14px;">Status : Harus dikembalikan sebelum (10/12/2022)</span></span>
							</td>
							</tr>
							<tr>
							<td>
							<span style="color:black; text-decoration: none; font-weight: 600; font-size: 16px;">Raka<br/><span class="badge text-bg-success p-3 bg-opacity-25 text-body" style="text-decoration: none; font-weight: 300; font-size: 14px;">Status : Harus dikembalikan sebelum (23/12/2022)</span></span>
							</td>
							</tr>
							<tr>
							<td>
							<span style="color:black; text-decoration: none; font-weight: 600; font-size: 16px;">Raihan<br/><span class="badge text-bg-success p-3 bg-opacity-25 text-body" style="text-decoration: none; font-weight: 300; font-size: 14px;">Status : Harus dikembalikan sebelum (23/12/2022)</span></span>
							</td>
							</tr>
							<tr>
							<td>
							<span style="color:black; text-decoration: none; font-weight: 600; font-size: 16px;">Tama<br/><span class="badge text-bg-success p-3 bg-opacity-25 text-body" style="text-decoration: none; font-weight: 300; font-size: 14px;">Status : Harus dikembalikan sebelum (23/12/2022)</span></span>
							</td>
							</tr>
							

						</tbody>
						</table>

					</div>
					<br/>
					</div>
					</div>
					</div>
							
			</div>
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

	<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
	<script src="script.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
		$(window).on("load",function(){
			$(".loader-wrapper").fadeOut("slow");
		});
	</script>
	<script>
		const ctx = document.getElementById('doughnut').getContext('2d');
		const myChart = new Chart(ctx, {
			type: 'doughnut',
			data: {
				labels: ['Jumlah Buku Tersedia Di Perpustakaan', 'Jumlah Buku Sedang Proses Peminjaman'],
				datasets: [{
					label: 'Chart Buku',
					data: [<?=$ada?>, <?=$jumlah?>],
					backgroundColor: [
						'rgba(255, 139, 3, 1)',
						'rgba(255, 76, 29, 1)'
					],
					borderColor: [
						'rgba(255, 139, 3, 1)',
						'rgba(255, 76, 29, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				responsive: true
			}
		});
	</script>
</body>
</html>
