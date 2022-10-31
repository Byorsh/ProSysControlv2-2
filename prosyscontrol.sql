-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-10-2022 a las 01:56:16
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prosyscontrol`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogo`
--

CREATE TABLE `catalogo` (
  `idProducto` int(11) NOT NULL,
  `descripcion` varchar(70) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precioCompra` float(10,2) NOT NULL,
  `precioVenta` float(10,2) NOT NULL,
  `iva` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `catalogo`
--

INSERT INTO `catalogo` (`idProducto`, `descripcion`, `marca`, `modelo`, `cantidad`, `precioCompra`, `precioVenta`, `iva`) VALUES
(2, 'pasta termica coolmaster', 'coolmaster', 'pasta1', 50, 120.00, 200.00, 16),
(3, 'cable ethernet 5m', 'cisco', 'c001', 100, 150.00, 320.00, 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `idClientes` int(11) NOT NULL,
  `rfc` varchar(20) NOT NULL,
  `nombreCliente` varchar(50) NOT NULL,
  `apellidoP` varchar(50) NOT NULL,
  `apellidoM` varchar(50) NOT NULL,
  `nombreEmpresa` varchar(70) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `email` varchar(70) NOT NULL,
  `domicilio` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idClientes`, `rfc`, `nombreCliente`, `apellidoP`, `apellidoM`, `nombreEmpresa`, `telefono`, `email`, `domicilio`) VALUES
(1, 'oinsopvdinop', 'nombrePrueba', 'aPrueba', 'aPrueba', 'nombreEmpresa prueba', '13612347', 'correoPrueba', 'domicilioPrueba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `idProducto` varchar(10) NOT NULL,
  `nombreProducto` varchar(50) NOT NULL,
  `marca` varchar(30) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precioCompra` int(11) NOT NULL,
  `precioVenta` int(11) NOT NULL,
  `iva` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenreparacion`
--

CREATE TABLE `ordenreparacion` (
  `clave_ordenRep` varchar(10) NOT NULL,
  `idCliente` varchar(10) NOT NULL,
  `ns` varchar(25) NOT NULL,
  `marca` varchar(20) NOT NULL,
  `modelo` varchar(30) NOT NULL,
  `observaciones` varchar(400) NOT NULL,
  `accesorios` varchar(400) NOT NULL,
  `fechaEntrada` date NOT NULL,
  `horaEntrada` time NOT NULL,
  `fechaPrometida` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `rfc` varchar(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `email` varchar(70) NOT NULL,
  `user` varchar(35) NOT NULL,
  `contrasenia` varchar(50) NOT NULL,
  `privilegio` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `rfc`, `nombre`, `apellido`, `telefono`, `email`, `user`, `contrasenia`, `privilegio`) VALUES
(1, 'rfcPrueba', 'Jorge Prueba', 'Barraza Prueba', '6331128767', 'correo@gmail.com', 'JurgeB', '12345', '1'),
(3, '32829385', 'dvosihov', 'nvosijdvq', '432623652', 'baiuso9d@yopmail.com', 'Jorge2', 'DVSKBIVD', '0'),
(4, 'OICY9909301892637891', 'Julian360Q@', 'Mesas', 'kjdklajsdklasjd', 'elchoskua@gmail.com', 'espantaviejas123', '12345h', '0');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `catalogo`
--
ALTER TABLE `catalogo`
  ADD PRIMARY KEY (`idProducto`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idClientes`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`idProducto`);

--
-- Indices de la tabla `ordenreparacion`
--
ALTER TABLE `ordenreparacion`
  ADD PRIMARY KEY (`clave_ordenRep`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `catalogo`
--
ALTER TABLE `catalogo`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idClientes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
