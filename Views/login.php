<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400&family=Quicksand:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/login.css">
</head>

<body>
    <!--DECIDIR COMO INCLUIMOS LAS VISTAS -->
    <section class="allBoxLogin">
        <img src="../assets/logo.jpg" alt="university_Icon" class="university_Icon">
        <section class="boxLogin">
            <h3>Bienvenido Ingresa con tu cuenta</h3>
            <form action="../index.php?controller=UserController&action=login" method="POST">
                <div class="inputEmail">
                    <input type="email" name="email" placeholder="Email">
                    <span class="material-symbols-outlined emailIcon">
                        mail
                    </span>
                </div>

                <div class="inputPassword">
                    <input type="password" name="password" placeholder="Password">
                    <span class="material-symbols-outlined lockIcon">
                        lock
                    </span>
                </div>
                <div class="buttonClass">
                    <button type="submit">Ingresar</button>
                </div>

            </form>
        </section>
    </section>

  <!--   <section class="infoToPass">
        <h4 class="infoAcceso">Información Acceso</h4>
        <div class="infoAdminMaestro">
            <p><strong>Admin</strong></p>
            <p>User:derek@gmail.com</p>
            <p>Pass:1234</p>

            <p><strong>Maestros</strong></p>
            <p>User:juan@gmail.com</p>
            <p>Pass:1234</p>
        </div>
    </section> -->
</body>

</html>