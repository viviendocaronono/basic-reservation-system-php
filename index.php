<?php include("deco/top.html");?>
<!--                          -->
<h1>Reserva tu turno</h1>
<form action="action/save.php" method="post">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre">
    <label for="apellido">Apellido</label>
    <input type="text" name="apellido">
    <label for="fecha">Fecha</label>
    <input type="date" name="fecha">
    <label for="hora">Hora</label>
    <select name="hora">
        <?php
            for($i=9; $i<=20 ; $i++){
                echo "<option>$i:00</option>";
            }
        ?>        
    </select>
    
    <label for="contacto">Contacto</label>
    <input type="tel" name="telefono">
    <input type="submit" value="Reservar">
</form>
<br>
<hr>
<a href="action/delete.php">Eliminar turno</a> 
<br>
<a href="action/edit.php">Modificar turno</a>
<br>
<a href="action/view.php">Ver turnos</a>
<!--                          -->
<?php include("deco/bot.html");?>