<?php
    require 'conexion.php';

    $idbodega = $conexion->real_escape_string($_POST['id_bodega']);

    $query_moneda = "SELECT a.idsucursal idsucursal, b.tipomoneda tipomoneda
                        FROM mst_bodega a, mst_moneda b 
                        WHERE a.idmoneda = b.idmoneda 
                        AND a.idbodega = $idbodega";
    $resultado = $conexion->query($query_moneda);


    while ($row = $resultado->fetch_assoc()){
        $respuesta = "<option value=''>" . $row['tipomoneda'] . "</option>";
    }

    echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
?>