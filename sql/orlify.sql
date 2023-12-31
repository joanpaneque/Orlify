-- MariaDB dump 10.19-11.3.0-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: orlify
-- ------------------------------------------------------
-- Server version	11.3.0-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES
(1,'DAW'),
(2,'DAW2'),
(3,'SMX');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` VALUES
(1,'Array'),
(2,'Array'),
(3,'Array'),
(4,'Array'),
(5,'Array'),
(6,'Array'),
(7,'Array'),
(8,'Array'),
(9,'userData/37fd78451dedeb3e751dc85ad0cce0f26a169e618d1c534eb6b80429b0153b42jpg'),
(10,'userData/4982f3c96edbdad49568a91d79cd7b556903bb78f50f9cc529b1cefd77def45fjpg'),
(11,'userData/da541669f3deaa59d193b1bd67bf7005f3a7a42c5379684c16c377b6e380f9f1jpg'),
(12,'userData/c1d22278e87e2bbbc5d9edeebfa2a5b9130df8b7efb387b8d4bba8b97839055cjpg'),
(13,'userData/f3a5a18bdfcbc8f35d12649830154afc0f3d530cb62251cfa91f9f92904beeaajpg'),
(14,'userData/c61bee0112ce0877b3a805012f57167f8bf2a3e5552f6c599a0810fa9a0fbd17jpg'),
(15,'userData/cd6462dee404cd344cf3cd11a68347320a0484c69fe856737e6ffdef3c2cf530jpg'),
(16,'userData/842aee6187fd953af217887777b4e1a3b2d904694a8baacbe2f8424785a1ddf5jpg'),
(17,'userData/d570fbb5260fbaa3967cb3c0fc7fc17e4106151042be51a0b40740a985983118jpg'),
(18,'userData/096d6c74a775669f000097094d463a9aa4a8fc6dce77d5af711d1fce08801650jpg'),
(19,'userData/50184b6f82bc74d55b0074ac4cd9a5aea1f0b5db556c472ea2f59b993e545911jpg'),
(20,'userData/cbe1e5579fe22c17d4a881dbb215486c31cd2f77d806eff0e48d9f409f8c4eeejpg'),
(21,'userData/78f3d1c4b81bf437bc9816cbf1ce6ca86b5dd5d8d6d055a335b61edc3eedd287jpg'),
(22,'userData/8fa51cac547403e125fcbad2adf6668317dfd4582dbc5ab0a7e22bb3cbf44360jpg'),
(23,'userData/0ee6cece97552e27b45483ee00a3c855c44500c823ae099cf3cc09ecdf78a57bjpg'),
(24,'userData/8b74e00e4e9df60091af608b08491e79cb99270b0424f6fcd7abcbff6d2ff828jpg'),
(25,'userData/aa726fe7452f270af7f2d60c81233ec4c0bb092357457b0eb8457f6aa7e2364bjpg'),
(26,'userData/4076c282a8d4888379db051c469870e41e4854c029d1b27e506d6f899fc9ba40jpg'),
(27,'userData/c6694165ee7d098926cdd2ed4e3cd9bde8d844b23772393f365f911e563ac8f0jpg'),
(28,'userData/07dc20c4402ffbe81932baf5bd1d70362000909af0b253498a4026787a9c5985jpg'),
(29,'userData/9c2c42817b24be973ab64e609d8b9f1b8bdec8d5c146b93bf0179d2e23e2636fjpg'),
(30,'userData/0d7e6be13de64d26deccb964c97f2c571af53ee93b28b83f59d6b82dacbdc437jpg'),
(31,'userData/a1a18fc7cef1a2ae0348b634b7933db29e2c482fe8a48685f3b278e420f5f869jpg'),
(32,'userData/59a19558deea376bc807ed6ac3aed2dbbc7dc3d86e40c4f23c12b5079728448ajpg'),
(33,'userData/967ed0cacbd098b5d96a43bf8829e5374fbdf1180386cc9a81a8aa7342242bf5jpg'),
(34,'userData/8046ae9446e8ecf61339150f16cbff6fb191985d949df7425f658a64a9d9ea7cjpg'),
(35,'userData/614ff981ed68ba79bc0f8e1e36e107efd2463f93e4f060cbe11a9b54d2b4a77fjpg'),
(36,'userData/d94ae2860463a77bf66a9864573e9cd255751655700d688925d108e5ff60bf45jpg'),
(37,'userData/ddea6c6715c3a1b896b151df3c0b2885945a8bab93bac5307d806dbfeab24d2djpg'),
(38,'userData/9df681237d030a586cf685cf158db9d9540823f46e93859b0c55d707f9410770jpg'),
(39,'userData/d3b4f5c003d6730abc320e5e253d0e00b39639c13c2de19c834333381237c3a0jpg'),
(40,'userData/33b87d6893da0450c99943fb6b4bb22ffb2fbd9f958b1522f1263c8d7630b663jpg'),
(41,'userData/2f58149de422438cfad104c8c9ef785b3e146dd0753a9206de0fa0a57bbe0934jpg'),
(42,'userData/ee637a0c5885132a0cf5a5e31473f2dee181a03a8bc0390fcab4dddc1b3a1cefjpg'),
(43,'userData/ecc6d3b4aee4c44cf7898be44f1dd28f8af696b7426b1fe1a8fe8c400d8c966ejpg'),
(44,'userData/55f2c932d92896e8c79aaf20675ff35905662530fee62ceccbe11add6fed4f07jpg'),
(45,'userData/3b1bb4f55a632db790fc3be18eaad9184ff5413772bce45367d30ee64768f50bjpg'),
(46,'userData/db572e6828b6fc61dd01aaf555a8fa2c6d5a6397b6de687ac6954c02352357c0jpg'),
(47,'userData/f2091b9f8d28bb71f92c6cf0cd3f035a64b974501a2f2afd7323497159f5e172jpg'),
(48,'userData/d2e1a7eb6db5168902db396232c8b941973804afb20a48b20105808a2502b208jpg'),
(49,'userData/7ca6ba799aea6f3908a1fd78fd105557773c8d4df23ee02f25167bc8289c27e1jpg'),
(50,'userData/496656a84c2d32d03c1f774cda678c8a32b954a178425b296bbf913153c7c951jpg'),
(51,'userData/026ca0365baf412d82ac95186e187382acfed43dd402008d2f13de3d173a9d9bjpg'),
(52,'userData/fa4932d16f5d4e58d1b01cec2595b6745fee0b600b3181952910a8ff3311e0bdjpg'),
(53,'userData/aef13acdc1dd111a0719b3ad213b1eafdcac9fdabf62eec7fde845a92bd705acjpg'),
(54,'userData/2944bb775f1c813195186ceb7f6d4363ed5497945f847e636736e585819e9723jpg'),
(55,'userData/f0cfe4920f0b38699d1fecd2ea3a5a091b8427a31c3a1155a4a18df1c11ce2e4jpg'),
(56,'userData/5bc719060f51ebe42a940cd291fd3ad5ea13da887604a89f36bd4dd103653801jpg'),
(57,'userData/11f1be7eb04c3fd5919189ff21964beaa3a8a44d543c5c1557d7f97c8d155723jpg'),
(58,'userData/82031a6b077cc919f91ca96ed11b19ff8b05de6e2c8674689b1be4580880fc43jpg'),
(59,'userData/a4d841c9afe5489ea57323d78bdb4a21fdd4cff750efdab8bff00d0b50553e31jpg'),
(60,'userData/f57078ec056588b0bdee8907a8d55b40ec61f6a637e2dcfc862b3df6d2cdb50fjpg'),
(61,'userData/0a75b17d369f9d6ad2bc93be0f42407d5c843b898db66e189d3e857cb0e013c3jpg'),
(62,'userData/09c5b0cff9d27255a2bc8a2e540075f876d15b940c3a152288af8df91c7e8ff6jpg'),
(63,'userData/62a3aa25e2b00d5105ffe630e4aa5c1da46920b0ec6e23ac927d14cb7a39d0b4jpg'),
(64,'userData/401dce5000f4b58c2be1a17aec99f610df4cc507960900029d5476c4f9e3b815jpg'),
(65,'userData/084d350ae2e87a792161f099bd273d612630fbe62b4b01421f88b83cd001040ejpg'),
(66,'userData/909012e72197b38200d4c6aad5790b9d16e82bfb47c83f0a94960ebee6fb1594jpg'),
(67,'userData/a8a2d17f897dcaf09226d64beba80ddbafa124647a7429090a2e5c7314f76e81jpg'),
(68,'userData/2d5ffc7b1352848518ac816ad8428dafd52392f840b0033fd0864595a6963b20jpg'),
(69,'userData/6d2740d18991330c87e0e247e0c4598e8ab0b88b619277fe3d11912775d4a359jpg'),
(70,'userData/febba1c8aab920ee0309b31a3272332a4fbb10a139d203490f7178d763f92e79jpg'),
(71,'userData/b46e8edd5119c3fa0f3e647a66d0b99f7cf5fac5ab75a09798ccda02402f6426jpg'),
(72,'userData/c8b0a353e25e9f8bf63e2e8f7054252afc0d2007bcc90ef5c9cee8d263d8d47cjpg'),
(73,'userData/057d4e44b8b401ef0a881b9ddd5ea64749237f306d36e150eee2452fb14a506bjpg'),
(74,'userData/3354c63c43f760bc80e41c5d098d642c1579aab62dc6ad58f03b68679251ae3ajpg'),
(75,'userData/eb9049a58e9b313cf997e8edc42b49f47e9466aeb0f1e312108c190a79821b44jpg'),
(76,'userData/4e9ece8f2fafbf0dc5665bd324181ee78144200fc417b3a0b4cf3820c78f6bd3jpg'),
(77,'userData/13744746e850f73916b54d219f2e734975e83c0a80e35223da832ce90c8ba4aajpg'),
(78,'userData/08bf3dea410fb1984d5b37ea61d3243a99cdec8c8ca4afda7fcd9ab60d176971jpg'),
(79,'userData/9f81529d473e2be8be88bbdf3df2d2ebb9f31ef0e4bfe7ee3cb9ec4bc0c9102ajpg'),
(80,'userData/ba81a46fed1a58fe9d68515dd1773c9e7cdc0abcdf013241386002ee3eb695d5jpg'),
(81,'userData/69d8ccf1f108491dae271b84fc4685ab1ff4cb7df75658aecc37cec835376b90jpg'),
(82,'userData/b45f980aa24ba224dabde94c8a1aefb5fa39923e825314b6916bc070083c6cfdjpg'),
(83,'userData/dc6d4a38e552ade8d8ea065422397e708441a59b969ad9c5d795b6eb8d83372bjpg'),
(84,'userData/70351598ee20d95cca0bc2d682b8bdb5dbbfa9249733bd01068dd9c6928dbf8fjpg'),
(85,'userData/a4b47d3ac5e312b36bdef31caf135de9e0af0840f356125ae6f89de4e35e672ejpg'),
(86,'userData/276623f8afda7b8e504705fcf375815606bfd95f4dd8e8eeb3a6d9f9ac066748jpg'),
(87,'userData/6610630e24151814031e9a90d7bdcab7abeb0ee1d7fb93a8ce257114edd3cb8ejpg'),
(88,'userData/1c25dd74ec494263696b9011467f729d10c685352581b601d53e9ba895933a4ejpg'),
(89,'userData/bb4db57c3c69805543abff7edc4ad1f7f8a824c7ce4ea6ff487f24dd97d5a194jpg'),
(90,'userData/29c008accfd7f79c7fe0cfa8e89b98b54213eacbd14817ad1d6f323c61bbd57djpg'),
(91,'userData/f892a81e8420b57e41c706a3da24fe7c063755bf890f148e09f0fe95e0e68e93jpg'),
(92,'userData/50e312364e63704ac92fd2b2df352c0dc0a7dd23974b69bef7a305a72b6e351bjpg'),
(93,'userData/160acbc02a56362f912b2700237c8b6fedeb747fe3bb130c34cb3713d9c80ef3jpg'),
(94,'userData/594d34dcfdac608459579e7b6bac7ae3ab7c2c7df4d3647f18cff09527edbb57jpg'),
(95,'userData/989eb8f4a4de8954011d213c80c9e5d03817f8a2b081d326c8b639fb92b54c7ajpg'),
(96,'userData/c173a4012838a3119627e07bbabee056958e38969d30cbf543d66509d8210424jpg'),
(97,'userData/fa3f3d15ec2aa48ee018f278a0404bcd786bfebffc6e5ec53c3ae97f8e55a938jpg'),
(98,'userData/0bace16a57696e9da7e15dfa89bff831ca40bf097c1d50d023aeec1b10ad6d52jpg'),
(99,'userData/d14fdf833869c326dab6e4e895c31b6d886b4995f7cb51c97269cbca7856d06cjpg'),
(100,'userData/c2f1d4ef755282a1e04de0903de96b5d108628e7da2f48ae4fe216b3548462e3jpg'),
(101,'userData/14838613bf4c70eba828f875cea30b2959285229823190b55951252ee7cad9f5jpg'),
(102,'userData/95b40fd2fd56fe4b52454036247ff4003c28763b91f76ffaeef15b479e806b60jpg'),
(103,'userData/e191c4581ecc8d7ed289f94c8fd41736b7498876b0602469f0ce80f75c989cc3jpg'),
(104,'userData/18d46a30296c5006ad407094a8beff44f8a0f1a9959c14aa7baf48fd8108d3ecjpg');
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `portraits`
--

DROP TABLE IF EXISTS `portraits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `portraits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `groupId` int(11) NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT 1,
  `public` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `groupId` (`groupId`),
  CONSTRAINT `portraits_ibfk_1` FOREIGN KEY (`groupId`) REFERENCES `groups` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `portraits`
--

LOCK TABLES `portraits` WRITE;
/*!40000 ALTER TABLE `portraits` DISABLE KEYS */;
INSERT INTO `portraits` VALUES
(1,1,0,0),
(2,2,1,0),
(3,3,1,0);
/*!40000 ALTER TABLE `portraits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `portraitsusersimages`
--

