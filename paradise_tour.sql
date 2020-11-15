-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 15 2020 г., 19:58
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `paradise_tour`
--

-- --------------------------------------------------------

--
-- Структура таблицы `mailing`
--

CREATE TABLE `mailing` (
  `ID` int(7) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date_reg` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `mailing`
--

INSERT INTO `mailing` (`ID`, `email`, `date_reg`) VALUES
(26, 'unser@dawdkut.dp.ua', '2020-06-11 22:34:44'),
(71, 'adldkasda@ddsac.com', '2020-08-24 14:38:48'),
(75, 'username@dlit.dp.ua', '2020-08-24 14:47:42'),
(76, 'user@gmail.com', '2020-08-31 12:28:24'),
(77, 'nikita@gmail.om', '2020-08-31 12:37:13'),
(89, 'shkitakv2@dlit.dp.ua', '2020-08-31 15:36:26'),
(92, 'user1@dlit.dp.ua', '2020-09-17 13:36:09'),
(97, 'user2@dlit.dp.ua', '2020-09-17 14:35:50'),
(98, 'user3@dlit.dp.ua', '2020-09-17 14:35:54'),
(99, 'user4@dlit.dp.ua', '2020-09-17 14:35:58'),
(100, 'user1@dlit.dp.us', '2020-09-17 14:36:08'),
(101, 'shkitak@dlit.dp.ua', '2020-09-17 17:56:05'),
(102, 'shkitak2@dlit.dp.ua', '2020-09-17 17:56:32'),
(103, 'shkita@dlit.dp.au', '2020-09-25 14:01:59'),
(104, 'nikitak@dlit.dp.ua', '2020-10-15 19:20:09'),
(105, 'shkitak@gmail.com', '2020-10-23 21:05:05'),
(107, 'shkitak@mail.com.ua', '2020-10-30 11:06:05'),
(108, 'shkitak@dlit.dp.ua.com', '2020-10-30 12:40:02'),
(109, 'None@gamil.com', '2020-11-09 17:58:30'),
(110, 'shkita40k@gmail.com', '2020-11-09 18:18:46'),
(118, 'shkita30k@gmail.com', '2020-11-09 18:21:39'),
(123, 'testerovshik@dlit.dp.ua', '2020-11-09 18:55:53');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `Id` int(11) NOT NULL,
  `title_news` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `text_news` text CHARACTER SET utf8mb4 NOT NULL,
  `Image_news` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `Link` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `Date_news` varchar(255) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`Id`, `title_news`, `text_news`, `Image_news`, `Link`, `Date_news`) VALUES
(1, 'The first new', 'Hello it is my first new for a testing now we are checking a new views this we command contraty i don\'t know ', 'amsterdam.jpg', 'google.com', '30 Oct'),
(2, 'Second new\'s title', 'HewkodmawdpawdmdioamwdaiwmdawmiwadaHewkodmawdpawdmdioamwdaiwmdawmiwadaHewkodmawdpawdmdioamwdaiwmdawmiwadaHewkodmawdpawdmdioamwdaiwmdawmiwadaHewkodmawdpawdmdioamwdaiwmdawmiwada', 'torronto.jpg moscow.jpg london.jpg', 'google.com', '31 Oct'),
(3, 'The third news.', 'This is the text of third news Also you can check our new vidgets on the website. It is easy and availeble all the time :)', 'amsterdam.jpg', 'google.com', '31 Oct'),
(4, 'username', 'username2', 'username.jpg', 'google.com', '10 DEC'),
(5, 'We have lots of different things by the time', 'We have lots of different things by the time', 'amsterdam.jpg', 'google.com', '10 Dec'),
(6, 'We have lots of different things by the time', 'We have lots of different things by the time', 'amsterdam.jpg', 'google.com', '10 Dec'),
(7, 'We have lots of different things by the time', 'We have lots of different things by the time', 'amsterdam.jpg', 'google.com', '10 Dec'),
(8, 'We have lots of different things by the time', 'We have lots of different things by the time', 'amsterdam.jpg', 'google.com', '10 Dec'),
(9, 'We have lots of different things by the time', 'We have lots of different things by the time', 'amsterdam.jpg', 'google.com', '10 Dec'),
(10, 'Никитак Молодец', 'Nick is fine yeq\r\nJohn is not\r\nMike is too', '3.jpg 2.jpg 1.jpg ', 'google.com', 'Nov 9'),
(11, 'Hot news! Get free ticket to Turkey', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed turpis tincidunt id aliquet risus feugiat in ante metus. Facilisi etiam dignissim diam quis enim lobortis. Urna duis convallis convallis tellus id interdum. Commodo odio aenean sed adipiscing diam donec adipiscing. Pharetra diam sit amet nisl. Odio aenean sed adipiscing diam donec adipiscing tristique risus. Ultrices tincidunt arcu non sodales neque sodales ut. Risus ultricies tristique nulla aliquet enim tortor at auctor urna. Tempor commodo ullamcorper a lacus vestibulum sed arcu. Amet mauris commodo quis imperdiet massa tincidunt. Sed vulputate odio ut enim blandit volutpat. Augue interdum velit euismod in pellentesque. Facilisis sed odio morbi quis commodo odio. In arcu cursus euismod quis viverra nibh cras pulvinar. Pharetra convallis posuere morbi leo urna molestie at.\r\nPorta nibh venenatis cras sed felis eget. Senectus et netus et malesuada. Justo laoreet sit amet cursus sit amet dictum sit amet. Id aliquet risus feugiat in ante metus dictum. Quam id leo in vitae turpis massa sed elementum. Diam donec adipiscing tristique risus. Augue interdum velit euismod in pellentesque massa. Amet consectetur adipiscing elit ut aliquam purus sit amet luctus. Ultrices eros in cursus turpis massa tincidunt dui. Vehicula ipsum a arcu cursus vitae congue mauris rhoncus. Habitant morbi tristique senectus et netus.\r\nVolutpat lacus laoreet non curabitur gravida arcu. Nec dui nunc mattis enim ut tellus elementum sagittis vitae. Nunc faucibus a pellentesque sit amet porttitor eget dolor. Tempor orci eu lobortis elementum nibh tellus. Pellentesque elit eget gravida cum. Et pharetra pharetra massa massa ultricies mi quis hendrerit. Et netus et malesuada fames ac turpis egestas maecenas. Cras sed felis eget velit aliquet sagittis id consectetur. Aliquam etiam erat velit scelerisque in dictum. Turpis egestas pretium aenean pharetra. Convallis tellus id interdum velit laoreet id donec ultrices. Feugiat vivamus at augue eget arcu dictum varius. Condimentum vitae sapien pellentesque habitant. Diam in arcu cursus euismod quis. Scelerisque purus semper eget duis at tellus at urna condimentum. Dignissim cras tincidunt lobortis feugiat vivamus at. Magna sit amet purus gravida quis blandit turpis cursus in. Morbi tristique senectus et netus. Pellentesque adipiscing commodo elit at imperdiet dui.', '3.jpg 2.jpg 1.jpg ', 'google.com', 'Nov 9'),
(12, 'Hi! We are going to open our vlog! if you gonna support us enter our mailing!', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed turpis tincidunt id aliquet risus feugiat in ante metus. Facilisi etiam dignissim diam quis enim lobortis. Urna duis convallis convallis tellus id interdum. Commodo odio aenean sed adipiscing diam donec adipiscing. Pharetra diam sit amet nisl. Odio aenean sed adipiscing diam donec adipiscing tristique risus. Ultrices tincidunt arcu non sodales neque sodales ut. Risus ultricies tristique nulla aliquet enim tortor at auctor urna. Tempor commodo ullamcorper a lacus vestibulum sed arcu. Amet mauris commodo quis imperdiet massa tincidunt. Sed vulputate odio ut enim blandit volutpat. Augue interdum velit euismod in pellentesque. Facilisis sed odio morbi quis commodo odio. In arcu cursus euismod quis viverra nibh cras pulvinar. Pharetra convallis posuere morbi leo urna molestie at\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed turpis tincidunt id aliquet risus feugiat in ante metus. Facilisi etiam dignissim diam quis enim lobortis. Urna duis convallis convallis tellus id interdum. Commodo odio aenean sed adipiscing diam donec adipiscing. Pharetra diam sit amet nisl. Odio aenean sed adipiscing diam donec adipiscing tristique risus. Ultrices tincidunt arcu non sodales neque sodales ut. Risus ultricies tristique nulla aliquet enim tortor at auctor urna. Tempor commodo ullamcorper a lacus vestibulum sed arcu. Amet mauris commodo quis imperdiet massa tincidunt. Sed vulputate odio ut enim blandit volutpat. Augue interdum velit euismod in pellentesque. Facilisis sed odio morbi quis commodo odio. In arcu cursus euismod quis viverra nibh cras pulvinar. Pharetra convallis posuere morbi leo urna molestie at\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed turpis tincidunt id aliquet risus feugiat in ante metus. Facilisi etiam dignissim diam quis enim lobortis. Urna duis convallis convallis tellus id interdum. Commodo odio aenean sed adipiscing diam donec adipiscing. Pharetra diam sit amet nisl. Odio aenean sed adipiscing diam donec adipiscing tristique risus. Ultrices tincidunt arcu non sodales neque sodales ut. Risus ultricies tristique nulla aliquet enim tortor at auctor urna. Tempor commodo ullamcorper a lacus vestibulum sed arcu. Amet mauris commodo quis imperdiet massa tincidunt. Sed vulputate odio ut enim blandit volutpat. Augue interdum velit euismod in pellentesque. Facilisis sed odio morbi quis commodo odio. In arcu cursus euismod quis viverra nibh cras pulvinar. Pharetra convallis posuere morbi leo urna molestie at\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed turpis tincidunt id aliquet risus feugiat in ante metus. Facilisi etiam dignissim diam quis enim lobortis. Urna duis convallis convallis tellus id interdum. Commodo odio aenean sed adipiscing diam donec adipiscing. Pharetra diam sit amet nisl. Odio aenean sed adipiscing diam donec adipiscing tristique risus. Ultrices tincidunt arcu non sodales neque sodales ut. Risus ultricies tristique nulla aliquet enim tortor at auctor urna. Tempor commodo ullamcorper a lacus vestibulum sed arcu. Amet mauris commodo quis imperdiet massa tincidunt. Sed vulputate odio ut enim blandit volutpat. Augue interdum velit euismod in pellentesque. Facilisis sed odio morbi quis commodo odio. In arcu cursus euismod quis viverra nibh cras pulvinar. Pharetra convallis posuere morbi leo urna molestie at', '3.jpg 2.jpg 1.jpg ', 'google.com', 'Nov 9'),
(13, 'The Biden is a new Bresident of America!', 'President-elect Joseph R. Biden Jr. closed his Saturday night acceptance speech with a poignant quote from a hymn —“On Eagle’s Wings” — that was composed more than three decades ago by a Catholic priest in memory of his friend’s father.\r\n\r\nMr. Biden, a weekly churchgoer who often keeps a rosary on hand, said the hymn was dear to his family, especially to his deceased son Beau, and that he hoped it would provide solace to the more than 230,000 families in the United States who had lost loved ones during the coronavirus pandemic.\r\n\r\n“It captures the faith that sustains me and which I believe sustains America,” he said.\r\nJoseph R. Biden Jr. emerged as the president-elect on Saturday, after nearly four days of tallying and tabulating votes and national anticipation of the election outcome.\r\n\r\nBut it’s not over yet: In the weeks between Election Day and Inauguration Day on Jan. 20, several key mechanisms take place, most related to the Electoral College, that eventually lead to a president in the White House.\r\n\r\nSo with the vote count nearly completed, and the next president made clear, what happens next? Beginning on Nov. 10 and lasting through Dec. 11, states will begin to certify their election results, a process carried out over slightly different time frames in each state. This could all be made even more complicated by the Trump campaign pursuing lawsuits in key states that could delay the formal certification of the vote.', '442.jpg 223.png joe-biden-ea-1920x1080.jpg ', 'google.com', 'Nov 11'),
(14, 'The entire title number 1 ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Adipiscing tristique risus nec feugiat in fermentum posuere urna. Est placerat in egestas erat imperdiet sed euismod nisi porta. Est velit egestas dui id. Vel elit scelerisque mauris pellentesque pulvinar pellentesque. A diam maecenas sed enim ut sem viverra. Venenatis cras sed felis eget velit aliquet sagittis id consectetur. Lectus sit amet est placerat in. Ut tristique et egestas quis ipsum suspendisse ultrices gravida dictum. Aliquam sem et tortor consequat id porta nibh venenatis cras. Fringilla phasellus faucibus scelerisque eleifend. Enim blandit volutpat maecenas volutpat blandit aliquam etiam erat velit. Nisl purus in mollis nunc sed id. At risus viverra adipiscing at in tellus integer feugiat scelerisque.\r\n\r\nPulvinar sapien et ligula ullamcorper malesuada proin libero. Vestibulum lectus mauris ultrices eros in. Scelerisque viverra mauris in aliquam sem fringilla. Et tortor at risus viverra adipiscing at in tellus integer. Adipiscing enim eu turpis egestas. Arcu cursus vitae congue mauris rhoncus aenean vel. Pellentesque habitant morbi tristique senectus et. Tortor pretium viverra suspendisse potenti nullam ac. Morbi tristique senectus et netus et malesuada fames. Pellentesque elit eget gravida cum sociis. Condimentum id venenatis a condimentum vitae sapien pellentesque. Sed arcu non odio euismod. Nibh cras pulvinar mattis nunc sed blandit libero volutpat. Posuere ac ut consequat semper viverra nam libero. Tortor id aliquet lectus proin nibh nisl. Laoreet non curabitur gravida arcu. Varius duis at consectetur lorem donec massa sapien. Sit amet consectetur adipiscing elit ut aliquam. Nibh tortor id aliquet lectus proin.\r\n\r\nEu turpis egestas pretium aenean pharetra. Purus sit amet volutpat consequat mauris nunc. Convallis posuere morbi leo urna molestie at elementum eu. Pharetra massa massa ultricies mi quis. Risus quis varius quam quisque. Orci nulla pellentesque dignissim enim. Nisl rhoncus mattis rhoncus urna. Netus et malesuada fames ac turpis egestas sed tempus urna. Convallis a cras semper auctor neque vitae. Pretium vulputate sapien nec sagittis. Metus aliquam eleifend mi in. Pharetra sit amet aliquam id diam maecenas ultricies. Ipsum nunc aliquet bibendum enim.\r\n\r\nIaculis nunc sed augue lacus viverra vitae. Suspendisse interdum consectetur libero id faucibus nisl tincidunt eget. Iaculis nunc sed augue lacus viverra vitae congue. Adipiscing at in tellus integer feugiat scelerisque varius. Suspendisse sed nisi lacus sed viverra tellus. Orci a scelerisque purus semper. Diam sollicitudin tempor id eu. Dolor sit amet consectetur adipiscing elit duis. Eu nisl nunc mi ipsum faucibus vitae. Ipsum dolor sit amet consectetur adipiscing elit pellentesque habitant. Amet dictum sit amet justo. Risus at ultrices mi tempus imperdiet nulla malesuada pellentesque. Rhoncus est pellentesque elit ullamcorper dignissim cras tincidunt. Feugiat in ante metus dictum at tempor commodo.\r\n\r\nErat velit scelerisque in dictum non. Mattis pellentesque id nibh tortor. Sapien et ligula ullamcorper malesuada. Ac felis donec et odio pellentesque diam volutpat commodo sed. Viverra vitae congue eu consequat ac felis donec. Nibh sit amet commodo nulla facilisi nullam. In est ante in nibh mauris cursus. In massa tempor nec feugiat nisl pretium fusce id velit. Gravida cum sociis natoque penatibus et magnis dis parturient. Ornare arcu dui vivamus arcu felis bibendum ut. Ultrices tincidunt arcu non sodales. Ut tellus elementum sagittis vitae. Sem nulla pharetra diam sit. Sem nulla pharetra diam sit amet nisl suscipit. Ut tellus elementum sagittis vitae et leo duis ut diam.', '442.jpg 223.png 2.jpg ', 'google.com', 'Nov 15');

-- --------------------------------------------------------

--
-- Структура таблицы `offers`
--

CREATE TABLE `offers` (
  `ID_offer` int(7) NOT NULL,
  `id_votes` int(7) NOT NULL,
  `degree` int(100) NOT NULL,
  `cost` int(100) NOT NULL,
  `country` text NOT NULL,
  `city` text NOT NULL,
  `image` varchar(199) NOT NULL,
  `WiFi` int(100) NOT NULL,
  `Region` text NOT NULL,
  `safet` int(2) NOT NULL,
  `fun` int(2) NOT NULL,
  `link` text NOT NULL,
  `Feels_like` double NOT NULL,
  `Pressure` int(11) NOT NULL,
  `Humidity` int(11) NOT NULL,
  `Wind_speed` double NOT NULL,
  `Wind_degree` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `offers`
--

INSERT INTO `offers` (`ID_offer`, `id_votes`, `degree`, `cost`, `country`, `city`, `image`, `WiFi`, `Region`, `safet`, `fun`, `link`, `Feels_like`, `Pressure`, `Humidity`, `Wind_speed`, `Wind_degree`) VALUES
(1, 1, 5, 2000, 'Ukraine', 'Kiev', 'images/kiev.jpg', 19, 'Europe', 7, 8, 'Kiev', 3.34, 1022, 100, 0.77, 174),
(2, 2, 7, 1000, 'Canada', 'Toronto', 'images/torronto.jpg', 30, 'America', 5, 8, 'Toronto', 0.94, 999, 81, 6.69, 165),
(3, 3, 0, 700, 'Russia', 'Moscow', 'images/moscow.jpg', 19, 'Europe', 10, 3, 'Moscow', -3.97, 1030, 95, 3, 130),
(4, 4, 9, 2500, 'USA', 'San Francisco', 'images/San-Francisco.jpg', 35, 'America', 8, 10, 'SanFrancisco', 6.63, 1026, 81, 1.23, 66),
(5, 5, 10, 1992, 'Great Britain', 'London', 'images/london.jpg', 31, 'Europe', 7, 8, 'London', 3.04, 994, 66, 7.2, 200),
(6, 6, 13, 1288, 'Germany', 'Berlin', 'images/berlin.jpg', 21, 'Europe', 9, 6, 'Berlin', 8.41, 1012, 66, 5.1, 150),
(7, 7, 14, 2210, 'France', 'Paris', 'images/paris.jpg', 31, 'Europe', 7, 8, 'Paris', 9.54, 1004, 82, 6.7, 220),
(8, 8, 13, 2300, 'Belgium', 'Brusel', 'images/brusel.jpg', 33, 'Europe', 7, 9, 'Brusel', 7.25, 999, 93, 9.8, 190);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `Username` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password_U` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `Username`, `Password_U`, `Email`, `avatar`) VALUES
(7, 'Nick1', 'Fada', 'usernaem@dl', ''),
(8, 'Nick', '123456789', 'shkitakchok@gmail.com', ''),
(9, 'Nick', '$2y$10$3h3/5411bAdUOeh7bmebie9jHjnVof0scc5mIe4.Ch.jz47MQmm/m', 'shkitka2da@dlit.dp', ''),
(10, 'asdsada', '$2y$10$u0cKRWBa6NiKZ4n35v.WIuVYGrgsSsNzvQK1GJJk7ed0nfTZb9Yke', 'kmdasd@dsa.com', ''),
(11, 'Nick', '$2y$10$M4ZEHxUKZ4NfvfbA3E39s.l.fTultZvasPWV83YBKDE52/yV87wzu', 'shkikaktaks@d', ''),
(12, 'Nick', '$2y$10$vqf/FB2jmn1gAU.7l6XykOOkN5qxG1/a/YWnCnRLNq9s2KjkFGUkW', 'shkitak@gmail.dp', ''),
(13, 'Nick', '$2y$10$fDQuy6QPWcji9JLzWkTWMOiVDXaRkb0CIlkGAivW3ijOzj4.ObdDK', 'username@dlit.dp.ua', ''),
(14, 'Nick', '$2y$10$gOTLzMOc1tHjLQZAUAyrJelShtjphI40OLhigpxC5tzZ80BLKdZha', 'loser@gmail.com', ''),
(15, 'Nickita', '$2y$10$B1MShpmRml9kKxyVRypHBOSUv1F76OJ367b3FZce84X8m8wUDkGv2', 'shkitak.nikita@gmail.com', ''),
(16, 'Nick', '$2y$10$BO.ogfqR.g5hxWtaTnMQzumldvMxzQ5mlTWmmPzL/WZiMrwKc2WUi', 'example2@gmail.com', ''),
(17, 'Nikihjr', '$2y$10$6RH9Di159.V0N5urQkMIbuj5EiRNj8OKTg/Zm5BX5n7.t/UozuHfi', 'userman@gmail.com', ''),
(18, 'nndasjda', '$2y$10$uyhQwQYAB2r1UWUjvXxUTe7znQJitS.nUgzccmLGElo7Gpd4dZs/O', 'shjkitakidnad@gm.com', ''),
(19, 'Nimcas', '$2y$10$JjFflgv5Fdlia28D5WacXuFjlaiXzMoxl/2L.y9hbWKuSep4XHtJe', 'shdasdasjiad@gmail.com', ''),
(20, 'Nick', '$2y$10$NtbhQqLH2E8LbVESfbQwh.RCEwX2bOPG7gO4SaTX4a8SwKfxuNoCK', 'nikito4ka@gmail.com', ''),
(21, 'Nikc', '$2y$10$cCFzl7W.sC.jRFhmovFEVObAjSdgOcpZ5V2IRqY4C3KqMhl5aWkOG', 'user5@gmail.com', ''),
(22, 'Nick', '$2y$10$1e73G1lSZ/rwygHDNLHkIeQ7gikNtWt10XgW8YB5I7MF1vHnlmqtS', 'nikitak@gmail.com', ''),
(23, 'Niskc', '$2y$10$GNDvLs.1ILGZ5WlaMpDH8.c9wlNP6gti/2B5t8glC8lw5RpmqSs8i', 'dodjaskdask@gmail.com', ''),
(24, 'Nick', '$2y$10$lPP08awOJc4D9OF4E6hGd.tlCaw2sQC/73J0Cg/lEPIE04A100EgG', 'user7@gmail.com', 'D:OpenServeruserdataphp_uploadphp3AA4.tmp'),
(25, 'Niki', '$2y$10$FRGnqHSaxQPdfDsCJxoLHeShQBCwHU4q/fVYSXkdSeQqDGhknASG6', 'shkitak2omdskmd@gmail.com', 'eye.png'),
(26, 'Nukc', '$2y$10$Fik.rXWrtMxESAWh81/AlOQVUKO3P2MeIUKQ1mvh6xrTedGZU5eny', 'user10@gmail.com', '13AB4160.PNG'),
(27, 'NIck', '$2y$10$EYfTXEJtIY/4sU8Zcks9Y.eSXtpP0Lct/taIyxi96X2fg12/32HjK', 'user11@gmail.com', 'eye (1).png'),
(28, 'Nickkk', '$2y$10$FalvnxE9abcpkqSnE8riren23Ba9IOF6Yl5prlfCsrA4BGalpt9Bu', 'user12@gmail.com', 'no eye.png'),
(29, 'NIck', '$2y$10$BahbMt2WyO3xrW8/j4FUIeSVdzo.eKcGttDr2gzpig8lL5n4bp20u', 'nick@gmail.com', 'D:OpenServeruserdataphp_uploadphpAF8A.tmp'),
(30, 'nnik', '$2y$10$8tfi0rJV0VgDdSIXBEIH6OBKXMInBH6OFYkf8gOx/hy1E9CIHdOS6', 'nicki@gmail.com', 'D:OpenServeruserdataphp_uploadphpFC5E.tmp'),
(31, 'Tom', '$2y$10$5waE1XznG5JJ2TLIean4zemBVp4wAOn9FzhrBhlfBLIewke2y5adi', 'user134@gmail.com', 'default.png'),
(32, 'Tom', '$2y$10$7U224FbGDyBH/jqyneksQusefmJinMVt29Qll0mlJVetxNu5yRhiK', 'use12@gmail.com', 'default.png'),
(33, 'Toni', '$2y$10$x9KFfcg4cPXacXA5tfVF9.sLKaypxQx/xHZWhTywPfH..gzjSpjRW', 'user112@dlit.dp.ua', 'default.png'),
(34, 'Tok', '$2y$10$q.FB656btSatQ2N5lPp27eICmjGDf/BnqwfhB/2uKbvWlgcTkqEC2', 'user123412@gmail.com', 'default.png'),
(35, 'Kain', '$2y$10$XDt.E/KZBE7FQBAbPcXLvOwT7IPcKUczInoxUJkUb18f/xtxaahY6', 'user12390@gmail.com', 'default.png'),
(36, 'Nikij', '$2y$10$kMaePW6G5uVIwFVQ29HQxu9xIm299SUbMcqmyXuEJa2M08U3mwyqW', 'user1302@gmail.com', ''),
(37, 'Tonim', '$2y$10$e1ZdgpPJjjUtm1NRXtSqput0OQtIyv8Np741p35c/i.oiOpGhbJIi', 'user13123131@gmail.com', ''),
(38, 'Nik', '$2y$10$cOXVLEFD9mcqSeRKozAO9esh4X3kxUOisMEBYqdAJVUF/PYpKfJHa', 'user01203o12@gmail.com', ''),
(39, 'Nikck', '$2y$10$Xm5iypOLocnF9VEAIjSxkur.Ftfiha8SvsJ9YFYMzlN5cawzyGVZe', 'shkiijk@gmail.com', ''),
(40, 'ikdsadas', '$2y$10$RQQnDg2Ze4mNfVM7C0dlA.3pBNYcf.GKUPX6k6UT8hqFReRf3rOpS', 'shiehsadj@gmail.com', ''),
(41, 'YOm', '$2y$10$z3vLyyMsUuuvnUlQ3IKMbumbZq8rmsI60eMHKTrDZ71IcC.7ILbeu', 'shkitak@dlit.com', ''),
(42, 'avatar', '$2y$10$3nustK8bBGJw.ibYsvdCU.j2gehO9wVluI7VjbBy1A/Hstwsuwb/O', 'userrr@gmail.com', ''),
(43, 'njsna', '$2y$10$B7Udieml7wKPNQ56GNnaj.KBhJK53/k7y8yjOIAoPy6/Zef6FeSCK', 'idsknd@gmil.com', ''),
(44, 'Nioem', '$2y$10$d0JMfMM4BG8VLPUdZ7IW3OA3z..kF3ntCXBpldh7ht8z8U4m1WsfW', 'user14132@gmailc.om', ''),
(53, 'ndasjdasdknasdnadjkadknadajkndjnas', '$2y$10$Aw/dSPjI3qa/PVmKhJaWguUFPlOaAFWH0e79QBa9TLxmqTuL1PSFC', 'shhh@dlit.dp.ua', 'default.png'),
(54, 'Idsndanidaindiananidinasdinasdinasdasdasd', '$2y$10$bRz63LfiPTSkl1xxpJBnJ.wlT9vnuzINveqGWax03nO2RDFu5jt0y', 'shitak@dlit.dp.ua', 'IMG_20200908_203137.jpg'),
(55, 'Nikck', '$2y$10$mISPemhOR7BrNjoEBzymKOZ3VYsiX0t6m.LjneoLyA8YRGArhk57G', 'shkitak2d@dlit.dp.ua', 'default.png'),
(56, 'Nnikc', '$2y$10$Q5Dn0LD2k40VHA1vn8bl0.TSmLNOyajJ4cUUrH9pL6JoEcQClunaS', 'user@dlit.dp.ua', 'default.png'),
(57, 'Nick', '$2y$10$V2rUhECTM38IFizoxfI6KuuFkILFZIxT154PGkeC9w4n..rqtPpzi', 'shkita2k@dlit.dp.ua', 'search.png'),
(58, 'Nick', '$2y$10$CkOK101qbY8O8q/4xGiG5Ol2X7ePbhwWPOt71wjLPXCMslkVbO4DO', 'skdaskdai@dlit.dp.ua', 'default.png'),
(59, 'Nickint', '$2y$10$7pjc0xzrLEIA5dp.g1uZge.xkQZSLQn4pR9RFx/Hk3t7QQCg8uNm2', 'user@mail.com', 'default.png'),
(60, 'Nikita', '$2y$10$5QT.pS1/mwFp5Lz84zxOa.ikDTjvagDIaIy6L/ypp8XDKa4yLm6/W', 'sisi4ka@gmail.com', 'default.png'),
(61, 'Nikkinnnnan', '$2y$10$aONEFyXxXgQQjqpSCn9ziu1dQMoHGoEbVTjsT2yUcita4E9zVhAp2', 'nikiway@gmail.com', 'default.png'),
(62, 'Nickiname', 'kdadasdasdadasdasdad', 'shkitak@ldlllot.com', 'default.png'),
(63, 'Nikita', 'Fada0299988', 'sumer@gmail.com', 'default.png'),
(64, 'Nikirair', '$2y$10$M1aWDadzVTp.LIgwBG45GuLIVXKiG7jabNcFJnuh3br341X60GQSa', 'shkirak@mail.com', 'default.png'),
(65, 'Nikita', 'Fada0299988', 'sumer@gmail.com', 'default.png'),
(66, 'Nikita', 'Fada0299988', 'sumer@gmail.com', 'default.png'),
(67, 'Nikita', 'Fada0299988', 'sumer@gmail.com', 'default.png'),
(68, 'Nikitakkkks', '$2y$10$wLy.mnvQSvKNIZ0r7NIp4e3wqcTCI80wuMMpfFaVl2HOUR.YP9RD.', 'nikitashkitak@dlit.dp.ua', 'default.png'),
(69, 'Nikita', 'Fada0299988', 'sumer@gmail.com', 'default.png'),
(70, 'Admin', '$2y$10$t3xsSmRuXSX8hYWZr03cLuj5MnqfD00zdOw3daVExeAdo/lRBuC1O', 'admin@gmail.com', 'admin.jpg'),
(71, 'Nick', '$2y$10$n02kauI74u9hjRV/uVCWo.o1vSBeKClOieZnKwRzTn0CO0sS49wz2', 'shkitak@dlit.dp.ua', 'default.png'),
(72, 'Nick', '$2y$10$HEIrfG9o3j.IARHuyArxieCh45X6tIaA4q1i8M8fBV3vJmhglAFua', 'shk@dlit.dp.ua', 'default.png'),
(73, 'Admninnsnnlnnjjnjnj', '$2y$10$f59kZOSng3t98gmnYoJOJuTCYBqu12eEgRaXKx4HpRhmb6STGtiJe', 'testerlong@gmail.com', 'default.png'),
(74, 'Nick', '$2y$10$dxRRHYjkwT06oXfVIOlb2emdCAqlNxcV/yfQJPl3dT456QeTY9RRG', 'testuser@gmail.com', 'logo.png'),
(75, 'NikitaShkitak', '$2y$10$4alQk8bfJZN5pgL.vS/VCupEc45GSuctLVSVcTt2V0osepX3gPwEq', 'usertester@gmail.com', 'default.png'),
(76, 'Nuk', '$2y$10$D9LpPEHczMq3FLGuVsgXPe49ZOa57kKicuyLNcTW1BWslHg1H0qkK', 'userss11@dlit.dp.ua', 'default.png'),
(77, 'MilkyWay', '$2y$10$ZtZRVA58exLMCfxlzLJp5OrlPh6neVgs3bMfFAGOJSswJ7YPJQn7y', 'user12345@dlit.dp.ua', 'photo5199680205780792071.jpg'),
(78, 'User', '$2y$10$WFKgcZXTXgU7D3WDJl8M.eDdrnD841xD4S2ex8JUZtzJZJQxTRZXW', 'shkitak@gmail.com', 'testavatar.png'),
(79, 'Nicki', '$2y$10$z9.QeaLH8oePaetQe8f4Bu0xEJEUHctcgBdGCu75.Ukaz03bkz6wa', 'shkitak_user@gmail.com', 'testavatar.png'),
(80, 'Nick', '$2y$10$7FVExGUzHVE4LSvGiITlCOBafWsF40.Hmtl/7K/PY091qeYwYwCCi', 'shkitak_user123@dlit.dp.ua', 'testavatar.png');

