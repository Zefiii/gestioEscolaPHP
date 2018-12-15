<?php
session_start();
if(!isset($_SESSION["login_user_alumne"])){
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
            $password = "Jordirubi10!";
            $username = "root";
            $dbname = "projphp";
            $conn = new mysqli($servername, $username , $password, $dbname);
            if($conn->connect_error){
                echo "hem entrat al if";
                die("Problemes al connectar amb la base de dades: " . $conn->connect_error);
            }
            else{
                $stmt = $conn->prepare("select * from assignatures");
               
                $stmt->execute();
                $result = $stmt->get_result();
                if($result->num_rows > 0){
                    $row = $result->fetch_assoc();
                    while($row != null){
                        echo "<br><br>";
                        echo "<div>";
                        echo "<h3>" . $row["Nom"] . "</h3>";
                        echo "<p>Nombre de credits: " . $row["Credits"] . "</p>";
                        echo "<p>Capacitat d'alumnes: " . $row["Capacitat"] . "</p>"
                                . "<p>Professor: ".$row["Professor"]. "</div>   ";
                        $row = $result->fetch_assoc();
                    }
                }
                else{
                    echo "<h1>No hi ha cap assignatra registrada</h1> <br><br>";
                }
                echo "<a href=\"menuAlumnes.php\">Tornar al menu</a>";
            }
        ?>
    </body>
</html>
