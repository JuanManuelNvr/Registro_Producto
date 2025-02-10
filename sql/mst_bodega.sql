CREATE TABLE `mst_bodega` (
  `idBodega` int(11) NOT NULL,
  `Nombre_Bodega` varchar(50) NOT NULL,
  `idSucursal` int(11) NOT NULL,
  `idMoneda` int(11) NOT NULL,
  UNIQUE KEY `IDX_BODEGA` (`idBodega`),
  KEY `idSucursal` (`idSucursal`),
  KEY `idMoneda` (`idMoneda`),
  CONSTRAINT `mst_bodega_ibfk_1` FOREIGN KEY (`idMoneda`) REFERENCES `mst_moneda` (`idMoneda`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `mst_bodega_ibfk_2` FOREIGN KEY (`idSucursal`) REFERENCES `mst_sucursal` (`idSucursal`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
