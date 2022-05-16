<?php

use Modules\User\Entity\UserEntity;
use Modules\User\Service\UserService;

require_once './App.php';

$req = new UserEntity();
$req->email = "sammi@admin.unri.ac.id";
$req->password = "12345";
$req->idRole = "3";

$userService->register($req);