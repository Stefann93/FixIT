-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2023 at 10:51 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fixitinr_fixit`
--

-- --------------------------------------------------------

--
-- Table structure for table `delatnosti`
--

CREATE TABLE `delatnosti` (
  `id_delatnosti` int(11) NOT NULL,
  `naziv_delatnosti` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `delatnosti`
--

INSERT INTO `delatnosti` (`id_delatnosti`, `naziv_delatnosti`) VALUES
(1, 'Gradjevinski radovi'),
(2, 'Elektrika'),
(3, 'Odrzavanje'),
(4, 'Cevne instalacije'),
(5, 'Obrada materijala'),
(6, 'Garderoba i nakit'),
(7, 'Odrzavanje vozila'),
(8, 'Ostalo');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id_event` int(11) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `id_radnika` int(11) DEFAULT NULL,
  `naziv_posla` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id_event`, `start`, `end`, `id_radnika`, `naziv_posla`) VALUES
(57, '2023-03-20', '2023-03-24', 1, 'moler'),
(58, '2023-03-27', '2023-04-01', 1, 'moler');

-- --------------------------------------------------------

--
-- Table structure for table `firma`
--

CREATE TABLE `firma` (
  `id_firme` int(11) NOT NULL,
  `ime_firme` varchar(60) DEFAULT NULL,
  `ime_vlasnika` varchar(60) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `sifra` varchar(60) DEFAULT NULL,
  `id_delatnosti` int(11) NOT NULL,
  `posao_id` int(11) NOT NULL,
  `id_opstine` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fizicko_lice`
--

