-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-04-2023 a las 08:20:24
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

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
  `apellidosC` varchar(50) NOT NULL,
  `nombreEmpresa` varchar(70) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `email` varchar(70) NOT NULL,
  `domicilio` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idClientes`, `rfc`, `nombreCliente`, `apellidosC`, `nombreEmpresa`, `telefono`, `email`, `domicilio`) VALUES
(1, 'oinsopvdinop', 'nombrePrueba', 'aPrueba', 'nombreEmpresa prueba', '13612347', 'correoPrueba', 'domicilioPrueba'),
(3, '', 'Alfonso Prueba', 'Martilero', '', '6898976879', 'hola@gmail.com', ''),
(4, '', 'biuoasc', 'iascobo', '', '8924217890', 'mati@gmail.com', ''),
(5, 'VECJ880326XXX', 'JUAN', 'PEREZ', 'COCA COLA', '6331128111', 'cocacola_alfonso@outlook.com', 'Calle siete #123 entre israel gonzales'),
(6, '', 'XXX', 'QQ', 'A', '1233444433', 'www@drtt.eee', ''),
(7, '', 'pancrasio', 'filomeno', 'afas', '6625086734', 'shakegonket@gmail.com', 'avslknlb'),
(8, '', 'Manito', 'Piesito', 'Miembros', '3251684923', 'l19330591@hermosillo.tecnm.mx', ''),
(9, '', 'Alo', 'Hostil', 'JAJAJA', '1687142694', 'das@gmail.com', ''),
(10, '', 'nocreo', 'hay ', 'falla', '2651165163', 'come@gmail.com', ''),
(11, '', 'paleta', 'del', 'limon', '3259741685', 'julio@hotmail.com', ''),
(12, '', 'faith', 'kiku', 'guggu', '3695218664', 'bubbles@gmail.com', ''),
(13, '', 'gregorio', 'jaker', 'hoppydoppty', '6653214976', 'olo@gmail.com', ''),
(14, 'KEGA991213EY7', 'Alejandro', 'Ketchul', 'Transformaciones metálicas', '6621355389', 'transme@hotmail.com', 'Yecora #458 Col. Carmen Serdan'),
(15, 'MANE201230EO3', 'Manuel ', 'Nágera', 'Gogas', '6634889145', 'gogas123@hotmail.com', 'Huasave #24 Col. La Ruina'),
(16, 'VICE210615EO3', 'Victor', 'Cowton', '', '6631496571', 'fnaf@hotmail.com', ''),
(17, 'KEVD980406EI6', 'Kevin', 'Dormamu', '', '6428836967', 'infinite@gmail.com', ''),
(18, 'LIKE970824HK0', 'Lorenzo', 'Epifanio', 'Tuercas Lokas', '6423122487', 'tuer_k@gmail.com', 'Niños Héroes #456'),
(19, '', 'Robero', 'Balboa ', '', '6627561317', 'rock_eando@hotmail.com', ''),
(20, '', 'José', 'Villa Lobos', '', '6428893164', 'lobo@gmail.com', ''),
(21, 'KIKO201129LP2', 'Kevin', 'Cabrera', '', '6698448713', 'kikin@hotmail.com', ''),
(22, '', 'Eduardo', 'García', '', '6642657912', 'chingchong@gmail.com', ''),
(23, '', 'Julio', 'Berne', '', '6642589667', 'libro@hotmail.com', ''),
(24, '', 'Humberto', 'Huerta', 'La Costeña', '6614879213', 'katsup@hotmail.com', ''),
(25, '', 'Leonardo', 'Castro', '', '6623156548', 'leo_123@hotmail.com', ''),
(26, '', 'Javier ', 'Valles ', '', '6642153326', 'valles_ja@hotmail.com', ''),
(27, 'QUEK231008EQ9', 'Ramon', 'Quesada', '', '6655329787', 'quesadilla@hotmail.com', ''),
(28, '', 'Ramón', 'Figueroa', '', '6431568796', 'figura@gmail.com', ''),
(29, '', 'Benito', 'Savala', '', '6647745413', 'benibeni@hotmail.com', ''),
(30, 'GEGE220513SC0', 'Eduardo', 'Gelacio', '', '6645213546', 'ganda_gela@hotmail.com', '');

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
(1, 1, 'REALIZAR MANTENIMIENTO A EQUIPOS', 'AQUI SE GUARDANM LAS OBSERVACIONES', '2022-02-12', 0, 250, '00:00:00', '00:00:00', 10),
(3, 3, '      aaaaaaaaaaaaaaaaaaa', '???????', '2022-12-31', 0, 0, '17:48:00', '00:00:00', 0),
(4, 6, '  segundo intento', '???', '2022-12-24', 0, 0, '17:56:00', '00:00:00', 0),
(6, 1, 'serompio alv', '', '2022-12-12', 0, 0, '20:05:00', '00:00:00', 0),
(7, 14, 'Servidores empolvados.', '', '2023-04-20', 0, 0, '18:15:00', '00:00:00', 0),
(8, 1, 'ta muy sucia la computadora', '', '2023-04-25', 0, 0, '17:57:00', '00:00:00', 0);

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
  `estadoEquipo` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ordenreparacion`
