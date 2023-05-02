-- MySQL dump 10.13  Distrib 8.0.26, for macos11 (x86_64)
--
-- Host: localhost    Database: appsysq
-- ------------------------------------------------------
-- Server version	8.0.26

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
-- Table structure for table `avaluos`
--
create database appsysq;
use appsysq;
DROP TABLE IF EXISTS `avaluos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `avaluos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `codigo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `radicado_id` bigint unsigned NOT NULL,
  `visitador_id` bigint unsigned NOT NULL,
  `asigna_visitador` timestamp NOT NULL,
  `fecha_visita` timestamp NULL DEFAULT NULL,
  `entrega_visitador` date DEFAULT NULL,
  `estado_visitador` bigint unsigned NOT NULL,
  `valuador_id` bigint unsigned NOT NULL,
  `asigna_valuador` date NOT NULL,
  `entrega_valuador` date DEFAULT NULL,
  `estado_valuador` bigint unsigned NOT NULL,
  `verificador_id` bigint unsigned NOT NULL,
  `asigna_verificador` date DEFAULT NULL,
  `entrega_verificador` date DEFAULT NULL,
  `estado_verificador` bigint unsigned DEFAULT NULL,
  `lider_id` bigint unsigned NOT NULL,
  `novedades` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `fecha_final` date DEFAULT NULL,
  `hora_final` time DEFAULT NULL,
  `detalle_estado_avaluo_id` bigint unsigned DEFAULT NULL,
  `valor_total_avaluo` double DEFAULT NULL,
  `valor_asegurable` double DEFAULT NULL,
  `calificacion_garantia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_vivienda` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_avaluo` date DEFAULT NULL,
  `fecha_correccion` date DEFAULT NULL,
  `tipo_avaluo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `metodologia_valuatoria` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sistema_coordenadas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `justificacion_metodologia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actualidad_edificadora` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comportamiento_oferta` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tiempo_esperado_oferta` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detalle_tipo_vivienda_id` bigint unsigned DEFAULT NULL,
  `localizacion_predio` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `documentos_suministrados` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion_inmueble` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `observaciones_generales` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `normatividad_pot` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `radicado_id` (`radicado_id`),
  KEY `visitador_id` (`visitador_id`),
  KEY `valuador_id` (`valuador_id`),
  KEY `verificador_id` (`verificador_id`),
  KEY `lider_id` (`lider_id`),
  CONSTRAINT `avaluos_ibfk_1` FOREIGN KEY (`radicado_id`) REFERENCES `radicados` (`id`),
  CONSTRAINT `avaluos_ibfk_2` FOREIGN KEY (`visitador_id`) REFERENCES `users` (`id`),
  CONSTRAINT `avaluos_ibfk_3` FOREIGN KEY (`valuador_id`) REFERENCES `users` (`id`),
  CONSTRAINT `avaluos_ibfk_4` FOREIGN KEY (`verificador_id`) REFERENCES `users` (`id`),
  CONSTRAINT `avaluos_ibfk_5` FOREIGN KEY (`lider_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avaluos`
--

LOCK TABLES `avaluos` WRITE;
/*!40000 ALTER TABLE `avaluos` DISABLE KEYS */;
INSERT INTO `avaluos` VALUES (51,'se debe generar',25,3,'2023-05-04 23:27:00','2024-05-30 23:28:00',NULL,160,2,'2023-05-04',NULL,158,6,NULL,NULL,158,1,'ninguna',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `avaluos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cargos`
--

DROP TABLE IF EXISTS `cargos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cargos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre_cargo` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargos`
--

