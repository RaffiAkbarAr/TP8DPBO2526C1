<?php

/**
 * Entry Point Utama - Halaman Kelola Film
 * Mengatur routing permintaan (Create, Read, Update, Delete) ke FilmController
 */

require_once 'controllers/FilmController.php';

$controller = new FilmController();

if (isset($_POST['add'])) {
    // Memproses form penambahan film baru
    $controller->add($_POST);
} elseif (isset($_POST['update'])) {
    // Memproses form pembaruan data film
    $controller->update($_POST['id'], $_POST);
} elseif (isset($_GET['edit'])) {
    // Menampilkan halaman form edit dengan data film tertentu
    $controller->edit($_GET['edit']);
} elseif (isset($_GET['hapus'])) {
    // Memproses penghapusan data film
    $controller->delete($_GET['hapus']);
} else {
    // Menampilkan halaman utama daftar film
    $controller->index();
}
?>
