-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2020 at 01:50 PM
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
(4, '', '', 'Pavan', 'Maganti', 'pavanmaganti99@gmail.com', '202cb962ac59075b964b07152d234b70', '8099049823', 'Male', '', '', '', 'Python,Java', '2020/01/01 15:23', '2020/01/31 12:42', 1, '2019-12-22 14:04:49', '2020-01-25 11:47:58', 1),
(8, 'google', '108176599141447908950', 'Pavan', 'Maganti', 'pavanmaganti9@gmail.com', '', '', '', 'en-GB', 'https://lh3.googleusercontent.com/a-/AAuE7mC4ExtH6To4NlcFZr9uiB48KRqzNhX5Tf2lQpzgWA', '', '', '2020/01/08 00:38', '2020/02/07 00:38', 0, '2019-12-22 18:01:35', '2020-01-08 00:38:26', 1),
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
  `concept` varchar(255) NOT NULL,
  `heading` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `position` int(11) NOT NULL,
  `language` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `name`, `slug`, `concept`, `heading`, `description`, `position`, `language`, `image`, `created`) VALUES
(1, 'What is Java', 'What-is-Java', 'Core Java', 'Java Tutorial', '<p>Java is a <strong>programming language</strong> and a <strong>platform</strong>. Java is a high level, robust, object-oriented and secure programming language.</p>\r\n\r\n<p>Java was developed by <em>Sun Microsystems</em> (which is now the subsidiary of Oracle) in the year 1995. <em>James Gosling</em> is known as the father of Java. Before Java, its name was <em>Oak</em>. Since Oak was already a registered company, so James Gosling and his team changed the Oak name to Java.</p>\r\n', 3, 'Java', '1579269701_998e9acefe624bfea5ff3250a3a5bd9f-80DCertificate (1).pdf', '2020-01-17 19:31:41'),
(2, 'History of Java', 'History-of-Java', 'Core Java', 'Java Tutorial', '<h1>History of Java</h1>\r\n\r\n<ol>\r\n <li><a href=\"https://www.javatpoint.com/history-of-java#\">History of Java</a></li>\r\n <li><a href=\"https://www.javatpoint.com/history-of-java#version\">Java Version History</a></li>\r\n</ol>\r\n\r\n<p><strong>The history of Java</strong> is very interesting. Java was originally designed for interactive television, but it was too advanced technology for the digital cable television industry at the time. The history of Java starts with the Green Team. Java team members (also known as <strong>Green Team</strong>), initiated this project to develop a language for digital devices such as set-top boxes, televisions, etc. However, it was suited for internet programming. Later, Java technology was incorporated by Netscape.</p>\r\n\r\n<p>The principles for creating Java programming were \"Simple, Robust, Portable, Platform-independent, Secured, High Performance, Multithreaded, Architecture Neutral, Object-Oriented, Interpreted, and Dynamic\". Java was developed by James Gosling, who is known as the father of Java, in 1995. James Gosling and his team members started the project in the early &#39;90s.</p>\r\n\r\n<p><img alt=\"James Gosling - founder of java\" src=\"https://static.javatpoint.com/images/j1.jpg\"></p>\r\n\r\n<p>Currently, Java is used in internet programming, mobile devices, games, e-business solutions, etc. There are given significant points that describe the history of Java.</p>\r\n', 2, 'Java', '1579269807_998e9acefe624bfea5ff3250a3a5bd9f-80DCertificate (1).pdf', '2020-01-17 19:33:27'),
(3, 'Features of Java', 'Features-of-Java', 'Core Java', 'Java Tutorial', '<p>The primary objective of <a href=\"https://www.javatpoint.com/java-tutorial\">Java programming</a> language creation was to make it portable, simple and secure programming language. Apart from this, there are also some excellent features which play an important role in the popularity of this language. The features of Java are also known as java <em>buzzwords</em>.</p>\r\n\r\n<p>A list of most important features of Java language is given below.</p>\r\n\r\n<p><img alt=\"Java Features\" src=\"https://static.javatpoint.com/images/core/java-features.png\"></p>\r\n\r\n<ol>\r\n <li>Simple</li>\r\n <li>Object-Oriented</li>\r\n <li>Portable</li>\r\n <li>Platform independent</li>\r\n <li>Secured</li>\r\n <li>Robust</li>\r\n <li>Architecture neutral</li>\r\n <li>Interpreted</li>\r\n <li>High Performance</li>\r\n <li>Multithreaded</li>\r\n <li>Distributed</li>\r\n <li>Dynamic</li>\r\n</ol>\r\n', 1, 'Java', '1579269890_998e9acefe624bfea5ff3250a3a5bd9f-80DCertificate (1).pdf', '2020-01-17 19:34:50'),
(4, 'Java If-else Statement', 'Java-If-else-Statement', 'Core Java', 'Control Statements', '<p>The Java <em>if statement</em> is used to test the condition. It checks boolean condition: <em>true</em> or <em>false</em>. There are various types of if statement in java.</p>\r\n\r\n<ul>\r\n <li>if statement</li>\r\n <li>if-else statement</li>\r\n <li>if-else-if ladder</li>\r\n <li>nested if statement</li>\r\n</ul>\r\n\r\n<h2>Java if Statement</h2>\r\n\r\n<p>The Java if statement tests the condition. It executes the <em>if block</em> if condition is true.</p>\r\n', 1, 'Java', '1579269963_998e9acefe624bfea5ff3250a3a5bd9f-80DCertificate (1).pdf', '2020-01-17 19:36:03'),
(5, 'Java Switch Statement', 'Java-Switch-Statement', 'Core Java', 'Control Statements', '<p>The Java <em>switch statement</em> executes one statement from multiple conditions. It is like if-else-if ladder statement. The switch statement works with byte, short, int, long, enum types, String and some wrapper types like Byte, Short, Int, and Long. Since Java 7, you can use strings in the switch statement.</p>\r\n\r\n<p>In other words, the switch statement tests the equality of a variable against multiple values.</p>\r\n\r\n<h4>Points to Remember</h4>\r\n\r\n<ul>\r\n <li>There can be <em>one or N number of case values</em> for a switch expression.</li>\r\n <li>The case value must be of switch expression type only. The case value must be <em>literal or constant</em>. It doesn&#39;t allow variables.</li>\r\n <li>The case values must be <em>unique</em>. In case of duplicate value, it renders compile-time error.</li>\r\n <li>The Java switch expression must be of <em>byte, short, int, long (with its Wrapper type), enums and string</em>.</li>\r\n <li>Each case statement can have a <em>break statement</em> which is optional. When control reaches to the break statement, it jumps the control after the switch expression. If a break statement is not found, it executes the next case.</li>\r\n <li>The case value can have a <em>default label</em> which is optional.</li>\r\n</ul>\r\n', 2, 'Java', '1579270033_998e9acefe624bfea5ff3250a3a5bd9f-80DCertificate (1).pdf', '2020-01-17 19:37:13'),
(6, 'What is a Servlet?', 'What-is-a-Servlet-', 'Servlets', 'Servlet Tutorial', '<p>Servlet can be described in many ways, depending on the context.</p>\r\n\r\n<ul>\r\n <li>Servlet is a technology which is used to create a web application.</li>\r\n <li>Servlet is an API that provides many interfaces and classes including documentation.</li>\r\n <li>Servlet is an interface that must be implemented for creating any Servlet.</li>\r\n <li>Servlet is a class that extends the capabilities of the servers and responds to the incoming requests. It can respond to any requests.</li>\r\n <li>Servlet is a web component that is deployed on the server to create a dynamic web page.</li>\r\n</ul>\r\n\r\n<p><img alt=\"Servlet\" src=\"https://static.javatpoint.com/images/response.JPG\"></p>\r\n', 1, 'Java', '1579271059_998e9acefe624bfea5ff3250a3a5bd9f-80DCertificate (1).pdf', '2020-01-17 19:54:19'),
(8, 'Java Variables', 'Java-Variables', 'Core Java', 'Java Tutorial', '<h2>Java Variables</h2>\r\n\r\n<p>Variables are containers for storing data values.</p>\r\n\r\n<p>In Java, there are different <strong>types</strong> of variables, for example:</p>\r\n\r\n<ul>\r\n <li><code>String</code> - stores text, such as \"Hello\". String values are surrounded by double quotes</li>\r\n <li><code>int</code> - stores integers (whole numbers), without decimals, such as 123 or -123</li>\r\n <li><code>float</code> - stores floating point numbers, with decimals, such as 19.99 or -19.99</li>\r\n <li><code>char</code> - stores single characters, such as &#39;a&#39; or &#39;B&#39;. Char values are surrounded by single quotes</li>\r\n <li><code>boolean</code> - stores values with two states: true or false</li>\r\n</ul>\r\n', 4, 'Java', '1579663991_', '2020-01-22 09:03:12'),
(9, 'Interceptors', 'Interceptors', 'Struts', 'Core Components', '<h3>Advantage of interceptors</h3>\r\n\r\n<p><strong>Pluggable</strong> If we need to remove any concern such as validation, exception handling, logging etc. from the application, we don&#39;t need to redeploy the application. We only need to remove the entry from the struts.xml file.</p>\r\n', 1, 'Java', '1579664334_', '2020-01-22 09:08:54'),
(10, 'ValueStack', 'ValueStack', 'Struts', 'Core Components', '<p>A valueStack is simply a stack that contains application specific objects such as action objects and other model object.</p>\r\n\r\n<p>At the execution time, action is placed on the top of the stack.</p>\r\n\r\n<p>We can put objects in the valuestack, query it and delete it.</p>\r\n', 2, 'Java', '1579741616_', '2020-01-22 09:11:02'),
(11, 'ActionContext', 'ActionContext', 'Struts', 'Core Components', '<p>The ActionContext is a container of objects in which action is executed. The values stored in the ActionContext are unique per thread (i.e. ThreadLocal). So we don&#39;t need to make our action thread safe. 123 456</p>\r\n\r\n<p>We can get the reference of ActionContext by calling the getContext() method of ActionContext class. It is a static factory method. For example:</p>\r\n', 3, 'Java', '1579741707_', '2020-01-22 09:13:26'),
(12, 'Custom Interceptor', 'Custom-Interceptor', 'Struts', 'Interceptors', '<p>In struts 2, we can create the custom interceptor by implementing the Interceptor interface in a class and overriding its three life cycle method.</p>\r\n\r\n<p>For creating the custom interceptor, <strong>Interceptor</strong> interface must be implemented. It has three methods:</p>\r\n\r\n<ol>\r\n <li><strong>public void init()</strong> It is invoked only once and used to initialize the interceptor.</li>\r\n <li><strong>public String intercept(ActionInvocation ai)</strong> It is invoked at each request, it is used to define the request processing logic. If it returns string, result page will be invoked, if it returns invoke() method of ActionInvocation interface, next interceptor or action will be invoked.</li>\r\n <li><strong>public void destroy()</strong> It is invoked only once and used to destroy the interceptor.</li>\r\n</ol>\r\n', 1, 'Java', '', '2020-01-22 09:24:54'),
(13, 'Params interceptor', 'params-interceptor', 'Struts', 'Interceptors', '<p>The <strong>params interceptor</strong> also known as parameters interceptor is used to set all parameters on the valuestack.</p>\r\n\r\n<p>It is found in the default stack bydefault. So you don&#39;t need to specify it explicitely.</p>\r\n\r\n<h4>Internal working of params interceptor</h4>\r\n\r\n<p>It gets all parameters by calling the <strong>getParameters() method of ActionContext</strong> and sets it on the valuestack by calling the <strong>setValue() method of ValueStack</strong>.</p>\r\n', 2, 'Java', '', '2020-01-22 09:25:57'),
(14, 'OOPs Concepts', 'OOPs-Concepts', 'Core Java', 'Java Object Class', '<p>In this page, we will learn about the basics of OOPs. Object-Oriented Programming is a paradigm that provides many concepts, such as <strong>inheritance</strong>, <strong>data binding</strong>, <strong>polymorphism</strong>, etc.</p>\r\n\r\n<p><strong>Simula</strong> is considered the first object-oriented programming language. The programming paradigm where everything is represented as an object is known as a truly object-oriented programming language.</p>\r\n\r\n<p><strong>Smalltalk</strong> is considered the first truly object-oriented programming language.</p>\r\n', 1, 'Java', '', '2020-01-25 13:13:44'),
(15, 'Naming convention', 'Naming-convention', 'Core Java', 'Java Object Class', '<p>Java naming convention is a rule to follow as you decide what to name your identifiers such as class, package, variable, constant, method, etc.</p>\r\n\r\n<p>But, it is not forced to follow. So, it is known as convention not rule. These conventions are suggested by several Java communities such as Sun Microsystems and Netscape.</p>\r\n\r\n<p>All the classes, interfaces, packages, methods and fields of Java programming language are given according to the Java naming convention. If you fail to follow these conventions, it may generate confusion or erroneous code.</p>\r\n', 2, 'Java', '', '2020-01-25 13:14:40'),
(16, 'Objects and Classes', 'Objects-and-Classes', 'Core Java', 'Java Object Class', '<p>In this page, we will learn about Java objects and classes. In object-oriented programming technique, we design a program using objects and classes.</p>\r\n\r\n<p>An object in Java is the physical as well as a logical entity, whereas, a class in Java is a logical entity only.</p>\r\n\r\n<h3>What is an object in Java</h3>\r\n\r\n<p><img alt=\"object in Java\" src=\"https://static.javatpoint.com/images/objects.jpg\"></p>\r\n\r\n<p>An entity that has state and behavior is known as an object e.g., chair, bike, marker, pen, table, car, etc. It can be physical or logical (tangible and intangible). The example of an intangible object is the banking system.</p>\r\n', 3, 'Java', '', '2020-01-25 13:15:38'),
(17, 'Constructor', 'Constructor', 'Core Java', 'Java Object Class', '<h1>Constructors in Java</h1>\r\n\r\n<ol>\r\n <li><a href=\"https://www.javatpoint.com/java-constructor#constypes\">Types of constructors</a>\r\n\r\n <ol>\r\n  <li><a href=\"https://www.javatpoint.com/java-constructor#consdef\">Default Constructor</a></li>\r\n  <li><a href=\"https://www.javatpoint.com/java-constructor#conspara\">Parameterized Constructor</a></li>\r\n </ol>\r\n </li>\r\n <li><a href=\"https://www.javatpoint.com/java-constructor#consoverloading\">Constructor Overloading</a></li>\r\n <li><a href=\"https://www.javatpoint.com/java-constructor#consdoesreturn\">Does constructor return any value?</a></li>\r\n <li><a href=\"https://www.javatpoint.com/java-constructor#conscopy\">Copying the values of one object into another</a></li>\r\n <li><a href=\"https://www.javatpoint.com/java-constructor#consothertask\">Does constructor perform other tasks instead of the initialization</a></li>\r\n</ol>\r\n\r\n<p>In Java, a constructor is a block of codes similar to the method. It is called when an instance of the class is created. At the time of calling constructor, memory for the object is allocated in the memory.</p>\r\n\r\n<p>It is a special type of method which is used to initialize the object.</p>\r\n\r\n<p>Every time an object is created using the new() keyword, at least one constructor is called.</p>\r\n', 4, 'Java', '', '2020-01-25 13:16:27'),
(18, 'IS-A relationship', 'IS-A-relationship', 'Core Java', 'Java Inheritance', '<h1>Inheritance in Java</h1>\r\n\r\n<ol>\r\n <li><a href=\"https://www.javatpoint.com/inheritance-in-java#\">Inheritance</a></li>\r\n <li><a href=\"https://www.javatpoint.com/inheritance-in-java#inheritancetypes\">Types of Inheritance</a></li>\r\n <li><a href=\"https://www.javatpoint.com/inheritance-in-java#inheritancenotmultiple\">Why multiple inheritance is not possible in Java in case of class?</a></li>\r\n</ol>\r\n\r\n<p><strong>Inheritance in Java</strong> is a mechanism in which one object acquires all the properties and behaviors of a parent object. It is an important part of OOPs (Object Oriented programming system).</p>\r\n\r\n<p>The idea behind inheritance in Java is that you can create new classes that are built upon existing classes. When you inherit from an existing class, you can reuse methods and fields of the parent class. Moreover, you can add new methods and fields in your current class also.</p>\r\n\r\n<p>Inheritance represents the <strong>IS-A relationship</strong> which is also known as a <em>parent-child</em> relationship.</p>\r\n', 1, 'Java', '', '2020-01-25 13:17:31'),
(19, 'HAS-A relationship', 'HAS-A-relationship', 'Core Java', 'Java Inheritance', '<h1>Aggregation in Java</h1>\r\n\r\n<p>If a class have an entity reference, it is known as Aggregation. Aggregation represents HAS-A relationship.</p>\r\n\r\n<p>Consider a situation, Employee object contains many informations such as id, name, emailId etc. It contains one more object named address, which contains its own informations such as city, state, country, zipcode etc. as given below.</p>\r\n', 2, 'Java', '', '2020-01-25 13:19:04'),
(20, 'Method Overloading', 'Method-Overloading', 'Core Java', 'Java Polymorphism', '<h1>Method Overloading in Java</h1>\r\n\r\n<ol>\r\n <li><a href=\"https://www.javatpoint.com/method-overloading-in-java#monumberofways\">Different ways to overload the method</a></li>\r\n <li><a href=\"https://www.javatpoint.com/method-overloading-in-java#mobynumber\">By changing the no. of arguments</a></li>\r\n <li><a href=\"https://www.javatpoint.com/method-overloading-in-java#mobydatatype\">By changing the datatype</a></li>\r\n <li><a href=\"https://www.javatpoint.com/method-overloading-in-java#moreturntype\">Why method overloading is not possible by changing the return type</a></li>\r\n <li><a href=\"https://www.javatpoint.com/method-overloading-in-java#momainmethod\">Can we overload the main method</a></li>\r\n <li><a href=\"https://www.javatpoint.com/method-overloading-in-java#motypepromotion\">method overloading with Type Promotion</a></li>\r\n</ol>\r\n\r\n<p>If a class has multiple methods having same name but different in parameters, it is known as <strong>Method Overloading</strong>.</p>\r\n\r\n<p>If we have to perform only one operation, having same name of the methods increases the readability of the program.</p>\r\n\r\n<p>Suppose you have to perform addition of the given numbers but there can be any number of arguments, if you write the method such as a(int,int) for two parameters, and b(int,int,int) for three parameters then it may be difficult for you as well as other programmers to understand the behavior of the method because its name differs.</p>\r\n', 1, 'Java', '', '2020-01-25 13:20:08'),
(21, 'Method Overriding', 'Method-Overriding', 'Core Java', 'Java Polymorphism', '<h1>Method Overriding in Java</h1>\r\n\r\n<ol>\r\n <li><a href=\"https://www.javatpoint.com/method-overriding-in-java#moverproblem\">Understanding the problem without method overriding</a></li>\r\n <li><a href=\"https://www.javatpoint.com/method-overriding-in-java#movercanstatic\">Can we override the static method</a></li>\r\n <li><a href=\"https://www.javatpoint.com/method-overriding-in-java#moverdiff\">Method overloading vs. method overriding</a></li>\r\n</ol>\r\n\r\n<p>If subclass (child class) has the same method as declared in the parent class, it is known as <strong>method overriding in Java</strong>.</p>\r\n\r\n<p>In other words, If a subclass provides the specific implementation of the method that has been declared by one of its parent class, it is known as method overriding.</p>\r\n\r\n<h3>Usage of Java Method Overriding</h3>\r\n\r\n<ul>\r\n <li>Method overriding is used to provide the specific implementation of a method which is already provided by its superclass.</li>\r\n <li>Method overriding is used for runtime polymorphism</li>\r\n</ul>\r\n', 2, 'Java', '', '2020-01-25 13:20:52'),
(22, 'Abstract class', 'Abstract-class', 'Core Java', 'Java Abstraction', '<h1>Abstract class in Java</h1>\r\n\r\n<p>A class which is declared with the abstract keyword is known as an abstract class in Java. It can have abstract and non-abstract methods (method with the body).</p>\r\n\r\n<p>Before learning the Java abstract class, let&#39;s understand the abstraction in Java first.</p>\r\n', 1, 'Java', '', '2020-01-25 13:36:21'),
(23, 'Interface', 'Interface', 'Core Java', 'Java Abstraction', '<h1>Interface in Java</h1>\r\n\r\n<ol>\r\n <li><a href=\"https://www.javatpoint.com/interface-in-java#\">Interface</a></li>\r\n <li><a href=\"https://www.javatpoint.com/interface-in-java#interfaceex\">Example of Interface</a></li>\r\n <li><a href=\"https://www.javatpoint.com/interface-in-java#interfacemultiple\">Multiple inheritance by Interface</a></li>\r\n <li><a href=\"https://www.javatpoint.com/interface-in-java#interfacewhynot\">Why multiple inheritance is supported in Interface while it is not supported in case of class.</a></li>\r\n <li><a href=\"https://www.javatpoint.com/interface-in-java#interfacemarker\">Marker Interface</a></li>\r\n <li><a href=\"https://www.javatpoint.com/nested-interface\">Nested Interface</a></li>\r\n</ol>\r\n\r\n<p>An <strong>interface in java</strong> is a blueprint of a class. It has static constants and abstract methods.</p>\r\n\r\n<p>The interface in Java is <em>a mechanism to achieve abstraction</em>. There can be only abstract methods in the Java interface, not method body. It is used to achieve abstraction and multiple inheritance in Java.</p>\r\n\r\n<p>In other words, you can say that interfaces can have abstract methods and variables. It cannot have a method body.</p>\r\n', 2, 'Java', '', '2020-01-25 13:37:04'),
(24, 'Abstract vs Interface', 'Abstract-vs-Interface', 'Core Java', 'Java Abstraction', '<h1>Difference between abstract class and interface</h1>\r\n\r\n<p>Abstract class and interface both are used to achieve abstraction where we can declare the abstract methods. Abstract class and interface both can&#39;t be instantiated.</p>\r\n\r\n<p>But there are many differences between abstract class and interface that are given below.</p>\r\n\r\n<table>\r\n <tbody>\r\n  <tr>\r\n   <th>Abstract class</th>\r\n   <th>Interface</th>\r\n  </tr>\r\n  <tr>\r\n   <td>1) Abstract class can <strong>have abstract and non-abstract</strong> methods.</td>\r\n   <td>Interface can have <strong>only abstract</strong> methods. Since Java 8, it can have <strong>default and static methods</strong> also.</td>\r\n  </tr>\r\n  <tr>\r\n   <td>2) Abstract class <strong>doesn&#39;t support multiple inheritance</strong>.</td>\r\n   <td>Interface <strong>supports multiple inheritance</strong>.</td>\r\n  </tr>\r\n  <tr>\r\n   <td>3) Abstract class <strong>can have final, non-final, static and non-static variables</strong>.</td>\r\n   <td>Interface has <strong>only static and final variables</strong>.</td>\r\n  </tr>\r\n  <tr>\r\n   <td>4) Abstract class <strong>can provide the implementation of interface</strong>.</td>\r\n   <td>Interface <strong>can&#39;t provide the implementation of abstract class</strong>.</td>\r\n  </tr>\r\n  <tr>\r\n   <td>5) The <strong>abstract keyword</strong> is used to declare abstract class.</td>\r\n   <td>The <strong>interface keyword</strong> is used to declare interface.</td>\r\n  </tr>\r\n  <tr>\r\n   <td>6) An <strong>abstract class</strong> can extend another Java class and implement multiple Java interfaces.</td>\r\n   <td>An <strong>interface</strong> can extend another Java interface only.</td>\r\n  </tr>\r\n  <tr>\r\n   <td>7) An <strong>abstract class</strong> can be extended using keyword \"extends\".</td>\r\n   <td>An <strong>interface</strong> can be implemented using keyword \"implements\".</td>\r\n  </tr>\r\n  <tr>\r\n   <td>8) A Java <strong>abstract class</strong> can have class members like private, protected, etc.</td>\r\n   <td>Members of a Java interface are public by default.</td>\r\n  </tr>\r\n  <tr>\r\n   <td>9)<strong>Example:</strong><br>\r\n   public abstract class Shape{<br>\r\n   public abstract void draw();<br>\r\n   }</td>\r\n   <td><strong>Example:</strong><br>\r\n   public interface Drawable{<br>\r\n   void draw();<br>\r\n   }</td>\r\n  </tr>\r\n </tbody>\r\n</table>\r\n\r\n<p>Simply, abstract class achieves partial abstraction (0 to 100%) whereas interface achieves fully abstraction (100%).</p>\r\n', 3, 'Java', '', '2020-01-25 13:38:15');