LOCK TABLES `cargos` WRITE;
/*!40000 ALTER TABLE `cargos` DISABLE KEYS */;
INSERT INTO `cargos` VALUES (1,'Visitador','Encargado de efectuar la visita y hacer levantamiento',1,NULL,NULL),(2,'Avaluador','Hace el informe, debe tener RAA',1,NULL,NULL),(3,'Verificador','Revisor de avaluos',1,NULL,NULL),(4,'Lider','Controla toda la operación',1,NULL,NULL);
/*!40000 ALTER TABLE `cargos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `datos_valorar`
--

DROP TABLE IF EXISTS `datos_valorar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `datos_valorar` (
  `id` int NOT NULL,
  `codigo` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `valor_oferta` double DEFAULT NULL,
  `latitud` double DEFAULT NULL,
  `longitud` double DEFAULT NULL,
  `tipo_inmueble` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `banos` int DEFAULT NULL,
  `habitaciones` int DEFAULT NULL,
  `parqueaderos` int DEFAULT NULL,
  `estrato` int DEFAULT NULL,
  `area_privada` double DEFAULT NULL,
  `barrio` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_municipio` int DEFAULT NULL,
  `id_departamento` int DEFAULT NULL,
  `fecha_avaluo` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datos_valorar`
--

LOCK TABLES `datos_valorar` WRITE;
/*!40000 ALTER TABLE `datos_valorar` DISABLE KEYS */;
INSERT INTO `datos_valorar` VALUES (1,'5046',399661090,4.796958333,-74.05344167,'Apartamento',2,3,1,4,81.81,'Caobos Salazar',2310,3,'2015-11-12'),(2,'5273',60992280,4.8,-75.51666667,'Casa',1,2,0,2,0,'Estacion Villegas',2859,20,'2018-05-22'),(3,'5380',55534500,5.45,-75.48333333,'Apartamento',2,1,0,2,28.7,'La Esperanza',2665,1,'2019-06-23'),(4,'SIV-150731-2711',212920450,5.55,-73.33333333,'Casa',2,3,1,4,0,'Las Quintas',3215,5,'2015-08-08'),(5,'SIV-150805-2717',356585320,4.8,-73.96666667,'Apartamento',2,3,1,4,76.36,'Santa Rosa',2310,3,'2015-08-03'),(6,'SIV-150825-2599',359091200,4.7,-74.06666667,'Apartamento',2,3,1,4,75.26,'Potosi',2310,3,'2015-08-10'),(7,'SIV-150825-2601',243188200,4.716666667,-74.05,'Apartamento',2,4,1,4,67.41,'Victoria Norte',2310,3,'2015-08-12'),(8,'SIV-150828-2605',328344424,4.716666667,-74.03333333,'Apartamento',2,2,1,4,69.88,'Acacias-Usaquen',2310,3,'2015-08-19'),(9,'SIV-150828-2642',326526000,4.733333333,-74.03333333,'Casa',3,3,1,4,94.95,'Mirandela',2310,3,'2015-08-20'),(11,'SIV-150831-2721',885790000,4.7,-74.05,'Apartamento',3,3,2,6,141.5,'San Patricio',2310,3,'2015-08-14'),(13,'SIV-150904-2902',395376250,4.716666667,-74.03333333,'Apartamento',3,3,2,4,92.62,'Caobos Salazar',2310,3,'2015-09-01'),(14,'SIV-150908-2878',318683200,4.616666667,-74.05,'Casa',2,3,1,3,106.14,'Marsella',2310,3,'2015-08-31'),(15,'SIV-150908-3197',310370100,4.683333333,-74.06666667,'Apartamento',2,3,1,4,74.74,'Engativa',2310,3,'2015-09-03'),(16,'SIV-150914-3420',227403950,4.716666667,-74.08333333,'Apartamento',2,3,1,3,65.02,'Bosques De San Jorge',2310,3,'2015-12-24'),(17,'SIV-150916-2597',359794350,4.683333333,-74.03333333,'Apartamento',2,2,1,6,59.18,'Molinos Norte',2310,3,'2015-08-12'),(18,'SIV-150917-3294',593335499,4.666666667,-74.08333333,'Apartamento',1,3,2,4,97.95,'Salitre Alto',2310,3,'2015-09-09'),(19,'SIV-150922-3291',45104496,4.383333333,-75.13333333,'Apartamento',1,3,1,2,41.73,'Picaleña',2630,23,'2015-09-03'),(20,'SIV-150922-3418',165196467,5.516666667,-73.36666667,'Casa',2,3,1,3,0,'Altos De Cooservicios',3215,5,'2015-09-21'),(21,'SIV-150924-3558',233250595,4.716666667,-74.03333333,'Apartamento',2,3,1,4,47.94,'Acacias Usaquen',2310,3,'2015-09-21'),(22,'SIV-150924-3700',300024000,4.733333333,-74.05,'Apartamento',2,3,1,3,74.08,'Britalia',2310,3,'2015-09-25'),(23,'SIV-150928-3693',126312000,4.716666667,-74.11666667,'Apartamento',2,3,0,3,45.6,'Villas De Alcala',2310,3,'2015-09-24'),(24,'SIV-150928-3768',188595500,4.716666667,-74.03333333,'Apartamento',2,3,1,3,51.67,'Tibabuyes',2310,3,'2015-09-28'),(25,'SIV-151007-3945',130348827,1.916666667,-76.21666667,'Casa',1,4,1,2,0,'Los Lanceros',2833,5,'2015-10-14'),(26,'SIV-151030-4636',647248000,4.7,-74.05,'Casa',3,3,1,5,172.07,'La Calleja',2310,3,'2015-07-28'),(27,'SIV-151110-4977',171977080,5.816666667,-73.03333333,'Casa',3,4,1,3,118.36,'San Juan Bosco',2485,5,'2015-11-12'),(28,'SIV-151110-4981',157036000,5.783333333,-73.11666667,'Casa',3,4,0,2,0,'Fatima',2833,5,'2015-11-12'),(29,'SIV-151111-5046',399661090,4.733333333,-74.01666667,'Apartamento',2,3,1,4,81.81,'Caobos Salazar',2310,3,'2015-11-12'),(30,'SIV-151112-5050',205567560,4.45,-75.1,'Apartamento',2,3,1,4,102.12,'Piedra Pintada Alta',2630,23,'2015-11-12'),(31,'SIV-151112-5053',159504000,4.8,-74.31666667,'Casa',2,4,1,2,0,'El Prado',2534,11,'2015-11-18'),(32,'SIV-151113-5077',1205004230,4.7,-74.1,'Apartamento',4,3,2,6,175.66,'Chico',2310,3,'2015-11-17'),(33,'SIV-151117-5221',222345410,4.9,-74.01666667,'Apartamento',2,3,1,4,64.81,'Urb. Huertas De Cajica',2342,11,'2015-11-14'),(34,'SIV-151117-5262',120258700,5.533333333,-73.3,'Casa',4,3,1,2,0,'Cerrito Encantado',3215,5,'2015-11-26'),(35,'SIV-151118-5265',923726685,4.7,-74.05,'Apartamento',3,3,2,5,129.96,'Santa Barbara Central',2310,3,'2015-11-20'),(36,'SIV-151121-5369',242947000,5.766666667,-73.06666667,'Casa',3,3,1,3,0,'San Jose',2485,5,'2015-11-23'),(37,'SIV-151121-5372',219444190,5.816666667,-73.03333333,'Casa',4,4,1,3,171,'El Progreso',2485,5,'2015-11-23'),(38,'SIV-151124-5434',83210000,6.45,-73.25,'Casa',2,3,0,3,53,'Villa Enmanuel',3123,21,'2015-11-27'),(39,'SIV-151124-5435',212100000,6.516666667,-73.2,'lote',0,0,0,0,0,'Vereda Las Vueltas',2566,21,'2015-12-10'),(40,'SIV-151124-5441',211856850,6.95,-73.15,'Apartamento',3,2,1,4,62.55,'Ciudadela Real De Minas',2321,21,'2015-11-26'),(41,'SIV-151130-5576',492598600,4.816666667,-74.01666667,'Apartamento',2,3,1,5,92.42,'Monaco',2310,3,'2015-12-04'),(42,'SIV-151130-5581',96333300,4.65,-74.15,'Casa',2,3,1,2,49.09,'Dindalito',2310,3,'2015-12-02'),(43,'SIV-151201-5623',875162825,4.683333333,-74.03333333,'Apartamento',4,3,3,6,185.67,'Santa Barbara Central',2310,3,'2015-12-04'),(44,'SIV-151221-6105',664993091,4.383333333,-73.13333333,'Apartamento',3,3,2,5,110.89,'Bella Suiza',2310,3,'2015-12-21'),(45,'SIV-151229-6173',75795944,3.466666667,-72.88333333,'Casa',1,2,0,2,119,'Belen De La Paz',3026,31,'2016-02-15'),(46,'SIV160314-8289',237715600,4.316666667,-73.76666667,'Apartamento',2,3,1,4,68.4,'El Tintal Central',2310,3,'2014-12-23'),(47,'AV 160307-7855',199139300,4.766666667,-74.01666667,'Apartamento',2,3,1,4,63.37,'Tibabita',2310,3,'2014-11-25'),(48,'AV 160308-7929',200146806,4.633333333,-74.11666667,'Apartamento',3,3,1,4,66.84,'Marsella',2310,3,'2014-11-27'),(49,'AV 160308-7936',711985350,4.683333333,-74.05,'Apartamento',3,2,2,6,95.21,'Santa Bibiana',2310,3,'2014-12-01'),(50,'AV 160308-7939',618371000,4.683333333,-74.05,'Apartamento',3,2,2,6,81.15,'Santa Bibiana',2310,3,'2014-12-01'),(51,'AV 160308-7940',141172500,4.733333333,-74.06666667,'Apartamento',2,2,1,3,53.78,'Suba Urbano',2310,3,'2014-12-01'),(52,'5435',212100000,6,-73.65,'lote',0,0,0,0,0,'Vereda Las Vueltas',2566,21,'2015-12-10'),(53,'5453',212100000,6,-73.65,'lote',0,0,0,0,0,'Vereda Las Vueltas',2566,21,'2015-12-10'),(54,'5487',141751800,4.783333333,-74.01666667,'Apartamento',2,3,0,4,51.64,'Tibabita',2310,3,'2015-11-26'),(55,'5495',686217224,4.666666667,-74.4,'Casa',5,4,1,4,0,'Cadiz',2630,23,'2015-11-27'),(56,'5552',716731260,4.866666667,-74.05,'Casa',3,3,2,4,122.77,'Vereda Calahorra',2342,11,'2021-07-13'),(57,'5701',117147100,5.033333333,-74.6,'Casa',2,3,2,2,0,'San Felipe',2270,23,'2019-05-15'),(58,'5705',219613800,5.916666667,-73.6,'Casa',2,3,1,3,0,'El Prado',2285,21,'2015-12-14'),(59,'5708',148298400,6.983333333,-73.03333333,'Apartamento',2,3,1,4,57.48,'Piedecuesta',2863,21,'2015-12-04'),(60,'5762',460512500,7.1,-73.1,'Casa',2,3,2,5,138.5,'Altos De Pan De Azucar',2321,21,'2015-12-09'),(61,'5774',168379215,5.85,-73.03333333,'Apartamento',3,4,0,3,107.97,'El Carmen',2485,5,'2015-12-12'),(62,'5778',141408800,4.033333333,-73.75,'Casa',2,3,1,2,0,'Ciudadela Comcaja',2205,16,'2015-12-10'),(63,'5911',104010000,3.7,-70.16666667,'Casa',2,1,1,3,0,'Punta Brava',2705,29,'2015-12-21'),(64,'5966',460842000,4.116666667,-73.61666667,'Casa',4,3,1,3,0,'Maizaro Sur',3272,16,'2015-12-15'),(65,'5999',302176400,4.8,-74.1,'Casa',1,3,2,3,0,'Pueblo Viejo',2448,11,'2021-04-29'),(66,'6045',75625155,5.7,-73.13333333,'Apartamento',2,3,0,3,60.67,'San Francisco',2485,5,'2015-12-23'),(67,'6062',130600000,4.916666667,-73.88333333,'Apartamento',1,2,0,3,40,'Los Cerezos',2310,3,'2015-12-18'),(68,'6105',664993091,4.7,-74.01666667,'Apartamento',3,3,2,5,110.89,'Bella Suiza',2310,3,'2015-12-21'),(69,'6153',87579630,4.383333333,-73.43333333,'Apartamento',2,3,0,3,55.89,'Ciudad Verde',3120,11,'2016-01-12'),(70,'6155',201671430,4.633333333,-74.05,'Apartamento',2,1,1,3,37.77,'Chapinero Central',2310,3,'2016-01-02'),(71,'6183',325505580,4.7,-74.03333333,'Apartamento',2,2,1,4,63.57,'Acacias',2310,3,'2015-12-29'),(72,'91529501',187841600,6.033333333,-73.53333333,'Apartamento',2,3,1,4,61.79,'Real De Minas',2321,21,'2015-11-24'),(73,'5384',191593800,5.166666667,-72.55,'Casa',3,3,1,2,0,'El Cristal',2214,26,'2015-12-10'),(74,'5388',130700600,4.916666667,-72.36666667,'Casa',3,6,1,2,0,'La Esperanza',2737,26,'2015-11-24'),(75,'5389',79389750,5.016666667,-72.73333333,'Casa',1,2,1,2,0,'Libertadores',3171,26,'2015-11-24'),(76,'5390',148298400,6.966666667,-73.03333333,'Apartamento',2,3,1,4,57.48,'Piedecuesta',2863,21,'2015-11-24'),(77,'5391',721500000,7.116666667,-73.1,'Apartamento',2,3,2,6,144.3,'Cabecera',2321,21,'2015-11-24'),(78,'5399',180509120,7.05,-73.1,'Apartamento',2,3,1,4,66.88,'Rio Frio',2544,21,'2015-11-24'),(79,'5400',128028520,4,-73.75,'Casa',2,5,0,1,0,'Ciudadela El Constructor',2205,16,'2015-11-26'),(80,'5403',136917000,6.9,-73.06666667,'Casa',2,3,0,3,0,'Villa Nueva Del Campo',2863,21,'2015-11-26'),(81,'CC 10244817 BBV',367745100,5.566666667,-74.81666667,'Casa',1,0,0,4,0,'Centro Villamaria',3265,6,'2015-01-19'),(82,'CC 19493790 BBV',310013250,4.683333333,-74.03333333,'Apartamento',2,1,1,6,49.96,'Rincon Del Chico',2310,3,'2015-01-30'),(83,'CC 41791796 BBV',243962000,4.75,-74.03333333,'Apartamento',2,3,2,4,73.78,'Mirandela',2310,3,'2015-01-22'),(84,'CC 41912872 BBV',707179700,4.683333333,-74.05,'Apartamento',3,2,2,6,95.21,'Santa Bibiana',2310,3,'2015-01-22'),(85,'CC 46661050 BBV',277000000,4.733333333,-74.05,'Apartamento',2,3,1,4,72.5,'Gilmar',2310,3,'2015-01-22'),(88,'CC 79939158 BBV',192442500,4.633333333,-74.13333333,'Apartamento',2,3,1,3,57.85,'Castilla',2310,3,'2015-01-15'),(89,'CC 80092664 BBV',268461000,4.633333333,-74.06666667,'Apartamento',2,3,1,4,99.43,'Campin Occidental',2310,3,'2015-01-22'),(90,'CC 91295587 BBV',223935900,4.716666667,-74.03333333,'Apartamento',3,3,1,4,69.33,'Cedro Narvaez',2310,3,'2015-01-23'),(91,'CC 1020726169 BBV',204690400,4.683333333,-74.18333333,'Apartamento',2,3,1,3,61.84,'Castilla',2310,3,'2015-01-22'),(92,'SIV 160217-8413',707179700,4.683333333,-74.05,'Apartamento',3,3,2,6,95.21,'Santa Bibiana',2310,3,'2015-01-07'),(93,'SIV 160311- 8117',360231013,4.683333333,-74.05,'Apartamento',2,2,2,6,85.1,'Santa Bibiana',2310,3,'2014-12-16'),(94,'SIV 160311-5517',237265000,4.716666667,-74.05,'Apartamento',2,4,1,4,67.41,'Victoria Norte',2310,3,'2014-12-17'),(95,'SIV 160311-8113',429867003,4.616666667,-74.06666667,'Apartamento',2,2,1,4,69.13,'Las Nieves',2310,3,'2014-12-12'),(96,'SIV 160311-8114',356920600,4.633333333,-74.1,'Apartamento',3,3,1,4,88.33,'Ciudad Hayuelos',2310,3,'2014-12-15'),(97,'SIV 160311-8115',258426000,4.716666667,-74.05,'Apartamento',2,1,1,4,64.98,'San Jose Del Prado',2310,3,'2014-12-15'),(98,'SIV 160311-8116',29050000,8.583333333,-75.8,'Casa',1,2,0,2,0,'Rancho Grande',2775,10,'2014-12-16'),(99,'SIV 160311-8121',345743500,4.8,-74.76666667,'Apartamento',3,3,1,5,106.93,'Batan',2310,3,'2014-12-16'),(100,'SIV 160315-8323',216447000,4.766666667,-74.06666667,'Apartamento',2,2,1,4,45.62,'Caobos Salazar',2310,3,'2014-12-26'),(101,'SIV 160315-8330',741408900,4.683333333,-74.05,'Apartamento',2,3,3,6,123.26,'San Patricio',2310,3,'2014-12-26'),(102,'SIV- 160315-8338',186578000,4.683333333,-74.03333333,'Apartamento',1,1,1,6,43.31,'Santa Barbara Central',2310,3,'2014-12-29'),(103,'SIV- 160315-8349',521890000,4.683333333,-74.08333333,'Apartamento',2,2,2,6,68.03,'Santa Bibiana',2310,3,'2014-12-29'),(104,'SIV 160317-8392',1120393001,4.65,-74.03333333,'Apartamento',1,2,1,6,201.54,'Acacias',2310,3,'2015-01-05'),(105,'SIV 160317-8397',370889000,4.633333333,-74.05,'Apartamento',2,2,1,4,67.26,'Granada',2310,3,'2015-01-05'),(106,'SIV 160317-8404',250329000,4.7,-74.05,'Apartamento',2,3,1,3,69.35,'Portales Del Norte',2310,3,'2015-01-05'),(107,'SIV 160317-8405',293302000,4.683333333,-74.05,'Apartamento',2,2,1,5,55.34,'Pasadena',2310,3,'2015-01-05'),(108,'SIV 160317-8406',1858832900,4.65,-74.1,'Casa',5,4,2,6,1599.24,'Casablanca Suba',2310,3,'2015-01-05'),(109,'SIV 160317-8408',1265347200,4.683333333,-74.05,'Apartamento',4,4,3,6,172.32,'Santa Bibiana',2310,3,'2015-01-06'),(110,'SIV 160317-8409',187976850,4.633333333,-74.11666667,'Apartamento',2,3,1,3,70.01,'Las Dos Avendias',2310,3,'2015-01-06'),(111,'SIV 160317-8410',270136200,4.6,-74.08333333,'Apartamento',2,3,1,3,67.63,'Centro Administrativo',2310,3,'2015-01-06'),(112,'SIV 160317-8412',375127350,4.666666667,-74.06666667,'Apartamento',3,3,1,4,88.39,'Santa Rosa',2310,3,'2015-01-06'),(113,'SIV 160317-8414',146006400,4.633333333,-74.11666667,'Apartamento',2,2,0,3,54.48,'Villa Alsacia',2310,3,'2015-01-08'),(114,'SIV 160317-8417',314411000,4.716666667,-74.06666667,'Apartamento',2,3,2,5,86.14,'Atenas',2310,3,'2015-01-08'),(115,'SIV 160317-8418',235974800,4.85,-74.05,'Apartamento',2,2,1,4,74.44,'Santa Inesita',2413,11,'2015-01-08'),(116,'SIV 160317-8419',310016000,4.683333333,-74.03333333,'Apartamento',2,1,1,6,44.8,'San Patricio',2310,3,'2015-01-09'),(118,'SIV 160318-8434',457782000,4.633333333,-74.05,'Apartamento',2,3,1,4,151.83,'Chapinero Central',2310,3,'2015-01-09'),(119,'SIV 160318-8438',155732300,4.65,-74.1,'Apartamento',2,3,0,3,53.98,'La Felicidad',2310,3,'2015-01-09'),(121,'SIV 160318-8442',252820000,4.716666667,-74.06666667,'Apartamento',2,3,1,4,68,'El Plan Suba',2310,3,'2015-01-15'),(122,'SIV 160318-8443',187355200,4.7,-74.05,'Apartamento',2,2,1,5,61.63,'Batan',2310,3,'2015-01-15'),(123,'SIV 160318-8462',326470400,4.683333333,-74.05,'Apartamento',2,4,1,5,92.8,'La Castellana',2310,3,'2015-01-15'),(124,'SIV 160318-8463',147525500,4.916666667,-74.01666667,'Apartamento',2,3,0,3,55.67,'Variante',2342,11,'2015-01-15'),(125,'SIV 160318-8465',433544310,4.683333333,-74.06666667,'Casa',2,3,2,4,101.13,'Ortezal',2310,3,'2015-01-15'),(126,'SIV 160328-8539',311126000,4.65,-74.08333333,'Apartamento',2,3,1,4,85.24,'Pablo Vi',2310,3,'2015-01-16'),(127,'SIV 160328-8540',750464000,4.633333333,-74.05,'Apartamento',3,2,2,4,144.32,'Granada',2310,3,'2015-01-16'),(128,'SIV 160328-8542',162412120,4.7,-74.11666667,'Apartamento',2,3,1,3,51.93,'Quirigua',2310,3,'2015-01-16'),(129,'SIV 160328-8543',786264008,4.7,-74.05,'Apartamento',3,3,2,4,184.16,'San Gabriel Norte',2310,3,'2015-01-16'),(130,'SIV 160329- 8600',2312112300,4.733333333,-74.06666667,'Apartamento',3,3,3,6,238.38,'Los Rosales',2310,3,'2015-01-20'),(131,'SIV 160329-8594',330307200,4.633333333,-74.06666667,'Apartamento',2,3,1,4,76.46,'Nicolas De Federman',2310,3,'2015-01-20'),(132,'SIV 160329-8596',270007500,4.716666667,-74.1,'Apartamento',2,1,1,5,48.65,'La Calleja',2310,3,'2015-01-20'),(133,'SIV 160329-8597',334323600,4.733333333,-74.06666667,'Apartamento',3,3,2,3,96.07,'Britalia Norte',2310,3,'2015-01-20'),(134,'SIV 160330-8630',325932500,4.7,-74.05,'Apartamento',3,3,1,5,76.69,'Rincon Del Chico',2310,3,'2015-01-22'),(135,'SIV 160330-8632',486947500,4.7,-74.05,'Casa',3,3,2,5,147.78,'Prado Veraniego',2310,3,'2015-01-22'),(136,'SIV 160331-8668',209519300,4.633333333,-74.05,'Apartamento',1,1,1,5,39.37,'Villa Suiza',2310,3,'2015-01-27'),(137,'SIV 160331-8672',866197950,4.666666667,-74.05,'Apartamento',3,3,3,6,132.33,'Chico Norte Iii Sector',2310,3,'2015-01-27'),(138,'SIV 160331-8673',319412009,4.666666667,-74.1,'Apartamento',2,2,1,4,63.8,'Modelia',2310,3,'2015-01-26'),(139,'SIV 160331-8676',291109380,4.683333333,-74.05,'Apartamento',2,2,1,5,63.18,'Lisboa',2310,3,'2015-01-26'),(140,'SIV 160331-8678',306590000,4.716666667,-74.03333333,'Apartamento',2,2,1,4,66.65,'Caobos Salazar',2310,3,'2015-01-26'),(141,'SIV 160331-8679',673291800,4.7,-74.03333333,'Apartamento',3,3,2,5,130.71,'Bella Suiza',2310,3,'2015-01-27'),(142,'SIV 160331-8691',92142150,4.733333333,-74.06666667,'Apartamento',1,1,1,3,33.69,'Suba Urbano',2310,3,'2015-01-28'),(143,'SIV 160331-8706',293433500,4.866666667,-74.03333333,'Apartamento',2,3,1,3,102.1,'Centro Cajica',2342,11,'2015-01-28'),(144,'SIV 160331-8720',727948700,4.683333333,-74.05,'Apartamento',3,2,2,6,98.22,'Santa Bibiana',2310,3,'2015-01-28'),(145,'SIV 160331-8732',108659100,4.583333333,-74.15,'Apartamento',2,3,0,3,51.99,'Perdomo',2310,3,'2015-01-30'),(146,'SIV 160331-8736',477492600,4.666666667,-74.05,'Apartamento',3,2,2,6,72.02,'Santa Bibiana',2310,3,'2015-01-30'),(147,'SIV 160331-8737',140283350,4.616666667,-74.1,'Apartamento',1,3,1,3,65.18,'San Rafael',2310,3,'2015-01-30'),(148,'SIV-150925-3727',300129000,4.083333333,-73.56666667,'Casa',4,3,1,5,1000.43,'Vereda La Cecilia',3272,16,'2015-11-17'),(149,'SIV-151113-5090',187841600,7.1,-73.11666667,'Apartamento',2,3,1,4,61.79,'Real De Minas',2321,21,'2015-11-24'),(150,'SIV-151118-5273',104274000,7.116666667,-73.2,'Apartamento',1,2,0,2,77.24,'Urbanizacion Bellavista',2701,21,'2015-11-23'),(151,'SIV-151123-5380',172760000,5.366666667,-72.6,'Casa',2,3,0,3,0,'El Centro',2214,26,'2015-11-24'),(152,'SIV-151123-5384',191593800,5.166666667,-72.55,'Casa',3,3,1,2,0,'El Cristal',2214,26,'2015-12-10'),(153,'SIV-151123-5388',130700600,4.8,-72.26666667,'Casa',3,6,1,2,0,'La Esperanza',2737,26,'2015-11-24'),(154,'SIV-151123-5389',79389750,5,-72.71666667,'Casa',1,2,1,2,0,'Libertadores',3171,26,'2015-11-24'),(155,'SIV-151124-5403',136917000,6.983333333,-73.05,'Casa',2,3,0,3,0,'Villa Nueva Del Campo',2863,21,'2015-11-26'),(156,'SIV-151124-5433',453800000,7.1,-73.1,'Casa',3,6,1,4,0,'San Francisco',2321,21,'2016-01-07'),(157,'SIV-151124-5446',1539963300,4.65,-73.45,'lote',0,0,0,0,0,'Vereda Sardinata',2943,16,'2015-11-27'),(158,'SIV-151126-5399',180509120,6.983333333,-73.1,'Apartamento',2,3,1,4,66.88,'Rio Frio',2544,21,'2015-11-24'),(159,'SIV-151126-5494',591386013,4.75,-74.05,'Apartamento',3,3,2,4,121.7,'Gilmar',2310,3,'2015-02-02'),(160,'SIV-151205-5777',242212500,4.133333333,-73.61666667,'Casa',4,6,0,3,0,'Nuevo Ricaurte',3272,16,'2015-12-14'),(161,'SIV-151205-5779',131730000,4,-73.73333333,'Casa',2,3,0,2,0,'El Bambu',2205,16,'2015-12-10'),(162,'AV 160308-7956',453039200,4.6,-74,'Apartamento',2,3,2,4,82.55,'Rincon Del Chico',2310,3,'2014-12-03'),(163,'AV 160308-7957',306444000,4.616666667,-74.03333333,'Apartamento',2,3,1,4,70.84,'Ciudad Salitre',2310,3,'2014-12-03'),(164,'AV 160309-7969',65754000,4.666666667,-74.1,'Apartamento',1,2,0,3,39.02,'Villa Gladys',2310,3,'2014-12-03'),(166,'AV 160309-7972 ',183634800,4.633333333,-74.06666667,'Apartamento',2,3,1,3,61.24,'El Vergel',2310,3,'2014-12-04'),(167,'AV 160309-7976',375232000,4.716666667,-74.03333333,'Apartamento',2,2,2,4,76.28,'Los Cedros',2310,3,'2014-12-04'),(168,'AV 160309-7980 ',726430000,4.7,-74.05,'Apartamento',3,2,2,6,95.21,'Santa Bibiana',2310,3,'2014-12-04'),(169,'AV 160309-7984',744739830,4.683333333,-74.05,'Apartamento',4,3,2,6,120.42,'San Patricio',2310,3,'2014-12-04'),(170,'AV 160309-8024',434827600,4.716666667,-74.03333333,'Apartamento',3,3,2,4,89.78,'Los Cedros',2310,3,'2014-12-05'),(171,'AV 160309-8025',187677000,4.733333333,-74.03333333,'Apartamento',2,3,1,4,69.51,'El Toberin',2310,3,'2014-12-04'),(172,'AV 160310-8041',138455500,4.583333333,-74.11666667,'Apartamento',1,3,0,3,60.95,'Tunjuelito',2310,3,'2014-12-04'),(173,'AV 160310-8065 ',178451400,4.733333333,-74.06666667,'Apartamento',2,3,1,3,50.41,'El Plan',2310,3,'2014-12-04'),(174,'5433',453800000,6.666666667,-73.3,'Casa',3,6,1,4,0,'San Francisco',2321,21,'2016-01-07'),(175,'5434',83210000,6.45,-73.25,'Casa',2,3,0,3,53,'Villa Enmanuel',3123,21,'2015-11-27'),(176,'5441',211856850,7.1,-73.11666667,'Apartamento',3,2,1,4,62.55,'Ciudadela Real De Minas',2321,21,'2015-11-26'),(177,'5476',83721600,6.983333333,-73.03333333,'Casa',1,2,0,2,45.6,'Cabecera Del Llano',2863,21,'2015-11-26'),(178,'5489',154087920,7.1,-73.1,'Apartamento',2,2,0,4,54.18,'Antonia Santos',2321,21,'2015-11-26'),(179,'5553',1277178697,6.066666667,-73.78333333,'Casa',4,4,0,0,0,'Vereda Cobaplata',2315,21,'2015-11-30'),(180,'5555',512500000,4.1,-73.65,'Casa',6,4,1,3,0,'San Benito',3272,16,'2015-12-07'),(181,'5563',274250192,4.133333333,-73.6,'Casa',4,4,1,3,115.35,'Santa Clara',3272,16,'2015-12-03'),(182,'5571',136205348,6.3,-73.95,'Casa',1,3,0,3,98.91,'El Centro',2417,21,'2015-12-02'),(183,'5574',85145800,1.133333333,-71.1,'Casa',3,3,1,2,0,'11 De Noviembre',2705,29,'2015-12-23'),(184,'5689',72658320,7.016666667,-73.08333333,'Apartamento',1,1,0,3,28.36,'Casco Antiguo',2544,21,'2015-12-03'),(185,'5702',264086000,5.35,-72.58333333,'Casa',4,5,0,3,0,'Carlos Pizarro',2214,26,'2015-12-10'),(186,'5703',1926021600,6.9,-71.88333333,'Casa',1,2,0,2,0,'Satoca',3099,25,'2015-12-04'),(187,'5763',523856250,7.083333333,-73.03333333,'Apartamento',2,3,2,5,112.5,'El Tejar',2321,21,'2015-12-10'),(188,'5775',108236850,4.85,-75.61666667,'Apartamento',1,3,0,3,52.67,'Frailes',2484,20,'2019-05-15'),(189,'5776',186734590,6.383333333,-73.88333333,'Casa',3,4,0,3,0,'Villa Mallorca',2544,21,'2015-12-09'),(190,'5850',230556999,7.033333333,-73.16666667,'Apartamento',2,3,1,4,75.1,'Diamante Ii',2321,21,'2015-12-09'),(191,'5866',136791500,7.116666667,-73.11666667,'Apartamento',2,2,1,4,46.37,'Alarcon',2321,21,'2015-12-09'),(192,'5922',87110610,5.166666667,-72.53333333,'Casa',1,2,1,1,0,'Villa Luz',2214,26,'2015-12-20'),(193,'5959',546008367,4.733333333,-74,'Casa',4,4,2,4,130.26,'Victoria Norte',2310,3,'2018-06-21'),(194,'6000',140627600,7,-73.18333333,'Apartamento',2,3,1,3,58.84,'Torres De Castilla',2576,21,'2015-12-15'),(195,'6107',87802000,6.033333333,-73.41666667,'lote',0,0,0,0,0,'Potrero Grande',2407,5,'2015-12-21'),(196,'6119',147060000,6.3,-73.95,'Casa',4,4,0,2,0,'Estadio',2417,21,'2015-12-28'),(197,'6120',73325000,6.3,-73.93333333,'Casa',1,2,1,1,0,'Lagos Segunda Etapa',2417,21,'2015-12-28'),(198,'6124',4977114340,4.666666667,-73.13333333,'lote',0,0,0,0,0,'Naguaya',2848,11,'2015-12-26'),(199,'6125',310580000,6.283333333,-73.25,'Casa',3,5,0,3,0,'Chiquinquira',3123,21,'2015-12-23'),(200,'6126',120265800,4.916666667,-72.35,'Casa',2,3,0,2,0,'Villa Dully',2737,26,'2015-12-23'),(201,'6128',120265800,4.916666667,-72.35,'Casa',2,3,0,2,0,'Villa Dully',2737,26,'2015-12-28'),(202,'6139',100846890,4.55,-74.38333333,'Apartamento',2,3,0,3,46.71,'El Salado',2630,23,'2015-12-28'),(203,'6158',2901295680,2.583333333,-72.66666667,'lote',0,0,0,0,0,'Hato Aguas Claras, Vda Salitre',2901,16,'2015-12-30'),(204,'SIV-220725-61030',407575520,4.1,-73.65,'Apartamento',2,2,1,3,58.72,'Prado Veraniego Norte',2310,3,'2022-08-03'),(205,'SIV-220725-61032',124867800,3.45,-76.51666667,'Casa',2,3,1,2,0,'Villa Haydi',2581,16,'2022-07-29'),(206,'SIV-220725-61033',152830000,4.233333333,-74.98333333,'Apartamento',1,1,0,3,29,'Prado Veraniego Norte',2310,3,'2022-07-29'),(209,'SIV-220725-61037',295814200,7.016666667,-73.11666667,'Apartamento',2,3,1,3,64.9,'Aranzoque',2544,21,'2022-07-29'),(210,'SIV-220725-61041',595504000,4.716666667,-74.05,'Apartamento',2,3,1,5,81.8,'Santa Helena',2310,3,'2022-07-27'),(211,'SIV-220725-61042',136513440,4.633333333,-74.11666667,'Apartamento',1,2,0,3,36,'Madelena',2310,3,'2022-07-29'),(212,'SIV-220725-61044',1003873000,4.683333333,-74.08333333,'Apartamento',3,3,2,6,122.2,'Antiguo Country',2310,3,'2022-07-29'),(213,'SIV-220725-61045',493528844,4.716666667,-74.05,'Apartamento',2,2,1,4,78.52,'Los Cedros',2310,3,'2022-07-29'),(214,'SIV-220725-61046',373286340,4.733333333,-74.05,'Casa',4,3,1,0,106.76,'Vereda Bojaca',2413,11,'2022-07-27');
/*!40000 ALTER TABLE `datos_valorar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departamentos`
--

DROP TABLE IF EXISTS `departamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `departamentos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `codigo` int NOT NULL,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departamentos`
--

LOCK TABLES `departamentos` WRITE;
/*!40000 ALTER TABLE `departamentos` DISABLE KEYS */;
INSERT INTO `departamentos` VALUES (1,5,'Antioquia',NULL,NULL),(2,8,'Atlántico',NULL,NULL),(3,11,'Bogotá, d.c.',NULL,NULL),(4,13,'Bolívar',NULL,NULL),(5,15,'Boyacá',NULL,NULL),(6,17,'Caldas',NULL,NULL),(7,18,'Caquetá',NULL,NULL),(8,19,'Cauca',NULL,NULL),(9,20,'Cesar',NULL,NULL),(10,23,'Córdoba',NULL,NULL),(11,25,'Cundinamarca',NULL,NULL),(12,27,'Chocó',NULL,NULL),(13,41,'Huila',NULL,NULL),(14,44,'La guajira',NULL,NULL),(15,47,'Magdalena',NULL,NULL),(16,50,'Meta',NULL,NULL),(17,52,'Nariño',NULL,NULL),(18,54,'Norte de santander',NULL,NULL),(19,63,'Quindio',NULL,NULL),(20,66,'Risaralda',NULL,NULL),(21,68,'Santander',NULL,NULL),(22,70,'Sucre',NULL,NULL),(23,73,'Tolima',NULL,NULL),(24,76,'Valle del cauca',NULL,NULL),(25,81,'Arauca',NULL,NULL),(26,85,'Casanare',NULL,NULL),(27,86,'Putumayo',NULL,NULL),(28,88,'San andrés, providencia y santa catalina',NULL,'2023-01-05 09:00:39'),(29,91,'Amazonas',NULL,NULL),(30,94,'Guainía',NULL,NULL),(31,95,'Guaviare',NULL,NULL),(32,97,'Vaupés',NULL,NULL),(33,99,'Vichada',NULL,NULL);
/*!40000 ALTER TABLE `departamentos` ENABLE KEYS */;
UNLOCK TABLES;


