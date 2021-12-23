-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 21 2021 г., 22:03
-- Версия сервера: 5.7.25
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
-- База данных: `internrt_shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `price` int(250) NOT NULL,
  `img_smal` varchar(20) NOT NULL,
  `img_big` varchar(20) NOT NULL,
  `viewing` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `title`, `description`, `price`, `img_smal`, `img_big`, `viewing`) VALUES
(1, 'Блок питания', 'Блок питания с сертификатом BRONZ', 200, '1_s.jpg', '1.jpg', 0),
(2, 'Джостик для sega', 'Игровой контроллер Sega Fire Joy предназначен для игровых консолей, произведенных по технологии FIRECORE. Классический, признанный игроками по всему миру, дизайн джойстика и полноценный набор клавиш позволит вам играть во все игры, предназначенные дл', 352, '2_s.jpg', '2.jpg', 0),
(3, 'Клавиатура', 'Клавиатура – это устройство для ввода данных в компьютер: букв, цифр и знаков. Также используется для управления системой, то есть является аналогом компьютерной мыши. По типу соединения она бывает проводной и беспроводной.', 521, '3_s.jpg', '3.jpg', 0),
(4, 'Материнская плата', 'Материнская плата — базовый элемент архитектуры современного ПК, представляет собой многоуровневую плату с предустановленным набором микросхем системной логики, служит для объединения комплектующих в единую систему (компьютер)\r\n', 210, '4_s.jpg', '4.jpg', 0),
(5, 'Компьютерная мышь', 'Компью́терная мышь — координатное устройство для управления курсором и отдачи различных команд компьютеру. Управление курсором осуществляется путём перемещения мыши по поверхности стола или коврика для мыши.', 450, '5_s.jpg', '5.jpg', 0),
(6, 'Ноутбук', 'Ноутбук (англ. notebook — блокнот) — переносной компьютер, в корпусе которого объединены типичные компоненты ПК, включая дисплей, клавиатуру и устройство указания (обычно сенсорная панель или тачпад), а также аккумуляторные батареи.', 240, '6_s.jpg', '6.jpg', 0),
(7, 'Оперативная память', 'Оперативная память (ОЗУ, RAM — Random Access Memory — eng.) — относительно быстрая энергозависимая память компьютера с произвольным доступом, в которой осуществляются большинство операций обмена данными между устройствами. Является энергозависимой, т', 420, '7_s.jpg', '7.jpg', 0),
(8, 'Процессор', 'Процессор в памяти, Processor-in-memory (PIM), или Вычисляющее ОЗУ или Computational RAM, C-RAM, также, «Вычисления в памяти» - так называют процессор, тесно интегрированный в память, как правило, на одном кремниевом кристалле, либо оперативную памят', 120, '8_s.jpg', '8.jpg', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(250) NOT NULL,
  `name` varchar(20) NOT NULL,
  `login` varchar(20) NOT NULL,
  `telefone` int(12) NOT NULL,
  `email` varchar(20) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `login`, `telefone`, `email`, `password`, `role`) VALUES
(1, 'admin', 'admin', 0, '', '3cf108a4e0a498347a5a75a792f2321221232f297a57a5a743894a0e4a801fc3', 1),
(21, 'Иван', 'admin1', 1, NULL, '2f2376ab581442c91d24272cf5b14dcae00cf25ad42683b3df678c61f42c6bda', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
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
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
