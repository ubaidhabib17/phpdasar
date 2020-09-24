<?php
    session_start();
    require 'functions.php';

    if ( !isset($_SESSION["login"]) ) {
        header("Location: login.php");
    }

    // ambil data di url
    $id = $_GET["id"];

    // query data mhs sesuai idnya
    $mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

    if ( isset($_POST["submit"])) {
        // cek apakah data sudah diubah apa belum
        if ( ubah($_POST) > 0) {
            echo "
                <script>
                    alert('data berhasil diubah!');
                    document.location.href = 'index.php';
                </script>
            ";
        }else{
            echo "
                <script>
                    alert('data gagal diubah!');
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
    <title>Ubah data mahasiswa</title>
</head>
<body>

    <h1>Ubah data mahasiswa</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <ul>
                <input type="hidden" name="id" value="<?= $mhs['id']; ?>">
                <input type="hidden" name="gambarLama" value="<?= $mhs['gambar']; ?>">
            <li>
                <label for="nama">NAMA :</label>
                <input type="text" name="nama" required value="<?= $mhs['nama']; ?>">
            </li>
            <li>
                <label for="nrp">NRP :</label>
                <input type="text" name="nrp" value="<?= $mhs['nrp']; ?>">
            </li>
            <li>    
                <label for="email">EMAIL :</label>
                <input type="email" name="email" value="<?= $mhs['email']; ?>">
            </li>
            <li>
                <label for="jurusan">JURUSAN :</label>
                <input type="text" name="jurusan" value="<?= $mhs['jurusan']; ?>">
            </li>
            <li>
                <label for="gambar">GAMBAR :</label><br>
                <img src="img/<?= $mhs['gambar']; ?>" alt="" width="60"><br>
                <input type="file" name="gambar"><br><br>
            </li>
            <li>
                <button type="submit" name="submit">Ubah data</button><br>
                <a href="index.php">kembali</a>
            </li>
        </ul>
    </form>
    
</body>
</html>