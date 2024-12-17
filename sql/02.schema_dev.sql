-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 17-12-2024 a las 02:49:50
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistemax`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `idClientes` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Apellido` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `fechaIngreso` varchar(10) NOT NULL,
  `Telefono` varchar(12) NOT NULL,
  `Estado` varchar(45) NOT NULL,
  `Bloqueo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idClientes`, `Nombre`, `Apellido`, `correo`, `fechaIngreso`, `Telefono`, `Estado`, `Bloqueo`) VALUES
(1, 'Carlos', 'Mendoza', 'carlos.mendoza@mail.com', '2024-01-01', '5551234567', 'Inactivo', 1),
(2, 'Sofía', 'López', 'sofia.lopez@mail.com', '2024-02-02', '5552345678', 'Activo', 1),
(3, 'Miguel', 'García', 'miguel.garcia@mail.com', '2024-03-03', '5553456789', 'Activo', 1),
(4, 'Valeria', 'Ruiz', 'valeria.ruiz@mail.com', '2024-04-04', '5554567890', 'Inactivo', 0),
(5, 'Pedro', 'Martínez', 'pedro.martinez@mail.com', '2024-05-05', '5555678901', 'Inactivo', 0),
(6, 'Lucía', 'Pérez', 'lucia.perez@mail.com', '2024-06-06', '5556789012', 'Activo', 1),
(7, 'Javier', 'Hernández', 'javier.hernandez@mail.com', '2024-07-07', '5557890123', 'Activo', 0),
(8, 'Clara', 'González', 'clara.gonzalez@mail.com', '2024-08-08', '5558901234', 'Activo', 1),
(11, 'ALEXANDRA', 'RAMOS', 'uberpot.ia@gmail.com', '2003-04-23', '914008068', 'Activo', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleventa`
--

CREATE TABLE `detalleventa` (
  `idDetalleVenta` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Descuento` decimal(10,2) NOT NULL,
  `idProductos` int(11) NOT NULL,
  `idVenta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalleventa`
--

INSERT INTO `detalleventa` (`idDetalleVenta`, `Cantidad`, `Descuento`, `idProductos`, `idVenta`) VALUES
(11, 1, 0.00, 1, 1),
(12, 2, 5.00, 2, 1),
(13, 1, 10.00, 3, 2),
(14, 3, 0.00, 4, 3),
(15, 1, 20.00, 5, 4),
(16, 2, 10.00, 6, 5),
(17, 1, 5.00, 7, 6),
(18, 3, 0.00, 8, 7),
(19, 2, 15.00, 9, 8),
(20, 1, 10.00, 11, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProductos` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Estado` varchar(45) NOT NULL,
  `Stock` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `Bloqueo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProductos`, `Nombre`, `Estado`, `Stock`, `precio`, `Bloqueo`) VALUES
(1, 'Laptop', 'BUENO', 100, 799.99, 0),
(2, 'Silla de oficina', 'Nuevo', 50, 49.99, 1),
(3, 'Martillo', 'Usado', 200, 15.99, 1),
(4, 'Olla', 'Nuevo', 30, 29.99, 0),
(5, 'Monitor', 'Nuevo', 75, 199.99, 0),
(6, 'Camiseta', 'Nuevo', 150, 19.99, 0),
(7, 'Pico', 'Usado', 100, 12.99, 0),
(8, 'Licuadora', 'Nuevo', 40, 99.99, 0),
(9, 'Cuaderno', 'Nuevo', 500, 2.99, 0),
(11, 'CANABIS', 'BUENO', 12, 12.00, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nick` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `nivel` varchar(20) NOT NULL,
  `bloqueo` int(1) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nick`, `nombre`, `pass`, `correo`, `nivel`, `bloqueo`, `foto`) VALUES
(1, 'juan123', 'Juan Pérez', 'password123', 'juan.perez@mail.com', 'ADMINISTRADOR', 0, 'juan123.jpg'),
(2, 'ana456', 'Ana Gómez', 'password456', 'ana.gomez@mail.com', 'ASESOR', 1, 'ana456.jpg'),
(3, 'luis789', 'Luis Martínez', 'password789', 'luis.martinez@mail.com', 'ASESOR', 1, 'luis789.jpg'),
(4, 'marta321', 'Marta Rodríguez', 'password321', 'marta.rodriguez@mail.com', 'ADMINISTRADOR', 1, 'marta321.jpg'),
(5, 'carla654', 'Carla Fernández', 'password654', 'carla.fernandez@mail.com', 'ASESOR', 0, 'carla654.jpg'),
(6, 'jorge123', 'Jorge Pérez', 'password123', 'jorge.perez@mail.com', 'ASESOR', 0, 'jorge123.jpg'),
(7, 'rosa987', 'Rosa Sánchez', 'password987', 'rosa.sanchez@mail.com', 'ADMINISTRADOR', 0, 'rosa987.jpg'),
(8, 'victor555', 'Víctor López', 'password555', 'victor.lopez@mail.com', 'ASESOR', 0, 'victor555.jpg'),
(9, 'paula111', 'Paula García', 'password111', 'paula.garcia@mail.com', 'ASESOR', 1, 'paula111.jpg'),
(10, 'joseph777', 'Joseph Ruiz', 'password777', 'joseph.ruiz@mail.com', 'ADMINISTRADOR', 0, 'joseph777.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `idVenta` int(11) NOT NULL,
  `fechaVenta` varchar(10) NOT NULL,
  `Descripcion` varchar(200) NOT NULL,
  `idClientes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`idVenta`, `fechaVenta`, `Descripcion`, `idClientes`) VALUES
(1, '2024-11-01', 'Compra de artículos electrónicos', 1),
(2, '2024-11-02', 'Venta de muebles de oficina', 2),
(3, '2024-11-03', 'Compra de herramientas de jardinería', 3),
(4, '2024-11-04', 'Venta de productos de cocina', 4),
(5, '2024-11-05', 'Compra de equipos de computación', 5),
(6, '2024-11-06', 'Venta de ropa deportiva', 6),
(7, '2024-11-07', 'Compra de herramientas para construcción', 7),
(8, '2024-11-08', 'Venta de electrodomésticos', 8),
(9, '2024-11-09', 'Compra de accesorios de oficina', 11),
(10, '2024-11-10', 'Venta de equipos de fotografía', 11),
(11, '2024-11-01', 'Compra de artículos electrónicos', 1),
(12, '2024-11-02', 'Venta de muebles de oficina', 2),
(13, '2024-11-03', 'Compra de herramientas de jardinería', 3),
(14, '2024-11-04', 'Venta de productos de cocina', 4),
(15, '2024-11-05', 'Compra de equipos de computación', 5),
(16, '2024-11-06', 'Venta de ropa deportiva', 6),
(17, '2024-11-07', 'Compra de herramientas para construcción', 7),
(18, '2024-11-08', 'Venta de electrodomésticos', 8),
(19, '2024-11-09', 'Compra de accesorios de oficina', 11),
(20, '2024-11-10', 'Venta de equipos de fotografía', 11);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idClientes`);

--
-- Indices de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD PRIMARY KEY (`idDetalleVenta`),
  ADD KEY `fk_DetalleVenta_Productos1_idx` (`idProductos`),
  ADD KEY `fk_DetalleVenta_Venta1_idx` (`idVenta`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProductos`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`idVenta`),
  ADD KEY `fk_Venta_Clientes_idx` (`idClientes`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idClientes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  MODIFY `idDetalleVenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProductos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD CONSTRAINT `fk_DetalleVenta_Productos1` FOREIGN KEY (`idProductos`) REFERENCES `productos` (`idProductos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_DetalleVenta_Venta1` FOREIGN KEY (`idVenta`) REFERENCES `venta` (`idVenta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `fk_Venta_Clientes` FOREIGN KEY (`idClientes`) REFERENCES `clientes` (`idClientes`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