--

INSERT INTO `ordenreparacion` (`id`, `idCliente`, `ns`, `marca`, `modelo`, `tipoEquipo`, `observaciones`, `accesorios`, `fechaEntrada`, `horaEntrada`, `fechaPrometida`, `tecnicoAsignado`, `estadoEquipo`) VALUES
(7, 3, 'prueba12345', 'iphone', 'sadas', '', 'El tilin y el ete sech', '', '2023-04-19', '00:20:22', '2022-12-10', 1, '10'),
(8, 4, '123456789a', 'taza', 'de te', 'pa tomar cafe', 'no tiene oreja', '', '2023-03-14', '18:45:00', '2022-12-17', 4, '10'),
(9, 1, '8797asdq', 'xiami', 'chinchenchu', 'celular', 'es socialista malvado', '', '2023-04-21', '00:20:22', '2022-12-24', 1, '1'),
(10, 1, '8797asdq', 'xiami', 'chinchenchu', 'celular', 'es socialista', '', '2022-12-09', '19:29:00', '2022-12-24', 1, '10'),
(11, 5, '256sa4d564a6sd', 'prueba1', 'acme123', 'bug', 'prueba exitosa', '', '2022-12-10', '17:51:00', '2022-12-24', 4, '10'),
(12, 5, '99999999', 'xin chong', 'wow ifon', 'wow ifon', 'aaaiiifon', 'wow', '2022-12-10', '18:08:00', '2022-12-31', 4, '10'),
(13, 1, '123456789', 'iphone', 'iphoneX', 'Celular', 'wwwwwwwww', '', '2023-03-09', '16:55:00', '2023-03-15', 4, '10'),
(14, 1, '234567891', 'iphone', 'sadas', '', 'eeeeeeeeeeeeeeeeeee', '', '2023-03-09', '16:56:00', '2023-03-16', 15, '10'),
(15, 1, '345678912', 'sasad', 'iphoneX', '777', '123456por ti', '', '2023-03-09', '16:57:00', '2023-03-20', 1, '10'),
(16, 1, '456789123', 'motorola', 'g6plus 2', 'pa tomar cafe', 'no hay no existe', '', '2023-03-09', '16:58:00', '2023-03-31', 4, '10'),
(17, 1, 'ultimo111', 'hp ', 'hp123', 'compu', 'es negra\r\n', '', '2023-04-19', '00:20:23', '2023-03-26', 15, '10'),
(18, 12, '656118617446', 'ASUS', 'VIVEBOOK', '', 'No quiere cargar.', '', '2023-04-01', '17:55:00', '2023-04-12', 4, '10'),
(20, 12, '656118617446', 'ASUS', 'VIVEBOOK', '', 'No quiere cargar.', '', '2023-04-01', '17:55:00', '2023-04-12', 4, '4'),
(22, 13, '15648asd13913', 'Dell', 'Raisor', '', 'Se apaga de la nada.', '', '2023-04-01', '18:01:00', '2023-04-13', 15, '1'),
(23, 1, '156384894665', 'Dell', 'GamerX', '', 'Se calienta mucho.', '', '2023-04-01', '18:04:00', '2023-04-15', 15, '1'),
(24, 14, '1658463513sdaf1', 'Lenovo', 'Idea pad', '', 'No agarran las letras \"z,f,a,e\"', '', '2023-04-01', '18:05:00', '2023-04-16', 4, '1'),
(25, 15, 'plsvasef6531', 'Lenovo', 'GamerY', '', 'Parpadea la pantalla', '', '2023-04-01', '18:08:00', '2023-04-17', 4, '1'),
(26, 16, '993546581216', 'Dell', 'Xperion', '', 'Se reinicia.', '', '2023-04-19', '00:20:23', '2023-04-18', 4, '1'),
(27, 17, 'as5161f6a51s52', 'Asus', 'GamerX', '', 'Se mantiene presionada la tecla \"x\"', '', '2023-04-01', '18:12:00', '2023-04-19', 15, '1'),
(28, 17, 'as5161f6a51s52', 'Asus', 'GamerX', '', 'cambiado', '', '2023-04-19', '20:24:00', '2023-04-19', 15, '1'),
(29, 8, '12311aaaaaa24', 'iphone', 'g6plus 2', 'celular', 'no prende', 'webos', '2023-04-10', '20:08:00', '2023-04-17', 15, '1'),
(30, 1, '123456789', 'iphone', 'sadas', '', 'no prende', '', '2023-04-21', '17:24:00', '2023-04-29', 4, '1'),
(31, 3, '234567891', 'sasad', 'iphoneX', 'Celular', 'no sirve', 'funda rosa', '2023-04-21', '17:25:00', '2023-04-30', 15, '1'),
(32, 14, '345678912', 'nissan', 'motog5', 'celular', 'no carga', 'cargador', '2023-04-21', '16:16:59', '2023-04-27', 1, '1'),
(33, 9, '456789123', 'xiaomi', 'redmi11', 'celular', 'esta en chino', '', '2023-04-21', '17:37:00', '2023-05-01', 1, '1'),
(34, 7, '567891234', 'Nokia', 'r2d2', 'celular', 'no le funciona la camara', '', '2023-04-21', '17:39:00', '2023-05-01', 4, '1'),
(35, 18, '123456789a', 'dell', 'd22sp', 'computadora', 'el disco se traba', '', '2023-04-21', '17:40:00', '2023-05-02', 15, '1'),
(36, 22, '234567891a', 'Logitec', 'g203', 'mouse', 'tiene falso contacto', '', '2023-04-21', '17:44:00', '2023-04-28', 1, '1'),
(37, 1, '345678912a', 'corsair', 'corsairgamer9000', 'headset', 'no detecta el audio', '', '2023-04-21', '17:46:00', '2023-05-05', 4, '1'),
(38, 14, '567891234a', 'logitec', 'g213', 'teclado', 'no agarran todas las teclas', '', '2023-04-21', '17:48:00', '2023-05-06', 4, '1'),
(39, 29, 'ojosdepez', 'sinmarca', 'notiene', 'computadora', 'no arranca el sistema operativo', '', '2023-04-21', '17:54:00', '2023-05-10', 15, '1');

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
(4, '', 'JUAN', 'PEREZ', '6331128767', 'gion340@gmail.com', 'JORGE', '1234567', '2'),
(15, '', 'julian', 'rod', '9999999999', 'juliantec@simonqlnv.com', 'juliantec', '1234567', '2'),
(16, 'AAAAA', 'aaa', 'din dan', '6622335577', 'aaa@coao.com', 'jorgebdos', '1234567', '3');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `ordenreparacion`
--
ALTER TABLE `ordenreparacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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