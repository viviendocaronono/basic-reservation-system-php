<?php
$conn = new mysqli("localhost", "root", "", "peluqueria_alejo");

// Comprobar si se ha enviado un número de teléfono
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['telefono'])) {
    $telefono = $_POST['telefono'];
    $sql = "SELECT nombre, apellido, telefono, fecha, hora FROM turno WHERE telefono='$telefono'";
    $result = $conn->query($sql);

    // Si se encuentra al menos un registro, mostrar la lista
    if ($result->num_rows > 0) {
        echo "<h1>Visualizar Turnos</h1>";
        echo "<table border='1'>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Teléfono</th>
                <th>Fecha</th>
                <th>Hora</th>
            </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['nombre'] . "</td>";
            echo "<td>" . $row['apellido'] . "</td>";
            echo "<td>" . $row['telefono'] . "</td>";
            echo "<td>" . $row['fecha'] . "</td>";
            echo "<td>" . $row['hora'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "<br>";
    } else {
        echo "No se encontraron resultados para el número de teléfono proporcionado. <br><br>";
    }
} else {
    // Formulario para ingresar el número de teléfono
    echo "<h1>Ver turnos</h1>";
    echo "<form method='post' action='" . $_SERVER['PHP_SELF'] . "'>
            <label>Número de teléfono:</label>
            <input type='text' name='telefono'>
            <input type='submit' value='Buscar'>
        </form>";
}

echo "<a href='formulario.php'>Volver al inicio</a>";
?>
