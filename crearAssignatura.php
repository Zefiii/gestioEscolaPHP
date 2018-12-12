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
        <h1>Alta d'assignatura</h1><br><br>
        <div>
            <form action='altaAssig.php' method="post">
                Nom de l'assignatura: <input type='text' name='nom'><br><br>
                Credits:<input type='text' name='credits'><br><br>
                Capacitat:<input type='text' name='capacitat'><br><br>
                <input type="submit" name="submit" value="Crear Assignatura">

            </form>
        </div>
    </body>
</html>
