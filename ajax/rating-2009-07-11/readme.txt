-- 
-- Table structure for table `ratings`
-- 
CREATE TABLE `ratings` (
  `id` varchar(11) NOT NULL,
  `total_votes` int(11) NOT NULL default '0',
  `total_value` int(11) NOT NULL default '0',
  `used_ips` longtext,
  PRIMARY KEY  (`id`)
);

INSERT INTO `ratings` (`id`, `total_votes`, `total_value`, `used_ips`) VALUES ('1', 8, 27, 'a:8:{i:0;s:9:"127.0.0.1";i:1;s:9:"127.0.0.1";i:2;s:9:"127.0.0.1";i:3;s:9:"127.0.0.1";i:4;s:9:"127.0.0.1";i:5;s:9:"127.0.0.1";i:6;s:9:"127.0.0.1";i:7;s:9:"127.0.0.1";}');