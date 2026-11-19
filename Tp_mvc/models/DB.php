<?php

/**
 * Kelas DB
 * Menangani koneksi dasar ke basis data MySQL menggunakan ekstensi mysqli
 */
class DB {
    /**
     * Objek koneksi mysqli
     * @var mysqli
     */
    protected $conn;

    /**
     * Konstruktor: Menginisialisasi koneksi basis data dari konfigurasi
     */
    public function __construct() {
        include 'config.php';
        $this->conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
        if ($this->conn->connect_error) {
            die("Koneksi basis data gagal: " . $this->conn->connect_error);
        }
    }

    /**
     * Mengeksekusi perintah query SQL ke basis data
     * 
     * @param string $query Perintah query SQL
     * @return mysqli_result|bool Hasil eksekusi query
     */
    public function execute($query) {
        return $this->conn->query($query);
    }

    /**
     * Menutup koneksi aktif ke basis data
     * 
     * @return void
     */
    public function close() {
        $this->conn->close();
    }
}
?>
