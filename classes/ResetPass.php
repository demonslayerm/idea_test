<?php 


class ResetPass {

    public function __construct() {
        if (isset($_POST['rest-request-submit'])) {
            
        } else {
            Redirect::to('index.php');
        }

    }
}