<?php
    $conn = new mysqli("localhost", "root", "", "peluqueria_alejo");

    $sql = "SELECT id, nombre, apellido, telefono, fecha, hora FROM turno";
    $result = $conn->query($sql);


    
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];

    $sql_update = "UPDATE turno SET nombre='$nombre', apellido='$apellido', telefono='$telefono', fecha='$fecha', hora='$hora' WHERE id=$id";

    if ($conn->query($sql_update) === TRUE) {
        echo "Registro modificado correctamente.";
    } else {
        echo "Error al modificar el registro: " . $conn->error;
    }
}

$sql = "SELECT id, nombre, apellido, telefono, fecha, hora FROM turno";
$consulta = $conn->query($sql);

if ($consulta->num_rows > 0) {
    echo "<h1>Modificar turnos</h1>";
    echo "<table border='1'>
    <tr>
    <th>Nombre</th>
    <th>Apellido</th>
    <th>Teléfono</th>
    <th>Fecha</th>
    <th>Hora</th>
    <th>Acciones</th>
    </tr>";

    while($row = $consulta->fetch_assoc()) {
        echo "<tr>";
        echo "<form method='post' action='" . $_SERVER['PHP_SELF'] . "'>";
        echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
        echo "<td><input type='text' name='nombre' value='" . $row['nombre'] . "'></td>";
        echo "<td><input type='text' name='apellido' value='" . $row['apellido'] . "'></td>";
        echo "<td><input type='text' name='telefono' value='" . $row['telefono'] . "'></td>";
        echo "<td><input type='date' name='fecha' value='" . $row['fecha'] . "'></td>";
        echo "<td><select name='hora'>";
        for($i=9; $i<=20 ; $i++){
            echo "<option>$i:00</option>";
        }
        echo "'</select></td>";
        echo "<td><input type='submit' value='Modificar'></td>";
        echo "</form>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No se encontraron resultados.";
}

echo "<a href='formulario.php'>Volver al inicio</a>"
    

?>
