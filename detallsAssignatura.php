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
        <?php
            $assig = $_GET["nomAssig"];
            echo "<h1>" . $assig . "</h1><br><br>";
            $servername = "127.0.0.1:3306";
            $password = "Jordirubi10!";
            $username = "root";
            $dbname = "projphp";
            $conn = new mysqli($servername, $username , $password, $dbname);

            if($conn -> connect_error){
                die("Connection error " . $conn->connect_error);
            }
            else{
                echo "<form action=\"afegirAlumne.php\" method=\"post\" class=\"inline\">";
                echo "Alumnes no matriculats: <br/><select name=\"alumnes\" multiple=\"multiple\">";
                $sql = "select * "
                        . "from alumnes alum "
                        . "where not exists(select * "
                        .       "from alumnesAssig alumAssig "
                        .       "where alum.usuari = alumAssig.NomAlumne and "
                        .       "alumAssig.NomAssignatura = \"" . $assig ."\");";
                $stmt = $conn->prepare($sql);
                if(mysqli_error($conn) != null){
                    echo"Error: " . mysqli_error($conn);
                }
                else{
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if($result->num_rows > 0){
                        $row = $result->fetch_assoc();
                        while($row != null){
                            echo "<option value\"" . $row["usuari"] . "\">". $row["usuari"] . "</option>";
                            $row = $result->fetch_assoc();
                        }
                        echo "<input type=\"hidden\" name=\"assig\" value=\"". $assig . "\">";
                        echo"<br><br><input type=\"submit\" value=\"Afegir alumnes\">";
                        echo "</select> </form>";
                    }
                }
                echo "</form>";
                echo "<form action=\"eliNotAlumne.php\" method=\"post\" class=\"inline\">";
                echo "Alumnes matriculats: <br/> <select name=\"alumnes\" multiple=\"multiple\">";
                $result->close();
                $stmt->free_result();
                $stmt->close();
                $conn->next_result();
                $sql = "select * "
                        . "from alumnesAssig "
                        . "where NomAssignatura = \"" . $assig ."\";";
                echo $sql;
                $stmt2 = $conn->prepare($sql);
                if(mysqli_error($conn) != null){
                    echo"Error: " . mysqli_error($conn);
                }
                else{
                    $stmt2->execute();
                    $result2 = $stmt2->get_result();
                    echo"If o else";
                    if($result2->num_rows > 0){
                        $row2 = $result2->fetch_assoc();
                        while($row2 != null){
                            echo "<option value=\"" . $row2["NomAlumne"] . "\">". $row2["NomAlumne"] . "</option>";
                            $row2 = $result2->fetch_assoc();
                        }
                        echo "</select><br>";
                        echo "Nota: <input type=\"text\" name=\"mark\" >";
                        echo "<input type=\"hidden\" name=\"assig\" value=\"". $assig . "\">";
                        echo"<br><br><input type=\"submit\" name=\"eliminar\" value=\"Eliminar Alumne\">";
                        echo"<br><br><input type=\"submit\" name=\"nota\" value=\"Posar Nota\">";
                        echo " </form>";
                    }
                    else{
                        echo "Te pinta d'error " . mysqli_error($conn); 
                    }
                }
            }
            echo "<a href=\"llistarAssignaturesProfe.php\">Tornar al enrrere</a>";

        ?>
    </body>
</html> 
