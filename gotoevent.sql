-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-11-2018 a las 07:39:33
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(6, 'Polistas', 'Argentinos', '11111111'),
(8, 'Pilotos', 'Multinacionales', '1111'),
(9, 'Alex', 'Turner', '222222'),
(10, 'Tyler', 'Joseph', '333333'),
(11, 'Bailarines', 'Rusia', '4444444'),
(12, 'Emiliano', 'Brancciari', '555555'),
(13, 'Jugadores', 'Basquetbol', '66666'),
(14, 'Cirque', 'Do Soleil', '7777'),
(17, 'AndrÃ©s Ciro ', 'MartÃ­nez', '1212121'),
(18, 'Diego', 'Topa', '232323');

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
(26, '2018-11-27', 11, 5),
(27, '2018-11-28', 12, 6),
(30, '2018-11-30', 13, 8),
(32, '2018-12-02', 14, 8),
(33, '2018-12-03', 14, 8),
(34, '2018-11-28', 16, 7),
(35, '2018-12-09', 16, 7),
(36, '2018-11-27', 18, 10),
(38, '2018-12-08', 17, 9),
(39, '2018-12-14', 19, 11),
(40, '2019-03-29', 20, 12),
(41, '2019-03-30', 20, 12),
(42, '2019-03-31', 20, 12),
(43, '2018-12-15', 21, 13);

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
(6, 26),
(8, 27),
(9, 30),
(10, 32),
(10, 33),
(12, 34),
(12, 35),
(13, 36),
(11, 38),
(14, 39),
(8, 40),
(8, 41),
(8, 42),
(17, 43);

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
(14, 'Carreras'),
(10, 'Conciertos'),
(13, 'Danza'),
(6, 'Deporte'),
(11, 'Festivales'),
(9, 'Infantiles'),
(7, 'Musical'),
(8, 'Recreativos'),
(12, 'Teatro');

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
(11, 'Campeonato Argentino de Polo 125', 6, '39722.jpg'),
(12, 'Monster Jam', 8, '3769.jpg'),
(13, 'Arctic Monkeys', 10, '29838.jpg'),
(14, 'Twenty one Pilots', 10, '6299.jpg'),
(16, 'No Te Va a Gustar', 10, '94965.jpg'),
(17, 'El Cascanueces- Ballet Nacional de Rusia', 13, '66413.jpg'),
(18, 'PeÃ±arol - Quilmes', 6, '41941.jpg'),
(19, 'Cirque Du Soleil: The Beatles LOVE', 8, '59116.jpg'),
(20, 'Gran Premio MOTUL, Argentina 2019', 14, '92328.jpg'),
(21, 'Ciro y Los Persas', 10, '61966.jpg'),
(22, 'Junior Express en Concierto', 9, '3949.jpg');

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
(5, 30000, 'Campo Argentino de Polo'),
(6, 53000, 'Estadio Ãšnico Ciudad de la Plata '),
(7, 47000, 'Estadio Obras'),
(8, 100000, 'HipÃ³dromo San Isidro  '),
(9, 3262, 'Teatro Gran Rex'),
(10, 8000, 'Polideportivo Panamericano â€œIslas Malvinasâ€'),
(11, 2100, 'Love Theatre at The Mirage, Las Vegas, Nevada, EE.UU'),
(12, 100000, 'Circuito Termas de Rio Hondo'),
(13, 61688, 'River Plate'),
(14, 2500, 'Teatro OperA');

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
(11, 6, 1500, 4198, 4200, 26),
(13, 7, 1500, 4200, 4200, 26),
(14, 12, 2000, 4200, 4200, 26),
(15, 8, 2500, 4200, 4200, 26),
(16, 9, 3000, 4000, 4000, 26),
(17, 10, 2700, 4200, 4200, 26),
(18, 25, 3500, 600, 600, 26),
(19, 18, 2000, 7499, 7500, 27),
(20, 20, 3000, 7500, 7500, 27),
(21, 21, 2000, 7500, 7500, 27),
(22, 22, 2000, 7500, 7500, 27),
(23, 24, 3000, 7500, 7500, 27),
(24, 23, 4000, 4000, 4000, 27),
(27, 16, 7200, 79999, 80000, 30),
(28, 17, 16000, 20000, 20000, 30),
(31, 16, 7200, 80000, 80000, 32),
(32, 17, 16000, 20000, 20000, 32),
(33, 16, 7200, 79998, 80000, 33),
(34, 17, 16000, 20000, 20000, 33),
(35, 5, 2670, 26999, 27000, 34),
(36, 13, 3350, 6000, 6000, 34),
(37, 14, 5036, 5000, 5000, 34),
(38, 15, 5036, 5000, 5000, 34),
(39, 5, 2700, 27000, 27000, 35),
(40, 13, 3400, 6000, 6000, 35),
(41, 14, 5036, 5000, 5000, 35),
(42, 15, 5036, 5000, 5000, 35),
(43, 29, 310, 998, 1000, 36),
(44, 28, 230, 1000, 1000, 36),
(45, 30, 190, 2000, 2000, 36),
(46, 31, 150, 4000, 4000, 36),
(50, 26, 1600, 2000, 2000, 38),
(51, 32, 1800, 1200, 1200, 38),
(52, 16, 8560, 2000, 2000, 39),
(53, 16, 3400, 99999, 100000, 40),
(54, 16, 3200, 100000, 100000, 41),
(55, 16, 3500, 99998, 100000, 42),
(56, 5, 1500, 4000, 4000, 43),
(57, 27, 1900, 2000, 2000, 43);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `purchases`
--

