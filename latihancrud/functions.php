<?php
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data){
    global $conn;

    $nama = htmlspecialchars($data["nama"]);
    $nrp = htmlspecialchars($data["nrp"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambar =  upload();

    if (!$gambar) {
        return false;
    }

    // query insert data
    $query = "INSERT INTO mahasiswa
                VALUES
            ('', '$nama', '$nrp', '$email', '$jurusan', '$gambar')
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubah($data){
    global $conn;
    
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $nrp = htmlspecialchars($data["nrp"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambarLama =$data["gambarLama"];

    // cek apakah pilih foto lagi atau tidak
    if ($_FILES["gambar"]["error"] === 4) {
        $gambar = $gambarLama;
    }else{
        $gambar = upload();
    }

    // query edit data
    $query = "UPDATE mahasiswa SET
                nama = '$nama',
                nrp = '$nrp',
                email = '$email',
                jurusan = '$jurusan',
                gambar = '$gambar'
            WHERE id = '$id'
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

function hapus($id){
    global $conn;

    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function upload(){
    
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah file gambar sudah dipilih
    if ($error === 4) {
        echo "<script>
            alert('Pilih gambar dahulu!');
        </script>";
    }

    

    // cek file tersebut merupakan gambar atau tidak
    
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode(".", $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
            alert('yang anda upload bukan gambar!');
        </script>";
        return false;
    }

    // cek ukuran file gambar
    if ($ukuranFile > 2500000) {
        echo "<script>
            alert('gambar yang diupload terlalu besar!');
        </script>";
    }

    // setelah lolos pengecekkan, gambar siap diupload
    // generate nama baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;
}

function registrasi($data){
    global $conn;

    $username = strtolower(stripslashes($data['username']));
    $password = mysqli_real_escape_string($conn, $data['password']);
    $password2 = mysqli_real_escape_string($conn, $data['password2']);

    // cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>
                alert('konfirmasi password tidak sesuai');
                </script>";
            
            return false;
    }

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('username sudah terdaftar');
                </script>";
            return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambah user baru ke db
    $query = "INSERT INTO user (id, username, password)
        VALUES ('', '$username', '$password')
    ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);


}



?>