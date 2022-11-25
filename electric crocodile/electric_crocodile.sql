-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-11-2022 a las 04:19:13
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
-- Base de datos: `electric crocodile`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carro_compras`
--

CREATE TABLE `carro_compras` (
  `carro_id` int(6) NOT NULL,
  `producto_id` int(6) NOT NULL,
  `cliente_curp` varchar(18) NOT NULL,
  `cantidad_comprada` int(11) NOT NULL,
  `sub_total` float NOT NULL,
  `ref_carro` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carro_compras`
--

INSERT INTO `carro_compras` (`carro_id`, `producto_id`, `cliente_curp`, `cantidad_comprada`, `sub_total`, `ref_carro`) VALUES
(2, 231456, 'VIVA040205MGTLLSA3', 10, 12000, 'ET1234RF'),
(7, 123456, 'BACY900618MQRSLZ01', 1, 100, 'GHTYVB76'),
(8, 231456, 'BACY900618MQRSLZ01', 2, 200, 'GHTYVB76'),
(296, 873143, 'MUMR040217HGTXNCA2', 5, 170, '4EC9F32B'),
(297, 231456, 'MUMR040217HGTXNCA2', 1, 1200, '4EC9F32B'),
(298, 123456, 'MUMR040217HGTXNCA2', 9, 2701.08, '9423A771'),
(299, 231456, 'MUMR040217HGTXNCA2', 234, 280800, '9423A771'),
(300, 435890, 'MUMR040217HGTXNCA2', 2, 7600, '3E98E13D'),
(302, 123456, 'BACY900618MQRSLZ01', 2, 600.24, '496B88BD'),
(303, 231456, 'BACY900618MQRSLZ01', 34, 40800, '496B88BD'),
(305, 665578, 'BACY900618MQRSLZ01', 12, 3996, 'E8573B3A'),
(306, 123456, 'BACY900618MQRSLZ01', 2, 600.24, '276F8F99'),
(307, 248256, 'BACY900618MQRSLZ01', 2, 1800, 'FB5178C4'),
(308, 231456, 'BACY900618MQRSLZ01', 5, 6000, '750FE652'),
(309, 123456, 'BACY900618MQRSLZ01', 2, 600.24, '8B3DD5E1'),
(310, 873143, 'BACY900618MQRSLZ01', 2, 68, '064DC9AF'),
(311, 123456, 'BACY900618MQRSLZ01', 2, 600.24, 'B1C2E112'),
(312, 231456, 'BACY900618MQRSLZ01', 1, 1200, 'B1C2E112'),
(313, 873143, 'MUMR040217HGTXNCA2', 2, 68, '1B37E1DE'),
(314, 665578, 'MUMR040217HGTXNCA2', 2, 666, '1B37E1DE'),
(315, 248256, 'BOVK011127MQRJLRA0', 2, 1800, 'A1009677'),
(316, 665578, 'BOVK011127MQRJLRA0', 1, 333, 'A1009677'),
(317, 123456, 'BOVK011127MQRJLRA0', 5, 1500.6, 'B76290C0'),
(318, 248256, 'BOVK011127MQRJLRA0', 3, 2700, 'B76290C0'),
(323, 873143, 'MONTOYAMADUROANGEL', 2, 68, '11238A1C'),
(324, 123456, 'MONTOYAMADUROANGEL', 2, 600.24, 'D9A6A9EE'),
(325, 123456, 'MUMR040217HGTXNCA2', 2, 600.24, 'BD9CADF0'),
(326, 231456, 'MUMR040217HGTXNCA2', 3, 3600, 'AD2504BD'),
(329, 114213, 'KPAT170301HGTNCA17', 10, 60000, '5A83AC43'),
(330, 891010, 'KPAT170301HGTNCA17', 2, 18000, '5A83AC43'),
(334, 248256, 'KPAT170301HGTNCA17', 2, 1800, 'D6D51D43'),
(338, 114213, 'KUBB991001MQRMSN00', 3, 18000, '86FE2B23'),
(339, 958659, 'KUBB991001MQRMSN00', 3, 3300, '86FE2B23'),
(340, 505050, 'KUBB991001MQRMSN00', 1, 5000, '86FE2B23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(2) NOT NULL,
  `nombre_categoria` varchar(80) NOT NULL,
  `descripcion_categoria` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre_categoria`, `descripcion_categoria`) VALUES
(9, 'Monitores', 'Monitores de gamer que son para experimentar lo que es ser un gamer.'),
(11, 'CABLES', 'Aqui encuentras todo lo relacionado a cables'),
(12, 'APPLE', 'DIspositivos de apple.'),
(32, 'ACCESORIOS', 'accesorios para pc'),
(55, 'SONIDO', 'Equipo de sonido para ofrecerte la mejor experiencia auditiva.'),
(65, 'CELULARES', 'Celulares,smartphones donde tu categorizas dispositivos moviles.'),
(77, 'MUEBLES GAMER', 'Muebles Gamer para tu espalda'),
(81, 'ALMACENAMIENTO', 'Almacenamiento y componentes que permiten ampliar la capacidad de almacenenamiento de los dispositivos'),
(88, 'PC', 'COMPUTADORAS DE ESCRITORIO Y LAPTOP, LAS MEJORES PARA TI.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `curp` varchar(18) NOT NULL,
  `nombre_cliente` varchar(20) NOT NULL,
  `usuario` varchar(8) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `direccion` varchar(60) NOT NULL,
  `ciudad` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`curp`, `nombre_cliente`, `usuario`, `telefono`, `direccion`, `ciudad`) VALUES
('BACY900618MQRSLZ01', 'PERENGANE', 'PAS785LT', '55437452361', 'VILLA REAL #324', 'SILAO'),
('BOVK011127MQRJLRA0', 'BOJORQUE', 'JORGE878', '5552575693', 'LAS HILAMAS #998', 'LEON'),
('COCM990909HQRLNR00', 'MARCO', 'MARALD81', '4571245786', 'VILLA DE LAS TORRES #54', 'LEON'),
('GABI010427HTSRTRA2', 'IRVING', 'grir65t9', '4575896321', 'santa rosa #54', 'romita'),
('KPAT170301HGTNCA17', 'paty', 'PATYCH18', '4771221365', 'la alameda #305', 'leon'),
('KUBB991001MQRMSN00', 'kumul', 'kum98lju', '4448135965', 'punta del este #32', 'LEON'),
('LOHC001205MQRPRTA1', 'CITLALY VACA', 'CI5L4LY8', '6980192934', 'CARRETERA CUERAMARO GTO #029', 'LEON'),
('MAAZ980417MQRNLY00', 'alvaro', 'alvmaz98', '6696352846', 'carretera campeche #22', 'campeche'),
('MONTOYAMADUROANGEL', 'ANGEL MONTOYA', 'MONTAP18', '4776086769', 'CALLE POTASIO #654', 'MONTECRISTOO'),
('MUMR040217HGTXNCA2', 'Ricardo', 'RGPRO175', '4772400331', 'LA ALAMEDA #305', 'LEON'),
('VIVA040205MGTLLSA3', 'ABIGAIL', 'ABIASY05', '4776806287', 'PERA REAL #304', 'LEON');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `control_pedido`
--

CREATE TABLE `control_pedido` (
  `clave_pedido` int(11) NOT NULL,
  `id_carro` int(6) NOT NULL,
  `fecha_pedido` date NOT NULL,
  `curp_cliente` varchar(18) NOT NULL,
  `monto_final` float NOT NULL,
  `num_tarjeta` varchar(16) NOT NULL COMMENT 'numero de tarjeta para procesar pago'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `control_pedido`
--

INSERT INTO `control_pedido` (`clave_pedido`, `id_carro`, `fecha_pedido`, `curp_cliente`, `monto_final`, `num_tarjeta`) VALUES
(2, 2, '2022-11-09', 'VIVA040205MGTLLSA3', 1, ''),
(27, 296, '2022-11-09', 'MUMR040217HGTXNCA2', 1370, '6767676767676767'),
(28, 297, '2022-11-09', 'MUMR040217HGTXNCA2', 1370, '6767676767676767'),
(29, 298, '2022-11-09', 'MUMR040217HGTXNCA2', 283501, '6767676767676767'),
(30, 299, '2022-11-09', 'MUMR040217HGTXNCA2', 283501, '6767676767676767'),
(31, 300, '2022-11-09', 'MUMR040217HGTXNCA2', 7600, '6767676767676767'),
(32, 300, '2022-11-09', 'MUMR040217HGTXNCA2', 7600, '6767676767676767'),
(36, 302, '2022-11-09', 'BACY900618MQRSLZ01', 41400.2, '4412232323987687'),
(37, 303, '2022-11-09', 'BACY900618MQRSLZ01', 41400.2, '4412232323987687'),
(41, 305, '2022-11-09', 'BACY900618MQRSLZ01', 5472, '4412232323987687'),
(43, 305, '2022-11-09', 'BACY900618MQRSLZ01', 5472, '4412232323987687'),
(44, 307, '2022-11-09', 'BACY900618MQRSLZ01', 1800, '4412232323987687'),
(45, 307, '2022-11-09', 'BACY900618MQRSLZ01', 1800, '4412232323987687'),
(46, 308, '2022-11-09', 'BACY900618MQRSLZ01', 6000, '4412232323987687'),
(47, 308, '2022-11-09', 'BACY900618MQRSLZ01', 6000, '4412232323987687'),
(48, 309, '2022-11-09', 'BACY900618MQRSLZ01', 600.24, '4412232323987687'),
(49, 310, '2022-11-09', 'BACY900618MQRSLZ01', 68, '4412232323987687'),
(52, 313, '2022-11-09', 'MUMR040217HGTXNCA2', 734, '6767676767676767'),
(53, 314, '2022-11-09', 'MUMR040217HGTXNCA2', 734, '6767676767676767'),
(54, 315, '2022-11-09', 'BOVK011127MQRJLRA0', 2133, '4444444444444444'),
(55, 316, '2022-11-09', 'BOVK011127MQRJLRA0', 2133, '4444444444444444'),
(56, 317, '2022-11-09', 'BOVK011127MQRJLRA0', 4200.6, '4444444444444444'),
(57, 318, '2022-11-09', 'BOVK011127MQRJLRA0', 4200.6, '4444444444444444'),
(61, 323, '2022-11-17', 'MONTOYAMADUROANGEL', 68, '4444444444444444'),
(62, 324, '2022-11-18', 'MONTOYAMADUROANGEL', 600.24, '4444444444444444'),
(64, 329, '2022-11-17', 'KPAT170301HGTNCA17', 78000, '8789939309098989'),
(65, 330, '2022-11-17', 'KPAT170301HGTNCA17', 78000, '8789939309098989'),
(66, 338, '2022-11-18', 'KUBB991001MQRMSN00', 26300, '8792109283834545'),
(67, 339, '2022-11-18', 'KUBB991001MQRMSN00', 26300, '8792109283834545'),
(68, 340, '2022-11-18', 'KUBB991001MQRMSN00', 26300, '8792109283834545');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(6) NOT NULL,
  `nombre_producto` varchar(60) NOT NULL,
  `descripcion_producto` varchar(100) NOT NULL,
  `cantidad_importada` mediumint(9) NOT NULL COMMENT 'cantidad importada del producto',
  `img_url` varchar(255) NOT NULL COMMENT 'atribuito de imagenes',
  `precio_producto` float NOT NULL,
  `categoria_id` int(2) NOT NULL,
  `marca_clave` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre_producto`, `descripcion_producto`, `cantidad_importada`, `img_url`, `precio_producto`, `categoria_id`, `marca_clave`) VALUES
