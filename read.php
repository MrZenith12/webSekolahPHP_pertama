<?php
include 'functions.php';

$pdo = pdo_connect_mysql();
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$records_per_page = 1000;
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
<html>
    <head>
        <meta charset="utf-8">
        <title>jurusan</title>
        <link href="style5.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    </head>
    <body>
    <nav class="navtop">
        <div>
            <h1>Admin Website</h1>
            <a href="login.php"><i class="fas fa-home"></i>Home</a>
        </div>
    </nav>

<div class="content read">
    <h2>Admin Data Siswa</h2>
    <a href="create.php" class="create-contact">Tambah Data</a>
    <form action="read.php" method="post">
        <input type="text" name="search" autocomplete="off" placeholder="Cari nis nisn dan nama">
        <input type="submit" value="Cari">
        <input type="submit" value="kembali">
    </form>
    <table>
        <thead>
            <tr>
                <td>No</td>
                <td>NIS</td>
                <td>NISN</td>
                <td>Nama</td>
                <td>Kelas</td>
                <td>Prodi</td>
                <td></td>
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
                <td class="actions">
                    <a href="update.php?nis=<?=$contact['nis']?>" class="edit">Edit</a>
                    <a href="delete.php?nis=<?=$contact['nis']?>" class="trash">delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="pagination">
        <?php if ($page > 1): ?>
        <a href="read.php?page=<?=$page-1?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
        <?php endif; ?>
        <?php if ($page*$records_per_page < $num_contacts): ?>
        <a href="read.php?page=<?=$page+1?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
        <?php endif; ?>
        <?php if ($page > 1): ?>
        <a href="read.php?page=<?=$page-1?>&search=<?=$search?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
        <?php endif; ?>
    </div>
</div>

 </body>
</html>