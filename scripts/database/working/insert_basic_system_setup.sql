LOCK TABLES `country` WRITE;
/*!40000 ALTER TABLE `country` DISABLE KEYS */;
INSERT INTO `country` VALUES (1,'Deutschland','DE','active'),(2,'Austria','AT','active'),(3,'Belgium','BE','active'),(4,'Canada','CA','active'),(5,'China','CN','active'),(6,'España','ES','active'),(7,'Finland','FI','active'),(8,'France','FR','active'),(9,'Greece','GR','active'),(10,'Italia','IT','active'),(11,'Japan','JP','active'),(12,'Luxemburg','LU','active'),(13,'Nederland','NL','active'),(14,'Polska','PL','active'),(15,'Portugal','PT','active'),(16,'Czech Republic','CZ','active'),(17,'United Kingdom','GB','active'),(18,'Sweden','SE','active'),(19,'Switzerland','CH','active'),(20,'Denmark','DK','active'),(21,'USA','US','active'),(22,'HongKong','HK','active'),(23,'Norway','NO','active'),(24,'Australia','AU','active'),(25,'Singapore','SG','active'),(26,'Éire','IE','active'),(27,'New Zealand','NZ','active'),(28,'South Korea','KR','active'),(29,'מדינת ישראל','IL','active'),(30,'South Africa','ZA','active'),(31,'Nigeria','NG','active'),(32,'Ivory Coast','CI','active'),(33,'Togo','TG','active'),(34,'Bolivia','BO','active'),(35,'Mauritius','MU','active'),(36,'Romania','RO','active'),(37,'Slovensko','SK','active'),(38,'Algeria','DZ','active'),(39,'American Samoa','AS','active'),(40,'Andorra','AD','active'),(41,'Angola','AO','active'),(42,'Anguilla','AI','active'),(43,'Antigua and Barbuda','AG','active'),(44,'Argentina','AR','active'),(45,'Armenia','AM','active'),(46,'Aruba','AW','active'),(47,'Azerbaijan','AZ','active'),(48,'Bahamas','BS','active'),(49,'Bahrain','BH','active'),(50,'Bangladesh','BD','active'),(51,'Barbados','BB','active'),(52,'Belarus','BY','active'),(53,'Belize','BZ','active'),(54,'Benin','BJ','active'),(55,'Bermuda','BM','active'),(56,'Bhutan','BT','active'),(57,'Botswana','BW','active'),(58,'Brazil','BR','active'),(59,'Brunei','BN','active'),(60,'Burkina Faso','BF','active'),(61,'Burma (Myanmar)','MM','active'),(62,'Burundi','BI','active'),(63,'Cambodia','KH','active'),(64,'Cameroon','CM','active'),(65,'Cape Verde','CV','active'),(66,'Central African Republic','CF','active'),(67,'Chad','TD','active'),(68,'Chile','CL','active'),(69,'Colombia','CO','active'),(70,'Comoros','KM','active'),(71,'Congo, Dem. Republic','CD','active'),(72,'Congo, Republic','CG','active'),(73,'Costa Rica','CR','active'),(74,'Croatia','HR','active'),(75,'Cuba','CU','active'),(76,'Cyprus','CY','active'),(77,'Djibouti','DJ','active'),(78,'Dominica','DM','active'),(79,'Dominican Republic','DO','active'),(80,'East Timor','TL','active'),(81,'Ecuador','EC','active'),(82,'Egypt','EG','active'),(83,'El Salvador','SV','active'),(84,'Equatorial Guinea','GQ','active'),(85,'Eritrea','ER','active'),(86,'Estonia','EE','active'),(87,'Ethiopia','ET','active'),(88,'Falkland Islands','FK','active'),(89,'Faroe Islands','FO','active'),(90,'Fiji','FJ','active'),(91,'Gabon','GA','active'),(92,'Gambia','GM','active'),(93,'Georgia','GE','active'),(94,'Ghana','GH','active'),(95,'Grenada','GD','active'),(96,'Greenland','GL','active'),(97,'Gibraltar','GI','active'),(98,'Guadeloupe','GP','active'),(99,'Guam','GU','active'),(100,'Guatemala','GT','active'),(101,'Guernsey','GG','active'),(102,'Guinea','GN','active'),(103,'Guinea-Bissau','GW','active'),(104,'Guyana','GY','active'),(105,'Haiti','HT','active'),(106,'Heard Island and McDonald Islands','HM','active'),(107,'Vatican City State','VA','active'),(108,'Honduras','HN','active'),(109,'Iceland','IS','active'),(110,'India','IN','active'),(111,'Indonesia','ID','active'),(112,'Iran','IR','active'),(113,'العراق','IQ','active'),(114,'Isle of Man','IM','active'),(115,'Jamaica','JM','active'),(116,'Jersey','JE','active'),(117,'Jordan','JO','active'),(118,'Kazakhstan','KZ','active'),(119,'Kenya','KE','active'),(120,'Kiribati','KI','active'),(121,'Korea, Dem. Republic of','KP','active'),(122,'Kuwait','KW','active'),(123,'Kyrgyzstan','KG','active'),(124,'Laos','LA','active'),(125,'Latvia','LV','active'),(126,'Lebanon','LB','active'),(127,'Lesotho','LS','active'),(128,'Liberia','LR','active'),(129,'Libya','LY','active'),(130,'Liechtenstein','LI','active'),(131,'Lithuania','LT','active'),(132,'Macau','MO','active'),(133,'Република Македонија','MK','active'),(134,'Madagascar','MG','active'),(135,'Malawi','MW','active'),(136,'Malaysia','MY','active'),(137,'Maldives','MV','active'),(138,'Mali','ML','active'),(139,'Malta','MT','active'),(140,'Marshall Islands','MH','active'),(141,'Martinique','MQ','active'),(142,'Mauritania','MR','active'),(143,'Hungary','HU','active'),(144,'Mayotte','YT','active'),(145,'Mexico','MX','active'),(146,'Micronesia','FM','active'),(147,'Moldova','MD','active'),(148,'Monaco','MC','active'),(149,'Mongolia','MN','active'),(150,'Montenegro','ME','active'),(151,'Montserrat','MS','active'),(152,'Morocco','MA','active'),(153,'Mozambique','MZ','active'),(154,'Namibia','NA','active'),(155,'Nauru','NR','active'),(156,'Nepal','NP','active'),(157,'Netherlands Antilles','AN','active'),(158,'New Caledonia','NC','active'),(159,'Nicaragua','NI','active'),(160,'Niger','NE','active'),(161,'Niue','NU','active'),(162,'Norfolk Island','NF','active'),(163,'Northern Mariana Islands','MP','active'),(164,'Oman','OM','active'),(165,'Pakistan','PK','active'),(166,'Palau','PW','active'),(167,'Palestinian Territories','PS','active'),(168,'Panama','PA','active'),(169,'Papua New Guinea','PG','active'),(170,'Paraguay','PY','active'),(171,'Perú','PE','active'),(172,'Philippines','PH','active'),(173,'Pitcairn','PN','active'),(174,'Puerto Rico','PR','active'),(175,'Qatar','QA','active'),(176,'Réunion','RE','active'),(177,'Russian Federation','RU','active'),(178,'Rwanda','RW','active'),(179,'Saint Barthélemy','BL','active'),(180,'Saint Kitts and Nevis','KN','active'),(181,'Saint Lucia','LC','active'),(182,'Saint Martin','MF','active'),(183,'Saint Pierre and Miquelon','PM','active'),(184,'Saint Vincent and the Grenadines','VC','active'),(185,'Samoa','WS','active'),(186,'San Marino','SM','active'),(187,'São Tomé and Príncipe','ST','active'),(188,'Saudi Arabia','SA','active'),(189,'Senegal','SN','active'),(190,'Serbia','RS','active'),(191,'Seychelles','SC','active'),(192,'Sierra Leone','SL','active'),(193,'Slovenia','SI','active'),(194,'Solomon Islands','SB','active'),(195,'Somalia','SO','active'),(196,'South Georgia','GS','active'),(197,'Sri Lanka','LK','active'),(198,'Sudan','SD','active'),(199,'Suriname','SR','active'),(200,'Svalbard and Jan Mayen','SJ','active'),(201,'Swaziland','SZ','active'),(202,'Syria','SY','active'),(203,'Taiwan','TW','active'),(204,'Tajikistan','TJ','active'),(205,'Tanzania','TZ','active'),(206,'Thailand','TH','active'),(207,'Tokelau','TK','active'),(208,'Tonga','TO','active'),(209,'Trinidad and Tobago','TT','active'),(210,'Tunisia','TN','active'),(211,'Turkey','TR','active'),(212,'Turkmenistan','TM','active'),(213,'Turks and Caicos Islands','TC','active'),(214,'Tuvalu','TV','active'),(215,'Uganda','UG','active'),(216,'Ukraine','UA','active'),(217,'United Arab Emirates','AE','active'),(218,'Uruguay','UY','active'),(219,'Uzbekistan','UZ','active'),(220,'Vanuatu','VU','active'),(221,'Venezuela','VE','active'),(222,'Vietnam','VN','active'),(223,'Virgin Islands (British)','VG','active'),(224,'Virgin Islands (U.S.)','VI','active'),(225,'Wallis and Futuna','WF','active'),(226,'Western Sahara','EH','active'),(227,'Yemen','YE','active'),(228,'Zambia','ZM','active'),(229,'Zimbabwe','ZW','active'),(230,'Albania','AL','active'),(231,'Afghanistan','AF','active'),(232,'Antarctica','AQ','active'),(233,'Bosnia and Herzegovina','BA','active'),(234,'Bouvet Island','BV','active'),(235,'British Indian Ocean Territory','IO','active'),(236,'Bulgaria','BG','active'),(237,'Cayman Islands','KY','active'),(238,'Christmas Island','CX','active'),(239,'Cocos (Keeling) Islands','CC','active'),(240,'Cook Islands','CK','active'),(241,'French Guiana','GF','active'),(242,'French Polynesia','PF','active'),(243,'French Southern Territories','TF','active'),(244,'Åland Islands','AX','active');
/*!40000 ALTER TABLE `country` ENABLE KEYS */;
UNLOCK TABLES;



