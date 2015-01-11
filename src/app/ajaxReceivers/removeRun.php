<?php
require_once '../model/persistence/Dao.class.php';
require_once '../util/Queries.php';
$dao = new Dao();

session_start();

$params['id'] = filter_input(INPUT_POST, 'runId');

$dao->executeQueryWithParameters(Queries::REMOVE_RUN_BY_ID, $params);

echo true;