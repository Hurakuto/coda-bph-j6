<?php
require_once 'display-users.php';
require_once __DIR__ . '/../managers/UserManager.class.php';

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$role = $_POST['role'];

$n_user = new User($username, $email, $password, $role);

$um->saveUser($n_user);

header('Location: ../index.php');
?>