<?php
include_once 'passwordgenerator.class.php';

$obj = new PasswordGenerator();
$obj->generatePassword(25,true);
echo $obj->getPassword();
unset($obj);
?>