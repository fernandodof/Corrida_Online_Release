<?php

require_once '../util/EncryptPassword.php';
require_once '../model/persistence/Dao.class.php';

session_start();
$dao = new Dao();

$runnerId = $_SESSION['id'];
$runner = $dao->findByKey('runner', $runnerId);

$runner->setPassword(EncryptPassword::encrypt(filter_input(INPUT_POST, 'password')));

$dao->update($runner);
