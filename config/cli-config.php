<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Console\ConsoleRunner;

use Doctrine\DBAL\Driver\PDOMySql\Driver as PDOMySqlDriver;
use Doctrine\DBAL\Driver\PDOSqlsrv\Driver as PDOsqlServerDriver;

//include 'bootstrap.php';
include 'autoload/global.php';
include 'vendor/autoload.php';

// Paths to Entities that we want Doctrine to see
$isDevMode = true;

$path10 = array(
    "module/Application/src/Entity"
);

$dbXyllela = array(
    'driver' => 'pdo_mysql',
    'user' => 'website',
    'password' => '',
    'dbname' => 'testes',
    'engine' => 'InnoDB',

);


$config10 = Setup::createAnnotationMetadataConfiguration($path10, $isDevMode,null,null,false);

$entityManager10= EntityManager::create($dbXyllela, $config10);


//$recibosLocalSql= ConsoleRunner::createHelperSet($entityManager1);
//$SgiInternoSql= ConsoleRunner::createHelperSet($entityManager2);
//$SgiExternoSql=ConsoleRunner::createHelperSet($entityManager3);
//$SgiExternoConteudoSql=ConsoleRunner::createHelperSet($entityManager4);
//$SqlServer=ConsoleRunner::createHelperSet($entityManager5);
//$SqlPostgrep=ConsoleRunner::createHelperSet($entityManager6);
//$SqlOracle=ConsoleRunner::createHelperSet($entityManager7);
//$DispachesSql=ConsoleRunner::createHelperSet($entityManager8);
//$Cinloco=ConsoleRunner::createHelperSet($entityManager9);
$Xyllela=ConsoleRunner::createHelperSet($entityManager10);
//return ConsoleRunner::createHelperSet($entityManager);