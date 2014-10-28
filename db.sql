-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 28 Paź 2014, 18:45
-- Wersja serwera: 5.6.20
-- Wersja PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `rabatem`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `addresses`
--

CREATE TABLE IF NOT EXISTS `addresses` (
`id` int(11) NOT NULL,
  `company` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `website` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=2 ;

--
-- Zrzut danych tabeli `addresses`
--

INSERT INTO `addresses` (`id`, `company`, `address`, `phone`, `city`, `email`, `website`) VALUES
(1, 'fsadasfas', 'lwowska 100', '18 441 08 09', 'hdsfs', 'mmatusikpl@gmail.com', 'www.example.pl');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `adresses_offers`
--

CREATE TABLE IF NOT EXISTS `adresses_offers` (
  `id_offer` int(11) NOT NULL,
  `id_adress` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `adresses_offers`
--

INSERT INTO `adresses_offers` (`id_offer`, `id_adress`) VALUES
(1, 1),
(2, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=5 ;

--
-- Zrzut danych tabeli `categories`
--

INSERT INTO `categories` (`id`, `name`, `link`) VALUES
(1, 'Gastronomia', 'gastronomia'),
(2, 'Turystyka', 'turystyka'),
(3, 'Motoryzacja', 'motoryzacja'),
(4, 'Moda', 'moda');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `city`
--

CREATE TABLE IF NOT EXISTS `city` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `region` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `id_admin` int(11) NOT NULL,
  `domain` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=6 ;

--
-- Zrzut danych tabeli `city`
--

INSERT INTO `city` (`id`, `name`, `region`, `id_admin`, `domain`, `link`) VALUES
(1, 'Nowy Sącz', 'Małopolska', 1, 'www.nowysacz.rabatem.pl', 'nowy-sacz'),
(2, 'Kraków', 'Małopolska', 1, 'www.krakow.rabatem.pl', 'krakow'),
(3, 'Zgierz', 'Lubelskie', 1, 'www.zgierz.rabatem.pl', 'zgierz'),
(4, 'Katowice', 'Małopolska', 2, 'www.katowice.rabatem.pl', 'katowice'),
(5, 'Nowe Miasto', 'Malopolska', 2, 'www.newcityrabatem.pl', 'akaoskdasd');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
`id` int(11) NOT NULL,
  `action` varchar(255) NOT NULL,
  `disc` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL,
  `read` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `city` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Zrzut danych tabeli `logs`
--

INSERT INTO `logs` (`id`, `action`, `disc`, `user_id`, `read`, `date`, `city`) VALUES
(1, 'addoffer', 'Oferta <b>Oferta nr 1</b> została dodana pomyślnie.', 1, 1, 1414192454, 'Nowy Sącz'),
(2, 'addoffer', 'Oferta <b>Oferta nr 1</b> została dodana pomyślnie.', 1, 1, 1414192454, 'Zgierz'),
(3, 'addoffer', 'Oferta <b>Oferta nr 1 - edytowana</b> została dodana pomyślnie.', 2, 1, 1414195228, 'Nowe Miasto'),
(4, 'addoffer', 'Oferta <b>Oferta testowa nr 2</b> została dodana pomyślnie.', 2, 1, 1414196336, 'Katowice'),
(5, 'addoffer', 'Oferta <b>Oferta testowa nr 2</b> została dodana pomyślnie.', 2, 1, 1414196336, 'Nowe Miasto'),
(6, 'addoffer', 'Oferta <b>serserd</b> została dodana pomyślnie.', 1, 1, 1414244170, 'Nowy Sącz'),
(7, 'addoffer', 'Oferta <b>serserd</b> została dodana pomyślnie.', 1, 1, 1414244170, 'Zgierz'),
(8, 'addoffer', 'Oferta <b>serserd</b> została dodana pomyślnie.', 2, 1, 1414247424, 'Katowice'),
(9, 'addoffer', 'Oferta <b>Nowa oferta</b> została dodana pomyślnie.', 1, 1, 1414444195, 'Nowy Sącz');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
`id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `date` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `from` varchar(255) NOT NULL,
  `read` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Zrzut danych tabeli `messages`
--

INSERT INTO `messages` (`id`, `subject`, `text`, `date`, `username`, `from`, `read`) VALUES
(2, 'Temat', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1425778759, 'x2008x', 'test', 0),
(3, 'Temat 2', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.', 145787778, 'x2008x', 'test', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `offers`
--

CREATE TABLE IF NOT EXISTS `offers` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `disc` text COLLATE utf8_polish_ci NOT NULL,
  `how` text COLLATE utf8_polish_ci NOT NULL,
  `worth` text COLLATE utf8_polish_ci NOT NULL,
  `old_price` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `new_price` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `add_time` int(11) NOT NULL,
  `end_time` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `id_category` int(11) NOT NULL,
  `link` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `code_per_person` int(11) NOT NULL,
  `recommended` int(11) NOT NULL,
  `pass` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `keyworlds` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=4 ;

--
-- Zrzut danych tabeli `offers`
--

INSERT INTO `offers` (`id`, `name`, `disc`, `how`, `worth`, `old_price`, `new_price`, `add_time`, `end_time`, `active`, `id_category`, `link`, `code_per_person`, `recommended`, `pass`, `keyworlds`) VALUES
(1, 'serserd', 'hjjhbjhbbhjbhjhb', 'bhjhbjjhbhb', 'bhjbhjbh', '666', '250', 1414244053, 1414766053, 0, 1, 'xgfxgfddf-gdgdf-gfd-fd-fdddftfd-544ba6d5654a4', 0, 1, 'RRARRs', 'xgfxgfddf,gdgdf,gfd,fd,fdddftfd'),
(2, 'Nowa oferta', 'sadsadqwqdw', 'dqwwqddwq', 'dwqdwqdwqdqw', '300', '249', 0, 0, 0, 2, 'sadsad-sadasd-dasdasdsa544eb5039a855', 1, 1, '', 'sadsad,sadasd,dasdasdsa'),
(3, 'dsadsa', 'sad', 'sda', 'ads', '123', '123', 1414444833, 1414009233, 0, 1, 'asdsad-asdasd-adsasd-544eb721a5a50', 2, 0, '', 'asdsad,asdasd,adsasd');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `offers_city`
--

CREATE TABLE IF NOT EXISTS `offers_city` (
`id` int(11) NOT NULL,
  `id_offer` int(11) NOT NULL,
  `id_city` int(11) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Zrzut danych tabeli `offers_city`
--

INSERT INTO `offers_city` (`id`, `id_offer`, `id_city`, `active`) VALUES
(1, 1, 1, 1),
(2, 1, 3, 1),
(3, 1, 4, 1),
(4, 2, 1, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `offer_code`
--

CREATE TABLE IF NOT EXISTS `offer_code` (
`id` int(11) NOT NULL,
  `offer_link` varchar(1024) COLLATE utf8_bin NOT NULL,
  `code` varchar(255) COLLATE utf8_bin NOT NULL,
  `hash` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `host` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `use` int(11) DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=12 ;

--
-- Zrzut danych tabeli `offer_code`
--

INSERT INTO `offer_code` (`id`, `offer_link`, `code`, `hash`, `host`, `email`, `use`) VALUES
(1, '', '544eb482ca741', NULL, NULL, NULL, 0),
(2, '', '544eb48325838', NULL, NULL, NULL, 0),
(3, '', '544eb4833d7bc', NULL, NULL, NULL, 0),
(4, '', '544eb4835bc99', NULL, NULL, NULL, 0),
(5, '', '544eb48371093', NULL, NULL, NULL, 0),
(6, '', '544eb48389e51', NULL, NULL, NULL, 0),
(7, '', '544eb483b2269', NULL, NULL, NULL, 0),
(8, '', '544eb483f33f6', NULL, NULL, NULL, 0),
(9, '', '544eb4841a8ec', NULL, NULL, NULL, 0),
(10, '', '544eb48432d55', NULL, NULL, NULL, 0),
(11, 'asdsad-asdasd-adsasd-544eb721a5a50', '544eb721a5a5f', NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `offer_logs`
--

CREATE TABLE IF NOT EXISTS `offer_logs` (
`id` int(11) NOT NULL,
  `action` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `date` int(11) NOT NULL,
  `city` varchar(255) COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL,
  `disc` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Zrzut danych tabeli `offer_logs`
--

INSERT INTO `offer_logs` (`id`, `action`, `email`, `date`, `city`, `user_id`, `disc`) VALUES
(1, 'success', 'mmatusikpl@gmail.com', 1414247596, 'Nowy Sącz', 1, 'Kod <b>RRARRs</b> został wysłany na adres e-mail: <b>mmatusikpl@gmail.com</b>. - Oferta: <u>serserd</u>'),
(2, 'success', 'mmatusikpl@gmail.com', 1414444733, 'Nowy Sącz', 1, 'Kod <b></b> został wysłany na adres e-mail: <b>mmatusikpl@gmail.com</b>. - Oferta: <u>Nowa oferta</u>');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
`id` int(11) NOT NULL,
  `id_offer` int(11) NOT NULL,
  `src` varchar(255) NOT NULL,
  `main` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Zrzut danych tabeli `photos`
--

INSERT INTO `photos` (`id`, `id_offer`, `src`, `main`) VALUES
(1, 1, '544ba728731da_indeks wikar.jpg', 0),
(2, 1, '544ba728b2848_indekswikar z z.jpg', 1),
(3, 2, '544eb49c2cd89_indeks wikar.jpg', 1),
(4, 2, '544eb49c978af_indeks zc.jpg', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`user_id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `display_name` varchar(50) DEFAULT NULL,
  `password` varchar(128) NOT NULL,
  `state` smallint(6) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`user_id`, `username`, `email`, `display_name`, `password`, `state`, `role_id`) VALUES
(1, 'asdasdas', 'mmatusikpl@gmail.com', NULL, '$2y$14$jSYTb1JMo88hXG9VZgFBvOKzkpOhrxE8p3Ze8EPd6pA/L01zxkpty', NULL, 2),
(2, 'test', 'test@gmail.com', NULL, '$2y$14$AHrXyRDpwnHcFZP6Eo1yyuzcSaXoqt09TeQN1c4fuga944vR6do8K', NULL, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_role`
--

CREATE TABLE IF NOT EXISTS `user_role` (
`id` int(11) NOT NULL,
  `roleId` varchar(255) NOT NULL,
  `is_default` tinyint(1) NOT NULL,
  `parent_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Zrzut danych tabeli `user_role`
--

INSERT INTO `user_role` (`id`, `roleId`, `is_default`, `parent_id`) VALUES
(1, 'admin', 0, 'superadmin'),
(2, 'guest', 1, 'admin'),
(3, 'superadmin', 0, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_role_linker`
--

CREATE TABLE IF NOT EXISTS `user_role_linker` (
  `user_id` int(11) unsigned NOT NULL,
  `role_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `user_role_linker`
--

INSERT INTO `user_role_linker` (`user_id`, `role_id`) VALUES
(1, 'admin'),
(2, 'admin');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers_city`
--
ALTER TABLE `offers_city`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offer_code`
--
ALTER TABLE `offer_code`
 ADD PRIMARY KEY (`id`), ADD KEY `offer_id` (`offer_link`(255));

--
-- Indexes for table `offer_logs`
--
ALTER TABLE `offer_logs`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`user_id`), ADD UNIQUE KEY `username` (`username`), ADD UNIQUE KEY `email` (`email`), ADD KEY `role_id` (`role_id`), ADD KEY `role_id_2` (`role_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role_linker`
--
ALTER TABLE `user_role_linker`
 ADD PRIMARY KEY (`user_id`,`role_id`), ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `addresses`
--
ALTER TABLE `addresses`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT dla tabeli `categories`
--
ALTER TABLE `categories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT dla tabeli `city`
--
ALTER TABLE `city`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT dla tabeli `logs`
--
ALTER TABLE `logs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT dla tabeli `messages`
--
ALTER TABLE `messages`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT dla tabeli `offers`
--
ALTER TABLE `offers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT dla tabeli `offers_city`
--
ALTER TABLE `offers_city`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT dla tabeli `offer_code`
--
ALTER TABLE `offer_code`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT dla tabeli `offer_logs`
--
ALTER TABLE `offer_logs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT dla tabeli `photos`
--
ALTER TABLE `photos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT dla tabeli `user_role`
--
ALTER TABLE `user_role`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
