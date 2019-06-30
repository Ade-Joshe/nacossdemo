<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';

class Config {

  public static function get ($config_string) {
    $localized_config = $GLOBALS['config'];
    $config_array = explode(':', $config_string);
    
    foreach($config_array as $config_param) {
      $value = $localized_config[$config_param];
      if (is_array($value)) {
        $localized_config = $value;
        continue;
      }
      break;
    }
    
    return $value;
  }

}