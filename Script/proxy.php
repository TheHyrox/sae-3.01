<?php
if (isset($_GET['url'])) {
    $url = filter_var($_GET['url'], FILTER_VALIDATE_URL);
    if ($url) {
        header('Content-Type: text/calendar');
        echo file_get_contents($url);
    } else {
        http_response_code(400);
        echo 'URL invalide.';
    }
} else {
    http_response_code(400);
    echo 'Paramètre URL manquant.';
}
?>
