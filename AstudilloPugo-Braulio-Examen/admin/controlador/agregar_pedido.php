<?php
    //incluir conexión a la base de datos
    include '../../config/conexionBD.php';

    $numeroPed = isset($_POST["numeroPed"]) ? trim($_POST["numeroPed"]):null;
    //$nombreCli = isset($_POST["nombreCli"]) ? mb_strtoupper(trim($_POST["nombreCli"]), 'UTF-8') : null;
    $observacion = isset($_POST["obs"]) ? mb_strtoupper(trim($_POST["obs"]), 'UTF-8') : null;
    $numeroTar = isset($_POST["tarjeta"]) ? trim($_POST["tarjeta"]):null;
    $Nsql = "SELECT tar_nombre from tarjetas where tar_numero = '$numeroTar'";
    $resultNombre = $conn->query($Nsql);
    $variable = mysqli_fetch_array($resultNombre);
    $nombreCli=$variable[0];
   
    echo "Numero de pedido: ".$numeroPed;

    $sqlNumero = "SELECT ped_codigo FROM pedidos WHERE ped_numero=$numeroPed";
    $ver = $conn->query($sqlNumero);

    if($ver->num_rows==0){
        $sqlTarjeta = "SELECT tar_codigo FROM tarjetas WHERE tar_numero=$numeroTar";
        $ver2 = $conn->query($sqlTarjeta);  

        while($row = $ver2->fetch_assoc()){
            $tarjeta_id = $row["tar_codigo"];
        }

        $sql = "INSERT INTO pedidos VALUES (0,$numeroPed,null, '$nombreCli', null,'$observacion',$tarjeta_id)";

        if ($conn->query($sql) === TRUE) {         
            $sqlId = "SELECT ped_codigo FROM pedidos WHERE ped_numero=$numeroPed";
            $resultado = $conn->query($sqlId);

            while($row = $resultado->fetch_assoc()){
                $pedido_id = $row["ped_codigo"];
            }

            header ("Location: ../vista/crear_comida.php?pedido=$pedido_id");
        } else {
            #echo "<p>Algo pasa error al ingresar</p>";
            header ("Location: ../../public/vista/crear_pedido.html");

            if($conn->errno == 1062){
                echo "<p Algo error </p>";
            }else{
                echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
            }
        }
    }else{
        #echo "<p>Numero ya existente</p>";
        header ("Location: ../../public/vista/crear_pedido.html");
    }

     $conn->close();
 
?>