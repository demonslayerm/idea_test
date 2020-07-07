<?php

class Token {
  public static function generate() {
    return Session::put(Config::get('session/token_name'), md5(uniqid()));
    // return Session::put(Config::get('session/token_name'), md5(uniqid()));
    // $selector = bin2hex(random_bytes(8));
    // $token = random_bytes(32);
    // // one that actually autenticates user 

    // $url = 'http://localhost/idea/create-new-password.php?selector=' . $selector . '&validator=' . bin2hex($token);

    // $expires = date('U') + 1800;
    // $this->_db = DB::getInstance();
    // $userEmail = $_POST['email'];

  }

  public static function check($token) {
    $tokenName = Config::get('session/token_name');

    if (Session::exists($tokenName) && $token === Session::get($tokenName)) {
      Session::delete($tokenName);
      return true;
    }
    return false;
  }
}

 
