<?php

class Validate
{
  private $_passed = false,
    $_errors = array(),
    $_db = null;

  public function __construct()
  {
    $this->_db = DB::getInstance();
  }

  public function check($source, $items = array())
  {
    foreach ($items as $item => $rules) {
      foreach ($rules as $rule => $rule_value) {
        // echo "{$item} {$rule} must be {$rule_value}<br>";
        $value = trim($source[$item]);
        // trim == cut out the space in fromt and end of word
        $item = escape($item);

        if ($rule == 'required' && empty($value)) {
          $this->addError("{$item} is required");
          // $this->addError("please add {$item}");

        } else if (!empty($value)) {
          switch ($rule) {
            case 'min':
              if (strlen($value) < $rule_value) {
                $this->addError("{$item} must be a minimum of {$rule_value} characters.");
              }
              break;
            case 'max':
              if (strlen($value) > $rule_value) {
                $this->addError("{$item} must be a maximum of {$rule_value} characters.");
              }
              break;
            case 'matches':
              // you have to ask again cause it refers to another field's value(like one from password_again to password)
              if ($value != $source[$rule_value]) {
                $this->addError("{$rule_value} must match {$item}");
              }
              break;
            case 'unique':
              $check = $this->_db->get($rule_value, array($item, '=', $value));
              if ($check->count()) {
                $this->addError("{$item} already exists, please use another username.");
              }
              break;
            case 'combine':
              if (is_numeric($value)) {
                $this->addError("sorry, {$item} cannot be only numbers.");
              }
              break;
            case 'validate_mail':
              if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                $this->addError("please use a valid {$rule_value}.");
              }
              break;
              case 'chara_check':
                if (!preg_match("/^[a-zA-Z0-9]*$/", $value)) {
                  $this->addError("please use alphabet or numeric value only for {$rule_value}.");
                }
              break;
              // case 'uore_chara_check':
              //   if (!preg_match("/^[a-zA-Z0-9]*$/", $value) || !filter_var($value, FILTER_VALIDATE_EMAIL)) {
              //     $this->addError("please use a valid {$rule_value}.");
              //   }
              // break;
                
          }
        }
      }
    }
    if (empty($this->_errors)) {
      $this->_passed = true;
    }
    return $this;
  }

  private function addError($error)
  {
    $this->_errors[] = $error;
  }

  public function errors()
  {
    return $this->_errors;
  }

  public function passed()
  {
    return $this->_passed;
  }
}
