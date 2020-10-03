<?php
require 'functions.php';
// cek apakah sudah klik tombol submit belum?
if (isset($_POST["submit"])) {
    
    // cek apakah sudah ditambahkan apa belum?
    if ( tambah($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil ditambahkan!');
                document.location.href = 'index.php';
            </script>";
    }
    echo "
        <script>
            alert('data berhasil ditambahkan!');
            document.location.href = 'index.php';
        </script>";
    
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="styles/index.css">
</head>
<body>
    <h1 class="judul">Tambah Data Mahasiswa</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">    
            <label for="nama">Nama :</label>
            <input type="text" placeholder="masukkan nama" name="nama" autocomplete="off">
        </div>
        <div class="form-group">    
            <label for="nrp">Nrp :</label>
            <input type="text" placeholder="masukkan nrp" name="nrp" autocomplete="off">
        </div>
        <div class="form-group">    
            <label for="email">Email :</label>
            <input type="email" placeholder="masukkan email" name="email">
        </div>
        <div class="form-group">    
            <label for="jurusan">Jurusan :</label>
            <input type="text" placeholder="masukkan jurusan" name="jurusan" autocomplete="off">
        </div>
        <div class="form-group">    
            <label for="gambar">Foto :</label>
            <input type="file" name="gambar">
        </div>
        <button type="submit" name="submit">Tambah Data</button><br>
        <a href="index.php">Back</a><br>
    </form>
    
</body>
</html>