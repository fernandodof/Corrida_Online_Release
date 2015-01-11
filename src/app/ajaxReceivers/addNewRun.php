<?php
require_once '../model/persistence/Dao.class.php';
require_once '../util/DataEmPortugues.php';
require_once '../util/TimeFunctions.php';
include '../util/ChromePHP.php';
$dao = new Dao();

session_start();
$runner = $dao->findByKey('runner', $_SESSION['id']);

$run = new Run();

$date = date_create_from_format('d/m/Y', filter_input(INPUT_POST, 'date'));

$run->setDate($date);
$run->setFullDate(utf8_encode(DataEmPortugues::dataCampleta($date->getTimestamp())));
$run->setDuration(filter_input(INPUT_POST, 'time'));
$run->setFullTime(TimeFunctions::secondsToTime(filter_input(INPUT_POST, 'time')));
$run->setDistance(filter_input(INPUT_POST, 'distance'));
$run->setNotes(utf8_encode(filter_input(INPUT_POST, 'notes')));
$run->setAvgSpeed(filter_input(INPUT_POST, 'avgSpeed'));
$run->setPace(filter_input(INPUT_POST, 'avgPace'));
$run->setRunner($runner);

$dao->save($run);

$dao->update($runner);

echo true;