<?php
$page = isset($_GET["page"]) ? $_GET["page"] : "";

switch ($page) {
    case 'home': include('home.php'); break;
    case 'products': include('products.php'); break;
    case 'contacts': include('contacts.php'); break;
    case 'reg': include('reg.php'); break;
    case 'login': include('login.php'); break;
    case 'logout': include('logout.php'); break;
    default: include('home.php'); break;
}