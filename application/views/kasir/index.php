<!-- Begin Page Content -->
<div class="container-fluid">

    <h4>Keranjang Penjualan</h4>
    <br>
    <?php if (isset($_GET['success'])) { ?>
        <div class="alert alert-success">
            <p>Edit Data Berhasil !</p>
        </div>
    <?php } ?>
    <?php if (isset($_GET['remove'])) { ?>
        <div class="alert alert-danger">
            <p>Hapus Data Berhasil !</p>
        </div>
    <?php } ?>
    <div class="row">
        <div class="col-sm-4">
            <div class="card card-primary mb-3">
                <div class="card-header bg-primary text-white">
                    <h5><i class="fa fa-search"></i> Cari Barang</h5>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('kasir');  ?>" method="post">
                        <input type="text" id="cari" class="form-control" name="cari" placeholder="Masukan : Kode / Nama Barang  [ENTER]">
                        <input class="btn btn-primary" type="submit" name="submit">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="card card-primary mb-3">
                <div class="card-header bg-primary text-white">
                    <h5><i class="fa fa-list"></i> Hasil Pencarian</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-stripped" width="100%" id="example2">
                            <tr>
                                <th>ID Barang</th>
                                <th>Nama Barang</th>
                                <th>Merk</th>
                                <th>Harga Jual</th>
                                <th>Aksi</th>
                            </tr>
                            <?php
                            if ($cari == null) {
                                echo '';
                            } else {
                                foreach ($cari as $hasil) { ?>
                                    <tr>
                                        <td><?= $hasil['id_produk']; ?></td>
                                        <td><?= $hasil['nama_produk']; ?></td>
                                        <td><?= $hasil['merk']; ?></td>
                                        <td><?= $hasil['harga_jual']; ?></td>
                                        <td>
                                            <form action="" method="post">
                                                <input type="hidden" name="id_barang" id="id_barang" value="<?= $hasil['id_produk']; ?>">
                                                <button type="submit" name="submit" class="btn btn-success ">
                                                    <i class="fa fa-shopping-cart"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-sm-12">
            <div class="card card-primary">
                <div class="card-header bg-primary text-white">
                    <h5><i class="fa fa-shopping-cart"></i> KASIR
                        <a class="btn btn-danger float-right" onclick="javascript:return confirm('Apakah anda ingin reset keranjang ?');" href="fungsi/hapus/hapus.php?penjualan=jual">
                            <b>RESET KERANJANG</b></a>
                    </h5>
                </div>

                <div class="card-body">
                    <div id="keranjang" class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <td><b>Tanggal</b></td>
                                <td><input type="text" readonly="readonly" class="form-control" value="<?php date_default_timezone_set("Asia/Jakarta");
                                                                                                        echo date("j F Y, G:i"); ?>" name="tgl"></td>
                            </tr>
                        </table>
                        <table class="table table-bordered w-100" id="example1">
                            <thead>
                                <tr>
                                    <td> No</td>
                                    <td> Nama Barang</td>
                                    <td style="width:10%;"> Jumlah</td>
                                    <td style="width:20%;"> Total</td>
                                    <td> Kasir</td>
                                    <td> Aksi</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $total_bayar = 0;
                                $no = 1;
                                ?>
                                <?php foreach ($penjualan as $isi) { ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $isi['nama_barang']; ?></td>
                                        <td>
                                            <!-- aksi ke table penjualan -->
                                            <form method="POST" action="fungsi/edit/edit.php?jual=jual">
                                                <input type="number" name="jumlah" value="<?php echo $isi['jumlah']; ?>" class="form-control">
                                                <input type="hidden" name="id" value="<?php echo $isi['id_penjualan']; ?>" class="form-control">
                                                <input type="hidden" name="id_barang" value="<?php echo $isi['id_barang']; ?>" class="form-control">
                                        </td>
                                        <td>Rp.<?php echo number_format($isi['total']); ?>,-</td>
                                        <td><?php echo $isi['nm_member']; ?></td>
                                        <td>
                                            <button type="submit" class="btn btn-warning">Update</button>
                                            </form>
                                            <!-- aksi ke table penjualan -->
                                            <a href="fungsi/hapus/hapus.php?jual=jual&id=<?php echo $isi['id_penjualan']; ?>&brg=<?php echo $isi['id_barang']; ?>
											&jml=<?php echo $isi['jumlah']; ?>" class="btn btn-danger"><i class="fa fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php $no++;
                                    $total_bayar += $isi['total'];
                                } ?>
                            </tbody>
                        </table>
                        <br />
                        <?php $jumlah; ?>
                        <div id="kasirnya">
                            <table class="table table-stripped">
                                <?= $total; ?>
                                <?= $bayar; ?>
                                <!-- aksi ke table nota -->
                                <form method="POST" action="index.php?page=jual&nota=yes#kasirnya">
                                    <?php foreach ($penjualan as $isi) {; ?>
                                        <input type="hidden" name="id_barang[]" value="<?php echo $isi['id_barang']; ?>">
                                        <input type="hidden" name="id_member[]" value="<?php echo $isi['id_member']; ?>">
                                        <input type="hidden" name="jumlah[]" value="<?php echo $isi['jumlah']; ?>">
                                        <input type="hidden" name="total1[]" value="<?php echo $isi['total']; ?>">
                                        <input type="hidden" name="tgl_input[]" value="<?php echo $isi['tanggal_input']; ?>">
                                        <input type="hidden" name="periode[]" value="<?php echo date('m-Y'); ?>">
                                    <?php $no++;
                                    } ?>
                                    <tr>
                                        <td>Total Semua </td>
                                        <td><input type="text" class="form-control" name="total" value="<?php echo $total_bayar; ?>"></td>

                                        <td>Bayar </td>
                                        <td><input type="text" class="form-control" name="bayar" value="<?= $bayar; ?>"></td>
                                        <td><button class="btn btn-success"><i class="fa fa-shopping-cart"></i> Bayar</button>
                                            <?php if (!empty($this->db->get('nota') == 'yes')) { ?>
                                                <a class="btn btn-danger" href="fungsi/hapus/hapus.php?penjualan=jual">
                                                    <b>RESET</b></a>
                                        </td><?php } ?></td>
                                    </tr>
                                </form>
                                <!-- aksi ke table nota -->
                                <tr>
                                    <td>Kembali</td>
                                    <td><input type="text" class="form-control" value="<?php echo $hitung; ?>"></td>
                                    <td></td>
                                    <td>
                                        <!-- <a href="print.php?nm_member=<?php echo $_SESSION['admin']['nm_member']; ?>
									&bayar=<?php echo $bayar; ?>&kembali=<?php echo $hitung; ?>" target="_blank"> -->
                                        <button class="btn btn-secondary">
                                            <i class="fa fa-print"></i> Print Untuk Bukti Pembayaran
                                        </button></a>
                                    </td>
                                </tr>
                            </table>
                            <br />
                            <br />
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script>
            // AJAX call for autocomplete 
            $(document).ready(function() {
                $("#cari").change(function() {
                    $.ajax({
                        type: "POST",
                        url: "<?= base_url('kasir/produk_tampil'); ?>",
                        data: 'keyword=' + $(this).val(),
                        beforeSend: function() {
                            $("#hasil_cari").hide();
                            $("#tunggu").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
                        },
                        success: function(html) {
                            $("#tunggu").html('');
                            $("#hasil_cari").show();
                            $("#hasil_cari").html(html);
                        }
                    });
                });
            });
            // To select country name
        </script>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->