SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE IF NOT EXISTS prosyscontrol;

USE prosyscontrol;

DROP TABLE IF EXISTS catalogo;

CREATE TABLE `catalogo` (
  `idProducto` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precioCompra` float(10,2) NOT NULL,
  `precioVenta` float(10,2) NOT NULL,
  `iva` int(11) NOT NULL,
  PRIMARY KEY (`idProducto`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

INSERT INTO catalogo VALUES("2","pasta termica coolmaster","coolmaster","pasta1","50","120.00","200.00","16");
INSERT INTO catalogo VALUES("3","cable ethernet 5m","cisco","c001","100","150.00","320.00","16");
INSERT INTO catalogo VALUES("5","Aire comprimido chico","","","15","100.00","180.00","16");
INSERT INTO catalogo VALUES("6","Memoria USB 32 GB KINGSTON","Kingston","USB0001","80","68.00","180.00","16");
INSERT INTO catalogo VALUES("7","WERWEREW","ERWREWRWE","SRFWERWRFW","999","100.00","89.00","8");
INSERT INTO catalogo VALUES("8","MULTICONTATO DE 6 ENTRADAS","SMARBIT","","10","220.00","2.00","0");
INSERT INTO catalogo VALUES("9","MULTICONTATO DE 12 ENTRADAS","STEREN","AE3","16","349.90","579.84","16");



DROP TABLE IF EXISTS clientes;

CREATE TABLE `clientes` (
  `idClientes` int(11) NOT NULL AUTO_INCREMENT,
  `rfc` varchar(20) NOT NULL,
  `nombreCliente` varchar(50) NOT NULL,
  `apellidosC` varchar(50) NOT NULL,
  `nombreEmpresa` varchar(70) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `email` varchar(70) NOT NULL,
  `domicilio` varchar(150) NOT NULL,
  PRIMARY KEY (`idClientes`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;

INSERT INTO clientes VALUES("1","oinsopvdinop","nombrePrueba","aPrueba","nombreEmpresa prueba","13612347","correoPrueba","domicilioPrueba");
INSERT INTO clientes VALUES("3","","Alfonso Prueba","Martilero","","6898976879","hola@gmail.com","");
INSERT INTO clientes VALUES("4","","biuoasc","iascobo","","8924217890","mati@gmail.com","");
INSERT INTO clientes VALUES("5","VECJ880326XXX","JUAN","PEREZ","COCA COLA","6331128111","cocacola_alfonso@outlook.com","Calle siete #123 entre israel gonzales");
INSERT INTO clientes VALUES("6","","XXX","QQ","A","1233444433","www@drtt.eee","");
INSERT INTO clientes VALUES("7","","pancrasio","filomeno","afas","6625086734","shakegonket@gmail.com","avslknlb");
INSERT INTO clientes VALUES("8","","Manito","Piesito","Miembros","3251684923","l19330591@hermosillo.tecnm.mx","");
INSERT INTO clientes VALUES("9","","Alo","Hostil","JAJAJA","1687142694","das@gmail.com","");
INSERT INTO clientes VALUES("10","","nocreo","hay ","falla","2651165163","come@gmail.com","");
INSERT INTO clientes VALUES("11","","paleta","del","limon","3259741685","julio@hotmail.com","");
INSERT INTO clientes VALUES("12","","faith","kiku","guggu","3695218664","bubbles@gmail.com","");
INSERT INTO clientes VALUES("13","","gregorio","jaker","hoppydoppty","6653214976","olo@gmail.com","");
INSERT INTO clientes VALUES("14","KEGA991213EY7","Alejandro","Ketchul","Transformaciones metálicas","6621355389","transme@hotmail.com","Yecora #458 Col. Carmen Serdan");
INSERT INTO clientes VALUES("15","MANE201230EO3","Manuel ","Nágera","Gogas","6634889145","gogas123@hotmail.com","Huasave #24 Col. La Ruina");
INSERT INTO clientes VALUES("16","VICE210615EO3","Victor","Cowton","","6631496571","fnaf@hotmail.com","");
INSERT INTO clientes VALUES("17","KEVD980406EI6","Kevin","Dormamu","","6428836967","infinite@gmail.com","");
INSERT INTO clientes VALUES("18","LIKE970824HK0","Lorenzo","Epifanio","Tuercas Lokas","6423122487","tuer_k@gmail.com","Niños Héroes #456");
INSERT INTO clientes VALUES("19","","Robero","Balboa ","","6627561317","rock_eando@hotmail.com","");
INSERT INTO clientes VALUES("20","","José","Villa Lobos","","6428893164","lobo@gmail.com","");
INSERT INTO clientes VALUES("21","KIKO201129LP2","Kevin","Cabrera","","6698448713","kikin@hotmail.com","");
INSERT INTO clientes VALUES("22","","Eduardo","García","","6642657912","chingchong@gmail.com","");
INSERT INTO clientes VALUES("23","","Julio","Berne","","6642589667","libro@hotmail.com","");
INSERT INTO clientes VALUES("24","","Humberto","Huerta","La Costeña","6614879213","katsup@hotmail.com","");
INSERT INTO clientes VALUES("25","","Leonardo","Castro","","6623156548","leo_123@hotmail.com","");
INSERT INTO clientes VALUES("26","","Javier ","Valles ","","6642153326","valles_ja@hotmail.com","");
INSERT INTO clientes VALUES("27","QUEK231008EQ9","Ramon","Quesada","","6655329787","quesadilla@hotmail.com","");
INSERT INTO clientes VALUES("28","","Ramón","Figueroa","","6431568796","figura@gmail.com","");
INSERT INTO clientes VALUES("29","","Benito","Savala","","6647745413","benibeni@hotmail.com","");
INSERT INTO clientes VALUES("30","GEGE220513SC0","Eduardo","Gelacio","","6645213546","ganda_gela@hotmail.com","");
INSERT INTO clientes VALUES("31","","MIZAEL","LOPEZ","","4566218594","mizawars@gmail.c","LAZARO CARDENAS#");
INSERT INTO clientes VALUES("32","","JUAN LUIS","GRIJALVA","","6232323232","juan.luis19@hotmail.com","AV.BACHOCO#19");
INSERT INTO clientes VALUES("33","","GUADALUPE","RODRIGUEZ","","6698899899","luperodaranda@gmail.com","");
INSERT INTO clientes VALUES("34","","PEDRO","RODRIGUEZ CASTILLO","","6698899899","luperodaranda@gmail.com","");



DROP TABLE IF EXISTS domicilio;

CREATE TABLE `domicilio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_Cliente` int(11) NOT NULL,
  `problematica` varchar(200) NOT NULL,
  `observaciones` varchar(200) NOT NULL,
  `fechaProgramada` date NOT NULL,
  `presupuesto` float NOT NULL,
  `costoTotal` float NOT NULL,
  `horaInicio` time NOT NULL,
  `horaFinal` time NOT NULL,
  `horasRealizadas` int(11) NOT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `cobrado` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

INSERT INTO domicilio VALUES("6","1","las computadoras ya no encienden después de un corto circuito","aun no pruebaaa","2022-12-12","100","0","00:00:00","00:00:00","0","Sin editar","No");
INSERT INTO domicilio VALUES("7","14","  Servidores empolvados.","nada","2023-04-20","0","0","18:15:00","00:00:00","6","Sin editar","No");
INSERT INTO domicilio VALUES("8","32","  ta muy sucia la computadora","sin cliente","2023-04-25","0","0","17:57:00","00:00:00","6","Sin editar","No");
INSERT INTO domicilio VALUES("9","31","hay que crear subredes para nuevos equipos telefonicos","se recorrio fechas","2023-05-12","0","0","15:45:00","00:00:00","8","Sin editar","No");
INSERT INTO domicilio VALUES("10","8","necesita cambiar el cableado de la red","","2023-05-20","0","0","19:08:00","00:00:00","0","Sin editar","No");
INSERT INTO domicilio VALUES("11","34","se ocupa dar mantenimiento a los equipos de computo","","2023-05-20","0","0","19:33:00","00:00:00","0","Finalizado","No");
INSERT INTO domicilio VALUES("13","34","se ocupa dar mantenimiento a los equipos de computo23","","2023-05-20","0","0","19:39:00","00:00:00","0","Sin editar","Si");
INSERT INTO domicilio VALUES("15","34","se ocupa dar mantenimiento a los equipos de computo44445","ahi digale pa","2023-05-06","0","0","00:00:00","00:00:00","0","Finalizado","Si");
INSERT INTO domicilio VALUES("16","1","prueba después de borrar","tamoviendo alerta","2023-05-22","0","0","00:00:00","00:00:00","0","Atendiendo","No");



DROP TABLE IF EXISTS ordenreparacion;

CREATE TABLE `ordenreparacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `estadoEquipo` varchar(2) NOT NULL,
  `cobrado` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idCliente` (`idCliente`),
  KEY `tecnicoAsignado` (`tecnicoAsignado`),
  CONSTRAINT `ordenreparacion_ibfk_1` FOREIGN KEY (`tecnicoAsignado`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ordenreparacion_ibfk_2` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`idClientes`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4;

INSERT INTO ordenreparacion VALUES("7","3","prueba12345","iphone","sadas","","El tilin y el ete sech","","2023-04-19","00:20:22","2022-12-10","1","10","Si");
INSERT INTO ordenreparacion VALUES("8","4","123456789a","taza","de te","pa tomar cafe","no tiene oreja","","2023-03-14","18:45:00","2022-12-17","4","10","Si");
INSERT INTO ordenreparacion VALUES("10","1","8797asdq","xiami","chinchenchu","celular","es socialista","","2022-12-09","19:29:00","2022-12-24","1","10","Si");
INSERT INTO ordenreparacion VALUES("11","5","256sa4d564a6sd","prueba1","acme123","bug","prueba exitosa","","2022-12-10","17:51:00","2022-12-24","4","10","Si");
INSERT INTO ordenreparacion VALUES("12","5","99999999","xin chong","wow ifon","wow ifon","aaaiiifon","wow","2022-12-10","18:08:00","2022-12-31","4","10","Si");
INSERT INTO ordenreparacion VALUES("13","1","123456789","iphone","iphoneX","Celular","wwwwwwwww","","2023-03-09","16:55:00","2023-03-15","4","10","Si");
INSERT INTO ordenreparacion VALUES("14","1","234567891","iphone","sadas","","eeeeeeeeeeeeeeeeeee","","2023-03-09","16:56:00","2023-03-16","15","10","Si");
INSERT INTO ordenreparacion VALUES("15","1","345678912","sasad","iphoneX","777","123456por ti","","2023-03-09","16:57:00","2023-03-20","1","10","Si");
INSERT INTO ordenreparacion VALUES("16","1","456789123","motorola","g6plus 2","pa tomar cafe","no hay no existe","","2023-03-09","16:58:00","2023-03-31","4","10","Si");
INSERT INTO ordenreparacion VALUES("17","1","ultimo111","hp ","hp123","compu","es negra\n","","2023-04-19","00:20:23","2023-03-26","15","10","Si");
INSERT INTO ordenreparacion VALUES("18","12","656118617446","ASUS","VIVEBOOK","","No quiere cargar.","","2023-04-01","17:55:00","2023-04-12","4","10","Si");
INSERT INTO ordenreparacion VALUES("20","12","656118617446","ASUS","VIVEBOOK","","No quiere cargar.","","2023-04-01","17:55:00","2023-04-12","4","4","Si");
INSERT INTO ordenreparacion VALUES("22","13","15648asd13913","Dell","Raisor","","Se apaga de la nada.","","2023-04-01","18:01:00","2023-04-13","15","1","Si");
INSERT INTO ordenreparacion VALUES("23","1","156384894665","Dell","GamerX","","Se calienta mucho.","","2023-04-01","18:04:00","2023-04-15","15","1","No");
INSERT INTO ordenreparacion VALUES("24","14","1658463513sdaf1","Lenovo","Idea pad","","No agarran las letras \"z,f,a,e\"","","2023-04-01","18:05:00","2023-04-16","4","1","No");
INSERT INTO ordenreparacion VALUES("25","15","plsvasef6531","Lenovo","GamerY","","Parpadea la pantalla","","2023-04-01","18:08:00","2023-04-17","4","1","No");
INSERT INTO ordenreparacion VALUES("26","16","993546581216","Dell","Xperion","","Se reinicia.","","2023-04-19","00:20:23","2023-04-18","4","1","No");
INSERT INTO ordenreparacion VALUES("27","17","as5161f6a51s52","Asus","GamerX","","Se mantiene presionada la tecla \"x\"","","2023-04-01","18:12:00","2023-04-19","15","1","No");
INSERT INTO ordenreparacion VALUES("28","17","as5161f6a51s52","Asus","GamerX","","cambiado","","2023-04-19","20:24:00","2023-04-19","15","1","No");
INSERT INTO ordenreparacion VALUES("29","8","12311aaaaaa24","iphone","g6plus 2","celular","no prende","","2023-04-10","20:08:00","2023-04-17","15","1","No");
INSERT INTO ordenreparacion VALUES("30","1","123456789","iphone","sadas","","no prende","","2023-04-21","17:24:00","2023-04-29","4","1","Si");
INSERT INTO ordenreparacion VALUES("31","3","234567891","sasad","iphoneX","Celular","no sirve","funda rosa","2023-04-21","17:25:00","2023-04-30","15","1","No");
INSERT INTO ordenreparacion VALUES("32","14","345678912","nissan","motog5","celular","no carga","CARGADOR","2023-04-21","16:16:59","2023-04-27","1","1","Si");
INSERT INTO ordenreparacion VALUES("33","9","456789123","xiaomi","redmi11","celular","esta en chino","","2023-04-21","17:37:00","2023-05-01","1","1","No");
INSERT INTO ordenreparacion VALUES("34","7","567891234","Nokia","r2d2","celular","no le funciona la camara","","2023-04-21","17:39:00","2023-05-01","4","1","No");
INSERT INTO ordenreparacion VALUES("35","18","123456789a","dell","d22sp","computadora","el disco se traba","","2023-04-21","17:40:00","2023-05-02","15","1","No");
INSERT INTO ordenreparacion VALUES("36","22","234567891a","Logitec","g203","mouse","tiene falso contacto","","2023-04-21","17:44:00","2023-04-28","1","1","No");
INSERT INTO ordenreparacion VALUES("37","1","345678912a","corsair","corsairgamer9000","headset","no detecta el audio","","2023-04-21","17:46:00","2023-05-05","4","1","No");
INSERT INTO ordenreparacion VALUES("38","14","567891234a","logitec","g213","teclado","no agarran todas las teclas","","2023-04-21","17:48:00","2023-05-06","4","1","No");
INSERT INTO ordenreparacion VALUES("39","29","ojosdepez","sinmarca","notiene","computadora","no arranca el sistema operativo","","2023-04-21","17:54:00","2023-05-10","15","1","No");
INSERT INTO ordenreparacion VALUES("40","4","987654321","MAC","MAC2022","LAPTOP","SE TRABA","CARGADOR","2023-04-24","17:35:00","2023-05-06","15","1","No");
INSERT INTO ordenreparacion VALUES("41","30","987654320","MAC","MAC2022","LAPTOP","NO ENCIENDE","CARGADOR Y MOUSE","2023-04-24","18:10:00","2023-05-10","4","1","No");
INSERT INTO ordenreparacion VALUES("42","1","ANANIN","619CUATROCIENTOSVEIN","ELMASNUEVO2024","IMPRESORA","LAS HOJAS SALEN COMPLETAMENTE NEGRAS","HOJAS PARA IMPRIMIR","2023-04-28","16:44:00","2023-05-08","4","1","No");
INSERT INTO ordenreparacion VALUES("43","30","LPHP555","HP","HP111111","COMPUTADORA DE ESCRITORIO","LOS PUERTOS USB NO DETECTAN NADA","MOOUSE Y TECLADO","2023-04-30","15:11:00","2023-05-08","1","1","No");
INSERT INTO ordenreparacion VALUES("45","3","GX9000","TPLINK","MRI460","MODEM","LA RED ESTA MUY MUY LENTA","","2023-04-30","15:21:00","2023-05-20","4","3","No");
INSERT INTO ordenreparacion VALUES("46","31","PRUEBAERROR","IPHONE","SIIIIIIIIIIII","","NO SE ES DE CALE","","2023-04-30","20:34:00","2023-05-20","4","1","No");
INSERT INTO ordenreparacion VALUES("48","34","NA6677","NA","NA","NA","NO HAY NO EXISTEA","","2023-05-06","22:19:00","2023-05-20","4","10","No");



DROP TABLE IF EXISTS usuario;

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rfc` varchar(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `email` varchar(70) NOT NULL,
  `user` varchar(35) NOT NULL,
  `contrasenia` varchar(70) NOT NULL,
  `privilegio` varchar(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;

INSERT INTO usuario VALUES("1","","Jorge Prueba","Barraza Prueba","6331128767","correo@gmail.com","JorgeB","$2y$10$qbt5ARZI9we1WTZ4LIISh.uEfVgROVTemq6FQNXFXe98ZfemsjXrC","1");
INSERT INTO usuario VALUES("3","QUMA470929F37","dvosihov","nvosijdvq","6221238987","baiuso9d@yopmail.com","Jorge2","$2y$10$koAiNwfKsZJL.DhG1k08ietFCMZoYssHXHAVTysLMYd2awAxmviby","3");
INSERT INTO usuario VALUES("4","","JUAN","PEREZ","6331128767","gion340@gmail.com","JORGE","$2y$10$/3sCS/z85aqCj35s7GGE.OoBWTjnEUtey1bcwsq8Fn89RlBMcEv/S","2");
INSERT INTO usuario VALUES("15","ROEJ0009291P3","julian","rod","9999999999","juliantec@simonqlnv.com","juliantec","$2y$10$v8rvfEoUqJG/D66q2WL4FehMFjiqCVJjVzGJLEKiFSxKnFu9ZuyRm","2");
INSERT INTO usuario VALUES("16","","aaa","din dan","6622335577","aaa@coao.com","jorgebdos","$2y$10$JWmhPgUQADQphtcljephsOH8jXPj3oJDQC3y9JVlWMrDY1mpFhgTS","3");
INSERT INTO usuario VALUES("18","","WILSON","ROY CHUY","1611239485","nomandar@gmail.com","hacker404","$2y$10$UdwcAKeZKUpoRezDe/38w.pcUj.lnRTsD9mGfm6xEVJMFaM3mqC1S","1");
INSERT INTO usuario VALUES("20","","PRU","PRU","6666666666","ppppp@ppp.pp","PRUEBA","$2y$10$L16gGkrsL9wqVK5Ba0llaORNygzIQ6MjK0M6FfxFeQC0TYYKgZBTq","1");
INSERT INTO usuario VALUES("21","","PRUEBADOS","LI","2222222227","doscinco@hermosillo.tecnm.mx","PRUEBADOS","$2y$10$ostDrg17L3HW1VDgNYJyB.rooQ5kiBHgEdEom9UFUAGqdRF7uYwqG","1");
INSERT INTO usuario VALUES("22","","NUEVO","LIMPIO","7777777777","newold@outlook.com","NUEVO","$2y$10$z46E25x7CDPxd9UJCghqBO9.NuygPaHSnWykIzbg2fkfYaL2d9nfq","2");
INSERT INTO usuario VALUES("23","","BORRARE","BPRRAR","5646546546","asdasasd@ghmai.com","AAAAAAAAAAAAAAA","$2y$10$FCQN3Zu//PDr3olcOB.4E.Glft7b2joYEtYpCqvHOAWtK0SojYkhS","2");
INSERT INTO usuario VALUES("24","","BORRARTRESA","BPRRAR","5646546546","asdasasd@ghmai.com","AAAAAAAAAAAAAAA","$2y$10$Ln4.jTYgSd3oZsM6W16kOudCCoqXpy1dmdHKEadLuT/W4zrZur5vO","2");



SET FOREIGN_KEY_CHECKS=1;