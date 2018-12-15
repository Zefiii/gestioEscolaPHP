<?php
$user = $_POST["user"];
$pass = $_POST["pass"];

$servername = "127.0.0.1:3306";
$password = "Jordirubi10!";
$username = "root";
$dbname = "projphp";
$conn = new mysqli($servername, $username , $password, $dbname);
if($conn->connect_error){
    echo "hem entrat al if";
    die("Problemes al connectar amb la base de dades: " . $conn->connect_error);
}
else{
    $stmt = $conn->prepare("select * from alumnes where usuari = ?");
    $stmt->bind_param('s', $user);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        if ($row["pass"] == $pass){
            session_start();
            $_SESSION["login_user_alumne"] = $user;
            header("Location: http://localhost:8888/menuAlumnes.php", true, 301);
            die();
        }
        else{
            echo "<h2>Contrasenya Incorrecta</h2> <br><br>";
            echo $pass . " no es igual a  " . $row["Password"];
            echo "<a href=\"loginProfessors.html\">Torna al login</a>";
        }
    }
    else{
        echo"No s'ha trobat l'usuari: " . $user;
    }
}

?>