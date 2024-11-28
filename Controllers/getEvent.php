<?php
require_once '../Controllers/gestionController.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $gestionController = new gestionController();
    $event = $gestionController->getEventById($id);
    echo json_encode($event);
}
