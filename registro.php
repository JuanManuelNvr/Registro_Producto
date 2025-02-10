<?php
    include 'conexion.php';

    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $bodega = $_POST['bodega'];
    $sucursal = $_POST['sucursal'];
    $moneda = $_POST['moneda'];
    $precio = $_POST['precio'];
    $plastico = $_POST['plastico'];
    $metal = $_POST['metal'];
    $madera = $_POST['madera'];
    $vidrio = $_POST['vidrio'];
    $textil = $_POST['textil'];
    $descripcion = $_POST['descripcion'];

    $patLetra = "/^[a-zA-Z]+$/i";
    $patNumero = "/^[0-9]+$/";

    //Validacion de codigo de producto
    if(trim($codigo)===""){
        echo '
        <script> 
            alert("El código del producto no puede estar en blanco");
            window.location = "index.php";
        </script>
        ';
    } elseif(strlen($codigo)<5) {
        echo '
        <script> 
            alert("El código del producto debe tener entre 5 y 15 caracteres.");
            window.location = "index.php";
        </script>
        ';
    } elseif(strlen($codigo)>15) {
        echo '
        <script> 
            alert("El código del producto debe tener entre 5 y 15 caracteres.");
            window.location = "index.php";
        </script>
        ';
    } elseif(preg_match($patLetra,$codigo) || (preg_match($patNumero,$codigo))){
        echo '
        <script> 
            alert("El codigo de producto debe contener letras y números");
            window.location = "index.php";
        </script>';
    //Validacion nombre de producto
    } elseif(trim($nombre)===""){
        echo '
        <script> 
            alert("El nombre del producto no puede estar en blanco");
            window.location = "index.php";
        </script>
        ';
    } elseif(strlen($nombre)<2) {
        echo '
        <script> 
            alert("El nombre del producto debe tener entre 2 y 50 caracteres.");
            window.location = "index.php";
        </script>
        ';
    } elseif(strlen($nombre)>50) {
        echo '
        <script> 
            alert("El nombre del producto debe tener entre 2 y 50 caracteres.");
            window.location = "index.php";
        </script>
        ';
    //Validacion nombre de precio
    } elseif(trim($precio)===""){
    echo '
    <script> 
        alert("El precio del producto no puede estar en blanco");
        window.location = "index.php";
    </script>
    ';
    } elseif(is_numeric($precio) && strpos($precio, '.') && (substr($precio,-3,1) === '.')  == false){
    echo '
    <script> 
        alert("El precio del producto debe ser un número positivo con hasta dos decimales.");
        window.location = "index.php";
    </script>
    ';
    //Validacion bodega
    } elseif(trim($bodega)===""){
    echo '
    <script> 
        alert("Debe seleccionar una bodega");
        window.location = "index.php";
    </script>
    ';
    //Validacion descripcion
    } elseif(trim($descripcion)===""){
    echo '
    <script> 
        alert("La descripcion del producto no puede estar en blanco");
        window.location = "index.php";
    </script>
    ';
    } elseif(strlen($descripcion)<10) {
    echo '
    <script> 
        alert("La descripcion del producto debe tener entre 10 y 1000 caracteres.");
        window.location = "index.php";
    </script>
    ';
    } elseif(strlen($descripcion)>1000) {
    echo '
    <script> 
        alert("La descripcion del producto debe tener entre 10 y 1000 caracteres.");
        window.location = "index.php";
    </script>
    ';
    //Validacion material
    } elseif($plastico + $metal + $madera + $vidrio + $textil < 2) {
    echo '
    <script> 
        alert("Debe seleccionar al menos dos materiales para el producto.");
        window.location = "index.php";
    </script>
    ';

    } else {
   
    $insert = "INSERT INTO producto(idCodigo,Nombre,Bodega,Sucursal,Moneda,Precio,Mat_Plastico,Mat_Metal,Mat_Madera,Mat_Vidrio,Mat_Textil,Descripcion) 
              VALUES ('$codigo','$plastico','$bodega','$sucursal','$moneda','$precio','$plastico','$metal','$madera','$vidrio','$textil','$descripcion'); ";
    $ejecutar = mysqli_query($conexion,$insert);

    $act_final="UPDATE producto p
                JOIN mst_bodega b ON p.Bodega = b.idBodega
                JOIN mst_sucursal s ON b.idSucursal = s.idSucursal
                JOIN mst_moneda m ON b.idMoneda = m.idMoneda
                SET Bodega = b.Nombre_Bodega,
                Sucursal = s.Nombre_Sucursal,
                Moneda = m.TipoMoneda;";
    $ejecutar_act = mysqli_query($conexion,$act_final);
          
   
    if($ejecutar){
        echo '
        <script>
            alert("Producto registrado correctamente");
            window.location = "index.php";
        </script>
        ';
    }else{
        echo '
        <script>
            alert("Ocurrió un problema, inténtelo de nuevo");
            window.location = "index.php";
        </script>
        ';
    }

    mysqli_close($conexion);
    };
    
?>