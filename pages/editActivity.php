<?php

if (!session_id()) {
    session_start();

    if (!isset($_SESSION['id'])) {
        header('Location: ../pages/index');
    }
}

$runId = filter_input(INPUT_GET, 'code');
if ($runId === null || $runId === '') {
    header("Location: ../pages/dashboard");
}

require_once '../src/app/model/persistence/Dao.class.php';
require_once '../src/app/util/Queries.php';

$dao = new Dao();

$params['runid'] = $runId;
$params['runnerid'] = $_SESSION['id'];

$run = $dao->getSingleResultOfNamedQueryWithParameters(Queries::GET_RUN_BY_RUNNER_ID_RUN_ID, $params);

if ($run == null) {
    header('Location: ../pages/index');
}

include_once '../pages/dashboardMenu.php';

$smarty->assign('runDate', date('d/m/Y', $run->getDate()->getTimestamp()));
$smarty->assign('run', $run);
$smarty->display('../templates/editActivity.tpl');
