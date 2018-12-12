<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();

$user = $_SESSION["login_user_alumne"];
$pasAntig = $_POST["contAntig"];
$nouPas1 = $_POST["contNova1"];
$nouPas2 = $_POST["contNova2"];

if($nouPas1 == $nouPas2){
    $servername = "127.0.0.1:1234";
    $password = "1234";
    $username = "root";
    $dbname = "projphp";
    $conn = new mysqli($servername, $username , $password, $dbname);
    if($conn->connect_error){
        echo "hem entrat al if";
        die("Problemes al connectar amb la base de dades: " . $conn->connect_error);
    }
    else{
        if(mysql_query("update alumnes set pass = '$nouPas1' where usari = '$user'")){
            echo "<h1>Canvi de contrassenya fet<h1><br><br>";
            echo "<a href=\"menuAlumnes.php\">Torna al menu</a>";

        }        
    }
}
else{
    echo "<h2>Les contrasenyes no coincideixen</h2><br><br>";
    echo "<a href=\"canviContrasenya.php\">Torna a canviar contrasenya</a>";
}
?>