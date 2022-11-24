<?php
include 'koneksi.php';
include 'tambahBuku.php';

$kd = $_GET['id'];
$dataBuku = mysqli_query($koneksi, "SELECT * FROM data_buku WHERE kd_buku = $kd");
$i=1;
while ($row = mysqli_fetch_array($dataBuku, MYSQLI_ASSOC)) {
	$jenisbuku = $row['jenis_buku'];
};
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
	<link rel="website icon" type="png" href="../libman_school/img/Logo.png">
	<title>Buku - Libman School</title>
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
			<h1 class="title">Buku
			<div class="card float-end shadow" style="height: 3.5rem; width: auto; top: 10px;">
			<div class="card-header text-bg-primary" style="padding: 4px"></div>
			<div class="card-body">
				<center><p class="card-title" style="font-family: 'Open Sans', sans-serif; font-weight: 1000; font-size: 17px; line-height: 14px;"><?php echo $jenisbuku?></p></center>
			</div>
			</div>
			</h1>
			<ul class="breadcrumbs">
				<li><a href="dashboard.php">Home</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Buku</a></li>
			</ul>
			<div class="card shadow">
			<h4 class="card-header text-bg-primary mb-3 fw-semibold">
					<center><strong><button type="button" class="btn btn-outline-light btn-sm float-start" ><a href="buku.php"style= "color:white; text-decoration: none; font-weight: normal;"><i class='bx bx-chevron-left icon bx-sm'></i></a></strong></button>
						Data Buku
						<strong><button type="button" class="btn btn-outline-light btn-sm float-end" ><a href="tambahBuku.php" data-bs-toggle="modal" data-bs-target="#modalTambahData" style= "color:white; text-decoration: none; font-weight: normal;">Tambah Data</a></strong></button>
					</center></h4>
						<div class="card-body">
						<div class="container">
						<table id="example" class="table table-striped table-hover" style="width:100%">
							<thead>
								<tr>
									<th>NO</th>
									<th>KODE BUKU</th>
									<th>JUDUL</th>
									<th>FOTO COVER BUKU</th>
									<th>SEMESTER</th>
									<th>TINGKATAN</th>
									<th>AKSI</th>
								</tr>
							</thead>
							<tbody>
								<tr>
								<?php						
								$dataBuku = mysqli_query($koneksi, "SELECT buku_paket.kd_paket, buku_paket.nama_mapel, buku_paket.foto_cover, buku_paket.semester, buku_paket.tingkatan FROM buku_paket WHERE kd_buku = $kd");
								$i=1;
								while ($row = mysqli_fetch_array($dataBuku, MYSQLI_ASSOC)) {
								?>
									<td><?php echo $i++?></td>
									<td><?php echo $row['kd_paket']; ?></td>
									<td><?php echo $row['nama_mapel']; ?></td>
									<td><?php echo $row['foto_cover'];?></td>
									<td><?php echo $row['semester']; ?></td>
									<td><?php echo $row['tingkatan']; ?></td>
									<td>
									<div class="btn-group" role="group" aria-label="Basic mixed styles example">
											<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEditData"><i class='bx bx-edit icon bx-xs'></i></button>
											<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapusData"><i class='bx bx-trash icon bx-xs'></i></button>
								</div>
										</td>
								</tr>
								<?php } ?>
							</tbody>
							<tfoot>
							</tfoot>
						</table>
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
									<form method="POST" action="tambahBuku.php"></form>
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
											<label class="form-label">Foto Cover Buku</label>
											<input type="file" class="form-control" name="file-fotocoverbuku" required>
										</div>
										<div class="mb-3">
											<label class="form-label">Semester</label>
											<select class="form-select" name="text-semester">
												<option></option>
												<option value="Semester Ganjil">1</option>
												<option value="Semester Genap">2</option>
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
											<label class="form-label">Kelas</label>
											<select class="form-select" name="text-kelas">
												<option></option>
												<option value="A">1</option>
												<option value="B">2</option>
												<option value="C">3</option>
											</select>
										</div>
										<div class="mb-3">
											<label class="form-label">Peminjaman</label>
											<input type="number" class="form-control" name="number-peminjaman"
												placeholder="Peminjaman" required>
										</div>
										<div class="mb-3">
											<label class="form-label">Pengembalian</label>
											<input type="number" class="form-control" name="number-pengembalian"
												placeholder="Pengembalian" required>
										</div>
										<div class="mb-3">
											<label class="form-label">Jumlah</label>
											<input type="number" class="form-control" name="number-jumlah"
												placeholder="Jumlah" required>
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
						<div class="modal fade" id="modalEditData" data-bs-backdrop="static" data-bs-keyboard="false"
							tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header text-bg-primary mb-3">
										<h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Data Buku</h1>
										<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
											aria-label="Close"></button>
									</div>
									<form method="POST" action="#"></form>
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
											<label class="form-label">Foto Cover Buku</label>
											<input type="file" class="form-control" name="file-fotocoverbuku" required>
										</div>
										<div class="mb-3">
											<label class="form-label">Semester</label>
											<select class="form-select" name="text-semester">
												<option></option>
												<option value="Semester Ganjil">Semester Ganjil</option>
												<option value="Semester Genap">Semester Genap</option>
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
											<label class="form-label">Kelas</label>
											<select class="form-select" name="text-kelas">
												<option></option>
												<option value="A">A</option>
												<option value="B">B</option>
												<option value="C">C</option>
											</select>
										</div>
										<div class="mb-3">
											<label class="form-label">Peminjaman</label>
											<input type="number" class="form-control" name="number-peminjaman"
												placeholder="Peminjaman" required>
										</div>
										<div class="mb-3">
											<label class="form-label">Pengembalian</label>
											<input type="number" class="form-control" name="number-pengembalian"
												placeholder="Pengembalian" required>
										</div>
										<div class="mb-3">
											<label class="form-label">Jumlah</label>
											<input type="number" class="form-control" name="number-jumlah"
												placeholder="Jumlah" required>
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
						<div class="modal fade" id="modalHapusData" data-bs-backdrop="static" data-bs-keyboard="false"
							tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header text-bg-primary mb-3">
										<h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus Data?</h1>
										<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
											aria-label="Close"></button>
									</div>
									<form method="POST" action="#"></form>
									<div class="modal-body">Apakah anda yakin ingin menghapus data?</div>
									<div class="modal-footer">
										<button type="submit" class="btn btn-danger"
											name="button-submithapusdata">Hapus</button>
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
			var table = $('#example').DataTable( {
		scrollY: 330,
        scrollX: true,
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
		
		
    } );

			table.buttons().container()
				.appendTo('#example_wrapper .col-md-6:eq(0)');
		});
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