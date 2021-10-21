-- MySQL dump 10.13  Distrib 5.7.32, for osx10.12 (x86_64)
--
-- Host: localhost    Database: mediatheque
-- ------------------------------------------------------
-- Server version	5.7.32

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_880E0D76F85E0677` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `book`
--

DROP TABLE IF EXISTS `book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_date` date NOT NULL,
  `genre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL,
  `borrower` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `availability` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book`
--

LOCK TABLES `book` WRITE;
/*!40000 ALTER TABLE `book` DISABLE KEYS */;
INSERT INTO `book` VALUES (13,'La compagnie noir','<pre>La Compagnie noire est le titre du premier volet du Cycle de la Compagnie noire et premier tome de la trilogie des Livres du Nord. Cette œuvre paraît en 1984, sous la plume de Glen Cook, un auteur américain célèbre pour ses écrits de science-fiction, de polar et de fantasy.</pre>','Glen Cook','1984-05-15','Roman; Science-fiction','6170739cbd2b4349331783.jpg','2021-10-20 19:53:00','Gmay','2'),(14,'Dune','<pre>Dune est un roman de science-fiction de l\'écrivain Frank Herbert, publié aux États-Unis en 1965. Il s\'agit du premier roman du cycle de Dune. Publié à l\'origine sous forme de deux publications distinctes dans le magazine Analog en 1963-1964, c\'est le roman de science-fiction le plus vendu au monde.</pre>','Franck Herbert','1965-08-01','Roman; Science-fiction','61707495168a4611800730.jpg','2021-10-20 19:57:09','Gmay','1'),(15,'Blade Runner','<pre>Les androïdes rêvent-ils de moutons électriques ? est un roman de science-fiction écrit par Philip K. Dick en 1966 et publié deux ans plus tard aux États-Unis. Il est publié en français pour la première fois en 1976 par les éditions Champ libre, dans la collection « Chute libre ».</pre>','Phillip K. Dick','1968-10-01','Roman; Science-fiction','6170751866eed338769466.jpg','2021-10-20 19:59:20','Gmay','1'),(16,'La horde du contrevent','<pre>La Horde du Contrevent est un roman de science-fantasy écrit par Alain Damasio et publié aux éditions La Volte en 2004. Dans sa première édition, le livre était accompagné d\'un CD qui en constituait la « bande originale ».</pre>','Alain Damasio','2004-11-21','Roman; Science-fiction','6170759d26ca6394348348.jpg','2021-10-20 20:01:33','Gmay','2'),(17,'Les fourmis','<pre>Les Fourmis est un roman animalier de « philosophie fiction » écrit par Bernard Werber, paru en France en 1991 chez Albin Michel. Il s\'agit du premier tome de La Trilogie des fourmis.</pre>','Bernard Werber','1991-11-21','Roman animalier','6170767bd2043287837877.jpg','2021-10-20 20:05:15',NULL,'1'),(18,'La voie des rois','<pre>La Voie des rois est un roman de fantasy de Brandon Sanderson, paru en 2010 aux États-Unis puis en 2015 en français. C’est le premier tome d’une série prévue pour compter dix livres consacrés au monde de Roshar et intitulée Les Archives de Roshar.</pre>','Brandon Sanderson','2010-08-31','Roman; Fantasy','61707700f3ebe740450347.jpg','2021-10-20 20:07:28',NULL,'1'),(19,'Le Seigneur des anneaux (Tome 3) : Le Retour du Roi','<pre>La dernière partie du Seigneur des Anneaux voit la fin de la quête de Frodo en Terre du Milieu. Le Retour du Roi raconte la stratégie désespérée de Gandalf face au Seigneur des Anneaux, jusqu’à ...</pre>','J. R. R. Tolkien','1954-07-29','Roman','617077d0a0aef529383479.jpg','2021-10-20 20:10:56',NULL,'1');
/*!40000 ALTER TABLE `book` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `borrower`
--

DROP TABLE IF EXISTS `borrower`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `borrower` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_checked` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_DB904DB4F85E0677` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `borrower`
--

LOCK TABLES `borrower` WRITE;
/*!40000 ALTER TABLE `borrower` DISABLE KEYS */;
INSERT INTO `borrower` VALUES (4,'gaelmayer@yahoo.fr','Gael','Mayer','2016-01-01','[]','$2y$13$Yuj5Fe58EpdpOCMQazOi8e465/SbM6KzIip3XATxkSE1DG44dFjBm','4 rue Dunois','',0),(5,'gaelmayer@yahoo.fr','Edgar','Poe','2022-05-06','[\"ROLE_READER\"]','$2y$13$nRHDy5UAruhf/T/UmCtkXu6tgbhv2FgaucHDPFQAh1ch/jD/v0Kr.','4 rue Dunois','Epoe',0),(6,'john.doe@mail.fr','John','Doe','2018-03-03','[]','$2y$13$UxtjSYmDqucZvjWW4aTXxuDcgBHRzZ.6lfWA9mJUQp4mwkehLSaki','4 rue Dunois','Gmay',1);
/*!40000 ALTER TABLE `borrower` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctrine_migration_versions`
--

