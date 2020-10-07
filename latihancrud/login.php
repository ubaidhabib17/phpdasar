<?php
require('functions.php');
session_start();

// cek cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];
    // ambil username sesuai id
    $result = mysqli_query($conn, "SELECT username FROM user WHERE id = '$id'");

    $row = mysqli_fetch_assoc($result);

    // cek cookie username
    if ($key == hash('sha256', $row['username'])) {
        $_SESSION['login'] = true;
    }
}

if (isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    // cek username
    if (mysqli_num_rows($result) === 1) {
        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            // cek remember me
            if (isset($_POST['remember'])) {
                // set cookie
                setcookie('id', $row['id'], time()+60);
                setcookie('key', hash('sha256', $row['username']), time()+60);
            }
            header("Location: index.php");
            // set session
            $_SESSION['login'] = true;
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
                <input type="checkbox" name="remember">
                <label for="remember">Remember me</label>
            </li>
            <li>
                <button type="submit" name="login">Login</button>
            </li>
        </ul>
    </form>

</body>

</html>