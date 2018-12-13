<?php
session_start();
if(!isset($_SESSION["username"])){
    header("Location: http://localhost:8888/login.html", true, 301);
    
}

$nom = $_GET["nom"];
$cognoms = $_GET["cognoms"];
$user = $_GET["usuari"];   
$correu = $_GET["correu"];
$pass = $_GET["pass1"];
$contra = $_GET["pass2"];


if($pass == $contra){
    $servername = "127.0.0.1:1234";
    $password = "1234";
    $username = "root";
    $dbname = "projphp";
    $conn = new mysqli($servername, $username , $password, $dbname);
    if($conn -> connect_error){
        die("Connection error " . $conn->connect_error);
    }
    else{
       $sql = "INSERT INTO alumnes(nom, cognoms, usuari, pass, correu)"
               . "VALUES ('" . $nom . "','" . $cognoms . "','" . $user . "','" . $pass . "','" . $correu . "')";
       if(mysqli_query($conn, $sql)){
           echo "<h1>Alumne registrat amb exit</h1><br><br><a href=\"menuProfessors.php\">Torna al menu</a><br><br>";
           echo "<a href=\"crearAlumne.html\">Registrar un altre alumne</a>";
       }
       else{
           echo "S'ha produit un error " . mysqli_error($conn);
       }
    }
}
else{
    echo "Les contrasenyes no coincideixen <br><br>"
    . "<a href=\"registreProfessors.html\">Ves al registre</a>";
}

?>