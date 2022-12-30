<?php
require_once 'koneksi.php';

session_start();
if(!isset($_SESSION['id_admin'])){
	$_SESSION['msg'] = "Anda Harus Login Dulu";
	header('Location:login.php');
}

$data = mysqli_query($koneksi, "SELECT * FROM data_admin WHERE id_admin=$_SESSION[id_admin]");

while ($row = mysqli_fetch_array($data, MYSQLI_ASSOC)) {
	$kode = $row['id_admin'];
	$nama = $row['nama_admin'];
	$pass = $row['password'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link rel="website icon" type="png" href="img/Logo.png">
	<link rel="stylesheet" href="style.css">
	<title>Profile - Libman School</title>
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
				<li><a href="#" class="active"><i class='bx bx-user icon'></i> Profile</a></li>
				</ul>
			</div>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<h1 class="title">Profile</h1>
			<ul class="breadcrumbs">
				<li><a href="dashboard.php">Home</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Profile</a></li>
			</ul>
			<div class="card shadow">
					<h4 class="card-header text-bg-primary mb-3 fw-semibold"><center>Profile
					<div class="dropdown float-end">
						<button class="btn btn-outline-light btn-sm float-end dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="left: 10px; color: white; top: -3px;">
						<i class='bx bx-cog bx-sm icon' ></i>
						</button>
						<ul class="dropdown-menu">
						<li><a class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#modalEditAkun">Edit Akun</a></li>
						<li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalHapusAkun">Hapus Akun</a></li>
						</ul>
					</div>
					</center></h4>
						<div class="card-body">
						<div class="profile-form">
						<form action="#">
						<center><div><img src="img/default-avatar.png" alt="" class="img-profile"></div></center>
						<br/>
						<div>
						<label class="form-label">Kode Admin</label>
						<div class="field input-field">
							<input type="text" class="form-control" style="height: 50px;" name = "kdadmin" value="<?= $kode?>" readonly>
						</div>
						<label class="form-label">Nama Admin</label>
						<div class="field input-field">
							<input type="text" class="form-control" style="height: 50px;" name = "namaadmin" placeholder="Nama Admin" value="<?= $nama?>" readonly>
						</div>
						<label class="form-label">Password</label>
						<div class="field input-field">
							<input type="text" class="form-control" style="height: 50px;" name = "pass" placeholder="Password" value="<?= $pass?>" readonly>
						</div>
             		 </form>
						<!-- Awal Modal -->
						<div class="modal fade" id="modalEditAkun" data-bs-backdrop="static" data-bs-keyboard="false"
							tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header text-bg-primary mb-3">
										<h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Akun</h1>
										<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
											aria-label="Close"></button>
									</div>
									<form method="POST" action="editAkun.php"></form>
									<div class="modal-body">
										<div class="mb-3">
											<label class="form-label">Kode Admin</label>
											<input type="text" class="form-control" name="text-kodeadmin"
												value="<?= $kode?>" readonly>
										</div>
										<div class="mb-3">
											<label class="form-label">Nama Admin</label>
											<input type="text" class="form-control" name="text-namalengkapadmin"
												placeholder="Nama Admin" value="<?= $nama?>" required>
										</div>
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input type="password" class="form-control" name="password"
												placeholder="Password" value="<?= $pass?>"required>
										</div>
										<div class="mb-3">
											<label class="form-label">Foto Profile</label>
											<input id="file-fotoprofile" accept="image/*" type="file" class="form-control" name="file-fotoprofile" required>
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
						<!-- Awal Modal Hapus Data -->
						<div class="modal fade" id="modalHapusAkun" data-bs-backdrop="static" data-bs-keyboard="false"
							tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header text-bg-primary mb-3">
										<h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus Akun?</h1>
										<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
											aria-label="Close"></button>
									</div>
									<form method="POST" action="hapusAkun.php">
									<div class="modal-body">Apakah anda yakin ingin menghapus Akun?</div>
									<div class="mb-3">
											<input type="hidden" class="form-control" name="text-kodeadmin"
												value="<?=$kode?>" required>
										</div>
									<div class="modal-footer">
										<button type="submit" class="btn btn-danger" name="button-submithapusdata">Hapus</button>
									</div>
									</form>
								</div>
							</div>
						</div>
						<!-- Akhir Modal -->
						<?php 
							}
							?>
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

	<script src="script.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
	<script>
		$(window).on("load",function(){
			$(".loader-wrapper").fadeOut("slow");
		});
	</script>
	<script>
	const file_fotoprofile = document.getElementById('file-fotoprofile');

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