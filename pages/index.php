<?php

if (!session_id()) {
    session_start();

    if (isset($_SESSION['id'])) {
        header('Location: ../pages/dashboard');
    }
}


require_once '../src/app/util/Queries.php';
require_once '../src/app/model/persistence/Dao.class.php';

$dao = new Dao();

$minMax = $dao->getArrayResultOfNativeQuery(Queries::GET_MIN_MAX_SENTENCE_ID);

$sentenceId = rand($minMax['min'], $minMax['max']);

$params['id'] = $sentenceId;
$idExists = $dao->getArrayResultOfNativeQueryWithParameters(Queries::CHECK_SENTENCE_EXISTS, $params);

while (!$idExists) {
    $sentenceId = rand($minMax['min'], $minMax['max']);

    $params['id'] = $sentenceId;
    $idExists = $dao->getArrayResultOfNativeQueryWithParameters(Queries::CHECK_SENTENCE_EXISTS, $params);
}

$sentence = $dao->findByKey('Sentence', $sentenceId);

include_once '../pages/header.php';

$smarty->assign('sentence', $sentence);
$smarty->display('../templates/index.tpl');