INSERT INTO `language` VALUES (1,'English','en','active','2013-09-03 23:43:38','2013-11-20 15:55:45');



INSERT INTO `user` VALUES (1, 1, NULL, 'admin','martin@sysco.no','$2y$14$gOh0dBlSEXrg99EyNWoGquC5heJTZgw18o0bZEcu5x4YX8kxFNsNS','Vidum','Admin','Vidum Admin','Vidumgata 3','0566','OSLO','4797785632','4797785632','2013-09-04 19:25:02', '9cd476d0e3329e41179e451ad4dfdee6dca6dbdb', NULL, NULL, NULL, 1);


LOCK TABLES `user_role` WRITE;
/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;
INSERT INTO `user_role` VALUES ('user',NULL,'User',1),('admin','user','Admin',0),('guest',NULL,'Guest',0);
/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;
UNLOCK TABLES;

INSERT INTO `user_role_linker` VALUES (1,'admin');

INSERT INTO `equipment_instance_taxonomy`(`equipment_instance_taxonomy_id`,`type`,`name`,`slug`,`description`,`order`,`status`) VALUES (1,'usage','In usage',NULL,NULL,NULL,NULL),(2,'usage','Not found',NULL,NULL,NULL,NULL),(3,'usage','In storage',NULL,NULL,NULL,NULL),(4,'usage','Prohibited for use',NULL,NULL,NULL,NULL),(5,'usage','Discarded',NULL,NULL,NULL,NULL);

