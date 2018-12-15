<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
if(!isset($_SESSION["username"])){
    header("Location: http://localhost:8888/login.html", true, 301);
}



$assig = $_POST["assig"];
$user = $_POST["alumnes"];
$servername = "127.0.0.1:3306";
$password = "Jordirubi10!";
$username = "root";
$dbname = "projphp";
$conn = new mysqli($servername, $username , $password, $dbname);
if($conn->connect_error){
    die("Problemes al connectar amb la base de dades: " . $conn->connect_error);
}
else{
    $sql = "INSERT INTO alumnesAssig(NomAssignatura, NomAlumne)"
            . "VALUES ('" . $assig . "','" . $user . "')";
    if(mysqli_query($conn, $sql)){
        header("Location: http://localhost:8888/detallsAssignatura.php?nomAssig=" . $assig , true, 301);
    }
    else{
        echo "S'ha produit un error " . mysqli_error($conn) . " " . $user . " " . $assig; 
    }
}

?>