-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Dic 11, 2022 alle 16:51
-- Versione del server: 10.4.24-MariaDB
-- Versione PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sneakheadz`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `carrello`
--

CREATE TABLE `carrello` (
  `idCarrello` int(11) NOT NULL,
  `idUtente` int(11) NOT NULL,
  `idProdotto` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `prezzoTot` double NOT NULL,
  `quantita` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `prodotti`
--

CREATE TABLE `prodotti` (
  `idProdotto` int(11) NOT NULL,
  `modello` varchar(255) NOT NULL,
  `marca` varchar(255) NOT NULL,
  `prezzo` double NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `prodotti`
--

INSERT INTO `prodotti` (`idProdotto`, `modello`, `marca`, `prezzo`, `img`) VALUES
(1, 'Air Force 1', 'Nike', 109.99, 'AF1.jpg'),
(2, 'Classic Clog', 'Crocs', 29.99, 'crocs.jpg'),
(3, 'Jordan 4 Red', 'Nike Air Jordan', 199.99, 'j4Red.jpg'),
(4, 'Jordan 1 High x Travis Scott', 'Nike Air Jordan', 1299.99, 'jordanOneTravis.jpg'),
(5, 'Dunk Initial D', 'Nike', 399.99, 'dunkinitialD.jpg\r\n'),
(6, 'Panda', 'Nike', 215, 'panda.jpg');

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `nome` varchar(255) NOT NULL,
  `cognome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `idUtente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`nome`, `cognome`, `email`, `password`, `idUtente`) VALUES
('Admin', 'Admin', 'ad@ad.com', 'admin', 1),
('Matteo', 'Ferro', 'matteo@gmail.com', 'ferro', 2),
('aaaa', 'bbbb', 'a@b.com', 'abba', 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `vendite`
--

CREATE TABLE `vendite` (
  `idVendita` int(11) NOT NULL,
  `idUtente` int(11) NOT NULL,
  `totale` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `vendite`
--

INSERT INTO `vendite` (`idVendita`, `idUtente`, `totale`) VALUES
(39, 2, 109.99);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `carrello`
--
ALTER TABLE `carrello`
  ADD PRIMARY KEY (`idCarrello`),
  ADD KEY `usr` (`idUtente`),
  ADD KEY `prd` (`idProdotto`);

--
-- Indici per le tabelle `prodotti`
--
ALTER TABLE `prodotti`
  ADD PRIMARY KEY (`idProdotto`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`idUtente`);

--
-- Indici per le tabelle `vendite`
--
ALTER TABLE `vendite`
  ADD PRIMARY KEY (`idVendita`),
  ADD UNIQUE KEY `idUtente` (`idUtente`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `carrello`
--
ALTER TABLE `carrello`
  MODIFY `idCarrello` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT per la tabella `prodotti`
--
ALTER TABLE `prodotti`
  MODIFY `idProdotto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `idUtente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `vendite`
--
ALTER TABLE `vendite`
  MODIFY `idVendita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `carrello`
--
ALTER TABLE `carrello`
  ADD CONSTRAINT `prd` FOREIGN KEY (`idProdotto`) REFERENCES `prodotti` (`idProdotto`),
  ADD CONSTRAINT `usr` FOREIGN KEY (`idUtente`) REFERENCES `utenti` (`idUtente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
