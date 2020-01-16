-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-12-2019 a las 20:07:44
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.2.23

drop database if exists dbcrud;
create database dbcrud;
use dbcrud;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dblarocca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emprendimientos`
--

CREATE TABLE `productos` (
  `idProducto` int(15) UNSIGNED NOT NULL,
  `codigo` varchar(50) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `stock` int(4) NOT NULL,
  `precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `productos` (`idProducto`, `codigo`, `descripcion`, `stock`, `precio`) VALUES
(1,'342mfd' ,'teclado', 4, 4.2);
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenesemprendimientos`
--

CREATE TABLE `imagenproductos` (
  `idImagen` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ubicacion` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `idProducto` int(15) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO `imagenproductos` (`idImagen`, `nombre`, `ubicacion`, `idProducto`) VALUES
(1, 'teclado.jpg', 'img/productos/teclado.jpg', 1);

-- --------------------------------------------------------



--


-- Estructura de tabla para la tabla `usuarios`


--
-- Indices de la tabla `emprendimientos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProducto`);

--
-- Indices de la tabla `imagenesemprendimientos`
--
ALTER TABLE `imagenproductos`
  ADD PRIMARY KEY (`idImagen`),
  ADD KEY `idProducto` (`idProducto`);

--


--



--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `emprendimientos`
--
ALTER TABLE `productos`
  MODIFY `idProducto` int(15) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `imagenesemprendimientos`
--
ALTER TABLE `imagenproductos`
  MODIFY `idImagen` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;




--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `imagenesemprendimientos`
--
ALTER TABLE `imagenproductos`
  ADD CONSTRAINT `imagenproductos_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
