<?php
    //incluir conexión a la base de datos
    include '../../config/conexionBD.php';
    //echo 'Entro a la base';
    $tarjeta = $_GET["tarjeta"];
    //echo "$cedula";
    //echo "Hola " . $cedula;

    $sql = "SELECT p.ped_codigo, p.ped_numero, p.ped_fecha, p.ped_cliente, p.ped_total, p.ped_observaciones, c.com_nombre, t.tar_nombre
            FROM pedidos p, comidas c, tarjetas t 
            WHERE (c.com_nombre = '$tarjeta') AND ((t.tar_codigo = p.tar_codigo) AND (p.ped_codigo = c.ped_codigo))";
    //cambiar la consulta para puede buscar por ocurrencias de letras <th>Pedido Codigo</th>
    $result = $conn->query($sql);
     echo " <table style='width:100%' border=1>
        <tr>
            
            <th>Pedido Numero</th>
            <th>Pedido Fecha</th>
            <th>Pedido Cliente</th>
            <th>Pedido Total</th>
            <th>Pedido Observaciones</th>
            <th>Comida Nombre</th>
            <th>Tarjeta Nombre</th>
        </tr>";
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {

            echo "<tr>";
            //echo " <td>" . $row['ped_codigo'] . "</td>";
            echo " <td>" . $row['ped_numero'] ."</td>";
            echo " <td>" . $row['ped_fecha'] . "</td>";
            echo " <td>" . $row['ped_cliente'] . "</td>";
            echo " <td>" . $row['ped_total'] . "</td>";
            echo " <td>" . $row['ped_observaciones'] . "</td>";
            echo " <td>" . $row['com_nombre'] ."</td>";
            echo " <td>" . $row['tar_nombre'] . "</td>";
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