-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 19 Wrz 2014, 09:37
-- Wersja serwera: 5.5.34
-- Wersja PHP: 5.3.27

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
-- Struktura tabeli dla tabeli `address`
--

CREATE TABLE IF NOT EXISTS `address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Zrzut danych tabeli `address`
--

INSERT INTO `address` (`id`, `name`, `address`, `phone`, `email`, `website`, `city`) VALUES
(1, 'E-Creative', 'Wyspanskiego 22', '18 441 44 44', 'reklama@rabatem.pl', 'www.rabatem.pl', 'Nowy S?cz'),
(2, 'Google', 'KOko', '9899 787 8899', 'support@google.pl', 'www.google.pl', 'Kazakhstan');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `addresses`
--

CREATE TABLE IF NOT EXISTS `addresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `website` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=9 ;

--
-- Zrzut danych tabeli `addresses`
--

INSERT INTO `addresses` (`id`, `company`, `address`, `phone`, `city`, `email`, `website`) VALUES
(4, 'E-Creative', 'Lwowska 100', '999 99 99 99 ', 'Nowy Sacz', 'reakok@ofakokf.pl', 'www.rkfkof.pl'),
(5, 'Google', 'Kazakhstan', '488 998 777', 'Kazakhstan 2', 'eemee@mgila.com', 'www.ghoogle.okl'),
(6, 'Testowa firma', 'Lwowska 300', '18 441 11 11', 'Kraków', 'kontakt@firma.pl', 'www.firma.pl'),
(7, 'Testy', 'Krakowska 100', '18 441 11 11', 'Warszawa', 'mmatusikpl@gmail.com', 'www.firma.pl'),
(8, 'Firma #1', 'Lwowska 49', '18 447 87 98', 'Kraków', 'kontakt@firma.pl', '');

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
(1, 2),
(9, 3),
(10, 3),
(11, 2),
(12, 3),
(13, 2),
(14, 2),
(15, 3),
(16, 3),
(17, 2),
(18, 2),
(19, 2),
(20, 8);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=3 ;

--
-- Zrzut danych tabeli `categories`
--

INSERT INTO `categories` (`id`, `name`, `link`) VALUES
(1, 'Gastronomia', 'gastronomia'),
(2, 'Turystyka', 'turystyka');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `region` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `id_admin` int(11) NOT NULL,
  `domain` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=5 ;

--
-- Zrzut danych tabeli `city`
--

INSERT INTO `city` (`id`, `name`, `region`, `id_admin`, `domain`, `link`) VALUES
(1, 'Nowy Sącz', 'Małopolska', 1, 'www.nowysacz.rabatem.pl', 'nowy-sacz'),
(2, 'Kraków', 'Małopolska', 1, 'www.krakow.rabatem.pl', 'krakow'),
(3, 'Zgierz', 'Lubelskie', 1, 'www.zgierz.rabatem.pl', 'zgierz'),
(4, 'Katowice', 'Małopolska', 3, 'www.katowice.rabatem.pl', 'katowice');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `action` varchar(255) NOT NULL,
  `disc` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `read` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Zrzut danych tabeli `logs`
--