-- --------------------------------------------------------

--
-- Структура таблицы `votes`
--

CREATE TABLE `votes` (
  `id_votes` int(7) NOT NULL,
  `Nightlife` int(2) NOT NULL,
  `Hospitals` int(2) NOT NULL,
  `Peace` int(2) NOT NULL,
  `RacialTolerance` int(2) NOT NULL,
  `LGBTQFriendly` int(2) NOT NULL,
  `EnglishSpeaking` int(2) NOT NULL,
  `EductionLevel` int(2) NOT NULL,
  `Walkability` int(2) NOT NULL,
  `TrafficSafty` int(2) NOT NULL,
  `VotedNum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `votes`
--

INSERT INTO `votes` (`id_votes`, `Nightlife`, `Hospitals`, `Peace`, `RacialTolerance`, `LGBTQFriendly`, `EnglishSpeaking`, `EductionLevel`, `Walkability`, `TrafficSafty`, `VotedNum`) VALUES
(1, 16, 2, 3, 0, 0, 0, 0, 0, 0, 2),
(2, 3, 3, 3, 0, 0, 0, 0, 0, 0, 0),
(3, 3, 3, 3, 0, 0, 0, 0, 0, 0, 0),
(4, 3, 3, 3, 0, 0, 0, 0, 0, 0, 0),
(5, 3, 3, 3, 0, 0, 0, 0, 0, 0, 0),
(6, 3, 3, 3, 0, 0, 0, 0, 0, 0, 0),
(7, 3, 3, 3, 0, 0, 0, 0, 0, 0, 0),
(8, 8, 3, 3, 0, 0, 0, 0, 0, 0, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `mailing`
--
ALTER TABLE `mailing`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`Id`);

--
-- Индексы таблицы `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`ID_offer`),
  ADD KEY `id_votes` (`id_votes`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Индексы таблицы `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id_votes`),
  ADD KEY `id_votes` (`id_votes`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `mailing`
--
ALTER TABLE `mailing`
  MODIFY `ID` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `offers`
--
ALTER TABLE `offers`
  MODIFY `ID_offer` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT для таблицы `votes`
--
ALTER TABLE `votes`
  MODIFY `id_votes` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `offers`
--
ALTER TABLE `offers`
  ADD CONSTRAINT `offers_ibfk_1` FOREIGN KEY (`id_votes`) REFERENCES `votes` (`id_votes`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
