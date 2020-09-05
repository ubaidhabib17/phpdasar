<?php
    // date untuk menampilkan tanggal dengan format tertentu
    echo date("l, d-M-Y"). "<br>";

    // Time
    // UNIX Timestamp
    // detik yang sudah berlalu sejak 1 januari 1970
    // echo time();

    // echo date("l", time()+60*60*24*1);
    // mktime
    // membuat detik sendiri
    // mktime(0,0,0,0,0,0);
    // jam, menit, detik, bulan , tanggal, tahun
    echo date("l", mktime(0,0,0,7,17,2000)). '<br>';

    // strtotime
    echo date("l", strtotime("+ 3 days"));

?>