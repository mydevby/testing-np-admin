-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 16 2024 г., 14:31
-- Версия сервера: 8.0.19
-- Версия PHP: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `show_in_main_slider` tinyint(1) DEFAULT '0',
  `parent_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `url`, `description`, `show_in_main_slider`, `parent_id`) VALUES
(1, 'Ноутбуки', 'laptops', 'краткое описание категории ноутбуки', 1, 0),
(2, 'Ноутбуки-1', 'laptops-1', '', 0, 1),
(3, 'Ноутбуки-2', 'laptops-2', '', 0, 1),
(4, 'Ноутбуки-3', 'laptops-3', '', 0, 1),
(5, 'Планшеты', 'tablets', 'краткое описание категории планшеты', 1, 0),
(6, 'Планшеты-1', 'tablets-1', '', 0, 5),
(7, 'Планшеты-2', 'tablets-2', '', 0, 5),
(8, 'Планшеты-3', 'tablets-3', '', 0, 5),
(9, 'Смартфоны', 'smartphones', 'краткое описание категории смартфоны', 1, 0),
(10, 'Смартфоны-1', 'smartphones-1', '', 0, 9),
(11, 'Смартфоны-2', 'smartphones-2', '', 0, 9),
(13, 'Наушники', 'headphones', 'краткое описание категории наушники', 1, 0),
(14, 'Наушники-1', 'headphones-1', '', 0, 13),
(15, 'Наушники-2', 'headphones-2', '', 0, 13),
(16, 'Наушники-3', 'headphones-3', '', 0, 13),
(17, 'Телевизоры', 'tvs', 'краткое описание категории телевизоры', 1, 0),
(18, 'Телевизоры-1', 'tvs-1', '', 0, 17),
(19, 'Телевизоры-2', 'tvs-2', '', 0, 17),
(20, 'Телевизоры-3', 'tvs-3', '', 0, 17),
(21, 'Аксессуары', 'accessories', 'краткое описание категории аксессуары', 1, 0),
(23, 'Смартфоны-3', 'smartphones-3', '', 0, 9);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `count` int DEFAULT NULL,
  `category` int DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `rating` decimal(2,1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `description`, `count`, `category`, `price`, `rating`) VALUES
(1, 'POCO M4 PRO 5G', 'product-1.jpg', 'Смартфон POCO M4 PRO 5G 4GB/64GB Yellow EU', 100, 9, '489.00', '4.1'),
(2, 'Apple iPhone 15 Pro Max', 'product-2.jpg', 'Смартфон Apple iPhone 15 Pro Max 256GB Blue Titanium (MU6T3J/A)', 100, 9, '5999.00', '3.1'),
(3, 'Xiaomi Redmi Note 12', 'product-3.jpg', 'Смартфон Xiaomi Redmi Note 12 8GB/256GB without NFC Ice Blue EU', 100, 9, '799.00', '4.1'),
(4, 'Samsung Galaxy A34', 'product-4.jpg', 'Смартфон Samsung Galaxy A34 5G SM-A346 6GB/128GB (серебристый)', 110, 9, '899.00', '1.3'),
(5, 'POCO M4 PRO 5G', 'product-1.jpg', 'Смартфон POCO M4 PRO 5G 4GB/64GB Yellow EU', 0, 9, '489.00', '4.1'),
(6, 'Apple iPhone 15 Pro Max', 'product-2.jpg', 'Смартфон Apple iPhone 15 Pro Max 256GB Blue Titanium (MU6T3J/A)', 1, 9, '3999.00', '5.0'),
(7, 'Xiaomi Redmi Note 12', 'product-3.jpg', 'Смартфон Xiaomi Redmi Note 12 8GB/256GB without NFC Ice Blue EU', 100, 9, '1799.00', '2.1'),
(8, 'Samsung Galaxy A34', 'product-4.jpg', 'Смартфон Samsung Galaxy A34 5G SM-A346 6GB/128GB (серебристый)', 100, 9, '1899.00', '2.3'),
(9, 'POCO M4 PRO 5G', 'product-1.jpg', 'Смартфон POCO M4 PRO 5G 4GB/64GB Yellow EU', 100, 9, '789.00', '4.1'),
(10, 'Apple iPhone 15 Pro Max', 'product-2.jpg', 'Смартфон Apple iPhone 15 Pro Max 256GB Blue Titanium (MU6T3J/A)', 100, 9, '9999.00', '1.1');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