-- --------------------------------------------------------

--
-- Table structure for table `tutorial`
--

CREATE TABLE `tutorial` (
  `id` int(11) NOT NULL,
  `techno` varchar(255) NOT NULL,
  `tutoname` varchar(255) NOT NULL,
  `tutodesc` text NOT NULL,
  `tutoimage` varchar(255) NOT NULL,
  `created` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tutorial`
--

INSERT INTO `tutorial` (`id`, `techno`, `tutoname`, `tutodesc`, `tutoimage`, `created`) VALUES
(1, 'Java', 'Servlets', 'Servlet technology is used to create a web application (resides at server side and generates a dynamic web page).\r\n\r\nServlet technology is robust and scalable because of java language. Before Servlet, CGI (Common Gateway Interface) scripting language was common as a server-side programming language. However, there were many disadvantages to this technology. We have discussed these disadvantages below.\r\n\r\nThere are many interfaces and classes in the Servlet API such as Servlet, GenericServlet, HttpServlet, ServletRequest, ServletResponse, etc.', '1579258195_java_img.jpg', '2020-01-17 16:19:55'),
(2, 'Java', 'Core Java', 'Our core Java programming tutorial is designed for students and working professionals. Java is an object-oriented, class-based, concurrent, secured and general-purpose computer-programming language. It is a widely used robust technology.', '1579266872_java_img.jpg', '2020-01-17 18:44:32'),
(3, 'Java', 'JSP', 'JSP technology is used to create web application just like Servlet technology. It can be thought of as an extension to Servlet because it provides more functionality than servlet such as expression language, JSTL, etc.\r\n\r\nA JSP page consists of HTML tags and JSP tags. The JSP pages are easier to maintain than Servlet because we can separate designing and development. It provides some additional features such as Expression Language, Custom Tags, etc.', '1579267420_jsp.jpg', '2020-01-17 18:53:41'),
(4, 'Java', 'Struts', 'The struts 2 framework is used to develop MVC-based web application.\r\n\r\nThe struts framework was initially created by Craig McClanahan and donated to Apache Foundation in May, 2000 and Struts 1.0 was released in June 2001.\r\n\r\nThe current stable release of Struts is Struts 2.3.16.1 in March 2, 2014.', '1579267530_struts.jpg', '2020-01-17 18:55:30'),
(5, 'Java', 'Spring', 'This spring tutorial provides in-depth concepts of Spring Framework with simplified examples. It was developed by Rod Johnson in 2003. Spring framework makes the easy development of JavaEE application.', '1579267806_spring.png', '2020-01-17 19:00:06'),
(6, 'Java', 'Hibernet', 'dummy text', '1579267872_Hibernate-logo.png', '2020-01-17 19:01:12');

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
-- Indexes for table `tutorial`
--
ALTER TABLE `tutorial`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tutorial`
--
ALTER TABLE `tutorial`
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
