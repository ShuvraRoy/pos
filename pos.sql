-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2021 at 06:06 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `articulos`
--

CREATE TABLE `articulos` (
  `idarticulos` int(255) NOT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `articulo` varchar(200) NOT NULL,
  `precio` varchar(100) NOT NULL,
  `stock` int(10) NOT NULL,
  `alerta` int(10) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `observaciones` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articulos`
--

INSERT INTO `articulos` (`idarticulos`, `imagen`, `articulo`, `precio`, `stock`, `alerta`, `descripcion`, `observaciones`) VALUES
(1, '', 'COFRE BOTANERO CON SIX DE CERVEZA', '800', -2, 0, '', ''),
(4, '', 'Cajita de madera con 2 paletas de tamarindo, 3 cacahuates, 4 fritos, 1 cerveza ', '300', -20, 0, '', ''),
(5, 'jarron morado.jpg', 'Jarron Morado y Rosa', '680', -21, 0, 'Jarron aleman', ''),
(7, 'julianna.jpg', 'julianna', '570', -7, 0, 'Cajita vintage 5x6 7 rosas', ''),
(13, 'amor mio.jpg', 'AMOR MIO', '580', -40, 0, 'BASE CHAPETON / 12 ROSAS', ''),
(16, '', '30 envio', '30', -80, 0, 'Servicio de entrega', ''),
(17, '', '50 envio', '50', -108, 0, 'Servicio de entrega', ''),
(18, '', '60 envio', '60', -41, 0, 'Servicio de entrega', ''),
(19, '', '80 envio', '80', -30, 0, 'Servicio de entrega', ''),
(20, '', '100 envio', '100', -10, 0, 'Servicio de entrega', ''),
(21, 'ABRAZO 9 ROSAS.jpg', 'ABRAZO 9 ROSAS', '480', -5, 0, 'CAJITA 5X6 / 9 ROSAS', ''),
(22, '', 'Ramo 18 rosas en papel craft', '450', -2, 0, '18 rosas y follaje', ''),
(23, '', 'combinado coral', '500', -1, 0, '', ''),
(24, 'candy.jpg', 'CANDY', '400', -4, 0, '', ''),
(25, '', 'ESPIRAL 24 ROSAS', '880', -2, 0, '', ''),
(26, '', 'OSITO DE GRADUACION', '230', -1, 0, '', ''),
(27, '', 'CESTO FRUTA Y FLOR', '680', -1, 0, '', ''),
(28, '', 'BOLSITA FLORAL', '250', -2, 0, '', ''),
(29, '', 'GLOBO GRADUACION 18\"', '50', -12, 0, '', ''),
(30, '', 'GLOBO CUMPLEAÃ‘OS 18\"', '50', -53, 0, '', ''),
(31, '', 'GLOBO PICK 9\" CUMPLEAÃ‘OS', '25', -4, 0, '', ''),
(32, '', 'GLOBO AMOR 18 \"', '50', -16, 0, '', ''),
(33, '', 'JARRONCITO 4 GERBERAS', '250', -11, 0, '', ''),
(34, '', 'CAJA 24 ROSAS EN NIVELES', '750', -5, 0, '', ''),
(35, '', 'RAMO 10 ROSAS Y FLORES MIXTAS', '350', -1, 0, '', ''),
(36, '', 'OSITO DE GRADUACION', '280', -1, 0, '', ''),
(37, '', 'Ramo 18 rosas en yute', '500', -1, 0, '', ''),
(38, '', 'Ramo 6 rosas y flores mixtas en yute', '280', -1, 0, '', ''),
(39, '', 'ARREGLO COMBINADO MIXTO CUMPLEAÃ‘OS', '750', -28, 0, '', ''),
(40, '', 'RAMO 6 TALLOS, PELUCHE Y GLOBO', '480', 0, 0, '', ''),
(41, '', 'Bolsa de regalo', '500', -5, 0, '', ''),
(42, '', 'Corona Chica', '550', -8, 0, '', ''),
(43, 'ramo 12 rosas en papel craft.jpg', 'Ramo 12 rosas en papel craft', '500', -11, 0, '12 ROSAS FOLLAJES Y DOLAR', ''),
(44, '', 'Rosa Limon', '450', -6, 0, '', ''),
(45, '', 'Jardinera flor fruta y ferrero', '680', -4, 0, '', ''),
(46, 'te de rosas.jpg', 'te de rosas', '650', -1, 0, '', ''),
(47, '', 'Por siempre 24 tallos', '950', -1, 0, '', ''),
(48, '', 'Jarron con chocolate y flor', '650', 0, 0, '', ''),
(49, '', 'Siempre a tu lado', '750', -3, 0, '', ''),
(50, '', 'Corona mediana', '750', -26, 0, '', ''),
(51, '', 'Ramo tipo americano 12 rosas', '350', 0, 0, '', ''),
(52, '', 'Ramo tipo americano 12 rosas', '350', 0, 0, '', ''),
(53, '', 'CORAZON BLANCO Y ROJO', '750', 0, 0, '', ''),
(54, '', 'GLOBO ANIVERSARIO 18 IN.', '50', -2, 0, '', ''),
(55, '', 'Cubrecaja basico C012', '500', -26, 0, '', ''),
(56, '', 'Entrega especial Domingo', '100', -1, 0, '', ''),
(57, '', 'Jaula Mediana Maderacs', '250', 0, 0, 'Costo $180', ''),
(58, '', 'Caseta telefonica chica con pedestal Maderacs', '150', 0, 0, 'Costo $90.00', ''),
(59, '', 'Caseta telefÃ³nica grande Maderacs', '220', 0, 0, 'Costo $160', ''),
(60, '', 'Caja chocolate20x20 Maderacs', '65', 0, 0, 'Costo $40.00', ''),
(61, '', 'Baul Vintage tpa redonda Maderacs', '200', 0, 0, 'Costo $130.00', ''),
(62, '', 'Farol chico solo Maderacs', '90', 0, 0, 'Costo $60.00', ''),
(63, '', 'Jaula chica Maderacs', '180', 0, 0, 'Costo $120.00', ''),
(64, '', 'Candil grande (farol) Maderacs', '170', 0, 0, 'Costo $95.00 ', ''),
(65, '', 'Base Piramide Maderacs', '180', 0, 0, 'Costo $98.00\r\n50 cms alto boca 10x10 base 15x15, fondo a 7.5 cms', ''),
(66, '', 'Candiles Grandes Maderacs', '350', 0, 0, 'Costo $180.00', ''),
(67, '', 'Juego de iniciales Madracs E&S planas', '350', 0, 0, 'Costo $150.00', ''),
(68, '', 'Letrero LOVE pequeÃ±o Maderacs', '200', 0, 0, 'Costo $110.00', ''),
(69, '', 'Base Bolsa de regalo Maderacs', '120', 0, 0, 'Costo $70.00\r\nVerde manzana adentro champange 29 cms alto, 22 largo, 10 ancho', ''),
(70, '', 'Torre eiffel plana Maderacs', '85', 0, 0, 'Costo $55.00', ''),
(71, '', 'Biombo grande 13 fotos', '2300', 0, 0, 'Costo $1,600.00', ''),
(72, '', 'Torre Eiffel grande para laterales Maderacs', '800', 0, 0, 'Costo $450.00', ''),
(73, '', 'Torre eiffel chica 4 patas Maderacs', '130', 0, 0, 'Costo $90.00', ''),
(74, '', 'Base Pedestal Ondulada Maderacs', '150', 0, 0, 'Costo $85.00', ''),
(75, '', 'Base anillo Maderacs', '120', 0, 0, 'CCosto $70.00', ''),
(76, '', 'Biombo 03 6 fotos Maderacs', '950', 0, 0, 'Costo $650.00', ''),
(77, '', 'Cajoncito Vintage Maderacs', '85', 0, 0, 'Costo $58.00\r\nAbajo arena, arriba menta', ''),
(78, '', 'Jarron 7 gerberas', '350', -12, 0, '', ''),
(79, '', 'Corona especial', '', -8, 0, '', ''),
(80, '', 'Espiral 24 rosas', '950', -1, 0, '', ''),
(81, 'cofre sorpresa 1.jpg', 'Cofre Sorpresa', '950', -5, 0, '', ''),
(82, '', 'Arreglo artificial', '380', -1, 0, '', ''),
(83, '', 'Buenos dias', '450', -9, 0, '', ''),
(84, '', 'Corazon 36 rosas rojas', '950', -1, 0, '', ''),
(85, '', 'Camino de rosas', '890', -1, 0, '', ''),
(86, '', 'CORAZON 18 ROSAS', '850', -4, 0, '', ''),
(87, '', 'IBIZA 50 CMS V.L.', '79.46', 0, 0, 'IVA INCLUIDO', ''),
(88, '', 'FLORERO 214 MED GLASSSHOP', '21.46', 0, 0, 'IVA INCLUIDO', ''),
(89, '', 'CUADRADO 5X5 V.L. GLASS SHOP', '34.8', 0, 0, 'IVA INCLUIDO', ''),
(90, '', 'CILINDRO 5X6 V.L. GLASSHOP', '21.46', 0, 0, 'IVA INCLUIDO', ''),
(91, '', 'ROSA INDIVIDUALES', '20', -58, 0, '', ''),
(92, '', 'RAMO 12 TALLOS XV', '450', -1, 0, 'MENTA Y CORAL', ''),
(93, '', 'RENTA DE DOS FONDOS PARA MESAS DE POSTRES', '800', 0, 0, 'CASCADA DE LUCES BEIGE Y VERDE MENTA', ''),
(94, '', 'violetero 3 rosas', '150', -1, 0, '', ''),
(95, '', 'media corona', '480', -2, 0, '', ''),
(96, '', 'ramo 8 tallos', '360', -1, 0, '', ''),
(97, '', 'Dulce sorpresa', '750', -5, 0, '', ''),
(98, '', 'Jarron 10 gerberas', '480', -1, 0, '', ''),
(99, '', 'Centros de mesa sencillos base desechable', '200', -8, 0, '', ''),
(100, '', 'cubrecaja 100 rosas c015 ', '1450', -1, 0, '', ''),
(101, '', 'Renta de tripie para foto beige', '300', 0, 0, '', 'llevar a salon tulipanes el sabado a la 1pm'),
(102, '', 'Dia Rosa', '580', -3, 0, '', ''),
(103, '', 'Alcaraz un tallo', '30', -2, 0, '', ''),
(104, '', 'Alcaraz un tallo', '30', 0, 0, '', ''),
(105, '', 'Alcatraz un tallo', '35', 0, 0, '', ''),
(106, '', 'Corsage', '250', -2, 0, 'Diferentes tonos de rosa y liston beige', ''),
(107, '', 'Cupcake', '400', -3, 0, '', ''),
(108, '', 'CILINDRO 5X10 RELLENO CHOCOLATES NO GLOBOS', '400', -1, 0, '', ''),
(109, '', 'JARRON 10 TULIPANES', '650', -1, 0, '', ''),
(110, '', 'CAJA LETRA M', '1200', -1, 0, '', ''),
(111, '', 'Corona mediana C001', '700', -2, 0, '', ''),
(112, 'inolvidable.jpg', 'INOLVIDABLE', '1200', -4, 0, 'Cofre cuadrado chocolate 24 rosas, caja ferrero, follajes', ''),
(113, 'cilindro 6 rosas y hortencias.png.jpg', 'CILINDRO 6 ROSAS Y HORTENCIAS', '390', -9, 0, '', ''),
(114, '', 'JARRON 18 ROSAS PREMIUM', '750', -7, 0, '', ''),
(115, '', 'DULCERO CHOCOLATE Y FLOR', '600', -2, 0, '', ''),
(116, '', 'CAJA 24 ROSAS EN NIVELES', '750', -1, 0, '', ''),
(117, '', 'Canasta mediana flor y botana', '780', -2, 0, '', ''),
(118, '', 'Perrito Graduado', '250', -1, 0, '', ''),
(119, '', 'Ramo atado 24 rosas', '550', -2, 0, '', ''),
(120, '', 'ROSAS Y GERBERAS EN JARRON', '350', -9, 0, '', ''),
(121, '', 'canasta grande de fruta', '900', 0, 0, '', ''),
(122, '', 'canasta grande de fruta', '900', -1, 0, '', ''),
(123, '', 'oso de peluche mediano', '350', -4, 0, '', ''),
(124, '', 'cubrecaja 24 rosas y lilis', '750', -3, 0, '', ''),
(125, '', 'CORAZON CON CHOCOLATES', '600', -2, 0, '', ''),
(126, '', 'DECORACION DE HABITACION ', '650', -1, 0, '10 VELAS DE PILA CON VASO\r\nPETALOS DE 12 ROSAS ROJAS', ''),
(127, '', 'CANASTA ESPECIAL GRANDE', '2500', 0, 0, 'CANASTA GRANDE DE FRUTA Y BOTANA\r\nDEJAR ESPACIO PARA BOTELLA.\r\nCON ARREGLO FLORAL', ''),
(128, '', 'Ramo 12 tallos boda', '450', -5, 0, '', ''),
(129, '', 'Dulces y flores', '650', -1, 0, '', ''),
(130, '', 'Globo lÃ¡tex con helio', '15', -5, 0, '', ''),
(131, '', 'Centro de mesa sencillo', '150', -4, 0, '4 rosas rojas y margaritas', ''),
(132, '', 'CESTO BOTANERO', '550', -2, 0, '5 FRITOS MIXTOS\r\n5 CACAHUATES MIXTOS\r\n1 BOTE PRINGLES\r\n2 PALOMITAS\r\n', ''),
(133, '', 'BOUQUET GLOBOS', '200', -1, 0, '3 GLOBOS METALICOS\r\n3 GLOBOS DE LATEX', ''),
(134, '', 'JARRON 10 GIRASOLES Y 6 ROSAS', '650', -2, 0, '', ''),
(135, '', 'RAMO REDONDO', '360', -1, 0, '3 GERB NARANJA, 3 GERB ROSA, 3 CRISANTEMO VERDE, 3 ESPUMA MORADA, 3 ROSA ROSA, 4 GREEN, 6 DRACENIAS', ''),
(136, '', 'CAJA 20 ROSAS', '800', -6, 0, '20 rosas exportacion con cristales tapa y moÃ±o', ''),
(137, '', 'Arreglo funerario bÃ¡sico', '400', -1, 0, 'Polares, gladiola, margarita', ''),
(138, '', 'JARRON GIRASOLES Y ROSAS', '1100', -1, 0, '', ''),
(139, '', 'BOUQUET 1 GLOBO METALICO 3 DE LATEX', '100', -1, 0, '1 GLOBO METALICO DE OCASION\r\n3 GLOBOS DE LATEX COLORES SOLIDOS', ''),
(140, '', 'JARRON 6 ROSAS', '350', -2, 0, '', ''),
(141, '', 'Letra C con rosas', '1200', -1, 0, '', ''),
(142, '', 'Mirada de amor', '950', -3, 0, '', ''),
(143, '', 'doncella', '550', -3, 0, '', ''),
(144, '', 'COPA 6 rosas', '550', -1, 0, '', ''),
(145, '', 'JARRON 24 ROSAS', '950', -3, 0, '', ''),
(146, '', 'JARRON 20 GERBERAS Y 12 ROSAS', '650', -1, 0, '', ''),
(147, 'nuevo dia.jpg', 'Nuevo Dia', '650', -5, 0, 'REGADERITA DE CERAMICA ESTAMPADA CON 6 ROSAS Y FOLLAJES', ''),
(148, '', 'Jarron 12 rosas', '550', -4, 0, '', ''),
(149, '', 'Jarron 25 girasoles', '1000', -1, 0, '', ''),
(150, '', 'ARREGLO DE CARRO', '800', -1, 0, 'ARREGLO FLORAL ROSA CON FUCSIA Y 2 MOÃ‘OS PARA PUERTAS', ''),
(151, '', 'Ramo de Novia 18 tallos', '550', -2, 0, '', ''),
(152, '', 'Flor extra', '250', -2, 0, '', ''),
(153, '', 'Corona Grande', '1000', -19, 0, '', ''),
(154, '', 'Canasta flor y fruta', '600', -2, 0, '', ''),
(155, '', 'Cosecha Roja', '480', -2, 0, '', ''),
(156, '', 'Cilindro 5x6 flores mixtas', '250', -1, 0, 'gerberas y margaritas, forrado con hoja', ''),
(157, '', 'Cajita vintage 1 gerbera y 3 rosas flores mixtas', '250', -1, 0, '1 gerbera 3 rosas y florecitas mixtas', ''),
(159, '', 'Cilindro con chocolates y globos', '550', -2, 0, '', ''),
(160, '', 'Cesto Fruta y Ferrero', '580', -3, 0, '', ''),
(161, '', 'Caja de chocolates ferrero 16 pzas', '150', -9, 0, '', ''),
(162, '', 'Base con 28 chocolates', '800', -1, 0, '', ''),
(163, 'tesoro 12 rosas.jpg', 'Tesoro 12 rosas', '950', -1, 0, 'cofre rustico vintage, 12 rosas rojas, stargeizer, green, margarita y amaranto', ''),
(164, '', 'Corona C005', '950', -1, 0, '', ''),
(165, '', 'Arreglo floral ', '550', -4, 0, '', ''),
(167, '', 'Jarrita Verano', '350', -6, 0, '', ''),
(168, 'rosas europa.jpg', '6 rosas  Europa', '650', -8, 0, '', ''),
(169, '', 'tallo de gerberas ', '25', -9, 0, '', ''),
(170, '', 'centro mesa principal alargado blanco y rojo', '580', -1, 0, '', ''),
(171, '', 'Ramo 4 girasoles', '180', -1, 0, '', ''),
(172, '', 'Lecherito 6 rosas', '450', -1, 0, '', ''),
(173, '', 'Cesto ternura', '450', -2, 0, '', ''),
(174, '', 'Coronita de baby y mini rosa', '450', -2, 0, '', ''),
(175, '', 'Arreglo 12 rosas con agapando', '680', -2, 0, '', ''),
(176, '', 'cANASTA NUECES Y FRUTA', '950', -1, 0, '', ''),
(177, '', 'caja madera arr circ arr globos cumpleaÃ±os', '1100', -1, 0, '', ''),
(178, 'pienso en ti rosas rojas.jpg', 'Pienso en ti - Lecherito', '650', -1, 0, '', ''),
(179, '', 'Corona mediana - Combinada', '900', -2, 0, 'Corona mediana combinada', ''),
(180, '', 'Cofre Vintage', '350', -1, 0, 'Base de madera en forma de cofre vintage', ''),
(181, '', 'Corona C016', '550', -2, 0, '', ''),
(182, '', 'Arreglo 7 gerberas con globo ', '500', -3, 0, 'Arreglo de 7 gerberas con globo Happy birthday. Con cobro de envio', ''),
(183, '', 'ARREGLO DE CARRO', '800', -1, 0, '', ''),
(184, '', 'EXPRESSO', '350', -3, 0, '', ''),
(185, 'bambucillos y rosas.jpg', 'Bambucillos y rosas', '580', -1, 0, 'Base de cerÃ¡mica con 6 rosas, bambu rayado, lili blanca, gyoco, nardos y perritos', ''),
(186, '', 'tacita de cumpleaÃ±os', '320', -7, 0, '', ''),
(187, '', 'Corazon conn chocolates', '550', -1, 0, '', ''),
(188, '', 'CAJITA CRISTAL 12 ROSAS', '580', -6, 0, 'CUBO DE CRISTAL CON 12 ROSAS Y FOLLAJES', ''),
(189, 'jarron 50 rosas.jpg', 'jarron 50 rosas', '1800', 0, 0, 'JARRON DE CRISTAL FOLLAJES Y 50 ROSAS', ''),
(190, '', 'Ramo 12 rosas en yute', '380', -4, 0, '', ''),
(191, '12 rosas black magic.jpg', '12 ROSAS BLACK MAGIC', '950', -3, 0, 'Cilindro de cristal con yute 12 rosas black magic, flor de col, follajes finos', ''),
(193, '20 tulipanes.jpg', '20 TULIPANES', '950', 0, 0, '20 TALLOS DE TULIPAN EN CILINDRO', ''),
(195, 'caja 8 rosas y buchanans.jpg', 'CAJA 8 ROSAS Y BUCHANANS', '1200', -1, 0, 'CAJA DE MADERA 20X20 BOTELLA 750 ML 8 ROSAS FOLLAJES', ''),
(196, 'lila mixto.jpg', 'LILA MIXTO', '680', -14, 0, 'Base ceramica. 5 rosas lila, 7 rojas, 2 agapandos, 2 perritos, follajes', ''),
(197, 'dado 6 rosas y vino.jpg', 'DADO 8 ROSAS Y VINO', '750', -1, 0, 'Dado de madera con botella de vino, 8 rosas, lili, solidago, follajes finos', ''),
(198, '', 'Bolsa de regalo', '500', 0, 0, '', ''),
(199, '', 'Bolsa de regalo', '500', -2, 0, '', ''),
(200, 'cesto 60 rosas.jpg', 'CESTO 60 ROSAS', '2200', -1, 0, 'Cesto de mimbre con 60 rosas y follajes', ''),
(201, 'TULIPANES Y HORTENCIAS.jpg', 'TULIPANES Y HORTENCIAS', '780', 0, 0, '10 TULIPANES EN JARRON CON HORTENCIA Y AMARANTO', ''),
(202, 'cesto botana.jpg', 'CESTO DE BOTANA', '700', 0, 0, '', ''),
(203, 'fiesta rosa.jpg', 'FIESTA ROSA', '800', -3, 0, '12 ROSAS EN DIFERENTES TONOS DE ROSA, MINI ROSA FOLLAJES', ''),
(204, 'jarron 12 rosas lila.jpg', 'JARRON 12 ROSAS LILA', '650', -1, 0, '12 ROSAS COLOR LILA EN JARRON DE CRISTAL CON FOLLAJES', ''),
(205, 'jarron 24 rosas blanco y rojo.jpg', 'JARRON 24 ROSAS 12 ROJAS Y 12 BLANCAS', '950', -2, 0, '', ''),
(206, 'jarroncito 6 rosas y lilis.jpg', 'JARRON 6 ROSAS Y LILIS', '480', -3, 0, '2 TALLOS DE LILIS 6 ROSAS Y FOLLAJES EN JARRON', ''),
(207, 'jarroncito 6 rosas.jpg', 'JARRONCITO 6 ROSAS', '440', -1, 0, '6 ROSAS CON FOLLAJES EN JARRON', ''),
(208, 'orquidea.jpg', 'ORQUIDEA EN CAJA DE CRISTAL', '800', -1, 0, '', ''),
(209, 'ramo 24 rosas en yute rojas y rosas.jpg', 'RAMO 24 ROSAS EN YUTE', '850', -1, 0, '12 ROJAS Y 12 ROSAS CON FOLLAJES ', ''),
(210, 'VANIDAD.jpg', 'VANIDAD', '1100', 0, 0, '18 ROSAS, HORTENCIAS, GREEN, STARGEIZER EN CAJA VINTAGE DE MADERA', ''),
(211, '', 'Canasta 36 rosas', '1450', -1, 0, '24 rojas y 12 rosas', ''),
(212, '', 'cupcake peluche', '300', -1, 0, '', ''),
(213, '', 'emoji peluche', '25', -1, 0, '', ''),
(214, '', 'FLORES EXTRAS', '100', -1, 0, '', ''),
(215, '', 'Jarron 12 rosas rosas clasico', '580', -15, 0, '', ''),
(216, '', 'Arreglo de tulipanes con 2 fritos', '680', -1, 0, '', ''),
(217, '', 'ARREGLO MIXTO CON CAJA DE CHOCOLATES', '600', -1, 0, '', ''),
(218, '', 'CORSAGE', '200', -9, 0, '', ''),
(219, '', 'Dia Rosa', '580', -1, 0, '', ''),
(220, '', 'Ramo xv 12 tallos', '580', -1, 0, 'gyoco de base, 4 rosas elisa, 4 kiko, 4 blancas, liston rosita', ''),
(221, '', 'RAMO DE AVENTAR', '280', 0, 0, 'FLORES ARTIFICIALES', ''),
(222, '', 'RAMO DE AVENTAR', '280', -1, 0, 'FLORES ARTIFICIALES', ''),
(223, '', 'RAMO 18 TALLOS', '550', -3, 0, '', ''),
(224, '', 'Chocolates extras', '20', -2, 0, '', ''),
(225, '', 'envio 40', '40', -4, 0, '', ''),
(226, '', 'globo its a boy 18in', '50', -1, 0, '', ''),
(227, '', 'Centro de mesa 5 rosas y 1 lili caida ligera', '400', -1, 0, 'lether, baby, bromelia', ''),
(228, '', 'ARREGLO ALARGADO', '600', -2, 0, '', ''),
(229, '', 'jarroncito 10 claveles', '250', -3, 0, '', ''),
(230, '', 'Jarron 30 gerberas fucsoa amarillo y rosita', '800', -1, 0, '', ''),
(231, '', '6 rosas extras', '100', -4, 0, '', ''),
(232, '', 'Jardin de Flores', '680', -1, 0, '', ''),
(233, '', 'Arreglo especial', '750', -1, 0, 'Rosas en jardinera formando numero 8', ''),
(234, '', 'globo get well soon', '50', -1, 0, '', ''),
(235, '', 'Arreglo 24 rosas y lilis con tulipanes naranja', '1600', -1, 0, '', ''),
(236, '', 'Expresso', '350', 0, 0, '', ''),
(237, '', 'Globo pick', '25', -1, 0, '', ''),
(238, '', 'Alcatraz extra', '60', -1, 0, '', ''),
(239, '', 'Ramo atado 8 gerberas multicolores', '200', -1, 0, '', ''),
(240, '', 'Banda Rey-Reina-Princesa', '200', -2, 0, '', ''),
(241, '', 'Bolsa de Petalos', '140', -1, 0, '', ''),
(242, '', 'LAZO DE MINI HIEDRA', '700', -1, 0, '', ''),
(243, '', 'CILINDRO CHOCOLATES, GALLETAS Y GLOBOS', '850', -1, 0, '', ''),
(244, '', 'Espiral 45 Rosas', '1400', -1, 0, '', ''),
(245, '', 'Combinado 10 tallos', '850', -1, 0, '', ''),
(246, '', 'Ramo Baby breath', '200', 0, 0, '', ''),
(247, '', '70 servicio de entrega', '70', -2, 0, '', ''),
(248, '', '70 servicio de entrega', '70', 0, 0, '', ''),
(249, '', '70 servicio de entrega', '70', 0, 0, '', ''),
(250, '', '70 servicio de entrega', '70', 0, 0, '', ''),
(251, '', '70 servicio de entrega', '70', 0, 0, '', ''),
(252, '', '70 servicio de entrega', '70', 0, 0, '', ''),
(253, '', 'vintaje Rosa', '530', -1, 0, '', ''),
(254, '', 'cesto 21 rosas', '900', -1, 0, '', ''),
(255, '', 'ARREGLO 12 NARDOS', '580', -1, 0, '12 NARDOS, 6 ROSAS Y HORTENCIA', ''),
(256, '', 'ROSAS Y GERBERAS EN JARRON', '350', -5, 0, '', ''),
(257, '', 'Rosas y Stargeizer', '780', -1, 0, '14 rosas, hortencia y stargeizer', ''),
(258, '', 'Canto rosa', '540', -1, 0, '', ''),
(259, '', '16 rosas', '630', -1, 0, 'Jardinera  de cristal con 16 rosas y follajes', ''),
(260, '', 'DECORACION CON TELAS', '1000', 0, 0, '', ''),
(261, '', 'Vintage rosa', '530', -2, 0, '', ''),
(262, '', 'Boutonier', '100', -10, 0, '', ''),
(263, '', 'Corona 75 Rosas', '1400', -4, 0, '', ''),
(264, '', 'Mi corazon', '800', -3, 0, '', ''),
(265, '', 'Tripie para corona', '250', -1, 0, '', ''),
(266, '', 'VIOLETERO CON GLOBO', '200', -1, 0, '', ''),
(267, '', 'Ramo 24 rosas', '650', 0, 0, '', ''),
(268, '', 'CANASTA DE BOTANA', '650', -2, 0, '', ''),
(269, '', 'Canasta fruta, flor y six budlight', '1000', -1, 0, '', ''),
(270, '', 'jarron 6 rosas y 4 gerberas', '440', -1, 0, '', ''),
(271, '', 'RAMO 12 ROSAS MULTICOLORES EN YUTE', '350', -1, 0, '', ''),
(272, '', 'RAMO 12 ROSAS MULTICOLORES EN YUTE', '350', 0, 0, '', ''),
(273, '', 'Promo 10 Tulipanes', '450', -1, 0, '', ''),
(274, '', 'Tulipan extra', '50', -2, 0, '', ''),
(275, '', 'Canasta flor fruta y vino', '1000', -1, 0, '', ''),
(276, '', 'Arreglo 3 gladiolas', '400', -1, 0, '', ''),
(277, '', 'BUHO PELUCHE', '250', -1, 0, '', ''),
(278, '', 'Ramo 10 tallos para guia', '400', 0, 0, '', ''),
(279, '', 'co', '', 0, 0, '', ''),
(280, '', 'corona ', '', -1, 0, '', ''),
(281, '', 'corona especial mixta', '13000', -1, 0, '', ''),
(282, '', 'Canasta fruta y chocolates', '1500', -1, 0, '', ''),
(283, '', 'Ramo 8 rosas', '270', -1, 0, '', ''),
(284, '', 'Hula Hula', '1500', -1, 0, '', ''),
(285, '', 'Caja botanera', '980', -1, 0, '10 fritos\r\n10 cacahuates\r\n2 pringles\r\n1 chicharron\r\n1 semillas\r\n8 galletas', ''),
(286, '', 'Ibiza centro de mesa', '400', -1, 0, '', ''),
(287, '', 'Corsage de mano', '180', -1, 0, '', ''),
(288, '', 'JARDINERA FLOR, BOTANA Y SIX DE CERVEZA', '850', -1, 0, '', ''),
(289, '', 'Ramo 18 rosas en yute 12 rojas y 12 rosas', '600', -1, 0, '', ''),
(290, '', 'ramo 3 tallos, follaje', '100', 0, 0, '', ''),
(291, '', 'ramo 3 tallos', '100', -1, 0, '3 rosas, astromelia yoko ', ''),
(292, '', 'Ramo 3 rosas y globo', '150', 0, 0, '', ''),
(293, '', 'cubre C013', '600', -1, 0, '24 ROSAS', ''),
(294, '', 'envio', '70', -1, 0, '', ''),
(296, NULL, 'test2', '15', 45, 0, NULL, NULL),
(297, NULL, 'test 11', '11', 0, 0, 'test11', NULL),
(298, NULL, 'test 12', '12', 0, 0, 'test22', NULL),
(299, NULL, 'service article', '300', 0, 0, 'test service', NULL),
(301, NULL, 'test Inventory!!!!!!!!!!!!!!', '999999999', 88, 0, '&&&&&&&&&&&&&&', NULL),
(302, NULL, 'image', '560', 5, 0, NULL, NULL),
(303, NULL, 'image', '560', 5, 0, NULL, NULL),
(304, 'backend/assets/images/1626057509.jpg', 'go-pro_', '500', 20, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `articulos_componentes`
--

CREATE TABLE `articulos_componentes` (
  `idcomponentes` int(255) NOT NULL,
  `idarticulo` int(255) NOT NULL,
  `componente` varchar(100) NOT NULL,
  `cantidad` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articulos_componentes`
--

INSERT INTO `articulos_componentes` (`idcomponentes`, `idarticulo`, `componente`, `cantidad`) VALUES
(1, 1, 'COFRE CUADRADO CHOCOLATE ', 1),
(8, 4, '1 ceveza 16 oz', 0),
(9, 4, '4 bolsitas de fritos', 0),
(10, 4, '3 bolsitas de cacahuates', 0),
(11, 4, '2 paletas de tamarindo', 0),
(12, 5, 'Jarron aleman', 1),
(13, 5, 'Iris morado', 6),
(14, 5, 'Stageizer', 1),
(15, 5, 'Gerbera rosa mexicano', 5),
(16, 5, 'Alstroemeria rosa', 6),
(17, 5, 'Liston rosa', 1),
(18, 7, 'rosas rojas', 7),
(19, 7, 'green trick', 3),
(20, 7, 'hortencias', 2),
(21, 7, 'espada', 1),
(22, 7, 'maicera', 1),
(23, 7, 'alstroemeria blanca', 3),
(24, 7, 'amaranto', 1),
(25, 7, 'cajita vintaje 5x6', 1),
(26, 7, 'baby breath', 0),
(27, 7, 'moÃ±o de satin rojo', 0),
(28, 13, 'STARGEIZER VARAS', 2),
(29, 13, 'ROSA ROJAS DE EXPORTACION', 12),
(30, 13, 'CHAPETON CHICA', 1),
(31, 13, 'LETHER', 5),
(32, 13, 'MAICERAS', 3),
(33, 21, 'ROSAS ROJAS', 6),
(34, 21, 'ROSAS ROSAS', 3),
(35, 21, 'GYOCO', 5),
(36, 24, 'LILI AMARILLA', 1),
(37, 24, 'ROSA ROJA', 6),
(38, 24, 'CAMPANA IRLANDESA', 2),
(39, 24, 'ALSTROMERIA REBECA', 3),
(40, 24, 'SOLIDAGO', 3),
(41, 24, 'LETHER', 2),
(42, 24, 'CLAVO', 3),
(43, 25, 'ROSAS ROJAS', 24),
(44, 25, 'BAMBUS', 2),
(45, 25, 'CLAVO', 4),
(46, 25, 'BASE CIRCULAR DE CERAMICA', 1),
(47, 34, 'ROSA ROJA DE EXPORTACION', 24),
(48, 34, 'CASABLANCA O LILI BLANCA', 3),
(49, 34, 'CLAVO', 5),
(50, 34, 'LETHER', 2),
(51, 37, '', 0),
(52, 42, 'Camedor', 1),
(53, 42, 'Polar', 12),
(54, 42, 'Solidago', 12),
(55, 42, 'Argentina', 12),
(56, 42, 'Dolar', 8),
(57, 42, 'Clavel', 12),
(58, 44, 'gerberas rosa mexicano', 2),
(59, 44, 'Flor stargeizer', 2),
(60, 44, 'Rosa kiko', 2),
(61, 44, 'Alstroemeria fucsia', 2),
(62, 44, 'Vara de campana', 2),
(63, 44, 'Nardo', 1),
(64, 44, 'Maicera', 3),
(65, 44, 'Clavo', 5),
(66, 44, 'Cajita vintage cafe 5x6', 1),
(67, 44, 'MoÃ±o listÃ³n rosa satin', 1),
(68, 45, 'Jardinera de cristal ', 1),
(69, 45, 'manzanas rojas, manzanas verdes, platanos, uvas, kiwis, pera, naranjas 4pzas cada una', 0),
(70, 45, 'flores mixtas', 0),
(71, 45, 'caja de ferrero', 1),
(72, 46, 'Rosas roja', 12),
(73, 46, 'Alstroemeria morada', 7),
(74, 46, 'Solidago', 8),
(75, 46, 'Stargeizer flores', 4),
(76, 46, 'Varas de membrillo rojo', 2),
(77, 46, 'Bombi', 1),
(78, 46, 'Clavo', 6),
(79, 46, 'Base taza grande ceramica', 1),
(80, 46, '', 0),
(81, 47, 'rosas', 24),
(82, 47, 'nardos', 8),
(83, 47, 'hawaianas', 4),
(84, 47, 'lether', 12),
(85, 47, 'alstroemeria blanca', 10),
(86, 47, 'solidago', 10),
(87, 79, 'Gladiola blanca', 12),
(88, 79, 'Rosas rojas', 18),
(89, 79, 'Clavel rojo', 18),
(90, 79, 'Hawaiana roja', 4),
(91, 79, 'Campna', 1),
(92, 79, 'Solidago', 1),
(93, 301, 'test11', 2),
(94, 301, 'test22', 5),
(95, 301, 'test33', 9),
(96, 301, 'test_edit', 2),
(97, 301, 'test22_edit', 5),
(98, 301, 'test33_edit', 9),
(99, 301, 'sfbagsv', 23),
(100, 301, 'test11', 2),
(101, 301, 'test22', 5),
(102, 301, 'test33', 9),
(103, 301, 'test_edit', 2),
(104, 301, 'test22_edit', 5),
(105, 301, 'test33_edit', 9),
(106, 301, 'sfbagsv', 23);

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `idclientes` int(255) NOT NULL,
  `fecharegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nombre` varchar(200) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `domicilio` text DEFAULT NULL,
  `colonia` varchar(50) DEFAULT NULL,
  `codigopostal` varchar(20) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `rfc` varchar(100) DEFAULT NULL,
  `contacto` varchar(100) DEFAULT NULL,
  `estado` varchar(100) DEFAULT NULL,
  `pais` varchar(100) DEFAULT NULL,
  `comentarios` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`idclientes`, `fecharegistro`, `nombre`, `correo`, `domicilio`, `colonia`, `codigopostal`, `telefono`, `celular`, `rfc`, `contacto`, `estado`, `pais`, `comentarios`) VALUES
