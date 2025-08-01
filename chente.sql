-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2025 at 10:45 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chente`
--

-- --------------------------------------------------------

--
-- Table structure for table `botellas`
--

CREATE TABLE `botellas` (
  `nombre` varchar(100) NOT NULL,
  `copa` varchar(10) NOT NULL,
  `litro` varchar(10) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `mililitros` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `botellas`
--

INSERT INTO `botellas` (`nombre`, `copa`, `litro`, `imagen`, `tipo`, `mililitros`) VALUES
('Herradura Reposado', '110', '1200', 'imagenes\\MENU\\botellas\\herradura.png', 'tequila', '750'),
('Centenario Reposado', '90', '800', 'imagenes\\MENU\\botellas\\cente.png', 'tequila', '750'),
('Maestro Dobel', '130', '1200', 'imagenes\\MENU\\botellas\\maestro.png', 'tequila', '750'),
('Havana Club 7', '90', '850', 'imagenes\\MENU\\botellas\\7.png', 'ron', '700'),
('Matusalem', '70', '750', 'imagenes\\MENU\\botellas\\mus.png', 'ron', '750'),
('Bacardi Mango', '85', '699', 'imagenes\\MENU\\botellas\\añejo.png', 'ron', '750'),
('Hpnotiq', '120', '1200', 'imagenes\\MENU\\botellas\\hq.png', 'vodka', '750'),
('Absolut Mango', '90', '750', 'imagenes\\MENU\\botellas\\image.png', 'vodka', '750'),
('Smirnoff', '70', '700', 'imagenes\\MENU\\botellas\\image copy 2.png', 'vodka', '750'),
('Johnnie Walker Black Label', '140', '1400', 'imagenes\\MENU\\botellas\\negra.png', 'whisky', '750'),
('Buchanan´s', '120', '1200', 'imagenes\\MENU\\botellas\\buca.png', 'whisky', '750'),
('Jack Daniels', '110', '1000', 'imagenes\\MENU\\botellas\\jack.png', 'whisky', '700'),
('Beefeater Pink', '100', '950', 'imagenes\\MENU\\botellas\\rosa.png', 'gin', '700'),
('Tanqueray London', '110', '950', 'imagenes\\MENU\\botellas\\london.png', 'gin', '750'),
('Torres 10', '90', '800', 'imagenes\\MENU\\botellas\\10.png', 'brandy', '700'),
('Don Pedro', '100', '700', 'imagenes\\MENU\\botellas\\pedro.png', 'brandy', '1000'),
('Montelobos', '120', '1200', 'imagenes\\MENU\\botellas\\monte.png', 'mezcal', '750'),
('400 Conejos Joven', '110', '1000', 'imagenes\\MENU\\botellas\\400.png', 'mezcal', '700');

-- --------------------------------------------------------

--
-- Table structure for table `carrito`
--

CREATE TABLE `carrito` (
  `nombre` varchar(100) NOT NULL,
  `cantidad` varchar(5) NOT NULL,
  `precio` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logeado`
--

