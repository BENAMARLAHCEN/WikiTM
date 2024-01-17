-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 17, 2024 at 09:17 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wiki`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(266) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) 

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `create_date`, `update_date`) VALUES
(1, 'Technology', NULL, '2024-01-08 21:19:47', '2024-01-08 21:19:47'),
(2, 'Sience', NULL, '2024-01-08 21:19:47', '2024-01-10 16:04:12'),
(3, 'History', NULL, '2024-01-08 21:19:47', '2024-01-08 21:19:47'),
(6, 'Musique', NULL, '2024-01-12 10:48:45', '2024-01-14 20:57:25');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) 

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `create_date`, `update_date`) VALUES
(1, 'Programming', '2024-01-09 10:08:23', '2024-01-09 10:08:23'),
(2, 'Biology', '2024-01-09 10:08:23', '2024-01-09 10:08:23'),
(6, 'php', '2024-01-14 19:29:32', '2024-01-14 19:29:32'),
(7, 'java', '2024-01-14 19:29:40', '2024-01-14 19:29:40'),
(15, 'css', '2024-01-17 08:02:59', '2024-01-17 08:02:59'),
(16, 'design', '2024-01-17 08:03:15', '2024-01-17 08:03:15'),
(17, 'javaScript', '2024-01-17 08:03:27', '2024-01-17 08:03:27'),
(18, 'bootstrap', '2024-01-17 08:03:38', '2024-01-17 08:03:38'),
(19, 'MVC', '2024-01-17 08:03:43', '2024-01-17 08:03:43');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `about` varchar(266) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('admin','author') DEFAULT 'author',
  `phone` varchar(50) DEFAULT NULL,
  `Country` varchar(50) DEFAULT NULL,
  `Job` varchar(50) DEFAULT NULL,
  `image` varchar(266) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'profile.svg'
) 

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `about`, `email`, `password`, `role`, `phone`, `Country`, `Job`, `image`) VALUES
(12, 'lahcen', NULL, 'jsjhjezkjd.ben3@gmail.com', '$2y$10$N2xTRqXjN4k.o6zS5aDHIO8Pe6L7auHRgxzv.FrBLOW8gytNVhvee', 'author', NULL, NULL, NULL, 'CAF-logo.svg'),
(16, 'admin', NULL, 'bahcen.ben3@gmail.com', '$2y$10$LCuhFRBm9W23iDYGalwHgOFUv0Y2VeRlZoJGYy1ru3h1F7kcWoOwW', 'author', NULL, NULL, NULL, 'plumber-making-phone-gesture.jpg'),
(17, 'lahcen ben amar', NULL, 'lahcen.ben3@gmail.com', '$2y$10$Alzyixi7jJHCqbddxlf0juXWlR9nvYNWhVuenp7eTkWw3w0GMCe9m', 'author', NULL, NULL, NULL, '7O2A0059.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `wiki`
--

CREATE TABLE `wiki` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `author_id` int DEFAULT NULL,
  `archived` tinyint(1) NOT NULL DEFAULT '1',
  `views` int NOT NULL DEFAULT '0',
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `category` int NOT NULL,
  `image` varchar(300) NOT NULL DEFAULT 'wiki.jpg'
) 

--
-- Dumping data for table `wiki`
--

INSERT INTO `wiki` (`id`, `title`, `content`, `author_id`, `archived`, `views`, `create_date`, `update_date`, `category`, `image`) VALUES
(23, 'The World’s Most Dangerous Technology Ever Made.', '<p>Commodo labore ut nisi laborum amet eu qui magna ullamco ut labore. Aliquip consectetur labore consectetur dolor exercitation est minim quis. Magna non irure qui ex est laborum nulla excepteur qui. Anim Lorem dolore cupidatat pariatur ex tempor. Duis ea excepteur proident ex commodo irure est.<br><br>Nisi commodo qui pariatur enim sint laborum consequat enim in officia. Officia fugiat incididunt commodo et mollit aliqua non aute. Enim dolor eiusmod aliqua amet ipsum in enim eiusmod. Quis exercitation sit velit duis.<br><br>Est Lorem labore consectetur minim sit eu eiusmod mollit velit. Consectetur voluptate ex amet id eiusmod laborum irure. Aliquip ad qui id exercitation irure amet commodo nisi quis. Occaecat minim incididunt eiusmod nostrud veniam quis culpa.<br>Nisi ipsum et consequat id deserunt excepteur. Cillum non pariatur culpa ut occaecat laboris eu. Ullamco ad Lorem et elit laboris eu qui irure nulla qui culpa et. Cupidatat sunt ipsum proident aute exercitation do tempor aliqua cupidatat quis non exercitation. Adipisicing do minim dolore nulla mollit. Adipisicing incididunt irure ipsum et in esse ipsum elit tempor.<br><br>Aliquip mollit sunt qui irure. Irure ullamco Lorem excepteur dolor qui ea ad quis. Enim fugiat cillum enim ad occaecat sint qui elit labore mollit sunt laborum fugiat consequat. Voluptate labore sunt duis eu deserunt. Occaecat do ut ut labore cillum enim dolore ad enim enim id. Aliquip do veniam ad excepteur ad cillum qui deserunt nostrud sunt aliqua duis sunt occaecat. Laborum incididunt commodo ullamco proident quis.</p>', 16, 0, 1, '2024-01-17 08:13:20', '2024-01-17 08:13:20', 6, 'Article.png');

-- --------------------------------------------------------

--
-- Table structure for table `wikitags`
--

CREATE TABLE `wikitags` (
  `wiki_id` int NOT NULL,
  `tag_id` int NOT NULL
)

--
-- Dumping data for table `wikitags`
--

INSERT INTO `wikitags` (`wiki_id`, `tag_id`) VALUES
(23, 16);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `wiki`
--
ALTER TABLE `wiki`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wikis_ibfk_1` (`author_id`),
  ADD KEY `categoryID` (`category`);

--
-- Indexes for table `wikitags`
--
ALTER TABLE `wikitags`
  ADD PRIMARY KEY (`wiki_id`,`tag_id`),
  ADD KEY `wikitags_ibfk_2` (`tag_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `wiki`
--
ALTER TABLE `wiki`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `wiki`
--
ALTER TABLE `wiki`
  ADD CONSTRAINT `wiki_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wiki_ibfk_2` FOREIGN KEY (`category`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wikitags`
--
ALTER TABLE `wikitags`
  ADD CONSTRAINT `wikitags_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wikitags_ibfk_3` FOREIGN KEY (`wiki_id`) REFERENCES `wiki` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
