<?php

require '../../Models/newsletterModel.php';

use Models\newsletterModel;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $text = $_POST['text'];
    $visible = $_POST['visible'];

    $model = new newsletterModel();
    $success = $model->addNewsletter($title, $text, $visible);

    echo json_encode(['success' => $success]);
}