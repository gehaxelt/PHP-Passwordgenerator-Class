<?php
include_once 'passwordgenerator.class.php';

$obj = new PasswordGenerator();
$obj->generatePassword(25,true,false,true,false);
echo $obj->getPassword();
unset($obj);
?>