(1, '2016-06-22 18:00:00', 'INDUSTRIAS RHEEM S.A. DE C.V.', 'NVL_accounts.payable@rheem.com', 'AVENIDA LOS DOS LAREDOS No. 7', 'PARQUE INDUSTRIAL DOS LAREDOS', '88185', '7111515', '', 'IRH890217I36', '', '', '', ''),
(2, '0000-00-00 00:00:00', 'envia flores', '', '', '', '', '018006000', '', '', '', '', '', ''),
(3, '0000-00-00 00:00:00', 'Liliana Jimenez', 'liliana.jimenez@delphi.com', '', '', '', '8677118771', '', '', '', '', '', ''),
(4, '2016-06-23 18:00:00', 'Arcadio Valdez', '', '', '', '', '8671626898', '', '', '', '', '', ''),
(5, '2016-07-04 18:00:00', 'July Nunez', '', '', '', '', '', '', '', '', '', 'Mexico', ''),
(6, '0000-00-00 00:00:00', 'JORGE LUIS FLORES', '', '', '', '', '8677125125', '', '', '', '', '', ''),
(7, '0000-00-00 00:00:00', 'Claudia Avalos', '', 'Heroe de Nacataz 3601 Grupo Galvan', '', '', '7122344', '', '', '', '', '', ''),
(8, '2016-07-06 18:00:00', 'publico en general', '', '', '', '', '', '', '', '', '', 'Mexico', ''),
(9, '2016-07-06 18:00:00', 'LAURA ALVARADO', 'laura.alvarado@emerson.com', '', '', '', '', '', '', '', '', 'Mexico', ''),
(10, '2016-07-10 18:00:00', 'Adriana Castillo', '', 'fromex', '', '', '7115231', '', '', '', '', 'Mexico', ''),
(11, '0000-00-00 00:00:00', 'juan hernandez', '', '', '', '', '9564361062', '', '', '', '', '', ''),
(12, '2016-07-10 18:00:00', 'ANABEL PALACIOS', '', '', '', '', '8677350862', '', '', '', '', 'Mexico', ''),
(13, '2016-07-10 18:00:00', 'EDUARDO RODRIGUEZ', '', '', '', '', '8671627687', '', '', '', '', 'Mexico', ''),
(14, '2016-07-10 18:00:00', 'MARY SERNA ', '', 'SEGURO SOCIAL DE LA BANDERA', '', '', '72*12*12732  7123492', '', '', '', '', 'Mexico', ''),
(15, '2016-07-10 18:00:00', 'JULIO CESAR CHAVEZ', '', '', '', '', '8672233964', '', '', '', '', 'Mexico', ''),
(16, '2016-07-10 18:00:00', 'SERGIO VEGA LOZCAR', '', '', '', '', '52*179508*1', '', '', '', '', 'Mexico', ''),
(17, '2016-07-11 18:00:00', 'Alfredo Caballero', '', '', '', '', '8671692367', '', '', '', '', 'Mexico', ''),
(18, '2016-07-11 18:00:00', 'Martha Elena Ortiz', '', '', '', '', '', '', '', '', '', 'Mexico', ''),
(19, '2016-07-11 18:00:00', 'ARMANDO RAMIREZ', '', '', '', '', '7159667', '', '', '', '', 'Mexico', ''),
(20, '2016-07-13 18:00:00', 'Josue Granados', '', '', '', '', '8672119393', '', '', '', '', 'Mexico', ''),
(21, '2016-07-13 18:00:00', 'DEBORA MTZ', '', '', '', '', '8671688207', '', '', '', '', 'Mexico', ''),
(22, '2016-07-15 18:00:00', 'Renato Araujo Torres', '', '', '', '', '', '', '', '', '', 'Mexico', ''),
(23, '2016-07-15 18:00:00', 'Ma. Fernanda de la Rosa', '', '', '', '', '8671835343', '', '', '', '', 'Mexico', ''),
(24, '2016-07-15 18:00:00', 'Arturo Baldovino', '', '', '', '', '8672057275', '', '', '', '', 'Mexico', ''),
(25, '2016-07-15 18:00:00', 'Guadalupe Mejia', '', '', '', '', '', '', '', '', '', 'Mexico', ''),
(26, '2016-07-15 18:00:00', 'Josue Granados', '', '', '', '', '8672119393', '', '', '', '', 'Mexico', ''),
(27, '2016-07-15 18:00:00', 'Alejandro Delgado', '', '', '', '', '', '', '', '', '', 'Mexico', ''),
(28, '2016-07-15 18:00:00', 'Gabriela Zarate', '', '', '', '', '', '', '', '', '', 'Mexico', ''),
(29, '2016-07-17 18:00:00', 'Laura Dominguez', '', 'arcatek venustiano carranza 2302', '', '', '7158420', '', '', '', '', 'Mexico', ''),
(30, '2016-07-18 18:00:00', 'Roberto Chavez', '', '', '', '', '1052163', '', '', '', '', 'Mexico', ''),
(31, '2016-07-18 18:00:00', 'Miriam Villalobos', '', 'Bulklift', '', '', '', '', '', '', '', 'Mexico', ''),
(32, '2016-07-19 18:00:00', 'Josefina Rangel', '', 'Ayutla 165', 'Benito Juarez', '', '1896864', '', '', '', '', 'Mexico', ''),
(35, '2016-07-19 18:00:00', 'Cinthia Pena', '', '', '', '', '7359837', '', '', '', '', 'Mexico', 'Nuera del Sr. PeÃ±a de la luz'),
(36, '0000-00-00 00:00:00', 'Alberto Vazquez', '', 'Zaragoza 1101', '', '', '52*165723*2', '', '', '', '', '', ''),
(38, '0000-00-00 00:00:00', 'Victor Cuellar', 'cuellar_v@hotmail.com', 'Morelos 2214', '', '', '8677192722', '', '', '', '', '', ''),
(39, '0000-00-00 00:00:00', 'Funeraria Valdez', '', '', '', '', '7190402', '', '', '', '', '', ''),
(42, '2016-07-24 18:00:00', 'Brenda Gonzalez', 'alcantar.brenda20@gmail.com', '', '', '', '8677546488', '', '', '', '', 'Mexico', ''),
(43, '2016-07-25 18:00:00', 'TRANSPORTES MUCIÃ‘O SA DE CV', 'jorgelo@mucino.com', 'AV. PASEO DE LA REFORMA', 'JUAREZ', '06600', '', '', 'TMU791030LA4', 'Jorge Luis Ortiz', 'distrito federal', 'MÃ©xico', ''),
(44, '0000-00-00 00:00:00', 'Alma Edith Salcedo', '', '', '', '', '8677295523', '', '', '', '', '', ''),
(45, '0000-00-00 00:00:00', 'Leticia Elizondo', '', '', '', '', '7132658', '', '', '', '', '', ''),
(46, '0000-00-00 00:00:00', 'Abraham M', '', '', '', '', '8672115241', '', '', '', '', '', ''),
(47, '2016-07-27 18:00:00', 'Sra. Esther Soto', '', '', '', '', '8677272909', '', '', '', '', 'Mexico', ''),
(48, '0000-00-00 00:00:00', 'Brisa Ramos', '', '', '', '', '8672174039', '', '', '', '', '', ''),
(49, '0000-00-00 00:00:00', 'Daniel Rodriguez', '', '', '', '', '7115229', '', '', '', '', '', ''),
(50, '0000-00-00 00:00:00', 'Carmen Garza de Madrigal', '', '', '', '', '7102344', '', '', '', '', '', ''),
(51, '0000-00-00 00:00:00', 'Roberto Camposano', 'r.camposano@gtscorporativo.mx', '', '', '', '8677100181', '', '', '', '', '', ''),
(52, '2016-08-15 18:00:00', 'ROLANDO GARZA', '', '', '', '', '7131122', '', '', '', '', 'Mexico', ''),
(53, '2016-08-15 18:00:00', 'ANGEL PEREZ', '', '', '', '', '5539502791', '', '', '', '', 'Mexico', ''),
(54, '2016-08-16 18:00:00', 'Guillermo Calderon', '', '', '', '', '8671930297', '', '', '', '', 'Mexico', ''),
(55, '0000-00-00 00:00:00', 'LEONOR AGUILAR', '', 'BANAMEX SECTOR ADUANA', '', '', '8671175893', '', '', '', '', '', ''),
(56, '0000-00-00 00:00:00', 'VERONICA MAGALLAÃ‘ES', '', '', '', '', '', '', '', '', '', '', ''),
(57, '0000-00-00 00:00:00', 'Gabriel Jardon', '', '', '', '', '8671293028', '', '', '', '', '', ''),
(58, '0000-00-00 00:00:00', 'Agripina Hernandez', '', '', '', '', '8677454495', '', '', '', '', '', ''),
(59, '0000-00-00 00:00:00', 'Ma. Eugenia LÃ³pez', '', '', '', '', '7155353 ext 341', '', '', '', '', '', ''),
(60, '0000-00-00 00:00:00', 'Daniela Ponce', '', '', '', '', '8672051768', '', '', '', '', '', ''),
(61, '0000-00-00 00:00:00', 'gerardo ayala', '', '', '', '', '3366715844', '', '', '', '', '', ''),
(62, '0000-00-00 00:00:00', 'Samantha Bulas', '', '', '', '', '', '', '', '', '', '', ''),
(63, '0000-00-00 00:00:00', 'Ana lilia Savala', '', '', '', '', '7355869', '', '', '', '', '', ''),
(64, '0000-00-00 00:00:00', 'Felipe Alonso', '', '', '', '', '8671426703', '', '', '', '', '', ''),
(65, '0000-00-00 00:00:00', 'Margarita Reyes ', '', '', '', '', '7115266', '', '', '', '', '', ''),
(66, '0000-00-00 00:00:00', 'Sandra Trejo', '', 'Brake parts', '', '', '', '', '', '', '', '', ''),
(67, '0000-00-00 00:00:00', 'Dennise Escamilla', '', '', '', '', '8671248480', '', '', '', '', '', ''),
(68, '0000-00-00 00:00:00', 'Dennise Escamilla', '', '', '', '', '8671248480', '', '', '', '', '', ''),
(69, '0000-00-00 00:00:00', 'Nereida Eguia', '', 'Fromex', '', '', '', '', '', '', '', '', ''),
(70, '2016-08-22 18:00:00', 'ALINNE IVONNE ORTIZ VILLENA', 'si_compras@hotmail.com', 'rio tejon #56', 'INFONAVIT', '', '7152643', '', ' OIVA771005CX0', '', 'tamps', 'Mexico', ''),
(71, '0000-00-00 00:00:00', 'Sandra Talamas', '', '', '', '', '2047555', '', '', '', '', '', ''),
(72, '0000-00-00 00:00:00', 'Hortencia Acevedo ', '', '', '', '', '8677416245 (celular ', '', '', '', '', '', ''),
(73, '0000-00-00 00:00:00', 'Paola Guerra', '', '', '', '', '1880434 casa mama 15', '', '', '', '', '', ''),
(74, '0000-00-00 00:00:00', 'Victor Crispin', '', '', '', '', '7115248  7270340', '', '', '', '', '', ''),
(75, '0000-00-00 00:00:00', 'karen Pow', '', '', '', '', 'face', '', '', '', '', '', ''),
(76, '2016-08-23 18:00:00', 'Rosa Alicia Espinoza', '', '', '', '', '8677297070', '', '', '', '', 'Mexico', ''),
(77, '0000-00-00 00:00:00', 'Raul Becerra', 'tbf_14@hotmail.com', '', '', '', '', '', '', '', '', '', ''),
(78, '0000-00-00 00:00:00', 'ESCUELA SAN ANDRES', '', '', '', '', '7043200', '', '', '', '', '', ''),
(79, '0000-00-00 00:00:00', 'Carlos Martinez', '', '', '', '', '42*2*37341', '', '', '', '', '', ''),
(80, '0000-00-00 00:00:00', 'GISELA GUZMAN', '', '', '', '', '8677351073', '', '', '', '', '', ''),
(81, '0000-00-00 00:00:00', 'ALBERTO GARCIA', '', '', '', '', '1981933', '', '', '', '', '', ''),
(82, '0000-00-00 00:00:00', 'LIC. ELIZABETH HERNANDEZ', '', '', '', '', '7152797   1090048', '', '', '', '', '', ''),
(83, '0000-00-00 00:00:00', 'JESUS SEGURA', '', '', '', '', '8671209654', '', '', '', '', '', ''),
(84, '0000-00-00 00:00:00', 'JESUS SEGURA', '', '', '', '', '8671209654', '', '', '', '', '', ''),
(85, '0000-00-00 00:00:00', 'jose Iracueta', '', '', '', '', '8671714182', '', '', '', '', '', ''),
(86, '0000-00-00 00:00:00', 'oscar sepulveda', '', '', '', '', '8677297454', '', '', '', '', '', ''),
(87, '0000-00-00 00:00:00', 'Lorenzo Nunez', '', '', '', '', '8671093315', '', '', '', '', '', ''),
(88, '0000-00-00 00:00:00', 'Roberto Sanchez', 'b_t0@hotmail.com', '', '', '', '8671258560', '', '', '', '', '', ''),
(89, '0000-00-00 00:00:00', 'Norma Manzo', '', '', '', '', '8907257', '', '', '', '', '', ''),
(90, '0000-00-00 00:00:00', 'OSIRIS LOPEZ', '', '', '', '', '8671173106', '', '', '', '', '', ''),
(91, '0000-00-00 00:00:00', 'OSIRIS LOPEZ', '', '', '', '', '8671173106', '', '', '', '', '', ''),
(92, '0000-00-00 00:00:00', 'CESAR LARA', 'cesarlara.973@gmail.com', '', '', '', '8672171063', '', '', '', '', '', ''),
(93, '0000-00-00 00:00:00', 'CESAR LARA', 'cesarlara.973@gmail.com', '', '', '', '8672171063', '', '', '', '', '', ''),
(94, '0000-00-00 00:00:00', 'LETY QUEZADA', '', '', '', '', '', '', '', '', '', '', ''),
(95, '0000-00-00 00:00:00', 'OSCAR F.PÃ‘A', 'auxiliar@ofpena.com.mx', 'GONZALEZ', '', '', '', '', '', '', '', '', ''),
(96, '0000-00-00 00:00:00', 'OSCAR F.PÃ‘A', 'auxiliar@ofpena.com.mx', 'GONZALEZ', '', '', '', '', '', '', '', '', ''),
(97, '0000-00-00 00:00:00', 'GERARDO NEGRETE', '', '', '', '', '8671125087', '', '', '', '', '', ''),
(98, '0000-00-00 00:00:00', 'Luis Zamora', '', '', '', '', '8671000045', '', '', '', '', '', ''),
(99, '0000-00-00 00:00:00', 'Liliana Rivera', '', '', '', '', '8677272569', '', '', '', '', '', ''),
(100, '0000-00-00 00:00:00', 'Veronica Gutierrez', '', '', '', '', '8672010170', '', '', '', '', '', ''),
(101, '0000-00-00 00:00:00', 'Cesar HernÃ¡ndez', '', '', '', '', '1320197', '', '', '', '', '', ''),
(102, '0000-00-00 00:00:00', 'Max Alvarez', '', '', '', '', '', '', '', '', '', '', ''),
(103, '0000-00-00 00:00:00', 'Liliana Rivas', '', '', '', '', '8677412896', '', '', '', '', '', ''),
(104, '0000-00-00 00:00:00', 'CLAUDIA CASTILLO', '', '', '', '', '7115200', '', '', '', '', '', ''),
(105, '0000-00-00 00:00:00', 'GUADALUPE SANDOVAL RHEEM', 'guadlupe.sandoval@rheem.com', '', '', '', '7111515', '', '', '', '', '', ''),
(106, '0000-00-00 00:00:00', 'Carlos Hernandez', '', 'carlosdhdz16@gmail.com', '', '', '', '', '', '', '', '', ''),
(107, '0000-00-00 00:00:00', 'VICTOR GONZALEZ', '', '', '', '', '8675939672', '', '', '', '', '', ''),
(108, '0000-00-00 00:00:00', 'MARCELA MOZQUEDA ', '', '', '', '', '1514300', '', '', '', '', '', ''),
(109, '0000-00-00 00:00:00', 'REAL INN', '', '', '', '', '', '', '', '', '', '', ''),
(110, '0000-00-00 00:00:00', 'Lizeth Palomo', '', '', '', '', '8671044967', '', '', '', '', '', ''),
(111, '0000-00-00 00:00:00', 'Susana flores', '', '', '', '', '8671833507', '', '', '', '', '', ''),
(112, '0000-00-00 00:00:00', 'joel Mendiola', '', '', '', '', '', '', '', '', '', '', ''),
(113, '0000-00-00 00:00:00', 'DIANA ZAMORA', '', '', '', '', '7115200', '', '', '', '', '', ''),
(114, '0000-00-00 00:00:00', 'Daniela Ponce', '', '', '', '', '7115200', '', '', '', '', '', ''),
(115, '0000-00-00 00:00:00', 'ERIKA MENDIOLA', '', '', '', '', '9567405748', '', '', '', '', '', ''),
(116, '0000-00-00 00:00:00', 'Mary Paz ', 'marypaz1483@gmail.com', '', '', '', '8671612337', '', '', '', '', '', ''),
(117, '0000-00-00 00:00:00', 'FLORA QUEEN', 'info@floraqueen.info', '', '', '', '', '', '', '', '', '', ''),
(118, '0000-00-00 00:00:00', 'Carmen Madrigal', '', '', '', '', '7131076', '', '', '', '', '', ''),
(119, '0000-00-00 00:00:00', 'Lorenzo Castro Herrera', '', '', '', '', '8671206346', '', '', '', '', '', ''),
(120, '0000-00-00 00:00:00', 'ESMERALDA RODRIGUEZ', '', '', '', '', '8671135495', '', '', '', '', '', ''),
(121, '0000-00-00 00:00:00', 'Luz Ma. ramirez', '', '', '', '', '8671267013 o 2427389', '', '', '', '', '', ''),
(122, '0000-00-00 00:00:00', 'SINAI RANGEL', 'sinai.rangel@rheem.com', '', '', '', '8672175928', '', '', '', '', '', ''),
(123, '0000-00-00 00:00:00', 'Ricardo Juarez', 'azaeljuarez@hotmail.com', '', '', '', '62*13*22201', '', '', '', '', '', ''),
(124, '0000-00-00 00:00:00', 'MARICARMEN CONDE', 'maricarmen.conde@rheem.com', '', '', '', '7111515 EXT 5735', '', '', '', '', '', ''),
(125, '0000-00-00 00:00:00', 'Eliud Pecero', '', '', '', '', '1601512', '', '', '', '', '', ''),
(126, '0000-00-00 00:00:00', 'DANIEL HERNANDEZ', '', '', '', '', '8677527024', '', '', '', '', '', ''),
(127, '0000-00-00 00:00:00', 'Roberto CarreÃ³n', '', '', '', '', '8677529610', '', '', '', '', '', ''),
(128, '0000-00-00 00:00:00', 'Martin Montoya', '', '', '', '', '8671587969', '', '', '', '', '', ''),
(129, '0000-00-00 00:00:00', 'Ricardo Cuellar', '', '', '', '', '8671291265', '', '', '', '', '', ''),
(130, '0000-00-00 00:00:00', 'Dora Alicia Perez', 'dulce-princess83@hotmail.com', '', '', '', '(210)3837558', '', '', '', '', '', ''),
(131, '0000-00-00 00:00:00', 'Dulce sarabia', 'dulce-princess83@hotmail.com', '', '', '', '(210)3837558', '', '', '', '', '', ''),
(132, '0000-00-00 00:00:00', 'ARACELY MORA', '', '', '', '', '7149640', '', '', '', '', '', ''),
(133, '0000-00-00 00:00:00', 'OSCAR JAVIER MEDINA', '', '', '', '', '8671176993', '', '', '', '', '', ''),
(134, '0000-00-00 00:00:00', 'DANIELA SANCHEZ', '', '', '', '', '8671321369', '', '', '', '', '', ''),
(135, '0000-00-00 00:00:00', 'Wendy Martinez', '', '', '', '', '', '', '', '', '', '', ''),
(136, '0000-00-00 00:00:00', 'Sergio GonzÃ¡lez', '', '', '', '', '198-08-01 Nextel', '', '', '', '', '', ''),
(137, '0000-00-00 00:00:00', 'Jonathan Leija', '', '', '', '', '8671435932', '', '', '', '', '', ''),
(138, '0000-00-00 00:00:00', 'Jose Antonio Barrientos Parra', '', 'Dr, Mier1814 dep4', '', '', '867113198', '', '', '', '', '', ''),
(139, '2016-12-22 18:00:00', 'Norma Hernandez', '', 'linamar', '', '', '7110500 ', '', '', '', '', 'Mexico', ''),
(140, '0000-00-00 00:00:00', 'ANABEL ZIMBRON', '', '', '', '', '8671942200', '', '', '', '', '', ''),
(141, '0000-00-00 00:00:00', 'Liliana Sandoval', '', 'Expeditors', '', '', '8671290014', '', '', '', '', '', ''),
(142, '0000-00-00 00:00:00', 'Berenice Trejo', '', '', '', '', '8671171348', '', '', '', '', '', ''),
(143, '0000-00-00 00:00:00', 'Pedro Rios', '', '', '', '', '9563349968', '', '', '', '', '', ''),
(144, '0000-00-00 00:00:00', 'Nalini', '', '', '', '', '013336165303', '', '', '', '', '', ''),
(145, '0000-00-00 00:00:00', 'Orlando Villegas', '', '', '', '', '8677403290', '', '', '', '', '', ''),
(146, '0000-00-00 00:00:00', 'Jorge Briones', '', '', '', '', '8671031919', '', '', '', '', '', ''),
(147, '0000-00-00 00:00:00', 'Ana Maria Berlanga Puente', '', '', '', '', '7122358', '', '', '', '', '', ''),
(148, '0000-00-00 00:00:00', 'Damian Moreno', '', '', '', '', '8671291320', '', '', '', '', '', ''),
(149, '0000-00-00 00:00:00', 'Otoniel Garcia', '', '', '', '', '1896387', '', '', '', '', '', ''),
(150, '0000-00-00 00:00:00', 'Sergio Flores', '', '', '', '', '9562670289', '', '', '', '', '', ''),
(151, '0000-00-00 00:00:00', 'Erick Amaya', '', '', '', '', '8671576768', '', '', '', '', '', ''),
(152, '0000-00-00 00:00:00', 'Angeles Paez', '', '', '', '', '7129145', '', '', '', '', '', ''),
(153, '0000-00-00 00:00:00', 'Jose Del Toro', 'deltoro3c@hotmail.com', '', '', '', '', '', '', '', '', '', ''),
(154, '0000-00-00 00:00:00', 'Maribel Caballero', 'maribel.caballero@brakepartsinc.com', '', '', '', '', '', '', '', '', '', ''),
(155, '0000-00-00 00:00:00', 'LUCRECIA GARZA', 'lucrecia_62@hotmail.com', '', '', '', '8341263321', '', '', '', '', '', ''),
(156, '0000-00-00 00:00:00', 'Ma. Silvia Rodriguez', '', '', '', '', '7108497 8671355100', '', '', '', '', '', ''),
(157, '0000-00-00 00:00:00', 'Gregorio Sifuentes Rendon', '', '', '', '', '1846741', '', '', '', '', '', ''),
(158, '0000-00-00 00:00:00', 'Adriana Hernandez', '', '', '', '', '1297481', '', '', '', '', '', ''),
(159, '0000-00-00 00:00:00', 'CESAR Santos', '', '', '', '', '8671933250', '', '', '', '', '', ''),
(160, '0000-00-00 00:00:00', 'Rafael Castillo', '', '', '', '', '8671754196', '', '', '', '', '', ''),
(161, '0000-00-00 00:00:00', 'Lucia Saucedo', '', '', '', '', '7124342', '', '', '', '', '', ''),
(162, '0000-00-00 00:00:00', 'Lucia Saucedo', '', '', '', '', '7124342', '', '', '', '', '', ''),
(163, '0000-00-00 00:00:00', 'Hector Cruz', '', '', '', '', '8671177526', '', '', '', '', '', ''),
(164, '0000-00-00 00:00:00', 'Martha Ortiz', '', 'Chromallox', '', '', '', '', '', '', '', '', ''),
(165, '0000-00-00 00:00:00', 'Claudia Macias', '', '', '', '', '', '', '', '', '', '', ''),
(166, '0000-00-00 00:00:00', 'Vianey Gonzalez', '', '', '', '', '7263651', '', '', '', '', '', ''),
(167, '0000-00-00 00:00:00', 'Luz Ma.', '', '', '', '', '8671281193', '', '', '', '', '', ''),
(168, '0000-00-00 00:00:00', 'Jesus Mata', '', '', '', '', '867 7209592', '', '', '', '', '', ''),
(169, '0000-00-00 00:00:00', 'Luis Hernandez', '', '', '', '', '8672170229', '', '', '', '', '', ''),
(170, '0000-00-00 00:00:00', 'israel diaz', '', '', '', '', '8671290743', '', '', '', '', '', ''),
(171, '0000-00-00 00:00:00', 'Hector Briones', '', '', '', '', '8121099348', '', '', '', '', '', ''),
(172, '0000-00-00 00:00:00', 'Martin Espinoza', '', '', '', '', '8677273330', '', '', '', '', '', ''),
(173, '0000-00-00 00:00:00', 'Roberto Aros', '', '', '', '', '8671249024', '', '', '', '', '', ''),
(174, '0000-00-00 00:00:00', 'Ma. de la cruz', '', '', '', '', '7246951', '', '', '', '', '', ''),
(175, '0000-00-00 00:00:00', 'Ma. de la cruz', '', '', '', '', '7246951', '', '', '', '', '', ''),
(176, '2017-01-17 18:00:00', 'Maria de la Cruz', '', '', '', '', '746951', '', '', '', '', 'Mexico', ''),
(177, '0000-00-00 00:00:00', 'Anali Tovar', '', '', '', '', '8672284076', '', '', '', '', '', ''),
(178, '2017-01-17 18:00:00', 'Juan Jose Pecera', '', 'calle 3 #58', '', '', '1941387', '', '', '', '', 'Mexico', ''),
(179, '2017-01-17 18:00:00', 'ONILOG SA DE CV', 'bresendez@onilog.com', 'Cerrada los 2 Laredos 7A', 'Parque Ind. 2 Laredos', '88185', '8677240420', '', 'ONI031125RS7', '', '', 'Mexico', ''),
(180, '0000-00-00 00:00:00', 'Roberto Glz', '', '', '', '', '8672170162', '', '', '', '', '', ''),
(181, '0000-00-00 00:00:00', 'Ana Laura valdez', '', '', '', '', '8341477971', '', '', '', '', '', ''),
(182, '0000-00-00 00:00:00', 'Julio de Hoyos', '', '', '', '', '7157460', '', '', '', '', '', ''),
(183, '0000-00-00 00:00:00', 'Veronica Hernandez', '', '', '', '', '', '', '', '', '', '', ''),
(184, '0000-00-00 00:00:00', 'ELISA GLZ', '', '', '', '', '7158212 78671241532', '', '', '', '', '', ''),
(185, '0000-00-00 00:00:00', 'Veronica de la Torre', '', '', '', '', '', '', '', '', '', '', ''),
(186, '0000-00-00 00:00:00', 'Nora Medellin', '', '', '', '', '8672188410', '', '', '', '', '', ''),
(187, '0000-00-00 00:00:00', 'Adan de Hoyos', '', '', '', '', '7105625', '', '', '', '', '', ''),
(188, '0000-00-00 00:00:00', 'Martha Flores', '', 'Monterrey 921 entre Canales y Mina', '', '', '7122323', '', '', '', '', '', ''),
(189, '0000-00-00 00:00:00', 'Primitivo Sepulveda', '', '', '', '', '8671290171', '', '', '', '', '', ''),
(190, '0000-00-00 00:00:00', 'Hector Montemayor', '', '', '', '', '8671922960', '', '', '', '', '', ''),
(191, '0000-00-00 00:00:00', 'Leslie Espinoza', '', '', '', '', '8677181823', '', '', '', '', '', ''),
(192, '0000-00-00 00:00:00', 'Diana Martinez', '', '', '', '', '9562693238', '', '', '', '', '', ''),
(193, '2017-01-27 18:00:00', 'Rosa imelda Guerrero', 'rosay@gruporeyes.net', '', '', '', '1295904', '', '', '', '', 'Mexico', ''),
(194, '0000-00-00 00:00:00', 'GUADALUPE CARRAZCO', '', '', '', '', '8671570901', '', '', '', '', '', ''),
(195, '0000-00-00 00:00:00', 'Jose Alberto Estrada', '', '', '', '', '8671133109', '', '', '', '', '', ''),
(196, '0000-00-00 00:00:00', 'Karla Velazco', '', '', '', '', '7156040 / 8678743812', '', '', '', '', '', ''),
(197, '0000-00-00 00:00:00', 'Mauro Cano', '', '', '', '', '8672175290', '', '', '', '', '', ''),
(198, '0000-00-00 00:00:00', 'Yolanda Perez', '', '', '', '', '8671779901', '', '', '', '', '', ''),
(199, '0000-00-00 00:00:00', 'Kate Flores', '', '', '', '', '8671797629', '', '', '', '', '', ''),
(200, '0000-00-00 00:00:00', 'Alan Villa', '', '', '', '', '8671308084', '', '', '', '', '', ''),
(201, '0000-00-00 00:00:00', 'Elsa Gonzalez', '', '', '', '', '8671299245', '', '', '', '', '', ''),
(202, '0000-00-00 00:00:00', 'jorge Sanchez', '', '', '', '', '8671931911', '', '', '', '', '', ''),
(203, '0000-00-00 00:00:00', 'Francisco Valdez', '', '', '', '', '0019566457798', '', '', '', '', '', ''),
(204, '0000-00-00 00:00:00', 'Angela', '', '', '', '', '8671928079', '', '', '', '', '', ''),
(205, '0000-00-00 00:00:00', 'Joel Reyes Garcia', '', '', '', '', '8671243969', '', '', '', '', '', ''),
(206, '0000-00-00 00:00:00', 'Jose Luis Gaimmar', '', '', '', '', '9562370031', '', '', '', '', '', ''),
(207, '0000-00-00 00:00:00', 'Jose Alberto Galindo', '', '', '', '', '', '', '', '', '', '', ''),
(208, '0000-00-00 00:00:00', 'Alfredo Aguilar', '', '', '', '', '1922216', '', '', '', '', '', ''),
(209, '0000-00-00 00:00:00', 'ANA LILIA ZAVALA', '', '', '', '', '8677355869', '', '', '', '', '', ''),
(210, '0000-00-00 00:00:00', 'SANTOS VAZQUEZ', '', '', '', '', '8675933513', '', '', '', '', '', ''),
(211, '0000-00-00 00:00:00', 'GLADIS LLANAS', 'gl4ls@hotmail.com', '', '', '', '0015128263144', '', '', '', '', '', ''),
(212, '0000-00-00 00:00:00', 'Marisol Reyes', 'emerv46@hotmail.com', '', '', '', '8677291234', '', '', '', '', '', ''),
(213, '0000-00-00 00:00:00', 'SAN JUANA RENDON', '', '', '', '', '8671832100', '', '', '', '', '', ''),
(214, '0000-00-00 00:00:00', 'Cesar Cruz', '', '', '', '', '5530200522', '', '', '', '', '', ''),
(215, '0000-00-00 00:00:00', 'RODOLFO GLZ', '', '', '', '', '8671414281', '', '', '', '', '', ''),
(216, '0000-00-00 00:00:00', 'ANDRES JIMENEZ', '', '', '', '', '8671051071', '', '', '', '', '', ''),
(218, '0000-00-00 00:00:00', 'Francisco Lerma', '', '', '', '', '9566671945', '', '', '', '', '', ''),
(219, '0000-00-00 00:00:00', 'Ingrid Gonzalez', '', '', '', '', '1328087', '', '', '', '', '', ''),
(220, '0000-00-00 00:00:00', 'Juan Manuel hernandez', '', '', '', '', '8672042317', '', '', '', '', '', ''),
(221, '0000-00-00 00:00:00', 'Pedro Lopez', '', '', '', '', '8671931829', '', '', '', '', '', ''),
(222, '0000-00-00 00:00:00', 'Adrian Hernandez', '', '', '', '', '8672239649', '', '', '', '', '', ''),
(223, '0000-00-00 00:00:00', 'Jose Gomez', '', '', '', '', '2056680', '', '', '', '', '', ''),
(224, '0000-00-00 00:00:00', 'Jose Luis Casas', '', '', '', '', '8671297339', '', '', '', '', '', ''),
(225, '0000-00-00 00:00:00', 'JOSE RABAGO', '', '', '', '', '8671553041', '', '', '', '', '', ''),
(226, '0000-00-00 00:00:00', 'JORGE ZERON ', '', '', '', '', '5554338755', '', '', '', '', '', ''),
(227, '0000-00-00 00:00:00', 'JESUS VAZQUEZ', '', '', '', '', '8677271356', '', '', '', '', '', ''),
(228, '0000-00-00 00:00:00', 'GABRIELA GONZALEZ', '', '', '', '', '2045710', '', '', '', '', '', ''),
(229, '0000-00-00 00:00:00', 'ERIKA SALINAS', '', '', '', '', '8671798177', '', '', '', '', '', ''),
(230, '0000-00-00 00:00:00', 'Vidal Aparicio', '', '', '', '', '9566022399', '', '', '', '', '', ''),
(231, '0000-00-00 00:00:00', 'Jaime Santillana', '', '', '', '', '7147282', '', '', '', '', '', ''),
(232, '0000-00-00 00:00:00', 'Angel Rodriguez', '', '', '', '', '2040482', '', '', '', '', '', ''),
(233, '0000-00-00 00:00:00', 'Jose Luis Chavoya', '', '', '', '', '86712047406', '', '', '', '', '', ''),
(234, '0000-00-00 00:00:00', 'Jose Luis Chavoya', '', '', '', '', '86712047406', '', '', '', '', '', ''),
(235, '0000-00-00 00:00:00', 'JULIO RUBIO', '', '', '', '', '', '', '', '', '', '', ''),
(236, '0000-00-00 00:00:00', 'GILBERTO MONTEMAYOR', '', '', '', '', '8672091230', '', '', '', '', '', ''),
(237, '0000-00-00 00:00:00', 'Denise reyes', '', '', '', '', '', '', '', '', '', '', ''),
(238, '0000-00-00 00:00:00', 'KARINA', '', '', '', '', '8117741107', '', '', '', '', '', ''),
(239, '0000-00-00 00:00:00', 'Lizeth Villasenor', '', '', '', '', '7111515 ext 5536', '', '', '', '', '', ''),
(240, '0000-00-00 00:00:00', 'tania gomez', '', '', '', '', '7115211', '', '', '', '', '', ''),
(241, '0000-00-00 00:00:00', 'Luis Garcia', '', '', '', '', '7149715', '', '', '', '', '', ''),
(242, '0000-00-00 00:00:00', 'Alejandro Torres', 'altorres_0906@hotmail.com', '', '', '', '8677392242', '', '', '', '', '', ''),
(243, '0000-00-00 00:00:00', 'Rene Inzunza', '', '', '', '', '', '', '', '', '', '', ''),
(244, '2017-02-20 18:00:00', 'Dora Alicia Perez Ramos', 'pames #2', 'casa 2 pisos rejas cafe', 'col. viveros ', '', '8671549578', '', '', '', '', 'Mexico', ''),
(245, '0000-00-00 00:00:00', 'CORINA CARRIZALES', '', '', '', '', '1981899', '', '', '', '', '', ''),
(246, '0000-00-00 00:00:00', 'MELISSA MARQUEZ', '', 'WIEGAND', '', '', '8671000756', '', '', '', '', '', ''),
(247, '0000-00-00 00:00:00', 'MICAELA DELGADO', '', 'DELPHI ALAMBRADOS', '', '', '', '', '', '', '', '', ''),
(248, '0000-00-00 00:00:00', 'SOLEDAD AYALA', '', '', '', '', '8671290292', '', '', '', '', '', ''),
(249, '0000-00-00 00:00:00', 'OCTAVIO ANDRES', '', '', '', '', '8671046287', '', '', '', '', '', ''),
(250, '0000-00-00 00:00:00', 'REYNALDO ROMO', '', '', '', '', '7110112', '', '', '', '', '', ''),
(251, '0000-00-00 00:00:00', 'jesica solalinde', '', '', '', '', '', '', '', '', '', '', ''),
(252, '0000-00-00 00:00:00', 'ALBA CASTILLO', '', '', '', '', '8679870913', '', '', '', '', '', ''),
(253, '0000-00-00 00:00:00', 'Aide Aguilar', '', '', '', '', '7115200', '', '', '', '', '', ''),
(254, '0000-00-00 00:00:00', 'GABRIELA HINOJOSA', '', '', '', '', '7194540 8671571344', '', '', '', '', '', ''),
(255, '0000-00-00 00:00:00', 'MIRIAM CARDENAS', '', '', '', '', '1099893', '', '', '', '', '', ''),
(256, '0000-00-00 00:00:00', 'LILIANA REYES', '', '', '', '', '8671295660', '', '', '', '', '', ''),
(257, '0000-00-00 00:00:00', 'Claudia Telles', '', '', '', '', '8671257421', '', '', '', '', '', ''),
(258, '0000-00-00 00:00:00', 'Basilio Ramos Guajardo', '', '', '', '', '8678600000', '', '', '', '', '', ''),
(259, '0000-00-00 00:00:00', 'Rebeca Hernandez', '', '', '', '', '', '', '', '', '', '', ''),
(260, '0000-00-00 00:00:00', 'DOLORES MARTINEZ', '', '', '', '', '8671026121', '', '', '', '', '', ''),
(261, '0000-00-00 00:00:00', 'Jorge Martinez', 'mtzjorge81@gmail.com', '', '', '', '8679057327', '', '', '', '', '', ''),
(262, '0000-00-00 00:00:00', 'Brenda Avelino', '', 'AAA', '', '', '7115800', '', '', '', '', '', ''),
(263, '0000-00-00 00:00:00', 'ERIKA SALINAS', '', '', '', '', '8671798177', '', '', '', '', '', ''),
(264, '0000-00-00 00:00:00', 'DR.ABRAHAM ROCHA', '', '', '', '', '92*948506*2', '', '', '', '', '', ''),
(265, '0000-00-00 00:00:00', 'ADRIAN LEIJA', '', '', '', '', '8677290111', '', '', '', '', '', ''),
(266, '0000-00-00 00:00:00', 'CHRISTIAN NERI', '', '', '', '', '8671265943', '', '', '', '', '', ''),
(267, '0000-00-00 00:00:00', 'Yessica Garcia Zarate', 'yessica.garcia@robertshaw.com', '', '', '', '8677143966', '', '', '', '', '', ''),
(268, '0000-00-00 00:00:00', 'Adrian Monrreal', '', '', '', '', '8671027921', '', '', '', '', '', ''),
(270, '0000-00-00 00:00:00', 'Martha Ramirez', '', '', '', '', '8671204022', '', '', '', '', '', ''),
(271, '0000-00-00 00:00:00', 'LUZ MARIA RUIZ', '', '', '', '', '8671290692', '', '', '', '', '', ''),
(272, '0000-00-00 00:00:00', 'Maribel Caballero', '', '', '', '', '8677272477', '', '', '', '', '', ''),
(273, '0000-00-00 00:00:00', 'ROSALBA CERDA', '', '', '', '', '', '', '', '', '', '', ''),
(274, '0000-00-00 00:00:00', 'ROSALBA CERDA', '', '', '', '', '', '', '', '', '', '', ''),
(275, '0000-00-00 00:00:00', 'NILBIA GARCIA', '', '', '', '', '', '', '', '', '', '', ''),
(276, '0000-00-00 00:00:00', 'YANETH SANTOYO', '', '', '', '', '7848579', '', '', '', '', '', ''),
(277, '0000-00-00 00:00:00', 'CORINA ZAVALA', '', '', '', '', '', '', '', '', '', '', ''),
(278, '0000-00-00 00:00:00', 'Bulklift', 'miriam.villalobos@bulklift.com', '', '', '', '', '', '', '', '', '', ''),
(279, '0000-00-00 00:00:00', 'JESUS VERDUZCO', '', 'CHIMALPOPOCA', '', '', '7190756', '', '', '', '', '', ''),
(280, '0000-00-00 00:00:00', 'Carolina molina', '', 'fromex', '', '', '71152xx', '', '', '', '', '', ''),
(281, '0000-00-00 00:00:00', 'Cyntia Tijerina', '', '', '', '', '8677292164', '', '', '', '', '', ''),
(282, '2017-03-14 18:00:00', 'Mayra Leija', '', '', '', '', '8677271057', '', '', '', '', 'Mexico', ''),
(283, '0000-00-00 00:00:00', 'Yuri Barreto', '', '', '', '', '8677272418', '', '', '', '', '', ''),
(284, '0000-00-00 00:00:00', 'Raquel Carranza Baez', '', '', '', '', '7100408', '', '', '', '', '', ''),
(285, '0000-00-00 00:00:00', 'Norma Hernandez', '', '', '', '', '2301446 /52*21092*12', '', '', '', '', '', ''),
(286, '0000-00-00 00:00:00', 'LUIS JULIO FALCON', 'mochito1940@hotmail.com', '', '', '', '9979738461', '', '', '', '', '', ''),
(287, '0000-00-00 00:00:00', 'Adriana Villareal', '', 'Arteaga #3701 Grupo GalvÃ¡n', '', '', '7120612', '', '', '', '', '', ''),
(288, '0000-00-00 00:00:00', 'Miriam Castaneda', '', 'Pedregal de San Angel #35', '', '', '7119370', '', '', '', '', '', ''),
(289, '0000-00-00 00:00:00', 'Lili Martinez', '', '', '', '', '1673037', '', '', '', '', '', ''),
(290, '0000-00-00 00:00:00', 'Nancy de la Cruz', '', '', '', '', '1813303', '', '', '', '', '', ''),
(291, '0000-00-00 00:00:00', 'Regina Alonso', '', '', '', '', '7115444', '', '', '', '', '', ''),
(292, '0000-00-00 00:00:00', 'Armando Martinez', '', '', '', '', '9870855', '', '', '', '', '', ''),
(293, '2017-03-22 18:00:00', 'Victor hugo Ascencio', '', '', '', '', '8671177535', '', '', '', '', 'Mexico', ''),
(294, '0000-00-00 00:00:00', 'Verenice Trejo', '', '', '', '', '8671171348', '', '', '', '', '', ''),
(295, '2017-03-23 18:00:00', 'Angelica Iruegas', 'angelica.iruega@rheem.com', '', '', '', '9562861716', '', '', '', '', 'Mexico', ''),
(296, '0000-00-00 00:00:00', 'Viviana Nikaye', '', '', '', '', '8123523600', '', '', '', '', '', ''),
(297, '2017-03-26 18:00:00', 'Carlos Hernandez', '', 'NiÃ±os HÃ©roes #1012', 'Hidalgo', '', '8677402014', '', '', '', '', 'Mexico', ''),
(298, '0000-00-00 00:00:00', 'Alfredo Jimenez', '', '', '', '', '8671835082', '', '', '', '', '', ''),
(299, '2017-03-27 18:00:00', 'Elva Puente', 'elva.puente@rheem.com', '', '', '', '', '', '', '', '', 'Mexico', ''),
(300, '0000-00-00 00:00:00', 'Ismael Perez', '', '', '', '', '8671029812', '', '', '', '', '', ''),
(301, '0000-00-00 00:00:00', 'Violeta Hernandez', '', '', '', '', '', '', '', '', '', '', ''),
(302, '0000-00-00 00:00:00', 'Dora Castillo', '', '', '', '', '7108500', '', '', '', '', '', ''),
(303, '0000-00-00 00:00:00', 'Edgar Flores', '', '', '', '', '8671020989', '', '', '', '', '', ''),
(304, '2017-03-30 18:00:00', 'Jorge Flores', '', 'Privada Ferrocarril Sur #3516 ', 'Juarez', '', '867 2050570', '', '', '', '', 'Mexico', ''),
(305, '0000-00-00 00:00:00', 'Adriana de Avalos', '', '', '', '', '1498972', '', '', '', '', '', ''),
(306, '0000-00-00 00:00:00', 'Eduardo Zavala', '', '', '', '', '8675794768', '', '', '', '', '', ''),
(307, '0000-00-00 00:00:00', 'Jorge Garcia', '', '', '', '', '8671413319', '', '', '', '', '', ''),
(308, '0000-00-00 00:00:00', 'Yuri Sotelo', '', '', '', '', '7145037', '', '', '', '', '', ''),
(309, '0000-00-00 00:00:00', 'San Juan Bosco', '', '', '', '', '7123468', '', '', '', '', '', ''),
(311, '0000-00-00 00:00:00', 'Miriam Lopez', '', '', '', '', '7115254', '', '', '', '', '', ''),
(312, '0000-00-00 00:00:00', 'Martha Martinez', 'martham30@hotmail.com', '', '', '', '4698166458', '', '', '', '', '', ''),
(313, '0000-00-00 00:00:00', 'Gerardo Rodriguez', '', '', '', '', '', '', '', '', '', '', ''),
(314, '0000-00-00 00:00:00', 'Mary Romo', '', 'Tamaulipas 2458', '', '', '8671262139', '', '', '', '', '', ''),
(315, '0000-00-00 00:00:00', 'Enrique Morales', '', '', '', '', '8671299802', '', '', '', '', '', ''),
(316, '0000-00-00 00:00:00', 'Yaxaira Arredondo', '', '', '', '', '7153314 ext 2', '', '', '', '', '', ''),
(317, '2017-04-06 18:00:00', 'Elizabeth Hernandez', '', '', '', '', '8671210734', '', '', '', '', 'Mexico', ''),
(318, '0000-00-00 00:00:00', 'Ana Rodriguez', '', '', '', '', '', '', '', '', '', '', ''),
(319, '0000-00-00 00:00:00', 'Claudia Zapata', '', '', '', '', '8677226562', '', '', '', '', '', ''),
(320, '0000-00-00 00:00:00', 'Priscila Torres', '', 'Ricardo de Hoyos Arizpe #5511', '', '', '8671920874', '', '', '', '', '', ''),
(321, '0000-00-00 00:00:00', 'FATME NERY', '', '', '', '', '2047938', '', '', '', '', '', ''),
(322, '0000-00-00 00:00:00', 'Rodriguez Gil Logistics', 'contabilidad@rdzgil.com', 'Bulevar Constituyentes 3617', '', '', '8677510313', '', '', '', '', '', ''),
(324, '2017-04-10 18:00:00', 'LOURDES CONTRERAS', 'lourdescontreras@akzent.mx', '', '', '', '8671580881', '', '', '', '', 'Mexico', ''),
(325, '2017-04-12 18:00:00', 'Daniela Jimenez', '', '', '', '', '8671284352', '', '', '', '', 'Mexico', ''),
(326, '0000-00-00 00:00:00', 'Gabriela Montes', '', '', '', '', '8671206937', '', '', '', '', '', ''),
(327, '0000-00-00 00:00:00', 'Arlene Vazquez', '', '', '', '', '8671411254', '', '', '', '', '', ''),
(328, '0000-00-00 00:00:00', 'Jose Juan Rangel', '', '', '', '', '8671172186', '', '', '', '', '', ''),
(329, '0000-00-00 00:00:00', 'Esteban Flores', '', '', '', '', '8677532180', '', '', '', '', '', ''),
(330, '0000-00-00 00:00:00', 'Cinthia Rojas', '8677406564', '', '', '', 'Av. de la Republica ', '', '', '', '', '', ''),
(331, '0000-00-00 00:00:00', 'Maria Garza', '', 'DELPHI ALAMBRADOS', '', '', '7116000 ext 2155', '', '', '', '', '', ''),
(332, '0000-00-00 00:00:00', 'Erik Reyes', '', '', '', '', '1944092', '', '', '', '', '', ''),
(333, '0000-00-00 00:00:00', 'Ma. del Carmen Rodriguez', '', '', '', '', '9563071670', '', '', '', '', '', ''),
(334, '0000-00-00 00:00:00', 'Zaid Lam Eventos', '', '', '', '', '8343145395', '', '', '', '', '', ''),
(335, '0000-00-00 00:00:00', 'Norma Torres', '', '', '', '', '7115800 ext 5803', '', '', '', '', '', ''),
(336, '0000-00-00 00:00:00', 'Luis Mauricio Vicharelli', 'lmvicharelli13@yahoo.com', '', '', '', '8671487811', '', '', '', '', '', ''),
(337, '0000-00-00 00:00:00', 'consorcio aduanero del bajio', '', '', '', '', '7130717', '', '', '', '', '', ''),
(338, '0000-00-00 00:00:00', 'Isabel Lopez', '', 'Aldama 2136', '', '', '7152626', '', '', '', '', '', ''),
(339, '0000-00-00 00:00:00', 'FILIBERTO TORRES', '', '', '', '', '7101450', '', '', '', '', '', ''),
(340, '0000-00-00 00:00:00', 'ANGELA VILLA', '', '', '', '', '', '', '', '', '', '', ''),
(341, '0000-00-00 00:00:00', 'FRANCISCO', '', '', '', '', '', '', '', '', '', '', ''),
(342, '0000-00-00 00:00:00', 'Sergio Del Rio Raz', '', '', '', '', '', '', '', '', '', '', ''),
(343, '0000-00-00 00:00:00', 'Saidi Aldrete', '', '', '', '', '', '', '', '', '', '', ''),
(344, '0000-00-00 00:00:00', 'MARIA REYES', 'm.reyes@emerson.com', '', '', '', '7115200', '', '', '', '', '', ''),
(345, '0000-00-00 00:00:00', 'Fabian Canseco', 'edinsa-diseno@hotmail.com', '', '', '', '7159009', '', '', '', '', '', ''),
(346, '2021-06-19 20:32:20', 'Abigail Reyesiii', 'abigailreyesquintero@gmail.com', NULL, NULL, NULL, '9564133851', NULL, NULL, NULL, NULL, NULL, NULL),
(347, '0000-00-00 00:00:00', 'Ricardo Castro', '', '', '', '', '8671290597', '', '', '', '', '', ''),
(348, '0000-00-00 00:00:00', 'Ricardo Noyola', 'noyo969@gmail.com', '', '', '', '956-220-4845', '', '', '', '', '', ''),
(349, '0000-00-00 00:00:00', 'Amanda Torres', '', '', '', '', '7141832', '', '', '', '', '', ''),
(350, '0000-00-00 00:00:00', 'Martin Ramirez', '', '', '', '', '8672063068', '', '', '', '', '', ''),
(351, '0000-00-00 00:00:00', 'Aileen Servin', '', '', '', '', '8671412025', '', '', '', '', '', ''),
(352, '0000-00-00 00:00:00', 'Ana Maria Maldonado', '', '', '', '', '7145846', '', '', '', '', '', 'Santos Esquivel y Cia.'),
(354, '0000-00-00 00:00:00', 'Lorena Rendon', 'lorena.rendon@rheem.com', '', '', '', '', '', '', '', '', '', ''),
(355, '2017-05-03 18:00:00', 'JAVIER FEERNANDEZ', '', '', '', '', '8671294398', '', '', '', '', 'Mexico', ''),
(356, '0000-00-00 00:00:00', 'Olga Lidia Sustaita', '', '', '', '', '7123218', '', '', '', '', '', ''),
(357, '0000-00-00 00:00:00', 'Aide soto', '', '', '', '', '8671293374', '', '', '', '', '', ''),
(358, '0000-00-00 00:00:00', 'Norma Esthela Aguirre Bocardo', '', '', '', '', '', '', '', '', '', '', ''),
(359, '0000-00-00 00:00:00', 'Wendy Aguilera', '', '', '', '', '8671049441', '', '', '', '', '', ''),
(360, '0000-00-00 00:00:00', 'DULCE CASTEÃ‘ON', '', '', '', '', '7110000 EXT 0237', '', '', '', '', '', ''),
(361, '0000-00-00 00:00:00', 'GLORIA RIOS', 'gloria.rios@rheem.com', '', '', '', '7111515 EXT 5534', '', '', '', '', '', ''),
(362, '0000-00-00 00:00:00', 'PEDRO GARCIA', 'pedro.garcia@ka-group.com', '', '', '', '8671035747', '', '', '', '', '', ''),
(363, '2017-05-10 18:00:00', 'Guadalupe Belman', '', '', '', '', '', '', '', '', '', 'Mexico', ''),
(364, '0000-00-00 00:00:00', 'VICTORIA HERNANDEZ', '', '', '', '', '9562362966', '', '', '', '', '', ''),
(365, '0000-00-00 00:00:00', 'ORALIA CHAVEZ', '', '', '', '', '8677359651', '', '', '', '', '', ''),
(366, '0000-00-00 00:00:00', 'Jesica Ortiz', '', '', '', '', '8672158182', '', '', '', '', '', ''),
(367, '0000-00-00 00:00:00', 'Virginia BriseÃ±o', '', '', '', '', '8672363174', '', '', '', '', '', ''),
(368, '0000-00-00 00:00:00', 'MARIA DOLORES GAMBOA', '', '', '', '', '8671487539', '', '', '', '', '', ''),
(369, '0000-00-00 00:00:00', 'SANDRA BRISEÃ‘O', '', '', '', '', '', '', '', '', '', '', ''),
(370, '0000-00-00 00:00:00', 'LUIS TURRUBIATES', '', '', '', '', '8671000045', '', '', '', '', '', ''),
(371, '0000-00-00 00:00:00', 'Monica Castillo', '', '', '', '', '8671811298', '', '', '', '', '', ''),
(372, '0000-00-00 00:00:00', 'JUAN ANTONIO TORRES', '', '', '', '', '8671247898', '', '', '', '', '', ''),
(373, '0000-00-00 00:00:00', 'Francisco Velasco', 'velasfj@cat.com', '', '', '', '', '', '', '', '', '', ''),
(374, '0000-00-00 00:00:00', 'Giovanni Falcon', '', '', '', '', '8671400155', '', '', '', '', '', ''),
(375, '0000-00-00 00:00:00', 'Lorenzo Castro', '', '', '', '', '', '', '', '', '', '', ''),
(376, '0000-00-00 00:00:00', 'Aurora Solalinde', '', 'JUAREZ (presidencia 2 piso) ', '', '', '8671056158', '', '', '', '', '', ''),
(377, '0000-00-00 00:00:00', 'Liliana Sanchez', '', '', '', '', '8110303478', '', '', '', '', '', ''),
(378, '0000-00-00 00:00:00', 'mateo Vidal', 'matevidal24@gmail.com', '', '', '', '', '', '', '', '', '', ''),
(379, '0000-00-00 00:00:00', 'hector Valdez', '', '', '', '', '8672053810', '', '', '', '', '', ''),
(380, '0000-00-00 00:00:00', 'RICARDO GUAJARDO', '', '', '', '', '8672023736', '', '', '', '', '', ''),
(381, '0000-00-00 00:00:00', 'Lic. Francisco Garcia', '', '', '', '', '1324448', '', '', '', '', '', ''),
(382, '0000-00-00 00:00:00', 'PILAR ESCAMILLA', 'iia.pilar.escamilla@gmail.com', '', '', '', '1940322', '', '', '', '', '', ''),
(383, '0000-00-00 00:00:00', 'Amilcar Ramos', '', '', '', '', '', '', '', '', '', '', ''),
(384, '0000-00-00 00:00:00', 'francisco Camacho', 'refri21@hotmail.com', '', '', '', '8677272443', '', '', '', '', '', ''),
(385, '0000-00-00 00:00:00', 'Leticia juarez', '', '', '', '', '8671405443', '', '', '', '', '', ''),
(386, '0000-00-00 00:00:00', 'GABY ALVARADO', '', '', '', '', '8671806188', '', '', '', '', '', ''),
(387, '0000-00-00 00:00:00', 'Rocio Garcia', '', '', '', '', '7193015', '', '', '', '', '', ''),
(388, '0000-00-00 00:00:00', 'Jesica Martinez', '', '', '', '', '8672458000', '', '', '', '', '', ''),
(389, '0000-00-00 00:00:00', 'May Garcia', '', '', '', '', '8671910363', '', '', '', '', '', ''),
(390, '0000-00-00 00:00:00', 'Jesus Juarez', '', '', '', '', '', '', '', '', '', '', ''),
(391, '2017-06-13 18:00:00', 'Arturo Hernandez', '', '', '', '', '', '', '', '', '', 'Mexico', ''),
(392, '0000-00-00 00:00:00', 'Lorena jaramillo', '', '', '', '', '2020292', '', '', '', '', '', ''),
(393, '0000-00-00 00:00:00', 'Brenda del Valle', '', '', '', '', '', '', '', '', '', '', ''),
(394, '0000-00-00 00:00:00', 'LIZETH GRANGER', '', '', '', '', '8677442559', '', '', '', '', '', ''),
(395, '2017-06-14 18:00:00', 'IRMA GRACIELA ALVARADO', 'grace_ac@msn.com', 'YUCATAN 1833', '', '', '8671498152', '', '', '', '', 'Mexico', ''),
(396, '0000-00-00 00:00:00', 'MELISA SALAZAR', '', '', '', '', '8677295859', '', '', '', '', '', ''),
(397, '0000-00-00 00:00:00', 'LUZ ELENA PEREZ', '', '', '', '', '1926100', '', '', '', '', '', ''),
(398, '0000-00-00 00:00:00', 'Ricardo Sosa', '', '', '', '', '9564804151', '', '', '', '', '', ''),
(399, '0000-00-00 00:00:00', 'Brenda Berlanga', '', 'Ayutla #165 col. B. Juarez', '', '', '7173274', '', '', '', '', '', ''),
(400, '0000-00-00 00:00:00', 'MARIA M. CASTILLO', '', '', '', '', '7140192', '', '', '', '', '', ''),
(401, '0000-00-00 00:00:00', 'Guadalupe Rueda', '', '', '', '', '8677172117 / 9568982', '', '', '', '', '', ''),
(402, '0000-00-00 00:00:00', 'Juan Federico Valladares', '', '', '', '', '8671782247', '', '', '', '', '', ''),
(403, '0000-00-00 00:00:00', 'Guadalupe Barragan', 'Guadalupe.Barragan@emerson.com ', '', '', '', '7115230', '', '', '', '', '', ''),
(404, '0000-00-00 00:00:00', 'Eduardo Montalvo', 'lalomontalvo2@gmail.com', '', '', '', '8117058848', '', '', '', '', '', ''),
(405, '0000-00-00 00:00:00', 'Silvia Sosa', '', '', '', '', '', '', '', '', '', '', ''),
(406, '0000-00-00 00:00:00', 'Silvia Sosa', '', '', '', '', '', '', '', '', '', '', ''),
(407, '0000-00-00 00:00:00', 'Jose Miguel Valenzuela Lopez', 'jm.valenzuela.lopez@gmail.com', '', '', '', '', '', '', '', '', '', ''),
(408, '0000-00-00 00:00:00', 'gelasio palomo', '', '', '', '', '9053915', '', '', '', '', '', ''),
(409, '0000-00-00 00:00:00', 'Claudia Trejo', '', '', '', '', '867 2021219/ 8677706', '', '', '', '', '', ''),
(410, '0000-00-00 00:00:00', 'Rodlfo Villalobos', '', '', '', '', '1581950', '', '', '', '', '', ''),
(411, '0000-00-00 00:00:00', 'Miriam Montes', '', '', '', '', '8677290760', '', '', '', '', '', ''),
(415, '0000-00-00 00:00:00', 'Alfredo Garza', '', '', '', '', '8671934938', '', '', '', '', '', ''),
(416, '0000-00-00 00:00:00', 'Ruben Aguirre', '', '', '', '', '1055174', '', '', '', '', '', ''),
(417, '0000-00-00 00:00:00', 'Austreberto VillafaÃ±a', '', '', '', '', '8677225238', '', '', '', '', '', ''),
(418, '0000-00-00 00:00:00', 'Raul Palomo', '', '', '', '', '1095991', '', '', '', '', '', ''),
(419, '0000-00-00 00:00:00', 'Georgina Cabrera', 'georgina.cabrera@gmail.com', '', '', '', '9567445456', '', '', '', '', '', ''),
(420, '0000-00-00 00:00:00', 'victor martinez mendez', '', '', '', '', '1325975', '', '', '', '', '', ''),
(421, '0000-00-00 00:00:00', 'Maria Dolores Reyes', 'md.reyes@hotmail.com', 'Washington 1115', '', '', '8671292823', '', '', '', '', '', ''),
(422, '0000-00-00 00:00:00', 'Elva Alvarado', '', '', '', '', '8671002967', '', '', '', '', '', ''),
(423, '0000-00-00 00:00:00', 'Alexia Ramirez', '', '', '', '', '8677501595', '', '', '', '', '', ''),
(424, '0000-00-00 00:00:00', 'Hiram Carriles ', '', 'rheem laboratorio', '', '', '7110703', '', '', '', '', '', ''),
(425, '0000-00-00 00:00:00', 'Monica Martinez', 'Monicamartinez@akzent.mx', '', '', '', '7158420 ext 196', '', '', '', '', '', ''),
(426, '0000-00-00 00:00:00', 'Victor Martinez', '', '', '', '', '', '', '', '', '', '', ''),
(427, '0000-00-00 00:00:00', 'Cinthya Contreras', '', '', '', '', '8671928132', '', '', '', '', '', ''),
(428, '0000-00-00 00:00:00', 'LOURDES DE CUESTA', '', '', '', '', '7706400', '', '', '', '', '', ''),
(429, '0000-00-00 00:00:00', 'SOCORRO VAZQUEZ', '', '', '', '', '8677100394', '', '', '', '', '', ''),
(430, '0000-00-00 00:00:00', 'YARATZE CAMACHO GOMEZ', '', '', '', '', '8677536061', '', '', '', '', '', ''),
(431, '0000-00-00 00:00:00', 'JUAN ZAMORA', '', '', '', '', '5229669', '', '', '', '', '', ''),
(432, '0000-00-00 00:00:00', 'Moises Guzman', '', 'Andromeda 227', '', '', '5510441111', '', '', '', '', '', ''),
(433, '0000-00-00 00:00:00', 'Fidel Hernandez', '', '', '', '', '9631784487', '', '', '', '', '', ''),
(434, '0000-00-00 00:00:00', 'berta saito', '', '', '', '', '', '', '', '', '', '', ''),
(435, '0000-00-00 00:00:00', 'miguel zamora', '', '', '', '', '8671000045', '', '', '', '', '', ''),
(436, '0000-00-00 00:00:00', 'Marcelino Rodriguez', '', 'Ldo. Texas', '', '', '9566126767', '', '', '', '', '', ''),
(437, '0000-00-00 00:00:00', 'Marina Fresnillo', 'marinacarrizales76@hotmail.com', '5508 Conroe st.', '', '', '9567639397', '', '', '', '', '', ''),
(438, '0000-00-00 00:00:00', 'Alberto Martinez', 'alberto.martinezglz@outlook.es', 'iturbide 3310', '', '', '8671281402', '', '', '', '', '', ''),
(439, '0000-00-00 00:00:00', 'Acira Garza', '', '', '', '', '7155915', '', '', '', '', '', ''),
(440, '0000-00-00 00:00:00', 'Alicia Garcia', 'garcia_soto_alicia_n@cat.com', 'CAT LOGISTIC', '', '', '8671631337', '', '', '', '', '', ''),
(441, '0000-00-00 00:00:00', 'Lupita Sanchez', '', 'Fromex', '', '', '7155213', '', '', '', '', '', ''),
(442, '0000-00-00 00:00:00', 'LUCIA MENDEZ', '', '', '', '', '7155915', '', '', '', '', '', ''),
(443, '2021-06-19 12:22:29', 'Tere Hdz.', '', '', '', '', '', '', '', '', '', '', ''),
(444, '2021-06-19 06:12:16', 'demo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(445, '2021-06-20 04:57:52', 'shuvro', 'shuvroroy@gmail.com', 'domicilio', 'colonia', 'cp', '354513212354564', '3452343', 'rfc', '324324', 'estado', 'pais', 'comment'),
(447, '2021-07-06 16:07:01', 'test123', '123@gmail.com', 'dhaka', NULL, NULL, '123', NULL, NULL, NULL, NULL, NULL, NULL),
(448, '2021-07-10 14:47:50', 'service', 'user@user.com', 'dhaka', NULL, NULL, '12', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cuentas`
--

CREATE TABLE `cuentas` (
  `idcuentas` int(10) UNSIGNED NOT NULL,
  `fetcha_hora` datetime NOT NULL,
  `idproveedor` int(10) UNSIGNED NOT NULL,
  `importe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comentarios` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cuentas`
--

INSERT INTO `cuentas` (`idcuentas`, `fetcha_hora`, `idproveedor`, `importe`, `comentarios`) VALUES
(2, '2021-07-10 23:09:54', 2, '34', 'fdsvsdv'),
(3, '2021-07-11 00:06:01', 2, '200', 'test comment');

-- --------------------------------------------------------

--
-- Table structure for table `cuentas_pagos`
--

CREATE TABLE `cuentas_pagos` (
  `idpagos` int(10) UNSIGNED NOT NULL,
  `idcuenta` int(10) UNSIGNED NOT NULL,
  `fetcha_hora` datetime NOT NULL,
  `cantidad` int(11) NOT NULL,
  `comentario` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cuentas_pagos`
--

INSERT INTO `cuentas_pagos` (`idpagos`, `idcuenta`, `fetcha_hora`, `cantidad`, `comentario`) VALUES
(1, 2, '2021-07-10 23:09:54', 34, 'fdsvsdv'),
(15, 3, '2021-07-11 14:39:53', 10, ''),
(17, 3, '2021-07-11 14:40:21', 30, ''),
(18, 3, '2021-07-11 14:40:35', 40, '');

-- --------------------------------------------------------

--
-- Table structure for table `destinatarios`
--

CREATE TABLE `destinatarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `idventa` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fetcha_hora` datetime NOT NULL,
  `referencia` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mensaje` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `colonia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codigopostal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commentarios` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `destinatarios`
--

INSERT INTO `destinatarios` (`id`, `idventa`, `nombre`, `direccion`, `fetcha_hora`, `referencia`, `mensaje`, `colonia`, `codigopostal`, `commentarios`, `created_at`, `updated_at`) VALUES
(2, 32, 'test3', 'd3', '2021-07-10 19:33:20', 'r3', '333', 'c3', 'o3', '33333', '2021-07-08 13:34:25', '2021-07-08 19:39:49'),
(3, 28, 'testy', 'dir', '2021-07-10 18:48:03', 'ref', 'msg', 'col', 'cp', NULL, NULL, '2021-07-10 09:00:56'),
(5, 33, NULL, NULL, '2021-07-11 20:43:00', NULL, NULL, NULL, NULL, NULL, '2021-07-11 14:44:14', '2021-07-11 14:44:14'),
(6, 34, NULL, NULL, '2021-07-11 20:50:00', NULL, NULL, NULL, NULL, NULL, '2021-07-11 14:50:31', '2021-07-11 14:50:31'),
(7, 35, NULL, NULL, '2021-07-12 02:59:00', NULL, NULL, NULL, NULL, NULL, '2021-07-11 21:00:02', '2021-07-11 21:00:02'),
(8, 36, 'nom', 'dir', '2021-07-12 07:08:00', NULL, NULL, NULL, NULL, NULL, '2021-07-12 01:09:05', '2021-07-12 01:09:05');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2021_01_25_060935_create_users_table', 2),
(8, '2021_01_25_062401_password_resets', 2),
(9, '2021_06_23_185509_create_ventas_table', 3),
(12, '2021_06_23_205640_create_ventas_articulos_table', 4),
(13, '2021_06_23_231110_create_ventas_creditos_table', 5),
(15, '2021_06_23_232239_create_ventas_pagos_table', 6),
(18, '2021_06_29_193524_create_proveedores_table', 7),
(21, '2021_07_03_165707_create_destinatarios_table', 8),
(22, '2021_07_08_232246_create_ventas_estados_table', 9),
(24, '2021_07_10_162257_create_table_servicios', 10),
(26, '2021_07_10_193723_create_servicios_pagos_table', 12),
(27, '2021_07_10_180203_create_table_servicios_articulos', 13),
(28, '2021_07_10_213011_create_cuentas_table', 13),
(30, '2021_07_10_213040_create_cuentas_pagos_table', 14),
(31, '2021_07_10_230611_drop_column_cuentas_table', 15);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proveedores`
--

CREATE TABLE `proveedores` (
  `idproveedores` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domicilio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `colonia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codigopostal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rfc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pais` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contacto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `proveedores`
--

INSERT INTO `proveedores` (`idproveedores`, `nombre`, `correo`, `domicilio`, `colonia`, `codigopostal`, `telefono`, `rfc`, `estado`, `pais`, `contacto`, `created_at`, `updated_at`) VALUES
(2, 'PALACIO FLORAL SA DE CV', NULL, NULL, NULL, NULL, '7122389', NULL, NULL, NULL, NULL, '2021-06-30 15:07:55', '2021-06-30 15:07:55');

-- --------------------------------------------------------

--
-- Table structure for table `servicios`
--

CREATE TABLE `servicios` (
  `idservicios` int(10) UNSIGNED NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `idcliente` int(11) DEFAULT NULL,
  `idusuario` int(10) UNSIGNED NOT NULL,
  `descuento` int(11) DEFAULT NULL,
  `estatus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `po` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `servicios`
--

INSERT INTO `servicios` (`idservicios`, `fecha_hora`, `idcliente`, `idusuario`, `descuento`, `estatus`, `po`) VALUES
(2, '2021-07-10 20:56:00', 2, 1, 0, 'Pendiente', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `servicios_archivos`
--

CREATE TABLE `servicios_archivos` (
  `idarchivos` int(255) NOT NULL,
  `idservicio` int(255) NOT NULL,
  `fecha` date NOT NULL,
  `archivo` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `servicios_articulos`
--

CREATE TABLE `servicios_articulos` (
  `idsa` int(10) UNSIGNED NOT NULL,
  `idservicio` int(10) UNSIGNED NOT NULL,
  `idarticulo` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `servicios_pagos`
--

CREATE TABLE `servicios_pagos` (
  `idpagos` int(10) UNSIGNED NOT NULL,
  `idservicio` int(10) UNSIGNED NOT NULL,
  `fetcha_hora` datetime NOT NULL,
  `cantidad` int(11) NOT NULL,
  `comentario` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `metodo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `servicios_pagos`
--

INSERT INTO `servicios_pagos` (`idpagos`, `idservicio`, `fetcha_hora`, `cantidad`, `comentario`, `metodo`) VALUES
(1, 2, '2021-07-10 20:56:01', 1550, '', 'Efectivo');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `privilegio` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `privilegio`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'shuvro', 'shuvro@gmail.com', '$2y$10$3V21nucHhL0YiwRQh4YtlOhTUIkivELnrXacVr4H6cPqCcXN0gOMm', 1, NULL, NULL, NULL),
(6, 'demo', 'demo@gmail.com', '$2y$10$iEY7p2UmL1josw4RHjxojuatk3wY3K8gN74qxX4scQYAWjmyxevz6', 2, NULL, '2021-06-29 12:52:04', '2021-06-29 13:24:04');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuarios` int(255) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `privilegio` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`idusuarios`, `nombre`, `email`, `password`, `privilegio`) VALUES
(1, 'Rodolfo Resendez', 'rodolfo.resendez@f403.mx', 'rodolfo', 1),
(2, 'Edith', 'clientes.matices@gmail.com', 'juarez1939', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ventas`
--

CREATE TABLE `ventas` (
  `idventas` int(10) UNSIGNED NOT NULL,
  `fetcha_hora` datetime NOT NULL,
  `idcliente` int(11) DEFAULT NULL,
  `idusuario` int(10) UNSIGNED NOT NULL,
  `descuento` int(11) DEFAULT NULL,
  `estatus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ventas`
--

INSERT INTO `ventas` (`idventas`, `fetcha_hora`, `idcliente`, `idusuario`, `descuento`, `estatus`, `created_at`, `updated_at`) VALUES
(1, '2016-06-24 10:06:47', 3, 1, 0, 'Entregado', NULL, NULL),
(3, '2016-06-24 14:06:44', 4, 1, 10, 'Entregado', NULL, NULL),
(4, '2016-07-05 13:07:44', 5, 1, 0, 'Entregado', NULL, NULL),
(5, '2016-07-05 14:07:31', 6, 1, 0, 'Entregado', NULL, NULL),
(6, '2016-07-05 16:07:30', 7, 1, 0, 'Entregado', NULL, NULL),
(7, '2021-07-05 22:51:23', 2, 1, NULL, 'Pendiente', '2021-07-05 16:51:23', '2021-07-05 16:51:23'),
(9, '2021-07-05 23:25:46', 3, 1, 0, 'Pendiente', '2021-07-05 17:25:46', '2021-07-05 17:25:46'),
(10, '2021-07-05 23:27:19', 3, 1, 0, 'Pendiente', '2021-07-05 17:27:19', '2021-07-05 17:27:19'),
(11, '2021-07-05 23:35:21', 2, 1, 0, 'Pendiente', '2021-07-05 17:35:21', '2021-07-05 17:35:21'),
(12, '2021-07-05 23:35:54', 2, 1, 0, 'Pendiente', '2021-07-05 17:35:54', '2021-07-05 17:35:54'),
(13, '2021-07-05 23:37:18', 2, 1, 0, 'Pendiente', '2021-07-05 17:37:18', '2021-07-05 17:37:18'),
(16, '2021-07-05 23:48:14', 7, 1, 0, 'Pendiente', '2021-07-05 17:48:14', '2021-07-05 17:48:14'),
(17, '2021-07-06 18:24:36', 3, 1, 0, 'Pendiente', '2021-07-06 12:24:36', '2021-07-06 12:24:36'),
(18, '2021-07-06 18:25:41', 3, 1, 0, 'Pendiente', '2021-07-06 12:25:41', '2021-07-06 12:25:41'),
(19, '2021-07-06 18:27:02', 2, 1, 0, 'Pendiente', '2021-07-06 12:27:02', '2021-07-06 12:27:02'),
(20, '2021-07-06 18:30:35', 2, 1, 0, 'Pendiente', '2021-07-06 12:30:35', '2021-07-06 12:30:35'),
(21, '2021-07-06 18:31:53', NULL, 1, 0, 'Pendiente', '2021-07-06 12:31:53', '2021-07-06 12:31:53'),
(22, '2021-07-06 18:34:59', NULL, 1, 0, 'Pendiente', '2021-07-06 12:34:59', '2021-07-06 12:34:59'),
(23, '2021-07-06 21:19:59', 4, 1, 0, 'Pendiente', '2021-07-06 15:19:59', '2021-07-06 15:19:59'),
(24, '2021-07-06 21:21:17', 4, 1, 0, 'Pendiente', '2021-07-06 15:21:17', '2021-07-06 15:21:17'),
(25, '2021-07-06 21:22:14', 4, 1, 0, 'Entregado', '2021-07-06 15:22:14', '2021-07-09 14:24:07'),
(26, '2021-07-06 21:27:17', 4, 1, 0, 'Pendiente', '2021-07-06 15:27:17', '2021-07-06 15:27:17'),
(27, '2021-07-06 21:28:52', 4, 1, 0, 'Pendiente', '2021-07-06 15:28:52', '2021-07-06 15:28:52'),
(28, '2021-07-06 21:29:55', 4, 1, 0, 'Pendiente', '2021-07-06 15:29:55', '2021-07-10 10:13:22'),
(29, '2021-07-09 19:38:11', 1, 1, 0, 'En Proceso', '2021-07-07 13:29:35', '2021-07-09 15:56:29'),
(32, '2021-07-09 18:22:45', 4, 1, 2, 'En Ruta', '2021-07-08 13:34:25', '2021-07-10 09:10:01'),
(33, '2021-07-11 20:44:13', 445, 1, 0, 'Pendiente', '2021-07-11 14:44:13', '2021-07-11 14:44:13'),
(34, '2021-07-11 20:50:30', 445, 1, 0, 'Pendiente', '2021-07-11 14:50:30', '2021-07-11 14:50:30'),
(35, '2021-07-12 07:08:19', 445, 1, 0, 'Pendiente', '2021-07-11 21:00:02', '2021-07-12 01:08:19'),
(36, '2021-07-12 07:09:04', 2, 1, 0, 'Pendiente', '2021-07-12 01:09:04', '2021-07-12 01:09:04');

-- --------------------------------------------------------

--
-- Table structure for table `ventas_articulos`
--

CREATE TABLE `ventas_articulos` (
  `idva` int(10) UNSIGNED NOT NULL,
  `idventa` int(10) UNSIGNED NOT NULL,
  `idarticulo` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ventas_articulos`
--

INSERT INTO `ventas_articulos` (`idva`, `idventa`, `idarticulo`, `precio`, `cantidad`, `total`) VALUES
(1, 1, 4, 300, 1, 300),
(4, 3, 7, 570, 1, 570),
(7, 3, 4, 50, 1, 50),
(15, 16, 16, 30, 2, 60),
(16, 16, 17, 50, 3, 150),
(17, 16, 18, 60, 4, 240),
(18, 20, 17, 50, 5, 250),
(19, 21, 19, 80, 5, 400),
(20, 22, 4, 300, 3, 900),
(21, 22, 5, 680, 5, 3400),
(22, 23, 4, 300, 1, 300),
(23, 23, 5, 680, 2, 1360),
(24, 23, 16, 30, 3, 90),
(25, 23, 39, 750, 4, 3000),
(26, 23, 13, 580, 5, 2900),
(27, 24, 4, 300, 1, 300),
(28, 24, 5, 680, 2, 1360),
(29, 24, 16, 30, 3, 90),
(30, 24, 39, 750, 4, 3000),
(31, 24, 13, 580, 5, 2900),
(32, 25, 4, 300, 1, 300),
(33, 25, 5, 680, 2, 1360),
(34, 25, 16, 30, 3, 90),
(35, 25, 39, 750, 4, 3000),
(36, 25, 13, 580, 5, 2900),
(39, 26, 16, 30, 3, 90),
(40, 26, 39, 750, 4, 3000),
(41, 26, 13, 580, 5, 2900),
(42, 27, 4, 300, 1, 300),
(43, 27, 5, 680, 2, 1360),
(44, 27, 16, 30, 3, 90),
(45, 27, 39, 750, 4, 3000),
(46, 27, 13, 580, 5, 2900),
(47, 28, 4, 300, 1, 300),
(48, 28, 5, 680, 2, 1360),
(49, 28, 16, 30, 3, 90),
(50, 28, 39, 750, 4, 3000),
(51, 28, 13, 580, 5, 2900),
(57, 29, 5, 300, 1, 300),
(58, 29, 16, 680, 2, 1360),
(60, 33, 4, 300, 1, 300),
(61, 33, 5, 680, 1, 680),
(62, 33, 16, 30, 1, 30),
(63, 34, 17, 50, 2, 100),
(65, 35, 13, 300, 3, 900),
(66, 36, 7, 570, 1, 570);

-- --------------------------------------------------------

--
-- Table structure for table `ventas_creditos`
--

CREATE TABLE `ventas_creditos` (
  `idcreditos` int(10) UNSIGNED NOT NULL,
  `idventa` int(10) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `comentarios` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ventas_creditos`
--

INSERT INTO `ventas_creditos` (`idcreditos`, `idventa`, `fecha`, `comentarios`) VALUES
(1, 1, '2016-07-05', 'comment'),
(2, 3, '2016-07-05', 'test'),
(3, 26, '2021-07-09', 'tt'),
(4, 26, '2021-07-09', 't2'),
(5, 26, '2021-07-09', 'N/A'),
(6, 35, '2021-07-12', 'ttcom');

-- --------------------------------------------------------

--
-- Table structure for table `ventas_estados`
--

CREATE TABLE `ventas_estados` (
  `idestados` int(10) UNSIGNED NOT NULL,
  `idventa` int(10) UNSIGNED NOT NULL,
  `fetcha_hora` datetime NOT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentarios` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ventas_estados`
--

INSERT INTO `ventas_estados` (`idestados`, `idventa`, `fetcha_hora`, `estado`, `commentarios`) VALUES
(1, 32, '2021-07-10 15:10:01', 'En Ruta', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ventas_pagos`
--

CREATE TABLE `ventas_pagos` (
  `idpagos` int(10) UNSIGNED NOT NULL,
  `idventa` int(10) UNSIGNED NOT NULL,
  `fetcha_hora` datetime NOT NULL,
  `cantidad` int(11) NOT NULL,
  `comentario` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `metodo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ventas_pagos`
--

INSERT INTO `ventas_pagos` (`idpagos`, `idventa`, `fetcha_hora`, `cantidad`, `comentario`, `metodo`) VALUES
(1, 3, '2016-06-24 10:06:47', 610, '', 'Efectivo'),
(2, 1, '2016-06-24 10:06:47', 30, '', 'Credito'),
(4, 28, '2021-07-06 21:29:56', 7650, '', 'Efectivo'),
(5, 29, '2021-07-07 19:29:36', 300, '', 'Efectivo'),
(9, 32, '2021-07-08 19:34:25', 680, '', 'Efectivo'),
(10, 25, '2021-07-09 20:15:57', 7650, 'test', 'Oxxo'),
(11, 26, '2021-07-09 20:31:47', 5000, 'tt', 'Oxxo'),
(12, 26, '2021-07-09 20:40:49', 2000, '', 'Credito'),
(13, 26, '2021-07-09 20:41:42', 200, 'N/A', 'Efectivo'),
(14, 26, '2021-07-09 20:43:23', 200, 'N/A', 'Efectivo'),
(15, 26, '2021-07-09 20:56:10', 250, 'paid', 'Efectivo'),
(16, 32, '2021-07-11 12:59:59', 10, 'yyy', 'Oxxo'),
(17, 26, '2021-07-11 14:06:51', 3, 'tyu', 'Efectivo'),
(18, 16, '2021-07-12 01:24:59', 200, '', ''),
(19, 16, '2021-07-12 01:24:59', 450, '', ''),
(20, 17, '2021-07-12 02:30:51', 150, '', ''),
(21, 33, '2021-07-11 20:44:14', 1010, '', 'Efectivo'),
(22, 34, '2021-07-11 20:50:30', 100, '', 'Efectivo'),
(23, 35, '2021-07-12 03:00:02', 600, '', 'Efectivo'),
(24, 36, '2021-07-12 07:09:05', 570, '', 'Efectivo'),
(25, 36, '2021-07-12 12:46:01', 30, ',lj kvk', 'Efectivo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`idarticulos`);

--
-- Indexes for table `articulos_componentes`
--
ALTER TABLE `articulos_componentes`
  ADD PRIMARY KEY (`idcomponentes`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idclientes`);

--
-- Indexes for table `cuentas`
--
ALTER TABLE `cuentas`
  ADD PRIMARY KEY (`idcuentas`),
  ADD KEY `cuentas_idproveedor_foreign` (`idproveedor`);

--
-- Indexes for table `cuentas_pagos`
--
ALTER TABLE `cuentas_pagos`
  ADD PRIMARY KEY (`idpagos`),
  ADD KEY `cuentas_pagos_idcuenta_foreign` (`idcuenta`);

--
-- Indexes for table `destinatarios`
--
ALTER TABLE `destinatarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `destinatarios_idventa_foreign` (`idventa`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`idproveedores`);

--
-- Indexes for table `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`idservicios`),
  ADD KEY `servicios_idcliente_foreign` (`idcliente`),
  ADD KEY `servicios_idusuario_foreign` (`idusuario`);

--
-- Indexes for table `servicios_archivos`
--
ALTER TABLE `servicios_archivos`
  ADD PRIMARY KEY (`idarchivos`);

--
-- Indexes for table `servicios_articulos`
--
ALTER TABLE `servicios_articulos`
  ADD PRIMARY KEY (`idsa`),
  ADD KEY `servicios_articulos_idservicio_foreign` (`idservicio`),
  ADD KEY `servicios_articulos_idarticulo_foreign` (`idarticulo`);

--
-- Indexes for table `servicios_pagos`
--
ALTER TABLE `servicios_pagos`
  ADD PRIMARY KEY (`idpagos`),
  ADD KEY `servicios_pagos_idservicio_foreign` (`idservicio`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuarios`);

--
-- Indexes for table `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`idventas`),
  ADD KEY `ventas_idcliente_foreign` (`idcliente`),
  ADD KEY `ventas_idusuario_foreign` (`idusuario`);

--
-- Indexes for table `ventas_articulos`
--
ALTER TABLE `ventas_articulos`
  ADD PRIMARY KEY (`idva`),
  ADD KEY `ventas_articulos_idventa_foreign` (`idventa`),
  ADD KEY `ventas_articulos_idarticulo_foreign` (`idarticulo`);

--
-- Indexes for table `ventas_creditos`
--
ALTER TABLE `ventas_creditos`
  ADD PRIMARY KEY (`idcreditos`),
  ADD KEY `ventas_creditos_idventa_foreign` (`idventa`);

--
-- Indexes for table `ventas_estados`
--
ALTER TABLE `ventas_estados`
  ADD PRIMARY KEY (`idestados`),
  ADD KEY `ventas_estados_idventa_foreign` (`idventa`);

--
-- Indexes for table `ventas_pagos`
--
ALTER TABLE `ventas_pagos`
  ADD PRIMARY KEY (`idpagos`),
  ADD KEY `ventas_pagos_idventa_foreign` (`idventa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articulos`
--
ALTER TABLE `articulos`
  MODIFY `idarticulos` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=305;

--
-- AUTO_INCREMENT for table `articulos_componentes`
--
ALTER TABLE `articulos_componentes`
  MODIFY `idcomponentes` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idclientes` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=450;

--
-- AUTO_INCREMENT for table `cuentas`
--
ALTER TABLE `cuentas`
  MODIFY `idcuentas` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cuentas_pagos`
--
ALTER TABLE `cuentas_pagos`
  MODIFY `idpagos` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `destinatarios`
--
ALTER TABLE `destinatarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `idproveedores` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `servicios`
--
ALTER TABLE `servicios`
  MODIFY `idservicios` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `servicios_archivos`
--
ALTER TABLE `servicios_archivos`
  MODIFY `idarchivos` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `servicios_articulos`
--
ALTER TABLE `servicios_articulos`
  MODIFY `idsa` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `servicios_pagos`
--
ALTER TABLE `servicios_pagos`
  MODIFY `idpagos` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuarios` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ventas`
--
ALTER TABLE `ventas`
  MODIFY `idventas` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `ventas_articulos`
--
ALTER TABLE `ventas_articulos`
  MODIFY `idva` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `ventas_creditos`
--
ALTER TABLE `ventas_creditos`
  MODIFY `idcreditos` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ventas_estados`
--
ALTER TABLE `ventas_estados`
  MODIFY `idestados` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ventas_pagos`
--
ALTER TABLE `ventas_pagos`
  MODIFY `idpagos` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cuentas`
--
ALTER TABLE `cuentas`
  ADD CONSTRAINT `cuentas_idproveedor_foreign` FOREIGN KEY (`idproveedor`) REFERENCES `proveedores` (`idproveedores`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cuentas_pagos`
--
ALTER TABLE `cuentas_pagos`
  ADD CONSTRAINT `cuentas_pagos_idcuenta_foreign` FOREIGN KEY (`idcuenta`) REFERENCES `cuentas` (`idcuentas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `destinatarios`
--
ALTER TABLE `destinatarios`
  ADD CONSTRAINT `destinatarios_idventa_foreign` FOREIGN KEY (`idventa`) REFERENCES `ventas` (`idventas`);

--
-- Constraints for table `servicios`
--
ALTER TABLE `servicios`
  ADD CONSTRAINT `servicios_idcliente_foreign` FOREIGN KEY (`idcliente`) REFERENCES `clientes` (`idclientes`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `servicios_idusuario_foreign` FOREIGN KEY (`idusuario`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `servicios_articulos`
--
ALTER TABLE `servicios_articulos`
  ADD CONSTRAINT `servicios_articulos_idarticulo_foreign` FOREIGN KEY (`idarticulo`) REFERENCES `articulos` (`idarticulos`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `servicios_articulos_idservicio_foreign` FOREIGN KEY (`idservicio`) REFERENCES `servicios` (`idservicios`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `servicios_pagos`
--
ALTER TABLE `servicios_pagos`
  ADD CONSTRAINT `servicios_pagos_idservicio_foreign` FOREIGN KEY (`idservicio`) REFERENCES `servicios` (`idservicios`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_idcliente_foreign` FOREIGN KEY (`idcliente`) REFERENCES `clientes` (`idclientes`),
  ADD CONSTRAINT `ventas_idusuario_foreign` FOREIGN KEY (`idusuario`) REFERENCES `users` (`id`);

--
-- Constraints for table `ventas_articulos`
--
ALTER TABLE `ventas_articulos`
  ADD CONSTRAINT `ventas_articulos_idarticulo_foreign` FOREIGN KEY (`idarticulo`) REFERENCES `articulos` (`idarticulos`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ventas_articulos_idventa_foreign` FOREIGN KEY (`idventa`) REFERENCES `ventas` (`idventas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ventas_creditos`
--
ALTER TABLE `ventas_creditos`
  ADD CONSTRAINT `ventas_creditos_idventa_foreign` FOREIGN KEY (`idventa`) REFERENCES `ventas` (`idventas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ventas_estados`
--
ALTER TABLE `ventas_estados`
  ADD CONSTRAINT `ventas_estados_idventa_foreign` FOREIGN KEY (`idventa`) REFERENCES `ventas` (`idventas`);

--
-- Constraints for table `ventas_pagos`
--
ALTER TABLE `ventas_pagos`
  ADD CONSTRAINT `ventas_pagos_idventa_foreign` FOREIGN KEY (`idventa`) REFERENCES `ventas` (`idventas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
