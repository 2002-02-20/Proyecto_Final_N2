
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400&family=Quicksand:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/permisos.css">
    <script src="../JS/closeMenu.js" defer></script>
    
    <section class="createTeachers">

        <form action="../index.php?controller=UserController&action=permisosController" method="POST">
            <h3>Editar Permisos</h3>
            <label for="emailUsuario">Email del Usuario</label><br>
            <div class="inputEmail">
                <input type="email" id="emailUsuario" name="email" placeholder="Email"><br>
                <span class="material-symbols-outlined emailIcon">
                    mail
                </span>
            </div>

            <label>Rol del Usuario</label><br>
            <div class="selectInput">
                <select name="rol">
                    <option value="" disabled selected>Selecciona un rol</option>

                    <option value="1">Admin</option>
                    <option value="2">Maestro</option>
                </select>
            </div>
            <div class="buttonClass">
                <button type="button" id="btnCerrar">Cerrar</button>
                <button type="submit" id="btnGuardarCambios">Guardar Cambios</button>
            </div>

        </form>
    </section>
