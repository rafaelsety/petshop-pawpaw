				<div class="container-fluid">

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
						<div class="card-header"><strong>Detail Transaksi - <?= $penjualan->no_transaksi ?></strong></div>
						<div class="card-body">
							<div class="float-right mb-3">
								<a href="<?= base_url('transaksi/export_detail/' . $penjualan->no_transaksi) ?>" class="btn btn-danger btn-sm" target="_blank"><i class="fa fa-file-pdf"></i>&nbsp;&nbsp;Export</a>
								<a href="<?= base_url('transaksi') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
							</div>
							<div class="row">
								<div class="col-md-6">
									<table class="table table-borderless">
										<tr>
											<td><strong>No Penjualan</strong></td>
											<td>:</td>
											<td><?= $penjualan->no_transaksi ?></td>
										</tr>
										<tr>
											<td><strong>Nama Kasir</strong></td>
											<td>:</td>
											<td><?= $penjualan->username ?></td>
										</tr>
										<tr>
											<td><strong>Waktu Penjualan</strong></td>
											<td>:</td>
											<td><?= $penjualan->tgl_transaksi ?> - <?= $penjualan->jam_transaksi ?></td>
										</tr>
									</table>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-md-12">
									<table class="table table-bordered">
										<thead>
											<tr>
												<td><strong>No</strong></td>
												<td><strong>Nama Barang</strong></td>
												<td><strong>Kode Barang</strong></td>
												<td><strong>Jenis Hewan</strong></td>
												<td><strong>Harga Barang</strong></td>
												<td><strong>Jumlah</strong></td>
												<td><strong>Sub Total</strong></td>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($all_detail_penjualan as $detail_penjualan) : ?>
												<tr>
													<td><?= $no++ ?></td>
													<td><?= $detail_penjualan->nama_produk ?></td>
													<td><?= $detail_penjualan->kode_produk ?></td>
													<td><?= $detail_penjualan->jenis_hewan ?></td>
													<td>Rp <?= number_format($detail_penjualan->harga_produk, 0, ',', '.') ?></td>
													<td><?= $detail_penjualan->jumlah_produk ?></td>
													<td>Rp <?= number_format($detail_penjualan->sub_total, 0, ',', '.') ?></td>
												</tr>
											<?php endforeach ?>
											<tr>
												<td colspan="6" align="right"><strong>Total : </strong></td>
												<td>Rp <?= number_format($penjualan->total, 0, ',', '.') ?></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>