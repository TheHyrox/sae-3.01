<?php
require_once 'gestionController.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $gestionController = new gestionController();
    $product = $gestionController->getProductById($id);
    echo json_encode($product);
}
