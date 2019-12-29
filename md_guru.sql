-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2019 at 01:12 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `md_guru`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru_users`
--

CREATE TABLE `guru_users` (
  `id` int(11) NOT NULL,
  `oauth_provider` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `oauth_uid` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `locale` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `topic` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tstartdate` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tenddate` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tstatus` int(2) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `ustatus` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `guru_users`
--

INSERT INTO `guru_users` (`id`, `oauth_provider`, `oauth_uid`, `first_name`, `last_name`, `email`, `password`, `phone`, `gender`, `locale`, `picture`, `link`, `topic`, `tstartdate`, `tenddate`, `tstatus`, `created`, `modified`, `ustatus`) VALUES
(2, 'google', '115538827085293139745', 'Pavan', 'Maganti', 'pavanmaganti87@gmail.com', '', '', '', 'en', 'https://lh3.googleusercontent.com/a-/AAuE7mCB4eBS4RaNq_qciATFrtU1ruoqEL7ErNv2DdE7lQ', '', '', '', '', 0, '2019-12-21 17:46:46', '2019-12-21 17:46:46', 1),
(4, '', '', 'Pavan', 'Maganti', 'pavanmaganti99@gmail.com', '202cb962ac59075b964b07152d234b70', '8099049823', 'Male', '', '', '', '', '', '', 0, '2019-12-22 14:04:49', '2019-12-29 23:54:54', 1),
(8, 'google', '108176599141447908950', 'Pavan', 'Maganti', 'pavanmaganti9@gmail.com', '', '', '', 'en-GB', 'https://lh3.googleusercontent.com/a-/AAuE7mC4ExtH6To4NlcFZr9uiB48KRqzNhX5Tf2lQpzgWA', '', '', '', '', 0, '2019-12-22 18:01:35', '2019-12-28 07:00:50', 1),
(10, '', '', 'Bindu', 'Maganti', 'bindu@gmail.com', 'cd84d683cc5612c69efe115c80d0b7dc', '1234567890', 'Female', '', '', '', '', '2019/12/29 16:14', '2020/01/28 16:14', 0, '2019-12-29 16:14:54', '2019-12-29 17:27:04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `slug`, `description`, `image`, `created`) VALUES
(1, 'AngularJS', 'AngularJS', 'AngularJS is a JavaScript-based open-source front-end web framework mainly maintained by Google and by a community of individuals and corporations to address many of the challenges encountered in developing single-page applications.', '1576866625_angularjs-logo.png', '2019-12-20 19:30:25'),
(2, 'PHP', 'PHP', 'PHP is a general-purpose programming language originally designed for web development. It was originally created by Rasmus Lerdorf in 1994; the PHP reference implementation is now produced by The PHP Group.', '1576866662_php.png', '2019-12-20 19:31:02'),
(3, 'Python', 'Python', 'Python is an interpreted, high-level, general-purpose programming language. Created by Guido van Rossum and first released in 1991, Python\'s design philosophy emphasizes code readability with its notable use of significant whitespace.\r\n\r\nPython is a high-level, interpreted, interactive and object-oriented scripting language. Python is designed to be highly readable. It uses English keywords frequently where as other languages use punctuation, and it has fewer syntactical constructions than other languages.\r\n\r\nPython is a MUST for students and working professionals to become a great Software Engineer specially when they are working in Web Development Domain. I will list down some of the key advantages of learning Python.\r\n\r\nPython is Interpreted − Python is processed at runtime by the interpreter. You do not need to compile your program before executing it. This is similar to PERL and PHP.\r\n\r\nPython is Interactive − You can actually sit at a Python prompt and interact with the interpreter directly to write your programs.\r\n\r\nPython is Object-Oriented − Python supports Object-Oriented style or technique of programming that encapsulates code within objects.\r\n\r\nPython is a Beginner\'s Language − Python is a great language for the beginner-level programmers and supports the development of a wide range of applications from simple text processing to WWW browsers to games.\r\n\r\nEasy-to-learn − Python has few keywords, simple structure, and a clearly defined syntax. This allows the student to pick up the language quickly.\r\n\r\nEasy-to-read − Python code is more clearly defined and visible to the eyes.\r\n\r\nEasy-to-maintain − Python\'s source code is fairly easy-to-maintain.\r\n\r\nA broad standard library − Python\'s bulk of the library is very portable and cross-platform compatible on UNIX, Windows, and Macintosh.\r\n\r\nInteractive Mode − Python has support for an interactive mode which allows interactive testing and debugging of snippets of code.\r\n\r\nPortable − Python can run on a wide variety of hardware platforms and has the same interface on all platforms.\r\n\r\nExtendable − You can add low-level modules to the Python interpreter. These modules enable programmers to add to or customize their tools to be more efficient.\r\n\r\nDatabases − Python provides interfaces to all major commercial databases.\r\n\r\nGUI Programming − Python supports GUI applications that can be created and ported to many system calls, libraries and windows systems, such as Windows MFC, Macintosh, and the X Window system of Unix.\r\n\r\nScalable − Python provides a better structure and support for large programs than shell scripting.', '1576866681_course-python-ii@2x.jpg', '2019-12-20 19:31:21'),
(4, 'Java', 'Java', 'Java is a general-purpose programming language that is class-based, object-oriented, and designed to have as few implementation dependencies as possible', '1576915674_java.png', '2019-12-21 09:07:54');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `language` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `name`, `slug`, `description`, `language`, `image`, `created`) VALUES
(1, 'Python Variables', 'Python-Variables', '<p>A variable can have a short name (like x and y) or</p>\r\n\r\n<p>a more descriptive name (age, carname, total_volume). Rules for Python tuples</p>\r\n', 'Python', '1576861888_py.pdf', '2019-12-20 18:11:28'),
(2, 'PHP Numbers', 'PHP-Numbers', '<p>One thing to notice about PHP is that it provides automatic data type conversion.</p>\r\n\r\n<p>So, if you assign an integer value to a variable, the type of that variable will automatically be an integer.</p>\r\n\r\n<p>Then, if you assign a string to the same variable, the type will change to a strings. 123</p>\r\n', 'PHP', '1577127425_d-v-plastics.pdf', '2019-12-20 18:14:50'),
(3, 'Python List', 'Python-List', '<p>Lists are just like the arrays, declared in other languages.</p>\r\n\r\n<p>Lists need not be homogeneous always which makes it a most powerful tool in Python. A single list may contain DataTypes like Integers, Strings, as well as Objects. Lists are mutable, and hence, they can be altered even after their creation. List in Python are ordered and have a definite count.</p>\r\n\r\n<p>The elements in a list are indexed according to a definite sequence and the indexing of a list is done with 0 being the first index. Each element in the list has its definite place in the list, which allows duplicating of elements in the list, with each element having its own distinct place and credibility.</p>\r\n', 'Python', '1576868285_python_lists.pdf', '2019-12-20 19:58:05'),
(4, 'Tuples in Python', 'Tuples-in-Python', '<p>A Tuple is a collection of Python objects separated by commas. In someways a tuple is similar to a list in terms of indexing, nested objects and repetition but a tuple is immutable unlike lists which are mutable.</p>\r\n\r\n<p>updated by Pavan Maganti</p>\r\n', 'Python', '1576868342_python_tuples.pdf', '2019-12-20 19:59:02'),
(5, 'java introduction for beginners', 'java-introduction-for-beginners', '<p>Java is a modern, evolutionary computing language that combines an elegant language design with powerful features that were previously</p>\r\n\r\n<p>available primarily in specialty languages. In addition to the core language components, Java software distributions include many powerful, supporting software libraries for tasks such as database, network, and graphical user interface (GUI) programming. In this section, we focus on the core Java language features.123456789</p>\r\n', 'Java', '1577126189_JavaIntro-notes.pdf', '2019-12-21 09:09:56'),
(6, 'Python intro', 'Python-intro', '<p>Congrats, you have found the best guide to start with Python. This is the initial blog, we recommend you to bookmark this<a href=\"https://data-flair.training/blogs/python-tutorials-home/\"><em><strong> Free 240+ Python tutorials series</strong> </em></a>for future purpose. </p>\r\n\r\n<p>Before we get started, I wanted to know why you are learning Python. Our experts will tell you the best way to learn Python according to your aim. Share through comments. </p>\r\n\r\n<p>Talking about this Python tutorial, here is a quick overview- </p>\r\n\r\n<ul>\r\n <li>What is Python? </li>\r\n <li>History </li>\r\n <li>Constructs</li>\r\n <li>Features</li>\r\n <li>Frameworks</li>\r\n <li>Flavors</li>\r\n <li>File Extensions</li>\r\n <li>Applications </li>\r\n <li>Installation</li>\r\n <li>Python vs Java vs C++</li>\r\n</ul>\r\n\r\n<p> </p>\r\n', 'Python', '1577121561_python_tuples.pdf', '2019-12-23 18:19:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(12) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `status` int(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `user_type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`, `gender`, `phone`, `status`, `created`, `modified`, `user_type`) VALUES
(2, 'Pavan', 'Maganti', 'pavanmaganti9@gmail.com', 'cd84d683cc5612c69efe115c80d0b7dc', 'Male', '8099049823', 1, '2019-11-01 12:13:00', '2019-11-01 12:13:00', 'superadmin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru_users`
--
ALTER TABLE `guru_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guru_users`
--
ALTER TABLE `guru_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