INSERT INTO `periodic_control_taxonomy`(`periodic_control_taxonomy_id`,`type`,`name`,`slug`,`description`,`order`,`status`) VALUES (1,'approval','Approved',NULL,NULL,NULL,NULL),(2,'approval','Temporarily approved',NULL,NULL,NULL,NULL),(3,'approval','Not approved',NULL,NULL,NULL,NULL);

/*attachament_taxonomy*/
INSERT INTO `attachment_taxonomy` VALUES (1, 'Certificate', '', '', '', NULL, 'active');
INSERT INTO `attachment_taxonomy` VALUES (2, 'Control form', '', '', '', NULL, 'active');
INSERT INTO `attachment_taxonomy` VALUES (3, 'User manual', '', '', '', NULL, 'active');
INSERT INTO `attachment_taxonomy` VALUES (4, 'CV', '', '', '', NULL, 'active');
INSERT INTO `attachment_taxonomy` VALUES (5, 'Competency proof', '', '', '', NULL, 'active');
INSERT INTO `attachment_taxonomy` VALUES (6, 'Control form template', '', '', '', NULL, 'active');
INSERT INTO `attachment_taxonomy` VALUES (7, 'Report', '', '', '', NULL, 'active');
INSERT INTO `attachment_taxonomy` VALUES (8, 'Declaration of conformity', '', '', '', NULL, 'active');
INSERT INTO `attachment_taxonomy` VALUES (9, 'Other', '', '', '', NULL, 'active');
