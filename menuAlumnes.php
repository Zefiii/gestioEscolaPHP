<?php
    session_start();
    if(!isset($_SESSION["login_user_alumne"])){
        header("Location: http://localhost:8888/login.html", true, 301);
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Menu</h1>
        <br><br>
        <div>
            <a href='llistarAssignatures.php'>Notes assignatures</a><br>
            <a href='canviContrasenya.php'>Canviar contrasenya</a>
        </div>
    </body>
</html>
