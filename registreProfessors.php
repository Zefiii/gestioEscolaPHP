<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$nom = $_POST["nom"];
$cognoms = $_POST["cognoms"];
$user = $_POST["usuari"];   
$correu = $_POST["correu"];
$pass = $_POST["pass1"];
$contra = $_POST["pass2"];

if (!function_exists('mysqli_init') && !extension_loaded('mysqli')) {
    echo 'We don\'t have mysqli!!!';
} else {
    echo 'Phew we have it!';
}

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
       $sql = "INSERT INTO professors(nom, cognoms, usuari, pass, correu)"
               . "VALUES ('". $nom . "', '" . $cognoms ."', '" . $user . "', '" . $pass1 . "', '" . $correu . "')";
       if(mysqli_query($conn, $sql)){
           echo "<h1>Professor registrat amb exit</h1><br><br><a href=\"loginProfessors.html\">Ves al login</a>";
       }
       else{
           echo"S'ha produit un error " . mysqli_error($conn);
       }
    }
}
else{
    echo "Les contrasenyes no coincideixen <br><br>"
    . "<a href=\"registreProfessors.html\">Ves al registre</a>";
}

?>
