-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Фев 23 2019 г., 19:25
-- Версия сервера: 5.7.25-0ubuntu0.18.04.2
-- Версия PHP: 7.2.15-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `tasknsign`
--

-- --------------------------------------------------------

--
-- Структура таблицы `dishes`
--

CREATE TABLE `dishes` (
  `id` int(25) NOT NULL,
  `dish` varchar(255) NOT NULL,
  `ingredient1` int(25) NOT NULL,
  `ingredient1_name` varchar(255) NOT NULL,
  `ingredient2` int(25) NOT NULL,
  `ingredient2_name` varchar(255) NOT NULL,
  `ingredient3` int(25) NOT NULL,
  `ingredient3_name` varchar(255) NOT NULL,
  `ingredient4` int(25) NOT NULL,
  `ingredient4_name` varchar(255) NOT NULL,
  `ingredient5` int(25) NOT NULL,
  `ingredient5_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `dishes`
--

INSERT INTO `dishes` (`id`, `dish`, `ingredient1`, `ingredient1_name`, `ingredient2`, `ingredient2_name`, `ingredient3`, `ingredient3_name`, `ingredient4`, `ingredient4_name`, `ingredient5`, `ingredient5_name`) VALUES
(1, 'garnish', 1, '', 8, '', 3, '', 4, '', 6, ''),
(2, 'baked chicken', 5, '', 7, '', 3, '', 8, '', 6, ''),
(3, 'pizza', 9, '', 11, '', 10, '', 8, '', 16, '');

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
(2, 'sugar', 1),
(3, 'rice', 1),
(4, 'potatoes', 1),
(5, 'chicken', 1),
(6, 'milk', 1),
(7, 'mayonnaise', 1),
(8, 'salt', 1),
(9, 'flour', 1),
(10, 'tomato', 1),
(11, 'sausage', 1),
(12, 'onion', 1),
(13, 'dill', 1),
(14, 'buckwheat', 1),
(15, 'pepper', 1),
(16, 'eggs', 1);

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
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
