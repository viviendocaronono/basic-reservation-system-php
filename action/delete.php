<?php include("../deco/top.html");?>
<!--                          -->
    <h1>Eliminar turno</h1>
    <br>
    <form action="" method="post">
        <b>Contacto</b>
        <input type="tel" name="contacto">

        <input type="submit" value="Eliminar">
    </form>
    <br>
    <a href="../index.php">Volver</a> 
    <?php
        //isset : es para verificar existe un determinado dato
        if(  isset( $_REQUEST["contacto"] )  ) {

            //conexion a mi bd
            $con = new mysqli("localhost", "root", "", "bd-sql-ex1");

            //tomo el dato del telefono del formulario
            $contacto = $_REQUEST["contacto"];

            //armo la consulta a mi base de datos por turno que coincida el telefono
            $SQL = "SELECT * FROM Turno WHERE telefono = $contacto LIMIT 1"; 

            //ejecutando la consuta y guardo el resultado en res
            $res = $con->query( $SQL );

            //debug = depurar el codigo
            //var_dump($res);

            if( $res->num_rows == 0){
                echo "<h1>No existe turno con ese numero de telefono</h1>";
            } else {
                //->fetch_assoc() = agarrar un registro y transformarlo en un arreglo
                $registro = $res->fetch_assoc();

                echo "Turno <hr> <br> 
                    fecha: $registro[fecha] <br> 
                    hora: $registro[hora] <br>
                    Esta seguro que quiere eliminar esto ? $registro[nombre]
                    <a href='?id=$registro[id]'>Si</a>
                    <a href='../index.php'>No</a>";
            }
        }

        if(  isset( $_REQUEST["id"] )  ) {
            $con = new mysqli("localhost", "root", "", "bd-sql-ex1");

            $id = $_REQUEST["id"];

            $SQL = "DELETE FROM turno WHERE id = $id";

            $con->query( $SQL );

            header('location: ../index.php');
        }
    ?>
<!--                          -->
<?php include("../deco/bot.html");?>