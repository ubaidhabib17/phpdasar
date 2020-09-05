<?php

    // $mahasiswa = [
    //                 ["Sandika Galih", "123", "sand@email.com", "TI"],
    //                 ["ubaid", "321", "ubad@gmail.com", "TO"],
    //              ];

    // Array asosiatif key nya string yang kita buat sendir
    $mahasiswa = [
        [
            "nama" => "Sandika Galih",
            "nrp" => "123",
            "email" => "sand@gmail.com",
            "jurusan" => "TO",
            "gambar" => "deadpool.jpg"
        ],
        [
            "nama" => "Ubaid",
            "nrp" => "13",
            "email" => "sad@gmail.com",
            "jurusan" => "TI",
            "gambar" => "foto terbaru.jpg"
        ]
            
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
        <li>
            <img src="img/<?= $mhs["gambar"]; ?>" >
        </li>
        <li><?= $mhs["nama"] ;?></li>
        <li><?= $mhs["nrp"] ;?></li>
        <li><?= $mhs["email"] ;?></li>
        <li><?= $mhs["jurusan"] ;?></li>
    </ul>
    <?php endforeach ; ?>
    
</body>
</html>