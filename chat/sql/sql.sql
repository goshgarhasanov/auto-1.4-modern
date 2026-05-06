-- MySQL dump 10.13  Distrib 5.5.27, for Linux (x86_64)
--
-- Host: localhost    Database: doydum_chat
-- ------------------------------------------------------
-- Server version	5.5.27-log

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
-- Table structure for table `a_reklam`
--

DROP TABLE IF EXISTS `a_reklam`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `a_reklam` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `message` text,
  `type` int(11) DEFAULT NULL,
  `sebeb` text CHARACTER SET cp1251 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `a_reklam`
--

LOCK TABLES `a_reklam` WRITE;
/*!40000 ALTER TABLE `a_reklam` DISABLE KEYS */;
INSERT INTO `a_reklam` VALUES (44,'.az',1,''),(45,'.net',1,''),(46,'.biz',1,''),(47,'.ru',1,''),(48,'.com',1,'');
/*!40000 ALTER TABLE `a_reklam` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `albom`
--

DROP TABLE IF EXISTS `albom`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `albom` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idfoto` text NOT NULL,
  `photo` text NOT NULL,
  `vote` int(11) DEFAULT '0',
  `sex` tinyint(11) DEFAULT '0',
  `info` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=106 DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `albom`
--

LOCK TABLES `albom` WRITE;
/*!40000 ALTER TABLE `albom` DISABLE KEYS */;
INSERT INTO `albom` VALUES (105,'1','1-82034.gif',0,0,')))))))))))))))))))))');
/*!40000 ALTER TABLE `albom` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `albom_fikir`
--

DROP TABLE IF EXISTS `albom_fikir`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `albom_fikir` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usid` int(11) DEFAULT '0',
  `user` varchar(80) DEFAULT NULL,
  `message` text NOT NULL,
  `time` int(11) NOT NULL DEFAULT '0',
  `key` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `albom_fikir`
--

LOCK TABLES `albom_fikir` WRITE;
/*!40000 ALTER TABLE `albom_fikir` DISABLE KEYS */;
INSERT INTO `albom_fikir` VALUES (1,49,'HeYaT','Cox maraqlidir',1339226585,7),(2,97,'Ne_BaBNiK','((((((((cox menali &#351;ekildi',1339587987,16),(3,64,'Inanmene','Gozlerim gozune deyenden beri,gozlerim gormeyir,ba&#351;qa gozeli.Icimde yaniram ali&#351;iram men,gozlerim gozune,deyende beri.',1339758825,18),(5,118,'Sensizem','Yimey olar efirdi',1340093067,26),(6,163,'Qumbara','Cox gozel ve ince elin var. Onu tutmaq isterdim',1340169937,26),(7,25,'Aloen','Cox qsng elin var o eli tutmaq istrdim',1340216944,26),(8,49,'HeYaT','Sen &#351;ekilini burdan silmesen men yapi&#351;diracam seni divara',1340571064,42),(9,22,'_By_Rauf_','o elin sahibi goresen kim olacaq...? Yeqin xo&#351;bext biri olar!',1340994362,55),(10,10,'VORAM','&#351;(fikir991138)',1363275250,90),(14,24,'seninem','Pis xosum velmedi',1363456355,96);
/*!40000 ALTER TABLE `albom_fikir` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auto_ban_v2`
--

DROP TABLE IF EXISTS `auto_ban_v2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auto_ban_v2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usid` int(11) NOT NULL DEFAULT '0',
  `user` varchar(100) DEFAULT NULL,
  `message` blob,
  `sebeb` varchar(255) DEFAULT NULL,
  `banned` int(2) NOT NULL DEFAULT '0',
  `banmsg` varchar(255) DEFAULT NULL,
  `time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auto_ban_v2`
--

LOCK TABLES `auto_ban_v2` WRITE;
/*!40000 ALTER TABLE `auto_ban_v2` DISABLE KEYS */;
/*!40000 ALTER TABLE `auto_ban_v2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bank`
--

DROP TABLE IF EXISTS `bank`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bank` (
  `bank_id` int(11) NOT NULL AUTO_INCREMENT,
  `bank_user` varchar(20) NOT NULL,
  `bank_sum` int(11) DEFAULT '0',
  `bank_oper` int(11) DEFAULT '0',
  `bank_time` int(11) DEFAULT '0',
  PRIMARY KEY (`bank_id`),
  UNIQUE KEY `bank_user` (`bank_user`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bank`
--

LOCK TABLES `bank` WRITE;
/*!40000 ALTER TABLE `bank` DISABLE KEYS */;
INSERT INTO `bank` VALUES (1,'Admin',5,0,1365456562);
/*!40000 ALTER TABLE `bank` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bank_virtual`
--

DROP TABLE IF EXISTS `bank_virtual`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bank_virtual` (
  `bank_id` int(11) NOT NULL AUTO_INCREMENT,
  `bank_user` varchar(20) NOT NULL,
  `bank_sum` int(11) DEFAULT '0',
  `bank_oper` int(11) DEFAULT '0',
  `bank_time` int(11) DEFAULT '0',
  PRIMARY KEY (`bank_id`),
  UNIQUE KEY `bank_user` (`bank_user`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bank_virtual`
--

LOCK TABLES `bank_virtual` WRITE;
/*!40000 ALTER TABLE `bank_virtual` DISABLE KEYS */;
/*!40000 ALTER TABLE `bank_virtual` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bannlist`
--

DROP TABLE IF EXISTS `bannlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bannlist` (
  `klu4` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(255) CHARACTER SET cp1251 COLLATE cp1251_bin NOT NULL DEFAULT '',
  `soft` varchar(255) CHARACTER SET cp1251 COLLATE cp1251_bin NOT NULL DEFAULT '',
  `user` varchar(30) CHARACTER SET cp1251 COLLATE cp1251_bin NOT NULL,
  `moder` varchar(30) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `sebeb` text NOT NULL,
  PRIMARY KEY (`klu4`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bannlist`
--

LOCK TABLES `bannlist` WRITE;
/*!40000 ALTER TABLE `bannlist` DISABLE KEYS */;
INSERT INTO `bannlist` VALUES (8,'94.20.57.198','Opera/9.80 (Windows NT 5.1; U; MRA 5.10 (build 5282); ru) Presto/2.10.229 Version/11.61','gulumsen','RuZGaR',''),(14,'46.228.180.78','Opera/9.80 (Windows NT 5.1; U; MRA 5.8 (build 4139); ru) Presto/2.10.229 Version/11.61','Dj_QaQa','ADMIN','PEYSER Reklam Eleme'),(20,'188.72.153.230','Opera/9.80 (Windows NT 5.1; U; MRA 5.7 (build 03797); ru) Presto/2.8.131 Version/11.10','Aynuska','ADMIN',''),(22,'188.72.153.230','Opera/9.80 (Windows NT 5.1; U; MRA 5.7 (build 03797); ru) Presto/2.8.131 Version/11.10','MR_KOLGE','ADMIN',''),(24,'82.145.208.225','Opera/9.80 (J2ME/MIDP; Opera Mini/4.4.31583/28.4150; U; az) Presto/2.8.119 Version/11.10','Adam','REHBERLIK','');
/*!40000 ALTER TABLE `bannlist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `beyen`
--

DROP TABLE IF EXISTS `beyen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `beyen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kim` int(11) NOT NULL,
  `kimi` int(11) NOT NULL,
  `vaxt` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `beyen`
--

LOCK TABLES `beyen` WRITE;
/*!40000 ALTER TABLE `beyen` DISABLE KEYS */;
INSERT INTO `beyen` VALUES (12,249,48,1342297993),(27,278,49,1343157847),(28,278,309,1343157914),(29,278,64,1343157968),(5,21,49,1340653787),(10,49,48,1341435821),(26,315,310,1343141828),(13,48,249,1342298937),(15,48,49,1342298966),(16,48,21,1342298978),(17,249,278,1342872781),(18,318,278,1342873859),(20,278,315,1342975999),(21,278,311,1342976042),(22,278,21,1342976065),(23,278,249,1342976125),(24,278,310,1342976534),(25,278,345,1342976597);
/*!40000 ALTER TABLE `beyen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bilik`
--

DROP TABLE IF EXISTS `bilik`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bilik` (
  `id` int(11) NOT NULL,
  `n` int(5) NOT NULL DEFAULT '0',
  `xal` int(11) NOT NULL DEFAULT '0',
  `mer` int(5) NOT NULL DEFAULT '0',
  `qid` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bilik`
--

LOCK TABLES `bilik` WRITE;
/*!40000 ALTER TABLE `bilik` DISABLE KEYS */;
INSERT INTO `bilik` VALUES (1,1,4,2,50),(228,0,7,4,0),(255,0,9,9,0),(97,0,0,0,0),(262,0,0,0,0),(64,0,0,0,0),(269,0,0,0,0),(271,0,42,5,0),(280,0,7,7,39),(282,0,0,0,0),(284,0,3,3,0),(290,0,0,0,0),(305,0,0,0,0),(293,0,0,0,0),(49,0,0,0,3),(48,1,0,0,0),(309,0,56,7,52),(278,0,121,7,0),(291,1,71,4,50),(277,0,301,15,0),(316,0,0,0,0),(357,0,0,0,0),(700,0,0,0,4);
/*!40000 ALTER TABLE `bilik` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bolmes`
--

DROP TABLE IF EXISTS `bolmes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bolmes` (
  `bolme` smallint(5) NOT NULL DEFAULT '0',
  `name` blob,
  PRIMARY KEY (`bolme`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bolmes`
--

LOCK TABLES `bolmes` WRITE;
/*!40000 ALTER TABLE `bolmes` DISABLE KEYS */;
INSERT INTO `bolmes` VALUES (0,'Ümumi'),(1,'Döyüş'),(2,'Idman'),(3,'Sevgi,ürekler'),(4,'Hirsli,esebi'),(5,'Gülmek'),(6,'Musiqi,reqs'),(7,'Ağlamaq'),(8,'Avto'),(9,'Utanmaq');
/*!40000 ALTER TABLE `bolmes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bots`
--

DROP TABLE IF EXISTS `bots`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bots` (
  `number` int(11) NOT NULL AUTO_INCREMENT,
  `vopros` blob NOT NULL,
  `answer` varchar(100) NOT NULL DEFAULT '',
  `tran` varchar(60) NOT NULL DEFAULT '',
  PRIMARY KEY (`number`)
) ENGINE=MyISAM AUTO_INCREMENT=171 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bots`
--

LOCK TABLES `bots` WRITE;
/*!40000 ALTER TABLE `bots` DISABLE KEYS */;
INSERT INTO `bots` VALUES (1,'﻿Azerbaycanin paytaxti olan Bakida ev telefonlari nece reqemleridir?.','Yeddi','Yeddi'),(2,'Sherqde ilk demokraik cumhuriyyet??.','Azerbaycan','Azerbaycan'),(3,'Neft ixrac eden olkelerin beynelxalq teshkilati nece adlanir?.','OPEK','OPEK'),(4,'Ingilis dilinde aile sozu nece adlanir?.','Family','Family'),(5,'Tibb eliminin banisi kimdir?.','Hipokrat','Hipokrat'),(6,'Hansi canli en yuksek eshitme qabiliyetine malikdir?.','Yarasa','Yarasa'),(7,'Dunyanin en shirin bitkisi hansidir?.','Katalife','Katalife'),(8,'“Sert Disk” nadir?.','Komputer hissesi','Komputer hissesi'),(9,'Qu’randa neche aye var?.','Yuz ondord','Yuz ondord'),(10,'Ruslar Azerbaycani ishghal etdikden sonar Gence sheherinin adini deyishib ne qoydular?.','Yelzavetapol','Yelzavetapol'),(11,'Yer kuresi oz oxu(xeyali oxu) etrafinda tam dovr etme muddeti ne qederdir?.','24 saat','24 saat'),(12,'Ayinin en chox yediyi meyve hansidir?.','Armud','Armud'),(13,'Kur chayi oz menbeyini haradan goturur?.','Turkiyeden','Turkiyeden'),(14,'Dunyanin en boyuk golu hansidir?.','Xezer','Xezer'),(15,'Azerbaycanin xeritesi hansi canlinin tesvirini yaradir?.','Qartal','Qartal'),(16,'Azerbaycanin musteqillik gunu hansidir?.','18 oktyabr','18 oktyabr'),(17,'Azerbaycan xalq Cumhuriyetinin ilk bayraghinda hansi renglerden istifade olunmushdur?.','Qirmizi ve agh','Qirmizi ve agh'),(18,'“LYA” notu hansi herfle yazilir?.','A herfi','A herfi'),(19,'Mudrik sozu tamamlayin:”Dovletin en yaxshisi…”?.','Aghildir','Aghildir'),(20,'Mesele gore:”Gelin evin  ...”?.','Supurgesidir','Supurgesidir'),(21,'Aile qurmaghin 50 illiyi nece adlanir?.','Qizil','Qizil'),(22,'Nesreddin Tusi nechenci ilde anadan olmushdur?.','1201','1201'),(23,'Sherq edebiyyatinda ilk opera hansidir?.','Leyli ve Mecnun','Leyli ve Mecnun'),(24,'Azerbaycan elifbasinda “F” herfinden sonar hansi herf gelir?.','G herfi','G herfi'),(25,'Neyi dunyanin en aci ve en shirin sheyi hesab edirler?.','Dili','Dili'),(26,'Esrin muqavilesi nechenci ilde imzalanib?.','1994 cu il','1994 cu il'),(27,'Rusiyanin ehalisi ne qederdir?.','150 milyon','150 milyon'),(28,'Ari bal hazirladighi yer nece adlanir?.','Petek','Petek'),(29,'Aghabey sozunun qisa yazilishi necedir?.','Abi','Abi'),(30,'Leonardo da Vincinin dunyaca meshur olan eserinin adi nadir?.','Mona liza','Mona liza'),(31,'Kanadanin niche dovlet dili var?.','Iki dene','Iki dene'),(32,'Avropa shurasinda cemi neche dovlet var?.','Qirx uch','Qirx uch'),(33,'Dunyada en boyuk meydan hansi sheherdir?.','Pekinde','Pekinde'),(34,'Dunyanin en gozel yerlerinden biri olan Shusa ermeni ishghalchilari terefinden ne vaxt ishghal olunub?.','8 may 1992','8 may 1992'),(35,'Tulku neyin simvoludur?.','Hiylegerliyin','Hiylegerliyin'),(36,'Neche Materik movcuddur?.','Alti','Alti'),(37,'Monarxiya sozunun menasi nedir?.','Tek hakimliyetlilik','Tek hakimliyetlilik'),(38,'Xemse nedir?.','Beshlik','Beshlik'),(39,'Semed Vurghun nechenci ilde anadan olub?.','1906 ci ilde','1906 ci ilde'),(40,'Nitq hissesinde isimden sonar hansi gelir?.','Sifet','Sifet'),(41,'Koroghlunun esl adi nedir?.','Rovshen','Rovshen'),(42,'“Doha” hansi olkenin paytaxtidir?.','Qatar','Qatar'),(43,'Meymun esasen hansi meyveni yeyir?.','Banan','Banan'),(44,'30 yanvar faciesi nechenci ilde bash verib?.','1990 ci ilde','1990 ci ilde'),(45,'Filin vucudunda en deyerli yer hansidir?.','Dishi','Dishi'),(46,'Pishikler etrafda olan her sheyi ne rengde gorurler?.','Boz rengde','Boz rengde'),(47,'Tufanin bash verme sebebi nedir?.','12 bal gucunde kulek','12 bal gucunde kulek'),(48,'Kelbecer ne vaxt shghal olunub?.','2 aprel 1992','2 aprel 1992'),(49,'Italiyanin paytaxti hansi sheherdir?.','Roma','Roma'),(50,'“Nokia” mobil telefonlarini esasen hansi olke istehsal edir?.','Finlandiya','Finlandiya'),(51,'Azerbaycan dili ne vaxt dovlet dili kimi élan olunub?.','1918 ci ilde','1918 ci ilde'),(52,'Gurcustanin milli pul vahidi?.','Lari','Lari'),(53,'Pentagon ne demekdir?.','5 gushe','5 gushe'),(54,'Ehmediler dovletinin ilk cari kim idi?.','Kir','Kir'),(55,'Dunyada sahesine gore en boyuk olke hansidir?.','Rusiya','Rusiya'),(56,'CD sozu hansi soz birleshmelerinden emele gelib?.','Compact Disk','Compact Disk'),(57,'Yer kuresinde niche maqnit qutbu var?.','Iki dene','Iki dene'),(58,'Dunyada en boyuk bina hansi olkededir?.','Hong Kong','Hong Kong'),(59,'Insanin ureyi niche kameralidir?.','Dord','Dord'),(60,'Dunyanin en bol sulu chayi hansidir?.','Amazon','Amazon'),(61,'Dunya Azerbaycanlilarinin 1 ci qurultayi ne vaxt kecirilib?.','2001','2001'),(62,'Qebelenin kechmish adi nedir?.','Qurtqashin','Qurtqashin'),(63,'Bayat qalasi haradadir?.','Shekide','Shekide'),(64,'Novruz sozunun menasi nedir?.','Yeni gun','Yeni gun'),(65,'“Ehmed haradadir” filminde Ehmedin atasinin adi nedir?.','Shirin','Shirin'),(66,'“Dehname” eserinin muellifi kimdir?.','Shah Ismayil Xetayi','Shah Ismayil Xetayi'),(67,'Pocht markasi ilk defe harada buraxilib?.','Boyuk Britaniyada','Boyuk Britaniyada'),(68,'Heyder Eliyev nechenci ilden hakimiyyete gelmishdir?.','1969','1969'),(69,'Hansi fenn elmin acharidir?.','Riyaziyyat','Riyaziyyat'),(70,'Azerbaycanda niche iqlim tipi var?.','Doqquz','Doqquz'),(71,'Fenerbahce klubunun simvolu hansi heyvandir?.','Kanarya','Kanarya'),(72,'“Estraqon” hansi bitkiye deyilir?.','Terxun','Terxun'),(73,'Isvechin parlamenti nece adlanir?.','Riksdaq','Riksdaq'),(74,'Platin Avropaya hansi olkeden getirilmishdir?.','Perudan','Perudan'),(75,'Aghdam ne vaxt ishghal olunub?.','23 iyul 1993','23 iyul 1993'),(76,'Kohnelmish soz nece adlanir?.','Arxaizm','Arxaizm'),(77,'Dunyanin en enli shelalesi hansidir?.','Kleopas','Kleopas'),(78,'Dunyanin en boyuk sheher ve paytaxti hansidir?.','Mexiko','Mexiko'),(79,'Azerbaycan dovlet himninin sozlerini kim yazib?.','Ehmed Cavad','Ehmed Cavad'),(80,'M.F.Axundovun texellusu ne olub?.','Sebuhi','Sebuhi'),(81,'Neft dashiyan gemi nece adlanir?.','Tanker','Tanker'),(82,'Gundelik namaz neche defe olmalidir?.','Besh defe','Besh defe'),(83,'Normal insane niche deqiqeden sonar yuxuya gedir?.','Yeddi','Yeddi'),(84,'“Helikopter” hansi neqliyat vasitesinin muasir adidir?.','Vertalyot','Vertalyot'),(85,'Qedim yunan mifalogiyasina gore afrodita kimdir?.','Sevgi allahi','Sevgi allahi'),(86,'Insanda taraziliq merkezi harada yerleshir?.','Qulaghin ichinde','Qulaghin ichinde'),(87,'Azerbaycanda “Respublika gunu” ne vaxt qeyd olunur?.','28 may','28 may'),(88,'Tuluza sheheri hansi olkede yerleshir?.','Fransa','Fransa'),(89,'Madkaskarin paytaxti?.','Antananarivu','Antananarivu'),(90,'Ferrari avtomobil markasi hansi olkenin ihtehsalidir?.','Italiya','Italiya'),(91,'Dunyada en boyuk yarimada hansidir?.','Erebistan','Erebistan'),(92,'Orta esirlerde venetsiyanin kuceleri nece temizlenirdi?.','Leysan yagishla','Leysan yagishla'),(93,'Ilk mesnevi  kim terefinden yazilmishdir?.','Xeqani Shirvani','Xeqani Shirvani'),(94,'Shahmatin veteni?.','Hindistan','Hindistan'),(95,'Insan oksigensiz neche deqiqe yashaya biler?.','Besh deqiqe','Besh deqiqe'),(96,'Daghliq Qarabagh munaqishesinde en chox shehid veren rayon?.','Aghdam','Aghdam'),(97,'Komputer programlarinda shekillerin montaji uchun istifade edilen meshur program?.','Photoshop','Photoshop'),(98,'Ilk defe qlobusu kim yaradib?.','El Biruni','El Biruni'),(99,'Manna dovleti ne vaxt yaranmishdir?.','9 cu esrde','9 cu esrde'),(100,'15 Sentyabr ne gunudur?.','Bilik','Bilik'),(101,'Shimal Buzlu okeani diger okeanlardan ferqlendiren bashlica cehet?.','Temperaturun artmasi','Temperaturun artmasi'),(102,'Siqaret insanin bedenine esasen ne kimi ziyan vurur?Yod chatishmamazlighi','',''),(103,'Ingilis elifbasinda neche herf var?.','Iyirmi alti','Iyirmi alti'),(104,'Baki Dovlet Universiteti (BDU) nechenci ilde yaranib?.','1919 cu ilde','1919 cu ilde'),(105,'Xuliqan sozu neden yaranib?.','Caninin adindan','Caninin adindan'),(106,'Turkiyenin Milli lotosu nece adlanir?.','Milli piyango','Milli piyango'),(107,'“Ceyms Bond, Agent 007” filminin bash qehremaninin adi nedir?.','Pirs Bosman','Pirs Bosman'),(108,'Dunyanin meshur ressamlarimdan biri, hansiki qishda pul olmadighinda oz resimlerini yandirib qizinirmish?.','Picasso','Picasso'),(109,'Huseyin Cavid neche il omur surmushdur?.','Elli doqquz il','Elli doqquz il'),(110,'BMT nin neche daimi uzvu var?.','Besh','Besh'),(111,'Alimler hansi meyvenin xercheng xesteliyine derman oldughunu bildirir?.','Nar','Nar'),(112,'Yeni bir mena bildiren,chap ve elyazmada buraxilan ara nece adlanir?.','Abzas','Abzas'),(113,'Qedim misirde gunesh allahi kim olmushdur?.','Ra','Ra'),(114,'S.E.Shirvani , Sabire ne baghishlayib?.','Nizaminin xemsesini','Nizaminin xemsesini'),(115,'Mikayil Mushviqin soyadi nedir?.','Ismayilzade','Ismayilzade'),(116,'Silahlarin saxlandighi baza nece adlanir?.','Cebbexana','Cebbexana'),(117,'Sichanin dushmani?.','Pishik','Pishik'),(118,'Nadir heyvanlarin qeyde alindighi kitab?.','Qirmizi kitab','Qirmizi kitab'),(119,'Isvechin paytaxti hansi sheherdir?.','Stokholm','Stokholm'),(120,'156 hefte neche gundur?.','1092','1092'),(121,'“Volvo” avtomobilleri hansi olkede ixrac olunur?.','Isvechre','Isvechre'),(122,'Radionun nezeri olaraq sherh gorkemli alim kimdir?.','Markevich','Markevich'),(123,'Mafia sozu harada yaranib?.','Italiyada','Italiyada'),(124,'Reshid Behbudov harada anadan olub?.','Tiflisde','Tiflisde'),(125,'“Kenquru” ne demekdir?.','Sizi basha dushmurem','Sizi basha dushmurem'),(126,'“Ferhad ve Shirin” pyesinin muellifi kimdir?.','Semed Vurghun','Semed Vurghun'),(127,'Amazondan sonra dunyada en sulu chay?.','Lena','Lena'),(128,'ABS in qizil ehtiyyati haradadir?.','Fort Noksda','Fort Noksda'),(129,'1921-31 ci illerde Azerbaycanin ilk milli atici diviziyasinin komandiri?.','Cemshid Naxchivanski','Cemshid Naxchivanski'),(130,'Dunyanin en boyuk qurbaghasi ne qeder chekidedir?.','800 qram','800 qram'),(131,'Imameddin Nesimi harada anadan olub?.','Shamaxida','Shamaxida'),(132,'Sherqde ilk resedxana harada tikilmishdir?.','Maraghada','Maraghada'),(133,'Alimerin fikirince ne qanin laxtalanmasini suretlendirir?.','Yer findighi','Yer findighi'),(134,'Jan Dark hansi sheherde yandirilmishdir?.','Ruanda','Ruanda'),(135,'Deniz neqliyyatinin dashimalar uchun kiraye verilmesinden elde olunan xerc nece adlanir?.','Fraxt','Fraxt'),(136,'“Charl Chaplin” oskar mukafatini neche yashinda alib?.','Seksen doqquz','Seksen doqquz'),(137,'El usulu ile mal ihtehsal eden senetkar nece adlanir?.','Kustar','Kustar'),(138,'“Cumhuriyyet” sozu hansi dilden goturulub?.','Ereb','Ereb'),(139,'Xezer denizini faizle bolsek en boyuk faiz hansi olkeye dusher?.','Qazaxstana','Qazaxstana'),(140,'Baki sheherini nece sheher adlandirirlar?.','Kulekler sheheri','Kulekler sheheri'),(141,'Planetler arasinda qirmizi planet adlandirilan planet hansidir?.','Mars','Mars'),(142,'Nizami Gencevinin esl adi ne olmushdur?.','Ilyas','Ilyas'),(143,'Lena chayi oz menbeyini haradan goturur?.','Baykal golunden','Baykal golunden'),(144,'Bezz qalasi nechenci ilde tutulub?.','837','837'),(145,'Arinin neche qanadi olur?.','Dord','Dord'),(146,'Dunyanin en zeherli canlisi hansidir?.','Chironex','Chironex'),(147,'O hansi olkedirki oz erazisini denizi qurudmaqla choxaldir?.','Hollandiya','Hollandiya'),(148,'Dunyanin en yuksek dagh golu?.','Titikaka','Titikaka'),(149,'Ilk respublika harada yaranib?.','Roma','Roma'),(150,'“Kauchuk” sozunun menasi nedir?.','Aghlayan aghac','Aghlayan aghac'),(151,'Dilin hansi hissesi hech dad hiss etmir?.','Orta hissesi','Orta hissesi'),(152,'Qasim bey Zakir harada anadan olub?.','Shushada','Shushada'),(153,'Azerbaycan Dovlet Televizyasi ne vaxt achilib?.','1956','1956'),(154,'Azerbaycanda ilk defe Heqiqi Dovlet Edliye Mushavirliyi kime verilib?.','Ismet Qayibov','Ismet Qayibov'),(155,'Haci Qaranin arvadinin adi ne idi?.','Tukez','Tukez'),(156,'Tacikistanin paytaxti hansidir?.','Dushenbe','Dushenbe'),(157,'Muqeddes yelena adasinin kim keshf edib?.','Vasqo da Qama','Vasqo da Qama'),(158,'Settar Behlulzade nechidir?.','Ressam','Ressam'),(159,'Misir dovleti ingilis dilinde nece yazilir?.','Egypt','Egypt'),(160,'Berlin hasari ne vaxt sokulub?.','1989','1989'),(161,'Azerbaycan Milli Dirchelish gunu ne vaxtdir?.','17 noyabr','17 noyabr'),(162,'Aktyor” Jan Kloud Vandamme” harada anadan olub?.','Belchikada','Belchikada'),(163,'Yaponiyanin ilk paytaxti nece adlanib?.','Nara','Nara'),(164,'Fenerbahche ne vaxt yaranib?.','1907','1907'),(165,'Fenerbahchenin bashkani?.','Aziz Yildirim','Aziz Yildirim'),(166,'Valensiya klubunun simvolu?.','Yarasa','Yarasa'),(167,'salam','salam','salam'),(168,'sizce nece yasda evlilik uqurlu olabiler?','26','26'),(169,'Usmi,taninmish,her kesin tanidigi insana ne deyirler?','meshur','meshur'),(170,'meyvesine gore taninan rayon?','quba','quba');
/*!40000 ALTER TABLE `bots` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `c_nick`
--

DROP TABLE IF EXISTS `c_nick`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `c_nick` (
  `lid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL DEFAULT '0',
  `to` int(11) DEFAULT '0',
  `photo` varchar(25) DEFAULT NULL,
  `date` text CHARACTER SET cp1251 NOT NULL,
  `time` int(11) unsigned NOT NULL DEFAULT '0',
  `gun` tinyint(4) DEFAULT '0',
  `qeyd` text NOT NULL,
  PRIMARY KEY (`lid`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `c_nick`
--

LOCK TABLES `c_nick` WRITE;
/*!40000 ALTER TABLE `c_nick` DISABLE KEYS */;
/*!40000 ALTER TABLE `c_nick` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `conf`
--

DROP TABLE IF EXISTS `conf`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `conf` (
  `acar` smallint(1) NOT NULL DEFAULT '0',
  `qadin` int(11) NOT NULL DEFAULT '0',
  `kisi` int(11) NOT NULL DEFAULT '0',
  `son` varchar(15) DEFAULT NULL,
  `max` int(11) DEFAULT '0',
  `tarix` varchar(20) NOT NULL DEFAULT '',
  `ipp` varchar(200) NOT NULL,
  `soft` varchar(200) NOT NULL,
  `qip` varchar(20) NOT NULL,
  `qsoft` varchar(200) NOT NULL,
  `time` int(11) DEFAULT '0',
  `bugun` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conf`
--

LOCK TABLES `conf` WRITE;
/*!40000 ALTER TABLE `conf` DISABLE KEYS */;
INSERT INTO `conf` VALUES (1,1171,3179,'xxxxx',2607,'03-01-12 | 14:32','5.44.39.95','Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727) Havij','5.44.39.227','Opera/9.80 (Windows NT 6.1; WOW64; MRA 6.0 (build 6068)) Presto/2.12.388 Version/12.10',1365436727,27);
/*!40000 ALTER TABLE `conf` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cookie_ban`
--

DROP TABLE IF EXISTS `cookie_ban`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cookie_ban` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cookie` text CHARACTER SET latin1 NOT NULL,
  `uid` int(11) unsigned DEFAULT '0',
  `tarix` varchar(200) CHARACTER SET cp1251 COLLATE cp1251_bin NOT NULL,
  `acar` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 PACK_KEYS=0;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cookie_ban`
--

LOCK TABLES `cookie_ban` WRITE;
/*!40000 ALTER TABLE `cookie_ban` DISABLE KEYS */;
/*!40000 ALTER TABLE `cookie_ban` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `d_teklif`
--

DROP TABLE IF EXISTS `d_teklif`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `d_teklif` (
  `klu4` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL DEFAULT '0',
  `usid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`klu4`)
) ENGINE=MyISAM AUTO_INCREMENT=130 DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `d_teklif`
--

LOCK TABLES `d_teklif` WRITE;
/*!40000 ALTER TABLE `d_teklif` DISABLE KEYS */;
INSERT INTO `d_teklif` VALUES (1,25,28),(2,80,79),(6,97,103),(30,192,114),(23,105,140),(10,97,114),(45,97,38),(28,118,140),(44,97,210),(41,97,205),(39,97,140),(46,97,180),(47,97,80),(56,217,149),(61,177,262),(62,265,103),(64,271,255),(65,276,272),(70,291,306),(68,282,244),(76,277,244),(77,277,194),(126,177,49),(110,277,347),(129,698,334),(101,277,334),(108,345,351),(127,363,312),(111,277,336),(114,277,348),(128,698,144);
/*!40000 ALTER TABLE `d_teklif` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `down`
--

DROP TABLE IF EXISTS `down`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `down` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `down`
--

LOCK TABLES `down` WRITE;
/*!40000 ALTER TABLE `down` DISABLE KEYS */;
INSERT INTO `down` VALUES (1,'Sekil'),(2,'Mp3'),(3,'Video');
/*!40000 ALTER TABLE `down` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `down_files`
--

DROP TABLE IF EXISTS `down_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `down_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bolme` int(11) NOT NULL,
  `file` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `count_download` int(11) NOT NULL,
  `type` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `down_files`
--

LOCK TABLES `down_files` WRITE;
/*!40000 ALTER TABLE `down_files` DISABLE KEYS */;
INSERT INTO `down_files` VALUES (1,15,'57678-1347300611.jpg','Erotik-1',3,1),(5,15,'4734-1347300900.jpg','Erotik-4',1,1),(4,15,'7054-1347300868.jpg','Erotik-3',1,1),(6,15,'71105-1347301018.jpg','Erotik-5',0,1),(7,15,'31729-1347301052.jpg','Erotik-6',4,1),(8,15,'42258-1347393717.jpg','Erotik-7',9,1),(12,3,'93489-1365242170.jpg','sevgiiiiiii',2,1);
/*!40000 ALTER TABLE `down_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `elan`
--

DROP TABLE IF EXISTS `elan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `elan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `date` varchar(25) NOT NULL,
  `saat` int(11) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=cp1251 PACK_KEYS=0;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `elan`
--

LOCK TABLES `elan` WRITE;
/*!40000 ALTER TABLE `elan` DISABLE KEYS */;
INSERT INTO `elan` VALUES (1,'aiLeSiNe HoRMeT eDeN ReKLaM eTMeZ!!!','ADMIN','12.06.12 [02:53]',1339455195),(2,'Bele bir soz var.Meni ba&#351;a du&#351;mekcun gerek men olasan.Ona gorede sen cekdiyivi bir Allah,birde sen bilirsen.Menimse gucum teselli olmaga catir','@Romantik@','14.07.12 [15:07]',1342278449),(3,'&#350;AP.DoYSaN.NeT en Gozel mekan sizlerin ixtiyarinizda )))))','Admin','08.04.13 [03:59]',1365379168);
/*!40000 ALTER TABLE `elan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `etiraf_sherh`
--

DROP TABLE IF EXISTS `etiraf_sherh`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `etiraf_sherh` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ideti` int(11) NOT NULL DEFAULT '0',
  `idwho` int(12) NOT NULL DEFAULT '0',
  `message` text NOT NULL,
  `time` int(11) NOT NULL DEFAULT '0',
  `date` varchar(50) NOT NULL DEFAULT '',
  `icaze` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `etiraf_sherh`
--

LOCK TABLES `etiraf_sherh` WRITE;
/*!40000 ALTER TABLE `etiraf_sherh` DISABLE KEYS */;
INSERT INTO `etiraf_sherh` VALUES (1,1,49,'geler In&#351;allah',1340777847,'27-06-12 11:17',0),(2,1,118,'ALLAH sevenleri he&#351; vaxt ayirmasin ayriliq cox cetindir',1340852342,'28-06-12 07:59',0),(3,2,49,'Cox anlamli ve derin menali cumlelerdir Allah hec kesin gozunu yolda qoymasin',1341436670,'05-07-12 02:17',0),(4,1,49,'Ne deyim Vallah seni cox yax&#351;i ba&#351;a dudurem eslinde ba&#351;a du&#351;murem cun ki hec kes hec kesin derdini ba&#351;a du&#351;e bilmez. Cun ki bunlari men yox sen ya&#351;ayirsan ve sadece mene Allah sene komek olsun deye bilerem..',1341436793,'05-07-12 02:19',0),(5,3,1,'Allah Seni Guldursun))',1341439935,'05-07-12 03:12',0),(6,3,217,'Hahaha cox gulmelidi ureyim getdi ey u&#351;aqlar su getirin ama heqiqeten gГјlmelidi.',1341478353,'05-07-12 13:52',0),(7,3,118,'Buda &#351;eytan molla',1341509553,'05-07-12 22:32',0),(8,2,118,'Cox gozel du&#351;uncelidi menasi derindi',1341509644,'05-07-12 22:34',0),(9,4,291,'Maraqli ve romantik idi. Mence heyatda heckese gore ezab cekmeye deymez! Cunki Allah tealadan ba&#351;qa her &#351;ey yalandi',1342086609,'12-07-12 14:50',0),(10,3,291,'Cooox teessufki,namaza aid,dine aid bele hekaye deyim ya letifeler var. Cox acinacaqlidi mence!',1342086749,'12-07-12 14:52',0),(11,2,291,'Maraqli idi',1342087023,'12-07-12 14:57',0),(12,4,49,'Allah hec kesi ayirmasin ba&#351;a du&#351;memek olmaz bu hissi',1342093651,'12-07-12 16:47',0),(13,6,291,'Ela seirdi',1342105886,'12-07-12 20:11',0),(14,5,49,'Him cox maraqli idi.kefsiz.',1342172997,'13-07-12 14:49',0),(15,7,309,'Ruzgar Allah bilen meslehetdi bilirem cetinde amma ne eda bilersan.Sen elinden geleni eladin amma her &#351;eyi yax&#351;i neticelenmesi ucun sanin etdiklerin kifayet etmir.Allah komeyin olsun',1342263089,'14-07-12 15:51',0),(16,7,309,'Inanki yazdigin sozleri oxuyub sene gore cox pis oldum',1342263180,'14-07-12 15:53',0),(17,7,21,'Г‡ox saДџol Qapa. .eh.',1342263934,'14-07-12 16:05',0),(18,8,21,'EladД± Qaqa',1342264058,'14-07-12 16:07',0),(19,5,278,'Kaski qovu&#351;saydilar.',1342407071,'16-07-12 07:51',0),(20,8,278,'Superdi.',1342929593,'22-07-12 08:59',0),(21,7,278,'Cox teessГјf canim',1342929888,'22-07-12 09:04',0),(22,2,278,'Bu sГ¶zleri yalniz sevgisini yasayanlar basa dГјse biler.',1342930529,'22-07-12 09:15',0),(23,10,310,'Niye heyat bebbextlikle doludu',1343043932,'23-07-12 16:45',0),(24,7,310,'Olum en asan yoldu',1343044089,'23-07-12 16:48',0);
/*!40000 ALTER TABLE `etiraf_sherh` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `etiraf_text`
--

DROP TABLE IF EXISTS `etiraf_text`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `etiraf_text` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idwho` int(12) NOT NULL DEFAULT '0',
  `topic` varchar(80) NOT NULL DEFAULT '',
  `message` text NOT NULL,
  `time` int(11) NOT NULL DEFAULT '0',
  `read_msg` tinyint(1) NOT NULL DEFAULT '0',
  `count_read` int(11) NOT NULL DEFAULT '0',
  `date` varchar(50) NOT NULL DEFAULT '',
  `icaze` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `etiraf_text`
--

LOCK TABLES `etiraf_text` WRITE;
/*!40000 ALTER TABLE `etiraf_text` DISABLE KEYS */;
INSERT INTO `etiraf_text` VALUES (1,1,'Her &#350;eyi Zamana Buraxaraq,Zama','Her Shey SeNle Gozel Idi.. Amma Indi Yoxsan Yanimda Deye Her Shey Menasizdir,He&#231;de Gozel Gorunmur Mene.. Hemi&#351;e SeNe Dahada Yaxin Olarken Dedin: Zamanla... Budur Her Sheyi Zamana Buraxdiq.. Amma Zaman Bizi Ayri Saldi.. Biz Zaman Qalib Gelmekden Zaman Bize Qalib Geldi.. Du&#351;unurdum Ki,Her Shey Dahada Gunden Gune Gozel Olar,Amma Gorunur He&#231;de Yax&#351;i Olmayacaq.. Cunki SeNsiZeM ! Artiq Ureyde Dozmeye Tap Getirmir,Sanki Taqetim Yoxdur Ya&#351;amaga... Ehhh Ne Bilesen ki,Indi Men Neceyem.. Qem Qusse,Keder Yaxin Oldu Mene,SeNiN Sayende.. Bilmirem Kimden SeNi Soraqla&#351;im,Maraqlanim.. Cox Narahatdir Ureyim.. SeNe Sadece Deyerdim ki,GeRi DoN.. Amma Nece? :(( Charesiz Gunlerimle Yox Gunlerini Sayiram... Unutma SeNi Helede Gozleyirem ve Umid Edirem ki,In&#351;Allah Ne Zamansa GeRi DoNeCeKSeN',1340535799,0,42,'24-06-12 16:03',0),(2,1,'Geri DoN!','Lap bal kimisen,baldan bir az yemek ucun isteyirem.qayit geri yollarini gozleyirem.meni bir az,lap azaciq sevmeyini,saclarima ellerine cekmeyini,sen getmisen yollarina gelmeyimi,qollarinda olmek ucun isteyirem,qayit geri yollarini gozleyirem!!!(',1341436310,0,24,'05-07-12 02:11',0),(3,49,'Guleceksiniz','Bir molla olur namaz qilir &#351;eytan gelir qulagina deyir ki fasile elan et tviks dad o biri &#351;eytan gelib deyir dayanma sinikersle molla Allahu ekber deyib namazi dayandirir ve deyir ne sinikers ne tviks BANTU CENNET HEZZIDIR:))))))))))))',1341439770,0,34,'05-07-12 03:09',0),(4,309,'Sene yazdigim son mektub','Sevgilim bu geca &#351;am i&#351;iqinda oturub sana mektub yaziram.Bir anliq sanli gunleri yada salib,xeyala daliram.Amma sanki o,gunlerin dogru deyil,bir roya oldugunu saniram.Bilirsan sani sevdiyimcun man necada yaniram.Her geca bir menem,birde resmin elimde.Resmine baxiram seni aniram,sanki bu resimle teselli tapiram.Amma baxdiqcada usanmiram senden usanmadigim kimi.Bilmirsan ne hallardayam,bilmirsan neler cekirem.Bilmezsende!San hec sevmedinki bilesende.Sevmek urek ister urek,o urekse sende yoxdu.Eger sevseydin bela etmazdin.Meni terk edib getmezdin.Amma man bunada dozaram.Neca deyerler mine dozan,min birede dozer.Bir artiq ya bir eksik ne ferq ederki.Onsuzda urek oyre&#351;im',1342035971,0,19,'12-07-12 00:46',0),(5,291,'Cariyenin Sevgisi','Bir cariye evinde cali&#351;digi sultan Selimi sevir. Onu her gorende elleri,ayaqlari esir. Bir gun qerara gelirki ona sevgisini bildirsin. Sultanin yatagin yigisdirdiqdan sonra,mektub yazir. Mektubda bele yazilib\\&amp;quot;sultanim derdi olan neylesin?\\&amp;quot; sultan mektubu oxuyur ve cvb yazir. \\&amp;quot;derdi olan soylesin\\&amp;quot; mektubu yataga qoyub gedir. Cariye sebirsizlikle mektubu oxuyur. Kagizin arxasina cvb yazir\\&amp;quot;bes cekinirse??\\&amp;quot; yene Sultan Selimin yatagina qoyub gedir. Sultan Selim mektubu oxuyur. \\&amp;quot;cekinmesin desin yazir\\&amp;quot; cariye mektubu oxuyur. Qerara gelirki,sevgisin Sultan Selimi bildirsin. O gelende elleri ayaqlari esir. Cariye Sultan Selime deyir. Men ..... Men.. Men.. Sizi deyerek yere yixilir. Haqqin rehmetine qovusur. Sultan Selim uzunu camaata tutub deyir. Ey insanlar kaski,hamimizin qelbinde bax bu cariyenin esqi kimi mehebbet olardi!',1342087478,0,14,'12-07-12 15:04',0),(6,309,'Gozelim','Gel qulaq as sen sozume eyleme cox naz gozelim,Dinle bu sozlerimi etme etiraz gozelim.Qizil gulde qonce acir vaxti gelen zaman solur,Vaxt geler bu gozellik senede qalmaz gozelim.Gozellik &#351;ertden deyil gerek vefadar olasan,Bir gozellikle inan insan ucalmaz gozelim.Yarin oz a&#351;iqine yoxsa e&#351;qi mehebbeti,Onu e&#351;q odunda yandirsanda yanmaz gozelim.A&#351;iqin qelbinde bir qizil guldu qonce acan,Derk et ozge gule meylini salmaz gozelim.Derk et ozge gule meylini salmaz gozelim!',1342103471,0,13,'12-07-12 19:31',0),(7,21,'Misgin AЕџiqin Г–lГјmГј..!','QaranlД±Дџ OtaДџД±n Bir KГјncГјne SД±xД±lД±b, Sevdiyinin Ећekillerine BaxД±b AДџlayan Ећair Son Ећeirini YazД±b GГ¶zlerini BaДџladД±. Г–zГјne Qest Etdi. Onda Geriye Qalan QanlД± Setrler Ve Bu SГ¶zler Oldu...! DaЕџ Qelbli Д°nsanlarД±n ArasД±nda, Onu TapdД±m. O Bezilerinden Ferli Д°di. QГјrurlu, Sevgisine Sadiq Д°di. Sen Deme Men Ele Bilirdim. Nakam Oldu Sevgim...!',1342262740,0,12,'14-07-12 15:45',0),(8,309,'Ureyimde','Etmis deli-divane bizi esqi-mehebbet.Bir yerde bize omr elamak olmadi qismetЕџMen senden xebersiz cekilib tekliye xelbet.Qan agliyiram gozleri giryan ureyimde.Hemdem ne qeder dovr eliyir qan ureyimde.Yer var sene ey sevgili canan ureyimde',1342263710,0,14,'14-07-12 16:01',0),(9,278,'Bedbext son','Bir gГјn axsamcagi qiz isden cixib taksi gГ¶zleyir. Yagisda yagirmis birden bir oglan masini saxlayir qiza teklif edir ki buyur gedek. Qiz biraz tereddГјd edib masinina oturmaq istemirde amma qaranliqa ve yagisa gГ¶rede istemirdi yolda qalsin. Ne ise qiz razilasir oglanla gedir yolda sГ¶hbetlesirler ve bir birine nГ¶mrelerini verirler amma heqiqeten her ikisi bir birinden xoslari gelir. Oglan cox mehriban ve sade birisi imis. Bu isden 3 gГјn kecir qiz isteyir oglana zeng etsin amma cekinir Г¶zu-Г¶zune deyirki o meni niye yigmir gГ¶resen. 1 hefte kecir qiz cesaretini toplayib oglana zeng edir telefonu bir xanim gГ¶turur qiz sorusur Ramal hani bes , xanim baslayir aglamaga dedi o menim oglumdu bundan 1 hefte qezaya dГјsub. Qiz bunlari esidende &#351;oka dГјsГјr inana bilmir ve ehvalati acib danisir. Oglanin anasindan evin adresini alir hemin gece qiz sehere qeder yata bilmir ve seher acilan kimi gedir ora. Girir oglanin otagina gГ¶zlerine inana bilmir onun sekilleri sanki Nazli ile danisirdi. O vaxtdan sonra qiz evlennir Гјreyini qara torpaga tapsirir.',1342945360,0,3,'22-07-12 13:22',0),(10,278,'BEDBEXT SON','Bir gГјn axsamcagi qiz isden cixib taksi gГ¶zleyir. Yagisda yagirmis birden bir oglan masini saxlayir qiza teklif edir ki buyur gedek. Qiz biraz tereddГјd edib masinina oturmaq istemirde amma qaranliqa ve yagisa gГ¶rede istemirdi yolda qalsin. Ne ise qiz razilasir oglanla gedir yolda sГ¶hbetlesirler ve bir birine nГ¶mrelerini verirler amma heqiqeten her ikisi bir birinden xoslari gelir. Oglan cox mehriban ve sade birisi imis. Bu isden 3 gГјn kecir qiz isteyir oglana zeng etsin amma cekinir Г¶zu-Г¶zune deyirki o meni niye yigmir gГ¶resen. 1 hefte kecir qiz cesaretini toplayib oglana zeng edir telefonu bir xanim gГ¶turur qiz sorusur Ramal hani bes , xanim baslayir aglamaga dedi o menim oglumdu bundan 1 hefte qezaya dГјsub. Qiz bunlari esidende &#351;oka dГјsГјr inana bilmir ve ehvalati acib danisir. Oglanin anasindan evin adresini alir hemin gece qiz sehere qeder yata bilmir ve seher acilan kimi gedir ora. Girir oglanin otagina gГ¶zlerine inana bilmir onun sekli sanki Nazli ile danisirdi o hadiseden sonra qiz evlenmir Гјreyini Ramal ile qara torpaga tapsirir. .',1342946131,0,10,'22-07-12 13:35',0);
/*!40000 ALTER TABLE `etiraf_text` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fb_prognoz`
--

DROP TABLE IF EXISTS `fb_prognoz`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fb_prognoz` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `football_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `kafcent` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `bal` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fb_prognoz`
--

LOCK TABLES `fb_prognoz` WRITE;
/*!40000 ALTER TABLE `fb_prognoz` DISABLE KEYS */;
/*!40000 ALTER TABLE `fb_prognoz` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fikirler`
--

DROP TABLE IF EXISTS `fikirler`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fikirler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` tinyblob NOT NULL,
  `title` tinyblob NOT NULL,
  `body` blob NOT NULL,
  `uid` tinyblob NOT NULL,
  `mid` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fikirler`
--

LOCK TABLES `fikirler` WRITE;
/*!40000 ALTER TABLE `fikirler` DISABLE KEYS */;
/*!40000 ALTER TABLE `fikirler` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `football`
--

DROP TABLE IF EXISTS `football`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `football` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `team_one` varchar(50) NOT NULL,
  `team_two` varchar(50) NOT NULL,
  `kafcent_0` varchar(25) NOT NULL,
  `kafcent_1` varchar(25) NOT NULL,
  `kafcent_2` varchar(25) NOT NULL,
  `foot_date` varchar(30) NOT NULL,
  `foot_status` int(1) NOT NULL DEFAULT '0',
  `foot_shot` varchar(10) NOT NULL DEFAULT '0 - 0',
  `time` int(11) NOT NULL,
  `bal` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `football`
--

LOCK TABLES `football` WRITE;
/*!40000 ALTER TABLE `football` DISABLE KEYS */;
/*!40000 ALTER TABLE `football` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `friends`
--

DROP TABLE IF EXISTS `friends`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `friends` (
  `klu4` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL DEFAULT '0',
  `usid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`klu4`)
) ENGINE=MyISAM AUTO_INCREMENT=143 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `friends`
--

LOCK TABLES `friends` WRITE;
/*!40000 ALTER TABLE `friends` DISABLE KEYS */;
INSERT INTO `friends` VALUES (137,11,173),(138,173,11),(139,11,190),(140,190,11);
/*!40000 ALTER TABLE `friends` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `group`
--

DROP TABLE IF EXISTS `group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `info` text NOT NULL,
  `admin` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `say` int(11) NOT NULL,
  `act` int(1) NOT NULL,
  `host` int(11) NOT NULL,
  `hit` int(11) NOT NULL,
  `beyen` int(11) NOT NULL,
  `znak_date` int(11) NOT NULL,
  `znak` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `group`
--

LOCK TABLES `group` WRITE;
/*!40000 ALTER TABLE `group` DISABLE KEYS */;
INSERT INTO `group` VALUES (26,'sevgisizzzzzzz','zzzzzzzzzzzzzzzzzzz',1,1363452912,0,0,1,11,0,1364749082,9);
/*!40000 ALTER TABLE `group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `group_ban`
--

DROP TABLE IF EXISTS `group_ban`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `group_ban` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `group_id` int(11) NOT NULL,
  `sebeb` varchar(500) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `group_ban`
--

LOCK TABLES `group_ban` WRITE;
/*!40000 ALTER TABLE `group_ban` DISABLE KEYS */;
/*!40000 ALTER TABLE `group_ban` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `group_count`
--

DROP TABLE IF EXISTS `group_count`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `group_count` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` text NOT NULL,
  `ip` text NOT NULL,
  `brow` text NOT NULL,
  `host` int(1) NOT NULL,
  `hit` int(11) NOT NULL,
  `date` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `group_count`
--

LOCK TABLES `group_count` WRITE;
/*!40000 ALTER TABLE `group_count` DISABLE KEYS */;
INSERT INTO `group_count` VALUES (58,'20','217.168.185.8','Nokia6303classic',0,0,''),(59,'22','82.145.216.13','Opera/9.80 (J2ME/MIDP; Opera Mini/7.0.31438/28.3182; U; az) Presto/2.8.119 Version/11.10',0,0,''),(60,'22','82.145.211.135','Opera/9.80 (J2ME/MIDP; Opera Mini/7.0.31438/28.3182; U; az) Presto/2.8.119 Version/11.10',0,0,''),(61,'22','82.145.209.83','Opera/9.80 (J2ME/MIDP; Opera Mini/7.0.31438/28.3182; U; az) Presto/2.8.119 Version/11.10',0,0,''),(62,'22','82.145.209.95','Opera/9.80 (J2ME/MIDP; Opera Mini/7.0.31438/28.3182; U; az) Presto/2.8.119 Version/11.10',0,0,''),(63,'25','217.168.185.49','Opera/9.80 (Windows NT 6.1; MRA 6.0 (build 5976)) Presto/2.12.388 Version/12.14',0,0,''),(64,'26','217.168.185.49','Opera/9.80 (Windows NT 6.1; MRA 6.0 (build 5976)) Presto/2.12.388 Version/12.14',0,0,'');
/*!40000 ALTER TABLE `group_count` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `group_like`
--

DROP TABLE IF EXISTS `group_like`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `group_like` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usid` int(11) DEFAULT '0',
  `user` varchar(80) DEFAULT NULL,
  `key` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=653 DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `group_like`
--

LOCK TABLES `group_like` WRITE;
/*!40000 ALTER TABLE `group_like` DISABLE KEYS */;
INSERT INTO `group_like` VALUES (644,2,'Mark_Plein',21),(652,1,'ADMIN',26);
/*!40000 ALTER TABLE `group_like` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `group_room`
--

DROP TABLE IF EXISTS `group_room`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `group_room` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `group_id` int(11) NOT NULL,
  `text` varchar(500) NOT NULL,
  `time` int(11) NOT NULL,
  `kime_nik` varchar(50) NOT NULL,
  `nov` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `group_room`
--

LOCK TABLES `group_room` WRITE;
/*!40000 ALTER TABLE `group_room` DISABLE KEYS */;
/*!40000 ALTER TABLE `group_room` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `group_sikayet`
--

DROP TABLE IF EXISTS `group_sikayet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `group_sikayet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aid` int(11) NOT NULL,
  `aid_name` varchar(100) NOT NULL,
  `usid` int(11) NOT NULL,
  `usid_name` varchar(100) NOT NULL,
  `group_id` int(11) NOT NULL,
  `text` varchar(500) NOT NULL,
  `act` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `group_sikayet`
--

LOCK TABLES `group_sikayet` WRITE;
/*!40000 ALTER TABLE `group_sikayet` DISABLE KEYS */;
/*!40000 ALTER TABLE `group_sikayet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hediyye_box`
--

DROP TABLE IF EXISTS `hediyye_box`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hediyye_box` (
  `acar` int(11) NOT NULL AUTO_INCREMENT,
  `kim` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `vaxt` int(11) NOT NULL,
  `tarix` varchar(20) NOT NULL,
  `time` int(11) NOT NULL,
  `text` varchar(250) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `hediyye` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  PRIMARY KEY (`acar`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hediyye_box`
--

LOCK TABLES `hediyye_box` WRITE;
/*!40000 ALTER TABLE `hediyye_box` DISABLE KEYS */;
INSERT INTO `hediyye_box` VALUES (19,'killer',1363724266,'17-03-2013',1363465066,'sene.canim',23,24,5);
/*!40000 ALTER TABLE `hediyye_box` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hekaye`
--

DROP TABLE IF EXISTS `hekaye`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hekaye` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usid` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `body` text NOT NULL,
  `act` int(1) NOT NULL DEFAULT '0',
  `ses` int(11) NOT NULL DEFAULT '0',
  `oxu` int(11) NOT NULL DEFAULT '0',
  `time` int(11) NOT NULL,
  `today_votes` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `act` (`act`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hekaye`
--

LOCK TABLES `hekaye` WRITE;
/*!40000 ALTER TABLE `hekaye` DISABLE KEYS */;
INSERT INTO `hekaye` VALUES (6,1,'ADMIN','sevgisiz omur','sevgisiz bir omur ya&#351;amaq cokmu kolay?????????',1,1,4,1363454276,1);
/*!40000 ALTER TABLE `hekaye` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hekaye_beyen`
--

DROP TABLE IF EXISTS `hekaye_beyen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hekaye_beyen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usid` int(11) NOT NULL,
  `hekid` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hekaye_beyen`
--

LOCK TABLES `hekaye_beyen` WRITE;
/*!40000 ALTER TABLE `hekaye_beyen` DISABLE KEYS */;
INSERT INTO `hekaye_beyen` VALUES (6,1,'6');
/*!40000 ALTER TABLE `hekaye_beyen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hesab`
--

DROP TABLE IF EXISTS `hesab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hesab` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `leqeb` text,
  `usid` int(11) DEFAULT NULL,
  `tarix` varchar(25) DEFAULT NULL,
  `saat` int(11) unsigned DEFAULT '0',
  `x` int(5) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hesab`
--

LOCK TABLES `hesab` WRITE;
/*!40000 ALTER TABLE `hesab` DISABLE KEYS */;
INSERT INTO `hesab` VALUES (8,'ADMIN',1,'',1365593224,11),(7,'ADMIN',1,'0',1365591399,9),(6,'ADMIN',1,'29.08.12 [01:16]',1348776973,6),(9,'killer',5,'15.03.13 [00:01]',1365883261,5),(10,'ADMIN',1,'15.03.13 [12:22]',1365927776,7),(11,'ADMIN',1,'16.03.13 [21:37]',1366047454,5),(12,'Admin',1,'27.03.13 [23:35]',1367004939,5);
/*!40000 ALTER TABLE `hesab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ignor`
--

DROP TABLE IF EXISTS `ignor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ignor` (
  `klu4` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL DEFAULT '0',
  `usid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`klu4`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ignor`
--

LOCK TABLES `ignor` WRITE;
/*!40000 ALTER TABLE `ignor` DISABLE KEYS */;
INSERT INTO `ignor` VALUES (15,14,10),(16,14,22),(17,14,18),(19,24,14),(22,24,10);
/*!40000 ALTER TABLE `ignor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `info_ignor`
--

DROP TABLE IF EXISTS `info_ignor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `info_ignor` (
  `klu4` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL DEFAULT '0',
  `usid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`klu4`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `info_ignor`
--

LOCK TABLES `info_ignor` WRITE;
/*!40000 ALTER TABLE `info_ignor` DISABLE KEYS */;
INSERT INTO `info_ignor` VALUES (22,821,714);
/*!40000 ALTER TABLE `info_ignor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `k_down`
--

DROP TABLE IF EXISTS `k_down`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `k_down` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kataloq` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `k_down`
--

LOCK TABLES `k_down` WRITE;
/*!40000 ALTER TABLE `k_down` DISABLE KEYS */;
INSERT INTO `k_down` VALUES (1,1,'Gulmeli'),(2,1,'Qizlar'),(3,1,'Muxtelif'),(4,1,'Avto'),(5,1,'Heyvanlar'),(6,2,'Azeri'),(7,2,'Turk'),(8,2,'Xarici'),(10,3,'Gulmeli'),(11,3,'Avto'),(12,3,'Balacalar'),(13,3,'Muxtelif'),(14,3,'Erotik'),(15,1,'Erotik');
/*!40000 ALTER TABLE `k_down` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lamerlik_edenler`
--

DROP TABLE IF EXISTS `lamerlik_edenler`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lamerlik_edenler` (
  `acar` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `kim` varchar(15) NOT NULL,
  `date` varchar(20) NOT NULL,
  `time` int(11) NOT NULL,
  `ip` varchar(30) NOT NULL,
  `soft` varchar(70) NOT NULL,
  `room` varchar(50) NOT NULL,
  PRIMARY KEY (`acar`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lamerlik_edenler`
--

LOCK TABLES `lamerlik_edenler` WRITE;
/*!40000 ALTER TABLE `lamerlik_edenler` DISABLE KEYS */;
INSERT INTO `lamerlik_edenler` VALUES (6,1,'Array','',1363449931,'','','Sql Injection Etmek Istedi');
/*!40000 ALTER TABLE `lamerlik_edenler` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `levels`
--

DROP TABLE IF EXISTS `levels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `levels` (
  `level` smallint(5) NOT NULL DEFAULT '0',
  `name` blob,
  PRIMARY KEY (`level`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `levels`
--

LOCK TABLES `levels` WRITE;
/*!40000 ALTER TABLE `levels` DISABLE KEYS */;
INSERT INTO `levels` VALUES (0,'QonaQ'),(1,'AKTIV_ISTIFADECISI'),(2,'en agilli!'),(3,'ViPka'),(4,'ViP'),(5,'MODER'),(6,'SuPeR_MODER'),(7,'ADMIN'),(8,'SUPER_ADMIN'),(9,'REHBERLIK');
/*!40000 ALTER TABLE `levels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `like_info`
--

DROP TABLE IF EXISTS `like_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `like_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usid` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `like_info`
--

LOCK TABLES `like_info` WRITE;
/*!40000 ALTER TABLE `like_info` DISABLE KEYS */;
/*!40000 ALTER TABLE `like_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mesaj`
--

DROP TABLE IF EXISTS `mesaj`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mesaj` (
  `klu4` int(11) NOT NULL AUTO_INCREMENT,
  `who` varchar(40) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `idwho` int(12) NOT NULL DEFAULT '0',
  `message` blob NOT NULL,
  `towhom` varchar(40) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `idtowhom` int(11) DEFAULT '0',
  `time` int(11) NOT NULL DEFAULT '0',
  `readd` tinyint(1) NOT NULL DEFAULT '0',
  `icaze` int(2) DEFAULT '0',
  `date` varchar(50) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `insend` tinyint(1) NOT NULL DEFAULT '1',
  `ininc` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`klu4`),
  KEY `ininc` (`ininc`),
  KEY `idtowhom` (`idtowhom`),
  KEY `readd` (`readd`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mesaj`
--

LOCK TABLES `mesaj` WRITE;
/*!40000 ALTER TABLE `mesaj` DISABLE KEYS */;
INSERT INTO `mesaj` VALUES (1,'Admin',1,'sssssssssss','sade_nik',3,1365365335,0,0,'01:08',1,1),(2,'Admin',1,'sssssssssss','aaaaaaaaaaaa',6,1365365403,1,0,'01:10',0,1),(3,'Admin',1,'ssssssssssssssss','xexe',5,1365365431,0,0,'01:10',1,1),(4,'Admin',1,'fffffffff','sade_nik',3,1365365491,0,0,'01:11',1,1),(5,'sade_nik',3,'soxum','Admin',1,1365373102,1,0,'03:18',0,1),(6,'xexe',5,'.ru','sade_nik',3,1365373643,0,0,'03:27',1,1),(7,'sade_nik',3,'.ru','xexe',5,1365373715,0,0,'03:28',1,1),(8,'ask_ceza',6,'soxum','sade_nik',3,1365375075,0,0,'03:51',1,1);
/*!40000 ALTER TABLE `mesaj` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mms`
--

DROP TABLE IF EXISTS `mms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mms` (
  `lid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL DEFAULT '0',
  `to` int(11) unsigned NOT NULL DEFAULT '0',
  `from` int(11) unsigned NOT NULL DEFAULT '0',
  `photo` varchar(25) DEFAULT NULL,
  `kod` text,
  `body` text CHARACTER SET cp1251 NOT NULL,
  `date` text CHARACTER SET cp1251 NOT NULL,
  `time` int(11) unsigned NOT NULL DEFAULT '0',
  `read` tinyint(1) NOT NULL DEFAULT '0',
  `d1` tinyint(1) DEFAULT '0',
  `d2` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`lid`)
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mms`
--

LOCK TABLES `mms` WRITE;
/*!40000 ALTER TABLE `mms` DISABLE KEYS */;
/*!40000 ALTER TABLE `mms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL DEFAULT '',
  `content` blob NOT NULL,
  `date` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 PACK_KEYS=0;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `obiav`
--

DROP TABLE IF EXISTS `obiav`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `obiav` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` text NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `obiav`
--

LOCK TABLES `obiav` WRITE;
/*!40000 ALTER TABLE `obiav` DISABLE KEYS */;
INSERT INTO `obiav` VALUES (21,'Admin','salam','salam');
/*!40000 ALTER TABLE `obiav` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `online_sms`
--

DROP TABLE IF EXISTS `online_sms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `online_sms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL DEFAULT '',
  `content` blob,
  `date` varchar(10) DEFAULT NULL,
  `usid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `online_sms`
--

LOCK TABLES `online_sms` WRITE;
/*!40000 ALTER TABLE `online_sms` DISABLE KEYS */;
INSERT INTO `online_sms` VALUES (100,'Admin','sasaasa','9.04.2013',1);
/*!40000 ALTER TABLE `online_sms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `onun_yarisi`
--

DROP TABLE IF EXISTS `onun_yarisi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `onun_yarisi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kim` int(11) NOT NULL,
  `nick` text NOT NULL,
  `info` text NOT NULL,
  `pul` int(11) NOT NULL,
  `yarim` text NOT NULL,
  `xowum` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `onun_yarisi`
--

LOCK TABLES `onun_yarisi` WRITE;
/*!40000 ALTER TABLE `onun_yarisi` DISABLE KEYS */;
/*!40000 ALTER TABLE `onun_yarisi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pesi`
--

DROP TABLE IF EXISTS `pesi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pesi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usid` varchar(30) NOT NULL,
  `user` varchar(30) NOT NULL,
  `text` blob NOT NULL,
  `time` int(11) NOT NULL,
  `ip` varchar(30) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `soft` varchar(100) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pesi`
--

LOCK TABLES `pesi` WRITE;
/*!40000 ALTER TABLE `pesi` DISABLE KEYS */;
/*!40000 ALTER TABLE `pesi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `qefes`
--

DROP TABLE IF EXISTS `qefes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `qefes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `usid` int(11) NOT NULL,
  `ses` int(11) DEFAULT '0',
  `nses` int(11) DEFAULT '0',
  `user` varchar(80) CHARACTER SET cp1251 COLLATE cp1251_bin DEFAULT NULL,
  `ruser` varchar(50) CHARACTER SET cp1251 COLLATE cp1251_bin DEFAULT NULL,
  `on` int(2) DEFAULT '0',
  `off` int(2) DEFAULT '0',
  `duel` int(2) DEFAULT '0',
  `qeyd` text,
  `date` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 PACK_KEYS=0;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `qefes`
--

LOCK TABLES `qefes` WRITE;
/*!40000 ALTER TABLE `qefes` DISABLE KEYS */;
/*!40000 ALTER TABLE `qefes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `qefess`
--

DROP TABLE IF EXISTS `qefess`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `qefess` (
  `klu4` int(11) NOT NULL AUTO_INCREMENT,
  `kim` int(11) NOT NULL DEFAULT '0',
  `kime` int(11) NOT NULL DEFAULT '0',
  `ses` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`klu4`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `qefess`
--

LOCK TABLES `qefess` WRITE;
/*!40000 ALTER TABLE `qefess` DISABLE KEYS */;
/*!40000 ALTER TABLE `qefess` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reg_limit`
--

DROP TABLE IF EXISTS `reg_limit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reg_limit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `md5` varchar(32) NOT NULL DEFAULT '',
  `code` varchar(20) NOT NULL DEFAULT '',
  `ip` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reg_limit`
--

LOCK TABLES `reg_limit` WRITE;
/*!40000 ALTER TABLE `reg_limit` DISABLE KEYS */;
INSERT INTO `reg_limit` VALUES (24,'7819a38e2ee09c9c5cd13f0179613fad','8f73ef07b8','5.44.39.227');
/*!40000 ALTER TABLE `reg_limit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reklam`
--

DROP TABLE IF EXISTS `reklam`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reklam` (
  `klu4` int(8) NOT NULL DEFAULT '0',
  `who` varchar(40) CHARACTER SET cp1251 COLLATE cp1251_bin NOT NULL DEFAULT '',
  `idwho` int(12) NOT NULL DEFAULT '0',
  `message` text NOT NULL,
  `towhom` varchar(40) CHARACTER SET cp1251 COLLATE cp1251_bin NOT NULL DEFAULT '',
  `idtowhom` int(12) NOT NULL DEFAULT '0',
  `time` int(11) NOT NULL DEFAULT '0',
  `readd` tinyint(1) NOT NULL DEFAULT '0',
  `topic` varchar(80) CHARACTER SET cp1251 COLLATE cp1251_bin NOT NULL DEFAULT '',
  `date` varchar(50) CHARACTER SET cp1251 COLLATE cp1251_bin NOT NULL DEFAULT '',
  `insend` tinyint(1) NOT NULL DEFAULT '1',
  `ininc` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`klu4`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reklam`
--

LOCK TABLES `reklam` WRITE;
/*!40000 ALTER TABLE `reklam` DISABLE KEYS */;
/*!40000 ALTER TABLE `reklam` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reytinq`
--

DROP TABLE IF EXISTS `reytinq`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reytinq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kim` int(11) NOT NULL DEFAULT '0',
  `kime` int(11) NOT NULL DEFAULT '0',
  `ses` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reytinq`
--

LOCK TABLES `reytinq` WRITE;
/*!40000 ALTER TABLE `reytinq` DISABLE KEYS */;
INSERT INTO `reytinq` VALUES (41,1,1,165),(42,24,24,1);
/*!40000 ALTER TABLE `reytinq` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `room0`
--

DROP TABLE IF EXISTS `room0`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `room0` (
  `klu4` int(8) NOT NULL DEFAULT '0',
  `time` varchar(5) NOT NULL DEFAULT '',
  `zn` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `who` varchar(40) NOT NULL DEFAULT '',
  `message` blob NOT NULL,
  `uid` int(11) NOT NULL DEFAULT '0',
  `id` double NOT NULL DEFAULT '0',
  `towhom` varchar(12) NOT NULL DEFAULT '',
  `hid` smallint(1) NOT NULL DEFAULT '0',
  `usid` int(12) NOT NULL DEFAULT '0',
  `reng` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`klu4`),
  KEY `id` (`id`),
  KEY `who` (`who`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room0`
--

LOCK TABLES `room0` WRITE;
/*!40000 ALTER TABLE `room0` DISABLE KEYS */;
/*!40000 ALTER TABLE `room0` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `room1`
--

DROP TABLE IF EXISTS `room1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `room1` (
  `klu4` int(8) NOT NULL DEFAULT '0',
  `time` varchar(5) NOT NULL DEFAULT '',
  `zn` varchar(20) NOT NULL DEFAULT '',
  `who` varchar(40) NOT NULL DEFAULT '',
  `message` blob NOT NULL,
  `uid` int(11) NOT NULL DEFAULT '0',
  `id` double NOT NULL DEFAULT '0',
  `towhom` varchar(12) NOT NULL DEFAULT '',
  `hid` smallint(1) NOT NULL DEFAULT '0',
  `usid` int(12) NOT NULL DEFAULT '0',
  `reng` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`klu4`),
  KEY `id` (`id`),
  KEY `who` (`who`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room1`
--

LOCK TABLES `room1` WRITE;
/*!40000 ALTER TABLE `room1` DISABLE KEYS */;
/*!40000 ALTER TABLE `room1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `room10`
--

DROP TABLE IF EXISTS `room10`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `room10` (
  `klu4` int(8) NOT NULL DEFAULT '0',
  `time` varchar(5) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `zn` varchar(20) NOT NULL DEFAULT '',
  `who` varchar(40) NOT NULL DEFAULT '',
  `message` blob NOT NULL,
  `uid` int(11) NOT NULL DEFAULT '0',
  `id` double NOT NULL DEFAULT '0',
  `towhom` varchar(12) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `hid` smallint(1) NOT NULL DEFAULT '0',
  `usid` int(12) NOT NULL DEFAULT '0',
  `pwd` varchar(255) NOT NULL DEFAULT '',
  `reng` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`klu4`),
  KEY `id` (`id`),
  KEY `who` (`who`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room10`
--

LOCK TABLES `room10` WRITE;
/*!40000 ALTER TABLE `room10` DISABLE KEYS */;
/*!40000 ALTER TABLE `room10` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `room2`
--

DROP TABLE IF EXISTS `room2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `room2` (
  `klu4` int(8) NOT NULL DEFAULT '0',
  `time` varchar(5) NOT NULL DEFAULT '',
  `zn` varchar(20) NOT NULL DEFAULT '',
  `who` varchar(40) NOT NULL DEFAULT '',
  `message` blob NOT NULL,
  `uid` int(11) NOT NULL DEFAULT '0',
  `id` double NOT NULL DEFAULT '0',
  `towhom` varchar(12) NOT NULL DEFAULT '',
  `hid` smallint(1) NOT NULL DEFAULT '0',
  `usid` int(12) NOT NULL DEFAULT '0',
  `reng` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`klu4`),
  KEY `id` (`id`),
  KEY `who` (`who`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room2`
--

LOCK TABLES `room2` WRITE;
/*!40000 ALTER TABLE `room2` DISABLE KEYS */;
INSERT INTO `room2` VALUES (51877316,'23:22','','Admin','<img src=\"smiles/70327720.gif\" alt=\".d5.\"/>',0,1365445342.34,'',0,1,'');
/*!40000 ALTER TABLE `room2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `room3`
--

DROP TABLE IF EXISTS `room3`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `room3` (
  `klu4` int(8) NOT NULL DEFAULT '0',
  `time` varchar(5) NOT NULL DEFAULT '',
  `zn` varchar(20) NOT NULL DEFAULT '',
  `who` varchar(40) NOT NULL DEFAULT '',
  `message` blob NOT NULL,
  `uid` int(11) NOT NULL DEFAULT '0',
  `id` double NOT NULL DEFAULT '0',
  `towhom` varchar(12) NOT NULL DEFAULT '',
  `hid` smallint(1) NOT NULL DEFAULT '0',
  `usid` int(12) NOT NULL DEFAULT '0',
  `reng` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`klu4`),
  KEY `id` (`id`),
  KEY `who` (`who`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room3`
--

LOCK TABLES `room3` WRITE;
/*!40000 ALTER TABLE `room3` DISABLE KEYS */;
INSERT INTO `room3` VALUES (88829062,'01:41','','Admin','sssssssssssssssssssssssss',0,9999999,'',0,1,NULL),(29120080,'03:45','','Qefes','<br/>Qefesde \"<u></u>\" ve \"<u></u>\" qald&#305;.<br/><b>Extra Duel</b> ba&#351;lad&#305;...<br/>Bu g&#252;n bu istifade&#231;ilerden biri \"<b>salamlar))))))</b>\" qazanacaq! <img src=\"img/ura.gif\" alt=\".ura.\"/><img src=\"img/ura.gif\" alt=\".ura.\"/><img src=\"img/ura.gif\" alt=\".ura.\"/>',0,1364769918,'',0,11,NULL),(69726702,'05:06','','REHBERLIK','<b>Admin</b>, - <u>Dehlize &#214;z &#351;eklini yerle&#351;dirdi...</u>',0,1364774765,'',0,10,NULL),(45854541,'01:59','','Qefes','<br/>Qefesde \"<u></u>\" ve \"<u></u>\" qald&#305;.<br/><b>Extra Duel</b> ba&#351;lad&#305;...<br/>Bu g&#252;n bu istifade&#231;ilerden biri \"<b>salamlar))))))</b>\" qazanacaq! <img src=\"img/ura.gif\" alt=\".ura.\"/><img src=\"img/ura.gif\" alt=\".ura.\"/><img src=\"img/ura.gif\" alt=\".ura.\"/>',0,1364849995,'',0,11,NULL),(11693376,'02:28','','Qefes','<br/>Qefesde \"<u></u>\" ve \"<u></u>\" qald&#305;.<br/><b>Extra Duel</b> ba&#351;lad&#305;...<br/>Bu g&#252;n bu istifade&#231;ilerden biri \"<b>salamlar))))))</b>\" qazanacaq! <img src=\"img/ura.gif\" alt=\".ura.\"/><img src=\"img/ura.gif\" alt=\".ura.\"/><img src=\"img/ura.gif\" alt=\".ura.\"/>',0,1365370092,'',0,11,NULL),(87642270,'03:52','','REHBERLIK','<b>Admin</b>, - <u>Dehlize &#214;z &#351;eklini yerle&#351;dirdi...</u>',0,1365375160,'',0,10,NULL);
/*!40000 ALTER TABLE `room3` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `room4`
--

DROP TABLE IF EXISTS `room4`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `room4` (
  `klu4` int(8) NOT NULL DEFAULT '0',
  `time` varchar(5) NOT NULL DEFAULT '',
  `zn` varchar(20) NOT NULL DEFAULT '',
  `who` varchar(40) NOT NULL DEFAULT '',
  `message` blob NOT NULL,
  `uid` int(11) NOT NULL DEFAULT '0',
  `id` double NOT NULL DEFAULT '0',
  `towhom` varchar(12) NOT NULL DEFAULT '',
  `hid` smallint(1) NOT NULL DEFAULT '0',
  `usid` int(12) NOT NULL DEFAULT '0',
  `reng` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`klu4`),
  KEY `id` (`id`),
  KEY `who` (`who`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room4`
--

LOCK TABLES `room4` WRITE;
/*!40000 ALTER TABLE `room4` DISABLE KEYS */;
INSERT INTO `room4` VALUES (88829062,'01:41','','Admin','sssssssssssssssssssssssss',0,9999999,'',0,1,NULL),(8126397,'03:45','','Qefes','<br/>Qefesde \"<u></u>\" ve \"<u></u>\" qald&#305;.<br/><b>Extra Duel</b> ba&#351;lad&#305;...<br/>Bu g&#252;n bu istifade&#231;ilerden biri \"<b>salamlar))))))</b>\" qazanacaq! <img src=\"img/ura.gif\" alt=\".ura.\"/><img src=\"img/ura.gif\" alt=\".ura.\"/><img src=\"img/ura.gif\" alt=\".ura.\"/>',0,1364769918,'',0,11,NULL),(18066169,'05:06','','REHBERLIK','<b>Admin</b>, - <u>Dehlize &#214;z &#351;eklini yerle&#351;dirdi...</u>',0,1364774765,'',0,10,NULL),(9233268,'01:59','','Qefes','<br/>Qefesde \"<u></u>\" ve \"<u></u>\" qald&#305;.<br/><b>Extra Duel</b> ba&#351;lad&#305;...<br/>Bu g&#252;n bu istifade&#231;ilerden biri \"<b>salamlar))))))</b>\" qazanacaq! <img src=\"img/ura.gif\" alt=\".ura.\"/><img src=\"img/ura.gif\" alt=\".ura.\"/><img src=\"img/ura.gif\" alt=\".ura.\"/>',0,1364849995,'',0,11,NULL),(81309253,'02:28','','Qefes','<br/>Qefesde \"<u></u>\" ve \"<u></u>\" qald&#305;.<br/><b>Extra Duel</b> ba&#351;lad&#305;...<br/>Bu g&#252;n bu istifade&#231;ilerden biri \"<b>salamlar))))))</b>\" qazanacaq! <img src=\"img/ura.gif\" alt=\".ura.\"/><img src=\"img/ura.gif\" alt=\".ura.\"/><img src=\"img/ura.gif\" alt=\".ura.\"/>',0,1365370092,'',0,11,NULL),(40315383,'03:52','','REHBERLIK','<b>Admin</b>, - <u>Dehlize &#214;z &#351;eklini yerle&#351;dirdi...</u>',0,1365375160,'',0,10,NULL);
/*!40000 ALTER TABLE `room4` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `room5`
--

DROP TABLE IF EXISTS `room5`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `room5` (
  `klu4` int(8) NOT NULL DEFAULT '0',
  `time` varchar(5) NOT NULL DEFAULT '',
  `zn` varchar(20) NOT NULL DEFAULT '',
  `who` varchar(40) NOT NULL DEFAULT '',
  `message` blob NOT NULL,
  `uid` int(11) NOT NULL DEFAULT '0',
  `id` double NOT NULL DEFAULT '0',
  `towhom` varchar(12) NOT NULL DEFAULT '',
  `hid` smallint(1) NOT NULL DEFAULT '0',
  `usid` int(12) NOT NULL DEFAULT '0',
  `reng` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`klu4`),
  KEY `id` (`id`),
  KEY `who` (`who`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room5`
--

LOCK TABLES `room5` WRITE;
/*!40000 ALTER TABLE `room5` DISABLE KEYS */;
INSERT INTO `room5` VALUES (78671948,'05:06','','REHBERLIK','<b>Admin</b>, - <u>Dehlize &#214;z &#351;eklini yerle&#351;dirdi...</u>',0,1364774765,'',0,10,NULL),(39998750,'01:59','','Qefes','<br/>Qefesde \"<u></u>\" ve \"<u></u>\" qald&#305;.<br/><b>Extra Duel</b> ba&#351;lad&#305;...<br/>Bu g&#252;n bu istifade&#231;ilerden biri \"<b>salamlar))))))</b>\" qazanacaq! <img src=\"img/ura.gif\" alt=\".ura.\"/><img src=\"img/ura.gif\" alt=\".ura.\"/><img src=\"img/ura.gif\" alt=\".ura.\"/>',0,1364849995,'',0,11,NULL),(24412599,'02:28','','Qefes','<br/>Qefesde \"<u></u>\" ve \"<u></u>\" qald&#305;.<br/><b>Extra Duel</b> ba&#351;lad&#305;...<br/>Bu g&#252;n bu istifade&#231;ilerden biri \"<b>salamlar))))))</b>\" qazanacaq! <img src=\"img/ura.gif\" alt=\".ura.\"/><img src=\"img/ura.gif\" alt=\".ura.\"/><img src=\"img/ura.gif\" alt=\".ura.\"/>',0,1365370092,'',0,11,NULL),(35940728,'03:52','','REHBERLIK','<b>Admin</b>, - <u>Dehlize &#214;z &#351;eklini yerle&#351;dirdi...</u>',0,1365375160,'',0,10,NULL);
/*!40000 ALTER TABLE `room5` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `room6`
--

DROP TABLE IF EXISTS `room6`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `room6` (
  `klu4` int(8) NOT NULL DEFAULT '0',
  `time` varchar(5) NOT NULL DEFAULT '',
  `zn` varchar(20) NOT NULL DEFAULT '',
  `who` varchar(40) NOT NULL DEFAULT '',
  `message` blob NOT NULL,
  `uid` int(11) NOT NULL DEFAULT '0',
  `id` double NOT NULL DEFAULT '0',
  `towhom` varchar(12) NOT NULL DEFAULT '',
  `hid` smallint(1) NOT NULL DEFAULT '0',
  `usid` int(12) NOT NULL DEFAULT '0',
  `reng` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`klu4`),
  KEY `id` (`id`),
  KEY `who` (`who`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room6`
--

LOCK TABLES `room6` WRITE;
/*!40000 ALTER TABLE `room6` DISABLE KEYS */;
INSERT INTO `room6` VALUES (88829062,'01:41','','Admin','sssssssssssssssssssssssss',0,9999999,'',0,1,NULL),(27836631,'03:45','','Qefes','<br/>Qefesde \"<u></u>\" ve \"<u></u>\" qald&#305;.<br/><b>Extra Duel</b> ba&#351;lad&#305;...<br/>Bu g&#252;n bu istifade&#231;ilerden biri \"<b>salamlar))))))</b>\" qazanacaq! <img src=\"img/ura.gif\" alt=\".ura.\"/><img src=\"img/ura.gif\" alt=\".ura.\"/><img src=\"img/ura.gif\" alt=\".ura.\"/>',0,1364769918,'',0,11,NULL),(42804673,'05:06','','REHBERLIK','<b>Admin</b>, - <u>Dehlize &#214;z &#351;eklini yerle&#351;dirdi...</u>',0,1364774765,'',0,10,NULL),(71722897,'01:59','','Qefes','<br/>Qefesde \"<u></u>\" ve \"<u></u>\" qald&#305;.<br/><b>Extra Duel</b> ba&#351;lad&#305;...<br/>Bu g&#252;n bu istifade&#231;ilerden biri \"<b>salamlar))))))</b>\" qazanacaq! <img src=\"img/ura.gif\" alt=\".ura.\"/><img src=\"img/ura.gif\" alt=\".ura.\"/><img src=\"img/ura.gif\" alt=\".ura.\"/>',0,1364849995,'',0,11,NULL),(98339117,'02:28','','Qefes','<br/>Qefesde \"<u></u>\" ve \"<u></u>\" qald&#305;.<br/><b>Extra Duel</b> ba&#351;lad&#305;...<br/>Bu g&#252;n bu istifade&#231;ilerden biri \"<b>salamlar))))))</b>\" qazanacaq! <img src=\"img/ura.gif\" alt=\".ura.\"/><img src=\"img/ura.gif\" alt=\".ura.\"/><img src=\"img/ura.gif\" alt=\".ura.\"/>',0,1365370092,'',0,11,NULL),(30756724,'03:52','','REHBERLIK','<b>Admin</b>, - <u>Dehlize &#214;z &#351;eklini yerle&#351;dirdi...</u>',0,1365375160,'',0,10,NULL);
/*!40000 ALTER TABLE `room6` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `room7`
--

DROP TABLE IF EXISTS `room7`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `room7` (
  `klu4` int(8) NOT NULL DEFAULT '0',
  `time` varchar(5) NOT NULL DEFAULT '',
  `zn` varchar(20) NOT NULL DEFAULT '',
  `who` varchar(40) NOT NULL DEFAULT '',
  `message` blob NOT NULL,
  `uid` int(11) NOT NULL DEFAULT '0',
  `id` double NOT NULL DEFAULT '0',
  `towhom` varchar(12) NOT NULL DEFAULT '',
  `hid` smallint(1) NOT NULL DEFAULT '0',
  `usid` int(12) NOT NULL DEFAULT '0',
  `reng` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`klu4`),
  KEY `id` (`id`),
  KEY `who` (`who`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room7`
--

LOCK TABLES `room7` WRITE;
/*!40000 ALTER TABLE `room7` DISABLE KEYS */;
INSERT INTO `room7` VALUES (88829062,'01:41','','Admin','sssssssssssssssssssssssss',0,9999999,'',0,1,NULL),(41613360,'03:45','','Qefes','<br/>Qefesde \"<u></u>\" ve \"<u></u>\" qald&#305;.<br/><b>Extra Duel</b> ba&#351;lad&#305;...<br/>Bu g&#252;n bu istifade&#231;ilerden biri \"<b>salamlar))))))</b>\" qazanacaq! <img src=\"img/ura.gif\" alt=\".ura.\"/><img src=\"img/ura.gif\" alt=\".ura.\"/><img src=\"img/ura.gif\" alt=\".ura.\"/>',0,1364769918,'',0,11,NULL),(23155059,'05:06','','REHBERLIK','<b>Admin</b>, - <u>Dehlize &#214;z &#351;eklini yerle&#351;dirdi...</u>',0,1364774765,'',0,10,NULL),(97352120,'01:59','','Qefes','<br/>Qefesde \"<u></u>\" ve \"<u></u>\" qald&#305;.<br/><b>Extra Duel</b> ba&#351;lad&#305;...<br/>Bu g&#252;n bu istifade&#231;ilerden biri \"<b>salamlar))))))</b>\" qazanacaq! <img src=\"img/ura.gif\" alt=\".ura.\"/><img src=\"img/ura.gif\" alt=\".ura.\"/><img src=\"img/ura.gif\" alt=\".ura.\"/>',0,1364849995,'',0,11,NULL),(77826490,'02:28','','Qefes','<br/>Qefesde \"<u></u>\" ve \"<u></u>\" qald&#305;.<br/><b>Extra Duel</b> ba&#351;lad&#305;...<br/>Bu g&#252;n bu istifade&#231;ilerden biri \"<b>salamlar))))))</b>\" qazanacaq! <img src=\"img/ura.gif\" alt=\".ura.\"/><img src=\"img/ura.gif\" alt=\".ura.\"/><img src=\"img/ura.gif\" alt=\".ura.\"/>',0,1365370092,'',0,11,NULL),(66073176,'03:52','','REHBERLIK','<b>Admin</b>, - <u>Dehlize &#214;z &#351;eklini yerle&#351;dirdi...</u>',0,1365375160,'',0,10,NULL);
/*!40000 ALTER TABLE `room7` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `room8`
--

DROP TABLE IF EXISTS `room8`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `room8` (
  `klu4` int(8) NOT NULL DEFAULT '0',
  `time` varchar(5) NOT NULL DEFAULT '',
  `zn` varchar(20) NOT NULL DEFAULT '',
  `who` varchar(40) NOT NULL DEFAULT '',
  `message` blob NOT NULL,
  `uid` int(11) NOT NULL DEFAULT '0',
  `id` double NOT NULL DEFAULT '0',
  `towhom` varchar(12) NOT NULL DEFAULT '',
  `hid` smallint(1) NOT NULL DEFAULT '0',
  `usid` int(12) NOT NULL DEFAULT '0',
  `reng` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`klu4`),
  KEY `id` (`id`),
  KEY `who` (`who`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room8`
--

LOCK TABLES `room8` WRITE;
/*!40000 ALTER TABLE `room8` DISABLE KEYS */;
INSERT INTO `room8` VALUES (88829062,'01:41','','Admin','sssssssssssssssssssssssss',0,9999999,'',0,1,NULL),(84598788,'03:45','','Qefes','<br/>Qefesde \"<u></u>\" ve \"<u></u>\" qald&#305;.<br/><b>Extra Duel</b> ba&#351;lad&#305;...<br/>Bu g&#252;n bu istifade&#231;ilerden biri \"<b>salamlar))))))</b>\" qazanacaq! <img src=\"img/ura.gif\" alt=\".ura.\"/><img src=\"img/ura.gif\" alt=\".ura.\"/><img src=\"img/ura.gif\" alt=\".ura.\"/>',0,1364769918,'',0,11,NULL),(76431311,'05:06','','REHBERLIK','<b>Admin</b>, - <u>Dehlize &#214;z &#351;eklini yerle&#351;dirdi...</u>',0,1364774765,'',0,10,NULL),(6679780,'01:59','','Qefes','<br/>Qefesde \"<u></u>\" ve \"<u></u>\" qald&#305;.<br/><b>Extra Duel</b> ba&#351;lad&#305;...<br/>Bu g&#252;n bu istifade&#231;ilerden biri \"<b>salamlar))))))</b>\" qazanacaq! <img src=\"img/ura.gif\" alt=\".ura.\"/><img src=\"img/ura.gif\" alt=\".ura.\"/><img src=\"img/ura.gif\" alt=\".ura.\"/>',0,1364849995,'',0,11,NULL),(12990831,'02:28','','Qefes','<br/>Qefesde \"<u></u>\" ve \"<u></u>\" qald&#305;.<br/><b>Extra Duel</b> ba&#351;lad&#305;...<br/>Bu g&#252;n bu istifade&#231;ilerden biri \"<b>salamlar))))))</b>\" qazanacaq! <img src=\"img/ura.gif\" alt=\".ura.\"/><img src=\"img/ura.gif\" alt=\".ura.\"/><img src=\"img/ura.gif\" alt=\".ura.\"/>',0,1365370092,'',0,11,NULL),(82725780,'03:52','','REHBERLIK','<b>Admin</b>, - <u>Dehlize &#214;z &#351;eklini yerle&#351;dirdi...</u>',0,1365375160,'',0,10,NULL);
/*!40000 ALTER TABLE `room8` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `room9`
--

DROP TABLE IF EXISTS `room9`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `room9` (
  `klu4` int(8) NOT NULL DEFAULT '0',
  `time` varchar(5) NOT NULL DEFAULT '',
  `zn` varchar(20) NOT NULL DEFAULT '',
  `who` varchar(40) NOT NULL DEFAULT '',
  `message` blob NOT NULL,
  `uid` int(11) NOT NULL DEFAULT '0',
  `id` double NOT NULL DEFAULT '0',
  `towhom` varchar(12) NOT NULL DEFAULT '',
  `hid` smallint(1) NOT NULL DEFAULT '0',
  `usid` int(12) NOT NULL DEFAULT '0',
  `reng` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`klu4`),
  KEY `id` (`id`),
  KEY `who` (`who`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room9`
--

LOCK TABLES `room9` WRITE;
/*!40000 ALTER TABLE `room9` DISABLE KEYS */;
INSERT INTO `room9` VALUES (88829062,'01:41','','Admin','sssssssssssssssssssssssss',0,9999999,'',0,1,NULL),(4004294,'03:45','','Qefes','<br/>Qefesde \"<u></u>\" ve \"<u></u>\" qald&#305;.<br/><b>Extra Duel</b> ba&#351;lad&#305;...<br/>Bu g&#252;n bu istifade&#231;ilerden biri \"<b>salamlar))))))</b>\" qazanacaq! <img src=\"img/ura.gif\" alt=\".ura.\"/><img src=\"img/ura.gif\" alt=\".ura.\"/><img src=\"img/ura.gif\" alt=\".ura.\"/>',0,1364769918,'',0,11,NULL),(19477997,'05:06','','REHBERLIK','<b>Admin</b>, - <u>Dehlize &#214;z &#351;eklini yerle&#351;dirdi...</u>',0,1364774765,'',0,10,NULL),(55726051,'01:59','','Qefes','<br/>Qefesde \"<u></u>\" ve \"<u></u>\" qald&#305;.<br/><b>Extra Duel</b> ba&#351;lad&#305;...<br/>Bu g&#252;n bu istifade&#231;ilerden biri \"<b>salamlar))))))</b>\" qazanacaq! <img src=\"img/ura.gif\" alt=\".ura.\"/><img src=\"img/ura.gif\" alt=\".ura.\"/><img src=\"img/ura.gif\" alt=\".ura.\"/>',0,1364849995,'',0,11,NULL),(15306075,'02:28','','Qefes','<br/>Qefesde \"<u></u>\" ve \"<u></u>\" qald&#305;.<br/><b>Extra Duel</b> ba&#351;lad&#305;...<br/>Bu g&#252;n bu istifade&#231;ilerden biri \"<b>salamlar))))))</b>\" qazanacaq! <img src=\"img/ura.gif\" alt=\".ura.\"/><img src=\"img/ura.gif\" alt=\".ura.\"/><img src=\"img/ura.gif\" alt=\".ura.\"/>',0,1365370092,'',0,11,NULL),(82190842,'03:52','','REHBERLIK','<b>Admin</b>, - <u>Dehlize &#214;z &#351;eklini yerle&#351;dirdi...</u>',0,1365375160,'',0,10,NULL);
/*!40000 ALTER TABLE `room9` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rooms` (
  `rm` smallint(5) NOT NULL AUTO_INCREMENT,
  `name` blob,
  `topic` blob,
  `pos` tinyint(2) NOT NULL DEFAULT '0',
  `nov` int(1) NOT NULL DEFAULT '0',
  `point` int(11) NOT NULL DEFAULT '0',
  `activ` int(1) DEFAULT '1',
  PRIMARY KEY (`rm`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 PACK_KEYS=0;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rooms`
--

LOCK TABLES `rooms` WRITE;
/*!40000 ALTER TABLE `rooms` DISABLE KEYS */;
INSERT INTO `rooms` VALUES (0,'Sual? Cavab!','Soyush ve Reklam olmaz...!',0,0,0,1),(1,'Meyxana','Tenhalig',2,0,0,1),(2,'Kafe Cayxana','BIZIM QEM XAAANE',3,0,0,1),(3,'Sevgililer','Sevgilim Seni Sevirem *SenineM*',1,0,0,1),(4,'V.i.P Otag','kafe NIHAT',4,1,50,1),(5,'Dini Otaq','LA ILAHE ILLELLAH',5,0,0,1),(6,'QONAQLAR','Tanishliq otagi',13,0,0,1),(7,'Yuxusuzlar','Sevgililer',3,0,0,1),(8,'Adminler otagi','Topick',11,0,0,1),(9,'QAYDASIZ','Ð‘ÐµÐ· ÑÑ‚Ð¸ÑÐ½ÐµÐ½Ð¸Ñ :)',7,0,0,1),(10,'Intim otaq','Zorduda bura.',6,0,0,1);
/*!40000 ALTER TABLE `rooms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `security_panel`
--

DROP TABLE IF EXISTS `security_panel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `security_panel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usid` int(11) DEFAULT '0',
  `login` varchar(30) DEFAULT NULL,
  `pass` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `security_panel`
--

LOCK TABLES `security_panel` WRITE;
/*!40000 ALTER TABLE `security_panel` DISABLE KEYS */;
INSERT INTO `security_panel` VALUES (2,1,'1','1');
/*!40000 ALTER TABLE `security_panel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `serhler`
--

DROP TABLE IF EXISTS `serhler`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `serhler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` tinyblob NOT NULL,
  `title` tinyblob NOT NULL,
  `body` blob NOT NULL,
  `uid` tinyblob NOT NULL,
  `mid` int(11) unsigned NOT NULL DEFAULT '0',
  `count_read` int(11) NOT NULL,
  `vote` int(11) NOT NULL,
  `date` blob NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `serhler`
--

LOCK TABLES `serhler` WRITE;
/*!40000 ALTER TABLE `serhler` DISABLE KEYS */;
INSERT INTO `serhler` VALUES (12,'_By_Rauf_','','qaqawim darixma duzeler inwallah.','21',22,0,0,''),(7,'ADMIN','','Hmm Yaxwi Olar InwAllah!','21',1,0,0,''),(13,'RuZGaR','','.kefsiz. kaw yanindada ola bilseydim','49',21,0,0,''),(10,'Milawka','','O geTdi sen geT yanina.','21',48,0,0,''),(11,'RuZGaR','','Maraqli Maraqsiz. Sen Getdin Her Wey Menasiz. Heyatı Yawadım Senle Kedersiz. Sen Gedenden Oldum wair Tek Ağ Vereqsiz. Heyatımi Yazdım. Acımı Paylawdım. Denize Baxıb Sevgimi dawlar Yazdım. Bir Gün oxusan Bu setrleri. Ağlama.! Yasımı Saxlama. Çünki Her Zaman Qelbinde Yawadım...','21',21,0,0,''),(14,'_By_Rauf_','','qelbindekine hemishe sadiq ol.....','49',22,0,0,''),(15,'Milawka','','VaxTinda hereket etmiyen kewkeler icinde qalar.','49',48,0,0,''),(16,'_By_Rauf_','','geler inwallah.','48',22,0,0,'');
/*!40000 ALTER TABLE `serhler` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `setting`
--

DROP TABLE IF EXISTS `setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `setting` (
  `klu4` smallint(1) NOT NULL DEFAULT '0',
  `shut` smallint(1) NOT NULL DEFAULT '0',
  `vict` smallint(1) NOT NULL DEFAULT '0',
  `shutint` smallint(4) NOT NULL DEFAULT '0',
  `victint` smallint(4) NOT NULL DEFAULT '0',
  `roomon` smallint(2) NOT NULL DEFAULT '0',
  `roomoff` smallint(2) NOT NULL DEFAULT '0',
  `prod` smallint(1) NOT NULL DEFAULT '0',
  `the` int(3) DEFAULT '10',
  `reg` smallint(1) NOT NULL DEFAULT '0',
  `computer` smallint(1) NOT NULL DEFAULT '1',
  `komputer` smallint(1) NOT NULL DEFAULT '1',
  `interv` int(4) NOT NULL DEFAULT '600',
  `xerc` int(11) DEFAULT '0',
  PRIMARY KEY (`klu4`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `setting`
--

LOCK TABLES `setting` WRITE;
/*!40000 ALTER TABLE `setting` DISABLE KEYS */;
INSERT INTO `setting` VALUES (1,0,1,600,10,0,9,0,15,1,1,1,600,1196);
/*!40000 ALTER TABLE `setting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sh_cat`
--

DROP TABLE IF EXISTS `sh_cat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sh_cat` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `kataloq` int(6) NOT NULL DEFAULT '0',
  `movzu` int(8) NOT NULL DEFAULT '0',
  `abc` int(2) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=cp1251 PACK_KEYS=0;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sh_cat`
--

LOCK TABLES `sh_cat` WRITE;
/*!40000 ALTER TABLE `sh_cat` DISABLE KEYS */;
/*!40000 ALTER TABLE `sh_cat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sh_new`
--

DROP TABLE IF EXISTS `sh_new`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sh_new` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `time` varchar(15) NOT NULL,
  `date` varchar(20) NOT NULL,
  `name` varchar(40) NOT NULL,
  `text` text NOT NULL,
  `description` text NOT NULL,
  `avtor` int(7) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sh_new`
--

LOCK TABLES `sh_new` WRITE;
/*!40000 ALTER TABLE `sh_new` DISABLE KEYS */;
/*!40000 ALTER TABLE `sh_new` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sh_podcat`
--

DROP TABLE IF EXISTS `sh_podcat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sh_podcat` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `refid` int(10) NOT NULL,
  `post` int(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sh_podcat`
--

LOCK TABLES `sh_podcat` WRITE;
/*!40000 ALTER TABLE `sh_podcat` DISABLE KEYS */;
INSERT INTO `sh_podcat` VALUES (1,'Ayriliq',3,0),(2,'Xosbextlik',3,0),(3,'Dostlar',4,0),(4,'Umumi',5,0),(5,'Ayeler',6,0),(6,'Sureler',6,0),(7,'ssssssssssssss',7,0);
/*!40000 ALTER TABLE `sh_podcat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sh_post`
--

DROP TABLE IF EXISTS `sh_post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sh_post` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `time` varchar(20) NOT NULL,
  `avtor` int(7) NOT NULL,
  `date` varchar(25) NOT NULL DEFAULT '2010.05.20 15:50',
  `text` text NOT NULL,
  `tema` int(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sh_post`
--

LOCK TABLES `sh_post` WRITE;
/*!40000 ALTER TABLE `sh_post` DISABLE KEYS */;
INSERT INTO `sh_post` VALUES (1,'1339015347',1,'07.06.2012 01:42','Hormetli Istifade&#231;iler.. Xai&#351; Olunur Hami Eynilikle Oz Fikirlerinizi Saytimizla Bagli Bolu&#351;esiz!',1),(2,'1339016170',20,'07.06.2012 01:56','eladi',1),(3,'1339440686',49,'11.06.2012 23:51','Cox seviyyeli, terbiyeli yerdir In&#351;allah da hemi&#351;e bele qalar. Allah komeyiniz olsun',1),(4,'1339449868',22,'12.06.2012 02:24','superdi....',1),(5,'1339485349',48,'12.06.2012 12:15','En seviyyeli super Mekandi.',1),(8,'1339752365',105,'15.06.2012 14:26','Qiz seni sevib ve atib ba&#351;ka bir oДџlan istiyir yeniden onu atib gelse onu qebul edesiz?',2),(7,'1339646931',116,'14.06.2012 09:08','Belede pis deyil , bezi seviyyesiz yerlerden yax&#351;idir ?',1),(9,'1339752655',105,'15.06.2012 14:30','Xo&#351;bextliq neden ibareti?ve Nece sevib Xo&#351;bext ede bilersen?',3),(10,'1339753319',105,'15.06.2012 14:41','Bura super Г§ati ve bunlar menim en yax&#351;i dostlarimdi Rusalka heyat admin ALLAH DAN ARZUM SEVENERД° AYRMASД°N AMД°N',1),(11,'1339792821',49,'16.06.2012 01:40','O ne demekdir? Xo&#351;bextlik neden ibaretdir?',3),(12,'1339938905',135,'17.06.2012 18:15','super cox gozel yerdi',1),(19,'1340093057',21,'19.06.2012 13:04','Pay atonna =) etim tГ¶kГјldГј',3),(20,'1340100568',48,'19.06.2012 15:09','xexexxe',3),(15,'1340052489',135,'19.06.2012 01:48','bunan hasant ne varki sevdiyini+goz bebeyin kimi qorayirsan.ve soramda ale qurursan ondan sorasida melum meseledi',3),(16,'1340079066',135,'19.06.2012 09:11','sizce insan sevdiyini unutmalidi yoxsam unutdurmalidi',4),(22,'1340268339',118,'21.06.2012 13:45','Hec 1ini etmemelidi insan sevdiyini hec vaxt unuda bilmir ele 1 &#351;ey hec kimin ba&#351;ina gelmesin amin',4),(23,'1340440826',118,'23.06.2012 13:40','(*_*)+(~_~)=(В¤_В¤)Her kim yazibsa baxib ibret gotursun',3),(24,'1340453830',180,'23.06.2012 17:17','Allah hec kime sevgi ezabini qismet etmesin',4),(25,'1340472388',114,'23.06.2012 22:26','indiki zamanede sevginin goru var ki kefenide olsun ne sevgiye indi hec insanliq yoxdu!!!',4),(26,'1340646761',194,'25.06.2012 22:52','YAX&#350;I DEMIREM, SUPER DIYIREM :D',1),(27,'1340743318',210,'27.06.2012 01:41','sevgi var.amma indiki zamenede insan kimi insan yoxdu',4),(28,'1340743550',210,'27.06.2012 01:45','Men burda tezeyeminaniramki terbiyeli insanlar var bu catda',1),(29,'1341051767',217,'30.06.2012 15:22','(~_-) hahaha',3),(31,'1341152763',49,'01.07.2012 19:26','Sevgi ele bir &#351;eydir ki onu kelemelrinle bele izah ede bilmezsen. Hem insana aci verir hem xo&#351;bextlik verir. Xo&#351;bextliye her adam doze bilir gerek o aciyada seviye dozesen cun ki hec kes deye bilmez ki menim sevgilimle problemim yoxdu amma Allah hec kese sevgi ezabi cekdiremsein',4),(33,'1341218823',228,'02.07.2012 13:47','bu suali usaga versen oda asanliqla cavab verer.',3),(34,'1341219203',228,'02.07.2012 13:53','sevdiyini unutmaq bu cox gulmelidi.eger heqiqeten sevmisense istesende onu qelbinden ata bilmersen.',4),(35,'1341567645',241,'06.07.2012 14:40','Eger gГјnГјn birinde bilmeden dostunuz sevdiyi insanI sevseniz ve sora bilsenizki dostunuz o insanI sevir neyniyerdiz',5),(36,'1341573558',48,'06.07.2012 16:19','xo&#351;bext olsun diyerem.',5),(37,'1342012966',291,'11.07.2012 18:22','Mence sevirsinizse ona ne unutmaq,yaxud unutdurmaq',4),(38,'1342013208',291,'11.07.2012 18:26','Allah Teala butun muselmanlarin gunahlarin efv etsin. Bizde icinde. Dinimizin gozelliklerini,oyrenmeye bize mohlet versin.',6),(39,'1342013511',291,'11.07.2012 18:31','Dinizde namehremle dani&#351;maq gunahdi. Sizcede bura gelib kimlese dani&#351;anda gunah qazaniriq?',7),(40,'1342013878',291,'11.07.2012 18:37','Cetin sual oldu. Eger qar&#351;iliqlidisa aradan cekilerem',5),(42,'1342872005',249,'21.07.2012 17:00','Qarabagimizi qaytaraqin hamiliqla. Olmekden qorxmaq lazim deyil axi veten bizimdir',8),(45,'1342954090',278,'22.07.2012 15:48','Elbetde gГјnahdi Allah bizi bagislasin.',7),(46,'1363335354',1,'15.03.2013 12:15','senenenensenenenensenenenensenenenensenenenensenenenensenenenen',9);
/*!40000 ALTER TABLE `sh_post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sh_tem`
--

DROP TABLE IF EXISTS `sh_tem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sh_tem` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `avtor` int(6) NOT NULL,
  `time` varchar(15) NOT NULL,
  `name` varchar(35) NOT NULL,
  `cat` int(6) NOT NULL,
  `close` int(1) NOT NULL,
  `tesdiq` int(1) DEFAULT '2',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=cp1251 PACK_KEYS=0;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sh_tem`
--

LOCK TABLES `sh_tem` WRITE;
/*!40000 ALTER TABLE `sh_tem` DISABLE KEYS */;
INSERT INTO `sh_tem` VALUES (1,1,'1340743550','FikirleriniZ?!',4,0,3),(2,105,'1342872306','Sevgi',1,0,3),(3,105,'1342014876','Xo&#351;bextliq',2,0,3),(4,135,'1342012966','sevgi',4,0,3),(5,241,'1342013878','Dost+sevgi',3,0,3),(6,291,'1342013208','Dinimizin gozellikleri',5,0,3),(7,291,'1342954090','Islam dini',5,0,3),(8,249,'1342872005','QARABAG',4,0,3),(9,1,'1363335354','senenenen',7,0,3);
/*!40000 ALTER TABLE `sh_tem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sifarish`
--

DROP TABLE IF EXISTS `sifarish`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sifarish` (
  `lid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL DEFAULT '0',
  `to` int(11) DEFAULT '0',
  `date` text CHARACTER SET cp1251 NOT NULL,
  `time` int(11) unsigned NOT NULL DEFAULT '0',
  `nov` tinyint(4) DEFAULT '0',
  `qeyd` text NOT NULL,
  PRIMARY KEY (`lid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sifarish`
--

LOCK TABLES `sifarish` WRITE;
/*!40000 ALTER TABLE `sifarish` DISABLE KEYS */;
/*!40000 ALTER TABLE `sifarish` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sikayet`
--

DROP TABLE IF EXISTS `sikayet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sikayet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `us` int(11) DEFAULT '0',
  `uid` int(11) DEFAULT '0',
  `sikayet` text,
  `nov` varchar(20) NOT NULL,
  `data` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=cp1251 PACK_KEYS=0;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sikayet`
--

LOCK TABLES `sikayet` WRITE;
/*!40000 ALTER TABLE `sikayet` DISABLE KEYS */;
/*!40000 ALTER TABLE `sikayet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `smiles`
--

DROP TABLE IF EXISTS `smiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `smiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pos` text NOT NULL,
  `img` text NOT NULL,
  `bolme` varchar(50) NOT NULL DEFAULT '',
  `who` varchar(40) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=363 DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `smiles`
--

LOCK TABLES `smiles` WRITE;
/*!40000 ALTER TABLE `smiles` DISABLE KEYS */;
INSERT INTO `smiles` VALUES (2,'.d1.','61107082.gif','1','by_Savik'),(5,'.bye.','18630024.gif','0','by_Savik'),(4,'.d2.','8572246.gif','1','by_Savik'),(6,'.xexe.','66814794.gif','5','by_Savik'),(7,'.u1.','92024206.gif','0','by_Savik'),(8,'.u2.','90620311.gif','0','by_Savik'),(9,'.u3.','19687939.gif','0','by_Savik'),(361,'.gulmek5.','40975779.gif','5','ADMIN'),(11,'.u5.','41271152.gif','0','by_Savik'),(12,'.u6.','10061868.gif','0','by_Savik'),(13,'.u7.','58441432.gif','0','by_Savik'),(14,'.u8.','73999703.gif','0','by_Savik'),(15,'.u9.','93650572.gif','0','by_Savik'),(16,'.u10.','37501058.gif','0','by_Savik'),(17,'.u11.','1444228.gif','0','by_Savik'),(342,'.fikir5.','57667171.gif','0','ADMIN'),(19,'.u13.','88214995.gif','0','by_Savik'),(20,'.u14.','80076924.gif','0','by_Savik'),(21,'.u15.','88116965.gif','0','by_Savik'),(22,'.u16.','42659047.gif','0','by_Savik'),(23,'.u17.','74228436.gif','0','by_Savik'),(24,'.u18.','81591853.gif','0','by_Savik'),(25,'.u19.','72864671.gif','0','by_Savik'),(26,'.u20.','1049566.gif','0','by_Savik'),(27,'.u21.','30721029.gif','0','by_Savik'),(28,'.u22.','35294593.gif','0','by_Savik'),(29,'.u23.','27692672.gif','0','by_Savik'),(30,'.u24.','43385767.gif','0','by_Savik'),(31,'.u25.','46654684.gif','0','by_Savik'),(32,'.u26.','24115603.gif','0','by_Savik'),(33,'.u27.','57279190.gif','0','by_Savik'),(34,'.u28.','7837131.gif','0','by_Savik'),(35,'.u29.','43757264.gif','0','by_Savik'),(36,'.u30.','22096806.gif','0','by_Savik'),(37,'.u31.','58146004.gif','0','by_Savik'),(38,'.u32.','54085417.gif','0','by_Savik'),(39,'.d3.','73626344.gif','1','by_Savik'),(40,'.d4.','78147822.gif','1','by_Savik'),(41,'.d5.','70327720.gif','1','by_Savik'),(42,'.d6.','48022188.gif','1','by_Savik'),(43,'.d7.','21592776.gif','1','by_Savik'),(44,'.d8.','60166032.gif','1','by_Savik'),(45,'.d9.','47069524.gif','1','by_Savik'),(46,'.d10.','24074337.gif','1','by_Savik'),(47,'.d11.','71250623.gif','1','by_Savik'),(48,'.d12.','98024819.gif','1','by_Savik'),(49,'.d13.','764808.gif','1','by_Savik'),(50,'.d14.','85850672.gif','1','by_Savik'),(51,'.d15.','14234337.gif','1','by_Savik'),(52,'.d16.','24272533.gif','1','by_Savik'),(53,'.d17.','67356921.gif','1','by_Savik'),(54,'.d18.','8397596.gif','1','by_Savik'),(55,'.d19.','17814777.gif','1','by_Savik'),(56,'.d20.','84387846.gif','1','by_Savik'),(57,'.i1.','52770176.gif','2','by_Savik'),(58,'.i2.','55970307.gif','2','by_Savik'),(59,'.i3.','71255545.gif','2','by_Savik'),(60,'.i4.','10419002.gif','2','by_Savik'),(61,'.i5.','12382765.gif','2','by_Savik'),(62,'.i6.','20595595.gif','2','by_Savik'),(63,'.i7.','15915986.gif','2','by_Savik'),(64,'.i8.','95496778.gif','2','by_Savik'),(65,'.i9.','82844396.gif','2','by_Savik'),(66,'.i10.','82116415.gif','2','by_Savik'),(67,'.i11.','94108346.gif','2','by_Savik'),(68,'.i12.','7815291.gif','2','by_Savik'),(69,'.i13.','54070492.gif','2','by_Savik'),(70,'.i14.','57674339.gif','2','by_Savik'),(71,'.i15.','96669877.gif','2','by_Savik'),(72,'.i16.','3589532.gif','2','by_Savik'),(73,'.i17.','64511098.gif','2','by_Savik'),(74,'.i18.','70742927.gif','2','by_Savik'),(75,'.i19.','74107965.gif','2','by_Savik'),(76,'.i20.','24283132.gif','2','by_Savik'),(77,'.i21.','38078730.gif','2','by_Savik'),(78,'.i22.','33869769.gif','2','by_Savik'),(79,'.i23.','67051114.gif','2','by_Savik'),(80,'.i24.','96587696.gif','2','by_Savik'),(81,'.i25.','11574362.gif','2','by_Savik'),(82,'.i26.','8706642.gif','2','by_Savik'),(83,'.i27.','30221042.gif','2','by_Savik'),(84,'.i28.','6494686.gif','2','by_Savik'),(85,'.i29.','68867368.gif','2','by_Savik'),(86,'.i30.','42842617.gif','2','by_Savik'),(87,'.xezer.','88972983.gif','2','by_Savik'),(88,'.s1.','63236476.gif','3','by_Savik'),(89,'.s2.','54792633.gif','3','by_Savik'),(90,'.s3.','24898689.gif','3','by_Savik'),(91,'.s4.','68527429.gif','3','by_Savik'),(92,'.s5.','39041207.gif','3','by_Savik'),(93,'.s6.','19815360.gif','3','by_Savik'),(94,'.s7.','19177802.gif','3','by_Savik'),(95,'.s8.','19469781.gif','3','by_Savik'),(96,'.s9.','20164228.gif','3','by_Savik'),(97,'.s10.','60770911.gif','3','by_Savik'),(98,'.s11.','18595159.gif','3','by_Savik'),(99,'.s12.','41972836.gif','3','by_Savik'),(100,'.s13.','21559520.gif','3','by_Savik'),(101,'.s14.','63648424.gif','3','by_Savik'),(102,'.s15.','41798400.gif','3','by_Savik'),(103,'.s16.','75208276.gif','3','by_Savik'),(104,'.s17.','66116974.gif','3','by_Savik'),(105,'.s18.','47676037.gif','3','by_Savik'),(106,'.s19.','82052312.gif','3','by_Savik'),(107,'.s20.','65315847.gif','3','by_Savik'),(108,'.s21.','33120094.gif','3','by_Savik'),(109,'.s22.','78475634.gif','3','by_Savik'),(110,'.s23.','87657667.gif','3','by_Savik'),(111,'.s24.','24241018.gif','3','by_Savik'),(112,'.s25.','89867700.gif','3','by_Savik'),(113,'.s26.','55911302.gif','3','by_Savik'),(114,'.s27.','15385912.gif','3','by_Savik'),(115,'.s28.','20283652.gif','3','by_Savik'),(116,'.h1.','41902526.gif','4','by_Savik'),(117,'.h2.','28790873.gif','4','by_Savik'),(118,'.h3.','89854737.gif','4','by_Savik'),(119,'.h4.','14025392.gif','4','by_Savik'),(120,'.h5.','86510278.gif','4','by_Savik'),(121,'.h6.','2864713.gif','4','by_Savik'),(122,'.h7.','69201646.gif','4','by_Savik'),(123,'.h8.','21482323.gif','4','by_Savik'),(124,'.h9.','9917521.gif','4','by_Savik'),(125,'.h10.','70954034.gif','4','by_Savik'),(126,'.h11.','80853960.gif','4','by_Savik'),(127,'.h12.','65864002.gif','4','by_Savik'),(128,'.h13.','57872091.gif','4','by_Savik'),(129,'.h14.','85058884.gif','4','by_Savik'),(130,'.h15.','98114401.gif','4','by_Savik'),(131,'.h16.','7825167.gif','4','by_Savik'),(132,'.h17.','43062844.gif','4','by_Savik'),(133,'.h18.','78898724.gif','4','by_Savik'),(134,'.h19.','71602409.gif','4','by_Savik'),(135,'.g1.','31673681.gif','5','by_Savik'),(136,'.g2.','56060044.gif','5','by_Savik'),(137,'.g3.','2241635.gif','5','by_Savik'),(138,'.g4.','79886418.gif','5','by_Savik'),(139,'.g5.','97246885.gif','5','by_Savik'),(140,'.g6.','91473120.gif','5','by_Savik'),(141,'.g7.','15255754.gif','5','by_Savik'),(142,'.g8.','86589121.gif','5','by_Savik'),(143,'.g9.','1973642.gif','5','by_Savik'),(144,'.g10.','72347056.gif','5','by_Savik'),(145,'.g11.','46252511.gif','5','by_Savik'),(146,'.g12.','82594195.gif','5','by_Savik'),(147,'.g13.','72954396.gif','5','by_Savik'),(148,'.g14.','51108263.gif','5','by_Savik'),(149,'.g15.','75014372.gif','5','by_Savik'),(150,'.g16.','9428441.gif','5','by_Savik'),(151,'.m1.','19954676.gif','6','by_Savik'),(152,'.m2.','28450713.gif','6','by_Savik'),(153,'.m3.','82520581.gif','6','by_Savik'),(154,'.m4.','36020450.gif','6','by_Savik'),(155,'.m5.','45470451.gif','6','by_Savik'),(156,'.m6.','84658305.gif','6','by_Savik'),(157,'.m7.','48855290.gif','6','by_Savik'),(158,'.m8.','74207942.gif','6','by_Savik'),(159,'.m9.','15227076.gif','6','by_Savik'),(160,'.m10.','58475263.gif','6','by_Savik'),(161,'.m11.','86657583.gif','6','by_Savik'),(162,'.m12.','40988081.gif','6','by_Savik'),(163,'.m13.','85241293.gif','6','by_Savik'),(164,'.m14.','1930412.gif','6','by_Savik'),(165,'.m15.','5338723.gif','6','by_Savik'),(166,'.m16.','40450459.gif','6','by_Savik'),(167,'.a1.','53668058.gif','7','by_Savik'),(168,'.a2.','33926026.gif','7','by_Savik'),(169,'.a3.','42860821.gif','7','by_Savik'),(170,'.a4.','93141446.gif','7','by_Savik'),(171,'.a5.','44140654.gif','7','by_Savik'),(172,'.a6.','49640962.gif','7','by_Savik'),(173,'.a7.','2129335.gif','7','by_Savik'),(174,'.a8.','89071686.gif','7','by_Savik'),(175,'.a9.','77922650.gif','7','by_Savik'),(176,'.a10.','8010713.gif','7','by_Savik'),(177,'.a11.','5627206.gif','7','by_Savik'),(178,'.a12.','2231606.gif','7','by_Savik'),(179,'.a13.','226100.gif','7','by_Savik'),(180,'.av1.','5299830.gif','8','by_Savik'),(181,'.av2.','32468467.gif','8','by_Savik'),(182,'.av3.','85234654.gif','8','by_Savik'),(183,'.av4.','40152943.gif','8','by_Savik'),(184,'.av5.','53415185.gif','8','by_Savik'),(185,'.av6.','60691838.gif','8','by_Savik'),(186,'.av7.','8157773.gif','8','by_Savik'),(187,'.av8.','68110380.gif','8','by_Savik'),(188,'.av9.','25611711.gif','8','by_Savik'),(189,'.av10.','38623117.gif','8','by_Savik'),(190,'.av11.','96004581.gif','8','by_Savik'),(191,'.av12.','32627135.gif','8','by_Savik'),(192,'.av13.','29094240.gif','8','by_Savik'),(193,'.ut1.','98096933.gif','9','by_Savik'),(194,'.ut2.','24290103.gif','9','by_Savik'),(195,'.ut3.','66170262.gif','9','by_Savik'),(196,'.ut4.','36711057.gif','9','by_Savik'),(197,'.av15.','21043640.gif','8','by_Savik'),(345,'.gl.','23053380.gif','0','ADMIN'),(199,'.ignor.','66321177.gif','0','[K]_[R]_[A]_[L]'),(200,'.loving.','59082474.gif','3','[K]_[R]_[A]_[L]'),(201,'.pul.','12467778.gif','0','[K]_[R]_[A]_[L]'),(202,'.isledi.','33297796.jpg','0','[K]_[R]_[A]_[L]'),(203,'.yoxlamadim.','4965098.jpg','0','[K]_[R]_[A]_[L]'),(204,'.ban.','42483888.jpg','0','[K]_[R]_[A]_[L]'),(205,'.islemedi.','9890366.jpg','0','[K]_[R]_[A]_[L]'),(206,'.tovsiye.','86732862.jpg','0','[K]_[R]_[A]_[L]'),(207,'.coxsagol.','95869474.jpg','0','[K]_[R]_[A]_[L]'),(208,'.yalandeyirsen.','45192175.jpg','0','[K]_[R]_[A]_[L]'),(209,'.doyus.','20946869.gif','1','[K]_[R]_[A]_[L]'),(210,'.kiss.','53513209.gif','3','[K]_[R]_[A]_[L]'),(211,'.nevarneyox.','28073980.gif','0','[K]_[R]_[A]_[L]'),(212,'.yeriyoxdu.','82673183.gif','0','[K]_[R]_[A]_[L]'),(214,'.gelirem.','64652198.gif','0','[K]_[R]_[A]_[L]'),(215,'.gizlen.','42667971.gif','0','[K]_[R]_[A]_[L]'),(216,'.gulmeli.','15501393.gif','5','[K]_[R]_[A]_[L]'),(217,'.urra.','25842737.gif','5','[K]_[R]_[A]_[L]'),(219,'.adgunu.','11274693.gif','0','[K]_[R]_[A]_[L]'),(220,'.bee.','98852936.gif','5','[K]_[R]_[A]_[L]'),(221,'.dans.','13245228.gif','6','[K]_[R]_[A]_[L]'),(222,'.deyingen.','29931858.gif','5','[K]_[R]_[A]_[L]'),(223,'.evli.','94703356.gif','3','[K]_[R]_[A]_[L]'),(224,'.loban.','2254069.gif','5','[K]_[R]_[A]_[L]'),(225,'.gozel.','85978279.gif','3','[K]_[R]_[A]_[L]'),(226,'.kaftar.','83379804.gif','5','[K]_[R]_[A]_[L]'),(227,'.kral.','36958158.gif','0','[K]_[R]_[A]_[L]'),(305,'.sevgi2.','91110257.gif','3','[K]_[R]_[A]_[L]'),(229,'.kral1.','34260853.gif','0','[K]_[R]_[A]_[L]'),(230,'.opss.','55426914.gif','5','[K]_[R]_[A]_[L]'),(231,'.opucuk.','46845104.gif','3','[K]_[R]_[A]_[L]'),(232,'.opush.','81444258.gif','3','[K]_[R]_[A]_[L]'),(233,'.qaqash.','92321708.gif','4','[K]_[R]_[A]_[L]'),(234,'.salamlar.','62598250.gif','0','[K]_[R]_[A]_[L]'),(235,'.sohbet.','40572526.gif','0','[K]_[R]_[A]_[L]'),(236,'.urra1.','94438553.gif','5','[K]_[R]_[A]_[L]'),(237,'.uydaa.','4747135.gif','5','[K]_[R]_[A]_[L]'),(238,'.hacker.','28305069.gif','0','[K]_[R]_[A]_[L]'),(239,'.yerivar.','58836307.gif','0','[K]_[R]_[A]_[L]'),(358,'.r6.','52974118.gif','7','ADMIN'),(241,'.aile.','90147413.gif','0','[K]_[R]_[A]_[L]'),(242,'.ashiq.','86705120.gif','3','[K]_[R]_[A]_[L]'),(243,'.at.','11838071.gif','5','[K]_[R]_[A]_[L]'),(244,'.balaca.','77823180.gif','5','[K]_[R]_[A]_[L]'),(245,'.balam.','83407168.gif','5','[K]_[R]_[A]_[L]'),(246,'.bandaj.','4972237.gif','5','[K]_[R]_[A]_[L]'),(247,'.bann.','73371992.gif','5','[K]_[R]_[A]_[L]'),(248,'.basket.','75584366.gif','0','[K]_[R]_[A]_[L]'),(249,'.break.','67023025.gif','5','[K]_[R]_[A]_[L]'),(250,'.cancana.','44005008.gif','3','[K]_[R]_[A]_[L]'),(251,'.cholaq.','2008478.gif','5','[K]_[R]_[A]_[L]'),(252,'.dans.','85437281.gif','5','[K]_[R]_[A]_[L]'),(253,'.deniz.','72992146.gif','5','[K]_[R]_[A]_[L]'),(254,'.dondurma.','59565159.gif','5','[K]_[R]_[A]_[L]'),(255,'.eat.','37757853.gif','5','[K]_[R]_[A]_[L]'),(256,'.elcal.','42702513.gif','5','[K]_[R]_[A]_[L]'),(257,'.enceli.','79752122.gif','5','[K]_[R]_[A]_[L]'),(258,'.esebi.','18300158.gif','4','[K]_[R]_[A]_[L]'),(259,'.flip.','74087501.gif','5','[K]_[R]_[A]_[L]'),(260,'.fuck.','22729416.gif','5','[K]_[R]_[A]_[L]'),(261,'.gel.','71710624.gif','3','[K]_[R]_[A]_[L]'),(262,'.xg.','6982394.gif','0','[K]_[R]_[A]_[L]'),(263,'.xg1.','13055953.gif','0','[K]_[R]_[A]_[L]'),(264,'.gey.','72490601.gif','5','[K]_[R]_[A]_[L]'),(265,'.ruh.','7969186.gif','5','[K]_[R]_[A]_[L]'),(266,'.good.','98359275.gif','5','[K]_[R]_[A]_[L]'),(267,'.guldana.','63022014.gif','5','[K]_[R]_[A]_[L]'),(268,'.guzgu.','10200347.gif','3','[K]_[R]_[A]_[L]'),(269,'.heyasiz.','49233128.gif','4','[K]_[R]_[A]_[L]'),(339,'.be2.','36062099.gif','0','ADMIN'),(271,'.hmm.','38723888.gif','5','[K]_[R]_[A]_[L]'),(272,'.idea.','24884305.gif','0','[K]_[R]_[A]_[L]'),(273,'.istefa.','70613166.gif','5','[K]_[R]_[A]_[L]'),(274,'.istirahet.','54621979.gif','0','[K]_[R]_[A]_[L]'),(275,'.it.','62845667.gif','0','[K]_[R]_[A]_[L]'),(276,'.jump.','10970565.gif','5','[K]_[R]_[A]_[L]'),(277,'.kerpic.','55713743.gif','5','[K]_[R]_[A]_[L]'),(278,'.lampa.','8673013.gif','0','[K]_[R]_[A]_[L]'),(279,'.nunu.','39338794.gif','5','[K]_[R]_[A]_[L]'),(280,'.olee.','3101539.gif','5','[K]_[R]_[A]_[L]'),(281,'.pomidor.','65249658.gif','5','[K]_[R]_[A]_[L]'),(282,'.qedesh.','80851246.gif','5','[K]_[R]_[A]_[L]'),(283,'.ruh1.','85326028.gif','5','[K]_[R]_[A]_[L]'),(284,'.sac.','1223019.gif','3','[K]_[R]_[A]_[L]'),(285,'.saxmat.','94155736.gif','0','[K]_[R]_[A]_[L]'),(286,'.sevgili.','40199562.gif','3','[K]_[R]_[A]_[L]'),(346,'.kefsiz.','52135383.gif','0','ADMIN'),(288,'.smoke.','34810821.gif','5','[K]_[R]_[A]_[L]'),(289,'.suruyerem.','58853858.gif','5','[K]_[R]_[A]_[L]'),(290,'.talk.','96186704.gif','5','[K]_[R]_[A]_[L]'),(291,'.sexx.','44912559.gif','5','[K]_[R]_[A]_[L]'),(292,'.unitaz.','95653145.gif','5','[K]_[R]_[A]_[L]'),(293,'.vurbura.','95570961.gif','5','[K]_[R]_[A]_[L]'),(294,'.yagish.','37953230.gif','0','[K]_[R]_[A]_[L]'),(295,'.yagish1.','99875853.gif','0','[K]_[R]_[A]_[L]'),(296,'.yellencek.','73688059.gif','5','[K]_[R]_[A]_[L]'),(297,'.yemek.','92086646.gif','5','[K]_[R]_[A]_[L]'),(298,'.zeng.','70408669.gif','5','[K]_[R]_[A]_[L]'),(299,'.opuss.','68262888.gif','5','[K]_[R]_[A]_[L]'),(306,'.emanetolun.','56793841.gif','0','[K]_[R]_[A]_[L]'),(344,'.get.','43938072.gif','0','ADMIN'),(303,'.salam.','74485732.gif','0','[K]_[R]_[A]_[L]'),(304,'.yeniil.','82567698.gif','0','[K]_[R]_[A]_[L]'),(307,'.haha.','79343363.gif','5','[K]_[R]_[A]_[L]'),(308,'.ala.','92835247.gif','5','[K]_[R]_[A]_[L]'),(309,'.olll.','62844406.gif','4','[K]_[R]_[A]_[L]'),(310,'.xeste.','91880384.gif','0','[K]_[R]_[A]_[L]'),(311,'.utu.','63399876.gif','0','[K]_[R]_[A]_[L]'),(312,'.sex.','96438227.gif','0','[K]_[R]_[A]_[L]'),(313,'.canim.','91071688.gif','3','[K]_[R]_[A]_[L]'),(314,'.polis.','15281765.gif','0','[K]_[R]_[A]_[L]'),(315,'.paltar.','82246938.gif','0','[K]_[R]_[A]_[L]'),(316,'.cimcim.','83712427.gif','0','[K]_[R]_[A]_[L]'),(317,'.off.','50313540.gif','0','[K]_[R]_[A]_[L]'),(318,'.sagol.','66235897.gif','0','[K]_[R]_[A]_[L]'),(319,'.toszoran.','42853585.gif','0','[K]_[R]_[A]_[L]'),(337,'.eh.','88089553.gif','0','ADMIN'),(343,'.fkr.','1710110.gif','0','ADMIN'),(326,'.mad.','29218126.gif','0','ADMIN'),(338,'.be.','99519532.gif','0','ADMIN'),(328,'.dum.','21719245.gif','4','ADMIN'),(329,'.op2.','25088591.gif','3','ADMIN'),(330,'.bebe.','2973487.gif','0','ADMIN'),(360,'.mac.','22045114.gif','0','ADMIN'),(332,'.sirinler.','21106616.gif','0','ADMIN'),(333,'.svg1.','53580226.gif','3','ADMIN'),(359,'.ramil.','85498955.jpg','0','ADMIN'),(340,'.dry.','59066682.gif','0','ADMIN'),(347,'.opdum.','65092285.gif','0','ADMIN'),(348,'.nolar.','93909974.gif','0','ADMIN'),(349,'.yox2.','84975265.gif','0','ADMIN'),(350,'.utan.','93130479.gif','0','ADMIN'),(351,':))','99178083.gif','0','ADMIN'),(352,'.pisiy.','29650152.gif','0','ADMIN'),(353,'.zg.','17443878.gif','0','ADMIN'),(354,'.xaxa.','2005923.gif','0','ADMIN'),(355,'.ucdun.','33596722.gif','0','ADMIN'),(356,'.nono.','20186278.gif','0','ADMIN'),(357,'.ur2.','29608870.gif','0','ADMIN'),(362,'salam','83451013.gif','0','ADMIN');
/*!40000 ALTER TABLE `smiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `spamm_edenler`
--

DROP TABLE IF EXISTS `spamm_edenler`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `spamm_edenler` (
  `acar` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `kim` varchar(15) NOT NULL,
  `date` varchar(20) NOT NULL,
  `time` int(11) NOT NULL,
  `ip` varchar(30) NOT NULL,
  `soft` varchar(70) NOT NULL,
  `room` varchar(50) NOT NULL,
  PRIMARY KEY (`acar`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `spamm_edenler`
--

LOCK TABLES `spamm_edenler` WRITE;
/*!40000 ALTER TABLE `spamm_edenler` DISABLE KEYS */;
/*!40000 ALTER TABLE `spamm_edenler` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `st_hediyye`
--

DROP TABLE IF EXISTS `st_hediyye`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `st_hediyye` (
  `sira` int(11) NOT NULL,
  `klu4` int(11) NOT NULL AUTO_INCREMENT,
  `adi` varchar(60) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `nov` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`klu4`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `st_hediyye`
--

LOCK TABLES `st_hediyye` WRITE;
/*!40000 ALTER TABLE `st_hediyye` DISABLE KEYS */;
INSERT INTO `st_hediyye` VALUES (1,1,'Karopka','sade'),(2,2,'&#350;okolad','sade'),(3,3,'Mi&#351;ka','sade'),(4,4,'Oyuncaq Donuz','sade'),(5,5,'Oyuncaq Maral','sade'),(44,6,'Q&#305;z&#305;l G&#252;l','bahali'),(6,7,'Kukla','sade'),(7,8,'Micky Maus','sade'),(8,9,'Qar Adam','sade'),(9,10,'&#304;nek Kuklas&#305;','sade'),(10,11,'&#214;k&#252;z Kuklas&#305;','sade'),(12,13,'Karopka','maraqli'),(13,14,'Karopka','maraqli'),(14,15,'Karopka','maraqli'),(15,16,'S&#252;venir Q&#305;l&#305;nc&#305;','maraqli'),(16,17,'Qar Q&#305;z','maraqli'),(17,18,'Reqqas Q&#305;z','maraqli'),(18,19,'Pive Bakal&#305;','maraqli'),(19,20,'S&#252;venir Yumurta','maraqli'),(20,21,'S&#252;venir Qutu','maraqli'),(21,22,'Yax&#351;i Moderator','xususi'),(23,24,'&#220;rek acar&#305;','xususi'),(24,25,'Qiymet','xususi'),(25,26,'Q&#305;z&#305;l','xususi'),(26,27,'Q&#305;z&#305;l Saat','xususi'),(27,28,'&#351;axta Baba','xususi'),(28,29,'Qar Q&#305;z','xususi'),(29,30,'&#220;rek Tort','xususi'),(30,31,'G&#252;m&#252;&#351;','xususi'),(31,32,'&#304;ki Q&#305;z&#305;l &#220;rek','xususi'),(32,33,'Q&#305;z&#305;l &#220;rek','xususi'),(33,34,'K&#246;vrek &#220;rek','xususi'),(34,35,'Da&#351; &#220;rek','xususi'),(35,36,'Ba&#287;l&#305; &#220;rek','xususi'),(36,37,'Seven &#220;rek','xususi'),(37,38,'Dost &#220;rek','xususi'),(38,39,'Son Zeng','xususi'),(39,40,'Pi&#351;ik','xususi'),(40,41,'Melek','xususi'),(41,42,'U&#287;ur Meleyi','bahali'),(42,43,'&#220;rek','bahali'),(43,44,'&#199;i&#231;ek','bahali'),(45,45,'Seni Sevirem','bahali'),(46,46,'I Love You','bahali'),(47,47,'Sevgi','bahali'),(48,48,'A&#351;kim','bahali');
/*!40000 ALTER TABLE `st_hediyye` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status_like`
--

DROP TABLE IF EXISTS `status_like`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status_like` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usid` int(11) DEFAULT '0',
  `user` varchar(80) DEFAULT NULL,
  `key` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status_like`
--

LOCK TABLES `status_like` WRITE;
/*!40000 ALTER TABLE `status_like` DISABLE KEYS */;
/*!40000 ALTER TABLE `status_like` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stsonline_fikir`
--

DROP TABLE IF EXISTS `stsonline_fikir`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stsonline_fikir` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `muellif` int(11) NOT NULL,
  `vaxt` int(11) NOT NULL,
  `fikir` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=779 DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stsonline_fikir`
--

LOCK TABLES `stsonline_fikir` WRITE;
/*!40000 ALTER TABLE `stsonline_fikir` DISABLE KEYS */;
INSERT INTO `stsonline_fikir` VALUES (777,37,1,1363457721,'Salam ureymin bawi'),(778,1,1,1365365824,'sssssssssssssssss');
/*!40000 ALTER TABLE `stsonline_fikir` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stsonline_like`
--

DROP TABLE IF EXISTS `stsonline_like`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stsonline_like` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `who` int(11) NOT NULL DEFAULT '0',
  `cc_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=215 DEFAULT CHARSET=cp1251 PACK_KEYS=0;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stsonline_like`
--

LOCK TABLES `stsonline_like` WRITE;
/*!40000 ALTER TABLE `stsonline_like` DISABLE KEYS */;
INSERT INTO `stsonline_like` VALUES (212,1,37),(213,37,1),(214,1,1);
/*!40000 ALTER TABLE `stsonline_like` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sual`
--

DROP TABLE IF EXISTS `sual`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sual` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sual` text NOT NULL,
  `a` text NOT NULL,
  `b` text NOT NULL,
  `c` text NOT NULL,
  `d` text NOT NULL,
  `answer` text NOT NULL,
  `n` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sual`
--

LOCK TABLES `sual` WRITE;
/*!40000 ALTER TABLE `sual` DISABLE KEYS */;
INSERT INTO `sual` VALUES (1,'Yer kuresi oz oxu etrafinda nece saat firlanir?','3','16','8','24','d',0),(2,'Ingilis dilinde kitab sozu nece yazilir?','pen','look','book','notebook','c',0),(3,'Semed vurgun nece yawinda vefat edib?','40','50','70','60','b',0),(4,'Acilmamiw qanadlarin boyukluyu.......?','gorunmez','bilinmez','deyilmez','qirilmaz','c',0),(5,'Bu adlardan biri kompyuter oyunudur?','counter tools','nokia','big ben','counter strike','d',1),(6,'mudruk sozu tamamlayin:El gucu.........???','sel gucu','dil gucu','qol gucu','ev gucu','a',1),(7,'Galatasaray necenci ilde yaranib?','1911','1908','1905','1914','c',1),(8,'Perde sozunun baw herfi evez etsek rayon adi olar?','v','n','k','b','d',1),(9,'Ingilisce xerite nece adlanir?','good','map','moon','mad','b',2),(10,'Sahesine gore,en boyuk olke?','abw','avstraliya','hollandiya','rusiya','d',2),(11,'Ehalisi cox olan olke?','pakistan','suriya','cin','turkiye','c',2),(12,'En boyuk petrol wirketi?','lukoil','savoil','nikoil','azpetrol','d',2),(13,'Agabey sozunun qisa yaziliwi necedir?','abi','aga','abey','agay','a',3),(14,'Bakida 2006-ci ile qeder acilmiw axrinci metro?','20 yanvar','hezi aslanov','xalqlar','neftciler','b',3),(15,'Bakiya en yaxin rayon?','sabirabad','imiwli','wamaxi','qobustan','c',3),(16,'En guclu ewitme qabiliyyeti olan canli?','serce','sican','kenquru','yarasa','d',3),(17,'Ali mektebi qurtaran telebeye ne verilir?','atestat','diplom','sertifikat','qramota','b',4),(18,'Dunyanin en derin golu?','xezer','tonqanika','mariyana','baykal','d',4),(19,'Dunyanin en boyuk dag golu?','titikaka','madaqaskar','amazon','amigo','a',4),(20,'Buxar emele gelme prosesi nece adlanir?','yanma','qaynama','izolyasiya','kondensiya','b',4),(21,'Kompyuterin esas yaddawqurgusu nece adlanir?','klaviyatura','cd room','bios','hard disk','d',4),(22,'Tibb embleminin muellifi kimdir?','ibn sina','mendeleyev','hippokrat','aristotel','a',4),(23,'elifba sirasinda,hansi herf once gelir?','x','i','h','n','c',4),(24,'Kimyada gumuw elementi nece yazilir?','ag','sa','se','ae','a',4),(25,'Manna dovleti necenci esrde yaranib?','9-cu esrde','10-cu esrde','6-ci esrde','12-ci esrde','a',5),(26,'Havanin terkibini en cox,hansi qaz tewkil edir?','oksigen','karbon','azot','ozon','c',5),(27,'Awagidaki sozlerden hansi dogru yazilib?','tessuf','teessuf','teesuf','tesuf','b',5),(28,'CD sozu ne demekdir?','compact dvd','compact driver','company disk','compact disk','d',5),(29,'Bu baliqlarin hansi suretlidir?','akula','piranya','durna baligi','qilinc baligi','d',6),(30,'Neapol weheri tercumede ne demekdi?','isti weher','soyuq weher','yeni weher','kohne weher','c',6),(31,'Koroglunun esl adi nedi?','huseyn','rovwen','eli','hesen','b',6),(32,'Dovlet himninin sozleri kime aitdir?','m.muwviq','e.cavad','s.vurgun','u.hacibeyov','b',6),(33,'1970-ci ilde meksikada 9 kubok qazanmiw komanda?','almaniya','rusiya','braziliya','fransa','c',7),(34,'En boyuk yarimada?','erebistan','yunanistan','saxara','roma','a',7),(35,'ilk defe fitap cap eden weher?','luksemburq','quttenberq','irlandiya','meksika','b',7),(36,'Iilk defe kompas harda yaranib?','avstraliya','zelandiya','abw','cin','d',7),(37,'Dama oyunu ilk defe harda yaranib?','iran','misir','turkiye','belcika','b',8),(38,'Baykal golune nece cay tokulur?','546','226','336','146','c',8),(39,'Nomre niwani ilk defe hansi olkede olub?','amerika','fransa','meksika','cin','b',8),(40,'Zerfin nece novu var?','15','25','5','6','c',8),(41,'Kur hansi weheri 2 yere bolur?','gurcustan','turkiye','ermenistan','tiflis','d',9),(42,'Ingilis dilinde lamp sozu azerice nedi?','yanar','iwiqli','iwiq','ciraq','d',9),(43,'Azerbaycanin musteqillik gunu??','18 oktyabr','15 iyul','28 may','20 yanvar','a',9),(44,'Yeni dunya adlanan qite?','avstraliya','amerika','atlntik','saxara','b',9),(45,'Qiz qalasinin hundurluyu nece metrdi?','15','26','28','65','c',10),(46,'Total futbolu avropaya hansi olke getirib?','hollandiya','finlandiya','abw','cexiya','a',10),(47,'Wahmatin veteni?','braziliya','amerika','meksika','hindistan','d',10),(48,'Turkiyenin ilk hollyvuda cekilmiw filmi?','kanli nigar','awk oyunu','mavi ruya','kurtlar vadisi','d',10),(49,'Hansi insan orqanizmi deyil?','urek','wirin bagirsaq','aci bagirsaq','kor boyrek','d',0),(50,'Ayri bolgelerde iwledilen sozler,nece adlanir?','omonim','beynelmiler','dialekt','sinonim','c',1),(51,'Bayat qalasi haradadir?','wekide','wuwada','gencede','qebelede','b',1),(52,'Fransanin paytaxti?','paris','tokio','amerika','moskva','a',0),(53,'Atom bombasini kim kewf edib?','rezerfort','faradey','samuelson','enwteyn','d',11),(54,'Azerice ilk poema?','leyli mecnun','abbas ve gulyaz','esli ve kerem','dastani ehmed harami','d',11),(55,'Hansi orqan fasile ile iwleyir?','goz','burun','urek','mede','b',11),(56,'Kommunizmrejiminin hakim oldugu,ada dovlet?','azerbaycan','boyuk britaniya','kuba','avstraliya','c',11),(57,'Dunyanin en boyuk muzeyi,haradadir?','abw','italiya','fransa','ingiltere','a',12),(58,'Radionu nezeri werh eden alim?','papov','lutfuzade','dooman','markenin','d',12),(59,'Sert disk nedir?','mawin hissesi','saatbaz aleti','kompyuter hissesi','telefon markasi','c',12),(60,'Insan oksigensiz nece deqiqe yawaya biler?','2','5','9','1','b',12),(61,'Qedim misirde gunew allahi kim olmuwdu?','kleopatra','ra','eskulop','venera','b',13),(62,'Filosof yunanca ne demekdir?','mudrikliyi seven','esl insan','medeniyyetli','en agilli','a',13),(63,'Bakida ilk teatr binasini kim tikdirib?','w.esedullayev','h.z.tagiyev','m.agayev','m.muxtarov','b',13),(64,'Normal insan nece deqiqeye yuxuya gedir?','5','8','16','7','d',13),(65,'Hansi herfi yazidir?','ideoqrafik','piktoqrafik','monoqrafik','fonoqrafik','d',14),(66,'Dunyanin en boyuk,weher ve paytaxti?','roma','london','ankara','meksika','d',14),(67,'Demir yolu ilk defe harda cekilib?','turkiye','ingiltere','iraq','finlandiya','b',14),(68,'Doha,hansi olkenin paytaxtidi?','qatar','qona','finlandiya','mozanbik','a',14),(69,'Hansi cay,bawlangicini,bataqliqdan goturur?','volqa','missuri','yantsizi','amazonka','a',15),(70,'Tank ilk defe,hansi doyuwde,istifade olunub?','verden','somma','trafalqar','vaterlo','b',15),(71,'Bezz qalasi,necenci ilde tutulub?','820','860','837','877','c',15),(72,'Yer kuresinin,nece maqnit qutbu var?','5','3','2','9','c',15),(75,'Ingilis dilinde aile sozu nece adlanir?','Family','Famili','Familo','Fami','A',1);
/*!40000 ALTER TABLE `sual` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `svadbi`
--

DROP TABLE IF EXISTS `svadbi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `svadbi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `zhenih` text NOT NULL,
  `nevesta` text NOT NULL,
  `frzhenih` blob NOT NULL,
  `frnevesta` blob NOT NULL,
  `saat` int(11) DEFAULT '0',
  `vremya` varchar(10) CHARACTER SET latin1 COLLATE latin1_bin DEFAULT NULL,
  `organizatory` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `svadbi`
--

LOCK TABLES `svadbi` WRITE;
/*!40000 ALTER TABLE `svadbi` DISABLE KEYS */;
/*!40000 ALTER TABLE `svadbi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(100) CHARACTER SET cp1251 COLLATE cp1251_bin DEFAULT NULL,
  `pass` varchar(30) CHARACTER SET latin1 COLLATE latin1_bin DEFAULT NULL,
  `name` blob,
  `sex` int(1) NOT NULL DEFAULT '0',
  `birth` varchar(10) DEFAULT NULL,
  `nomre` varchar(20) DEFAULT NULL,
  `meqsed` tinyint(1) DEFAULT '0',
  `year` varchar(4) CHARACTER SET cp1251 COLLATE cp1251_bin DEFAULT NULL,
  `city` varchar(100) CHARACTER SET cp1251 COLLATE cp1251_bin DEFAULT NULL,
  `infa` blob,
  `posts` int(11) NOT NULL DEFAULT '0',
  `bal` double DEFAULT '0',
  `status` varchar(100) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT 'Qonaq',
  `date` varchar(10) CHARACTER SET latin1 COLLATE latin1_bin DEFAULT NULL,
  `avr` smallint(3) NOT NULL DEFAULT '300',
  `max` smallint(2) NOT NULL DEFAULT '10',
  `level` smallint(6) NOT NULL DEFAULT '0',
  `kik` int(20) NOT NULL DEFAULT '0',
  `whokik` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `whykik` varchar(200) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `user_ip` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `user_soft` varchar(200) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `inv` tinyint(1) NOT NULL DEFAULT '0',
  `say` smallint(6) NOT NULL DEFAULT '0',
  `credits` int(11) NOT NULL DEFAULT '0',
  `gposts` int(11) NOT NULL DEFAULT '0',
  `img` varchar(50) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '0',
  `visit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ruser` varchar(30) CHARACTER SET cp1251 COLLATE cp1251_bin DEFAULT NULL,
  `latuser` varchar(30) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `time` int(11) DEFAULT '0',
  `room` int(2) NOT NULL DEFAULT '0',
  `smiles` tinyint(1) NOT NULL DEFAULT '2',
  `safe` tinyint(1) NOT NULL DEFAULT '1',
  `nastroi` varchar(100) DEFAULT '',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `avtootvet` blob NOT NULL,
  `para` varchar(50) NOT NULL DEFAULT '',
  `reng` tinyint(1) NOT NULL DEFAULT '1',
  `umnik` int(1) NOT NULL DEFAULT '1',
  `mektub_qebulu` int(11) NOT NULL DEFAULT '0',
  `fsize` int(1) DEFAULT '0',
  `rutbe` int(11) DEFAULT '0',
  `byeotv` int(11) NOT NULL DEFAULT '0',
  `gizlilik` int(1) NOT NULL DEFAULT '0',
  `con` int(1) NOT NULL DEFAULT '0',
  `mesaj` int(2) NOT NULL DEFAULT '0',
  `delmsg` int(1) NOT NULL DEFAULT '0',
  `tox` tinyint(1) NOT NULL DEFAULT '0',
  `mexvi` tinyint(1) NOT NULL DEFAULT '0',
  `rnikler` tinyint(2) NOT NULL DEFAULT '0',
  `shrift` varchar(10) DEFAULT NULL,
  `ss` tinyint(2) DEFAULT '1',
  `requ` varchar(5) NOT NULL DEFAULT 'xal',
  `onsex` int(1) NOT NULL DEFAULT '3',
  `xal` int(11) NOT NULL DEFAULT '0',
  `ses` int(11) NOT NULL DEFAULT '0',
  `msn` int(5) NOT NULL DEFAULT '0',
  `qefes` tinyint(2) NOT NULL DEFAULT '0',
  `forum` smallint(6) DEFAULT '0',
  `fpost` int(11) DEFAULT '0',
  `bugunpost` int(11) NOT NULL DEFAULT '0',
  `aktivtime` int(11) NOT NULL DEFAULT '0',
  `time_active` int(11) NOT NULL DEFAULT '0',
  `time_active1` int(11) NOT NULL DEFAULT '0',
  `time_active2` int(11) NOT NULL DEFAULT '0',
  `fut_qelebe` int(11) NOT NULL DEFAULT '0',
  `ayliq_qelebe` int(11) NOT NULL DEFAULT '0',
  `fut_meglub` int(11) NOT NULL DEFAULT '0',
  `fut_bal` int(11) DEFAULT '0',
  `xstatus` int(11) NOT NULL DEFAULT '0',
  `beyen` int(11) NOT NULL,
  `stsonline` varchar(100) CHARACTER SET cp1251 COLLATE cp1251_bin DEFAULT NULL,
  `gozvur` int(11) DEFAULT '0',
  `opus` int(11) NOT NULL DEFAULT '0',
  `reh` int(11) NOT NULL DEFAULT '0',
  `durt` int(11) NOT NULL,
  `bal_time` int(11) NOT NULL,
  `vaxt_gun` int(11) NOT NULL,
  `vaxt_hefte` int(11) NOT NULL,
  `vaxt_ay` int(11) NOT NULL,
  `vaxt_umumi` int(11) NOT NULL,
  `aktivtime1` int(11) NOT NULL,
  `bal_time1` int(11) NOT NULL,
  `mega_nik` int(11) NOT NULL DEFAULT '0',
  `mega_time` int(11) NOT NULL,
  `zapiski` int(11) NOT NULL,
  `aser` int(11) NOT NULL,
  `ehstime` int(11) NOT NULL,
  `end_time` int(11) NOT NULL,
  `start_time` int(11) NOT NULL,
  `deh_foto` int(11) NOT NULL DEFAULT '0',
  `avatar` varchar(30) NOT NULL,
  `rnick_time` int(11) NOT NULL,
  `rusl` varchar(10) NOT NULL,
  `zn` varchar(10) DEFAULT NULL,
  `zn_time` int(11) NOT NULL,
  `group` int(1) NOT NULL,
  `group_act` int(1) NOT NULL,
  `group_cp` int(1) NOT NULL,
  `group_write` int(1) NOT NULL,
  `qepiy` int(11) NOT NULL,
  `block` int(2) NOT NULL DEFAULT '0',
  `who` varchar(100) NOT NULL,
  `whotime` int(11) NOT NULL DEFAULT '0',
  `d_time` int(11) NOT NULL DEFAULT '0',
  `stat` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sex` (`sex`),
  KEY `time` (`time`),
  KEY `room` (`room`),
  KEY `user` (`user`(15)),
  KEY `ruser` (`latuser`),
  KEY `msn` (`msn`),
  KEY `sex_2` (`sex`,`time`),
  KEY `ruser_2` (`ruser`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 PACK_KEYS=0;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','YXNrYXNlZjE=','1',0,'02-04-1990','1111111111111',3,'1990','1111111111','/???????????????????????????/',1062224,1e16,'Rehber!','27-03-2013',300,10,9,0,'','','217.168.185.127','Opera/9.80 (Windows NT 6.1) Presto/2.12.388 Version/12.15',0,0,222222,22222,'1','2013-04-10 15:17:18','','admin',1375607037,30,2,0,'',0,'111111111','',1,1,0,0,0,0,0,0,0,0,0,0,0,'',1,'time',3,1,0,0,0,0,0,8,1365607038,51335,51335,51335,0,0,0,0,0,0,'sssssssssssssss',0,0,0,0,0,47519,50504,50504,50504,1365607038,2896,0,0,0,0,0,0,0,0,'',0,'','',0,0,0,0,0,850,0,'Dehlizdedir.',1365607038,1367832262,'1.79'),(2,'*BaL_SiSTeM*','bmlr','?????????????/',1,'02-04-1995',NULL,3,'1995','7','sistem',100,100,'QonaQ','27-03-2013',300,10,0,0,'','','217.168.185.77','Opera/9.80 (Windows NT 6.1) Presto/2.12.388 Version/12.14',0,0,0,0,'0','2013-04-08 18:20:24',NULL,'*bal_sistem*',1365445224,0,2,1,'',0,'','',1,1,0,0,0,0,0,0,0,0,0,0,0,NULL,1,'xal',3,0,0,0,0,0,0,0,1364485682,2708,2708,2708,0,0,0,0,0,0,NULL,0,0,0,0,0,33,2708,2708,2708,1364485682,2708,0,0,0,0,0,0,0,0,'',0,'',NULL,0,0,0,0,0,0,0,'',0,0,''),(3,'sade_nik','MQ==','1',0,'02-04-1990',NULL,3,'1990','1','sssssssssssssss',102,75,'QonaQ','01-04-2013',300,10,0,0,'','','217.168.186.120','Opera/9.80 (Windows NT 6.1) Presto/2.12.388 Version/12.15',0,0,0,0,'0','2013-04-07 22:51:15',NULL,'sade_nik',1375373714,30,2,1,'',0,'','',1,1,0,0,0,0,0,0,0,0,0,0,0,NULL,1,'time',3,0,0,3,0,0,0,2,1365373715,11164,11164,11164,0,0,0,0,0,0,'',0,0,0,0,0,11163,11163,11163,11163,1365373715,352,0,0,0,0,0,0,0,0,'',0,'',NULL,0,0,0,0,0,0,0,'Onlayndadir.',1365373715,0,'0.04'),(4,'tttttttttttt','dHR0dHR0dHR0','tttttt',0,'11-09-1988',NULL,3,'1988','8','ggggggggg',100,100,'QonaQ','01-04-2013',300,10,0,0,'Admin','','5.44.39.95','Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727) Havij',0,0,0,0,'0','2013-04-06 10:13:47',NULL,'tttttttttttt',1365243227,30,2,1,'',2,'','',1,1,0,0,0,0,0,0,0,0,0,0,0,NULL,1,'xal',3,0,0,0,0,0,0,0,1364773973,445,445,445,0,0,0,0,0,0,NULL,0,0,0,0,0,442,442,442,442,1364773973,442,0,0,0,0,0,0,0,0,'',0,'',NULL,0,0,0,0,0,0,0,'Dehlizdedir.',1364773108,0,''),(5,'xexe','eGV4ZQ==','xexe',0,'05-02-1992',NULL,3,'1992','1','xexe',101,100,'QonaQ','02-04-2013',300,10,0,0,'','','217.168.186.120','Opera/9.80 (Windows NT 6.1) Presto/2.12.388 Version/12.15',0,0,0,0,'0','2013-04-07 22:28:35',NULL,'xexe',1375373642,28,2,1,'',0,'','',1,1,0,0,0,0,0,0,0,0,0,0,0,NULL,1,'xal',0,0,0,2,0,0,0,1,1365373649,162,162,162,0,0,0,0,0,0,NULL,0,0,0,0,0,162,162,162,162,1365373649,162,0,0,0,0,0,0,0,0,'',0,'',NULL,0,0,0,0,0,0,0,'sade_nik nikinin infosuna bax&#305;r.',1365373648,0,'0.02'),(6,'ask_ceza','YWFhYWFhYWFhYWFhYWFh','aaaaaaaaaaa',0,'24-10-1996',NULL,3,'1996','1','aaaaaaaaaaa',101,100,'QonaQ','06-04-2013',300,10,0,0,'','','217.168.186.120','Opera/9.80 (Windows NT 6.1) Presto/2.12.388 Version/12.15',0,0,0,0,'0','2013-04-07 22:51:30','','ask_ceza',1375375089,29,2,1,'',0,'','',1,1,0,0,0,0,0,0,0,0,0,0,0,'',1,'xal',3,0,0,0,0,0,0,1,1365375090,71,71,71,0,0,0,0,0,0,NULL,0,0,0,0,0,71,71,71,71,1365375090,71,0,0,0,0,0,0,0,0,'',0,'',NULL,0,0,0,0,0,0,0,'Mektub Qutusuna Bax&#305;r.',1365375090,0,'0.02'),(7,'xxxxx','eHh4eHg=','xxxx',0,'10-08-1988',NULL,3,'1988','10','xxxxxxxxx',100,100,'QonaQ','08-04-2013',300,10,0,0,'','','5.44.39.227','Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727) Havij',0,0,0,0,'0','2013-04-08 17:39:27',NULL,'xxxxx',1375437809,30,2,1,'',0,'','',1,1,0,0,0,0,0,0,0,0,0,0,0,NULL,1,'xal',3,0,0,0,0,0,0,0,1365442767,1763,1763,1763,0,0,0,0,0,0,NULL,0,0,0,0,0,1762,1762,1762,1762,1365442767,1762,0,0,0,0,0,0,0,0,'',0,'',NULL,0,0,0,0,0,0,0,'Dehlizdedir.',1365437810,0,'');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `viewanket`
--

DROP TABLE IF EXISTS `viewanket`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `viewanket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) DEFAULT NULL,
  `usid` int(11) DEFAULT '0',
  `myid` int(11) DEFAULT '0',
  `tarix` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=253 DEFAULT CHARSET=cp1251 PACK_KEYS=0;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `viewanket`
--

LOCK TABLES `viewanket` WRITE;
/*!40000 ALTER TABLE `viewanket` DISABLE KEYS */;
INSERT INTO `viewanket` VALUES (227,'killer',5,10,'1363501977'),(5,'YAKISHIKLI@',360,360,'1345597590'),(6,'Sabirabad',361,278,'1345607539'),(222,'seninem',24,5,'1363461941'),(8,'?MY(T)LOVE?',362,48,'1345631356'),(9,'?MY(T)LOVE?',362,359,'1345631383'),(10,'?MY(T)LOVE?',362,345,'1345631408'),(212,'MELEYIM',14,5,'1363452937'),(12,'?MY(T)LOVE?',362,360,'1345631488'),(13,'?MY(T)LOVE?',362,49,'1345631518'),(14,'?MY(T)LOVE?',362,341,'1345631546'),(18,'Dj_ErRoR',680,363,'1345639174'),(20,'baku',682,278,'1345654560'),(23,'Roki',683,363,'1345669862'),(26,'Sabirabad',361,303,'1345691911'),(27,'Sabirabad',361,299,'1345691922'),(28,'Sabirabad',361,17,'1345691965'),(29,'?MY(T)LOVE?',362,681,'1345696143'),(31,'SIRLIUREK',687,686,'1345738255'),(32,'SIRLIUREK',687,681,'1345738294'),(34,'Senle_Sensiz',688,341,'1345879464'),(35,'Senle_Sensiz',688,345,'1345879533'),(36,'Senle_Sensiz',688,278,'1345879581'),(37,'Senle_Sensiz',688,686,'1345879667'),(38,'By_SoNstoP',690,686,'1345903739'),(41,'ROODU',692,21,'1345966181'),(42,'Senle_Sensiz',688,688,'1346046382'),(43,'UNUTMA_MENi',135,49,'1346075490'),(44,'Shahram',693,311,'1346150018'),(47,'Avara95',694,681,'1346157556'),(48,'Avara95',694,312,'1346157916'),(49,'Avara95',694,319,'1346157985'),(50,'Avara95',694,49,'1346158041'),(51,'Avara95',694,336,'1346158086'),(52,'Avara95',694,334,'1346158177'),(53,'Avara95',694,688,'1346158332'),(54,'Avara95',694,694,'1346158739'),(55,'Dj_Dmicey',695,686,'1346162337'),(56,'Avara95',694,322,'1346174233'),(57,'Avara95',694,326,'1346174247'),(58,'Avara95',694,242,'1346174324'),(59,'Avara95',694,307,'1346174564'),(61,'Avara95',694,348,'1346174927'),(62,'Avara95',694,320,'1346174991'),(63,'canimsanda',697,697,'1346182604'),(197,'killer',5,5,'1363426365'),(69,'RapLica',191,191,'1346188722'),(70,'RapLica',191,42,'1346188729'),(71,'@V@R@',698,312,'1346225248'),(72,'@V@R@',698,144,'1346225380'),(74,'Astarali',277,298,'1346226024'),(75,'Astarali',277,149,'1346226084'),(76,'Astarali',277,148,'1346226132'),(77,'Astarali',277,40,'1346226188'),(78,'@V@R@',698,148,'1346226205'),(79,'Astarali',277,310,'1346226222'),(80,'Astarali',277,142,'1346226292'),(81,'@V@R@',698,319,'1346226306'),(82,'Astarali',277,319,'1346226446'),(83,'@V@R@',698,334,'1346226482'),(84,'Astarali',277,278,'1346226484'),(85,'Astarali',277,284,'1346226766'),(88,'ORiK',699,699,'1362869762'),(90,'MAWTAGA',700,700,'1362949986'),(91,'MAWTAGA',700,699,'1362949995'),(207,'sevgisizz',34,34,'1363444467'),(94,'sevgimizzzz',701,701,'1363013268'),(203,'qaqa@@',29,14,'1363436250'),(229,'_CENTELM@N_',6,37,'1363517156'),(195,'qaqa@',27,25,'1363422444'),(202,'killer',5,24,'1363432524'),(102,'AdamKimi_Sev',8,7,'1363182211'),(103,'Adam',7,8,'1363182240'),(104,'AdamKimi_Sev',8,8,'1363182268'),(166,'sevgiyle',3,10,'1363366274'),(115,'VORAM',10,2,'1363254730'),(116,'VORAM',10,10,'1363254987'),(225,'seninem',24,10,'1363501279'),(121,'Lumiya_',11,10,'1363258034'),(122,'Lumiya_',11,2,'1363258047'),(123,'Lumiya_',11,6,'1363258065'),(124,'Lumiya_',11,9,'1363261483'),(125,'VORAM',10,12,'1363263593'),(224,'VORAM',10,24,'1363500627'),(193,'Casilyas',26,23,'1363412263'),(176,'_CENTELM@N_',6,14,'1363376089'),(139,'VORAM',10,15,'1363282988'),(205,'exooo',31,5,'1363437957'),(141,'avara',19,15,'1363284066'),(142,'avara',19,19,'1363284103'),(191,'MELEYIM',14,24,'1363405868'),(145,'Kobra4',20,15,'1363284345'),(146,'Kobra4',20,20,'1363284454'),(147,'Kobra4',20,16,'1363284563'),(190,'MELEYIM',14,14,'1363405814'),(150,'VORAM',10,20,'1363286636'),(151,'VORAM',10,19,'1363286951'),(152,'VORAM',10,18,'1363286970'),(239,'dost',5,5,'1363785561'),(194,'_CENTELM@N_',6,24,'1363412370'),(238,'dost',5,2,'1363785440'),(243,'sade_nik',3,1,'1364757122'),(223,'seninem',24,32,'1363463225'),(158,'VORAM',10,13,'1363351551'),(159,'VORAM',10,21,'1363351662'),(226,'seninem',24,24,'1363501866'),(236,'Admin',1,2,'1363647382'),(220,'killer',5,14,'1363459173'),(232,'Tekem_Yekem',39,10,'1363531187'),(235,'Admin',1,3,'1363647154'),(240,'Admin',1,6,'1363815594'),(242,'Admin',1,1,'1364756913'),(244,'Admin',1,4,'1364849915'),(245,'Admin',1,5,'1364849953'),(246,'xexe',5,1,'1364850045'),(247,'xexe',5,5,'1364850069'),(248,'xexe',5,4,'1364850077'),(249,'xexe',5,3,'1365373639'),(250,'sade_nik',3,5,'1365373709'),(251,'ask_ceza',6,6,'1365375067'),(252,'ask_ceza',6,3,'1365375070');
/*!40000 ALTER TABLE `viewanket` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vopros`
--

DROP TABLE IF EXISTS `vopros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vopros` (
  `klu4` tinyint(1) NOT NULL DEFAULT '0',
  `number` int(11) NOT NULL DEFAULT '0',
  `time` int(11) NOT NULL DEFAULT '0',
  `question` blob NOT NULL,
  `answer` varchar(100) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `tran` varchar(100) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`klu4`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vopros`
--

LOCK TABLES `vopros` WRITE;
/*!40000 ALTER TABLE `vopros` DISABLE KEYS */;
INSERT INTO `vopros` VALUES (1,0,1365445464,'Meymun esasen hansi meyveni yeyir?. (<b>5 herf</b>)','Banan','Banan');
/*!40000 ALTER TABLE `vopros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `votes`
--

DROP TABLE IF EXISTS `votes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `votes` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `avtor` varchar(20) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `date` varchar(10) NOT NULL DEFAULT '',
  `vopros` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `v1` varchar(100) NOT NULL DEFAULT '',
  `v2` varchar(100) NOT NULL DEFAULT '',
  `v3` varchar(100) NOT NULL DEFAULT '',
  `v4` varchar(100) NOT NULL DEFAULT '',
  `v5` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `votes`
--

LOCK TABLES `votes` WRITE;
/*!40000 ALTER TABLE `votes` DISABLE KEYS */;
/*!40000 ALTER TABLE `votes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `voting`
--

DROP TABLE IF EXISTS `voting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `voting` (
  `klu4` int(3) NOT NULL AUTO_INCREMENT,
  `vote` int(2) NOT NULL DEFAULT '0',
  `date` varchar(10) NOT NULL DEFAULT '',
  `var` smallint(1) NOT NULL DEFAULT '0',
  `who` int(5) NOT NULL DEFAULT '0',
  `tarix` varchar(100) NOT NULL,
  PRIMARY KEY (`klu4`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `voting`
--

LOCK TABLES `voting` WRITE;
/*!40000 ALTER TABLE `voting` DISABLE KEYS */;
/*!40000 ALTER TABLE `voting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vstrechi`
--

DROP TABLE IF EXISTS `vstrechi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vstrechi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` text NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `organizatory` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vstrechi`
--

LOCK TABLES `vstrechi` WRITE;
/*!40000 ALTER TABLE `vstrechi` DISABLE KEYS */;
/*!40000 ALTER TABLE `vstrechi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xeberler`
--

DROP TABLE IF EXISTS `xeberler`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xeberler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `yazan` text NOT NULL,
  `basliq` blob NOT NULL,
  `xeber` blob NOT NULL,
  `qeyd_tarix` varchar(25) NOT NULL,
  `baxilib` int(11) NOT NULL DEFAULT '0',
  `bolme_id` int(11) NOT NULL DEFAULT '0',
  `tesdiq` int(11) NOT NULL DEFAULT '0',
  `photo` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=cp1251 PACK_KEYS=0;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xeberler`
--

LOCK TABLES `xeberler` WRITE;
/*!40000 ALTER TABLE `xeberler` DISABLE KEYS */;
INSERT INTO `xeberler` VALUES (1,'1','2012-nin en yaxshi avtomobili secilib','\\\\\\&quot;World Car of the Year 2012\\\\\\&quot; mukafat? Volkswagen up!\r\n\r\n Bu ilin en yaxs? avtomobili secilib. \\\\\\&quot;World Car of the Year 2012\\\\\\&quot; mukafat? Nyu-Yorkda kecirilen beynelxalq avtosergide teqdim edilib. 66 apar?c? jurnalist heyetinden ibaret olan munsifler heyeti 25 olkeden devet al?blar. Onlar 2012-ci ilin en yaxs? avtomobili kimi \\\\\\&quot;Volkswagen up!\\\\\\&quot;? secibler. Finalda kompakt seher mas?n? diger iki reqiblerini usteleyib ve ilin mukafat?na sahib olub. \r\n\r\n \\\\\\&quot;Volkswagen up!\\\\\\&quot;?n uzunlugu 3,54 metrdir. Avtomobile rahat sekilde 4 nefer sernisin eylese biler. Bundan basqa, avtomobilin muherriki maksimum effektli texnologiya ile tehciz olunub. \r\n\r\n \\\\\\&quot;Up!\\\\\\&quot;la birlikde ucsilindirli muherriklerin yeni nesli numayis etdirilib. 44 kVt / 60 at gucu ve 55 kVt / 75 at gucunde olan benzin muherriklerini hemcinin \\\\\\&quot;BlueMotion\\\\\\&quot; variant?nda da almaq olar. Bu muherrikleri tekmillesdirilmis ekoloji xarakteristika ile de almaq olar.','22/06/2012  14:49',9,3,1,'1.gif'),(18,'1','Turkiye herbi teyyaresinin nece vuruldugu mueyyenlesdi','Bir neçe gün aparılan texniki analizler ve elde edilen melumatların araşdırılmasından sonra teyyareye Suriyanın Rasal-Bassit burnundakı \\\\\\&quot;Al Bassit\\\\\\&quot; raket ve zenit batareyasından ateş açıldığı müeyyenleşib. \r\n\r\n Dinlemeler ve texniki izleme neticesinde teyyarenin vurulması barede emrin Humusdakı bölge Qerargah Merkezinden verildiyi de üze çıxıb. Başqa sözle, Ankaranın evveller de beyan etdiyi kimi \\\\\\&quot;RF-4E\\\\\\&quot; tipli keşfiyyat teyyaresi iyunun 22-de qısa müddete Suriyanın hava serhedleri pozub. \\\\\\&quot;Al Bassit\\\\\\&quot; batareyasındakı Suriya herbçileri bunu müeyyenleşdirdikden sonra qısa müddet tereddüd keçiribler. Daha sonra şübheli saydıqları teyyare ile bağlı hansı addım atacaqlarını müeyyenleşdirmek üçün Humusdakı bölge Qerargah Merkezi ile elaqe saxlayıblar, bunun üçün simsiz rabiteden istifade edibler. Qerargah Merkezinden ise cavab olaraq deyilib ki, \\\\\\&quot;sizin hava serhedlerimizi pozan xarici ölke teyyarelerine qarşı nece davranmaq lazım olduğunu bilmeniz gerekdir\\\\\\&quot;. Belelikle, qısa müddetden sonra teyyareye ateş açılıb ve derhal da Humusdakı Qerargah Merkezine melumat verilib. Sonradan da teyyarenin Türkiye teyyaresi olduğunu anladıqları da bu danışıqlardan melum olur.','08/07/2012  17:20',0,3,1,'18.gif'),(19,'1','Bakıda avtomat satan wexs tutulub','Daxili İşler Nazirliyinin metbuat xidmetinden  verilen melumata göre, Daxili İşler Nazirliyinin Baş Müteşekkil Cinayetkarlıqla Mübarize İdaresi emekdaşlarının keçirdikleri emeliyyat-axtarış tedbirleri neticesinde Bakı şeher sakini Aftandil Çobanov 1 eded \\&quot;AKM\\&quot; silahını satarken tutulub','08/07/2012  17:27',10,2,1,'19.gif'),(20,'1','Telman Ismayılov yene teeccublendirir','İş adamı \\&quot;Mardan Palace\\&quot; üçün\r\nxaricden qum getirdi.\r\nAzerbaycanlı iş adamı Telman\r\nİsmayılov Antalyada 1.5 milyard\r\ndollara başa gelen ve 2010-cu ilde\r\ndünyanın en lüks oteli kimi seçilen\r\n\\&quot;Mardan Palace\\&quot; in çimerliyi üçün\r\nMisirden özel olaraq qum getirib.\r\n\\&quot;Qafqazinfo\\&quot;nun melumatına göre,\r\notelin çimerliyinde istifade olunan\r\n545 ton ağ qum güneş şüalarını\r\nözüne çekir ve insanların yeriyerken\r\nayaqlarını isidir. Bu qum ne ayağa\r\nyapışır, ne de ayağı yandırır.\r\nHetta müşterilerin de diqqetini çeken\r\nqumu otelin qonaqları gederken\r\nözleri ile de aparmaq isteyirler.\r\nQeyd edek ki, otel 180 min kvadrat\r\nmetr erazini ehate edir ve\r\ntikilmesinde 10 min kavdratmetr\r\nqızıl, 500 min kristaldan istifade\r\nolunub.','09/07/2012  05:15',6,3,1,'20.gif'),(21,'1','12 yawli uwaq Qurani ezber dedi','Hindli uşağa bunun üçün 12 saat vaxt lazım olub\r\n\r\n Hindistanda 12 yaşlı uşaq rekorda imza atıb. Aspress-in melumatına göre, Hafiz Mehemmed Zabixulla müqeddes kitab olan Qurani Kerimi ezberden deyib. Bunun üçün kiçik hafize 12 saat vaxt lazım olub. O, müselmanaların müqeddes kitabını oxumağa seher saat 08:00-da başlayıb. \r\n Onun tehsila aldığı mektebin müellimlerinin sözlerine göre, uşaq bir defe bele çaşmayıb ve Qurana baxmayıb. \r\n M.Zabaixulla ise ona Quranı ezberlemek üçün 8 ay vaxt lazım olduğunu deyib. \r\n\r\n Oğlanın tehsil aldığı mektebin rehberliyi ise şagirdin bu uğurunun resmi qeydiyyatına çalışacaqlarını bildirib.','09/07/2012  19:32',12,3,1,'21.gif'),(22,'1','Sibel Can: Bir daha ere getmek?','Türkiyenin populyar\r\nmüğennilerinden biri Sibel Canın\r\npeşekar karyerasının 25-ci ili tamam\r\nolur.\r\nİlk albomu 1987-ci ilde satışa çıxmış\r\nmüğenninin 25 ilde 19 albomu olub.\r\nEyni zamanda Sibel Can Türkiyede en\r\nçox konsert veren, en çox proqram\r\nhazırlayan müğennidir.\r\n\\&quot;Habetürk\\&quot;e verdiyi müsahibesinde\r\nSibel Can şexsi heyatından da\r\ndanışıb. İndiyedek iki defe erde olan\r\nve 3 övlad anası Sibel Canın yeniden\r\naile qurmaq fikri yoxdur.\r\n\\&quot;Bundan sonra heyatımda kişinin\r\nolması mümkün deyil. Ona göre de\r\nere getmek, yeniden aile qurmaq\r\nmeselesini müzakire etmek\r\nistemirem. Olmayan ve olmayacaq işi\r\nnece müzakire etmek olar?\\&quot; - Sibel\r\nCan deyib.','11/07/2012  03:35',7,3,1,''),(23,'1','Azerbaycanda magistraturaya qebul olanlara teze xeber','Telebe Qebulu üzre Dövlet Komissiyası 2012-2013-cü tedris ili üçün ali tehsil müessiselerinin magistratura seviyyesine qebul olanların qeydiyyat müddetinin uzadılması barede qerar qebul edib.\r\n\r\n Komissiyanın metbuat xidmetinden Trend-e verilen melumata göre, magistraturaya qebul olanların yalnız 77 faizi iyulun 11-dek qebul olduqları ali tehsil müessisesinde qeydiyyatdan keçib. TQDK bunu nezere alaraq qeydiyyat müddetinin iyulun 13-ü saat 17:00-dek uzadılması barede qerar qebul edib.\r\n\r\n Magistraturaya qebul olanlar teleb olunan senedleri qeyd olunan müddetedek qebul olunduqları ali tehsil müessisesine teqdim etmekle tehsil alma formasını seçib qeydiyyatdan keçmelidirler.\r\n\r\n TQDK ali tehsil müessiselerinin rektorlarının nezerine bir daha çatdırır ki, \\&quot;Magistr\\&quot; jurnalının 2012-ci il 4-cü sayında qarşısında tehsilalma forması \\&quot;E/Q\\&quot; (eyani/qiyabi) kimi gösterilmiş ixtisaslaşmalara qebul olunmuş bakalavrlar qebul olunduqları tehsil müessisesinde qeydiyyatdan keçerken öz arzuları ile eyani ve ya qiyabi tehsilalma formasını seçe bilerler.','11/07/2012  18:29',14,2,1,'23.gif'),(24,'1','Naxcivan istiqametinde ateshkes pozulub: bir esgerimiz yaralanib','Ermenilerin ateşkesi pozması\r\nneticesinde Azerbaycan Ordusunun\r\nesgeri yaralanıb.\r\nAPA-nın melumatına göre, hadise\r\nNaxçıvan Muxtar Respublikasında,\r\ncebhenin Şahbuz rayonu\r\nistiqametinde qeyde alınıb.\r\nAzerbaycan Ordusunun esgeri, 19\r\nyaşlı Rebbi Elsever oğlu Ceferov\r\ndüşmen güllesine tuş gelib. Neticede\r\nbaşından gülle yarası alan esger\r\nhospitala yerleşdirilib.\r\nMüdafie Nazirliyinin metbuat xidmeti\r\nile melumatı deqiqleşdirmek\r\nmümkün olmayıb.\r\nQeyd edek ki, R. Ceferov Göygöl\r\nrayonundan heqiqi herbi xidmete\r\nçağırılıb.','14/07/2012  02:21',3,2,1,'24.gif'),(10,'48','Bir awk hikayesi','2 SevGiLi VaRMiw\r\nBiRBiRLeRiNi Coxx SeViRLeRMiw\r\nQiZ MawiN QeZaSiNDa ReHMeTe GeDiR\r\noGLaN DoSTLaRi oGLaNa DeSTeY oLuRLaR QiZiN QeBRi uSTe GeLiRLeR\r\noGLaN DiZ CokuR QiZiN QeBRiNe\r\nVe aGLaYiR DoSTLaRi BiRaZ KeCDiKDeN SoNRa QaLX DoSTuM GeTMek VaxTiDi QoY RaHaT YaTSiN DeYiRLeR Ve oGLaN YeNe aGLaYiR DoSTLaRi GoRuRLeRki oGLaN eLiNi ToRBaGa SaLiB DoSTLaRi DeYiR Ne eDiRSeN SeN????\r\noGLaN : o MeNiM eLiMi TuTMaSa RaHaT YaTMaZ aXii ;,(','27/06/2012  17:15',22,1,1,''),(25,'1','Azerbaycanın magistral yollarında yeni yol nidanlari qurasdirilib','Azerbaycanın hereket süreti artırılan magistral yolları süreti 110 km/saat gösteren yol nişanları ile temin olunub.\r\n\r\n Respublika Baş Dövlet Yol Polisi İdaresinin şöbe reisi Kamran Eliyev Trend-e bildirib ki, bir müddet önce Qaradağ yolundan Qobustan qesebesine, Bakı-Qazax yolunun Hacıqabula qeder, Elet-Astara yolunun 0-31-ci km-de ve Bakı-Quba yolunda neqliyyatın hereket süreti 90-dan 110 km/saata çatdırılıb.\r\n\r\n Onun sözlerine göre, artıq hemin yollarda hereket süretini gösteren yol nişanları yenileri ile evez olunub.\r\n\r\n Eliyev hemçinin qeyd edib ki, qanunvericiliye edilen son deyişikliklerden sonra bütün magistral yollarda radarların olduğunu gösteren yol nişanları quraşdırılıb.\r\n\r\n İdare sözçüsü deyib ki, yolların keyfiyyetinin standartlara cavab vermesi, yollarda tehlükesizlik baxımından lazımi şeraitin yaradılması - yolların demirle çeperlenmesi, kesişmelerin mövcud olmaması süret heddinin artırılmasına imkan verir.\r\n\r\n O qeyd edib ki, iri magistrallarda neqliyyatın intensivliyinin qarşısının alınması üçün de hereket süretinin artırılmasına ehtiyac var idi.','21/07/2012  14:56',12,2,1,'25.gif');
/*!40000 ALTER TABLE `xeberler` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zapiski`
--

DROP TABLE IF EXISTS `zapiski`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zapiski` (
  `klu4` int(11) NOT NULL AUTO_INCREMENT,
  `who` varchar(40) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `idwho` int(12) NOT NULL DEFAULT '0',
  `message` blob NOT NULL,
  `towhom` varchar(40) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `idtowhom` int(12) NOT NULL DEFAULT '0',
  `time` int(11) NOT NULL DEFAULT '0',
  `readd` tinyint(1) NOT NULL DEFAULT '0',
  `topic` varchar(80) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `date` varchar(50) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `insend` tinyint(1) NOT NULL DEFAULT '1',
  `ininc` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`klu4`),
  KEY `ininc` (`ininc`),
  KEY `idtowhom` (`idtowhom`),
  KEY `readd` (`readd`),
  KEY `idwho` (`idwho`),
  KEY `insend` (`insend`)
) ENGINE=MyISAM AUTO_INCREMENT=97505829 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zapiski`
--

LOCK TABLES `zapiski` WRITE;
/*!40000 ALTER TABLE `zapiski` DISABLE KEYS */;
INSERT INTO `zapiski` VALUES (78052477,'Sistem',7,'H&#246;rmetli <b>ADMIN</b> sizin <u>Hekayeler</u> b&#246;lm&#252;ndeki <u>sevgisiz bir omur ya&#351;amaq cokmu kolay?????????</u> adli hekayenizi <b>Admin</b> &#231;ox beyenir!','Admin',1,1374680231,1,'Hekayeler!..','31-Mar-2013 [01:50]',1,1),(50703668,'REHBERLIK',0,'H&#246;rmetli <b>Admin</b>! Sizin hesab&#305;n&#305;za <b>9999999999999999</b>, Y&#252;klendi... <br/>Hesab&#305;n&#305;zda cemi: <b>10000000000000023</b>, bal oldu!','Admin',1,1365366026,1,'Bal Hesabat&#305;','08-Apr-2013 [01:20]',1,1),(92174350,'Sistem',0,'<b>Admin</b> niki <b>1 saat </b> m&#252;ddetliyine znak ald&#305;.','ADMIN',1,1365364262,1,'Znak','00:51 - 08.04.13',1,1),(39146776,'Xeber&#231;i',8,'Salam <b>Cenab Admin</b> Siz bu g&#252;n &#231;atda 1 saat aktiv oldu&#287;unuz &#252;&#231;&#252;n <b>Sistem</b> size 10 bal hediyye etdi. <br/>Hal-haz&#305;rda sizin 59 bal&#305;n&#305;z var.<br/> <i>Aktiv Olun. Te&#351;ekk&#252;rler.</i>\n','Admin',1,1365365332,1,'Tebrikler!!! 10 bal hediyye qazand&#305;n&#305;z','08.04.13 [01:08]',1,1),(79258741,'Xeber&#231;i',8,'Salam <b>Cenab Admin</b> Siz bu g&#252;n &#231;atda 1 saat aktiv oldu&#287;unuz &#252;&#231;&#252;n <b>Sistem</b> size 10 bal hediyye etdi. <br/>Hal-haz&#305;rda sizin 1.0E+16 bal&#305;n&#305;z var.<br/> <i>Aktiv Olun. Te&#351;ekk&#252;rler.</i>\n','Admin',1,1365369628,1,'Tebrikler!!! 10 bal hediyye qazand&#305;n&#305;z','08.04.13 [02:20]',1,1),(23584277,'Xeber&#231;i',8,'Salam <b>Cenab sade_nik</b> Siz bu g&#252;n &#231;atda 1 saat aktiv oldu&#287;unuz &#252;&#231;&#252;n <b>Sistem</b> size 10 bal hediyye etdi. <br/>Hal-haz&#305;rda sizin 75 bal&#305;n&#305;z var.<br/> <i>Aktiv Olun. Te&#351;ekk&#252;rler.</i>\n','sade_nik',3,1365373363,0,'Tebrikler!!! 10 bal hediyye qazand&#305;n&#305;z','08.04.13 [03:22]',1,1),(92174353,'REHBERLIK',0,'<b>Admin</b> - Dehlize 1 saatl&#305;q &#350;ekil yerle&#351;dirdi... 1.000000000000002e16 - 1 = 1.0E+16 bal qald&#305;.<br/> Bankda <b>846</b> bal var...','',1,1365375159,1,'Dehlize &#350;ekil','08.04.13 [03:52]',1,1),(92174354,'REHBERLIK',0,'H&#246;rmetli <b>Admin</b>. Siz Bal Xidmetinden istifade ederek dehlize 1 saatl&#305;q \"<u>&#350;ekilinizi yerle&#351;dirdiz</u>\".<br/> Hesab&#305;n&#305;zda 1.000000000000002e16 - 1 = 1.0E+16 bal qald&#305;.','Admin',1,1365375159,1,'Melumat','08.04.13 [03:52]',1,1),(92174355,'REHBERLIK',0,'<b>Admin</b> - 1 saatliq Tebrik-Elan yerle&#351;dirdi. <br/>Mesaj: <i>&#350;AP.DoYSaN.NeT en Gozel mekan sizlerin ixtiyarinizda )))))</i>. <br/>1e16 - 350 = 1.0E+16 bal qald&#305;.<br/> Bankda <b>1196</b> bal var.','',1,1365375568,1,'Tebrik: 350 bal','08.04.13 [03:59]',1,1),(92174356,'REHBERLIK',0,'H&#246;rmetli <b>Admin</b>. Siz Bal Xidmetinden istifade edib &#199;at&#305;n ilk sehifesine 1 saatl&#305;q Tebrik Mesaj&#305; yerle&#351;dirdiniz. <br/>Mesaj beledir: <i>&#350;AP.DoYSaN.NeT en Gozel mekan sizlerin ixtiyarinizda )))))</i><br/> Hesab&#305;n&#305;zda 1e16-350=1.0E+16 bal qald&#305;.<br/> <u>Bal Sisteminden &#304;stifade etdiyiniz &#252;&#231;&#252;n Te&#351;ekk&#252;rler!</u>','Admin',1,1365375568,1,'Tebrik mesaj&#305;','08.04.13 [03:59]',1,1),(92174357,'ADMIN',0,'Salam <u>xxxxx</u> Bey ! <b>wap.DoYSaN.NeT</b> Sayt&#305;na Xo&#351; geldiz! Vaxt&#305;n&#305;z&#305; Maraql&#305; s&#246;hbetler ederek ke&#231;irmek isteyirsinizse Buyrun Sayt&#305;m&#305;z&#305;n <a href=\"onlayn.php?id=7&amp;ps=eHh4eHg=&amp;ref=421119\">S&#246;hbet otaqlar&#305;na daxil olun</a><br/>\n','xxxxx',7,1365436727,0,'Xo&#351; geldiz xxxxx','08-Apr-2013 [20:58]',1,1),(33330362,'Xeber&#231;i',8,'Salam <b>Cenab Admin</b> Siz bu g&#252;n &#231;atda 1 saat aktiv oldu&#287;unuz &#252;&#231;&#252;n <b>Sistem</b> size 10 bal hediyye etdi. <br/>Hal-haz&#305;rda sizin 1.0E+16 bal&#305;n&#305;z var.<br/> <i>Aktiv Olun. Te&#351;ekk&#252;rler.</i>\n','Admin',1,1365458984,1,'Tebrikler!!! 10 bal hediyye qazand&#305;n&#305;z','09.04.13 [03:09]',1,1),(94094462,'Admin',8,'H&#246;rmetli Admin! <b>Admin</b> leqebli istifade&#231;i <u>Winston</u> siqareti ald&#305;.','Mr_iLQaR',1,1365460171,1,'Siqaret sat&#305;&#351;&#305;','09-Apr-2013 [03:29]',1,1),(97505828,'Admin',8,'H&#246;rmetli Admin! <b>Admin</b> leqebli istifade&#231;i <u>Winston</u> siqareti ald&#305;.','Mr_iLQaR',1,1365460172,1,'Siqaret sat&#305;&#351;&#305;','09-Apr-2013 [03:29]',1,1),(42198226,'Xeber&#231;i',8,'Salam <b>Cenab Admin</b> Siz bu g&#252;n &#231;atda 1 saat aktiv oldu&#287;unuz &#252;&#231;&#252;n <b>Sistem</b> size 10 bal hediyye etdi. <br/>Hal-haz&#305;rda sizin 1.0E+16 bal&#305;n&#305;z var.<br/> <i>Aktiv Olun. Te&#351;ekk&#252;rler.</i>\n','Admin',1,1365501989,1,'Tebrikler!!! 10 bal hediyye qazand&#305;n&#305;z','09.04.13 [15:06]',1,1);
/*!40000 ALTER TABLE `zapiski` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-04-10 19:53:39
