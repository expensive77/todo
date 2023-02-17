<?php 

namespace Classes\Connection;
use Classes\Connection\ConnectionInterface;
use PDO;

class Connection implements ConnectionInterface
{
  private static $instance = null;
  private $host = "localhost";
  private $name = "pdoposts";
  private $user = "root";
  private $pass = "12345";

  private PDO $conn;

  private function __construct()
  {
    $this->conn = new PDO(
      "mysql:host={$this->host};dbname={$this->name}",
      $this->user,
      $this->pass,
      array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'")
    );
  }

  public static function getInstance()
  {
    if (!isset(self::$instance)) {
      self::$instance = new Connection;
    }

    return self::$instance;
  }

  public function getConnection(): PDO
  {
    return $this->conn;
  }
}

?>