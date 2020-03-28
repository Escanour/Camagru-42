<?php
class init {
  private $dbConnection;

  function __construct() {
    require_once './db.php';
    $this->$dbConnection = $this->connectionDB();
    $this->createDB();
    $td = new database();
$td->execute("CREATE TABLE `user` (
  `UID` int(3) PRIMARY KEY AUTO_INCREMENT,
  `USERNAME` varchar(100) NOT NULL,
  `EMAILID` varchar(100) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `JOINDATE` varchar(100) NOT NULL,
)") ;
$td->execute('CREATE TABLE `posts` (
  `id_post` int(11) PRIMARY KEY AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `image` varchar(255) latin1_swedish_ci NOT NULL,
  `date_creation` datetime NOT NULL,
)');
$td->execute('CREATE TABLE `likes` (
  `id_like` int(11) PRIMARY KEY AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
)');
$td->execute('CREATE TABLE `comment` (
  `id_com` int(11) PRIMARY KEY AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `comnt` varchar(255) latin1_swedish_ci NOT NULL,
)');
  $td->disconnect();
}
  // Establish a connection the connection with mySQL
  function connectionDB() {
    require 'db.php';
    try {
      $dbConnection = new PDO("mysql:host=" . $dbhost, $dbuser, $dbpass);
    } catch (PDOException $e) { // PDOException
      die('\DB ERROR : ' .$e->getMessage());
    }
    return $dbConnection;
  }

  // Create the database named using $DB_NAME
  function createDB() {
    require 'db.php';
    $sql = $this->dbh->exec("CREATE DATABASE IF NOT EXISTS `$dbname`;
            CREATE USER '$dbuser'@'localhost' IDENTIFIED BY '$dbpass';
            GRANT ALL ON `$dbname`.* TO '$dbuser'@'localhost';
            FLUSH PRIVILEGES;")
    or die(print('Error - createDB: ').print_r($this->$dbConnection->errorInfo(), true));
    echo "Database `$dbname` created <br>";
  }

  // Delete the database $DB_NAME
  function deleteDB() {
    require 'db.php';
    $sql = $this->$dbConnection->exec("DROP DATABASE `$dbname`")
    or die(print('Error - deleteDB: ').print_r($this->$dbConnection->errorInfo(), true));
    echo "Database `$dbname` deleted <br>";
  }
}

include('./db.php');
$create = new init();

