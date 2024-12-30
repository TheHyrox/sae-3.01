<?php
$base_url = ($_SERVER['HTTP_HOST'] == 'localhost') ? '' : '/~inf2pj06';

$request = $_SERVER['REQUEST_URI'];
$request = strtok($request, '?');

if (str_starts_with($request, $base_url)) {
    $request = substr($request, strlen($base_url));
}

$routes = [
    '/' => 'HTML/index.php',
    '/index' => 'HTML/index.php',
    '/event' => 'HTML/event.php',
    '/shop' => 'HTML/shop.php',
    '/agenda' => 'HTML/agenda.php',
    '/newsletter' => 'HTML/newsletter.php',
    '/checkout' => 'HTML/checkout.php',
    '/account' => 'HTML/account.php',
    '/login' => 'HTML/login.php',
    '/adminAccount' => 'HTML/adminAccount.php',
    '/adminLogin' => 'HTML/adminLogin.php',
    '/activity' => 'HTML/activity.php',
    '/membersList' => 'HTML/membersList.php',
    '/file' => 'HTML/file.php',
    '/gestion' => 'HTML/gestion.php',
    '/newsletterAdmin' => 'HTML/newsletterAdmin.php',
    '/partenaire' => 'HTML/partenaire.php',
    '/membreBDE' => 'HTML/membreBDE.php',
    '/galerie' => 'HTML/galerie.php',
    '/404' => 'HTML/404.html'
];

if (array_key_exists($request, $routes)) {
    include $routes[$request];
} else {
    http_response_code(404);
    header('Location: ' . $base_url . '/404');
}
?>