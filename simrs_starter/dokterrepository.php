<?php
/**
 * Repository untuk mengelola data laporan dokter
 */
class DokterRepository {
    private $db;

    public function __construct($pdo) {
        $this->db = $pdo;
    }

    /**
     * Mengambil rekap kunjungan berdasarkan bulan dan tahun
     */
    public function getRekapKunjungan($bulan, $tahun) {
        // Nama kolom disesuaikan dengan tabel yang lu buat tadi di phpMyAdmin
        $query = "SELECT 
                    d.nama_dokter, 
                    d.spesialisasi, 
                    COUNT(k.id) AS total_kunjungan,
                    SUM(k.biaya) AS total_pendapatan,
                    AVG(k.rating) AS rata_rata_kepuasan
                  FROM dokter d
                  LEFT JOIN kunjungan k ON d.id = k.dokter_id
                  WHERE MONTH(k.tanggal) = :bulan 
                  AND YEAR(k.tanggal) = :tahun
                  GROUP BY d.id";

        $stmt = $this->db->prepare($query);
        $stmt->execute(['bulan' => $bulan, 'tahun' => $tahun]);
        
        return $stmt->fetchAll();
    }
}