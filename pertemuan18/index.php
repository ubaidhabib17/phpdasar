<?php
    session_start();
    require 'functions.php';

    if ( !isset($_SESSION["login"]) ) {
        header("Location: login.php");
    }

    // pagination
    // konfigurasi
    $jumlahDataPerHalaman = 2;
    $jumlahData = count(query("SELECT * FROM mahasiswa"));
    $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
    $halamanAktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
    $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

    $mahasiswa = query("SELECT * FROM mahasiswa LIMIT $awalData, $jumlahDataPerHalaman");

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
</head>
<body>
    <a href="logout.php">Logout</a>
    <h1>Daftar Mahasiswa</h1>

    <a href="tambah.php">Tambah data mahasiswa</a>
    <br><br>

    <form action="" method="post">
        <input type="text" placeholder="Masukkan Kata Kunci" autocomplete="off" autofocus name="keyword" size="30"><br><br>
        <button type="submit" name="cari">Cari Mahasiswa</button>
    </form><br>

    <!-- navigasi -->

    <?php if ($halamanAktif > 1) :?>    
        <a href="?halaman=<?= $halamanAktif-1; ?>">&lt;</a>
    <?php endif; ?>

    <?php for ($i=1; $i <= $jumlahHalaman ; $i++) : ?> 
        <?php if ($i == $halamanAktif) :?>
            <a href="?halaman=<?= $i ?>" style="color: red;"><?= $i ?></a>
        <?php else :?>
            <a href="?halaman=<?= $i ?>"><?= $i ?></a>
        <?php endif; ?>
            
    <?php endfor; ?>

    <?php if ($halamanAktif < $jumlahHalaman ) :?>    
        <a href="?halaman=<?= $halamanAktif + 1; ?>">&gt;</a>
    <?php endif; ?>


    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Aksi<thd>
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
            <td>
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
    
</body>
</html>