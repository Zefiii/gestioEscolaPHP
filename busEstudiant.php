<?php
    session_start();
    if(!isset($_SESSION["username"])){
        header("Location: http://localhost:8888/login.html", true, 301);
    }
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Estudiant</title>
    </head>
    <body>
       <?php
           
            $assig = $_POST["assig"];
            $user = $_POST["alumnes"];
            $servername = "127.0.0.1:3306";
            $password = "Jordirubi10!";
            $username = "root";
            $dbname = "projphp";
            $conn = new mysqli($servername, $username , $password, $dbname);
            if($conn->connect_error){
                echo"Problemes al connectar amb la base de dades: " . $conn->connect_error;
            }
            else{
                if(isset($_POST["user"])){
                    
                    $sql = "select * from alumnes where usuari = \"" . $_POST["usuari"] . "\"";
                    $stmt = $conn->prepare($sql);
                    if(mysqli_error($conn) != null){
                        echo"Error: " . mysqli_error($conn);
                    }
                    else{
                        $stmt->execute();
                        $result = $stmt->get_result();
                        if($result->num_rows > 0){
                            $row = $result->fetch_assoc();
                           echo "<h1>" . $row["nom"] . " " . $row["cognoms"] . "</h1>";
                           echo "<br><br><div>";
                           echo "<p>Usuari: " . $row["usuari"] . "</p>";
                           echo "<p>Correu electronic: " . $row["correu"] . "</p></div><br>";
                        }
                    }
                    $result->close();
                    $stmt->free_result();
                    $stmt->close();
                    $conn->next_result();
                    $sql = "select * from alumnesassig where NomAlumne = \"" . $_POST["usuari"] . "\"";
                    $stmt = $conn->prepare($sql);
                    if(mysqli_error($conn) != null){
                        echo"Error: " . mysqli_error($conn);
                    }
                    else{
                        $stmt->execute();
                        $result = $stmt->get_result();
                        if($result->num_rows > 0){
                            $row = $result->fetch_assoc();
                            echo "<div><table>";
                            echo "<tr> <th>Assignatura</th><th>Nota</th> </tr>";
                            while($row != null){
                                echo "<tr>";
                                echo "<td>" . $row["NomAssignatura"] . "</td>";
                                echo "<td>" . $row["nota"] . "</td>";
                                echo "</tr>";
                                $row = $result->fetch_assoc();
                            }
                            echo "</table></div>";
                        }
                        else{
                            echo "Error: " . mysqli_error($conn); 
                        }
                    }
                }
                 if(isset($_POST["nom"])){
                    
                    $sql = "select * from alumnes where nom = \"" . $_POST["nomAlumne"] . "\"";
                    $stmt = $conn->prepare($sql);
                    if(mysqli_error($conn) != null){
                        echo"Error: " . mysqli_error($conn);
                    }
                    else{
                        $stmt->execute();
                        $result = $stmt->get_result();
                        
                        if($result->num_rows > 0){
                            $row = $result->fetch_assoc();
                            $busUser = $row["usuari"];
                           echo "<h1>" . $row["nom"] . " " . $row["cognoms"] . "</h1>";
                           echo "<br><br><div>";
                           echo "<p>Usuari: " . $row["usuari"] . "</p>";
                           echo "<p>Correu electronic: " . $row["correu"] . "</p></div><br>";
                        }
                    }
                    $result->close();
                    $stmt->free_result();
                    $stmt->close();
                    $conn->next_result();
                    $sql = "select * from alumnesassig where NomAlumne = \"" . $busUser . "\"";
                    $stmt = $conn->prepare($sql);
                    if(mysqli_error($conn) != null){
                        echo"Error: " . mysqli_error($conn);
                    }
                    else{
                        $stmt->execute();
                        $result = $stmt->get_result();
                        if($result->num_rows > 0){
                            $row = $result->fetch_assoc();
                            echo "<div><table>";
                            echo "<tr> <th>Assignatura</th><th>Nota</th> </tr>";
                            while($row != null){
                                echo "<tr>";
                                echo "<td>" . $row["NomAssignatura"] . "</td>";
                                echo "<td>" . $row["nota"] . "</td>";
                                echo "</tr>";
                                $row = $result->fetch_assoc();
                            }
                            echo "</table></div>";
                        }
                    }
                }
            }
            echo "<br>";
            echo "<a href=\"menuProfessors\">Tornar al menu</a>"
       ?>
    </body>
</html>
