<?php

    $mahasiswa = [
        ["Sandika Galih", "01234", "Teknik Sipil", "sandika@email.com"],
        ["Ubaidillah", "012224", "Teknik Sipil", "ubaid@email.com"],
        ["Rero", "224", "Teknik Sipil", "rero@email.com"]
    ];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>
    <?php foreach ($mahasiswa as $mhs) : ?>
        <ul>   
            <li>Nama:<?= $mhs[0]; ?></li>
            <li>NIM:<?= $mhs[1]; ?></li>
            <li>JURUSAN:<?= $mhs[2]; ?></li>
            <li>EMAIL:<?= $mhs[3]; ?></li>
        </ul>
    <?php endforeach ; ?>

</body>
</html>