--
-- Table structure for table `juridica`
--

DROP TABLE IF EXISTS `juridica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `juridica` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  -- `inmueble_id` bigint unsigned NOT NULL,
  `detalle_ubicacion_id` bigint unsigned DEFAULT NULL,
  `detalle_ubicacion_inmueble_id` bigint unsigned DEFAULT NULL,
  `propietario` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detalle_uso_id` bigint unsigned DEFAULT NULL,
  `detalle_clase_id` bigint unsigned DEFAULT NULL,
  `m_inmib_ppal_1` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_inmib_ppal_2` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_inmib_ppal_3` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_inmib_gj_1` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_inmib_gj_2` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_inmib_gj_3` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_inmib_dp_1` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_inmib_dp_2` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_inmib_dp_3` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero_escritura` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero_notaria` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `departamento_notaria_id` bigint unsigned DEFAULT NULL,
  `chip_ced_castas` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expedicion_escritura` date DEFAULT NULL,
  `licencia_construccion` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
  -- KEY `inmueble_id` (`inmueble_id`),
  -- CONSTRAINT `juridica_ibfk_1` FOREIGN KEY (`inmueble_id`) REFERENCES `inmuebles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Table structure for table `sector`
--

DROP TABLE IF EXISTS `sector`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sector` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  -- `inmueble_id` bigint unsigned NOT NULL,
  `estrato` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `legalidad` tinyint(1) DEFAULT NULL,
  `detalle_topografia_id` bigint unsigned DEFAULT NULL,
  `detalle_transporte_id` bigint unsigned DEFAULT NULL,
  `detalle_uso_predominante_id` bigint unsigned DEFAULT NULL,
  `detalle_servicios_sector` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `detalle_vias_acceso` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `detalle_estado_vias_acceso_id` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `detalle_amoblamiento_urbano` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `perspectivas_valorizacion` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
  -- KEY `inmueble_id` (`inmueble_id`),
  -- CONSTRAINT `sector_ibfk_1` FOREIGN KEY (`inmueble_id`) REFERENCES `inmuebles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;




--
-- Table structure for table `detalles`
--

DROP TABLE IF EXISTS `detalles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detalles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `variable_numeracion` bigint unsigned DEFAULT NULL,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `detalles_variable_numeracion_foreign` (`variable_numeracion`) USING BTREE,
  CONSTRAINT `detalles_variable_id_foreign` FOREIGN KEY (`variable_numeracion`) REFERENCES `variables` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=201 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalles`
--

