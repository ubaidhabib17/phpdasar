<?php
require 'functions.php';

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

if ( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
}

$id = $_GET["id"];

if ( hapus($id) > 0) {
    echo "
        <script>
            alert('data berhasil dihapus!');
            document.location.href = 'index.php';
        </script>
    ";
}else{
    echo "
        <script>
            alert('data gagal dihapus!');
            document.location.href = 'index.php';
        </script>";
}

?>