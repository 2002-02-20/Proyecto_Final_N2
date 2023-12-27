<?php
session_start();

if (isset($_SESSION['userData'])) {

    $userData = $_SESSION['userData'];

    $maestros  = ['Clases' => 'index.php?'];
    $tipoMenu2 = ['MENU MAESTRO' => 'index.php?'];
    $maestros1 = ['maestro'  => 'index.php?', 'Maestro' => 'index.php?'];
    $navBArMaestros = ['Maestro' => 'index.php?'];
    $admin = ['Permisos' => 'index.php?controller=UserController&action=selecRol', 'Maestros' => 'index.php?controller=UserController&action=index', 'Clases' => 'index.php?controller=UserController&action=materias'];

    $admin1 = ['admin'  => 'index.php?', 'Administrador' => 'index.php?'];
    $navBAr = ['Administrador' => 'index.php?'];
    $tipoMenu1 = ['MENU ADMINISTRADOR' => 'index.php?'];

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
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Information</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />


    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400&family=Quicksand:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/info.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <script src="/JS//interactiveMenu.js" defer></script>

</head>
</head>

<body class="body">
    <nav class="green">
        <ul class="ulNav">
            <li id="menuHome">Home</li>
            <li><button class="btnAdministrador">
                    <?php foreach ($menu2 as $key => $options) : ?>
                        <p><?= $key ?></p>
                    <?php endforeach; ?>


                    <span class="material-symbols-outlined">
                        arrow_drop_down
                    </span>
                </button>
                <ul class="ulNavInteractive">
                    <li class="liPerfil"><span class="material-symbols-outlined">
                            account_circle
                        </span><a href="#" class="liPerfil">Perfil</a></li>

                    <li class="liLogout"><span class="material-symbols-outlined">
                            logout
                        </span><a href="../index.php?Controllers/UserController&action=logout" class="liLogout">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
</body>

</html>