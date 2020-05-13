<?php

class users {
  // Properties
  public $name;
  public $email;
  public $number;
  public $adrsse;

  // Methods
  function set_name($name) {
    $this->name = $name;
  }
  function get_name() {
    return $this->name;
  }
  function set_email($email) {
    $this->email = $email;
  }
  function get_email() {
    return $this->email;
  }
  
  function set_number($number) {
    $this->number = $number;
  }
  function get_number() {
    return $this->number;
  }
  function set_adrsse($adrsse) {
    $this->adrsse = $adrsse;
  }
  function get_adrsse() {
    return $this->number;
  }
}
$ahmed = new users(); 
$ahmed->set_name('ahmed');
$ahmed->set_email('hellokaddi@hotmail.com');
$ahmed->set_number('0I7475843544');
$ahmed->set_adrsse('TINGHIR-MAROC');
echo $ahmed->get_name();
echo "<br>";
echo $ahmed->get_email();
echo "<br>";
echo $ahmed->get_number();
echo "<br>";
echo $ahmed->get_adrsse();

?>


