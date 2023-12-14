<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahdata">
                <i class="fa fa-plus"></i> Tambah Produk</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Kode</th>
                            <th>Nama Produk</th>
                            <th>Jenis Hewan</th>
                            <th>Berat Bersih</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Aksi</th>
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
                                <td>
                                    <picture>
                                        <!-- <source srcset="" type="image/svg+xml"> -->
                                        <img src="<?= base_url('assets/img/upload/') . $p['gambar']; ?>" class="img-fluid img-thumbnail" alt="...">
                                    </picture>
                                </td>
                                <td><?= $p['kd_produk']; ?></td>
                                <td><?= $p['nama_produk']; ?></td>
                                <td><?= $p['jenis_hewan']; ?></td>
                                <td><?= $p['berat_bersih']; ?></td>
                                <td><?= $p['harga']; ?></td>
                                <td><?= $p['stok']; ?></td>
                                <td>
                                    <a class="btn btn-sm btn-primary" href="<?= base_url('produk/editproduk/') . $p['kd_produk']; ?>" role="button"><i class="fa fa-edit"></i> Edit</a>

                                    <a href="<?= base_url('produk/hapusproduk/') . $p['kd_produk'] ?>" onclick="return confirm('Kamu yakin akan menghapus');" role="button">
                                        <button class="btn btn-danger btn-xs">Hapus</button></a>
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
<!-- tambah user -->
<div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="tambahdata" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahdata">Tambah Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('produk/aksesoris'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="file" class="form-control form-control-user" id="gambar" name="gambar">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="nama_produk" name="nama_produk" placeholder="Masukkan Nama Produk">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="kd_produk" name="kd_produk" placeholder="Masukkan Kode Produk">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="jenis_hewan" name="jenis_hewan" placeholder="Masukkan Jenis Hewan">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="kategori_produk" name="kategori_produk" placeholder="Masukkan Kategori Produk">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="stok" name="stok" placeholder="Masukkan nominal Stok barang">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="berat_bersih" name="berat_bersih" placeholder="Masukkan berat bersih">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="harga" name="harga" placeholder="Masukkan Harga Produk">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban"></i> Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i>Tambah</button>

                </div>
            </form>
        </div>
    </div>
</div>