CREATE TABLE `logeado` (
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `nombre` varchar(100) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `precio` varchar(100) NOT NULL,
  `imagen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`nombre`, `tipo`, `precio`, `imagen`) VALUES
('Moscow Mule', 'clasico', '150', 'imagenes\\MENU\\cocteles\\image copy.png'),
('Negroni', 'clasico', '150', 'imagenes\\MENU\\cocteles\\negroni.png'),
('Manhattan', 'clasico', '130', 'imagenes\\MENU\\cocteles\\man.png'),
('Daiquiri de Fresa', 'clasico', '130', 'imagenes\\MENU\\cocteles\\fresa.png'),
('Daiquiri de Mango', 'clasico', '130', 'imagenes\\MENU\\cocteles\\mango.png'),
('Margarita', 'margarita', '130', 'imagenes\\MENU\\cocteles\\marga.png'),
('Margarita de Piña con Chile', 'margarita', '130', 'imagenes\\MENU\\cocteles\\margach.png'),
('Margarita de Frutos', 'margarita', '130', 'imagenes\\MENU\\cocteles\\margafr.png'),
('Margarita de Cerveza', 'margarita', '130', 'imagenes\\MENU\\cocteles\\margace.png'),
('Mojito de Frutos Rojos', 'mojito', '90', 'imagenes\\MENU\\cocteles\\mofr.png'),
('Mojito de Maracuyá', 'mojito', '90', 'imagenes\\MENU\\cocteles\\moma.png'),
('Mojito Natural', 'mojito', '80', 'imagenes\\MENU\\cocteles\\mojito.png'),
('Martini Dulce', 'mojito', '160', 'imagenes\\MENU\\cocteles\\martini.png'),
('Martini Seco', 'mojito', '150', 'imagenes\\MENU\\cocteles\\marsec.png'),
('Mango Ice', 'urbana', '0', 'imagenes\\MENU\\cocteles\\mangoi.png'),
('Romance', 'autor', '100', 'imagenes\\MENU\\cocteles\\romance.png'),
('Mondey', 'autor', '100', 'imagenes\\MENU\\cocteles\\monday.png'),
('Ramaah', 'autor', '100', 'imagenes\\MENU\\cocteles\\rama.png'),
('Sunset', 'autor', '100', 'imagenes\\MENU\\cocteles\\suns.png'),
('Moet Brut', 'champa', '2000', 'imagenes\\MENU\\botellas\\moet.png'),
('Blue Champagne', 'champa', '700', 'imagenes\\MENU\\botellas\\blue.png'),
('Amster Ultra', 'cerveza', '35', 'imagenes\\MENU\\cerveza\\ultra.png'),
('XX Ambar', 'cerveza', '35', 'imagenes\\MENU\\cerveza\\xx.png'),
('XX Lager', 'cerveza', '35', 'imagenes\\MENU\\cerveza\\xxl.png'),
('Carta Blanca', 'cerveza', '35', 'imagenes\\MENU\\cerveza\\blanca.png'),
('Miller High', 'caguama', '80', 'imagenes\\MENU\\cerveza\\miller.png'),
('XX Ambar', 'caguama', '80', 'imagenes\\MENU\\cerveza\\xxc.png'),
('XX Lager', 'caguama', '80', 'imagenes\\MENU\\cerveza\\cclc.png'),
('Grand Heineken', 'caguama', '80', 'imagenes\\MENU\\cerveza\\image.png');

-- --------------------------------------------------------

--
-- Table structure for table `tragos`
--

CREATE TABLE `tragos` (
  `nombre` varchar(100) NOT NULL,
  `litro` varchar(10) NOT NULL,
  `medio` varchar(10) NOT NULL,
  `copa` varchar(10) NOT NULL,
  `imagen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tragos`
--

INSERT INTO `tragos` (`nombre`, `litro`, `medio`, `copa`, `imagen`) VALUES
('Mango Ice', '130', '70', '50', 'imagenes\\MENU\\cocteles\\mangoi.png'),
('Tropical Rainbow', '130', '70', '50', 'imagenes\\MENU\\cocteles\\tropical.png'),
('Can Peach', '130', '70', '50', 'imagenes\\MENU\\cocteles\\peach.png'),
('Strawberry Cherry', '130', '70', '50', 'imagenes\\MENU\\cocteles\\fresa1.png'),
('Azulito', '130', '70', '50', 'imagenes\\MENU\\cocteles\\azul.png'),
('Mexico Mango', '130', '70', '50', 'imagenes\\MENU\\cocteles\\mangom.png'),
('Strawberry Burst', '130', '70', '50', 'imagenes\\MENU\\cocteles\\6.png'),
('The Menage', '130', '70', '50', 'imagenes\\MENU\\cocteles\\7.png'),
('Ultra Strawberry', '130', '70', '50', 'imagenes\\MENU\\cocteles\\ff.png'),
('Strawberry ShortCake', '130', '70', '50', 'imagenes\\MENU\\cocteles\\stea.png'),
('Juicy Peach', '130', '70', '50', 'imagenes\\MENU\\cocteles\\nar.png'),
('BlueBerry Splash', '130', '70', '50', 'imagenes\\MENU\\cocteles\\berry.png'),
('Strawberry Ice', '130', '70', '50', 'imagenes\\MENU\\cocteles\\5.png'),
('Torangy', '130', '70', '50', 'imagenes\\MENU\\cocteles\\4.png'),
('Liquid Gold', '130', '70', '50', 'imagenes\\MENU\\cocteles\\gold.png'),
('Fresh Kiss', '130', '70', '50', 'imagenes\\MENU\\cocteles\\2.png'),
('Cubanito', '130', '70', '50', 'imagenes\\MENU\\cocteles\\cuba.png'),
('Ronchata', '130', '70', '50', 'imagenes\\MENU\\cocteles\\ron.png');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `Usuario` varchar(100) NOT NULL,
  `Clave` varchar(100) NOT NULL,
  `Correo` varchar(100) NOT NULL,
  `Logeado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`Usuario`, `Clave`, `Correo`, `Logeado`) VALUES
('e', 'e', 'e@gmail.com', 0),
('a', 'a', 'a@gmail.com', 0),
('d', 'd', 'd@gmail.com', 0),
('w', 'w', 'w@gmail.com', 1),
('r', '$2y$10$AHlKvkvCJuuQJrZdSyElw.Qx/MeclPNcP27/p45.frGHFoQzxoHSe', 'r@gmail.com', 0),
('b', '$2y$10$r24EwZXDRGzoSqB6j5XRAORSMrK68ZH5eYznTRgQRgRgpsKRjyKK.', 'b@gmail.com', 0),
('z', 'z', 'z@gmail.com', 0),
('hola', 'hola', 'hola@gmail.com', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
