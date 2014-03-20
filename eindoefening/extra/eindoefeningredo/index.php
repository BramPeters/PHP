<?php

if (session_id() === "") {
    session_start();
}

// This is an, airquotes, router, end airquotes, for the pizzapie site.
$page = $_GET['page'];

switch ($page) {
    case 'detail':
        require_once('detail.php');
    break;

    case 'cart':
        require_once('cart.php');
    break;

    default:
    case 'list':
        require_once('overview.php');
    break;
}

require_once('views/template.php');
