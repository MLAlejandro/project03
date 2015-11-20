-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-11-2015 a las 11:56:39
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bd_botiga_reserva`
--
CREATE DATABASE IF NOT EXISTS `bd_project03` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bd_project03`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_recurs`
--

CREATE TABLE IF NOT EXISTS `tbl_recurs` (
`id_recurs` int(11) NOT NULL,
  `nom_recurs` varchar(35) NOT NULL,
  `desc_recurs` varchar(100) NOT NULL,
  `img_recurs` varchar(35) NOT NULL,
  `id_tipus` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Indices de la tabla `tbl_recurs`
--
ALTER TABLE `tbl_recurs`
 ADD CONSTRAINT PRIMARY KEY (id_recurs);
ALTER TABLE `tbl_recurs`
 MODIFY `id_recurs` int(11) NOT NULL AUTO_INCREMENT;
--
-- Volcado de datos para la tabla `tbl_recurs`
--

INSERT INTO `tbl_recurs` (`id_recurs`, `nom_recurs`, `desc_recurs`, `img_recurs`, `id_tipus`) VALUES
(1, 'Carro de portatiles', 'Carro para llevar portatiles y guardarlos, perfecto para preparar conferencias o clases.', 'carro_portatiles.jpg',2),
(3, 'Portatil 2', 'Ordenador portatil MSI con sistema operativo Windows 10, con diversos editores de textos instalados,', 'portatil_2.jpg',2),
(4, 'Portatil 3', 'Ordenador portatil VAIO con sistema operativo Windows 7, con editores 3D y de imagen.', 'portatil_3.jpg',2),
(5, 'Movil 1', 'Movil Samsung Galaxy 6 con sistema operativo Android 5.0 Lollipop.', 'movil_1.jpg',2),
(6, 'Movil 2', 'Movil Iphone 6 con sistema operativo iOS 8.', 'movil_2.jpg',2),
(7, 'Portatil 1', 'Ordenador portatil ACER con sistema operativo Windows 8, con el pack office instalado. Perfecto para', 'portatil_1.jpg',2),
(8, 'Proyector portatil', 'Proyector portatil facil de usar y perfecto para moverlo entre salas.', 'proyector_portatil.jpg',2),
(9, 'Aula de informatica 2', 'recurs de informatica que dispone de 19 mesas con una pizarra tactil, ordenadores y proyector.', 'recurs_informatica_2.jpg',1),
(10, 'Aula de entrevistes', 'Aula para hacer entrevistas que dispone de una mesa de despacho.', 'recurs_entrevistas_1.jpg',1),
(11, 'Aula de teoria 1', 'Aula de teoria que dispone de 20 mesas con una pizarra tactil.', 'recurs_teoria_1.jpg',1),
(12, 'Aula de teoria 2', 'Aula de teoria que dispone de 17 mesas con una pizarra.', 'recurs_teoria_2.jpg',1),
(13, 'Aula de teoria 3', 'Aula de teoria que dispone de 22 mesas con una pizarra.', 'recurs_teoria_3.jpg',1),
(14, 'Aula de teoria 4', 'Aula de teoria que dispone de 19 mesas con una pizarra tactil.', 'recurs_teoria_4.jpg',1),
(15, 'Aula de informatica 1', 'Aula de informatica que dispone de 22 mesas con una ordenador en cada una, proyector y una pizarra', 'recurs_informatica_1.jpg',1),
(16, 'Aula de entrevistas 2', 'Aula para hacer entrevistas que dispone de una mesa de despacho con un portatil en ella.', 'recurs_entrevistas_2.jpg',1),
(17, 'Aula de reuniones', 'Aula para hacer reuniones que dispone de una mesa alargada la cual esta rodeada por 15 sillas, tambi', 'sala_reuniones.jpg',1);


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipus_recurs`
--

CREATE TABLE IF NOT EXISTS `tbl_tipus` (
	`id_tipus` int(11) NOT NULL,
	`nom_tipus` varchar(55) NOT NULL,
	`tipus_recurs` varchar(55) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

ALTER TABLE `tbl_tipus`
 ADD CONSTRAINT PRIMARY KEY (id_tipus);
ALTER TABLE `tbl_tipus`
 MODIFY `id_tipus` int(11) NOT NULL AUTO_INCREMENT;
--
-- Volcado de datos para la tabla `tbl_tipus_recurs`
--

INSERT INTO `tbl_tipus` (`id_tipus`, `nom_tipus`) VALUES
(1, 'sala'),
(2, 'material');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuaris`
--

CREATE TABLE IF NOT EXISTS `tbl_usuaris` (
`id_usuari` int(11) NOT NULL,
  `pass_usuari` varchar(20) NOT NULL,
  `email_usuari` varchar(50) NOT NULL,
  `admin` boolean NOT NULL default false
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

ALTER TABLE `tbl_usuaris`
 ADD CONSTRAINT PRIMARY KEY (id_usuari);
ALTER TABLE `tbl_usuaris`
 MODIFY `id_usuari` int(11) NOT NULL AUTO_INCREMENT;
--
-- Volcado de datos para la tabla `tbl_usuaris`
--

INSERT INTO `tbl_usuaris` (`id_usuari`, `pass_usuari`, `email_usuari`, `admin`) VALUES
(1, '321', 'admin', 1),
(2, '321', 'user', 0);


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_reserva`
--

CREATE TABLE IF NOT EXISTS `tbl_reservas` (
	`id_reserva` int(11) NOT NULL,
	`id_recurs` int(11) NOT NULL,
	`data_res` date NOT NULL,
	`id_usuari` int(11) NOT NULL,
	`hora` varchar(8) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;


ALTER TABLE `tbl_reservas`
 ADD CONSTRAINT PRIMARY KEY (id_reserva);
ALTER TABLE `tbl_reservas`
 MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT;

--
-- relaciones
--
/* FK tbl_reservas PK tbl_recursos */;
ALTER TABLE `tbl_reservas`
ADD CONSTRAINT FOREIGN KEY (id_recurs)
REFERENCES `tbl_recurs` (id_recurs);

/* FK tbl_reservas PK tbl_usuaris */;
ALTER TABLE `tbl_reservas`
ADD CONSTRAINT FOREIGN KEY (id_usuari)
REFERENCES `tbl_usuaris` (id_usuari);

/* FK tbl_recursos PK tbl_tipus_recursos */;
ALTER TABLE `tbl_recurs`
ADD CONSTRAINT FOREIGN KEY (id_tipus)
REFERENCES `tbl_tipus` (id_tipus);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;