SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `product` (
  `Id` int(11) NOT NULL,
  `r_date` timestamp(6) NULL DEFAULT NULL,
  `tracking_number` varchar(255) DEFAULT NULL,
  `cbm` varchar(255) DEFAULT NULL,
  `weight` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `product` (`Id`, `r_date`, `tracking_number`, `cbm`, `weight`) VALUES
(1, '2026-04-20 00:59:31.000000', '2gfgggcchhhhhvbhhb2', '250', '50');

ALTER TABLE `product`
  ADD PRIMARY KEY (`Id`);
COMMIT