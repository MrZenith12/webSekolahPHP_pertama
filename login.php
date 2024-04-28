<?php 
 
 include 'proseslogin.php';

 if(isset($_POST['input'])){
 	$username = $_POST['username'];//$_POST berfungsi untuk memanggil data yang telah diinputkan agar bisa ditampilkan di file action
 	$password = $_POST['password'];

 	$data = mysqli_query($koneksi,"SELECT * FROM form_login WHERE username='$username' AND password='$password' ");//mysqli_query,untuk mengirimkan perintah SQL ke server MySQL untuk melakukan aktivitas CRUD
 	if (mysqli_num_rows($data)) { //mysql_num_rows() digunakan untuk mengetahui berapa banyak jumlah baris hasil pemanggilan fungsi
 		header("Location: login.php");
    }else{
        header("Location: halamanlogin.php");
        exit;
    }
 }

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet"  type="text/css" href="style9.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Pacifico&display=swap" rel="stylesheet">
</head>
<body>
<div class="menu-bar">
      <img src="image/gambar.png" class="logo1">
      <h1 class="logo">SMKN2<span>Langsa.</span></h1>
      <ul>
        <li><a href="">Beranda</a></li>
        <li><a href="read.php">Data Siswa</a>
        </li>
        <li><a href="beranda.php" class="tbl-biru">logout</a></li>
      </ul>
</div>
<!-- bagian pertama -->
    <div class="container1">
      
    </div>
<!-- bagian jurusan -->
    <div class="container3">
        <section id="galeri">
        <div class="galeri">
        <div class="container">
            <h2> HAI ADMIN <br> SMKN 2 LANGSA</h2>
        </div>
    </div>

    </section>
      </div>

    <div class="footer">
      <div class="wrapper">
            <div class="footer">
                <div class="footer-section">
                    <h3>SMKN 2langsa</h3>
                    <p>SMK BISA-HEBAT<br>Siap Kerja-Santun-Mandiri-Kreatif</p>
                </div>
                <div class="footer-section">
                    <h3>Profil</h3>
                    <p>Sekolah Menengah Kejuruan (SMK) Negeri 2 Langsa merupakan salah satu sekolah tertua di Aceh, dengan tingkat kedisiplinan yang baik agar menamatkan peserta didik yang berkualitas sehingga dapat bersaing di dunia kerja/industri.</p>
                </div>
                <div class="footer-section">
                    <h3>Contact</h3>
                    <p>Jl. Jenderal Ahmad Yani, Paya Bujok Seuleumak, Kec. Langsa Baro, Kota Langsa</p>
                    <p> Aceh 24415</p>
                </div>
                <div class="footer-section">
                    <h3>Social</h3>
                    <svg style="width:24px;height:24px;color: red;" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M10,15L15.19,12L10,9V15M21.56,7.17C21.69,7.64 21.78,8.27 21.84,9.07C21.91,9.87 21.94,10.56 21.94,11.16L22,12C22,14.19 21.84,15.8 21.56,16.83C21.31,17.73 20.73,18.31 19.83,18.56C19.36,18.69 18.5,18.78 17.18,18.84C15.88,18.91 14.69,18.94 13.59,18.94L12,19C7.81,19 5.2,18.84 4.17,18.56C3.27,18.31 2.69,17.73 2.44,16.83C2.31,16.36 2.22,15.73 2.16,14.93C2.09,14.13 2.06,13.44 2.06,12.84L2,12C2,9.81 2.16,8.2 2.44,7.17C2.69,6.27 3.27,5.69 4.17,5.44C4.64,5.31 5.5,5.22 6.82,5.16C8.12,5.09 9.31,5.06 10.41,5.06L12,5C16.19,5 18.8,5.16 19.83,5.44C20.73,5.69 21.31,6.27 21.56,7.17Z" />
                    </svg>
                    <p><b>YouTube: </b>SMKN 2 LANGSA</p>
                </div>
            </div>
        </div>
    </div>

    <div id="copyright">
        <div class="wrapper">
            &copy; 2022. <b>SMKN 2 LANGSA</b> All Rights Reserved.
        </div>
    </div>

</body>
</html>
