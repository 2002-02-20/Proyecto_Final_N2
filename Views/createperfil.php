<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


../index.php?controller=AuthController&action=create
    <form action="../index.php?controller=Usercontroller&action=insertData" method="POST">
                <div class="inputEmail">
                    <input type="email" name="email" placeholder="Email"><br>
                    <span class="material-symbols-outlined emailIcon">
                        mail
                    </span>
                </div>

                <div class="inputPassword">
                    <input type="password" name="password" placeholder="Password"><br>
                    <span class="material-symbols-outlined lockIcon">
                        lock
                    </span>
                </div>

                <div class="selectInput">
                    <select name="rol">
                        <option value="" disabled selected >Selecciona un rol</option>
                        <option value="1">Admin</option>
                        <option value="2">Maestro</option>
                    </select>

                </div>

                <div class="buttonClass">
                    <button type="submit">Ingresar</button>
                    <a href="./info.php">&</a>
                </div>
                
            </form>
</body>
</html>