<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Models/Clases.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Controllers/ClasesController.php';


$select = new Clases;
$allData = $select->materiasA();

$nullMaestro = new Clases;
$null = $nullMaestro->traerMaestroModel();

?>

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

<link rel="stylesheet" href="../assets/tabla.css">


<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400&family=Quicksand:wght@300;400&display=swap" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">


<section class="infoPage mt-3">
    <div class="containerBtn">
        <h3>Clases </h3>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalLong">
            Agregar Clase
        </button>
    </div>


    <!-- Modal  agregar-->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel">Agregar Clase</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="../index.php?controller=ClasesController&action=agregarMateria" method="POST">

                        <div class="mb-3">
                            <label for="nombreMateria"><strong>Nombre de la Materia</strong></label>
                            <input type="text" class="form-control" id="nombreMateria" name="nombreMateria" placeholder="Nombre de la Materia">

                        </div>

                        <div class="mb-3">
                            <label for="nombreMateria"><strong>Maestro disponible para la Clase</strong></label>

                            <select name="nombre" class="form-control">
                                <option value="" disabled selected>Sin Asignar</option>
                                <?php foreach ($null as $nombreMaestro) : ?>

                                    <option value="<?= $nombreMaestro['id'] ?>"><?= $nombreMaestro['nombres'] ?> <?= $nombreMaestro['apellidos'] ?></option>
                                <?php endforeach; ?>

                            </select>
                        </div>


                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="btnCrear">Crear</button>
                </div>
                </form>

            </div>
        </div>

    </div>

    </div>
    </div>
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
            <?php foreach ($allData as $key_clases) : ?>
                <tr>
                    <td><?= $key_clases['num_clases'] ?></td>

                    <td><?php if (!isset($key_clases['clases'])) : ?>
                            <style>
                                .red {
                                    color: red;
                                }
                            </style>
                            <span class="red">Sin Registro</span>
                        <?php else : ?>
                            <?= $key_clases['clases'] ?>

                        <?php endif ?>

                    <td>
                        <?php if (!isset($key_clases['nombres'])) : ?>
                            <style>
                                .red {
                                    background-color: #FFCF28;
                                    padding: 3px 5px;
                                    border-radius: 5px;
                                }
                            </style>
                            <span class="red">Sin Asignación</span>
                        <?php else : ?>
                            <?= $key_clases['nombres'] . " " . $key_clases['apellidos'] ?>

                        <?php endif ?>

                    </td>
                    <td><?= $key_clases['clases'] ?></td>
                    <td>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#editClase<?= $key_clases['num_clases'] ?>">  
                        <span class="material-symbols-outlined" >
                            edit_square
                        </span>
                        
                        </a>
                        <a href="../index.php?controller=ClasesController&action=destroy&id=<?= $key_clases['num_clases'] ?>">
                            <span class="material-symbols-outlined" style="color: red">delete</span>
                        </a>

                    </td>
                    

<!-- Modal  agregar-->
<div class="modal fade" id="editClase<?= $key_clases['num_clases'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel">Editar Clase</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="../index.php?controller=ClasesController&action=updateClases&id=<?= $key_clases['num_clases'] ?>" method="POST">


                    <div class="mb-3">
                        <label for="materia">Nombre de la Materia</label>

                        <input type="text" id="materia" name="materia" placeholder="<?= $key_clases['clases'] ?>" class="form-control">
                    </div>


                    <!--     EDITAR -->
                    <div class="selectInput">
                        <label for="profesor">Maestro Asignado</label>

                        <select name="user_id" class="form-control">
                            <option value="" disabled selected>Selecciona un rol</option>

                            <?php foreach ($allData as $key) : ?>

                                <?php if (isset($key['nombres'])) : ?>
                                    <option value="<?= $key['id'] ?>"><?= $key['nombres'] ?> <?= $key['apellidos'] ?></option>

                                <?php endif ?>
                            <?php endforeach; ?>

                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="btnGuardarCambios" class="btn btn-primary">Guardar Cambios</button>
                    </div>

                </form>
            </div>
        </div>

    </div>

</div>
</div>
</div>



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
            lengthMenu: [5, 7],
            searching: true,
            pageLength: 5
        });
    });
</script>