LOCK TABLES `detalles` WRITE;
/*!40000 ALTER TABLE `detalles` DISABLE KEYS */;
INSERT INTO `detalles` VALUES (1,1,'Turismo',NULL,'2023-01-06 10:18:48'),(2,1,'Comercio',NULL,NULL),(3,1,'Vivienda',NULL,NULL),(4,1,'Industrial',NULL,NULL),(5,1,'Institucional',NULL,NULL),(6,1,'Mixto',NULL,NULL),(7,2,'Terminada',NULL,NULL),(8,2,'Sin Terminar',NULL,NULL),(9,2,'Remodelado',NULL,NULL),(11,3,'Cédula',NULL,NULL),(12,3,'Pasaporte',NULL,NULL),(13,3,'NIT',NULL,NULL),(14,3,'RUT',NULL,NULL),(15,4,'Casa Urbana',NULL,'2023-02-24 18:34:27'),(16,4,'Apartamento',NULL,NULL),(17,4,'Finca',NULL,NULL),(18,4,'Bodega Urbana',NULL,'2023-02-24 18:35:26'),(24,5,'Excelente','2023-01-07 21:16:42','2023-01-07 21:16:42'),(27,5,'Muy bueno','2023-01-07 21:38:47','2023-01-07 21:38:47'),(28,5,'Bueno','2023-01-07 21:40:10','2023-01-07 21:40:10'),(29,5,'Regular','2023-01-07 21:44:38','2023-01-07 21:44:38'),(37,3,'Licencia','2023-01-07 22:03:54','2023-01-07 22:03:54'),(38,6,'Nacional','2023-01-07 22:04:35','2023-01-07 22:04:35'),(39,6,'Departamental','2023-01-07 22:05:09','2023-01-07 22:05:09'),(42,5,'Malo','2023-01-07 22:53:31','2023-01-07 22:53:31'),(51,1,'Recreacional','2023-01-07 23:50:42','2023-01-07 23:50:42'),(52,6,'Municipal','2023-01-07 23:51:00','2023-01-07 23:51:00'),(53,2,'En Obra','2023-01-07 23:51:32','2023-02-24 18:20:17'),(63,2,'Usada','2023-01-08 00:25:46','2023-01-08 00:25:46'),(64,4,'Parqueadero','2023-01-08 00:26:08','2023-01-08 00:26:08'),(72,4,'Galpon','2023-01-08 01:30:17','2023-01-08 01:30:17'),(79,6,'Veredal','2023-01-08 02:14:41','2023-01-08 07:55:05'),(82,6,'caminos','2023-01-08 07:54:54','2023-01-08 07:54:54'),(83,7,'Pavimentada','2023-01-12 04:17:25','2023-01-12 04:17:25'),(84,7,'Destapada','2023-01-12 04:17:41','2023-01-12 04:17:41'),(85,7,'callejuela','2023-01-12 04:17:49','2023-01-12 04:17:49'),(86,8,'Escritura Pública\r\n','2023-02-24 04:15:26','2023-02-24 04:15:26'),(87,8,'C. T. L.','2023-02-24 04:16:02','2023-02-24 04:16:02'),(88,8,'Licencia','2023-02-24 04:16:30','2023-02-24 04:16:43'),(89,8,'Planos','2023-02-24 04:16:50','2023-02-24 04:16:50'),(90,2,'Nueva','2023-02-24 18:20:39','2023-02-24 18:20:39'),(91,8,'R. P. H.','2023-02-24 18:23:55','2023-02-24 18:23:55'),(92,8,'Otro','2023-02-24 18:24:13','2023-02-24 18:24:13'),(93,9,'Acueducto','2023-02-24 18:26:18','2023-02-24 18:26:18'),(94,9,'Alcantarillado','2023-02-24 18:26:25','2023-02-24 18:26:25'),(95,9,'Energia Eléctrica','2023-02-24 18:26:43','2023-02-24 18:26:43'),(96,9,'Gas Natural','2023-02-24 18:26:52','2023-02-24 18:26:52'),(97,9,'Telefonía','2023-02-24 18:26:57','2023-02-24 18:26:57'),(98,10,'Acueducto','2023-02-24 18:28:50','2023-02-24 18:28:50'),(99,10,'Energia Eléctrica','2023-02-24 18:28:58','2023-02-24 18:28:58'),(100,10,'Gas Natural','2023-02-24 18:29:08','2023-02-24 18:29:08'),(101,11,'1','2023-02-24 18:31:24','2023-02-24 18:31:24'),(102,11,'2','2023-02-24 18:31:27','2023-02-24 18:31:27'),(103,11,'3','2023-02-24 18:31:30','2023-02-24 18:31:30'),(104,11,'4','2023-02-24 18:31:32','2023-02-24 18:31:32'),(105,11,'5','2023-02-24 18:31:35','2023-02-24 18:31:35'),(106,11,'6','2023-02-24 18:31:37','2023-02-24 18:31:37'),(107,11,'No Aplica','2023-02-24 18:31:46','2023-02-24 18:31:46'),(108,12,'Plana','2023-02-24 18:32:56','2023-02-24 18:32:56'),(109,12,'Ligera','2023-02-24 18:33:10','2023-02-24 18:33:10'),(110,12,'Inclinada','2023-02-24 18:33:14','2023-02-24 18:33:14'),(111,12,'Accidentada','2023-02-24 18:33:20','2023-02-24 18:33:20'),(112,4,'Casa Rural','2023-02-24 18:34:34','2023-02-24 18:34:34'),(113,4,'Lote Urbano','2023-02-24 18:34:57','2023-02-24 18:34:57'),(114,4,'Lote Rural','2023-02-24 18:35:02','2023-02-24 18:35:02'),(115,4,'Bodega Rural','2023-02-24 18:35:33','2023-02-24 18:35:33'),(116,4,'Local','2023-02-24 18:35:47','2023-02-24 18:35:47'),(117,4,'Oficina','2023-02-24 18:36:11','2023-02-24 18:36:11'),(118,4,'Hotel','2023-02-24 18:36:16','2023-02-24 18:36:16'),(119,4,'Edificio','2023-02-24 18:36:23','2023-02-24 18:36:23'),(120,13,'Vvienda','2023-02-24 18:40:51','2023-02-24 18:40:51'),(121,13,'Comercio','2023-02-24 18:40:58','2023-02-24 18:40:58'),(122,13,'Bodega','2023-02-24 18:41:05','2023-02-24 18:41:05'),(123,13,'Oficina','2023-02-24 18:41:11','2023-02-24 18:41:11'),(124,13,'Vivienda Multifuncional','2023-02-24 18:41:23','2023-02-24 18:41:23'),(125,13,'Educación','2023-02-24 18:41:39','2023-02-24 18:41:39'),(126,13,'Salud','2023-02-24 18:41:44','2023-02-24 18:41:44'),(127,13,'Hotelero','2023-02-24 18:41:51','2023-02-24 18:41:51'),(128,13,'Industrial','2023-02-24 18:41:57','2023-02-24 18:41:57'),(129,13,'Iglesia','2023-02-24 18:42:03','2023-02-24 18:42:03'),(130,13,'Parqueadero','2023-02-24 18:42:14','2023-02-24 18:42:14'),(131,13,'Auditorio','2023-02-24 18:42:21','2023-02-24 18:42:21'),(132,13,'Instalación Deportiva','2023-02-24 18:42:34','2023-02-24 18:42:34'),(133,13,'Otro','2023-02-24 18:42:39','2023-02-24 18:42:39'),(134,14,'Porteria','2023-02-24 18:43:49','2023-02-24 18:43:49'),(135,14,'Juego de Niños','2023-02-24 18:43:56','2023-02-24 18:43:56'),(136,14,'Citofono','2023-02-24 18:44:02','2023-02-24 18:44:02'),(137,14,'Cancha Multif.','2023-02-24 18:44:11','2023-02-24 18:44:11'),(138,14,'Golfito','2023-02-24 18:44:17','2023-02-24 18:44:17'),(139,14,'Salón Comunal','2023-02-24 18:44:26','2023-02-24 18:44:26'),(140,14,'Bicicletero','2023-02-24 18:44:46','2023-02-24 18:44:46'),(141,14,'Bomba Eyectora','2023-02-24 18:44:59','2023-02-24 18:44:59'),(142,14,'Shut de Basuras','2023-02-24 18:45:07','2023-02-24 18:45:07'),(143,14,'Piscina','2023-02-24 18:45:13','2023-02-24 18:45:13'),(144,14,'Tanque Agua','2023-02-24 18:45:21','2023-02-24 18:45:21'),(145,14,'C. de Squash','2023-02-24 18:45:30','2023-02-24 18:45:30'),(146,14,'Planta Eléctrica','2023-02-24 18:46:10','2023-02-24 18:46:10'),(147,14,'Club-House','2023-02-24 18:46:22','2023-02-24 18:46:22'),(148,14,'Hidroflow','2023-02-24 18:46:36','2023-02-24 18:46:36'),(149,14,'Aire Ac. Central','2023-02-24 18:46:46','2023-02-24 18:46:46'),(150,14,'Zonas Verdes','2023-02-24 18:46:55','2023-02-24 18:46:55'),(151,14,'Parq. Visitantes','2023-02-24 18:47:14','2023-02-24 18:47:14'),(152,14,'Gimnasio','2023-02-24 18:47:23','2023-02-24 18:47:23'),(153,14,'Ascensor','2023-02-24 18:47:30','2023-02-24 18:47:30'),(157,14,'Otros','2023-02-24 18:52:23','2023-02-24 18:52:23'),(158,15,'Asignado',NULL,NULL),(159,15,'Devuelto',NULL,NULL),(160,15,'Visita Programada',NULL,NULL),(161,15,'Visitado',NULL,NULL),(162,15,'Reprogramar',NULL,NULL),(163,15,'Novedades',NULL,NULL),(164,15,'Terminado',NULL,NULL),(181,14,'C.C. TV',NULL,NULL),(182,16,'Bancoldex',NULL,NULL),(183,16,'Finagro',NULL,NULL),(184,16,'Linea Comercial',NULL,NULL),(185,16,'Linea Dación en Pago',NULL,NULL),(186,16,'Linea Hipotecario',NULL,NULL),(187,16,'Linea Leasing de Mejoras',NULL,NULL),(188,16,'Linea Leasing Habitacional',NULL,NULL),(189,16,'Linea Leasing Inmobiliario',NULL,NULL),(190,16,'Linea Remate',NULL,NULL),(191,16,'Vivienda',NULL,NULL),(192,17,'Paramo',NULL,NULL),(193,17,'Desierto',NULL,NULL),(194,18,'De Lujo',NULL,NULL),(195,18,'De Primera',NULL,NULL),(196,18,'Alta',NULL,NULL),(197,18,'Media-Alta',NULL,NULL),(198,18,'Media',NULL,NULL),(199,18,'Economica',NULL,NULL),(200,18,'Baja',NULL,NULL);
/*!40000 ALTER TABLE `detalles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documentos`
--

DROP TABLE IF EXISTS `documentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `documentos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `radicado_id` bigint unsigned DEFAULT NULL,
  `inmueble_id` bigint unsigned DEFAULT NULL,
  `nombre` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_imagen` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `tipo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `documentos_radicado_id_foreign` (`radicado_id`),
  CONSTRAINT `documentos_radicado_id_foreign` FOREIGN KEY (`radicado_id`) REFERENCES `radicados` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documentos`
--

LOCK TABLES `documentos` WRITE;
/*!40000 ALTER TABLE `documentos` DISABLE KEYS */;
/*!40000 ALTER TABLE `documentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inmuebles`
--

DROP TABLE IF EXISTS `inmuebles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `inmuebles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `avaluo_id` bigint unsigned NOT NULL,
  `sector_id` bigint unsigned NOT NULL,
  `juridica_id` bigint unsigned DEFAULT NULL,
  `sometido` tinyint(1) DEFAULT NULL,
  `direccion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `barrio` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `zona` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nombre_conjunto` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `montaje` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `numero_pisos` tinyint unsigned DEFAULT NULL,
  `numero_sotanos` tinyint unsigned DEFAULT NULL,
  `vetustez` double DEFAULT NULL,
  `atendido_por` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `telefono` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `area` double DEFAULT NULL,
  `frente` double DEFAULT NULL,
  `fondo` double DEFAULT NULL,
  `estrato` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `observaciones` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sistema_coordenadas` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `latitud` double NOT NULL,
  `longitud` double NOT NULL,
  `ano_construccion` date DEFAULT NULL,
  `vida_util` tinyint unsigned DEFAULT NULL,
  `vida_remanente` tinyint unsigned DEFAULT NULL,
  `detalle_estado_conservacion_id` tinyint unsigned DEFAULT NULL,
  `detalle_estado_construccion_id` bigint unsigned DEFAULT NULL,
  `detalle_irregularidad_planta_id` bigint unsigned DEFAULT NULL,
  `detalle_irregularidad_altura_id` bigint unsigned DEFAULT NULL,
  `detalle_danos_previos_id` bigint unsigned DEFAULT NULL,
  `detalle_reparados_id` bigint unsigned DEFAULT NULL,
  `detalle_estructura_id` bigint unsigned DEFAULT NULL,
  `detalle_fachada_id` bigint unsigned DEFAULT NULL,
  `detalle_cubierta_id` bigint unsigned DEFAULT NULL,
  `detalle_iluminacion_id` bigint unsigned DEFAULT NULL,
  `detalle_ventilacion_id` bigint unsigned DEFAULT NULL,
  `observaciones_dependencias` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `detalle_estado_pisos_id` bigint unsigned DEFAULT NULL,
  `detalle_estado_muros_id` bigint unsigned DEFAULT NULL,
  `detalle_estado_techos_id` bigint unsigned DEFAULT NULL,
  `detalle_estado_carpinteria_metal_id` bigint unsigned DEFAULT NULL,
  `detalle_estado_carpinteria_mandera_id` bigint unsigned DEFAULT NULL,
  `detalle_estado_banos_id` bigint unsigned DEFAULT NULL,
  `detalle_estado_cocina_id` bigint unsigned DEFAULT NULL,
  `detalle_calidad_pisos_id` bigint unsigned DEFAULT NULL,
  `detalle_calidad_muros_id` bigint unsigned DEFAULT NULL,
  `detalle_calidad_techos_id` bigint unsigned DEFAULT NULL,
  `detalle_calidad_carpinteria_metal_id` bigint unsigned DEFAULT NULL,
  `detalle_calidad_carpinteria_mandera_id` bigint unsigned DEFAULT NULL,
  `detalle_calidad_banos_id` bigint unsigned DEFAULT NULL,
  `detalle_calidad_cocina_id` bigint unsigned DEFAULT NULL,
  
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  -- `dependencia_id` bigint DEFAULT NULL,
  -- `propiedad_horizontal_id` bigint DEFAULT NULL,
  
  `detalle_documentos_suministrados` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `detalle_servicios_predio` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `detalle_servicios_contador` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `detalle_topografia` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `detalle_tipo_inmueble` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `detalle_uso_actual` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `detalle_estado_construccion` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `detalle_dotacion_comunal` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `avaluo_id` (`avaluo_id`),
   KEY `sector_id` (`sector_id`),
   KEY `juridica_id` (`juridica_id`),
  -- KEY `inmuebles_ibfk_4` (`propiedad_horizontal_id`),
 FOREIGN KEY (`avaluo_id`) REFERENCES `avaluos` (`id`),
  -- CONSTRAINT `inmuebles_ibfk_3` FOREIGN KEY (`dependencia_id`) REFERENCES `dependencias` (`id`),
  -- CONSTRAINT `inmuebles_ibfk_4` FOREIGN KEY (`propiedad_horizontal_id`) REFERENCES `propiedad_horizontal` (`id`),
  FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`),
  FOREIGN KEY (`juridica_id`) REFERENCES `juridica` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inmuebles`
--

LOCK TABLES `inmuebles` WRITE;
/*!40000 ALTER TABLE `inmuebles` DISABLE KEYS */;
-- INSERT INTO `inmuebles` VALUES (4,'calle carrera',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'william','123123',NULL,NULL,NULL,NULL,NULL,NULL,6.619593136373065,-73.95223617553712,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2023-04-29 22:28:00',4,4,51,'87','94','99',NULL,NULL,NULL,NULL,'153');
/*!40000 ALTER TABLE `inmuebles` ENABLE KEYS */;
UNLOCK TABLES;


--
-- Table structure for table `dependencias`
--

DROP TABLE IF EXISTS `dependencias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dependencias` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `inmueble_id` bigint unsigned DEFAULT NULL,
  `salas` int DEFAULT NULL,
  `salas_area` float DEFAULT NULL,
  `detalle_acabados_salas_id` tinyint unsigned DEFAULT NULL,
  `comedores` int DEFAULT NULL,
  `comedores_area` float DEFAULT NULL,
  `detalle_acabados_comedores_id` tinyint unsigned DEFAULT NULL,
  `estudios` int DEFAULT NULL,
  `estudios_area` float DEFAULT NULL,
  `detalle_acabados_estudios_id` tinyint unsigned DEFAULT NULL,
  `banos_sociales` int DEFAULT NULL,
  `banos_sociales_area` float DEFAULT NULL,
  `detalle_acabados_banos_sociales_id` tinyint unsigned DEFAULT NULL,
  `star_habitaciones` int DEFAULT NULL,
  `star_habitaciones_area` float DEFAULT NULL,
  `detalle_acabados_star_habitaciones_id` tinyint unsigned DEFAULT NULL,
  `habitaciones` int DEFAULT NULL,
  `habitaciones_area` float DEFAULT NULL,
  `detalle_acabados_habitaciones_id` tinyint unsigned DEFAULT NULL,
  `banos_privados` int DEFAULT NULL,
  `banos_privados_area` float DEFAULT NULL,
  `detalle_acabados_banos_privados_id` tinyint unsigned DEFAULT NULL,
  `cocinas` int DEFAULT NULL,
  `cocinas_area` float DEFAULT NULL,
  `detalle_acabados_cocinas_id` tinyint unsigned DEFAULT NULL,
  `cuartos_servicio` int DEFAULT NULL,
  `cuartos_servicio_area` float DEFAULT NULL,
  `detalle_acabados_cuartos_servicio_id` tinyint unsigned DEFAULT NULL,
  `banos_servicio` int DEFAULT NULL,
  `banos_servicio_area` float DEFAULT NULL,
  `detalle_acabados_banos_servicio_id` tinyint unsigned DEFAULT NULL,
  `patios_ropas` int DEFAULT NULL,
  `patios_ropas_area` float DEFAULT NULL,
  `detalle_acabados_patios_ropas_id` tinyint unsigned DEFAULT NULL,
  `terrazas` int DEFAULT NULL,
  `terrazas_area` float DEFAULT NULL,
  `detalle_acabados_terrazas_id` tinyint unsigned DEFAULT NULL,
  `jardines` int DEFAULT NULL,
  `jardines_area` float DEFAULT NULL,
  `balcones` int DEFAULT NULL,
  `balcones_area` float DEFAULT NULL,
  `detalle_acabados_balcones_id` tinyint unsigned DEFAULT NULL,
  `patio_interior` int DEFAULT NULL,
  `patio_interior_area` float DEFAULT NULL,
  `detalle_acabados_patio_interior_id` tinyint unsigned DEFAULT NULL,
  `garajes` int DEFAULT NULL,
  `garajes_area` float DEFAULT NULL,
  `garajes_cubiertos` int DEFAULT NULL,
  `garajes_cubiertos_area` float DEFAULT NULL,
  `garajes_descubiertos` int DEFAULT NULL,
  `garajes_descubiertos_area` float DEFAULT NULL,
  `depositos` int DEFAULT NULL,
  `depositos_area` float DEFAULT NULL,
  `garajes_privados` int DEFAULT NULL,
  `garajes_privados_area` float DEFAULT NULL,
  `garajes_uso_exclusivo` int DEFAULT NULL,
  `garajes_uso_exclusivo_area` float DEFAULT NULL,
  `garajes_sencillo` int DEFAULT NULL,
  `garajes_sencillo_area` float DEFAULT NULL,
  `garajes_dobles` int DEFAULT NULL,
  `garajes_dobles_area` float DEFAULT NULL,
  `local` int DEFAULT NULL,
  `local_area` float DEFAULT NULL,
  `detalle_acabados_local_id` tinyint unsigned DEFAULT NULL,
  `bahia_comunal` int DEFAULT NULL,
  `bahia_comunal_area` float DEFAULT NULL,
  `oficina` int DEFAULT NULL,
  `oficina_area` float DEFAULT NULL,
  `detalle_acabados_oficina_id` tinyint unsigned DEFAULT NULL,
  `iluminacion` int DEFAULT NULL,
  `iluminacion_area` float DEFAULT NULL,
  `detalle_acabados_iluminacion_id` tinyint unsigned DEFAULT NULL,
  `ventilacion` int DEFAULT NULL,
  `ventilacion_area` float DEFAULT NULL,
  `detalle_acabados_ventilacion_id` tinyint unsigned DEFAULT NULL,
  `zonas_verdes` int DEFAULT NULL,
  `zonas_verdes_area` float DEFAULT NULL,
  `observaciones_dependencias` varchar(500) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`inmueble_id`) REFERENCES `inmuebles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (13,'2014_10_12_000000_create_users_table',1),(14,'2014_10_12_100000_create_password_resets_table',1),(15,'2019_08_19_000000_create_failed_jobs_table',1),(16,'2019_12_14_000001_create_personal_access_tokens_table',1),(17,'2022_12_30_193053_create_tipodocumentos_table',1),(18,'2022_12_30_194245_create_departamentos_table',1),(19,'2022_12_30_194437_create_municipios_table',1),(20,'2022_12_30_194955_create_tipo_inmuebles_table',1),(21,'2022_12_30_200245_create_contactos_table',1),(22,'2022_12_30_201448_create_personas_table',1),(23,'2022_12_30_202740_create_radicados_table',1),(24,'2022_12_31_001111_create_documentos_table',1),(28,'2023_01_06_014104_create_variables_table',2),(29,'2023_01_06_014417_create_detalles_table',2),(30,'2023_01_12_160643_create_formatos_table',3),(31,'2023_01_13_222353_create_avaluos_table',4),(32,'2023_01_17_151753_create_cargos_table',5),(34,'2023_01_17_152940_add_cargo_id_to_users_table',6),(36,'2023_01_19_232537_add_estado_to_radicados_table',7);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `municipios`
--

DROP TABLE IF EXISTS `municipios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `municipios` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `codigo` int NOT NULL,
  `nombre` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `departamento_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `municipios_departamento_id_foreign` (`departamento_id`),
  CONSTRAINT `municipios_departamento_id_foreign` FOREIGN KEY (`departamento_id`) REFERENCES `departamentos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3304 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `municipios`
--

