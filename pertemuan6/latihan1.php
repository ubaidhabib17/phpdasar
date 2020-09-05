<?php

    // array
    // membuat array

    $bulan = ["Januari", "Februari", "Maret"];
    $angka = [
                [1,2,3],
                [4,5,6],
                [7,8,9,10]
            ];

    // menampilkan array

    print_r($bulan);
    echo '<br>';

    // menampilkan 1 elemen
    echo $bulan[0]. '<br>';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan Array</title>
    <style>
        .kotak{
            width: 30px;
            height: 30px;
            background-color: green;
            text-align : center;
            line-height: 30px;
            margin: 3px;
            float:left;
        }

        .clear{
            clear:both;
        }
    </style>
</head>
<body>

    <?php foreach ($angka as $a) : ?>
        <?php foreach ($a as $aa) : ?>  
            <div class="kotak">
                <?= $aa ;?>
            </div>
        <?php endforeach ; ?>
        
        <div class=clear></div>
    <?php endforeach ; ?>

</body>
</html>