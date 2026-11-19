<?php

require_once 'DB.php';

/**
 * Kelas Model Genre
 * Menangani operasi CRUD pada tabel genre
 */
class Genre extends DB {

    /**
     * Mengambil semua data genre dari basis data
     * 
     * @return mysqli_result
     */
    public function getGenre() {
        $query = "SELECT * FROM genre";
        return $this->execute($query);
    }

    /**
     * Mengambil satu data genre berdasarkan ID
     * 
     * @param int $id ID genre yang dicari
     * @return mysqli_result
     */
    public function getGenreById($id) {
        $query = "SELECT * FROM genre WHERE id = $id";
        return $this->execute($query);
    }

    /**
     * Menambahkan data genre baru ke tabel genre
     * 
     * @param array $data Data input form (nama_genre)
     * @return mysqli_result|bool
     */
    public function addGenre($data) {
        $nama = $data['nama_genre'];
        $query = "INSERT INTO genre (nama_genre) VALUES ('$nama')";
        return $this->execute($query);
    }

    /**
     * Memperbarui data genre yang ada berdasarkan ID
     * 
     * @param int $id ID genre yang akan diperbarui
     * @param array $data Data nama genre baru
     * @return mysqli_result|bool
     */
    public function updateGenre($id, $data) {
        $nama = $data['nama_genre'];
        $query = "UPDATE genre SET nama_genre = '$nama' WHERE id = $id";
        return $this->execute($query);
    }

    /**
     * Menghapus data genre berdasarkan ID
     * 
     * @param int $id ID genre yang akan dihapus
     * @return mysqli_result|bool
     */
    public function deleteGenre($id) {
        $query = "DELETE FROM genre WHERE id = $id";
        return $this->execute($query);
    }
}
?>
