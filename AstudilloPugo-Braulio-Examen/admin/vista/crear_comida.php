<!DOCTYPE html>
<html lang="es">

    <head>
        <title>Comidas</title>
        <link rel="stylesheet" href="../../public/css/estilo.css" type="text/css" media="screen">
        
        <meta charset="utf-8" />
    </head>
    <body id="cuerpo">
        <div class="contenedo">
            <?php
                include '../../config/conexionBD.php'; 
                $pedido = $_GET["pedido"];
            ?>
            <header>
                <nav class="menu1">
                    <h3 class="titulo_menu4">Agregar Comida</h3>
                    <ul>
                        <li><a href="listar_pedidos.html">Listar Pedido</a></li>
                        <li><a href="index.html">Menu</a></li>
                    </ul>
                </nav>
            </header>
            <!--
            <div class="logo">
                <img class=img_logo src="../../public/img/excelencias.png" alt="Logo del Restaurante">
            </div>
             -->
           <br>
           

            <div class="cont_for">
                <form class="formulario0" method="POST" onsubmit="" action="../controlador/agregar_comida.php?pedido=<?php echo $pedido ?>">
                  
                    <label class="eti">Nombre Comida:</label>
                    <!--
                    <input class="campos" type="text" id="nombre" name="nombre"/>
-->
                    <select class="campos" id="nombre" name="nombre">
                    <option id="nombre" name="nombre" value="">Elegir...</option>
  <option id="nombre" name="nombre" value="SALCHIPAPA">SALCHIPAPA</option>
  <option id="nombre" name="nombre" value="GUATITA">GUATITA</option>
  <option id="nombre" name="nombre" value="BANDERA">BANDERA</option>
  <option id="nombre" name="nombre" value="BROSTER">BROSTER</option>
  <option id="nombre" name="nombre" value="CHULETA">CHULETA</option>
  <option id="nombre" name="nombre" value="ENCEBOLLADO">ENCEBOLLADO</option>
</select>
                    
                    <label class="eti">Precio:</label>
                    <input class="campos" type="text" id="precio" name="precio"/>
                    <input class="boton2" id="terminar" type="button" value="Terminar Pedido" onclick="location.href='../../public/vista/listar_pedidos.html'"/>
                    <input class="boton2" id="agregar" type="submit" value="Agregar">
                    <input class="boton2" id="cancelar" type="button" value="Cancelar" onclick="location.href='../../public/vista/index.html'"/>
                    <div></div>
                </form>
            </div>
            <?php
                $conn->close(); 
            ?>
            <div></div>
            <!--
            <div class="imagenes">
                <img class="img_encebollado" src="../../public/img/encebollado.jpg" alt="Encebollado">
                <img class="img_bandera" src="../../public/img/bandera.png" alt="Bandera">
                <img class="img_camarones" src="../../public/img/camarones.jpg" alt="Plato de Camarones">
                <img class="img_churrascos" src="../../public/img/churrasco.jpg" alt="Plato de Churrascos">
        </div>
--->
        </div>
    </body>
</html>