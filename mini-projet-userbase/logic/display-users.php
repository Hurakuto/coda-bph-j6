<?php

require_once __DIR__ . '/../managers/UserManager.class.php';

$um = new UserManager();

$um->loadUsers();

?>