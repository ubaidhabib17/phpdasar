<?php
    require 'functions.php';

    if ( isset($_POST["submit"])) {
        // cek apakah data sudah ditambahkan apa belum
        if ( tambah($_POST) > 0) {
            echo "
                <script>
                    alert('data berhasil ditambahkan!');
                    document.location.href = 'index.php';
                </script>
            ";
        }else{
            echo "
                <script>
                    alert('data gagal ditambahkan!');
                    document.location.href = 'index.php';
                </script>";
        }
        
    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah data mahasiswa</title>
</head>
<body>

    <h1>Tambah data mahasiswa</h1>

    <form action="" method="post">
        <ul>
            <li>
                <label for="nama">NAMA :</label>
                <input type="text" name="nama" required>
            </li>
            <li>
                <label for="nrp">NRP :</label>
                <input type="text" name="nrp" required>
            </li>
            <li>    
                <label for="email">EMAIL :</label>
                <input type="email" name="email" required>
            </li>
            <li>
                <label for="jurusan">JURUSAN :</label>
                <input type="text" name="jurusan" required>
            </li>
            <li>
                <label for="gambar">GAMBAR :</label>
                <input type="text" name="gambar" required>
            </li>
            <li>
                <button type="submit" name="submit">Tambah data</button><br>
                <a href="index.php">kembali</a>
            </li>
        </ul>
    </form>
    
</body>
</html>