CREATE TABLE `fizicko_lice` (
  `id_fizicko` int(11) NOT NULL,
  `ime` varchar(45) DEFAULT NULL,
  `prezime` varchar(45) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `sifra` varchar(45) DEFAULT NULL,
  `JMBG` varchar(13) DEFAULT NULL,
  `id_opstine` varchar(45) DEFAULT NULL,
  `adresa` varchar(45) DEFAULT NULL,
  `id_delatnosti` varchar(45) DEFAULT NULL,
  `posao_id` varchar(45) DEFAULT NULL,
  `br_tel` int(11) DEFAULT NULL,
  `ocena` decimal(3,0) DEFAULT NULL,
  `radno_vreme` varchar(100) DEFAULT NULL,
  `teren` varchar(2) DEFAULT NULL,
  `dani` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fizicko_lice`
--

INSERT INTO `fizicko_lice` (`id_fizicko`, `ime`, `prezime`, `email`, `sifra`, `JMBG`, `id_opstine`, `adresa`, `id_delatnosti`, `posao_id`, `br_tel`, `ocena`, `radno_vreme`, `teren`, `dani`) VALUES
(1, 'Stefan', 'Nikolic', 'email3448@email.com', 'password8328', '2168694510', '26', 'Random Adresa 3639', '1', '1', 2147483647, '9', 'DODATI!', 'Da', '2022-03-17'),
(2, 'Marko', 'Marinkovic', 'email8210@example.com', 'password5802', '4943640283', '76', 'Random Adresa 9363', '1', '1', 2147483647, '9', 'DODATI!', 'Ne', '2022-08-31'),
(3, 'Nemanja', 'Nedic', 'email7447@example.com', 'password8403', '9707642920', '54', 'Random Adresa 6803', '1', '1', 2147483647, '3', 'DODATI!', 'Da', '2022-01-08'),
(4, 'Andrej', 'Andric', 'email9222@example.com', 'password7147', '8260556455', '150', 'Random Adresa 275', '1', '1', 2147483647, '3', 'DODATI!', 'Da', '2022-09-24'),
(5, 'Lazar', 'Jankovic', 'email7612@example.com', 'password5873', '6878455270', '85', 'Random Adresa 5591', '1', '1', 2147483647, '8', 'DODATI!', 'Da', '2022-02-12'),
(6, 'Nikola', 'Ilic', 'email6223@example.com', 'password5796', '1281898139', '71', 'Random Adresa 9935', '1', '1', 2147483647, '6', 'DODATI!', 'Da', '2022-05-22'),
(7, 'Konstantin', 'Marinkovic', 'email4733@example.com', 'password3586', '4359745542', '133', 'Random Adresa 8322', '1', '1', 2147483647, '5', 'DODATI!', 'Da', '2022-02-08'),
(8, 'Bora', 'Milijanovic', 'email1730@example.com', 'password6150', '6005294126', '158', 'Random Adresa 91', '1', '1', 2147483647, '2', 'DODATI!', 'Ne', '2022-02-09');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `korisnik_id` int(11) NOT NULL,
  `ime` varchar(45) DEFAULT NULL,
  `prezime` varchar(45) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `sifra` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`korisnik_id`, `ime`, `prezime`, `email`, `sifra`) VALUES
(3, '1', '1', '1@gmail.com', '356a192b7913b04c54574d18c28d46e6395428ab'),
(8, '1', '1', '1@gmail.com', '356a192b7913b04c54574d18c28d46e6395428ab'),
(9, NULL, NULL, NULL, NULL),
(10, NULL, NULL, NULL, NULL),
(11, NULL, NULL, NULL, NULL),
(12, '2', '2', '2@gmail.com', 'da4b9237bacccdf19c0760cab7aec4a8359010b0');

-- --------------------------------------------------------

--
-- Table structure for table `opstine`
--

CREATE TABLE `opstine` (
  `id_opstine` int(11) NOT NULL,
  `ime_opstine` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `opstine`
--

INSERT INTO `opstine` (`id_opstine`, `ime_opstine`) VALUES
(1, 'Ada'),
(2, 'Aleksandrovac'),
(3, 'Aleksinac'),
(4, 'Alibunar'),
(5, 'Apatin'),
(6, 'Arandjelovac'),
(7, 'Arilje'),
(8, 'Babusnica'),
(9, 'Bajina Basta'),
(10, 'Barajevo'),
(11, 'Batocina'),
(12, 'Bac'),
(13, 'Backa Palanka'),
(14, 'Backa Topola'),
(15, 'Backi Petrovac'),
(16, 'Bela Palanka'),
(17, 'Bela Crkva'),
(18, 'Beocin'),
(19, 'Becej'),
(20, 'Blace'),
(21, 'Bogatic'),
(22, 'Bojnik'),
(23, 'Boljevac'),
(24, 'Bor'),
(25, 'Bosilegrad'),
(26, 'Brus'),
(27, 'Bujanovac'),
(28, 'Valjevo'),
(29, 'Varvarin'),
(30, 'Velika Plana'),
(31, 'Veliko Gradiste'),
(32, 'Vitina'),
(33, 'Vladimirci'),
(34, 'Vladicin Han'),
(35, 'Vlasotince'),
(36, 'Vozdovac'),
(37, 'Vranje'),
(38, 'Vracar'),
(39, 'Vrbas'),
(40, 'Vrnjacka Banja'),
(41, 'Vrsac'),
(42, 'Vucitrn'),
(43, 'Gadzin Han'),
(44, 'Glogovac'),
(45, 'Gnjilane'),
(46, 'Golubac'),
(47, 'Gora'),
(48, 'Gornji Milanovac'),
(49, 'Grocka'),
(50, 'Despotovac'),
(51, 'Decani'),
(52, 'Dimitrovgrad'),
(53, 'Doljevac'),
(54, 'Djakovica'),
(55, 'Zabalj'),
(56, 'Zabari'),
(57, 'Zagubica'),
(58, 'Zitiste'),
(59, 'Zitoradja'),
(60, 'Zajecar'),
(61, 'Zvezdara'),
(62, 'Zvecan'),
(63, 'Zemun'),
(64, 'Zrenjanin'),
(65, 'Zubin Potok'),
(66, 'Ivanjica'),
(67, 'Indjija'),
(68, 'Irig'),
(69, 'Istok'),
(70, 'Jagodina'),
(71, 'Kanjiza'),
(72, 'Kacanik'),
(73, 'Kikinda'),
(74, 'Kladovo'),
(75, 'Klina'),
(76, 'Knic'),
(77, 'Knjazevac'),
(78, 'Kovacica'),
(79, 'Kovin'),
(80, 'Kosjeric'),
(81, 'Kosovo Polje'),
(82, 'Kosovska Kamenica'),
(83, 'Kosovska Mitrovica'),
(84, 'Koceljeva'),
(85, 'Kragujevac'),
(86, 'Kraljevo'),
(87, 'Krupanj'),
(88, 'Krusevac'),
(89, 'Kula'),
(90, 'Kursumlija'),
(91, 'Kucevo'),
(92, 'Lazarevac'),
(93, 'Lajkovac'),
(94, 'Lapovo'),
(95, 'Lebane'),
(96, 'Leposavic'),
(97, 'Leskovac'),
(98, 'Lipljan'),
(99, 'Loznica'),
(100, 'Lucani'),
(101, 'Ljig'),
(102, 'Ljubovija'),
(103, 'Majdanpek'),
(104, 'Mali Zvornik'),
(105, 'Mali Idjos'),
(106, 'Malo Crnice'),
(107, 'Medvedja'),
(108, 'Mediana'),
(109, 'Merosina'),
(110, 'Mionica'),
(111, 'Mladenovac'),
(112, 'Negotin'),
(113, 'Niska Banja'),
(114, 'Nova Varos'),
(115, 'Nova Crnja'),
(116, 'Novi Beograd'),
(117, 'Novi Becej'),
(118, 'Novi Knezevac'),
(119, 'Novi Pazar'),
(120, 'Novi Sad'),
(121, 'Novo Brdo'),
(122, 'Obilic'),
(123, 'Obrenovac'),
(124, 'Opovo'),
(125, 'Orahovac'),
(126, 'Osecina'),
(127, 'Odzaci'),
(128, 'Palilula'),
(129, 'Palilula (Nis)'),
(130, 'Pantelej'),
(131, 'Pancevo'),
(132, 'Paracin'),
(133, 'Petrovaradin'),
(134, 'Petrovac na Mlavi'),
(135, 'Pec'),
(136, 'Pecinci'),
(137, 'Pirot'),
(138, 'Plandiste'),
(139, 'Podujevo'),
(140, 'Pozarevac'),
(141, 'Pozega'),
(142, 'Presevo'),
(143, 'Priboj na Limu'),
(144, 'Prizren'),
(145, 'Prijepolje'),
(146, 'Pristina'),
(147, 'Prokuplje'),
(148, 'Razanj'),
(149, 'Rakovica'),
(150, 'Raca'),
(151, 'Raska'),
(152, 'Rekovac'),
(153, 'Ruma'),
(154, 'Savski venac'),
(155, 'Svilajnac'),
(156, 'Svrljig'),
(157, 'Senta'),
(158, 'Secanj'),
(159, 'Sjenica'),
(160, 'Smederevo'),
(161, 'Smederevska Palanka'),
(162, 'Sokobanja'),
(163, 'Sombor'),
(164, 'Sopot'),
(165, 'Srbica'),
(166, 'Srbobran'),
(167, 'Sremska Mitrovica'),
(168, 'Sremski Karlovci'),
(169, 'Stara Pazova'),
(170, 'Stari grad'),
(171, 'Stragari'),
(172, 'Subotica'),
(173, 'Suva Reka'),
(174, 'Surdulica'),
(175, 'Surcin'),
(176, 'Temerin'),
(177, 'Titel'),
(178, 'Topola'),
(179, 'Trgoviste'),
(180, 'Trstenik'),
(181, 'Tutin'),
(182, 'Cicevac'),
(183, 'Cuprija'),
(184, 'Ub'),
(185, 'Uzice'),
(186, 'Urosevac'),
(187, 'Crveni krst'),
(188, 'Crna Trava'),
(189, 'Cajetina'),
(190, 'Cacak'),
(191, 'Coka'),
(192, 'Cukarica'),
(193, 'Sabac'),
(194, 'Sid'),
(195, 'Stimlje'),
(196, 'Strpce');

-- --------------------------------------------------------

--
-- Table structure for table `poslovi`
--

CREATE TABLE `poslovi` (
  `posao_id` int(11) NOT NULL,
  `naziv_posla` varchar(50) DEFAULT NULL,
  `id_delatnosti` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `poslovi`
--

INSERT INTO `poslovi` (`posao_id`, `naziv_posla`, `id_delatnosti`) VALUES
(1, 'Moler', 1),
(2, 'Gipsar', 1),
(3, 'Fasader', 1),
(4, 'Zidar', 1),
(5, 'Parketar', 1),
(6, 'Keramicar', 1),
(7, 'Limar', 1),
(8, 'Varilac', 1),
(9, 'Stolar', 1),
(10, 'Izolater', 1),
(11, 'Tesar', 1),
(12, 'Bazeni i fontane', 1),
(13, 'Pomocni radnik', 1),
(14, 'Podne povrsine', 1),
(15, 'Secenje i busenje', 1),
(16, 'Armirac', 1),
(17, 'Bravar-monter', 1),
(18, 'Elektricar', 2),
(19, 'Vikler elektromotora', 2),
(20, 'Serviser liftova', 2),
(21, 'Monter klima uredjaja', 2),
(22, 'Audio-video serviser', 2),
(23, 'Serviser mobilnih telefona', 2),
(24, 'Serviser racunara', 2),
(25, 'Spremacica', 3),
(26, 'Cistac', 3),
(27, 'Perac podnih povrsina', 3),
(28, 'Odzacar', 3),
(29, 'Bastovan', 3),
(30, 'Drvoseca', 3),
(31, 'Visinski radnik', 3),
(32, 'Perac fasada', 3),
(33, 'Haus majstor/Domar', 3),
(34, 'Vodoinstalater', 4),
(35, 'Monter grejnih instalacija', 4),
(36, 'Ventilacioni sistemi', 4),
(37, 'Kljucar', 5),
(38, 'Tapetar', 5),
(39, 'Metalostrugar', 5),
(40, 'Stolar', 5),
(41, 'Staklorezac', 5),
(42, 'Grncar', 5),
(43, 'Kamenorezac', 5),
(44, 'Masin-bravar', 5),
(45, 'Kovac', 5),
(46, 'Povrsinska obrada', 5),
(47, 'Livac', 5),
(48, 'Uramljivac', 5),
(49, 'Metaloglodac', 5),
(50, 'Metaloostrac', 5),
(51, 'Pecatorezac', 5),
(52, 'Auto elektricar', 7),
(53, 'Auto limar', 7),
(54, 'Auto bravar', 7),
(55, 'Auto mehanicar', 7),
(56, 'Serviser autogas sistema', 7),
(57, 'Auto graficar', 7),
(58, 'Auto tapetar', 7),
(59, 'Auto perac', 7),
(60, 'Vulkanizer', 7),
(61, 'Slep sluzba', 7),
(62, 'Serviser trapa', 7),
(63, 'Auto stakla', 7),
(64, 'Auto plasticar', 7),
(65, 'Serviser auspuha', 7),
(66, 'Serviser motocikala', 7),
(67, 'Krojac', 6),
(68, 'Obucar', 6),
(69, 'Tasner', 6),
(70, 'Sajdzija - Casovnicar', 6),
(71, 'Zlatar', 6),
(72, 'Masinski vez', 6),
(73, 'Rucni vez', 6),
(74, 'Krznar', 6),
(75, 'Sesirdzija', 6),
(76, 'Serviser sivackih masina', 6),
(77, 'Vozac', 8),
(78, 'Transport selidbe', 8),
(79, 'Fizicki radnik', 8),
(80, 'Ikonopisac', 8),
(81, 'Serviser za bickile', 8),
(82, 'Ski serviser', 8),
(83, 'Serviser medicinske opreme', 8),
(84, 'Roletne i venecijaneri', 8);

-- --------------------------------------------------------

--
-- Table structure for table `vrsta_rada`
--

CREATE TABLE `vrsta_rada` (
  `vrsta_id` int(11) NOT NULL,
  `posao_id` int(11) DEFAULT NULL,
  `ime_posla` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `vrsta_rada`
--

INSERT INTO `vrsta_rada` (`vrsta_id`, `posao_id`, `ime_posla`) VALUES
(1, 1, 'Krecenje'),
(2, 2, 'Postavljanje gipsnih ploca'),
(3, 3, 'Postavljanje fasade'),
(4, 1, 'Gletovanje'),
(5, 1, 'Farbanje stolarije'),
(6, 1, 'Farbanje radijatora i cevi'),
(7, 1, 'Postavljanje zidnih lajsni'),
(8, 1, 'Spatulat'),
(9, 2, 'Pregradjivanje prostorija'),
(10, 2, 'Spustanje plafona'),
(11, 2, 'Pravljenje dekorativnih lukova'),
(12, 2, 'Izrada sankova'),
(13, 3, 'Postavljanje izolacije'),
(14, 3, 'Postavljanje mermernih fasada'),
(15, 3, 'Postavljanje kamenih fasada'),
(16, 3, 'Postavljanje fasadne cigle'),
(17, 3, 'Postavljanje dekorativnog kamena'),
(18, 3, 'Postavljanje fasadne mrezice'),
(19, 4, 'Zidanje u niskogradnji'),
(20, 4, 'Zidanje u visokogradnji'),
(21, 4, 'Zidanje kamina i pecenjara'),
(22, 4, 'Malterisanje'),
(23, 4, 'Zidanje i ciscenje kaljevih peci'),
(24, 5, 'Postavljanje parketa'),
(25, 5, 'Postavljanje laminata'),
(26, 5, 'Hoblovanje parketa'),
(27, 5, 'Postavljanje lajsni'),
(28, 5, 'Lakiranje parketa'),
(29, 5, 'Brodski pod'),
(30, 6, 'Postavljanje plocica'),
(31, 6, 'Skidanje plocica'),
(32, 7, 'Izrada oluka i okapnica'),
(33, 7, 'Izrada snegobrana'),
(34, 7, 'Izrada krovova'),
(35, 7, 'Izrada vetrobrana'),
(36, 7, 'Izrada odusaka'),
(37, 7, 'Letovanje'),
(38, 7, 'Izrada vetar lajsni'),
(39, 7, 'Izrada iksni i oksni'),
(40, 8, 'Elektrolucno varenje'),
(41, 8, 'Argonsko i CO2 varenje'),
(42, 8, 'Autogeno varenje'),
(43, 9, 'Izrada i ugradnja PVC stolarije'),
(44, 9, 'Izrada i ugradnja ALU stolarije'),
(45, 9, 'Izrada i ugradnja drvene stolarije'),
(46, 9, 'Izrada i ugradnja komarnika'),
(47, 9, 'Izrada i ugradnja roletni'),
(48, 9, 'Izrada i ugradnja zaluzina'),
(49, 9, 'Izrada i ugradnja venecijanera'),
(50, 9, 'Popravke na stolariji'),
(51, 10, 'Hidroizolacija'),
(52, 10, 'Termoizolacija'),
(53, 10, 'Drenaza'),
(54, 11, 'Izrada rogova'),
(55, 11, 'Salovanje temelja i stubova'),
(56, 11, 'Opsivanje krovova'),
(57, 11, 'Postavljanje crepa'),
(58, 11, 'Izrada i primena oplate'),
(59, 11, 'Izrada skela'),
(60, 11, 'Izrada krovnih konstrukcija od drveta'),
(61, 11, 'Priprema i obrada drvne gradje'),
(62, 11, 'Izrada potpornih konstrukcija'),
(63, 12, 'Izrada bazena'),
(64, 12, 'Izrada fontana'),
(65, 13, 'Ispomoc na gradilistu'),
(66, 14, 'Ravnajuci sloj / kosuljica'),
(67, 14, 'Industrijski pod'),
(68, 14, 'Sportske podloge'),
(69, 14, 'Vestacka trava'),
(70, 14, 'Behaton beton'),
(71, 14, 'Stampani podovi'),
(72, 14, 'Izrada trotoara'),
(73, 15, 'Dijamantsko busenje rupa'),
(74, 15, 'Secenje armature'),
(75, 15, 'Busenje greda'),
(76, 15, 'Busenje betona'),
(77, 15, 'Probijanje zidova'),
(78, 15, 'Secenje asfalta'),
(79, 15, 'Pneumatsko busenje'),
(80, 15, 'Rusenje'),
(81, 15, 'Busenje bunara'),
(82, 15, 'Kopanje septicke jame'),
(83, 15, 'Prokopavanje zemlje (krtica)'),
(84, 16, 'Spajanje armature'),
(85, 16, 'Izrada armature'),
(86, 16, 'Izlivanje betona'),
(87, 16, 'Armiranje betona'),
(88, 17, 'Izrada okova'),
(89, 17, 'Izrada gelendera'),
(90, 17, 'Izrada ograda'),
(91, 17, 'Izrada nosaca'),
(92, 17, 'Izrada nadstresnica'),
(93, 17, 'Izrada kapija'),
(94, 17, 'Montaza panela'),
(95, 17, 'Montaza krovnih pokrivaca'),
(96, 18, 'Postavljanje elektricnih instalacija'),
(97, 18, 'Detektovanje kvara na elektricnoj mrezi'),
(98, 18, 'Servis malih kucnih aparata'),
(99, 18, 'Servis bele tehnike'),
(100, 18, 'Postavljanje rasvete'),
(101, 18, 'Servis ves masina'),
(102, 18, 'Servis bojlera'),
(103, 18, 'Servis TA peci'),
(104, 18, 'Servis vodenih pumpi'),
(105, 19, 'Vikler elektromotora'),
(106, 20, 'Ugradnja liftova'),
(107, 20, 'Odrzavanje liftova'),
(108, 20, 'Ugradnja pokretnih stepenica'),
(109, 20, 'Odrzavanje pokretnih stepenica'),
(110, 21, 'Postavljanje klima uredjaja'),
(111, 21, 'Servis klima uredjaja'),
(112, 22, 'Popravljanje televizora'),
(113, 22, 'Popravljanje video i DVD uredjaja'),
(114, 22, 'Popravljanje audio uredjaja'),
(115, 22, 'Popravljanje projektora'),
(116, 22, 'Uvodjenje i servis interfona i video nadzora'),
(117, 22, 'Servis foto-aparata i kamkodera'),
(118, 22, 'Ugradnja i popravka satelitskih antena'),
(119, 22, 'Ugradnja i popravka protivprovalne zastite'),
(120, 22, 'Ugradnja i popravka alarmnih sistema'),
(121, 22, 'Popravljanje fiskalnih kasa'),
(122, 23, 'Popravljanje mobilnih telefona'),
(123, 23, 'Dekodiranje mobilnih telefona'),
(124, 23, 'Popravljanje navigacionih uredjaja'),
(125, 24, 'Servis desktop racunara'),
(126, 24, 'Instaliranje i reinstaliranje sistema'),
(127, 24, 'Instaliranje programa'),
(128, 24, 'Umrezavanje racunara'),
(129, 24, 'Servis laptop racunara'),
(130, 25, 'Kucna pomocnica'),
(131, 25, 'Ciscenje kuca i stanova'),
(132, 25, 'Ciscenje poslovnih prostora'),
(133, 26, 'Ciscenje podruma i tavana'),
(134, 26, 'Odnosenje suta'),
(135, 26, 'Ciscenje snega i leda'),
(136, 27, 'Pranje tepiha'),
(137, 27, 'Pranje podova'),
(138, 27, 'Poliranje podova'),
(139, 28, 'Ciscenje i odrzavanje odzaka'),
(140, 28, 'Ciscenje ventilacionih sistema'),
(141, 28, 'Ciscenje kotlovskih postrojenja'),
(142, 29, 'Odrzavanje cvetnih vrtova'),
(143, 29, 'Kosenje trave'),
(144, 29, 'Sejanje i presadjivanje'),
(145, 29, 'Orezivanje zive ograde'),
(146, 29, 'Orezivanje i kalemljenje vocki'),
(147, 30, 'Cepanje drva'),
(148, 30, 'Krecenje sume'),
(149, 30, 'Krcenje siprazja'),
(150, 31, 'Pranje prozora'),
(151, 31, 'Pranje fasada'),
(152, 31, 'Popravke na fasadi'),
(153, 31, 'Ciscenje oluka'),
(154, 31, 'Visinski radovi'),
(155, 32, 'Pranje fasada pod pritiskom'),
(156, 32, 'Skidanje grafita'),
(157, 32, 'Peskiranje fasada'),
(158, 33, 'Sitne popravke na kucnim aparatima'),
(159, 33, 'Zamena prekidaca, uticnica i utikaca'),
(160, 33, 'Zamena osiguraca'),
(161, 33, 'Zamena sijalicnih grla i lustera'),
(162, 33, 'Zamena grejaca u bojleru'),
(163, 33, 'Popravka vodokotlica'),
(164, 33, 'Zamena slavina, tuseva, sifona i ventila'),
(165, 33, 'Stelovanje sarki na vratima i prozorima'),
(166, 33, 'Popravka roletni i zaluzina'),
(167, 33, 'Zamena brava'),
(168, 33, 'Kacenje polica, slika, nosaca za tv'),
(169, 33, 'Punjenje i praznjenje sistema za grejanje'),
(170, 33, 'Sastavljanje i rastavljanje namestaja'),
(171, 34, 'Postavljanje vodovodne instalacije'),
(172, 34, 'Servis vodovodnih instalacija'),
(173, 34, 'Zamena slavina, baterija i tuseva'),
(174, 34, 'Odgusenje odvoda'),
(175, 34, 'Zamena bojlera'),
(176, 34, 'Detekcija curenja'),
(177, 35, 'Montiranje grejnih instalacija'),
(178, 35, 'Montiranje grejnih tela'),
(179, 35, 'Servis grejnih instalacija'),
(180, 36, 'Izrada i ugradnja ventilacionih sistema'),
(181, 36, 'Projektovanje ventilacionih sistema'),
(182, 36, 'Servisiranje ventilacionih sistema'),
(183, 37, 'Izrada kljuceva'),
(184, 37, 'Ugradnja brava'),
(185, 37, 'Ugradnja sigurnosnih brava'),
(186, 37, 'Obijanje brava bez ostecenja'),
(187, 38, 'Tapaciranje svih vrsta namestaja'),
(188, 38, 'Izrada i popravka cerada'),
(189, 39, 'Masinska obrada metala'),
(190, 39, 'Obrada osovina'),
(191, 40, 'Izrada namestaja po meri'),
(192, 40, 'Izrada kuhinja po meri'),
(193, 40, 'Izrada stilskog namestaja'),
(194, 40, 'Izrada kreveta po meri'),
(195, 40, 'Rezbarenje i duborez'),
(196, 40, 'Lakiranje namestaja'),
(197, 40, 'Restauracija namestaja'),
(198, 40, 'Trakslerske usluge'),
(199, 41, 'Secenje stakla po meri'),
(200, 41, 'Izrada ogledala po meri'),
(201, 41, 'Peskiranje stakla'),
(202, 42, 'Izrada posuda od gline'),
(203, 42, 'Izrada upotrebne keramike'),
(204, 42, 'Izrada ukrasne keramike'),
(205, 43, 'Izrada spomenika'),
(206, 43, 'Izrada nadgrobnih ploca'),
(207, 43, 'Obrada kamena'),
(208, 44, 'Odrzavanje masina i sklopova'),
(209, 44, 'Ugradnja masina i sklopova'),
(210, 45, 'Kovanje'),
(211, 45, 'Potkivanje'),
(212, 46, 'Peskiranje'),
(213, 46, 'Smirglanje'),
(214, 46, 'Niklovanje'),
(215, 46, 'Hromiranje'),
(216, 46, 'Plastificiranje'),
(217, 46, 'Matiranje'),
(218, 46, 'Bruniranje'),
(219, 46, 'Cinkovanje'),
(220, 46, 'Bakarisanje'),
(221, 46, 'Srebrenje'),
(222, 46, 'Pozlata'),
(223, 47, 'Livenje'),
(224, 47, 'Izrada kalupa za livenje'),
(225, 48, 'Izrada ramova za slike'),
(226, 48, 'Uramljivanje slika'),
(227, 48, 'Uramljivanje ogledala'),
(228, 49, 'Obrada zupcanika'),
(229, 49, 'Obrada zlebova'),
(230, 50, 'Ostrenje nozeva'),
(231, 50, 'Ostrenje alata'),
(232, 51, 'Izrada aluminijumskih natpisa'),
(233, 51, 'Izrada mesinganih natpisa'),
(234, 51, 'Izrada plasticnih natpisa'),
(235, 51, 'Izrada privezaka'),
(236, 51, 'Izrada pecata'),
(237, 51, 'Izrada Plaketa'),
(238, 67, 'Sivenje po meri'),
(239, 67, 'Sve vrste prepravki na tekstilu'),
(240, 68, 'Izrada obuce po meri'),
(241, 68, 'Sve vrste prepravki na obuci'),
(242, 68, 'Izrada anatomskih ulozaka'),
(243, 69, 'Izrada tasni i torbi'),
(244, 69, 'Prepravke na tasnama i torbama'),
(245, 70, 'Servis rucnih satova'),
(246, 70, 'Servis zidnih satova'),
(247, 70, 'Stelovanje narukvica'),
(248, 71, 'Izrada nakita po porudzbini'),
(249, 71, 'Sve vrste prepravki na nakitu'),
(250, 71, 'Graviranje'),
(251, 72, 'Vez na tekstilu'),
(252, 72, 'Izrada aplikacija, grbova i amblema'),
(253, 73, 'Heklanje'),
(254, 73, 'Tkanje'),
(255, 73, 'Izrada goblena'),
(256, 73, 'Pletenje'),
(257, 73, 'Vezenje'),
(258, 74, 'Izrada garderobe od krzna'),
(259, 74, 'Popravke krzna'),
(260, 75, 'Izrada sesira'),
(261, 75, 'Reperacija sesira'),
(262, 75, 'Izrada kacketa'),
(263, 75, 'Reparacija kacketa'),
(264, 52, 'Auto dijagnostika'),
(265, 52, 'Servis elektro instalacije'),
(266, 52, 'Ugradnja alarma i centralne brave'),
(267, 52, 'Ugradnja audio i video sistema'),
(268, 52, 'Ugradnja parking senzora'),
(269, 52, 'Auto elektronika'),
(270, 53, 'Ispravljanje limarije'),
(271, 53, 'Farmanje limarije'),
(272, 53, 'Prepravke na limariji'),
(273, 53, 'Ugradnja sibera'),
(274, 53, 'Poliranje limarije'),
(275, 54, 'Zamena auto brava'),
(276, 54, 'Narezivanje kljuceva'),
(277, 54, 'Kodiranje kljuceva'),
(278, 54, 'Otkljucavanje kola bez kljuca'),
(279, 55, 'Mehanicki radovi'),
(280, 55, 'Mali servis'),
(281, 55, 'Veliki servis'),
(282, 55, 'Masinska obrada motora'),
(283, 55, 'Masinska obrada kocionog sistema'),
(284, 55, 'Servis auto klime'),
(285, 55, 'Ciscenje dizni'),
(286, 55, 'Servis kamiona'),
(287, 55, 'Servis autobusa'),
(288, 55, 'Serviser poljoprivrednih masina'),
(289, 56, 'Ugradnja plinskih uredjaja'),
(290, 56, 'Servis plinskih uredjaja'),
(291, 57, 'Izrada i montaza auto folija'),
(292, 57, 'Zatamnjivanje stakala folijom'),
(293, 57, 'Brendiranje vozila'),
(294, 57, 'Stampa auto folija'),
(295, 58, 'Izrada presvlaka za sve tipove vozila'),
(296, 58, 'Tapaciranje sedista'),
(297, 58, 'Tapaciranje panela na vratima'),
(298, 58, 'Zamena neba u kabini'),
(299, 58, 'Restauracija koze'),
(300, 58, 'Presvlacenje volana'),
(301, 58, 'Presvlacenje rucice menjaca'),
(302, 59, 'Pranje putnickih automobila'),
(303, 59, 'Pranje autobusa i kamiona'),
(304, 59, 'Poliranje vozila'),
(305, 59, 'Dubinsko pranje unutrasnjosti'),
(306, 60, 'Servis svih vrsta pneumatika'),
(307, 60, 'Balansiranje guma'),
(308, 60, 'Ispravljanje felni'),
(309, 61, 'Prevoz putnickih vozila'),
(310, 61, 'Prevoz 2 i vise vozila'),
(311, 61, 'Prevoz kombi vozila'),
(312, 61, 'Slepovanje teretnih vozila'),
(313, 62, 'Centriranje trapa'),
(314, 63, 'Reparacija auto stakala'),
(315, 63, 'Zamena auto stakala'),
(316, 63, 'Zatamnjivanje auto stakala'),
(317, 64, 'Varenje branika i spojlera'),
(318, 65, 'Krpljenje auspuha'),
(319, 65, 'Izrada auspuha'),
(320, 66, 'Servis motocikala'),
(321, 77, 'B kategorija'),
(322, 77, 'C kategorija'),
(323, 77, 'D kategorija'),
(324, 77, 'E kategorija'),
(325, 77, 'Sopstveno vozilo'),
(326, 77, 'Prevoz putnika'),
(327, 77, 'Kurirske usluge'),
(328, 77, 'Inostrane ture'),
(329, 77, 'Prevoz robe'),
(330, 78, 'Transport selidbi sopstvenim vozilom'),
(331, 78, 'Utovar i istovar robe'),
(332, 79, 'Pomoc na gradjevini'),
(333, 79, 'Nosenje klavira'),
(334, 79, 'Pomoc pri selidbi'),
(335, 80, 'Izrada ikona po zelji'),
(336, 80, 'Restauracija ikona'),
(337, 81, 'Servisiranje bicikla'),
(338, 81, 'Servisiranje rolera'),
(339, 82, 'Servisiranje skija'),
(340, 82, 'Servisiranje bordova'),
(341, 82, 'Servisiranje pancerica'),
(342, 83, 'Servis medicinskih aparata'),
(343, 83, 'Servis stomatoloske opreme'),
(344, 84, 'Izrada roletni'),
(345, 84, 'Izrada venecijanera'),
(346, 84, 'Ugradnja roletni'),
(347, 84, 'Ugradnja venecijanera'),
(348, 84, 'Popravka roletni'),
(349, 84, 'Popravka venecijanera');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `delatnosti`
--
ALTER TABLE `delatnosti`
  ADD PRIMARY KEY (`id_delatnosti`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id_event`);

