<?php
require_once '../model/persistence/Dao.class.php';
require_once '../util/EncryptPassword.php';

$dao = new Dao();
session_start();
$runner = $dao->findByKey('runner', $_SESSION['id']);

$runner->setName(filter_input(INPUT_POST, 'name'));
$runner->setEmail(filter_input(INPUT_POST, 'email'));
$runner->setLogin(filter_input(INPUT_POST, 'login'));
$runner->setPassword(EncryptPassword::encrypt(filter_input(INPUT_POST, 'password')));

var_dump($runner);

$dao->update($runner);

$_SESSION['name'] = $runner->getName();
$_SESSION['email'] = $runner->getEmail();
$_SESSION['login'] = $runner->getLogin();
