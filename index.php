
<?php



require_once  $_SERVER['DOCUMENT_ROOT'] . '/Views/templates/header.php';
require_once  $_SERVER['DOCUMENT_ROOT'] . '/Views/dashboard.php';

if (isset($_GET['action']) && isset($_GET['controller'])) {

    require_once './Controllers/' . $_GET['controller'] . '.php';

    $controller = new $_GET['controller'];

    $controller->{$_GET['action']}();
}

 require_once  $_SERVER['DOCUMENT_ROOT'] . '/Views/templates/footer.php'; 

 
/*
http://localhost:3000/index.php?controller=UserController&action=index
http://localhost:3000/index.php?controller=ClasesController&action=materias */