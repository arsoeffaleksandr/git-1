-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 19 2020 г., 15:14
-- Версия сервера: 10.4.11-MariaDB
-- Версия PHP: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Структура таблицы `admin`
--

CREATE TABLE `admin` (
  `id` int(11) UNSIGNED NOT NULL,
  `login` varchar(55) NOT NULL,
  `pass` varchar(57) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`id`, `login`, `pass`) VALUES
(1, 'adminepta', 'adminepta228');

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `intro` text NOT NULL,
  `text` text NOT NULL,
  `date` int(11) UNSIGNED NOT NULL,
  `avtor` varchar(20) NOT NULL,
  `image` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `title`, `intro`, `text`, `date`, `avtor`, `image`) VALUES
(22, 'iPhone против Android. Преимущества iOS', 'Огромная популярность этих устройств обусловлена проработанностью и надёжностью операционной системы iOS, на которой данные девайсы работают. На рынке мобильных устройств особое место занимает платформа Android, созданная сотрудниками Google. Борьба между этими операционными системами продолжается до сих пор. Тем не менее, многие пользователи отдают своё предпочтение iOS. В чём же заключаются основные преимущества операционной системы от Apple над Android?', 'Дополнительные программы для iOS функционируют намного лучше, чем аналогичные приложения для Android. Даже дизайн интерфейса и изображения иконок программ на операционной системе от Apple выглядят более современными, чем варианты для их заядлого конкурента. То же самое можно сказать и про удобство интерфейса и работоспособность. Программы для iOS оптимизированы на высочайшем уровне, в то время как расширения для Android очень часто глючат и время от времени выдают ошибки во время включения. Такая ситуация обусловлена более тщательным мониторингом приложений со стороны Apple. Все сомнительные дополнения отсеиваются ещё до их официального релиза в AppStore. Кроме того, самые передовые приложения сначала выходят на устройства с операционной системой iOS.\n\nЧастота обновлений\nПользователям девайсов на платформе Android очень часто приходится долго ждать нужное обновление. Порой, разработчики могут растянуть его выход даже на полгода, что вызывает определённое негодование среди людей. Apple же стараются радовать почитателей их гаджетов частыми обновлениями, которые происходят минимум раз в месяц. Стоить отметить, что создатели iOS всегда поддерживают устройства прошлого поколения и продолжают выпускать для них обновления. Google же предпочитают моментально забывать о старых девайсах, акцентируя внимание на флагманах.', 1589893430, 'adminepta', 'https://avatars.mds.yandex.net/get-zen_doc/1362552/pub_5c6a69d9e8db0200aeec7380_5c6a69ee6516eb00b33ded54/scale_1200');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(25) NOT NULL,
  `mess` text NOT NULL,
  `article_id` int(11) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `name`, `mess`, `article_id`) VALUES
