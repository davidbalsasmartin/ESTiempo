-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 26-11-2018 a las 22:17:38
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tiempo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `hume` int(3) DEFAULT NULL,
  `precidesc` varchar(18) DEFAULT NULL,
  `ciudad` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `link` varchar(280) NOT NULL,
  `temp` float DEFAULT NULL,
  `hora` datetime NOT NULL DEFAULT '2017-11-11 23:23:23',
  `icono` varchar(70) DEFAULT NULL,
  `viento` float DEFAULT NULL,
  `pviento` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`hume`, `precidesc`, `ciudad`, `link`, `temp`, `hora`, `icono`, `viento`, `pviento`) VALUES
(93, 'Lluvia débil', 'Álava', 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/33/Salinillas_de_Burad%C3%B3n_%28%C3%81lava%2C_Espa%C3%B1a%29.JPG/1024px-Salinillas_de_Burad%C3%B3n_%28%C3%81lava%2C_Espa%C3%B1a%29.JPG', 7, '2018-11-26 20:30:00', 'https://weather.api.here.com/static/weather/icon/22.png', 12.97, 'NO'),
(81, '', 'Albacete', 'https://upload.wikimedia.org/wikipedia/commons/a/a6/Bienservida_%28Albacete%29.JPG', 7, '2018-11-26 20:00:00', 'https://weather.api.here.com/static/weather/icon/16.png', 18.53, 'O'),
(51, '', 'Alicante', 'https://upload.wikimedia.org/wikipedia/commons/8/80/Playa_del_Postiguet%2C_Alicante%2C_Espa%C3%B1a%2C_2014-07-04%2C_DD_47.JPG', 15, '2018-11-26 20:30:00', 'https://weather.api.here.com/static/weather/icon/16.png', 27.8, 'NO'),
(38, '', 'Almería', 'https://upload.wikimedia.org/wikipedia/commons/4/4c/Almer%C3%ADa_desde_la_Alcazaba.JPG', 17.22, '2018-11-26 19:00:00', 'https://weather.api.here.com/static/weather/icon/23.png', 14.83, 'N'),
(76, '', 'Asturias', 'https://upload.wikimedia.org/wikipedia/commons/3/3a/Lago_Enol_%28Asturias%29.JPG', 9.28, '2018-11-26 19:00:00', 'https://weather.api.here.com/static/weather/icon/23.png', 3.71, 'NO'),
(NULL, NULL, 'Ávila', 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/Muralla_de_%C3%81vila_01.jpg/1024px-Muralla_de_%C3%81vila_01.jpg', NULL, '2017-11-11 23:23:23', NULL, NULL, ''),
(77, '', 'Badajoz', 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/58/Teatro_Romano_de_M%C3%A9rida_%28Badajoz%2C_Espa%C3%B1a%29_02.jpg/800px-Teatro_Romano_de_M%C3%A9rida_%28Badajoz%2C_Espa%C3%B1a%29_02.jpg', 12, '2018-11-26 18:00:00', 'https://weather.api.here.com/static/weather/icon/1.png', 12.97, 'O'),
(94, 'Lluvia', 'Barcelona', 'https://upload.wikimedia.org/wikipedia/commons/5/5d/Catalunya_Barcelona1_tango7174.jpg', 9, '2018-11-26 09:52:00', 'https://weather.api.here.com/static/weather/icon/27.png', 16.68, 'NO'),
(81, '', 'Burgos', 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/0a/Panor%C3%A1mica_de_la_ciudad_de_Burgos_desde_el_Castillo..jpg/1280px-Panor%C3%A1mica_de_la_ciudad_de_Burgos_desde_el_Castillo..jpg', 6, '2018-11-25 20:30:00', 'https://weather.api.here.com/static/weather/icon/16.png', 7.41, 'S'),
(77, '', 'Cabrera', 'https://upload.wikimedia.org/wikipedia/commons/d/d5/Castell_de_Cabrera.jpg', 17, '2018-11-25 17:30:00', 'https://weather.api.here.com/static/weather/icon/2.png', 37.07, 'SO'),
(95, 'Lluvia', 'Cáceres', 'https://upload.wikimedia.org/wikipedia/commons/d/d8/Ciudad_Monumental%2C_C%C3%A1ceres.JPG', 11.89, '2018-11-25 21:00:00', 'https://weather.api.here.com/static/weather/icon/27.png', 24.09, 'S'),
(94, 'Lluvia débil', 'Cádiz', 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/35/Playa_de_la_Caleta%2C_C%C3%A1diz%2C_Espa%C3%B1a%2C_2015-12-08%2C_DD_53.JPG/800px-Playa_de_la_Caleta%2C_C%C3%A1diz%2C_Espa%C3%B1a%2C_2015-12-08%2C_DD_53.JPG', 16, '2018-11-25 19:30:00', 'https://weather.api.here.com/static/weather/icon/22.png', 27.8, 'SO'),
(84, '', 'Cantabria', 'https://upload.wikimedia.org/wikipedia/commons/f/f3/Paisaje_de_prados_de_siega_en_Cantabria_%28Espa%C3%B1a%29._Monte_%28Riotuerto%29%2C_Barrio_de_Idiopuerta.jpg', 9.39, '2018-11-25 19:00:00', 'https://weather.api.here.com/static/weather/icon/23.png', 1.85, 'SO'),
(94, '', 'Castellón', 'https://upload.wikimedia.org/wikipedia/commons/1/1a/Plazamayorcastell%C3%B3n.jpg', 9, '2018-11-22 08:30:00', 'https://weather.api.here.com/static/weather/icon/1.png', 3.71, 'N'),
(82, 'Lluvia débil', 'Ceuta', 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/73/Casa_de_los_Dragones%2C_Ceuta%2C_Espa%C3%B1a%2C_2015-12-10%2C_DD_56.JPG/800px-Casa_de_los_Dragones%2C_Ceuta%2C_Espa%C3%B1a%2C_2015-12-10%2C_DD_56.JPG', 18, '2018-11-25 19:50:00', 'https://weather.api.here.com/static/weather/icon/22.png', 33.36, 'SO'),
(88, '', 'Ciudad Real', 'https://upload.wikimedia.org/wikipedia/commons/5/52/Plaza_Mayor_de_Ciudad_Reak.jpg', 10, '2018-11-22 20:00:00', 'https://weather.api.here.com/static/weather/icon/23.png', 12.97, 'SE'),
(52, '', 'Córdoba', 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/fc/Monumento_a_Manolete_de_la_ciudad_de_C%C3%B3rdoba_%28Espa%C3%B1a%29.JPG/800px-Monumento_a_Manolete_de_la_ciudad_de_C%C3%B3rdoba_%28Espa%C3%B1a%29.JPG', 16, '2018-11-26 17:00:00', 'https://weather.api.here.com/static/weather/icon/2.png', 9.27, 'NO'),
(66, '', 'Cuenca', 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9e/Vista_de_la_hoz_del_r%C3%ADo_Hu%C3%A9car_en_Cuenca_%28Espa%C3%B1a%29.JPG/800px-Vista_de_la_hoz_del_r%C3%ADo_Hu%C3%A9car_en_Cuenca_%28Espa%C3%B1a%29.JPG', 8.89, '2018-11-26 16:00:00', 'https://weather.api.here.com/static/weather/icon/13.png', 9.27, 'NO'),
(52, '', 'El Hierro', 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/48/Las_Playas_-_Punta_Bonanza_-_El_Hierro.jpg/1024px-Las_Playas_-_Punta_Bonanza_-_El_Hierro.jpg', 30, '2018-11-25 16:30:00', 'https://weather.api.here.com/static/weather/icon/2.png', 14.83, 'E'),
(88, '', 'Formentera', 'https://upload.wikimedia.org/wikipedia/commons/d/de/Faro_de_la_Mola%2C_Formentera_%289138995898%29.jpg', 14, '2018-11-22 20:30:00', 'https://weather.api.here.com/static/weather/icon/23.png', 0, 'N'),
(83, '', 'Fuerteventura', 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/33/Fuerteventura_-_Playa_de_Butihondo.JPG/1024px-Fuerteventura_-_Playa_de_Butihondo.JPG', 20, '2018-11-26 19:00:00', 'https://weather.api.here.com/static/weather/icon/23.png', 11.12, 'N'),
(100, '', 'Gerona', 'https://upload.wikimedia.org/wikipedia/commons/7/78/Girona_panoramic.JPG', 6, '2018-11-25 22:00:00', 'https://weather.api.here.com/static/weather/icon/23.png', 5.56, 'O'),
(78, '', 'Gran Canaria', 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/ce/Gran_canaria-797.JPG/1024px-Gran_canaria-797.JPG', 21, '2018-11-25 20:30:00', 'https://weather.api.here.com/static/weather/icon/23.png', 20.39, 'N'),
(71, '', 'Granada', 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/dc/Alhambra_hill_over_Granada_Spain.jpg/1024px-Alhambra_hill_over_Granada_Spain.jpg', 8, '2018-11-26 09:00:00', 'https://weather.api.here.com/static/weather/icon/23.png', 14.83, 'N'),
(94, 'Lluvia débil', 'Guadalajara', 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/11/Fuembellida%2C_Guadalajara%2C_Espa%C3%B1a%2C_2017-05-25%2C_DD_13.jpg/1200px-Fuembellida%2C_Guadalajara%2C_Espa%C3%B1a%2C_2017-05-25%2C_DD_13.jpg', 11, '2018-11-25 22:00:00', 'https://weather.api.here.com/static/weather/icon/22.png', 14.83, 'O'),
(69, '', 'Guipúzcoa', 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/bf/Playa_de_La_Concha_y_Ayuntamiento_de_San_Sebastian-Donostiako_Udala%2C_Guipuzcoa-Gipuzkoa..JPG/1024px-Playa_de_La_Concha_y_Ayuntamiento_de_San_Sebastian-Donostiako_Udala%2C_Guipuzcoa-Gipuzkoa..JPG', 9.28, '2018-11-25 19:00:00', 'https://weather.api.here.com/static/weather/icon/23.png', 9.27, 'SO'),
(95, 'Lluvia débil', 'Huelva', 'https://upload.wikimedia.org/wikipedia/commons/5/5a/Muelle_del_Tinto_Huelva.jpg', 12.22, '2018-11-22 20:00:00', 'https://weather.api.here.com/static/weather/icon/22.png', 5.56, 'E'),
(66, '', 'Huesca', 'https://upload.wikimedia.org/wikipedia/commons/4/4d/Monasterio_de_San_Juan_de_la_Pe%C3%B1a_en_Huesca_-Espa%C3%B1a-.jpg', 9, '2018-11-26 17:00:00', 'https://weather.api.here.com/static/weather/icon/2.png', 40.77, 'O'),
(NULL, NULL, 'Ibiza', 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/06/ForbysIbizaTown_02.jpg/1200px-ForbysIbizaTown_02.jpg', NULL, '2017-11-11 23:23:23', NULL, NULL, ''),
(88, '', 'Jaén', 'https://upload.wikimedia.org/wikipedia/commons/5/5f/Jaen-view.jpg', 7.11, '2018-11-24 19:00:00', 'https://weather.api.here.com/static/weather/icon/23.png', 3.71, 'SO'),
(71, 'Lluvia débil', 'La Coruña', 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/38/Torre_de_H%C3%A9rcules_La_Coru%C3%B1a_Espa%C3%B1a.jpg/1024px-Torre_de_H%C3%A9rcules_La_Coru%C3%B1a_Espa%C3%B1a.jpg', 10.72, '2018-11-25 18:00:00', 'https://weather.api.here.com/static/weather/icon/27.png', 9.27, 'S'),
(63, '', 'La Gomera', 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/e8/Vistas_del_Sureste_de_La_Gomera%2C_Espa%C3%B1a%2C_2012-12-14%2C_DD_04.jpg/1280px-Vistas_del_Sureste_de_La_Gomera%2C_Espa%C3%B1a%2C_2012-12-14%2C_DD_04.jpg', 32, '2018-11-25 15:00:00', 'https://weather.api.here.com/static/weather/icon/2.png', 18.53, 'SO'),
(83, '', 'La Palma', 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c4/La_Palma_-_Villa_de_Mazo_-_La_Salemera_-_Lugar_Playa_La_Salemera_%2B_Monta%C3%B1a_del_Azufre_03_ies.jpg/1280px-La_Palma_-_Villa_de_Mazo_-_La_Salemera_-_Lugar_Playa_La_Salemera_%2B_Monta%C3%B1a_del_Azufre_03_ies.jpg', 20, '2018-11-26 19:30:00', 'https://weather.api.here.com/static/weather/icon/23.png', 5.56, 'NO'),
(82, '', 'La Rioja', 'https://upload.wikimedia.org/wikipedia/commons/e/ed/Iglesia_de_Santo_Tom%C3%A1s_-_Haro_-_La_Rioja.jpg', 6.5, '2018-11-25 19:00:00', 'https://weather.api.here.com/static/weather/icon/23.png', 3.71, 'N'),
(18, '', 'Lanzarote', 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/Lanzarote_1_Luc_Viatour.jpg/1280px-Lanzarote_1_Luc_Viatour.jpg', 25, '2018-11-25 14:44:00', 'https://weather.api.here.com/static/weather/icon/17.png', 12.97, 'E'),
(81, '', 'León', 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/11/Le%C3%B3n_Casa_Botines_JMM.JPG/1024px-Le%C3%B3n_Casa_Botines_JMM.JPG', 2, '2018-11-26 20:30:00', 'https://weather.api.here.com/static/weather/icon/16.png', 9.27, 'O'),
(93, '', 'Lérida', 'https://upload.wikimedia.org/wikipedia/commons/8/80/Lleida-Imatge_de_la_Seu.jpg', 7.61, '2018-11-25 19:00:00', 'https://weather.api.here.com/static/weather/icon/13.png', 3.71, 'SO'),
(87, '', 'Lugo', 'https://upload.wikimedia.org/wikipedia/commons/a/af/Lugo_060420.jpg', 7, '2018-11-26 21:00:00', 'https://weather.api.here.com/static/weather/icon/23.png', 7.41, 'S'),
(82, '', 'Madrid', 'https://upload.wikimedia.org/wikipedia/commons/4/4e/Monumento_a_Alfonso_XII_de_Espa%C3%B1a_en_los_Jardines_del_Retiro_-_04.jpg', 10, '2018-11-22 20:00:00', 'https://weather.api.here.com/static/weather/icon/23.png', 9.27, 'SE'),
(61, '', 'Málaga', 'https://upload.wikimedia.org/wikipedia/commons/3/3b/Puerto_de_M%C3%A1laga_090308.jpg', 14.61, '2018-11-26 19:00:00', 'https://weather.api.here.com/static/weather/icon/23.png', 18.53, 'NO'),
(72, '', 'Mallorca', 'https://farm8.static.flickr.com/7275/7415739608_16b5c40bd0_b.jpg', 13, '2018-11-26 21:00:00', 'https://weather.api.here.com/static/weather/icon/23.png', 7.41, 'O'),
(64, '', 'Melilla', 'https://upload.wikimedia.org/wikipedia/commons/d/d9/Melilla_desde_los_tejados.jpg', 17.72, '2018-11-25 21:00:00', 'https://weather.api.here.com/static/weather/icon/23.png', 11.12, 'O'),
(68, '', 'Menorca', 'https://upload.wikimedia.org/wikipedia/commons/4/40/Cala%27n_Brut_Menorca.JPG', 17, '2018-11-21 16:00:00', 'https://weather.api.here.com/static/weather/icon/2.png', 20.39, 'O'),
(NULL, NULL, 'Murcia', 'https://upload.wikimedia.org/wikipedia/commons/4/4f/Caravaca_de_la_Cruz_Murcia_Espana.jpg', NULL, '2017-11-11 23:23:23', NULL, NULL, ''),
(81, '', 'Navarra', 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Milagro_Navarra.jpg/1024px-Milagro_Navarra.jpg', 6, '2018-11-25 19:30:00', 'https://weather.api.here.com/static/weather/icon/16.png', 1.85, 'N'),
(87, 'Llovizna', 'Orense', 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/67/Roman_bridge%2C_Ourense_%28Spain%29.jpg/1024px-Roman_bridge%2C_Ourense_%28Spain%29.jpg', 7.5, '2018-11-22 22:00:00', 'https://weather.api.here.com/static/weather/icon/22.png', 0, 'N'),
(81, '', 'Palencia', 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/Casa_consistorial_de_Palencia.jpg/1024px-Casa_consistorial_de_Palencia.jpg', 6, '2018-11-25 20:30:00', 'https://weather.api.here.com/static/weather/icon/16.png', 7.41, 'S'),
(88, '', 'Pontevedra', 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/96/Puente_de_Rande_Pontevedra_Espa%C3%B1a.JPG/1024px-Puente_de_Rande_Pontevedra_Espa%C3%B1a.JPG', 11, '2018-11-23 16:30:00', 'https://weather.api.here.com/static/weather/icon/2.png', 12.97, 'SO'),
(100, 'Lluvia débil', 'Salamanca', 'https://upload.wikimedia.org/wikipedia/commons/c/c7/Panor%C3%A1mica_Plaza_Mayor_Noche.jpg', 7, '2018-11-25 21:00:00', 'https://weather.api.here.com/static/weather/icon/22.png', 5.56, 'SE'),
(NULL, NULL, 'Segovia', 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d9/Church_of_the_Vera_Cruz%2C_Segovia%3B_Espa%C3%B1a.jpg/1024px-Church_of_the_Vera_Cruz%2C_Segovia%3B_Espa%C3%B1a.jpg', NULL, '2017-11-11 23:23:23', NULL, NULL, ''),
(100, 'Lluvia débil', 'Sevilla', 'https://upload.wikimedia.org/wikipedia/commons/7/79/Plaza_de_Toros_de_la_Maestranza.jpg', 13, '2018-11-22 20:00:00', 'https://weather.api.here.com/static/weather/icon/22.png', 11.12, 'NE'),
(NULL, NULL, 'Soria', 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a4/Monasterio_de_San_Juan_de_Duero%2C_Soria%2C_Espa%C3%B1a%2C_2017-05-26%2C_DD_19.jpg/1024px-Monasterio_de_San_Juan_de_Duero%2C_Soria%2C_Espa%C3%B1a%2C_2017-05-26%2C_DD_19.jpg', NULL, '2017-11-11 23:23:23', NULL, NULL, ''),
(NULL, NULL, 'Tarragona', 'https://upload.wikimedia.org/wikipedia/commons/c/c9/Spain.Tarragona.Catedral.Conques.02.JPG', NULL, '2017-11-11 23:23:23', NULL, NULL, ''),
(88, '', 'Tenerife', 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/e4/Los_Gigantes%2C_Tenerife%2C_Espa%C3%B1a%2C_2012-12-16%2C_DD_10.jpg/1024px-Los_Gigantes%2C_Tenerife%2C_Espa%C3%B1a%2C_2012-12-16%2C_DD_10.jpg', 20, '2018-11-25 21:00:00', 'https://weather.api.here.com/static/weather/icon/24.png', 5.56, 'SO'),
(94, '', 'Teruel', 'https://upload.wikimedia.org/wikipedia/commons/2/28/Catedral%2C_Teruel%2C_Espa%C3%B1a%2C_2014-01-10%2C_DD_67.JPG', 10, '2018-11-25 20:30:00', 'https://weather.api.here.com/static/weather/icon/24.png', 3.71, 'N'),
(NULL, NULL, 'Toledo', 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c2/Catedral_Primada._Toledo%2C_Espa%C3%B1a.jpg/1200px-Catedral_Primada._Toledo%2C_Espa%C3%B1a.jpg', NULL, '2017-11-11 23:23:23', NULL, NULL, ''),
(82, '', 'Valencia', 'https://upload.wikimedia.org/wikipedia/commons/e/ef/El_Hemisf%C3%A9rico%2C_Ciudad_de_las_Artes_y_las_Ciencias%2C_Valencia%2C_Espa%C3%B1a%2C_2014-06-29%2C_DD_60-62_HDR.JPG', 13, '2018-11-22 09:30:00', 'https://weather.api.here.com/static/weather/icon/2.png', 7.41, 'O'),
(NULL, NULL, 'Valladolid', 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/71/Ayuntamiento_de_la_ciudad_en_la_Plaza_Mayor_de_Valladolid.jpg/1024px-Ayuntamiento_de_la_ciudad_en_la_Plaza_Mayor_de_Valladolid.jpg', NULL, '2017-11-11 23:23:23', NULL, NULL, ''),
(87, '', 'Vizcaya', 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c7/Bilbao_-_Guggenheim_aurore.jpg/1024px-Bilbao_-_Guggenheim_aurore.jpg', 9, '2018-11-25 20:30:00', 'https://weather.api.here.com/static/weather/icon/16.png', 5.56, 'E'),
(NULL, NULL, 'Zamora', 'https://upload.wikimedia.org/wikipedia/commons/c/c2/Catedral_zamora.JPG', NULL, '2017-11-11 23:23:23', NULL, NULL, ''),
(82, '', 'Zaragoza', 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/8f/Monreal_de_Ariza%2C_Zaragoza%2C_Espa%C3%B1a%2C_2015-12-28%2C_DD_08.JPG/1280px-Monreal_de_Ariza%2C_Zaragoza%2C_Espa%C3%B1a%2C_2015-12-28%2C_DD_08.JPG', 8, '2018-11-25 19:00:00', 'https://weather.api.here.com/static/weather/icon/23.png', 12.97, 'SO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `nombre` varchar(34) NOT NULL,
  `lugar` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `validado` char(2) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `foto` varchar(70) NOT NULL,
  `usuario` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`nombre`, `lugar`, `fecha_inicio`, `fecha_fin`, `validado`, `foto`, `usuario`) VALUES
('Cine de verano', 'Málaga', '2019-06-15', '2019-07-30', 'no', 'gente.jpg', 'juanita5'),
('Concierto Bisbal', 'Badajoz', '2019-07-20', '2019-07-28', 'no', 'gente.jpg', 'pepito1'),
('Concierto Bisbal', 'Cádiz', '2019-07-20', '2019-07-28', 'no', 'gente.jpg', 'juanita5'),
('Concierto Bisbal', 'Melilla', '2019-07-20', '2019-07-28', 'no', 'gente.jpg', 'juanita5'),
('Concierto Chenoa', 'Madrid', '2019-07-20', '2019-07-20', 'no', 'gente.jpg', 'juanita5'),
('Concierto Estopa', 'Málaga', '2019-07-20', '2019-07-28', 'no', 'gente.jpg', 'juanita5'),
('Concierto Melendi', 'Huelva', '2018-12-28', '2018-12-28', 'no', 'Plaza.jpg', 'juanita5'),
('Concierto Melendi', 'Madrid', '2018-12-28', '2018-12-28', 'no', 'Plaza.jpg', 'juanita5'),
('Concierto Melendi', 'Málaga', '2018-12-28', '2018-12-28', 'no', 'Plaza.jpg', 'juanita5'),
('Concierto Melendi', 'Murcia', '2018-12-28', '2018-12-28', 'no', 'Plaza.jpg', 'pepito1'),
('Feria', 'Barcelona', '2019-07-20', '2019-07-28', 'no', 'feria.jpg', 'pepito1'),
('Feria', 'Córdoba', '2019-07-20', '2019-07-28', 'no', 'feria.jpg', 'juanita5'),
('Feria', 'Málaga', '2019-07-20', '2019-07-28', 'no', 'feria.jpg', 'juanita5'),
('Feria', 'Mallorca', '2019-07-20', '2019-07-28', 'no', 'feria.jpg', 'juanita5'),
('feria de alava', 'Álava', '2018-11-28', '2018-11-30', 'si', '2018-11-26-09-18-14feria.jpg', 'root'),
('Feria de Alicante', 'Alicante', '2019-03-07', '2019-03-16', 'si', '2018-11-26-09-19-54feria.jpg', 'root'),
('Fiesta Álora', 'Cádiz', '2019-07-20', '2019-07-28', 'no', 'feria.jpg', 'juanita5'),
('Fiesta Álora', 'Málaga', '2019-07-20', '2019-07-28', 'no', 'feria.jpg', 'juanita5'),
('Fiesta primavera', 'Cádiz', '2018-02-20', '2019-03-28', 'no', 'Plaza.jpg', 'juanita5'),
('Fiesta primavera', 'Ceuta', '2018-02-10', '2019-03-18', 'no', 'gente.jpg', 'juanita5'),
('Fiesta primavera', 'Cuenca', '2018-02-20', '2019-03-28', 'no', 'Plaza.jpg', 'pepito1'),
('Fiesta primavera', 'La Palma', '2018-01-20', '2019-03-28', 'no', 'Plaza.jpg', 'juanita5'),
('Fiesta primavera', 'Málaga', '2018-02-20', '2019-03-28', 'no', 'Plaza.jpg', 'juanita5'),
('Fiesta prueblo', 'Gran Canaria', '2019-07-20', '2019-07-28', 'no', 'feria.jpg', 'pepito1'),
('Fiesta Pueblo', 'Jaén', '2019-07-20', '2019-07-28', 'no', 'feria.jpg', 'juanita5'),
('Fiesta Pueblo', 'La Coruña', '2019-07-20', '2019-07-28', 'no', 'feria.jpg', 'juanita5'),
('ioaubdasidbsa', 'Asturias', '2018-11-29', '2018-11-30', 'no', '2018-11-26-07-00-26800px-Puerto_de_Málaga_090308.jpg', 'dasda346'),
('Playita', 'Sevilla', '2099-12-12', '2099-12-12', 'si', 'playita.jpg', 'root'),
('Uy Casi', 'Barcelona', '2019-04-29', '2019-05-01', 'si', '2018-11-25-10-04-44feria.jpg', 'root');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiempof`
--

CREATE TABLE `tiempof` (
  `cod` int(1) NOT NULL,
  `temp` float DEFAULT NULL,
  `icono` varchar(70) DEFAULT NULL,
  `viento` float DEFAULT NULL,
  `hume` int(3) DEFAULT NULL,
  `precidesc` varchar(18) DEFAULT NULL,
  `hora` datetime DEFAULT NULL,
  `pviento` varchar(3) DEFAULT NULL,
  `preciprob` int(3) NOT NULL,
  `ciudad` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usuario` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `ciudad` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `contrasena` varchar(72) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `ciudad1` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `ciudad2` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `ciudad3` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuario`, `correo`, `ciudad`, `contrasena`, `ciudad1`, `ciudad2`, `ciudad3`) VALUES
('dasda344', 'oijegovier@gmail.com', 'Asturias', '$2y$10$iS/aWGPuNeAoyxjrHReF8ujhddII5Ek.A2bIHze7qNI.Qe4IKbpEm', NULL, NULL, NULL),
('dasda346', 'asdasdasd@gmail.com', 'Málaga', '$2y$10$A.2UrvqS2e1IqUQri2502uSAn8hK0CxbCfWMuQd6DoXNWK1dlnprG', 'Almería', 'Fuerteventura', 'Asturias'),
('juanita5', 'oiwnvewfv@gmail.com', 'Guadalajara', '$2y$10$Xcw4JhLr2CaTvySDLmHVfODYauVMm.vUlw.onYO1XVZ8ms3lqWdDm', NULL, NULL, NULL),
('JuliaCasas93', 'oiwneefoiwenf@gmail.com', 'La Palma', '$2y$10$0T4eNCUg2HmnTh2P69nkCOEn1udGjI4aAa6joVKmGDqP1gRAvmR3e', NULL, NULL, NULL),
('oisncesmdfsddddddddd', 'omeropfmeropfm@oiwefewd.com', 'Alicante', '$2y$10$BLSOxfyEVVLvWncqre85jea7D37GX14eiPDN.li1ax0lENHDmLq/C', 'Cabrera', 'Gran Canaria', NULL),
('pepito1', 'afanfas@oisfjasd.com', 'Castellón', '$2y$10$7GJhd4RYIDIAark56OVqyu27wiQl9kWqic02GEc.BuUc9F9LHR1Bq', NULL, NULL, NULL),
('pepito5', 'iowuefoief@gmail.com', 'Mallorca', '$2y$10$vfPo.tOrZ2SbUcfkSe5ghO585s7EGv4Ru5jGNwrtOjOhrnvjAeJ1K', NULL, NULL, NULL),
('root', 'root@root.es', 'Málaga', '$2y$10$hhKBYIBNbub5bVDfzHU6DeZqaavu7L9VyxH0rJlNoNRDwKT/t3gm2', 'Álava', 'Albacete', 'Alicante'),
('sacatantunquetun', 'asdoinevf@oiefw.com', 'Ciudad Real', '$2y$10$.FAb56X4Qa1HkDQ/H4L.b.sc6zKln5HKzdPjcIx3M5Uxd604PEO/W', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viaje`
--

CREATE TABLE `viaje` (
  `ciudad` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha_ini` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `usuario` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `viaje`
--

INSERT INTO `viaje` (`ciudad`, `fecha_ini`, `fecha_fin`, `usuario`) VALUES
('Álava', '2018-11-28', '2018-12-04', 'JuliaCasas93'),
('Alicante', '2018-11-28', '2018-11-30', 'dasda346'),
('La Palma', '2019-05-24', '2019-06-28', 'root');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`ciudad`);

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`nombre`,`lugar`),
  ADD KEY `lugar` (`lugar`);

--
-- Indices de la tabla `tiempof`
--
ALTER TABLE `tiempof`
  ADD PRIMARY KEY (`cod`,`ciudad`),
  ADD KEY `ciudad` (`ciudad`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD UNIQUE KEY `ciudad1` (`ciudad1`),
  ADD UNIQUE KEY `ciudad2` (`ciudad2`),
  ADD UNIQUE KEY `ciudad3` (`ciudad3`),
  ADD KEY `ciudad` (`ciudad`);

--
-- Indices de la tabla `viaje`
--
ALTER TABLE `viaje`
  ADD PRIMARY KEY (`ciudad`,`usuario`),
  ADD KEY `usuario` (`usuario`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `evento_ibfk_1` FOREIGN KEY (`lugar`) REFERENCES `ciudad` (`ciudad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tiempof`
--
ALTER TABLE `tiempof`
  ADD CONSTRAINT `tiempof_ibfk_1` FOREIGN KEY (`ciudad`) REFERENCES `ciudad` (`ciudad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`ciudad1`) REFERENCES `ciudad` (`ciudad`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_ibfk_3` FOREIGN KEY (`ciudad2`) REFERENCES `ciudad` (`ciudad`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_ibfk_4` FOREIGN KEY (`ciudad3`) REFERENCES `ciudad` (`ciudad`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_ibfk_5` FOREIGN KEY (`ciudad`) REFERENCES `ciudad` (`ciudad`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `viaje`
--
ALTER TABLE `viaje`
  ADD CONSTRAINT `viaje_ibfk_1` FOREIGN KEY (`ciudad`) REFERENCES `ciudad` (`ciudad`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `viaje_ibfk_2` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

DELIMITER $$
--
-- Eventos
--
CREATE DEFINER=`root`@`localhost` EVENT `actualizaViaje` ON SCHEDULE EVERY 1 DAY STARTS '2018-11-25 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO DELETE FROM Viaje where fecha_fin < NOW()$$

CREATE DEFINER=`root`@`localhost` EVENT `actualizaEvento` ON SCHEDULE EVERY 1 DAY STARTS '2018-11-25 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO DELETE FROM evento where fecha_fin < NOW()$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
