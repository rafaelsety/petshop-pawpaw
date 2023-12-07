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
            <?php foreach ($manajemen as $m) { ?>
                <form action="<?= base_url('manajemen/ubahUser'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" name="id" id="id" value="<?php echo $m['id']; ?>">
                    </div>
                    <div class="form-group">
                        <?php
                        if (isset($m['gambar'])) { ?>

                            <input type="hidden" name="old_pict" id="old_pict" value="<?= $m['gambar']; ?>">

                            <picture>
                                <source srcset="" type="image/svg+xml">
                                <img src="<?= base_url('assets/img/profile/') . $m['gambar']; ?>" class="rounded mx-auto mb-3 d-blok" width="500px" alt="...">
                            </picture>
                        <?php } ?>
                        <input type="file" class="form-control form-control-user" id="gambar" name="gambar">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="id" id="id" value="<?php echo $m['id']; ?>">
                        <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Masukkan Nama " value="<?= $m['nama']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Masukkan nama Username" value="<?= $m['username']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="nik" name="nik" placeholder="Masukkan nama NIK" value="<?= $m['nik']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="password" name="password" placeholder="Masukkan Password" value="<?= $m['password']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="jabatan" name="jabatan" placeholder="Masukkan nominal Jabatan" value="<?= $m['jabatan']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="status" name="status" placeholder="Masukkan nominal Status" value="<?= $m['status']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="tanggal_masuk" name="tanggal_masuk" placeholder="Masukkan nominal Tanggal masuk" value="<?= $m['tanggal_masuk']; ?>">
                    </div>

                    <div class="form-group">
                        <input type="button" class="form-control form-control-user btn btn-dark col-lg-3 mt-3" value="Kembali" onclick="window.history.go(-1)">
                        <input type="submit" class="form-control form-control-user btn btn-primary col-lg-3 mt-3" value="Update">
                    </div>
                </form>
            <?php } ?>
        </div>
    </div>
</div>