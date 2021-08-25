<?php 
  
class aDb {
  private $dataBase;
  
  public function __construct() {
    throw new Exception("Cannot create instance of aDb");
  }
  
  public function getDb() {
    if ($dataBase === null) {
      $dsn = 'mysql:dbname=' . $_ENV['DB_NAME'] . ';host=' . $_ENV['DB_HOST'] ;
      $user = $_ENV['DB_USER'];
      $password = $_ENV['DB_PASSWORD'];
      $dataBase = new PDO($dsn, $user, $password);
    }
    return $dataBase;
  }
}  
