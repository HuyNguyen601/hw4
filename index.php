<?php
namespace hw4;
require __DIR__ . '/vendor/autoload.php';

$activity = (isset($_REQUEST['c']) && in_array($_REQUEST['c'], [
    "landing", "newNote", "newList", "display"])) ? $_REQUEST['c'] . "Controller" : "landingController";
$c = new Controller();
$c->$activity();
