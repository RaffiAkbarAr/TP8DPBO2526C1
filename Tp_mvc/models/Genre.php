<?php
require_once 'DB.php';
class Genre extends DB {
    public function getGenre() { return $this->execute("SELECT * FROM genre"); }
    public function getGenreById($id) { return $this->execute("SELECT * FROM genre WHERE id=$id"); }
    public function addGenre($data) {
        $nama = $data['nama_genre'];
        return $this->execute("INSERT INTO genre (nama_genre) VALUES ('$nama')");
    }
    public function updateGenre($id, $data) {
        $nama = $data['nama_genre'];
        return $this->execute("UPDATE genre SET nama_genre='$nama' WHERE id=$id");
    }
    public function deleteGenre($id) { return $this->execute("DELETE FROM genre WHERE id=$id"); }
}
?>