
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Information</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />


    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400&family=Quicksand:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/info.css">
    <script src="/JS//interactiveMenu.js" defer></script>

</head>
</head>

<body>
    <nav class="sideBar">
        <div class="logoTitulo">
            <img src="../assets/logo.jpg" alt="university_Icon" class="university_Icon">
            <p>Universidad</p>
        </div>

        <div class="categoriasPerfil">
            <p>admin</p>
            <p>Administrado</p>

        </div>
        <div class="sectionPerfil">
            <p class="menuparafo">MENU ADMINISTRADOR</p>
            <a href="./tabla.php" class="linkOf">Maestros</a>
            <a href="./createperfil.php" class="linkOf">Crear Perfil</a>
            <a href="./permisos.php" class="linkOf">Permisos</a>

        </div>
    </nav>

    <nav class="green">
        <ul class="ulNav">
            <li id="menuHome">Home</li>
            <li><button class="btnAdministrador">Administrado<span class="material-symbols-outlined">
                        arrow_drop_down
                    </span></button>
                <ul class="ulNavInteractive">
                    <li class="liPerfil"><span class="material-symbols-outlined">
                            account_circle
                        </span><a href="#" class="liPerfil">Perfil</a></li>
                   
                    <li class="liLogout"><span class="material-symbols-outlined">
                            logout
                        </span><a href="./login.php" class="liLogout">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <div class="divContainer">
        <h2>Dashboard</h2>
    </div>
    <section class="infoPage">
        <p>Bienvenido</p>
        <p>Selecciona en la izquierda para ver tus clases</p>
    </section>
    

</body>

</html>