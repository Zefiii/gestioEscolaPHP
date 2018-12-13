<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            $assig = $_GET["nomAssig"];
            echo "<h1>" . $assig . "</h1><br><br>";
            $servername = "127.0.0.1:1234";
            $password = "1234";
            $username = "root";
            $dbname = "projphp";
            $conn = new mysqli($servername, $username , $password, $dbname);

            if($conn -> connect_error){
                die("Connection error " . $conn->connect_error);
            }
            else{
                echo "<form action=\"afegirAlumne.php\" method=\"post\">";
                echo "Alumnes: <br/><select name=\"alumnes\" multiple=\"multiple\">";
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
            }
        ?>
    </body>
</html>
