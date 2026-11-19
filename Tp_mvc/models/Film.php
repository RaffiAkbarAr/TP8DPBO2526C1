<?php
require_once 'DB.php';
class Film extends DB {
    public function getFilm() {
        return $this->execute("SELECT film.id, film.judul_film, film.tahun_rilis, sutradara.nama_sutradara, genre.nama_genre FROM film JOIN sutradara ON film.id_sutradara = sutradara.id JOIN genre ON film.id_genre = genre.id");
    }
    public function getFilmById($id) {
        return $this->execute("SELECT * FROM film WHERE id=$id");
    }
    public function addFilm($data) {
        $judul = $data['judul_film']; $tahun = $data['tahun_rilis']; $id_sutradara = $data['id_sutradara']; $id_genre = $data['id_genre'];
        return $this->execute("INSERT INTO film (judul_film, tahun_rilis, id_sutradara, id_genre) VALUES ('$judul', $tahun, $id_sutradara, $id_genre)");
    }
    public function updateFilm($id, $data) {
        $judul = $data['judul_film']; $tahun = $data['tahun_rilis']; $id_sutradara = $data['id_sutradara']; $id_genre = $data['id_genre'];
        return $this->execute("UPDATE film SET judul_film='$judul', tahun_rilis=$tahun, id_sutradara=$id_sutradara, id_genre=$id_genre WHERE id=$id");
    }
    public function deleteFilm($id) { return $this->execute("DELETE FROM film WHERE id=$id"); }
}
?>