INSERT INTO `logs` (`id`, `action`, `disc`, `user_id`, `read`) VALUES
(1, 'addoffer', 'Oferta Pizza 30% taniej, zosta?a dodana', 1, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `offers`
--

CREATE TABLE IF NOT EXISTS `offers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `pass` varchar(255) COLLATE utf8_polish_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=21 ;

--
-- Zrzut danych tabeli `offers`
--

INSERT INTO `offers` (`id`, `name`, `disc`, `how`, `worth`, `old_price`, `new_price`, `add_time`, `end_time`, `active`, `id_category`, `link`, `code_per_person`, `recommended`, `pass`) VALUES
(1, 'Test', 'opis', 'jak', 'warty', '250', '150', 1234566663, 1456777744, 1, 1, 'test', 0, 1, '0'),
(2, 'Test1', 'opis', 'jak', 'warty', '250', '150', 1234566663, 1456777744, 1, 1, '', 0, 0, '0'),
(3, 'Test2', 'opis', 'jak', 'warty', '250', '150', 1234566663, 1456777744, 1, 1, '', 0, 1, '0'),
(4, 'Test3', 'opis', 'jak', 'warty', '250', '150', 1234566663, 1456777744, 1, 1, '', 0, 0, '0'),
(5, 'Test4', 'opis', 'jak', 'warty', '250', '150', 1234566663, 1456777744, 1, 1, '', 0, 0, '0'),
(6, 'Test5', 'opis', 'jak', 'warty', '250', '150', 1234566663, 1456777744, 1, 1, '', 0, 1, '0'),
(7, 'Test6', 'opis', 'jak', 'warty', '250', '150', 1234566663, 1456777744, 1, 1, '', 0, 0, '0'),
(8, 'Rowery taniej o 15%', 'asd', 'eqw', 'tew', '1400', '1000', 1407756666, 2014, 0, 1, 'rowery-taniej-o-15', 0, 0, '0'),
(9, 'Pizza 30cm w cenie 20cm', 'asdsa', 'dsa', 'sadasd', '30', '21', 1407842784, 1408709173, 0, 1, 'pizza-30cm-w-cenie-20cm', 3, 0, '0'),
(10, 'Test oakdo aksdo kaso', 'f', 'h', 'fghgf', '30', '40', 1408389138, 1408561938, 0, 1, 'test-oakdo-aksdo-kaso', 2, 0, '0'),
(11, 'Nowa Oferta Test Rabatem', 'dfdfdsfvds', 'fdsdfdsfdfs', 'dfsdfs', '10', '3', 1410353585, 1411044785, 0, 1, 'nowa-oferta-test-rabatem', 1, 1, '0'),
(12, 'Oferta 0', 'hjhjhn', 'kjmkmk', 'kjkjkm', '12', '45', 1410944447, 1412067647, 0, 1, 'oferta-0', 2, 0, '0'),
(13, 'ostatni test', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '50', '100', 1410986629, 1411073029, 0, 1, 'ostatni-test', 1, 0, '0'),
(14, 'Oferta 30', 'OKDSOAKDoaskdo', 'kwqoekq20e qkw0kd qw0wq 0q wkw q0dk', 'kqwd 0k21 0k2 02k', '20', '40', 1410990964, 1411509364, 0, 1, 'oferta-30', 3, 0, '0'),
(15, 'test test test', 'rewnju', 'jiijni', 'jnininin', '50', '20', 1411027523, 1411977923, 0, 1, 'test-test-test', 1, 0, '0'),
(16, 'Test polecane', 'das', 'das', 'das', '12', '4', 1411030148, 1411030148, 0, 1, 'test-polecane', 2, 1, '0'),
(17, 'dasdasdas', 'csac', 'asc', 'asc', '45', '20', 1411030775, 1411635575, 0, 1, 'dasdasdas', 1, 1, '0'),
(18, 'zfdhgxfg,j.kf,hvxj ', 'sjyt  bzdhvEZFHBA JZHV YFJ XCGHRSJ YFJARJH AJGH SFJFJ AFGJGFJGFJSFJ FGJ SFJ SFJ', 'CFHe nyhna trj DH dfh TH DTjDt HADTNe', 'RE htjgKaryns rtharthVEFGNUJBARVGDYBTRSUSRTNTZDRYNABRTUSR', '12', '10', 1411035662, 1410430862, 0, 1, 'zfdhgxfg-j-kf-hvxj', 1, 1, '0'),
(19, 'DSSDSD', 'cvcvx', 'vxc', 'cxv', '324', '4', 1411036012, 1412072812, 0, 1, 'dssdsd', 2, 1, '0'),
(20, 'Test oferty EEEEEEEEEEE', 'ASD', 'asd', 'asd', '240', '120', 1411118606, 1411550606, 0, 1, 'test-oferty-eeeeeeeeeee', 0, 1, '0');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `offers_city`
--

CREATE TABLE IF NOT EXISTS `offers_city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_offer` int(11) NOT NULL,
  `id_city` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Zrzut danych tabeli `offers_city`
--

INSERT INTO `offers_city` (`id`, `id_offer`, `id_city`) VALUES
(15, 1, 1),
(16, 6, 3),
(18, 1, 2),
(24, 1, 3),
(25, 8, 1),
(26, 8, 3),
(27, 9, 2),
(28, 9, 3),
(29, 6, 4),
(30, 3, 4),
(31, 11, 4),
(32, 12, 2),
(33, 12, 3),
(34, 13, 1),
(35, 13, 2),
(36, 14, 2),
(37, 14, 4),
(38, 15, 1),
(39, 15, 2),
(40, 16, 1),
(41, 17, 2),
(42, 17, 3),
(43, 18, 1),
(44, 20, 2),
(45, 20, 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_offer` int(11) NOT NULL,
  `src` varchar(255) NOT NULL,
  `main` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Zrzut danych tabeli `photos`
--

INSERT INTO `photos` (`id`, `id_offer`, `src`, `main`) VALUES
(2, 0, 'free-tv.png', 0),
(3, 1, 'free-tv.png', 0),
(4, 1, '3 strona.jpg', 0),
(5, 1, 'indekswikar z z.jpg', 1),
(6, 1, 'indeks wikar.jpg', 0),
(7, 1, 'TLO 2 Jaworzyna Krynicka fot. archiwum Jaworzyna Krynicka.JPG', 1),
(8, 1, 'TLO 2 Jaworzyna Krynicka fot. archiwum Jaworzyna Krynicka.JPG', 1),
(9, 1, 'TLO 2 Jaworzyna Krynicka fot. archiwum Jaworzyna Krynicka.JPG', 1),
(10, 1, 'TLO 2 Jaworzyna Krynicka fot. archiwum Jaworzyna Krynicka.JPG', 1),
(11, 1, 'free-tv.png', 1),
(12, 1, 'resize.jpg', 1),
(13, 1, 'resize.jpg', 1),
(14, 1, 'resize.jpg', 1),
(15, 1, 'resize.jpg', 1),
(16, 1, 'resize.jpg', 1),
(17, 1, 'resize.jpg', 1),
(18, 1, 'resize.jpg', 1),
(19, 1, '2293.jpg', 1),
(20, 1, '2293.jpg', 1),
(21, 1, '2293.jpg', 1),
(22, 1, '2293.jpg', 1),
(23, 1, '10388963_766348043429226_822116143_o.jpg', 1),
(24, 1, '10388963_766348043429226_822116143_o.jpg', 1),
(25, 1, 'header.jpg', 1),
(26, 1, '2293.jpg', 1),
(27, 1, 'header.jpg', 1),
(28, 1, '10388963_766348043429226_822116143_o.jpg', 1),
(29, 1, 'header.jpg', 0),
(30, 1, '10388963_766348043429226_822116143_o.jpg', 1),
(31, 1, 'header.jpg', 0),
(32, 1, '10388963_766348043429226_822116143_o.jpg53f1ce2fb257d', 1),
(33, 1, 'header.jpg53f1ce3015e56', 0),
(34, 1, '10388963_766348043429226_822116143_o.jpg53f1ce5b49d00', 1),
(35, 1, 'header.jpg53f1ce5bb17b9', 0),
(36, 1, '10388963_766348043429226_822116143_o.jpg53f1ce70b097f', 1),
(37, 1, 'header.jpg53f1ce7103fe9', 0),
(38, 10, '53f2504a3a047_2293.jpg', 1),
(39, 9, '741144-quality-glasses-liskeard-r-a-b-thompson-opticians-soft-lenses.png', 1),
(40, 9, 'Bez nazwy-2.jpg', 1),
(41, 1, '5419c600e2272_serwis1(1).jpg', 1),
(42, 13, '5419f29d2209d_2293.jpg', 1),
(43, 14, '541a0392d5b69_grid copy.jpg', 1),
(44, 14, '541a0393215cc_free-tv.png', 0),
(45, 14, '541a042689a93_grid copy.jpg', 1),
(46, 14, '541a044d525ab_S?otwiny CN Azoty - fot. Archiwum Starostwo Powiatowe.jpg', 1),
(47, 15, '541a925a50f32_grid copy.jpg', 1),
(48, 16, '541a9c91ed641_grid copy.jpg', 1),
(49, 17, '541a9f144e1a9_grid copy.jpg', 1),
(50, 14, '541aa26862e54_grid copy.jpg', 1),
(51, 18, '541ab245a92da_grid copy.jpg', 1),
(52, 19, '541ab5751563e_indekswikar z z.jpg', 1),
(53, 20, '541bf6409cbc2_2293.jpg', 1),
(54, 20, '541bf64106980_Bez nazwy-2.jpg', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `session` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=90 ;

--
-- Zrzut danych tabeli `sessions`
--

INSERT INTO `sessions` (`id`, `username`, `session`, `ip`) VALUES
(79, 'admin', 'a166aee2279d562f579f8d2ae4e54042', '127.0.0.1'),
(89, 'ry', 'b6a18a21229c8bd42900083c189f8637', '127.0.0.1');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `display_name` varchar(50) DEFAULT NULL,
  `password` varchar(128) NOT NULL,
  `state` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`user_id`, `username`, `email`, `display_name`, `password`, `state`) VALUES
(1, NULL, 'mmatusikpl@gmail.com', NULL, '$2y$14$jSYTb1JMo88hXG9VZgFBvOKzkpOhrxE8p3Ze8EPd6pA/L01zxkpty', NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(70) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL,
  `username` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL,
  `pass` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL,
  `auth` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=68 ;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `pass`, `auth`) VALUES
(1, 'mmatusikpl@gmail.com', 'ry', '202cb962ac59075b964b07152d234b70', 99),
(2, 'michaljanus83@gmail.com', 'admin', '202cb962ac59075b964b07152d234b70', 1),
(9, 'mmatusikpl@gmail.com', '1373187401', '4a2d6618727fab74559f18ee84a977f4', 2),
(10, 'mmatusikpl@gmail.com', '1377627838', '4a2d6618727fab74559f18ee84a977f4', 2),
(11, 'weselnetaxi@gmail.com', '1377849410', '14dc4b067a691a844a45b8baf886da4f', 2),
(12, 'sss', '1377849905', '88bf8e091f4ac3570fa0a09c0d3dd9e2', 2),
(13, 'nj@gn.pl', '1380706374', '361a833dad027e4b9ce52e365163baec', 2),
(14, 'xry99x@gmail.com', 'Michał Matusik', NULL, 0),
(15, 'majkash@o2.pl', 'majkash', '0eb074dcc1bfd7761e1de6772d2baf14', 0),
(16, 'asik1987@op.pl', 'asik1987@op.pl', '053a6ae9eef12779a9f8fd4d4b9942ea', 0),
(17, 'asik1987@op.pl', 'asik19', '1742a19fbb9e9613976951e3523df0b7', 0),
(18, 'k.zurowicz@gmail.com', 'katrinek', 'b3395ef1f7ff9f39b7253a5f7103f906', 0),
(19, 'katrinek@poczta.onet.pl', 'katrinek@poczta.onet.pl', 'f878bba49cfaf402831adfbb8a4b4394', 0),
(20, 'krystian.dziopa@gmail.com', 'Krystian Dziopa', NULL, 0),
(21, 'lesteer@gazeta.pl', 'lesteer@gazeta.pl', 'd7ca234fc4d1aa0d9a68c95440cba1d0', 0),
(22, '88riza88@gmail.com', 'iziabeja', '6a67f555a2dfe6e238efbb41840593ad', 0),
(23, 'paola_ns@poczta.fm', 'paola_ns@poczta.fm', 'fd9ad82d0a32a31f6c824e234d74d0ef', 0),
(24, 'paola_ns@poczta.fm', 'paola_ns@poczta.fm', 'fd9ad82d0a32a31f6c824e234d74d0ef', 0),
(25, 'restauracja@poczekalnians.pl', '1385674959', '386474016050a2f2b617fb7ae9bd4208', 2),
(26, 'nessyie@ymail.com', 'KingaSz', '69bcb04cd4396e44d4b8b87f8ea4121f', 0),
(27, 'nessyie@ymail.com', 'KingaSz', '69bcb04cd4396e44d4b8b87f8ea4121f', 0),
(28, 'vaguechicken825@hotmail.com', 'kamilkaox', 'd17b9a0779a342545984e0330194e284', 0),
(29, 'etherealvacation355@hotmail.com', 'stefekows', 'd17b9a0779a342545984e0330194e284', 0),
(30, 'etherealvacation355@hotmail.com', 'stefekows', 'd17b9a0779a342545984e0330194e284', 0),
(31, 'finleyym3aqr@live.com', 'michaloxe', 'd17b9a0779a342545984e0330194e284', 0),
(32, 'arrogantvacation018@hotmail.com', 'michaloxe', 'd17b9a0779a342545984e0330194e284', 0),
(33, 'nosytouch186@hotmail.com', 'sabinakolavip', 'eb9980139b04cbf10475f3caf03e8d86', 0),
(34, 'ribbtimisqui1985@interia.pl', 'zawieruchakamico', '1a51b424ff2ed7909b0ed8e31ed8a802', 0),
(35, 'ribbtimisqui1985@interia.pl', 'zawieruchakamico', '1a51b424ff2ed7909b0ed8e31ed8a802', 0),
(36, 'atworsoftsquar1978@interia.pl', 'natiole', 'bdd0aa280f18ac7f566cc39069088eaf', 0),
(37, 'quokneelsubmi1975@interia.pl', 'oediox', 'eba5e0332996b480a26bc46ddf60022b', 0),
(38, 'atworsoftsquar1978@interia.pl', 'natiole', 'bdd0aa280f18ac7f566cc39069088eaf', 0),
(39, 'raupropbionces1970@interia.pl', 'Sandralifs', '23e836709418982d90e8894bdef958ad', 0),
(40, 'slqk17@gmail.com', 'SławekC', 'b7c23d3155ea7d2908480e65ed148409', 0),
(41, 'atworsoftsquar1978@interia.pl', 'natiole', 'bdd0aa280f18ac7f566cc39069088eaf', 0),
(42, 'tavenviva1983@interia.pl', 'Kamilaolszew', '754b30a3f4e3cbad88f2d7d4af47f9e6', 0),
(43, 'gladysz.g95@gmail.com', 'lukasz_g95', '95f69c08d31c2a2fd530702e8ff98bd7', 0),
(44, 'gladysz.g95@gmail.com', 'lukasz_g95', '95f69c08d31c2a2fd530702e8ff98bd7', 0),
(45, 'r7ozsrodkowa12ny@interia.pl', 'michalzups', '4bd3175b6436e5c6a06e3a43a8540d15', 0),
(46, 'fantasticwater776@hotmail.com', 'Glummameemy', '0af156e14615aea9a5592518fbb6c12f', 0),
(47, 'urszula.gromala@onet.pl', 'Ula Gromala', NULL, 0),
(48, 'dak86@o2.pl', 'dak860', '8032eea2e3a3cd87d1eca83f4fe079e5', 0),
(49, 'asia_0707@o2.pl', 'asia_0707@o2.pl', 'd77815d11d93227458a7dd4a83bc1153', 0),
(50, 'asia_0707@o2.pl', 'asia_0707@o2.pl', 'd77815d11d93227458a7dd4a83bc1153', 0),
(51, 'r7ozsrodkowa12ny@interia.pl', 'michalzups', '4bd3175b6436e5c6a06e3a43a8540d15', 0),
(52, 'r7ozsrodkowa12ny@interia.pl', 'michalzups', '4bd3175b6436e5c6a06e3a43a8540d15', 0),
(53, 'najemnik3@vp.pl', 'ptaryk8708', 'b80de700656ee3a0462744b027978d40', 0),
(54, 'Arbocns@gmail.com', 'Arbocns', '0005f9b13a92cecab7ee4a2eb0fd25cc', 0),
(55, 'Arbocns@gmail.com', 'Arbocns', '0005f9b13a92cecab7ee4a2eb0fd25cc', 0),
(56, 'Arbocns@gmail.com', 'Arbocns', '0005f9b13a92cecab7ee4a2eb0fd25cc', 0),
(57, 'krzysztofmordarski@gmail.com', 'Kizior Em', NULL, 0),
(58, 'lukashns@gmail.com', 'lukashns', '11d3d6027d5040d05b97395391cbcd01', 0),
(59, 'lukashns@gmail.com', 'lukashns', '11d3d6027d5040d05b97395391cbcd01', 0),
(60, 'administrator@aerodisk.com', 'Buyviagraonline', '47e332089b15f918215a2abae55d19c1', 0),
(61, 'bmotak@interia.pl', 'Barbarabacha5', 'c15387b4f317a7db9b9b6633ca5ca256', 0),
(62, 'beataporeba@wp.pl', 'Becia77', '81c1de0ac70e8ef7c56c49bbd967887a', 0),
(63, 'beataporeba@wp.pl', 'beataporeba@wp.pl', 'ec202d02db7e043cdf13dcd0172106f6', 0),
(64, 'wiolawielgus@interia.pl', 'wiola1', '2e15618f45af321a101a1da2fdb0be6c', 0),
(65, 'skutery.szewczyk@tlen.pl', 'Romet12', '716d281e5e1b24a82fa0c7e2f8c6f7b6', 0),
(66, 'mmmmmmmmmmmmmm@ggmail.com', 'mmmmmmmmmmmm', 'bb719731f733173656b3d1e43723487d', 0),
(67, 'mmatusikpl@gmail.com', '1395752012', 'e85950a0b3db9dc170606b286cbba6db', 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_role`
--

CREATE TABLE IF NOT EXISTS `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT '0',
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_role` (`role_id`),
  KEY `idx_parent_id` (`parent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_role_linker`
--

CREATE TABLE IF NOT EXISTS `user_role_linker` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `idx_role_id` (`role_id`),
  KEY `idx_user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `fk_parent_id` FOREIGN KEY (`parent_id`) REFERENCES `user_role` (`id`) ON DELETE SET NULL;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
