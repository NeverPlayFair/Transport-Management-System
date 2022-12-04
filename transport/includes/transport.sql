-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 28 Lis 2022, 00:45
-- Wersja serwera: 10.4.14-MariaDB
-- Wersja PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `transport`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ceny`
--

CREATE TABLE `ceny` (
  `id_ceny` int(11) NOT NULL,
  `cena_przejazdu` float NOT NULL,
  `dodatkowa_oplata` float NOT NULL,
  `dodatkowe_miejsce` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `firma`
--

CREATE TABLE `firma` (
  `id_firmy` int(11) NOT NULL,
  `nazwa` varchar(100) NOT NULL,
  `adres` int(100) NOT NULL,
  `nr_telefonu` varchar(100) NOT NULL,
  `nr_NIP` float NOT NULL,
  `adres_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `grafik`
--

CREATE TABLE `grafik` (
  `id_grafik` int(11) NOT NULL,
  `data` varchar(100) NOT NULL,
  `poczatek_zmiany` varchar(100) NOT NULL,
  `koniec_zmiany` varchar(100) NOT NULL,
  `zmiany_godzinowe` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klienci`
--

CREATE TABLE `klienci` (
  `id_klienta` int(11) NOT NULL,
  `imie` varchar(100) NOT NULL,
  `nazwisko` varchar(100) NOT NULL,
  `adres_zamieszkania` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `marka`
--

CREATE TABLE `marka` (
  `id_marki` int(11) NOT NULL,
  `nazwy_autobusow` varchar(100) NOT NULL,
  `nazwy_samochodow` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `model`
--

CREATE TABLE `model` (
  `id_modelu` int(11) NOT NULL,
  `id_marki` int(100) NOT NULL,
  `model` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pojazd`
--

CREATE TABLE `pojazd` (
  `id_pojazdu` int(11) NOT NULL,
  `kolor` varchar(100) NOT NULL,
  `cena` float NOT NULL,
  `pochodzenie` varchar(100) NOT NULL,
  `stan_techniczny` varchar(100) NOT NULL,
  `kraj_pochodzenia` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `polaczenia`
--

CREATE TABLE `polaczenia` (
  `id` int(11) NOT NULL,
  `poczatek` varchar(100) NOT NULL,
  `koniec` varchar(100) NOT NULL,
  `godzina` time(6) NOT NULL,
  `srodek_transportu` varchar(100) NOT NULL,
  `czas` time(6) NOT NULL,
  `cena` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `polaczenia`
--

INSERT INTO `polaczenia` (`id`, `poczatek`, `koniec`, `godzina`, `srodek_transportu`, `czas`, `cena`) VALUES
(10, 'Rypin', 'Balin', '12:30:00.000000', 'Autobus', '00:30:00.000000', 12.99),
(11, 'Jasin', 'Borzymin', '14:25:00.000000', 'Autobus', '00:28:00.000000', 15.99),
(12, 'Kowalki', 'Cetki', '10:45:00.000000', 'Autobus', '00:45:00.000000', 20.25),
(13, 'Kwiatkowo', 'Czyżewo', '14:50:00.000000', 'Autokar', '00:25:00.000000', 45.55),
(14, ' Linne', 'Dębiany', '12:25:00.000000', 'Autobus', '00:30:00.000000', 60.1),
(15, 'Marianki', 'Dylewo', '06:10:00.000000', 'Autobus', '00:35:00.000000', 35.22),
(16, 'Podole', 'Głowińsk', '15:15:00.000000', 'Autobus', '00:15:00.000000', 10.33),
(17, 'Puszcza Rządowa', 'Godziszewy', '00:15:00.000000', 'Autobus', '00:20:00.000000', 17.55),
(18, 'Rusinowo', 'Sadłowo', '18:40:00.000000', 'Autobus', '00:10:25.000000', 10.99),
(19, 'Sikory', 'Stępowo', '00:20:00.000000', 'Autobus', '00:42:00.000000', 15.99);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zaloguj`
--

CREATE TABLE `zaloguj` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(100) NOT NULL,
  `haslo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `zaloguj`
--

INSERT INTO `zaloguj` (`id`, `nazwa`, `haslo`) VALUES
(0, 'Admin', 'bartek');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `firma`
--
ALTER TABLE `firma`
  ADD PRIMARY KEY (`id_firmy`);

--
-- Indeksy dla tabeli `grafik`
--
ALTER TABLE `grafik`
  ADD PRIMARY KEY (`id_grafik`);

--
-- Indeksy dla tabeli `klienci`
--
ALTER TABLE `klienci`
  ADD PRIMARY KEY (`id_klienta`);

--
-- Indeksy dla tabeli `marka`
--
ALTER TABLE `marka`
  ADD PRIMARY KEY (`id_marki`);

--
-- Indeksy dla tabeli `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`id_modelu`);

--
-- Indeksy dla tabeli `pojazd`
--
ALTER TABLE `pojazd`
  ADD PRIMARY KEY (`id_pojazdu`);

--
-- Indeksy dla tabeli `polaczenia`
--
ALTER TABLE `polaczenia`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `firma`
--
ALTER TABLE `firma`
  MODIFY `id_firmy` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `grafik`
--
ALTER TABLE `grafik`
  MODIFY `id_grafik` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `klienci`
--
ALTER TABLE `klienci`
  MODIFY `id_klienta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `marka`
--
ALTER TABLE `marka`
  MODIFY `id_marki` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `model`
--
ALTER TABLE `model`
  MODIFY `id_modelu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `pojazd`
--
ALTER TABLE `pojazd`
  MODIFY `id_pojazdu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `polaczenia`
--
ALTER TABLE `polaczenia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
