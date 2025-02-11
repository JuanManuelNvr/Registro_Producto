CREATE TABLE `producto` (
  `idCodigo` varchar(15) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Bodega` varchar(50) NOT NULL,
  `Sucursal` varchar(50) NOT NULL,
  `Moneda` varchar(5) NOT NULL,
  `Precio` decimal(10,2) NOT NULL,
  `Mat_Plastico` tinyint(1) DEFAULT NULL,
  `Mat_Metal` tinyint(1) DEFAULT NULL,
  `Mat_Madera` tinyint(1) DEFAULT NULL,
  `Mat_Vidrio` tinyint(1) DEFAULT NULL,
  `Mat_Textil` tinyint(1) DEFAULT NULL,
  `Descripcion` varchar(1000) NOT NULL,
  UNIQUE KEY `ID_CODIGO` (`idCodigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tabla de Registro de producto';