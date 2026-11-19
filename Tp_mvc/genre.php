<?php

/**
 * Entry Point - Halaman Kelola Genre
 * Mengatur routing permintaan (Create, Read, Update, Delete) ke GenreController
 */

require_once 'controllers/GenreController.php';

$controller = new GenreController();

if (isset($_POST['add'])) {
    // Memproses form penambahan genre baru
    $controller->add($_POST);
} elseif (isset($_POST['update'])) {
    // Memproses form pembaruan data genre
    $controller->update($_POST['id'], $_POST);
} elseif (isset($_GET['edit'])) {
    // Menampilkan form edit genre dengan data terpilih
    $controller->edit($_GET['edit']);
} elseif (isset($_GET['hapus'])) {
    // Memproses penghapusan data genre
    $controller->delete($_GET['hapus']);
} else {
    // Menampilkan halaman utama daftar genre
    $controller->index();
}
?>
