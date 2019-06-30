<?php
require_once 'Session.php';
require_once 'Config.php';
require_once 'Request.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/utils.php';

class Token {
  
  public static function generate() {
    $token = bin2hex(random_bytes(32));
    $token_name = Config::get('token_name');
    Session::store($token_name, $token);
    return $token;
  }

  public static function validate() {
    $token_name = Config::get('token_name');
    $token = Session::get($token_name);
    if ($token and ($token === Request::body('token'))) {
      self::delete($token_name);
      return true;
    }
    return false;
  }

  public static function delete ($key = null) {
    if (self::exists($key)) {
      Session::delete(Config::get('token_name'));
    }
  }

  public static function exists ($key = null) {
    if ($key and Session::exists($key)) {
      return true;
    };
    return false;
  }
}