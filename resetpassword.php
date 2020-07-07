<?php
require "header.php";

if (Input::exists()) {
    
}
?>

<main>
    <div class="wrapper-main">
        <section class="section-defalut">

        </section>
        <h1>Reset your password</h1>
        <p>An e-mail will be send to you with instructions on how to reset your password.</p>

        <form action="" method="post">
            <input type="text" name="email" placeholder="Enter your email address">
            <button type="submit" name="reset-request-submit">Recieve new password by email</button>
        </form>
        </section>
    </div>
    <!-- get first token that authenticate user -->
    <!-- get second token that pinpoint the token that user need when user comes to the site again -->
</main>