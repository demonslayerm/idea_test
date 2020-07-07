<?php
if (!isset($_SESSION)) {
  session_start();
}

$GLOBALS['config'] = array(
  'mysql' => array(
    'host' => 'localhost',
    'username' => 'mmtuts',
    'password' => 'mmtuts09masai',
    'db' => 'loginsystemoop'
  ),
  'remember' => array(
    'cookie_name' => 'hash',
    'cookie_expiry' => '604800'
  ),
  'session' => array(
    'session_name' => 'user',
    'token_name' => 'token'
  )
);

// AUTOLOAD THE CLASSES 
spl_autoload_register(function ($class) {
  $filename = 'classes/' . $class . '.php';

  if (!file_exists($filename)) {
    return false;
  }
  require_once $filename;
});

require_once 'functions/sanitize.php';

// if (Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists(Config::get('session/session_name'))) {
//     // echo "user asked to be remembered";
//     $hash = Cookie::get(Config::get('remember/cookie_name'));
//     $hashCheck = DB::getInstance()->get('users_session', array('hash', '=', $hash));

//     if($hashCheck->count()) {
//       // echo "hash matches, log user in";
//       $user = new User($hashCheck->first()->user_id);
//       $user->login();
//     }
// }