-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Авг 24 2019 г., 07:51
-- Версия сервера: 5.7.26
-- Версия PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `imgs`
--

CREATE TABLE `imgs` (
  `id` int(11) NOT NULL,
  `fileName` text NOT NULL,
  `counter` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `imgs`
--

INSERT INTO `imgs` (`id`, `fileName`, `counter`) VALUES
(35, '01.jpg', 2),
(36, '02.jpg', 0),
(37, '03.jpg', 5),
(38, '04.jpg', 6),
(39, '05.jpg', 3),
(40, '06.jpg', 1),
(41, '07.jpg', 0),
(42, '08.jpg', 3),
(43, '09.jpg', 0),
(44, '10.jpg', 0),
(45, '11.jpg', 0),
(46, '12.jpg', 0),
(47, '13.jpg', 0),
(48, '14.jpg', 0),
(49, '15.jpg', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `imgs`
--
ALTER TABLE `imgs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `imgs`
--
ALTER TABLE `imgs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
