<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

`<?php
    session_start();
    if(!isset($_SESSION["login_user"])){
        header("Location: http://localhost/AlumnesV1PHP/login.html", true, 301);
    }
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Alta d'assignatura</h1><br><br>
        <div>
            <form action='altaAssig.php' method="post">
                Nom de l'assignatura: <input type='text' name='nom'><br><br>
                Professxr(s):<input type='text' name="professors">
            </form>
        </div>
    </body>
</html>
