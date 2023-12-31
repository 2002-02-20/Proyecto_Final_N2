<?php

if (isset($_SESSION['userData'])){
    $dataMaestros = $_SESSION['userData'];

}
else{
    require_once $_SERVER['DOCUMENT_ROOT'] . '/index.php';
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/Models/Usuarios.php';
if (isset($_SESSION['claseData']) && !empty($_SESSION['claseData'])) {
    $clase = $_SESSION['claseData'];
}

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
    <div>
        <?php if (!isset($clase['clases'])) : ?>
            <h3>No hay clases Asignadas</h3>
        <?php else : ?>
            <h3>Alumnos de la clase <?php print_r($clase['clases']) ?></h3>
        <?php endif ?>
    </div>
    <table id="myTable" class="table">
        <thead>
            <tr>
                <th class="id">#</th>
                <th>Email</th>
                <th>Fecha de Nacimiento</th>
                <th>Asignatura</th>
            </tr>
        </thead>
        <tbody id="tableBody">
            <tr>
                <td><?= $dataMaestros['id'] ?></td>
                <td><?= $dataMaestros['email'] ?></td>
                <td><?= $dataMaestros['fecha_nacimiento'] ?></td>
                <td><?php if (!isset($clase['clases'])) : ?>

                        <span class="inactivo">Sin Clase Asignada</span>

                    <?php else : ?>
                        <?= $clase['clases'] ?>
                    <?php endif ?>
                </td>
            </tr>
        </tbody>
    </table>

</section>



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