<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/utils.php';

class Flash {
  public static function get ($key = null) {
    if (self::exists($key)) {
      $flashed_message = $_SESSION[$key];
      self::delete($key);
      return $flashed_message;
    }
    return false;
  }

  public static function store ($key = null, $value = null) {
    $_SESSION[$key] = $value;
  }

  public static function delete ($key = null) {
    if (self::exists($key)) {
      unset($_SESSION[$key]);
    }
  }

  public static function exists ($key = null) {
    if ($key and isset($_SESSION[$key])) {
      return true;
    };
    return false;
  }
}