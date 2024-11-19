<?php
if (!isset($_SESSION)) {
    session_start();
}

$data = json_decode(file_get_contents('php://input'), true);
$_SESSION['linearClassic'] = $data['linearClassic'];
$_SESSION['linearAdmin'] = $data['linearAdmin'];
?>