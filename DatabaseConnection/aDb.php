<?php 

namespace Aron\DatabaseConnection;

use Exception;
use PDO;

class aDb {
  private static $dataBase;
  
  public function __construct() {
    throw new Exception("Cannot create instance of aDb");
  }
  
  public function getDb() {
    if (self::$dataBase === null) {
      $dsn = 'mysql:dbname=' . $_ENV['DB_NAME'] . ';host=' . $_ENV['DB_HOST'] ;
      $user = $_ENV['DB_USER'];
      $password = $_ENV['DB_PASSWORD'];
      self::$dataBase = new PDO($dsn, $user, $password);
    }
    return self::$dataBase;
  }
}  
