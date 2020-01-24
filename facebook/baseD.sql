-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.1.26-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando datos para la tabla facebook.publicacion: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `publicacion` DISABLE KEYS */;
INSERT INTO `publicacion` (`idPublicacion`, `publicacion`, `fechaPublicacion`, `idUsuario`, `perfilDe`) VALUES
	(40, 'Hola!', '2017-11-06 17:19:43', 1, 'urimeba'),
	(54, 'Hola Pablo, espero estes bien!', '2017-11-06 18:40:21', 1, 'pablo'),
	(55, 'Hola urimeba! Espero estes bien!', '2017-11-07 09:05:24', 3, 'urimeba'),
	(56, 'Hola Mundo!', '2017-11-07 09:05:51', 2, 'usuarioprueba'),
	(57, 'Hola Pablo, saludos!', '2017-11-07 09:06:02', 2, 'pablo'),
	(58, 'Hola urimeba!', '2017-11-07 09:06:12', 2, 'urimeba'),
	(59, 'Hola Pablo2!', '2017-11-07 09:07:20', 4, 'pablo'),
	(60, 'Hola! Soy Pancho!', '2017-11-07 09:09:18', 4, 'pancho'),
	(61, 'Hola, estoy publicando desde mi muro!', '2017-11-08 16:22:58', 5, 'diego'),
	(63, 'Hola, Pablo!', '2017-11-08 16:23:21', 5, 'pablo');
/*!40000 ALTER TABLE `publicacion` ENABLE KEYS */;

-- Volcando datos para la tabla facebook.user: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`idUsuario`, `username`, `pass`, `correo`, `genero`, `fechaRegistro`, `fechaUltimaPublicacion`) VALUES
	(1, 'urimeba', '3db9e44ce0a3317d2e085558533d129b', 'urimeba511@gmail.com', 1, '2017-11-03', '2017-11-06'),
	(2, 'usuarioprueba', '4c882dcb24bcb1bc225391a602feca7c', 'correo@prueba.com', 0, '2017-11-03', '2017-11-07'),
	(3, 'pablo', '110c93fd9bf24516519e1e7ffb2c3028', 'pablo@yopmail.com', 0, '2017-11-06', '2017-11-07'),
	(4, 'pancho', '666442f1bbc965815c5017a5d7bbd669', 'pancho@pancho.com', 1, '2017-11-07', '2017-11-07'),
	(5, 'diego', '078c007bd92ddec308ae2f5115c1775d', 'diego@diego.com', 1, '2017-11-08', '2017-11-08');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
