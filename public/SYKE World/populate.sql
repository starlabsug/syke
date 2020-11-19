-- Populate the db

-- Table Users
INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `phonenumber`, `photo`, `createdAt`)
VALUES ('1', 'Patricia', 'Giramia', 'giramiapatricia61@gmail.com', '0772971878', 'profile/fire.jpg', CURRENT_DATE());

-- Add column at top of tables
ALTER TABLE `users` ADD `userid` INT NOT NULL FIRST;