LOCK TABLES `doctrine_migration_versions` WRITE;
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
INSERT INTO `doctrine_migration_versions` VALUES ('DoctrineMigrations\\Version20211009164119','2021-10-09 16:47:11',277),('DoctrineMigrations\\Version20211010152556','2021-10-10 15:27:04',70),('DoctrineMigrations\\Version20211010154904','2021-10-10 15:49:13',154),('DoctrineMigrations\\Version20211010171703','2021-10-10 17:17:13',231),('DoctrineMigrations\\Version20211013172711','2021-10-13 17:27:25',217),('DoctrineMigrations\\Version20211015160934','2021-10-15 16:09:52',264),('DoctrineMigrations\\Version20211015161637','2021-10-15 16:16:46',257),('DoctrineMigrations\\Version20211015170311','2021-10-15 17:03:16',279),('DoctrineMigrations\\Version20211016092808','2021-10-16 09:30:08',314),('DoctrineMigrations\\Version20211016094703','2021-10-16 10:00:28',168),('DoctrineMigrations\\Version20211016113703','2021-10-16 11:37:51',156),('DoctrineMigrations\\Version20211016210239','2021-10-16 21:08:18',180),('DoctrineMigrations\\Version20211016210802','2021-10-16 21:08:18',10),('DoctrineMigrations\\Version20211016211045','2021-10-16 21:10:55',154),('DoctrineMigrations\\Version20211017212627','2021-10-17 21:26:38',299),('DoctrineMigrations\\Version20211018140125','2021-10-18 14:01:36',315),('DoctrineMigrations\\Version20211018174924','2021-10-18 17:49:43',375),('DoctrineMigrations\\Version20211019085525','2021-10-19 08:55:39',278),('DoctrineMigrations\\Version20211019142811','2021-10-19 14:28:18',145),('DoctrineMigrations\\Version20211019143102','2021-10-19 14:31:08',186),('DoctrineMigrations\\Version20211019170735','2021-10-19 17:07:43',207),('DoctrineMigrations\\Version20211019192801','2021-10-19 19:28:11',282),('DoctrineMigrations\\Version20211020182316','2021-10-20 18:28:28',218),('DoctrineMigrations\\Version20211020190442','2021-10-20 19:04:47',191),('DoctrineMigrations\\Version20211020193303','2021-10-20 19:33:08',155),('DoctrineMigrations\\Version20211020193843','2021-10-20 19:38:49',90),('DoctrineMigrations\\Version20211020194335','2021-10-20 19:43:41',205),('DoctrineMigrations\\Version20211021183130','2021-10-21 18:31:40',219);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_426EF392F85E0677` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff`
--

LOCK TABLES `staff` WRITE;
/*!40000 ALTER TABLE `staff` DISABLE KEYS */;
INSERT INTO `staff` VALUES (1,'Jvlajean','[]','$2y$13$9BPYq5.MyTPRIaUpnsiam.q0EcuG7kw4CBOQVcnETNR6G/3BMY/k2','Jean','Vlajean');
/*!40000 ALTER TABLE `staff` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-10-21 21:38:01
