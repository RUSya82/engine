-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 10 2019 г., 22:31
-- Версия сервера: 5.6.41
-- Версия PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `sport`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id` int(20) NOT NULL,
  `products` text,
  `totalPrice` float DEFAULT NULL,
  `idUser` int(20) DEFAULT NULL,
  `date` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id`, `products`, `totalPrice`, `idUser`, `date`) VALUES
(1, 'a:3:{i:35;i:3;i:45;i:4;i:66;i:5;}', NULL, 15, '2018-12-27'),
(2, 'a:3:{i:35;i:3;i:45;i:4;i:66;i:5;}', NULL, 12, '2018-12-27'),
(3, 'a:3:{i:35;i:3;i:45;i:4;i:66;i:5;}', NULL, 16, '2018-12-27');

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'кроссовки'),
(2, 'костюмы'),
(3, 'лыжи'),
(4, 'инвентарь'),
(5, 'товары для ухода'),
(6, 'Санки');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(20) NOT NULL,
  `products` text,
  `totalPrice` float DEFAULT NULL,
  `idUser` int(20) DEFAULT NULL,
  `date` varchar(10) DEFAULT NULL,
  `isPayed` int(1) NOT NULL DEFAULT '0',
  `isDelivered` int(1) NOT NULL DEFAULT '0',
  `deliveryAdress` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `products`, `totalPrice`, `idUser`, `date`, `isPayed`, `isDelivered`, `deliveryAdress`) VALUES
(1, 'a:3:{i:35;i:3;i:45;i:4;i:66;i:5;}', NULL, 12, '2018-12-27', 0, 0, 'sefgweg'),
(2, 'a:3:{i:35;i:3;i:45;i:4;i:66;i:5;}', NULL, 12, '2018-12-27', 0, 0, 'sefgweg'),
(3, 'a:3:{i:35;i:3;i:45;i:4;i:66;i:5;}', NULL, 12, '2018-12-27', 0, 0, 'sefgweg'),
(4, 'a:3:{i:35;i:3;i:45;i:4;i:66;i:5;}', NULL, 12, '2018-12-27', 0, 0, 'sefgweg'),
(5, 'a:3:{i:35;i:3;i:45;i:4;i:66;i:5;}', NULL, 12, '2018-12-27', 0, 0, 'sefgweg');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(12) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `customer_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `customer_id`, `category_id`) VALUES
(1, 'Nike Air', 'сезон лето 2018', 250, 1, 1),
(5, 'Asiks', 'сезон осень 2017', 185, 3, 1),
(6, 'Снежок', 'лыжи деревянные', 100, 4, 3),
(7, 'xcvuijhv', 'Nifgjfgjke', 650, 6, 2),
(8, 'костюм Abibas', 'настоящий', 125, 4, 2),
(10, 'Костюм', 'Nike', 650, 6, 2),
(35, 'Футболка', 'шелк', 650, 6, 2),
(45, 'Майка', 'Хлопок', 650, 6, 2),
(46, 'Снежок', 'лыжи деревянные', 100, 4, 3),
(61, 'lhijn', 'lknjbbnj', 650, 6, 2),
(62, 'lhijn', 'lknjbbnj', 650, 6, 2),
(64, 'lhijn', 'lknjbbnj', 650, 6, 2),
(65, 'lhijn', 'lknjbbnj', 650, 6, 2),
(66, 'Шорты', 'Плавательные', 650, 6, 2),
(67, 'lhijn', 'lknjbbnj', 650, 6, 2),
(68, 'lhijn', 'lknjbbnj', 650, 6, 2),
(69, 'lhijn', 'lknjbbnj', 650, 6, 2),
(70, 'lhijn', 'lknjbbnj', 650, 6, 2),
(71, 'lhijn', 'lknjbbnj', 650, 6, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `userName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `userName`) VALUES
(1, 'admin', '12345', 'Alik'),
(3, 'Katya', '111', 'Kate'),
(4, 'Vas92', '555', 'Vasya'),
(5, 'fhfhfh', '656585', 'toopack');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