CREATE TABLE `purchases` (
  `id_purchase` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `customer` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `purchases`
--

INSERT INTO `purchases` (`id_purchase`, `date`, `customer`) VALUES
(27, '2018-11-25', 3),
(28, '2018-11-25', 3),
(29, '2018-11-26', 3),
(30, '2018-11-26', 3),
(31, '2018-11-26', 3),
(32, '2018-11-27', 3),
(33, '2018-11-27', 3),
(34, '2018-11-27', 3),
(35, '2018-11-27', 3),
(36, '2018-11-27', 3),
(37, '2018-11-27', 3),
(38, '2018-11-27', 3),
(39, '2018-11-27', 3),
(40, '2018-11-27', 3),
(41, '2018-11-27', 3),
(42, '2018-11-27', 3),
(43, '2018-11-27', 3),
(44, '2018-11-27', 3),
(45, '2018-11-27', 3),
(46, '2018-11-27', 3),
(47, '2018-11-27', 3),
(48, '2018-11-27', 3),
(49, '2018-11-27', 3),
(50, '2018-11-27', 3),
(51, '2018-11-27', 3),
(52, '2018-11-27', 3),
(53, '2018-11-27', 3),
(54, '2018-11-27', 3),
(55, '2018-11-27', 3),
(56, '2018-11-27', 3),
(57, '2018-11-27', 3),
(58, '2018-11-27', 3),
(59, '2018-11-27', 3),
(60, '2018-11-27', 3),
(61, '2018-11-27', 3),
(62, '2018-11-27', 3),
(63, '2018-11-27', 3),
(64, '2018-11-27', 3),
(65, '2018-11-27', 3),
(66, '2018-11-27', 3),
(67, '2018-11-27', 3),
(68, '2018-11-27', 3),
(69, '2018-11-27', 3),
(70, '2018-11-27', 3),
(71, '2018-11-27', 3),
(72, '2018-11-27', 3),
(73, '2018-11-27', 3),
(74, '2018-11-27', 3),
(75, '2018-11-27', 3),
(76, '2018-11-27', 3),
(77, '2018-11-27', 3),
(78, '2018-11-27', 3),
(79, '2018-11-27', 3),
(80, '2018-11-27', 3),
(81, '2018-11-27', 3),
(82, '2018-11-27', 3);

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
(21, 7200, 1, 33, 32, 79),
(23, 3400, 1, 53, 34, 81),
(24, 310, 1, 43, 35, 82);

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
(16, 'AdmisiÃ³n General'),
(31, 'Cabecera'),
(5, 'Campo '),
(28, 'Corralito'),
(9, 'Dorrego Central'),
(10, 'Dorrego Lateral'),
(25, 'Grada Superior'),
(30, 'Lateral'),
(26, 'Pista'),
(13, 'Platea Alta'),
(14, 'Platea Este'),
(27, 'Platea General'),
(15, 'Platea Oeste'),
(29, 'Rebatibles'),
(18, 'SecciÃ³n 10'),
(22, 'SecciÃ³n 29'),
(20, 'SecciÃ³n 3'),
(24, 'SecciÃ³n A 29'),
(21, 'SecciÃ³n A28'),
(23, 'SecciÃ³n Sentado'),
(19, 'SecciÃ³n Sur'),
(6, 'Tribuna A Lateral'),
(11, 'Tribuna A Lateral Alta'),
(7, 'Tribuna B Lateral'),
(12, 'Tribuna B Lateral Alta'),
(8, 'Tribuna C'),
(32, 'Tribuna Superior'),
(17, 'VIP');

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
(32, 24634, 'temp/test.png'),
(34, 54755, 'temp/54755.png'),
(35, 58100, 'temp/58100.png');

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
(3, 'karina', 'felice', '29101068', 'kari@kari', 'admin', '1234');

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
  MODIFY `id_artist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `calendars`
--
ALTER TABLE `calendars`
  MODIFY `id_calendar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `events`
--
ALTER TABLE `events`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `event_places`
--
ALTER TABLE `event_places`
  MODIFY `id_event_place` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `event_squares`
--
ALTER TABLE `event_squares`
  MODIFY `id_event_square` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT de la tabla `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id_purchase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT de la tabla `purchase_lines`
--
ALTER TABLE `purchase_lines`
  MODIFY `id_purchase_line` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `square_types`
--
ALTER TABLE `square_types`
  MODIFY `id_square_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT de la tabla `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id_ticket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