LOCK TABLES `municipios` WRITE;
/*!40000 ALTER TABLE `municipios` DISABLE KEYS */;
INSERT INTO `municipios` VALUES (2204,1,'Abriaquí',1,NULL,'2023-01-05 18:16:48'),(2205,2,'Acacías',16,NULL,NULL),(2206,3,'Acandí',12,NULL,NULL),(2207,4,'Acevedo',13,NULL,NULL),(2208,5,'Achí',4,NULL,NULL),(2209,6,'Agrado',13,NULL,NULL),(2210,7,'Agua de Dios',11,NULL,NULL),(2211,8,'Aguachica',9,NULL,NULL),(2212,9,'Aguada',21,NULL,NULL),(2213,10,'Aguadas',6,NULL,NULL),(2214,11,'Aguazul',26,NULL,NULL),(2215,12,'Agustín Codazzi',9,NULL,NULL),(2216,13,'Aipe',13,NULL,NULL),(2217,14,'Albania',7,NULL,NULL),(2218,15,'Albania',14,NULL,NULL),(2219,16,'Albania',21,NULL,NULL),(2220,17,'Albán',11,NULL,NULL),(2221,18,'Albán (San José)',17,NULL,NULL),(2222,19,'Alcalá',16,NULL,NULL),(2223,20,'Alejandria',1,NULL,NULL),(2224,21,'Algarrobo',15,NULL,NULL),(2225,22,'Algeciras',13,NULL,NULL),(2226,23,'Almaguer',8,NULL,NULL),(2227,24,'Almeida',5,NULL,NULL),(2228,25,'Alpujarra',23,NULL,NULL),(2229,26,'Altamira',13,NULL,NULL),(2230,27,'Alto Baudó (Pie de Pato)',12,NULL,NULL),(2231,28,'Altos del Rosario',4,NULL,NULL),(2232,29,'Alvarado',23,NULL,NULL),(2233,30,'Amagá',1,NULL,NULL),(2234,31,'Amalfi',1,NULL,NULL),(2235,32,'Ambalema',23,NULL,NULL),(2236,33,'Anapoima',11,NULL,NULL),(2237,34,'Ancuya',17,NULL,NULL),(2238,35,'Andalucía',24,NULL,NULL),(2239,36,'Andes',1,NULL,NULL),(2240,37,'Angelópolis',1,NULL,NULL),(2241,38,'Angostura',1,NULL,NULL),(2242,39,'Anolaima',11,NULL,NULL),(2243,40,'Anorí',1,NULL,NULL),(2244,41,'Anserma',6,NULL,NULL),(2245,42,'Ansermanuevo',24,NULL,NULL),(2246,43,'Anzoátegui',23,NULL,NULL),(2247,44,'Anzá',1,NULL,NULL),(2248,45,'Apartadó',1,NULL,NULL),(2249,46,'Apulo',11,NULL,NULL),(2250,47,'Apía',20,NULL,NULL),(2251,48,'Aquitania',5,NULL,NULL),(2252,49,'Aracataca',15,NULL,NULL),(2253,50,'Aranzazu',6,NULL,NULL),(2254,51,'Aratoca',21,NULL,NULL),(2255,52,'Arauca',25,NULL,NULL),(2256,53,'Arauquita',25,NULL,NULL),(2257,54,'Arbeláez',11,NULL,NULL),(2258,55,'Arboleda (Berruecos)',17,NULL,NULL),(2259,56,'Arboledas',18,NULL,NULL),(2260,57,'Arboletes',1,NULL,NULL),(2261,58,'Arcabuco',5,NULL,NULL),(2262,59,'Arenal',4,NULL,NULL),(2263,60,'Argelia',1,NULL,NULL),(2264,61,'Argelia',8,NULL,NULL),(2265,62,'Argelia',24,NULL,NULL),(2266,63,'Ariguaní (El Difícil)',15,NULL,NULL),(2267,64,'Arjona',4,NULL,NULL),(2268,65,'Armenia',1,NULL,NULL),(2269,66,'Armenia',19,NULL,NULL),(2270,67,'Armero (Guayabal)',23,NULL,NULL),(2271,68,'Arroyohondo',4,NULL,NULL),(2272,69,'Astrea',10,NULL,NULL),(2273,70,'Ataco',23,NULL,NULL),(2274,71,'Atrato (Yuto)',12,NULL,NULL),(2275,72,'Ayapel',10,NULL,NULL),(2276,73,'Bagadó',12,NULL,NULL),(2277,74,'Bahía Solano (Mútis)',12,NULL,NULL),(2278,75,'Bajo Baudó (Pizarro)',12,NULL,NULL),(2279,76,'Balboa',8,NULL,NULL),(2280,77,'Balboa',20,NULL,NULL),(2281,78,'Baranoa',2,NULL,NULL),(2282,79,'Baraya',13,NULL,NULL),(2283,80,'Barbacoas',17,NULL,NULL),(2284,81,'Barbosa',1,NULL,NULL),(2285,82,'Barbosa',21,NULL,NULL),(2286,83,'Barichara',21,NULL,NULL),(2287,84,'Barranca de Upía',16,NULL,NULL),(2288,85,'Barrancabermeja',21,NULL,NULL),(2289,86,'Barrancas',14,NULL,NULL),(2290,87,'Barranco de Loba',4,NULL,NULL),(2291,88,'Barranquilla',2,NULL,NULL),(2292,89,'Becerríl',9,NULL,NULL),(2293,90,'Belalcázar',6,NULL,NULL),(2294,91,'Bello',1,NULL,NULL),(2295,92,'Belmira',1,NULL,NULL),(2296,93,'Beltrán',11,NULL,NULL),(2297,94,'Belén',5,NULL,NULL),(2298,95,'Belén',17,NULL,NULL),(2299,96,'Belén de Bajirá',12,NULL,NULL),(2300,97,'Belén de Umbría',20,NULL,NULL),(2301,98,'Belén de los Andaquíes',7,NULL,NULL),(2302,99,'Berbeo',5,NULL,NULL),(2303,100,'Betania',1,NULL,NULL),(2304,101,'Beteitiva',5,NULL,NULL),(2305,102,'Betulia',1,NULL,NULL),(2306,103,'Betulia',21,NULL,NULL),(2307,104,'Bituima',11,NULL,NULL),(2308,105,'Boavita',5,NULL,NULL),(2309,106,'Bochalema',18,NULL,NULL),(2310,107,'Bogotá D.C.',3,NULL,NULL),(2311,108,'Bojacá',11,NULL,NULL),(2312,109,'Bojayá (Bellavista)',12,NULL,NULL),(2313,110,'Bolívar',1,NULL,NULL),(2314,111,'Bolívar',8,NULL,NULL),(2315,112,'Bolívar',21,NULL,NULL),(2316,113,'Bolívar',24,NULL,NULL),(2317,114,'Bosconia',9,NULL,NULL),(2318,115,'Boyacá',5,NULL,NULL),(2319,116,'Briceño',1,NULL,NULL),(2320,117,'Briceño',5,NULL,NULL),(2321,118,'Bucaramanga',21,NULL,NULL),(2322,119,'Bucarasica',18,NULL,NULL),(2323,120,'Buenaventura',24,NULL,NULL),(2324,121,'Buenavista',5,NULL,NULL),(2325,122,'Buenavista',10,NULL,NULL),(2326,123,'Buenavista',19,NULL,NULL),(2327,124,'Buenavista',22,NULL,NULL),(2328,125,'Buenos Aires',8,NULL,NULL),(2329,126,'Buesaco',17,NULL,NULL),(2330,127,'Buga',24,NULL,NULL),(2331,128,'Bugalagrande',24,NULL,NULL),(2332,129,'Burítica',1,NULL,NULL),(2333,130,'Busbanza',5,NULL,NULL),(2334,131,'Cabrera',11,NULL,NULL),(2335,132,'Cabrera',21,NULL,NULL),(2336,133,'Cabuyaro',16,NULL,NULL),(2337,134,'Cachipay',11,NULL,NULL),(2338,135,'Caicedo',1,NULL,NULL),(2339,137,'Caimito',22,NULL,NULL),(2340,138,'Cajamarca',23,NULL,NULL),(2341,139,'Cajibío',8,NULL,NULL),(2342,140,'Cajicá',11,NULL,NULL),(2343,141,'Calamar',4,NULL,NULL),(2344,142,'Calamar',31,NULL,NULL),(2345,143,'Calarcá',19,NULL,NULL),(2346,144,'Caldas',1,NULL,NULL),(2347,145,'Caldas',5,NULL,NULL),(2348,146,'Caldono',8,NULL,NULL),(2349,147,'California',21,NULL,NULL),(2350,148,'Calima (Darién)',24,NULL,NULL),(2351,149,'Caloto',8,NULL,NULL),(2352,150,'Calí',24,NULL,NULL),(2353,151,'Campamento',1,NULL,NULL),(2354,152,'Campo de la Cruz',2,NULL,NULL),(2355,153,'Campoalegre',13,NULL,NULL),(2356,154,'Campohermoso',5,NULL,NULL),(2357,155,'Canalete',10,NULL,NULL),(2358,156,'Candelaria',2,NULL,NULL),(2359,157,'Candelaria',24,NULL,NULL),(2360,158,'Cantagallo',4,NULL,NULL),(2361,159,'Cantón de San Pablo',12,NULL,NULL),(2362,160,'Caparrapí',11,NULL,NULL),(2363,161,'Capitanejo',21,NULL,NULL),(2364,162,'Caracolí',1,NULL,NULL),(2365,163,'Caramanta',1,NULL,NULL),(2366,164,'Carcasí',21,NULL,NULL),(2367,165,'Carepa',1,NULL,NULL),(2368,166,'Carmen de Apicalá',23,NULL,NULL),(2369,167,'Carmen de Carupa',11,NULL,NULL),(2370,168,'Carmen de Viboral',1,NULL,NULL),(2371,169,'Carmen del Darién (CURBARADÓ)',12,NULL,NULL),(2372,170,'Carolina',1,NULL,NULL),(2373,171,'Cartagena',4,NULL,NULL),(2374,172,'Cartagena del Chairá',7,NULL,NULL),(2375,173,'Cartago',24,NULL,NULL),(2376,174,'Carurú',32,NULL,NULL),(2377,175,'Casabianca',23,NULL,NULL),(2378,176,'Castilla la Nueva',16,NULL,NULL),(2379,177,'Caucasia',1,NULL,NULL),(2380,178,'Cañasgordas',1,NULL,NULL),(2381,179,'Cepita',21,NULL,NULL),(2382,180,'Cereté',10,NULL,NULL),(2383,181,'Cerinza',5,NULL,NULL),(2384,182,'Cerrito',21,NULL,NULL),(2385,183,'Cerro San Antonio',15,NULL,NULL),(2386,184,'Chachaguí',17,NULL,NULL),(2387,185,'Chaguaní',11,NULL,NULL),(2388,186,'Chalán',22,NULL,NULL),(2389,187,'Chaparral',23,NULL,NULL),(2390,188,'Charalá',21,NULL,NULL),(2391,189,'Charta',21,NULL,NULL),(2392,190,'Chigorodó',1,NULL,NULL),(2393,191,'Chima',21,NULL,NULL),(2394,192,'Chimichagua',9,NULL,NULL),(2395,193,'Chimá',10,NULL,NULL),(2396,194,'Chinavita',5,NULL,NULL),(2397,195,'Chinchiná',6,NULL,NULL),(2398,196,'Chinácota',18,NULL,NULL),(2399,197,'Chinú',10,NULL,NULL),(2400,198,'Chipaque',11,NULL,NULL),(2401,199,'Chipatá',21,NULL,NULL),(2402,200,'Chiquinquirá',5,NULL,NULL),(2403,201,'Chiriguaná',9,NULL,NULL),(2404,202,'Chiscas',5,NULL,NULL),(2405,203,'Chita',5,NULL,NULL),(2406,204,'Chitagá',18,NULL,NULL),(2407,205,'Chitaraque',5,NULL,NULL),(2408,206,'Chivatá',5,NULL,NULL),(2409,207,'Chivolo',15,NULL,NULL),(2410,208,'Choachí',11,NULL,NULL),(2411,209,'Chocontá',11,NULL,NULL),(2412,210,'Chámeza',26,NULL,NULL),(2413,211,'Chía',11,NULL,NULL),(2414,212,'Chíquiza',5,NULL,NULL),(2415,213,'Chívor',5,NULL,NULL),(2416,214,'Cicuco',4,NULL,NULL),(2417,215,'Cimitarra',21,NULL,NULL),(2418,216,'Circasia',19,NULL,NULL),(2419,217,'Cisneros',1,NULL,NULL),(2420,218,'Ciénaga',5,NULL,NULL),(2421,219,'Ciénaga',15,NULL,NULL),(2422,220,'Ciénaga de Oro',10,NULL,NULL),(2423,221,'Clemencia',4,NULL,NULL),(2424,222,'Cocorná',1,NULL,NULL),(2425,223,'Coello',23,NULL,NULL),(2426,224,'Cogua',11,NULL,NULL),(2427,225,'Colombia',13,NULL,NULL),(2428,226,'Colosó (Ricaurte)',22,NULL,NULL),(2429,227,'Colón',27,NULL,NULL),(2430,228,'Colón (Génova)',17,NULL,NULL),(2431,229,'Concepción',1,NULL,NULL),(2432,230,'Concepción',21,NULL,NULL),(2433,231,'Concordia',1,NULL,NULL),(2434,232,'Concordia',15,NULL,NULL),(2435,233,'Condoto',12,NULL,NULL),(2436,234,'Confines',21,NULL,NULL),(2437,235,'Consaca',17,NULL,NULL),(2438,236,'Contadero',17,NULL,NULL),(2439,237,'Contratación',21,NULL,NULL),(2440,238,'Convención',18,NULL,NULL),(2441,239,'Copacabana',1,NULL,NULL),(2442,240,'Coper',5,NULL,NULL),(2443,241,'Cordobá',19,NULL,NULL),(2444,242,'Corinto',8,NULL,NULL),(2445,243,'Coromoro',21,NULL,NULL),(2446,244,'Corozal',22,NULL,NULL),(2447,245,'Corrales',5,NULL,NULL),(2448,246,'Cota',11,NULL,NULL),(2449,247,'Cotorra',10,NULL,NULL),(2450,248,'Covarachía',5,NULL,NULL),(2451,249,'Coveñas',22,NULL,NULL),(2452,250,'Coyaima',23,NULL,NULL),(2453,251,'Cravo Norte',25,NULL,NULL),(2454,252,'Cuaspud (Carlosama)',17,NULL,NULL),(2455,253,'Cubarral',16,NULL,NULL),(2456,254,'Cubará',5,NULL,NULL),(2457,255,'Cucaita',5,NULL,NULL),(2458,256,'Cucunubá',11,NULL,NULL),(2459,257,'Cucutilla',18,NULL,NULL),(2460,258,'Cuitiva',5,NULL,NULL),(2461,259,'Cumaral',16,NULL,NULL),(2462,260,'Cumaribo',33,NULL,NULL),(2463,261,'Cumbal',17,NULL,NULL),(2464,262,'Cumbitara',17,NULL,NULL),(2465,263,'Cunday',23,NULL,NULL),(2466,264,'Curillo',7,NULL,NULL),(2467,265,'Curití',21,NULL,NULL),(2468,266,'Curumaní',9,NULL,NULL),(2469,267,'Cáceres',1,NULL,NULL),(2470,268,'Cáchira',18,NULL,NULL),(2471,269,'Cácota',18,NULL,NULL),(2472,270,'Cáqueza',11,NULL,NULL),(2473,271,'Cértegui',12,NULL,NULL),(2474,272,'Cómbita',5,NULL,NULL),(2475,273,'Córdoba',4,NULL,NULL),(2476,274,'Córdoba',17,NULL,NULL),(2477,275,'Cúcuta',18,NULL,NULL),(2478,276,'Dabeiba',1,NULL,NULL),(2479,277,'Dagua',24,NULL,NULL),(2480,278,'Dibulla',14,NULL,NULL),(2481,279,'Distracción',14,NULL,NULL),(2482,280,'Dolores',23,NULL,NULL),(2483,281,'Don Matías',1,NULL,NULL),(2484,282,'Dos Quebradas',20,NULL,NULL),(2485,283,'Duitama',5,NULL,NULL),(2486,284,'Durania',18,NULL,NULL),(2487,285,'Ebéjico',1,NULL,NULL),(2488,286,'El Bagre',1,NULL,NULL),(2489,287,'El Banco',15,NULL,NULL),(2490,288,'El Cairo',24,NULL,NULL),(2491,289,'El Calvario',16,NULL,NULL),(2492,290,'El Carmen',18,NULL,NULL),(2493,291,'El Carmen',21,NULL,NULL),(2494,292,'El Carmen de Atrato',12,NULL,NULL),(2495,293,'El Carmen de Bolívar',4,NULL,NULL),(2496,294,'El Castillo',16,NULL,NULL),(2497,295,'El Cerrito',24,NULL,NULL),(2498,296,'El Charco',17,NULL,NULL),(2499,297,'El Cocuy',5,NULL,NULL),(2500,298,'El Colegio',11,NULL,NULL),(2501,299,'El Copey',9,NULL,NULL),(2502,300,'El Doncello',7,NULL,NULL),(2503,301,'El Dorado',16,NULL,NULL),(2504,302,'El Dovio',24,NULL,NULL),(2505,303,'El Espino',5,NULL,NULL),(2506,304,'El Guacamayo',21,NULL,NULL),(2507,305,'El Guamo',4,NULL,NULL),(2508,306,'El Molino',14,NULL,NULL),(2509,307,'El Paso',9,NULL,NULL),(2510,308,'El Paujil',7,NULL,NULL),(2511,309,'El Peñol',17,NULL,NULL),(2512,310,'El Peñon',4,NULL,NULL),(2513,311,'El Peñon',21,NULL,NULL),(2514,312,'El Peñón',11,NULL,NULL),(2515,313,'El Piñon',15,NULL,NULL),(2516,314,'El Playón',21,NULL,NULL),(2517,315,'El Retorno',31,NULL,NULL),(2518,316,'El Retén',15,NULL,NULL),(2519,317,'El Roble',22,NULL,NULL),(2520,318,'El Rosal',11,NULL,NULL),(2521,319,'El Rosario',17,NULL,NULL),(2522,320,'El Tablón de Gómez',17,NULL,NULL),(2523,321,'El Tambo',8,NULL,NULL),(2524,322,'El Tambo',17,NULL,NULL),(2525,323,'El Tarra',18,NULL,NULL),(2526,324,'El Zulia',18,NULL,NULL),(2527,325,'El Águila',24,NULL,NULL),(2528,326,'Elías',13,NULL,NULL),(2529,327,'Encino',21,NULL,NULL),(2530,328,'Enciso',21,NULL,NULL),(2531,329,'Entrerríos',1,NULL,NULL),(2532,330,'Envigado',1,NULL,NULL),(2533,331,'Espinal',23,NULL,NULL),(2534,332,'Facatativá',11,NULL,NULL),(2535,333,'Falan',23,NULL,NULL),(2536,334,'Filadelfia',6,NULL,NULL),(2537,335,'Filandia',19,NULL,NULL),(2538,336,'Firavitoba',5,NULL,NULL),(2539,337,'Flandes',23,NULL,NULL),(2540,338,'Florencia',7,NULL,NULL),(2541,339,'Florencia',8,NULL,NULL),(2542,340,'Floresta',5,NULL,NULL),(2543,341,'Florida',24,NULL,NULL),(2544,342,'Floridablanca',21,NULL,NULL),(2545,343,'Florián',21,NULL,NULL),(2546,344,'Fonseca',14,NULL,NULL),(2547,345,'Fortúl',25,NULL,NULL),(2548,346,'Fosca',11,NULL,NULL),(2549,347,'Francisco Pizarro',17,NULL,NULL),(2550,348,'Fredonia',1,NULL,NULL),(2551,349,'Fresno',23,NULL,NULL),(2552,350,'Frontino',1,NULL,NULL),(2553,351,'Fuente de Oro',16,NULL,NULL),(2554,352,'Fundación',15,NULL,NULL),(2555,353,'Funes',17,NULL,NULL),(2556,354,'Funza',11,NULL,NULL),(2557,355,'Fusagasugá',11,NULL,NULL),(2558,356,'Fómeque',11,NULL,NULL),(2559,357,'Fúquene',11,NULL,NULL),(2560,358,'Gachalá',11,NULL,NULL),(2561,359,'Gachancipá',11,NULL,NULL),(2562,360,'Gachantivá',5,NULL,NULL),(2563,361,'Gachetá',11,NULL,NULL),(2564,362,'Galapa',2,NULL,NULL),(2565,363,'Galeras (Nueva Granada)',22,NULL,NULL),(2566,364,'Galán',21,NULL,NULL),(2567,365,'Gama',11,NULL,NULL),(2568,366,'Gamarra',9,NULL,NULL),(2569,367,'Garagoa',5,NULL,NULL),(2570,368,'Garzón',13,NULL,NULL),(2571,369,'Gigante',13,NULL,NULL),(2572,370,'Ginebra',24,NULL,NULL),(2573,371,'Giraldo',1,NULL,NULL),(2574,372,'Girardot',11,NULL,NULL),(2575,373,'Girardota',1,NULL,NULL),(2576,374,'Girón',21,NULL,NULL),(2577,375,'Gonzalez',9,NULL,NULL),(2578,376,'Gramalote',18,NULL,NULL),(2579,377,'Granada',1,NULL,NULL),(2580,378,'Granada',11,NULL,NULL),(2581,379,'Granada',16,NULL,NULL),(2582,380,'Guaca',21,NULL,NULL),(2583,381,'Guacamayas',5,NULL,NULL),(2584,382,'Guacarí',24,NULL,NULL),(2585,383,'Guachavés',17,NULL,NULL),(2586,384,'Guachené',8,NULL,NULL),(2587,385,'Guachetá',11,NULL,NULL),(2588,386,'Guachucal',17,NULL,NULL),(2589,387,'Guadalupe',1,NULL,NULL),(2590,388,'Guadalupe',13,NULL,NULL),(2591,389,'Guadalupe',21,NULL,NULL),(2592,390,'Guaduas',11,NULL,NULL),(2593,391,'Guaitarilla',17,NULL,NULL),(2594,392,'Gualmatán',17,NULL,NULL),(2595,393,'Guamal',15,NULL,NULL),(2596,394,'Guamal',16,NULL,NULL),(2597,395,'Guamo',23,NULL,NULL),(2598,396,'Guapota',21,NULL,NULL),(2599,397,'Guapí',8,NULL,NULL),(2600,398,'Guaranda',22,NULL,NULL),(2601,399,'Guarne',1,NULL,NULL),(2602,400,'Guasca',11,NULL,NULL),(2603,401,'Guatapé',1,NULL,NULL),(2604,402,'Guataquí',11,NULL,NULL),(2605,403,'Guatavita',11,NULL,NULL),(2606,404,'Guateque',5,NULL,NULL),(2607,405,'Guavatá',21,NULL,NULL),(2608,406,'Guayabal de Siquima',11,NULL,NULL),(2609,407,'Guayabetal',11,NULL,NULL),(2610,408,'Guayatá',5,NULL,NULL),(2611,409,'Guepsa',21,NULL,NULL),(2612,410,'Guicán',5,NULL,NULL),(2613,411,'Gutiérrez',11,NULL,NULL),(2614,412,'Guática',20,NULL,NULL),(2615,413,'Gámbita',21,NULL,NULL),(2616,414,'Gámeza',5,NULL,NULL),(2617,415,'Génova',19,NULL,NULL),(2618,416,'Gómez Plata',1,NULL,NULL),(2619,417,'Hacarí',18,NULL,NULL),(2620,418,'Hatillo de Loba',4,NULL,NULL),(2621,419,'Hato',21,NULL,NULL),(2622,420,'Hato Corozal',26,NULL,NULL),(2623,421,'Hatonuevo',14,NULL,NULL),(2624,422,'Heliconia',1,NULL,NULL),(2625,423,'Herrán',18,NULL,NULL),(2626,424,'Herveo',23,NULL,NULL),(2627,425,'Hispania',1,NULL,NULL),(2628,426,'Hobo',13,NULL,NULL),(2629,427,'Honda',23,NULL,NULL),(2630,428,'Ibagué',23,NULL,NULL),(2631,429,'Icononzo',23,NULL,NULL),(2632,430,'Iles',17,NULL,NULL),(2633,431,'Imúes',17,NULL,NULL),(2634,432,'Inzá',8,NULL,NULL),(2635,433,'Inírida',30,NULL,NULL),(2636,434,'Ipiales',17,NULL,NULL),(2637,435,'Isnos',13,NULL,NULL),(2638,436,'Istmina',12,NULL,NULL),(2639,437,'Itagüí',1,NULL,NULL),(2640,438,'Ituango',1,NULL,NULL),(2641,439,'Izá',5,NULL,NULL),(2642,440,'Jambaló',8,NULL,NULL),(2643,441,'Jamundí',24,NULL,NULL),(2644,442,'Jardín',1,NULL,NULL),(2645,443,'Jenesano',5,NULL,NULL),(2646,444,'Jericó',1,NULL,NULL),(2647,445,'Jericó',5,NULL,NULL),(2648,446,'Jerusalén',11,NULL,NULL),(2649,447,'Jesús María',21,NULL,NULL),(2650,448,'Jordán',21,NULL,NULL),(2651,449,'Juan de Acosta',2,NULL,NULL),(2652,450,'Junín',11,NULL,NULL),(2653,451,'Juradó',12,NULL,NULL),(2654,452,'La Apartada y La Frontera',10,NULL,NULL),(2655,453,'La Argentina',13,NULL,NULL),(2656,454,'La Belleza',21,NULL,NULL),(2657,455,'La Calera',11,NULL,NULL),(2658,456,'La Capilla',5,NULL,NULL),(2659,457,'La Ceja',1,NULL,NULL),(2660,458,'La Celia',20,NULL,NULL),(2661,459,'La Cruz',17,NULL,NULL),(2662,460,'La Cumbre',24,NULL,NULL),(2663,461,'La Dorada',6,NULL,NULL),(2664,462,'La Esperanza',18,NULL,NULL),(2665,463,'La Estrella',1,NULL,NULL),(2666,464,'La Florida',17,NULL,NULL),(2667,465,'La Gloria',9,NULL,NULL),(2668,466,'La Jagua de Ibirico',9,NULL,NULL),(2669,467,'La Jagua del Pilar',14,NULL,NULL),(2670,468,'La Llanada',17,NULL,NULL),(2671,469,'La Macarena',16,NULL,NULL),(2672,470,'La Merced',6,NULL,NULL),(2673,471,'La Mesa',11,NULL,NULL),(2674,472,'La Montañita',7,NULL,NULL),(2675,473,'La Palma',11,NULL,NULL),(2676,474,'La Paz',21,NULL,NULL),(2677,475,'La Paz (Robles)',9,NULL,NULL),(2678,476,'La Peña',11,NULL,NULL),(2679,477,'La Pintada',1,NULL,NULL),(2680,478,'La Plata',13,NULL,NULL),(2681,479,'La Playa',18,NULL,NULL),(2682,480,'La Primavera',33,NULL,NULL),(2683,481,'La Salina',26,NULL,NULL),(2684,482,'La Sierra',8,NULL,NULL),(2685,483,'La Tebaida',19,NULL,NULL),(2686,484,'La Tola',17,NULL,NULL),(2687,485,'La Unión',1,NULL,NULL),(2688,486,'La Unión',17,NULL,NULL),(2689,487,'La Unión',22,NULL,NULL),(2690,488,'La Unión',24,NULL,NULL),(2691,489,'La Uvita',5,NULL,NULL),(2692,490,'La Vega',8,NULL,NULL),(2693,491,'La Vega',11,NULL,NULL),(2694,492,'La Victoria',5,NULL,NULL),(2695,493,'La Victoria',6,NULL,NULL),(2696,494,'La Victoria',24,NULL,NULL),(2697,495,'La Virginia',20,NULL,NULL),(2698,496,'Labateca',18,NULL,NULL),(2699,497,'Labranzagrande',5,NULL,NULL),(2700,498,'Landázuri',21,NULL,NULL),(2701,499,'Lebrija',21,NULL,NULL),(2702,500,'Leiva',17,NULL,NULL),(2703,501,'Lejanías',16,NULL,NULL),(2704,502,'Lenguazaque',11,NULL,NULL),(2705,503,'Leticia',29,NULL,NULL),(2706,504,'Liborina',1,NULL,NULL),(2707,505,'Linares',17,NULL,NULL),(2708,506,'Lloró',12,NULL,NULL),(2709,507,'Lorica',10,NULL,NULL),(2710,508,'Los Córdobas',10,NULL,NULL),(2711,509,'Los Palmitos',22,NULL,NULL),(2712,510,'Los Patios',18,NULL,NULL),(2713,511,'Los Santos',21,NULL,NULL),(2714,512,'Lourdes',18,NULL,NULL),(2715,513,'Luruaco',2,NULL,NULL),(2716,514,'Lérida',23,NULL,NULL),(2717,515,'Líbano',23,NULL,NULL),(2718,516,'López (Micay)',8,NULL,NULL),(2719,517,'Macanal',5,NULL,NULL),(2720,518,'Macaravita',21,NULL,NULL),(2721,519,'Maceo',1,NULL,NULL),(2722,520,'Machetá',11,NULL,NULL),(2723,521,'Madrid',11,NULL,NULL),(2724,522,'Magangué',4,NULL,NULL),(2725,523,'Magüi (Payán)',17,NULL,NULL),(2726,524,'Mahates',4,NULL,NULL),(2727,525,'Maicao',14,NULL,NULL),(2728,526,'Majagual',22,NULL,NULL),(2729,527,'Malambo',2,NULL,NULL),(2730,528,'Mallama (Piedrancha)',17,NULL,NULL),(2731,529,'Manatí',2,NULL,NULL),(2732,530,'Manaure',14,NULL,NULL),(2733,531,'Manaure Balcón del Cesar',9,NULL,NULL),(2734,532,'Manizales',6,NULL,NULL),(2735,533,'Manta',11,NULL,NULL),(2736,534,'Manzanares',6,NULL,NULL),(2737,535,'Maní',26,NULL,NULL),(2738,536,'Mapiripan',16,NULL,NULL),(2739,537,'Margarita',4,NULL,NULL),(2740,538,'Marinilla',1,NULL,NULL),(2741,539,'Maripí',5,NULL,NULL),(2742,540,'Mariquita',23,NULL,NULL),(2743,541,'Marmato',6,NULL,NULL),(2744,542,'Marquetalia',6,NULL,NULL),(2745,543,'Marsella',20,NULL,NULL),(2746,544,'Marulanda',6,NULL,NULL),(2747,545,'María la Baja',4,NULL,NULL),(2748,546,'Matanza',21,NULL,NULL),(2749,547,'Medellín',1,NULL,NULL),(2750,548,'Medina',11,NULL,NULL),(2751,549,'Medio Atrato',12,NULL,NULL),(2752,550,'Medio Baudó',12,NULL,NULL),(2753,551,'Medio San Juan (ANDAGOYA)',12,NULL,NULL),(2754,552,'Melgar',23,NULL,NULL),(2755,553,'Mercaderes',8,NULL,NULL),(2756,554,'Mesetas',16,NULL,NULL),(2757,555,'Milán',7,NULL,NULL),(2758,556,'Miraflores',5,NULL,NULL),(2759,557,'Miraflores',31,NULL,NULL),(2760,558,'Miranda',8,NULL,NULL),(2761,559,'Mistrató',20,NULL,NULL),(2762,560,'Mitú',32,NULL,NULL),(2763,561,'Mocoa',27,NULL,NULL),(2764,562,'Mogotes',21,NULL,NULL),(2765,563,'Molagavita',21,NULL,NULL),(2766,564,'Momil',10,NULL,NULL),(2767,565,'Mompós',4,NULL,NULL),(2768,566,'Mongua',5,NULL,NULL),(2769,567,'Monguí',5,NULL,NULL),(2770,568,'Moniquirá',5,NULL,NULL),(2771,569,'Montebello',1,NULL,NULL),(2772,570,'Montecristo',4,NULL,NULL),(2773,571,'Montelíbano',10,NULL,NULL),(2774,572,'Montenegro',19,NULL,NULL),(2775,573,'Monteria',10,NULL,NULL),(2776,574,'Monterrey',26,NULL,NULL),(2777,575,'Morales',4,NULL,NULL),(2778,576,'Morales',8,NULL,NULL),(2779,577,'Morelia',7,NULL,NULL),(2780,578,'Morroa',22,NULL,NULL),(2781,579,'Mosquera',11,NULL,NULL),(2782,580,'Mosquera',17,NULL,NULL),(2783,581,'Motavita',5,NULL,NULL),(2784,582,'Moñitos',10,NULL,NULL),(2785,583,'Murillo',23,NULL,NULL),(2786,584,'Murindó',1,NULL,NULL),(2787,585,'Mutatá',1,NULL,NULL),(2788,586,'Mutiscua',18,NULL,NULL),(2789,587,'Muzo',5,NULL,NULL),(2790,588,'Málaga',21,NULL,NULL),(2791,589,'Nariño',1,NULL,NULL),(2792,590,'Nariño',11,NULL,NULL),(2793,591,'Nariño',17,NULL,NULL),(2794,592,'Natagaima',23,NULL,NULL),(2795,593,'Nechí',1,NULL,NULL),(2796,594,'Necoclí',1,NULL,NULL),(2797,595,'Neira',6,NULL,NULL),(2798,596,'Neiva',13,NULL,NULL),(2799,597,'Nemocón',11,NULL,NULL),(2800,598,'Nilo',11,NULL,NULL),(2801,599,'Nimaima',11,NULL,NULL),(2802,600,'Nobsa',5,NULL,NULL),(2803,601,'Nocaima',11,NULL,NULL),(2804,602,'Norcasia',6,NULL,NULL),(2805,603,'Norosí',4,NULL,NULL),(2806,604,'Novita',12,NULL,NULL),(2807,605,'Nueva Granada',15,NULL,NULL),(2808,606,'Nuevo Colón',5,NULL,NULL),(2809,607,'Nunchía',26,NULL,NULL),(2810,608,'Nuquí',12,NULL,NULL),(2811,609,'Nátaga',13,NULL,NULL),(2812,610,'Obando',24,NULL,NULL),(2813,611,'Ocamonte',21,NULL,NULL),(2814,612,'Ocaña',18,NULL,NULL),(2815,613,'Oiba',21,NULL,NULL),(2816,614,'Oicatá',5,NULL,NULL),(2817,615,'Olaya',1,NULL,NULL),(2818,616,'Olaya Herrera',17,NULL,NULL),(2819,617,'Onzaga',21,NULL,NULL),(2820,618,'Oporapa',13,NULL,NULL),(2821,619,'Orito',27,NULL,NULL),(2822,620,'Orocué',26,NULL,NULL),(2823,621,'Ortega',23,NULL,NULL),(2824,622,'Ospina',17,NULL,NULL),(2825,623,'Otanche',5,NULL,NULL),(2826,624,'Ovejas',22,NULL,NULL),(2827,625,'Pachavita',5,NULL,NULL),(2828,626,'Pacho',11,NULL,NULL),(2829,627,'Padilla',8,NULL,NULL),(2830,628,'Paicol',13,NULL,NULL),(2831,629,'Pailitas',9,NULL,NULL),(2832,630,'Paime',11,NULL,NULL),(2833,631,'Paipa',5,NULL,NULL),(2834,632,'Pajarito',5,NULL,NULL),(2835,633,'Palermo',13,NULL,NULL),(2836,634,'Palestina',6,NULL,NULL),(2837,635,'Palestina',13,NULL,NULL),(2838,636,'Palmar',21,NULL,NULL),(2839,637,'Palmar de Varela',2,NULL,NULL),(2840,638,'Palmas del Socorro',21,NULL,NULL),(2841,639,'Palmira',24,NULL,NULL),(2842,640,'Palmito',22,NULL,NULL),(2843,641,'Palocabildo',23,NULL,NULL),(2844,642,'Pamplona',18,NULL,NULL),(2845,643,'Pamplonita',18,NULL,NULL),(2846,644,'Pandi',11,NULL,NULL),(2847,645,'Panqueba',5,NULL,NULL),(2848,646,'Paratebueno',11,NULL,NULL),(2849,647,'Pasca',11,NULL,NULL),(2850,648,'Patía (El Bordo)',8,NULL,NULL),(2851,649,'Pauna',5,NULL,NULL),(2852,650,'Paya',5,NULL,NULL),(2853,651,'Paz de Ariporo',26,NULL,NULL),(2854,652,'Paz de Río',5,NULL,NULL),(2855,653,'Pedraza',15,NULL,NULL),(2856,654,'Pelaya',9,NULL,NULL),(2857,655,'Pensilvania',6,NULL,NULL),(2858,656,'Peque',1,NULL,NULL),(2859,657,'Pereira',20,NULL,NULL),(2860,658,'Pesca',5,NULL,NULL),(2861,659,'Peñol',1,NULL,NULL),(2862,660,'Piamonte',8,NULL,NULL),(2863,661,'Pie de Cuesta',21,NULL,NULL),(2864,662,'Piedras',23,NULL,NULL),(2865,663,'Piendamó',8,NULL,NULL),(2866,664,'Pijao',19,NULL,NULL),(2867,665,'Pijiño',15,NULL,NULL),(2868,666,'Pinchote',21,NULL,NULL),(2869,667,'Pinillos',4,NULL,NULL),(2870,668,'Piojo',2,NULL,NULL),(2871,669,'Pisva',5,NULL,NULL),(2872,670,'Pital',13,NULL,NULL),(2873,671,'Pitalito',13,NULL,NULL),(2874,672,'Pivijay',15,NULL,NULL),(2875,673,'Planadas',23,NULL,NULL),(2876,674,'Planeta Rica',10,NULL,NULL),(2877,675,'Plato',15,NULL,NULL),(2878,676,'Policarpa',17,NULL,NULL),(2879,677,'Polonuevo',2,NULL,NULL),(2880,678,'Ponedera',2,NULL,NULL),(2881,679,'Popayán',8,NULL,NULL),(2882,680,'Pore',26,NULL,NULL),(2883,681,'Potosí',17,NULL,NULL),(2884,682,'Pradera',24,NULL,NULL),(2885,683,'Prado',23,NULL,NULL),(2886,684,'Providencia',17,NULL,NULL),(2887,685,'Providencia',28,NULL,NULL),(2888,686,'Pueblo Bello',9,NULL,NULL),(2889,687,'Pueblo Nuevo',10,NULL,NULL),(2890,688,'Pueblo Rico',20,NULL,NULL),(2891,689,'Pueblorrico',1,NULL,NULL),(2892,690,'Puebloviejo',15,NULL,NULL),(2893,691,'Puente Nacional',21,NULL,NULL),(2894,692,'Puerres',17,NULL,NULL),(2895,693,'Puerto Asís',27,NULL,NULL),(2896,694,'Puerto Berrío',1,NULL,NULL),(2897,695,'Puerto Boyacá',5,NULL,NULL),(2898,696,'Puerto Caicedo',27,NULL,NULL),(2899,697,'Puerto Carreño',33,NULL,NULL),(2900,698,'Puerto Colombia',2,NULL,NULL),(2901,699,'Puerto Concordia',16,NULL,NULL),(2902,700,'Puerto Escondido',10,NULL,NULL),(2903,701,'Puerto Gaitán',16,NULL,NULL),(2904,702,'Puerto Guzmán',27,NULL,NULL),(2905,703,'Puerto Leguízamo',27,NULL,NULL),(2906,704,'Puerto Libertador',10,NULL,NULL),(2907,705,'Puerto Lleras',16,NULL,NULL),(2908,706,'Puerto López',16,NULL,NULL),(2909,707,'Puerto Nare',1,NULL,NULL),(2910,708,'Puerto Nariño',29,NULL,NULL),(2911,709,'Puerto Parra',21,NULL,NULL),(2912,710,'Puerto Rico',7,NULL,NULL),(2913,711,'Puerto Rico',16,NULL,NULL),(2914,712,'Puerto Rondón',25,NULL,NULL),(2915,713,'Puerto Salgar',11,NULL,NULL),(2916,714,'Puerto Santander',18,NULL,NULL),(2917,715,'Puerto Tejada',8,NULL,NULL),(2918,716,'Puerto Triunfo',1,NULL,NULL),(2919,717,'Puerto Wilches',21,NULL,NULL),(2920,718,'Pulí',11,NULL,NULL),(2921,719,'Pupiales',17,NULL,NULL),(2922,720,'Puracé (Coconuco)',8,NULL,NULL),(2923,721,'Purificación',23,NULL,NULL),(2924,722,'Purísima',10,NULL,NULL),(2925,723,'Pácora',6,NULL,NULL),(2926,724,'Páez',5,NULL,NULL),(2927,725,'Páez (Belalcazar)',8,NULL,NULL),(2928,726,'Páramo',21,NULL,NULL),(2929,727,'Quebradanegra',11,NULL,NULL),(2930,728,'Quetame',11,NULL,NULL),(2931,729,'Quibdó',12,NULL,NULL),(2932,730,'Quimbaya',19,NULL,NULL),(2933,731,'Quinchía',20,NULL,NULL),(2934,732,'Quipama',5,NULL,NULL),(2935,733,'Quipile',11,NULL,NULL),(2936,734,'Ragonvalia',18,NULL,NULL),(2937,735,'Ramiriquí',5,NULL,NULL),(2938,736,'Recetor',26,NULL,NULL),(2939,737,'Regidor',4,NULL,NULL),(2940,738,'Remedios',1,NULL,NULL),(2941,739,'Remolino',15,NULL,NULL),(2942,740,'Repelón',2,NULL,NULL),(2943,741,'Restrepo',16,NULL,NULL),(2944,742,'Restrepo',24,NULL,NULL),(2945,743,'Retiro',1,NULL,NULL),(2946,744,'Ricaurte',11,NULL,NULL),(2947,745,'Ricaurte',17,NULL,NULL),(2948,746,'Rio Negro',21,NULL,NULL),(2949,747,'Rioblanco',23,NULL,NULL),(2950,748,'Riofrío',24,NULL,NULL),(2951,749,'Riohacha',14,NULL,NULL),(2952,750,'Risaralda',6,NULL,NULL),(2953,751,'Rivera',13,NULL,NULL),(2954,752,'Roberto Payán (San José)',17,NULL,NULL),(2955,753,'Roldanillo',24,NULL,NULL),(2956,754,'Roncesvalles',23,NULL,NULL),(2957,755,'Rondón',5,NULL,NULL),(2958,756,'Rosas',8,NULL,NULL),(2959,757,'Rovira',23,NULL,NULL),(2960,758,'Ráquira',5,NULL,NULL),(2961,759,'Río Iró',12,NULL,NULL),(2962,760,'Río Quito',12,NULL,NULL),(2963,761,'Río Sucio',6,NULL,NULL),(2964,762,'Río Viejo',4,NULL,NULL),(2965,763,'Río de oro',9,NULL,NULL),(2966,764,'Ríonegro',1,NULL,NULL),(2967,765,'Ríosucio',12,NULL,NULL),(2968,766,'Sabana de Torres',21,NULL,NULL),(2969,767,'Sabanagrande',2,NULL,NULL),(2970,768,'Sabanalarga',1,NULL,NULL),(2971,769,'Sabanalarga',2,NULL,NULL),(2972,770,'Sabanalarga',26,NULL,NULL),(2973,771,'Sabanas de San Angel (SAN ANGE',15,NULL,NULL),(2974,772,'Sabaneta',1,NULL,NULL),(2975,773,'Saboyá',5,NULL,NULL),(2976,774,'Sahagún',10,NULL,NULL),(2977,775,'Saladoblanco',13,NULL,NULL),(2978,776,'Salamina',6,NULL,NULL),(2979,777,'Salamina',15,NULL,NULL),(2980,778,'Salazar',18,NULL,NULL),(2981,779,'Saldaña',23,NULL,NULL),(2982,780,'Salento',19,NULL,NULL),(2983,781,'Salgar',1,NULL,NULL),(2984,782,'Samacá',5,NULL,NULL),(2985,783,'Samaniego',17,NULL,NULL),(2986,784,'Samaná',6,NULL,NULL),(2987,785,'Sampués',22,NULL,NULL),(2988,786,'San Agustín',13,NULL,NULL),(2989,787,'San Alberto',9,NULL,NULL),(2990,788,'San Andrés',21,NULL,NULL),(2991,789,'San Andrés Sotavento',10,NULL,NULL),(2992,790,'San Andrés de Cuerquía',1,NULL,NULL),(2993,791,'San Antero',10,NULL,NULL),(2994,792,'San Antonio',23,NULL,NULL),(2995,793,'San Antonio de Tequendama',11,NULL,NULL),(2996,794,'San Benito',21,NULL,NULL),(2997,795,'San Benito Abad',22,NULL,NULL),(2998,796,'San Bernardo',11,NULL,NULL),(2999,797,'San Bernardo',17,NULL,NULL),(3000,798,'San Bernardo del Viento',10,NULL,NULL),(3001,799,'San Calixto',18,NULL,NULL),(3002,800,'San Carlos',1,NULL,NULL),(3003,801,'San Carlos',10,NULL,NULL),(3004,802,'San Carlos de Guaroa',16,NULL,NULL),(3005,803,'San Cayetano',11,NULL,NULL),(3006,804,'San Cayetano',18,NULL,NULL),(3007,805,'San Cristobal',4,NULL,NULL),(3008,806,'San Diego',9,NULL,NULL),(3009,807,'San Eduardo',5,NULL,NULL),(3010,808,'San Estanislao',4,NULL,NULL),(3011,809,'San Fernando',4,NULL,NULL),(3012,810,'San Francisco',1,NULL,NULL),(3013,811,'San Francisco',11,NULL,NULL),(3014,812,'San Francisco',27,NULL,NULL),(3015,813,'San Gíl',21,NULL,NULL),(3016,814,'San Jacinto',4,NULL,NULL),(3017,815,'San Jacinto del Cauca',4,NULL,NULL),(3018,816,'San Jerónimo',1,NULL,NULL),(3019,817,'San Joaquín',21,NULL,NULL),(3020,818,'San José',6,NULL,NULL),(3021,819,'San José de Miranda',21,NULL,NULL),(3022,820,'San José de Montaña',1,NULL,NULL),(3023,821,'San José de Pare',5,NULL,NULL),(3024,822,'San José de Uré',10,NULL,NULL),(3025,823,'San José del Fragua',7,NULL,NULL),(3026,824,'San José del Guaviare',31,NULL,NULL),(3027,825,'San José del Palmar',12,NULL,NULL),(3028,826,'San Juan de Arama',16,NULL,NULL),(3029,827,'San Juan de Betulia',22,NULL,NULL),(3030,828,'San Juan de Nepomuceno',4,NULL,NULL),(3031,829,'San Juan de Pasto',17,NULL,NULL),(3032,830,'San Juan de Río Seco',11,NULL,NULL),(3033,831,'San Juan de Urabá',1,NULL,NULL),(3034,832,'San Juan del Cesar',14,NULL,NULL),(3035,833,'San Juanito',16,NULL,NULL),(3036,834,'San Lorenzo',17,NULL,NULL),(3037,835,'San Luis',23,NULL,NULL),(3038,836,'San Luís',1,NULL,NULL),(3039,837,'San Luís de Gaceno',5,NULL,NULL),(3040,838,'San Luís de Palenque',26,NULL,NULL),(3041,839,'San Marcos',22,NULL,NULL),(3042,840,'San Martín',9,NULL,NULL),(3043,841,'San Martín',16,NULL,NULL),(3044,842,'San Martín de Loba',4,NULL,NULL),(3045,843,'San Mateo',5,NULL,NULL),(3046,844,'San Miguel',21,NULL,NULL),(3047,845,'San Miguel',27,NULL,NULL),(3048,846,'San Miguel de Sema',5,NULL,NULL),(3049,847,'San Onofre',22,NULL,NULL),(3050,848,'San Pablo',4,NULL,NULL),(3051,849,'San Pablo',17,NULL,NULL),(3052,850,'San Pablo de Borbur',5,NULL,NULL),(3053,851,'San Pedro',1,NULL,NULL),(3054,852,'San Pedro',22,NULL,NULL),(3055,853,'San Pedro',24,NULL,NULL),(3056,854,'San Pedro de Cartago',17,NULL,NULL),(3057,855,'San Pedro de Urabá',1,NULL,NULL),(3058,856,'San Pelayo',10,NULL,NULL),(3059,857,'San Rafael',1,NULL,NULL),(3060,858,'San Roque',1,NULL,NULL),(3061,859,'San Sebastián',8,NULL,NULL),(3062,860,'San Sebastián de Buenavista',15,NULL,NULL),(3063,861,'San Vicente',1,NULL,NULL),(3064,862,'San Vicente del Caguán',7,NULL,NULL),(3065,863,'San Vicente del Chucurí',21,NULL,NULL),(3066,864,'San Zenón',15,NULL,NULL),(3067,865,'Sandoná',17,NULL,NULL),(3068,866,'Santa Ana',15,NULL,NULL),(3069,867,'Santa Bárbara',1,NULL,NULL),(3070,868,'Santa Bárbara',21,NULL,NULL),(3071,869,'Santa Bárbara (Iscuandé)',17,NULL,NULL),(3072,870,'Santa Bárbara de Pinto',15,NULL,NULL),(3073,871,'Santa Catalina',4,NULL,NULL),(3074,872,'Santa Fé de Antioquia',1,NULL,NULL),(3075,873,'Santa Genoveva de Docorodó',12,NULL,NULL),(3076,874,'Santa Helena del Opón',21,NULL,NULL),(3077,875,'Santa Isabel',23,NULL,NULL),(3078,876,'Santa Lucía',2,NULL,NULL),(3079,877,'Santa Marta',15,NULL,NULL),(3080,878,'Santa María',5,NULL,NULL),(3081,879,'Santa María',13,NULL,NULL),(3082,880,'Santa Rosa',4,NULL,NULL),(3083,881,'Santa Rosa',8,NULL,NULL),(3084,882,'Santa Rosa de Cabal',20,NULL,NULL),(3085,883,'Santa Rosa de Osos',1,NULL,NULL),(3086,884,'Santa Rosa de Viterbo',5,NULL,NULL),(3087,885,'Santa Rosa del Sur',4,NULL,NULL),(3088,886,'Santa Rosalía',33,NULL,NULL),(3089,887,'Santa Sofía',5,NULL,NULL),(3090,888,'Santana',5,NULL,NULL),(3091,889,'Santander de Quilichao',8,NULL,NULL),(3092,890,'Santiago',18,NULL,NULL),(3093,891,'Santiago',27,NULL,NULL),(3094,892,'Santo Domingo',1,NULL,NULL),(3095,893,'Santo Tomás',2,NULL,NULL),(3096,894,'Santuario',1,NULL,NULL),(3097,895,'Santuario',20,NULL,NULL),(3098,896,'Sapuyes',17,NULL,NULL),(3099,897,'Saravena',25,NULL,NULL),(3100,898,'Sardinata',18,NULL,NULL),(3101,899,'Sasaima',11,NULL,NULL),(3102,900,'Sativanorte',5,NULL,NULL),(3103,901,'Sativasur',5,NULL,NULL),(3104,902,'Segovia',1,NULL,NULL),(3105,903,'Sesquilé',11,NULL,NULL),(3106,904,'Sevilla',24,NULL,NULL),(3107,905,'Siachoque',5,NULL,NULL),(3108,906,'Sibaté',11,NULL,NULL),(3109,907,'Sibundoy',27,NULL,NULL),(3110,908,'Silos',18,NULL,NULL),(3111,909,'Silvania',11,NULL,NULL),(3112,910,'Silvia',8,NULL,NULL),(3113,911,'Simacota',21,NULL,NULL),(3114,912,'Simijaca',11,NULL,NULL),(3115,913,'Simití',4,NULL,NULL),(3116,914,'Sincelejo',22,NULL,NULL),(3117,915,'Sincé',22,NULL,NULL),(3118,916,'Sipí',12,NULL,NULL),(3119,917,'Sitionuevo',15,NULL,NULL),(3120,918,'Soacha',11,NULL,NULL),(3121,919,'Soatá',5,NULL,NULL),(3122,920,'Socha',5,NULL,NULL),(3123,921,'Socorro',21,NULL,NULL),(3124,922,'Socotá',5,NULL,NULL),(3125,923,'Sogamoso',5,NULL,NULL),(3126,924,'Solano',7,NULL,NULL),(3127,925,'Soledad',2,NULL,NULL),(3128,926,'Solita',7,NULL,NULL),(3129,927,'Somondoco',5,NULL,NULL),(3130,928,'Sonsón',1,NULL,NULL),(3131,929,'Sopetrán',1,NULL,NULL),(3132,930,'Soplaviento',4,NULL,NULL),(3133,931,'Sopó',11,NULL,NULL),(3134,932,'Sora',5,NULL,NULL),(3135,933,'Soracá',5,NULL,NULL),(3136,934,'Sotaquirá',5,NULL,NULL),(3137,935,'Sotara (Paispamba)',8,NULL,NULL),(3138,936,'Sotomayor (Los Andes)',17,NULL,NULL),(3139,937,'Suaita',21,NULL,NULL),(3140,938,'Suan',2,NULL,NULL),(3141,939,'Suaza',13,NULL,NULL),(3142,940,'Subachoque',11,NULL,NULL),(3143,941,'Sucre',8,NULL,NULL),(3144,942,'Sucre',21,NULL,NULL),(3145,943,'Sucre',22,NULL,NULL),(3146,944,'Suesca',11,NULL,NULL),(3147,945,'Supatá',11,NULL,NULL),(3148,946,'Supía',6,NULL,NULL),(3149,947,'Suratá',21,NULL,NULL),(3150,948,'Susa',11,NULL,NULL),(3151,949,'Susacón',5,NULL,NULL),(3152,950,'Sutamarchán',5,NULL,NULL),(3153,951,'Sutatausa',11,NULL,NULL),(3154,952,'Sutatenza',5,NULL,NULL),(3155,953,'Suárez',8,NULL,NULL),(3156,954,'Suárez',23,NULL,NULL),(3157,955,'Sácama',26,NULL,NULL),(3158,956,'Sáchica',5,NULL,NULL),(3159,957,'Tabio',11,NULL,NULL),(3160,958,'Tadó',12,NULL,NULL),(3161,959,'Talaigua Nuevo',4,NULL,NULL),(3162,960,'Tamalameque',9,NULL,NULL),(3163,961,'Tame',25,NULL,NULL),(3164,962,'Taminango',17,NULL,NULL),(3165,963,'Tangua',17,NULL,NULL),(3166,964,'Taraira',32,NULL,NULL),(3167,965,'Tarazá',1,NULL,NULL),(3168,966,'Tarqui',13,NULL,NULL),(3169,967,'Tarso',1,NULL,NULL),(3170,968,'Tasco',5,NULL,NULL),(3171,969,'Tauramena',26,NULL,NULL),(3172,970,'Tausa',11,NULL,NULL),(3173,971,'Tello',13,NULL,NULL),(3174,972,'Tena',11,NULL,NULL),(3175,973,'Tenerife',15,NULL,NULL),(3176,974,'Tenjo',11,NULL,NULL),(3177,975,'Tenza',5,NULL,NULL),(3178,976,'Teorama',18,NULL,NULL),(3179,977,'Teruel',13,NULL,NULL),(3180,978,'Tesalia',13,NULL,NULL),(3181,979,'Tibacuy',11,NULL,NULL),(3182,980,'Tibaná',5,NULL,NULL),(3183,981,'Tibasosa',5,NULL,NULL),(3184,982,'Tibirita',11,NULL,NULL),(3185,983,'Tibú',18,NULL,NULL),(3186,984,'Tierralta',10,NULL,NULL),(3187,985,'Timaná',13,NULL,NULL),(3188,986,'Timbiquí',8,NULL,NULL),(3189,987,'Timbío',8,NULL,NULL),(3190,988,'Tinjacá',5,NULL,NULL),(3191,989,'Tipacoque',5,NULL,NULL),(3192,990,'Tiquisio (Puerto Rico)',4,NULL,NULL),(3193,991,'Titiribí',1,NULL,NULL),(3194,992,'Toca',5,NULL,NULL),(3195,993,'Tocaima',11,NULL,NULL),(3196,994,'Tocancipá',11,NULL,NULL),(3197,995,'Toguí',5,NULL,NULL),(3198,996,'Toledo',1,NULL,NULL),(3199,997,'Toledo',18,NULL,NULL),(3200,998,'Tolú',22,NULL,NULL),(3201,999,'Tolú Viejo',22,NULL,NULL),(3202,1000,'Tona',21,NULL,NULL),(3203,1001,'Topagá',5,NULL,NULL),(3204,1002,'Topaipí',11,NULL,NULL),(3205,1003,'Toribío',8,NULL,NULL),(3206,1004,'Toro',24,NULL,NULL),(3207,1005,'Tota',5,NULL,NULL),(3208,1006,'Totoró',8,NULL,NULL),(3209,1007,'Trinidad',26,NULL,NULL),(3210,1008,'Trujillo',24,NULL,NULL),(3211,1009,'Tubará',2,NULL,NULL),(3212,1010,'Tuchín',10,NULL,NULL),(3213,1011,'Tulúa',24,NULL,NULL),(3214,1012,'Tumaco',17,NULL,NULL),(3215,1013,'Tunja',5,NULL,NULL),(3216,1014,'Tunungua',5,NULL,NULL),(3217,1015,'Turbaco',4,NULL,NULL),(3218,1016,'Turbaná',4,NULL,NULL),(3219,1017,'Turbo',1,NULL,NULL),(3220,1018,'Turmequé',5,NULL,NULL),(3221,1019,'Tuta',5,NULL,NULL),(3222,1020,'Tutasá',5,NULL,NULL),(3223,1021,'Támara',26,NULL,NULL),(3224,1022,'Támesis',1,NULL,NULL),(3225,1023,'Túquerres',17,NULL,NULL),(3226,1024,'Ubalá',11,NULL,NULL),(3227,1025,'Ubaque',11,NULL,NULL),(3228,1026,'Ubaté',11,NULL,NULL),(3229,1027,'Ulloa',24,NULL,NULL),(3230,1028,'Une',11,NULL,NULL),(3231,1029,'Unguía',12,NULL,NULL),(3232,1030,'Unión Panamericana (ÁNIMAS)',12,NULL,NULL),(3233,1031,'Uramita',1,NULL,NULL),(3234,1032,'Uribe',16,NULL,NULL),(3235,1033,'Uribia',14,NULL,NULL),(3236,1034,'Urrao',1,NULL,NULL),(3237,1035,'Urumita',14,NULL,NULL),(3238,1036,'Usiacuri',2,NULL,NULL),(3239,1037,'Valdivia',1,NULL,NULL),(3240,1038,'Valencia',10,NULL,NULL),(3241,1039,'Valle de San José',21,NULL,NULL),(3242,1040,'Valle de San Juan',23,NULL,NULL),(3243,1041,'Valle del Guamuez',27,NULL,NULL),(3244,1042,'Valledupar',9,NULL,NULL),(3245,1043,'Valparaiso',1,NULL,NULL),(3246,1044,'Valparaiso',7,NULL,NULL),(3247,1045,'Vegachí',1,NULL,NULL),(3248,1046,'Venadillo',23,NULL,NULL),(3249,1047,'Venecia',1,NULL,NULL),(3250,1048,'Venecia (Ospina Pérez)',11,NULL,NULL),(3251,1049,'Ventaquemada',5,NULL,NULL),(3252,1050,'Vergara',11,NULL,NULL),(3253,1051,'Versalles',24,NULL,NULL),(3254,1052,'Vetas',21,NULL,NULL),(3255,1053,'Viani',11,NULL,NULL),(3256,1054,'Vigía del Fuerte',1,NULL,NULL),(3257,1055,'Vijes',24,NULL,NULL),(3258,1056,'Villa Caro',18,NULL,NULL),(3259,1057,'Villa Rica',8,NULL,NULL),(3260,1058,'Villa de Leiva',5,NULL,NULL),(3261,1059,'Villa del Rosario',18,NULL,NULL),(3262,1060,'Villagarzón',27,NULL,NULL),(3263,1061,'Villagómez',11,NULL,NULL),(3264,1062,'Villahermosa',23,NULL,NULL),(3265,1063,'Villamaría',6,NULL,NULL),(3266,1064,'Villanueva',4,NULL,NULL),(3267,1065,'Villanueva',14,NULL,NULL),(3268,1066,'Villanueva',21,NULL,NULL),(3269,1067,'Villanueva',26,NULL,NULL),(3270,1068,'Villapinzón',11,NULL,NULL),(3271,1069,'Villarrica',23,NULL,NULL),(3272,1070,'Villavicencio',16,NULL,NULL),(3273,1071,'Villavieja',13,NULL,NULL),(3274,1072,'Villeta',11,NULL,NULL),(3275,1073,'Viotá',11,NULL,NULL),(3276,1074,'Viracachá',5,NULL,NULL),(3277,1075,'Vista Hermosa',16,NULL,NULL),(3278,1076,'Viterbo',6,NULL,NULL),(3279,1077,'Vélez',21,NULL,NULL),(3280,1078,'Yacopí',11,NULL,NULL),(3281,1079,'Yacuanquer',17,NULL,NULL),(3282,1080,'Yaguará',13,NULL,NULL),(3283,1081,'Yalí',1,NULL,NULL),(3284,1082,'Yarumal',1,NULL,NULL),(3285,1083,'Yolombó',1,NULL,NULL),(3286,1084,'Yondó (Casabe)',1,NULL,NULL),(3287,1085,'Yopal',26,NULL,NULL),(3288,1086,'Yotoco',24,NULL,NULL),(3289,1087,'Yumbo',24,NULL,NULL),(3290,1088,'Zambrano',4,NULL,NULL),(3291,1089,'Zapatoca',21,NULL,NULL),(3292,1090,'Zapayán (PUNTA DE PIEDRAS)',15,NULL,NULL),(3293,1091,'Zaragoza',1,NULL,NULL),(3294,1092,'Zarzal',24,NULL,NULL),(3295,1093,'Zetaquirá',5,NULL,NULL),(3296,1094,'Zipacón',11,NULL,NULL),(3297,1095,'Zipaquirá',11,NULL,NULL),(3298,1096,'Zona Bananera (PRADO - SEVILLA',15,NULL,NULL),(3299,1097,'Ábrego',18,NULL,NULL),(3300,1098,'Íquira',13,NULL,NULL),(3301,1099,'Úmbita',5,NULL,NULL),(3302,1100,'Útica',11,NULL,NULL),(3303,55555,'me lo acabo de inventar',5,'2023-01-05 08:38:48','2023-01-05 08:38:48');
/*!40000 ALTER TABLE `municipios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personas`
--

DROP TABLE IF EXISTS `personas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `persona_tipo` int NOT NULL,
  `detalle_tipo_documento_id` bigint unsigned DEFAULT NULL,
  `numero_documento` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombres` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `celular` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono_fijo` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codigo_postal` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `municipio_id` bigint unsigned DEFAULT NULL,
  `contacto_nombres` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contacto_telefono` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contacto_cargo` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `personas_tipo_documento_id_foreign` (`detalle_tipo_documento_id`),
  KEY `personas_municipio_id_foreign` (`municipio_id`),
  CONSTRAINT `personas_municipio_id_foreign` FOREIGN KEY (`municipio_id`) REFERENCES `municipios` (`id`),
  CONSTRAINT `personas_tipo_documento_id_foreign` FOREIGN KEY (`detalle_tipo_documento_id`) REFERENCES `detalles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personas`
--

LOCK TABLES `personas` WRITE;
/*!40000 ALTER TABLE `personas` DISABLE KEYS */;
INSERT INTO `personas` VALUES (1,1,11,'123456','William manu','Guevara','321654987','3215451','will@gmail.com','10001','Calle Carrera',2291,'Pedrito Fernandez','5555555','Vigilante','2023-01-04 06:05:34','2023-01-05 19:29:40'),(3,1,12,'12345672','Luis Joelos','Castillos','321654987','3215452','luis@gmail.com','10001','Calle Carrera',2310,'Señra Julia','365897','Vecina','2023-01-04 06:15:21','2023-01-05 19:24:14'),(4,1,13,'12345673','Bonifacio Alfonso','Fernadez','321654987','3215453',NULL,'10001','Calle Carrera',2205,'Josefa','777777',NULL,'2023-01-04 23:36:09','2023-01-05 19:26:50'),(5,1,11,'12345674','Jhon Felipe','Apellido','321654987','3215454',NULL,'10001','Calle Carrera',2206,'Maria Luisa Calle','896574',NULL,'2023-01-05 19:35:40','2023-01-05 19:35:40'),(19,1,11,'19450246','Luis Orlando','Castillo Gutierrez','3208099114','4675763','orcasti@gmail.com','jkhjhk','sdfds',2208,'un vecino','66666','desempleado',NULL,NULL),(27,0,12,'Aut consectetur reru','In esse eum qui sus','Rem id ipsum ex prae','Sapiente quam vero n','Et eveniet consequu',NULL,'1sss',NULL,NULL,'No tiene nombre','366666xxxx',NULL,NULL,NULL),(28,0,11,'545446','Magna consequatur fu','Iure aut consectetur','Nesciunt nulla sequ','Quasi beatae esse se',NULL,'1sss',NULL,NULL,'Luisa de Sotos','3187447534',NULL,NULL,NULL),(29,0,14,'Possimus sequi illu','Omnis corrupti Nam','Id reiciendis dolore','Sint ut quasi volupt','Reiciendis sequi rat','opo@gmail.com','1sss','cxzczxcxz',2310,'Qui mollitia aute au','Ut omnis praesentium','Similique accusamus',NULL,NULL),(30,1,14,'987654-3','Jose de la Rosa','Suarez Mendieta','312563589','57-4675763',NULL,'1sss',NULL,NULL,'Qui eu aute eiusmod','Totam quae cillum co','Voluptas voluptate a',NULL,NULL);
/*!40000 ALTER TABLE `personas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `propiedad_horizontal`
--

DROP TABLE IF EXISTS `propiedad_horizontal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `propiedad_horizontal` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `inmueble_id` bigint unsigned NOT NULL,
  `conjunto_cerrado` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ubicacion_inmueble` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `numero_edificios` int DEFAULT NULL,
  `unidades_por_piso` int DEFAULT NULL,
  `total_unidades` int DEFAULT NULL,
  `total_garajes` int DEFAULT NULL,
  `total_garajes_comunales` int DEFAULT NULL,
  `garajes_cubiertos` int DEFAULT NULL,
  `garajes_descubiertos` int DEFAULT NULL,
  `total_garajes_servidumbre_comunales` int DEFAULT NULL,
  `garaje_sencillo` int DEFAULT NULL,
  `garaje_doble` int DEFAULT NULL,
  `total_depositos` int DEFAULT NULL,
  PRIMARY KEY (`id`),
   FOREIGN KEY (`inmueble_id`) REFERENCES `inmuebles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `propiedad_horizontal`
--



--
-- Table structure for table `radicados`
--

DROP TABLE IF EXISTS `radicados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `radicados` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `numero_radicado` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estado` int unsigned NOT NULL DEFAULT '0',
  `referente_id` bigint unsigned NOT NULL,
  `detalle_tipo_inmueble_id` bigint unsigned DEFAULT NULL,
  `direccion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `barrio` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zona` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `municipio_id` bigint unsigned DEFAULT NULL,
  `cliente_id` bigint unsigned DEFAULT NULL,
  `solicitante_id` bigint unsigned NOT NULL,
  `valor_referente` double NOT NULL,
  `detalle_tipo_credito_id` bigint unsigned DEFAULT NULL,
  `honorarios` double DEFAULT NULL,
  `fecha_honorarios` date DEFAULT NULL,
  `codigo_verificacion` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codigo_dane` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `radicados_user_id_foreign` (`user_id`),
  KEY `radicados_tipo_inmueble_id_foreign` (`detalle_tipo_inmueble_id`),
  KEY `radicados_municipio_id_foreign` (`municipio_id`),
  KEY `radicados_referente_id_foreign` (`referente_id`),
  KEY `radicados_cliente_id_foreign` (`cliente_id`),
  KEY `radicados_solicitante_id_foreign` (`solicitante_id`),
  CONSTRAINT `radicados_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `personas` (`id`),
  CONSTRAINT `radicados_municipio_id_foreign` FOREIGN KEY (`municipio_id`) REFERENCES `municipios` (`id`),
  CONSTRAINT `radicados_referente_id_foreign` FOREIGN KEY (`referente_id`) REFERENCES `personas` (`id`),
  CONSTRAINT `radicados_solicitante_id_foreign` FOREIGN KEY (`solicitante_id`) REFERENCES `personas` (`id`),
  CONSTRAINT `radicados_tipo_inmueble_id_foreign` FOREIGN KEY (`detalle_tipo_inmueble_id`) REFERENCES `detalles` (`id`),
  CONSTRAINT `radicados_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `radicados`
--

LOCK TABLES `radicados` WRITE;
/*!40000 ALTER TABLE `radicados` DISABLE KEYS */;
INSERT INTO `radicados` VALUES (25,1,'1','2023-04-29 22:26:49',1,1,16,'calle carrera',NULL,NULL,2281,1,27,123123123,183,NULL,NULL,NULL,NULL,NULL,'2023-04-30 03:26:49');
/*!40000 ALTER TABLE `radicados` ENABLE KEYS */;
UNLOCK TABLES;




