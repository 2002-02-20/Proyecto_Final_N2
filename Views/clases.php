<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Models/Usuarios.php';
$select = new Usuarios;
$allData = $select->selectRegisterTeacher();

?>

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

<link rel="stylesheet" href="../assets/tabla.css">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400&family=Quicksand:wght@300;400&display=swap" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">


<section class="infoPage">
<div class="h3Permisos">
    <h3>Clases </h3>
    </div>

<table id="myTable" class="table">
        <thead>
            <tr>
                <th class="id">#</th>
                <th>Clases</th>
                <th>Maestros</th>
                <th>Alumnos</th>
                <th>Accion</th>
            </tr>
        </thead>
        <tbody id="tableBody">
            <?php foreach ($allData as $key) : ?>
                <tr>
                    <td><?= $key['id']  ?></td>

                    <td><?php if (!isset($key['clases_nombre'])) : ?>
                        <style>
                            .red{
                                color: red;
                            }
                        </style>
                            <span class="red">Sin Registro</span>
                        <?php else : ?>
                            <?= $key['clases_nombre']?>

                        <?php endif ?>
                
                    <td><?= $key['nombres'] . " " . $key['apellidos'] ?></td>
                    <td><?= $key['clase_id'] ?></td>
          
                    <td>
                            <span class="material-symbols-outlined" data-bs-toggle="modal" data-bs-target="#exampleModalLong">
                                edit_square
                            </span>
                   
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>
    
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

<script>
    // Inicializa la tabla con DataTables

    $(document).ready(function() {
        $('#myTable').DataTable({
            lengthMenu: [10, 12],
            searching: true,
            pageLength: 5
        });
    });
</script>