(114213, 'IPHONE X', 'Iphone x compaï¿½ia ATIT liberado con 256 GB de almacenamiento y 400GB de Icloud', 550, 'https://www.freeiconspng.com/thumbs/iphone-x-pictures/apple-iphone-x-pictures-5.png', 6000, 65, 'APPLE45MX1'),
(123456, 'mouse gamer', 'Mouse gamer profesional g502 de logitech', 50, 'https://resource.logitechg.com/d_transparent.gif/content/dam/gaming/en/non-braid/hyjal-g502-hero/g502-hero-gallery-1-nb.png', 300.12, 32, 'LGCOMP1287'),
(231456, 'MACBOOK AIR PRO', 'Macbook air pro de 256gb de almacenamiento intero', 3400, 'https://www.apple.com/v/macbook-pro-13/m/images/overview/compare/compare_mbp_13__givmvd62t5ua_large_2x.png', 1200, 12, 'APPLE45MX1'),
(248256, 'RAZER KRAKEN AUDIFONOS', 'Audifonos con iluminacion RGB USB con Sonido Surround y Microfono ANC', 500, 'https://d3ugyf2ht6aenh.cloudfront.net/stores/001/568/276/products/kraken_ultimate1-73f44872433a165e9016544810852011-1024-1024.png', 900, 55, 'RAZER65MX1'),
(435890, 'Laptop Generica', 'Lapot pro de 13gb de ram y 1tb de almacenamiento interno', 200, 'https://www.pngall.com/wp-content/uploads/2016/05/Laptop-Free-Download-PNG.png', 3800, 88, 'LGCOMP1287'),
(505050, 'SILLA GAMER RAZER', 'Silla gamer con 4 formas de ajustarla para disfrutar de tu experiencia gaming', 2010, 'https://vevi-lineaitalia.com/wp-content/uploads/2021/12/SILLA-GAMER-X-VERDE.png', 5000, 77, 'RAZER65MX1'),
(665578, 'PC GAMER', 'Pc gamer con procesador pentium gold', 120, 'https://i.postimg.cc/3r11B0dY/ed.webp', 333, 88, 'HP45123MXT'),
(873143, 'Cable Ethernet', 'cable ethernet de alta conectividad', 3444, 'https://www.pngall.com/wp-content/uploads/8/Ethernet-Cable-PNG-Free-Image.png', 34, 11, 'LGCOMP1287'),
(891010, 'CELULAR SONY XPERIA 10', 'Celular sony xperia 10 128gb de almacenamiento y 4gb de ram', 130, 'https://cdn11.bigcommerce.com/s-ss31ap/images/stencil/1280x1280/products/7586/36535/s-l1600__29568.1594101710.1280.1280__35405__91501.1630558590.png?c=2', 9000, 65, 'SONY1234'),
(958659, 'ASISTENTE ALEXA', 'Bocina inteligente que se controla por voz que te ayudara a tu dia a dia', 520, 'https://maztershop.com/wp-content/uploads/2021/12/ALEXA3.png', 1100, 32, 'AMAZON1MX1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `clave_marca` varchar(10) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `direccion` varchar(60) NOT NULL,
  `telefono` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`clave_marca`, `nombre`, `direccion`, `telefono`) VALUES
