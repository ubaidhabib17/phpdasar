<?php
require 'functions.php';

if (isset($_POST['register'])) {
    if (registrasi($_POST) > 0) {
        echo "<script>
                    alert('user baru berhasil ditambahkan');
                </script>";
    }else{
        echo mysqli_error($conn);
    }
    
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <style>
        label{
            display: block;
        }

        li{
            list-style-type: none;
        }
    </style>
</head>

<body>

    <h1>Halaman Registrasi</h1>

    <form action="" method="POST">
        <ul>
            <li>
                <label for="username">Username :</label>
                <input type="text" name="username" autocomplete="off" required><br>
            </li>
            <li>
                <label for="password">Password :</label>  
                <input type="password" name="password" required><br>
            </li>
            <li>
                <label for="password2">Konfirmasi password :</label>
                <input type="password" name="password2" required><br>
            </li>
            <li>
                <button type="submit" name="register">Register</button>
            </li>
        </ul>
    </form>

</body>

</html>