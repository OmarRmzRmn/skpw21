-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-12-2021 a las 22:27:24
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(255) NOT NULL,
  `PRECIO` decimal(20,2) NOT NULL,
  `CANTIDAD` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion`
--

CREATE TABLE `inscripcion` (
  `ID` int(6) NOT NULL,
  `EMAIL` int(255) NOT NULL,
  `PASSWORD` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblproductos`
--

CREATE TABLE `tblproductos` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Precio` decimal(20,2) NOT NULL,
  `Descripcion` text NOT NULL,
  `Imagen` varchar(255) NOT NULL,
  `EXISTENCIA` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblproductos`
--

INSERT INTO `tblproductos` (`id`, `Nombre`, `Precio`, `Descripcion`, `Imagen`, `EXISTENCIA`) VALUES
(1, 'Jack Daniels', '250.00', 'Tipo de bebida: Whisky Marca: Jack Daniels Contenido: 350 ml', 'img/1.jpg', 198),
(2, 'Red Label', '390.00', 'Cuerpo y presencia, obscuros y ahumados Color: Caoba Aromático y equilibrado', 'img/2.jpg', 200),
(3, 'Smirnoff de Tamarindo', '250.00', 'Vodka con sabor a México\r\nSmirnoff X1, vodka con sabor a México. Inspirado en los tradicionales dulces mexicanos, tamarindo picosito.', 'img/3.jpg', 198),
(4, 'Don Julio 70', '700.00', 'La venta se realizará únicamente a mayores de edad.', 'img/4.jpg', 200),
(5, 'Vino Tinto Unico 2010', '750.00', 'Origen: Spain Región: Ribera Del Duero Uva: Tinta Fina (Tempranillo)', 'img/5.jpg', 200),
(6, 'Kraken', '350.00', 'Descubre el sabor y textura del Ron The Kraken negro con especias.', 'img/6.jpg', 200),
(7, 'Bacardi', '199.00', 'Bacardí Carta Blanca es un ron blanco, suave y aromático con notas florales y afrutadas (durazno, coco y plátano).', 'img/7.jpg', 198),
(8, 'Capitan Morgan', '250.00', 'Traemos para ti vinos y licores de diversas regiones del mundo para ofrecer un amplio catálogo donde encontrarás la opción ideal.', 'img/8.jpg', 200),
(9, 'Don Pedro', '560.00', 'El brandy Don Pedro de Casa Pedro Domecq reserva especial de 750 ml.', 'img/9.jpg', 200),
(10, 'Helix (8 PACK)', '150.00', 'Descubre todos los sabores de Helix Hard Seltzer, la nueva generación de bebidas alcohólicas: Frutos Rojos, Toronja, Mango y Limón.', 'img/10.jpg', 200),
(11, 'Hidromiel', '499.00', 'Bebida artesanal fabricada a base de miel de abeja.\r\nSemi Seca.\r\n', 'img/11.jpg', 199),
(12, 'Azteca de Oro', '250.00', 'Es un brandy con solera exquisita.\r\nAlcohol: 35%', 'img/12.jpg', 200),
(13, 'Absolut Vodka', '299.00', 'Alcohol que cuenta con un 40% Alc. Vol. Disponible en una presentación de 750 ml.', 'img/13.jpg', 200);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tblproductos`
--
ALTER TABLE `tblproductos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblproductos`
--
ALTER TABLE `tblproductos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