--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cargo_id` bigint unsigned DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_cargo_id_foreign` (`cargo_id`),
  CONSTRAINT `users_cargo_id_foreign` FOREIGN KEY (`cargo_id`) REFERENCES `cargos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Orlando',4,'orcasti@gmail.com','2023-01-04 05:56:00','$2y$10$t/14Bi6knxue21v1ac/czulVnDxyborpT9TpC8eX0H3WfHdCNxWE2','QRs7fpLpEPe1g11qlfGFjpExxu5Ijl6zbL9F56RLx0UB9uhTyIFAF3d8Andd','2023-01-04 05:54:21','2023-01-04 05:56:00',NULL),(2,'Lisnelia Barrera',2,'lisbamo@gmail.com',NULL,'$2y$10$3lxTiTDCZLrMRUqp8o.6EuJFzEGPY1aJstOi6aZoi4HiuPo3DLjsq',NULL,'2023-01-08 05:00:34','2023-01-08 05:00:34',NULL),(3,'Chandler Massey',1,'qulobogij@mailinator.com',NULL,'$2y$10$h/hUAEfzUmcSGQVl.vxfeO4CFIpI/HkVJiUn/HryWV1t0FAOcdJxi',NULL,'2023-01-17 21:42:19','2023-01-17 21:42:19',NULL),(4,'Belle Vega',1,'xanuqywoj@mailinator.com',NULL,'$2y$10$VOrJlEVFRzDO7UQ70C/65OVVDU1SZJdjpBciKQIczzDEnC/L8zLd.',NULL,'2023-01-17 21:42:41','2023-01-17 21:42:41',NULL),(5,'Blake Marshall',1,'tyhep@mailinator.com',NULL,'$2y$10$shkmspnssJRxWm2qIxz3Telsx36ltJJGmJUuJpTujh.ru5o5jBn6W',NULL,'2023-01-17 21:43:01','2023-01-17 21:43:01',NULL),(6,'Jacob Dunn',3,'hofyji@mailinator.com',NULL,'$2y$10$UTeTyj6SQPh0/yX0j/AlfOEr3q5ndDDloydTBtcbQBvF0OcD5f1eW',NULL,'2023-01-17 22:52:48','2023-01-17 22:52:48',NULL),(7,'Kamal Armstrong',3,'wysyv@mailinator.com',NULL,'$2y$10$Ol4QybVAPzTsojH3lR0NaO4oYGlT1KHl2.x9gr3Yiv38dD.U5fxR6',NULL,'2023-01-17 22:52:57','2023-01-17 22:52:57',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `variables`
--

DROP TABLE IF EXISTS `variables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `variables` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `numeracion` int NOT NULL,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `variables`
--

