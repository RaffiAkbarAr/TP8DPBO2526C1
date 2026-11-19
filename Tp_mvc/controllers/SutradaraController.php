<?php

require_once 'models/Sutradara.php';
require_once 'views/SutradaraView.php';

/**
 * Kelas SutradaraController
 * Mengendalikan alur logika bisnis, interaksi model, dan tampilan untuk modul Sutradara
 */
class SutradaraController {

    /**
     * Menampilkan daftar sutradara dan formulir penambahan data
     * 
     * @return void
     */
    public function index() {
        $sutradara = new Sutradara();
        $view = new SutradaraView();
        $view->render($sutradara->getSutradara(), null);
    }

    /**
     * Menampilkan formulir edit sutradara dengan data terpilih
     * 
     * @param int $id ID sutradara yang akan diedit
     * @return void
     */
    public function edit($id) {
        $sutradara = new Sutradara();
        $view = new SutradaraView();
        $view->render($sutradara->getSutradara(), $sutradara->getSutradaraById($id));
    }

    /**
     * Menangani proses penambahan data sutradara baru
     * 
     * @param array $data Data input form sutradara
     * @return void
     */
    public function add($data) {
        $sutradara = new Sutradara();
        $sutradara->addSutradara($data);
        header("location:sutradara.php");
        exit();
    }

    /**
     * Menangani proses pembaruan data sutradara
     * 
     * @param int $id ID sutradara yang diperbarui
     * @param array $data Data nama dan negara sutradara baru
     * @return void
     */
    public function update($id, $data) {
        $sutradara = new Sutradara();
        $sutradara->updateSutradara($id, $data);
        header("location:sutradara.php");
        exit();
    }

    /**
     * Menangani proses penghapusan data sutradara berdasarkan ID
     * 
     * @param int $id ID sutradara yang akan dihapus
     * @return void
     */
    public function delete($id) {
        $sutradara = new Sutradara();
        $sutradara->deleteSutradara($id);
        header("location:sutradara.php");
        exit();
    }
}
?>
