SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `leaguex`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `lex_clubs`
--

CREATE TABLE IF NOT EXISTS `lex_clubs` (
  `club_id` int(11) NOT NULL,
  `club_name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `club_logo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'logo_default.png',
  `club_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `lex_managers`
--

CREATE TABLE IF NOT EXISTS `lex_managers` (
  `manager_id` int(11) NOT NULL,
  `manager_user_id` int(11) NOT NULL DEFAULT '0',
  `manager_club_id` int(11) NOT NULL DEFAULT '0',
  `manager_wallet` int(11) NOT NULL DEFAULT '0',
  `manager_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `lex_config`
--

CREATE TABLE IF NOT EXISTS `lex_config` (
  `language` tinyint(2) NOT NULL DEFAULT '0',
  `site_name` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'LEAGUEX',
  `site_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'LEAGUEX | La tua fanta master league',
  `smtp_email` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `smtp_name` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `smtp_host` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `smtp_port` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `smtp_user` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `smtp_pass` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo_size_maxw` smallint(6) NOT NULL DEFAULT '500',
  `logo_size_maxh` smallint(6) NOT NULL DEFAULT '500',
  `logo_size_minw` smallint(6) NOT NULL DEFAULT '250',
  `logo_size_minh` smallint(6) NOT NULL DEFAULT '250'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `lex_config`
--

INSERT INTO `lex_config` (`language`, `site_name`, `site_title`, `smtp_email`, `smtp_name`, `smtp_host`, `smtp_port`, `smtp_user`, `smtp_pass`, `logo_size_maxw`, `logo_size_maxh`, `logo_size_minw`, `logo_size_minh`) VALUES
(0, 'LEAGUEX', 'LEAGUEX | Your Fantasy Master League', '', '', '', '', '', '', '500', '500', '250', '250');

-- --------------------------------------------------------

--
-- Struttura della tabella `lex_last_activity`
--

CREATE TABLE IF NOT EXISTS `lex_last_activity` (
  `la_user_id` int(11) NOT NULL,
  `la_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `lex_last_activity`
--

INSERT INTO `lex_last_activity` (`la_user_id`, `la_time`) VALUES
(1, '2018-09-08 15:22:27');

-- --------------------------------------------------------

--
-- Struttura della tabella `lex_users`
--

CREATE TABLE IF NOT EXISTS `lex_users` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_permission` tinyint(2) NOT NULL DEFAULT '3',
  `user_birthday` date NOT NULL,
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
--
-- Dump dei dati per la tabella `lex_users`
--

INSERT INTO `lex_users` (`ID`, `user_name`, `user_email`, `user_password`, `user_permission`, `user_birthday`, `user_registered`) VALUES
(1, 'admin', 'admin@leaguex.com', '$2y$10$qOiycCsqSl7JUr.zVtj5g.kCiv9dsfKKed9wrtfe7WiYjXMGlJkpC', 1, '1980-04-10', '2018-09-08 15:22:27');


--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indici per le tabelle `lex_users`
--
ALTER TABLE `lex_users`
  ADD PRIMARY KEY (`ID`);

--
-- Indici per le tabelle `lex_clubs`
--
ALTER TABLE `lex_clubs`
  ADD PRIMARY KEY (`club_id`);

--
-- Indici per le tabelle `lex_managers`
--
ALTER TABLE `lex_managers`
  ADD PRIMARY KEY (`manager_id`);


--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `lex_users`
--
ALTER TABLE `lex_users`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;

