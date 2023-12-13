<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
        <div class="col-lg-6">
            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php } ?>
            <?= $this->session->flashdata('pesan'); ?>
            <?php foreach ($produk as $p) { ?>
                <form action="<?= base_url('produk/editproduk'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                            <input type="hidden" name="kd_produk" id="kd_produk" value="<?php echo $p['kd_produk']; ?>">
                    </div>    
                    <div class="form-group">
                            <?php
                            if (isset($m['gambar'])) { ?>

                                <input type="hidden" name="old_pict" id="old_pict" value="<?= $p['gambar']; ?>">
                                <picture>
                                    <source srcset="" type="image/svg+xml">
                                    <img src="<?= base_url('assets/img/upload/') . $p['gambar']; ?>" class="rounded mx-auto mb-3 d-blok" width="500px" alt="...">
                                </picture>
                            <?php } ?>
                            <input type="file" class="form-control form-control-user" id="gambar" name="gambar">
                    </div>    
                    
                    <div class="form-group">
                        <input type="text" class="form-control form-controluser" id="kd_produk" name="kd_produk" placeholder="Masukkan Kode Produk" value="<?= $p['kd_produk']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-controluser" id="kategori_produk" name="kategori_produk" placeholder="Masukkan Kategori" value="<?= $p['kategori_produk']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-controluser" id="nama_produk" name="nama_produk" placeholder="Masukkan Nama Produk" value="<?= $p['nama_produk']; ?>">
                    </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-controluser" id="jenis_hewan" name="jenis_hewan" placeholder="Masukkan jenis hewan" value="<?= $p['jenis_hewan']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-controluser" id="berat_bersih" name="berat_bersih" placeholder="Masukkan berat bersih produk" value="<?= $p['berat_bersih']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-controluser" id="harga" name="harga" placeholder="Masukkan harga" value="<?= $p['harga']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-controluser" id="stok" name="stok" placeholder="Masukkan nominal stok" value="<?= $p['stok']; ?>">
                    </div>
                    
                    <div class="form-group">
                        <input type="button" class="form-control form-controluser btn btn-dark col-lg-3 mt-3" value="Kembali" onclick="window.history.go(-
1)">
                        <input type="submit" class="form-control form-controluser btn btn-primary col-lg-3 mt-3" value="Update">
                    </div>
                </form>
            <?php } ?>
        </div>
    </div>
</div>