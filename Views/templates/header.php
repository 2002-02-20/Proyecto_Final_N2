<?php
session_start();

if (isset($_SESSION['userData'])) {

    $userData = $_SESSION['userData'];

    $maestros  = ['Clases' => 'index.php?controller=MaestroController&action=index'];
    $tipoMenu2 = ['MENU MAESTRO' => 'index.php?controller=UserController&action=dashboard'];

    $navBArMaestros = ['Maestro' => ''];


    $admin = [
        'Permisos' => 
    [ 'url' => 'index.php?controller=PermisosController&action=selecRol', 'icon' => '../Views/icons/person_add_FILL0_wght400_GRAD0_opsz24.png'],
     'Maestros' => 
     ['url' => 'index.php?controller=UserController&action=index', 'icon' => '../Views/icons/account_box_FILL0_wght400_GRAD0_opsz24.png  '], 
     'Clases' => ['url' => 'index.php?controller=ClasesController&action=materias', 'icon' => '../Views/icons/school_FILL0_wght400_GRAD0_opsz24.png']];


  
    $navBAr = ['Administrador' => 'index.php?controller=UserController&action=logout'];
    
    $tipoMenu1 = ['MENU ADMINISTRADOR' => 'index.php?controller=UserController&action=dashboard'];

    if ($userData['rol_id'] === 1) {
        $menu = $admin;

        $menu2 = $navBAr;
        $tipoMenu = $tipoMenu1;
    } else if ($userData['rol_id'] === 2) {
        $menu = $maestros;
        $menu2 = $navBArMaestros;
        $tipoMenu = $tipoMenu2;
    }
} else {
    header('location: ../Views/login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Information</title>
    <script src="/Views/JS/interactive.js" defer></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400&family=Quicksand:wght@300;400&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="../assets/info.css">



</head>
</head>
<body class="body">
    <nav class="green">
        <ul class="ulNav">
            <li id="menuHome">Home</li>
            <li><button class="btnAdministrador">
                    <?php $usuario = $userData['nombres'] . ' ' . $userData['apellidos'];
                    print_r($usuario);
                    ?>

                    <span class="material-symbols-outlined">
                        arrow_drop_down
                    </span>
                </button>
                <ul class="ulNavInteractive">
                    <li class="liPerfil"><span class="material-symbols-outlined">
                            account_circle
                        </span><a href="../index.php" class="liPerfil">Perfil</a></li>

                    <li class="liLogout"><span class="material-symbols-outlined">
                            logout
                        </span><a href="index.php?controller=UserController&action=logout" class="liLogout">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>

  

</body>

</html>