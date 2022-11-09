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
    <link rel="stylesheet" href="style-login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
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
        <li><a href="#">Pelayanan Pelanggan</a></li>
        <li><a href="#">Tentang Aplikasi</a></li>
      </ul>
    </nav>
    <div class="img"></div>
    <div class="menu">
        <div class="container">
            <input type="checkbox" id="flip">
            <div class="cover">
              <div class="front">
                <img src="img/wander-fleur-1lmGTHdQdjM-unsplash.jpg" alt="">
                <div class="text">
                  <span class="text-1">APLIKASI MANAJEMEN PERPUSTAKAAN</span>
                  <span class="text-2">SMP Negeri 1 Bangsalsari</span>
                </div>
              </div>
              <div class="back">
                <img class="backImg" src="img/wander-fleur-1lmGTHdQdjM-unsplash.jpg" alt="">
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
                <p>Masukan Username dan Password</p>
                <p>untuk melanjutkan ke halaman berikutnya</p>
                  <form method="post" action="cek_login.php">
                    <div class="input-boxes">
                      <div class="field input-field">
                        <input type="text" placeholder="Username" name = "user" required>
                      </div>
                      <div class="field input-field">
                        <input type="password" placeholder="Password" name = "pass" required>
                      </div>
                      <div class="text"><label for="flip">Lupa Password?</label></div>
                      <div class="button input-box">
                        <input type="submit" value="Masuk">
                      </div>
                    </div>
                    </form>
                  </div>
                  <div class="forgetPassword-form">
                    <header>Lupa Password</header>
                    <p>Silahkan masukkan Password baru anda</p>
                <form action="#">
                    <div class="input-boxes">
                      <div class="field input-field">
                        <input type="text" placeholder="Username" required>
                      </div>
                      <div class="field input-field">
                        <input type="password" placeholder="Password" required>
                      </div>
                      <div class="field input-field">
                        <input type="password" placeholder="Konfirmasi password" required>
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
  </body>
</html>