--
-- Indexes for table `firma`
--
ALTER TABLE `firma`
  ADD PRIMARY KEY (`id_firme`);

--
-- Indexes for table `fizicko_lice`
--
ALTER TABLE `fizicko_lice`
  ADD PRIMARY KEY (`id_fizicko`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`korisnik_id`);

--
-- Indexes for table `opstine`
--
ALTER TABLE `opstine`
  ADD PRIMARY KEY (`id_opstine`);

--
-- Indexes for table `poslovi`
--
ALTER TABLE `poslovi`
  ADD PRIMARY KEY (`posao_id`);

--
-- Indexes for table `vrsta_rada`
--
ALTER TABLE `vrsta_rada`
  ADD PRIMARY KEY (`vrsta_id`),
  ADD KEY `posao_id` (`posao_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `firma`
--
ALTER TABLE `firma`
  MODIFY `id_firme` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fizicko_lice`
--
ALTER TABLE `fizicko_lice`
  MODIFY `id_fizicko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `korisnik_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `vrsta_rada`
--
ALTER TABLE `vrsta_rada`
  MODIFY `vrsta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=350;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `vrsta_rada`
--
ALTER TABLE `vrsta_rada`
  ADD CONSTRAINT `vrsta_rada_ibfk_1` FOREIGN KEY (`posao_id`) REFERENCES `poslovi` (`posao_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
