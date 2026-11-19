<?php

/**
 * Entry Point - Halaman Kelola Sutradara
 * Mengatur routing permintaan (Create, Read, Update, Delete) ke SutradaraController
 */

require_once 'controllers/SutradaraController.php';

$controller = new SutradaraController();

if (isset($_POST['add'])) {
    // Memproses form penambahan sutradara baru
    $controller->add($_POST);
} elseif (isset($_POST['update'])) {
    // Memproses form pembaruan data sutradara
    $controller->update($_POST['id'], $_POST);
} elseif (isset($_GET['edit'])) {
    // Menampilkan form edit sutradara dengan data terpilih
    $controller->edit($_GET['edit']);
} elseif (isset($_GET['hapus'])) {
    // Memproses penghapusan data sutradara
    $controller->delete($_GET['hapus']);
} else {
    // Menampilkan halaman utama daftar sutradara
    $controller->index();
}
?>
