<?php
session_start();
if(!isset($_SESSION["username"])){
    header("Location: http://localhost:8888/login.html", true, 301);
}
$assig = $_POST["assig"];
$nota = (int)$_POST["mark"];
$servername = "127.0.0.1:3306";
$password = "1234";
$username = "root";
$dbname = "projphp";
$conn = new mysqli($servername, $username , $password, $dbname);
if($conn->connect_error){
    die("Problemes al connectar amb la base de dades: " . $conn->connect_error);
}
else{
    if(isset($_POST["eliminar"])){
        $sql = "delete from alumnesAssig "
                . "where NomAlumne = \"" . $_POST["alumnes"] . "\" and "
                . "NomAssignatura = \"" . $_POST["assig"] . "\";";
        if(mysqli_query($conn, $sql)){
            header("Location: http://localhost:8888/detallsAssignatura.php?nomAssig=" . $assig , true, 301);
        }
        else{
            echo "S'ha produit un error " . mysqli_error($conn) . " " . $user . " " . $assig; 
        }
    }
    elseif(isset($_POST["nota"])){
        $sql = "update alumnesAssig set nota = \"". $nota . "\" "
                . "where NomAlumne = \"" . $_POST["alumnes"] ."\" and "
                . "NomAssignatura = \"" . $_POST["assig"] . "\";";
        if(mysqli_query($conn, $sql)){
            header("Location: http://localhost:8888/detallsAssignatura.php?nomAssig=" . $assig , true, 301);
        }
        else{
            echo "S'ha produit un error " . mysqli_error($conn) . " " . $user . " " . $assig; 
        }
    }
}

?>
