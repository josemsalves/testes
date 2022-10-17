<?php

date_default_timezone_set("America/Detroit"); // Set the default timezone
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(- 1);

include 'vendor/autoload.php';
use Doctrine\DBAL\Driver\PDOMySql\Driver as PDOMySqlDriver;
// Paths to Entities that we want Doctrine to see
$paths = array(
    "module/Application/src/Entity"
);

// Tells Doctrine what mode we want
$isDevMode = true;

// Doctrine connection configuration


$dbParams = array(
    'driver' => 'pdo_mysql',
    'user' => 'website',
    'password' => '',
    'dbname' => 'testes',
);