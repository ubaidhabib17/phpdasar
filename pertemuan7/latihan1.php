<?php
    
    // Variable scope
    $x = 10;


    function tampilX(){
        echo $x;
    }

    //tampilX();
    
    // Variable Superglobals(buatan asli php)
    //var_dump($_SERVER);

    // $_GET
    

    // var_dump($_GET);

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
    <title>Latihan1</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>
    <ul>
        <?php foreach ($mahasiswa as $mhs ) : ?>
            <li>
                <a href="latihan2.php?nama=<?= $mhs["nama"]; ?>&nrp=
                <?= $mhs["nrp"]; ?>&email=<?= $mhs["email"]; ?>&jurusan=
                <?= $mhs["jurusan"]; ?>&gambar=<?= $mhs["gambar"]; ?>"><?= $mhs["nama"]; ?></a>
            </li>
        <?php endforeach ; ?>
    </ul>
</body>
</html>