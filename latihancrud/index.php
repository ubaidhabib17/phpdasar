<?php
require 'functions.php';
session_start();

if ( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
}

$mahasiswa = query("SELECT * FROM mahasiswa");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="styles/index.css">
</head>
<body>
    <a href="logout.php">Logout</a>
    <h1 class="judul">Daftar Mahasiswa</h1>
    
    <?php $i = 1; ?>
    <div class="container pt-3">
        <a href="tambah.php" class="btn btn-info">Tambah Data<i data-feather="plus-square"></i></a><br>
        <table border="2" cellspacing="0" cellpadding="10" class="table"><br>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Nrp</th>
                <th>Email</th>
                <th>Jurusan</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        <?php foreach($mahasiswa as $row) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $row["nama"] ;?></td>
                <td><?= $row["nrp"] ;?></td>
                <td><?= $row["email"] ;?></td>
                <td><?= $row["jurusan"] ;?></td>
                <td><img src="img/<?= $row["gambar"];?>" alt=""></td>
                <td><a href="ubah.php?id=<?= $row["id"]; ?>"><i data-feather="edit"></i></a>
                <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin ?');"><i data-feather="trash"></i></a></td>
            </tr>
        <?php $i++; ?>
        <?php endforeach ;?>
        </table>
    </div>
    <script>
        feather.replace()
    </script>
</body>
</html>