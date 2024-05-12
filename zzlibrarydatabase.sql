-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2024 at 04:24 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zzlibrarydatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `author_id` int(11) NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `about` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`author_id`, `author_name`, `dob`, `about`) VALUES
(1, 'Kazu Kibuishi', '1984-04-08', 'Kazuhiro \"Kazu\" Kibuishi (born April 8, 1978) is a Japanese-born American graphic novel author and illustrator. He is best known for being the creator and editor of the comic anthology Flight and for creating the webcomic Copper. He is also the author and illustrator of the Amulet series.'),
(2, 'John Grisham', '1955-02-08', 'John Ray Grisham Jr. (born February 8, 1955) is an American novelist, lawyer, and former member of the Mississippi House of Representatives, known for his best-selling legal thrillers. According to the American Academy of Achievement, Grisham has written 37 consecutive number-one fiction bestsellers, and his books have sold 300 million copies worldwide. Along with Tom Clancy and J. K. Rowling, Grisham is one of only three anglophone authors to have sold two million copies on the first printing.'),
(3, 'Melody Beattie', '1948-05-02', 'Born Melody Vaillancourt in Minneapolis, Beattie graduated from high school with honors. She began drinking at age 12, was an alcoholic by age 13, and a drug addict by 18.\r\n\r\nBeattie published 18 books including Codependent No More, Beyond Codependency, The Language of Letting Go and Make Miracles in Forty Days: Turning What You Have into What You Want, published in 2010. Several of her books have been published in other languages.'),
(4, 'Joshua Foer', '1982-09-23', 'Joshua Foer (born September 23, 1982) is a freelance journalist and author living in Brookline, Massachusetts, with a primary focus on science. He was the 2006 USA Memory Champion, which was described in his 2011 book, Moonwalking with Einstein: The Art and Science of Remembering Everything. He spoke at the TED conference in February 2012.\r\n\r\n'),
(5, 'Louise Jensen', '1948-05-02', 'The Danish author Louis Jensen (19 July 1943 – 4 March 2021) was an innovator in the international literary trends of flash fiction, metafiction, prose poetry, and magical realism.While he published more than 90 books for both adults and children, he was best known for his children\'s books, which include picture books, short stories, flash fiction, creative nonfiction and novels. His work is characterized by wordplay and playful experiments in form and structure, which have led critics to draw comparisons to Borges, Calvino, Gogol, and the poetry of the Oulipo movement.'),
(6, 'Laurie Frankel', '1973-04-25', 'Laurie Frankel is an American novelist, essayist, and public speaker. She has written several novels including This is How it Always Is, which received generally positive reviews, despite criticism of its depiction of a child\'s gender transition. Frankel is an advocate for transgender rights.');

-- --------------------------------------------------------

--
-- Table structure for table `bookauthors`
--

