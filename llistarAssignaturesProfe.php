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
        <h1>Assignatures</h1>
        <?php
            $servername = "127.0.0.1:3306";
            $password = "1234";
            $username = "root";
            $dbname = "projphp";
            $conn = new mysqli($servername, $username , $password, $dbname);
            if($conn->connect_error){
                echo "hem entrat al if";
                die("Problemes al connectar amb la base de dades: " . $conn->connect_error);
            }
            else{
                $stmt = $conn->prepare("select * from assignatures where professor = ?");
                $stmt->bind_param('s', $_SESSION["username"]);
                $stmt->execute();
                $result = $stmt->get_result();
                if($result->num_rows > 0){
                    $row = $result->fetch_assoc();
                    while($row != null){
                        echo "<br><br>";
                        echo "<div>";
                        echo "<h3>" . $row["Nom"] . "</h3><br>";
                        echo "<p>Nombre de credits: " . $row["Credits"] . "</p><br>";
                        echo "<p>Capacitat d'alumnes: " . $row["Capacitat"] . "</p>"
                                . "<a href=\"detallsAssignatura.php?nomAssig=". $row["Nom"] ."\">Detalls assignatura</a></div>   ";
                        $row = $result->fetch_assoc();
                    }
                }
                else{
                    echo "<h1>No hi ha cap assignatra registrada</h1> <br><br>";
                }
                echo "<a href=\"menuProfessors.php\">Tornar al menu</a>";
            }
        ?>
    </body>
</html>
