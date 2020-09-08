<?php
    require 'functions.php';

    if( isset($_POST["login"])){

        $username = $_POST["username"];
        $password = $_POST["password"];

        $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

        // cek username
        if (mysqli_num_rows($result) === 1) {
            
            // cek password
            $row = mysqli_fetch_assoc($result);
            if( password_verify($password, $row["password"])){
                header("Location: index.php");
                exit;
            }
        }

        $error = true;
    }
    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
</head>
<body>
    <h1>Halaman Login</h1>

    <?php if ( isset($error)) : ?>
        <p style="color:red; font-style:italic;">Username / password salah</p>
    <?php endif; ?>
    <form action="" method="post">
        <ul>
            <li>
                <label for="username">username :</label>
                <input type="text" name="username" required autocomplete="off">
            </li>
            <li>
                <label for="password">password :</label>
                <input type="password" name="password" required autocomplete="off">
            </li>
            <li>
                <button type="submit" name="login">Login</button>
            </li>
        </ul>
    </form>
    
</body>
</html>