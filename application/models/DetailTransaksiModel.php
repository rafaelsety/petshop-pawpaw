<?php

class DetailTransaksiModel {
    // Sesuaikan dengan struktur tabel database
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getDetailTransaksi($transaksiId) {
        // Query database untuk mendapatkan detail transaksi berdasarkan $transaksiId
        // Gantilah dengan query yang sesuai dengan struktur database Anda
        $query = "SELECT * FROM detail_transaksi WHERE transaksi_id = :transaksiId";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':transaksiId', $transaksiId);
        $stmt->execute();

        // Mengembalikan hasil query
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
