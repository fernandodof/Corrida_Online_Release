<?php

require_once '../model/persistence/Dao.class.php';
require_once '../util/Queries.php';
require_once '../util/Queries_Builders.php';
require_once '../util/TimeFunctions.php';
require_once '../util/DataEmPortugues.php';

session_start();

$dao = new Dao();

$params['id'] = $_SESSION['id'];
$criteria = getOrderCollumn(filter_input(INPUT_POST, 'iSortCol_0'));
$extraOrderBy[$criteria] = filter_input(INPUT_POST, 'sSortDir_0');

$keyword = trim(filter_input(INPUT_POST, 'sSearch'));

$displayLenght = intval(filter_input(INPUT_POST, 'iDisplayLength'));

if ($displayLenght === -1) {
    $displayLenght = null;
}

if ($keyword === '') {

    $runs = $dao->getListResultOfQueryBuilderWithParametersAndLimit(Queries_Builders::get_runs_by_runner_id_builder(), $params, 
            filter_input(INPUT_POST, 'iDisplayStart'), $displayLenght, $extraOrderBy);
    $runCountArray = $dao->getSingleResultOfNamedQueryWithParameters(Queries::GET_RUN_COUNT, $params);
    $runCount = $runCountArray[1];
} else {
    $runs = $dao->getListResultOfQueryBuilderWithParametersAndLimit(Queries_Builders::get_runs_by_runner_id_builder(), $params, 
            filter_input(INPUT_POST, 'iDisplayStart'), $displayLenght, $extraOrderBy, $keyword);

    $runsToCount = $dao->getListResultOfQueryBuilderWithParametersAndLimit(Queries_Builders::get_runs_by_runner_id_builder(), $params, null, null, $extraOrderBy, $keyword);

    $runCount = count($runsToCount);
}

foreach ($runs as $key => $value) {
    $runs[$key]['avgSpeed'].= ' Km/h';
    $runs[$key]['pace'] .= ' min/Km';
    $runs[$key]['distance'].= ' Km';
    $runs[$key]['notesId'] = $runs[$key]['notes'] . '|' . $runs[$key]['id'];
}

$output = array(
    "iTotalRecords" => intval($runCount),
    "iTotalDisplayRecords" => intval($runCount),
    "sEcho" => intval(filter_input(INPUT_POST, 'sEcho')),
    "aaData" => $runs
);

function getOrderCollumn($colNumber) {
    $column = 'r.date';
    switch ($colNumber) {
        case 1:
            $column = 'r.distance';
            break;
        case 2:
            $column = 'r.duration';
            break;
        case 3:
            $column = 'r.avgSpeed';
            break;
        case 4:
            $column = 'r.pace';
            break;
    }
    return $column;
}

$response = json_encode($output);
echo $response;
