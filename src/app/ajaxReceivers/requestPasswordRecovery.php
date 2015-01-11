<?php

require_once '../../../pages/pathVars.php';
require_once '../../app/model/persistence/Dao.class.php';
require_once '../util/Queries.php';
require_once '../util/SendEmail.class.php';

$email = filter_input(INPUT_POST, 'email');
$dao = new Dao();
$params['email'] = $email;
$runner = $dao->getSingleResultOfNamedQueryWithParameters(Queries::GET_RUNNER_BY_EMAIL, $params);

$recoverPassword = new RecoverPassword();
$recoverPassword->setRunner($runner);
$recoverPassword->setCode(uniqid(rand()));

$expiryDate = new \DateTime();
$expiryDate->modify('+5 Hours');

$recoverPassword->setExpiration($expiryDate);

$dao->save($recoverPassword);

$sendEmail = new SendEmail();

$sendEmail->sendPasswordRecoverEmail($runner->getName(), $templateRoot . 'pages/resetPassword?code=' . $recoverPassword->getCode(), $runner->getEmail());
