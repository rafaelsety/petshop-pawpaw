<?php
require 'functions.php';

// ambil data di url
$id = $_GET["id"];

// query data member berdasarkan id
$mbr = query("SELECT * FROM member WHERE id = $id")[0];

// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
    
    // cek apakah data berhasil diubah atau tidak
    if( ubah($_POST) > 0 ) {
        echo "
            <script>
                alert('data berhasil diubah');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal diubah');
                document.location.href = 'index.php';
            </script>
        ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ubah data membert</title>
</head>
<body>

    <h1>Ubah data member</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $mbr["id"]; ?>">
        <input type="hidden" name="gambarLama" value="<?= $mbr["gambar"]; ?>">
        <ul>
            <li>
                <label for="kode_member">Kode Member : </label>
                <input type="text" name="kode_member" id="kode_member" required value="<?= $mbr["kode_member"]; ?>">
            </li>
            <li>
                <label for="nama">Nama : </label>
                <input type="text" name="nama" id="nama" value="<?= $mbr["nama"]; ?>">
            </li>
            <li>
                <label for="email">Email : </label>
                <input type="text" name="email" id="email" value="<?= $mbr["email"]; ?>">
            </li>
            <li>
                <label for="gambar">Gambar : </label> <br>
                <img src="latimg/<?= $mbr['gambar']; ?>" width="40"> <br>
                <input type="file" name="gambar" id="gambar">
            </li>
            <li>
                <button type="submit" name="submit">Ubah Data!</button>
            </li>
        </ul>

    </form>
    
</body>
</html>