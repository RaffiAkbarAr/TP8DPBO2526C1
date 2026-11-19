<?php

require_once 'models/Genre.php';
require_once 'views/GenreView.php';

/**
 * Kelas GenreController
 * Mengendalikan alur logika bisnis, interaksi model, dan tampilan untuk modul Genre
 */
class GenreController {

    /**
     * Menampilkan daftar genre dan formulir penambahan genre
     * 
     * @return void
     */
    public function index() {
        $genre = new Genre();
        $view = new GenreView();
        $view->render($genre->getGenre(), null);
    }

    /**
     * Menampilkan formulir edit genre dengan data terpilih
     * 
     * @param int $id ID genre yang akan diedit
     * @return void
     */
    public function edit($id) {
        $genre = new Genre();
        $view = new GenreView();
        $view->render($genre->getGenre(), $genre->getGenreById($id));
    }

    /**
     * Menangani proses penambahan data genre baru
     * 
     * @param array $data Data input form genre
     * @return void
     */
    public function add($data) {
        $genre = new Genre();
        $genre->addGenre($data);
        header("location:genre.php");
        exit();
    }

    /**
     * Menangani proses pembaruan data genre
     * 
     * @param int $id ID genre yang diperbarui
     * @param array $data Data nama genre baru
     * @return void
     */
    public function update($id, $data) {
        $genre = new Genre();
        $genre->updateGenre($id, $data);
        header("location:genre.php");
        exit();
    }

    /**
     * Menangani proses penghapusan data genre berdasarkan ID
     * 
     * @param int $id ID genre yang akan dihapus
     * @return void
     */
    public function delete($id) {
        $genre = new Genre();
        $genre->deleteGenre($id);
        header("location:genre.php");
        exit();
    }
}
?>
