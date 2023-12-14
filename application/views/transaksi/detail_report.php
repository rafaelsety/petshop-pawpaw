	<div class="row">
		<div class="col text-center">
			<h3 class="h3 text-dark"><?= $title ?></h3>
			<!-- <h4 class="h4 text-dark "><strong><?= $perusahaan->nama_perusahaan ?></strong></h4> -->
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-4">
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
							<td><?= $detail_penjualan->jenis_hewan ?></td>
							<td>Rp <?= number_format($detail_penjualan->harga_produk, 0, ',', '.') ?></td>
							<td><?= $detail_penjualan->jumlah_produk ?></td>
							<td>Rp <?= number_format($detail_penjualan->sub_total, 0, ',', '.') ?></td>
						</tr>
					<?php endforeach ?>
				</tbody>
				<tfoot>
					<tr>
						<td colspan="5" align="right"><strong>Total : </strong></td>
						<td>Rp <?= number_format($penjualan->total, 0, ',', '.') ?></td>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>