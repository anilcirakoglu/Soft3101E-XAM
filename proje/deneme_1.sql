-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 20 Oca 2023, 08:55:18
-- Sunucu sürümü: 10.4.24-MariaDB
-- PHP Sürümü: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `deneme_1`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `course`
--

CREATE TABLE `course` (
  `courseId` int(11) NOT NULL,
  `courseCode` varchar(255) DEFAULT NULL,
  `courseName` varchar(255) DEFAULT NULL,
  `instructorId` int(11) NOT NULL,
  `iname` varchar(255) DEFAULT NULL,
  `adminId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `course`
--

INSERT INTO `course` (`courseId`, `courseCode`, `courseName`, `instructorId`, `iname`, `adminId`) VALUES
(1, ' Comp101', 'Computer Science', 1, 'veli', 4),
(2, ' math101', 'math', 1, 'veli', 4),
(4, ' newl101', 'newlesson', 1, 'veli', 4),
(18, ' ccc', 'cc', 1, 'veli', 4),
(19, ' ddddddddddd', 'a', 1, 'veli', 4),
(20, ' Comp101', 'Computer Science', 3, 'ayşe', 4),
(21, ' yeniderskodu', 'yenidersadı', 1, 'veli', 4),
(22, ' yeniderskodu', 'yenidersadı', 1, 'veli', 4),
(23, ' yeniderskodu', 'yenidersadı', 1, 'veli', 4),
(24, ' yeniderskodu', 'yenidersadı', 1, 'veli', 4),
(25, ' yeniderskodu', 'yenidersadı', 1, 'veli', 4),
(26, ' yeniderskodu', 'yenidersadı', 1, 'veli', 4),
(27, ' Comp101', 'Computer Science', 1, 'veli', 4),
(28, ' Comp101', 'Computer Science', 1, 'veli', 4),
(29, ' phys101', 'phys', 1, 'veli', 4);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `coursestudent`
--

CREATE TABLE `coursestudent` (
  `id` int(11) NOT NULL,
  `studentId` int(11) NOT NULL,
  `courseId` int(11) NOT NULL,
  `instructorId` int(11) NOT NULL,
  `adminId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `coursestudent`
--

INSERT INTO `coursestudent` (`id`, `studentId`, `courseId`, `instructorId`, `adminId`) VALUES
(5, 2, 2, 1, 4),
(6, 2, 19, 1, 4),
(7, 2, 19, 1, 4),
(8, 5, 19, 1, 4),
(9, 5, 19, 1, 4),
(12, 5, 20, 3, 4),
(13, 2, 19, 1, 4),
(14, 2, 1, 1, 4),
(17, 2, 1, 1, 4),
(18, 2, 1, 1, 4),
(19, 2, 1, 1, 4),
(20, 2, 1, 1, 4),
(21, 2, 1, 1, 4),
(22, 2, 1, 1, 4),
(23, 2, 1, 1, 4),
(24, 2, 1, 1, 4),
(25, 2, 1, 1, 4),
(26, 2, 1, 1, 4),
(27, 16, 19, 1, 4),
(28, 2, 29, 1, 4);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `delcourse_request_instructor`
--

CREATE TABLE `delcourse_request_instructor` (
  `id` int(11) NOT NULL,
  `courseId` int(11) DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `adminId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `delcourse_request_instructor`
--

INSERT INTO `delcourse_request_instructor` (`id`, `courseId`, `reason`, `adminId`) VALUES
(1, 19, 'istiom', 4),
(2, 19, 'istiom yine', 4),
(3, 19, 'sicem', 4);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `delexam_request_instructor`
--

CREATE TABLE `delexam_request_instructor` (
  `id` int(11) NOT NULL,
  `reason` text DEFAULT NULL,
  `adminId` int(11) DEFAULT NULL,
  `examID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `delstudent_lesson`
--

CREATE TABLE `delstudent_lesson` (
  `id` int(11) NOT NULL,
  `courseId` int(11) DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `adminId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `exam`
--

CREATE TABLE `exam` (
  `examID` int(11) NOT NULL,
  `eName` varchar(255) DEFAULT NULL,
  `eDate` date DEFAULT NULL,
  `InstructorId` int(11) NOT NULL,
  `courseId` int(11) DEFAULT NULL,
  `examQuestion` text DEFAULT NULL,
  `adminId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `exam`
--

INSERT INTO `exam` (`examID`, `eName`, `eDate`, `InstructorId`, `courseId`, `examQuestion`, `adminId`) VALUES
(5, 'midterm1', '2022-12-28', 1, 1, 'soru', 4),
(6, 'quiz1', '2023-01-17', 1, 1, 'quiz1 soru', 4),
(7, 'midterm1', '2022-12-28', 1, 1, 'soru', 4),
(8, 'mid1', '2023-01-19', 1, 19, 'aaaa', 4),
(9, 'c101', '2023-01-03', 1, 1, 'c soru', 4),
(10, 'c101', '2023-01-03', 1, 1, 'c soru', 4),
(11, 'midterm1', '2023-01-11', 1, 2, 'a', 4),
(12, 'midterm1', '2023-01-22', 1, 2, 'sssssssssssssssssssss', 4),
(13, 'yeni mid1', '2023-01-29', 1, 1, 'aaaaaaaaaaaaaaaa', 4),
(14, 'quiz1', '2023-01-27', 1, 1, 'aaaaaaaa', 4),
(15, 'quiz1', '2023-01-27', 1, 1, 'aaaaaaaa', 4),
(16, 'midterm1', '2023-01-26', 1, 29, 'phys soru', 4);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `examstudent`
--

CREATE TABLE `examstudent` (
  `id` int(11) NOT NULL,
  `examID` int(11) DEFAULT NULL,
  `InstructorId` int(11) NOT NULL,
  `courseId` int(11) DEFAULT NULL,
  `examNow` text DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `adminId` int(11) DEFAULT NULL,
  `studentId` int(11) DEFAULT NULL,
  `attend` tinyint(1) DEFAULT NULL,
  `is_given` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `examstudent`
--

INSERT INTO `examstudent` (`id`, `examID`, `InstructorId`, `courseId`, `examNow`, `score`, `adminId`, `studentId`, `attend`, `is_given`) VALUES
(25, 8, 1, 19, 'a', 1, 4, 2, 1, 1),
(26, 8, 1, 19, 'cevabım', 0, 4, 16, 1, 0),
(27, 5, 1, 1, 'a', 0, 4, 2, 1, 0),
(28, 16, 1, 29, 'sssss', 0, 4, 2, 1, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `preinstructor`
--

CREATE TABLE `preinstructor` (
  `PreinstructorId` int(11) NOT NULL,
  `iname` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL,
  `adminId` int(11) NOT NULL,
  `is_added` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `preinstructor`
--

INSERT INTO `preinstructor` (`PreinstructorId`, `iname`, `password`, `email`, `role`, `adminId`, `is_added`) VALUES
(1, 'deniz', 'deniz', 'deniz@gmail.com', 'Instructor', 4, 1),
(2, 'nazlı', 'nazlı', 'nazlı@gmail.com', 'Instructor', 4, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`userId`, `username`, `password`, `email`, `role`) VALUES
(1, 'veli', 'veli', 'veli@gmail.com', 'Instructor'),
(2, 'ali', 'aliveli', 'ali@gmail.com', 'Student'),
(3, 'ayşe', 'ayşe', 'ayşe@gmail.com', 'Instructor'),
(4, 'admin', 'asdasd', 'admin@gmail.com', 'Admin'),
(5, 'deneme', 'asdasd', 'deneme@gmail.com', 'Student'),
(14, 'deniz', 'deniz', 'deniz@gmail.com', 'Instructor'),
(16, 'ahmet', 'ahmet', 'ahmet@gmail.com', 'Student');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseId`),
  ADD KEY `instructorId` (`instructorId`);

--
-- Tablo için indeksler `coursestudent`
--
ALTER TABLE `coursestudent`
  ADD PRIMARY KEY (`id`),
  ADD KEY `studentId` (`studentId`),
  ADD KEY `adminId` (`adminId`),
  ADD KEY `instructorId` (`instructorId`),
  ADD KEY `courseId` (`courseId`);

--
-- Tablo için indeksler `delcourse_request_instructor`
--
ALTER TABLE `delcourse_request_instructor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courseId` (`courseId`);

--
-- Tablo için indeksler `delexam_request_instructor`
--
ALTER TABLE `delexam_request_instructor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `examID` (`examID`);

--
-- Tablo için indeksler `delstudent_lesson`
--
ALTER TABLE `delstudent_lesson`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courseId` (`courseId`);

--
-- Tablo için indeksler `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`examID`),
  ADD KEY `courseId` (`courseId`),
  ADD KEY `InstructorId` (`InstructorId`);

--
-- Tablo için indeksler `examstudent`
--
ALTER TABLE `examstudent`
  ADD PRIMARY KEY (`id`),
  ADD KEY `examID` (`examID`),
  ADD KEY `courseId` (`courseId`),
  ADD KEY `InstructorId` (`InstructorId`);

--
-- Tablo için indeksler `preinstructor`
--
ALTER TABLE `preinstructor`
  ADD PRIMARY KEY (`PreinstructorId`),
  ADD KEY `adminId` (`adminId`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `course`
--
ALTER TABLE `course`
  MODIFY `courseId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Tablo için AUTO_INCREMENT değeri `coursestudent`
--
ALTER TABLE `coursestudent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Tablo için AUTO_INCREMENT değeri `delcourse_request_instructor`
--
ALTER TABLE `delcourse_request_instructor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `delexam_request_instructor`
--
ALTER TABLE `delexam_request_instructor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `delstudent_lesson`
--
ALTER TABLE `delstudent_lesson`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `exam`
--
ALTER TABLE `exam`
  MODIFY `examID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Tablo için AUTO_INCREMENT değeri `examstudent`
--
ALTER TABLE `examstudent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Tablo için AUTO_INCREMENT değeri `preinstructor`
--
ALTER TABLE `preinstructor`
  MODIFY `PreinstructorId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`instructorId`) REFERENCES `users` (`userId`);

--
-- Tablo kısıtlamaları `coursestudent`
--
ALTER TABLE `coursestudent`
  ADD CONSTRAINT `courseId` FOREIGN KEY (`courseId`) REFERENCES `course` (`courseId`),
  ADD CONSTRAINT `instructorId` FOREIGN KEY (`instructorId`) REFERENCES `users` (`userId`),
  ADD CONSTRAINT `studentId` FOREIGN KEY (`studentId`) REFERENCES `users` (`userId`);

--
-- Tablo kısıtlamaları `delcourse_request_instructor`
--
ALTER TABLE `delcourse_request_instructor`
  ADD CONSTRAINT `delcourse_request_instructor_ibfk_1` FOREIGN KEY (`courseId`) REFERENCES `course` (`courseId`);

--
-- Tablo kısıtlamaları `delexam_request_instructor`
--
ALTER TABLE `delexam_request_instructor`
  ADD CONSTRAINT `delexam_request_instructor_ibfk_1` FOREIGN KEY (`examID`) REFERENCES `exam` (`examID`);

--
-- Tablo kısıtlamaları `delstudent_lesson`
--
ALTER TABLE `delstudent_lesson`
  ADD CONSTRAINT `delstudent_lesson_ibfk_1` FOREIGN KEY (`courseId`) REFERENCES `coursestudent` (`courseId`);

--
-- Tablo kısıtlamaları `exam`
--
ALTER TABLE `exam`
  ADD CONSTRAINT `exam_ibfk_1` FOREIGN KEY (`courseId`) REFERENCES `course` (`courseId`),
  ADD CONSTRAINT `exam_ibfk_2` FOREIGN KEY (`InstructorId`) REFERENCES `users` (`userId`);

--
-- Tablo kısıtlamaları `examstudent`
--
ALTER TABLE `examstudent`
  ADD CONSTRAINT `examstudent_ibfk_1` FOREIGN KEY (`examID`) REFERENCES `exam` (`examID`),
  ADD CONSTRAINT `examstudent_ibfk_2` FOREIGN KEY (`courseId`) REFERENCES `exam` (`courseId`),
  ADD CONSTRAINT `examstudent_ibfk_3` FOREIGN KEY (`InstructorId`) REFERENCES `exam` (`InstructorId`);

--
-- Tablo kısıtlamaları `preinstructor`
--
ALTER TABLE `preinstructor`
  ADD CONSTRAINT `preinstructor_ibfk_1` FOREIGN KEY (`adminId`) REFERENCES `users` (`userId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
