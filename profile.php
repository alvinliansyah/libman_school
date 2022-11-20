<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="website icon" type="png" href="../libman_school/img/Logo.png">
	<link rel="stylesheet" href="style.css">
	<title>Profile - Libman School</title>
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
				<li><a href="#"><i class='bx bx-log-out-circle icon'></i>Keluar</a></li>
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
			<div id="MyClockDisplay" class="clock float-start" style="line-height: 35px; color: white; font-weight: 600; font-size: 15px; font-family: 'Open Sans', sans-serif; letter-spacing: 3px; position: absolute; top: 15px; right: 80px;" onload="showTime()"></div>
			&nbsp
			<a style="color:white; text-decoration: none; font-weight: 600; font-size: 18px; position: absolute; top: 18px; right: 65px;">|</a>
			&nbsp
			<div class="profile">
				<img src="../libman_school/img/default-avatar.png" alt="">
				<ul class="profile-link">
				<li><a href="#" class="active"><i class='bx bx-user icon'></i> Profile</a></li>
					<li><a href="#" data-bs-toggle="modal" data-bs-target="#modalEditAkun"><i class='bx bx-edit icon'></i>Edit Akun</a></li>
					<li><a href="#" data-bs-toggle="modal" data-bs-target="#modalHapusAkun"><i class='bx bx-trash'></i>Hapus Akun</a></li>
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
					</center></h4>
						<div class="card-body">
						<div class="profile-form">
						<form action="#">
							<center><div><img src="../libman_school/img/default-avatar.png" alt="" class="img-profile"></div></center>
							<div class="input-boxes">
								<label class="form-label">Kode Admin</label>
								<div class="field input-field">
									<input type="text" class="tkodeadmin" placeholder="Kode Admin" required>
								</div>
							</br>
								<label class="form-label">Nama Lengkap Admin</label>
								<div class="field input-field">
									<input type="text" class="tnamalengkapadmin" placeholder="Nama Lengkap Admin"
										required>
								</div>
							</br>
								<label class="form-label">Username</label>
								<div class="field input-field">
									<input type="text" class="tusername" placeholder="Username" required>
								</div>
							</br>
								<label class="form-label">Password</label>
								<div class="field input-field">
									<input type="password" class="password" placeholder="Password" required>
								</div>
							</br>
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
									<form method="POST" action="#"></form>
									<div class="modal-body">
										<div class="mb-3">
											<label class="form-label">Kode Admin</label>
											<input type="text" class="form-control" name="text-kodeadmin"
												placeholder="Kode Admin" required>
										</div>
										<div class="mb-3">
											<label class="form-label">Nama Lengkap Admin</label>
											<input type="text" class="form-control" name="text-namalengkapadmin"
												placeholder="Nama Lengkap Admin" required>
										</div>
										<div class="mb-3">
											<label class="form-label">Username</label>
											<input type="text" class="form-control" name="text-username"
												placeholder="Username" required>
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
									<form method="POST" action="#"></form>
									<div class="modal-body">Apakah anda yakin ingin menghapus Akun?</div>
									<div class="modal-footer">
										<button type="submit" class="btn btn-danger" name="button-submithapusdata">Hapus</button>
									</div>
									</form>
								</div>
							</div>
						</div>
						<!-- Akhir Modal -->
					</div>
				</div>
						</div>
						</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- NAVBAR -->

	<script src="script.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script>
				function showTime(){
                var date = new Date();
                var h = date.getHours(); // 0 - 23
                var m = date.getMinutes(); // 0 - 59
                var s = date.getSeconds(); // 0 - 59
                var session = "AM";
                
                if(h == 0){
                    h = 12;
                }
                
                if(h > 12){
                    h = h - 12;
                    session = "PM";
                }
                
                h = (h < 10) ? "0" + h : h;
                m = (m < 10) ? "0" + m : m;
                s = (s < 10) ? "0" + s : s;
                
                var time = h + ":" + m + ":" + s + " " + session;
                document.getElementById("MyClockDisplay").innerText = time;
                document.getElementById("MyClockDisplay").textContent = time;
                
                setTimeout(showTime, 1000);
                
            }

            showTime();
			</script>
</body>

</html>