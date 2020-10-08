<?php
require 'functions.php';
session_start();

// pagination
// konfigurasi
// $jumlahDataPerHalaman = 2;
// $jumlahData = count(query("SELECT * FROM mahasiswa"));
// $jumlahHalaman =ceil($jumlahData / $jumlahDataPerHalaman);
// $halamanAktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
// $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;


$mahasiswa = query("SELECT * FROM mahasiswa");

// cek cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];
    // ambil username sesuai id
    $result = mysqli_query($conn, "SELECT username FROM user WHERE id = '$id'");

    $row = mysqli_fetch_assoc($result);

    // cek cookie username
    if ($key == hash('sha256', $row['username'])) {
        $_SESSION['login'] = true;
    }
}

if ( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="styles/index.css">
    <style>
        .loader{
            position: absolute;
            width: 200px;
            top: 118px;
            left: 480px;
            display: none;
        }
    </style>
</head>

<body>
    <a href="logout.php">Logout</a> || <a href="cetak.php" target="_blank">Cetak</a>
    <h1 class="judul">Daftar Mahasiswa</h1>

    <?php $j =1; ?>
    <div class="container pt-3">
        <a href="tambah.php" class="btn btn-info">Tambah Data<i data-feather="plus-square"></i></a><br><br>

        <form action="" method="POST">
            <input type="text" name="keyword" id="keyword" size="40" autofocus placeholder="Cari data"
                autocomplete="off">
        </form>

        

    
        <div id="container">
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
                    <td><?= $j; ?></td>
                    <td><?= $row["nama"] ;?></td>
                    <td><?= $row["nrp"] ;?></td>
                    <td><?= $row["email"] ;?></td>
                    <td><?= $row["jurusan"] ;?></td>
                    <td><img src="img/<?= $row["gambar"];?>" alt=""></td>
                    <td><a href="ubah.php?id=<?= $row["id"]; ?>"><i data-feather="edit"></i></a>
                        <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin ?');"><i
                                data-feather="trash"></i></a></td>
                </tr>
                <?php $j++; ?>
                <?php endforeach ;?>
            </table>
        </div>
    </div>
    <script>
        feather.replace()
    </script>
    <script src="js/script.js"></script>
</body>

</html>