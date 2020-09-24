<?php

    require_once __DIR__ . '/vendor/autoload.php';
    require 'functions.php';

    $mahasiswa = query("SELECT * FROM mahasiswa");

    $mpdf = new \Mpdf\Mpdf();
    $string = '
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cetak Daftar Mahasiswa</title>
    </head>
    <body>

    <table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>No.</th>
        <th>Gambar</th>
        <th>NRP</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Jurusan</th>
    </tr>';

    $i = 1;
    foreach($mahasiswa as $row){
    $string .='<tr>
        <td>'. $i++ .'</td>
        <td><img src="img/'. $row["gambar"] .'" alt="" width="50"></td>
        <td>'. $row["nrp"].'</td>
        <td>'. $row["nama"].'</td>
        <td>'. $row["email"].'</td>
        <td>'. $row["jurusan"].'</td>
    </tr>';
    }
    $string .= '</table>
        
    </body>
    </html>';

    $mpdf->WriteHTML($string);
    $mpdf->Output();


?>
