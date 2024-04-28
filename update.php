<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
$koneksi = mysqli_connect('localhost','root','','login_alif');

if (isset($_GET['nis'])) {
   if (!empty($_POST)) {
    $nis = isset($_POST['nis']) ? $_POST['nis'] : NULL;
    $NISN = isset($_POST['NISN']) ? $_POST['NISN'] : NULL;
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $kelas = isset($_POST['kelas']) ? $_POST['kelas'] : '';
    $prodi = isset($_POST['prodi']) ? $_POST['prodi'] : '';

   //memeriksa duplikat nis dan nisn
    $check_nis = "SELECT nis FROM data_alif WHERE nis='$nis' AND nis != '" . $_GET['nis'] . "'";
    $result_nis = mysqli_query($koneksi, $check_nis);
    $check_nisn = "SELECT NISN FROM data_alif WHERE NISN='$NISN' AND nis != '" . $_GET['nis'] . "'";
    $result_nisn = mysqli_query($koneksi, $check_nisn);

    if (mysqli_num_rows($result_nis) > 0 && mysqli_num_rows($result_nisn) > 0) {
        $msg ="<script>alert('NIS dan NISN sudah ada');document.location.href='read.php';</script>";
    }else if(mysqli_num_rows($result_nis) > 0) {
        $msg ="<script>alert('NIS sudah ada');document.location.href='read.php';</script>";
    }elseif (mysqli_num_rows($result_nisn) > 0) {
        $msg ="<script>alert('NISN sudah ada');document.location.href='read.php';</script>";
    }else {
    $querynis= "UPDATE data_alif SET nis ='$nis', NISN='$NISN', nama='$nama', kelas='$kelas', prodi='$prodi' WHERE nis ='$nis' or NISN='$NISN' ";
    $query=mysqli_query($koneksi,$querynis);
    if($query ){
        $msg ="<script>alert('sudah berhasil di ubah');document.location.href='read.php';</script>"; 
    }else{
        $msg ="<script>alert('Error updating record');document.location.href='read.php';</script>";
    }
}


}
    $stmt = $pdo->prepare('SELECT * FROM data_alif WHERE nis = ? ');
    $stmt->execute([$_GET['nis']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        echo "<script>alert('sudah berhasil di ubah');document.location.href='read.php';</script>";
   }
} else {
    exit('No nis specified!');
}
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Edit Data</title>
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
	<h2>Update Contact #<?=$contact['nis']?></h2>
    <form action="update.php?nis=<?=$contact['nis']?>" method="post">
        <label for="nis">NIS</label>
        <input type="text" name="nis" value="<?=$contact['nis']?>" id="nis">
        <label for="NISN">NISN</label>
        <input type="text" name="NISN" value="<?=$contact['NISN']?>" id="NISN">
        <label for="nama">Nama</label>
        <input type="text" name="nama" value="<?=$contact['nama']?>" id="nama">
        <label for="kelas">Kelas</label>
        <input type="text" name="kelas" value="<?=$contact['kelas']?>" id="kelas">
        <label for="prodi">Prodi</label>
        <input type="text" name="prodi" value="<?=$contact['prodi']?>" id="prodi">
        <input type="submit" value="Update">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>


 </body>
</html>
