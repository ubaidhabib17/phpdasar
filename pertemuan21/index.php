<?php
    session_start();
    require 'functions.php';

    if ( !isset($_SESSION["login"]) ) {
        header("Location: login.php");
    }

    $mahasiswa = query("SELECT * FROM mahasiswa");

    // jika tombol cari dklik
    if ( isset($_POST["cari"])) {
        $mahasiswa = cari($_POST["keyword"]);
    }



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mahasiswa</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        .loader{
            width: 200px;
            position: absolute;
            top: 85px;
            left: 180px;
            display: none;
        }

        @media print{
            .logout, .tambah, .cari, .aksi{
                display: none;
            }
        }
    </style>
</head>
<body>
    <a href="logout.php" class="logout">Logout</a> || <a href="cetak.php" target="_blank">Cetak</a>
    <h1>Daftar Mahasiswa</h1>

    <a href="tambah.php" class="tambah">Tambah data mahasiswa</a>
    <br><br>

    <form action="" method="post" class="cari">
        <input type="text" placeholder="Masukkan Kata Kunci" autocomplete="off" 
        autofocus name="keyword" size="30" id="keyword"><br><br>
        <button type="submit" name="cari" id="tombol-cari">Cari Mahasiswa</button>
        <img src="img/loader.gif" alt="" class="loader">
    </form><br>
    <div id="container">
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No.</th>
                <th class="aksi">Aksi<thd>
                <th>Gambar</th>
                <th>NRP</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jurusan</th>
            </tr>

            <?php $i = 1; ?>
            <?php foreach($mahasiswa as $row) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td class="aksi">
                    <a href="ubah.php?id=<?= $row["id"]; ?>">ubah</a>
                    <a href="hapus.php?id=<?= $row["id"]; ?>"onclick="
                    return confirm('yakin ?');" >|| hapus</a>
                </td>
                    <td><img src="img/<?= $row["gambar"]; ?>" alt="" width="50">
                </td>
                <td><?= $row["nrp"]; ?></td>
                <td><?= $row["nama"]; ?></td>
                <td><?= $row["email"]; ?></td>
                <td><?= $row["jurusan"]; ?></td>
            </tr>
            <?php $i++ ?>
            <?php endforeach ; ?>
        </table>
    </div>
<script src="js/script.js"></script>
</body>
</html>