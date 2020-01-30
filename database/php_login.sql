SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`user_id`, `username`, `password`) VALUES
(2, 'fabian', '$2y$12$Nji5vS4DlOOKZteoY03XUuYu5wizgD.39DbYst6rAoVqD5DnFTj1q'),
(3, 'robin', '$2y$12$4C7kP2ZCQG4xCvAAyXI3meHlXZRcAvMd.cnrmTDBycbHJTLWbQ3OS'),
(4, 'ashur', '$2y$12$F/2ZZ0V4hNxbvBF1MuZlduU5wYN.ZRnypEGrHuKDLdHHodIWQzQlG');

ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

