<?php
session_start();
require('../services/UserService.php');

$user = new User();
$user->setUsername($_POST["username"]);
$user->setPassword($_POST["password"]);

$user = UserService::login($user);

if(isset($user)){
    $hash = $_POST["password"];
    if(strcmp($user->getPassword, $hash) == 0){
        UserService::setUserSession($user);
        unset($_SESSION["errors"]);
        header("location: admin-home.php");
        exit;
    }
}

$_SESSION["errors"] = "Username or password is incorrect";
?>