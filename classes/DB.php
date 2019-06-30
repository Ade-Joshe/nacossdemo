<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/utils.php';

class DB {
  private static $_instance;
  protected $_dbh;
  protected $_stmt;
  protected $_error = false;
  protected $_count;

  private function __construct() {
    try {
      $this->_dbh = new PDO(Config::get('db:dsn'), Config::get('db:user'), Config::get('db:password'), [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
      ]);
      self::$_instance = $this;
    }
    catch (PDOException $e) {
      debug($e->getMessage(), 0);
      $this->_error = true;  
    }

    return $this;
  }

  public static function getInstance() {
    if (isset(self::$_instance)) {
      return self::$_instance;
    } else {
      return new DB();
    }
  }

  public function query($sql, $params = []) {
    $this->_error = false;
    $this->_count = 0;
    try {
      $this->_stmt = $this->_dbh->prepare($sql);
      $i = 0;
      if ($params) {
        foreach ($params as $param) {
          $this->_stmt->bindValue(++$i, $param);
        }
      }
      $this->_stmt->execute();
      $this->_count = $this->_stmt->rowCount();
    } catch (Exception $e) {
      debug($e->getMessage(), 1);
      $this->_error = true;
    }
    // debug($sql . '<br>');
    // var_dump($params);
    return $this->_stmt;
  }

  public function select($table = null, $keys_params = []) {
    if ($table == null) { $this->_error = true; return; }

    $sql = "SELECT * FROM $table ";
    $query = "WHERE ";
    $params = [];
    
    if ($count = count($keys_params)) {
      foreach ($keys_params as $key => $param) {
        $query .= "$key = ? ";
        if (--$count > 0) $query .= "and ";
        array_push($params, $param);
      }
      $sql .= $query;
    }

    return $this->query($sql, $params);
  }

  public function insert($table = null, $keys_params = []) {
    if ($table == null) { $this->_error = true; return; }

    $sql = "INSERT INTO  $table ( ";
    $columns = " ";
    $values = " VALUES( ";
    $params = [];
    
    // Loop thorugh columns
    if ($count = count($keys_params)) {
      foreach ($keys_params as $key => $param) {
        $columns .= " $key "; // Add column
        $values .= " ? "; // Add value
        if (--$count > 0) {
          $columns .= ", ";
          $values .= ', ';
        }
        array_push($params, $param);
      }
      $columns .= " ) ";
      $values .= " ) ";
      $sql .= $columns;
      $sql .= $values;
    }

    return $this->query($sql, $params);
  }

  public function modify($table = null, $keys_params = [], $find_by_params = []) {
    if ($table == null) { $this->_error = true; return; }

    $sql = "UPDATE $table set ";
    $columns = "";
    $values = "WHERE ";
    $params = [];
    
    if ($count = count($keys_params)) {
      foreach ($keys_params as $key => $param) {
        $columns .= " $key = ? ";
        if (--$count > 0) $columns .= ", ";
        array_push($params, $param);
      }
      $sql .= $columns;
    }

    if ($count = count($find_by_params)) {
      foreach ($find_by_params as $key => $param) {
        $columns .= " $key = ? ";
        if (--$count > 0) $columns .= " and ";
        array_push($params, $param);
      }
      $sql .= "WHERE $key = ?";
    }

    return $this->query($sql, $params);
  }

  public function delete($table = null, $keys_params = []) {
    if ($table == null) { $this->_error = true; return; }

    $sql = "DELETE FROM $table ";
    $query = "WHERE ";
    $params = [];
    
    if ($count = count($keys_params)) {
      foreach ($keys_params as $key => $param) {
        $query .= "$key = ? ";
        if (--$count > 0) $query .= "and ";
        array_push($params, $param);
      }
      $sql .= $query;
    }

    return $this->query($sql, $params);
  }

  public function count() {
    return $this->_count;
  }

  public function error() {
    return $this->_error ?? false;
  }

}