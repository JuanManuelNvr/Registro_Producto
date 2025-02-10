CREATE TABLE `mst_sucursal` (
  `idSucursal` int(11) NOT NULL,
  `Nombre_Sucursal` varchar(50) NOT NULL,
  UNIQUE KEY `IDX_SUCURSAL` (`idSucursal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;