-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-11-2018 a las 23:10:55
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gotoevent`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artists`
--

CREATE TABLE `artists` (
  `id_artist` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `dni` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `artists`
--

INSERT INTO `artists` (`id_artist`, `name`, `last_name`, `dni`) VALUES
(1, 'Federico', 'Elias', '23456789'),
(2, 'Ricardo', 'Arjona', '56426894'),
(4, 'Bad', 'Bunny', '87452148'),
(5, 'Jose', 'Martinez', '2222222');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calendars`
--

CREATE TABLE `calendars` (
  `id_calendar` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `id_event` int(11) DEFAULT NULL,
  `id_event_place` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `calendars`
--

INSERT INTO `calendars` (`id_calendar`, `date`, `id_event`, `id_event_place`) VALUES
(1, '2018-11-30', 3, 4),
(2, '2018-12-13', 2, 1),
(3, '2018-11-28', 6, 2),
(8, '2018-11-25', 3, 4),
(10, '2018-11-29', 3, 1),
(12, '2018-11-25', 4, 3),
(13, '2019-01-18', 4, 4),
(14, '2019-01-25', 2, 2),
(15, '2019-03-20', 7, 2),
(16, '2019-02-05', 8, 1),
(17, '2019-01-18', 2, 1),
(18, '2019-02-15', 1, 1),
(19, '2019-01-11', 3, 1),
(20, '2019-02-07', 8, 3),
(21, '2019-02-14', 3, 1),
(22, '2018-11-14', 3, 1),
(23, '2019-05-10', 2, 1),
(24, '2018-11-22', 10, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calendars_x_artists`
--

CREATE TABLE `calendars_x_artists` (
  `id_artist` int(11) NOT NULL,
  `id_calendar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `calendars_x_artists`
--

INSERT INTO `calendars_x_artists` (`id_artist`, `id_calendar`) VALUES
(4, 12),
(5, 12),
(1, 13),
(2, 14),
(4, 14),
(2, 15),
(4, 16),
(4, 17),
(2, 18),
(1, 19),
(1, 20),
(1, 21),
(4, 22),
(2, 23),
(1, 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id_category` int(11) NOT NULL,
  `description` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id_category`, `description`) VALUES
(2, 'Boxeo'),
(5, 'Futbol'),
(4, 'Kickboxing'),
(1, 'Musical'),
(3, 'Teatro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `events`
--

CREATE TABLE `events` (
  `id_event` int(11) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `id_category` int(11) DEFAULT NULL,
  `img` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `events`
--

INSERT INTO `events` (`id_event`, `title`, `id_category`, `img`) VALUES
(1, 'Gran evento musical', 1, '39938.png'),
(2, 'Pelea por el titulo peso pesados', 2, '39938.png'),
(3, 'Canta arjona', 1, '39938.png'),
(4, 'Obra de teatro infantil', 3, '39938.png'),
(6, 'nose que onda ', 2, '39938.png'),
(7, 'boc', 5, '80378.png'),
(8, 'Monumental', 5, '39938.png'),
(10, 'Eventazo', 2, '17475.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `event_places`
--

CREATE TABLE `event_places` (
  `id_event_place` int(11) NOT NULL,
  `capacity` bigint(20) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `event_places`
--

INSERT INTO `event_places` (`id_event_place`, `capacity`, `description`) VALUES
(1, 55000, 'Monumental'),
(2, 3000, 'Teatro comun'),
(3, 38000, 'Gran Rex'),
(4, 45000, 'Libertadores de America');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `event_squares`
--

CREATE TABLE `event_squares` (
  `id_event_square` int(11) NOT NULL,
  `id_square_type` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `available_quantity` int(11) DEFAULT NULL,
  `remainder` int(11) DEFAULT NULL,
  `id_calendar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `event_squares`
--

INSERT INTO `event_squares` (`id_event_square`, `id_square_type`, `price`, `available_quantity`, `remainder`, `id_calendar`) VALUES
(1, 1, 500, 1000, 1000, 1),
(2, 2, 1000, 400, 400, 2),
(4, 4, 4533, 43567, 43567, 2),
(5, 3, 12, 12, 12, 15),
(6, 3, 1, 1, 1, 16),
(7, 4, 230, 3333, 3333, 23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `purchases`
--

CREATE TABLE `purchases` (
  `id_purchase` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  `customer` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `purchases`
--

INSERT INTO `purchases` (`id_purchase`, `date`, `customer`) VALUES
(3, '2018-11-22 22:54:39', 2),
(4, '2018-11-22 22:54:46', 2),
(5, '2018-11-22 22:55:57', 2),
(6, '2018-11-22 22:57:33', 2),
(7, '2018-11-22 22:58:01', 2),
(8, '2018-11-22 22:58:29', 2),
(9, '2018-11-22 23:01:11', 2),
(10, '2018-11-22 23:01:32', 2),
(11, '2018-11-22 23:06:50', 2),
(12, '2018-11-22 23:08:51', 2),
(13, '2018-11-22 23:10:07', 2),
(14, '2018-11-22 23:10:13', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `purchase_lines`
--

CREATE TABLE `purchase_lines` (
  `id_purchase_line` int(11) NOT NULL,
  `price` float DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `id_event_square` int(11) DEFAULT NULL,
  `id_ticket` int(11) DEFAULT NULL,
  `id_purchase` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `purchase_lines`
--

INSERT INTO `purchase_lines` (`id_purchase_line`, `price`, `quantity`, `id_event_square`, `id_ticket`, `id_purchase`) VALUES
(1, 230, 3, 7, 12, 11),
(2, 230, 3, 7, 13, 12),
(3, 230, 4, 7, 14, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `square_types`
--

CREATE TABLE `square_types` (
  `id_square_type` int(11) NOT NULL,
  `description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `square_types`
--

INSERT INTO `square_types` (`id_square_type`, `description`) VALUES
(3, 'Campo'),
(1, 'Platea'),
(4, 'Popular'),
(2, 'Vip');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tickets`
--

CREATE TABLE `tickets` (
  `id_ticket` int(11) NOT NULL,
  `number` int(11) DEFAULT NULL,
  `qr` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tickets`
--

INSERT INTO `tickets` (`id_ticket`, `number`, `qr`) VALUES
(1, 63479, '63479'),
(2, 29973, '29973'),
(3, 83889, '83889'),
(4, 61038, '61038'),
(5, 42689, '42689'),
(6, 18860, '18860'),
(7, 874, '874'),
(8, 93621, '93621'),
(9, 67847, '67847'),
(10, 88802, '88802'),
(11, 52565, '52565'),
(12, 42097, '42097'),
(13, 79891, '79891'),
(14, 65121, '65121');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `dni` varchar(8) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `name`, `last_name`, `dni`, `email`, `type`, `pass`) VALUES
(1, 'Leonardo', 'Izurieta', '45187639', 'leo@leo', 'cliente', 'leo'),
(2, 'Federico', 'Elias', '40794525', 'fede@fede', 'admin', 'admin'),
(3, 'karina', 'felice', '29101068', 'kari@kari', 'admin', '1234'),
(4, 'Santino', 'Barreiro', '51457524', 'santi@santi', 'cliente', 'santi');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id_artist`),
  ADD UNIQUE KEY `unq_name_artist` (`name`),
  ADD UNIQUE KEY `unq_las_name_artist` (`last_name`),
  ADD UNIQUE KEY `unq_dni_artist` (`dni`);

--
-- Indices de la tabla `calendars`
--
ALTER TABLE `calendars`
  ADD PRIMARY KEY (`id_calendar`),
  ADD KEY `fk_id_event` (`id_event`),
  ADD KEY `fk_id_event_place` (`id_event_place`);

--
-- Indices de la tabla `calendars_x_artists`
--
ALTER TABLE `calendars_x_artists`
  ADD KEY `fk_id_artist` (`id_artist`),
  ADD KEY `fk_id_calendar` (`id_calendar`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`),
  ADD UNIQUE KEY `unq_description_category` (`description`);

--
-- Indices de la tabla `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id_event`),
  ADD UNIQUE KEY `unq_title` (`title`),
  ADD KEY `fk_id_category` (`id_category`);

--
-- Indices de la tabla `event_places`
--
ALTER TABLE `event_places`
  ADD PRIMARY KEY (`id_event_place`),
  ADD UNIQUE KEY `unq_description_event_place` (`description`);

--
-- Indices de la tabla `event_squares`
--
ALTER TABLE `event_squares`
  ADD PRIMARY KEY (`id_event_square`),
  ADD KEY `fk_square_type` (`id_square_type`),
  ADD KEY `fk_calendar_event_squares` (`id_calendar`);

--
-- Indices de la tabla `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id_purchase`),
  ADD KEY `fk_customer` (`customer`);

--
-- Indices de la tabla `purchase_lines`
--
ALTER TABLE `purchase_lines`
  ADD PRIMARY KEY (`id_purchase_line`),
  ADD KEY `fk_event_square` (`id_event_square`),
  ADD KEY `fk_ticket` (`id_ticket`),
  ADD KEY `fk_purchase` (`id_purchase`);

--
-- Indices de la tabla `square_types`
--
ALTER TABLE `square_types`
  ADD PRIMARY KEY (`id_square_type`),
  ADD UNIQUE KEY `unq_description_square_type` (`description`);

--
-- Indices de la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id_ticket`),
  ADD UNIQUE KEY `unq_number` (`number`),
  ADD UNIQUE KEY `unq_qr` (`qr`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `unq_dni` (`dni`),
  ADD UNIQUE KEY `unq_email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `artists`
--
ALTER TABLE `artists`
  MODIFY `id_artist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `calendars`
--
ALTER TABLE `calendars`
  MODIFY `id_calendar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `events`
--
ALTER TABLE `events`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `event_places`
--
ALTER TABLE `event_places`
  MODIFY `id_event_place` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `event_squares`
--
ALTER TABLE `event_squares`
  MODIFY `id_event_square` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id_purchase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `purchase_lines`
--
ALTER TABLE `purchase_lines`
  MODIFY `id_purchase_line` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `square_types`
--
ALTER TABLE `square_types`
  MODIFY `id_square_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id_ticket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `calendars`
--
ALTER TABLE `calendars`
  ADD CONSTRAINT `fk_id_event` FOREIGN KEY (`id_event`) REFERENCES `events` (`id_event`),
  ADD CONSTRAINT `fk_id_event_place` FOREIGN KEY (`id_event_place`) REFERENCES `event_places` (`id_event_place`);

--
-- Filtros para la tabla `calendars_x_artists`
--
ALTER TABLE `calendars_x_artists`
  ADD CONSTRAINT `fk_id_artist` FOREIGN KEY (`id_artist`) REFERENCES `artists` (`id_artist`),
  ADD CONSTRAINT `fk_id_calendar` FOREIGN KEY (`id_calendar`) REFERENCES `calendars` (`id_calendar`);

--
-- Filtros para la tabla `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `fk_id_category` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`);

--
-- Filtros para la tabla `event_squares`
--
ALTER TABLE `event_squares`
  ADD CONSTRAINT `fk_calendar_event_squares` FOREIGN KEY (`id_calendar`) REFERENCES `calendars` (`id_calendar`),
  ADD CONSTRAINT `fk_square_type` FOREIGN KEY (`id_square_type`) REFERENCES `square_types` (`id_square_type`);

--
-- Filtros para la tabla `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `fk_customer` FOREIGN KEY (`customer`) REFERENCES `users` (`id_user`);

--
-- Filtros para la tabla `purchase_lines`
--
ALTER TABLE `purchase_lines`
  ADD CONSTRAINT `fk_event_square` FOREIGN KEY (`id_event_square`) REFERENCES `event_squares` (`id_event_square`),
  ADD CONSTRAINT `fk_purchase` FOREIGN KEY (`id_purchase`) REFERENCES `purchases` (`id_purchase`),
  ADD CONSTRAINT `fk_ticket` FOREIGN KEY (`id_ticket`) REFERENCES `tickets` (`id_ticket`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