CREATE TABLE `bookauthors` (
  `book_id` int(11) DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookauthors`
--

INSERT INTO `bookauthors` (`book_id`, `author_id`) VALUES
(NULL, NULL),
(1, 1),
(NULL, NULL),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6);

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author_id` int(11) DEFAULT NULL,
  `genre` varchar(100) DEFAULT NULL,
  `publication_year` int(11) DEFAULT NULL,
  `book_language` char(1) DEFAULT NULL,
  `edition` varchar(30) DEFAULT NULL,
  `isbn` varchar(20) DEFAULT NULL,
  `publisher` varchar(50) DEFAULT NULL,
  `summary` text DEFAULT NULL,
  `cover_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `title`, `author_id`, `genre`, `publication_year`, `book_language`, `edition`, `isbn`, `publisher`, `summary`, `cover_image`) VALUES
(1, 'Amulet', 1, 'Action & Adventure', 2010, 'E', '#3', '9780545208857', 'Graphix', 'Kazu Kibuishi\'s enchanting series about two ordinary children on a life-or-death mission continues!\r\nIn the third installment of the thrilling Amulet series, Emily, Navin, and their crew of resistance fighters charter an airship and set off in search of the lost city of Cielis, which is believed to be located on an island high above the clouds. The mysterious Leon Redbeard is their guide, and there\'s a surprising new addition to the crew: the Elf King\'s son, Trellis. But is he ally or enemy? And will Emily ever be able to trust the voice of the Amulet?', 'images/amulet.png\r\n'),
(2, 'The Judge\'s List', 2, 'Legal Thriller', 2022, '‎', '#1', '0593157834', 'Vintage', 'In The Whistler, Lacy Stoltz investigated a corrupt judge who was taking millions in bribes from a crime syndicate. She put the criminals away, but only after being attacked and nearly killed. Three years later, and approaching forty, she is tired of her work for the Florida Board on Judicial Conduct and ready for a change.\r\n', 'images/judge.png\r\n'),
(3, 'Journey To The Heart', 3, 'Religious Poetry', 1996, 'E', '#1', '0062511211', 'HarperSanFrancisco', 'Journey to the Heart by New York Times bestselling author of Codependent No More, Beyond Codependency, and Lessons of Love, contains 365 insightful daily meditations that inspire readers to unlock their personal creativity and discover their divine purposes in life.', 'images/journey.png\r\n'),
(4, 'Moonwalking With Einstein', 4, 'Cognitive Psychology', 2012, 'E', 'Reprint Edition', '0143120530', 'Penguin Books', 'An instant bestseller that is poised to become a classic, Moonwalking with Einstein recounts Joshua Foer\'s yearlong quest to improve his memory under the tutelage of top \"mental athletes.\" He draws on cutting-edge research, a surprising cultural history of remembering, and venerable tricks of the mentalist\'s trade to transform our understanding of human memory. From the United States Memory Championship to deep within the author\'s own mind, this is an electrifying work of journalism that reminds us that, in every way that matters, we are the sum of our memories.\r\n', 'images/MoonwalkingWithEinstein.png\r\n'),
(5, 'The Fall', 5, 'Psychological Thriller', 2023, 'E', 'Latest Edition', '0008508518', 'HQ', 'At her surprise 40th birthday party, Kate Granger feels like the luckiest woman in the world but just hours later her fifteen-year-old daughter, Caily, is found unconscious underneath a bridge when she should have been at school.\r\n\r\nNow, Caily lies comatose in her hospital bed, and the police don’t believe it was an accident. As the investigation progresses, it soon becomes clear that not everyone in the family was where they claimed to be at the time of her fall.\r\n\r\nCaily should be safe in hospital but not everyone wants her to wake up. Someone is desperate to protect the truth and it isn’t just Caily’s life that is in danger.\r\n\r\nBecause some secrets are worth killing for…', 'images/TheFall.png\r\n'),
(6, 'This Is How It Always Is', 6, 'Transgender Fiction', 2018, 'E', 'Reprint Edition', '1250088569', 'Flatiron Books', 'Laurie Frankel\'s This Is How It Always Is is a novel about revelations, transformations, fairy tales, and family. And it’s about the ways this is how it always is: Change is always hard and miraculous and hard again, parenting is always a leap into the unknown with crossed fingers and full hearts, children grow but not always according to plan. And families with secrets don’t get to keep them forever.', 'images/ThisIsHowItAlwaysIs.png\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `currentlyreading`
--

CREATE TABLE `currentlyreading` (
  `user_id` int(11) NOT NULL,
  `book_id` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `currentlyreading`
--

INSERT INTO `currentlyreading` (`user_id`, `book_id`, `start_date`) VALUES
(1, 1, '2024-03-01');

-- --------------------------------------------------------

--
-- Table structure for table `mybooks`
--

CREATE TABLE `mybooks` (
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `readbooks`
--

CREATE TABLE `readbooks` (
  `user_id` int(11) NOT NULL,
  `book_id` int(11) DEFAULT NULL,
  `date_completed` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `readbooks`
--

INSERT INTO `readbooks` (`user_id`, `book_id`, `date_completed`) VALUES
(1, 2, '2024-04-04 01:05:55');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userbooks`
--

CREATE TABLE `userbooks` (
  `user_id` int(11) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userbooks`
--

INSERT INTO `userbooks` (`user_id`, `book_id`, `date_added`) VALUES
(1, 1, '2024-04-04 01:21:19'),
(1, 2, '2024-04-04 01:21:19'),
(1, 3, '2024-04-04 01:21:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fullname`, `email`, `password`, `phone_number`) VALUES
(1, 'Himanshu Sharma', 'sharma.him1110@gmail.com', 'Books.123', '6134627257');

-- --------------------------------------------------------

--
-- Table structure for table `wanttoread`
--

CREATE TABLE `wanttoread` (
  `user_id` int(11) NOT NULL,
  `book_id` int(11) DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wanttoread`
--

INSERT INTO `wanttoread` (`user_id`, `book_id`, `date_added`) VALUES
(1, 3, '2024-04-04 01:06:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `bookauthors`
--
ALTER TABLE `bookauthors`
  ADD KEY `book_id` (`book_id`),
  ADD KEY `author_id` (`author_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `author_id` (`author_id`);

--
-- Indexes for table `currentlyreading`
--
ALTER TABLE `currentlyreading`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `mybooks`
--
ALTER TABLE `mybooks`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `readbooks`
--
ALTER TABLE `readbooks`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `userbooks`
--
ALTER TABLE `userbooks`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `wanttoread`
--
ALTER TABLE `wanttoread`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id` (`book_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookauthors`
--
ALTER TABLE `bookauthors`
  ADD CONSTRAINT `bookauthors_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`),
  ADD CONSTRAINT `bookauthors_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `authors` (`author_id`);

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `authors` (`author_id`);

--
-- Constraints for table `currentlyreading`
--
ALTER TABLE `currentlyreading`
  ADD CONSTRAINT `currentlyreading_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `currentlyreading_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`);

--
-- Constraints for table `mybooks`
--
ALTER TABLE `mybooks`
  ADD CONSTRAINT `mybooks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `mybooks_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`);

--
-- Constraints for table `readbooks`
--
ALTER TABLE `readbooks`
  ADD CONSTRAINT `readbooks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `readbooks_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`);

--
-- Constraints for table `userbooks`
--
ALTER TABLE `userbooks`
  ADD CONSTRAINT `userbooks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `userbooks_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`);

--
-- Constraints for table `wanttoread`
--
ALTER TABLE `wanttoread`
  ADD CONSTRAINT `wanttoread_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `wanttoread_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
