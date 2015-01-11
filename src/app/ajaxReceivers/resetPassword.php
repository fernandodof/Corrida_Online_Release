<?php

require_once '../../app/model/persistence/Dao.class.php';
require_once '../util/Queries.php';
require_once '../util/EncryptPassword.php';

$code = filter_input(INPUT_POST, 'code');

$dao = new Dao();
$params['code'] = $code;
$recover = $dao->getArrayResultOfNativeQueryWithParameters(Queries::GET_RUNNER_ID_CODE_BY_PASSWORD_CODE, $params);

if (!$recover) {
    echo 0;
} else {

    $password = EncryptPassword::encrypt(filter_input(INPUT_POST, 'password'));
    $runner = $dao->findByKey('runner', $recover['runner_id']);
    $runner->setPassword($password);
    $dao->update($runner);
    $params1['id'] = $recover['id'];
    $dao->executeQueryWithParameters(Queries::UPDATE_RECOVERED_PASSWORD, $params1);

}