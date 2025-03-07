-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: dec. 31, 2024 la 01:59 PM
-- Versiune server: 10.4.32-MariaDB
-- Versiune PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `proiect_baza_de_date`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `applications`
--

CREATE TABLE `applications` (
  `applicationID` int(5) NOT NULL,
  `userID` int(5) DEFAULT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `bio` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Eliminarea datelor din tabel `applications`
--

INSERT INTO `applications` (`applicationID`, `userID`, `fullName`, `email`, `subject`, `bio`) VALUES
(6, 103, 'Will Johnson', 'will.johnson@gmail.com', '2', 'I am passionate about data analisis and data handling');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `assessments`
--

CREATE TABLE `assessments` (
  `assessmentID` int(5) NOT NULL,
  `lessonID` int(5) DEFAULT NULL,
  `assessmentType` varchar(255) DEFAULT NULL,
  `maxScore` int(5) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `assessmentURL` varchar(255) DEFAULT NULL,
  `assignment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Eliminarea datelor din tabel `assessments`
--

INSERT INTO `assessments` (`assessmentID`, `lessonID`, `assessmentType`, `maxScore`, `title`, `description`, `assessmentURL`, `assignment`) VALUES
(1, 1, 'Quiz', 100, NULL, NULL, NULL, NULL),
(2, 1, 'Final Exam', 200, NULL, NULL, NULL, NULL),
(3, 3, 'Project', 150, NULL, NULL, NULL, NULL),
(4, 4, 'Assignment', 50, 'Basics Homework', 'Add 3 buttons on the page that links to some websites.\r\nAdd 2 link on the page and set them a path URL.\r\nCreate some horizontal lines.\r\nPlay with the <h> and <p> tags.', 'files/index.html', NULL),
(5, 5, 'Midterm Exam', 100, NULL, NULL, NULL, NULL),
(11, 4, 'Assignment', 100, 'Basics Homework 2', 'Play with <div>, <header>, <footer>, <section>, <article> tags', 'files/index.html', '');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `categories`
--

CREATE TABLE `categories` (
  `categoryID` int(5) NOT NULL,
  `categoryName` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Eliminarea datelor din tabel `categories`
--

INSERT INTO `categories` (`categoryID`, `categoryName`, `description`) VALUES
(1, 'Programming', 'Courses related to programming and coding'),
(2, 'Data Science', 'Courses on data analysis and machine learning'),
(3, 'Web Development', 'Learn to build websites and applications'),
(4, 'Creative Writing', 'Courses on storytelling and writing'),
(5, 'Photography', 'Learn techniques for better photography');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `certificates`
--

CREATE TABLE `certificates` (
  `certificateID` int(5) NOT NULL,
  `userID` int(5) DEFAULT NULL,
  `courseID` int(5) DEFAULT NULL,
  `issueDate` date NOT NULL DEFAULT current_timestamp(),
  `certificateURL` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Eliminarea datelor din tabel `certificates`
--

INSERT INTO `certificates` (`certificateID`, `userID`, `courseID`, `issueDate`, `certificateURL`) VALUES
(1, 1, 1, '2024-03-20', 'https://example.com/certificates/1'),
(2, 3, 2, '2024-05-05', 'https://example.com/certificates/2'),
(3, 5, 3, '2024-06-15', 'https://example.com/certificates/3'),
(4, 1, 4, '2024-04-10', 'https://example.com/certificates/4'),
(5, 3, 5, '2024-04-30', 'https://example.com/certificates/5');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `courses`
--

CREATE TABLE `courses` (
  `courseID` int(5) NOT NULL,
  `userID` int(5) DEFAULT NULL,
  `courseName` varchar(255) DEFAULT NULL,
  `pedagogyID` int(5) DEFAULT NULL,
  `instructorID` int(5) DEFAULT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Eliminarea datelor din tabel `courses`
--

INSERT INTO `courses` (`courseID`, `userID`, `courseName`, `pedagogyID`, `instructorID`, `fullName`, `subject`, `level`, `duration`) VALUES
(19, 21, 'Web Development 101', 3, 1, 'Dr. Emma Clark', 'Web Development', 'Beginner', '10 weeks'),
(20, 21, 'Introduction to programing', 1, 4, 'Mr. Ethan Davis', 'Computer Science', 'Beginner', '8 weeks'),
(21, 1, 'Web Development 101', 3, 1, 'Dr. Emma Clark', 'Web Development', 'Beginner', '10 weeks'),
(22, 21, 'Data Science Bootcamp', 2, 2, 'Prof. Liam Johnson', 'Data Science', 'Intermediate', '12 weeks'),
(23, 99, 'Web Development 101', 3, 1, 'Dr. Emma Clark', 'Web Development', 'Beginner', '10 weeks'),
(24, 21, 'Web Development 101', 3, 9, 'Gabriel', 'Web Development', 'Beginner', '10 weeks'),
(25, 21, 'Creative Writting', 4, 6, 'Jane Smith', 'Arts and Literature', 'Intermediate', '8 weeks'),
(26, 5, 'Data Science Bootcamp', 2, 2, 'Prof. Liam Johnson', 'Data Science', 'Intermediate', '12 weeks'),
(27, 103, 'Data Science Bootcamp', 2, 2, 'Prof. Liam Johnson', 'Data Science', 'Intermediate', '12 weeks');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `course_categories`
--

CREATE TABLE `course_categories` (
  `courseCategoryID` int(5) NOT NULL,
  `courseID` int(5) DEFAULT NULL,
  `categoryID` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Eliminarea datelor din tabel `course_categories`
--

INSERT INTO `course_categories` (`courseCategoryID`, `courseID`, `categoryID`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4),
(5, 5, 5);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `course_pedagogies`
--

CREATE TABLE `course_pedagogies` (
  `coursePedagogyID` int(5) NOT NULL,
  `courseID` int(5) DEFAULT NULL,
  `pedagogyID` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Eliminarea datelor din tabel `course_pedagogies`
--

INSERT INTO `course_pedagogies` (`coursePedagogyID`, `courseID`, `pedagogyID`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4),
(5, 5, 5);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `discussion_forums`
--

CREATE TABLE `discussion_forums` (
  `forumID` int(5) NOT NULL,
  `courseID` int(5) DEFAULT NULL,
  `forumName` varchar(255) DEFAULT NULL,
  `creationDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Eliminarea datelor din tabel `discussion_forums`
--

INSERT INTO `discussion_forums` (`forumID`, `courseID`, `forumName`, `creationDate`) VALUES
(1, 1, 'Introduction to Programming Discussion', '2024-01-10'),
(2, 2, 'Data Science Concepts Forum', '2024-01-15'),
(3, 3, 'Web Development Forum', '2024-02-01'),
(4, 4, 'Creative Writing Ideas Discussion', '2024-02-10'),
(5, 5, 'Photography Techniques Forum', '2024-03-05');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `enrollments`
--

CREATE TABLE `enrollments` (
  `enrollmentID` int(5) NOT NULL,
  `userID` int(5) DEFAULT NULL,
  `courseID` int(5) DEFAULT NULL,
  `enrollDate` date NOT NULL DEFAULT current_timestamp(),
  `completionStatus` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Eliminarea datelor din tabel `enrollments`
--

INSERT INTO `enrollments` (`enrollmentID`, `userID`, `courseID`, `enrollDate`, `completionStatus`) VALUES
(1, 1, 1, '2024-01-10', 'Completed'),
(2, 3, 2, '2024-01-15', 'In Progress'),
(3, 5, 3, '2024-02-01', 'Not Started'),
(4, 1, 4, '2024-02-10', 'Completed'),
(5, 3, 5, '2024-03-05', 'In Progress'),
(6, 21, 8, '2024-12-29', 'In Progress'),
(7, 21, 10, '2024-12-29', 'In Progress'),
(8, 21, 11, '2024-12-29', 'In Progress'),
(9, 21, 7, '2024-12-29', 'In Progress'),
(10, 21, 13, '2024-12-29', 'In Progress'),
(11, 21, 6, '2024-12-29', 'In Progress'),
(12, 21, 6, '2024-12-29', 'In Progress'),
(13, 21, 6, '2024-12-29', 'In Progress'),
(14, 21, 6, '2024-12-29', 'In Progress'),
(15, 21, 6, '2024-12-29', 'In Progress'),
(16, 21, 19, '2024-12-29', 'In Progress'),
(17, 21, 20, '2024-12-30', 'In Progress'),
(18, 1, 19, '2024-12-30', 'In Progress'),
(19, 21, 22, '2024-12-30', 'In Progress'),
(20, 99, 19, '2024-12-30', 'In Progress'),
(21, 21, 19, '2024-12-30', 'In Progress'),
(22, 21, 25, '2024-12-30', 'In Progress'),
(23, 5, 22, '2024-12-31', 'In Progress'),
(24, 103, 22, '2024-12-31', 'In Progress');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `feedback`
--

CREATE TABLE `feedback` (
  `feedbackID` int(5) NOT NULL,
  `userID` int(5) DEFAULT NULL,
  `platformID` int(5) DEFAULT NULL,
  `feedbackText` varchar(255) DEFAULT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Eliminarea datelor din tabel `feedback`
--

INSERT INTO `feedback` (`feedbackID`, `userID`, `platformID`, `feedbackText`, `date`) VALUES
(1, 1, 1, 'Great platform for learning programming.', '2024-01-15'),
(2, 3, 2, 'Affordable and well-structured courses.', '2024-02-20'),
(3, 5, 3, 'Highly recommend for web development.', '2024-03-10'),
(4, 1, 4, 'Creative and fun courses available.', '2024-04-05'),
(5, 3, 5, 'Perfect for building creative skills.', '2024-03-25');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `forumpost`
--

CREATE TABLE `forumpost` (
  `postID` int(5) NOT NULL,
  `forumID` int(5) DEFAULT NULL,
  `userID` int(5) DEFAULT NULL,
  `postContent` varchar(255) DEFAULT NULL,
  `postDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Eliminarea datelor din tabel `forumpost`
--

INSERT INTO `forumpost` (`postID`, `forumID`, `userID`, `postContent`, `postDate`) VALUES
(1, 1, 3, 'Can someone explain variables?', '2024-01-20'),
(2, 2, 103, 'What are some good resources for Python?', '2024-02-25'),
(3, 3, 5, 'I love using CSS frameworks!', '2024-03-15'),
(4, 4, 104, 'How do I start writing a novel?', '2024-04-10'),
(5, 5, 3, 'What camera settings are best for portraits?', '2024-03-20');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `instructors`
--

CREATE TABLE `instructors` (
  `instructorID` int(5) NOT NULL,
  `userID` int(5) DEFAULT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `bio` varchar(255) DEFAULT NULL,
  `courseName` varchar(255) DEFAULT NULL,
  `pedagogyID` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Eliminarea datelor din tabel `instructors`
--

INSERT INTO `instructors` (`instructorID`, `userID`, `fullName`, `email`, `bio`, `courseName`, `pedagogyID`) VALUES
(1, 102, 'Dr. Emma Clark', 'emma.clark@example.com', 'Passionate educator with over 10 years of experience in teaching programming.', 'Web Development', 3),
(2, NULL, 'Prof. Liam Johnson', 'liam.johnson@example.com', 'Data scientist with extensive knowledge in machine learning and AI.', 'Data Science', 2),
(3, NULL, 'Ms. Olivia Brown', 'olivia.brown@example.com', 'Web developer specializing in front-end technologies.', 'Computer Science', 4),
(4, NULL, 'Mr. Ethan Davis', 'ethan.davis@example.com', 'Creative writing expert with a love for storytelling.', 'Creative Writing', 1),
(5, NULL, 'Mrs. Sophia Miller', 'sophia.miller@example.com', 'Professional photographer with expertise in portrait and landscape photography.', 'Photography', 5),
(6, 2, 'Jane Smith', 'jane.smith@example.com', 'I am at teacher at PedaOnline', 'Computer Science', 4),
(9, 101, 'Gabriel', 'mail@mail.com', 'I am passionate about designing and building web applications', 'Web Development 101', 3);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `lessons`
--

CREATE TABLE `lessons` (
  `lessonID` int(5) NOT NULL,
  `pedagogyID` int(5) DEFAULT NULL,
  `instructorID` int(5) DEFAULT NULL,
  `lessonTitle` varchar(255) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `lessonOrder` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Eliminarea datelor din tabel `lessons`
--

INSERT INTO `lessons` (`lessonID`, `pedagogyID`, `instructorID`, `lessonTitle`, `duration`, `lessonOrder`) VALUES
(1, 1, 4, 'Introduction to Programming Basics', '30 minutes', 1),
(2, 1, 4, 'Variables and Data Types', '45 minutes', 2),
(3, 2, 2, 'Introduction to Data Science', '50 minutes', 1),
(4, 3, 1, 'HTML Basics', '40 minutes', 1),
(5, 3, 1, 'CSS Fundamentals', '50 minutes', 2),
(19, 3, 1, 'Bootstrap Fundamentals', '30 minutes', NULL),
(20, 3, 1, 'Introduction to JavaScript', '60 minutes', NULL),
(24, 3, 1, 'JavaScript Basics II', '60 minutes', NULL),
(25, 4, 6, 'Introduction to HTML basics', '30 minutes', NULL),
(26, 4, 6, 'Styling your webpage with CSS', '40 minutes', NULL);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `materials`
--

CREATE TABLE `materials` (
  `materialID` int(5) NOT NULL,
  `lessonID` int(5) DEFAULT NULL,
  `materialType` varchar(255) DEFAULT NULL,
  `materialURL` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Eliminarea datelor din tabel `materials`
--

INSERT INTO `materials` (`materialID`, `lessonID`, `materialType`, `materialURL`, `title`) VALUES
(1, 1, 'Video', 'https://example.com/python-basics.mp4', NULL),
(2, 1, 'PDF', 'https://example.com/python-guide.pdf', NULL),
(3, 3, 'Video', 'https://example.com/web-design.mp4', NULL),
(4, 4, 'Material', 'files/1_thermal radiation_p1.pdf', 'Create your first webpage'),
(5, 5, 'Video', 'https://example.com/photography.mp4', NULL),
(24, 25, 'Material', 'files/index.html', 'Creating our first webpage'),
(25, 26, 'Material', 'files/1_thermal radiation_p1.pdf', 'Adding some style to your website'),
(26, 4, 'Material', 'files/1_thermal radiation_p1.pdf', 'Grouping elements on website');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `pedagogies`
--

CREATE TABLE `pedagogies` (
  `pedagogyID` int(5) NOT NULL,
  `pedagogyType` varchar(255) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `level` varchar(255) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Eliminarea datelor din tabel `pedagogies`
--

INSERT INTO `pedagogies` (`pedagogyID`, `pedagogyType`, `description`, `level`, `duration`) VALUES
(1, 'Introduction to programing', 'Computer Science', 'Beginner', '8 weeks'),
(2, 'Data Science Bootcamp', 'Data Science', 'Intermediate', '12 weeks'),
(3, 'Web Development 101', 'Web Development', 'Beginner', '10 weeks'),
(4, 'Creative Writting', 'Arts and Literature', 'Intermediate', '8 weeks'),
(5, 'Photograhy Basics', 'Photography', 'Beginner', '4 weeks');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `platforms`
--

CREATE TABLE `platforms` (
  `platformID` int(5) NOT NULL,
  `platformName` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `launchYear` year(4) DEFAULT NULL,
  `owner` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Eliminarea datelor din tabel `platforms`
--

INSERT INTO `platforms` (`platformID`, `platformName`, `description`, `launchYear`, `owner`, `website`) VALUES
(1, 'Coursera', 'Online learning platform with various subjects', '2012', 'Mathew Owens', 'https://www.coursera.org'),
(2, 'Udemy', 'Affordable courses across multiple disciplines', '2013', 'Agatha Windsone', 'https://www.udemy.com'),
(3, 'EdX', 'University-level courses from top institutions', '2012', 'Mike Roggers', 'https://www.edx.org'),
(4, 'Khan Academy', 'Free educational content for everyone', '2011', 'William Mikaelson', 'https://www.khanacademy.org'),
(5, 'Skillshare', 'Platform focused on creative skills', '2013', 'Robin Thomson', 'https://www.skillshare.com');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `review`
--

CREATE TABLE `review` (
  `reviewID` int(5) NOT NULL,
  `userID` int(5) DEFAULT NULL,
  `courseID` int(5) DEFAULT NULL,
  `rating` int(5) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `reviewDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Eliminarea datelor din tabel `review`
--

INSERT INTO `review` (`reviewID`, `userID`, `courseID`, `rating`, `comment`, `reviewDate`) VALUES
(1, 1, 1, 5, 'Great introduction to programming! Highly recommended.', '2024-03-20'),
(2, 3, 2, 4, 'Comprehensive and challenging course on data science.', '2024-05-05'),
(3, 5, 3, 5, 'Fantastic course on web development. Loved the hands-on projects!', '2024-06-15'),
(4, 1, 4, 4, 'Engaging course, but could use more practical examples.', '2024-04-10'),
(5, 3, 5, 5, 'Perfect for beginners in photography. Great quality content.', '2024-04-30'),
(6, 21, 3, 5, 'Great course. Very well structured', '2024-12-31'),
(10, 103, 2, 5, 'I like this course so much. I learned so much staff doing all the lessons and homeworks. Definitelly going to recommend this one to my friends.', '2024-12-31');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `student_assessment`
--

CREATE TABLE `student_assessment` (
  `studentAssessmentID` int(5) NOT NULL,
  `userID` int(5) DEFAULT NULL,
  `lessonID` int(5) DEFAULT NULL,
  `assessmentID` int(5) DEFAULT NULL,
  `score` int(5) DEFAULT NULL,
  `submissionDate` date NOT NULL DEFAULT current_timestamp(),
  `assignmentURL` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Eliminarea datelor din tabel `student_assessment`
--

INSERT INTO `student_assessment` (`studentAssessmentID`, `userID`, `lessonID`, `assessmentID`, `score`, `submissionDate`, `assignmentURL`) VALUES
(92, 21, 4, 4, 100, '2024-12-30', 'files/newfile.html'),
(93, 99, 4, 4, 0, '2024-12-30', 'files/index.html'),
(94, 21, 4, 11, NULL, '2024-12-30', 'files/index.html');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `subscription`
--

CREATE TABLE `subscription` (
  `subscriptionID` int(5) NOT NULL,
  `platformID` int(5) DEFAULT NULL,
  `planName` varchar(255) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Eliminarea datelor din tabel `subscription`
--

INSERT INTO `subscription` (`subscriptionID`, `platformID`, `planName`, `price`, `duration`) VALUES
(1, 1, 'Basic Plan', 9.99, '1 Month'),
(2, 1, 'Pro Plan', 29.99, '1 Month'),
(3, 2, 'Standard Plan', 14.99, '3 Months'),
(4, 3, 'Premium Plan', 19.99, '1 Month'),
(5, 2, 'Student Plan', 7.99, '1 Month');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `users`
--

CREATE TABLE `users` (
  `userID` int(5) NOT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `subscription` varchar(255) DEFAULT NULL,
  `joinDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Eliminarea datelor din tabel `users`
--

INSERT INTO `users` (`userID`, `fullName`, `email`, `password`, `role`, `subscription`, `joinDate`) VALUES
(1, 'GIGA NIGGA', 'admin@securoserv.com', 'bigadminenergy', 'admin', 'GOD', '2023-12-01'),
(2, 'Jane Smith', 'jane.smith@example.com', '12345', 'Instructor', 'Freeby', '2023-11-20'),
(3, 'Alice Brown', 'alice.brown@example.com', '12345', 'Student', 'Freeby', '2023-12-05'),
(4, 'Bob Johnson', 'bob.johnson@example.com', '12345', 'Instructor', 'Freeby', '2023-10-25'),
(5, 'Chris White', 'chris.white@example.com', '12345', 'Student', 'Freeby', '2023-11-15'),
(21, 'Gabi', 'mail@mail.com', '123', 'Student', 'GOD', '2024-12-28'),
(99, 'Andrei', 'mail@mail.com', '123456', 'Student', 'Freeby', '2024-12-30'),
(101, 'Gabriel', 'mail@mail.com', '1234', 'Instructor', 'Freeby', '2024-12-30'),
(102, 'Dr. Emma Clark', 'emma.clark@example.com', '12345', 'Instructor', 'Freeby', '2024-12-30'),
(103, 'Will Johnson', 'will.johnson@gmail.com', '12345', 'Student', 'Freeby', '2024-12-31'),
(104, 'Brandon', 'brandon@mail.com', '1234', 'Student', 'GoodieBox', '2024-12-31');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `user_subscription`
--

CREATE TABLE `user_subscription` (
  `userSubscriptionID` int(5) NOT NULL,
  `userID` int(5) DEFAULT NULL,
  `subscriptionID` int(5) DEFAULT NULL,
  `startDate` date NOT NULL DEFAULT current_timestamp(),
  `endDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Eliminarea datelor din tabel `user_subscription`
--

INSERT INTO `user_subscription` (`userSubscriptionID`, `userID`, `subscriptionID`, `startDate`, `endDate`) VALUES
(1, 1, 1, '2024-01-01', '2024-01-31'),
(2, 3, 2, '2024-02-01', '2025-02-01'),
(3, 5, 3, '2024-03-01', '2024-03-31'),
(4, 1, 4, '2024-02-15', '2025-02-15'),
(5, 3, 5, '2024-03-15', '2024-04-15');

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`applicationID`);

--
-- Indexuri pentru tabele `assessments`
--
ALTER TABLE `assessments`
  ADD PRIMARY KEY (`assessmentID`);

--
-- Indexuri pentru tabele `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexuri pentru tabele `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`certificateID`);

--
-- Indexuri pentru tabele `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`courseID`);

--
-- Indexuri pentru tabele `course_categories`
--
ALTER TABLE `course_categories`
  ADD PRIMARY KEY (`courseCategoryID`);

--
-- Indexuri pentru tabele `course_pedagogies`
--
ALTER TABLE `course_pedagogies`
  ADD PRIMARY KEY (`coursePedagogyID`);

--
-- Indexuri pentru tabele `discussion_forums`
--
ALTER TABLE `discussion_forums`
  ADD PRIMARY KEY (`forumID`);

--
-- Indexuri pentru tabele `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`enrollmentID`);

--
-- Indexuri pentru tabele `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedbackID`);

--
-- Indexuri pentru tabele `forumpost`
--
ALTER TABLE `forumpost`
  ADD PRIMARY KEY (`postID`);

--
-- Indexuri pentru tabele `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`instructorID`);

--
-- Indexuri pentru tabele `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`lessonID`);

--
-- Indexuri pentru tabele `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`materialID`);

--
-- Indexuri pentru tabele `pedagogies`
--
ALTER TABLE `pedagogies`
  ADD PRIMARY KEY (`pedagogyID`);

--
-- Indexuri pentru tabele `platforms`
--
ALTER TABLE `platforms`
  ADD PRIMARY KEY (`platformID`);

--
-- Indexuri pentru tabele `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`reviewID`);

--
-- Indexuri pentru tabele `student_assessment`
--
ALTER TABLE `student_assessment`
  ADD PRIMARY KEY (`studentAssessmentID`);

--
-- Indexuri pentru tabele `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`subscriptionID`);

--
-- Indexuri pentru tabele `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- Indexuri pentru tabele `user_subscription`
--
ALTER TABLE `user_subscription`
  ADD PRIMARY KEY (`userSubscriptionID`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `applications`
--
ALTER TABLE `applications`
  MODIFY `applicationID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pentru tabele `assessments`
--
ALTER TABLE `assessments`
  MODIFY `assessmentID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT pentru tabele `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pentru tabele `certificates`
--
ALTER TABLE `certificates`
  MODIFY `certificateID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pentru tabele `courses`
--
ALTER TABLE `courses`
  MODIFY `courseID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pentru tabele `course_categories`
--
ALTER TABLE `course_categories`
  MODIFY `courseCategoryID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pentru tabele `course_pedagogies`
--
ALTER TABLE `course_pedagogies`
  MODIFY `coursePedagogyID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pentru tabele `discussion_forums`
--
ALTER TABLE `discussion_forums`
  MODIFY `forumID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pentru tabele `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `enrollmentID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pentru tabele `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedbackID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pentru tabele `forumpost`
--
ALTER TABLE `forumpost`
  MODIFY `postID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pentru tabele `instructors`
--
ALTER TABLE `instructors`
  MODIFY `instructorID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pentru tabele `lessons`
--
ALTER TABLE `lessons`
  MODIFY `lessonID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pentru tabele `materials`
--
ALTER TABLE `materials`
  MODIFY `materialID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pentru tabele `pedagogies`
--
ALTER TABLE `pedagogies`
  MODIFY `pedagogyID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pentru tabele `platforms`
--
ALTER TABLE `platforms`
  MODIFY `platformID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pentru tabele `review`
--
ALTER TABLE `review`
  MODIFY `reviewID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pentru tabele `student_assessment`
--
ALTER TABLE `student_assessment`
  MODIFY `studentAssessmentID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT pentru tabele `subscription`
--
ALTER TABLE `subscription`
  MODIFY `subscriptionID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pentru tabele `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT pentru tabele `user_subscription`
--
ALTER TABLE `user_subscription`
  MODIFY `userSubscriptionID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
