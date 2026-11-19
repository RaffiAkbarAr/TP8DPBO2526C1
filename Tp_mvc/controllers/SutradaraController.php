<?php
require_once 'models/Sutradara.php'; require_once 'views/SutradaraView.php';
class SutradaraController {
    public function index() {
        $sutradara = new Sutradara(); $view = new SutradaraView(); $view->render($sutradara->getSutradara(), null);
    }
    public function edit($id) {
        $sutradara = new Sutradara(); $view = new SutradaraView(); $view->render($sutradara->getSutradara(), $sutradara->getSutradaraById($id));
    }
    public function add($data) {
        $sutradara = new Sutradara(); $sutradara->addSutradara($data); header("location:sutradara.php");
    }
    public function update($id, $data) {
        $sutradara = new Sutradara(); $sutradara->updateSutradara($id, $data); header("location:sutradara.php");
    }
    public function delete($id) {
        $sutradara = new Sutradara(); $sutradara->deleteSutradara($id); header("location:sutradara.php");
    }
}
?>