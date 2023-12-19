<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Models/Usuarios.php'; 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="../assets/tabla.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400&family=Quicksand:wght@300;400&display=swap" rel="stylesheet">
</head>

<body>
    <section class="infoPage">
        <div class="infoMaestrosBtn">
            <h2>Información de Maestros</h2>
            <a href="./createTeachers.php"><button id="agregarMaestro">Agregar Maestro</button></a>
        </div>
        <table>
            <tr>
                <th class="id">#</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Fec. de Nacimiento</th>
                <th>Clase Asignada</th>
                <th>Editar Inf.</th>
            </tr>
            <tr>
                <td class="id" >1</td>
                <td>Juan Montalvo</td>
                <td>juan@gamsa.com</td>
                <td>22/03/2002</td>
                <td>Ciencias</td>
                <td>
                    <a href="./updateTeacher.php"><span class="material-symbols-outlined">
                        edit
                    </span></a>
                    <a href="../index.php?controller=UserController&action=delete"><span class="material-symbols-outlined">
                        delete
                    </span></a>

                </td>
            </tr>
        </table>
    </section>

</body>

</html>