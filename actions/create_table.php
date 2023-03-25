<?php
require_once 'components/htmlhelper.php';
head(" | Overview");

include 'db_connection';

if (!$mysqli->set_charset('utf8mb4')) {
  echo 'Error with Charset: ' . $mysqli->error;
}

$sql = 'CREATE TABLE IF NOT EXISTS items  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(64) NOT NULL,
  `isbn` char(13) NOT NULL,
  `short_description` text NOT NULL,
  `item_type` enum(\'BOOK\',\'CD\',\'DVD\') NOT NULL DEFAULT \'BOOK\',
  `picture` varchar(64) NOT NULL DEFAULT \'product.png\',
  `author_first_name` varchar(32),
  `author_last_name` varchar(64) NOT NULL,
  `publisher_name` varchar(32) NOT NULL,
  `publisher_address` varchar(255) NOT NULL,
  `publish_date` date NOT NULL DEFAULT \'2000-10-10\',
  `available` enum(\'0\',\'1\') NOT NULL DEFAULT \'1\',
  PRIMARY KEY (`id`)
)';
if ($mysqli->query($sql)) {
  echo 'SQL-Command executed: ' . $sql;
} else {
  echo 'Error';
}


$mysqli->close();

htmlend();
