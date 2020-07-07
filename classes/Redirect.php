<?php

class Redirect
{
    public static function to($location = null, $additional = null)
    {
        if ($location) {
            if (is_numeric($location)) {
                switch ($location) {
                        // is switch so you may include other error page
                    case 404:
                        header('HTTP/1.0 404 Not Found');
                        include 'includes/errors/404.php';
                        exit();
                        break;
                }
            }
            $x = null;
            if ($additional) {
                $x = '?';
            }

            header('Location: ' . $location . $x . $additional);
            exit();
        }
    }
}