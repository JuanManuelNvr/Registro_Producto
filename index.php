<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario producto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="registro.php" method="post" name="formulario">
    <table>
        <tr><td></td><td></td></tr>
        <tr><td colspan="2"><h1>Formulario de Producto</h1></td></tr>
        <tr>
            <td>
            <label for="codigo"><p>Codigo</p></label><br>
            <input class="input_text" type="text" name="codigo" id="codigo" placeholder=""><br>
            <label> </label>
            </td>
            <td>
            <label for="nombre"><p>Nombre</p></label><br>
            <input class="input_text" type="text" name="nombre" id="nombre" placeholder=""><br>
            </td>
        </tr>
        <tr>    
            <td>
            <label for="bodega"><p>Bodega</p></label><br>
            <select class="input_text" name="bodega" id="bodega">
                    <option value=""> </option>
                    <?php

                    require 'conexion.php';

                    $lista = $conexion->query("Select idbodega, nombre_bodega from mst_bodega");
                    ?>
                    <?php while ($row = $lista->fetch_assoc()) { ?>
                        <option value="<?php echo $row['idbodega']; ?>"><?php echo $row['nombre_bodega'] ?></option>
                    <?php } ?>

            </select><br>
            </td>
            <td>
            <label for="sucursal"><p>Sucursal</p></label><br>
            <select class="input_text" name="sucursal" id="sucursal">
                <option value="sucursal"> </option>
            </select>
            </td>
        </tr>    
        <tr>
            <td>
            <label for="moneda"><p>Moneda</p></label><br>
            <select class="input_text" name="moneda" id="moneda">
                <option value="soles"> </option>
            </select><br>
            </td>
            <td>
            <label for="precio"><p>Precio</p></label><br>
            <input class="input_text" type="float" name="precio" id="precio" placeholder="" ><br>
            </td>
        </tr>   
        <tr>
            <td colspan="2">
            <p>Material del Producto</p><br>
            <input type="checkbox" name="plastico" id="plastico" value="1" />
            <label for="plastico" class="p1">Plástico</label>

            <input type="checkbox" name="metal" id="metal" value="1" />
            <label for="metal" class="p1">Metal</label>

            <input type="checkbox" name="madera" id="madera" value="1" />
            <label for="madera" class="p1">Madera</label>

            <input type="checkbox" name="vidrio" id="vidrio" value="1" />
            <label for="vidrio" class="p1">Vidrio</label>

            <input type="checkbox" name="textil" id="textil" value="1" />
            <label for="textil" class="p1">Textil</label>
            <br>
            </td>
        </tr>
        <tr> 
            <td colspan="2">  
            <label for="descripcion"><p>Descripcion</p></label><br>
            <input class="input_area" type="textarea" name="descripcion" id="descripcion" placeholder="" ><br>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <button type="submit" class="p2" id="btn_guardar"> Guardar Producto</button>
            </td>
        </tr>
    </table>
    </form>

    <script src="carga_sucursal.js"></script>

</body>
</html>