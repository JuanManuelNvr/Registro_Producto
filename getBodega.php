<?php
    require 'conexion.php';

    $query_bodega = "SELECT idbodega, Nombre_bodega, idsucursal, idmoneda FROM mst_bodega";
    $resultado = $conexion->query($query_bodega);

    $respuesta = "<option value =''> ' ' </option>";

    while ($row = $resultado->fetch_assoc()){
        $respuesta .= "<option value=''>" . $row['Nombre_bodega'] . "</option>";
    }

    echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
?>