<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    session_start();
    if(!isset($_SESSION["login_user_alumne"])){
        header("Location: http://localhost/AlumnesV1PHP/login.html", true, 301);
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Canvi de contrasenya</h1><br><br>
        <div>
            <form method="post" action='caContrassenya.php'>
                Contrasenya Antiga: <input type='password' name='contAntig'><br><br>
                Nova contrasenya: <input type="password" name='contNova1'><br><br>
                Repeteix la contrasenya: <input type="password" name='contNova2'><br>
                <input type="submit" name='submit' value='Canvia'>
            </form>
        </div>
    </body>
</html>
