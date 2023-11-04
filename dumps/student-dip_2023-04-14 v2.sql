# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.01 (MySQL 5.7.41)
# Database: student-dip
# Generation Time: 2023-04-14 10:25:10 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table testing_categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `testing_categories`;

CREATE TABLE `testing_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `testing_categories` WRITE;
/*!40000 ALTER TABLE `testing_categories` DISABLE KEYS */;

INSERT INTO `testing_categories` (`id`, `title`, `desc`, `created_at`, `updated_at`)
VALUES
	(1,'Тесты для зрения','Тесты для проверки зрения','2023-04-05 13:55:42','2023-04-14 08:35:55'),
	(2,'Другие','Другие','2023-04-13 11:01:06','2023-04-13 11:01:06');

/*!40000 ALTER TABLE `testing_categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table testing_users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `testing_users`;

CREATE TABLE `testing_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `test_id` int(10) unsigned NOT NULL,
  `answer` varchar(255) CHARACTER SET utf8mb4 NOT NULL DEFAULT '',
  `answer_result` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `answer_description` text COLLATE utf8mb4_unicode_ci,
  `answer_recommendations` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `testing_users` WRITE;
/*!40000 ALTER TABLE `testing_users` DISABLE KEYS */;

INSERT INTO `testing_users` (`id`, `user_id`, `test_id`, `answer`, `answer_result`, `answer_description`, `answer_recommendations`, `created_at`, `updated_at`)
VALUES
	(1,1,1,'[\"96\",\"9\"]','ваще крутяк',NULL,'ваще крутяк','2023-04-13 08:45:24','2023-04-13 08:45:24'),
	(2,1,2,'[\"\\u25b3 \\u0438 \\u25cb\",\"\\u25b3\"]','2','круто','круто','2023-04-13 09:52:38','2023-04-13 09:52:38'),
	(3,1,3,'\"1\"','1','отлично','отлично','2023-04-13 10:08:35','2023-04-13 10:08:35'),
	(4,1,4,'\"15\"','15','ну так','ну так','2023-04-13 10:28:22','2023-04-13 10:28:22'),
	(5,1,4,'\"31\"','31','отлично','отлично','2023-04-13 10:28:31','2023-04-13 10:28:31'),
	(11,1,6,'\"33\"','33','на много лучше','на много лучше','2023-04-14 08:25:18','2023-04-14 08:25:18'),
	(12,1,6,'\"23\"','23','лучше','лучше','2023-04-14 08:25:48','2023-04-14 08:25:48'),
	(13,1,6,'\"23\"','23','лучше','лучше','2023-04-14 08:27:36','2023-04-14 08:27:36'),
	(14,1,6,'\"23\"','23','лучше','лучше','2023-04-14 08:28:56','2023-04-14 08:28:56'),
	(15,1,6,'\"50\"','50','вообще круто','вообще круто','2023-04-14 08:30:34','2023-04-14 08:30:34');

/*!40000 ALTER TABLE `testing_users` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table testings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `testings`;

CREATE TABLE `testings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `published` tinyint(4) NOT NULL DEFAULT '1',
  `answer_input_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `result_variants` longtext CHARACTER SET utf8mb4 NOT NULL,
  `questions` longtext CHARACTER SET utf8mb4 NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `testings` WRITE;
/*!40000 ALTER TABLE `testings` DISABLE KEYS */;

INSERT INTO `testings` (`id`, `title`, `category_id`, `content`, `published`, `answer_input_type`, `result_variants`, `questions`, `photo`, `created_at`, `updated_at`)
VALUES
	(1,'Тест на цветовосприятие - Цифры',1,'<p>asdfadsf</p>',1,'input_from_image','[{\"variant\": \"1\", \"description\": \"круто\", \"recommendations\": \"круто \"}, {\"variant\": \"2\", \"description\": \"ваще крутяк\", \"recommendations\": \"ваще крутяк\"}]','[{\"image\": \"/storage/testing_images/1/0.jpg\", \"title\": \"Что вы видите на картинке?\", \"answerVariants\": [{\"title\": \"9,6\", \"result\": \"9,6\"}]}, {\"image\": \"/storage/testing_images/1/1.jpg\", \"title\": \"Что вы видите на картинке?\", \"answerVariants\": [{\"title\": \"9\", \"result\": \"9\"}]}]','1-1681461499-tg2x6hv9jr.jpg','2023-04-13 08:40:08','2023-04-14 08:38:19'),
	(2,'Тест на цветовосприятие Фигуры',1,'<p>Людям с дефицитом цветового зрения трудно идентифицировать и различать определенные цвета. Иногда это называют &laquo;дальтонизмом&raquo;, хотя полная неспособность видеть какой-либо цвет (дальтонизм) встречается очень редко.</p>\r\n<p>Дефицит цветового зрения обычно передается ребенку от родителей (по наследству) и присутствует с рождения, хотя иногда может развиться и в более позднем возрасте. Большинство людей способны адаптироваться к дефициту цветового зрения, и это редко является признаком чего-либо серьезного.</p>\r\n<p>Дальтонизм, или цветовая слепота, &ndash; заболевание, приводящее к нарушению восприятия цветов. Объясняется подобная ситуация отсутствием одного из трех пигментов (красного, зеленого или синего), при комбинации которых проявляется существующее многообразие цветов и оттенков.</p>',1,'radio_from_image','[{\"variant\": \"1\", \"description\": \"неплохо\", \"recommendations\": \"неплохо\"}, {\"variant\": \"2\", \"description\": \"круто\", \"recommendations\": \"круто\"}]','[{\"image\": \"/storage/testing_images/2/0.jpg\", \"title\": \"Выберите \", \"answerVariants\": [{\"title\": \"△ и ○, △ , ○, ничего не вижу\", \"result\": \"△,○\"}]}, {\"image\": \"/storage/testing_images/2/1.jpg\", \"title\": \"Выберите \", \"answerVariants\": [{\"title\": \"△, ничего не вижу\", \"result\": \"△\"}]}]','1681375827-wkxhwxicyw.jpg','2023-04-13 08:50:27','2023-04-14 08:37:44'),
	(3,'Тест амслера',1,'<p>С помощью теста Амслера можно выполнить быструю проверку зрения на наличие патологий центрального участка глазной сетчатки, макулодистрофии глаза.</p>\r\n<h2 data-num-link=\"1\">Основные сведения</h2>\r\n<p>Тест Амслера используется в исследовании остроты зрения. Благодаря простоте этого метода он может применяться не только во время консультации окулиста, но и самостоятельно. Для проведения данного теста используется решетка (сетка) Амслера &ndash; десятисантиметровый квадрат с удаленными друг от дружки на полсантиметра прямыми линиями. В центре этого квадрата находится точка.</p>\r\n<h2 data-num-link=\"2\">Процедура проверки</h2>\r\n<p>Чтобы выполнить тест Амслера, надо поместить лист с нарисованной на нем решеткой Амслера в тридцати сантиметрах от глаз.</p>\r\n<figure class=\"wp-block-image\"><img class=\"wp-image-1342\" src=\"https://xn--80aaoaijp1bgbu5n.xn--p1ai/wp-content/uploads/2020/04/2.jpg\" sizes=\"(max-width: 450px) 100vw, 450px\" srcset=\"https://xn--80aaoaijp1bgbu5n.xn--p1ai/wp-content/uploads/2020/04/2.jpg 450w, https://xn--80aaoaijp1bgbu5n.xn--p1ai/wp-content/uploads/2020/04/2-150x150.jpg 150w, https://xn--80aaoaijp1bgbu5n.xn--p1ai/wp-content/uploads/2020/04/2-300x300.jpg 300w\" alt=\"\" width=\"450\" height=\"450\" /></figure>\r\n<p>Затем нужно прикрыть один глаз ладонью (не надавливая на него) и посмотреть вторым глазом на находящуюся в центре квадрата точку в течение нескольких секунд, закрыть открытый глаз, открыть закрытый глаз и снова глядеть на эту точку на протяжении нескольких секунд.</p>\r\n<h2 data-num-link=\"3\">Итоги тестирования:</h2>\r\n<figure class=\"wp-block-image\"><img class=\"wp-image-1344\" src=\"https://xn--80aaoaijp1bgbu5n.xn--p1ai/wp-content/uploads/2020/04/2-2.jpg\" sizes=\"(max-width: 262px) 100vw, 262px\" srcset=\"https://xn--80aaoaijp1bgbu5n.xn--p1ai/wp-content/uploads/2020/04/2-2.jpg 450w, https://xn--80aaoaijp1bgbu5n.xn--p1ai/wp-content/uploads/2020/04/2-2-150x150.jpg 150w, https://xn--80aaoaijp1bgbu5n.xn--p1ai/wp-content/uploads/2020/04/2-2-300x300.jpg 300w\" alt=\"\" width=\"262\" height=\"262\" /></figure>\r\n<p class=\"has-text-align-left\">картинка 1</p>\r\n<p class=\"has-text-align-left\">Если все линии, расположенные на сетке Амслера, выглядят ровно, не имеют никаких искажений, не искривляются, то тест Амслера говорит об отсутствии патологии глазной сетчатки.</p>\r\n<figure class=\"wp-block-image\"><img class=\"wp-image-1345\" src=\"https://xn--80aaoaijp1bgbu5n.xn--p1ai/wp-content/uploads/2020/04/2-12.jpg\" sizes=\"(max-width: 267px) 100vw, 267px\" srcset=\"https://xn--80aaoaijp1bgbu5n.xn--p1ai/wp-content/uploads/2020/04/2-12.jpg 267w, https://xn--80aaoaijp1bgbu5n.xn--p1ai/wp-content/uploads/2020/04/2-12-150x150.jpg 150w\" alt=\"\" width=\"267\" height=\"267\" /></figure>\r\n<p>картинка 2</p>\r\n<figure class=\"wp-block-image\"><img class=\"wp-image-1346\" src=\"https://xn--80aaoaijp1bgbu5n.xn--p1ai/wp-content/uploads/2020/04/2-13.jpg\" sizes=\"(max-width: 267px) 100vw, 267px\" srcset=\"https://xn--80aaoaijp1bgbu5n.xn--p1ai/wp-content/uploads/2020/04/2-13.jpg 267w, https://xn--80aaoaijp1bgbu5n.xn--p1ai/wp-content/uploads/2020/04/2-13-150x150.jpg 150w\" alt=\"\" width=\"267\" height=\"267\" /></figure>\r\n<p>картинка 3</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>',1,'input','[{\"variant\": \"1\", \"description\": \"отлично\", \"recommendations\": \"отлично\"}, {\"variant\": \"2\", \"description\": \"неплохо\", \"recommendations\": \"неплохо\"}, {\"variant\": \"3\", \"description\": \"нужно по работать\", \"recommendations\": \"нужно по работать\"}]','[{\"title\": \"Введите номре картинки\", \"answerVariants\": []}]','1681380121-mlrktxxvoy.jpeg','2023-04-13 10:02:01','2023-04-14 08:38:47'),
	(5,'Другой тест',2,'<p>Другие тесты&nbsp;&nbsp;</p>',1,'empty','[]','[]','5-1681384043-0fqofusbyr.jpg','2023-04-13 11:05:39','2023-04-14 08:44:35'),
	(6,'Тест на цветовосприятие: дихромат, трихромат или тетрахромат',1,'<p>После жарких холиваров о цвете платья, которое одним казалось сине-чёрным, а другим &ndash; бело-золотым, многим стало очевидно, что не все мы видим мир одинаково. К примеру, некоторые люди не различают разницу между алым и винным оттенками &ndash; для них это просто красный цвет.</p>\r\n<p>В действительности всё сводится к количеству фоточувствительных рецепторов (их назыают колбочками), находящихся в сетчатке Ваших глаз. Ученые разработали интересный тест, с помощью которого можно определить, сколько таких колбочек есть у Вас.</p>\r\n<p>Чтобы получить результат тестирования и узнать кто Вы, дихромат, трихромат или тетрахромат, посчитайте количество полосок разного цвета, которые Вам удалось различить на картинке ниже.</p>\r\n<div class=\"ptn-test-question h4 text-center my-0 py-3\">Посмотрите на картинку и посчитайте сколько цветных полосок Вы можете различить</div>\r\n<div class=\"ptn-test-image text-center my-3\">&nbsp;</div>',1,'input_from_image','[{\"variant\": \"0-20\", \"description\": \"ну так\", \"recommendations\": \"ну так\"}, {\"variant\": \"20-32\", \"description\": \"лучше\", \"recommendations\": \"лучше\"}, {\"variant\": \"32-39\", \"description\": \"на много лучше\", \"recommendations\": \"на много лучше\"}, {\"variant\": \"39-100\", \"description\": \"вообще круто\", \"recommendations\": \"вообще круто\"}]','[{\"image\": \"/storage/testing_images/6/0.jpg\", \"title\": \"Посмотрите на картинку и посчитайте сколько цветных полосок Вы можете различить Онлайн тест на цветовосприятие: дихромат, трихромат или тетрахромат\", \"answerVariants\": []}]','1681460372-vwpdb1ghjt.jpg','2023-04-14 08:19:32','2023-04-14 08:19:32');

/*!40000 ALTER TABLE `testings` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
