<?php



require_once  $_SERVER['DOCUMENT_ROOT'] . '/Views/templates/header.php';
if (isset($_GET['action']) && isset($_GET['controller'])) {

    require_once './Controllers/' . $_GET['controller'] . '.php';

    $controller = new $_GET['controller'];

    $controller->{$_GET['action']}();
}
require_once  $_SERVER['DOCUMENT_ROOT'] . '/Views/templates/footer.php';
