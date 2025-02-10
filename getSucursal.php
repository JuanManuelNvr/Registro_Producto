<?php
    require 'conexion.php';

    $idbodega = $conexion->real_escape_string($_POST['id_bodega']);

    $query_sucursal = "SELECT a.idsucursal, b.nombre_sucursal
                        FROM mst_bodega a, mst_sucursal b 
                        WHERE a.idsucursal = b.idsucursal 
                        AND a.idbodega = $idbodega";

    $resultado = $conexion->query($query_sucursal);


    while ($row = $resultado->fetch_assoc()){
        $respuesta = "<option value='" . $row['idsucursal'] . "'>" . $row['nombre_sucursal'] . "</option>";
    }

    echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
?>