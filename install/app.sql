-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-05-2015 a las 22:15:53
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `negocioonline`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `idcategoria` int(11) NOT NULL,
  `nombrecategoria` varchar(100) COLLATE utf8_bin NOT NULL,
  `descripcion` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
`idCliente` int(5) NOT NULL,
  `NombreCompania` varchar(100) COLLATE utf8_bin NOT NULL,
  `NombreContacto` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `CargoContacto` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `Direccion` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `Ciudad` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `Region` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `CodPostal` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `Pais` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `Telefono` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `Fax` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `dni` varchar(9) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idCliente`, `NombreCompania`, `NombreContacto`, `CargoContacto`, `Direccion`, `Ciudad`, `Region`, `CodPostal`, `Pais`, `Telefono`, `Fax`, `dni`, `email`) VALUES
(6, '1', '1', '1', '1', '1', '1', '1', '1', '11', '1', '1', '1'),
(7, 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', '2', '2'),
(8, '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3'),
(9, 'k', 'k', 'k', 'k', 'k', 'k', 'k', 'k', 'k', 'k', 'p', 'p'),
(10, '9', '9', '9', '9', '9', '9', '9', '9', '9', '9', 'q', 'q'),
(11, 'm', 'm', 'm', 'm', 'm', 'm', 'm', 'm', 'm', 'm', 'm', 'm');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `companiasdeenvios`
--

CREATE TABLE IF NOT EXISTS `companiasdeenvios` (
  `idCompaniaEnvios` int(11) NOT NULL,
  `nombreCompaÃ±ia` varchar(40) COLLATE utf8_bin NOT NULL,
  `telefono` varchar(24) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallesdepedidos`
--

