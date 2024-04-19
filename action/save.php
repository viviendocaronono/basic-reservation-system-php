<?php include("../deco/top.html");?>
<!--                          -->
    <?php 
        $con = new mysqli("localhost", "root", "", "bd-sql-ex1");

        $nombre = $_REQUEST["nombre"];
        $apellido = $_REQUEST["apellido"];
        $telefono = $_REQUEST["telefono"];
        $fecha = $_REQUEST["fecha"];
        $hora = $_REQUEST["hora"];

        $SQL = "SELECT * FROM Turno WHERE fecha = '$fecha' AND hora = '$hora' ";

        $res = $con->query( $SQL );

        if( $res->num_rows > 0){
            echo "<h1>Ese turno ya fue tomado</h1>";
        }else {
            $SQL = "INSERT INTO Turno (nombre, apellido, telefono, fecha, hora) VALUES ('$nombre', '$apellido', $telefono , '$fecha', '$hora')";
            echo "<h1>El turno fue guardado exitosamente</h1>";
            echo "<a href='../index.php'>Volver al inicio</a>";
            $con->query( $SQL );

        }
    ?>
<!--                          -->
<?php include("../deco/bot.html");?>