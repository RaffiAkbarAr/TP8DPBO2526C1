<?php
require_once 'controllers/GenreController.php';
$controller = new GenreController();
if (isset($_POST['add'])) { $controller->add($_POST); } 
else if (isset($_POST['update'])) { $controller->update($_POST['id'], $_POST); } 
else if (isset($_GET['edit'])) { $controller->edit($_GET['edit']); } 
else if (isset($_GET['hapus'])) { $controller->delete($_GET['hapus']); } 
else { $controller->index(); }
?>