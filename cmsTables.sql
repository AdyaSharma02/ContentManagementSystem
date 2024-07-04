-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2023 at 04:07 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `Username` varchar(255) NOT NULL,
  `FeedbackText` text NOT NULL,
  `FeedbackDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`Username`, `FeedbackText`, `FeedbackDate`) VALUES
('Adya', 'Outstanding service with exceptional support. The product is top-notch, highly recommended!', '2023-10-15'),
('Arya', 'This product has been a game-changer for me. It is incredibly versatile and has made a significant difference in my daily life. I can not express how useful it has been. The customer support is excellent, always responsive and ready to help. I found the product very useful.', '2023-08-20'),
('Alok', 'I cannot praise the support team enough. They were patient, knowledgeable, and solved my issues in no time. The product itself is a true masterpiece. It exceeded my expectations in every way. The support team was fantastic.', '2023-06-25'),
('Brajesh Kumar', 'While this service is generally good, there are a few areas that could use some improvements. The user interface could be more intuitive, and additional features would be welcome. Nonetheless, I appreciate the efforts put into this service. Could use some improvements.', '2023-04-30'),
('Ram', 'I have been using this service for a while, and it has been quite reliable. The support team has been helpful whenever I had questions. The product meets my needs, but there is always room for improvement.', '2023-02-01'),
('Khyati', 'The service has been a great addition to my workflow. It is user-friendly and efficient. The support team has been responsive and guided me through any issues I encountered. I am quite satisfied with the service.', '2023-01-01'),
('Swati', 'I wanted to take a moment to express my sincere appreciation and amazement at the incredible value your Content Management System (CMS) has brought to our organization. I have been using CMS platforms for several years, but your system stands out as truly exceptional.', '2023-11-01'),
('Ashish ', 'I love how intuitive the interface is. It\'s so easy to navigate and create content without any hassle.', '2023-11-02');

-- --------------------------------------------------------

--
-- Table structure for table `login_logout`
--

CREATE TABLE `login_logout` (
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_logout`
--

INSERT INTO `login_logout` (`Username`, `Password`) VALUES
('Adya', 'adya1526'),
('Arya', 'arya456'),
('Alok', 'alok789'),
('Brajesh', 'brj1526'),
('Ram', 'ram1221'),
('Khyati', 'khyati1009'),
('Swati', 'swati2401'),
('Ashish ', 'ashish14');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `ID` varchar(20) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Category` varchar(100) NOT NULL,
  `Date` date NOT NULL,
  `content` varchar(5000) DEFAULT NULL,
  `Status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`ID`, `Username`, `Email`, `Category`, `Date`, `content`, `Status`) VALUES
('1', 'Adya', 'adya@example.com', 'Web Development', '2023-09-20', 'Web development involves creating, designing, and maintaining websites. It\'s divided into front-end development (visual elements and user experience using HTML, CSS, and JavaScript) and back-end development (server-side operations using languages like Python, Ruby, PHP, etc., along with database management). Collaboration between front-end and back-end developers is common, and full-stack developers are proficient in both. Frameworks and libraries (e.g., React, Django) help streamline the development process. Web development is essential for businesses\' online presence in the increasingly digital world.', 'Posted'),
('2', 'Arya', 'arya@example.com', 'Software Development', '2023-08-01', 'Software Engineering (SE) is the field focused on designing, developing, and maintaining software applications, integrating technologies from computer science and project management. It encompasses diverse applications like office suites, video games, and the web. System software, such as operating systems and embedded systems, is also part of SE. SE technologies and practices aim to improve user productivity and quality of life, contributing to advancements in various activities.', 'Posted'),
('3', 'Alok', 'alok@example.com', 'Android Development', '2023-11-11', 'Android development is a pivotal field in the tech landscape, driven by the ubiquitous Android Operating System (OS). As the OS of choice for a range of devices, from smartphones to smartwatches, Android has cultivated a robust ecosystem. Android Studio, the official integrated development environment (IDE), empowers developers with features like intelligent code completion and a versatile emulator.\r\n\r\nJava and Kotlin serve as the primary programming languages for Android development. Kotlin, with its concise syntax, is gaining popularity. XML is employed for UI design, and Gradle manages dependencies. The adaptability to diverse screen sizes is a distinctive aspect, requiring developers to prioritize responsive design.\r\n\r\nDespite its strengths, Android development faces challenges like fragmentation, stemming from diverse devices and OS versions. Security is another concern, demanding robust measures to safeguard user data.\r\n\r\nLooking ahead, AI and ML integration in Android apps is on the rise, promising more personalized experiences. The advent of 5G technology opens new avenues for high-performance applications, particularly in AR and VR.\r\n\r\nIn summary, Android development is integral to modern technology, offering a dynamic platform for diverse applications. Challenges like fragmentation and security persist, but the future holds promise with advancements in AI, ML, and 5G technology, shaping the next wave of mobile experiences.', 'Posted'),
('6', 'Swati', 'swati@hij.com', 'Dev cpp', '2023-11-11', 'Dev C++ is a widely-used integrated development environment (IDE) catering to C and C++ programming. Developed by Bloodshed Software, this IDE is renowned for its simplicity and accessibility, making it an attractive choice for both novice and experienced developers.\r\n\r\nThe user-friendly interface of Dev C++ features a range of tools, including syntax highlighting, code completion, and automatic indentation, facilitating a smooth coding experience. It supports various project types, from console applications to graphical user interface (GUI) applications and dynamic-link libraries (DLLs), providing versatility for developers across different domains.\r\n\r\nAn integral aspect of Dev C++ is its integration with the MinGW compiler. MinGW, standing for \"Minimalist GNU for Windows,\" simplifies the compilation and execution processes. This amalgamation allows developers to focus on coding rather than configuring external tools.\r\n\r\nDespite its widespread use, Dev C++ has some limitations, lacking the extensive features found in more modern IDEs. Its development pace has slowed over time, prompting some developers to opt for IDEs with more advanced functionalities and active community support.\r\n\r\nIn summary, Dev C++ remains a popular choice for C and C++ development, known for its simplicity, versatility, and seamless integration with the MinGW compiler. While it may not boast the features of more contemporary IDEs, its user-friendly nature makes it a valuable tool for a range of developers.', 'Posted');

-- --------------------------------------------------------

--
-- Table structure for table `user_list`
--

CREATE TABLE `user_list` (
  `ID` varchar(100) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `FullName` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `PhoneNumber` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_list`
--

INSERT INTO `user_list` (`ID`, `Username`, `Email`, `FullName`, `Address`, `PhoneNumber`) VALUES
('1', 'Adya', 'adya@example.com', 'Adya Sharma', '123 Main Street', 1234567890),
('2', 'Arya', 'arya@example.com', 'Arya Singh', '456 Elm Avenue', 2147483647),
('3', 'Alok', 'alok@example.com', 'Alok Verma', '789 Oak Boulevard', 2147483647),
('4', 'Brajesh Kumar', 'brajesh@example.com', 'Brajesh Kumar', '125 Church Street', 2147483647),
('5', 'Ram', 'ram@xyz.com', 'Ram Sharma', '259 Sea Face', 987654321),
('6', 'Khyati', 'khyati@abc.com', 'Khyati Singh', 'Via Medina 50', 1243657850),
('7', 'Swati', 'swati@hij.com', 'Swati Agrawal', 'Via Agostino Depretis 21', 2147483647),
('8', 'Ashish ', 'ashish@ijk.com', 'Ashish Tomar', 'Kingston, New York', 2147483647);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
