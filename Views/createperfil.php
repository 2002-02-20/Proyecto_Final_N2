<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400&family=Quicksand:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/createPerfil.css">

</head>

<body>
    <section class="createPerfil">
        <h3>Crear Cuenta</h3>
        <form action="../index.php?controller=Usercontroller&action=insertData" method="POST">
        <label for="emailUsuario">Email del Usuario</label>
    
        <div class="inputEmail">
                <input type="email" id="emailUsuario" name="email" placeholder="Email"><br>
                <span class="material-symbols-outlined emailIcon">
                    mail
                </span>
            </div>

            <label for="passUsuario">Contraseña del Usuario</label>
            <div class="inputPassword">
                <input type="password" id="passUsuario" name="password" placeholder="Password"><br>
                <span class="material-symbols-outlined lockIcon">
                    lock
                </span>
            </div>
            <label for="">Selecciona el Rol</label>
            <div class="selectInput">
                <select name="rol">
                    <option value="" disabled selected>Selecciona un rol</option>
                    <option value="1">Admin</option>
                    <option value="2">Maestro</option>
                </select>

            </div>

            <div class="buttonClass">
                <button type="submit" class="btnIngresar">Ingresar</button>
            </div>

        </form>
    </section>
</body>

</html>