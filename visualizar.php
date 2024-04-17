<?php
$conn = new mysqli("localhost", "root", "", "peluqueria_alejo");

$sql = "SELECT nombre, apellido, telefono, fecha, hora FROM turno";
$result = $conn->query($sql);

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

    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['nombre'] . "</td>";
        echo "<td>" . $row['apellido'] . "</td>";
        echo "<td>" . $row['telefono'] . "</td>";
        echo "<td>" . $row['fecha'] . "</td>";
        echo "<td>" . $row['hora'] . "</td>";
      echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No se encontraron resultados.";
}

echo "<a href='formulario.php'>Volver al inicio</a>"
    
?>
