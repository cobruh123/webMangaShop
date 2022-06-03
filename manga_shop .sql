-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 03 2022 г., 21:20
-- Версия сервера: 10.4.24-MariaDB
-- Версия PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `manga_shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `cid` int(11) NOT NULL,
  `uid` varchar(128) NOT NULL,
  `date` datetime NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`cid`, `uid`, `date`, `message`) VALUES
(2, 'Anonymous', '2022-06-01 01:37:00', 'This is a new comment!'),
(3, 'Anonymous', '2022-06-01 01:40:21', 'Yo'),
(18, 'Anonymous', '2022-06-01 01:58:59', 'Hi there'),
(27, 'Anonymous', '2022-06-01 02:14:38', 'hello'),
(28, 'Anonymous', '2022-06-01 03:18:45', '3'),
(29, 'Anonymous', '2022-06-01 07:11:37', 'Hello again'),
(33, 'Admin', '2022-06-01 07:47:37', 'Thank you all!');

-- --------------------------------------------------------

--
-- Структура таблицы `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `items`
--

INSERT INTO `items` (`id`, `name`, `price`) VALUES
(1, 'Naruto', 107),
(2, 'My Hero Academia', 79),
(3, 'Saiki Kusuno no Psi Nan', 80),
(4, 'Jujutsu Kaisen', 79),
(5, 'Tokyo Revengers', 83),
(6, 'Shingeki no Kyojin', 73),
(7, 'Soul eater', 83),
(8, 'Shigatsu wa Kimi no Uso', 78),
(9, 'Komi can’t communicate', 81),
(10, 'The Promised Neverland', 74),
(11, 'Kaguya-sama: Love Is War', 83),
(12, 'One Punch Man', 68),
(13, 'cscve', 56);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `contact`, `city`, `address`) VALUES
(1, 'Test', 'test@test.com', '123', '8899889988', 'Nur-Sultan', '100 street, 1'),
(2, 'Amina', 'amina1@gmail.com', '1234567', '8899889989', 'Nur-Sultan', '100 street, 2'),
(3, 'Adina', 'adina2@gmail.com', '123', '8899889990', 'Nur-Sultan', '100 street, 3'),
(4, 'AminaN', 'amina2@gmail.com', '224cf2b695a5e8ecaecfb9015161fa4b', '87002182151', 'Semey', 'Nice Street, 2'),
(5, 'admin', 'admin', 'admin', '8899889988', 'Indore', '100 palace colony, Indore'),
(6, 'Aminaa', 'aminaa@gmail.com', '14e1b600b1fd579f47433b88e8d85291', '87716246212', 'Semey', 'Expo'),
(7, 'Adina', 'adina@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '87716246212', '?????', 'Expo'),
(8, 'AdinaS', 'atk1702@gmail.com', '14e1b600b1fd579f47433b88e8d85291', '123456', 'Semey', 'Nice Street, 2');

-- --------------------------------------------------------

--
-- Структура таблицы `users_items`
--

CREATE TABLE `users_items` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `status` enum('Added to cart','Confirmed') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `users_items`
--

INSERT INTO `users_items` (`id`, `user_id`, `item_id`, `status`) VALUES
(7, 3, 3, 'Added to cart'),
(8, 3, 4, 'Added to cart'),
(9, 3, 5, 'Added to cart'),
(10, 3, 11, 'Added to cart'),
(11, 1, 9, 'Added to cart'),
(12, 1, 2, 'Added to cart'),
(13, 1, 8, 'Added to cart'),
(28, 6, 4, 'Confirmed'),
(29, 6, 3, 'Added to cart'),
(30, 6, 2, 'Added to cart'),
(34, 4, 1, 'Confirmed'),
(35, 4, 3, 'Added to cart'),
(37, 8, 2, 'Confirmed'),
(38, 8, 10, 'Confirmed');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`cid`);

--
-- Индексы таблицы `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users_items`
--
ALTER TABLE `users_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`item_id`),
  ADD KEY `item_id` (`item_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT для таблицы `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `users_items`
--
ALTER TABLE `users_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `users_items`
--
ALTER TABLE `users_items`
  ADD CONSTRAINT `users_items_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `users_items_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
