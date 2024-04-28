<?php
include 'functions.php';

$pdo = pdo_connect_mysql();
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$records_per_page = 10;
$search = '';

if (isset($_POST['search'])) {
    $search = $_POST['search'];
}

$stmt = $pdo->prepare("SELECT * FROM data_alif WHERE nis LIKE '%$search%' OR NISN LIKE '%$search%'  OR nama LIKE '%$search%' ORDER BY nis LIMIT :current_page, :record_per_page");
$stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();

$contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);

$num_contacts = $pdo->query("SELECT COUNT(*) FROM data_alif WHERE nis LIKE '%$search%' OR NISN LIKE '%$search%'  OR nama LIKE '%$search%'")->fetchColumn();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>data siswa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet"  type="text/css" href="style6.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Pacifico&display=swap" rel="stylesheet">
</head>
<body>
<div class="menu-bar">
      <img src="image/gambar.png" class="logo1">
      <h1 class="logo">SMKN2<span>Langsa.</span></h1>
      <ul>
        <li><a href="beranda.php">Beranda</a></li>
        <li><a href="jurusan.php">Jurusan</a></li>
        <li><a href="#">Berita <i class="fas fa-caret-down"></i></a>

            <div class="dropdown-menu">
                <ul>
                  <li><a href="beritabaru.php">Visi Misi</a></li>
                  <li><a href="galeri.php">Galeri</a></li>
                </ul>
              </div>
        </li>
        <li><a href="#">kesiswaan <i class="fas fa-caret-down"></i></a>

            <div class="dropdown-menu">
                <ul>
                  <li><a href="pramuka.php">Pramuka</a></li>
                  <li><a href="rohis.php">Rohis</a></li>
                </ul>
              </div>
        </li>
        <li><a href="read1.php">Data Siswa</a>
        </li>
        <li><a href="halamanlogin.php" class="tbl-biru">login</a></li>
      </ul>
</div>
<!-- bagian pertama -->
    <div class="container1">
      
    </div>
<!-- bagian jurusan -->
    <div class="container3">
            <div class="kiri">
                            
                <h1>Data siswa</h1>
                <div class="box">
                <form action="read1.php" method="post">
                    <input  class="search" type="text" name="search" autocomplete="off" placeholder="Cari nis nisn dan nama">
                    <input  class="button" type="submit" value="Cari">
                    <input  class="button" type="submit" value="kembali">
                </form>
                </div>
                <table >
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NIS</th>
                            <th>NISN</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Prodi</th>
                        </tr>
                    </thead>
                    <tbody>
                         <?php 
                         $urut=1;
                         ?>
                        <?php foreach ($contacts as $contact): ?>
                        <tr>
                            <td><?php echo $urut++ ?></td>
                            <td><?=$contact['nis']?></td>
                             <td><?=$contact['NISN']?></td>
                            <td><?=$contact['nama']?></td>
                            <td><?=$contact['kelas']?></td>
                            <td><?=$contact['prodi']?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="pagination">
                    <?php if ($page > 1): ?>
                    <a href="read1.php?page=<?=$page-1?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
                    <?php endif; ?>
                    <?php if ($page*$records_per_page < $num_contacts): ?>
                    <a href="read1.php?page=<?=$page+1?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
                    <?php endif; ?>
                    <?php if ($page > 1): ?>
                    <a href="read1.php?page=<?=$page-1?>&search=<?=$search?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
                    <?php endif; ?>
                </div>
            </div>

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
