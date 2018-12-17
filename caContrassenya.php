<?php
session_start();
$user = $_SESSION["login_user_alumne"];
$pasAntig = $_POST["contAntig"];
$nouPas1 = $_POST["contNova1"];
$nouPas2 = $_POST["contNova2"];

if($nouPas1 == $nouPas2){
    $servername = "127.0.0.1:3306";
    $password = "1234";
    $username = "root";
    $dbname = "projphp";
    $conn = new mysqli($servername, $username , $password, $dbname);
    if($conn->connect_error){
        echo "hem entrat al if";
        echo("Problemes al connectar amb la base de dades: " . $conn->connect_error);
    }
    else{
        $sql = "update alumnes set pass = \"".$nouPas1."\" where usuari = \"". $user."\"";
        if(mysqli_query($conn, $sql)){
            echo "<h1>Canvi de contrassenya fet</h1><br><br>";
            echo "<a href=\"menuAlumnes.php\">Torna al menu</a>";
        }
        else echo "<br><br> Error: " . mysqli_error($conn);
    }
}
else{
    echo "<h2>Les contrasenyes no coincideixen</h2><br><br>";
    echo "<a href=\"canviContrasenya.php\">Torna a canviar contrasenya</a>";
}
?>