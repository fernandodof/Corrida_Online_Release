<?php
include_once '../pages/dashboardMenu.php';
require_once '../src/app/model/persistence/Dao.class.php';

$dao = new Dao();

$runner = $dao->findByKey('runner', $_SESSION['id']);

$runner->setPassword(null);

$smarty->assign('runner', $runner);
$smarty->display('../templates/profile.tpl');