('AMAZON1MX1', 'AMAZON MEXICO', 'CARRETERA GUADALAJARA #434', '65612125252'),
('APPLE45MX1', 'CHEMA', 'LA AURORA #341', '5552361258'),
('HP45123MXT', 'HP COMPANY', 'ZAPOPAN JALISCO #4567', '4775869325'),
('LGCOMP1287', 'LOPEZ CARRILLO', 'COLONIA EL TRUFAS #43', '477123451'),
('MOTOROLA09', 'MARIO GALVAN', 'CALLE DUBAI #12', '4559898000'),
('RAZER65MX1', 'RAZERCOMPANY', 'EDO DE MEX 112 CARRETERA', '7661982376'),
('SONY1234', 'CARLO ', 'LOS CABOS', '4773555612');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock`
--

CREATE TABLE `stock` (
  `clave_stock` int(6) NOT NULL,
  `producto_id` int(6) NOT NULL,
  `importada_cantidad` mediumint(9) NOT NULL COMMENT 'Cantidad importada de algun producto por parte del proveedor',
  `comprada_cantidad` int(11) NOT NULL COMMENT 'Cantidad comprada por los clientes pertenecientes a dicho producto',
  `disponible` int(11) NOT NULL COMMENT 'cantidad disponible que se crea a partir de la operacion cantidad importada menos comprada'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `stock`
--

INSERT INTO `stock` (`clave_stock`, `producto_id`, `importada_cantidad`, `comprada_cantidad`, `disponible`) VALUES
(289, 114213, 550, 13, 537),
(290, 123456, 50, 27, 23),
(291, 231456, 3400, 290, 3110),
(292, 248256, 500, 9, 491),
(293, 435890, 200, 2, 198),
(294, 505050, 2010, 1, 2009),
(295, 665578, 120, 15, 105),
(296, 873143, 3444, 11, 3433),
(297, 891010, 130, 2, 128),
(298, 958659, 520, 3, 517);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carro_compras`
--
ALTER TABLE `carro_compras`
  ADD PRIMARY KEY (`carro_id`),
  ADD KEY `FK_PRODUCTO_CARRITO` (`producto_id`),
  ADD KEY `FK_CURP_CARRITO` (`cliente_curp`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`curp`);

