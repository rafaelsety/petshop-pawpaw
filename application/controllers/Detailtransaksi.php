<?php

// Hubungkan dengan model dan view yang dibutuhkan
require_once 'DetailTransaksi.php';

class DetailTransaksiController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function showDetailTransaksi($transaksiId) {
        // Mendapatkan detail transaksi dari model
        $detailTransaksi = $this->model->getDetailTransaksi($transaksiId);

        // Memanggil view untuk menampilkan detail transaksi
        include 'DetailTransaksi.php';
    }    
}

// Contoh penggunaan controller
// $detailTransaksiController = new DetailTransaksiController(new DetailTransaksiModel($conn));
// $detailTransaksiController->showDetailTransaksi($transaksiId);
