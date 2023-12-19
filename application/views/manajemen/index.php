<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
        <div class="col-lg-12">
            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php } ?>
            <?= $this->session->flashdata('pesan'); ?>
            <!-- Page Heading -->
            <button type="button" data-target="#tambahdata" style="background:#6838C8;color:white;" class="btn btn-primary btn-md mr-2" data-toggle="modal" data-target="#tambahdata">
                <i class="fa fa-plus"></i> Tambah Data User</button><br><br>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr style="background:#CCDBFD;color:#333;">
                                    <th>No</th>
                                    <th>Gambar</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>NIK</th>
                                    <th>Jabatan</th>
                                    <th>Status</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $a = 1;
                                foreach ($manajemen as $m) { ?>
                                    <tr>
                                        <th scope="row"><?= $a++; ?></th>
                                        <td>
                                            <picture>
                                                <source srcset="" type="image/svg+xml">
                                                <img src="<?= base_url('assets/img/profile/') . $m['gambar']; ?>" class="img-fluid img-thumbnail" alt="...">
                                            </picture>
                                        </td>
                                        <td><?= $m['nama']; ?></td>
                                        <td><?= $m['username']; ?></td>
                                        <td><?= $m['nik']; ?></td>
                                        <td><?= $m['jabatan']; ?></td>
                                        <td><?= $m['status']; ?></td>
                                        <td><?= date('d/m/y', $m['tanggal_masuk']); ?></td>
                                        <td>
                                            <a href="<?= base_url('manajemen/ubahUser/') . $m['id']; ?>"><button class="btn btn-warning btn-xs">Edit</button></a>
                                            <a href="<?= base_url('manajemen/hapusUser/') . $m['id'] ?>" onclick="return confirm('Kamu yakin akan menghapus');"><button class="btn btn-danger btn-xs">Hapus</button></a>
                                        </td>
                                    </tr>
                                <?php } ?>
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
                    <h5 class="modal-title" id="tambahdata">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('manajemen'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="file" class="form-control form-control-user" id="gambar" name="gambar">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Masukkan Nama">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Masukkan nama username">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="nik" name="nik" placeholder="Masukkan nik">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="password" name="password" placeholder="Masukkan password">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="jabatan" name="jabatan" placeholder="Masukkan jabatan">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="status" name="status" placeholder="Masukkan status">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Masuk</label>
                            <input type="text" name="tanggal_masuk" value="<?= date('d/m/y') ?>" readonly class="form-control">
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