--
-- Indices de la tabla `control_pedido`
--
ALTER TABLE `control_pedido`
  ADD PRIMARY KEY (`clave_pedido`),
  ADD KEY `FK_PEDIDO_PRODUCTO` (`id_carro`),
  ADD KEY `FK_PEDIDO_CLIENTE` (`curp_cliente`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `FK_PRODUCTO_CATEGORIA` (`categoria_id`),
  ADD KEY `FK_PRODUCTO_PROVEEDOR` (`marca_clave`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`clave_marca`);

--
-- Indices de la tabla `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`clave_stock`),
  ADD KEY `FL_PRODUCTO_STOCK` (`producto_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carro_compras`
--
ALTER TABLE `carro_compras`
  MODIFY `carro_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=341;

--
-- AUTO_INCREMENT de la tabla `control_pedido`
--
ALTER TABLE `control_pedido`
  MODIFY `clave_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT de la tabla `stock`
--
ALTER TABLE `stock`
  MODIFY `clave_stock` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=299;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carro_compras`
--
ALTER TABLE `carro_compras`
  ADD CONSTRAINT `FK_CURP_CARRITO` FOREIGN KEY (`cliente_curp`) REFERENCES `cliente` (`curp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_PRODUCTO_CARRITO` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `control_pedido`
--
ALTER TABLE `control_pedido`
  ADD CONSTRAINT `FK_PEDIDO_CARRO` FOREIGN KEY (`id_carro`) REFERENCES `carro_compras` (`carro_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_PEDIDO_CLIENTE` FOREIGN KEY (`curp_cliente`) REFERENCES `cliente` (`curp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `FK_PRODUCTO_CATEGORIA` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_PRODUCTO_PROVEEDOR` FOREIGN KEY (`marca_clave`) REFERENCES `proveedor` (`clave_marca`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `FL_PRODUCTO_STOCK` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
