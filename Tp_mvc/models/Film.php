<?php

require_once 'DB.php';

/**
 * Kelas Model Film
 * Menangani operasi CRUD tabel film dan relasinya dengan sutradara & genre
 */
class Film extends DB {

    /**
     * Mengambil semua data film dengan relasi nama sutradara dan nama genre
     * 
     * @return mysqli_result
     */
    public function getFilm() {
        $query = "SELECT film.id, film.judul_film, film.tahun_rilis, 
                         sutradara.nama_sutradara, genre.nama_genre 
                  FROM film 
                  JOIN sutradara ON film.id_sutradara = sutradara.id 
                  JOIN genre ON film.id_genre = genre.id";
        return $this->execute($query);
    }

    /**
     * Mengambil satu data film berdasarkan ID
     * 
     * @param int $id ID film yang dicari
     * @return mysqli_result
     */
    public function getFilmById($id) {
        $query = "SELECT * FROM film WHERE id = $id";
        return $this->execute($query);
    }

    /**
     * Menambahkan data film baru ke tabel film
     * 
     * @param array $data Data film dari form (judul_film, tahun_rilis, id_sutradara, id_genre)
     * @return mysqli_result|bool
     */
    public function addFilm($data) {
        $judul = $data['judul_film'];
        $tahun = $data['tahun_rilis'];
        $id_sutradara = $data['id_sutradara'];
        $id_genre = $data['id_genre'];
        $query = "INSERT INTO film (judul_film, tahun_rilis, id_sutradara, id_genre) 
                  VALUES ('$judul', $tahun, $id_sutradara, $id_genre)";
        return $this->execute($query);
    }

    /**
     * Memperbarui data film berdasarkan ID
     * 
     * @param int $id ID film yang akan diperbarui
     * @param array $data Data film yang diperbarui
     * @return mysqli_result|bool
     */
    public function updateFilm($id, $data) {
        $judul = $data['judul_film'];
        $tahun = $data['tahun_rilis'];
        $id_sutradara = $data['id_sutradara'];
        $id_genre = $data['id_genre'];
        $query = "UPDATE film 
                  SET judul_film = '$judul', tahun_rilis = $tahun, 
                      id_sutradara = $id_sutradara, id_genre = $id_genre 
                  WHERE id = $id";
        return $this->execute($query);
    }

    /**
     * Menghapus data film berdasarkan ID
     * 
     * @param int $id ID film yang akan dihapus
     * @return mysqli_result|bool
     */
    public function deleteFilm($id) {
        $query = "DELETE FROM film WHERE id = $id";
        return $this->execute($query);
    }
}
?>
