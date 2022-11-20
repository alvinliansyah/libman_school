<?php 
if(isset($_GET['pesan'])){
    if($_GET['pesan'] == "gagal"){
        echo "<script>alert('Login gagal! username dan password salah!')</script>";
        }
        else if($_GET['pesan'] == "logout"){
          echo "<script>alert('Anda telah berhasil logout')</script>";
        }
      }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Login - Libman School</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style-login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="website icon" type="png" href="../libman_school/img/Logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <nav> 
      <div class="logo">
        <img src="../libman_school/img/Logo.png" alt="">
			<span class="logo">Libman School</span></div>
      <input type="checkbox" id="click">
      <label for="click" class="menu-btn">
        <i class="fas fa-bars"></i>
      </label>
      <ul>
        <li><strong><a href="#" data-bs-toggle="modal" data-bs-target="#modalPelayananPelanggan" >Pelayanan Pelanggan</a></strong></li>
        <li><strong><a href="#" data-bs-toggle="modal" data-bs-target="#modalTentangAplikasi" >Tentang Aplikasi</a></strong></li>
      </ul>
      <!-- Buka Modal Pelayanan Pelanggan -->
<div class="modal fade" id="modalPelayananPelanggan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Pelayanan Pelanggan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
      </div>
    </div>
  </div>
</div>
<!-- Tutup Modal Pelayanan Pelanggan -->
<!-- Buka Modal Tentang Aplikasi -->
<div class="modal fade" id="modalTentangAplikasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tentang Aplikasi</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
      </div>
    </div>
  </div>
</div>
<!-- Tutup Modal Tentang Aplikasi -->
    </nav>
    <div class="img"></div>
    <div class="menu">
        <div class="container" >
            <input type="checkbox" id="flip">
            <div class="cover" >
              <div class="front">
                <img src="img/wander-fleur-1lmGTHdQdjM-unsplash.jpg"  alt="">
                <img src="../libman_school/img/logosmp1bangsal.png" style= "width: 90px; height: 90px; position: absolute; top: 140px; right: 160px; padding: none; border-radius: 1px;" alt="">
                <div class="text">
                  <span class="text-1">APLIKASI MANAJEMEN PERPUSTAKAAN</span>
                  <span class="text-2">SMP Negeri 1 Bangsalsari</span>
                </div>
              </div>
              <div class="back">
                <img class="backImg" src="img/wander-fleur-1lmGTHdQdjM-unsplash.jpg" alt="">
                <img src="../libman_school/img/logosmp1bangsal.png" style= "width: 90px; height: 90px; position: absolute; top: 140px; right: 160px; padding: none; border-radius: 1px;" alt="">
                <div class="text">
                  <span class="text-1">APLIKASI MANAJEMEN PERPUSTAKAAN</span>
                  <span class="text-2">SMP Negeri 1 Bangsalsari</span>
                </div>
              </div>
            </div>
            <div class="forms">
                <div class="form-content">
                  <div class="login-form">
                    <header>Masuk</header>
                    <br/>
                <p style="line-height:1px;">Masukan Username dan Password</p>
                <p>untuk melanjutkan ke halaman berikutnya</p>
                  <form method="post" action="cek_login.php">
                      <div>
                        <input type="text" class="form-control" style="height: 50px;" placeholder="Username" name = "user" required>
                      </div>
                      <br/>
                      <div>
                        <input type="password" class="form-control" style="height: 50px;" placeholder="Password" name = "pass" required>
                      </div>
                      <div class="text"><label for="flip">Lupa Password?</label></div>
                      <div class="button input-box">
                        <input type="submit" value="Masuk">
                      </div>
                    </form>
                  </div>
                  <div class="forgetPassword-form">
                    <header>Lupa Password</header>
                    <br/>
                    <p>Silahkan masukkan Password baru anda</p>
                <form action="#">
                    <div>
                        <input type="text" class="form-control" style="height: 50px;" placeholder="Username" required>
                      </div>
                      <div class="field input-field">
                        <input type="password" class="form-control" style="height: 50px;" placeholder="Password" required>
                      </div>
                      <div class="field input-field">
                        <input type="password" class="form-control" style="height: 50px;" placeholder="Konfirmasi password" required>
                      </div>
                      <div class="button input-box">
                        <input type="submit" value="Simpan">
                      </div>
                      <div class="text forgetPassword-text"><label for="flip">Kembali ke masuk</label></div>
                    </div>
              </form>
            </div>
            </div>
            </div>
    <script src="script-login.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
  </body>
</html>
