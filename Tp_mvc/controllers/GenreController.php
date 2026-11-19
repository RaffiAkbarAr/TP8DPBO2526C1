<?php
require_once 'models/Genre.php'; require_once 'views/GenreView.php';
class GenreController {
    public function index() {
        $genre = new Genre(); $view = new GenreView(); $view->render($genre->getGenre(), null);
    }
    public function edit($id) {
        $genre = new Genre(); $view = new GenreView(); $view->render($genre->getGenre(), $genre->getGenreById($id));
    }
    public function add($data) {
        $genre = new Genre(); $genre->addGenre($data); header("location:genre.php");
    }
    public function update($id, $data) {
        $genre = new Genre(); $genre->updateGenre($id, $data); header("location:genre.php");
    }
    public function delete($id) {
        $genre = new Genre(); $genre->deleteGenre($id); header("location:genre.php");
    }
}
?>