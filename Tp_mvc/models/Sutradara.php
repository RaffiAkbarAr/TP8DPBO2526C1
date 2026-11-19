<?php
require_once 'DB.php';
class Sutradara extends DB {
    public function getSutradara() { return $this->execute("SELECT * FROM sutradara"); }
    public function getSutradaraById($id) { return $this->execute("SELECT * FROM sutradara WHERE id=$id"); }
    public function addSutradara($data) {
        $nama = $data['nama_sutradara']; $negara = $data['negara'];
        return $this->execute("INSERT INTO sutradara (nama_sutradara, negara) VALUES ('$nama', '$negara')");
    }
    public function updateSutradara($id, $data) {
        $nama = $data['nama_sutradara']; $negara = $data['negara'];
        return $this->execute("UPDATE sutradara SET nama_sutradara='$nama', negara='$negara' WHERE id=$id");
    }
    public function deleteSutradara($id) { return $this->execute("DELETE FROM sutradara WHERE id=$id"); }
}
?>