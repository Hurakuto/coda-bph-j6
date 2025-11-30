<?php
require_once __DIR__ . '/display-users.php';
require_once __DIR__ . '/../managers/UserManager.class.php';

$id = $_GET['id'];

$users = $um->getUsers();

foreach ($users as $user) {
    if ($id == $user->getId()) {
        $um->deleteUser($user);
        break;
    }
}

header('Location: ../index.php');