(21, 'WebDevlopa', 'jdisjcsvsvvsvsv', 12),
(20, 'WebDevlopa', 'jdisjcsvsvvsvsv', 12),
(19, 'WebDevlopa', '', 12),
(18, 'WebDevlopa', '', 12),
(17, 'WebDevlopa', '', 12),
(16, 'WebDevlopa', '', 12),
(15, 'WebDevlopa', '', 5),
(14, 'WebDevlopa', '', 5),
(13, 'WebDevlopa', 'wqdqdqdqdq', 13),
(22, 'WebDevlopa', 'fafaf', 3),
(23, 'WebDevlopa', '', 3),
(24, 'WebDevlopa', 'ЫВАЫВАЫ', 3),
(25, 'WebDevlopa', 'Русик - лох', 11),
(26, 'WebDevlopa', 'gbljhfc', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `price`, `image`, `status`) VALUES
(1, 3, 'GT-C3560', '                        <p>Закругленные углы и окантовка  вносят стильный штрих в минималистичный дизайн телефона. Металлическая отделка смотрится  элегантно и современно. А благодаря небольшим размерам С3560 удобно лежит в руке и легко помещается в кармане.</p>\n<br />\n\n<p>Спецификации:</p>\n<ul><li>Стандарты сети GSM и EDGE : GSM (850/900/1800/1900)</li><li>Стандарт сети 3G : N/A</li><li>Стандарт сети CDMA : N/A</li><li>TD-SCDMA Band : N/A</li></ul>\n                    ', 3000, 'https://img.donanimhaber.com/upfiles/1191184/4cace554-10d4-43b0-aeed-e574c46fcdce.jpg', 1),
(3, 3, 'GT-E2600', '<p>Тонкий и изящный дизайн телефона E2600? широкий экран и пользовательский интерфейс Paragon UX обеспечивают удобство и комфорт в использовании.  Телефон оснащен интуитивно-понятным пользовательским интерфейсом.  </p>\n<br />\n<p>Спецификации:</p>\n<ul><li>850 / 900 / 1800 / 1900 МГц GSM &amp; EDGE Band</li><li>GPRS Network&amp;Data: 850 / 900 / 1800 / 1900</li><li>EDGE Network&amp;Data: 850 / 900 / 1800 / 1900</li><li>фирменная</li><li>Интернет браузерr ( NetFront 4.2)</li><li>JAVA™ SUN CLDC HotSpot Implementation 1.1 (MIDP 2.0) Platform</li><li>SAR 0,45 Вт./кг.</li></ul>\n\n<a href=\"http://www.samsung.com/ru/consumer/mobile-devices/mobile-phones/hhp-gsm/GT-E2600ZKASER\">http://www.samsung.com/ru/consumer/mobile-devices/mobile-phones/hhp-gsm/GT-E2600ZKASER</a>', 5000, 'https://img.deilo.ru/files/images/items/399472807132/399472807132227z-samsung-gt-e2600-3275258.jpg', 1),
(2, 3, 'S5570 Galaxy mini', 'Платформа\n850/900/1800/1900 МГц\nДиапазон 900/2100 МГц\nAndroid 2.2 OS\nИнтернет браузер (Android Browser)\nФизические характеристики\nВес трубки 106,6 г.\nРазмеры трубки: 110,4 x 60,6 x 12,1 мм', 7000, 'http://spbiphone.ru/wp-content/uploads/2016/03/104.jpg', 1),
(4, 3, 'E2530 La Fleur', '                        <ul><li>850/900/1800/1900 МГц</li><li>GPRS класс 12</li><li>EDGE Class12(только RX)</li><li>Proprietary (MMP) OS</li><li>Интернет браузер</li><li>MIDP 2,1 / CLDC 1.1</li></ul>\n\n<ul><li>Вес трубки 86 г.</li><li>Размеры трубки: 94.4 x 47.2 x 17.4 мм</li></ul>\n\n<ul><li>Стандартная батарея: до 800 мАч</li><li>До 680 мин. в режиме разговора</li></ul>\n\n<a href=\"http://www.samsung.com/ru/consumer/mobile-devices/mobile-phones/hhp-gsm/GT-E2530SRFSER\">\nhttp://www.samsung.com/ru/consumer/mobile-devices/mobile-phones/hhp-gsm/GT-E2530SRFSER</a>\n                    ', 6000, 'https://store.donanimhaber.com/92/62/4e/92624ee98372e3a572bff34d183282fe.jpg', 1),
(5, 3, 'S3350 Chat 335', '<p>Samsung Ch@t 335 — самый тонкий QWERTY-телефон на современном рынке, чья толщина составляет всего 11,9&nbsp;мм. Обтекаемый корпус с хромированным покрытием придает модели изысканный классический вид. 2,4-дюймовый LQVGA дисплей идеально подходит для просмотра снимков и чтения длинных сообщений.</p>\n<br />\n<p>Благодаря новой, улучшенной QWERTY-клавиатуре набор текста становится еще более быстрым и удобным, как при печати на ПК. Есть возможность настраивать горячие клавиши для часто используемых приложений (например, A для будильника и т.п.).</p>\n\n<a href=\"http://www.samsung.com/ru/consumer/mobile-devices/mobile-phones/hhp-gsm/GT-S3350HKASER\">http://www.samsung.com/ru/consumer/mobile-devices/mobile-phones/hhp-gsm/GT-S3350HKASER</a>', 10000, 'https://hdimages-raw.s3.amazonaws.com/samsung335-1405391504-2.jpg', 1),
(6, 3, 'S5380 La Fleur Wave Y', 'Стандарты сети 850/900/1800/1900MHz GSM&EDGE Band\nСтандарты сети: 900/2100МГц 3G\nПоддерживаемые 3G: GPRS Network&Data :850/900/1800/1900 (Slave)\nEDGE Network&Data: стандарты сетей: 850/900/1800/1900 (Master)\nNetwork&Data (3G): HSDPA 7,2Мбит/с.\nBada 2.0\nБраузер Dolfin Browser 3.0\nПлатформа SUN CLDC 1.1\nЗначение SAR: 0,797мВт./г.\n', 12000, 'https://www.android-user.de/wp-content/uploads/2014/01/30068-Samsung-praesentiert-Smartphones-mit-Bluemchen.jpg', 1),
(7, 3, 'I9001 Galaxy S Plus', 'Платформа\n850 / 900 / 1800 / 1900 МГц\nGPRS Class12\nEDGE Class12\nИнтернет браузер (Android Browser)\nДисплей\nРазрешение дисплея 480 x 800 WVGA\n<br />\n<br />\n<a href=\"http://www.samsung.com/ru/consumer/mobile-devices/mobile-phones/hhp-smart/GT-I9001HKDSER\">http://www.samsung.com/ru/consumer/mobile-devices/mobile-phones/hhp-smart/GT-I9001HKDSER</a>', 11000, 'http://www.donmobi.ru/photo/bigs/samsung/gt-i9001-galaxy-s-plus.jpg', 1),
(8, 3, 'I8350 Omnia W', 'Windows Phone 7.5 Mango\nGSM&EDGE 850 / 900 / 1,800 / 1,900 МГц\n3G 900 / 2,100 MГц\nGPRS: Класс 12\nEDGE: Класс 12\nHSDPA 14.4 / HSUPA 5.76 Мбит/с\nInternet Explorer 9\n', 15000, 'https://otvet.imgsmail.ru/download/23745395_306d4183fec4b7cf4d21d10fd2facd03_800.jpg', 1),
(11, 4, 'iPhone 3GS', 'Широкоформатный дисплей Multi-Touch с диагональю 3,5 дюйма\nРазрешение 480 x 320 пикселей (163 пикселя/дюйм)\nОлеофобное покрытие, препятствующее появлению отпечатков пальцев\nПоддержка одновременного отображения нескольких языков и наборов символов\n<br /><br />\n<a href=\"http://www.apple.com/ru/iphone/iphone-3gs/specs.html\">http://www.apple.com/ru/iphone/iphone-3gs/specs.html</a>', 20000, 'https://avatars.mds.yandex.net/get-pdb/38069/98409220-126f-43d8-b0de-730587f56bfb/s1200?webp=false', 1),
(25, 0, 'Apple iPhone Xr 64GB', 'Общие характеристики\nТип\nсмартфон\nВерсия ОС на начало продаж \niOS 12\nТип корпуса\nклассический\nМатериал корпуса\nалюминий и стекло\nКонструкция\nвлагозащита\nКоличество SIM-карт\n2\nТип SIM-карты\nnano SIM+eSIM\nБесконтактная оплата\nесть\nВес\n194 г\nРазмеры (ШxВxТ)\n75.7x150.9x8.3 мм', 47, 'https://avatars.mds.yandex.net/get-mpic/1244413/img_id6063597382562623069.jpeg/orig', 1),
(26, 0, 'asdadq', 'dqfqwef', 0, 'qergqg', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `login` varchar(20) NOT NULL,
  `pass` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `login`, `pass`) VALUES
(25, 'WebDevlopa', 'engeltod3@gmail.com', 'WebDevlopa', '7773243a7c304477a0ef2841ae4e8eb9'),
(24, 'йцвйвйвйвйв', 'engeltod3@gmail.com', 'WebDevlopa', '7773243a7c304477a0ef2841ae4e8eb9'),
(23, 'Арсоев Александр', 'engeltod3@gmail.com', 'ananas', '91b527bc22af810f22d33359415ed113');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admin`
--
ALTER TABLE `admin`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
