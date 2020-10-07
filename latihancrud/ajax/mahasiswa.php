<?php 
require '../functions.php';

$keyword = $_GET['keyword'];
$mahasiswa = query("SELECT * FROM mahasiswa WHERE
    nama LIKE '%$keyword%' OR
    nrp LIKE '%$keyword%' OR
    email LIKE '%$keyword%' OR
    jurusan LIKE '%$keyword%'");


?>


<table border="2" cellspacing="0" cellpadding="10" class="table"><br>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Nrp</th>
        <th>Email</th>
        <th>Jurusan</th>
        <th>Gambar</th>
        <th>Aksi</th>
    </tr>
    <?php $j = 1; ?>
    <?php foreach($mahasiswa as $row) : ?>
    <tr>
        <td><?= $j; ?></td>
        <td><?= $row["nama"] ;?></td>
        <td><?= $row["nrp"] ;?></td>
        <td><?= $row["email"] ;?></td>
        <td><?= $row["jurusan"] ;?></td>
        <td><img src="img/<?= $row["gambar"];?>" alt=""></td>
        <td><a href="ubah.php?id=<?= $row["id"]; ?>"><i data-feather="edit"></i></a>
            <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin ?');"><i
                    data-feather="trash"></i></a></td>
    </tr>
    <?php $j++; ?>
    <?php endforeach ;?>
</table>