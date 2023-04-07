-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-04-2023 a las 01:26:09
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idClientes`, `rfc`, `nombreCliente`, `apellidoP`, `apellidoM`, `nombreEmpresa`, `telefono`, `email`, `domicilio`) VALUES
(1, 'oinsopvdinop', 'nombrePrueba', 'aPrueba', 'aPrueba', 'nombreEmpresa prueba', '13612347', 'correoPrueba', 'domicilioPrueba'),
(3, '', 'Alfonso Prueba', 'Martilero', '', '', '6898976879', 'hola@gmail.com', ''),
(4, '', 'biuoasc', 'iascobo', 'oaisbcoib', '', '8924217890', 'mati@gmail.com', ''),
(5, 'VECJ880326XXX', 'JUAN', 'PEREZ', '', 'COCA COLA', '6331128111', 'cocacola_alfonso@outlook.com', 'Calle siete #123 entre israel gonzales'),
(6, '', 'XXX', 'QQ', 'QQ', 'A', '1233444433', 'www@drtt.eee', ''),
(7, '', 'pancrasio', 'filomeno', 'asd', 'afas', '6625086734', 'shakegonket@gmail.com', 'avslknlb'),
(8, '', 'Manito', 'Piesito', '', 'Miembros', '3251684923', 'l19330591@hermosillo.tecnm.mx', ''),
(9, '', 'Alo', 'Hostil', '', 'JAJAJA', '1687142694', 'das@gmail.com', ''),
(10, '', 'nocreo', 'hay ', '', 'falla', '2651165163', 'come@gmail.com', ''),
(11, '', 'paleta', 'del', '', 'limon', '3259741685', 'julio@hotmail.com', ''),
(12, '', 'faith', 'kiku', '', 'guggu', '3695218664', 'bubbles@gmail.com', ''),
(13, '', 'gregorio', 'jaker', '', 'hoppydoppty', '6653214976', 'olo@gmail.com', ''),
(14, 'KEGA991213EY7', 'Alejandro', 'Ketchul', 'González', 'Transformaciones metálicas', '6621355389', 'transme@hotmail.com', 'Yecora #458 Col. Carmen Serdan'),
(15, 'MANE201230EO3', 'Manuel ', 'Nágera', 'Escobar', 'Gogas', '6634889145', 'gogas123@hotmail.com', 'Huasave #24 Col. La Ruina'),
(16, 'VICE210615EO3', 'Victor', 'Cowton', 'Perez', '', '6631496571', 'fnaf@hotmail.com', ''),
(17, 'KEVD980406EI6', 'Kevin', 'Dormamu', 'Velazquez', '', '6428836967', 'infinite@gmail.com', ''),
(18, 'LIKE970824HK0', 'Lorenzo', 'Epifanio', 'Castro', 'Tuercas Lokas', '6423122487', 'tuer_k@gmail.com', 'Niños Héroes #456'),
(19, '', 'Robero', 'Balboa ', 'Jigachi', '', '6627561317', 'rock_eando@hotmail.com', ''),
(20, '', 'José', 'Villa Lobos', 'Felix', '', '6428893164', 'lobo@gmail.com', ''),
(21, 'KIKO201129LP2', 'Kevin', 'Cabrera', 'Lopez', '', '6698448713', 'kikin@hotmail.com', ''),
(22, '', 'Eduardo', 'García', 'Wong', '', '6642657912', 'chingchong@gmail.com', ''),
(23, '', 'Julio', 'Berne', 'Martinez', '', '6642589667', 'libro@hotmail.com', ''),
(24, '', 'Humberto', 'Huerta', 'Herdez', 'La Costeña', '6614879213', 'katsup@hotmail.com', ''),
(25, '', 'Leonardo', 'Castro', 'Mencinas', '', '6623156548', 'leo_123@hotmail.com', ''),
(26, '', 'Javier ', 'Valles ', 'Robles', '', '6642153326', 'valles_ja@hotmail.com', ''),
(27, 'QUEK231008EQ9', 'Ramon', 'Quesada', 'Rascón', '', '6655329787', 'quesadilla@hotmail.com', ''),
(28, '', 'Ramón', 'Figueroa', 'Melendez', '', '6431568796', 'figura@gmail.com', ''),
(29, '', 'Benito', 'Savala', 'Rodriguez', '', '6647745413', 'benibeni@hotmail.com', ''),
(30, 'GEGE220513SC0', 'Eduardo', 'Gelacio', 'Gandarilla', '', '6645213546', 'ganda_gela@hotmail.com', '');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `domicilio`
--

INSERT INTO `domicilio` (`id`, `id_Cliente`, `problematica`, `observaciones`, `fechaProgramada`, `presupuesto`, `costoTotal`, `horaInicio`, `horaFinal`, `horasRealizadas`) VALUES
(1, 1, 'REALIZAR MANTENIMIENTO A EQUIPOS', 'AQUI SE GUARDANM LAS OBSERVACIONES', '2022-02-12', 0, 250, '00:00:00', '00:00:00', 10),
(3, 3, '      aaaaaaaaaaaaaaaaaaa', '???????', '2022-12-31', 0, 0, '17:48:00', '00:00:00', 0),
(4, 6, '  segundo intento', '???', '2022-12-24', 0, 0, '17:56:00', '00:00:00', 0),
(6, 1, 'serompio alv', '', '2022-12-12', 0, 0, '20:05:00', '00:00:00', 0),
(7, 14, 'Servidores empolvados.', '', '2023-04-20', 0, 0, '18:15:00', '00:00:00', 0);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ordenreparacion`
--

