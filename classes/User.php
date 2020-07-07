<?php

class User {
  private $_db,
          $_data,
          $_sessionName,
          $_cookieName,
          $_isLoggedIn;

  

  public function __construct($user = null) {
    $this->_db = DB::getInstance();

    $this->_sessionName = Config::get('session/session_name');
    // $this->_cookieName = Config::get('remember/cookie_name');

    if(!$user) {
      if(Session::exists($this->_sessionName)) {
        $user = Session::get($this->_sessionName);
        
        if($this->find($user)) {
          $this->_isLoggedIn = true;
        } else {
          // process logout
        }
      }
    } else {
      $this->find($user);
    }
  }

  public function update($fields = array(), $id = null) {

    if(!$id && $this->isLoggedIn()) {
      $id = $this->data()->id;
    }

    if(!$this->_db->update('users', $id, $fields)) {
      throw new Exception('There was a problem updating');
    }
  }

  public function create($fields) {
    if(!$this->_db->insert('users', $fields)) {
      throw new Exception('There was a problem creating an account');
    }
  }

  public function find($user = null) {
    if($user) {
      $field = (is_numeric($user)) ? 'id' : 'username';
      $pattern = '@';

      if (strpos($user, $pattern)) {
        $field = 'email';
      }
      
      $data = $this->_db->get('users', array($field, '=', $user));

      if ($data->count()) {
        $this->_data = $data->first();
        return true;
      }
    }
    return false;
  }

  public function login($username_or_email = null, $password = null) {
      $user = $this->find($username_or_email);

      if ($user) {
          $pwdCheck = password_verify($password, $this->data()->password);

          if ($pwdCheck == true) {
              // session_start();
              Session::put($this->_sessionName, $this->data()->id);
              return true;
          } elseif ($pwdCheck == false) {
              echo 'your password is wrong';
          }
    

          return false;
      }
  }
  

  // public function login($username = null, $password = null)  {
  //   // , $remember = false 追加するかも 
  

  //   if(!$username && !$password && $this->exists()) {
  //     Session::put($this->_sessionName, $this->data()->id);

  //   } else {
  //     // emailかユーザーか　
  //       $user = $this->find($username);
  //       $row = the data of password you got from db

  //       $pwdCheck = password_verify($password, $row['password']);

  //       Session::put($this->sessionName, $this->data()->id);
    
    
  //       if ($user) {
  //           if ($this->data()->password === Hash::make($password, $this->data()->salt)) {
  //               Session::put($this->_sessionName, $this->data()->id);

  //               if ($remember) {
  //                   $hash = Hash::unique();
  //                   $hashCheck = $this->_db->get('users_session', array('user_id', '=', $this->data()->id));

  //                   if (!$hashCheck->count()) {
  //                       $this->_db->insert('users_session', array(
  //             'user_id' => $this->data()->id,
  //             'hash' => $hash
  //           ));
  //                   } else {
  //                       $hash = $hashCheck->first()->hash;
  //                   }

  //                   Cookie::put($this->_cookieName, $hash, Config::get('remember/cookie_expiry'));
  //               }
  //               return true;
  //           }
  //       }
  //       return false;
  //   }
  // }

  public function exists() {
    return (!empty($this->_data)) ? true : false;
  }

  public function logout() {

    $this->_db->delete('users_session', array('user_id', '=', $this->data()->id));
    Session::delete($this->_sessionName);
    Cookie::delete($this->_cookieName);
  }

  public function data() {
    return $this->_data;
  }

  public function isLoggedIn() {
    return $this->_isLoggedIn;
  }
}