DROP TABLE IF EXISTS `portraitsusersimages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `portraitsusersimages` (
  `userId` int(11) NOT NULL,
  `imageId` int(11) NOT NULL,
  KEY `userId` (`userId`),
  KEY `imageId` (`imageId`),
  CONSTRAINT `portraitsusersimages_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`),
  CONSTRAINT `portraitsusersimages_ibfk_2` FOREIGN KEY (`imageId`) REFERENCES `images` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `portraitsusersimages`
--

LOCK TABLES `portraitsusersimages` WRITE;
/*!40000 ALTER TABLE `portraitsusersimages` DISABLE KEYS */;
INSERT INTO `portraitsusersimages` VALUES
(4,91),
(4,98),
(4,99),
(4,100),
(4,101),
(4,102),
(3,103),
(4,104);
/*!40000 ALTER TABLE `portraitsusersimages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recoveries`
--

DROP TABLE IF EXISTS `recoveries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recoveries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `expiresAt` datetime NOT NULL DEFAULT (current_timestamp() + interval 10 minute),
  PRIMARY KEY (`id`),
  UNIQUE KEY `token` (`token`),
  KEY `userId` (`userId`),
  CONSTRAINT `recoveries_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recoveries`
--

LOCK TABLES `recoveries` WRITE;
/*!40000 ALTER TABLE `recoveries` DISABLE KEYS */;
INSERT INTO `recoveries` VALUES
(2,6,'e317b5d99b7c9cc01b93765bd6e606e433a738bae88c9a2ceba4951213683cd9','2023-12-12 18:02:45'),
(3,6,'bf5a7c0a7ed89f432680f6116bb2cbb3dd478474eb14db3b033bfe286635e064','2023-12-12 18:03:27'),
(4,6,'234dd2441e2f85dd259c7964c498969839ac03882f9129316491a68376358dc5','2023-12-12 18:04:07'),
(5,6,'84a2f891eec2438464afb1a199337aba42847f1cec14a57c31b1e7349e7087ea','2023-12-12 18:04:09'),
(6,6,'e8ba10eedc24f768a27a8162dd22a907d8e3e01f9a180a1c23cfd6ef05caf452','2023-12-12 18:04:09'),
(7,6,'fd817f765b7ce749994db07ed42b54452558156ff4a84d1f38f771da748060e1','2023-12-12 18:14:55'),
(8,6,'3d09acde4e3b6f656f545336e928726938b8a0c883bc95d4f670134e548dae8f','2023-12-12 18:30:50');
/*!40000 ALTER TABLE `recoveries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reports`
--

DROP TABLE IF EXISTS `reports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `marked` tinyint(1) NOT NULL DEFAULT 0,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userId` (`userId`),
  CONSTRAINT `reports_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reports`
--

LOCK TABLES `reports` WRITE;
/*!40000 ALTER TABLE `reports` DISABLE KEYS */;
INSERT INTO `reports` VALUES
(1,1,0,'La imagen no es la correspondiente'),
(2,2,1,'La imagen no soy yo'),
(3,3,0,'La imagen no soy yo'),
(4,4,1,'La imagen no soy yo'),
(5,5,0,'La imagen no soy yo'),
(7,1,0,'la Imagen no corresponde conmigo'),
(8,1,0,'la Imagen no corresponde conmigo'),
(9,1,0,'la Imagen no corresponde conmigo'),
(10,1,1,'la Imagen no corresponde conmigo'),
(11,1,1,'la Imagen no corresponde conmigo'),
(12,2,1,'la Imagen no corresponde conmigo'),
(13,2,1,'la Imagen no corresponde conmigo'),
(14,2,1,'la Imagen no corresponde conmigo'),
(15,3,1,'la Imagen no corresponde conmigo');
/*!40000 ALTER TABLE `reports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES
(1,'student'),
(2,'teacher'),
(3,'manager'),
(4,'admin');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `studentsusersgroups`
--

DROP TABLE IF EXISTS `studentsusersgroups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `studentsusersgroups` (
  `userId` int(11) NOT NULL,
  `groupId` int(11) NOT NULL,
  KEY `userId` (`userId`),
  KEY `groupId` (`groupId`),
  CONSTRAINT `studentsusersgroups_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`),
  CONSTRAINT `studentsusersgroups_ibfk_2` FOREIGN KEY (`groupId`) REFERENCES `groups` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `studentsusersgroups`
--

LOCK TABLES `studentsusersgroups` WRITE;
/*!40000 ALTER TABLE `studentsusersgroups` DISABLE KEYS */;
INSERT INTO `studentsusersgroups` VALUES
(1,1),
(2,1),
(3,2),
(3,1),
(1,1),
(4,3),
(4,2),
(4,1),
(2,3);
/*!40000 ALTER TABLE `studentsusersgroups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teachersusersgroups`
--

DROP TABLE IF EXISTS `teachersusersgroups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teachersusersgroups` (
  `userId` int(11) NOT NULL,
  `groupId` int(11) NOT NULL,
  KEY `userId` (`userId`),
  KEY `groupId` (`groupId`),
  CONSTRAINT `teachersusersgroups_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`),
  CONSTRAINT `teachersusersgroups_ibfk_2` FOREIGN KEY (`groupId`) REFERENCES `groups` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teachersusersgroups`
--

LOCK TABLES `teachersusersgroups` WRITE;
/*!40000 ALTER TABLE `teachersusersgroups` DISABLE KEYS */;
INSERT INTO `teachersusersgroups` VALUES
(1,2),
(1,1),
(1,3);
/*!40000 ALTER TABLE `teachersusersgroups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `roleId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surnames` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cardUrl` varchar(255) DEFAULT NULL,
  `mainPortraitImageId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `roleId` (`roleId`),
  KEY `mainPortraitImageId` (`mainPortraitImageId`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`roleId`) REFERENCES `roles` (`id`),
  CONSTRAINT `users_ibfk_2` FOREIGN KEY (`mainPortraitImageId`) REFERENCES `images` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES
(1,2,'prueba','prueba','prueba','pruebap@gmail.com','1234',NULL,NULL),
(2,1,'prueba2','prueba2','prueba2','pruebap@gmail.com2','1234',NULL,NULL),
(3,1,'prueba3','prueba3','prueba3','pruebap@gmail.com3','1234',NULL,NULL),
(4,1,'prueba4','prueba4','prueba4','pruebap@gmail.com4','1234',NULL,NULL),
(5,1,'prueba5','prueba5','prueba5','pruebap@gmail.com5','1234',NULL,NULL),
(6,1,'roger','rico','rrico','rrico@cendrassos.net','$2y$10$G0tTp2RhjXeRFL8BLXDGx..CdPGpPnUw1DuqBO0l3UQ7sCLwTE1Ye',NULL,NULL),
(8,1,'roger','moreno','more','rrico@cendrassos.com','$2y$10$kVxgsRhvXDD6Fd1FD.YinO4T1qEggtilhgTj.30oaMuT9szPMXFYS',NULL,NULL),
(9,1,'Rogerrico','moreno','rmore','rricomore@cendrassos.net','$2y$10$Lo97YHE48JfeWNO8YHTWruewxrDr0irEZ4K0F9aZOUngzxF4qjhfi',NULL,NULL),
(10,1,'jsbfbdfbsdb','jsbdvhbhdsb','jdsvjsbdbvs','rrico@cendrassos.es','$2y$10$NA2rjdF9/OXjaWgVYg6KzeoPaC2hv5WMe0bD7eN.h3qyqgEVm3iBC',NULL,NULL),
(11,1,'d','d','d','d@d.com','$2y$10$4XW7vjGUJSl65epofTLU7u0NBqmucQLxTnc/HulXqi3s7baSIZGFK',NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-19 15:21:48
