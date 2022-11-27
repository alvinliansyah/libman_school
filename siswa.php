<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="DataTables/DataTables-1.12.1/css/dataTables.bootstrap5.min.css">
	<link rel="stylesheet" type="text/css" href="DataTables/Buttons-2.2.3/css/buttons.bootstrap5.min.css">
	<link rel="website icon" type="png" href="../libman_school/img/Logo.png">
	<title>Siswa - Libman School</title>
</head>

<body>
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
					<li><a href="profile.php"><i class='bx bx-user icon'></i> Profile</a></li>
				</ul>
			</div>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<h1 class="title ">Siswa</h1>
			<ul class="breadcrumbs">
				<li><a href="dashboard.php">Home</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Siswa</a></li>
			</ul>
			
					<div class="card shadow">
					<h4 class="card-header text-bg-primary mb-3 fw-semibold"><center>Data Kelas
					<div class="dropdown float-end">
						<button class="btn dropdown border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="left: 20px; color: white; top: -3px;">
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
						<div class="container">
							<table id="example" class="table table-striped table-hover" style="width:100%">
								<thead>
									<tr>
										<th>NO</th>
										<th>TINGKATAN</th>
										<th>KELAS</th>
										<th>JUMLAH SISWA</th>
										<th>AKSI</th>
									</tr>
								</thead>
								<tbody>
									<tr>
								<?php
								include 'koneksi.php';

								$dataAdmin = mysqli_query($koneksi, "SELECT DISTINCT kelas, tingkatan, COUNT(nama_siswa) AS total FROM data_siswa GROUP BY kelas, tingkatan;");
								$i=1;
								while ($row = mysqli_fetch_array($dataAdmin, MYSQLI_ASSOC)) {
								?>
								<td><?php echo $i++?></td>
								<td><?php echo $row['tingkatan']; ?></td>
								<td><?php echo $row['kelas']; ?></td>
								<td><?php echo $row['total'];?></td>
										<td>
										<strong><button type="button" class="btn btn-primary" ><a href="detailSiswa.php?kelas=<?=$row['kelas'];?> && tingkatan=<?=$row['tingkatan']?>" style= "color:white; text-decoration: none; font-weight: normal;"><i class='bx bx-show-alt icon'></i>&nbsp;Lihat</a></strong></button>
										</td>
									</tr>
									<?php } ?>
									
								</tbody>
								<tfoot>
							</tfoot>
							</table>
						</div>
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
	$(document).ready(function() {
		var table = $('#example').DataTable( {
		scrollY: 330,
        scrollX: true,
        lengthChange: false,
        buttons: [ 'colvis' ]
		
		
    } );
 
    table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
	} );
	</script>
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