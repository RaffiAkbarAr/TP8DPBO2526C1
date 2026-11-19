<?php

require_once 'DB.php';

/**
 * Kelas Model Sutradara
 * Menangani operasi CRUD pada tabel sutradara
 */
class Sutradara extends DB {

    /**
     * Mengambil semua data sutradara dari basis data
     * 
     * @return mysqli_result
     */
    public function getSutradara() {
        $query = "SELECT * FROM sutradara";
        return $this->execute($query);
    }

    /**
     * Mengambil satu data sutradara berdasarkan ID
     * 
     * @param int $id ID sutradara yang dicari
     * @return mysqli_result
     */
    public function getSutradaraById($id) {
        $query = "SELECT * FROM sutradara WHERE id = $id";
        return $this->execute($query);
    }

    /**
     * Menambahkan data sutradara baru ke tabel sutradara
     * 
     * @param array $data Data input form (nama_sutradara, negara)
     * @return mysqli_result|bool
     */
    public function addSutradara($data) {
        $nama = $data['nama_sutradara'];
        $negara = $data['negara'];
        $query = "INSERT INTO sutradara (nama_sutradara, negara) VALUES ('$nama', '$negara')";
        return $this->execute($query);
    }

    /**
     * Memperbarui data sutradara berdasarkan ID
     * 
     * @param int $id ID sutradara yang akan diperbarui
     * @param array $data Data nama dan negara baru
     * @return mysqli_result|bool
     */
    public function updateSutradara($id, $data) {
        $nama = $data['nama_sutradara'];
        $negara = $data['negara'];
        $query = "UPDATE sutradara SET nama_sutradara = '$nama', negara = '$negara' WHERE id = $id";
        return $this->execute($query);
    }

    /**
     * Menghapus data sutradara berdasarkan ID
     * 
     * @param int $id ID sutradara yang akan dihapus
     * @return mysqli_result|bool
     */
    public function deleteSutradara($id) {
        $query = "DELETE FROM sutradara WHERE id = $id";
        return $this->execute($query);
    }
}
?>
