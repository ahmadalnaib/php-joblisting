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
    ];

    try {
      $this->conn = new PDO($dsn, $config['username'], $config['password'], $options);
    } catch (PDOException $e) {
      throw new PDOException("Database connection failed " . $e->getMessage());
    }
  }
}
