<?php

class Database
{
  public $conn;

  /**
   * Constructor for the Database class
   * 
   * @param array $config
   */

  public function __construct($config)
  {
    $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};port={$config['port']};";

    $options = [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      // PDO::FETCH_ASSOC: returns an array $LISTINGS['title']
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
    ];

    try {
      $this->conn = new PDO($dsn, $config['username'], $config['password'], $options);
    } catch (PDOException $e) {
      throw new PDOException("Database connection failed " . $e->getMessage());
    }
  }

  /**
   * Query the database
   * 
   * @param string $sql
   * @param PDFStatement $params
   * 
   * @return array
   */

  public function query($query,$params=[])
  {
    try {
      $stmt = $this->conn->prepare($query);
      foreach ($params as $key => $value) {
        $stmt->bindValue(":$key", $value);
      }
      $stmt->execute();
      return $stmt;
    } catch (PDOException $e) {
      throw new Exception("Query failed " . $e->getMessage());
    }
  }
}
