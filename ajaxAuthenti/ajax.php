<?php
include 'config.php';
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});
session_start();

$name = $_POST['name'] ?? '';
$password = $_POST['password'] ?? '';

if (!isset($_SESSION['user_id'])){
    $user = (new User())->authentify($name, $password);
    if ($user){
        $_SESSION['userId'] = $user->getId();
        echo json_encode($user);
    } else {
        echo 'draussen';
    }
}


