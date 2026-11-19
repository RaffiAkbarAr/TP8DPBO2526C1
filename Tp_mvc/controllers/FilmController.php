<?php
require_once 'models/Film.php'; require_once 'models/Sutradara.php'; require_once 'models/Genre.php'; require_once 'views/FilmView.php';
class FilmController {
    public function index() {
        $film = new Film(); $sutradara = new Sutradara(); $genre = new Genre(); $view = new FilmView();
        $view->render($film->getFilm(), $sutradara->getSutradara(), $genre->getGenre(), null);
    }
    public function edit($id) {
        $film = new Film(); $sutradara = new Sutradara(); $genre = new Genre(); $view = new FilmView();
        $view->render($film->getFilm(), $sutradara->getSutradara(), $genre->getGenre(), $film->getFilmById($id));
    }
    public function add($data) {
        $film = new Film(); $film->addFilm($data); header("location:index.php");
    }
    public function update($id, $data) {
        $film = new Film(); $film->updateFilm($id, $data); header("location:index.php");
    }
    public function delete($id) {
        $film = new Film(); $film->deleteFilm($id); header("location:index.php");
    }
}
?>