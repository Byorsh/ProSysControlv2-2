-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-12-2022 a las 04:17:05
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
  `descripcion` varchar(100) NOT NULL,
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
(3, 'cable ethernet 5m', 'cisco', 'c001', 100, 150.00, 320.00, 16),
(5, 'Aire comprimido chico', '', '', 15, 100.00, 180.00, 16),
(6, 'Memoria USB 32 GB KINGSTON', 'Kingston', 'USB0001', 80, 68.00, 180.00, 16),
(7, 'WERWEREW', 'ERWREWRWE', 'SRFWERWRFW', 999, 100.00, 89.00, 8);

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
(1, 'oinsopvdinop', 'nombrePrueba', 'aPrueba', 'aPrueba', 'nombreEmpresa prueba', '13612347', 'correoPrueba', 'domicilioPrueba'),
(3, '', 'Alfonso Prueba', 'Martilero', '', '', '6898976879', 'hola@gmail.com', ''),
(4, '', 'biuoasc', 'iascobo', 'oaisbcoib', '', '8924217890', 'mati@gmail.com', ''),
(5, 'VECJ880326XXX', 'JUAN', 'PEREZ', '', 'COCA COLA', '6331128996', 'cocacola_alfonso@outlook.com', 'Calle siete #123 entre israel gonzales'),
(6, '', 'XXX', 'QQ', 'QQ', 'A', '1233444433', 'www@drtt.eee', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domicilio`
--

CREATE TABLE `domicilio` (
  `id` int(11) NOT NULL,
  `id_Cliente` int(11) NOT NULL,
  `problematica` varchar(200) NOT NULL,
  `observaciones` varchar(200) NOT NULL,
  `fechaProgramada` date NOT NULL,
  `presupuesto` float NOT NULL,
  `costoTotal` float NOT NULL,
  `horaInicio` time NOT NULL,
  `horaFinal` time NOT NULL,
  `horasRealizadas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `domicilio`
--

INSERT INTO `domicilio` (`id`, `id_Cliente`, `problematica`, `observaciones`, `fechaProgramada`, `presupuesto`, `costoTotal`, `horaInicio`, `horaFinal`, `horasRealizadas`) VALUES
(1, 1, 'REALIZAR MANTENIMIENTO A EQUIPOS', 'AQUI SE GUARDANM LAS OBSERVACIONES', '2022-02-12', 0, 250, '00:00:00', '00:00:00', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenreparacion`
--

CREATE TABLE `ordenreparacion` (
  `id` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `ns` varchar(25) NOT NULL,
  `marca` varchar(20) NOT NULL,
  `modelo` varchar(30) NOT NULL,
  `tipoEquipo` varchar(50) NOT NULL,
  `observaciones` varchar(400) NOT NULL,
  `accesorios` varchar(400) NOT NULL,
  `fechaEntrada` date NOT NULL,
  `horaEntrada` time NOT NULL,
  `fechaPrometida` date NOT NULL,
  `tecnicoAsignado` int(11) NOT NULL,
  `estadoEquipo` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ordenreparacion`
--

INSERT INTO `ordenreparacion` (`id`, `idCliente`, `ns`, `marca`, `modelo`, `tipoEquipo`, `observaciones`, `accesorios`, `fechaEntrada`, `horaEntrada`, `fechaPrometida`, `tecnicoAsignado`, `estadoEquipo`) VALUES
(7, 3, '12wsw11', 'QQ', 'REWRW393', 'WEWQW', 'ERWERIW RWEUIRUWEIO ', 'ERR RWERE', '2022-11-30', '14:28:00', '1999-02-23', 1, '1');

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
(1, '', 'Jorge Prueba', 'Barraza Prueba', '6331128767', 'correo@gmail.com', 'JorgeB', '1234567', '1'),
(3, 'DVIE991123', 'dvosihov', 'nvosijdvq', '6221238987', 'baiuso9d@yopmail.com', 'Jorge2', 'DVSKBIVD', '3'),
(14, '', 'JUAN', 'PEREZ', '6331128767', 'gion340@gmail.com', 'JORGE', '1234567', '2');

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
-- Indices de la tabla `domicilio`
--
ALTER TABLE `domicilio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ordenreparacion`
--
ALTER TABLE `ordenreparacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCliente` (`idCliente`),
  ADD KEY `tecnicoAsignado` (`tecnicoAsignado`);

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
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idClientes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `domicilio`
--
ALTER TABLE `domicilio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ordenreparacion`
--
ALTER TABLE `ordenreparacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ordenreparacion`
--
ALTER TABLE `ordenreparacion`
  ADD CONSTRAINT `ordenreparacion_ibfk_1` FOREIGN KEY (`tecnicoAsignado`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ordenreparacion_ibfk_2` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`idClientes`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
