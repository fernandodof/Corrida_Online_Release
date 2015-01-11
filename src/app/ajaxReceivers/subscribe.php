<?php
require_once '../model/persistence/Dao.class.php';
require_once '../util/Queries.php';
require_once '../util/EncryptPassword.php';

$dao = new Dao();

$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email');
$login = filter_input(INPUT_POST, 'login');
$password = filter_input(INPUT_POST, 'password');

$runner = new Runner();

$runner->setName($name);
$runner->setEmail($email);
$runner->setLogin($login);
$runner->setPassword(EncryptPassword::encrypt($password));
$dao->save($runner);

echo true;