LOCK TABLES `variables` WRITE;
/*!40000 ALTER TABLE `variables` DISABLE KEYS */;
INSERT INTO `variables` VALUES (1,1,'Uso Normativo','Uso establecido por la norma para el sector',NULL,'2023-02-24 18:40:14'),(2,2,'Estado de la construcción','Se refiere en cuanto a su desarrollo (terminada, Remodelada, etc)',NULL,NULL),(3,3,'Tipo de Documento','Docuemnto de identificación',NULL,NULL),(4,4,'Tipo de Inmueble','Nombre como se conoce popularmente',NULL,NULL),(5,5,'Entorno Urbanistico','los alrededores arquitectonicos','2023-01-06 08:05:11','2023-01-06 10:02:23'),(6,6,'Tipo de Vias','En cuanto a Importancia (Nal-Dptal, etc)','2023-01-06 08:18:03','2023-01-06 10:05:13'),(7,7,'Vias','vias en cuanto a estado','2023-01-12 04:17:12','2023-01-12 04:17:12'),(8,8,'Documentos Suministrados','Son los documentos que entregaron para realizar el avaluo','2023-02-24 04:15:08','2023-02-24 04:15:08'),(9,9,'Servicios Públicos','Describir cada uno de los servicios públicos prestados','2023-02-24 18:26:01','2023-02-24 18:26:01'),(10,10,'Contador','Se refiere al registro contador o medidor de consumo de servicios Públicos','2023-02-24 18:28:38','2023-02-24 18:28:38'),(11,11,'Estrato Social','Clasificación Nacional sobre niveles de vida','2023-02-24 18:31:15','2023-02-24 18:31:15'),(12,12,'Topografía','Nivel de inclinación del terreno','2023-02-24 18:32:47','2023-02-24 18:32:47'),(13,13,'Uso Actual','uso que se le esta dando al inmueble','2023-02-24 18:37:55','2023-02-24 18:37:55'),(14,14,'Dotación Comunal','Instalaciones comunales que agregan valor al inmueble','2023-02-24 18:43:38','2023-02-24 18:43:38'),(15,15,'Estado de la visita','Detallar el proceso en que se encuentra la visita',NULL,NULL),(16,16,'Lineas de crédito','Diferentes lineas de crédito según BBVA',NULL,NULL),(17,17,'zona de Vida','basado en la nomenclatura de Holdrige',NULL,NULL),(18,18,'Calidad Acabados','generalidad sobre los acabados del inmueble',NULL,NULL);
/*!40000 ALTER TABLE `variables` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-04-29 17:31:44
