# Host: localhost  (Version: 5.5.8-log)
# Date: 2014-02-23 14:28:23
# Generator: MySQL-Front 5.3  (Build 4.13)

/*!40101 SET NAMES utf8 */;

#
# Source for table "amir_zone"
#

DROP TABLE IF EXISTS `amir_zone`;
CREATE TABLE `amir_zone` (
  `id_zone` int(11) NOT NULL AUTO_INCREMENT,
  `zone` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  PRIMARY KEY (`id_zone`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

#
# Data for table "amir_zone"
#

INSERT INTO `amir_zone` VALUES (1,'پردیسان'),(2,'شهرک قدس'),(3,'سالاریه'),(4,'دانیال'),(5,'صفاشهر'),(6,'شهرک امام خمینی'),(7,'آذر'),(8,'باجک'),(9,'کلهری'),(10,'بلوار امین'),(11,'پیام نور'),(12,'جمهوری'),(13,'زنبیل آباد '),(14,'صفاییه'),(15,'دورشهر'),(16,'سمیه'),(17,'امام'),(18,'چهارمردان'),(19,'نیروگاه'),(20,'15خرداد'),(21,'خاکفرج'),(22,'عماریاسر'),(23,'ساحلی'),(24,'شاه ابراهیم'),(25,'بهشتی'),(26,'آزادگان'),(27,'سعیدی'),(28,'بنیاد'),(29,'هنرستان'),(30,'خلجستان'),(31,'کهک'),(32,'معلم'),(33,'دستگرد'),(38,'20 متری امام حسین'),(39,' 20 متری زاد'),(40,'30 متری قایم'),(41,'30 متری کیوانفر'),(42,'30 متری هنرستان'),(43,'72 تن'),(44,'ارم'),(45,'بازار'),(46,'بلوار الغدیر'),(47,'بلوار کشاورز'),(48,'توحید'),(49,'تولیددارو'),(50,'جاده قدیم قم-تهران'),(51,'جمکران'),(52,'خیابان اراک'),(53,'روستای راهجرد'),(54,'روستای سراجه'),(55,'روستای خاوه'),(56,'روستای میم'),(57,'روستای فردو'),(58,'روستای وشنوه'),(59,'روستای قمردد'),(60,'روستای قنوات'),(61,'روستای مبارک آباد'),(62,'روستای ورجان'),(63,'زاویه'),(64,'عطاران'),(65,'قلعه کامکار'),(66,'میدان پلیس'),(67,'میدان مطهری'),(68,'گلزار'),(69,'نامشخص');

#
# Source for table "category_jobs"
#

DROP TABLE IF EXISTS `category_jobs`;
CREATE TABLE `category_jobs` (
  `id_job` int(11) NOT NULL AUTO_INCREMENT,
  `name_cat` varchar(255) COLLATE utf8_persian_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id_job`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

#
# Data for table "category_jobs"
#

INSERT INTO `category_jobs` VALUES (1,'آرایشگاه زنانه و مردانه'),(2,'اسباب بازی'),(3,'آژانس مسکن'),(4,'آژانس مسافرتی'),(5,'آموزشگاه کامپیوتر'),(6,'آموزشگاه زبان'),(7,'آموزشگاه های فنی و حرفه ای'),(8,'آموزشگاه های دیگر'),(9,'بازرگانی'),(10,'انواع پوشاک و لباس مجالس'),(11,'تابلو و قاب'),(12,'تجهیزات گرما زا و سرما زا'),(13,'تعاونی مصرف'),(14,'خدمات بیمه'),(15,'خدمات تفریحی'),(16,'خدمات خودرو و تعمیر کاران'),(17,'خدمات دارو و درمان'),(18,'خدمات ساختمانی'),(19,'خدمات عکس و فیلم'),(20,'خدمات موتور و دوچرخه'),(21,'خدمات و پوشاک ورزشی'),(22,'خدمات کامپیوتر و لب تاپ'),(23,'خرازی'),(24,'رنگ و ابزار و یراق'),(25,'شیشه بری'),(26,'صرافی'),(27,'طلا,جواهر,ساعت,سکه ونقره'),(28,'عینک سازی و خدمات عینک'),(29,'فروش حیوانات'),(30,'فروشگاه چند منظوره'),(31,'فروشگاه های زنجیره ای'),(32,'خدمات مجالس'),(33,'کانون های تبلیغاتی'),(34,'کتاب'),(35,'پخش مواد غذایی'),(36,'پیتزا فروشی'),(37,'رستوران و طباخی'),(38,'کیف , کفش و صنایع چرم '),(39,'گل فروشی'),(40,'لوازم التحریر و ماشینهای اداری'),(41,'لوازم الکتریکی و الکترونیکی'),(42,'لوازم ایمنی و آتش نشانی'),(43,'لوازم آرایشی و بهداشتی وعطریات'),(44,'لوازم خانگی وصوتی تصویری'),(45,'لوازم کشاورزی و سموم'),(46,'لوازم موسیقی'),(47,'هتل'),(48,'منسوجات و فرش'),(49,'نمایندگی های مجاز'),(50,'موبایل'),(51,'مواد غذایی'),(52,'کاریابی'),(53,'دفاتر حقوقی و اسناد رسمی'),(54,'قنادی,شیرینی و شکلات'),(55,'تدریس خصوصی کامپیوتر'),(56,'تدریس خصوصی زبان'),(57,'فروشگاه پلاستیک'),(58,'فروشگاه سوهان');

#
# Source for table "contact_qom"
#

DROP TABLE IF EXISTS `contact_qom`;
CREATE TABLE `contact_qom` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `matn` text COLLATE utf8_persian_ci,
  `name` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

#
# Data for table "contact_qom"
#


#
# Source for table "ejobs_qom"
#

DROP TABLE IF EXISTS `ejobs_qom`;
CREATE TABLE `ejobs_qom` (
  `number_job` int(11) NOT NULL AUTO_INCREMENT,
  `id_zone` int(11) NOT NULL DEFAULT '0',
  `id_job` int(11) NOT NULL DEFAULT '0',
  `title_job` varchar(255) COLLATE utf8_persian_ci NOT NULL DEFAULT '',
  `matn_job` text CHARACTER SET utf8 NOT NULL,
  `id_user` int(11) DEFAULT '0',
  `name_qom` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `family_qom` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `name_shoping` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `tel_job` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `address_job` text CHARACTER SET utf8,
  `fax_job` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `email_job` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `mobile_job` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `img_job` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `img_slide` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `count_viewer` int(11) NOT NULL DEFAULT '0',
  `confirm_job` tinyint(3) NOT NULL DEFAULT '0',
  `date_insert` date DEFAULT '0000-00-00',
  `expire_job` varchar(255) COLLATE utf8_persian_ci NOT NULL DEFAULT '',
  `price_status` tinyint(3) NOT NULL DEFAULT '0',
  `website` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `like1` int(11) NOT NULL DEFAULT '0',
  `pay_variz` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `resid_pay` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `number_hesab` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `active` tinyint(3) DEFAULT '0',
  PRIMARY KEY (`number_job`),
  UNIQUE KEY `resid_pay` (`resid_pay`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

#
# Data for table "ejobs_qom"
#


#
# Source for table "order_web"
#

DROP TABLE IF EXISTS `order_web`;
CREATE TABLE `order_web` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `family` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `matn` text COLLATE utf8_persian_ci,
  `tel` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

#
# Data for table "order_web"
#


#
# Source for table "user_qom"
#

DROP TABLE IF EXISTS `user_qom`;
CREATE TABLE `user_qom` (
  `id_user_qom` int(11) NOT NULL AUTO_INCREMENT,
  `username_qom` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `password_qom` varchar(255) COLLATE utf8_persian_ci NOT NULL DEFAULT '',
  `email` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  PRIMARY KEY (`id_user_qom`),
  UNIQUE KEY `username_qom` (`username_qom`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

#
# Data for table "user_qom"
#