CREATE TABLE IF NOT EXISTS `detallesdepedidos` (
  `idpedido` int(11) DEFAULT NULL,
  `idproducto` int(11) DEFAULT NULL,
  `preciounidad` decimal(10,0) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `descuento` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE IF NOT EXISTS `empleados` (
  `IdEmpleado` int(11) NOT NULL,
  `Apellidos` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `Nombre` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `cargo` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `Tratamiento` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `FechaNacimiento` date DEFAULT NULL,
  `FechaContratacion` date DEFAULT NULL,
  `direccion` varchar(60) COLLATE utf8_bin DEFAULT NULL,
  `ciudad` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `region` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `codPostal` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `pais` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `TelDomicilio` varchar(24) COLLATE utf8_bin DEFAULT NULL,
  `Extension` varchar(4) COLLATE utf8_bin DEFAULT NULL,
  `notas` text COLLATE utf8_bin,
  `Jefe` int(11) DEFAULT NULL,
  `sueldoBasico` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE IF NOT EXISTS `pedidos` (
  `IdPedido` int(11) NOT NULL,
  `IdCliente` int(5) NOT NULL,
  `IdEmpleado` int(11) NOT NULL,
  `FechaPedido` date DEFAULT NULL,
  `FechaEntrega` date DEFAULT NULL,
  `FechaEnvio` date DEFAULT NULL,
  `FormaEnvio` int(11) DEFAULT NULL,
  `Cargo` decimal(10,0) DEFAULT NULL,
  `Destinatario` varchar(60) COLLATE utf8_bin DEFAULT NULL,
  `DireccionDestinatario` varchar(60) COLLATE utf8_bin DEFAULT NULL,
  `CiudadDestinatario` varchar(60) COLLATE utf8_bin DEFAULT NULL,
  `RegionDestinatario` varchar(60) COLLATE utf8_bin DEFAULT NULL,
  `CodPostalDestinatario` varchar(60) COLLATE utf8_bin DEFAULT NULL,
  `PaisDestinatario` varchar(60) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `idproducto` int(11) NOT NULL,
  `nombreProducto` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `idProveedor` int(11) DEFAULT NULL,
  `idCategoria` int(11) DEFAULT NULL,
  `cantidadPorUnidad` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `precioUnidad` decimal(10,0) DEFAULT NULL,
  `unidadesEnExistencia` smallint(6) DEFAULT NULL,
  `unidadesEnPedido` smallint(6) DEFAULT NULL,
  `nivelNuevoPedido` smallint(6) DEFAULT NULL,
  `suspendido` smallint(6) DEFAULT NULL,
  `categoriaProducto` varchar(20) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE IF NOT EXISTS `proveedores` (
  `idProveedor` int(11) NOT NULL,
  `nombreCompaÃ±ia` varchar(40) COLLATE utf8_bin NOT NULL,
  `nombrecontacto` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `cargocontacto` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `direccion` varchar(60) COLLATE utf8_bin DEFAULT NULL,
  `ciudad` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `region` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `codPostal` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `pais` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `telefono` varchar(24) COLLATE utf8_bin DEFAULT NULL,
  `fax` varchar(24) COLLATE utf8_bin DEFAULT NULL,
  `paginaprincipal` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `userweb`
--

CREATE TABLE IF NOT EXISTS `userweb` (
`IdUserWeb` int(11) NOT NULL,
  `IdCliente` int(5) NOT NULL,
  `usuario` varchar(255) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `rol` int(5) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `userweb`
--

INSERT INTO `userweb` (`IdUserWeb`, `IdCliente`, `usuario`, `password`, `rol`) VALUES
(4, 6, '1', '1', 1),
(5, 7, 'a', 'a', 0),
(8, 11, 'm', 'm', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
 ADD PRIMARY KEY (`idcategoria`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
 ADD PRIMARY KEY (`idCliente`);

--
-- Indices de la tabla `companiasdeenvios`
--
ALTER TABLE `companiasdeenvios`
 ADD PRIMARY KEY (`idCompaniaEnvios`);

--
-- Indices de la tabla `detallesdepedidos`
--
ALTER TABLE `detallesdepedidos`
 ADD KEY `fk_1` (`idpedido`), ADD KEY `fk_2` (`idproducto`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
 ADD PRIMARY KEY (`IdEmpleado`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
 ADD PRIMARY KEY (`IdPedido`), ADD KEY `fk_6` (`IdEmpleado`), ADD KEY `fk_4` (`FormaEnvio`), ADD KEY `IdCliente` (`IdCliente`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
 ADD PRIMARY KEY (`idproducto`), ADD KEY `fk_3` (`idProveedor`), ADD KEY `fk_7` (`idCategoria`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
 ADD PRIMARY KEY (`idProveedor`);

--
-- Indices de la tabla `userweb`
--
ALTER TABLE `userweb`
 ADD PRIMARY KEY (`IdUserWeb`), ADD KEY `IdCliente` (`IdCliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
MODIFY `idCliente` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `userweb`
--
ALTER TABLE `userweb`
MODIFY `IdUserWeb` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detallesdepedidos`
--
ALTER TABLE `detallesdepedidos`
ADD CONSTRAINT `fk_1` FOREIGN KEY (`idpedido`) REFERENCES `pedidos` (`IdPedido`),
ADD CONSTRAINT `fk_2` FOREIGN KEY (`idproducto`) REFERENCES `productos` (`idproducto`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
ADD CONSTRAINT `fk_4` FOREIGN KEY (`FormaEnvio`) REFERENCES `companiasdeenvios` (`idCompaniaEnvios`),
ADD CONSTRAINT `fk_6` FOREIGN KEY (`IdEmpleado`) REFERENCES `empleados` (`IdEmpleado`),
ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`IdCliente`) REFERENCES `clientes` (`idCliente`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
ADD CONSTRAINT `fk_3` FOREIGN KEY (`idProveedor`) REFERENCES `proveedores` (`idProveedor`),
ADD CONSTRAINT `fk_7` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`idcategoria`);

--
-- Filtros para la tabla `userweb`
--
ALTER TABLE `userweb`
ADD CONSTRAINT `userweb_ibfk_1` FOREIGN KEY (`IdCliente`) REFERENCES `clientes` (`idCliente`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
