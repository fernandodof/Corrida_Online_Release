<?php

include_once '../pages/dashboardMenu.php';
require_once '../src/app/model/persistence/Dao.class.php';
require_once '../src/app/util/Queries_Builders.php';
require_once '../src/app/util/TimeFunctions.php';

$dao = new Dao();

if (!session_id()) {
    session_start();
}

$params['id'] = $_SESSION['id'];
$summary = $dao->getListResultOfQueryBuilderWithParameters(Queries_Builders::get_runs_summary(), $params);

$summary = $summary[0];

$totalTime = $summary['totalTime'];

$totalTimeConverted = TimeFunctions::secondsToCompleteTime($totalTime);

$timeToShow = $totalTimeConverted['hours'] . ':' . $totalTimeConverted['minutes'] . ':' . $totalTimeConverted['seconds'];

if ($totalTimeConverted['days'] != 0) {

    if ($totalTimeConverted['days'] === 1) {
        $timeToShow = $totalTimeConverted['days'] . ' dia ' . $timeToShow;
    } else {
        $timeToShow = $totalTimeConverted['days'] . ' dias ' . $timeToShow;
    }
}


if ($totalTimeConverted['months'] != 0) {

    if ($totalTimeConverted['days'] === 0) {
        $timeToShow = $totalTimeConverted['days'] . ' dias ' . $timeToShow;
    }

    if ($totalTimeConverted['months'] === 1) {
        $timeToShow = $totalTimeConverted['months'] . ' mes ' . $timeToShow;
    } else {
        $timeToShow = $totalTimeConverted['months'] . ' meses ' . $timeToShow;
    }
}

if ($totalTimeConverted['years'] != 0) {

    if ($totalTimeConverted['months'] === 0) {
        $timeToShow = $totalTimeConverted['months'] . ' meses ' . $timeToShow;
    }

    if ($totalTimeConverted['years'] === 1) {
        $timeToShow = $totalTimeConverted['years'] . ' ano ' . $timeToShow;
    } else {
        $timeToShow = $totalTimeConverted['years'] . ' anos ' . $timeToShow;
    }
}



$summary['totalTime'] = $timeToShow;
$summary['totalDistance'] = (round(floatval($summary['totalDistance']),2)) . ' Km';

$smarty->assign('summary', $summary);
$smarty->display('../templates/dashboard.tpl');
