<?php
session_start();
if(!isset($_SESSION["username"])){
    header("Location: http://localhost:8888/login.html", true, 301);
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
            <a href="llistarAssignaturesProfe.php">Veure assignatures</a><br>
            <a href="crearAlumne.php">Donar d'alta alumne</a><br>
            <a href="crearAssignatura.php">Donar d'alta assignatura</a>
        </div>
    </body>
</html>
