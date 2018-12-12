<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
    session_start();
    if(!isset($_SESSION["login_user"])){
        header("Location: http://localhost/AlumnesV1PHP/login.html", true, 301);
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Menu</title>
    </head>
    <body>
        <h1>Menu</h1>
        <br><br>
        <div>
            <a href="crearAlumne.php">Donar d'alta alumne</a>
        </div>
    </body>
</html>
