-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-10-2018 a las 15:25:10
-- Versión del servidor: 5.7.14
-- Versión de PHP: 5.6.25

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
  `name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `dni` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `artists`
--

INSERT INTO `artists` (`id_artist`, `name`, `last_name`, `dni`) VALUES
(1, 'Ricardo', 'Arjona', '44444444'),
(2, 'Pablito', 'Lescano', '11111111');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calendars`
--

CREATE TABLE `calendars` (
  `id_calendar` int(11) NOT NULL,
  `date` date NOT NULL,
  `id_event` int(11) NOT NULL,
  `id_event_place` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `calendars`
--

INSERT INTO `calendars` (`id_calendar`, `date`, `id_event`, `id_event_place`) VALUES
(1, '2018-10-08', 2, 3),
(13, '2018-10-02', 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calendars_x_artists`
--

CREATE TABLE `calendars_x_artists` (
  `id_artist` int(11) NOT NULL,
  `id_calendar` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id_category` int(11) NOT NULL,
  `description` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id_category`, `description`) VALUES
(1, 'musical'),
(2, 'boxeo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `events`
--

CREATE TABLE `events` (
  `id_event` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `events`
--

INSERT INTO `events` (`id_event`, `title`, `category`) VALUES
(1, 'Gran musical', 1),
(2, 'Pelea del siglo', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `event_places`
--

CREATE TABLE `event_places` (
  `id_event_place` int(11) NOT NULL,
  `description` varchar(75) NOT NULL,
  `capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `event_places`
--

INSERT INTO `event_places` (`id_event_place`, `description`, `capacity`) VALUES
(3, 'monumental', 65000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `event_squares`
--

CREATE TABLE `event_squares` (
  `id_event_square` int(11) NOT NULL,
  `price` float NOT NULL,
  `available_quantity` int(11) NOT NULL,
  `remainder` int(11) NOT NULL,
  `id_square_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `event_squares`
--

INSERT INTO `event_squares` (`id_event_square`, `price`, `available_quantity`, `remainder`, `id_square_type`) VALUES
(3, 435435, 435, 345, 6),
(4, 12000, 25887, 1, 6),
(5, 12000, 25887, 1, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `purchases`
--

CREATE TABLE `purchases` (
  `pdate` date NOT NULL,
  `customer` int(11) NOT NULL,
  `id_purchase` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `purchases`
--

INSERT INTO `purchases` (`pdate`, `customer`, `id_purchase`) VALUES
('2018-10-01', 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `square_types`
--

CREATE TABLE `square_types` (
  `id_square_type` int(11) NOT NULL,
  `description` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `square_types`
--

INSERT INTO `square_types` (`id_square_type`, `description`) VALUES
(1, 'Platea'),
(6, 'Campo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tickets`
--

CREATE TABLE `tickets` (
  `id_ticket` int(11) NOT NULL,
  `numberr` int(11) NOT NULL,
  `qr` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `dni` varchar(8) NOT NULL,
  `email` varchar(50) NOT NULL,
  `type` varchar(10) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`name`, `last_name`, `dni`, `email`, `type`, `id_user`) VALUES
('Federico', 'Elias', '40794525', 'fefe@fefe', 'admin', 3),
('allan', 'maduro', '19040012', 'allan@allan', 'admin', 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id_artist`);

--
-- Indices de la tabla `calendars`
--
ALTER TABLE `calendars`
  ADD PRIMARY KEY (`id_calendar`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Indices de la tabla `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id_event`);

--
-- Indices de la tabla `event_places`
--
ALTER TABLE `event_places`
  ADD PRIMARY KEY (`id_event_place`),
  ADD UNIQUE KEY `description` (`description`);

--
-- Indices de la tabla `event_squares`
--
ALTER TABLE `event_squares`
  ADD PRIMARY KEY (`id_event_square`);

--
-- Indices de la tabla `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id_purchase`);

--
-- Indices de la tabla `square_types`
--
ALTER TABLE `square_types`
  ADD PRIMARY KEY (`id_square_type`);

--
-- Indices de la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id_ticket`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `dni` (`dni`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `artists`
--
ALTER TABLE `artists`
  MODIFY `id_artist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `calendars`
--
ALTER TABLE `calendars`
  MODIFY `id_calendar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `events`
--
ALTER TABLE `events`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `event_places`
--
ALTER TABLE `event_places`
  MODIFY `id_event_place` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `event_squares`
--
ALTER TABLE `event_squares`
  MODIFY `id_event_square` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id_purchase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `square_types`
--
ALTER TABLE `square_types`
  MODIFY `id_square_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id_ticket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
