-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Авг 20 2016 г., 12:49
-- Версия сервера: 10.1.13-MariaDB
-- Версия PHP: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mylogsbd`
--

-- --------------------------------------------------------

--
-- Структура таблицы `mylogtable`
--

CREATE TABLE `mylogtable` (
  `id` int(6) NOT NULL,
  `name` varchar(15) NOT NULL,
  `message` text,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `mylogtable`
--

INSERT INTO `mylogtable` (`id`, `name`, `message`, `date`) VALUES
(1, 'Исключение', 'Неверный тип параметра!', '2016-08-20'),
(2, 'Обьект', '', '2016-08-20'),
(3, 'Обьект', '$message->LogFiles', '2016-08-20'),
(4, 'Обьект', 'foo,bar,hello,world', '2016-08-20'),
(5, 'Обьект', 'foo,bar,you,world', '2016-08-20'),
(6, 'Обьект', 'foo,bar,you,world', '2016-08-20');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `mylogtable`
--
ALTER TABLE `mylogtable`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `mylogtable`
--
ALTER TABLE `mylogtable`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
