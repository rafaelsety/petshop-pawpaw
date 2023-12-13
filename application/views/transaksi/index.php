<div id="content-wrapper" class="d-flex flex-column">

    <div class="container-fluid">
        <div class="clearfix">
            <div class="float-right">
                <a href="<?= base_url('kasir/export') ?>" class="btn btn-danger btn-sm"><i class="fa fa-file-pdf"></i>&nbsp;&nbsp;Export</a>
                <a href="<?= base_url('kasir') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah</a>
            </div>
        </div>
        <hr>
        <?php if ($this->session->flashdata('success')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $this->session->flashdata('success') ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php elseif ($this->session->flashdata('error')) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= $this->session->flashdata('error') ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif ?>
        <div class="card shadow">
            <div class="card-header"><strong>Daftar Penjualan</strong></div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <td>No Penjualan</td>
                                <td>Nama Kasir</td>
                                <td>Tanggal Penjualan</td>
                                <td>Total</td>
                                <td>Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($all_penjualan as $penjualan) : ?>
                                <tr>
                                    <td><?= $penjualan->no_transaksi ?></td>
                                    <td><?= $penjualan->username ?></td>
                                    <td><?= $penjualan->tgl_transaksi ?> Pukul <?= $penjualan->jam_transaksi ?></td>
                                    <td>Rp <?= number_format($penjualan->total, 0, ',', '.') ?></td>
                                    <td>
                                        <a href="<?= base_url('transaksi/detail/' . $penjualan->no_transaksi) ?>" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                                        <a onclick="return confirm('apakah anda yakin?')" href="<?= base_url('transaksi/hapus/' . $penjualan->no_transaksi) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
</div>