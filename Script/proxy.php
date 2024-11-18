<?php
if (isset($_GET['url'])) {
    $url = $_GET['url'];
    $content = file_get_contents($url);
    if ($content === FALSE) {
        http_response_code(500);
        echo "Erreur lors de la récupération du fichier ICS.";
    } else {
        header('Content-Type: text/calendar');
        echo $content;
    }
} else {
    http_response_code(400);
    echo "URL non spécifiée.";
}
?>