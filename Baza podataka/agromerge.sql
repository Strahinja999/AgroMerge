-- MySQL dump 10.13  Distrib 8.0.27, for Win64 (x86_64)
--
-- Host: localhost    Database: agromerge
-- ------------------------------------------------------
-- Server version	8.0.27

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

--
-- Table structure for table `fizicko_lice`
--

DROP TABLE IF EXISTS `fizicko_lice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fizicko_lice` (
  `IdKorFL` int NOT NULL,
  `ime` varchar(20)  NOT NULL,
  `prezime` varchar(20) NOT NULL,
  `telefon` varchar(20)  NOT NULL,
  `email` varchar(100) NOT NULL,
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `IdKorFL` (`IdKorFL`),
  CONSTRAINT `IdKorFL` FOREIGN KEY (`IdKorFL`) REFERENCES `korisnik` (`IdKor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fizicko_lice`
--

LOCK TABLES `fizicko_lice` WRITE;
/*!40000 ALTER TABLE `fizicko_lice` DISABLE KEYS */;
INSERT INTO `fizicko_lice` VALUES (5,'Ilija','Markovic','0695554488','ilijam@gmail.com'),(9,'Luka','Niksic','0657894251','niksic97@gmail.com');
/*!40000 ALTER TABLE `fizicko_lice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `korisnik`
--

DROP TABLE IF EXISTS `korisnik`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `korisnik` (
  `IdKor` int NOT NULL AUTO_INCREMENT,
  `korisnickoIme` varchar(20) NOT NULL,
  `lozinka` varchar(20) NOT NULL,
  `tipKorisnika` int NOT NULL COMMENT '1 - Proizvođač\n2 - Fizičko lice\n3 - Pravno lice\n4 - Moderator',
`odobreno` int DEFAULT NULL COMMENT '1-odobreno, 0-nije odobreno',
  PRIMARY KEY (`IdKor`),
  UNIQUE KEY `korisnickoIme_UNIQUE` (`korisnickoIme`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `korisnik`
--

LOCK TABLES `korisnik` WRITE;
/*!40000 ALTER TABLE `korisnik` DISABLE KEYS */;
INSERT INTO `korisnik` VALUES (1,'caki99','sifra123',4,1),(2,'ninc','sifra123',5,1),(3,'maka','sifra123',4,1),(4,'djole','sifra123',5,1),(5,'ika','sif123',2,1),(6,'agroSystem','sif123',1,1),(7,'kafanica','sif123',3,1),(8,'mitic','sif123',1,1),(9,'lukaa','sif123',2,1),(10,'piazza','sif123',3,1),(11,'bojovic','sif123',1,1);
/*!40000 ALTER TABLE `korisnik` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `korpa`
--

DROP TABLE IF EXISTS `korpa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `korpa` (
  `IdKorpa` int NOT NULL AUTO_INCREMENT,
  `IdPro` int NOT NULL,
  `kolicina` int NOT NULL,
  `IdKorisnik` int NOT NULL,
  PRIMARY KEY (`IdKorpa`),
  KEY `IdPro_idx` (`IdPro`),
  KEY `IdKorisnik_idx` (`IdKorisnik`),
  CONSTRAINT `IdKorisnik` FOREIGN KEY (`IdKorisnik`) REFERENCES `korisnik` (`IdKor`),
  CONSTRAINT `IdPro` FOREIGN KEY (`IdPro`) REFERENCES `proizvod` (`IdPro`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `korpa`
--

LOCK TABLES `korpa` WRITE;
/*!40000 ALTER TABLE `korpa` DISABLE KEYS */;
INSERT INTO `korpa` VALUES (1,1,10,5),(2,2,10,5),(3,2,10,9),(4,3,10,9),(5,6,20,7),(6,7,20,7),(7,6,10,10),(8,7,10,10);
/*!40000 ALTER TABLE `korpa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pravno_lice`
--

DROP TABLE IF EXISTS `pravno_lice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pravno_lice` (
  `IdKorPL` int NOT NULL,
  `nazivFirme` varchar(20) NOT NULL,
  `pib` varchar(9) NOT NULL,
  `telefon` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
`odobreno` int DEFAULT NULL COMMENT '1-odobreno, 2-nije odobreno',
  UNIQUE KEY `pib_UNIQUE` (`pib`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `IdKorPL` (`IdKorPL`),
  CONSTRAINT `IdKorPL` FOREIGN KEY (`IdKorPL`) REFERENCES `korisnik` (`IdKor`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pravno_lice`
--

LOCK TABLES `pravno_lice` WRITE;
/*!40000 ALTER TABLE `pravno_lice` DISABLE KEYS */;
INSERT INTO `pravno_lice` VALUES (10,'Restoran Piazza','105124788','011447756','piazza@gmail.com',1),(7,'Kafanica d.o.o','105768129','011333555','kafanica1997@gmail.com',1);
/*!40000 ALTER TABLE `pravno_lice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proizvod`
--

DROP TABLE IF EXISTS `proizvod`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `proizvod` (
  `IdPro` int NOT NULL AUTO_INCREMENT,
  `kategorija` varchar(20) NOT NULL,
  `naziv` varchar(20) NOT NULL,
  `slika` varchar(200)  DEFAULT NULL COMMENT 'Slika će da predstavlja URL link do slike',
  `opis` varchar(200) DEFAULT NULL,
  `cenaFizicko` double NOT NULL,
  `cenaPravno` double NOT NULL,
  `kolicina` int NOT NULL,
  `IdProizv` int NOT NULL,
  PRIMARY KEY (`IdPro`),
  KEY `IdProizv_idx` (`IdProizv`),
  CONSTRAINT `IdProizv` FOREIGN KEY (`IdProizv`) REFERENCES `proizvodjac` (`IdKorP`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proizvod`
--

LOCK TABLES `proizvod` WRITE;
/*!40000 ALTER TABLE `proizvod` DISABLE KEYS */;
INSERT INTO `proizvod` VALUES (1,'Povrće','Zelena salata','https://totallywellness.rs/wp-content/uploads/2020/05/agence-producteurs-locaux-damien-kuhn-fd05H8aHoXY-unsplash.jpg','Sveža, neprskana zelena salata. Uzgajana po najviš¡im poljoprivrednim standardima.',30,25,100,6),(2,'Povrće','Paradajz','http://www.agromedia.rs/chest/images/Konus%20Glorija/konus_2.png','Domaći paradajz uzgajan na nasim farmama. Naši proizvodi su uzgajani po najviš¡im evropskim standardima.',280,250,200,6),(3,'Povrće','Krastavac','https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcShOVMUqBX5yEECepfzmrH2nMF2Z83zUcPw_MwTL5jeuSDkWwAh6NJ8xQ_Cj_m7FJl7juI&usqp=CAU','Krastavac uzgajan na našim farmama po najvš¡im evropskim standardima.',140,100,200,6),(4,'Žitarice','Kukuruz','https://www.boljazemlja.com/wp-content/uploads/2018/11/rsz_shutterstock_782617264.jpg','Neprskan kukuruz, pakovan u dzakove od 50kg.',40,30,100,8),(5,'Žitarice','Pšenica','https://cdn.prirodanadar.rs/thumb.php?w=640&src=https://cdn.prirodanadar.rs/wp-content/upAloads/2019/04/Sve-%C5%A1to-treba-da-znate-o-p%C5%A1enici.jpg','Domaća pšenica u džakovima od 50kg.',40,35,100,8),(6,'Voće','Jabuka','https://citymagazine.danas.rs/wp-content/uploads/2022/01/james-yarema-P2X7NDx_GP0-unsplash-1000x564.jpg','Jabuka ajdared uzgajana na planatažama u okolini Čačka.',150,100,300,11),(7,'Voće','Šljiva','https://rasadnikagromax.com/wp-content/uploads/2020/03/vocne-sadnice-sljiva-president.jpg','Sveža, neprskana Šljiva uzgajana u okolini Čačka.',100,320,100,11),(8,'Voće','Malina','https://www.021.rs//images/b408790f817a22f828d4474d5d636869/malina_pxb.jpg','Domaa, sveća malina uzgajana po tradicionalnoj recepturi starih meštana.',800,600,150,11);
/*!40000 ALTER TABLE `proizvod` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proizvodjac`
--

DROP TABLE IF EXISTS `proizvodjac`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `proizvodjac` (
  `IdKorP` int NOT NULL,
  `nazivFirme` varchar(20) NOT NULL,
  `telefon` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `IdKorP_UNIQUE` (`IdKorP`),
  KEY `IdKorP_idx` (`IdKorP`),
`odobreno` int DEFAULT NULL COMMENT '1-odobreno, 2-nije odobreno',
  CONSTRAINT `IdKorP` FOREIGN KEY (`IdKorP`) REFERENCES `korisnik` (`IdKor`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proizvodjac`
--

LOCK TABLES `proizvodjac` WRITE;
/*!40000 ALTER TABLE `proizvodjac` DISABLE KEYS */;
INSERT INTO `proizvodjac` VALUES (6,'AgroSystem','023694452','agrosystemki@gmail.com',1),(11,'Rasadnik Bojovic','032784951','bojoviccacak@gmail.com',1),(8,'Mitic gazdinstvo','021254789','miticns@gmail.com',1);
/*!40000 ALTER TABLE `proizvodjac` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-22 16:26:01
