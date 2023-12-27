<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Models/Usuarios.php';
$select = new Usuarios;
$allData = $select->selectRol();

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
    <h3>Permisos </h3>
    </div>
    <table id="myTable" class="table">
        <thead>
            <tr>
                <th class="id">#</th>
                <th>Email/Usuario</th>
                <th>Permiso</th>
                <th>Accion</th>
            </tr>
        </thead>
        <tbody id="tableBody">
            <?php foreach ($allData as $key) : ?>
                <tr>
                    <td><?= $key['id'] ?></td>
                    <td><?= $key['email'] ?></td>
                    <td><?= $key['rol_nombre'] ?></td>

                    <td>
                            <span class="material-symbols-outlined" data-bs-toggle="modal" data-bs-target="#exampleModalLong">
                                edit_square
                            </span>
                   
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
<!-- Button trigger modal -->
<div class="container mt-5">


<!-- Modal  agregar-->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel">Editar Permisos</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="../index.php?controller=UserController&action=permisosController" method="POST">

                    <div class="mb-3">
                    <label for="emailUsuario">Email del Usuario</label>
                        <input type="email" id="emailUsuario" name="email" value="<?= $key['email'] ?>"  placeholder="<?= $key['email'] ?>" class="form-control" disabled>

                    </div>

                    <div class="selectInput">
                        <select name="rol_id"  class="form-control">
                            <option value="" disabled selected>Selecciona un rol</option>

                            <option value="1">Admin</option>
                            <option value="2">Maestro</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="btnGuardarCambios"  class="btn btn-primary" >Guardar Cambios</button>
                    </div>

                </form>


            </div>
        </div>

    </div>


</div>
</div>
</div>

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