-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Авг 27 2019 г., 11:13
-- Версия сервера: 5.7.26
-- Версия PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `catalog`
--

CREATE TABLE `catalog` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `price` varchar(11) NOT NULL DEFAULT '0',
  `information` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `catalog`
--

INSERT INTO `catalog` (`id`, `name`, `price`, `information`) VALUES
(5, 'Спички', '0,10', 'Описание: Спички'),
(6, 'Лопата', '100', 'Лопата штыковая'),
(7, 'Грабли', '120', 'Грабли деревянные');

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `feedback`) VALUES
(1, 'Админ!', 'Привет Всем!'),
(2, 'user', 'Как дела'),
(3, 'Вася', 'Привет'),
(4, 'Посетитель111', 'Сайт не работает11'),
(5, 'Посетитель222', '111'),
(6, 'Посетитель', '444'),
(8, 'Вася', 'Сайт не работает'),
(12, 'Вася', 'Сайт не работает'),
(50, 'тест', 'Все работает');

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
(36, '02.jpg', 1),
(37, '03.jpg', 7),
(38, '04.jpg', 14),
(39, '05.jpg', 3),
(40, '06.jpg', 1),
(41, '07.jpg', 0),
(42, '08.jpg', 4),
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
-- Индексы таблицы `catalog`
--
ALTER TABLE `catalog`
  ADD KEY `id` (`id`);

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `imgs`
--
ALTER TABLE `imgs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT для таблицы `imgs`
--
ALTER TABLE `imgs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
