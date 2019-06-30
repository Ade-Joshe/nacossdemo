<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/utils.php';

class Redirect {
  public static function to($page = null) {
    if ($page) header("Location: $page");
  }

  public static function back() {
    // If page A led to page B and page A isn't 'login' page, link back to page A
    $prev_page = 'HTTP_REFERER';
    if (self::exists($prev_page) and self::getServerProp($prev_page) != Config::get('page:login')) {
      return self::to(self::getServerProp($prev_page));
    }
    return self::to(Config::get('page:home'));
  }

  private static function getServerProp ($property) {
    return $_SERVER[$property];
  }

  public static function exists($property) {
    if ($property and isset($_SERVER[$property])) {
      return true;
    }
    return false;
  }
}