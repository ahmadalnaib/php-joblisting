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
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
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

  public function query($query)
  {
    try {
      $stmt = $this->conn->prepare($query);
      $stmt->execute();
      return $stmt;
    } catch (PDOException $e) {
      throw new Exception("Query failed " . $e->getMessage());
    }
  }
}
