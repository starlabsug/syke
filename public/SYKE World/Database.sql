-- SYKE World database

-- --------------------------------------------
-- Table structures
-- --------------------------------------------
-- Table User
CREATE TABLE `Users`
(
  `userid` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phonenumber` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `createdAt`datetime DEFAULT CURRENT_TIMESTAMP,
  `id` varchar(255) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------
-- Table Bookings
CREATE TABLE `Booking`
(
  `id` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phonenumber` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `room` varchar(255) NOT NULL,
  `Rid` varchar(255) NOT NULL,
  `amount` int(30) NOT NULL,
  `services` varchar(255) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------
-- Table Newsletters
CREATE TABLE `newsletters`
(
  `id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------
-- Table omments
CREATE TABLE `Comments`
(
  `email` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------
