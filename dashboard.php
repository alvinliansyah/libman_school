<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
	<title>Dashboard - Libman School</title>
</head>
<body>
	
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<img src="../libman_school/img/Logo.png" alt="">
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
				<a href="#"><i class='bx bx-cog icon' ></i> Pengaturan <i class='bx bx-chevron-right icon-right' ></i></a>
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
			<i class='bx bx-menu toggle-sidebar' ></i>
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
			<h1 class="title">Dashboard</h1>
			<ul class="breadcrumbs">
				<li><a href="#">Home</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Dashboard</a></li>
			</ul>
			<div class="info-data">
				<div class="card">
					<div class="head">
						<div>
							<h2>1500</h2>
							<p>Jumlah Buku Di Perpustakaan</p>
						</div>
					</div>
					<span class="progress" data-value="40%"></span>
					<span class="label">bulan</span>
				</div>
				<div class="card">
					<div class="head">
						<div>
							<h2>234</h2>
							<p>Jumlah Buku Tersedia Di Perpustakaan</p>
						</div>
					</div>
					<span class="progress" data-value="60%"></span>
					<span class="label">bulan</span>
				</div>
				<div class="card">
					<div class="head">
						<div>
							<h2>465</h2>
							<p>Jumlah Buku Sedang Proses Peminjaman</p>
						</div>
					</div>
					<span class="progress" data-value="30%"></span>
					<span class="label">bulan</span>
				</div>
				<div class="card">
					<div class="head">
						<div>
							<h2>900</h2>
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
				<div class="card">
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
			<div class="card">
					<h4 class="card-header text-bg-primary mb-3 fw-semibold"><center>Memerlukan Tindakan
					</center></h4>
						<div class="card-body">
						
						</div>
						</div>
			</div>
				
</div>
</div>
				</div>
			</div>		
		</main>
		<!-- MAIN -->
	</section>
	<!-- NAVBAR -->

	<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
	<script src="script.js"></script>
	<script src="chart.js"></script>
</body>
</html>
