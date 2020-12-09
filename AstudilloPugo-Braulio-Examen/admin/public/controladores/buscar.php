<?php
    //incluir conexión a la base de datos
    include '../../config/conexionBD.php';
    //echo 'Entro a la base';
    $tarjeta = $_GET["tarjeta"];
    //echo "$cedula";
    //echo "Hola " . $cedula;

    $sql = "SELECT * FROM tarjeta WHERE tar_numero='$tarjeta'";
    //cambiar la consulta para puede buscar por ocurrencias de letras
    $result = $conn->query($sql);
     echo " <table style='width:100%' border=1>
        <tr>
            <th>Codigo</th>
            <th>Numero</th>
            <th>Nombre</th>
            <th>Fecha de Caducidad</th>
            <th>CVV</th>
        </tr>";
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {

            echo "<tr>";
            echo " <td>" . $row['tar_codigo'] . "</td>";
            echo " <td>" . $row['tar_numero'] ."</td>";
            echo " <td>" . $row['tar_nombre'] . "</td>";
            echo " <td>" . $row['tar_fecha_caducidad'] . "</td>";
            echo " <td>" . $row['tar_cvv'] . "</td>";
            echo "</tr>";
        }
    } else {
            echo "<tr>";
            echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>";
            echo "</tr>";
    }
    echo "</table>";
    $conn->close();

?>