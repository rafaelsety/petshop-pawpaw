<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Produk</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr style="background:#CCDBFD;color:#333;">
                            <th>No</th>
                            <th>Kode Produk</th>
                            <th>Nama Produk</th>
                            <th>Jenis hewan</th>
                            <th>Kategori</th>
                            <th>Stok</th>
                            <th>Berat Bersih</th>
                            <th>Harga</th>
                            <th>Gambar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($produk)) : ?>
                            <tr>
                                <td colspan="4">
                                    <div class="alert alert-danger" role="alert">
                                        data not found!
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                        <?php $start = 0;
                        foreach ($produk as $p) : ?>
                            <tr>          
                                <th><?= ++$start; ?></th>              
                                <td><?= $p['kd_produk']; ?></td>
                               	<td><?= $p['nama_produk']; ?></td>
                                <td><?= $p['jenis_hewan']; ?></td>
                                <td><?= $p['kategori_produk']; ?></td>
                                <td><?= $p['stok']; ?></td>
                                <td><?= $p['berat_bersih']; ?></td>
                                <td><?= $p['harga']; ?></td>
                                <td>
                                <picture>
                                    <source srcset="" type="image/svg+xml">
                                    <img src="<?= base_url('assets/img/upload/') . $p['gambar']; ?>" class="img-fluid img-thumbnail" alt="...">
                                </picture>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->