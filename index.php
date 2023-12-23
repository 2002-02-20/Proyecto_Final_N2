<?php
session_start();
if (isset($_SESSION['userData'])) {
    $userData = $_SESSION['userData'];

    $maestros  = ['Clases' => 'index.php?'];
    $tipoMenu2 = ['MENU MAESTRO'=> 'index.php?']; 
    $maestros1 = ['maestro'  => 'index.php?', 'Maestro'=>'index.php?']; 
    $navBArMaestros = ['Maestro'=>'index.php?']; 

    $admin = ['Permisos' => '', 'Maestros' => 'index.php?controller=UserController&action=index', 'Clases' => ''];

    $admin1 = ['admin'  => 'index.php?', 'Administrador'=>'index.php?']; 
    $navBAr = ['Administrador'=>'index.php?']; 
    $tipoMenu1 = ['MENU ADMINISTRADOR'=> 'index.php?']; 

    if ($userData['rol_id'] === 1) {
        $menu = $admin;
        $menu1 = $admin1;
        $menu2 = $navBAr; 
        $tipoMenu = $tipoMenu1; 
      
    } else if ($userData['rol_id'] === 2) {
        $menu = $maestros;
        $menu1 = $maestros1;
        $menu2 = $navBArMaestros; 
        $tipoMenu = $tipoMenu2; 
    }
} else {
    header('location: ../Views/login.php');
    exit(); 
}


require_once  $_SERVER['DOCUMENT_ROOT'] . '/Views/templates/header.php';
if (isset($_GET['action']) && isset($_GET['controller'])) {

    require_once './Controllers/' . $_GET['controller'] . '.php';

    $controller = new $_GET['controller'];

    $controller->{$_GET['action']}();
}
require_once  $_SERVER['DOCUMENT_ROOT'] . '/Views/templates/footer.php';
