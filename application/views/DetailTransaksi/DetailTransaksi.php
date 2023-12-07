<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Transaksi</title>
</head>
<body>
    <h1>Detail Transaksi</h1>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Banyak</th>
            <th>Sub Total</th>
            <!-- Tambahkan kolom sesuai dengan struktur database -->
        </tr>
        <?php foreach ($detailTransaksi as $detail) : ?>
            <tr>
                <td><?= $detail['no']; ?></td>
                <td><?= $detail['nama_barang']; ?></td>
                <td><?= $detail['harga']; ?></td>
                <td><?= $detail['banyak']; ?></td>
                <td><?= $detail['sub_total']; ?></td>
                <!-- Tambahkan kolom sesuai dengan struktur database -->
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
