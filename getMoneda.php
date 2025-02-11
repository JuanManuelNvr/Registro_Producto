<?php
    require 'conexion.php';

    $idsucursal = $conexion->real_escape_string($_POST['id_sucursal']);

    $query_moneda = "SELECT a.idmoneda idmoneda, b.tipomoneda tipomoneda
                        FROM sucur_mon a, mst_moneda b 
                        WHERE a.idmoneda = b.idmoneda 
                        AND a.idSucursal = $idsucursal";
    $resultado = $conexion->query($query_moneda);

    $respuesta = "<option value=''> </option>";

    while ($row = $resultado->fetch_assoc()){
        $respuesta .= "<option value='" . $row['idmoneda'] . "'>". $row['tipomoneda'] . "</option>";
    }

    echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
?>