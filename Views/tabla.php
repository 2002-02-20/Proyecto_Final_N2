<?php

if (isset($_SESSION['userData'])){
    $dataMaestros = $_SESSION['userData'];

}
else{
    require_once $_SERVER['DOCUMENT_ROOT'] . '/index.php';
}



require_once $_SERVER['DOCUMENT_ROOT'] . '/Models/Usuarios.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Models/Clases.php';

$select = new Usuarios;
$allData = $select->selectRegisterTeacher();

$a = new Usuarios;
$roles = $a->roles();

$clases = new Clases;
$nom_clases = $clases->clases();

?>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<link rel="stylesheet" href="../assets/tabla.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400&family=Quicksand:wght@300;400&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">


<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>


<section class="infoPage mt-3">
    <div class="infoMaestrosBtn">
        <h2>Información de Maestros</h2>
        <div class="btnModels">
            <!-- Tu modal de editar perfil aquí -->

            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalLong">
                Agregar Usuario
            </button>
            <!-- Button trigger modal -->
            <div class="container mt-5">


                <!-- Modal  agregar-->
                <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="modal-title" id="exampleModalLabel">Agregar Usuario</h2>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <form action="../index.php?controller=UserController&action=registerTeacher" method="POST">

                                    <div class="mb-3">
                                        <label for="email"><strong>Correo Electronico</strong></label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Ingresa email">

                                    </div>

                                    <div class="mb-3">
                                        <label for="nombres"><strong>Nombre(s)</strong></label>
                                        <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Ingresa nombre(s)">
                                    </div>


                                    <div class="mb-3">
                                        <label for="apellidos"><strong>Apellido(s)</strong></label>
                                        <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Ingresa apellido(s)">
                                    </div>

                                    <div class="mb-3">
                                        <label for="password"><strong>Contraseña</strong></label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Ingresa su Contraseña">
                                    </div>

                                    <div class="mb-3">

                                        <label for="direccion"><strong>Dirección</strong></label>
                                        <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingresa la dirección">

                                    </div>

                                    <div class="mb-3">
                                        <label for="fechaNacimiento"><strong>Fecha de Nacimiento</strong></label>
                                        <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento" placeholder="mm/dd/yy">
                                    </div>

                                    <div class="mb-3">
                                        <select name="claseAsignada" class="form-control">
                                            <option value="" disabled selected>Seleccion Clases</option>
                                            <?php foreach ($nom_clases as $key) : ?>

                                                <option value="<?= $key['id'] ?>"><?= $key['clases'] ?></option>

                                            <?php endforeach; ?>

                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <select name="rol" class="form-control">
                                            <option value="" disabled selected>Selecciona el Rol</option>
                                            <?php foreach ($roles as $key) : ?>

                                                <option value="<?= $key['id'] ?>"><?= $key['rol'] ?></option>

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
                <th class="id_num">#</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Dirección</th>
                <th>Fec. de Nacimiento</th>
                <th>Clase Asignada</th>
                <th class="editar">Editar</th>
            </tr>
        </thead>
        <tbody id="tableBody">
            <?php foreach ($allData as $key) : ?>
                <tr>
                    <td><?= $key['id'] ?></td>
                    <td><?= $key['nombres'] . " " . $key['apellidos'] ?></td>
                    <td><?= $key['email'] ?></td>
                    <td><?= $key['direccion'] ?></td>
                    <td><?= $key['fecha_nacimiento'] ?></td>
                    <td><?php if (!isset($key['clases_nombre'])) : ?>
                            <style>
                                .red {
                                    background-color: #FFCF28;
                                    padding: 3px 5px;
                                    border-radius: 5px;

                                }
                            </style>
                            <span class="red">Sin Registro</span>
                        <?php else : ?>
                            <?= $key['clases_nombre'] ?>

                        <?php endif ?>
                    </td>
                    <td id="iconsModel">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#editarPerfil<?= $key['id'] ?>">
                            <span class="material-symbols-outlined">
                                edit_square
                            </span>
                        </a>

                        <div class="btnModels">
                            <!-- Modal -->
                            <div class="modal fade" id="editarPerfil<?= $key['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h2 class="modal-title" id="exampleModalLabel">Editar Maestro</h2>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                            <form action="../index.php?controller=UserController&action=update&id=<?= $key['id'] ?>" method="POST">

                                                <div class="mb-3">
                                                    <label for="email"><strong>Correo Electronico</strong></label>
                                                    <input type="text" class="form-control" id="email" name="email" placeholder="<?= $key['email'] ?>" value="<?= $key['email'] ?>">

                                                </div>

                                                <div class="mb-3">
                                                    <label for="nombres"><strong>Nombre(s)</strong></label><br>
                                                    <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Ingrese sus Nombre(s)">

                                                </div>

                                                <div class="mb-3">

                                                    <label for="apellidos"><strong>Apellido(s)</strong></label>
                                                    <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Ingrese sus Apellido(s)" >
                                                </div>

                                                <div class="mb-3">

                                                    <label for="direccion"><strong>Dirección</strong></label>
                                                    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingresa la dirección">
                                                </div>

                                                <div class="mb-3">

                                                    <label for="fechaNacimiento"><strong>Fecha de Nacimiento</strong></label>
                                                    <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento" placeholder="mm/dd/yy">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="telefono"><strong>Clase Asignada</strong></label>
                                                    <select class="form-control" name="claseAsignada">
                                                        <option value="">Seleccion Clases</option>
                                                        <?php foreach ($nom_clases as $key_clases) : ?>

                                                            <option value="<?= $key_clases['id'] ?>"><?= $key_clases['clases'] ?></option>

                                                        <?php endforeach; ?>


                                                    </select>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" id="btnCrear">Guardar Cambios</button>
                                        </div>

                                        </form>
                                    </div>
                                </div>
                            </div>


                        </div>
                        </div>


                        <a href="../index.php?controller=UserController&action=destroy&id=<?= $key['id'] ?>">
                            <span class="material-symbols-outlined" style="color:  #ff5b5b">delete</span>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</section>
</div>

</section>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            lengthMenu: [4, 5],
            searching: true,
            pageLength: 3
        });
    });
</script>