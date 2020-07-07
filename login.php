<?php
require_once 'header.php';

if (Input::exists()) {
  // if (Token::check(Input::get('token'))) {

    $validate = new Validate();
    $validation = $validate->check($_POST, array(
      'username_or_email' => array(
        'required' => true,
        // 'uore_chara_check' => 'ok'
      ),
      'password' => array(
        'required' => true
      )
    ));

    if ($validation->passed()) {
      // log user in
      $user = new User();

      $remember = (Input::get('remember') === 'on') ? true : false;
      
    
      $login = $user->login(Input::get('username_or_email'), Input::get('password', $remember));

      
      if ($login) {
        // ポップアップでログインしたことおしらせしてもいいかも
        Redirect::to('index.php', 'login=success');
      } else {
        echo 'sorry, login failed. Your username/email or password maybe incorrect.';
      }
    } else {
      foreach ($validation->errors() as $error) {
        echo $error, '<br>';
      }
    }
  // }
}
?>



<form action="" method="post">
  <div class="field">
    <!-- <label for="username">Username</label> -->
    <input type="text" name="username_or_email" id="username" placeholder="Username/Email" autocomplete="off">
  </div>

  <div class="field">
    <!-- <label for="password">Password</label> -->
    <input type="password" name="password" id="password" placeholder="Password" autocomplete="off">
  </div>

  <div class="field">
    <label for="remember">
      <input type="checkbox" name="remember" id="remember">
      Remember Me
    </label>
  </div>

  <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
  <!-- <input type="submit" value="Log in"> -->
  <button type="submit">Log In</button>
</form>

<a href="resetpassword.php">Forgot your password?</a>