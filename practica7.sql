-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-10-2016 a las 15:12:43
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `practica7`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `descripcion`) VALUES
(1, 'Alimentos'),
(2, 'Bebidas'),
(3, 'Herramientas'),
(4, 'Juguetes'),
(5, 'Limpieza Personal'),
(6, 'Limpieza del Hogar'),
(7, 'ropa'),
(8, 'medicamentos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `costo_unitario` float DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `stock_minimo` int(11) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `descripcion`, `costo_unitario`, `cantidad`, `stock_minimo`, `id_categoria`) VALUES
(1, 'Cereal korn', 20, 15, 15, 1),
(2, 'Leche entera en Lata 1 kilo', 80, 20, 20, 1),
(3, 'Pan Integral en bolsa', 10, 20, 20, 1),
(4, 'Coca COla 2 litros', 10, 400, 400, 2),
(5, 'Tampico 2 litros', 9, 500, 100, 2),
(6, 'Martillo tramontina', 50, 800, 50, 3),
(7, 'Alicate de presion Trupper', 30, 100, 20, 3),
(8, 'Muneca Barbye', 50, 100, 30, 4),
(9, 'Carrito tonka', 100, 800, 50, 4),
(10, 'jaboncillo lux', 5, 1000, 100, 5),
(11, 'shampoo head and shouder', 20, 98, 100, 5),
(12, 'Jabon liquido de vajilla', 20, 48, 50, 6),
(13, 'Lavandina sachet', 10, 148, 150, 6),
(14, 'camisa de hombre manhatam', 80, 8, 10, 7),
(15, 'pantalon jeans de mujer', 150, 18, 20, 7),
(17, 'Fideos Lazzaroni', 30, 200, 100, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `clave` varchar(50) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `clave`, `nombre`, `correo`) VALUES
(1, 'luis', 'luis', 'LUIS MAMANI TICONA', 'luis@hotmail.com'),
(2, 'lidia', 'lidia', 'LIDIA ALANOCA SOLOZANO', 'lidia@gmail.com'),
(3, 'juan', 'juan', 'JUAN LIPA LUNA', 'juan@gmail.com'),
(4, 'reyna', 'reyna', 'REYNA LUJAN BOTELO', 'reyna@gmail.com'),
(5, 'franz', 'franz', 'FRANZ LIMA ALI', 'franz@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `total` float DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `fecha`, `id_producto`, `cantidad`, `total`, `id_usuario`) VALUES
(1, '2016-10-21', 1, 1, 20, 1),
(2, '2016-10-21', 3, 5, 50, 3),
(3, '2016-10-21', 4, 3, 30, 4),
(4, '2016-10-21', 10, 3, 15, 3),
(5, '2016-10-21', 13, 10, 100, 2),
(6, '2016-10-21', 9, 1, 100, 3),
(7, '2016-10-21', 3, 8, 80, 2),
(8, '2016-10-26', 3, 3, 30, 4),
(9, '2016-10-26', 1, 2, 40, 4),
(10, '2016-10-26', 1, 2, 40, 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`),
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
