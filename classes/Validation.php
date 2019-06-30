<?php
require_once 'Config.php';
require_once 'User.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/utils.php';

class Validation {
  private $_values;
  private $_errors = [];

  public function __construct($values) {
    unset($values[Config::get('token_name')]);
    $this->_values = $values;
  }

  public function validate($validation_rules) {
    $this->_errors = [];
    foreach($this->_values as $key => $value) { // Loop through values
      $rules = explode('|', $validation_rules[$key]);

      foreach($rules as $rule) { // Loop through validation rules for each value
        $one_rule_failed = false;
        $r = explode(':', $rule);

        switch ($r[0]) {
          case 'required':
          if (strlen($value) <= 0) {
            $this->_errors[$key] = "$key is required";
            $one_rule_failed = true;
          }
          break;

          case 'min':
          if (strlen($value) < $r[1]) {
            $this->_errors[$key] = "$key must be at least $r[1] characters";
            $one_rule_failed = true;
          }
          break;

          case 'max':
          if (strlen($value) > $r[1]) {
            $this->_errors[$key] = "$key is too long";
            $one_rule_failed = true;
          }
          break;

          case 'number':
          if (!is_numeric($value)) {
            $this->_errors[$key] = "$key must be a number";
            $one_rule_failed = true;
          }
          break;

          case 'email':
          if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->_errors[$key] = "$key must be a valid email";
            $one_rule_failed = true;
          }
          break;

          case 'unique':
          $user = new User();
          if ($user->findByEmail($value) and $user->count() === 1) {
            $this->_errors[$key] = "This $key has been used";
            $one_rule_failed = true;
          }
          break;

          case 'equal':
          if ($value !== $this->_values[$r[1]]) {
            $keys = explode('_', $key);
            $this->_errors[$key] = "$keys[0] $keys[1] must be equal to $r[1]";
            $one_rule_failed = true;
          }
          break;
        } // end switch

        if ($one_rule_failed) break;
      }
    }
  }

  public function passed() {
    if (count($this->_errors) > 0) return false;
    return true;
  }

  public function failed() {
    return !$this->passed();
  }

  public function hasError($key) {
    return isset($this->_errors[$key]) ? true : false;
  }

  public function error($key) {
    return $this->_errors[$key];
  }
}