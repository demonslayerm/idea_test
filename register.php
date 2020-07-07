<?php
require_once 'header.php';

// セッションをチェックしてログインしてればレジストページをみれないようにする（インデックスなどにとばす）
if(Session::exists('user')) {
  Redirect::to('index.php');
}


if (Input::exists()) {
  // if(Token::check(Input::get('token'))) {
  //   echo "i have been run";
  //   echo Input::get('username');

  $validate = new Validate();
  $validation = $validate->check($_POST, array(
    'username' => array(
      'required' => true,
      'min' => 2,
      'max' => 20,
      'unique' => 'users',
      'combine' => 'username',
      'chara_check' => 'username'
    ),
    'email' => array(
      'required' => true,
      'validate_mail' => 'email address'
    ),
    'password' => array(
      'required' => true,
      'min' => 6
    ),
    'password_again' => array(
      'required' => true,
      'matches' => 'password'
    )

    // 'name' => array(
    //   'required' => true,
    //   'min' => 2,
    //   'max' => 50
    // )
  ));
  if ($validation->passed()) {
    Session::flash('success', 'You have been registered and can login!');

    // register user
    $user = new User();

    // $salt = Hash::salt(32);

    try {
      $user->create(array(
        'username' => Input::get('username'),
        // 'password' => Hash::make(Input::get('password'), $salt),
        'password' => password_hash(Input::get('password'), PASSWORD_DEFAULT),
        // 'salt' => $salt,
        'email' => Input::get('email'),
        'joined' => date('Y-m-d H:i:s'),
        'groupid' => 1
      ));

      Session::flash('home', 'You have been registered and can login!');
      Redirect::to('index.php');
      // header('Location: index.php');

    } catch (Exception $e) {
      die($e->getMessage());
    }
  } else {
    // output errors
    foreach ($validation->errors() as $error) {
      echo $error . '<br>';
    }
  }
}
// }
?>
<form action="" method="post">
  <div class="field">
    <!-- <label for="username">Username</label> -->
    <input type="text" name="username" id="username" value="<?php echo escape(Input::get('username')); ?>" placeholder="Username" autocomplete="off">
  </div>

  <div class="field">
    <!-- <label for="email">Email</label> -->
    <input type="text" name="email" value="<?php echo escape(Input::get('email')); ?>" id="email" placeholder="Email" autocomplete="off">
  </div>

  <div class="field">
    <!-- <label for="password">Choose a password</label> -->
    <input type="password" name="password" id="password" placeholder="Password">
  </div>

  <div class="field">
    <!-- <label for="password_again">Enter your password again</label> -->
    <input type="password" name="password_again" id="password_again" placeholder="Repeat Password">
  </div>

  <!-- <div class="field">
    <label for="name">your name</label>
    <input type="text" name="name" value="<?php echo escape(Input::get('name')); ?>" id="name">
  </div> -->


  <input type="submit" name="" value="Register ">

</form>

<a href="resetpassword.php">Forgot your password? Reset it here</a>
<!-- also maybe allow forgotten username  -->