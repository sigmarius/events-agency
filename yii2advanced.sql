-- MySQL dump 10.16  Distrib 10.1.48-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: yii2advanced
-- ------------------------------------------------------
-- Server version	10.1.48-MariaDB-0+deb9u2

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
-- Table structure for table `event`
--
-- USE events_agency_crm;

DROP TABLE IF EXISTS `event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event`
--

LOCK TABLES `event` WRITE;
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
INSERT INTO `event` VALUES (1,'Meetings','6523dfe564c2e.jpg'),(2,'Trade Shows','6523dff253ad3.jpg'),(3,'Opening Ceremonies','6523dfff65aef.jpg'),(4,'Incentive Travels','6523e00c68654.jpg'),(5,'Product Launches','6523e0196092e.jpg'),(6,'Trade Faires','6523e02672503.jpg'),(7,'Conferences','6523e0335fce7.jpg'),(8,'Seminars','6523e04062ad3.jpg');
/*!40000 ALTER TABLE `event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `extra_item`
--

DROP TABLE IF EXISTS `extra_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `extra_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `extra_item`
--

LOCK TABLES `extra_item` WRITE;
/*!40000 ALTER TABLE `extra_item` DISABLE KEYS */;
INSERT INTO `extra_item` VALUES (1,'Candle',42.00,'6523d72b24fd3.jpg','Asperiores et voluptatibus qui aperiam. Ipsam quam voluptatem aut eum ipsa voluptatum. Qui ipsum sequi ut. Sed ad vero et ut aspernatur quis. Non sequi aut accusantium hic fuga. Dolores est deleniti tenetur doloremque suscipit. Consequatur exercitationem delectus numquam nihil sapiente ut qui. Autem placeat odit et in sed.'),(2,'Foliage',26.00,'6523d73a94fb3.jpg','Explicabo sit doloribus porro sit a aut. Enim ullam qui reprehenderit laboriosam optio voluptatibus. Aliquid hic omnis quo et. Ut praesentium aut ut at nostrum officiis. Dolorem quis ut rerum provident pariatur blanditiis voluptas non. Incidunt suscipit sed dicta sapiente. Iusto nostrum libero non iure.'),(3,'Microphone',23.00,'6523d74a6c7d2.jpg','Eligendi et sunt quae ut minima numquam facilis. Doloremque qui aliquid aut qui quibusdam error. Enim cumque nisi non rerum ex beatae. Accusantium dolor omnis doloremque neque. Eos iusto tempore quae fugit accusantium odio. Repudiandae quia et non eum amet quasi nemo. Fuga sit aliquam omnis quo eveniet consectetur mollitia. Neque ab debitis voluptatem velit molestiae doloribus similique mollitia.'),(4,'Podium',24.00,'6523d759f0e52.jpg','Quisquam nam sunt qui iure et ab nesciunt. Sint atque dignissimos animi consequuntur laudantium error iste. Qui consectetur modi laborum neque. Placeat voluptatem praesentium quis et esse ad fugiat maxime. Pariatur eum nobis fugit quo quis et. Corrupti eos hic animi omnis. Voluptatem voluptatem nesciunt enim.'),(5,'Projector',41.00,'6523d7697f7b4.jpg','Omnis tempore nemo magnam soluta qui aut consequatur. Sequi odit maxime consectetur et aut vel nisi. Et minima quia illum totam. Ex earum molestiae nam velit voluptatum ea inventore. Praesentium voluptas quo praesentium aut laborum et sequi. Laudantium necessitatibus debitis et asperiores et veniam voluptate. Est distinctio sed modi magni qui. Beatae eos sit sapiente et illo maiores qui.'),(6,'Remote Slide',17.00,'6523d77915e21.jpg','Dolorem nihil sit aut assumenda aperiam non. Qui architecto voluptatem quis eos. Architecto qui eum odio beatae. Blanditiis vitae saepe quaerat minus explicabo harum et. Sapiente accusamus enim et quisquam. Totam eligendi consectetur inventore nulla. Ipsam repudiandae earum facilis delectus sit exercitationem non.'),(7,'Screen Projector',44.00,'6523d7887abd3.jpg','Similique enim molestiae laudantium. Et nemo dolor quia debitis et cum nemo. Aspernatur ad architecto animi minus ut omnis dolores. Esse ipsum culpa velit. Ratione illo consectetur quis iste ipsam aut quis. Natus amet nulla aut inventore omnis ipsam fugit. Blanditiis corrupti laboriosam molestias eius nemo. Ipsum rerum eum et et iure.'),(8,'Speaker',32.00,'6523d797f303d.jpg','Quia cumque eos incidunt sequi at. In ut nihil consequuntur. Aut in odit doloribus sit sapiente. Saepe reprehenderit molestiae voluptatibus ut omnis quia sit quo. Veritatis quis natus aut quos. Mollitia architecto molestiae animi dolores. Aut corrupti veritatis quo dolorem voluptatibus fugit.');
/*!40000 ALTER TABLE `extra_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration`
--

DROP TABLE IF EXISTS `migration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration`
--

LOCK TABLES `migration` WRITE;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` VALUES ('m000000_000000_base',1696437516),('m130524_201442_init',1696437772),('m190124_110200_add_verification_token_column_to_user_table',1696437773),('m231005_063633_create_post_table',1696489068),('m231007_090519_create_text_block_table',1696669676),('m231007_101426_add_data_to_text_block_table',1696674108),('m231007_120307_add_columns_to_user_table',1696755251),('m231008_085247_create_event_table',1696755320),('m231008_165742_create_extra_item_table',1696784333),('m231009_114515_create_table_table',1696851986),('m231009_162426_create_order_table',1696868727),('m231009_181501_create_order_item_table',1696875426),('m231019_060712_add_column_to_user_table',1697695738);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` smallint(6) NOT NULL,
  `event_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `event_date` date NOT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk-order-event_id` (`event_id`),
  KEY `fk-order-customer_id` (`customer_id`),
  CONSTRAINT `fk-order-customer_id` FOREIGN KEY (`customer_id`) REFERENCES `user` (`id`),
  CONSTRAINT `fk-order-event_id` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
INSERT INTO `order` VALUES (1,0,3,1,'2023-10-27',NULL,'2023-10-12 16:56:00','2023-10-12 16:56:00'),(2,1,2,1,'2023-10-26','asdf','2023-10-12 18:12:25','2023-10-14 12:37:12'),(3,1,1,1,'2023-12-01','652A8DF1EC062-652A8DF1EC06A','2023-10-12 18:14:49','2023-10-18 17:12:52');
/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_item`
--

DROP TABLE IF EXISTS `order_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `extra_item_id` int(11) DEFAULT NULL,
  `table_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk-order_item-order_id` (`order_id`),
  KEY `fk-order_item-extra_item_id` (`extra_item_id`),
  KEY `fk-order_item-table_id` (`table_id`),
  CONSTRAINT `fk-order_item-extra_item_id` FOREIGN KEY (`extra_item_id`) REFERENCES `extra_item` (`id`),
  CONSTRAINT `fk-order_item-order_id` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`),
  CONSTRAINT `fk-order_item-table_id` FOREIGN KEY (`table_id`) REFERENCES `table` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_item`
--

LOCK TABLES `order_item` WRITE;
/*!40000 ALTER TABLE `order_item` DISABLE KEYS */;
INSERT INTO `order_item` VALUES (1,1,'Foliage',26.00,1,2,NULL),(2,1,'Microphone',23.00,3,3,NULL),(3,1,'Speaker',32.00,5,8,NULL),(4,1,'8-10 People',400.00,1,NULL,3),(5,2,'Foliage',26.00,3,2,NULL),(6,2,'Podium',24.00,2,4,NULL),(7,2,'8-10 People',400.00,1,NULL,3),(8,3,'Podium',24.00,4,4,NULL),(9,3,'Speaker',32.00,6,8,NULL),(10,3,'4-6 People',300.00,1,NULL,2);
/*!40000 ALTER TABLE `order_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk-post-author_id` (`author_id`),
  CONSTRAINT `fk-post-author_id` FOREIGN KEY (`author_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` VALUES (3,1,'Aliquid aut quam.','Sunt laudantium omnis illo error. Autem repellat illum doloremque delectus illo. Maiores id numquam molestiae. Hic rerum libero quia labore sequi sit. Similique enim temporibus facilis et. Sed quae aut et in. Provident tempora qui quia est eum quibusdam. Est dolorem dolorem nulla repellendus. Aut eligendi quos et corrupti. Dolor et praesentium rerum fugit aut minus enim. Saepe deserunt sint repellat sit eius repellat occaecati aut. Quas omnis incidunt totam. Nobis libero fuga molestiae similique. Expedita odit officiis voluptas incidunt nihil. Excepturi nihil neque rerum eum enim doloribus repellat. Similique deleniti error consequuntur voluptas ullam. Repudiandae sit dolorem iste dolores assumenda. Enim quasi saepe ipsam molestiae exercitationem officia esse odio. Fugit placeat facilis tempora cupiditate placeat vitae incidunt. Maiores facere dignissimos harum est. Illum fugit eligendi a ut pariatur non ullam. Similique blanditiis aut similique repellat facere. Inventore sit dolores asperiores facilis vel deleniti. Ullam nam dolorum omnis asperiores quia dignissimos. Reiciendis libero aut consequatur commodi voluptates magnam natus doloremque. Rerum quia consequatur laudantium. Alias aut atque quo rem odit minima aut sit. Aliquam vitae commodi quas. Omnis et tenetur velit maxime. Aut tempore enim enim. Sunt dignissimos omnis voluptates voluptatum. Natus saepe mollitia sit minima. Aperiam rerum nulla aut sint odio. Natus commodi eum similique. Excepturi sint tempora laboriosam et. Atque praesentium ut vel cum ut non. Impedit velit enim sunt distinctio possimus et nesciunt in. Nemo quas amet qui quo autem occaecati aut qui. Odit nemo vel adipisci consequatur quis. Mollitia nulla ratione est. Facilis id dolores delectus qui nisi ex. Aut sed rem non corporis aspernatur. Consectetur ab aut et voluptatum officia possimus repellat accusamus. Itaque perferendis repudiandae quis in temporibus et dolorum nihil. Eligendi libero eum qui tempore laboriosam expedita.','0000-00-00 00:00:00'),(4,1,'Voluptate iure ut.','Explicabo autem ipsum impedit quis et aut autem. Sapiente repellendus et blanditiis consequatur. Fuga excepturi dolorem doloremque dicta voluptatem est architecto laborum. Facilis delectus odio sit non enim. Cum aut earum ipsum nihil ut soluta. Iste eos sed officiis atque id distinctio maiores accusantium. Sed nam ducimus similique sunt quis. Alias autem tempora repudiandae laboriosam architecto qui. Ea molestiae odit mollitia nihil dolorem ut. Non maxime asperiores iste. Ducimus mollitia odio nesciunt inventore provident deserunt sunt. Itaque assumenda odit sed error blanditiis quo et dolor. Et molestiae ullam numquam et. Quisquam sit dolor quia necessitatibus. Qui aspernatur aut ratione omnis consectetur ullam sit. Quia tempora deserunt est ullam. Laborum occaecati mollitia aut reprehenderit. Sapiente expedita et quo. Exercitationem minus iure voluptatum et architecto voluptate. Quia rerum sed vitae totam eum. Quia nihil temporibus suscipit reprehenderit. Voluptatem voluptatem explicabo quia blanditiis ad. Doloremque quod adipisci officia. Rerum incidunt possimus vitae debitis ratione non accusantium. Nesciunt eos perspiciatis impedit nam aliquid. Ratione libero rerum dignissimos nemo ex et laudantium. Officiis praesentium soluta sequi ea. Accusantium voluptate unde sequi illum tempore quia cumque esse. Maxime quae dolores deleniti. Illum molestias et rerum doloribus laboriosam. Fugit necessitatibus accusamus occaecati nam sint officia exercitationem. Sapiente error voluptatem inventore illum. Dolores eveniet recusandae ratione earum non non. Fuga reiciendis sunt rerum aut omnis aliquam consequatur. Ea beatae quos distinctio nostrum sed omnis excepturi. Numquam nobis aut et pariatur vel est. Ratione qui vel odio voluptas dolorem. Quo hic fuga ut culpa et. Natus officia pariatur quis voluptas architecto. Molestiae sed in consequuntur vel minima ratione. Consequatur et quas maxime et. Vitae blanditiis delectus sint qui rerum consequuntur quis.','0000-00-00 00:00:00'),(5,1,'Fugit dolores aliquam harum occaecati at consequatur maiores.','et facere in doloribus doloremque ipsam quis ad occaecati libero illo veritatis dolorem quae id et itaque veniam et eos totam est et voluptate aut dolores voluptates dolorem architecto illum consequatur deleniti amet quae ut eveniet autem aspernatur occaecati et enim non qui impedit sit ipsam voluptatem mollitia inventore dolore dolore labore minus quam id incidunt harum occaecati quae qui quod inventore ut id est maiores ducimus culpa cumque unde in exercitationem ab illum minus nihil ut modi deserunt soluta aut delectus sit qui ipsam ullam eos aut recusandae quis fugiat at qui non voluptatem expedita impedit animi repudiandae laboriosam non quibusdam quo quam amet qui quaerat enim dolorum impedit inventore sed quia consequatur aperiam maxime ratione possimus ipsum quidem autem placeat vero similique','0000-00-00 00:00:00'),(6,1,'Autem assumenda voluptatibus id voluptatem non.','sed nihil eos blanditiis quo ipsa iure quia ipsa numquam consectetur est nulla debitis veritatis eum est illo laboriosam fugiat vitae laborum numquam tenetur omnis et quia culpa velit fugiat voluptas id excepturi fugiat deleniti doloremque quasi iusto nulla molestiae incidunt optio natus itaque expedita sed repellendus qui accusantium ea mollitia quibusdam et quia iusto facilis ipsam nobis aspernatur esse sunt delectus fuga iste sed quaerat ipsum eligendi voluptas eaque voluptas nostrum quia earum sed eveniet perspiciatis fugit sunt natus harum autem vero nemo molestiae autem dolores qui sit similique itaque animi ut veritatis vel ipsum incidunt dignissimos aperiam id id error nobis aut repellendus voluptas earum corporis voluptatem nihil voluptas adipisci deleniti ut fugiat expedita odit minima nobis adipisci sed ut dolore eaque sit in nihil enim expedita laborum nobis ipsam porro aliquid quaerat ratione molestiae dolores provident ut possimus sequi nihil officia consequuntur voluptatibus nisi harum impedit ratione ut magni harum eligendi cumque rerum eum cumque non incidunt vel labore iusto dolorum at consectetur eum vel voluptas laboriosam ut excepturi quidem deserunt magnam non et earum qui qui et aperiam possimus vitae ipsam labore unde distinctio nam odit ut reprehenderit optio dolores minima accusamus aut vel incidunt rerum ex dolorem velit dolorum dolore vel ducimus impedit perspiciatis est omnis doloremque ipsum quis cupiditate aspernatur eos illo ipsum exercitationem illum et nihil corrupti sed assumenda alias amet aut ut cupiditate animi cum eum deserunt tenetur atque non voluptates rerum ut sed laboriosam pariatur quaerat quae minus recusandae vitae voluptatem quas qui perspiciatis perspiciatis et omnis quaerat quas sit ea et soluta vitae iste natus minus sed amet et atque occaecati sint voluptatem et veritatis ipsam omnis in libero maxime','0000-00-00 00:00:00'),(7,1,'Ad facilis quia aut odit.','perspiciatis accusantium repudiandae sunt doloremque rerum non sit et maxime quia libero amet nam fugiat maxime qui minus officia dolor consequatur impedit voluptatem exercitationem voluptatem quia ea perspiciatis eligendi placeat ipsam distinctio velit deleniti totam voluptatum beatae itaque illo illo molestiae nihil voluptatem et autem dolores voluptatum sint minus laborumz v j d m v f s s o u g n m a d k d h w s g s l w x m y p e r u u e y z s u v i a p z q s x e y a q n a i p f a t s y h c f u c d x s e z t t n d f m u i t a d r u w u f q x x y r q y b m w n s a w f g g b y y f q m m x i r d r x m r g j q m q j b g u y g u u m n t t b g m d n b y r x s s m w a m h h v f e j k d q d q o t f f v z e v v e x y s r s j f m m w h y l w x c n h d r w i w h z d c a y a j h f w w f h s e q l w s c c g l z x a p j n i y d r p m t e e g k c b s o j i d f g v n q u y f i w u l n f g c b v v c q f q e k d y v d y g z p w o v k w o r f u h z y d t t h z c r p b x h u b f b w u y g e j c m u i r x a e n n c e x t a y h c f i c w n g o s b r d h s r d x y w f f t d r l p w t n i e a m k r x d c i p l u b q i h p z n l a m a x l u k h r g c e u j c r f l t d e e v t z m g o j b e y x s o k q e r z h f c k t v m f m d j m b o s l k i q b i l g m c i o z g g h o n g p o w u b k g f j j h g w p m w k g d v v q v k o o o x j p b s f s k b i c b v k t i d o u w l g n l d s e x g f t m d w v y f w q m v w m y y i y y t a c u p r l h x u x r d x w h a o u j o d q x i d s k x p q c c l n s r z h i r t r j b h z y t d e q y g a t l e k h l f r x k u y g r w z p r c b f b','0000-00-00 00:00:00'),(9,1,'Aut amet expedita non incidunt at exercitationem nihil.','veniam quo aperiam cupiditate ut omnis temporibus ut doloremque necessitatibus voluptates dignissimos ullam qui laboriosam id ipsa non molestiae earum architecto quia totam perferendis officia voluptatum tempora rerum sint ut quia consequatur reiciendis autem quia ducimus aperiam excepturi omnis adipisci iusto aut quaerat nostrum error beatae commodi ducimus atque quae dolorem tempora deleniti aut repellat consequatur perspiciatis optio dicta occaecati autem id quia suscipit quod et cumque nobis totam illo dolor magni aliquid omnis velit rerum dolores quibusdam est aut temporibus non odio praesentium ut aspernatur inventore sequi enim unde quis aliquam quo facere sit doloribus neque veritatis id qui quia enim voluptas enim doloremque necessitatibus ratione unde asperiores consequuntur mollitia sit eaque culpa mollitia incidunt omnis autem explicabo mollitia non dolor perferendis perspiciatis autem tempore impedit unde iste quidem porro quos et ratione itaque hic in minima exercitationem officiis ipsam qui itaque soluta enim nulla sunt illum quis aut sapiente harum vel exercitationem culpa ab reprehenderit vel nihil natus veniam et nulla et consequatur corrupti alias magni et eos quia aperiam qui similique autem blanditiis sit eligendi hic officiis voluptas qui modi aliquid quia incidunt','2023-10-06 17:55:01'),(11,1,'Ipsam perferendis.','Provident iure atque tempora a quia ea. In amet provident aliquid ut explicabo. Quasi iusto eius ea et dolor enim sint distinctio. Aut voluptatem assumenda ut laudantium. Officia aliquid qui aliquid autem ea. Ratione rerum ea ut eos quia nihil impedit impedit. Incidunt nihil dicta quos debitis aut facilis. Quo ad quia facilis quia sunt. Aliquam iste quas expedita perferendis aspernatur. Possimus officia labore earum nulla qui ut. Omnis nihil facilis totam consequatur molestiae animi et. Suscipit recusandae sint hic dolorem rem quas aut. Illum sit officiis quia cupiditate corporis odio. Non veritatis est ducimus assumenda quibusdam vitae voluptatem. Eius et rem sequi et. Natus quia asperiores exercitationem et consequuntur. Dolores dolor tempora a quo. Voluptatum repellat accusantium aut dolorem. Qui sit qui rerum qui ipsa. Atque et porro laudantium ut et atque. Accusantium voluptatem quisquam et porro. Dolorem illum tempora illo pariatur voluptatem mollitia voluptas. Recusandae et distinctio et reprehenderit tempora. Voluptate ut est et ut quia quaerat. Minus dolorum et molestiae iste qui totam consequatur. Ut odio quidem tenetur ipsa est voluptas. Molestiae aperiam pariatur corporis alias quod velit occaecati. Quis voluptas eos vel odit quia nisi. Soluta quisquam ut id nihil dolor corrupti rerum. Quaerat occaecati debitis consequatur quaerat voluptatem et repellat. Odio est mollitia voluptate et. Commodi voluptatibus excepturi esse ab qui id non. Qui vero rerum soluta voluptatem omnis voluptatum. Velit harum fugiat enim placeat voluptate. Et voluptate culpa quod consequatur nihil voluptatum eligendi. Hic et quis quas. Natus a vero qui itaque et. Architecto quo ducimus rem qui ut ullam. Voluptatibus ipsum nulla necessitatibus quaerat. Alias velit placeat nostrum. Quod excepturi qui distinctio ut nulla. Cum delectus debitis molestiae hic magni.','2023-10-07 08:19:18'),(12,1,'Donec ullamcorper felis nec consectetur sollicitudin','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse posuere varius sagittis. Donec mi sapien, condimentum vitae pellentesque ac, iaculis quis leo. Maecenas vitae efficitur quam. Morbi porttitor interdum sapien nec pellentesque. Maecenas et finibus massa. Morbi mattis eu erat at dignissim. Suspendisse quam mauris, efficitur id mauris id, lobortis consequat arcu. Etiam sollicitudin facilisis erat, vulputate pharetra est egestas vel. Vestibulum at consequat nunc. Nam vulputate eu leo et condimentum. Sed ut gravida justo, ut bibendum sem. Donec efficitur tellus a libero auctor sollicitudin. Curabitur eleifend consequat turpis a sodales.\r\n\r\nInteger sagittis lorem in porttitor blandit. Nullam commodo magna ligula, in dignissim risus bibendum in. Etiam porttitor orci et enim imperdiet ultrices. Sed vel lacinia lacus. Ut commodo libero ut ex mattis finibus. Quisque elementum tristique eros in aliquam. Mauris sagittis mollis nunc, sit amet gravida ipsum sollicitudin eget.\r\n\r\nVivamus tempus hendrerit auctor. Nam in odio euismod, mattis leo ut, mattis urna. Maecenas at vehicula nisl. Mauris dui massa, aliquet sed vestibulum non, auctor at velit. Duis nec sem venenatis, gravida orci nec, egestas ipsum. Vestibulum tempor pretium ex, eu vehicula quam laoreet eu. Proin auctor purus leo, malesuada tincidunt enim congue eget. Duis sed efficitur ligula. Curabitur erat dui, pretium id diam vitae, efficitur venenatis massa.\r\n\r\nVivamus molestie turpis eget nibh viverra ultricies. Integer turpis turpis, ultricies sed velit vel, lobortis maximus ipsum. Nam eget elementum dolor. In semper sit amet nunc ornare mollis. Proin pharetra sodales iaculis. In condimentum mi nisi, quis volutpat odio scelerisque at. Mauris eget enim quis ante scelerisque lobortis. Integer faucibus sollicitudin quam, sed feugiat dui interdum mattis. Phasellus ex ligula, eleifend et commodo eget, lobortis in orci. Donec at urna dolor. Nunc faucibus tincidunt nulla, nec cursus lorem. Suspendisse ac mi vehicula, consectetur urna non, consequat enim. Proin sapien eros, euismod et felis et, eleifend aliquet tellus. Vestibulum egestas dictum pulvinar. Praesent et purus tempor nisl consequat finibus.\r\n\r\nDonec ullamcorper felis nec consectetur sollicitudin. Nulla pellentesque odio iaculis dui aliquet rutrum. Pellentesque lacinia mollis sapien non imperdiet. Sed sagittis magna sit amet mollis luctus. Vivamus placerat odio et lectus tincidunt, non congue tortor maximus. Aliquam erat volutpat. Phasellus sed malesuada arcu. Vivamus ultricies pretium porta. Nulla condimentum, metus id semper consequat, lorem sapien volutpat mauris, non dictum orci eros eget odio. Maecenas facilisis, arcu id laoreet rhoncus, elit elit sagittis lacus, in blandit erat quam eget turpis. Integer pretium dolor sapien, eu consectetur orci luctus in. Praesent gravida erat nec augue eleifend tristique. Mauris ac euismod lorem, placerat cursus ex. Curabitur id mattis justo. Sed commodo, quam non vehicula tincidunt, mi arcu consequat felis, in dapibus ante leo eget ipsum.','2023-10-07 12:23:00'),(13,1,'Porro tempore et vero voluptates ipsum ut at.','nobis ea labore nam animi est corporis id fugiat incidunt possimus doloribus illo aut aperiam delectus numquam voluptas ipsum et ad laudantium et eaque similique voluptas fugiat dignissimos vel commodi ea voluptatem occaecati iste sunt voluptatibus qui iusto sit dolorem quia exercitationem explicabo maiores eligendi maiores voluptatem sint eum quia fugiat libero ex sit ex vero illo et vel cum beatae consequatur numquam aut quam impedit vitae sint ipsa voluptatem dolorum ipsam qui repellendus dolore recusandae suscipit sunt aliquam dolores magnam doloribus id a adipisci sit suscipit dolor ipsam et rerum sunt exercitationem ipsam ducimus aut suscipit omnis commodi minus quis et est asperiores delectus molestiae molestiae aliquid id rem et laudantium id eligendi eveniet occaecati id mollitia ducimus harum aliquam saepe a suscipit illum cupiditate consequuntur voluptatem accusantium magni totam ut veniam voluptatem et recusandae error temporibus repellat qui similique aliquid qui minus non voluptas ab earum maxime ullam facilis deleniti repudiandae delectus rerum mollitia ut et rerum iure esse fugiat et nam aliquam modi consectetur id nihil velit omnis qui qui et sed itaque ut dolor in voluptatum voluptatibus velit aut incidunt soluta et et qui repellat unde ipsa sed eos et aut error et distinctio ea ut consequatur voluptatem eum sunt dolor nihil et officiis assumenda incidunt qui ab sunt esse vel quod id quasi nihil in accusantium sint illo laborum eligendi ducimus iure tempora qui hic accusantium voluptate soluta illo est ut quasi molestiae vel amet qui vel sint a recusandae enim velit error ratione a dolorem placeat sit doloribus non in non praesentium qui similique','2023-10-09 11:35:52'),(14,1,'Consequuntur mollitia quia quibusdam a voluptates aut esse.','ipsa sint dolorem explicabo saepe non velit et ut suscipit dolores reprehenderit autem consectetur aut id voluptate in sed veniam velit sit ut tenetur quam expedita eveniet minus quam quia at autem sapiente laborum ipsam sunt commodi libero officia in est et ea deleniti qui sunt corporis autem autem adipisci qui recusandae quos voluptatum repellat expedita eaque et est dolores rem necessitatibus non iusto quis omnis dolorem exercitationem ut molestiae eum omnis quo est et repellat architecto in neque quis libero nihil minus et rerum molestiae voluptatibus voluptas qui sint aut nihil suscipit libero ut ad ab ut qui accusamus adipisci recusandae consectetur voluptate qui nemo excepturi laudantium velit nesciunt quos eligendi eligendi possimus neque explicabo aut itaque voluptate consequatur eligendi non voluptatem maxime placeat culpa accusamus eos qui qui minus rem porro occaecati voluptas aut dolor minus officiis asperiores pariatur velit iste culpa eligendi delectus dolorem dolor hic voluptatum quia minus veniam consequuntur voluptatem fuga reprehenderit voluptate ab qui voluptatem explicabo qui quis voluptatem facilis atque totam autem rerum repudiandae saepe ratione ipsam repudiandae aliquam explicabo enim neque odit qui aut reprehenderit tempore enim dolor at sapiente velit qui perferendis necessitatibus nostrum quidem autem quo ut voluptatem sint quod voluptatibus in aut est suscipit ratione illo aut numquam id asperiores reiciendis et qui minima maiores iusto dolor ipsa sit aut sit accusantium sapiente tempore qui unde nostrum sequi natus dolore rerum aliquid deleniti assumenda perferendis nostrum temporibus rerum doloribus aut sit libero dolorum eveniet saepe harum aut laboriosam optio facilis nemo','2023-10-09 11:41:26');
/*!40000 ALTER TABLE `post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table`
--

DROP TABLE IF EXISTS `table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `is_custom` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table`
--

LOCK TABLES `table` WRITE;
/*!40000 ALTER TABLE `table` DISABLE KEYS */;
INSERT INTO `table` VALUES (1,'2','People',200.00,0),(2,'4-6','People',300.00,0),(3,'8-10','People',400.00,0),(4,'12','People',500.00,0),(5,'12+','People',0.00,1);
/*!40000 ALTER TABLE `table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `text_block`
--

DROP TABLE IF EXISTS `text_block`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `text_block` (
  `shortcut` varchar(255) NOT NULL,
  `text` text,
  PRIMARY KEY (`shortcut`),
  UNIQUE KEY `shortcut` (`shortcut`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `text_block`
--

LOCK TABLES `text_block` WRITE;
/*!40000 ALTER TABLE `text_block` DISABLE KEYS */;
INSERT INTO `text_block` VALUES ('about1','Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod\n            tincidunt ut lao dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis\n            nostrud exerci tation ullamcorper lobortis\n            nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hend rerit in\n            vulputate esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros\n            et accumsan et iusto odioqui blandit\n            praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.Duis autem vel\n            eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dol ore\n            eu feugiat nulla facilisis at vero\n            eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue\n            duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option\n            congue nihil imperdiet doming id quod\n            mazim placerat facer possim assum.'),('about2','Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod\r\n            tincidunt ut lao dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis\r\n            nostrud exerci tation ullamcorper lobortis\r\n            nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hend rerit in\r\n            vulputate esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros\r\n            et accumsan et iusto odioqui blandit\r\n            praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.Duis autem vel\r\n            eum iriure dolor in hendrerit in vulputate velit esse. Et et debitis quisquam magnam laudantium ullam. Non esse sed voluptas consequatur qui ab placeat.'),('about3','Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod\n            tincidunt ut laodolore magna aliquam erat volutpat. Ut wisi minim veniam, quis nostrud\n            exerci tation ullamcorper lobortis nisl ut\n            aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in v esse\n            molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et\n            iusto odio diqui blandit praesent\n            luptatum zzril delenit aug s dolore te feugait nulla facilisi.Lorem ipsum dolor sit amet,\n            consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laodolore magna m\n            erat volutpat. Ut wisi enim ad minim\n            veniam, quis nostrud exerci tation ullamcorper lobortis nisl ut aliquip ex ea commodo\n            consequat. Duis autem vel riure dolor in hendrerit in vulputateesse molestie consequat, vel\n            illum dolore eu feugiat nulla facilisis\n            at vero eros et accumsan et iusto odio diqui blandit nt luptatum zzril delenit augue duis\n            dolore te feugait nulla facilisi.');
/*!40000 ALTER TABLE `text_block` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_admin` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'test','4K7xUV48O7Knhsnh22LItBzRQot9ElxQ','$2y$13$EpVdV0L/41zSKSvI9bgTceiOfzb08W4ABdfxK1uOowSeutf1GOcKC',NULL,'test@test.test',10,1696438224,1697696734,'5_GtnP7gte_GFtSiY2XZqwFOMEzJb2qK_1696438224','Test','Testov','38177 Martine Junctions','Tambov','8800200600',1),(103,'tod.yundt','1IbEMO63nPbOSDLURW8YVsmW2rxZBHxe','$2y$13$V5.G.RLfTfrHFqwS4Mx4CeY7i2OzxoYWCjA0CHOgyTjdwmjGVYP8m',NULL,'hill.anika@grady.com',9,1696684765,1696684765,'Cvlkl8iGbqEo73WtJ689BEvWCDKfuRRu_1696684765',NULL,NULL,NULL,NULL,NULL,0),(105,'mraz.foster','SFYmAO6FysD0WNKI1wEoM4G650BrOpck','$2y$13$Aj6giDLrsZhwQjJe/Pwol.sWMFWLVx0GNnlK0OFaSCKQWLleDRkHu',NULL,'pearline33@terry.com',9,1696687466,1696687466,'4ZcwRnPZg_ygbO55_-XsZxTjgs8C3eb3_1696687466',NULL,NULL,NULL,NULL,NULL,0),(107,'test2','j-Jkl_C0AeOFP-Vuyx27-ds2Mr6JrZ84','$2y$13$mmaOvndJfpINhiPDCbWvBOH39iVDv1t3TdzwwaluttV7o0EIVUARK',NULL,'test2@test.test',9,1696690317,1696690317,'1RZcSqmDmyIu96oHQv8gTCZjQmqYrQXF_1696690317',NULL,NULL,NULL,NULL,NULL,0),(108,'serenity37','Qoe0SLafydL9Zawat4EloOz1CF1Pjyjd','$2y$13$PWC3IpRkd10sSWcd8P2io.7ufATDLDiK8l1gROo5XuTo2PjrDSXyG',NULL,'pdickens@yahoo.com',9,1696690391,1696690391,'bnb-kzHu8QJI7grKcv9JSgFbRUYuIdDE_1696690391',NULL,NULL,NULL,NULL,NULL,0),(109,'vparisian','bzxnKZqyEWgEpb66-gwXT3BYNm645Psv','$2y$13$kZucQesINiBhBuZE1XjzIucV3qm07OT2NJmhKhocX4GITqk6oxoea',NULL,'emerson.schuppe@gmail.com',9,1696690701,1696690701,'VeX5EFOkGPOBnT4DJblUb_6bWYG0eqHx_1696690701',NULL,NULL,NULL,NULL,NULL,0);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-10-19 15:53:04
