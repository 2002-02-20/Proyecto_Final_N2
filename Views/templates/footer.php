<?php

$_SESSION['userData'];
$nombrePerfil = '';

if ($_SESSION['userData']['rol_id'] === 1) {
    $nombrePerfil = 'ADMINISTRADOR';
} elseif ($_SESSION['userData']['rol_id'] === 2) {
    $nombrePerfil = 'MAESTRO';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Information</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
</head>
</head>
<!-- ARREGLAR EL MENU INTERACTIVO LINEA 43 -->

<body class="body">
    <nav class="sideBar">
        <div class="logoTitulo">
            <img src="../assets/logo.jpg" alt="university_Icon" class="university_Icon">
            <p>Universidad</p>
        </div>

        <div class="categoriasPerfil">
            <p><strong><?= $nombrePerfil ?></strong></p>
            <p><?= $userData['nombres'] . ' ' . $userData['apellidos'] ?></p>
        </div>


        <div class="sectionPerfil">
            <?php foreach ($tipoMenu as $key => $options) : ?>
                <p><?= $key ?></p>
            <?php endforeach; ?>

            <?php foreach ($menu as $key => $options) : ?>
                <li class="li">

                    <img src="<?= $options['icon'] ?>" alt="logo" width="20" height="20">
                    <a href="<?= $options['url'] ?>"><?= $key ?></a>
                </li>
            <?php endforeach; ?>

        </div>
    </nav>

</body>

</html>