INSERT INTO `ordenreparacion` (`id`, `idCliente`, `ns`, `marca`, `modelo`, `tipoEquipo`, `observaciones`, `accesorios`, `fechaEntrada`, `horaEntrada`, `fechaPrometida`, `tecnicoAsignado`, `estadoEquipo`) VALUES
(7, 3, 'prueba12345', 'iphone', 'sadas', '', 'El tilin y el ete sech', '', '2022-12-09', '16:19:00', '2022-12-10', 1, '1'),
(8, 4, '123456789', 'taza', 'de te', 'pa tomar cafe', 'no tiene oreja', '', '2023-03-14', '18:45:00', '2022-12-17', 4, '3'),
(9, 1, '8797asdq', 'xiami', 'chinchenchu', 'celular', 'es socialista', '', '2022-12-09', '19:28:00', '2022-12-24', 1, '1'),
(10, 1, '8797asdq', 'xiami', 'chinchenchu', 'celular', 'es socialista', '', '2022-12-09', '19:29:00', '2022-12-24', 1, '1'),
(11, 5, '256sa4d564a6sd', 'prueba1', 'acme123', 'bug', 'no deberia pasar', '', '2022-12-10', '17:51:00', '2022-12-24', 4, '1'),
(12, 5, '99999999', 'xin chong', 'wow ifon', 'wow ifon', 'aaaiiifon', 'wow', '2022-12-10', '18:08:00', '2022-12-31', 4, '1'),
(13, 1, '123456789', 'iphone', 'iphoneX', 'Celular', 'wwwwww', '', '2023-03-09', '16:55:00', '2023-03-15', 4, '1'),
(14, 1, '234567891', 'iphone', 'sadas', '', 'eeeeeeeeeeeeeeeeeee', '', '2023-03-09', '16:56:00', '2023-03-16', 15, '1'),
(15, 1, '345678912', 'sasad', 'iphoneX', '777', '123456', '', '2023-03-09', '16:57:00', '2023-03-20', 1, '1'),
(16, 1, '456789123', 'motorola', 'g6plus 2', 'pa tomar cafe', 'no hay', '', '2023-03-09', '16:58:00', '2023-03-31', 4, '1'),
(17, 1, 'ultimo111', 'hp ', 'hp123', 'compu', 'es negra\r\n', '', '2023-03-09', '16:59:00', '2023-03-26', 15, '1'),
(18, 12, '656118617446', 'ASUS', 'VIVEBOOK', '', 'No quiere cargar.', '', '2023-04-01', '17:55:00', '2023-04-12', 4, '1'),
(20, 12, '656118617446', 'ASUS', 'VIVEBOOK', '', 'No quiere cargar.', '', '2023-04-01', '17:55:00', '2023-04-12', 4, '1'),
(22, 13, '15648asd13913', 'Dell', 'Raisor', '', 'Se apaga de la nada.', '', '2023-04-01', '18:01:00', '2023-04-13', 15, '1'),
(23, 1, '156384894665', 'Dell', 'GamerX', '', 'Se calienta mucho.', '', '2023-04-01', '18:04:00', '2023-04-15', 15, '1'),
(24, 14, '1658463513sdaf1', 'Lenovo', 'Idea pad', '', 'No agarran las letras \"z,f,a,e\"', '', '2023-04-01', '18:05:00', '2023-04-16', 4, '1'),
(25, 15, 'plsvasef6531', 'Lenovo', 'GamerY', '', 'Parpadea la pantalla', '', '2023-04-01', '18:08:00', '2023-04-17', 4, '1'),
(26, 16, '993546581216', 'Dell', 'Xperion', '', 'Se reinicia.', '', '2023-04-01', '18:10:00', '2023-04-18', 4, '1'),
(27, 17, 'as5161f6a51s52', 'Asus', 'GamerX', '', 'Se mantiene presionada la tecla \"x\"', '', '2023-04-01', '18:12:00', '2023-04-19', 15, '1'),
(28, 17, 'as5161f6a51s52', 'Asus', 'GamerX', '', 'Se mantiene presionada la tecla \"x\"', '', '2023-04-01', '18:12:00', '2023-04-19', 15, '1');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `rfc`, `nombre`, `apellido`, `telefono`, `email`, `user`, `contrasenia`, `privilegio`) VALUES
(1, '', 'Jorge Prueba', 'Barraza Prueba', '6331128767', 'correo@gmail.com', 'JorgeB', '1234567', '1'),
(3, 'DVIE991123', 'dvosihov', 'nvosijdvq', '6221238987', 'baiuso9d@yopmail.com', 'Jorge2', 'DVSKBIVD', '3'),
(4, '', 'JUAN', 'PEREZ', '6331128767', 'gion340@gmail.com', 'JORGE', '1234567', '2'),
(15, '', 'julian', 'rod', '9999999999', 'juliantec@simonqlnv.com', 'juliantec', '1234567', '2');

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
  MODIFY `idClientes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `domicilio`
--
ALTER TABLE `domicilio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `ordenreparacion`
--
ALTER TABLE `ordenreparacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
