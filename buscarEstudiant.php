<?php
    session_start();
    if(!isset($_SESSION["username"])){
        header("Location: http://localhost:8888/login.html", true, 301);
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Buscar estudiant</h1><br>
        <div>
            <form method="post" action="busEstudiant.php">
                Buscar per usuari: <input type="text" name="usuari">
                <input type="submit" name="user">
            </form>
        </div><br>
        <div>
            <form method="post" action="busEstudiant.php">
                Buscar per nom:<input type="text" name="nomAlumne">
                <input type="submit" name="nom">
            </form>
        </div><br>
        <a href="menuProfessors.php">Tornar al menu</a>
    </body>
</html>
