<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';

if (isset($_GET['nis'])) {
    $stmt = $pdo->prepare('SELECT * FROM data_alif WHERE nis = ?');
    $stmt->execute([$_GET['nis']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Contact doesn\'t exist with that ID!');
    }
    
    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {
            $stmt = $pdo->prepare('DELETE FROM data_alif WHERE nis = ?');
            $stmt->execute([$_GET['nis']]);
            $msg = 'You have deleted the contact!';
        } else {
            header('Location: read.php');
            exit;
        }
    }
} else {
    exit('No ID specified!');
}
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
            <a href="read.php"><i class="fas fa-home"></i>Kembali</a>
        </div>
    </nav>

<div class="content delete">
	<h2>Delete Contact #<?=$contact['nis']?></h2>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php else: ?>
	<p>Are you sure you want to delete contact #<?=$contact['nis']?>?</p>
    <div class="yesno">
        <a href="delete.php?nis=<?=$contact['nis']?>&confirm=yes">Yes</a>
        <a href="delete.php?nis=<?=$contact['nis']?>&confirm=no">No</a>
    </div>
    <?php endif; ?>
</div>


 </body>
</html>
