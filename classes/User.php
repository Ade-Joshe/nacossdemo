<?php
require_once 'DB.php';
require_once 'Session.php';
require_once 'Hash.php';

class User extends DB {
  private static $_tablename = 'users';
  protected $db;
  public $p;

  public function __construct() {
    $this->db = parent::getInstance();
    return $this;
  }

  private function filter_by($keys_params = []) {
    if (($q = $this->db->select(self::$_tablename, $keys_params)) && !$this->db->error()) {
      return $q;
    }
    debug('Unable to perform filter query');
  }

  public function getAll() {
    if (($q = $this->filter_by())) {
      $result = $q->fetchAll();
      return $result;
    }
    debug('Failed to get all users');
  }

  public function findById($id) {
    $this->p = $this->filter_by(['id' => $id])->fetch();
    if ($this->db->count() > 0) {
      // Store retrieved fields directly on user object
      foreach ($this->p as $p => $v) {
        $this->$p = $v;
      }
    }
    return $this;
  }

  public function findByEmail($email) {
    $this->p = $this->filter_by(['email' => $email])->fetch();
    if ($this->db->count() > 0) {
      foreach ($this->p as $p => $v) {
        $this->$p = $v;
      }
    }
    return $this;
  }

  public function save($keys_params) {
    if (($q = $this->db->insert(self::$_tablename, $keys_params)) && !$this->db->error()) {
      return $this;
    }
    debug('Unable to save user');
  }

  public function update($keys_params = [], $find_by_params = []) {
    if (($q = $this->db->modify(self::$_tablename, $keys_params, $find_by_params)) && !$this->db->error()) {
      return $this;
    }
    debug('Unable to update user');
  }

  public function remove($keys_params = []) {
    if (($q = $this->db->delete(self::$_tablename, $keys_params)) && !$this->db->error()) {
      return $this;
    }
    debug('Unable to remove user');
  }

  public function count() {
    return $this->db->count();
  }

  public function isLoggedIn() {
    if (Session::exists('user_id') and ($this->email === Session::get('user_id'))) {
      return true;
    }
    return false;
  }

  public function isAnonymous() {
    return !$this->isLoggedIn();
  }

  public function login($email, $password) {
    if ($this->findByEmail($email) and $this->count() == 1) {
      if (Hash::verify($password, $this->password)) {
        Session::store('user_id', $this->email);
        return true;
      }
    }
    return false;
  }

  public function logout() {
    Session::delete('user_id');
  }


}