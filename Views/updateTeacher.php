<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400&family=Quicksand:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/updateTeachers.css">
    
</head>
<body>

    <section class="createTeachers">
    <form action="../index.php?controller=UserController&action=update" method="POST">
        <h2>Editar Maestro</h2>
        <label for="email"><strong>Correo Electronico</strong></label><br>
        <input type="text" id ="email" name="email" placeholder="@dsads.com" disabled><br><br>

        <label for="nombres"><strong>Nombre(s</strong>)</label><br>
        <input type="text" id ="nombres" name="nombres" placeholder="Ingresa nombre(s)"><br><br>

        <label for="apellidos"><strong>Apellido(s)</strong></label><br>
        <input type="text" id ="apellidos" name="apellidos" placeholder="Ingresa apellido(s)"><br><br>

        <label for="direccion"><strong>Dirección</strong></label>
        <input type="text" id ="direccion" name="direccion" placeholder="Ingresa la dirección"><br><br>

        <label for="fechaNacimiento"><strong>Fecha de Nacimiento</strong></label>
        <input type="date" id ="fechaNacimiento" name="fechaNacimiento" placeholder="mm/dd/yy"><br><br>
        
        <label for="telefono"><strong>Clase Asignada</strong></label>
        <select name="claseAsignada" >
            <option value="" disabled selected>Seleccion Clases</option>
            <option value="" >Seleccion Clases</option>
            <option value="1" >Matematicas</option>
            <option value="2" >Física</option>
            <option value="3" >Ciencias Naturales</option>
            <option value="4" >Química</option>

        </select>
        <div class="btnAdition">
        <button type="button" id="btnCerrar">Cerrar</button>
        <button type="submit" id="btnCrear">Guardar Cambios</button>
        </div>
    </form>
    </section>
</body>
</html>