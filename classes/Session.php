<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/utils.php';

class Session {
  public static function get ($key = null) {
    if (self::exists($key)) {
      return $_SESSION[$key];
    }
    return null;
  }

  public static function store ($key = null, $value = null) {
    return $_SESSION[$key] = $value;
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