<?php
    require 'conexion.php';

    $idbodega = $conexion->real_escape_string($_POST['id_bodega']);

    $query_sucursal = "SELECT DISTINCT a.idsucursal, b.nombre_sucursal
                        FROM bodega_sucur_mon a, mst_sucursal b 
                        WHERE a.idsucursal = b.idsucursal 
                        AND a.idbodega = $idbodega";

    $resultado = $conexion->query($query_sucursal);

    $respuesta = "<option value=''> </option>";

    while ($row = $resultado->fetch_assoc()){
        $respuesta .= "<option value='" . $row['idsucursal'] . "'>" . $row['nombre_sucursal'] . "</option>";
    }

    echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
?>