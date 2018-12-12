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
        <title></title>
    </head>
    <body>
        <h1>Alta d'alumne</h1>
        <div>
            <!-- Ho fem amb get perque aixi podem fer un script per altes massives d'usauris -->
            <form action='registreAlumnes.php' method="get">
                Nom: <input type='text' name='nom'>
                <br><br>
                Cognoms: <input type='text' name='cognoms'>
                <br><br>
                Usuari: <input type='text' name='usuari'>
                <br><br>
                Correu electronic <input type='text' name='correu'>
                <br><br>
                Password:<input type='password' name='pass1'>
                <br><br>
                Repeteix el password <input type='password' name='pass2'>
                <br><br>
                <input type='submit' name='submit'>
            </form>
        </div>
    </body>
</html>
