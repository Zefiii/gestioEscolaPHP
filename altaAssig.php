<?php
session_start();
if(!isset($_SESSION["username"])){
    header("Location: http://localhost:8888/login.html", true, 301);
}

$nom = $_POST["nom"];
$credits = (integer) $_POST["credits"];   
$capacitat = (integer) $_POST["capacitat"];
$professor = $_SESSION["username"];

$servername = "127.0.0.1:1234";
$password = "1234";
$username = "root";
$dbname = "projphp";
$conn = new mysqli($servername, $username , $password, $dbname);

if($conn -> connect_error){
    die("Connection error " . $conn->connect_error);
}
else{
    $sql = "INSERT INTO assignatures(Nom, Credits, Capacitat, Professor)"
            . "VALUES ('" . $nom . "','" . $credits . "','" . $capacitat . "','" . $professor . "')";
    if(mysqli_query($conn, $sql)){
        echo "<h1>Assignatura creada amb exit</h1><br><br><a href=\"menuProfessors.php\">Torna al menu</a><br><br>";
        echo "<a href=\"crearAssignatura.php\">Crear una altra assignatura</a>";
    }
    else{
        echo "S'ha produit un error " . mysqli_error($conn);  
    }
}
?>
