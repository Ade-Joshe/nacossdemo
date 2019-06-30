<?php

class Request {
  public static function method() {
    return $_SERVER['REQUEST_METHOD'];
  }

  public static function isGet() {
    return self::method() == 'GET' ? true : false;
  }

  public static function isPost() {
    return self::method() == 'POST' ? true : false;
  }

  public static function getAll() {
    return $_POST;
  }

  public static function body($property) {
    return self::exists($property) ? $_POST[$property] : null;
  }

  public static function exists($property) {
    if ($property and isset($_POST[$property])) {
      return true;
    }
    return false;
  }
}