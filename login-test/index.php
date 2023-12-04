<?php
require 'functions.php';
$member = query("SELECT * FROM member");

// tombol cari ditekan
if ( isset($_POST["cari"]) ) {
    $member = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>halaman admi</title>
</head>
<body>

    <h1>Daftar Member</h1>

    <a href="tambah.php">Tambah data member</a>
    <br><br>

    <form action="" method="post">

    <input type="text" name="keyword" size="40" autofocus placeholder="masukan keyword pencarian.." autocomplete="off">
    <button type="submit" name="cari">Cari!</button>

    </form>
    <br>
    
    <table border="1" cellpadding="10" cellspacing="0">

        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>Kode Member</th>
            <th>Nama</th>
            <th>Email</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach( $member as $row ) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td>
                <a href="ubah.php?id=<?= $row["id"]; ?>">ubah</a> | 
                <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?');" >hapus</a>
            </td>
            <td><img src="latimg/<?= $row["gambar"]; ?>" width="50"></td>
            <td><?= $row["kode_member"] ?></td>
            <td><?= $row["nama"] ?></td>
            <td><?= $row["email"] ?></td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>

    </table>
    
</body>
</html>