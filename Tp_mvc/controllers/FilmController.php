<?php

require_once 'models/Film.php';
require_once 'models/Sutradara.php';
require_once 'models/Genre.php';
require_once 'views/FilmView.php';

/**
 * Kelas FilmController
 * Mengendalikan alur logika bisnis, interaksi model, dan tampilan untuk modul Film
 */
class FilmController {

    /**
     * Menampilkan halaman utama daftar film beserta formulir tambah data
     * 
     * @return void
     */
    public function index() {
        $film = new Film();
        $sutradara = new Sutradara();
        $genre = new Genre();
        $view = new FilmView();

        $view->render(
            $film->getFilm(),
            $sutradara->getSutradara(),
            $genre->getGenre(),
            null
        );
    }

    /**
     * Menampilkan form edit film dengan data yang telah terpilih
     * 
     * @param int $id ID film yang akan diedit
     * @return void
     */
    public function edit($id) {
        $film = new Film();
        $sutradara = new Sutradara();
        $genre = new Genre();
        $view = new FilmView();

        $view->render(
            $film->getFilm(),
            $sutradara->getSutradara(),
            $genre->getGenre(),
            $film->getFilmById($id)
        );
    }

    /**
     * Menangani proses penambahan data film baru dari form
     * 
     * @param array $data Data input form film
     * @return void
     */
    public function add($data) {
        $film = new Film();
        $film->addFilm($data);
        header("location:index.php");
        exit();
    }

    /**
     * Menangani proses pembaruan data film yang telah diedit
     * 
     * @param int $id ID film yang diperbarui
     * @param array $data Data film baru
     * @return void
     */
    public function update($id, $data) {
        $film = new Film();
        $film->updateFilm($id, $data);
        header("location:index.php");
        exit();
    }

    /**
     * Menangani proses penghapusan data film berdasarkan ID
     * 
     * @param int $id ID film yang akan dihapus
     * @return void
     */
    public function delete($id) {
        $film = new Film();
        $film->deleteFilm($id);
        header("location:index.php");
        exit();
    }
}
?>
