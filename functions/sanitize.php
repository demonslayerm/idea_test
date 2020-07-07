<?php
  function escape($string) {

  // ADD JAPANESE WAYS LATER 
  return htmlentities($string, ENT_QUOTES, 'UTF-8');
}
