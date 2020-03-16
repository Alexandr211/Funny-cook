-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 16 2020 г., 09:02
-- Версия сервера: 8.0.15
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cook`
--

-- --------------------------------------------------------

--
-- Структура таблицы `dishes`
--

CREATE TABLE `dishes` (
  `id` int(25) NOT NULL,
  `dish` varchar(255) NOT NULL,
  `ingredient1` int(25) NOT NULL,
  `ingredient1_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `ingredient2` int(25) NOT NULL,
  `ingredient2_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `ingredient3` int(25) NOT NULL,
  `ingredient3_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `ingredient4` int(25) NOT NULL,
  `ingredient4_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `ingredient5` int(25) NOT NULL,
  `ingredient5_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `dishes`
--

INSERT INTO `dishes` (`id`, `dish`, `ingredient1`, `ingredient1_name`, `ingredient2`, `ingredient2_name`, `ingredient3`, `ingredient3_name`, `ingredient4`, `ingredient4_name`, `ingredient5`, `ingredient5_name`) VALUES
(1, 'гарнир', 1, '', 8, '', 3, '', 4, '', 6, ''),
(2, 'цыпленок запеченый', 5, '', 7, '', 3, '', 8, '', 6, ''),
(3, 'пицца', 9, '', 11, '', 10, '', 8, '', 16, ''),
(4, 'утка по пекински', 3, NULL, 17, NULL, 8, NULL, 12, NULL, 13, NULL),
(5, 'котлета рубленая', 18, NULL, 8, NULL, 25, NULL, 9, NULL, 12, NULL),
(6, 'коктейль с клубникой', 6, NULL, 22, NULL, 26, NULL, 1, NULL, 1, NULL),
(7, 'коктейль алкогольный', 6, NULL, 22, NULL, 23, NULL, 1, NULL, 1, NULL),
(8, 'торт', 2, NULL, 19, NULL, 25, NULL, 24, NULL, 9, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `ingredients`
--

CREATE TABLE `ingredients` (
  `id` int(25) NOT NULL,
  `ingredient` varchar(255) NOT NULL,
  `visibility` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ingredients`
--

INSERT INTO `ingredients` (`id`, `ingredient`, `visibility`) VALUES
(1, '', 1),
(2, 'сахар', 1),
(3, 'рис', 1),
(4, 'картофель', 1),
(5, 'курица', 1),
(6, 'молоко', 1),
(7, 'майонез', 1),
(8, 'соль', 1),
(9, 'мука', 1),
(10, 'томат', 1),
(11, 'сосиски', 1),
(12, 'лук', 1),
(13, 'укроп', 1),
(14, 'гречка', 1),
(15, 'перец', 1),
(16, 'яйца', 1),
(17, 'утка', 1),
(18, 'Фарш рубленый', 1),
(19, 'взбитые сливки', 1),
(20, 'сливочное масло', 1),
(21, 'оливковое масло', 1),
(22, 'мороженое', 1),
(23, 'коньяк', 1),
(24, 'сухое вино', 1),
(25, 'панировочные сухари', 1),
(26, 'клубничное варенье', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
  `id` int(25) NOT NULL,
  `id_dishes` int(25) NOT NULL,
  `name` varchar(255) NOT NULL,
  `ingredient1` int(11) NOT NULL,
  `ingredient2` int(11) NOT NULL,
  `ingredient3` int(11) NOT NULL,
  `ingredient4` int(11) NOT NULL,
  `ingredient5` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ingredient1` (`ingredient1`),
  ADD KEY `ingredient2` (`ingredient2`),
  ADD KEY `ingredient3` (`ingredient3`),
  ADD KEY `ingredient4` (`ingredient4`),
  ADD KEY `ingredient5` (`ingredient5`);

--
-- Индексы таблицы `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ingredient1` (`ingredient1`),
  ADD KEY `ingredient2` (`ingredient2`),
  ADD KEY `ingredient3` (`ingredient3`),
  ADD KEY `ingredient4` (`ingredient4`),
  ADD KEY `ingredient5` (`ingredient5`),
  ADD KEY `id_dishes` (`id_dishes`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `dishes`
--
ALTER TABLE `dishes`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `dishes`
--
ALTER TABLE `dishes`
  ADD CONSTRAINT `dishes_ibfk_1` FOREIGN KEY (`ingredient1`) REFERENCES `ingredients` (`id`),
  ADD CONSTRAINT `dishes_ibfk_2` FOREIGN KEY (`ingredient2`) REFERENCES `ingredients` (`id`),
  ADD CONSTRAINT `dishes_ibfk_3` FOREIGN KEY (`ingredient3`) REFERENCES `ingredients` (`id`),
  ADD CONSTRAINT `dishes_ibfk_4` FOREIGN KEY (`ingredient4`) REFERENCES `ingredients` (`id`),
  ADD CONSTRAINT `dishes_ibfk_5` FOREIGN KEY (`ingredient5`) REFERENCES `ingredients` (`id`);

--
-- Ограничения внешнего ключа таблицы `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`ingredient1`) REFERENCES `dishes` (`id`),
  ADD CONSTRAINT `menu_ibfk_2` FOREIGN KEY (`ingredient2`) REFERENCES `dishes` (`id`),
  ADD CONSTRAINT `menu_ibfk_3` FOREIGN KEY (`ingredient3`) REFERENCES `dishes` (`id`),
  ADD CONSTRAINT `menu_ibfk_4` FOREIGN KEY (`ingredient4`) REFERENCES `dishes` (`id`),
  ADD CONSTRAINT `menu_ibfk_5` FOREIGN KEY (`ingredient5`) REFERENCES `dishes` (`id`),
  ADD CONSTRAINT `menu_ibfk_6` FOREIGN KEY (`id_dishes`) REFERENCES `dishes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
