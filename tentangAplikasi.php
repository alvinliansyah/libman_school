<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
	<link rel="website icon" type="png" href="../libman_school/img/Logo.png">
	<title>Tentang Aplikasi - Libman School</title>
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
			<li><a href="pengembalian.php" ><i class='bx bx-arrow-to-bottom icon'></i>Pengembalian</a></li>
			<li><a href="riwayat.php"><i class='bx bx-history icon'></i>Riwayat</a></li>
        <ul class="buttom-side-menu">
            <li>
			<a href="#"><i class='bx bx-help-circle icon'></i> Bantuan <i class='bx bx-chevron-right icon-right' ></i></a>
				<ul class="side-dropdown">
					<li><a href="pelayananPelanggan.php">Pelayanan Pelanggan</a></li>
					<li><a href="#" class="active">Tentang Aplikasi</a></li>
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
			<div id="MyClockDisplay" class="clock float-start" style="line-height: 35px; color: white; font-weight: 600; font-size: 15px; font-family: 'Open Sans', sans-serif; letter-spacing: 3px; position: absolute; top: 15px; right: 80px;" onload="showTime()"></div>
			&nbsp
			<a style="color:white; text-decoration: none; font-weight: 600; font-size: 18px; position: absolute; top: 18px; right: 65px;">|</a>
			&nbsp
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
			<h1 class="title">Tentang Aplikasi</h1>
			<ul class="breadcrumbs">
				<li><a href="dashboard.php">Home</a></li>
				<li class="divider">/</li>
                <li><a href="#" class="active">Bantuan</a></li>
                <li class="divider">/</li>
				<li><a href="#" class="active">Tentang Aplikasi</a></li>
			</ul>
			<div class="card shadow">
					<h4 class="card-header text-bg-primary mb-3 fw-semibold"><center>Tentang Aplikasi
					</center></h4>
						<div class="card-body">
							<center>
							<img src="../libman_school/img/Logo2.png" style="width: 250px;" alt="">
						</center>
						<br/>
						<div class="text">
						<p style="text-indent: 45px;">Libman School merupakan sebuah aplikasi manajemen perpustakaan yang berfungsi untuk memudahkan penggunanya untuk mengatur segala aktivitas di dalam perpustakaan secara cepat dan efisien. Libman School berasal dari pengertian dari keseluruhan fungsi aplikasi ini, Kata awal “Lib” kami ambil dari kata “Library” yang berarti perpustakaan dan “Man” kami ambildari kata “Management” yang berarti pengelolaan. </p>
						<p style="text-indent: 45px;">Aplikasi ini kami rancang dengan dua jenis versi yaitu mobile dan website, Keduanya memiliki fungsi berbeda namun saling melengkapi. Website digunakan oleh admin untuk melakukan manajemen dan mengolah data dalam perpustakaan, sedangkan Mobile diperuntukan untuk pengguna kalangan umum untuk melakukan transasksi peminjaman dan pengembalian buku.</p>
						<p style="text-indent: 45px;">Selain fitur utama dalam website yang disebutkan di atas, kami juga menyediakan bebagai fitur yang dapat memudahkan dan mempercepat kineja admin dalam mengelola data seperti eksport dan import dari file PDF, Excel, Scan Barcode cerdas menggunakan kartu perpustakaan dalam melakukan Transaksi, Selain itu admin juga dapat mengedit database secara real time dengan mudah dan cepat.</p>
						<p style="text-indent: 45px;">Dalam versi mobile juga memiliki berbagai fitur yang menarik dan mudah digunakan oleh pengguna, seperti fitur pemberithuan memerlukan tindakan yang berfungsi untuk memperlihatkan pengguna mengenai status batas waktu peminjaman agar pengguna tidak melewati batas peminjaman buku. Selain itu juga ada fitur tambah favorite yang berfungsi untuk menambahkan buku ke daftar favorite sebagai pengingat buku yang akan dipinjam di kemudian hari tanpa harus mencarinya kembali.</p>
						</div>
						</div>
						</div>
			</div>
			<br/>
			<footer>
			<center>
			<div class="text">
				<span>Created By <a href="#">Libman School</a> | &#169; 2022 All Rights Reserved</span>
			</div>
			</center>
			</footer>
			<br/>	
		</main>
		<!-- MAIN -->
	</section>
	<!-- NAVBAR -->

	<script src="script.js"></script>
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
