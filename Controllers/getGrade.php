<?php
require_once 'gestionController.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $gestionController = new gestionController();
    $grade = $gestionController->getGradeById($id);
    echo json_encode($grade);
}