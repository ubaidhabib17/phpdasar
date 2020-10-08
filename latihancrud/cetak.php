<?php
// Require composer autoload
require_once __DIR__ . '/vendor/autoload.php';
require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");
// Create an instance of the class:
$mpdf = new \Mpdf\Mpdf();

$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>
    <table border="1" cellspacing="0" cellpadding="10" class="table"><br>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Nrp</th>
        <th>Email</th>
        <th>Jurusan</th>
        <th>Gambar</th>
        <th>Aksi</th>
    </tr>';
    $j = 1;
     foreach($mahasiswa as $row){
    $html .= '<tr>
        <td>'. $j++ .'</td>
        <td>'. $row["nama"] .'</td>
        <td>'. $row["nrp"] .'</td>
        <td>'. $row["email"] .'</td>
        <td>'. $row["jurusan"] .'</td>
        <td><img src="img/'. $row["gambar"] .'" alt=""></td>
    </tr>';
     }
$html .= '</table>
</body>
</html>';

// Write some HTML code:
$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output();

?>