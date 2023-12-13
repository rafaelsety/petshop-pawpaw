<!-- Begin Page Content -->

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-body">
                    <form action="<?= base_url('kasir/proses_tambah') ?>" id="form-tambah" method="POST">
                        <h5>Data Kasir</h5>
                        <hr>
                        <div class="form-row">
                            <div class="form-group col-2">
                                <label>No. Penjualan</label>
                                <input type="text" name="no_penjualan" value="PJ<?= time() ?>" readonly class="form-control">
                            </div>
                            <div class="form-group col-3">
                                <label>Kode Kasir</label>
                                <input type="text" name="kode_kasir" value="<?= $this->session->userdata('username') ?>" readonly class="form-control">
                            </div>
                            <div class="form-group col-3">
                                <label>Nama Kasir</label>
                                <input type="text" name="nama_kasir" value="<?= $this->session->userdata('nama') ?>" readonly class="form-control">
                            </div>
                            <div class="form-group col-2">
                                <label>Tanggal Penjualan</label>
                                <input type="text" name="tgl_penjualan" value="<?= date('d/m/Y') ?>" readonly class="form-control">
                            </div>
                            <div class="form-group col-2">
                                <label>Jam</label>
                                <input type="text" name="jam_penjualan" value="<?= date('H:i:s') ?>" readonly class="form-control">
                            </div>
                        </div>
                        <h5>Data Barang</h5>
                        <hr>
                        <div class="form-group col-3">
                            <label for="input_barang">Cari Barang</label>
                            <input type="text" name="input_barang" id="input_barang" class="form-control">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-3">
                                <label>Nama Barang</label>
                                <input type="text" name="nama_barang" value="" readonly class="form-control">
                            </div>
                            <div class="form-group col-2">
                                <label>Kode Barang</label>
                                <input type="text" name="kode_barang" value="" readonly class="form-control">
                            </div>
                            <div class="form-group col-2">
                                <label>Harga Barang</label>
                                <input type="text" name="harga_barang" value="" readonly class="form-control">
                            </div>
                            <div class="form-group col-2">
                                <label>Jumlah</label>
                                <input type="number" name="jumlah" value="" class="form-control" readonly min='1'>
                            </div>
                            <div class="form-group col-2">
                                <label>Sub Total</label>
                                <input type="number" name="sub_total" value="" class="form-control" readonly>
                            </div>
                            <div class="form-group col-1">
                                <label for="">&nbsp;</label>
                                <button disabled type="button" class="btn btn-primary btn-block" id="tambah"><i class="fa fa-plus"></i></button>
                            </div>
                            <input type="hidden" name="satuan" value="">
                        </div>
                        <div class="keranjang">
                            <h5>Detail Pembelian</h5>
                            <hr>
                            <table class="table table-bordered" id="keranjang">
                                <thead>
                                    <tr>
                                        <td width="10%">Kode Barang</td>
                                        <td width="25%">Nama Barang</td>
                                        <td width="15%">Harga</td>
                                        <td width="15%">Jumlah</td>
                                        <td width="15%">Jenis Hewan</td>
                                        <td width="10%">Sub Total</td>
                                        <td width="10%">Aksi</td>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="5" align="right"><strong>Total : </strong></td>
                                        <td id="total"></td>

                                        <td>
                                            <input type="hidden" name="total_hidden" value="">
                                            <input type="hidden" name="max_hidden" value="">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->