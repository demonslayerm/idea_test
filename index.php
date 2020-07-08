<?php
// erased core/init.php cuz it is in the header.php 
require_once 'header.php';
require_once 'core/init.php';



if(Session::exists('home')) {
  echo '<p>' . Session::flash('home') . '</p>';
}

// echo Session::get(Config::get('session/session_name'));
// you can get the user7s id by this 

$user = new User();
// echo $user->data()->$username;

if($user->isLoggedIn()) {
  echo ' You are logged in!';
  ?>
  
  <p>Hello <a href="#"> <?php echo escape($user->data()->username); ?> </a>!</p>
  <ul>
    <li><a href="logout.php">Log out</a></li>
    <li><a href="update.php">update details</a></li>
    <li><a href="changepassword.php">change password</a></li>

  </ul>

<?php
} else {
  // when you are not logged in 
  echo '<p>you need to <a href="login.php">log in</a> or <a href="register.php">register</a><?p>';

}
?>

</body>
</html>











<?php

// echo Config::get('mysql/host');
//
// $users = DB::getInstance()->query('SELECT username FROM users');
// if ($users->count()) {
//   foreach($users as $user) {
//     echo $user->username;
//   }
// }

// SETTING QUERY
// $user = DB::getInstance()->query("SELECT username FROM users WHERE username = ?", array('alex'));
// $user = DB::getInstance()->query("SELECT * FROM users");
// $user = DB::getInstance()->get('users', array('username', '=', 'alex'));

// LESSON 10 FIST HALF INSERTING DATA(NOT GO WELL)

// $userInsert = DB::getInstance()->insert('users', array(
//   'username' => 'Serena',
//   'password' => 'password',
//   'salt' => 'salt'
// ));

// LESSON 10 LAST HALF UPDATE
// $userInsert = DB::getInstance()->update('users', 2, array(
//   'password' => 'newpassword',
//   'name' => 'Josephina'
// ));

// CHECK FO INSERT AND UPDATE
// if($userInsert) {
//   echo "success";
// } else {
//   echo "nope didnt go well";
// }

//
// if (!$user->count()) {
//   echo "No useer";
// } else {
//   foreach($user->results() as $user) {
//     echo $user->username, '<br>';
//   }
// }
