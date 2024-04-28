<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
$koneksi = mysqli_connect('localhost','root','','login_alif');

if (!empty($_POST)) {
    
    $nis=$_POST['nis'];
   $NISN=$_POST['NISN'];
   $nama=$_POST['nama'];
   $kelas=$_POST['kelas'];
   $prodi=$_POST['prodi'];
   $query_cek_nis = mysqli_query($koneksi, "SELECT * FROM data_alif WHERE nis='$nis'");
   $query_cek_NISN = mysqli_query($koneksi, "SELECT * FROM data_alif WHERE NISN='$NISN'");
   $row_nis = mysqli_num_rows($query_cek_nis);
   $row_NISN = mysqli_num_rows($query_cek_NISN);

   if ($row_nis > 0 && $row_NISN > 0) {
     echo "<script>alert('NIS dan NISN siswa sudah ada');document.location.href='create.php';</script>";
    return false;
   }elseif ($row_nis > 0) {
    echo "<script>alert('NIS siswa sudah ada');document.location.href='create.php';</script>";
    return false;
   }elseif ($row_NISN > 0) {
     echo "<script>alert('NISN siswa sudah ada');document.location.href='create.php';</script>";
    return false;
   }else {
   
      $tambah=mysqli_query($koneksi,"INSERT INTO data_alif (nis,NISN,nama,kelas,prodi)VALUES('$nis','$NISN','$nama','$kelas','$prodi')");
      if ($tambah=true) {
        echo "<script>alert('data berhasil ditambah');document.location.href='create.php';</script>";
      }else{
        echo "gagal";
      }
    }
}
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Admin</title>
        <link href="style5.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    </head>
    <body>
    <nav class="navtop">
        <div>
            <h1>Admin Website</h1>
            <a href="read.php"><i class="fas fa-home"></i>Kembali</a>
        </div>
    </nav>

<div class="content update">
	<h2>Data Siswa</h2>
    <form action="create.php" method="post">
        <label for="nis">NIS</label>
        <input type="text" name="nis"  id="nis" placeholder="nis(11111)">
        <label for="NISN">NISN</label>
        <input type="text" name="NISN"  id="NISN" placeholder="nisn(11111)">
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama"placeholder="nama">
        <label for="kelas">Kelas</label>
        <input type="text" name="kelas" id="kelas" placeholder="(X,XI,XII)">
        <label for="prodi">Prodi</label>
        <input type="text" name="prodi" id="prodi" placeholder="prodi(RPL)">
        <input type="submit" value="Create">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

 </body>
</html>