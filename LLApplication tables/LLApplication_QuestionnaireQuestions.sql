-- MySQL dump 10.13  Distrib 8.0.29, for Win64 (x86_64)
--
-- Host: lms-production.chyuyfoavfuw.eu-central-1.rds.amazonaws.com    Database: LLApplication
-- ------------------------------------------------------
-- Server version	5.7.38-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
SET @MYSQLDUMP_TEMP_LOG_BIN = @@SESSION.SQL_LOG_BIN;
SET @@SESSION.SQL_LOG_BIN= 0;

--
-- GTID state at the beginning of the backup 
--

SET @@GLOBAL.GTID_PURGED=/*!80000 '+'*/ '';

--
-- Table structure for table `QuestionnaireQuestions`
--

DROP TABLE IF EXISTS `QuestionnaireQuestions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `QuestionnaireQuestions` (
  `ID` int(11) unsigned NOT NULL,
  `QuestionText` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `QuestionText_UNIQUE` (`QuestionText`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `QuestionnaireQuestions`
--

LOCK TABLES `QuestionnaireQuestions` WRITE;
/*!40000 ALTER TABLE `QuestionnaireQuestions` DISABLE KEYS */;
INSERT INTO `QuestionnaireQuestions` VALUES (11,'Can you commit to stay on campus for three months and are you willing to put in at least 50 hours per week for courses and private study?'),(4,'Did you finish your education?'),(12,'Do you have any current or future responsibilities (school, work, etc.) that would prevent you from attending classes from 8.30am to 7pm Monday through Friday for 3 months?'),(25,'Do you have any documents (for example a CV, certificates, drawing samples, etc.) that might be relevant? If yes, please hand them over together with this application form.'),(13,'Do you have children aged 2-4 years old and require help from Learning Lions to help you facilitate care during the day for them, so that you can attend classes from 8.30am to 7pm?'),(22,'Do you have drawing, photography, film or any other creative skills?'),(3,'Have you been diagnosed as suffering from any type of physical or mental impairment?'),(1,'How did you hear about Learning Lions?'),(21,'How do you plan to use the skills that you have learned at Learning Lions after the course is finished?'),(10,'How interested are you in learning more about: Business & Communication?'),(8,'How interested are you in learning more about: Computer programming?'),(9,'How interested are you in learning more about: Film & Video editing?'),(7,'How interested are you in learning more about: Graphic and web design'),(23,'If Yes, indicate precisely which are those skills and give us some more details here below. Also attach to your application, sample(s) of your work'),(14,'Name and age of your children'),(17,'Please describe your previous experience using computers/technology.'),(24,'Please include at least one reference. Include name, your relationship and the phone number where they can be reached.'),(20,'What are your future plans in 2-3 years time from now?'),(18,'What is something or someone in technology that inspires you?'),(19,'What is something that you have accomplished that you are very proud of?'),(2,'What is the highest level of education you have completed?'),(6,'What prevented you from continuing with your education?'),(5,'Which year did you finish your Education?'),(15,'Why are you interested in joining the Learning Lions 3-month course?'),(16,'Why is having knowledge and skills in Information & Communications Technology (ICT) important?');
/*!40000 ALTER TABLE `QuestionnaireQuestions` ENABLE KEYS */;
UNLOCK TABLES;
SET @@SESSION.SQL_LOG_BIN = @MYSQLDUMP_TEMP_LOG_BIN;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-10-05 15:17:25
