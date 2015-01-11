<?php

require '../pages/pathVars.php';

require_once 'smartyHeader.php';

if (!session_id()) {
    session_start();
}

$smarty->assign('path', $path);
$smarty->assign('templateRoot', $templateRoot);
$smarty->display('../templates/header.tpl');
