-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 18 2019 г., 14:33
-- Версия сервера: 5.5.62
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
-- База данных: `books_app`
--

-- --------------------------------------------------------

--
-- Структура таблицы `authors`
--

CREATE TABLE `authors` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `authors`
--

INSERT INTO `authors` (`id`, `firstname`, `lastname`) VALUES
(6, 'Александр', 'Пушкин'),
(7, 'Иван', 'Крылов'),
(8, 'Дмитрий', 'Глуховский'),
(10, 'Иван', 'Тургенев'),
(11, 'Иван', 'Гончаров'),
(12, 'Джек', 'Лондон');

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`id`, `title`) VALUES
(9, 'Какая-то книга'),
(10, 'Какая-то книга 2'),
(11, 'Какая-то книга 3'),
(12, 'Какая-то книга 4'),
(13, 'Какая-то книга 5'),
(14, 'Какая-то книга 6'),
(15, 'Какая-то книга 6'),
(16, 'Какая-то книга 7'),
(17, 'Какая-то книга 10'),
(18, 'Какая-то книга 11'),
(19, 'Какая-то книга 12'),
(20, 'Какая-то книга 13'),
(21, 'Какая-то книга 13');

-- --------------------------------------------------------

--
-- Структура таблицы `book_author`
--

CREATE TABLE `book_author` (
  `id` int(11) NOT NULL,
  `books_id` int(11) NOT NULL,
  `authors_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `book_author`
--

INSERT INTO `book_author` (`id`, `books_id`, `authors_id`) VALUES
(1, 9, 6),
(2, 9, 7),
(3, 10, 6),
(4, 10, 7),
(5, 11, 6),
(6, 11, 7),
(7, 12, 6),
(8, 12, 7),
(9, 13, 6),
(10, 13, 7),
(11, 14, 6),
(12, 14, 7),
(13, 15, 8),
(14, 15, 7),
(15, 16, 6),
(16, 16, 10),
(17, 17, 10),
(18, 17, 11),
(19, 18, 10),
(20, 18, 11),
(21, 19, 10),
(22, 19, 11),
(23, 20, 10),
(24, 20, 11),
(25, 21, 10),
(26, 21, 11);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `book_author`
--
ALTER TABLE `book_author`
  ADD PRIMARY KEY (`id`),
  ADD KEY `authors_id` (`authors_id`),
  ADD KEY `books_id` (`books_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `book_author`
--
ALTER TABLE `book_author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `book_author`
--
ALTER TABLE `book_author`
  ADD CONSTRAINT `book_author_ibfk_1` FOREIGN KEY (`authors_id`) REFERENCES `authors` (`id`),
  ADD CONSTRAINT `book_author_ibfk_2` FOREIGN KEY (`books_id`) REFERENCES `books` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
